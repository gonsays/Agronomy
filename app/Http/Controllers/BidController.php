<?php

namespace App\Http\Controllers;

use App\Auction;
use App\Bid;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Mail\Message;
use Mail;
use Response;

class BidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $bidder = Auth::user();
        $auction_id = $request->input('auction_id');
        $auction = Auction::find($auction_id);


        //validate input
        $this->validate($request,[
            'auction_id' => 'numeric|exists:auctions,id|required',
            'bid_amount' => 'numeric|required|min:'.($auction->base_price+1)
        ]);


        if($bidder == $auction->seller){
            return Response::json(abort(403,"Unauthorized"));
        }

        $bid = new Bid();
        $bid->auction_id = $request->input('auction_id');
        $bid->amount = $request->input('bid_amount');
        $bid->status = "Open";
        $bid->bidder_id = $bidder->id;
        $bid->save();


        Mail::raw('Congrats',  function (Message $message) use ($bidder) {
            $message->from('support@agronomy.com', 'Agronomy');
            $message->to($bidder->email)->subject('You have successfully placed a bid');
        });

        return Response::json("Your bid was successfully placed");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

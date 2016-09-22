<?php

namespace App\Http\Controllers;

use App\Auction;
use App\Bid;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use Response;

class BidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $auction = Auction::find($auction_id)->get();



        //validate input
        $this->validate($request,[
            'auction_id' => 'numeric|exists:auctions,id|required',
            'bid_amount' => 'numeric|required|min:'.$auction->base_price,
        ]);

        echo "pass validation";

        $auction = Auction::find($request->input('auction_id'));

        if($bidder == $auction->seller){
            return Response::json(abort(403,"Unauthorized"));
        }

        echo "pass validation 2";

        $bid = new Bid();
        $bid->auction_id = $request->input('auction_id');
        $bid->amount = $request->input('bid_amount');
        $bid->status = "Open";
        $bid->bidder_id = $bidder->id;
        $bid->save();

        echo "new bid created";

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

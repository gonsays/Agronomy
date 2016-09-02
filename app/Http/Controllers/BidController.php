<?php

namespace App\Http\Controllers;

use App\Auction;
use App\Bid;
use Auth;
use App\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

use App\Http\Requests;

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
//
//        var_dump($request->all());
//
//        //different users
//        $bidder = Auth::user();
//
//
//
//        //validate input
//        $this->validate($request,[
//            'auction_id' => 'numeric|exists:auctions,id|required',
//            'bid_amount' => 'numeric|required',
//        ]);
//
//        $auction = Auction::get($request->input('auction_id'));
//
//        if($bidder == $auction->seller){
//            return abort(403,"Unauthorized");
//        }
//
//        $bid = new Bid();
//        $bid->auction_id = $request->input('auction_id');
//        $bid->bidder = $bidder;
//        $bid->amount = $request->input('bid_amount');
//        $bid->status = "Open";
//        $bid->save();


        return \Response::json("Hello World");
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

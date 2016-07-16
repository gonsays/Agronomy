<?php

namespace App\Http\Controllers;

use App\Auction;
use App\Product;
use Auth;
//use DebugBar\DebugBar;
use Illuminate\Http\Request;

use App\Http\Requests;

//todo datepicker
//todo location
//todo add address table
//todo add cursor to button
//todo chnage readonly style

class AuctionController extends Controller
{


    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auctionList = Auction::all();
        return view('auction.index')->with('auctionList', $auctionList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all(['id','name'])->pluck('name','id');
//        Debugbar::info($products);
        return view('auction.create')->with('products', $products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|numeric|min:10',
            'base_price' => 'required|numeric',
            'location' => 'required|string',
            'bidding_end' => 'required|date|after:today',
        ]);

        $auction = new Auction();
        $auction->product_id = $request->get('product_id');
        $auction->base_price = $request->get('base_price');
        $auction->location = $request->get('location');
        $auction->bidding_end = $request->get('bidding_end');
        $auction->seller_id = Auth::id();
        $auction->quantity = $request->get("quantity.value").$request->get("quantity.scale");
        $auction->save();
        return redirect()->action("AuctionController@show",$auction)->with('message','Auction Successfully Created');
    }

    //todo remove online dependencies make all local bower
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $auction = Auction::find($id);
        return view('auction.show')->with(['auction'=>$auction]);
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

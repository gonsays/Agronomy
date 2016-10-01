<?php

namespace App\Http\Controllers;

use App\Auction;
use App\Product;
use App\User;
use App\Variety;
use Auth;
//use DebugBar\DebugBar;
use DateTime;
use Illuminate\Http\Request;

use App\Http\Requests;
use Response;
use Validator;


class AuctionController extends Controller
{

    public function __construct(){
//        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $auctionList = Auction::where('status','Open')->paginate(12);
        return view('auction.index')->with('auctionList', $auctionList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $varieties = null;

        $products = Product::all(['id','name']);
        return view('auction.create')->with('products', $products)->with('varieties',$varieties);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $messages = [
          'variety_id.integer' => "Please choose a variety"
        ];


        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|min:10',
            'base_price' => 'required|numeric|min:10',
            'location' => 'required|string',
            'bidding_end' => 'required|date_format:Y-m-d|after:today',
            'description' => 'required'
        ], $messages);

        $varieties = null;

        if ($validator->fails()) {

            if($request->has('product_id')) {
                $product_id = $request->input('product_id');
                $varieties = Product::find($product_id)->varieties()->get(['id', 'name']);
            }

            return redirect()
                ->back()
                ->with('varieties',$varieties)
                ->withErrors($validator)
                ->withInput();
        }


        $auction = new Auction();
        $auction->variety_id = $request->get('variety_id');
        $auction->base_price = $request->get('base_price');
        $auction->description =  $request->get('description');
        $auction->location = $request->get('location');
        $auction->bidding_end = $request->get('bidding_end');
        $auction->seller_id = Auth::id();
        $auction->quantity = $request->get("quantity");
        $auction->save();

        $request->session()->flash('status', 'Auction Successfully Created');

        return redirect()->action("AuctionController@show",$auction);

    }

    //todo remove online dependencies make all local bower
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($id)
    {
        $auction = Auction::with('variety')->find($id);
        $bids = $auction->bids->sortByDesc('amount');
        $suggestedBids = [];
        $highestBid = $auction->bids()->max('amount');

        $bid_start = $highestBid?$highestBid:$auction->base_price;

        for($i=1;$i<=5;$i++){
            $amt = round($bid_start+($bid_start/10*$i));
            array_push($suggestedBids,$amt);
        }

        $now = new DateTime();
//        $daysLeft =  (new DateTime($auction->bidding_end))->diff($now)->format("%r%a");
        $dateDifference = $now->diff(new DateTime($auction->bidding_end));
        $daysLeft =  $dateDifference->format("%r%a");
        $hoursLeft = $dateDifference->format("%H");
        $minLeft = $dateDifference->format("%m");

        return view('auction.show')->with('auction',$auction)
            ->with('highestBid',$highestBid)
            ->with('suggestedBids',$suggestedBids)
            ->with('bids',$bids)
            ->with('daysLeft',$daysLeft)
            ->with('hoursLeft',$hoursLeft)
            ->with('minLeft',$minLeft)
            ;
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
     * @param Request $request
     * @return Response
     * @internal param int $id
     */
    public function destroy($id)
    {

//        $user = Auth::user();

//        if(!$auction = $user->auctions()->find($id)){
//            return abort(403 , Response::json('You do not have permission.'));
//        }

        $auction = Auction::find($id);
        $auction->status = "Closed";
        $auction->save();

        return response("Success",200);
    }

    public function search(Request $request){
        $location=null;
        $variety_id = null;

        if($request->has('location'))
            $location = $request->input('location');

        if($request->has('variety_id')){
            $variety_id = $request->input('variety_id');
        }

        $messages = [
           'product_id.required' => 'Please select a Product',
            'variety_id.required' => 'Please select a valid variety',
        ];

        $this->validate($request,[
            'location' => 'required',
            'product_id' => 'required|exists:products,id',
            'variety_id' => 'exists:varieties,id'
        ],$messages);

        $auctionList = Auction::where('location','LIKE', '%'.$location.'%')->where('variety_id',$variety_id)->get();
        return view('auction.index')->with('auctionList', $auctionList);

    }

    public function myAccount(){
        $user = Auth::user();
        $auctions = $user->auctions;
        return view('user.my_account');
    }

    public function myAuctions(){
        $user = Auth::user();
        $auctions = $user->auctions()->with('variety')->get();
        return view('user.my_auctions')->with('auctions',$auctions);
    }

    public function myBids(){
        $user = Auth::user();
        $bids = $user->bids->sortByDesc('created_at');
        return view('user.my_bids')->with('bids',$bids);
    }
}

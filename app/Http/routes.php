<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Auction;
use App\Product;

Route::get('/', function () {
    $products = Product::all(['id','name'])->pluck('name','id');

    try{
        $varieties = Product::first()->varieties->pluck('name','id');
        $topAuctions = Auction::all()->sortBy('created_at')->take(8);
    }
    catch(Exception $e){
        $varieties = [];
        $topAuctions = [];
    }

    return view('welcome')->with('products',$products)
        ->with('varieties',$varieties)
        ->with('topAuctions',$topAuctions)
        ;
});

Route::auth();
#Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');
Route::get('/adminpanel/product/add',['as' => 'admin.product.add', 'uses' =>'AdminPanelController@home']);
Route::get('/adminpanel/product/list',['as' => 'admin.product.list', 'uses' =>'AdminPanelController@productlist']);
Route::get('/adminpanel/product/edit/{id}',['as' => 'admin.product.edit', 'uses' =>'AdminPanelController@editProduct']);
Route::get('/adminpanel/reports',['uses' =>'AdminPanelController@reports']);
Route::get('/adminpanel/transaction-reports',['uses' =>'AdminPanelController@transactionReports']);

Route::get('varieties/getvarieties/{id?}','VarietyController@getVarieties');
Route::resource('auctions', 'AuctionController');
Route::post('auction/search','AuctionController@search');
Route::resource('products', 'ProductController');
Route::resource('bids','BidController');


Route::get('my-account','AuctionController@myAccount');
Route::get('my-auctions','AuctionController@myAuctions');
Route::get('my-bids','AuctionController@myBids');

//Route::group(array('domain' => 'admin.localhost'), function(){
//    Route::get('/product/add',['as' => 'admin.product.add', 'uses' =>'AdminPanelController@home']);
//    Route::get('/product/list',['as' => 'admin.product.list', 'uses' =>'AdminPanelController@productlist']);
//});

Route::get('/test',function(){
   return view('emails.bid_win');
});

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

use App\Product;

Route::get('/', function () {
    $products = Product::all(['id','name'])->pluck('name','id');
    return view('welcome')->with('products',$products);
});
Route::auth();
Route::get('/home', 'HomeController@index');
Route::get('/adminpanel/product/add',['as' => 'admin.product.add', 'uses' =>'AdminPanelController@home']);
Route::get('/adminpanel/product/list',['as' => 'admin.product.list', 'uses' =>'AdminPanelController@productlist']);

Route::get('varieties/getvarieties/{id?}','VarietyController@getVarieties');
Route::resource('auction', 'AuctionController');
Route::resource('products', 'ProductController');

//Route::group(array('domain' => 'admin.localhost'), function(){
//    Route::get('/product/add',['as' => 'admin.product.add', 'uses' =>'AdminPanelController@home']);
//    Route::get('/product/list',['as' => 'admin.product.list', 'uses' =>'AdminPanelController@productlist']);
//});
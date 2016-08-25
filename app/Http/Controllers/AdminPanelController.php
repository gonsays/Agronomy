<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminPanelController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    
    public function home(){
        return view('admin.home');
    }

    public function productlist(){
        $products = Product::all();
        return view('admin.products')->with('products',$products);
    }
}

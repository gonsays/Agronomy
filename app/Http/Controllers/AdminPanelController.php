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
        return view('admin.add_product');
    }

    public function productlist(){
        $products = Product::all();
        return view('admin.product_list')->with('products',$products);
    }

    public function editProduct($id){
        $product = Product::get($id);
        return view('admin.edit_product')->with('product',$product);
    }
}

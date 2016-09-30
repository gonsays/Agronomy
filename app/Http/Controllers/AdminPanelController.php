<?php

namespace App\Http\Controllers;

use App\Product;
use App\Variety;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use Psy\Util\Json;

class AdminPanelController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    
    public function home(){
        return view('admin.add_product');
    }

    public function productlist(){
        $varieties = Variety::paginate(10);
        return view('admin.product_list')->with('varieties',$varieties);
    }

    public function editProduct($id){
        $product = Product::get($id);
        return view('admin.edit_product')->with('product',$product);
    }
}

<?php

namespace App\Http\Controllers;

use App\Product;
use App\Variety;
use Carbon\Carbon;
use DB;
use Faker\Provider\cs_CZ\DateTime;
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

    public function reports(){
        return view('admin.reports');
    }

    public function transactionReports(){
        $current = Carbon::now();
        $months = null;

        $current->month(1);
        for($i=0;$i<12;$i++){
            $month = $current->format('M');
            $months .= ',"$month"';
            $current->addMonth();
        }
        return view('admin.transaction-reports')->with('month_names',ltrim($months,','));
    }
}

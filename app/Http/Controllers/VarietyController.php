<?php

namespace App\Http\Controllers;

use App\Variety;
use Illuminate\Http\Request;

use App\Http\Requests;
use Response;

class VarietyController extends Controller
{
    public function getVarieties($id){
        $varieties = Variety::where('product_id',$id)->pluck('id','name');
        return Response::json($varieties);
    }
}

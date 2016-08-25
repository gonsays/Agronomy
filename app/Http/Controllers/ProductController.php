<?php

namespace App\Http\Controllers;

use App\Product;
use App\Variety;
use Illuminate\Http\Request;

use App\Http\Requests;
use Mockery\CountValidator\Exception;

class ProductController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        //TODO check if varieties is empty
        $imagePath = "/images/products/";
        $imagesDirectory['products'] = base_path().$imagePath;

        $this->validate($request, [
            'name' => 'string|required|unique:products',
            'type' => 'string|required',
            'image' => 'image',
        ]);

        $image = $request->file('image');
        $image->move($imagesDirectory['products'],$image->getClientOriginalName());



        $product = new Product();
        $product->name = $request->get('name');
        $product->type = $request->get('type');
        $product->image = $imagesDirectory['products'].$image->getClientOriginalName();
        $product->measurement_unit = 'kg';

        try{
            $product->save();

            $varietiesString = $request->get('varieties');
            $varietyModel = new Variety();


            if(strpos($varietiesString, ',') != false) {
                $varietiesArray = explode($varietiesString,',');

                foreach ($varietiesArray as $variety){ //loop varieties an insert
                    $varietyModel->name = $variety;
                    $product->varieties()->save($varietyModel);
                }
            }else{
                $varietyModel->name = $varietiesString;
                $product->varieties()->save($varietyModel);
            }

        }catch (Exception $e){
            return response("Error",500);
        }


        return response("Product Successfully Uploaded",200);
        
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

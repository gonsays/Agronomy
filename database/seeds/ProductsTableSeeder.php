<?php

use App\Product;
use App\Type;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $directory = getcwd()."/database/seeds/Products";
//        $destDirectory = "./public/images/products";
        $types = scandir($directory);
        $types = array_diff($types, array('.', '..'));


        foreach ($types as $typeName){
            $typeObj = Type::where('name',ucwords($typeName))->first();
            $typeDirectory = $directory ."/". $typeName;
            $products = array_diff(scandir($typeDirectory), array('.', '..'));

            foreach ($products as $productName){

//                $destProductDir = "$destDirectory/$typeName/$productName";
//                if(!is_dir($destProductDir)) mkdir($destProductDir);

                $product = new Product();
                $product->name=ucwords($productName);
                $product->measurement_unit = "Kg";
                $product->type()->associate($typeObj);
                $product->save();
            }
        }
    }
}

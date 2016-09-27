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

        $source_directory = "./Products/";
        $typesDirectoryArray = Storage::directories($source_directory);


        foreach ($typesDirectoryArray as $typeDirectory){
            $typeObj = Type::where('name',ucwords(basename($typeDirectory)))->first();
            $productsDirectoryArray = Storage::directories($typeDirectory);

            foreach ($productsDirectoryArray as $productDirectory){
                $product = new Product();
                $product->name=ucwords(basename($productDirectory));
                $product->measurement_unit = "Kg";
                $product->type()->associate($typeObj);
                $product->save();
            }
        }
    }
}

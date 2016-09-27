<?php

use App\Product;
use App\Variety;
use Illuminate\Database\Seeder;

class VarietyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $source_directory = "./Products/";
        $destDirectory = "./images";

        $typesDirectoryArray = Storage::directories($source_directory);

        foreach ($typesDirectoryArray as $typeDirectory){
            $products = Storage::directories($typeDirectory);

            foreach ($products as $productDirectory){
                $productObj = Product::where('name',ucwords(basename($productDirectory)))->first();

                $varietiesDirectory = Storage::files($productDirectory);

                foreach ($varietiesDirectory as $varietyDirectory){

                    $destinationVarietyDirectory = "$destDirectory/$varietyDirectory";
                    $variety = new Variety();

                    if(!Storage::exists($destinationVarietyDirectory))
                        Storage::put($destinationVarietyDirectory, file_get_contents($varietyDirectory));

                    $variety->name = ucwords(basename($varietyDirectory));
                    $variety->image = $destinationVarietyDirectory;
                    $variety->product_id = $productObj->id;
                    $variety->save();
                }
            }
        }
    }
}

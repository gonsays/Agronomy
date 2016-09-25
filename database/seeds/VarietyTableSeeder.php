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
        $source_directory = getcwd()."/database/seeds/Products/";
        $destDirectory = "./images/products";

        $types_folders = scandir($source_directory);
        $types_folders = array_diff($types_folders, array('.', '..'));

        foreach ($types_folders as $typeName){
            $typeDir ="$source_directory/$typeName";
            $products = array_diff(scandir($typeDir), array('.', '..'));

            foreach ($products as $productName){
                $productObj = Product::where('name',ucwords($productName))->first();
                $productDir =$typeDir . "/" . $productName;
                $varieties = array_diff(scandir($productDir), array('.', '..'));

                foreach ($varieties as $varietyName){
                    $varietyDir = "$productDir/$varietyName";
                    $destinationVarietyDirectory = "$destDirectory/$typeName/$productName/$varietyName";
                    $variety = new Variety();

                    if(!Storage::exists($destinationVarietyDirectory))
                        Storage::put($destinationVarietyDirectory, file_get_contents($varietyDir));

                    $fileName = pathinfo($varietyName, PATHINFO_FILENAME);
                    $variety->name = ucwords($fileName);
                    $variety->image = "$destinationVarietyDirectory";
                    $variety->product_id = $productObj->id;
                    $variety->save();
                }
            }
        }
    }
}

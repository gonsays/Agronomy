<?php

use App\Product;
use App\Type;
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
        $directory = getcwd()."/database/seeds/Products/";
        $destinationImageDirectory = getcwd()."/images/products";
        $folders = scandir($directory);
        $folders = array_diff($folders, array('.', '..'));

        foreach ($folders as $typeName){
            $typeDir ="$directory/$typeName";
            $products = array_diff(scandir($typeDir), array('.', '..'));

            foreach ($products as $productName){
                $productObj = Product::where('name',ucwords($productName))->first();
                $productDir =$typeDir . "/" . $productName;
                $varieties = array_diff(scandir($productDir), array('.', '..'));

                foreach ($varieties as $varietyName){
                    $varietyDir = "$productDir/$varietyName";
                    $destinationVarietyDirectory = "$destinationImageDirectory/$typeName/$productName/$varietyName";
                    $variety = new Variety();
                    copy($varietyDir, $destinationVarietyDirectory);
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

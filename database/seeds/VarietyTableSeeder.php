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
        $file = File::get('database/seeds/apple_variety.txt');
        $variety_list = explode(", ",$file);
        
        $product = Product::where('name','Apple')->first();
        
        foreach ($variety_list as $item){
            $variety = new Variety();
            $variety->name = $item;
            $product->varieties()->save($variety);
            $variety->save();
        }
        
    }
}

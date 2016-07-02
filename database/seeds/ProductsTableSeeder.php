<?php

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
        $file = File::get('database/seeds/products_list.txt');
        $products = explode("\n",$file);


        foreach ($products as $product){
            DB::table('products')->insert(
                [
                    'name' => $product,
                    'measurement_unit' => "Kg"
                ]
            );
        }
    }
}

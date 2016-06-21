<?php

use App\Product;
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
        DB::table('products')->insert(
            [
                ['name' => 'Rice','measurement_unit'=>'Kg'],
                ['name' => 'Wheat','measurement_unit'=>'Kg'],
                ['name' => 'Cauliflower','measurement_unit'=>'Kg'],
                ['name' => 'Cabbage','measurement_unit'=>'Kg'],
                ['name' => 'Papaya','measurement_unit'=>'Pc'],
            ]
        );
    }
}

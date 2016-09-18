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
        $directory = "./Products/";
        $folders = scandir($directory);
        $folders = array_diff($folders, array('.', '..'));

        foreach ($folders as $product){

        }
        
    }
}

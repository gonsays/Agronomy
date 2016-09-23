<?php

use App\Type;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $sourceDirectory = getcwd()."/database/seeds/Products";
        $destDirectory = "./public/images/products";
        $folders = scandir($sourceDirectory);
        $folders = array_diff($folders, array('.', '..'));

        if(!is_dir("./public/images")) mkdir(".public/images");
        if(!is_dir($destDirectory)) mkdir($destDirectory);

        foreach ($folders as $typeName){
            $destTypeDir = "$destDirectory/$typeName";
            if(!is_dir($destTypeDir)) mkdir($destTypeDir);
            Type::create(['name'=>ucwords($typeName)]);
        }

    }
}

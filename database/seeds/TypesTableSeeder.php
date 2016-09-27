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
        $source_directory = "./Products/";
        $typesDirectoryArray = Storage::directories($source_directory);

        foreach ($typesDirectoryArray as $typeDirectory){
            Type::create(['name'=>ucwords(basename($typeDirectory))]);
        }

    }
}

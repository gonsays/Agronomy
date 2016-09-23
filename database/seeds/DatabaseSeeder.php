<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(VarietyTableSeeder::class);
    }
}

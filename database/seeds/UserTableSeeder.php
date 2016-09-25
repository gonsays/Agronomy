<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();


        User::create([
            'name' => "Lezwon Castellino",
            'email' => "lezwon@gmail.com",
            'password' => bcrypt('tajmahal'),
            'username' => 'lezwon',
            'phone'=>'9902496807',
            'admin' => 1,
        ]);




        for($i=0; $i<20; $i++){
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('password'),
                'username' => $faker->userName,
                'phone'=>$faker->numerify('90########'),
                'admin' => 0,
            ]);
        }
    }
}

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
        User::create([
            'name' => "Lezwon Castellino",
            'email' => "lezwon@gmail.com",
            'password' => bcrypt('tajmahal'),
            'username' => 'lezwon',
            'phone'=>'9902496807',
            'admin' => 1,
        ]);
    }
}

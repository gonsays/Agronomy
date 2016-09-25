<?php

use App\Bid;
use App\Auction;
use App\User;
use Illuminate\Database\Seeder;

class BidsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<40;$i++){
            Bid::create(array(
               'auction_id' => Auction::inRandomOrder()->first()->id,
                'bidder_id' => User::inRandomOrder()->first()->id,
               'amount' => rand(3000,30000),
               'quantity' => rand(10,40),
               'status' => "Open",
            ));
        }
    }
}

<?php

use App\Auction;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AuctionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();


        for($i=0; $i<20; $i++){
            $date = (new Carbon())->addDays(rand(10,30))->toDateString();

            $data = [
                "base_price" => rand(1000,20000),
                "location" => $faker->address,
                "status" => "Open",
                "variety_id" => rand(1,20),
                "seller_id"=> rand(1,20),
                "bidding_end"=> $date,
                "quantity"=> rand(10,30),
                "description"=> $faker->text(300)
            ];

            Auction::create($data);
        }

    }
}

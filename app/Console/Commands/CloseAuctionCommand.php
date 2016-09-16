<?php

namespace App\Console\Commands;

use App\Auction;
use DateTime;
use Illuminate\Console\Command;

class CloseAuctionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auctions-end';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ends all auctions if bidding date met';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $date = new DateTime();
        $formatted_date = $date->format('Y-m-d');
        $auctions = Auction::where('bidding_end','<=',$formatted_date);
        $auctions->update(['status'=>'Closed']);

        foreach ($auctions as $auction){
            $bid = $auction->bids->sortByDesc('amount')->first();

            if($bid != null){
                $bid->status = "Won";
                $bid->save();
            }
        }
        //todo generate notifications
    }
}

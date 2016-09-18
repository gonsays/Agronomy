<?php

namespace App\Console\Commands;

use App\Auction;
use DateTime;
use Illuminate\Console\Command;
use Mail;

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

    //todo complete send email part
    public function handle()
    {
        $date = new DateTime();
        $formatted_date = $date->format('Y-m-d');
        $auctions = Auction::where('bidding_end','<=',$formatted_date);
        $auctions->update(['status'=>'Closed']);

        foreach ($auctions as $auction){
            $bids = $auction->bids->sortByDesc('amount');
            $winningBid = $bids->first();

            if($winningBid != null){
                $winningBid->status = "Won";
                $winningBid->save();
                $this->sendWinningMail($winningBid);
            }

            $this->sendConsolationMail($bids);
        }


    }

    private function sendWinningMail($winningBid)
    {
        $data = [
            'bid' => $winningBid,
            'bidder' => $winningBid->bidder,
            'auction' => $winningBid->auction,
            'variety' => $winningBid->auction->variety,
            'product' => $winningBid->auction->variety->product
        ];

        $email = $winningBid->bidder->email;

        Mail::send('emails.bid_win', $data, function ($message) use ($email) {
            $message->from('support@agronomy.com', 'Agronomy');
            $message->to($email)->subject('You have won the Bid');
        });
    }

    private function sendConsolationMail($bids)
    {

        $bidders = $bids->bidder->unique('email');
        $temp = $bids->first();

        $data = [
            'variety' => $temp->auction->variety,
            'product' => $temp->auction->variety->product
        ];

        foreach($bidders as $bidder){
            $data->bidder = $bidder;

            Mail::send('emails.bid_win', $data, function ($message) use ($bidder) {
                $message->from('support@agronomy.com', 'Agronomy');
                $message->to($bidder->email)->subject('You have won the Bid');
            });
        }

    }
}

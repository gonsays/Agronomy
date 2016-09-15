<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{

    public function bidder(){
        return $this->belongsTo('App\User');
    }

    public function auction(){
        return $this->belongsTo('App\Auction');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Auction extends Model
{
    protected $guarded = [''];

    public function variety(){
        return $this->belongsTo('App\Variety');
    }
    
    public function seller(){
        return $this->belongsTo('App\User');
    }

    public function bids(){
        return $this->hasMany('App\Bid');
    }

    public function hasEnded(){
        if($this->status == "Open")
            return false;
        else if($this->status == "Closed")
            return true;
    }
}

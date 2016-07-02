<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function auctions(){
        return $this->hasMany('App\Auction');
    }
    
    public function varieties(){
        return $this->hasMany('App\Variety');
    }
}

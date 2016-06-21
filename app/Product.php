<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function auction(){
        return $this->hasMany('App\Auction');
    }
}

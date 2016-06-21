<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Auction extends Model
{
    protected $guarded = [''];

    public function product(){
        return $this->belongsTo('App\Product');
    }
    
    public function seller(){
        return $this->belongsTo('App\User');
    }
}

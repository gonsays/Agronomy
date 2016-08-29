<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{

    public function seller(){
        return $this->belongsTo('App\User');
    }
}

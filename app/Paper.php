<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    //Paper Prices
    public function paperPrices()
    {
        return $this->hasMany('App\PaperPrice');
    }

    //GSM
    public function gsm()
    {
        return $this->belongsTo('App\Gsm');
    }
}

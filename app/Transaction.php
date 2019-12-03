<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Transaction extends Model
{
    //
    public function payment(){
        return $this->hasOne('App\Payment');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}

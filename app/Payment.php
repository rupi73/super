<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable=['amount','user_id','type','gateway','transaction_id','gateway_transaction_id','note'];

    public function transaction(){
        return $this->belongsTo('App\Transacts');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}

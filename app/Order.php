<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable=['franchise_id','client_id','amount','margin','tax','grossTotal'];
        //Order Products
        public function products(){
            return $this->hasMany('App\OrderProduct');
                }//function
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
      protected $fillable=['franchise_id','client_id','amount','margin','tax','grossTotal','billedAmount','paid','status'];
        //Order Products
        public function products(){
            return $this->hasMany('App\OrderProduct');
        }//function
        public function client(){
            return $this->belongsTo('App\Client');
        }//function
        public function franchise(){
            return $this->belongsTo('App\User');
        }//function

    public function canBuy($user,$order): bool
    {
        /**
         * If the service can be purchased once, then
         *  return !$customer->paid($this);
         */
        return true; 
    }

    

    public function getUniqueId(): string
    {
        return (string)$this->getKey();
    }
    
    public function getAmountOrder(): int
    {
        return 100;
    }    
}

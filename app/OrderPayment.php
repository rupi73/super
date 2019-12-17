<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderPayment extends Model
{
    //
    protected $fillable=['order_id','paidAmount','transaction_details','payment_method'];
    
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    //
    protected $fillable = ['category_id','product_id','order_id','description','price','tax','taxp','treatments','quantity_id','paper_id','size_id','totalPrice'];
    //Order
    public function order(){
return $this->belongsTo('App\Order');
    }//function
    public function treatments(){
        return $this->belongsToMany('App\OrderProductTreatment','order_product_treatments','order_product_id','treatment_id');  
    }//function
}

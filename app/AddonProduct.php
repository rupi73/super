<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AddonProduct;
class AddonProduct extends Model
{
    //
    protected $fillable=[
        'franchise_id','name','price','gst'

    ];

    public function franchise(){
        return $this->belongsTo('App\User','franchise_id');
    }
}

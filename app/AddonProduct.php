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
}

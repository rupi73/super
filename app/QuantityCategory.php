<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuantityCategory extends Model
{
         //category
 public function category()
 {
   return $this->belongsTo('App\Category');
 }
}

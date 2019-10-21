<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quantity extends Model
{
    //category
    public function categories()
  {
    return $this->belongsToMany('App\Category','quantity_categories');
  }
}

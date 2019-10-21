<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{

 //size category
 public function categories()
  {
    return $this->belongsToMany('App\Category','size_categories');
  }
}

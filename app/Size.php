<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
protected $fillable = ['label','value'];
 //size category
 public function categories()
  {
    return $this->belongsToMany('App\Category','size_categories');
  }
}

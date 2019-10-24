<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quantity extends Model
{
  protected $fillable = ['label','value'];
    //category
    public function categories()
  {
    return $this->belongsToMany('App\Category','quantity_categories');
  }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //quantity
    public function quantities()
    {
      return $this->hasMany('App\Quantity');
    }

    //size
    public function sizes()
    {
      return $this->hasMany('App\Size');
    }
}

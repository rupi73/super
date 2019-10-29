<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //papers
    public function papers(){
return $this->belongsToMany('App\Paper');
    }

    //quantities
    public function quantities(){
return $this->belongsToMany('App\Quantity');
    }

    //sizes
    public function sizes(){
return $this->belongsToMany('App\Size');
    }
}

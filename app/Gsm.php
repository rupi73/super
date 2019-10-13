<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gsm extends Model
{
    //paper
    public function papers()
    {
      return $this->hasMany('App\Paper');
    }
}

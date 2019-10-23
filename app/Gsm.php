<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gsm extends Model
{
  protected $fillable=['label','value'];
    //paper
    public function papers()
    {
      return $this->hasMany('App\Paper');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TreatmentPrice extends Model
{
     //treatment
 public function treatment()
 {
   return $this->belongsTo('App\Treatment');
 }//function
      //category
  public function category()
  {
    return $this->belongsTo('App\Category');
  }//function
}//class

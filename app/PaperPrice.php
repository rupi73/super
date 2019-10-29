<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaperPrice extends Model
{
    //paper
    public function paper(){
        return $this->belongsTo('App\Paper');
    }
    //category
    public function category(){
        return $this->belongsTo('App\Category');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaperPrice extends Model
{
    //paper
    public function paper(){
        return $this->belongsTo('App\Paper');
    }
}

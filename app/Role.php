<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable = ['name','description'];

    public function users(){
     return   $this->belongsToMany('App\User')->withTimeStamps();
    }

    public function margins(){
        return $this->hasOne('App\CategoryMargin');
    }

}

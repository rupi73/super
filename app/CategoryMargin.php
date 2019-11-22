<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CategoryMargin;
class CategoryMargin extends Model
{
    //
    protected $fillable=[
        'category_id','role_id','franchise_id','marginp'

    ];


    //category
    public function category(){
        return $this->belongsTo('App\Category');
    }

    //role
    public function role(){
        return $this->belongsTo('App\Role');
    }

    //franchise
    public function franchise(){
        return $this->belongsTo('App\User','franchise_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    //
    protected $fillable=['franchise_id','client_id','estimate'];
//clients
    public function client(){
        return $this->belongsTo('App\Client');
    }
//users
public function franchise(){
    return $this->belongsTo('App\User','franchise_id');
}

public function getEstimateAttribute($value) {
    return json_decode($value);
}

}//class

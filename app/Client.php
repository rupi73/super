<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Client;
class Client extends Model
{
    //
    protected $fillable=[
        'name','email','mobile','city','state','country','franchise_id'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $fillable = ['name','settings'];
    //Treament Categories
    public function categories(){
     return   $this->belongsToMany('App\Category','treatment_prices');
    }

        //Treatment Prices
        public function treatmentPrices()
        {
            return $this->hasMany('App\TreatmentPrice');
        }

            //papers
    public function papers(){
        return $this->belongsToMany('App\Paper');
        }
}

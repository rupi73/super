<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $fillable=['name','is_size_price'];
    //quantity
    public function quantities()
    {
      return $this->belongsToMany('App\Quantity','quantity_categories');
    }

    //size
    public function sizes()
    {
      return $this->belongsToMany('App\Size','size_categories');
    }

        //papers
    public function papers()
    {
      return $this->hasMany('App\PaperPrice');
    }

            //products
    public function products()
    {
      return $this->hasMany('App\Product');
    }
}

<?php
use Illuminate\Support\Facades\DB;
if (! function_exists('calculate_tax')) {
    function calculate_tax($rate, $tax)
    {
        return ($rate * $tax)/100;        
    }
}

if (! function_exists('get_field_value')) {
    function get_field_value($model, $field,$where)
    {
      $record =  $model::where($where)->first();
return $record->{$field};
    }
}

if (! function_exists('get_field_value_raw')) {
    function get_field_value_raw($model, $field,$where)
    {
      $record =  $model::whereRaw($where)->      
      first();
return $record->{$field};
    }
}
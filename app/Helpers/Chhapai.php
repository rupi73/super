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

if (! function_exists('get_franchise_margin_category')) {
    function get_franchise_margin_category($category_id, $franchise_id)
    {
        $franchise=App\User::with(['roles'=>function($query){
            $query->whereIn('roles.id',[3,4,5]);
        }])->find($franchise_id);
        if($franchise){
            list($role) = $franchise->roles;
            $margin = App\CategoryMargin::where(['category_id'=>$category_id,'role_id'=>$role->id])->first();
        }
        return $margin->marginp;
      /* $record =  $model::whereRaw($where)->      
      first();
return $record->{$field}; */
    }
}
<?php
use Illuminate\Support\Facades\DB;
if (! function_exists('currency_calc')) {
    function currency_calc($amount)
    {
        return '₹'.$amount;        
    }
}
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

if (! function_exists('get_html_description_order')) {
    function get_html_description_order($description)
    {
        $description=json_decode($description,true);
        $show=['paper','treatments','size','printing','addOns'];
       print '<table>';
      foreach($description as $k=>$v){
          if(!in_array($k,$show))
          continue;
          print '<tr>';
print '<td>'.ucwords($k).'</td>'.
        '<td>'.(is_array($v)?array_inline_list($v):$v).'</td>';
      print '</tr>';  
      }
      print '</table>';  
    }
}

if (! function_exists('get_html_description_quotes')) {
    function get_html_description_quotes($description)
    {
        $description=(Array) $description;
        
        $show=['paper','treatments','size','printing','addOns'];
       print '<table>';
      foreach($description as $k=>$v){
          if(!in_array($k,$show))
          continue;
          if(is_object($v))
          $v=(Array) $v;
      print '<tr>';
print '<td>'.ucwords($k).'</td>'.
        '<td>'.(is_array($v)?array_inline_list($v):$v).'</td>';
      print '</tr>';  
      }
      print '</table>';  
    }
}

if (! function_exists('get_quantities_price_quotes')) {
    function get_quantities_price_quotes($description)
    {
        $ret ='';
        foreach($description->quantities as $quantity){
            $price = $description->prices->{$quantity};
            $ppc = number_format($price/$quantity,2);
$ret.= "<b>$quantity x $ppc =</b>".currency_calc($price).'<br/>';
        }
        
  return $ret;
    }
}

if (! function_exists('array_inline_list')) {
    function array_inline_list($array)
    {
        if(empty($array))
        return '';
$ret ='<div  class="container">
<ul class="list-inline">';
foreach($array as $k=>$v){
    if(is_object($v))
    $v = (Array)$v;
$ret.='<li class="list-inline-item">'.ucwords(str_replace('_',' ',$k)).':'.(is_array($v)?json_encode($v):$v).'</li>';

}

$ret .='</ul>
</div>';
return $ret;
    }
}
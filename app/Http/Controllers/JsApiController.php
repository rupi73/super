<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paper;
use App\Category;
use App\Quantity;
use App\Size;
use App\PaperPrice;
class JsApiController extends Controller
{
    //
public function papers(REQUEST $request){
$papers = Paper::with(['paperPrices'=>function($query) use ($request) {
    $query->where('paper_prices.category_id', $request->cat);
}])->where('name', 'like', '%' . $request->q . '%')->orderBy('name','asc')->get();
return $papers;
    }
public function categories(){
    $categories = Category::with(['quantities','sizes'])->orderBy('name','asc')->get();
        return $categories;
 }
 public function sizesQnties(REQUEST $request){
    print $request->q;
     //fetch quantities
     $category = Category::with(['quantities','sizes'])->find($request->q);
     return $category;

 }

 public function savePaperPrices(REQUEST $request){
    //print json_encode(['success'=>true]);die();
    $pp = PaperPrice::where('category_id',$request->category)->where('paper_id',$request->paper)->first();
    if(!$pp){
         $pp = new PaperPrice;
        $pp->category_id=$request->category;
        $pp->paper_id=$request->paper;
        $pp->quantity_prices=json_encode($request->qp);
        $pp->settings=json_encode(['nosettings'=>1]);
       

    }
    else
    {
$pp->quantity_prices = json_encode($request->qp);

    }
    if($pp->save())
    print json_encode(['success'=>true]);
    else
    print json_encode(['success'=>false]);    

 }
}//class

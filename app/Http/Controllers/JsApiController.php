<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paper;
use App\Category;
use App\Quantity;
use App\Size;
use App\PaperPrice;
use App\Treatment;
use App\TreatmentPrice;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class JsApiController extends Controller
{
    //
public function papers(REQUEST $request){
$papers = Paper::with(['paperPrices'=>function($query) use ($request) {
    $query->where('paper_prices.category_id', $request->cat);
}])->where('name', 'like', '%' . $request->q . '%')->orderBy('name','asc')->get();
$json = Cache::get('category-'.$request->cat.'-json',[]);
if(!empty($json))
Storage::disk('local')->put('category-'.$request->cat.'.json', $json);
return $papers;
    }
public function categories(){
    $categories = Category::with(['quantities','sizes'])->orderBy('name','asc')->get();
        return $categories;
 }
 public function sizesQnties(REQUEST $request){
      //fetch quantities
     $category = Category::with(['quantities','sizes'])->find($request->q);
     return $category;

 }
 public function sizesPapers(REQUEST $request){
    //fetch sizes
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
        $pp->settings=json_encode($request->settings);
       

    }
    else
    {
$pp->quantity_prices = json_encode($request->qp);
$pp->settings=json_encode($request->settings);
    }
    if($pp->save()){
        $paper = Paper::findOrFail($pp->paper_id);
        $paper->treatments()->sync($request->settings['treatments']);
        $this->createPaperJson($pp);
    print json_encode(['success'=>true]);

    }
    else
    print json_encode(['success'=>false]);    

 }//function

 public function treatments(Request $request){
    $treatments = Treatment::with(['treatmentPrices'=>function($query) use ($request){
        $query->where('treatment_prices.category_id', $request->cat);
    }])->where('name', 'like', '%' . $request->q . '%')->orderBy('name','asc')->get();
    return $treatments;
 }//function

 public function catQnties(Request $request){
    $category = Category::with(['quantities'])->where('id', $request->cat )->first();
    return $category->quantities;
 }//function

 public function saveTreatmentPrices(REQUEST $request){
    //print json_encode(['success'=>true]);die();
    $tp = TreatmentPrice::where('category_id',$request->category)->where('treatment_id',$request->treatment)->first();
    if(!$tp){
         $tp = new TreatmentPrice;
        $tp->category_id=$request->category;
        $tp->treatment_id=$request->treatment;
        $tp->quantity_prices=json_encode($request->qp);
        $tp->settings=json_encode(['nosettings'=>1]);      

    }
    else
    {
$tp->quantity_prices = json_encode($request->qp);

    }
    if($tp->save()){
    $this->createTreatmentJson($tp);    
    print json_encode(['success'=>true]);
    }
    else
    print json_encode(['success'=>false]);    

 }//function

public function createPaperJson($pp){
     //get json from cache or if not exists create blanked array
    $json = Cache::get('category-'.$pp->category_id.'-json',[]);
 if (!empty($json))
    $json = json_decode($json,True); 
    //check for if paper key exists
if(!isset($json['paper']))
$json['paper']=[];
//check if opts key exist
if(!isset($json['paper']['opts']))
$json['paper']['opts']=[];
$json['paper']['opts'][$pp->paper->name] = $pp->paper->name;
$qps = json_decode($pp->quantity_prices,true);
if(!$pp->category->price_frontback_printing)
$json['paper'][$pp->paper->name]=$qps['single'];
else
$json['paper'][$pp->paper->name]=$qps;
foreach($pp->paper->treatments as $treatment)
$json['paper'][$pp->paper->name]['treatments'][] = $treatment->name;
Cache::forever('category-'.$pp->category_id.'-json',json_encode($json));
}//function

public function createTreatmentJson($tp){
    $json = Cache::get('category-'.$tp->category_id.'-json',[]);
    if (!empty($json))
    $json = json_decode($json,True);
     //check for if treatments key exists
    if(!isset($json['treatments']))
    $json['treatments']=[];
    if(!isset($json['treatments'][$tp->treatment->name]))
    $json['treatments'][$tp->treatment->name]=[];
    if(!isset($json['treatments'][$tp->treatment->name]['opts']))
    $json['treatments'][$tp->treatment->name]['opts']=[];
    $settings = json_decode($tp->treatment->settings,true);
    if(isset($settings['colors'])){
       $colors = explode(',',$settings['colors']); 
       foreach($colors as $color){
        $json['treatments'][$tp->treatment->name]['opts']['colors'][$color]=$color; 
       }
       $json['treatments'][$tp->treatment->name]['opts']['sides'] = $settings['sides'];

    }
    elseif($settings['sides']=='single')
    $json['treatments'][$tp->treatment->name]['opts']['single']='Single Side';
    elseif($settings['sides']=='both'){
        $json['treatments'][$tp->treatment->name]['opts']['single']='Single Side';
        $json['treatments'][$tp->treatment->name]['opts']['both']='Both Sides';
    }
    $qps = json_decode($tp->quantity_prices,true);
    $json['treatments'][$tp->treatment->name]=array_merge($json['treatments'][$tp->treatment->name],$qps);
    Cache::forever('category-'.$tp->category_id.'-json',json_encode($json));
}//function
}//class

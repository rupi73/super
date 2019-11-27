<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // go to the model and get a group of records
        $categories = Category::orderBy('id','desc')->paginate(2);

        return view('category.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        abort_if(\Gate::denies('super',Category::class),403);
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      abort_if(\Gate::denies('super',Category::class),403);
       // validate the form data
      $this->validate($request, [
        'name' => 'required|max:255|unique:categories'
      ]);
      // process the data and submit it
    $category = new Category();
    $category->name = $request->name;
    $category->is_size_price = $request->is_size_price?1:0;
    
        //redirect to category listing
      // if successful we want to redirect
      if ($category->save()) {
        return redirect()->route('category.index');
      } else {
        return redirect()->route('category.create');
      }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        return view('category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        abort_if(\Gate::denies('super',$category),403);
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
      abort_if(\Gate::denies('super',$category),403);
        $category->update(['name'=>$request->name,'is_size_price'=>isset($request->is_size_price)?1:0]);
        return redirect()->route('category.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
      abort_if(\Gate::denies('super',$category),403);
        //
        //$category->delete();
        return redirect()->route('category.index');
    }//function

    public function createJson(Category $category){
      abort_if(\Gate::denies('super',$category),403);
      $json = [];//Cache::get('category-'.$category->id.'-json',[]);
      if (!empty($json))
      $json = json_decode($json,True);
      //create papers json
      if(!isset($json['paper']))
      $json['paper']=[];
      if(!isset($json['paper']['opts']))
      $json['paper']['opts']=[];
      foreach($category->papers as $pp)
      {
        $json['paper']['opts'][$pp->paper->name] = $pp->paper->name;
        $json['paper'][$pp->paper->name]=[];
        $qps = json_decode($pp->quantity_prices,true);
        if(!$pp->category->price_frontback_printing)
        $json['paper'][$pp->paper->name]['single']=$qps['single'];
        else
        $json['paper'][$pp->paper->name]=$qps;
        foreach($pp->paper->treatments as $treatment){
        $json['paper'][$pp->paper->name]['treatments'][] = str_slug($treatment->name,'_');

        }

      }
      //create treatments Json
      if(!isset($json['treatments']))
      $json['treatments']=[];
      foreach($category->treatments as $tp)
      {
        $tp->treatment->name=str_slug($tp->treatment->name,'_');        
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
       $json['treatments'][$tp->treatment->name]['opts']['single']='Yes';
       elseif($settings['sides']=='both'){
           $json['treatments'][$tp->treatment->name]['opts']['single']='Single Side';
           $json['treatments'][$tp->treatment->name]['opts']['both']='Both Sides';
       }
       $qps = json_decode($tp->quantity_prices,true);
       $json['treatments'][$tp->treatment->name]=array_merge($json['treatments'][$tp->treatment->name],$qps);

      }
      //create products json
      if(!isset($json['products']))
      $json['products']=[];
      foreach($category->products as $product){
        $attributes = json_decode($product->attributes);
        $json['products'][$product->id]=[
          'wp_id'=>$product->wp_product_id,
          'name'=>$product->name,
          'quantities'=>['opts'=>$this->mapQuantities($product->quantities),'selected'=>$attributes->selected->quantity??''],
          'papers'=>['opts'=>$product->papers->map(function($paper){return $paper->name;}),'selected'=>$attributes->selected->paper??''],
          'sizes'=>['opts'=>$this->mapSizes($product->sizes),'selected'=>$attributes->selected->size??''],
          'printing'=>$attributes->selected->printing??''
          
      ];
      }
      if(!empty($json)){
        Cache::forever('category-'.$category->id.'-json',json_encode($json));
        Storage::disk('local')->put('category-'.$category->id.'.json', json_encode($json));
        
        }

    }//function
    public function mapQuantities($quantities){
      $array=[];
      foreach($quantities as $qty){
          $array[$qty->value]=$qty->label;
      }
      return $array;
      }//function
      public function mapSizes($sizes){
          $array=[];
          foreach($sizes as $size){
              $array[$size->value]=$size->label;
          }
          return $array;
          }//function
      public function mapPapers($papers){
              $array=[];
              foreach($papers as $paper){
                  $array[$paper->name]=$paper->name;
              }
              return $array;
          }//function

      public function jsonTreatmentName($treat){
        $treat=strtolower($treat);
        $treat=str_replace(' ','',$treat);
        return $treat;
      }
}//class

<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Cache;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::orderBy('name')->paginate('10');
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(\Gate::denies('super',Product::class),403);
       // $categories = Category::orderBy('name','asc')->pluck('name','id');
        $categories = Category::with('sizes','quantities','papers','papers.paper:id,name')->orderBy('name','asc')->get();
        //dd($categories);
        return view('products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        abort_if(\Gate::denies('super',Product::class),403);
       // dd(request()->all());
        $this->validate($request,[
        'name'=>'required|min:3|unique:products',
        'wp_product_id'=>'required|unique:products',
        'category_id'=>'required',
        'sizes'=>'required',
        'quantities'=>'required',
        'papers'=>'required',
        'price'=>'required|integer',
        'attributes'=>'required|array'
        ]);
        //dd(request()->all());
        $product= new Product;
        $product->name = request('name');
        $product->wp_product_id = request('wp_product_id');
        $product->category_id = request('category_id');
        $product->attributes = json_encode(request('attributes'));
        $product->save();
        $product->quantities()->attach(explode(',',request('quantities')));
        $product->sizes()->attach(explode(',',request('sizes')));
        $product->papers()->attach(explode(',',request('papers')));
        //Product::Create(request('name','category_id','price'));
      $this->createProductJson($product);
      return  redirect()->route('products.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        abort_if(\Gate::denies('super',$product),403);
        $categories = Category::with('sizes','quantities','papers','papers.paper:id,name')->orderBy('name','asc')->get();
        return view('products.edit',compact('categories','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product)
    {
        //
        abort_if(\Gate::denies('super',$product),403);
        $request = request();
        $this->validate($request,[
'name'=>['required', Rule::unique('products')->ignore($product->id)],
'wp_product_id'=>['required', Rule::unique('products')->ignore($product->id)],
'category_id'=>['required'],
'attributes'=>'required|array'
        ]);
        $attributes = json_encode(request('attributes'),JSON_HEX_QUOT|JSON_HEX_APOS);
        //$attributes = str_replace("\u0022", "\\\"", $attributes );
//$attributes = str_replace("\u0027", "\\'",  $attributes );
        $product->update(request(['name','wp_product_id','category_id'])+['attributes'=>$attributes]);
        /* $product->papers()->detach();
        $product->papers()->attach(explode(',',request('papers'))); */
        $product->papers()->sync(explode(',',request('papers')));
       /* $product->quantities()->detach();
        $product->quantities()->attach(explode(',',request('quantities'))); */
        $product->quantities()->sync(explode(',',request('quantities')));
        /* $product->sizes()->detach();       
        $product->sizes()->attach(explode(',',request('sizes'))); */
        $product->sizes()->sync(explode(',',request('sizes')));
        $this->createProductJson($product);
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        abort_if(\Gate::denies('super',$product),403);
        //$product->delete();
        return back();
    }

        /**
     * Create a Json Cache for Product.
     * * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function createProductJson($product){
//get json from cache or if not exists create blanked array
$json = Cache::get('category-'.$product->category_id.'-json',[]);
if (!empty($json))
    $json = json_decode($json,True);
  //check for if products key exists
if(!isset($json['products']))
$json['products']=[];
if(!isset($json['products'][$product->id]))
$json['products'][$product->id]=[];
$attributes = json_decode($product->attributes);
$json['products'][$product->id]=[
    'wp_id'=>$product->wp_product_id,
    'name'=>$product->name,
    'quantities'=>['opts'=>$this->mapQuantities($product->quantities),'selected'=>$attributes->selected->quantity],
    'papers'=>['opts'=>$product->papers->map(function($paper){return $paper->name;}),'selected'=>$attributes->selected->paper],
    'sizes'=>['opts'=>$this->mapSizes($product->sizes),'selected'=>$attributes->selected->size],
    'printing'=>$attributes->selected->printing
    
];
Cache::forever('category-'.$product->category_id.'-json',json_encode($json));
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
}//class

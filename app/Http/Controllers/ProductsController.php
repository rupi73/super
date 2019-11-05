<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Validation\Rule;
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
        $this->validate($request,[
        'name'=>'required|min:10|unique:products',
        'wp_product_id'=>'required|unique:products',
        'category_id'=>'required',
        'sizes'=>'required',
        'quantities'=>'required',
        'papers'=>'required',
        'price'=>'required|integer'
        ]);
        //dd(request()->all());
        $product= new Product;
        $product->name = request('name');
        $product->wp_product_id = request('wp_product_id');
        $product->category_id = request('category_id');
        $product->save();
        $product->quantities()->attach(explode(',',request('quantities')));
        $product->sizes()->attach(explode(',',request('sizes')));
        $product->papers()->attach(explode(',',request('papers')));
        //Product::Create(request('name','category_id','price'));

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
'category_id'=>['required']
        ]);
        $product->update(request(['name','wp_product_id','category_id']));
        /* $product->papers()->detach();
        $product->papers()->attach(explode(',',request('papers'))); */
        $product->papers()->sync(explode(',',request('papers')));
       /* $product->quantities()->detach();
        $product->quantities()->attach(explode(',',request('quantities'))); */
        $product->quantities()->sync(explode(',',request('quantities')));
        /* $product->sizes()->detach();       
        $product->sizes()->attach(explode(',',request('sizes'))); */
        $product->sizes()->sync(explode(',',request('sizes')));
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
}

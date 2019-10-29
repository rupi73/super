<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;

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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $this->validate($request,[
        'name'=>'required|min:10|unique:products',
        'category_id'=>'required',
        'sizes'=>'required',
        'quantities'=>'required',
        'papers'=>'required',
        'price'=>'required|integer'
        ]);
        //dd(request()->all());
        $product= new Product;
        $product->name = request('name');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Quantity;
use App\QuantityCategory;

class QuantitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fetch quantities
        $quantities = Quantity::with('categories')->orderBy('id','desc')->paginate('5');

        return view('quantity.index')->with('quantities',$quantities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //fetch categories
$categories = Category::orderBy('name','asc')->get();
        return view('quantity.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate the data
        $this->validate($request,[
        'label'=>'required|max:32',
        'value'=>'required|max:16|unique:quantities',
        'categories'=>'required|array|min:1'
        ]);
        //loop the categories data for each record create
        $categories = $request->categories;
        
        $quantity = new Quantity;
        $quantity->label = $request->label;
        $quantity->value = $request->value;
        if($quantity->save()):
        foreach($categories as $category):
           if(!QuantityCategory::where('category_id',$category)->where('quantity_id',$quantity->id)->first()):
            $qc= new QuantityCategory;
            $qc->quantity_id = $quantity->id;
            $qc->category_id = $category;
            $qc->save();
           endif;
        endforeach;
        //redirect the page to listing
        return redirect()->route('quantity.index');
    endif;
    return redirect()->route('quantity.create');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

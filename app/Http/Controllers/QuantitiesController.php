<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Quantity;
use App\QuantityCategory;

class QuantitiesController extends Controller
{
   
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fetch quantities
        $quantities = Quantity::with('categories')->orderBy('id','desc')->paginate('10');

        return view('quantity.index')->with('quantities',$quantities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('super',\App\Quantity::class);
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
        $this->authorize('super',\App\Quantity::class);
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
    public function show(Quantity $quantity)
    {
        //
        return view('quantity.show',compact('quantity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Quantity $quantity)
    {
        $this->authorize('super',$quantity);
        $categories = Category::orderBy('name','asc')->get();
        $current_categories =[];        
        foreach($quantity->categories as $scat)
        $current_categories[] = $scat->id;
        
        return view('quantity.edit',compact('categories','current_categories','quantity'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Quantity $quantity)
    {
        $this->authorize('super',$quantity);
        //quantity record update
        $quantity->update(request(['label','value']));
        /*$quantity->categories()->detach();
        $quantity->categories()->attach(request('categories'));*/
        $quantity->categories()->sync(request('categories'));
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quantity $quantity)
    {
        $this->authorize('super',$quantity);
        //$quantity->delete();
        return back();
    }
}

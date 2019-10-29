<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Size;
use App\SizeCategory;

class SizesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fetch sizes
        $sizes = Size::with(['categories'])->orderBy('id','desc')->paginate('5');

        return view('size.index')->with('sizes',$sizes);
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
return view('size.create')->with('categories',$categories);
       
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
            'value'=>'required|max:16|unique:sizes',
            'categories'=>'required|array|min:1'
            ]);
            //loop the categories data for each record create
           
            $size = new Size;
            $size->label = $request->label;
            $size->value = $request->value;
            if($size->save()):
            $categories = $request->categories;
            foreach($categories as $category):
               if(!SizeCategory::where('category_id',$category)->where('size_id',$size->id)->first()):
                $sc = new SizeCategory;
                $sc->size_id = $size->id;
                $sc->category_id = $category;
                $sc->save();
                endif;
            endforeach;
            //redirect the page to listing
            return redirect()->route('sizes.index');
            endif;
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(size $size)
    {
        //
        return view('size.show',compact('size'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
        $categories = Category::orderBy('name','asc')->get();
        $current_categories = [];
        foreach($size->categories as $category)
        $current_categories[]=$category->id;
        return view('size.edit',compact('categories','current_categories','size'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Size $size)
    {
        $size->update(request(['label','value']));
        $size->categories()->detach();
        $size->categories()->attach(request('categories'));
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
        //$size->delete();
        return back();
    }
}

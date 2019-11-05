<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

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
    }
}

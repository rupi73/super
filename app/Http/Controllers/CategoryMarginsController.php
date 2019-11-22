<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Role;
use App\CategoryMargin;

class CategoryMarginsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $catmargins=CategoryMargin::latest()->paginate(10);

        return view('categorymargin.index',compact('catmargins'))
        ->with('i',(request()->input('page',1) -1) *10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::orderBy('name')->get();
        $roles = Role::with('users')->whereIn('id',[3,4,5])->get();
        return view('categorymargin.create',compact('roles','categories'));
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
 $validate =      $this->validate($request,[
'category_id'=>'required|numeric',
'role_id'=>'required_without:franchise_id|numeric',
'franchise_id'=>'required_without:role_id|numeric',
'marginp'=>'required|numeric'

        ]);
        CategoryMargin::create($validate);
        return redirect()->route('catmargins.index');
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

        $catmargin=CategoryMargin::findorfail($id);
        return view('categorymargin.show',compact('catmargin'));
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

       
        $catmargin=CategoryMargin::findorfail($id);
        return view('categorymargin.edit',compact('catmargin'));
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

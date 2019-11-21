<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddonProduct;
class AddonproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $data=AddonProduct::latest()->paginate(5);
        return view('addon_products.index',compact('data'))
        ->with('i',(request()->input('page',1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('addon_products.create');
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


        $data =  $this->validate($request,[
            'franchise_id' =>'required',
            'name'=>'required|min:3',
            'price'=>'required',
            'gst'=>'required',
            
            ]);
        AddonProduct::create($data);
        return redirect()->route('addon_products.index');


       

       
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
        $addon_products=AddonProduct::findorfail($id);
        return view('addon_products.show',compact('addon_products'));
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

        $addon_products=AddonProduct::findorfail($id);
        return view('addon_products.edit',compact('addon_products'));
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
        $addon_products=AddonProduct::find($id);
        $addon_products->franchise_id = request('franchise_id');
        $addon_products->name = request('name');

        $addon_products->price = request('price');
        $addon_products->gst = request('gst');
       

        $addon_products->save();

        return redirect()->route('addon_products.index');
        
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

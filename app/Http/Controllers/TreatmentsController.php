<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Treatment;

class TreatmentsController extends Controller
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
        //fetch treatments
        $treatments = Treatment::orderBy('name','asc')->paginate(10);
        return view('treatments.index',compact('treatments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('treatments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request,[
            'name'=>'required|max:191|unique:treatments',
            'sides'=>'required'
        ]);

        $treatment = new Treatment;
        $treatment->name = $request->name;
        $treatment->slug = str_slug($request->name);
        $settings = ['sides'=>$request->sides];
        if(strlen(trim($request->colors)))
        $settings['colors']=$request->colors;
        $treatment->settings = json_encode($settings);
        if($treatment->save())
        return redirect()->route('treatments.index');

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
        return view('treatments.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Treatment $treatment)
    {
        //
        $treatment->settings = json_decode($treatment->settings);
        return view('treatments.edit',compact('treatment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Treatment $treatment)
    {
        $request=['name'=>request('name')];
        $settings = ['sides'=>request('sides')];
        if(strlen(trim(request('colors'))))
        $settings['colors']=request('colors');
        $request['settings'] = json_encode($settings);
        $treatment->update($request);
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Treatment $treatment)
    {
        //$treatment->delete();
        return back();
    }
}

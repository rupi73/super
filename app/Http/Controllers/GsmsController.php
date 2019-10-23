<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gsm;

class GsmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fetch the data
        $gsms = Gsm::orderBy('id','desc')->paginate('2');
        return view('gsm.index')->with('gsms',$gsms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('gsm.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the form data
        $this->validate($request,[
        'label'=>'required|max:64|unique:gsms',
        'value'=>'required|max:16|unique:gsms'
        ]); 
        $gsm = new Gsm();
        $gsm->label = $request->label;
        $gsm->value = $request->value;

        if($gsm->save())
            return redirect()->route('gsm.index');
        
        return redirect()->route('gsm.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Gsm $gsm)
    {
        //
        return view('gsm.show',compact('gsm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Gsm $gsm)
    {
        //
        return view('gsm.edit',compact('gsm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gsm $gsm)
    {
        //
        $gsm->update(request(['value','label']));
        return redirect()->route('gsm.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gsm $gsm)
    {
        //
//$gsm->delete();
return redirect()->route('gsm.index');
    }
}

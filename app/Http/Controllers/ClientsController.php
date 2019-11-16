<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $data=Client::latest()->paginate(5);

        return view('clients.index',compact('data'))
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
       return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    $data = [
    'franchise_id' => $request->franchise_id,
    'name' => $request->name,
    'email' => $request->email,
    'mobile' => $request->mobile,
    'city' => $request->city,
    'state' => $request->state,
    'country' => $request->country,

   
    
    ];



Client::create($data);
return redirect()->route('clients.index');

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
        $clients=client::findorfail($id);
        return view('clients.show',compact('clients'));
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
        $clients=Client::findorfail($id);
        return view('clients.edit',compact('clients'));
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

        $clients=Client::find($id);
        $clients->name = request('name');
        $clients->email = request('email');

        $clients->mobile = request('mobile');
        $clients->franchise_id = request('franchise_id');
        $clients->city = request('city');
        $clients->state = request('state');
        $clients->country = request('country');

        $clients->save();

        return redirect()->route('clients.index');
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Role;

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
       $clients=Client::latest()->paginate(10);

        return view('clients.index',compact('clients'))
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
$franchises = Role::with('users')->whereIn('id',[3,4,5])->get();


       return view('clients.create',compact('franchises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data =  $this->validate($request,[
        'franchise_id' =>'required|numeric',
        'name'=>'required|min:3',
        'email'=>'required|unique:clients,email',
        'mobile'=>'required|numeric|min:10',
        'city'=>'required|min:3',
        'state'=>'required|min:3',
        'country'=>'required|min:3'
        ]);
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

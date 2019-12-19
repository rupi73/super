<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Role;

class ClientsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(\Gate::allows('super',\App\Category::class))
       $clients=Client::with('franchise')->latest()->paginate(10);
       else
       $clients=Client::with('franchise')->where('franchise_id',auth()->id())->latest()->paginate(10);
       $_clients=[];
       if($clients->count()){
       foreach($clients as $client){
           $_clients[]=['name'=>$client->name,'email'=>$client->email,'franchise'=>$client->franchise->name,'mobile'=>$client->mobile,'city'=>$client->city,'state'=>$client->state,'country'=>$client->country,'id'=>$client->id];
       }
    }
    $_clients=json_encode($_clients);
        return view('clients.index',compact('clients','_clients'));
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
$franchise_id = auth()->id();

       return view('clients.create',compact('franchises','franchise_id'));
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
    public function show( Client $client)
    {
        abort_if(!is_owner_of($client,'franchise_id') && \Gate::denies('admin',\App\Category::class),403);
        return view('clients.show',compact('client'));
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
        $franchises = Role::with('users')->whereIn('id',[3,4,5])->get();
        $client=Client::findorfail($id);
        abort_if(!is_owner_of($client,'franchise_id') && \Gate::denies('admin',\App\Category::class),403);
        return view('clients.edit',compact('client','franchises'));
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

        $client=Client::find($id);
        abort_if(!is_owner_of($client,'franchise_id') && \Gate::denies('admin',\App\Category::class),403);
        $client->name = request('name');
        $client->email = request('email');

        $client->mobile = request('mobile');
        $client->franchise_id = request('franchise_id');
        $client->city = request('city');
        $client->state = request('state');
        $client->country = request('country');

        $client->save();

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

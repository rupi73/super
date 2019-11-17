<?php

namespace App\Http\Controllers;

use App\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Category;
use App\Client;
use App\Role;
class QuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $quotes = Quote::latest()->paginate(5);
        return view('quotes.index',compact('quotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
$categories = Category::with('products')->orderBy('name')->get();
if(\Gate::allows('super',Category::class)){
$clients = '';
$franchises = Role::with('users.clients')->whereIn('id',[3,4,5])->get();
$franchise_id='';
}
else{
$clients=Client::orderBy('name')->get();
$franchises=[];
$franchise_id=3;
}
$catJsons = [];
foreach($categories as $category){
$cache =Cache::get('category-'.$category->id.'-json',[]); 
if(!empty($cache))
$catJsons[$category->id]=json_decode($cache,true);
else
$catJsons[$category->id]=[];
}
$catJsons = json_encode($catJsons);
 return view('quotes.create',compact('categories','catJsons','clients','franchises','franchise_id'));
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
        $data = $this->validate($request,[
'franchise_id'=>'required|numeric',
'client_id'=>'required|numeric',
'estimate'=>'required'
        ]);
        $data['estimate'] = json_encode($request->estimate);
        Quote::create($data);
    return redirect()->route('quotes.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function show(Quote $quote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function edit(Quote $quote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quote $quote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quote $quote)
    {
        //
    }
}

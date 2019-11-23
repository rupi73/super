<?php

namespace App\Http\Controllers;

use App\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Category;
use App\Client;
use App\Role;
use App\AddOnProduct;
use App\Order;
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
    public function create($boolOrder=0,$recordId=0)
{
        //check if record is editable
        $record=[];
if($recordId){
    if($boolOrder){
    $row=Order::findOrFail($recordId);
    $quotes = [];
    $records=['franchise_id'=>$row->franchise_id,'client_id'=>$row->client_id];
    foreach($row->products as $product){
        $quotes[]=$product->description;
    }
    $records['quotes']=$quotes;
    //print_r($records['quotes']);die();
    }
    else{
    $row=Quote::findOrFail($recordId);
    $records=['franchise_id'=>$row->franchise_id,'client_id'=>$row->client_id,'quotes'=>$row->estimate];
    }

    
}
$categories = Category::with('products')->orderBy('name')->get();
$addOnProducts = AddOnProduct::where('franchise_id',3)->orderBy('name','ASC')->get();
if(\Gate::allows('super',Category::class)){
$clients = '';
$franchises = Role::with('users.clients')->whereIn('id',[3,4,5])->get();
$franchise_id=isset($row['franchise_id'])?$row['franchise_id']:'';
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
return view('quotes.create',compact('categories','catJsons','clients','franchises','franchise_id','boolOrder','addOnProducts','records'));
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
        print json_encode(['success'=>true]);
        
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

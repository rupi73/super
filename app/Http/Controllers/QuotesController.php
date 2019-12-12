<?php

namespace App\Http\Controllers;

use App\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Category;
use App\Client;
use App\Role;
use App\AddonProduct;
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
        $_quotes=[];
        foreach($quotes as $order){
            $_quotes[]=['date'=>$order->updated_at->format('d-m-Y'),'franchise'=>$quotes->franchise->name,'client'=>$quotes->client->name,
           
            'id'=>$quotes->id];
        }
        $_quotes=json_encode($_quotes);
        return view('quotes.index',compact('_quotes','quotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($boolOrder=0,$recordId=0)
{
        //check if record is editable
        $records=[];
if($recordId){
    if($boolOrder){
    $row=Order::findOrFail($recordId);
    $quotes = [];
    $records=['franchise_id'=>$row->franchise_id,'client_id'=>$row->client_id,'order_id'=>$recordId];
    foreach($row->products as $product){
        $quotes[]=$product->description;
    }
    $records['quotes']=$quotes;
    //print_r($records['quotes']);die();
    }
    else{
    $row=Quote::findOrFail($recordId);
    $records=['franchise_id'=>$row->franchise_id,'client_id'=>$row->client_id,'quotes'=>$row->estimate,'quote_id'=>$recordId];
    }

    //print_r($records['quotes']);die();
}
$categories = Category::with(['products','roleMargins'])->orderBy('name')->get();
$addOnProducts = AddonProduct::where('franchise_id',3)->orderBy('name','ASC')->get();
if(\Gate::allows('super',Category::class)){
$clients = '';
$franchises = Role::with('users.clients')->whereIn('id',[3,4,5])->get();
$franchise_id=isset($records['franchise_id'])?$records['franchise_id']:0;
$role_id=0;
}
else{
$user =request()->user();
foreach($user->roles as $role){
        $role_id = $role->id;
    }
$franchise_id=$user->id;
$role_id=$role_id;
$clients=Client::orderBy('name')->where('franchise_id',$franchise_id)->get();
$franchises=[];
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
return view('quotes.create',compact('categories','catJsons','clients','franchises','franchise_id','boolOrder','addOnProducts','records','role_id'));
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
        if(!$request->id)
        Quote::create($data);
        else{
            $quote = Quote::findOrFail($request->id);
            $quote->update($data);   
        }        
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
        return view('quotes.show',compact('quote'));
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

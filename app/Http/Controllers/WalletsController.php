<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Role;
use App\User;
use App\Transaction;
class WalletsController extends Controller
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
        $franchises = Role::with('users.clients')->whereIn('id',[3,4,5])->get();
        $balance = Transaction::sum('amount');
        foreach($franchises as $franchise){
            foreach($franchise->users as $user){
                //$user->withdraw(10);
               $deposited=Transaction::where('payable_id',$user->id)->where('type','deposit')->sum('amount');
               $withdrawal=Transaction::where('payable_id',$user->id)->where('type','withdraw')->sum('amount');

             $transactions[]=['name'=>$user->name,'deposited'=>$deposited,'withdrawal'=>$withdrawal,'balance'=>$user->balance,'franchise_id'=>$user->id];
            
        }
        }

        $transactions = json_encode($transactions);
        //print_r($transactions);die();
        
        return view('wallets.index',compact('transactions','balance'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $franchise_id = 0;
        if(\Gate::denies('super',Category::class))
        $franchise_id = auth()->id();
        $franchises = Role::with('users')->whereIn('id',[3,4,5])->get();
        return view('wallets.create',compact('franchises','franchise_id'));
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
        return view('wallets.show',compact('wallet'));
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

    /**
     * Razorpay Options
     */
    public function addPaymentRazor(Request $request){
      $this->validate($request,[
            'amount'=>'required|numeric',
            'user_id'=>'required|numeric'
        ]);
        
        
      $payment =  Payment::create($request->all());
        $user = User::findOrFail($request->user_id);
 // int(0)

$transaction = $user->deposit($request->amount);

$payment->update(['transaction_id'=>$transaction->id]);

 // int(10)
        print json_encode(['success'=>true]);
    }//function

    public function franchise($id){
        $id = $id?$id:auth()->id();
        $user = User::findOrFail($id);
        $balance = $user->balance;
        $transactions = [];
        foreach($user->transactions as $transaction){
            $row = Transaction::with('payment')->where('id',$transaction->id)->first();
            $transactions[] = ['date'=>$row->updated_at->format('d-m-Y'),'amount'=>$row->amount,'type'=>$row->type,'detail'=>$row->type=='deposit'?$row->payment->gateway.'/'.$row->payment->gateway_transaction_id:'','action'=>'']; 
        }

        $transactions = json_encode($transactions);
        //print_r($transactions);die();
        
        return view('wallets.franchise',compact('transactions','balance'));
    }
}

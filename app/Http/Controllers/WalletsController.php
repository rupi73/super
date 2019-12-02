<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Role;
use App\User;
class WalletsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        return view('wallets.create',compact('franchises'));
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
      $data =  $this->validate($request,[
            'amount'=>'required|numeric',
            'user_id'=>'required|numeric'
        ]);
        $data['gateway']='razorpay';
        $data['type'] = 'deposit';
        
      $payment =  Payment::create($data);
        $user = User::findOrFail($request->user_id);
 // int(0)

$transaction = $user->deposit($request->amount);

$payment->update(['transaction_id'=>$transaction->id]);

 // int(10)
        print json_encode(['success'=>true]);
    }
}

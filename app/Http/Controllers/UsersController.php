<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::orderBy('name','asc')
        ->paginate('10');
        return view('users.index',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(\Gate::denies('super',User::class),403);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(\Gate::denies('super',User::class),403);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        abort_if(\Gate::denies('super',User::class),403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        abort_if(\Gate::denies('super',$user),403);
        $roles = Role::orderBy('name','asc')->get();
        $uRoles = [];
        foreach($user->roles as $role)
        $uRoles[]=$role->id;
        return view('users.edit',compact('user','roles','uRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        //
        abort_if(\Gate::denies('super',$user),403);
        $request = request();
        $user->update($this->validate(
            $request,[
             'name'=>'required|string|max:255',
             'email'=>['required',Rule::unique('users')->ignore($user->id)],
             'role_id'=>'required|array|min:1',
             'role_id.*'=>'required|min:1'   
            ]
        ));
        $user->roles()->sync($request->role_id);
        if(strlen($request->password)){
            $this->validate(
                $request,[
                    'password' => 'required|string|min:6|confirmed'  
                ]
                ); 
                $user->update([
                    'password' => Hash::make($request->password)   
                ]);     
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        abort_if(\Gate::denies('super',$user),403);
    }
}

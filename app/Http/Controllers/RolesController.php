<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RolesController extends Controller
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
        //
        $roles= Role::orderBy('name')->paginate('10');
        return view('auth.index-roles',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        abort_if(\Gate::denies('super',Role::class),403);
        return view('auth.create-role');
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
        abort_if(\Gate::denies('super',Role::class),403);
        Role::Create($this->validate($request,[
        'name'=>'required|unique:roles',
        'description'=>'required'  
        ]));
       /*  $this->validate($request,[
'name'=>'required|unique:roles'
        ]);
        $role=new Role;
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save(); */
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        abort_if(\Gate::denies('super',$role),403);
        return view('auth.edit-roles',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Role $role)
    {
        //
        abort_if(\Gate::denies('super',$role),403);
        $request = request();    
$role->update($this->validate($request,[
    
    'name'=>['required',Rule::unique('roles')->ignore($role->id)],
    'description'=>'required'
]));
       return back(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        abort_if(\Gate::denies('super',$role),403);
        //$role->delete();

        return back();
    }
}

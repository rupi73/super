<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class superAdminPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function super(User $user){
      foreach($user->roles as $role){
    if(strtolower($role->name)=='super')
    return true;
        } 
        return false;
    }
}

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
    if(strtolower($role->id)==1)
    return true;
        } 
        return false;
    }

    public function admin(User $user){
        foreach($user->roles as $role){
      if(in_array(strtolower($role->id),[1,2]))
      return true;
          } 
          return false;
      }

      public function aofranchise(User $user){
        foreach($user->roles as $role){
      if(in_array(strtolower($role->id),[1,2,3]))
      return true;
          } 
          return false;
      }

      public function tfranchise(User $user){
        foreach($user->roles as $role){
      if(in_array(strtolower($role->id),[1,2,4]))
      return true;
          } 
          return false;
      }

      public function mfranchise(User $user){
        foreach($user->roles as $role){
      if(in_array(strtolower($role->id),[1,2,5]))
      return true;
          } 
          return false;
      }
}

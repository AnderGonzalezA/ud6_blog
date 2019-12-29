<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class AdminController extends Controller
{
  public function __construct(){
      $this->middleware(['admin']);
  }

  public function index(){
    $users = User::all();

    return view('usersroles',['users' => $users]);
  }

  public function createRolUser($user_id){
    $roles = Role::all();

    return view('createRolUser',['user_id' => $user_id, 'roles' => $roles]);
  }

  public function storeRolUser(Request $request, $user_id){
    $user = User::find($user_id);
    $role_id = $request->input('role_id');
    $role = Role::find($role_id);

    $user->roles()->attach($role);

    $users = User::all();

    return view('usersroles',['users' => $users]);
  }

  public function removeRolUser($user_id){
    $user = User::find($user_id);

    return view('removeRolUser',['user' => $user]);
  }

  public function destroyRolUser(Request $request, $user_id){
    $user = User::find($user_id);
    $role_id = $request->input('role_id');
    $role = Role::find($role_id);

    $user->roles()->detach($role);

    $users = User::all();

    return view('usersroles',['users' => $users]);
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Sentinel;
use App\Role;
use App\Akun;
use App\Userrole;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
  public function index(Request $request)
  {
  $user = Sentinel::findById($request->user);
  $role = Sentinel::findRoleById($request->role);
  $role->users()->detach($user);
  return redirect('/role');
  }
}

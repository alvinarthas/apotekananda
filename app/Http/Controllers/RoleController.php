<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Sentinel;
use App\Role;
use App\Akun;
use App\Userrole;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Sentinel::check()){
        $akunrole = DB::select('SELECT * FROM role_users
INNER JOIN users ON role_users.user_id=users.id
INNER JOIN roles ON role_users.role_id=roles.id');
        return view('role.view_role',compact('akunrole'));
      }
      else{
        return redirect('/');
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if(Sentinel::check()){
        $akuns = DB::select('SELECT * from users where id <> 1;');
        $roles = DB::select('SELECT * from roles where id <> 1;');
        return view('role.add_role',compact('akuns','roles'));
      }
      else{
        return redirect('/');
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $cekkun = DB::select("select * from role_users where user_id=$request->user");
      if($cekkun == NULL)
      {
        $user = Sentinel::findById($request->user);
        $roleuser = Sentinel::findRoleById($request->role);
        $roleuser->users()->attach($user);
        return redirect('/role');
      }else
      {
        return redirect('/role');
      }

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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$role_id)
    {
      $user = Sentinel::findById($id);
      $role = Sentinel::findRoleByName($role_id);
      $role->users()->detach($user);
      return redirect('/role');
    }
}

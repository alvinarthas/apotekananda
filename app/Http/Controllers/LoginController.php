<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;

class LoginController extends Controller
{
    public function login(){
      return view('authentication.login');
    }

    public function postLogin(Request $request){
      return redirect('/login');
      // Sentinel::authenticate($request->all());
      // if(Sentinel::check()){
      //   echo "jing";die();
      //   return redirect('/home');
      // }
      // else{
      //   echo "jings";die();
      //   return redirect('/login');
      // }
    }
    public function logout(){
      Sentinel::logout();
      return redirect('/login');
    }
}

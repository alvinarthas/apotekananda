<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Sentinel;

class RegistrationController extends Controller
{

    public function register(){
      return view('authentication.registration');
    }

    public function postRegister(Request $request){
      $user = Sentinel::registerAndActivate($request->all());
      return redirect('/home');
    }
}

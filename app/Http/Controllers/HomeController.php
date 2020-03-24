<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Navigation;
use App\Barang;
use Sentinel;

class HomeController extends Controller
{
    public function home(){
      if(Sentinel::check()){
          return view('home');
      }
      else{
        return redirect('/');
      }
    }
}

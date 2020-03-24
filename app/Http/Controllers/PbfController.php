<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Navigation;
use Sentinel;
use App\Pbf;

class PbfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Sentinel::check()){
        $pbfs = Pbf::all();
        return view('masterpbf.view_pbf',compact('pbfs'));
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
        return view('masterpbf.add_pbf');
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
      $pbf = new Pbf;
      $pbf->pbf = $request->pbf;
      $pbf->alamat = $request->alamat;
      $pbf->telepon = $request->telepon;
      $pbf->pic = $request->pic;
      $pbf->telepon_pic = $request->telepon_pic;
      $pbf->kode_pbf = $request->kode_pbf;
      $pbf->save();
      // return redirect('/pbf');
      return view('masterpbf.add_pbf');
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
      if(Sentinel::check()){
        $pbf = Pbf::find($id);
        return view('masterpbf.edit_pbf',compact('pbf'));
      }
      else{
        return redirect('/');
      }
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
      $pbf = Pbf::find($id);
      $pbf->update($request->all());
      return redirect('/pbf');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $pbf = Pbf::destroy($id);
      return redirect('/pbf');
    }
}

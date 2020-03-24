<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Navigation;
use Sentinel;
use App\Satuan;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Sentinel::check()){
        $satuans = Satuan::all();
        return view('mastersatuan.view_satuan',compact('satuans'));
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
        return view('mastersatuan.add_satuan');
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
      $satuan = new Satuan;
      $satuan->satuan = $request->satuan;
      $satuan->singkatan = $request->singkatan;

      $satuan->save();
      return redirect('/satuan');
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
        $satuan = Satuan::find($id);
        return view('mastersatuan.update_satuan',compact('satuan'));
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
      $satuan = Satuan::find($id);
      $satuan->update($request->all());
      return redirect('/satuan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $satuan = Satuan::destroy($id);
      return redirect('/satuan');
    }
}

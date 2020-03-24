<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Sentinel;
use App\Barang;
use App\Alokasi;
use Illuminate\Support\Facades\DB;


class AlokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Sentinel::check()){
        $alokasis= DB::select("select distinct kode_rak from alokasi_tbl");
        return view('alokasi.view_alokasi',compact('alokasis'));
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
        $barangs = Barang::all();
        return view('alokasi.add_alokasi',compact('barangs'));
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
      $count = $request->idid;
      for ($i=0; $i <$count ; $i++)
      {
        $alokasi = new Alokasi;
        $alokasi->kode_rak = $request->kode_rak;
        $alokasi->kode_barang = $request->kode_barang[$i];
        $alokasi->save();
      }
      return redirect('/alokasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      if(Sentinel::check()){
        $alokasis= DB::select("select * from alokasi_tbl
        inner join barang_tbl on barang_tbl.kode_barang=alokasi_tbl.kode_barang
        where kode_rak='$id'");
        return view('alokasi.dtl_alokasi',compact('alokasis'));
      }
      else{
        return redirect('/');
      }
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
        $barangs = Barang::all();
        $alokasis= DB::select("select * from alokasi_tbl where kode_rak='$id'");
        return view('alokasi.edit_alokasi',compact('barangs','alokasis'));
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

        $del = DB::select("delete from alokasi_tbl where kode_rak='$id'");
        $count = $request->idid;
        for ($i=0; $i <$count ; $i++)
        {
          $alokasi = new Alokasi;
          $alokasi->kode_rak = $request->kode_rak;
          $alokasi->kode_barang = $request->kode_barang[$i];
          $alokasi->save();
        }
        return redirect('/alokasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = DB::select("delete from alokasi_tbl where kode_rak='$id'");
        return redirect('/alokasi');
    }
}

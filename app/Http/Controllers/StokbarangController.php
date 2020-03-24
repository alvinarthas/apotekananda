<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Illuminate\Support\Facades\DB;
use App\Barang;

class StokbarangController extends Controller
{
    public function stokbarang(){
      if(Sentinel::check()){
        $stoks = Barang::all();
        return view('stockbarang.stockbarang ',compact('stoks'));
      }
      else{
        return redirect('/');
      }
    }

    public function detailin($id){
      if(Sentinel::check()){
        $barangs = DB::select("SELECT barang from barang_tbl where kode_barang='$id'");
        $detailins = DB::select("SELECT * from dtl_stockin_tbl
INNER JOIN barang_tbl on barang_tbl.kode_barang=dtl_stockin_tbl.kode_barang
where dtl_stockin_tbl.kode_barang ='$id'");
        return view('stockbarang.stockbarang_in ',compact('detailins','barangs'));
      }
      else{
        return redirect('/');
      }
    }

    public function detailout($id){
      if(Sentinel::check()){
        $barangs = DB::select("SELECT barang from barang_tbl where kode_barang='$id'");
        $detailouttrxs = DB::select("SELECT * from dtl_trx_tbl
INNER JOIN barang_tbl on barang_tbl.kode_barang=dtl_trx_tbl.kode_barang
where dtl_trx_tbl.kode_barang ='$id'");
        $detailoutrsps = DB::select("SELECT * from dtl_resep_tbl
INNER JOIN barang_tbl on barang_tbl.kode_barang=dtl_resep_tbl.kode_barang
where dtl_resep_tbl.kode_barang ='$id'");
return view('stockbarang.stockbarang_out',compact('detailouttrxs','detailoutrsps','barangs'));
      }
      else{
        return redirect('/');
      }
    }
}

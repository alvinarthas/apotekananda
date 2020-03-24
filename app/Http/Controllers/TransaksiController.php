<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Barang;
use App\Resep;
use App\Transaksi;
use App\Detailtransaksi;
use Sentinel;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Sentinel::check()){
              $transaksis = Transaksi::all();
          return view('transaksi.view_transaksi',compact('transaksis'));
      }else{
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
          $reseps = Resep::all();
          return view('transaksi.add_transaksi',compact('barangs','reseps'));
      }else{
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
      $counttrx = $request->idtrx;
      $countrsp = $request->idrsp;
      // date
      date_default_timezone_set("Asia/Jakarta");
      $year = date("Y", strtotime($request->tgl_trx));
      $month = date("m", strtotime($request->tgl_trx));
      $day = date("d", strtotime($request->tgl_trx));
      // id
      $trxs_id = "AATRX".$year.$month.$day;
      $trx1 = DB::select("select count(trx_id) as count from trx_tbl where trx_id like '$trxs_id%'");
      $cntr = $trx1[0]->count;
        if($cntr == 0){
          $trx_id = $trxs_id."1";
        }else{
          $cnt = $cntr-1;
          $trx2 = DB::select("select trx_id from trx_tbl WHERE trx_id like '$trxs_id%' ORDER BY trx_id asc");
          $crnt = $trx2[$cnt]->trx_id;
          $a_new = substr($crnt,0,13);
          $s_new = substr($crnt,13);
          $c_new = intval($s_new);
          $tt = $c_new+1;
          $trx_id = $a_new.$tt;
        }
        // loop untuk trx barang
          for ($i=0; $i <$counttrx ; $i++)
          {
            $detailtransaksi = new Detailtransaksi;
            $detailtransaksi->trx_id = $trx_id;
            $detailtransaksi->date_trx = $request->tgl_trx;
            $detailtransaksi->kode_barang = $request->kode_barang[$i];
            $kode_barang = $request->kode_barang[$i];
            $detailtransaksi->qty = $request->jml_trx[$i];
            $detailtransaksi->ttl_harga = $request->harga_barang[$i];
            $detailtransaksi->discount = $request->discount[$i];
            $detailtransaksi->ttl_semua = $request->total_all[$i];
            $detailtransaksi->save();
            // stockout
            $barang = DB::select("SELECT * FROM barang_tbl where kode_barang='$kode_barang'");
            $qty = $barang[0]->qty;
            $newqty = $qty-$request->jml_trx[$i];
            $stckout = $barang[0]->stockout;
            $newstck = $stckout+$request->jml_trx[$i];
            $outbarang = DB::update("update barang_tbl set stockout=$newstck,qty=$newqty where kode_barang='$kode_barang'");
          }
        // loop untuk trx resep
          for ($i=0; $i <$countrsp ; $i++)
          {
            $detailtrx = new Detailtransaksi;
            $detailtrx->trx_id = $trx_id;
            $detailtrx->date_trx = $request->tgl_trx;
            $detailtrx->resep_id = $request->resep[$i];
            $detailtrx->ttl_harga = $request->harga_resep[$i];
            $detailtrx->discount = $request->discount_resep[$i];
            $detailtrx->ttl_semua = $request->total_all_resep[$i];
            $detailtrx->save();
          }
      $transaksi = new Transaksi;
      $transaksi->trx_id = $trx_id;
      $transaksi->date_trx = $request->tgl_trx;
      $transaksi->payment = $request->payment;
      $transaksi->save();
        return redirect('/transaksi');
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
             $transaksis = DB::select("SELECT * FROM dtl_trx_tbl
    WHERE trx_id = '$id' ");
             return view('transaksi.dtl_transaksi',compact('transaksis'));
         }else{
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

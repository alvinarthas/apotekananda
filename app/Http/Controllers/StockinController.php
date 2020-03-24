<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Barang;
use App\Pbf;
use App\Stockin;
use App\Detailstockin;
use App\Pemesanan;
use App\Detailorder;
use Sentinel;
use Illuminate\Support\Facades\DB;

class StockinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Sentinel::check()){
            $stockins = DB::select("SELECT * FROM stockin_tbl");
            $orders = DB::select("SELECT * FROM pemesanan_tbl
            INNER JOIN pbf_tbl on pbf_tbl.kode_pbf=pemesanan_tbl.pbf_id
            WHERE stockin_status=0");
          return view('stockin.view_stockin',compact('stockins','orders'));
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
        //
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
      $pbf = $request->kode_pbf;
      date_default_timezone_set("Asia/Jakarta");
      $year = date("Y", strtotime($request->tgl_stockin));
      $month = date("m", strtotime($request->tgl_stockin));
      $day = date("d", strtotime($request->tgl_stockin));
      $stockin_id = "AAIN".$pbf.$year.$month.$day;
        for ($i=0; $i <$count ; $i++)
        {
          $Detailstockin = new Detailstockin;
          $Detailstockin->stockin_id = $stockin_id;
          $Detailstockin->date_stockin = $request->tgl_stockin;
          $Detailstockin->kode_barang = $request->kode_barang[$i];
          $kode_barang = $request->kode_barang[$i];
          $Detailstockin->jml_stockin = $request->jml_stockin[$i];
          $Detailstockin->pbf_id = $request->kode_pbf;
          $Detailstockin->save();

          $barang = DB::select("SELECT * FROM barang_tbl where kode_barang='$kode_barang'");
          $qty = $barang[0]->qty;
          $newqty = $request->jml_stockin[$i]+$qty;
          $stckin = $barang[0]->stockin;
          $newstck = $stckin+$request->jml_stockin[$i];
          $inbarang = DB::update("update barang_tbl set stockin=$newstck,qty=$newqty where kode_barang='$kode_barang'");
        }
      $id_order = $request->order_id[0];
      $stockin = new Stockin;
      $stockin->stockin_id = $stockin_id;
      $stockin->date_stockin = $request->tgl_stockin;
      $stockin->order_id = $id_order;
      $stockin->save();
      $order = DB::update("update pemesanan_tbl set stockin_status=1 WHERE order_id='$id_order'");
        return redirect('/stockin');
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
          $barangs = Barang::all();
          // $pbfs = Pbf::all();
          $details = DB::select("SELECT dtl_pemesanan_tbl.order_id,pbf_tbl.pbf,pbf_tbl.kode_pbf,barang_tbl.barang,barang_tbl.kode_barang, dtl_pemesanan_tbl.jml_order from pemesanan_tbl
  INNER JOIN dtl_pemesanan_tbl ON dtl_pemesanan_tbl.order_id=pemesanan_tbl.order_id
  INNER JOIN pbf_tbl ON pbf_tbl.kode_pbf=pemesanan_tbl.pbf_id
  INNER JOIN barang_tbl ON barang_tbl.kode_barang=dtl_pemesanan_tbl.kode_barang
  WHERE pemesanan_tbl.order_id='$id'");
          $pbfs=$details[0]->pbf;
          $pbf = DB::select("select * from pbf_tbl where pbf='$pbfs'");
          return view('stockin.add_stockin',compact('barangs','pbf','details'));
      }else{
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
      $stockin = DB::select("select * from stockin_tbl where stockin_id='$id'");
      $details = DB::select("select * from dtl_stockin_tbl where stockin_id='$id'");
      $hitung = DB::select("select count(stockin_id) as count from dtl_stockin_tbl where stockin_id='$id'");

      $count = $hitung[0]->count;
      // dd($count);
        for ($i=0; $i<$count ; $i++) {
            $kode_barang = $details[$i]->kode_barang;
            $barang = DB::select("select * from barang_tbl where kode_barang='$kode_barang'");
            $stockin_barang = $barang[0]->stockin;
            // dd($barang[1]->stockin);
            $qty_barang = $barang[0]->qty;
            // dd($qty_barang);
            $jml_stockin = $details[$i]->jml_stockin;
            // dd($jml_stockin);
            $realqty = $qty_barang-$jml_stockin;
            // dd($realqty);
            $realstockin = $stockin_barang-$jml_stockin;
            // dd($realstockin);
            $brg_update = DB::update("update barang_tbl set stockin=$realstockin,qty=$realqty WHERE kode_barang='$kode_barang'");
        }
      $order_id = $stockin[0]->order_id;
      $ord_update = DB::update("update pemesanan_tbl set stockin_status=0 where order_id='$order_id'");

      $del_stockin = DB::delete("delete from stockin_tbl where stockin_id='$id'");
      $del_detail = DB::delete("delete from dtl_stockin_tbl where stockin_id='$id'");
      return redirect('/stockin');
    }

    public function detail($id)
    {
      if(Sentinel::check()){
             $detailss = DB::select("SELECT * FROM dtl_stockin_tbl
    INNER JOIN barang_tbl ON barang_tbl.kode_barang=dtl_stockin_tbl.kode_barang
    INNER JOIN pbf_tbl ON pbf_tbl.kode_pbf=dtl_stockin_tbl.pbf_id
    WHERE stockin_id = '$id' ");
             return view('stockin.detail_stockin',compact('detailss'));
         }else{
             return redirect('/');
         }
     }
}

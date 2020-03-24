<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Barang;
use App\Pbf;
use App\Pemesanan;
use App\Detailorder;
use App\Kategori;
use Sentinel;
use Illuminate\Support\Facades\DB;
use Input;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Sentinel::check()){
              $pemesanans = DB::select("SELECT * FROM pemesanan_tbl
INNER JOIN pbf_tbl ON pbf_tbl.kode_pbf=pemesanan_tbl.pbf_id");
            return view('pemesanan.view_pemesanan',compact('pemesanans'));
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
            $pbfs = Pbf::all();
            return view('pemesanan.add_pemesanan',compact('barangs','pbfs'));
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
      $count = $request->idid;
      $pbf = $request->pbf;
      date_default_timezone_set("Asia/Jakarta");
      $year = date("Y", strtotime($request->tgl_pemesanan));
      $month = date("m", strtotime($request->tgl_pemesanan));
      $day = date("d", strtotime($request->tgl_pemesanan));
      $order_id = "AAORD".$pbf.$year.$month.$day;
        for ($i=0; $i <$count ; $i++)
        {
          $Detailorder = new Detailorder;
          $Detailorder->order_id = $order_id;
          $Detailorder->date_pemesanan = $request->tgl_pemesanan;
          $Detailorder->harga_pesanan = $request->harga_pesanan[$i];
          $Detailorder->total_hp = $request->total_hp[$i];
          $Detailorder->discount = $request->discount[$i];
          $Detailorder->total_dc = $request->total_dc[$i];
          $Detailorder->harga_dc = $request->harga_dc[$i];
          $Detailorder->ppn = $request->ppn[$i];
          $Detailorder->total_all = $request->total_all[$i];
          $Detailorder->jml_order = $request->jml_order[$i];
          $Detailorder->kode_barang = $request->kode_barang[$i];
          $Detailorder->pbf_id = $request->pbf;
          $Detailorder->save();
        }
      $pemesanan = new pemesanan;
      $pemesanan->order_id = $order_id;
      $pemesanan->date_pemesanan = $request->tgl_pemesanan;
      $pemesanan->pbf_id = $request->pbf;
      $pemesanan->stockin_status = 0;
      $pemesanan->save();
        return redirect('/pemesanan');

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
      $barangs = Barang::all();
      $pbfs = Pbf::all();
      $details = DB::select("SELECT * FROM dtl_pemesanan_tbl
INNER JOIN barang_tbl ON barang_tbl.kode_barang=dtl_pemesanan_tbl.kode_barang
WHERE order_id = '$id' ");
      $pemesanan = DB::select("SELECT * FROM pemesanan_tbl
WHERE order_id = '$id' ");
      return view('pemesanan.edit_pemesanan',compact('details','pemesanan','barangs','pbfs'));
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
      $detail = DB::delete("delete from dtl_pemesanan_tbl where order_id='$id'");
      $count = $request->idid;
      $pbf = $request->pbf;
      date_default_timezone_set("Asia/Jakarta");
      $year = date("Y", strtotime($request->tgl_pemesanan));
      $month = date("m", strtotime($request->tgl_pemesanan));
      $day = date("d", strtotime($request->tgl_pemesanan));
      $order_id = "AAORD".$pbf.$year.$month.$day;
        for ($i=0; $i <$count ; $i++)
        {
          $Detailorder = new Detailorder;
          $Detailorder->order_id = $order_id;
          $Detailorder->date_pemesanan = $request->tgl_pemesanan;
          $Detailorder->harga_pesanan = $request->harga_pesanan[$i];
          $Detailorder->total_hp = $request->total_hp[$i];
          $Detailorder->discount = $request->discount[$i];
          $Detailorder->total_dc = $request->total_dc[$i];
          $Detailorder->harga_dc = $request->harga_dc[$i];
          $Detailorder->ppn = $request->ppn[$i];
          $Detailorder->total_all = $request->total_all[$i];
          $Detailorder->jml_order = $request->jml_order[$i];
          $Detailorder->kode_barang = $request->kode_barang[$i];
          $Detailorder->pbf_id = $request->pbf;
          $Detailorder->save();
        }
      $pemesanan= DB::select("UPDATE pemesanan_tbl
SET order_id='$order_id',date_pemesanan='$request->tgl_pemesanan',pbf_id='$request->pbf',stockin_status=0");

        return redirect('/pemesanan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $pemesanan = DB::delete("delete from pemesanan_tbl where order_id='$id'");
      $detail = DB::delete("delete from dtl_pemesanan_tbl where order_id='$id'");
      return redirect('/pemesanan');
    }

    public function detail($id)
    {
      if(Sentinel::check()){
             $details = DB::select("SELECT * FROM dtl_pemesanan_tbl
    INNER JOIN barang_tbl ON barang_tbl.kode_barang=dtl_pemesanan_tbl.kode_barang
    INNER JOIN pbf_tbl ON pbf_tbl.kode_pbf=dtl_pemesanan_tbl.pbf_id
    WHERE order_id = '$id' ");
             return view('pemesanan.detail_pemesanan',compact('details'));
         }else{
             return redirect('/');
         }
     }

     public function notif()
     {
       if(Sentinel::check()){
         $barangs = DB::select("SELECT * FROM barang_tbl WHERE qty < min_qty");
         return view('pemesanan.notif_pemesanan',compact('barangs'));
       }else{
        return redirect('/');
       }
     }

     public function ajx_PBF(){
        $searchpbf = strip_tags(trim($_GET['s_pbf']));
        $pbfsearch = DB::select("SELECT kode_pbf,pbf FROM pbf_tbl WHERE pbf LIKE '$searchpbf%' LIMIT 5");
        $data = array();
        $array = json_decode( json_encode($pbfsearch), true);
        foreach ($array as $key) {
          $arrayName = array('id' =>$key['kode_pbf'],'text' =>$key['pbf']);
          array_push($data,$arrayName);
        }
        echo json_encode($data, JSON_FORCE_OBJECT);
      }

      public function ajx_BRG(){
        $searchbrg = strip_tags(trim($_GET['s_brg']));
        $brgsearch = DB::select("SELECT kode_barang,barang FROM barang_tbl WHERE barang LIKE '$searchbrg%' LIMIT 5");
        $data = array();
        $arraybrg = json_decode( json_encode($brgsearch), true);
        foreach ($arraybrg as $key) {
          $arrayName = array('id' =>$key['kode_barang'],'text' =>$key['barang']);
          array_push($data,$arrayName);
        }
        echo json_encode($data, JSON_FORCE_OBJECT);
      }
     

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Barang;
use App\Opname;
use App\Detailopname;
use Sentinel;
use Illuminate\Support\Facades\DB;

class OpnameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Sentinel::check()){
          $opnames = Opname::all();
          return view('stockopname.view_stockopname',compact('opnames'));
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
          return view('stockopname.add_stockopname',compact('barangs'));
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
      // date
      date_default_timezone_set("Asia/Jakarta");
      $year = date("Y", strtotime($request->tgl_opname));
      $month = date("m", strtotime($request->tgl_opname));
      $day = date("d", strtotime($request->tgl_opname));
      // id
      $opns_id = "AAOPN".$year.$month.$day;
      $opn1 = DB::select("select count(opname_id) as count from stockopname_tbl where opname_id like '$opns_id%'");
      $cntr = $opn1[0]->count;
        if($cntr == 0){
          $opname_id = $opns_id."1";
        }else{
          $cnt = $cntr-1;
          $opn2 = DB::select("select opname_id from stockopname_tbl WHERE opname_id like '$opns_id%' ORDER BY opname_id asc");
          $crnt = $opn2[$cnt]->opname_id;
          $a_new = substr($crnt,0,13);
          $s_new = substr($crnt,13);
          $c_new = intval($s_new);
          $tt = $c_new+1;
          $opname_id = $a_new.$tt;
        }
        // loop untuk cek barang
          for ($i=0; $i <$count ; $i++)
          {
            $detailopname = new Detailopname;
            $detailopname->opname_id = $opname_id;
            $detailopname->date_opname = $request->tgl_opname;
            $detailopname->kode_barang = $request->kode_barang[$i];
            $kode_barang = $request->kode_barang[$i];
            $detailopname->jml_real = $request->jml_asli[$i];
            $detailopname->jml_sistem = $request->jml_sistem[$i];
            $detailopname->keterangan = $request->keterangan[$i];
            $detailopname->status = $request->status[$i];
            $detailopname ->save();
          }
      $opname = new Opname;
      $opname->opname_id = $opname_id;
      $opname->date_opname = $request->tgl_opname;
      $opname->judul = $request->judul;
      $opname->save();
      return redirect('/stokopname');
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
             $opnames = DB::select("SELECT * FROM dtl_stockopname_tbl INNER JOIN barang_tbl on barang_tbl.kode_barang=dtl_stockopname_tbl.kode_barang
    WHERE opname_id = '$id' ");
            $opnam = DB::select("SELECT * FROM stockopname_tbl where opname_id = '$id'");
             return view('stockopname.dtl_stockopname',compact('opnames','opnam'));
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
      if(Sentinel::check()){
            $barangs = Barang::all();
            $opname = DB::select("select * from stockopname_tbl where opname_id='$id'");
            $dtl_opname = DB::select("SELECT * FROM dtl_stockopname_tbl
INNER JOIN barang_tbl ON barang_tbl.kode_barang=dtl_stockopname_tbl.kode_barang
WHERE opname_id='$id'");
            return view('stockopname.edit_stockopname',compact('opname','dtl_opname','barangs'));
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
      $del2 = DB::select("delete from stockopname_tbl where opname_id='$id'");
      $del = DB::select("delete from dtl_stockopname_tbl where opname_id='$id'");
      $count = $request->idid;
      // date
      date_default_timezone_set("Asia/Jakarta");
      $year = date("Y", strtotime($request->tgl_opname));
      $month = date("m", strtotime($request->tgl_opname));
      $day = date("d", strtotime($request->tgl_opname));
      // id
      $opns_id = "AAOPN".$year.$month.$day;
      $opn1 = DB::select("select count(opname_id) as count from stockopname_tbl where opname_id like '$opns_id%'");
      $cntr = $opn1[0]->count;
        if($cntr == 0){
          $opname_id = $opns_id."1";
        }else{
          $cnt = $cntr-1;
          $opn2 = DB::select("select opname_id from stockopname_tbl WHERE opname_id like '$opns_id%' ORDER BY opname_id asc");
          $crnt = $opn2[$cnt]->opname_id;
          $a_new = substr($crnt,0,13);
          $s_new = substr($crnt,13);
          $c_new = intval($s_new);
          $tt = $c_new+1;
          $opname_id = $a_new.$tt;
        }
        // loop untuk cek barang
          for ($i=0; $i <$count ; $i++)
          {
            $detailopname = new Detailopname;
            $detailopname->opname_id = $opname_id;
            $detailopname->date_opname = $request->tgl_opname;
            $detailopname->kode_barang = $request->kode_barang[$i];
            $kode_barang = $request->kode_barang[$i];
            $detailopname->jml_real = $request->jml_asli[$i];
            $detailopname->jml_sistem = $request->jml_sistem[$i];
            $detailopname->keterangan = $request->keterangan[$i];
            $detailopname->status = $request->status[$i];
            $detailopname ->save();
          }
          $opname = new Opname;
          $opname->opname_id = $opname_id;
          $opname->date_opname = $request->tgl_opname;
          $opname->judul = $request->judul;
          $opname->save();
          return redirect('/stokopname');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if(Sentinel::check()){
            $opname = DB::select("Delete from stockopname_tbl where opname_id='$id'");
            $dtl_opname = DB::select("Delete from dtl_stockopname_tbl where opname_id='$id'");
            return redirect('/stokopname');
         }else{
             return redirect('/');
         }

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
    public function ajx_sistem(){
        // echo "T";die();
        $code =  strip_tags(trim($_GET['code']));
        $jmlsistem = DB::select("SELECT qty from barang_tbl WHERE kode_barang='$code'");
        $arrayjml = json_decode( json_encode($jmlsistem), true);
        foreach ($arrayjml as $key) {
        $a = array('qty' =>$key['qty']);
        }
        echo json_encode($a['qty']);
    }
}

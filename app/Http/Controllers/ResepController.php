<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Barang;
use App\Resep;
use App\Detailresep;
use Sentinel;
use Illuminate\Support\Facades\DB;

class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Sentinel::check()){
            $reseps = DB::select("SELECT * FROM resep_tbl");
          return view('resep.view_resep',compact('reseps'));
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
          return view('resep.add_resep',compact('barangs'));
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
      $year = date("Y", strtotime($request->tgl_resep));
      $month = date("m", strtotime($request->tgl_resep));
      $day = date("d", strtotime($request->tgl_resep));
      // id
      $reseps_id = "AARSP".$year.$month.$day;
      $rsp1 = DB::select("select count(resep_id) as count from resep_tbl where resep_id like '$reseps_id%'");
      $cntr = $rsp1[0]->count;
        if($cntr == 0){
          $resep_id = $reseps_id."1";
        }else{
          $cnt = $cntr-1;
          $rsp2 = DB::select("select resep_id from resep_tbl WHERE resep_id like '$reseps_id%' ORDER BY resep_id asc");
          $crnt = $rsp2[$cnt]->resep_id;
          $a_new = substr($crnt,0,13);
          $s_new = substr($crnt,13);
          $c_new = intval($s_new);
          $tt = $c_new+1;
          $resep_id = $a_new.$tt;
        }
          for ($i=0; $i <$count ; $i++)
          {
            $detailresep = new Detailresep;
            $detailresep->resep_id = $resep_id;
            $detailresep->date_resep = $request->tgl_resep;
            $detailresep->dokter = $request->dokter;
            $detailresep->jenis_resep = $request->jenis;
            $detailresep->jml_barang = $request->jml_barang[$i];
            $detailresep->kode_barang = $request->kode_barang[$i];
            $kode_barang = $request->kode_barang[$i];
            $detailresep->save();
            // stockout
            $barang = DB::select("SELECT * FROM barang_tbl where kode_barang='$kode_barang'");
            $qty = $barang[0]->qty;
            $newqty = $qty-$request->jml_barang[$i];
            $stckout = $barang[0]->stockout;
            $newstck = $stckout+$request->jml_barang[$i];
            $outbarang = DB::update("update barang_tbl set stockout=$newstck,qty=$newqty where kode_barang='$kode_barang'");
          }
      $resep = new Resep;
      $resep->resep_id = $resep_id;
      $resep->date_resep = $request->tgl_resep;
      $resep->dokter = $request->dokter;
      $resep->keterangan = $request->keterangan;
      $resep->save();
        return redirect('/resep');
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
             $reseps = DB::select("SELECT * FROM dtl_resep_tbl
    INNER JOIN barang_tbl ON barang_tbl.kode_barang=dtl_resep_tbl.kode_barang
    WHERE resep_id = '$id' ");
             return view('resep.dtl_resep',compact('reseps'));
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
          $details = DB::select("SELECT * FROM dtl_resep_tbl
    INNER JOIN barang_tbl ON barang_tbl.kode_barang=dtl_resep_tbl.kode_barang
    WHERE resep_id = '$id' ");
          $reseps = DB::select("SELECT * FROM resep_tbl
    WHERE resep_id = '$id' ");
          return view('resep.edit_resep',compact('barangs','details','reseps'));
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
      $detail = DB::delete("delete from dtl_resep_tbl where resep_id='$id'");
      $count = $request->idid;
      // date
      date_default_timezone_set("Asia/Jakarta");
      $year = date("Y", strtotime($request->tgl_resep));
      $month = date("m", strtotime($request->tgl_resep));
      $day = date("d", strtotime($request->tgl_resep));
      // id
      $reseps_id = "AARSP".$year.$month.$day;
      $rsp1 = DB::select("select count(resep_id) as count from resep_tbl where resep_id like '$reseps_id%'");
      $cntr = $rsp1[0]->count;
        if($cntr == 0){
          $resep_id = $reseps_id."1";
        }else{
          $cnt = $cntr-1;
          $rsp2 = DB::select("select resep_id from resep_tbl WHERE resep_id like '$reseps_id%' ORDER BY resep_id asc");
          $crnt = $rsp2[$cnt]->resep_id;
          $a_new = substr($crnt,0,13);
          $s_new = substr($crnt,13);
          $c_new = intval($s_new);
          $tt = $c_new+1;
          $resep_id = $a_new.$tt;
        }
          for ($i=0; $i <$count ; $i++)
          {
            $detailresep = new Detailresep;
            $detailresep->resep_id = $resep_id;
            $detailresep->date_resep = $request->tgl_resep;
            $detailresep->dokter = $request->dokter;
            $detailresep->jenis_resep = $request->jenis;
            $detailresep->jml_barang = $request->jml_barang[$i];
            $detailresep->kode_barang = $request->kode_barang[$i];
            $kode_barang = $request->kode_barang[$i];
            $detailresep->save();
            // stockout
            $barang = DB::select("SELECT * FROM barang_tbl where kode_barang='$kode_barang'");
            $qty = $barang[0]->qty;
            $newqty = $qty-$request->jml_barang[$i];
            $stckout = $barang[0]->stockout;
            $newstck = $stckout+$request->jml_barang[$i];
            $outbarang = DB::update("update barang_tbl set stockout=$newstck,qty=$newqty where kode_barang='$kode_barang'");
          }
          $resep= DB::select("UPDATE resep_tbl
    SET resep_id='$resep_id',date_resep='$request->tgl_resep',dokter='$request->dokter',keterangan='$request->keterangan'");
        return redirect('/resep');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $stockin = DB::select("select * from resep_tbl where resep_id='$id'");
      $details = DB::select("select * from dtl_resep_tbl where resep_id='$id'");
      $hitung = DB::select("select count(resep_id) as count from dtl_resep_tbl where resep_id='$id'");

      $count = $hitung[0]->count;
      // dd($count);
        for ($i=0; $i<$count ; $i++) {
            $kode_barang = $details[$i]->kode_barang;
            $barang = DB::select("select * from barang_tbl where kode_barang='$kode_barang'");
            $stockout_barang = $barang[0]->stockout;
            // dd($barang[1]->stockin);
            $qty_barang = $barang[0]->qty;
            // dd($qty_barang);
            $jml_stockout = $details[$i]->jml_barang;
            // dd($jml_stockin);
            $realqty = $qty_barang+$jml_stockout;
            // dd($realqty);
            $realstockout = $stockout_barang-$jml_stockout;
            // dd($realstockin);
            $brg_update = DB::update("update barang_tbl set stockout=$realstockout,qty=$realqty WHERE kode_barang='$kode_barang'");
        }

      $del_resep = DB::delete("delete from resep_tbl where resep_id='$id'");
      $del_detail = DB::delete("delete from dtl_resep_tbl where resep_id='$id'");
      return redirect('/resep');
    }

}

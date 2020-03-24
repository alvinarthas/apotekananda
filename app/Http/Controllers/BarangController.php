<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Navigation;
use Sentinel;
use App\Barang;
use App\Satuan;
use App\Kategori;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Sentinel::check()){
        $barangs = Barang::all();
        return view('masterbarang.view_barang ',compact('menus','barangs'));
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
        $satuans = Satuan::all();
        $kategoris = Kategori::all();
      return view('masterbarang.add_barang',compact('satuans','kategoris'));
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
        $barang = new Barang;
        $barang->barang = $request->barang;
        $barang->harga = $request->harga;
        $barang->satuan = $request->satuan;
        $barang->jenis = $request->jenis;
        $barang->min_qty = $request->min_qty;
        $barang->kode_barang = $request->kode_barang;
        $barang->kategori = $request->kategori;

        $barang->save();
        // return redirect('/barang');
        $satuans = Satuan::all();
        $kategoris = Kategori::all();
      return view('masterbarang.add_barang',compact('satuans','kategoris'));

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
        $barang = Barang::find($id);
        $satuans = Satuan::all();
        $kategoris = Kategori::all();
        return view('masterbarang.update_barang ',compact('satuans','barang','kategoris'));
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
        $barang = Barang::find($id);
        $barang->update($request->all());
        return redirect('/barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::destroy($id);
        return redirect('/barang');
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Navigation;
use App\SubNav;
use App\Mapping;
use App\Role;
use Sentinel;
use Illuminate\Support\Facades\DB;

class MappingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Sentinel::check()){
        $roles = DB::select('SELECT * from roles where id <> 1;');
        $navs = Navigation::all();
        return view('mapping.view_mapping',compact('navs','roles'));
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $fixmenus = DB::select("SELECT * FROM mapping_tbl
INNER JOIN roles ON mapping_tbl.role_id=roles.id
INNER JOIN subnavigation_tbl ON mapping_tbl.subnav_id=subnavigation_tbl.subnav_id
INNER JOIN navigation_tbl ON subnavigation_tbl.nav_id=navigation_tbl.nav_id WHERE roles.id='$id';");
        $joins = DB::select("SELECT * FROM navigation_tbl
INNER JOIN subnavigation_tbl ON navigation_tbl.nav_id=subnavigation_tbl.nav_id
WHERE subnavigation_tbl.subnav_id not in (SELECT subnav_id from mapping_tbl WHERE role_id='$id');");
        $role = Role::find($id);
        return view('mapping.edit_mapping',compact('role','joins','fixmenus'));
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
      $role = Role::find($id);
      foreach ($request->menu as $menu) {
        $mapping = new Mapping;
        $mapping->role_id = $request->role_id;
        $mapping->subnav_id = $menu;
        // dd($mapping);
        $mapping->save();

      }
      return redirect('/mapping');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
      foreach ($request->menu_hapus as $hapus) {
        $m_hapus = DB::select("DELETE FROM mapping_tbl WHERE subnav_id='$hapus' and role_id=$id");
      }
      return redirect('/mapping');
    }
}

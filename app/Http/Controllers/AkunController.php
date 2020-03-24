<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Navigation;
use App\Akun;
use Sentinel;
use Illuminate\Support\Facades\DB;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Sentinel::check()){
        $akuns = DB::select('SELECT * from users where id <> 1;');
        $menus = Navigation::all();
        return view('pegawai.view_user',compact('menus','akuns'));
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
        $menus = Navigation::all();
        return view('pegawai.add_user',compact('menus'));
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

        // $imgNames = $request->first_name.'_'.$request->last_name.'.'.$request->img->getClientOriginalExtension();
        // $request->img->move(public_path('assets/img'),$imgNames);
        $credentials=[
          'email' => $request->email,
          'password' => $request->password,
          'username' => $request->username,
          'telepon' => $request->telepon,
          'sex' => $request->sex,
          'alamat' => $request->alamat,
          'first_name' => $request->first_name,
          'last_name' => $request->last_name,
          // 'img' => $imgNames,
        ];
        $user = Sentinel::registerAndActivate($credentials);
        return redirect('/akun');
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
        $akun = Akun::find($id);
        $menus = Navigation::all();
        return view('pegawai.update_user',compact('menus','akun'));
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
      $user = Sentinel::findById($id);
      $imgNames = $request->first_name.'_'.$request->last_name.'.'.$request->img->getClientOriginalExtension();
      $request->img->move(public_path('assets/img'),$imgNames);
      $credentials=[
        'email' => $request->email,
        'password' => $request->password,
        'username' => $request->username,
        'telepon' => $request->telepon,
        'sex' => $request->sex,
        'alamat' => $request->alamat,
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'img' => $imgNames,
      ];
      $user = Sentinel::update($user, $credentials);
      return redirect('/akun');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = Sentinel::findById($id);
      unlink(public_path('/assets/img/').$user->img);
      $user->delete();
      return redirect('/akun');
    }
}

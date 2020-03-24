<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/register','RegistrationController@register');
Route::post('/register','RegistrationController@postRegister');

Route::resource('barang','BarangController');
Route::resource('akun','AkunController');
Route::resource('role','RoleController');
Route::post('/roles','RolesController@index');
Route::resource('mapping','MappingController');
Route::resource('satuan','SatuanController');
Route::resource('alokasi','AlokasiController');
Route::resource('peran','PeranController');


Route::resource('pbf','PbfController');
Route::resource('pemesanan','PemesananController');
Route::get('ajxpbforder','PemesananController@ajx_PBF');
Route::get('ajxbrgorder','PemesananController@ajx_BRG');
Route::get('notif','PemesananController@notif');
Route::resource('kategori','KategoriController');
Route::get('/orderdetail/{id}','PemesananController@detail');
Route::resource('stockin','StockinController');
Route::resource('stokopname','OpnameController');
Route::get('ajxopnorder','OpnameController@ajx_BRG');
Route::get('jmlsistem','OpnameController@ajx_sistem');

Route::resource('resep','ResepController');
Route::resource('transaksi','TransaksiController');
Route::get('/stockindetail/{id}','StockinController@detail');
Route::get('/stokbarang','StokbarangController@stokbarang');
Route::get('/stokbarang/in/{id}','StokbarangController@detailin');
Route::get('/stokbarang/out/{id}','StokbarangController@detailout');

Route::get('/login','LoginController@login');
Route::post('/login','LoginController@postLogin');
Route::post('/logout','LoginController@logout');
Route::get('/home','HomeController@home');

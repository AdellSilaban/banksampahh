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

Route::get('/', function () {
    return view('home');

});

Route::group(['middleware' => ['guest']], function(){
Route::get('/login', 'AuthController@login')->middleware('guest')->name('login');
Route::post('/ceklogin', 'AuthController@ceklogin');
Route::get('/home', 'Controller@home');
Route::get('/register', 'AuthController@register');
});

//route bank sampah
Route::get('/home_BS', 'bankController@home_BS');
Route::get('/data_pengguna','bankController@data_pengguna');
Route::get('/data_petugas','bankController@data_petugas');
Route::get('/profile_BS','bankController@profile_BS');
Route::post('/saveLocationBS','bankController@saveLocationBS');
Route::get('/data_pembuangan','bankController@data_pembuangan');
Route::put('/pembuangan/{id_pembuangan}/action', 'bankController@aksiPembuangan')->name('pembuangan.action');

//route pengambil sampah
Route::get('/home_PS', 'pengambilController@home_PS');
Route::get('/validasi_data','pengambilController@validasi_data');
Route::get('/form_pengajuan','pengambilController@form_pengajuan');
Route::get('/profile_PS','pengambilController@profile_PS');
Route::post('/saveLocationPS','pengambilController@saveLocationPS');
Route::post('/ajukan_pembuangan','pengambilController@ajukan_pembuangan');
Route::post('/pengambilan/{id}/action','pengambilController@aksiPengajuan')->name('pengambilan.action');



//route pengguna
Route::get('/home_PG', 'penggunaController@home_PG');
Route::get('/jemput_sampah','Controller@jemput_sampah');
Route::get('/profile_PG','penggunaController@profile_PG');
Route::post('/saveLocation','penggunaController@saveLocation');
Route::get('/paket_pelanggan','penggunaController@paket_pelanggan');
Route::post('/simpanPengajuan','penggunaController@simpanPengajuan');
// Route::post('/pengambilan/{id_pengajuan}/action', 'penggunaController@aksiPengajuan')->name('pengambilan.action');
Route::get('/bayar','penggunaController@bayar');







Route::post('/simpan','AuthController@simpan');
Route::get('/layouts/main','Controller@main');
Route::get('/dataPengajuan_PS','penggunaController@dataPengajuan_PS');
Route::get('/transaksi','penggunaController@transaksi');

Route::get('/logout', 'AuthController@logout');





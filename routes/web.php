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
Route::get('/home_BS', 'Controller@home_BS');

//route pengambil sampah
Route::get('/home_PS', 'Controller@home_PS');

//route pengguna
Route::get('/home_PG', 'penggunaController@home_PG');
Route::get('/jemput_sampah','Controller@jemput_sampah');
Route::get('/paket_pelanggan','Controller@paket_pelanggan');
Route::get('/profile_PG','penggunaController@profile_PG');
Route::post('/saveLocation','penggunaController@saveLocation');







Route::post('/pengambilan/{id}/action', 'penggunaController@aksiPengajuan')->name('pengambilan.action');
Route::post('/simpan','AuthController@simpan');
Route::get('/layouts/main','Controller@main');
Route::get('/validasi_data','penggunaController@validasi_data');
Route::get('/form_pengajuan','Controller@form_pengajuan');
Route::get('/data_petugas','Controller@data_petugas');
Route::get('/dataPengajuan_PS','penggunaController@dataPengajuan_PS');
Route::get('/transaksi','penggunaController@transaksi');
Route::post('/simpanPengajuan','penggunaController@simpanPengajuan');
Route::get('/logout', 'AuthController@logout');




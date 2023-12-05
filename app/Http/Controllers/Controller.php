<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\pengguna;
use App\Models\User;

class Controller extends BaseController
{
    public function main(){
        return view('layouts/main', ['key' => 'main']);
    }

    public function home(){
        return view('home', ['key' => 'home']);
    }

    public function home_BS(){
        return view('home_BS', ['key' => 'home_BS']);
    }



    public function home_PS(){
        return view('home_PS', ['key' => 'home_PS']);
    }

    public function jemput_sampah(){
        return view('jemput_sampah', ['key' => 'jemput_sampah']);
    }

    public function paket_pelanggan(){
        return view('paket_pelanggan',['key' => 'paket_pelanggan']);
    }

  

    public function form_pengajuan(){
        return view('form_pengajuan',['key' => 'form_pengajuan']);
    }

    public function data_petugas(){
        return view('data_petugas',['key' => 'data_petugas']);
    }


    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\pengguna;
use App\User;

class Controller extends BaseController
{
    public function main(){
        return view('layouts/main', ['key' => 'main']);
    }

    public function home(){
        return view('home', ['key' => 'home']);
    }


    public function jemput_sampah(){
        return view('jemput_sampah', ['key' => 'jemput_sampah']);
    }

    public function form_pengajuan(){
        return view('form_pengajuan',['key' => 'form_pengajuan']);
    }

    
}

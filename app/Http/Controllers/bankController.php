<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Support\Facades\Session;
use App\pengguna;
use App\paket;
use App\User;
use App\pengajuan;
use App\pembuangan;


class bankController extends Controller
{

    public function home_BS(){
        $result = User::all();
        return view('home_BS', ['key' => 'home_BS', 'result' => $result]);
    }

    public function data_petugas(){
        // $result = User::all();
        $users = User::where('role', "pengambil")->get();
        return view('data_petugas', ['key' => 'data_petugas', 'users' => $users]);
    }


    public function data_pengguna(){
        // $result = User::all();
        $users = User::where('role', "pengguna")->get();
        return view('data_pengguna', ['key' => 'data_pengguna', 'users' => $users]);
    }

    public function profile_BS(){
        $result = User::all();
        $profile =User::orderBy('id','desc')->paginate(10);
        Session::flash('alert', 'Data Longitude dan Latitude anda berhasil ditambahkan!');
        return view('profile_BS', ['key' => 'profile_BS', 'profile' => $profile]);
        
    }

    public function saveLocationBS(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Update the Lokasi coordinates
        $user->nama_instansi = $request->nama_instansi;
        $user->longitude = $request->longitude;
        $user->latitude = $request->latitude;
        $user->save();

        return redirect('/profile_BS')->with('success', 'Data saved successfully!');
    }

    public function data_pembuangan(){
        $result = User::all();
        $pembuangan = pembuangan::all();
        return view('data_pembuangan', ['key' => 'data_pembuangan', 'result' => $result, 'pembuangan' => $pembuangan]);
    }

    public function aksiPembuangan(Request $request, $id){
        
        $pembuangan = pembuangan::find($id);

        if (!$pembuangan){
            return redirect('/data_pembuangan')->with('error', 'Pengajuan not found');
        }

        switch ($request->action){
            case 'acc':
                $pembuangan->status = 'Pengajuan Diterima';
                Session::flash('alert', 'Status berhasil diubah!');
                break;

            case 'decline':
                $pembuangan->status = 'Pengajuan Ditolak';
                Session::flash('alert', 'Status berhasil diubah!');
                break;

            default:
            break;
        }
        $pembuangan->save();
        return redirect('/data_pembuangan')->with('success', 'Status berhasil di update');
    
    }


}

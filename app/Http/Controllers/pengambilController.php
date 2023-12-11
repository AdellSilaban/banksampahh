<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Support\Facades\Session;
use App\pengguna;
use App\paket;
use App\pengajuan;
use App\pembuangan;

class pengambilController extends Controller
{
    public function home_PS(){
        $datapembuanganrequest = pembuangan::where('id', Auth::user()->id)->get();
        return view('home_PS', ['key' => 'home_PS', 'datapembuanganrequest' => $datapembuanganrequest]);
    }

    public function validasi_data(Request $request){
        $result = pengajuan::all();
        $datapengajuan = pengajuan::with('user')->get();
        $bank = User::where('role', 'banksampah')->get();
        $pengguna = User::where('role', 'pengguna')->get();
        return view('validasi_data', ['key' => 'validasi_data', 'datapengajuan' => $datapengajuan, 'bank' =>$bank, 'pengguna' =>$pengguna, 'result' => $result]);
    }

    public function profile_PS(){
        $result = User::all();
        $profile =User::orderBy('id','desc')->paginate(10);
        Session::flash('alert', 'Data Longitude dan Latitude anda berhasil ditambahkan!');
        return view('profile_PS', ['key' => 'profile_PS', 'profile' => $profile]);
        

    }

    public function saveLocationPS(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Update the Lokasi coordinates
        $user->longitude = $request->longitude;
        $user->latitude = $request->latitude;
        $user->save();

        return redirect('/profile_PS')->with('success', 'Data saved successfully!');
    }

    public function aksiPengajuan(Request $request, $id){
    
        $pengajuan = pengajuan::find($id);
    
        if (!$pengajuan){
            return redirect('/validasi_data')->with('error', 'Pengajuan not found');
        }
    
        switch ($request->action){
            case 'acc':
                $pengajuan->status = 'Acc';
                Session::flash('alert', 'Status berhasil diganti menjadi ACC');
                break;
    
            case 'jemput_sampah':
                $pengajuan->status = 'Jemput Sampah';
                Session::flash('alert', 'Status berhasil diganti menjadi Jemput Sampah');
                break;
    
            case 'ambil_sampah':
                $pengajuan->status = 'Ambil Sampah';
                Session::flash('alert', 'Status berhasil diganti menjadi Ambil Sampah');
                break;
                
            dd($pembuangan->status);
            default:
            break;
        }
        $pengajuan->save();
        return redirect('/validasi_data')->with('success', 'Status berhasil di update');
    
    }


    public function ajukan_pembuangan(Request $request){

        $request->validate([
            'tgl_pembuangan' => 'required|date',
            
        ]);

        pembuangan::create([
            'id' => Auth::user()->id, 
            'nama_petugas' => $request->nama_lengkap, 
            'no_tlp_petugas' =>$request->no_tlp,
            'kapasitas_an'=> $request->kapasitas_an,
            'kapasitas_or'=> $request->kapasitas_or,
            'nama_instansi'=> $request->nama_instansi,
            'tgl_pembuangan'=> $request->tgl_pembuangan,
            'status' => 'Proses Validasi',
            ]);

        return redirect('/home_PS')->with('flash_type', 'success');
    }

    

    
    }


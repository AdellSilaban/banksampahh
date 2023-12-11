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


class penggunaController extends Controller
{

    public function home_PG(){
        $datapengajuan = pengajuan::where('id', Auth::user()->id)->get();
        $total =  pengajuan::sum('kapasitas_or');
        $total1 = pengajuan::sum('kapasitas_an');
        return view('home_PG', ['key' => 'home_PG', 'datapengajuan' => $datapengajuan, 'total' => $total, 'total1' => $total1]);
    }

    
      public function profile_PG(){
        $result = User::all();
        $profile =User::orderBy('id','desc')->paginate(10);
        return view('profile_PG', ['key' => 'profile_PG', 'profile' =>$profile, 'result' => $result]);
        Session::flash('alert', 'Data Longitude dan Latitude anda berhasil ditambahkan!');
  
    }




public function saveLocation(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Update the Lokasi coordinates
        $user->longitude = $request->longitude;
        $user->latitude = $request->latitude;
        $user->save();
        return redirect('/profile_PG')->with('alert', 'Longitude dan Latitude Berhasil Ditambahkan!');
    }


        public function transaksi(){
            $data = paket::all();
            $data2 = User::all();
             return view('transaksi', ['key' => 'transaksi', 'data' => $data, 'data2' => $data2]);
         }

        
         public function paket_pelanggan(){
            $pengambil = User::where('role', 'pengambil')->get();
            return view('paket_pelanggan',['key' => 'paket_pelanggan', 'pengambil' =>$pengambil ]);
            Session::flash('alert', 'Form pengajuan anda berhasil ditambahkan. Tunggu proses validasi dari petugas!');
            
        }

        public function simpanPengajuan(Request $request){
            $request->validate([
                'nama_petugas' => 'required|string',
                'tgl_pengajuan' => 'required|date',
                'kapasitas_or' => 'required|numeric|min:0',
                'kapasitas_an' => 'required|numeric|min:0',
                
            ]);
    
            pengajuan::create([
                'id' => Auth::user()->id, 
                'tgl_pengajuan'=> $request->tgl_pengajuan,
                'nama_lengkap' => Auth::user()->nama_lengkap,
                'nama_petugas' => $request->nama_petugas,
                'kapasitas_or'=>$request->kapasitas_or,
                'kapasitas_an'=>$request->kapasitas_an,
                'status' => 'Proses Validasi',
                ]);
            return redirect('/home_PG')->with('flash_type', 'success');
        }

    

    public function bayar(){
        return view('/bayar');
    }


        }
        
    


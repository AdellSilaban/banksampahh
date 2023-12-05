<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Factory;
use App\pengguna;
use App\paket;
use App\User;
use App\pengajuan;


class penggunaController extends Controller
{

    public function home_PG(){
        $datapengajuan = pengajuan::where('id', Auth::user()->id)->get();
        return view('home_PG', ['key' => 'home_PG', 'datapengajuan' => $datapengajuan]);
    }

    public function profile_PG(){
        $result = User::all();
        $profile =User::orderBy('id','desc')->paginate(10);
        return view('profile_PG', ['key' => 'profile_PG', 'profile' =>$profile, 'result' => $result]);
    //     $user = auth()->user(); // Mendapatkan objek pengguna yang sedang login
    //     $profile = User::where('username', $user->username)->first();
    //      if ($profile) {
    //         // Jika profil sudah diisi, tampilkan data profil
    //          return view('showProfile', compact('profile'));
    //      } else {
    //         // Jika profil belum diisi, tampilkan form
    //          return view('/profile_PG');
    //      }
    }

    // public function profile_PG(){
    //     $user = auth()->user(); // Mendapatkan objek pengguna yang sedang login
    //     $profile = User::where('id', $user->id)->first();

    //     if ($profile) {
    //         // Jika profil sudah diisi, tampilkan data profil
    //         return view('showProfile', compact('profile'));
    //     } else {
    //         // Jika profil belum diisi, tampilkan form
    //         return view('/profile_PG');
    //     }
    // }


public function saveLocation(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Update the Lokasi coordinates
        $user->longitude = $request->longitude;
        $user->latitude = $request->latitude;
        $user->save();

        return redirect('/profile_PG')->with('success', 'Data saved successfully!');
    }

        
    //  public function profilePengguna(Request $request)
    //  {   
    //      $username = Auth::User()->username ?? '';
    //      $result = User::where('username', $username)->first();
    //          pengguna::create([
    //              'nama_lengkap'=>$request->nama_lengkap,
    //              'no_tlp'=> $request->no_tlp,
    //              'alamat'=> $request->alamat,
    //              'latitude'=> $request->latitude,
    //             'longitude'=> $request->longitude
    //         ]);
    //          return redirect('/profile_settings');
    //     }

        public function transaksi(){
            $data = paket::all();
            $data2 = User::all();
             return view('transaksi', ['key' => 'transaksi', 'data' => $data, 'data2' => $data2]);
         }

        
        public function paket(){
            $langganan = paket::all();
            return view('paket', ['key' => 'paket', 'langganan' => $langganan]);
        }

        public function simpanPengajuan(Request $request){
            $request->validate([
                'tgl_pengajuan' => 'required|date',
                'kapasitas_or' => 'required|numeric|min:0',
                'kapasitas_an' => 'required|numeric|min:0',
                
            ]);

            pengajuan::create([
                'id' => Auth::user()->id, 
                'tgl_pengajuan'=> $request->tgl_pengajuan,
                'kapasitas_or'=> $request->kapasitas_or,
                'kapasitas_an'=> $request->kapasitas_an,
                'status' => 'Proses Validasi',
                ]);
            return redirect('/home_PG')->with('flash_type', 'success');
        }

        public function validasi_data(Request $request){
            $datapengajuan = pengajuan::with('user')->get();
            return view('validasi_data', ['key' => 'validasi_data', 'datapengajuan' => $datapengajuan]);
        }

        public function aksiPengajuan(Request $request, $id){
        
        $pengajuan = pengajuan::find($id);

        if (!$pengajuan){
            return redirect('/validasi_data')->with('error', 'Pengajuan not found');
        }

        switch ($request->action){
            case 'acc':
                $pengajuan->status = 'Acc';
                break;

            case 'jemput_sampah':
                $pengajuan->status = 'Jemput Sampah';
                break;

            case 'ambil_sampah':
                $pengajuan->status = 'Ambil Sampah';
                break;

            default:
            break;
        }
        $pengajuan->save();
        return redirect('/validasi_data')->with('success', 'Status berhasil di update');
    
    }


        }
        
    


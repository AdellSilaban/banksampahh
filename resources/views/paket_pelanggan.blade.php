@extends('layouts.main')
@section('header')

<ul>
    <li><a {{$key=='home_PG'?'active':''}} href="/home_PG">Home</a></li>
    <li><a {{$key=='profile_PG'?'active':''}} href="/profile_PG">Profile</a></li>
    <li><a {{$key=='paket_pelanggan'?'active':''}} href="/paket_pelanggan">Berlangganan</a></li>
    <li><a {{$key=='transaksi'?'active':''}} href="/transaksi">Transaksi</a></li>
    <li><a {{$key=='logout'?'active':''}} href="/logout">Logout</a></li>
</ul>

  @endsection
@section('grafik')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>


<main id="main">
    {{-- <form method="get" action="/paket" > --}}
    <section id="content" class="content">
      <div class="container">
<section id="content" class="content">
    <div class="container" data-aos="fade-up">
        <center><h5>PILIH PAKET  BERLANGGANAN ANDA</h5></center>
        <center><h7>Tingkatkan kepedulian lingkungan dengan berlangganan paket sampah! Dengan setiap langganan, Anda bukan hanya membuang sampah, tetapi juga turut serta dalam upaya pelestarian lingkungan. Satu langganan, satu langkah kecil menuju dunia yang lebih bersih dan lestari. </h7></center>
      <section class="margin-content">
        

            <center><label>Form Pengajuan</label> </center>
            <br>
            <br>
                <form method="post" action="/simpanPengajuan">
                    @csrf
                    <div class="form-group" >
                      <label for="nama_lengkap">Nama Pengguna</label>
                      <input type="email" class="form-control" id="nama_lengkap" value={{Auth::user() ->nama_lengkap ?? '' }}  readonly>
                        <br>
                    </div>
                    <div class="form-group">
                      <label for="latitude">latitude</label>
                      <input type="text" class="form-control" id="latitude" placeholder="latitude" value={{Auth::user() ->latitude ?? '' }} readonly>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="longitude">longitude</label>
                        <input type="text" class="form-control" id="longitude" placeholder="longitude" value={{Auth::user() ->longitude ?? '' }} readonly>
                      </div>
                      <br>
                      <div class="form-group">
                        <label for="tgl_pengajuan">Tanggal Pengajuan</label>
                        <input type="date" class="form-control" id="tgl_pengajuan" name="tgl_pengajuan" placeholder="tgl_pengajuan">
                      </div>
                      <br>
                      <div class="form-group">
                        <label for="kapasitas_or">Kapasitas Sampah Organik (Kg)</label>
                        <input type="text" class="form-control" id="kapasitas_or" name="kapasitas_or" placeholder="kapasitas_or">
                      </div>
                      <br>

                      <div class="form-group">
                        <label for="kapasitas_an">Kapasitas Sampah Anorganik (Kg)</label>
                        <input type="text" class="form-control" id="kapasitas_an" name="kapasitas_an" placeholder="kapasitas_an">
                      </div>
                      <br>
                      <br>

                    <button type="submit" class="btn btn-primary">Ajukan</button>
                  </form>
           
       
        
        </div>
    </form>
    </form>


</main>
@endsection
   

   
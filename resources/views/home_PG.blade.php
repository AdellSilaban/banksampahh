@extends('layouts/main')
@section('header')
<ul>
  <li><a {{$key=='home_PG'?'active':''}} href="/home_PG">Home</a></li>
  <li><a {{$key=='profile_PG'?'active':''}} href="/profile_PG">Profile</a></li>
  <li><a {{$key=='paket_pelanggan'?'active':''}} href="/paket_pelanggan">Berlangganan</a></li>
  <li><a {{$key=='transaksi'?'active':''}} href="/transaksi">Transaksi</a></li>
  <li><a {{$key=='logout'?'active':''}} href="/logout">Logout</a></li>
</ul>

@endsection
<br>
<br>


@section('grafik')
<center><h5 class="bold">Daftar Jumlah Sampah Organik dan Anorganik kamu Per-bulan</h5></center>
  
<br>
<center>
  <div class="row">
    <div>
      <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
        <div class="card-body">
          <center><h5 class="card-title">Sampah Organik</b></h5></center>
          <center><h5 class="card-title">45</b></h5></center>
          <center><h5 class="card-title">(Kg/bulan)</b></h5></center>
        </div>
      </div>
    </div>  
    <div>
      <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
        <div class="card-body">
          <center><h5 class="card-title">Sampah Anorganik</b></h5></center>
          <center><h5 class="card-title">20</b></h5></center>
          <center><h5 class="card-title">(Kg/bulan)</b></h5></center>
        </div>
      </div>
    </div>
  </div>
</center>    
      </div>
<br>
<br>
<br>
<br>

    <center><h5 class="bold">Data Pengajuan Sampah</h5></center>
    <table class="table table-striped">
      <thead>
        <tr>
          {{-- <th>No</th> --}}
          {{-- <th>Nama Pengguna</th> --}}
          <th>Tanggal Pengajuan</th>
          <th>Kapasitas Sampah Organik (Kg)</th>
          <th>Kapasitas Sampah Anorganik (Kg)</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach($datapengajuan as $tampil)
        <tr>
          {{-- <td>{{$tampil->$id}}</td> --}}
          {{-- <td>{{$tampil->nama_lengkap}}</td>  --}}
          <td>{{$tampil->tgl_pengajuan}}</td>
          <td>{{$tampil->kapasitas_or}}</td>
          <td>{{$tampil->kapasitas_an}}</td>
          <td>{{$tampil->status}}</td>
        </tr>
      @endforeach
      </tbody>
    </table>

@endsection

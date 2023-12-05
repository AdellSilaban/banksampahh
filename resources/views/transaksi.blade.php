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
<center><h5 class="bold">Data Transaksi</h5></center>
<br>
<table class="table table-striped">
      <thead>
        <tr>
          @foreach ($data as $data2=> $coba)
          <th>No</th>
          <th>Nama Pengguna</th>
          <th>Alamat</th>
          <th>Total Berat Sampah (Kg)</th>
          <th>Total Tagihan</th>
          <th>Upload transaksi</th>
          <th>Tanggal transaksi</th>
          <th>Status transaksi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th>{{$coba->id_paket}}</th>
          <td>{{$coba->nama_lengkap}}</td>
          <td>{{$coba->longitude}}</td>
          <td>{{$coba->kapasitas}}</td>
          <td>{{$coba->harga}}</td>
          <td>
            <a class="btn btn-secondary" href="#" role="button"><i class="bi bi-upload"></i></a> 
          </td>
          <td>
            12/03/2023
          </td>
          <td>
            Pembayaran Berhasil
          </td>
        </tr>
      </tbody>
    </table>
    @endforeach
@endsection

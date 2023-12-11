@extends('layouts/main')
@section('header')
<ul>
    <li><a {{$key=='home_BS'?'active':''}} href="/home_BS">Home</a></li>
    <li><a {{$key=='paket_pelanggan'?'active':''}} href="/paket_pelanggan">Validasi Data Pembuangan</a></li>
    <li class="dropdown"><a href="#"><span>Data</span> <i class="bi bi-chevron-down"></i></a>
        <ul>
          <li><a href="/data_petugas">Data Petugas</a></li>
          <li><a href="/data_pengguna">Data Pengguna</a></li>
           
      </li>
</ul>
<li><a {{$key=='logout'?'active':''}} href="/logout">Logout</a></li>

@endsection
<br>
<br>
<br>
<br>
<br>

@section('grafik')

<center><h5 class="bold">Data Pengguna</h5></center>
<br>
<table class="table table-striped">
  <thead>
    
    <tr>
      {{-- <th>ID</th> --}}
      <th>Nama Pengguna</th>
      <th>Nomor Telepon</th>
      <th>Email</th>
      <th>Longitude</th>
      <th>Latitude</th>
      
    </tr>

  </thead>
  <tbody>
    @foreach($users as $tampil)
    <tr>
      {{-- <td>{{$tampil->$id}}</td> --}}
      <td>{{$tampil->nama_lengkap}}</td>
      <td>{{$tampil->no_tlp}}</td>
      <td>{{$tampil->email}}</td>
      <td>{{$tampil->longitude}}</td>
      <td>{{$tampil->latitude}}</td>
    </tr>
  @endforeach
  </tbody>
</table>

@endsection


@extends('layouts/main')
@section('header')
<ul>
    <li><a {{$key=='home_BS'?'active':''}} href="/home_BS">Home</a></li>
    <li><a {{$key=='profile_BS'?'active':''}} href="/profile_BS">Profile</a></li>
    <li><a {{$key=='data_pembuangan'?'active':''}} href="/data_pembuangan">Validasi Data Pembuangan</a></li>
    <li class="dropdown"><a href="#"><span>Data</span> <i class="bi bi-chevron-down"></i></a>
        <ul>
          <li><a href="/data_petugas">Data Petugas</a></li>
          <li><a href="/data_pengguna">Data Pengguna</a></li>
        </ul>
      <li><a {{$key=='logout'?'active':''}} href="/logout">Logout</a></li>
</ul>
@endsection

@section('grafik')
<br>
<br>
<br>

    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Data Instansi
      </a>
      <li class="list-group-item">
        <span>Nama Instansi :</span>
        {{Auth::user() ->nama_instansi ?? '' }}
    </li>

    <li class="list-group-item">
      <span>Alamat :</span>
      {{Auth::user() ->alamat ?? '' }}
  </li>

  <li class="list-group-item">
    <span>Longitude :</span>
    {{Auth::user() ->longitude ?? '' }}
</li>

<li class="list-group-item">
  <span>Latitude :</span>
  {{Auth::user() ->latitude ?? '' }}
</li>


    </div>


@endsection

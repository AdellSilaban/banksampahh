@extends('layouts/main')
@section('header')
<ul>
    <li><a {{$key=='home_BS'?'active':''}} href="/home_BS">Home</a></li>
    <li><a {{$key=='dataPengajuan_PS'?'active':''}} href="/dataPengajuan_PS">Validasi Data Pembuangan</a></li>
    <li class="dropdown"><a href="#"><span>Data</span> <i class="bi bi-chevron-down"></i></a>
        <ul>
          <li><a href="/data_petugas">Data Petugas</a></li>
          <li><a href="#">Data Pengguna</a></li>
           
      </li>
      <li><a {{$key=='logout'?'active':''}} href="/logout">Logout</a></li>
</ul>
@endsection

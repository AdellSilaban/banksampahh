@extends('layouts/main')
@section('header')
<ul>
<li><a {{$key=='home_PG'?'active':''}} href="/home_PS">Home</a></li>
<li><a {{$key=='profile_PS'?'active':''}} href="/profile_PS">Profile</a></li>
<li class="dropdown"><a href="#"><span>Data Pengajuan</span> <i class="bi bi-chevron-down"></i></a>
    <ul>
      <li><a href="/validasi_data">Data Pengajuan Pengguna</a></li>
      <li><a href="/ajukan_pembuangan">Data Pengajuan Pembuangan ke Bank Sampah</a></li>
    </ul>
<li><a {{$key=='logout'?'active':''}} href="/logout">Logout</a></li>
</ul>

@endsection



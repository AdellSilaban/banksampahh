@extends('layouts/main')
@section('header')
<ul>
<li><a {{$key=='home_PG'?'active':''}} href="/home_PS">Home</a></li>
<li><a {{$key=='validasi_data'?'active':''}} href="/validasi_data">Data Pengajuan Sampah</a></li>
<li><a {{$key=='logout'?'active':''}} href="/logout">Logout</a></li>
</ul>

@endsection



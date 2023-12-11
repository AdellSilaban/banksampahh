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
@section('grafik')
<br>
<br>



    <center><h5 class="bold">Data Ajuan Pembuangan</h5></center>
    
    <table class="table table-striped">
      <thead>
        <tr>
          {{-- <th>No</th> --}}
          {{-- <th>Nama Pengguna</th> --}}
          <th>Nama Petugas</th>
          <th>Total Sampah Organik (Kg)</th>
          <th>Total Sampah Anorganik (Kg)</th>
          <th>Bank Sampah</th>
          <th>Status</th>
          
        </tr>
      </thead>
      <tbody>
        @foreach($datapembuanganrequest as $tampil)
        <tr>
          {{-- <td>{{$tampil->$id}}</td> --}}
          <td>{{$tampil->nama_petugas}}</td> 
          <td>{{$tampil->kapasitas_or}} Kg</td>
          <td>{{$tampil->kapasitas_an}} Kg</td>
          <td>{{$tampil->nama_instansi}}</td>
          <td>{{$tampil->status}}</td>
        
        </tr>
      @endforeach
      </tbody>
    </table>


@endsection



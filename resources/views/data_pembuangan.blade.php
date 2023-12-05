@extends('layouts/main')
@section('header')
<ul>
    <li><a {{$key=='home_BS'?'active':''}} href="/home_BS">Home</a></li>
    <li><a {{$key=='data_pembuangan'?'active':''}} href="/data_pembuangan">Validasi Data Pembuangan</a></li>
    <li class="dropdown"><a href="#"><span>Data</span> <i class="bi bi-chevron-down"></i></a>
        <ul>
          <li><a href="/data_petugas">Data Petugas</a></li>
          <li><a href="#">Data Pengguna</a></li>
           
      </li>
</ul>
@endsection
<br>
<br>
<br>
<br>
<br>
<br>

<div class="container">

  <center>
      <h3>Daftar Pengajuan Pembuangan</h3>
      <h4>21 November 2022</h4>
  </center>
  <br/><br/>

  <table class="table table-hover">
      <thead>
          <tr>
          <th scope="col">ID Pengajuan</th>
          <th scope="col">tanggal Pengajuan</th>
          <th scope="col">Nama Pengguna</th>
          <th scope="col">Nomor Telepon</th>
          <th scope="col">Longitude</th>
          <th scope="col">Latitude</th>
          <th scope="col">Sampah Organik (Kg)</th>
          <th scope="col">Sampah Anorganik (Kg)</th>
          <th scope="col">Status</th>
          {{-- <th scope="col">Total Sampah</th> --}}
          <th scope="col">Aksi</th>
          </tr>
      </thead>
      <tbody>
          @foreach($datapengajuan as $tampil)
        <tr>
         <th scope="row">{{$tampil->id_pengajuan}}</th>
         <td>{{$tampil->tgl_pengajuan}}</td>
          <td>{{$tampil->user->nama_lengkap}}</td>
          <td>{{$tampil->user->no_tlp}}</td>
          <td>{{$tampil->user->longitude}}</td>
          <td>{{$tampil->user->latitude}}</td>
          <td>{{$tampil->kapasitas_or}}</td>
          <td>{{$tampil->kapasitas_an}}</td>
          <td>{{$tampil->status}}</td>
      
              <td><button type="button" class="btn btn-danger btn-sm"><i class="bi bi-check-lg">Acc</i> </button> /
              <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-x"></i></button> /
              <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-x"></i></button></td>
          </tr>
          @endforeach
      </tbody>
  </table>

</div>
<section>
</section>
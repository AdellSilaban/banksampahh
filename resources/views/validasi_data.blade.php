@extends('layouts/main')
@section('header')
<ul>
<li><a {{$key=='home_PG'?'active':''}} href="/home_PS">Home</a></li>
<li><a {{$key=='validasi_data'?'active':''}} href="/validasi_data">Data Pengajuan Sampah</a></li>
<li><a {{$key=='logout'?'active':''}} href="/logout">Logout</a></li>
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
      
              <td>
                <div class="btn-group" role="group" aria-label="aksi">
                <form method="post" action="{{url('/pengambilan/' . $tampil->id_pengajuan . '/action') }}">
                  @csrf
              <button type="submit" name="action" value="acc" class="btn btn-danger btn-sm">Acc</button> 
              <button type="submit" name="action" value="jemput_sampah" class="btn btn-warning btn-sm">Jemput Sampah</button>
              <button type="submit" name="action" value="ambil_sampah" class="btn btn-success btn-sm">Ambil Sampah</button>
                </form>
              </div>
            </td>
          </tr>
          @endforeach
      </tbody>
  </table>

</div>
<section>
</section>
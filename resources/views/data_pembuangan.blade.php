@extends('layouts/main')
@section('header')
<ul>
    <li><a {{$key=='home_BS'?'active':''}} href="/home_BS">Home</a></li>
    <li><a {{$key=='data_pembuangan'?'active':''}} href="/data_pembuangan">Validasi Data Pembuangan</a></li>
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
<br>

<div class="container">

  <center>
      <h3>Daftar Pengajuan Pembuangan</h3>
  </center>
  <br/><br/>

  <table class="table table-hover">
      <thead>
          <tr>
          {{-- <th scope="col">ID Pengajuan</th> --}}
          <th scope="col">Nama Pengaju</th>
          <th scope="col">Nomor Telepon</th>
          <th scope="col">Total Sampah Organik (Kg)</th>
          <th scope="col">Total Sampah Anorganik (Kg)</th>
          <th scope="col">Status</th>
          {{-- <th scope="col">Total Sampah</th> --}}
          <th scope="col">Aksi</th>
          </tr>
      </thead>
      {{-- {{dd($pembuangan)}} --}}
      <tbody>
          @foreach($pembuangan as $tampil)
        <tr>
         <td>{{$tampil->nama_petugas}}</td>
          <td>{{$tampil->no_tlp_petugas}}</td>
          <td>{{$tampil->kapasitas_or}}</td>
          <td>{{$tampil->kapasitas_an}}</td>
          <td>{{$tampil->status}}</td>
            
              <td>
            <div class="btn-group" role="group" aria-label="aksi">
            <form method="post" action="{{url('/pembuangan/' . $tampil->id_pembuangan  . '/action') }}">
              @csrf
              @method('PUT')
              <button type="submit" name="action" value="acc" class="btn btn-danger btn-sm"><i class="bi bi-check-lg"></i>Acc </button> /
              <button type="submit" name="action" value="decline" class="btn btn-danger btn-sm"><i class="bi bi-x"></i>Decline</button> 
            </td>
          </tr>
          @endforeach
      </tbody>
    </form>
  </table>

</div>

<!-- Di dalam template Blade view Anda -->
@if(Session::has('alert'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    // Tampilkan SweetAlert saat halaman dimuat
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: "{{ Session::get('alert') }}",
        confirmButtonText: 'OK'
    });
</script>
@endif



<section>
</section>
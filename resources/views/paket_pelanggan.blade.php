@extends('layouts.main')
@section('header')

<ul>
    <li><a {{$key=='home_PG'?'active':''}} href="/home_PG">Home</a></li>
    <li><a {{$key=='profile_PG'?'active':''}} href="/profile_PG">Profile</a></li>
    <li><a {{$key=='paket_pelanggan'?'active':''}} href="/paket_pelanggan">Jemput Sampah</a></li>
    <li><a {{$key=='transaksi'?'active':''}} href="/transaksi">Transaksi</a></li>
    <li><a {{$key=='logout'?'active':''}} href="/logout">Logout</a></li>
</ul>

  @endsection
@section('grafik')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>

<!-- Dalam bagian head -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- Sebelum penutupan tag </body> -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<style>
  /* Sesuaikan lebar dropdown sesuai kebutuhan Anda */
  .custom-dropdown {
      width: 1080px;
  }
</style>

<main id="main">
    {{-- <form method="get" action="/paket_pelanggan" > --}}
    <section id="content" class="content">
      <div class="container">
<section id="content" class="content">
    <div class="container" data-aos="fade-up">
        <center><h5>Form Pengajuan Jemput Sampah</h5></center>
        <center><h7>Berikan kontribusi positif Anda untuk lingkungan. Ayo, bawa sampah Anda, dan kami akan menjemputnya. Satu langkah kecil, dampak besar untuk bumi kita! </h7></center>
      <section class="margin-content">
        
            <br>
            <br>
                <form method="post" action="/simpanPengajuan">
                    @csrf
                    <div class="form-group" >
                      <label for="nama_lengkap">Nama Pengguna</label>
                      <input type="text" class="form-control" id="nama_lengkap"  value="{{Auth::user() ->nama_lengkap ?? '' }}"  readonly>
                    </div>  
                      <br>
                    <div class="form-group">
                      <label for="latitude">latitude</label>
                      <input type="text" class="form-control" id="latitude" placeholder="latitude" value="{{Auth::user() ->latitude ?? '' }}" readonly>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="longitude">longitude</label>
                        <input type="text" class="form-control" id="longitude" placeholder="longitude" value={{Auth::user() ->longitude ?? '' }} readonly>
                      </div>
                      <br>
                      <div class="form-group">
                        <label for="tgl_pengajuan">Tanggal Pengajuan</label>
                        <input type="date" class="form-control" id="tgl_pengajuan" name="tgl_pengajuan" placeholder="tgl_pengajuan">
                      </div>
                      <br>
                      <div class="form-group">
                        <label for="nama_petugas">Pilih Petugas</label>
                          <select name="nama_petugas" class="form-control">
                            @foreach($pengambil as $pengambil)
                            {{-- <option value="0">--pilih disini--</option> --}}
                            <option value="{{$pengambil->nama_lengkap}}">{{$pengambil->nama_lengkap}}</option>
                              @endforeach
                          </select>
                        </div>
                     
                      <br>

                      <div class="form-group">
                        <label for="kapasitas_or">Kapasitas Sampah Organik (Kg)</label>
                        <input type="text" class="form-control" id="kapasitas_or" name="kapasitas_or" placeholder="kapasitas_or">
                      </div>
                      
                      <div class="form-group">
                        <label for="kapasitas_an">Kapasitas Sampah Anorganik (Kg)</label>
                        <input type="text" class="form-control" id="kapasitas_an" name="kapasitas_an" placeholder="kapasitas_an">
                      </div>
                      <br>

                      
                      <br>
                      <br>

                    <button type="submit" class="btn btn-primary">Ajukan</button>
                  </form>
           
                  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                  <script>
                      $(document).ready(function() {
                          $('#pengambil').change(function() {
                              var selectedKategori = $(this).val();
                  
                              // Lakukan permintaan AJAX untuk mengambil data sesuai dengan pilihan kategori
                              $.ajax({
                                  type: 'GET',
                                  url: '/get-data/' + selectedpengambil,
                                  success: function(data) {
                                      // Tampilkan data di dalam result-container
                                      $('#result-container').html(data);
                                  },
                                  error: function(xhr, status, error) {
                                      console.error(xhr.responseText);
                                  }
                              });
                          });
                      });
                  </script>

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
        
        </div>
    </form>
    </form>


</main>
@endsection
   

   
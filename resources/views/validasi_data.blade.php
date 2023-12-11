@extends('layouts/main')
@section('header')
<ul>
<li><a {{$key=='home_PG'?'active':''}} href="/home_PS">Home</a></li>
<li><a {{$key=='profile_PS'?'active':''}} href="/profile_PS">Profile</a></li>
<li class="dropdown"><a href="#"><span>Data Pengajuan</span> <i class="bi bi-chevron-down"></i></a>
  <ul>
    <li><a href="/validasi_data">Data Pengajuan Pengguna</a></li>
    <li><a href="/form_pengajuanbuang">Data Pengajuan Pembuangan ke Bank Sampah</a></li>
  </ul>
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
<!-- Dalam bagian head -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- Sebelum penutupan tag </body> -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


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
          <th scope="col">Aksi</th>
          <th scope="col">Status</th>
          <th scope="col">Ajukan Pembuangan</th>
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
          <td>{{$tampil->status}}</td>
          <style>
            body {font-family: Arial, Helvetica, sans-serif;}
            
            /* The Modal (background) */
            .modal {
              display: none; /* Hidden by default */
              position: fixed; /* Stay in place */
              z-index: 1; /* Sit on top */
              padding-top: 100px; /* Location of the box */
              left: 0;
              top: 0;
              width: 100%; /* Full width */
              height: 100%; /* Full height */
              overflow: auto; /* Enable scroll if needed */
              background-color: rgb(0,0,0); /* Fallback color */
              background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            }
            
            /* Modal Content */
            .modal-content {
              background-color: #fefefe;
              margin: auto;
              padding: 20px;
              border: 1px solid #888;
              width: 80%;
            }
            
            /* The Close Button */
            .close {
              color: #aaaaaa;
              float: right;
              font-size: 28px;
              font-weight: bold;
            }
            
            .close:hover,
            .close:focus {
              color: #000;
              text-decoration: none;
              cursor: pointer;
            }
            </style>
            </head>
            <body>
            
            
            <!-- Trigger/Open The Modal -->
            <td><button id="myBtn" class="btn btn-danger">Ajukan</button></td>
            
            <!-- The Modal -->
            <div id="myModal" class="modal">
            
              <!-- Modal content -->
              <div class="modal-content">
                <span class="close">&times;</span>
                <center><h3>Form Pengajuan Pembuangan Sampah</h3><center>
                {{-- <form method="post" action="{{url('/ajukan_pembuangan/' . $tampil->id_pengajuan . '/action') }}"> --}}
                <form method="post" action="/ajukan_pembuangan">
                  @csrf
                  
                 <br>
                 <input type="number" name="id" hidden>
                                  <div class="form-group row">
                                    <br>
                                    <br>
                                    <br>
                                      <h5>Data Petugas</h5>
                                      <br>
                                    <br>
                                    <br>
                                      <label for="nama_lengkap" class="col-sm-1 col-form-label">Nama Petugas </label>
                                      <div class="col-sm-5">
                                          <input type="text" class="form-control  @error('nama_lengkap') is-invalid @else is-valid @enderror"
                                          id="nama_lengkap" name="nama_lengkap" value="{{Auth::user() ->nama_lengkap ?? '' }}" required readonly>
                                            
                                      </div>
                                      <label for="no_tlp" class="col-sm-1  col-form-label">No.Telepon</label>
                                      <div class="col-sm-4">
                                              <input type="text" class="form-control  @error('no_tlp') is-invalid @else is-valid @enderror"
                                              id="no_tlp" name="no_tlp" value="{{Auth::user() ->no_tlp ?? '' }}" required readonly>
                                          </div>
                                      </div>
                                      <br>

                                        {{-- Data Lengkap Kapasitas anor dan or --}}
                                        <div class="form-group row">
                                          @foreach($datapengajuan as $datapengajuan)
                                            <label for="kapasitas_or" class="col-sm-1  col-form-label">Total Sampah Organik</label>
                                            
                                            <div class="col-sm-5">
                                              <input type="text" class="form-control  @error('kapasitas_or') is-invalid @else is-valid @enderror"
                                              id="kapasitas_or" name="kapasitas_or" value="{{$datapengajuan->kapasitas_or}}" required readonly>
                                                </div>
                                                
                                                <label for="kapasitas_an" class="col-sm-1 col-form-label">Total Sampah Anorganik</label>
                                            <div class="col-sm-4">
                                              <input type="text" class="form-control  @error('kapasitas_an') is-invalid @else is-valid @enderror"
                                                    id="kapasitas_an" name="kapasitas_an" value="{{$datapengajuan->kapasitas_an}}" required readonly>
                                            </div>
                                            @endforeach
                                            
                                               
                                            </div>

                                        
                                    
                    <br>
                    <br>
                    <div class="form-group row">
                      <label for="nama_instansi" class="col-sm-1 col-form-label">Pilih Bank Sampah</label>
                      <div class="col-sm-5">
                        <select name="nama_instansi" class="form-control">
                          @foreach($bank as $bank)
                          <option value="{{$bank->nama_instansi}}">{{$bank->nama_instansi}}</option>
                            @endforeach
                        </select>
                      </div>

                        <label for="tgl_pembuangan" class="col-sm-1 col-form-label">Tanggal Pembuangan</label>
                        <div class="col-sm-4">
                        <input type="date" class="form-control" id="tgl_pembuangan" name="tgl_pembuangan" placeholder="tgl_pembuangan">
                      </div>
                    </div>
                      <br>
                      <br>
                      <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Simpan</button> 
              </div>
            
            </div>
            
            <script>
            // Get the modal
            var modal = document.getElementById("myModal");
            
            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");
            
            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];
            
            // When the user clicks the button, open the modal 
            btn.onclick = function() {
              modal.style.display = "block";
            }
            
            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
              modal.style.display = "none";
            }
            
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
              if (event.target == modal) {
                modal.style.display = "none";
              }
            }
            </script>
            </body>
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


          
          </tr>
          @endforeach
      </tbody>
  </table>

</div>
<section>
</section>
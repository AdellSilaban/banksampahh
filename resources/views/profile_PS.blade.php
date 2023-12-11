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
@section('grafik')

<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>


<form method="post" action="/saveLocationPS">
    @csrf
   <center><h5 class="bold">Profile Petugas</h5></center> 
   <br>
   <input type="number" name="id" hidden>
                    <div class="form-group row">
                        <label for="nama_lengkap" class="col-sm-1 col-form-label">Nama </label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control  @error('nama_lengkap') is-invalid @else is-valid @enderror"
                            id="nama_lengkap" name="nama_lengkap" value="{{Auth::user() ->nama_lengkap ?? '' }}" required readonly>
                              
                        </div>
                        <label for="email" class="col-sm-1  col-form-label">Email</label>
                        <div class="col-sm-4">
                                <input type="text" class="form-control  @error('email') is-invalid @else is-valid @enderror"
                                id="email" name="email" value="{{Auth::user() ->email ?? '' }}" required readonly>
                            </div>
                        </div>
    <br>

    <div class="form-group row">
        <label for="nama_lengkap" class="col-sm-1 col-form-label">Username </label>
        <div class="col-sm-5">
            <input type="text" class="form-control  @error('username') is-invalid @else is-valid @enderror"
            id="username" name="username" value="{{Auth::user() ->username ?? '' }}" required readonly>
              
        </div>
        <label for="no_tlp" class="col-sm-1  col-form-label">No.Telepon</label>
        <div class="col-sm-4">
                <input type="text" class="form-control  @error('no_tlp') is-invalid @else is-valid @enderror"
                id="no_tlp" name="no_tlp" value="{{Auth::user() ->no_tlp ?? '' }}" required readonly>
            </div>
        </div>
 

      <br>    
      <div class="form-group row">
            <label for="alamat" class="col-sm-1 col-form-label">Alamat </label>
            <div class="col-sm-10">
                <input type="text" name="alamat" class="form-control" placeholder="alamat" id="alamat">
              </div>
        </div>


          <br>
          <div id="map" style="height: 300px; width: 100%;">
          </div>
        </div>


    <br>
    <div class="form-group row">
      <label for="latitude" class="col-sm-1 col-form-label">latitude </label>
      <div class="col-sm-5">
        <input type="text" name="latitude" class="form-control" placeholder="Latitude" id="latitude">
      </div>
      <label for="longitude" class="col-sm-1  col-form-label">Longitude</label>
      <div class="col-sm-4">
        <input type="text" name="longitude" class="form-control" placeholder="Longitude" id="longitude">
      </div>
    </div>
</div>
                <br>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Simpan</button> 
  </form>

  <script>
    var mymap = L.map('map').setView([-7.801401, 110.365124], 16);
    
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(mymap);

    var marker = L.marker([0, 0], { draggable: true }).addTo(mymap);

    marker.on('dragend', function (event) {
        var marker = event.target;
        var position = marker.getLatLng();
        document.getElementById('latitude').value = position.lat;
        document.getElementById('longitude').value = position.lng;
    });

    mymap.locate({ setView: true, maxZoom: 16 });

    mymap.on('locationfound', function (e) {
        document.getElementById('latitude').value = e.latlng.lat;
        document.getElementById('longitude').value = e.latlng.lng;
        marker.setLatLng(e.latlng);
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

@endsection
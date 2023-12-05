@extends('layouts/main')
@section('header')
<ul>
  <li><a {{$key=='home_PG'?'active':''}} href="/home_PG">Home</a></li>
  <li><a {{$key=='profile_PG'?'active':''}} href="/profile_PG">Profile</a></li>
  <li><a {{$key=='paket_pelanggan'?'active':''}} href="/paket_pelanggan">Berlangganan</a></li>
  <li><a {{$key=='transaksi'?'active':''}} href="/transaksi">Transaksi</a></li>
  <li><a {{$key=='logout'?'active':''}} href="/logout">Logout</a></li>
</ul>

@endsection
<br>
<br>
<br>

@section('grafik')

{{-- @if(isset($profile))
        <!-- Tampilkan data profil -->
        <p>Nama Lengkap: {{ $profile->nama_lengkap }}</p>
        <p>Telepon: {{ $profile->no_tlp }}</p>
        <p>Alamat: {{ $profile->alamat }}</p>
        <p>Latitude: {{ $profile->latitude }}</p>
        <p>Longitude: {{ $profile->longitude }}</p>
        <a href="{{ url('/edit-profile') }}">Edit Profil</a>
    @else
@endif --}}


<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<form method="post" action="/saveLocation">
    @csrf
   <center><h5 class="bold">Profile Pengguna</h5></center> 
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
          <label for="alamat" class="col-sm-1  col-form-label">alamat</label>
          <div class="col-sm-10 ">
            <input type="text" name="alamat" class="form-control" placeholder="alamat">
          </div>

          <br>
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

  @endsection
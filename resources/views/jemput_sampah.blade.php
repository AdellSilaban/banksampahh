@extends('layouts.main_pg')
@section('content')

<main id="main">
    <section id="jemput" class="jemput">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Jemput Sampah</h2>
            <p>Mohon isi data ini dengan benar</p>
          </div>
  
          <div class="row">
  
            <div class="col-lg-5 d-flex align-items-stretch">
              <div class="info">
                <div class="address">
                  <i class="bi bi-geo-alt"></i>
                  <h4>Location:</h4>
                  <p>Jl. Tutul No.9, RT.11/RW.04, Papringan, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281</p>
                </div>
  
                <iframe src="map_654a09ea8a4e2251423763_container.coordinates.coordinate_654a09ea8a511447628701 = coordinate_654a09ea8a511447628701 = new google.maps.LatLng(-2.401183, 116.543652, true);" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
              </div>
  
            </div>
  
            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="nama">Nama Pengguna</label>
                    <input type="text" name="nama" class="form-control" id="nama" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="no_tlp">Nomor Telepon</label>
                    <input type="text" class="form-control" name="no_tlp" id="no_tlp" required>
                  </div>
                </div>
                <div class="form-group">
                <label for="name">kategori Sampah</label>
                    <select name="prodi" class="form-control">
                        <option value="0">--kategori Sampah--</option>
                        <option value="Sistem Informasi">Organik</option>
                        <option value="Arsitektur">Non-Organik</option>
                    </select>
                </div>
                
                <div class="form-group">
                  <label for="berat">Berat Sampah (Kg)</label>
                  <input type="berat" class="form-control" name="berat" id="berat" required> 
                </div>

                <div class="form-group">
                    <label for="tanggal_jemput">Tanggal Penjemputan</label>
                    <input type="date" class="form-control" name="tanggal_jemput" id="tanggal_jemput" required> 
                  </div>
                
                  <div class="form-group">
                    <label for="catatan">Catatan Tambahan (Opsional)</label>
                    <textarea class="form-control" name="catatan" rows="10" ></textarea>
                  </div>
  
                  <button type="button" class="btn btn-primary btn-lg btn-block">Kirim</button>
          </div>
  
        </div>
      </section>
  

  </main>

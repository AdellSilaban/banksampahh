<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
    <br>
    <br>
    <br>
    <div class="container">
        <div class="card card-container">
            
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form action="/simpan" method="post" class="form-signin">
                @csrf
                <input type="nama_lengkap" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required autofocus>
                <br>
                <input type="no_tlp" name="no_tlp" id="no_tlp" class="form-control" placeholder="Nomor Telepon" required>
                <br>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required >
                <br>
                <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                <br>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                <br>
                <div class="form-group">
                <select name="role" class="form-control">
                    <option value="0">--Pilih Role--</option>
                    <option value="pengguna">Pengguna</option>
                    <option value="pengambil">Pengambil Sampah</option>
                    <option value="banksampah">Bank Sampah</option>
                </select>
            </div>
                <br>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign Up</button>
            </form><!-- /form -->
            <a href="/login" class="register">
                Sudah ada akun? Sign In disini
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
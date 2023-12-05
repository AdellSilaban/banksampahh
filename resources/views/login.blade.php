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
            
                <form action="/ceklogin" method="POST" class="form-signin">
                    @csrf
                    <input type="text"  id="username" name="username" placeholder="Username" class="form-control" required autofocus>
                    <br>
                    <input type="password"  id="password" name="password" placeholder="Password" class="form-control" required>
                    
                    <br>
                    <button class="btn btn-primary btn-block btn-signin" type="submit">Sign in</button>
                </form><!-- /form -->
                <a href="/register" class="register">
                    Register Sekarang
                </a>
            </div><!-- /card-container -->
        </div><!-- /container -->
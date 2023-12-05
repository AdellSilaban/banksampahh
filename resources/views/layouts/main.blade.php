<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pradaemi</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="dasboard/img/favicon.png" rel="icon">
  <link href="dasboard/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="dasboard/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="dasboard/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="dasboard/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="dasboard/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="dasboard/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="dasboard/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="dasboard/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo" rel="apple-touch-icon"><a href="/home_PG"><img src="/assets/img/logo.png"></h1></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        @include('layouts.header')
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="about">
    @include('layouts.grafik')
  </section><!-- End Hero -->

  <main id="main">

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Pradaemi</h3>
      <p>Berpartisipasi dalam web aplikasi Bank Sampah memungkinkan Anda terhubung dengan komunitas yang peduli melalui jaringan sosial kami. Bagikan pencapaian daur ulang Anda, inspirasi ramah lingkungan, dan ajak teman-teman Anda untuk bergabung dalam perjalanan menyelamatkan bumi bersama-sama!</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>Pradaemi</span></strong>. All Rights Reserved
      </div>
      
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="dasboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="dasboard/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="dasboard/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="dasboard/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="dasboard/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="dasboard/js/main.js"></script>

</body>

</html>
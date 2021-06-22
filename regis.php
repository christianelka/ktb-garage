<?php
session_start();
if($_SESSION){
  header("Location: index.php");
}
include "include.php";

if(isset($_POST['daftar'])){
  $nama     =   $_POST['nama'];
  $no_hp    =   $_POST['no_hp'];
  $alamat   =   $_POST['alamat'];
  $email    =   $_POST['email'];
  $password =   $_POST['password'];

  $tambah = "INSERT INTO user (email, password, nama_user, no_hp, alamat, level) VALUES ('$email', '$password', '$nama', '$no_hp', '$alamat', 0)";
  $result = mysqli_query($hai, $tambah);

  if($result) header("Location: login.php?notif=true");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/KTBRENTLOGOS.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/artos.png" alt="">
        <span>KTB Garage</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="index.php#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="index.php#about">About</a></li>
          <li><a class="nav-link scrollto" href="index.php#services">Layanan</a></li>
          <li><a class="nav-link scrollto" href="index.php#portfolio">Armada</a></li>
          <li><a class="nav-link scrollto" href="index.php#team">Driver</a></li>
          <li><a href="">⠀</a></li>
          <li><a href="">⠀</a></li>
          <li><a href="">⠀</a></li>
          <li><a class="nav-link scrollto" href="#">Daftar</a></li>
          <li><a class="getstarted scrollto" href="login.php">Masuk</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

    <section class="login">
      <div class="container" data-aos="fade-up" data-aos-delay="200">
        <div class="col-lg-6 col-md-6 align-items-center justify-content-center  ms-auto me-auto">
          <div class="login-box">
            <h1>Register</h1>
            <hr>
            <form method="POST" action="regis.php">
              <label for="nama" class="form-label py-1">Nama</label><br>
              <input type="text" class="form-control ms-auto me-auto" style="width: 50%" name="nama"><br>
              <label for="no_hp" class="form-label py-1">Nomor HP</label><br>
              <input type="number" class="form-control ms-auto me-auto" style="width: 50%" name="no_hp"><br>
              <label for="username" class="form-label py-1">Alamat</label><br>
              <input type="text" class="form-control ms-auto me-auto" style="width: 50%" name="alamat"><br>
              <label for="email" class="form-label">Email</label><br>
              <input type="email" class="form-control ms-auto me-auto" style="width: 50%" name="email"><br>
              <label for="password" class="form-label">Password</label><br>
              <input type="password" class="form-control ms-auto me-auto" style="width: 50%" name="password"><br>
              <button type="submit" class="btn btn-primary" name="daftar">Daftar</button>
            </form>
          </div>
        </div>
      </div>
    </section>



  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>KTB Garage</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
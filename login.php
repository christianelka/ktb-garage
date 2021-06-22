<?php  
session_start();
if($_SESSION){
  header("Location: index.php");
}
include "include.php";
if (isset($_POST['masuk'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  $login = "SELECT * FROM user WHERE email='$email' AND password='$password'";
  $result = mysqli_query($hai, $login);

  if (mysqli_num_rows($result) == 0){
    echo "Login Gagal";
  } else {
    $cek = mysqli_fetch_assoc($result);
    if ($cek['level'] == 1){
      session_start();
      $_SESSION['loggedin']       = true;
      $_SESSION['id_user']  = $cek['id_user'];
      $_SESSION['email'] = $cek['email'];
      $_SESSION['nama'] = $cek['nama_user'];
      $_SESSION['no_hp'] = $cek['no_hp'];
      $_SESSION['alamat'] = $cek['alamat'];
      $_SESSION['level'] = $cek['level'];
      header("location: index.php");
    } else if ($cek['level'] == 2){
      session_start();
      $_SESSION['loggedin']       = true;
      $_SESSION['id_user']  = $cek['id_user'];
      $_SESSION['email'] = $cek['email'];
      $_SESSION['nama'] = $cek['nama_user'];
      $_SESSION['no_hp'] = $cek['no_hp'];
      $_SESSION['alamat'] = $cek['alamat'];
      $_SESSION['level'] = $cek['level'];
      header("location: admin/");
    } else {
      header("location: login.php");
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login</title>
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
          <li><a class="nav-link scrollto" href="regis.php">Daftar</a></li>
          <li><a class="getstarted scrollto" href="#">Masuk</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

    <section class="login">
      <div class="container" data-aos="fade-up" data-aos-delay="200">
        <div class="col-lg-6 col-md-6 justify-content-center align-items-center me-auto ms-auto">
          <div class="login-box">
            <?php if(isset($_GET['notif'])){?>
            <div class="alert alert-success alert-dismissible fade show" role="alert" data-aos="fade-up">
              <strong>Berhasil Mendaftar</strong>
              <p>Silahkan masuk menggunakan akun kamu!</p>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php }?>  
            <h1>Login</h1>
            <hr>
            <form method="POST" action="login.php">
              <label for="email" class="form-label">E-mail</label><br>
              <input type="email" class="form-control ms-auto me-auto" style="width: 50%" name="email" placeholder="Email"><br>
              <label for="email" class="form-label"><h2>Password</h2></label><br>
              <input type="password" class="form-control ms-auto me-auto" style="width: 50%" name="password" placeholder="********"><br><br>
              <button type="submit" name="masuk" class="btn btn-primary">Login</button>
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
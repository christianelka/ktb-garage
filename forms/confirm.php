<?php
include "../include.php";
session_start();
if (empty($_SESSION)){
  header("Location: ../login.php");
}
if (empty($_GET['id_pesan'])){
  header("Location: ../");
}
if($_SESSION && $_SESSION['level'] == 2){
  header("Location: ../admin/"); 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>KTB Garage.com</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/KTBRENTLOGOS.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="../index.php" class="logo d-flex align-items-center">
        <img src="../assets/img/artos.png" alt="">
        <span>KTB Garage</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="../index.php#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="../index.php#about">About</a></li>
          <li><a class="nav-link scrollto" href="../index.php#services">Layanan</a></li>
          <li><a class="nav-link scrollto" href="../index.php#portfolio">Armada</a></li>
          <li><a class="nav-link scrollto" href="../index.php#team">Driver</a></li>
          <li><a href="">⠀</a></li>
          <li><a href="">⠀</a></li>
          <li><a href="">⠀</a></li>
          <?php  
           if (isset($_SESSION['email']) && $_SESSION['email'] != ""){
            echo '<li><a class="nav-link scrollto" href="../logout.php">Logout</a></li>';
           } else {
            echo '<li><a class="nav-link scrollto" href="../regis.php">Daftar</a></li>
          <li><a class="getstarted scrollto" href="../login.php">Masuk</a></li>';
           }
          ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">
  <section  id="form" class="hero">
    <div class="container">
      
      <div class="row d-flex"  data-aos="fade-up" >
        <header class="section-header">
          <h2></h2>
          <p>Halaman Konfirmasi</p>
        </header>
      </div>    

        <div class="col-md-6 m-auto" style="margin-top: 3%;">
          <?php if(isset($_GET['notif'])){?>
            <div class="alert alert-success alert-dismissible fade show" role="alert" data-aos="fade-up">
              Mobil Berhasil Disewa. Silahkan <strong>Screenshot</strong> halaman ini untuk bukti konfirmasi ke Tombol Whatsapp Dibawah.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <!-- <div class="alert alert-success alert-dismissible fade show" role="alert" data-aos="fade-up">
              <p class="mb-0">Atau klik tombol <strong>Cetak</strong> dibawah untuk menyimpan bukti sewa.</p>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> -->
          <?php }?>  
          <ul class="list-group shadow-sm" data-aos="zoom-in" data-aos-delay="150">
            <li class="list-group-item bg-light">
              <i class="fas fa-fw fa-user mr-1"></i>
              <h5 class="text-primary">Konfirmasi Data</h5>
            </li>
            <?php 
              $konf = "SELECT mobil.nama_mobil, user.nama_user, pesan.id_pesan, pesan.tanggal_sewa, pesan.waktu, pesan.lama, pesan.pilihan, pesan.id_driver, pesan.jumlah FROM pesan INNER JOIN mobil ON mobil.id_mobil = pesan.id_mobil INNER JOIN user ON user.id_user = pesan.id_user WHERE id_pesan = $_GET[id_pesan]";
              $result = mysqli_query($hai, $konf);

              if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){?>
                <li class="list-group-item"><strong>Kode Pemesanan : </strong>KTB<?php echo $row['id_pesan'] ?></li>  
                <li class="list-group-item"><strong>Nama Pemesan : </strong><?php echo $row['nama_user'] ?></li>
                <li class="list-group-item"><strong>Mobil Yang Akan Disewa : </strong><?php echo $row['nama_mobil'] ?></li>
                <li class="list-group-item"><strong>Tanggal Sewa : </strong><?php echo $row['tanggal_sewa'] ?></li>
                <li class="list-group-item"><strong>Jam Sewa : </strong><?php echo $row['waktu'] ?></li>
                <li class="list-group-item"><strong>Lama Pinjam : </strong><?php echo $row['lama'] ?> Hari</li>
                <li class="list-group-item"><strong>Pilihan : </strong>
                  <?php
                    if ($row['pilihan'] == 1 ){
                      echo "Dengan Driver";
                    } else {
                      echo "Tanpa Driver";
                    }
                  ?>
                </li>
                <li class="list-group-item"><strong>Nama Driver : </strong>
                  <?php 
                    if ($row['id_driver'] == 0){
                      echo "-";
                    } else {
                      $sopir = "SELECT driver.nama_driver FROM pesan INNER JOIN driver ON driver.id_driver = pesan.id_driver WHERE id_pesan = $_GET[id_pesan]";
                      $result = mysqli_query($hai, $sopir);

                      if(mysqli_num_rows($result) > 0){
                        while($row1 = mysqli_fetch_assoc($result)){
                        echo $row1['nama_driver'];
                      }}
                    }
                  ?>
                </li>
                <li class="list-group-item">
                  <a href="https://api.whatsapp.com/send?phone=081351880960&text=Hai!%20Saya%20ingin%20konfirmasi%20penyewaan%20mobil%20dengan%20kode%20pemesanan%20KTB<?php echo $row['id_pesan']?>" class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                      <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"></path>
                    </svg>
                    Konfirmasi
                  </a>
                </li>
            <?PHP }}?>
          </ul>

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
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/purecounter/purecounter.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script type="text/javascript">
    function changeFunc() {
      var selectBox = document.getElementById("selectBox");
      var selectedValue = selectBox.options[selectBox.selectedIndex].value;
      if (selectedValue=="1"){
        $('#textboxes1').show();
        $('#textboxes2').hide();
    } else if (selectedValue=="2"){
        $('#textboxes2').show();
        $('#textboxes1').hide();
    } else  {
        $('#textboxes1').hide();
        $('#textboxes2').hide();
    }
  }
</script>
</body>

</html>
<?php
include "../include.php";
session_start();
if (empty($_SESSION)){
  header("Location: ../login.php");
}
if (empty($_GET['id_mobil'])){
  header("Location: ../");
}
if($_SESSION && $_SESSION['level'] == 2){
  header("Location: ../admin/"); 
}
if (isset($_POST['konfir'])){
  $pilihan = $_POST['pilihan'];
  if ($pilihan == 1){
    $id_mobil     =   $_POST['id_mobil'];
    $tanggal      =   $_POST['tanggal'];
    $waktu        =   $_POST['waktu'];
    $lama_pinjam  =   $_POST['lama_pinjam'];
    $driver       =   $_POST['driver'];
    $jumlah1      =   $_POST['jumlah1'];
    $id_user      =   $_POST['id_user'];

    $cek = "INSERT INTO pesan (id_mobil, id_user, tanggal_sewa, waktu, lama, pilihan, id_driver, jumlah) VALUES ('$id_mobil', '$id_user', '$tanggal', '$waktu', '$lama_pinjam', '1', '$driver', '$jumlah1')";
    // $result = mysqli_query($hai, $cek);
    if (mysqli_query($hai, $cek) === TRUE )  {
      $last_id = $hai->insert_id;
      $cek1 = "UPDATE driver SET status = 0 WHERE id_driver = '$driver'";
      $result2 = mysqli_query($hai, $cek1);
      // echo "New record created successfully. Last inserted ID is: " . $last_id;
      header("Location: confirm.php?id_pesan=$last_id&notif=true");
    }
  } else if ($pilihan == 2){
    $id_mobil     =   $_POST['id_mobil'];
    $tanggal      =   $_POST['tanggal'];
    $waktu        =   $_POST['waktu'];
    $lama_pinjam  =   $_POST['lama_pinjam'];
    $driver       =   0;
    $jumlah2      =   $_POST['jumlah2'];
    $id_user      =   $_POST['id_user'];
    $cek = "INSERT INTO pesan (id_mobil, id_user, tanggal_sewa, waktu, lama, pilihan, id_driver, jumlah) VALUES ('$id_mobil', '$id_user', '$tanggal', '$waktu', '$lama_pinjam', '2', '0', '$jumlah2')";
    // $result = mysqli_query($hai, $cek);
    if (mysqli_query($hai, $cek) === TRUE )  {
      $last_id = $hai->insert_id;
      header("Location: confirm.php?id_pesan=$last_id&notif=true");
    }
  }
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
  <!--===== Form Section =====-->
  <section  id="form" class="hero overflow-auto">
    <form method="POST" action="form.php">
    <div class="container">
      
      <div class="row d-flex"  data-aos="fade-up" >
        <header class="section-header">
          <h2></h2>
          <p>Personal Data</p>
        </header>

        <div class="col-md-6"><!--===== Data Rental =====-->
          <div class="card shd" >
            <div class="card-body">
              <div class="row g-4">
                <?php
                $tampil = "SELECT * FROM mobil WHERE id_mobil = $_GET[id_mobil]";
                $result = $hai -> query($tampil);

                if($result->num_rows > 0){
                  while($row = $result->fetch_assoc()){?>
                  <div class="card-title">
                    <h5 class="text-primary">Data Rental</h5>
                    <hr />
                  </div>
                  <div class="col-md-12">
                    <label class="form-label">Mobil Yang Disewa</label>
                    <input type="hidden" name="id_mobil" value="<?php echo $row['id_mobil']?>">
                    <input type="text" class="form-control" id="nama_mobil" name="nama_mobil" value="<?php echo $row['nama_mobil']?>" disabled>
                  </div>

                  <div class="col-md-6">
                    <label for="" class="form-label">Tanggal Sawa</label>
                    <?php  
                    $month = date('m');
                    $day = date('d');
                    $year = date('Y');

                    $today = $year . '-' . $month . '-' . $day;
                    ?>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $today?>" required>
                  </div>
                  
                  <div class="col-md-6">
                    <label for="" class="form-label">Mulai Sewa</label>
                    <input type="time" class="form-control" id="waktu" name="waktu" placeholder="09:30 AM" required>
                  </div>

                  <div class="form-group">
                    <label for="people" data-aos="fade-up" data-aos-delay="350">Lama Pinjam</label>
                    <br>
                    <div class="form-check-inline">
                      <label class="form-check-label" for="radio1">
                        <input type="radio" name="lama_pinjam" class="form-check-input" id="radio1" value="1" checked>1 Hari
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label" for="radio1">
                        <input type="radio" name="lama_pinjam" class="form-check-input" id="radio1" value="4">4 Hari
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label" for="radio2">
                        <input type="radio" name="lama_pinjam" class="form-check-input" id="radio2" value="7">1 Minggu
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label" for="radio2">
                        <input type="radio" name="lama_pinjam" class="form-check-input" id="radio2" value="14">2 Minggu
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label" for="radio2">
                        <input type="radio" name="lama_pinjam" class="form-check-input" id="radio2" value="30">1 Bulan
                      </label>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <label class="form-label">Driver</label>
                    <select class="form-select mr-sm-2" id="selectBox" onchange="changeFunc();" required name="pilihan">
                      <option>Pilih Salah Satu</option>
                      <option value="1" name="pilihan">Dengan Driver</option>
                      <option value="2" name="pilihan">Tanpa Driver</option>
                    </select>
                  </div>

                  <div class="col-md-12" id="textboxes1" style="display:none;">
                    <?php 
                      $harga_mobil = $row['harga'];
                      $harga_sopir = 100000;

                      $jumlah = $harga_mobil + $harga_sopir;
                    ?>
                    <label class="form-label">Pilih Driver</label>
                    <select class="form-select mr-sm-2" required name="driver">
                      <option>Pilih Salah Satu</option>
                      <?php 
                        $driver = "SELECT * FROM driver WHERE status=1";
                        $result = mysqli_query($hai, $driver);

                        if (mysqli_num_rows($result) > 0){
                          while ($row = mysqli_fetch_assoc($result)){?>
                      <option value="<?php echo $row['id_driver']?>" nama="driver"><?php echo $row['nama_driver']?></option>
                      <?php }}?>
                    </select>
                    <hr>
                    <label class="form-label">Total Harga</label>
                    <input type="hidden" name="jumlah1" value="<?php echo $jumlah?>">
                    <input type="text" class="form-control" id="jumlah" name="jumlah" value="Rp <?php echo number_format($jumlah,2,',','.')?>" disabled required>
                  </div>

                  <div class="col-md-12" id="textboxes2" style="display:none;">
                    <label class="form-label">Total Harga</label>
                    <input type="hidden" name="jumlah2" value="<?php echo $harga_mobil?>">
                    <input type="text" class="form-control" id="jumlah" name="jumlah" value="Rp <?php echo number_format($harga_mobil,2,',','.')?>" disabled required>
                  </div>
              <?php }}?>  
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6"> <!--===== Data Client =====-->
          <div class="card shd"> 
            <div class="card-body">
              <div class="row g-3">
                <?php 
                $id_user = $_SESSION['id_user'];
                $pengguna = "SELECT * FROM user WHERE id_user = '$id_user'";
                $result = mysqli_query($hai, $pengguna);
                if (mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){?>
                
                <div class="card-title">
                  <h5 class="text-primary">Data Client</h5>
                  <hr />
                </div>
                <div class="col-md-12">
                  <label class="form-label">Nama Peminjam</label>
                  <input type="hidden" name="id_user" value="<?php echo $row['id_user']?>">
                  <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama_user']?>" disabled> 
                </div>

                <div class="col-md-12">
                  <label for="" class="form-label">Nomer Hp</label>
                  <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?php echo $row['no_hp']?>" disabled>
                </div>
                
                <div class="col-md-12">
                  <label for="" class="form-label">Alamat</label>
                  <input type="text" class="form-control" id="alamat" nama="alamat" value="<?php echo $row['alamat']?>" disabled>
                </div>

                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck" required="">
                    <label class="form-check-label" for="gridCheck" >
                      Data Sudah Benar
                    </label>
                  </div>
                </div>
                
                <div class="col-12">
                  <button type="submit" name="konfir" class="btn btn-primary">Submit</button>
                </div>
              <?php }}?>
              </div>
            </div>
          </div>
       </div>
    
    </div>
  </div>  
</form>
</section>

<!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Kontak</h2>
          <p>Hubungi Kami</p>
        </header>

        <div class="row gy-4">

          <div class="col-lg-6">

            <div class="row gy-4">
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Kantor Pusat</h3>
                  <p>Pakuwon Tower,<br>Menteng Dalam, Jakarta Selatan</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-telephone"></i>
                  <h3>Telepon</h3>
                  <p>(021) 876 766<br>(021) 558 766</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-envelope"></i>
                  <h3>Email</h3>
                  <p>info@KTBGarage.com<br>contact@KTBGarage.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-clock"></i>
                  <h3>Jam Layanan</h3>
                  <p>Senin - Jum'at<br>09.00 - 15.00</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" class="php-email-form">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Nama" required>
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Judul" required>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Pesan" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Pesan anda sudah terkirim, terimakasih!</div>

                  <button type="submit">Kirim Pesan</button>
                </div>

              </div>
            </form>

          </div>

        </div>

      </div>

    </section><!-- End Contact Section -->

  </main><!-- End #main -->

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
  <!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/purecounter/purecounter.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script>
  $('select#selectBox').change(function(){
      var value = $(this).val()
      if(value == '1'){
          $('#textboxes1').show()
          $('#textboxes2').hide()
      } else if (value == '2'){
          $('#textboxes2').show()
          $('#textboxes1').hide()
      }
  });
</script>
</body>

</html>
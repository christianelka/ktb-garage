<?php  
session_start();
include "../include.php";
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

    <!-- ======= Armada Section ======= -->
    <section id="portfolio" class="portfolio">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <p>Berbagai Macam Jenis Mobil Disewakan</p><br>
          <h2>Pilih Armada</h2>
        </header>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">Premium</li>
              <li data-filter=".filter-web">VIP</li>
              <li data-filter=".filter-card">VIP SUV</li>
            </ul>
          </div>
        </div>

        <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <!--===== Armada 1 =====-->
      <?php 
        $premi = "SELECT * FROM mobil WHERE kelas = 1";
        $result = mysqli_query($hai, $premi);

          while($row = mysqli_fetch_assoc($result)){?>          
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="card shd" > 
              <div class="portfolio-wrap">
                <img src="../assets/img/Armada/<?php echo $row['foto']?>" class="img-fluid" alt="">
              </div>
                <div class="card-body">
                  <h5 class="card-title" style="font-weight: bold;"><?php echo $row['nama_mobil'] ?></h5>
                  <div class="portfolio-info">
                    <p class="text-primary">
                      <?php 
                        if ($row['kelas'] == 1){
                          echo "Premium";
                        }
                      ?>
                    </p>
                    <p>Price : IDR <?php echo $row['harga']?> / day</p>
                  </div>
                  <div class="portfolio-links">
                    <button  type="button" style="float: right;" class="btn btn-outline-primary">
                      <a href="../forms/form.php?id_mobil=<?php echo $row['id_mobil']?>">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        
                      </svg>
                        Pesan Sekarang   <i class="bi bi-arrow-right"></i></a>
                    </button>
                  </div>
                </div>
            </div>
          </div>
          <?php }?>

          <!--===== Armada 2 =====-->
      <?php 
        $vip = "SELECT * FROM mobil WHERE kelas = 2";
        $result = mysqli_query($hai, $vip);

          while($row = mysqli_fetch_assoc($result)){?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="card shd" > 
              <div class="portfolio-wrap">
                <img src="../assets/img/Armada/<?php echo $row['foto']?>" class="img-fluid" alt="">
              </div>
                <div class="card-body">
                  <h5 class="card-title" style="font-weight: bold;"><?php echo $row['nama_mobil'] ?></h5>
                  <div class="portfolio-info">
                    <p class="text-primary">
                      <?php 
                        if ($row['kelas'] == 2){
                          echo "VIP";
                        }
                      ?>
                    </p>
                    <p>Price : IDR <?php echo $row['harga']?> / day</p>
                  </div>
                  <div class="portfolio-links">
                    <button  type="button" style="float: right;" class="btn btn-outline-primary">
                      <a href="../forms/form.php?id_mobil=<?php echo $row['id_mobil']?>">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        
                      </svg>
                        Pesan Sekarang   <i class="bi bi-arrow-right"></i></a>
                    </button>
                  </div>
                </div>
            </div>
          </div>
          <?php }?>

          <!--===== Armada 3 =====-->
      <?php 
        $suv = "SELECT * FROM mobil WHERE kelas = 3";
        $result = mysqli_query($hai, $suv);

          while($row = mysqli_fetch_assoc($result)){?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="card shd" > 
              <div class="portfolio-wrap">
                <img src="../assets/img/Armada/<?php echo $row['foto']?>" class="img-fluid" alt="">
              </div>
                <div class="card-body">
                  <h5 class="card-title" style="font-weight: bold;"><?php echo $row['nama_mobil']?></h5>
                  <div class="portfolio-info">
                    <p class="text-primary">
                      <?php 
                        if ($row['kelas'] == 3){
                          echo "VIP SUV";
                        }
                      ?>
                    </p>
                    <p>Price : IDR <?php echo $row['harga']?> / day</p>
                  </div>
                  <div class="portfolio-links">
                    <button  type="button" style="float: right;" class="btn btn-outline-primary">
                      <a href="../forms/form.php?id_mobil=<?php echo $row['id_mobil']?>">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        
                      </svg>
                        Pesan Sekarang   <i class="bi bi-arrow-right"></i></a>
                    </button>
                  </div>
                </div>
            </div>
          </div>
        <?php }?>

        </div>       

      </div>

    </section><!-- End Armada Section -->

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
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/purecounter/purecounter.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>
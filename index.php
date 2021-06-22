<?php  
session_start();
if($_SESSION && $_SESSION['level'] == 2){
  header("Location: admin/"); 
}
include "include.php";
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
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Layanan</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Armada</a></li>
          <li><a class="nav-link scrollto" href="#team">Driver</a></li>
          <li><a href="">⠀</a></li>
          <li><a href="">⠀</a></li>
          <li><a href="">⠀</a></li>
          <?php  
           if (isset($_SESSION['email']) && $_SESSION['email'] != ""){
            echo '<li><a class="nav-link scrollto" href="logout.php">Logout</a></li>';
           } else {
            echo '<li><a class="nav-link scrollto" href="regis.php">Daftar</a></li>
          <li><a class="getstarted scrollto" href="login.php">Masuk</a></li>';
           }
          ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          
          <h1 data-aos="fade-up">KTB Garage menyediakan layanan sewa mobil untuk segala kebutuhan anda</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Nikmati kemudahan sewa mobil diseluruh cabang KTB Garage di Indonesia</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="#services" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Sewa Sekarang!</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 2" data-aos="zoom-out" data-aos-delay="200">
          <img src="assets/img/2.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">

      <div class="container" data-aos="fade-up">
        <div class="row gx-0">

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h3>Siapa Kami</h3>
              <h2>KTB Garage memiliki armada beragam jenis mobil yang bisa anda sewa di seluruh cabang KTB Garage di Indoensia.
              </h2>
              <p>
                Mobil yang kami sediakan antara lain Avanza, Xenia, Ertiga, Alphard, Vellfire, Innova, Yaris, Mobilio, Jazz, Elf, Hiace dan masih banyak lagi. Selain menyediakan mobil kami juga memiliki beberapa unit Bus Besar dan Bus 3/4.
              </p>
              <div class="text-center text-lg-start">
                <a href="#services" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                  <span>Sewa Sekarang!</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/img/1.png" class="img-fluid" alt="">
          </div>

        </div>
      </div>

    </section><!-- End About Section -->

    <!-- ======= Layanan Section ======= -->
    <section id="services" class="services">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Layanan</h2>
        </header>

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <a href="armada/">
              <div class="service-box blue">
                <i class="ri-car-line icon"></i>
                <h3>Sewa Harian</h3>
                <p>Apabila anda memerlukan sewa mobil dengan durasi harian hingga mingguan, maka layanan sewa harian di KTB Garage adalah pilihan yang tepat.</p>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <a href="armada/">
              <div class="service-box orange">
                <i class="ri-car-line icon"></i>
                <h3>Sewa Bulanan</h3>
                <p>Apabila anda memerlukan sewa mobil dengan durasi bulanan atau tahuna untuk perusahaan anda, maka layanan sewa bulanan di KTB Garage adalah solusinya.</p>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <a href="armada/">
              <div class="service-box green">
                <i class="ri-car-line icon"></i>
                <h3>Sewa Dengan Sopir</h3>
                <p>Apabila anda memerlukan sewa mobil dengan mengedepankan privasi keluarga anda, maka layanan sewa mobil tanpa sopir di KTB Garage bisa menjadi pilihan anda.</p>
              </div>
            </a>
          </div>

        </div>

      </div>

    </section><!-- End Layanan Section -->

    <!-- ======= Armada Section ======= -->
    <section id="portfolio" class="portfolio">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Armada</h2>
          <p>Berbagai Macam Jenis Mobil</p>
        </header>

        <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
        <?php  
        $mobil = "SELECT * FROM mobil LIMIT 9";
        $result = mysqli_query($hai, $mobil);

          while($row = mysqli_fetch_assoc($result)){?>      
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/Armada/<?php echo $row['foto']?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><?php echo $row['nama_mobil']?></h4>
                <p>
                  <?php if ($row['kelas'] == 1){
                    echo "Premium";
                  } else if ($row['kelas'] == 2){
                    echo "VIP";
                  } else {
                    echo "VIP SUV";
                  }
                  ?>
                </p>
                <div class="portfolio-links">
                  <a href="assets/img/Armada/<?php echo $row['foto']?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="show car"><i class="bi bi-eye"></i></a>
                </div>
                <button class="btn btn-primary" name="" style="float:right;">
                    <a href="forms/form.php?id_mobil=<?php echo $row['id_mobil']?>" class="text-white" style="text-decoration: none;"><i class="fa fa-trash-o fa-plus-circle"></i> Tambah Mobil</a>
                </button>                
              </div>
            </div>
          </div>
          <?php }?>
        </div>

      </div>

    </section><!-- End Armada Section -->

    <!-- ======= Driver Section ======= -->
    <section id="team" class="team">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Driver</h2>
          <p>Driver Unggulan Kami</p>
        </header>


        <div class="row gy-4">
        <?php 
        $driver = "SELECT * FROM driver limit 4";
        $result = mysqli_query($hai, $driver);

          while($row = mysqli_fetch_assoc($result)){?>      
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/Driver/<?php echo $row['foto']?>" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4><?php echo $row['nama_driver']?></h4>
                <span>
                  <?php  
                    if ($row['level'] == 1){
                      echo "Driver Profesional";
                    } else {
                      echo "Driver Tambahan";
                    }
                  ?>
                </span>
                <p><?php echo $row['deskripsi']?></p>
              </div>
            </div>
          </div>
          <?php }?>
        </div>

      </div>

    </section><!-- End Driver Section -->

    <!-- ======= Testimoni Section ======= -->
    <section id="testimonials" class="testimonials">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Testimoni</h2>
          <p>Testimoni Pelanggan Setia Kami</p>
        </header>

        <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="200">
          <div class="swiper-wrapper">

            <?php
            $testi = "SELECT * FROM testi ORDER BY id_testi DESC limit 5";
            $result = mysqli_query($hai, $testi);

            while($row = mysqli_fetch_assoc($result)){?>      
              <div class="swiper-slide">
                <div class="testimonial-item">
                  <div class="stars">
                    <?php  
                      if ($row['rating'] == 5){
                        echo '<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>';
                      } else if ($row['rating'] == 4){
                        echo '<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>';
                      } else if ($row['rating'] == 3){
                        echo '<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>';
                      } else if ($row['rating'] == 2){
                        echo '<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>';
                      } else {
                        echo '<i class="bi bi-star-fill"></i>';
                      }
                    ?>
                  </div>
                  <p>
                    <?php echo $row['pesan']?>
                  </p>
                  <div class="profile mt-auto">
                    <img src="assets/img/Testimoni/<?php echo $row['gambar']?>" class="testimonial-img" alt="">
                    <h3><?php echo $row['nama_testi']?></h3>
                    <h4><?php echo $row['pekerjaan']?></h4>
                  </div>
                </div>
              </div>
            <?php }?>
            <!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- End Testimoni Section -->

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
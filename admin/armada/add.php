<?php  
session_start();
if (empty($_SESSION)){
    header("Location: ../../login.php");
}
if($_SESSION['level'] != 2){
  header("Location: ../../index.php"); 
}
include "../../include.php";

if (isset($_POST['register'])){
  
$nama_mobil = $_POST['nama_mobil'];
$kelas = $_POST['kelas'];
$harga = $_POST['harga'];
 
$rand = rand(0, 9999);
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
 
if(!in_array($ext,$ekstensi) ) {
    header("location:index.php?notif2=true");
}else{
    if($ukuran < 1044070){      
        $xx = $rand.'_'.$filename;
        move_uploaded_file($_FILES['foto']['tmp_name'], '../../assets/img/Armada/'.$rand.'_'.$filename);
        mysqli_query($hai, "INSERT INTO mobil VALUES(NULL,'$nama_mobil','$kelas','$harga','$xx')");
        header("location:index.php?notif3=true");
    }else{
        header("location:index.php?notif2=true");
    }
}   
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Panel - KTB Garage</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="../"><i class="fas fa-car-side fa-fw"></i> KTB Garade</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../../logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="../">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../history/">
                                        Riwayat Pemesanan
                                    </a>
                                    <a class="nav-link" href="../user/">
                                        Daftar User
                                    </a>
                                    <a class="nav-link" href="../armada/">
                                        Daftar Armada
                                    </a>
                                    <a class="nav-link" href="../driver/">
                                        Daftar Driver
                                    </a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION['nama']?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Daftar Armada</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../">Dashboard</a></li>
                            <li class="breadcrumb-item active">Armada</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Daftarkan Mobil melalui halaman ini.
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Armada
                                <button class="btn btn-primary" name="" style="float:right;">
                                    <a href="index.php" class="text-white" style="text-decoration: none;"><i class="fa fa-trash-o fa-arrow-left"></i> Kembali</a>
                                </button>
                            </div>
                            <form method="POST" action="" enctype="multipart/form-data">
                            <div class="card-body row g-3">
                                <div class="col-md-12">
                                  <label class="form-label">Nama Mobil</label>
                                  <input type="text" class="form-control" id="nama_mobil" name="nama_mobil" placeholder="Nama Mobil"> 
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Pilih Level</label>
                                    <select class="form-control" required name="kelas">
                                      <option>Pilih Salah Satu</option>
                                      <option value="1" nama="kelas">Premium</option>
                                      <option value="2" nama="kelas">VIP</option>
                                      <option value="3" nama="kelas">VIP SUV</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                  <label class="form-label">Harga</label>
                                  <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga Sewa"> 
                                </div>
                                <div class="col-md-12">
                                  <label class="form-label">Foto :</label>
                                    <input type="file" name="foto" required="required" class="form-control">
                                    <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>
                                </div>
                                <div class="col-12">
                                  <button type="submit" name="register" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            </form>                                    
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">&copy; Copyright KTB Garage. All Rights Reserved</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>

<?php  
session_start();
if (empty($_SESSION)){
    header("Location: ../../login.php");
}
if($_SESSION['level'] != 2){
  header("Location: ../../index.php"); 
}
include "../../include.php";
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
                        <h1 class="mt-4">Riwayat Pemesanan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../">Dashboard</a></li>
                            <li class="breadcrumb-item active">History</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <?php if(isset($_GET['notif1'])){ ?>
                                  <div class="alert alert-success shadow-sm alert-dismissible fade show">
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  Mobil Sudah Dikembalikan!!
                                  </div>
                                <?php }?>
                                <?php if(isset($_GET['notif2'])){ ?>
                                  <div class="alert alert-success shadow-sm alert-dismissible fade show">
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  Riwayat Sudah Dihapus!
                                  </div>
                                <?php }?>
                                Disini kita bisa melihat semua riwayat pemesanan dari member, dan disini kita juga bisa mengkonfirmasi apakah mobil sudah dimkebalikan atau belum.
                                .
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Pemesanan
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Kode Pemesanan</th>
                                            <th>Nama Pemesan</th>
                                            <th>Tipe Mobil</th>
                                            <th>Tanggal Sewa (Waktu Sewa)</th>
                                            <th>Lama Sewa</th>
                                            <th>Total Harga</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Kode Pemesanan</th>
                                            <th>Nama Pemesan</th>
                                            <th>Tipe Mobil</th>
                                            <th>Tanggal Sewa (Waktu Sewa)</th>
                                            <th>Lama Sewa</th>
                                            <th>Total Harga</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php  
                                          $riwayat = "SELECT mobil.nama_mobil, user.nama_user, pesan.id_pesan, pesan.tanggal_sewa, pesan.waktu, pesan.lama, pesan.pilihan, pesan.id_driver, pesan.jumlah, pesan.status FROM pesan INNER JOIN mobil ON mobil.id_mobil = pesan.id_mobil INNER JOIN user ON user.id_user = pesan.id_user";
                                          $result = mysqli_query($hai, $riwayat);

                                          if(mysqli_num_rows($result) > 0){
                                            while($row = mysqli_fetch_assoc($result)){?>
                                        
                                        <tr>
                                            <td style="width: 10%;"><?php echo "KTB".$row['id_pesan']?></td>
                                            <td style="width: 16%;"><?php echo $row['nama_user']?></td>
                                            <td style="width: 18%;"><?php echo $row['nama_mobil']?></td>
                                            <td style="width: 16%;"><?php echo $row['tanggal_sewa']." (".$row['waktu'].")"?></td>
                                            <td style="width: 8%;"><?php echo $row['lama']." Hari"?></td>
                                            <td style="width: 8%;"><?php echo $row['jumlah']?></td>
                                            <?php 
                                                if($row['status'] == 0){
                                                    echo '
                                                    <td class="text-warning" style="width: 12%;">Belum Dikembaliakn</td>
                                                    <td>
                                                      <button class="btn btn-success" name="">
                                                          <a href="cek.php?id_pesan='.$row['id_pesan'].'" class="text-white"><i class="fa fa-trash-o fa-check"></i></a>
                                                      </button>
                                                      <button class="btn btn-danger" name="">
                                                          <a href="delete.php?id_pesan='.$row['id_pesan'].'" class="text-white"><i class="fa fa-trash-o fa-trash"></i></a>
                                                      </button>
                                                    </td>';
                                                } else {
                                                    echo '
                                                    <td class="text-success" style="width: 12%;">Sudah Dikembalikan</td>
                                                    <td>
                                                      <button class="btn btn-danger" name="">
                                                          <a href="delete.php?id_pesan='.$row['id_pesan'].'" class="text-white"><i class="fa fa-trash-o fa-trash"></i></a>
                                                      </button>
                                                    </td>';
                                                }
                                            ?>                                                
                                            </td>
                                        </tr>
                                    <?php }}?>
                                    </tbody>
                                </table>
                            </div>
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

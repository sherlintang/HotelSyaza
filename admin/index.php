<?php 
session_start();

  // cek apakah yang mengakses halaman ini sudah login
if($_SESSION['role']==""){
  header("location:../index.php?pesan=gagal");
}

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi UKK 2022 | Pemesanan Hotel</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
      <div class="container">
        <a href="" class="navbar-brand">
          <span class="brand-text font-weight-light">Hotel Syaza</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
          <li class="nav-item">
              <a href="index.php" class="nav-link">Dashboard</a>
            </li>
            <li class="nav-item">
              <a href="kamar.php" class="nav-link">Kamar</a>
            </li>
            <li class="nav-item">
              <a href="fasilitas.php" class="nav-link">Fasilitas Kamar</a>
            </li>
            <li class="nav-item">
              <a href="fasilitas_hotel.php" class="nav-link">Fasilitas Hotel</a>
            </li>
            <li class="nav-item">
              <a href="logout.php" class="nav-link">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container">
          <div class="col-md-12">
            <div class="card card-outline card-info">
              <div class="card-body">
                <div class="row">

                  <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                      <div class="inner">

                        <p>Data Kamar</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-home"></i>
                      </div>
                      <a href="kamar.php" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                      <div class="inner">

                        <p>Fasilitas Kamar</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-list-alt"></i>
                      </div>
                      <a href="fasilitas.php" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                      <div class="inner">

                        <p>Fasilitas Hotel</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-user"></i>
                      </div>
                      <a href="fasilitas_hotel.php" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                      </a>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="../assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../assets/dist/js/adminlte.min.js"></script>
</body>
</html>
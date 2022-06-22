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
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
      <div class="container">
        <a href="assets/index3.html" class="navbar-brand">
          <span class="m-0">HOTEL SYAZA</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="index.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="kamar.php" class="nav-link">Kamar</a>
            </li>
            <li class="nav-item">
              <a href="fasilitas.php" class="nav-link">Fasilitas</a>
            </li>
            <li class="nav-item">
              <a href="login.php" class="nav-link">Login</a>
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
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <div class="content">
        <div class="container">
          <div class="col-md-12">
            <?php 
            if(isset($_GET['pesan'])){
              if($_GET['pesan']=="gagal"){?>
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan !!!</h5>
                  Mohon maaf anda tidak bisa mengakses halaman ini
                </div>
              <?php }} ?>
            </div>
          </div>
        </div>      

        <!-- Main content -->
        <div class="content">
          <div class="container">
            <div class="col-md-12">
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block w-100" src="assets/gambar/wphotel.jpeg"  height="450">
                      </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <form action="proses_pesan.php" method="POST">
              <div class="col-md-12">
                <div class="card-body">
                  <div class="row">
                    <label class="col-sm-2 col-form-label">Tanggal Check In</label>
                    <div class="col-sm-2">                  
                      <input type="date" name="tanggal_check_in" class="form-control" placeholder=".col-3">
                    </div>
                    <label class="col-sm-2 col-form-label">Tanggal Check Out</label>
                    <div class="col-sm-2">                  
                      <input type="date" name="tanggal_check_out" class="form-control" placeholder=".col-4">
                    </div>
                    <label class="col-sm-2 col-form-label">Jumlah Kamar</label>
                    <div class="col-sm-1">                  
                      <input type="text" name="jumlah_kamar" class="form-control" placeholder="Jumlah Kamar">
                    </div>
                    <div class="col-sm-1">
                      <button type="button" class="form-control btn btn-primary" data-toggle="modal" data-target="#pesan">Pesan</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="pesan">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Form Pemesanan</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label>ID Reservasi</label>
                        <input type="text" name="id_reservasi" class="form-control" placeholder="Masukan ID Reservasi" readonly>
                      </div>
                      <div class="form-group">
                        <label>Tanggal Reservasi</label>
                        <input type="date" name="tanggal_reservasi" class="form-control" placeholder="Tanggal Reservasi">
                      </div>
                      <div class="form-group">
                        <label>ID Tamu</label>
                        <input type="text" name="id_tamu" class="form-control" placeholder="Masukan ID Tamu">
                      </div>
                      <div class="form-group">
                        <label>Nama Tamu</label>
                        <input type="text" name="nama_tamu" class="form-control" placeholder="Masukan Nama Tamu">
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Masukan Email">
                      </div>
                      <div class="form-group">
                        <label>No.Handphone</label>
                        <input type="text" name="handphone" class="form-control" placeholder="Masukan No.Handphone">
                      </div>
                      <div class="form-group">
                        <label>Tipe Kamar</label>
                        <select name="tipe" class="form-control">
                          <option value="">--- Pilih Kamar ---</option>
                          <?php
                          include 'koneksi.php';
                          $data = mysqli_query($koneksi, "select * from kamar");
                          while ($d = mysqli_fetch_array($data)) { 
                            ?>
                            <option value="<?php echo $d['tipe']; ?>"><?php echo $d['tipe']; ?></option>
                            <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Konfirmasi Pesanan</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
            </form>
            <div class="card">
              <div class="col-md-12">
                <div class="card-body">
                  <h2 class="text-center">Tentang Kami</h2><br>
                  <p class="text-center">Hotel Syaza dirancang untuk menjadi hotel pilihan yang ramah bagi tamu-tamu yang ingin mendapatkan waktu bersantai dengan kualitas dan lingkungan yang ramah. Hotel Syaza memiliki komitmen untuk menyediakan tempat menginap yang tenang dan tidur yang nyenyak bagi tamu-tamu. Ditambah dengan staf yang profesional dan pelayanan berkelas internasional, serta berada di lokasi-lokasi strategis menjadikan Hotel Syaza merupakan pilihan yang nyaman.</p>
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
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
  </body>
  </html>
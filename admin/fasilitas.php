<?php 
include '../koneksi.php';
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
              <h1 class="m-0">Fasilitas Kamar</h1>
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
              <div class="card-header">
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah">Tambah</button>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Kode Kamar</th>
                      <th>Tipe Kamar</th>
                      <th>Fasilitas Kamar</th>
                      <th>Jumlah Kamar</th>
                      <th>Image</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query = "SELECT * FROM tipe_kamar ORDER BY id ASC";
                    $result = mysqli_query($koneksi, $query);
                    if (!$result) {
                      die("Query Error: ".mysqli_errno($koneksi). " - ".mysqli_error($koneksi));
                    }

                    $no = 1;

                    while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                      <tr>
                        <td><?php echo "$no"; ?></td>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['tipe']; ?></td>
                        <td><?php echo $row['fasilitas']; ?></td>
                        <td><?php echo $row['jumlah_kamar']; ?></td>
                        <td>
                          <img class="d-block" src="gambar/<?php echo $row['image']; ?>" width="200">
                        </td>
                        <td>
                          <a href="edit_fasilitas.php?id=<?php echo $row['id']; ?>" class="btn btn btn-warning">Edit</a>
                          <a href="hapus_fasilitas.php?id=<?php echo $row['id']; ?>" class="btn btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ini...?')">Hapus</a>
                        </td>
                      </tr>
                      <?php $no++; } ?>
                    </tbody>
                  </table>
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

    <div class="modal fade" id="tambah">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Data Fasilitas Kamar</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="tambah_fasilitas.php" enctype="multipart/form-data">
              <div class="form-group">
                <label>Kode Kamar</label>
                <input type="text" class="form-control" name="id" placeholder="Kode Kamar">
              </div>
              <div class="form-group">
                <label>Tipe Kamar</label>
                  <select name="tipe" class="form-control">
                    <option value="">--- Pilih Kamar ---</option>
                    <?php
                    include 'koneksi.php';
                    $data = mysqli_query($koneksi, "select * from tipe_kamar");
                    while ($d = mysqli_fetch_array($data)) { 
                    ?>
                    <option value="<?php echo $d['tipe']; ?>"><?php echo $d['tipe']; ?></option>
                  <?php
                  }
                  ?>
                  </select>
              </div>
              <div class="form-group">
                <label>Fasilitas Kamar</label>
                <input type="text" class="form-control" name="fasilitas" placeholder="Fasilitas Kamar">
              </div>
              <div class="form-group">
                <label>Jumlah Kamar</label>
                <input type="text" class="form-control" name="jumlah_kamar" placeholder="Jumlah Kamar">
              </div>
              <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
              </div>         
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
  </body>
  </html>
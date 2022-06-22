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
  <title>CETAK PRINT DATA</title>
  <link rel="icon" type="image/png" href="../assets/gambar/icon.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>
<div class="wrapper">
  <body class="text-center">
    <h3> CETAK BUKTI RESERVASI</h3>
    <div class="card-body">

    <div class="card-body card-outline">
    <table>
    <?php
      include '../koneksi.php';
      $id_pesanan = $_GET['id_reservasi'];
      $data = mysqli_query($koneksi, "select * from pesanan inner join kamar on pesanan.tipe_kamar = kamar.tipe where pesanan.id_reservasi=$id_pesanan");
      while($d = mysqli_fetch_array($data)){
      $harga= $d['harga'] * $d['jumlah_kamar']
              ?>
      <tr>
        <td><b>Tanggal Reservasi :</b> <?php echo $d['tanggal_reservasi']; ?></td>
      </tr>
      <tr>
        <td><b>Tanggal Check In :</b> <?php echo $d['tanggal_check_in']; ?></td>
      </tr>
      <tr>
        <td><b>Tanggal Check Out :</b> <?php echo $d['tanggal_check_out']; ?></td>
      </tr>
      <tr>
        <td><b>Nama Tamu :</b> <?php echo $d['nama_tamu']; ?></td>
      </tr>
      <tr>
        <td><b>ID Tamu :</b> <?php echo $d['id_tamu']; ?></td>
      </tr>
      <tr>
        <td><b>Tipe Kamar :</b> <?php echo $d['tipe_kamar']; ?></td>
      </tr>
      <tr>
        <td><b>Jumlah Kamar :</b> <?php echo $d['jumlah_kamar']; ?></td>
      </tr>
      <tr>
        <td><b>Harga :</b> <?php echo $d['harga']; ?></td>
      </tr>
      <tr>
        <td><b>Total :</b>  <td><?php echo $harga; ?></td>
      </tr>
      <tr>
        <td><b>Status :</b> <td>
                <?php
                if ($d['status'] == 1) { ?>
                  <span class="badge bg-warning">Belum di Konfirmasi</span>
                <?php } else { ?>
                  <span class="badge bg-success">Sudah di Konfirmasi</span>
                <?php } ?>
              </td></td>
      </tr>
      <?php 
        } 
      ?>
    </table>
    </div>
    </div>
</div>

  <script>
		window.print();
	</script>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
</body>
</html>
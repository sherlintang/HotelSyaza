<?php
include '../koneksi.php';
$fasilitas = $_GET["id"];
//mengambil id yang ingin dihapus

    //jalankan query DELETE untuk menghapus data
$query = "DELETE FROM fasilitas_umum WHERE id='$fasilitas' ";
$hasil_query = mysqli_query($koneksi, $query);

    //periksa query, apakah ada kesalahan
if(!$hasil_query) {
  die ("Gagal menghapus data: ".mysqli_errno($koneksi).
   " - ".mysqli_error($koneksi));
} else {
  echo "<script>alert('Data berhasil dihapus.');window.location='fasilitas_hotel.php';</script>";
}
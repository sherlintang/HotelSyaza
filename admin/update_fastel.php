<?php
include '../koneksi.php';

$kode_kamar = $_POST['id'];
$namfas = $_POST['nama_fasilitas'];
$image = $_FILES['image']['name'];
if($image != "") {
  $ekstensi_diperbolehkan = array('png','jpg');
  $x = explode('.', $image);
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['image']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$image;
  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
    move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);
    $query  = "UPDATE fasilitas_umum SET nama_fasilitas = '$namfas', image = '$nama_gambar_baru'";
    $query .= "WHERE id = '$kode_kamar'";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
       " - ".mysqli_error($koneksi));
    } else {
      echo "<script>alert('Data berhasil diubah.');window.location='fasilitas_hotel.php';</script>";
    }
  } else {
    echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
  }
} else {
  $query  = "UPDATE fasilitas_umum SET nama_fasilitas = '$naskam', image = '$nama_gambar_baru'";
  $query .= "WHERE id = '$kode_kamar'";
  $result = mysqli_query($koneksi, $query);
      // periska query apakah ada error
  if(!$result){
    die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
     " - ".mysqli_error($koneksi));
  } else {
    echo "<script>alert('Data berhasil diubah.');window.location='fasilitas_hotel.php';</script>";
  }
}
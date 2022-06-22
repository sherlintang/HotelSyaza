<?php
include '../koneksi.php';

$kode_kamar = $_POST['kode_kamar'];
$tipe = $_POST['tipe'];
$harga = $_POST['harga'];
$img = $_FILES['image']['name'];


if ($img !="") {
	$ekstensi_diperbolehkan = array('png','jpg','jpeg');
	$x = explode('.', $img);
	$extensi = strtolower(end($x));
	$file_tmp = $_FILES['image']['tmp_name'];
	$angka_acak = rand(1,999);
	$nama_gambar_baru = $angka_acak.'-'.$img;
	if (in_array($extensi, $ekstensi_diperbolehkan) == true) {
		move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);
		$query = "INSERT INTO kamar VALUES ('$kode_kamar','$tipe','$harga', '$nama_gambar_baru')";
		$result = mysqli_query($koneksi, $query);

		if (!$result) {
			die("Query gagal dijalankan : ".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
		} else {
			echo "<script>alert('Data berhasil ditambah.');window.location='kamar.php';</script>";
		}
		
	} else {
		echo "<script>alert('Extensi gambar harus png atau jpg.');window.location='kamar.php';</script>";
	}
	
} else {
	$query = "INSERT INTO kamar VALUES ('$kode_kamar','$tipe','$harga', null)";
	$result = mysqli_query($koneksi, $query);

	if (!$result) {
		die("Query gagal dijalankan : ".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
	} else {
		echo "<script>alert('Data berhasil ditambah.');window.location='kamar.php';</script>";
	}
}

?> 
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jun 2022 pada 14.22
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_syaza`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `check_in`
--

CREATE TABLE `check_in` (
  `id_reservasi` int(10) NOT NULL,
  `id_tamu` int(10) NOT NULL,
  `status` enum('reserved','check in','check out') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_reservasi`
--

CREATE TABLE `detail_reservasi` (
  `id_reservasi` int(10) NOT NULL,
  `kode_kamar` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas_umum`
--

CREATE TABLE `fasilitas_umum` (
  `id` int(11) NOT NULL,
  `nama_fasilitas` varchar(50) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fasilitas_umum`
--

INSERT INTO `fasilitas_umum` (`id`, `nama_fasilitas`, `image`) VALUES
(1, 'Gym / Fitnes', 'gym.jpg'),
(2, 'Parkir', 'p.jpg'),
(3, 'Restoran', 'restoran.jpg'),
(4, 'Gedung ', 'gedung.jpg'),
(5, 'Kolam Renang', 'pool.jpg'),
(6, 'Lobby', 'lobby.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `kode_kamar` int(10) NOT NULL,
  `tipe` enum('VIP','VVIP','Suite','Double','Single') NOT NULL,
  `harga` int(50) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`kode_kamar`, `tipe`, `harga`, `image`) VALUES
(101, 'Single', 150000, 'single.jpg'),
(102, 'Double', 235000, 'd.jpg'),
(103, 'VIP', 300000, 'vip.jpg'),
(104, 'VVIP', 350000, 'vvip.jpg'),
(105, 'Suite', 460000, 'suite.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_reservasi` int(10) NOT NULL,
  `tanggal_reservasi` date NOT NULL,
  `tanggal_check_in` date NOT NULL,
  `tanggal_check_out` date NOT NULL,
  `id_tamu` int(10) NOT NULL,
  `nama_tamu` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `handphone` int(20) NOT NULL,
  `tipe_kamar` enum('Single','Double','VIP','VVIP','Suite') NOT NULL,
  `jumlah_kamar` int(20) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_reservasi`, `tanggal_reservasi`, `tanggal_check_in`, `tanggal_check_out`, `id_tamu`, `nama_tamu`, `email`, `handphone`, `tipe_kamar`, `jumlah_kamar`, `status`) VALUES
(1, '2022-05-18', '2022-05-19', '2022-05-22', 16, 'Sherlintang', 'sherlintang@gmail.com', 857321222, 'Suite', 1, '2'),
(2, '2022-05-02', '2022-05-06', '2022-05-08', 20, 'Shela', 'shela@gmail.com', 89542189, 'Double', 2, '2'),
(3, '2022-04-06', '2022-05-09', '2022-05-11', 8, 'Arip', 'arip12@gmail.com', 89654187, 'Single', 3, '2'),
(4, '2022-04-13', '2022-05-15', '2022-05-17', 12, 'Sinta', 'sinta19@gmail.com', 83167908, 'VIP', 1, '2'),
(5, '2022-05-01', '2022-05-03', '2022-05-07', 14, 'alin', 'alinaya@gmail.com', 81459204, 'VVIP', 2, '2'),
(6, '2022-05-09', '2022-05-10', '2022-05-12', 10, 'anggi', 'anggi@gmail.com', 857652345, 'Single', 5, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_kamar`
--

CREATE TABLE `tipe_kamar` (
  `id` int(10) NOT NULL,
  `tipe` enum('VIP','VVIP','Suite','Double','Single') NOT NULL,
  `fasilitas` text NOT NULL,
  `jumlah_kamar` int(6) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tipe_kamar`
--

INSERT INTO `tipe_kamar` (`id`, `tipe`, `fasilitas`, `jumlah_kamar`, `image`) VALUES
(101, 'Single', '1. Televisi;     \r\n2. Single bed;     \r\n3. Meja Kerja;     \r\n4. Kamar Mandi;     \r\n5. Kipas Angin;     ', 15, 'single.jpg'),
(102, 'Double', '1. Sofa;\r\n2. Kamar mandi;\r\n3. Double bed;\r\n4. AC;\r\n5. Televisi;', 15, 'd.jpg'),
(103, 'VIP', '1. AC\r\n2. Kamar mandi;\r\n3. Sofa bed;\r\n4. Meja kerja\r\n5. Balkon;\r\n6. TV;\r\n7. Minuman & Snack;', 10, 'vip.jpg'),
(104, 'VVIP', '1. Kamar mandi + bathub;\r\n2. Ruang baca/kerja;\r\n3. King bed;\r\n4. Sofa bed;\r\n5. TV;\r\n6. AC;\r\n7. Balkon', 10, 'vvip.jpg'),
(105, 'Suite', '1. Kamar mandi + bathub;\r\n2. Ruang tamu;\r\n3. Ruang ganti\r\n4. Ruangan bebas rokok;\r\n5. Ruang baca/kerja;\r\n6. King bed;\r\n7. Sofa bed;\r\n8. TV;\r\n9. AC;\r\n10. Balkon Luas;', 10, 'suite.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(35) NOT NULL,
  `role` enum('Administrator','Guest','Receptionist') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'Administrator'),
(2, 'resepsionis', 'resepsionis', 'Receptionist');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `check_in`
--
ALTER TABLE `check_in`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD UNIQUE KEY `id_tamu` (`id_tamu`);

--
-- Indeks untuk tabel `detail_reservasi`
--
ALTER TABLE `detail_reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD UNIQUE KEY `kode_kamar` (`kode_kamar`);

--
-- Indeks untuk tabel `fasilitas_umum`
--
ALTER TABLE `fasilitas_umum`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`kode_kamar`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_reservasi`);

--
-- Indeks untuk tabel `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_reservasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `check_in`
--
ALTER TABLE `check_in`
  ADD CONSTRAINT `check_in_ibfk_1` FOREIGN KEY (`id_tamu`) REFERENCES `reservasi` (`id_tamu`),
  ADD CONSTRAINT `check_in_ibfk_2` FOREIGN KEY (`id_reservasi`) REFERENCES `reservasi` (`id_reservasi`);

--
-- Ketidakleluasaan untuk tabel `detail_reservasi`
--
ALTER TABLE `detail_reservasi`
  ADD CONSTRAINT `detail_reservasi_ibfk_1` FOREIGN KEY (`id_reservasi`) REFERENCES `reservasi` (`id_reservasi`),
  ADD CONSTRAINT `detail_reservasi_ibfk_2` FOREIGN KEY (`kode_kamar`) REFERENCES `kamar` (`kode_kamar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

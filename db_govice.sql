-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Apr 2021 pada 19.42
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `govice2.0`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `nohp` text NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `foto` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_akun`
--

INSERT INTO `tbl_akun` (`id`, `nama`, `nohp`, `username`, `password`, `foto`) VALUES
(1, 'Bengkel perut', '08568247873', 'son', 'asd', 'administrator-1618132458.png'),
(6, 'PT. Astra Honda Motor', '08534563456', 'AHM@honda', '$2y$10$j04riBcESf0zYyx/yqj3deffAZolb5z7hpOL5IT6WWrZFzivvnPvu', 'pt.-astra-honda-motor-1617890948.png'),
(27, 'administrator', '08988676989', 'admin', '$2y$10$oRtVf1WiCDQoJ3xlCFTPYOxsBuWLQWuMV.Gw8n.padOutAK95rDm2', 'administrator-1618132458.png'),
(28, 'bengkel', '08589899889', 'watson@son', 'asd', 'administrator-1618132458.png'),
(30, 'Bengkel contoh', '0859978998769', 'son', '$2y$10$sxj.WkS4Ig1eBrg6LXY9ieZTpMzeKmZLmJ.lcYG6dvNS2Fx8QrREu', 'bengkel-contoh-1618161848.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_cabang`
--

CREATE TABLE `tbl_cabang` (
  `id` int(11) NOT NULL,
  `cabang` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_cabang`
--

INSERT INTO `tbl_cabang` (`id`, `cabang`) VALUES
(9, 'Honda AHS'),
(10, 'Honda Bintara'),
(11, 'Honda Prima Harapan '),
(12, 'Honda Bu Fatmawati'),
(13, 'Honda Onic'),
(14, 'Honda Cinta Cakra'),
(15, 'Honda Indah'),
(16, 'Automateall bengkel'),
(17, 'Bengkel sukasukses'),
(18, 'Bengkel sumberejo'),
(22, 'Watson workshop'),
(23, 'Bengkel Watson');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jenis_bayar`
--

CREATE TABLE `tbl_jenis_bayar` (
  `id` int(11) NOT NULL,
  `jenis_bayar` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_jenis_bayar`
--

INSERT INTO `tbl_jenis_bayar` (`id`, `jenis_bayar`) VALUES
(3, 'Cash'),
(4, 'Kredit'),
(5, 'OVO'),
(6, 'Gopay'),
(7, 'Link aja!'),
(10, 'Dana');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `nohp` text NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_member`
--

INSERT INTO `tbl_member` (`id`, `nama`, `nohp`, `alamat`, `jenis_kelamin`, `foto`) VALUES
(7, 'Silvana', '08974654378', 'Sukaga', 'P', 'silvana-1617989535.png'),
(8, 'Hiylos', '08978343489', 'Jln. Pahlawan no. 89', 'L', 'hiylos-1617989555.png'),
(11, 'Watson', '08986767234', 'jln kusuma no 56', 'L', 'watson-1618024500.png'),
(12, 'Awi', '0896786735', 'Bubat', 'L', 'awi-1618161385.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pesanan`
--

CREATE TABLE `tbl_pesanan` (
  `id` int(11) NOT NULL,
  `harga` int(255) NOT NULL,
  `jam_service` time DEFAULT NULL,
  `tgl_service` date DEFAULT NULL,
  `id_member` int(11) DEFAULT NULL,
  `id_service` int(11) DEFAULT NULL,
  `id_jenis_bayar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`id`, `harga`, `jam_service`, `tgl_service`, `id_member`, `id_service`, `id_jenis_bayar`) VALUES
(1, 1000000, '00:00:00', '2020-01-04', 7, NULL, 4),
(6, 2000000, '03:00:00', '2020-01-20', NULL, NULL, 3),
(8, 1500000, '00:00:00', '2020-01-21', 7, NULL, 3),
(9, 300000, '09:30:00', '2021-05-01', 7, 18, 3),
(10, 300000, '09:00:00', '2021-04-11', NULL, 18, 3),
(11, 300, '09:00:00', '2021-05-01', 7, 23, 5),
(12, 300, '09:00:00', '2021-04-11', 8, 23, 3),
(13, 800000, '09:00:00', '2021-04-11', 7, 23, 3),
(14, 300000, '09:00:00', '2021-05-01', 12, 26, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_saran`
--

CREATE TABLE `tbl_saran` (
  `id` int(11) NOT NULL,
  `teks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_saran`
--

INSERT INTO `tbl_saran` (`id`, `teks`) VALUES
(3, 'kembangkan lagi'),
(4, 'kurang fitur pic'),
(7, 'kurang fitur pesan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_service`
--

CREATE TABLE `tbl_service` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jeniskndrn` varchar(20) DEFAULT NULL,
  `jumlah_tkns` int(10) DEFAULT NULL,
  `biaya` int(255) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `id_cabang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_service`
--

INSERT INTO `tbl_service` (`id`, `nama`, `alamat`, `jeniskndrn`, `jumlah_tkns`, `biaya`, `gambar`, `id_cabang`) VALUES
(18, 'Variasi Body', 'jln. kemakmuran no.39', 'Motor/Mobil', 3, 300, 'variasi-body-1618161025.png', 18),
(20, 'Service Ban Tubles Motor', 'Jln. kemakmuran', 'Motor', 1, 30, 'service-ban-tubles-motor-1617891297.jpg', 18),
(23, 'Service rutin', 'Jln. wijaya', 'Mobil', 3, 300000, 'service-rutin-1617985600.jpg', 11),
(26, 'Service body', 'jln sukajadi', 'mobil', 3, 300000, 'service-body-1618024314.jpg', 17),
(27, 'Ganti knalpot x', 'bubat', 'mobil', 3, 300000, 'ganti-knalpot-x-1618161272.png', 23);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_cabang`
--
ALTER TABLE `tbl_cabang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_jenis_bayar`
--
ALTER TABLE `tbl_jenis_bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_service` (`id_service`),
  ADD KEY `id_jenis_bayar` (`id_jenis_bayar`);

--
-- Indeks untuk tabel `tbl_saran`
--
ALTER TABLE `tbl_saran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_service_ibfk_2` (`id_cabang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_akun`
--
ALTER TABLE `tbl_akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tbl_cabang`
--
ALTER TABLE `tbl_cabang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tbl_jenis_bayar`
--
ALTER TABLE `tbl_jenis_bayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_saran`
--
ALTER TABLE `tbl_saran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD CONSTRAINT `tbl_pesanan_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `tbl_member` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pesanan_ibfk_2` FOREIGN KEY (`id_service`) REFERENCES `tbl_service` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pesanan_ibfk_4` FOREIGN KEY (`id_jenis_bayar`) REFERENCES `tbl_jenis_bayar` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD CONSTRAINT `tbl_service_ibfk_2` FOREIGN KEY (`id_cabang`) REFERENCES `tbl_cabang` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

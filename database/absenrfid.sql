-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Des 2021 pada 01.50
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absenrfid`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `nokartu` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_pulang` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id`, `nokartu`, `tanggal`, `jam_masuk`, `jam_pulang`) VALUES
(17, '1', '2021-08-16', '14:04:11', '00:00:00'),
(18, '1', '2021-08-23', '05:54:17', '06:06:08'),
(22, '2', '2021-08-23', '06:15:46', '06:20:38'),
(23, '3', '2021-09-03', '00:00:00', '14:47:26'),
(24, '1', '2021-09-03', '17:05:58', '00:00:00'),
(25, '4', '2021-11-27', '11:14:20', '11:20:08'),
(26, '249249120229', '2021-11-27', '13:19:53', '13:20:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nokartu` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `nokartu`, `nama`, `alamat`) VALUES
(15, '1', 'Dimas Ruhyana', 'babakna baru'),
(16, '2', 'Salsaa', 'cipaku'),
(18, '3', 'Kiara tugbaa', 'dimana aja'),
(20, '4', 'Esra', 'German');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmprfid`
--

CREATE TABLE `tmprfid` (
  `nokartu` varchar(20) NOT NULL,
  `idlab` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(4, 'admin', '$2y$10$6sKaRDTGDHygMXWudk11teI0JcO22NWAYsM0N3UPgm2DK1Vk04mqy');

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktu_absen`
--

CREATE TABLE `waktu_absen` (
  `jMasuk_awal` time NOT NULL,
  `jMasuk_akhir` time NOT NULL,
  `jPulang_awal` time NOT NULL,
  `jPulang_akhir` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `waktu_absen`
--

INSERT INTO `waktu_absen` (`jMasuk_awal`, `jMasuk_akhir`, `jPulang_awal`, `jPulang_akhir`) VALUES
('06:00:00', '06:15:05', '11:00:00', '15:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tmprfid`
--
ALTER TABLE `tmprfid`
  ADD PRIMARY KEY (`nokartu`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `waktu_absen`
--
ALTER TABLE `waktu_absen`
  ADD PRIMARY KEY (`jMasuk_awal`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

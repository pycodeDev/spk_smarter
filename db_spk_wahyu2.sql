-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jan 2022 pada 14.16
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk_wahyu2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2020-09-22-124346', 'App\\Database\\Migrations\\TbUser', 'default', 'App', 1601395541, 1),
(2, '2020-09-26-202034', 'App\\Database\\Migrations\\TbProduk', 'default', 'App', 1601395542, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_keluar`
--

CREATE TABLE `produk_keluar` (
  `id` int(11) NOT NULL,
  `nomor_suku_cadang` varchar(100) NOT NULL,
  `tanggal` text NOT NULL,
  `QTY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk_keluar`
--

INSERT INTO `produk_keluar` (`id`, `nomor_suku_cadang`, `tanggal`, `QTY`) VALUES
(4, 'LK890', '2021-01-23', 100),
(5, 'SK12567', '2021-12-03', 800);

--
-- Trigger `produk_keluar`
--
DELIMITER $$
CREATE TRIGGER `barang_keluar` AFTER INSERT ON `produk_keluar` FOR EACH ROW BEGIN
UPDATE tb_produk SET stok=stok-NEW.QTY
WHERE nomor_suku_cadang=NEW.nomor_suku_cadang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `barang_keluar_del` AFTER DELETE ON `produk_keluar` FOR EACH ROW BEGIN
UPDATE tb_produk SET stok=stok+OLD.QTY
WHERE nomor_suku_cadang=OLD.nomor_suku_cadang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_masuk`
--

CREATE TABLE `produk_masuk` (
  `id` int(11) NOT NULL,
  `nomor_suku_cadang` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `QTY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk_masuk`
--

INSERT INTO `produk_masuk` (`id`, `nomor_suku_cadang`, `tanggal`, `QTY`) VALUES
(9, 'LK890', '2021-01-23', 1000),
(10, 'SK12567', '2021-11-30', 1000);

--
-- Trigger `produk_masuk`
--
DELIMITER $$
CREATE TRIGGER `barang_masuk_del` AFTER DELETE ON `produk_masuk` FOR EACH ROW BEGIN
UPDATE tb_produk SET stok=stok-old.QTY
WHERE nomor_suku_cadang=old.nomor_suku_cadang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `produk_masuk` AFTER INSERT ON `produk_masuk` FOR EACH ROW BEGIN
UPDATE tb_produk SET stok = stok+NEW.QTY
WHERE nomor_suku_cadang= NEW.nomor_suku_cadang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_alternatif`
--

CREATE TABLE `tb_alternatif` (
  `id` int(11) NOT NULL,
  `nama_alternatif` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_alternatif`
--

INSERT INTO `tb_alternatif` (`id`, `nama_alternatif`) VALUES
(2, 'PT. Riau Andalan Pulp And Paper'),
(3, 'PT. Salim Ivo Mas Pratama. tbk'),
(4, 'PT Pertamina'),
(5, 'PT. Abal Abal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hasil`
--

CREATE TABLE `tb_hasil` (
  `id` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `hasil` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_hasil`
--

INSERT INTO `tb_hasil` (`id`, `id_alternatif`, `hasil`) VALUES
(1, 2, 0.242334),
(2, 3, 0.142056),
(3, 4, 0.203889),
(4, 5, 0.229001);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id` int(11) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `rank` int(11) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id`, `nama_kriteria`, `rank`, `bobot`) VALUES
(1, 'Jumlah Transaksi', 1, 0.456667),
(2, 'Maksimum Item Transaksi', 2, 0.256667),
(3, 'Frekuensi Kemunculan Perusahaan', 3, 0.156667),
(4, 'Jumlah Item Yang sering Dibeli', 4, 0.09),
(5, 'Jumlah Item Yang di pesan', 5, 0.04);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_perangkingan`
--

CREATE TABLE `tb_perangkingan` (
  `id` int(11) NOT NULL,
  `id_alter` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_sub_krit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_perangkingan`
--

INSERT INTO `tb_perangkingan` (`id`, `id_alter`, `id_kriteria`, `id_sub_krit`) VALUES
(1, 2, 1, 8),
(2, 2, 2, 16),
(3, 2, 3, 20),
(4, 2, 4, 24),
(5, 2, 5, 32),
(11, 3, 1, 9),
(12, 3, 2, 17),
(13, 3, 3, 20),
(14, 3, 4, 28),
(15, 3, 5, 32),
(16, 4, 1, 8),
(17, 4, 2, 16),
(18, 4, 3, 22),
(19, 4, 4, 26),
(20, 4, 5, 29),
(21, 5, 1, 9),
(22, 5, 2, 15),
(23, 5, 3, 20),
(24, 5, 4, 24),
(25, 5, 5, 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id` int(5) NOT NULL,
  `nama_suku_cadang` varchar(100) NOT NULL,
  `nomor_suku_cadang` varchar(50) NOT NULL,
  `stok` int(10) NOT NULL DEFAULT 0,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id`, `nama_suku_cadang`, `nomor_suku_cadang`, `stok`, `status`) VALUES
(3, 'aramadh', 'AN12322', 0, '1'),
(4, 'Lightning Kit', 'LK890', 900, '1'),
(5, 'Coba456', 'CC1898', 0, '1'),
(7, 'ASMI GHT', 'ASA908', 0, '0'),
(8, 'Skrup', 'SK12567', 200, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sub_kriteria`
--

CREATE TABLE `tb_sub_kriteria` (
  `id` int(11) NOT NULL,
  `id_krit` int(11) NOT NULL,
  `nama_sub_kriteria` varchar(100) NOT NULL,
  `rank` int(11) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_sub_kriteria`
--

INSERT INTO `tb_sub_kriteria` (`id`, `id_krit`, `nama_sub_kriteria`, `rank`, `bobot`) VALUES
(7, 1, 'Sangat Bagus', 1, 0.456667),
(8, 1, 'Bagus', 2, 0.256667),
(9, 1, 'Lumayan', 3, 0.156667),
(10, 1, 'Cukup Bagus', 4, 0.09),
(11, 1, 'Tidak Bagus', 5, 0.04),
(14, 2, 'Sangat Bagus', 1, 0.456667),
(15, 2, 'Bagus', 2, 0.256667),
(16, 2, 'Lumayan', 3, 0.156667),
(17, 2, 'Cukup Bagus', 4, 0.09),
(18, 2, 'Tidak Bagus', 5, 0.04),
(19, 3, 'Sangat Bagus', 1, 0.456667),
(20, 3, 'Bagus', 2, 0.256667),
(21, 3, 'Lumayan', 3, 0.156667),
(22, 3, 'Cukup Bagus', 4, 0.09),
(23, 3, 'Tidak Bagus', 5, 0.04),
(24, 4, 'Sangat Bagus', 1, 0.456667),
(25, 4, 'Bagus', 2, 0.256667),
(26, 4, 'Lumayan', 3, 0.156667),
(27, 4, 'Cukup Bagus', 4, 0.09),
(28, 4, 'Tidak Bagus', 5, 0.04),
(29, 5, 'Sangat Bagus', 1, 0.456667),
(30, 5, 'Bagus', 2, 0.256667),
(31, 5, 'Lumayan', 3, 0.156667),
(32, 5, 'Cukup Bagus', 4, 0.09),
(33, 5, 'Tidak Bagus', 5, 0.04);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `name`, `role`) VALUES
(1, 'admin', 'admin', 'Admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk_keluar`
--
ALTER TABLE `produk_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk_masuk`
--
ALTER TABLE `produk_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_perangkingan`
--
ALTER TABLE `tb_perangkingan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_sub_kriteria`
--
ALTER TABLE `tb_sub_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `produk_keluar`
--
ALTER TABLE `produk_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `produk_masuk`
--
ALTER TABLE `produk_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_hasil`
--
ALTER TABLE `tb_hasil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_perangkingan`
--
ALTER TABLE `tb_perangkingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_sub_kriteria`
--
ALTER TABLE `tb_sub_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

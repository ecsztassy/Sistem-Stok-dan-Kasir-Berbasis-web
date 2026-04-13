-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Sep 2025 pada 14.17
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `123`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` text NOT NULL,
  `merk` varchar(255) NOT NULL,
  `harga_beli` varchar(255) NOT NULL,
  `harga_jual` varchar(255) NOT NULL,
  `satuan_barang` varchar(255) NOT NULL,
  `stok` text NOT NULL,
  `tgl_input` varchar(255) NOT NULL,
  `tgl_update` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `id_barang`, `id_kategori`, `nama_barang`, `merk`, `harga_beli`, `harga_jual`, `satuan_barang`, `stok`, `tgl_input`, `tgl_update`) VALUES
(1, 'BR001', 1, 'Pensil', 'Fabel Castel', '1500', '3000', 'PCS', '100', '6 October 2020, 0:41', '22 August 2025, 16:18'),
(2, 'BR002', 5, 'Sabun', 'Lifeboy', '1800', '3000', 'PCS', '99', '6 October 2020, 0:41', '22 August 2025, 16:17'),
(3, 'BR003', 1, 'Pulpen', 'Standard', '1500', '2000', 'PCS', '48', '6 October 2020, 1:34', '5 August 2025, 22:30'),
(6, 'BR004', 10, 'Semen', 'Tiga Roda', '55000', '65000', 'SAK', '88', '31 August 2025, 16:55', NULL),
(7, 'BR005', 11, 'Palu Besi 500gr', 'Krisbow', '35000', '50000', 'PCS', '44', '31 August 2025, 16:56', NULL),
(8, 'BR006', 12, 'Cat Tembok', 'Avitex', '90000', '120000', 'KALENG', '70', '31 August 2025, 16:58', NULL),
(9, 'BR007', 14, 'Pipa PVC', 'Rucika', '65000', '85000', 'BATANG', '33', '31 August 2025, 16:59', NULL),
(10, 'BR008', 13, 'Kayu', 'Kayu jati jepara', '80000', '100000', 'BATANG', '8', '31 August 2025, 17:00', NULL),
(11, 'BR009', 13, 'Besi Beton 10mm', 'Krakatau Steel', '60000', '89999', 'BATANG', '89', '31 August 2025, 17:01', NULL),
(12, 'BR010', 0, 'Paku Kayu 5cm', 'Rajawali', '18000', '20000', 'KG', '800', '31 August 2025, 17:06', NULL),
(13, 'BR011', 10, 'Paku Kayu 5cm', 'Rajawali', '15000', '20000', 'KG', '222', '31 August 2025, 17:07', NULL),
(14, 'BR012', 10, 'Paku Kayu 10cm', 'Elang', '19000', '23000', 'KG', '232', '31 August 2025, 17:08', NULL),
(15, 'BR013', 0, 'Cat Tembok', 'No Drop', '100000', '120000', 'KALENG', '255', '31 August 2025, 17:09', NULL),
(16, 'BR014', 12, 'Cat Tembok', 'Nipon paint', '80000', '94000', 'KALENG', '666', '31 August 2025, 17:11', NULL),
(17, 'BR015', 12, 'Kuas ', 'Hebat', '3000', '5000', 'PCS', '87', '31 August 2025, 17:11', NULL),
(18, 'BR016', 14, 'Kran Air', 'Introvert', '15000', '19000', 'PCS', '43', '31 August 2025, 17:12', NULL),
(19, 'BR017', 10, 'Semen', 'Kuda Poni', '88888', '99999', 'SAK', '27', '31 August 2025, 17:14', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `tgl_input`) VALUES
(10, 'Bahan Bangunan', '31 August 2025, 16:43'),
(11, 'Peralatan Tukang', '31 August 2025, 16:43'),
(12, 'Cat dan Aksesoris', '31 August 2025, 16:44'),
(13, 'Material Kayu dan Besi', '31 August 2025, 16:44'),
(14, 'Pipa dan Sanitasi', '31 August 2025, 16:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` char(32) NOT NULL,
  `id_member` int(11) NOT NULL,
  `role` enum('admin','karyawan') NOT NULL DEFAULT 'karyawan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_login`, `user`, `pass`, `id_member`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'admin'),
(2, 'karyawan', '9e014682c94e0f2cc834bf7348bda428', 2, 'karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nm_member` varchar(255) NOT NULL,
  `alamat_member` text NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `nm_member`, `alamat_member`, `telepon`, `email`, `gambar`) VALUES
(1, 'Admin', 'Kartasura', '087880753079', 'nathanahnaf6@gmail.com', '1754300611Gambar WhatsApp 2025-06-14 pukul 08.09.53_80561779.jpg'),
(2, 'Karyawan', 'Alamat Karyawan', '081234567891', 'karyawan@gmail.com', '1754409836acc dosen.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL,
  `periode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `nota`
--

INSERT INTO `nota` (`id_nota`, `id_barang`, `id_member`, `jumlah`, `total`, `tanggal_input`, `periode`) VALUES
(1, 'BR001', 1, '10', '30000', '3 August 2025, 22:17', '08-2025'),
(2, 'BR001', 1, '10', '30000', '3 August 2025, 22:17', '08-2025'),
(3, 'BR001', 2, '6', '18000', '14 August 2025, 22:45', '08-2025'),
(4, 'BR001', 2, '6', '18000', '14 August 2025, 22:45', '08-2025'),
(5, 'BR001', 1, '6', '18000', '15 August 2025, 0:03', '08-2025'),
(6, 'BR002', 1, '5', '15000', '15 August 2025, 0:05', '08-2025'),
(7, 'BR001', 1, '6', '18000', '15 August 2025, 0:03', '08-2025'),
(8, 'BR002', 1, '5', '15000', '15 August 2025, 0:05', '08-2025'),
(9, 'BR003', 1, '11', '22000', '15 August 2025, 0:10', '08-2025'),
(10, 'BR001', 1, '6', '18000', '15 August 2025, 0:03', '08-2025'),
(11, 'BR002', 1, '5', '15000', '15 August 2025, 0:05', '08-2025'),
(12, 'BR003', 1, '11', '22000', '15 August 2025, 0:10', '08-2025'),
(13, 'BR001', 1, '6', '18000', '15 August 2025, 0:03', '08-2025'),
(14, 'BR002', 1, '5', '15000', '15 August 2025, 0:05', '08-2025'),
(15, 'BR003', 1, '11', '22000', '15 August 2025, 0:10', '08-2025'),
(16, 'BR001', 1, '6', '18000', '15 August 2025, 0:03', '08-2025'),
(17, 'BR002', 1, '5', '15000', '15 August 2025, 0:05', '08-2025'),
(18, 'BR003', 1, '11', '22000', '15 August 2025, 0:10', '08-2025'),
(19, 'BR001', 1, '1', '3000', '15 August 2025, 17:28', '08-2025'),
(20, 'BR003', 1, '1', '2000', '15 August 2025, 17:28', '08-2025'),
(21, 'BR002', 1, '3', '9000', '15 August 2025, 17:28', '08-2025'),
(22, 'BR001', 1, '9', '27000', '15 August 2025, 17:28', '08-2025'),
(23, 'BR003', 1, '9', '18000', '15 August 2025, 17:28', '08-2025'),
(24, 'BR002', 1, '7', '21000', '15 August 2025, 17:28', '08-2025'),
(25, 'BR001', 1, '9', '27000', '15 August 2025, 17:28', '08-2025'),
(26, 'BR001', 1, '4', '12000', '15 August 2025, 17:28', '08-2025'),
(27, 'BR001', 1, '5', '15000', '15 August 2025, 17:28', '08-2025'),
(28, 'BR001', 1, '1', '3000', '19 August 2025, 13:58', '08-2025'),
(29, 'BR002', 1, '1', '3000', '19 August 2025, 14:03', '08-2025'),
(30, 'BR001', 1, '4', '12000', '20 August 2025, 19:35', '08-2025'),
(31, 'BR001', 1, '4', '12000', '20 August 2025, 19:35', '08-2025'),
(32, 'BR002', 2, '1', '3000', '22 August 2025, 16:34', '08-2025'),
(33, 'BR004', 1, '3', '45000', '31 August 2025, 16:52', '08-2025'),
(34, 'BR004', 1, '1', '65000', '31 August 2025, 17:15', '08-2025'),
(35, 'BR017', 1, '1', '99999', '31 August 2025, 17:15', '08-2025'),
(36, 'BR008', 2, '1', '100000', '31 August 2025, 17:17', '08-2025'),
(37, 'BR004', 1, '11', '715000', '31 August 2025, 17:19', '08-2025');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_barang`, `id_member`, `jumlah`, `total`, `tanggal_input`) VALUES
(20, 'BR004', 1, '11', '715000', '31 August 2025, 17:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `alamat_toko` text NOT NULL,
  `tlp` varchar(255) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat_toko`, `tlp`, `nama_pemilik`) VALUES
(1, 'TB Ilham Abadi', 'Ngemplak Margoyoso Pati', '081234567890', 'Khomarul Huda');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

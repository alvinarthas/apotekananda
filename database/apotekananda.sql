-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Apr 2019 pada 05.19
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotekananda`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `activations`
--

CREATE TABLE `activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `activations`
--

INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'K6yb3sUnTh4PYmc6bSshm9sZ778F6RTv', 1, '2017-06-11 07:19:54', '2017-06-11 07:19:54', '2017-06-11 07:19:54'),
(2, 2, 'wyZluLKjk3sUlSJFYGobxM5zGKcxOtU6', 1, '2017-06-11 07:48:39', '2017-06-11 07:48:39', '2017-06-11 07:48:39'),
(4, 4, 'MAJq1GvNno70SVeWQ1S2dP3Q3uY712Kw', 1, '2017-07-21 23:59:11', '2017-07-21 23:59:11', '2017-07-21 23:59:11'),
(5, 5, 'm7Hn3m0FBzKBGnbxSprWysvU8GBqygCH', 1, '2017-10-02 03:48:45', '2017-10-02 03:48:45', '2017-10-02 03:48:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alokasi_tbl`
--

CREATE TABLE `alokasi_tbl` (
  `id` int(10) NOT NULL,
  `kode_rak` varchar(100) NOT NULL,
  `kode_barang` varchar(1000) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alokasi_tbl`
--

INSERT INTO `alokasi_tbl` (`id`, `kode_rak`, `kode_barang`, `updated_at`, `created_at`) VALUES
(1, 'A1', 'ABV01', '2017-07-27 07:36:34', '2017-07-27 07:36:34'),
(2, 'A1', 'ACT01', '2017-07-27 07:36:34', '2017-07-27 07:36:34'),
(3, 'A1', 'ALB01', '2017-07-27 07:36:34', '2017-07-27 07:36:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_tbl`
--

CREATE TABLE `barang_tbl` (
  `id` int(10) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `barang` varchar(100) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga` int(10) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `jenis` varchar(100) DEFAULT NULL,
  `stockin` int(10) DEFAULT '0',
  `stockout` int(10) DEFAULT NULL,
  `qty` int(10) DEFAULT '0',
  `min_qty` int(6) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_tbl`
--

INSERT INTO `barang_tbl` (`id`, `kode_barang`, `barang`, `satuan`, `harga`, `kategori`, `jenis`, `stockin`, `stockout`, `qty`, `min_qty`, `updated_at`, `created_at`) VALUES
(1, 'ABV01', 'AB VASK 5 MG', 'Mg', 6000, 'Obat Injeksi', 'Barang Dalam', 100, 21, 79, 20, '2017-07-27 07:16:12', '2017-07-27 07:16:12'),
(2, 'ACT01', 'ACTAPIN 10 MG TAB', 'Mg', 5000, 'Obat Kulit', 'Barang Luar', 120, 22, 98, 20, '2017-07-27 07:16:41', '2017-07-27 07:16:41'),
(3, 'ALB01', 'ALBOTHYL  SOL 10 ML', 'box', 18000, 'Obat Kumur', 'Barang Luar', 150, 2, 148, 20, '2017-07-27 07:17:17', '2017-07-27 07:17:17'),
(4, 'BTH01', 'BETAHISTIN TAB', 'Strip', 7000, 'Obat Anak', 'Barang Luar', 60, 10, 50, 20, '2017-07-27 07:17:51', '2017-07-27 07:17:51'),
(5, 'BTL01', 'BOTOL PLASTIK 100 CC', 'Botol', 3000, 'Obat Kumur', 'Barang Luar', 90, 10, 80, 20, '2017-07-27 07:18:22', '2017-07-27 07:18:22'),
(6, 'CAR01', 'CARDIOMIN  SOFT 20(1KPG ISI 4)', 'Mg', 7000, 'Obat Injeksi', 'Barang Luar', 100, NULL, 100, 20, '2017-07-27 07:18:49', '2017-07-27 07:18:49'),
(7, 'DEX01', 'DEXTAMINE SYR 60 ML', 'Liter', 10000, 'Obat Injeksi', 'Barang Luar', 80, NULL, 80, 20, '2017-07-27 07:19:30', '2017-07-27 07:19:30'),
(8, 'DOM01', 'DOMPERIDONE SYR 60 L', 'Liter', 50000, 'Obat Injeksi', 'Barang Luar', 40, 0, 40, 20, '2017-07-27 07:19:51', '2017-07-27 07:19:51'),
(9, 'EUP', 'EUPHYLLIN RETARD', 'box', 500, 'Obat Injeksi', 'Barang Luar', 80, NULL, 80, 20, '2017-07-27 07:20:20', '2017-07-27 07:20:20'),
(10, 'FAR01', 'FARMACROL F TAB', 'Strip', 7000, 'Obat Injeksi', 'Barang Luar', 20, 20, 0, 20, '2017-07-27 07:20:42', '2017-07-27 07:20:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtl_pemesanan_tbl`
--

CREATE TABLE `dtl_pemesanan_tbl` (
  `id` int(10) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `date_pemesanan` date NOT NULL,
  `harga_pesanan` int(10) NOT NULL,
  `total_hp` int(10) NOT NULL,
  `discount` int(10) NOT NULL,
  `total_dc` int(10) NOT NULL,
  `harga_dc` int(10) NOT NULL,
  `ppn` int(10) NOT NULL,
  `total_all` int(10) NOT NULL,
  `jml_order` int(10) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `pbf_id` varchar(100) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dtl_pemesanan_tbl`
--

INSERT INTO `dtl_pemesanan_tbl` (`id`, `order_id`, `date_pemesanan`, `harga_pesanan`, `total_hp`, `discount`, `total_dc`, `harga_dc`, `ppn`, `total_all`, `jml_order`, `kode_barang`, `pbf_id`, `updated_at`, `created_at`) VALUES
(5, 'AAORDNVD20170811', '2017-08-11', 5000, 150000, 5, 7500, 142500, 14250, 156750, 30, 'ABV01', 'NVD', '2017-08-11 07:54:45', '2017-08-11 07:54:45'),
(6, 'AAORDNVD20170811', '2017-08-11', 10000, 400000, 10, 40000, 360000, 36000, 396000, 40, 'ACT01', 'NVD', '2017-08-11 07:54:45', '2017-08-11 07:54:45'),
(7, 'AAORDNVD20170811', '2017-08-11', 1000, 50000, 20, 10000, 40000, 4000, 44000, 50, 'ALB01', 'NVD', '2017-08-11 07:54:45', '2017-08-11 07:54:45'),
(8, 'AAORDNVD20170811', '2017-08-11', 1000, 20000, 5, 1000, 19000, 1900, 20900, 20, 'BTH01', 'NVD', '2017-08-11 07:54:45', '2017-08-11 07:54:45'),
(9, 'AAORDNVD20170811', '2017-08-11', 5000, 150000, 50, 75000, 75000, 7500, 82500, 30, 'BTL01', 'NVD', '2017-08-11 07:54:45', '2017-08-11 07:54:45'),
(10, 'AAORDNVD20170811', '2017-08-11', 7000, 350000, 5, 17500, 332500, 33250, 365750, 50, 'CAR01', 'NVD', '2017-08-11 07:56:45', '2017-08-11 07:56:45'),
(11, 'AAORDNVD20170811', '2017-08-11', 6000, 240000, 10, 24000, 216000, 21600, 237600, 40, 'DEX01', 'NVD', '2017-08-11 07:56:45', '2017-08-11 07:56:45'),
(12, 'AAORDNVD20170811', '2017-08-11', 5000, 100000, 50, 50000, 50000, 5000, 55000, 20, 'DOM01', 'NVD', '2017-08-11 07:56:45', '2017-08-11 07:56:45'),
(13, 'AAORDNVD20170811', '2017-08-11', 1000, 40000, 40, 16000, 24000, 2400, 26400, 40, 'EUP', 'NVD', '2017-08-11 07:56:45', '2017-08-11 07:56:45'),
(14, 'AAORDNVD20170811', '2017-08-11', 5000, 50000, 5, 2500, 47500, 4750, 52250, 10, 'FAR01', 'NVD', '2017-08-11 07:56:45', '2017-08-11 07:56:45'),
(15, 'AAORDNVP20170812', '2017-08-12', 5000, 50000, 5, 2500, 47500, 4750, 52250, 10, 'ABV01', 'NVP', '2017-08-11 07:58:07', '2017-08-11 07:58:07'),
(16, 'AAORDDTW20170811', '2017-08-11', 5000, 25000, 20, 5000, 20000, 2000, 22000, 5, 'ALB01', 'DTW', '2017-08-11 08:59:00', '2017-08-11 08:59:00'),
(17, 'AAORDDTW20170811', '2017-08-11', 10000, 20000, 5, 1000, 19000, 1900, 20900, 2, 'BTH01', 'DTW', '2017-08-11 08:59:00', '2017-08-11 08:59:00'),
(18, 'AAORDABY20170927', '2017-09-27', 2000, 2000, 4, 80, 1920, 192, 2112, 1, 'ALB01', 'ABY', '2017-09-29 20:24:05', '2017-09-29 20:24:05'),
(19, 'AAORDABY20170927', '2017-09-27', 4000, 8000, 5, 400, 7600, 760, 8360, 2, 'FAR01', 'ABY', '2017-09-29 20:24:05', '2017-09-29 20:24:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtl_resep_tbl`
--

CREATE TABLE `dtl_resep_tbl` (
  `id` int(10) NOT NULL,
  `resep_id` varchar(100) NOT NULL,
  `date_resep` date NOT NULL,
  `dokter` varchar(100) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `jml_barang` int(10) NOT NULL,
  `jenis_resep` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dtl_resep_tbl`
--

INSERT INTO `dtl_resep_tbl` (`id`, `resep_id`, `date_resep`, `dokter`, `updated_at`, `created_at`, `kode_barang`, `jml_barang`, `jenis_resep`) VALUES
(4, 'AARSP201708111', '2017-08-11', 'Dr. Fernando', '2017-08-11 08:02:21', '2017-08-11 08:02:21', 'ACT01', 20, 'Bubuk'),
(5, 'AARSP201708111', '2017-08-11', 'Dr. Fernando', '2017-08-11 08:02:21', '2017-08-11 08:02:21', 'BTH01', 10, 'Bubuk'),
(6, 'AARSP201708112', '2017-08-11', 'Dr. A', '2017-08-11 09:04:16', '2017-08-11 09:04:16', 'ABV01', 1, 'Bubuk'),
(7, 'AARSP201708112', '2017-08-11', 'Dr. A', '2017-08-11 09:04:16', '2017-08-11 09:04:16', 'ACT01', 2, 'Bubuk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtl_stockin_tbl`
--

CREATE TABLE `dtl_stockin_tbl` (
  `id` int(10) NOT NULL,
  `stockin_id` varchar(100) NOT NULL,
  `date_stockin` date NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `pbf_id` varchar(100) NOT NULL,
  `jml_stockin` int(10) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dtl_stockin_tbl`
--

INSERT INTO `dtl_stockin_tbl` (`id`, `stockin_id`, `date_stockin`, `kode_barang`, `pbf_id`, `jml_stockin`, `updated_at`, `created_at`) VALUES
(6, 'AAINNVD20170811', '2017-08-11', 'ABV01', 'NVD', 30, '2017-08-11 07:55:00', '2017-08-11 07:55:00'),
(7, 'AAINNVD20170811', '2017-08-11', 'ACT01', 'NVD', 40, '2017-08-11 07:55:00', '2017-08-11 07:55:00'),
(8, 'AAINNVD20170811', '2017-08-11', 'ALB01', 'NVD', 50, '2017-08-11 07:55:00', '2017-08-11 07:55:00'),
(9, 'AAINNVD20170811', '2017-08-11', 'BTH01', 'NVD', 20, '2017-08-11 07:55:00', '2017-08-11 07:55:00'),
(10, 'AAINNVD20170811', '2017-08-11', 'BTL01', 'NVD', 30, '2017-08-11 07:55:00', '2017-08-11 07:55:00'),
(11, 'AAINNVD20170811', '2017-08-11', 'ABV01', 'NVD', 30, '2017-08-11 07:56:59', '2017-08-11 07:56:59'),
(12, 'AAINNVD20170811', '2017-08-11', 'ABV01', 'NVD', 30, '2017-08-11 07:56:59', '2017-08-11 07:56:59'),
(13, 'AAINNVD20170811', '2017-08-11', 'ACT01', 'NVD', 40, '2017-08-11 07:56:59', '2017-08-11 07:56:59'),
(14, 'AAINNVD20170811', '2017-08-11', 'ACT01', 'NVD', 40, '2017-08-11 07:56:59', '2017-08-11 07:56:59'),
(15, 'AAINNVD20170811', '2017-08-11', 'ALB01', 'NVD', 50, '2017-08-11 07:56:59', '2017-08-11 07:56:59'),
(16, 'AAINNVD20170811', '2017-08-11', 'ALB01', 'NVD', 50, '2017-08-11 07:56:59', '2017-08-11 07:56:59'),
(17, 'AAINNVD20170811', '2017-08-11', 'BTH01', 'NVD', 20, '2017-08-11 07:56:59', '2017-08-11 07:56:59'),
(18, 'AAINNVD20170811', '2017-08-11', 'BTH01', 'NVD', 20, '2017-08-11 07:56:59', '2017-08-11 07:56:59'),
(19, 'AAINNVD20170811', '2017-08-11', 'BTL01', 'NVD', 30, '2017-08-11 07:56:59', '2017-08-11 07:56:59'),
(20, 'AAINNVD20170811', '2017-08-11', 'BTL01', 'NVD', 30, '2017-08-11 07:56:59', '2017-08-11 07:56:59'),
(21, 'AAINNVD20170811', '2017-08-11', 'CAR01', 'NVD', 50, '2017-08-11 07:56:59', '2017-08-11 07:56:59'),
(22, 'AAINNVD20170811', '2017-08-11', 'CAR01', 'NVD', 50, '2017-08-11 07:56:59', '2017-08-11 07:56:59'),
(23, 'AAINNVD20170811', '2017-08-11', 'DEX01', 'NVD', 40, '2017-08-11 07:56:59', '2017-08-11 07:56:59'),
(24, 'AAINNVD20170811', '2017-08-11', 'DEX01', 'NVD', 40, '2017-08-11 07:56:59', '2017-08-11 07:56:59'),
(25, 'AAINNVD20170811', '2017-08-11', 'DOM01', 'NVD', 20, '2017-08-11 07:56:59', '2017-08-11 07:56:59'),
(26, 'AAINNVD20170811', '2017-08-11', 'DOM01', 'NVD', 20, '2017-08-11 07:56:59', '2017-08-11 07:56:59'),
(27, 'AAINNVD20170811', '2017-08-11', 'EUP', 'NVD', 40, '2017-08-11 07:56:59', '2017-08-11 07:56:59'),
(28, 'AAINNVD20170811', '2017-08-11', 'EUP', 'NVD', 40, '2017-08-11 07:56:59', '2017-08-11 07:56:59'),
(29, 'AAINNVD20170811', '2017-08-11', 'FAR01', 'NVD', 10, '2017-08-11 07:56:59', '2017-08-11 07:56:59'),
(30, 'AAINNVD20170811', '2017-08-11', 'FAR01', 'NVD', 10, '2017-08-11 07:56:59', '2017-08-11 07:56:59'),
(31, 'AAINNVP20170812', '2017-08-12', 'ABV01', 'NVP', 10, '2017-08-11 09:00:35', '2017-08-11 09:00:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtl_stockopname_tbl`
--

CREATE TABLE `dtl_stockopname_tbl` (
  `id` int(10) NOT NULL,
  `opname_id` varchar(100) NOT NULL,
  `date_opname` date NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `jml_sistem` int(10) NOT NULL,
  `jml_real` int(10) NOT NULL,
  `status` varchar(100) NOT NULL,
  `keterangan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtl_trx_tbl`
--

CREATE TABLE `dtl_trx_tbl` (
  `id` int(10) NOT NULL,
  `trx_id` varchar(100) NOT NULL,
  `date_trx` date NOT NULL,
  `kode_barang` varchar(100) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `ttl_harga` int(10) NOT NULL,
  `discount` int(10) NOT NULL,
  `ttl_semua` int(10) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `resep_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dtl_trx_tbl`
--

INSERT INTO `dtl_trx_tbl` (`id`, `trx_id`, `date_trx`, `kode_barang`, `qty`, `ttl_harga`, `discount`, `ttl_semua`, `updated_at`, `created_at`, `resep_id`) VALUES
(4, 'AATRX201708111', '2017-08-11', 'ABV01', 20, 10000, 0, 200000, '2017-08-11 08:01:24', '2017-08-11 08:01:24', NULL),
(5, 'AATRX201708112', '2017-08-11', 'BTL01', 10, 7000, 0, 70000, '2017-08-11 08:03:00', '2017-08-11 08:03:00', NULL),
(6, 'AATRX201708112', '2017-08-11', NULL, NULL, 50000, 0, 50000, '2017-08-11 08:03:00', '2017-08-11 08:03:00', 'AARSP201708111'),
(7, 'AATRX201708113', '2017-08-11', 'FAR01', 20, 4000, 0, 80000, '2017-08-11 08:04:08', '2017-08-11 08:04:08', NULL),
(8, 'AATRX201708114', '2017-08-11', 'ALB01', 2, 10000, 0, 20000, '2017-08-11 09:06:02', '2017-08-11 09:06:02', NULL),
(9, 'AATRX201708114', '2017-08-11', NULL, NULL, 50000, 20, 40000, '2017-08-11 09:06:02', '2017-08-11 09:06:02', 'AARSP201708112');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_tbl`
--

CREATE TABLE `kategori_tbl` (
  `id` int(10) NOT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_tbl`
--

INSERT INTO `kategori_tbl` (`id`, `kategori`, `updated_at`, `created_at`) VALUES
(1, 'Obat Injeksi', '2017-07-27 07:08:19', '2017-07-27 07:08:19'),
(2, 'Obat Kulit', '2017-07-27 07:08:31', '2017-07-27 07:08:31'),
(3, 'Obat Kumur', '2017-07-27 07:08:39', '2017-07-27 07:08:39'),
(4, 'Obat Mata', '2017-07-27 07:08:45', '2017-07-27 07:08:45'),
(5, 'Obat Anak', '2017-07-27 07:08:53', '2017-07-27 07:08:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapping_tbl`
--

CREATE TABLE `mapping_tbl` (
  `id` int(10) NOT NULL,
  `subnav_id` varchar(100) DEFAULT NULL,
  `role_id` int(10) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapping_tbl`
--

INSERT INTO `mapping_tbl` (`id`, `subnav_id`, `role_id`, `updated_at`, `created_at`) VALUES
(1, 'AKNMP', 2, '2017-07-27 06:26:52', '2017-07-27 06:26:52'),
(2, 'AKNP', 2, '2017-07-27 06:26:52', '2017-07-27 06:26:52'),
(3, 'AKNPR', 2, '2017-07-27 06:26:52', '2017-07-27 06:26:52'),
(4, 'AKNRL', 2, '2017-07-27 06:26:52', '2017-07-27 06:26:52'),
(5, 'INVNTF', 2, '2017-07-27 06:26:52', '2017-07-27 06:26:52'),
(6, 'INVPMS', 2, '2017-07-27 06:26:52', '2017-07-27 06:26:52'),
(7, 'MASBRG', 2, '2017-07-27 06:26:52', '2017-07-27 06:26:52'),
(8, 'MASKAT', 2, '2017-07-27 06:26:52', '2017-07-27 06:26:52'),
(9, 'MASPBF', 2, '2017-07-27 06:26:52', '2017-07-27 06:26:52'),
(10, 'MASSTN', 2, '2017-07-27 06:26:52', '2017-07-27 06:26:52'),
(11, 'PJNALK', 2, '2017-07-27 06:26:52', '2017-07-27 06:26:52'),
(12, 'PJNRSP', 2, '2017-07-27 06:26:52', '2017-07-27 06:26:52'),
(13, 'PJNTRX', 2, '2017-07-27 06:26:52', '2017-07-27 06:26:52'),
(14, 'STKIN', 2, '2017-07-27 06:26:52', '2017-07-27 06:26:52'),
(15, 'STKOP', 2, '2017-07-27 06:26:52', '2017-07-27 06:26:52'),
(16, 'STKV', 2, '2017-07-27 06:26:52', '2017-07-27 06:26:52'),
(17, 'PJNRSP', 3, '2017-07-27 06:32:29', '2017-07-27 06:32:29'),
(18, 'STKIN', 3, '2017-07-27 06:32:29', '2017-07-27 06:32:29'),
(19, 'STKOP', 3, '2017-07-27 06:32:29', '2017-07-27 06:32:29'),
(20, 'STKV', 3, '2017-07-27 06:32:29', '2017-07-27 06:32:29'),
(21, 'AKNMP', 3, '2017-08-10 11:03:15', '2017-08-10 11:03:15'),
(22, 'AKNP', 3, '2017-08-10 11:03:15', '2017-08-10 11:03:15'),
(23, 'AKNPR', 3, '2017-08-10 11:03:15', '2017-08-10 11:03:15'),
(24, 'AKNRL', 3, '2017-08-10 11:03:15', '2017-08-10 11:03:15'),
(25, 'PJNALK', 4, '2017-08-11 02:08:34', '2017-08-11 02:08:34'),
(26, 'PJNRSP', 4, '2017-08-11 02:08:34', '2017-08-11 02:08:34'),
(27, 'PJNTRX', 4, '2017-08-11 02:08:34', '2017-08-11 02:08:34'),
(28, 'AKNMP', 5, '2017-10-02 10:48:07', '2017-10-02 10:48:07'),
(29, 'INVNTF', 5, '2017-10-02 10:48:07', '2017-10-02 10:48:07'),
(30, 'MASPBF', 5, '2017-10-02 10:48:07', '2017-10-02 10:48:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_07_02_230147_migration_cartalyst_sentinel', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `navigation_tbl`
--

CREATE TABLE `navigation_tbl` (
  `nav_id` varchar(100) NOT NULL,
  `nav` varchar(100) DEFAULT NULL,
  `nav_page` varchar(100) DEFAULT NULL,
  `nav_icon` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `navigation_tbl`
--

INSERT INTO `navigation_tbl` (`nav_id`, `nav`, `nav_page`, `nav_icon`) VALUES
('AKN', 'Akun & Pegawai', NULL, 'fa fa-fw fa-users'),
('INV', 'Pemesanan', NULL, 'fa fa-fw fa-list-alt'),
('MAS', 'Data Master', NULL, 'fa fa-fw fa-file'),
('PJN', 'Penjualan', NULL, 'fa fa-fw fa-barcode'),
('STK', 'Stock Barang', NULL, 'fa fa-fw fa-database');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pbf_tbl`
--

CREATE TABLE `pbf_tbl` (
  `id` int(10) NOT NULL,
  `pbf` varchar(100) NOT NULL,
  `kode_pbf` varchar(100) NOT NULL,
  `alamat` varchar(1000) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `telepon_pic` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pbf_tbl`
--

INSERT INTO `pbf_tbl` (`id`, `pbf`, `kode_pbf`, `alamat`, `pic`, `telepon_pic`, `telepon`, `updated_at`, `created_at`) VALUES
(1, 'NV. DJAMALUNGUN A.P.', 'NVD', 'Alamat 1', 'Mamat', '83298', '082216418599', '2017-07-27 07:11:51', '2017-07-27 07:11:51'),
(2, 'NV. PHARMACIE NASIONAL', 'NVP', 'Dago', 'Boy', '31221312', '082216418599', '2017-07-27 07:12:17', '2017-07-27 07:12:17'),
(3, 'PT. ABEYE LESTARI', 'ABY', 'padang', 'mang', '21312', '08127106580', '2017-07-27 07:13:49', '2017-07-27 07:12:29'),
(4, 'PT. ADAMSONS', 'ADM', 'ambon', 'Adam', '3121412', '082216418599', '2017-07-27 07:14:14', '2017-07-27 07:14:14'),
(5, 'PT. ADITYA WIGUNA KENCANA', 'DTW', 'palembang', 'Adit', '124312', '082216418599', '2017-07-27 07:14:42', '2017-07-27 07:14:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan_tbl`
--

CREATE TABLE `pemesanan_tbl` (
  `id` int(10) NOT NULL,
  `order_id` varchar(1000) NOT NULL,
  `date_pemesanan` date NOT NULL,
  `pbf_id` varchar(100) NOT NULL,
  `stockin_status` int(2) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan_tbl`
--

INSERT INTO `pemesanan_tbl` (`id`, `order_id`, `date_pemesanan`, `pbf_id`, `stockin_status`, `updated_at`, `created_at`) VALUES
(3, 'AAORDNVD20170811', '2017-08-11', 'NVD', 1, '2017-08-11 07:54:45', '2017-08-11 07:54:45'),
(4, 'AAORDNVD20170811', '2017-08-11', 'NVD', 1, '2017-08-11 07:56:45', '2017-08-11 07:56:45'),
(5, 'AAORDNVP20170812', '2017-08-12', 'NVP', 1, '2017-08-11 07:58:07', '2017-08-11 07:58:07'),
(6, 'AAORDDTW20170811', '2017-08-11', 'DTW', 0, '2017-08-11 08:59:00', '2017-08-11 08:59:00'),
(7, 'AAORDABY20170927', '2017-09-27', 'ABY', 0, '2017-09-29 20:24:05', '2017-09-29 20:24:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `persistences`
--

CREATE TABLE `persistences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `persistences`
--

INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(2, 2, 'QuLjl2F5jT5No1VAA3LSclBNGGyZAfeZ', '2017-06-11 08:19:44', '2017-06-11 08:19:44'),
(3, 1, 'lKNTuusAoQmps8ZoHxerqCoMyNgcpqKP', '2017-06-12 02:01:04', '2017-06-12 02:01:04'),
(4, 1, 'cCxoleKA82JGpEK2qAroot7vSiakjWMl', '2017-06-14 22:16:23', '2017-06-14 22:16:23'),
(5, 1, 'go7EfjzMpWpLCo3qffw2QLEVI86o2674', '2017-06-14 22:54:21', '2017-06-14 22:54:21'),
(6, 1, '04V269vsCmRhlMkjAXgFeXGVCtwEF8MF', '2017-06-15 13:58:51', '2017-06-15 13:58:51'),
(7, 1, 'fWv4aU7KdLoqZUTbgNGEY7Jz2Ez7ezZD', '2017-06-15 14:01:09', '2017-06-15 14:01:09'),
(8, 1, 'O2RGU32RM7goEF2zEyAhh7UiLvmI2PiC', '2017-06-15 17:11:12', '2017-06-15 17:11:12'),
(9, 1, '8w6fWmjnfeIGkPAjwZjQdZHsOjEGKeF2', '2017-06-16 17:36:19', '2017-06-16 17:36:19'),
(10, 1, 'hWVqL9jUwCPBl1fFt67CPi3ioHqLwQeB', '2017-06-16 17:36:31', '2017-06-16 17:36:31'),
(11, 1, 'wxqjsOqa0DTnduOLxWIdO0o8LXOoCoLj', '2017-06-18 00:47:45', '2017-06-18 00:47:45'),
(12, 1, 'ebkK3PkIPe1QUNp7fDVt16Ef7jZFzDNx', '2017-06-18 23:04:06', '2017-06-18 23:04:06'),
(13, 1, 'Hf6lCCj2TyPxwhHrW3RxhkC4gx1EiOuj', '2017-06-18 23:46:19', '2017-06-18 23:46:19'),
(14, 1, 'pbNZP2g7oyhTj0H5iCRIFF6nlMarSjuV', '2017-06-19 17:39:58', '2017-06-19 17:39:58'),
(15, 1, 'hzRs6GUB0wobJ2pI66rZqAm1qUDAKG1T', '2017-06-20 01:49:08', '2017-06-20 01:49:08'),
(16, 1, 'V8ALT4uXKenGD7NvP07jldjsXBNtgbmh', '2017-06-20 02:58:17', '2017-06-20 02:58:17'),
(17, 1, 'FD5g0f8gPtehbRJJsvFYpuTyqtIM3DYp', '2017-06-20 05:40:26', '2017-06-20 05:40:26'),
(18, 1, 'VSgIaRwwQEBb4AALeGLyeoQRXn39sKhS', '2017-06-20 12:00:39', '2017-06-20 12:00:39'),
(21, 1, 'Zz5kfBtbvfYJmi7ygqEF5O8cUWO11fYF', '2017-06-20 21:04:58', '2017-06-20 21:04:58'),
(22, 1, 'zX5KG4GSuA18t81ATvAz68nVFqpkJXyL', '2017-06-20 22:09:50', '2017-06-20 22:09:50'),
(23, 2, 'yu59Gloi7eS17SGAIdhmoUvV6fcYeTIX', '2017-06-20 22:23:37', '2017-06-20 22:23:37'),
(24, 1, 'afutwZcQVXTOC5ffIdTNDjZpQFL8J56V', '2017-06-22 01:56:07', '2017-06-22 01:56:07'),
(25, 1, 'DkxxnSJ6gAeqE4V61PXFbKKk6UdIhuvo', '2017-06-24 00:24:07', '2017-06-24 00:24:07'),
(26, 1, 'NYZoTl3hBEul1UVMBDCRmR4QkTDuL26W', '2017-06-25 06:53:29', '2017-06-25 06:53:29'),
(27, 1, 'KBj85lCi8GHN0J8zi9KqurlibmaCr2LR', '2017-06-26 05:38:44', '2017-06-26 05:38:44'),
(28, 1, 'lKSAXhmFMHbcnPSOEkTivauxHAmqPsC8', '2017-06-26 14:28:41', '2017-06-26 14:28:41'),
(29, 1, 'jfywttXezLPyLadiRXasnJeIzot5EPfn', '2017-06-27 08:20:18', '2017-06-27 08:20:18'),
(30, 1, 'umzGg9puHSj6PFW6I82vWTS1PuZvIIhE', '2017-06-28 18:38:32', '2017-06-28 18:38:32'),
(31, 1, '2muCyytr8mo0qgTqL8QCEIU1u7bNlKkv', '2017-06-28 22:49:50', '2017-06-28 22:49:50'),
(32, 1, 'SiW5iMDHp6NrtWPayxkLlahlqJLdnp8A', '2017-06-29 03:46:52', '2017-06-29 03:46:52'),
(33, 1, 'wq2tZ1p6jOZexlD1iP89sXoZo51gAWN1', '2017-06-29 23:15:39', '2017-06-29 23:15:39'),
(34, 1, 'QrJnNlgDVkgarKo7cR821v682d6tiMRP', '2017-06-30 05:10:16', '2017-06-30 05:10:16'),
(35, 1, 'aUDCt5lnv17QPCjbT8Y39f202ZcjfzIi', '2017-07-01 00:22:12', '2017-07-01 00:22:12'),
(36, 1, 'cayN7Z1U3VfB04gvKvRkwV226TIhejyq', '2017-07-01 16:14:56', '2017-07-01 16:14:56'),
(37, 1, 'yFgnazipDhu5OiTR9yYewDQnXfS1VxJl', '2017-07-02 16:23:31', '2017-07-02 16:23:31'),
(38, 1, 'ppYZYZTLEX8syzZyZy5QVOzFWhMFlqJg', '2017-07-07 07:19:07', '2017-07-07 07:19:07'),
(39, 1, 'fA6nYFurDYQ06CrMwd4fXkwoiF55SCJp', '2017-07-09 19:34:11', '2017-07-09 19:34:11'),
(40, 1, 'IQJB4RzdSAiNR7mMJrw1789Sgw12KRFT', '2017-07-10 21:10:01', '2017-07-10 21:10:01'),
(41, 1, 'oQmaOcF8FW9KUmG73Y8TGL6PSJhoUnqF', '2017-07-12 00:04:23', '2017-07-12 00:04:23'),
(42, 1, 'g9LoBc6wPukMUOUMag189xW5e9XzIK8d', '2017-07-12 15:28:19', '2017-07-12 15:28:19'),
(45, 1, 'vBOxAwahJHqXyaNWKdztehU0hBIhhxko', '2017-07-12 22:13:42', '2017-07-12 22:13:42'),
(46, 1, 'aRmxZ67Kw1DpBpAq1lw7qDpQuJIHeKPq', '2017-07-13 00:28:48', '2017-07-13 00:28:48'),
(47, 1, '1phISazIs6iixKc7h8KW1xmjNf6codfg', '2017-07-17 02:51:10', '2017-07-17 02:51:10'),
(55, 4, '7AGYGRWiDUAnMorna88MUdcKxIfqhOOI', '2017-07-22 00:46:56', '2017-07-22 00:46:56'),
(58, 1, 'xztRvyARb3qLQfUdl1Ub7ILgmSAo61XE', '2017-07-22 01:05:11', '2017-07-22 01:05:11'),
(59, 1, 'jmvEOAZSIfI1bcDesN3AhoBkCxRmsr7l', '2017-07-22 07:13:27', '2017-07-22 07:13:27'),
(60, 1, 'hXlKKvrks3MBKYEy5ntJkrVwLGAsca68', '2017-07-22 14:23:05', '2017-07-22 14:23:05'),
(61, 1, 'ReVXxPLfr5YcjXbuonAqHPHoNJXYca8W', '2017-07-22 14:33:03', '2017-07-22 14:33:03'),
(62, 1, '2hwCO8sFcClQKfOtMs9qqRu2zA9h2N74', '2017-07-22 15:17:04', '2017-07-22 15:17:04'),
(63, 1, 'A5bDoFnEJWJZITGVeFdSUmC2RJXtGXy0', '2017-07-23 06:20:53', '2017-07-23 06:20:53'),
(65, 4, 'zyybM03SvGtusuDuzJK8IgwxBOFbIEEm', '2017-07-26 23:27:04', '2017-07-26 23:27:04'),
(66, 1, 'QkO3aBpyNH09p93rnLV9I5eszkHn5Uqr', '2017-08-10 01:19:33', '2017-08-10 01:19:33'),
(70, 1, 'amrwUJVTu78t0kRQEjQIqa2DCznBAROT', '2017-08-10 04:04:32', '2017-08-10 04:04:32'),
(71, 1, 'G6qdHvSY2H6ebrHXfjngEoLpstBWY3rw', '2017-09-12 21:08:44', '2017-09-12 21:08:44'),
(72, 1, 'QE8VKUXjeLu9oELZVu11KfIOVYg3OqQ6', '2017-09-13 00:33:21', '2017-09-13 00:33:21'),
(73, 1, 'lU3qBX40Uf75QHRGtiAsqwBEQ3NYMwgv', '2017-09-13 01:14:15', '2017-09-13 01:14:15'),
(74, 1, 'WmDtewkj6sV2iPir9TrCHUx0pJvRwuqH', '2017-09-25 08:04:57', '2017-09-25 08:04:57'),
(75, 1, 'sVN4MD4P1m78Bnzjtz7lsocdAFsDHByp', '2017-09-27 07:31:03', '2017-09-27 07:31:03'),
(76, 1, '8vcHR5pZA32jZMS5dGtfTs0M8IK1xxVo', '2017-09-27 07:48:49', '2017-09-27 07:48:49'),
(77, 1, 'uLJ7fxMzeZ6eVXLUKPST1gtNFkcWCZu2', '2017-09-28 21:33:18', '2017-09-28 21:33:18'),
(78, 1, 'k8ttRmNnEejS2ruGCdflYlHc1gZ6b1gU', '2017-09-29 01:46:51', '2017-09-29 01:46:51'),
(79, 1, 'ksuDPnTsKxi2LFUarYh7f77XhIHis0mr', '2017-09-29 01:47:48', '2017-09-29 01:47:48'),
(80, 1, 'pt81SptTqDtScpvIUeG08sOUdzvHQ3Bi', '2017-09-29 01:53:58', '2017-09-29 01:53:58'),
(81, 1, 'dd4BTfxNthEXgsIwicU5RWx7rnl6WKzI', '2017-09-29 06:22:31', '2017-09-29 06:22:31'),
(82, 1, 'qOY6bNC3MScgC2WZ6faXx2GfNy0ZyCEe', '2017-09-29 11:56:04', '2017-09-29 11:56:04'),
(83, 1, 'vtSSxp6E8LZF286NfJmHwiEoNjqg1BI2', '2017-10-01 16:01:50', '2017-10-01 16:01:50'),
(84, 1, 'NQ0pWIogco6JpnJBQZjq3UCkNe5LRo8m', '2017-10-01 16:36:16', '2017-10-01 16:36:16'),
(86, 5, '2EKMR3be1Epn5GqjHsOflGPyvFBI8wnJ', '2017-10-02 03:48:53', '2017-10-02 03:48:53'),
(87, 5, 'G2Fv0bNKzyNLlxHhyDUvP9tjuia07A9p', '2017-10-02 03:49:03', '2017-10-02 03:49:03'),
(89, 1, 'Qx7tjBATlsRmXPSFy2ROryT3EI3TH3bb', '2017-10-02 03:51:59', '2017-10-02 03:51:59'),
(90, 1, '0SeQwhr5dDtcku70OZADT9jFHpznQtvz', '2017-10-02 20:15:08', '2017-10-02 20:15:08'),
(91, 1, '5NZF7fpKnZ7AN4F6uflhodShtwNo7Fsg', '2017-10-10 20:01:16', '2017-10-10 20:01:16'),
(92, 1, '2FjdQKF4ghGkD645ZgMWSkZhIwvFHvll', '2017-10-10 20:32:47', '2017-10-10 20:32:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reminders`
--

CREATE TABLE `reminders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep_tbl`
--

CREATE TABLE `resep_tbl` (
  `id` int(10) NOT NULL,
  `resep_id` varchar(100) NOT NULL,
  `date_resep` date NOT NULL,
  `dokter` varchar(100) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `keterangan` varchar(1000) NOT NULL,
  `rcp_status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `resep_tbl`
--

INSERT INTO `resep_tbl` (`id`, `resep_id`, `date_resep`, `dokter`, `updated_at`, `created_at`, `keterangan`, `rcp_status`) VALUES
(2, 'AARSP201708111', '2017-08-11', 'Dr. Fernando', '2017-08-11 08:02:21', '2017-08-11 08:02:21', 'Obat Batuk', NULL),
(3, 'AARSP201708112', '2017-08-11', 'Dr. A', '2017-08-11 09:04:16', '2017-08-11 09:04:16', 'Test', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'spiderman', 'Spiderman', NULL, NULL, NULL),
(2, 'pemilik', 'Pemilik', NULL, NULL, NULL),
(3, 'apoteker', 'Apoteker', NULL, NULL, NULL),
(4, 'kasir', 'Kasir', NULL, NULL, NULL),
(5, 'INJEK', 'INJEK', NULL, '2017-10-02 03:47:42', '2017-10-02 03:47:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_users`
--

CREATE TABLE `role_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(2, 2, '2017-07-22 01:04:49', '2017-07-22 01:04:49'),
(4, 4, '2017-08-10 19:09:26', '2017-08-10 19:09:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan_tbl`
--

CREATE TABLE `satuan_tbl` (
  `id` int(10) NOT NULL,
  `satuan` varchar(100) DEFAULT NULL,
  `singkatan` varchar(10) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `satuan_tbl`
--

INSERT INTO `satuan_tbl` (`id`, `satuan`, `singkatan`, `updated_at`, `created_at`) VALUES
(1, 'box', 'box', '2017-07-27 07:04:46', '2017-07-27 07:04:46'),
(2, 'Botol', 'btl', '2017-07-27 07:05:14', '2017-07-27 07:05:14'),
(3, 'Cap', 'cap', '2017-07-27 07:05:23', '2017-07-27 07:05:23'),
(4, 'Kg', 'kg', '2017-07-27 07:05:32', '2017-07-27 07:05:32'),
(5, 'Mg', 'mg', '2017-07-27 07:05:39', '2017-07-27 07:05:39'),
(6, 'Liter', 'ltr', '2017-07-27 07:05:51', '2017-07-27 07:05:51'),
(7, 'Strip', 'strip', '2017-07-27 07:06:22', '2017-07-27 07:06:22'),
(8, 'Kapsul', 'kapsul', '2017-07-27 07:06:32', '2017-07-27 07:06:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stockin_tbl`
--

CREATE TABLE `stockin_tbl` (
  `id` int(10) NOT NULL,
  `stockin_id` varchar(100) NOT NULL,
  `date_stockin` date NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stockin_tbl`
--

INSERT INTO `stockin_tbl` (`id`, `stockin_id`, `date_stockin`, `order_id`, `updated_at`, `created_at`) VALUES
(3, 'AAINNVD20170811', '2017-08-11', 'AAORDNVD20170811', '2017-08-11 07:55:00', '2017-08-11 07:55:00'),
(4, 'AAINNVD20170811', '2017-08-11', 'AAORDNVD20170811', '2017-08-11 07:56:59', '2017-08-11 07:56:59'),
(5, 'AAINNVP20170812', '2017-08-12', 'AAORDNVP20170812', '2017-08-11 09:00:35', '2017-08-11 09:00:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stockopname_tbl`
--

CREATE TABLE `stockopname_tbl` (
  `id` int(10) NOT NULL,
  `opname_id` varchar(100) NOT NULL,
  `date_opname` date NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `judul` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `subnavigation_tbl`
--

CREATE TABLE `subnavigation_tbl` (
  `subnav_id` varchar(10) NOT NULL,
  `subNav` varchar(100) DEFAULT NULL,
  `nav_id` varchar(100) DEFAULT NULL,
  `pages` varchar(100) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subnavigation_tbl`
--

INSERT INTO `subnavigation_tbl` (`subnav_id`, `subNav`, `nav_id`, `pages`, `icon`) VALUES
('AKNMP', 'Role Mapping', 'AKN', '/mapping', NULL),
('AKNP', 'Pengaturan Akun', 'AKN', '/akun', NULL),
('AKNPR', 'Atur Peran', 'AKN', '/peran', NULL),
('AKNRL', 'User Role', 'AKN', '/role', NULL),
('INVNTF', 'Notif Pesanan', 'INV', '/notif', NULL),
('INVPMS', 'Pemesanan Barang', 'INV', '/pemesanan', NULL),
('MASBRG', 'Master Barang', 'MAS', '/barang', NULL),
('MASKAT', 'Master Kategori', 'MAS', '/kategori', NULL),
('MASPBF', 'Master PBF', 'MAS', '/pbf', NULL),
('MASSTN', 'Master Satuan', 'MAS', '/satuan', NULL),
('PJNALK', 'Alokasi Barang', 'PJN', '/alokasi', NULL),
('PJNRSP', 'Pengaturan Resep', 'PJN', '/resep', NULL),
('PJNTRX', 'Pengaturan Transaksi', 'PJN', '/transaksi', NULL),
('STKIN', 'Barang Masuk', 'STK', '/stockin', NULL),
('STKOP', 'Stock Opname', 'STK', '/stokopname', NULL),
('STKV', 'Stock Barang', 'STK', '/stokbarang', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `throttle`
--

CREATE TABLE `throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(1, NULL, 'global', NULL, '2018-09-06 01:08:39', '2018-09-06 01:08:39'),
(2, NULL, 'ip', '127.0.0.1', '2018-09-06 01:08:39', '2018-09-06 01:08:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_tbl`
--

CREATE TABLE `trx_tbl` (
  `id` int(10) NOT NULL,
  `trx_id` varchar(100) NOT NULL,
  `date_trx` date NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `payment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `trx_tbl`
--

INSERT INTO `trx_tbl` (`id`, `trx_id`, `date_trx`, `updated_at`, `created_at`, `payment`) VALUES
(2, 'AATRX201708111', '2017-08-11', '2017-08-11 08:01:24', '2017-08-11 08:01:24', 'CASH'),
(3, 'AATRX201708112', '2017-08-11', '2017-08-11 08:03:00', '2017-08-11 08:03:00', 'Debit Mandiri'),
(4, 'AATRX201708113', '2017-08-11', '2017-08-11 08:04:08', '2017-08-11 08:04:08', 'CASH'),
(5, 'AATRX201708114', '2017-08-11', '2017-08-11 09:06:02', '2017-08-11 09:06:02', 'CASH');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `telepon`, `img`, `sex`, `alamat`, `permissions`, `last_login`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(1, 'spiderman@marvel.com', '$2y$10$J29WpQ6uARDqLO/kmHih4ek/kPrkDSL8YIs08xbpyg1c5HFPdz7OW', 'spiderman', '991', 'Spider_Man.jpg', 'Laki-laki', 'Queen', NULL, '2018-01-26 21:59:11', 'Spider', 'Man', '2017-06-11 07:19:54', '2018-01-26 21:59:11'),
(2, 'indranura@gmail.com', '$2y$10$fbGHJZRy2iz56xGGV2wdKOLC31v/OF038K./v.s0/nkZq8xpwWiv2', 'indranura', '08127106580', 'Indra_Nura.jpg', 'Laki-laki', 'palembang', NULL, '2017-07-22 01:05:00', 'Indra', 'Nura', '2017-06-11 07:48:39', '2017-07-22 01:05:00'),
(4, 'test@g.c', '$2y$10$Pk0XYO4y3e28N4z6AfnpDueXDrqnjseZoTgC2IDSNLz8YNaniQsuy', 'admin', '90312', 'Admin_min.png', 'Laki-laki', 'admin', NULL, '2017-10-02 03:49:14', 'Admin', 'min', '2017-07-21 23:59:11', '2017-10-02 03:49:14'),
(5, 'inye@inye.com', '$2y$10$B/arCJXmBAR11i2OBraZPOKUMfqakQORRamzKToKvj9x3HSIpuFlK', 'inye', '312321', NULL, 'Laki-laki', 'inye', NULL, '2017-10-02 03:49:03', 'inye', 'inye', '2017-10-02 03:48:45', '2017-10-02 03:49:03');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `alokasi_tbl`
--
ALTER TABLE `alokasi_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang_tbl`
--
ALTER TABLE `barang_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dtl_pemesanan_tbl`
--
ALTER TABLE `dtl_pemesanan_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dtl_resep_tbl`
--
ALTER TABLE `dtl_resep_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dtl_stockin_tbl`
--
ALTER TABLE `dtl_stockin_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dtl_stockopname_tbl`
--
ALTER TABLE `dtl_stockopname_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dtl_trx_tbl`
--
ALTER TABLE `dtl_trx_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_tbl`
--
ALTER TABLE `kategori_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapping_tbl`
--
ALTER TABLE `mapping_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `navigation_tbl`
--
ALTER TABLE `navigation_tbl`
  ADD PRIMARY KEY (`nav_id`);

--
-- Indeks untuk tabel `pbf_tbl`
--
ALTER TABLE `pbf_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemesanan_tbl`
--
ALTER TABLE `pemesanan_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `persistences`
--
ALTER TABLE `persistences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persistences_code_unique` (`code`);

--
-- Indeks untuk tabel `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `resep_tbl`
--
ALTER TABLE `resep_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indeks untuk tabel `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indeks untuk tabel `satuan_tbl`
--
ALTER TABLE `satuan_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stockin_tbl`
--
ALTER TABLE `stockin_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stockopname_tbl`
--
ALTER TABLE `stockopname_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `subnavigation_tbl`
--
ALTER TABLE `subnavigation_tbl`
  ADD PRIMARY KEY (`subnav_id`);

--
-- Indeks untuk tabel `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `trx_tbl`
--
ALTER TABLE `trx_tbl`
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
-- AUTO_INCREMENT untuk tabel `activations`
--
ALTER TABLE `activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `alokasi_tbl`
--
ALTER TABLE `alokasi_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `barang_tbl`
--
ALTER TABLE `barang_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `dtl_pemesanan_tbl`
--
ALTER TABLE `dtl_pemesanan_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `dtl_resep_tbl`
--
ALTER TABLE `dtl_resep_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `dtl_stockin_tbl`
--
ALTER TABLE `dtl_stockin_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `dtl_stockopname_tbl`
--
ALTER TABLE `dtl_stockopname_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dtl_trx_tbl`
--
ALTER TABLE `dtl_trx_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kategori_tbl`
--
ALTER TABLE `kategori_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mapping_tbl`
--
ALTER TABLE `mapping_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pbf_tbl`
--
ALTER TABLE `pbf_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pemesanan_tbl`
--
ALTER TABLE `pemesanan_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT untuk tabel `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `resep_tbl`
--
ALTER TABLE `resep_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `satuan_tbl`
--
ALTER TABLE `satuan_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `stockin_tbl`
--
ALTER TABLE `stockin_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `stockopname_tbl`
--
ALTER TABLE `stockopname_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `trx_tbl`
--
ALTER TABLE `trx_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

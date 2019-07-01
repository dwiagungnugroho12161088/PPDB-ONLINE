-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2019 at 06:28 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uaskuloh`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kontak`
--

CREATE TABLE `tb_kontak` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `isi` text NOT NULL,
  `is_dibalas` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=belum dibalas; 1=sudah dibalas',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tb_kontak`
--

INSERT INTO `tb_kontak` (`id`, `nama`, `email`, `judul`, `isi`, `is_dibalas`, `created_at`, `updated_at`) VALUES
(1, 'fullan', 'dwiagung@gmail.com', 'TA Boss', 'TA sebentar lagi', '0', '2019-06-17 21:45:25', '2019-06-17 21:45:25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengumuman`
--

CREATE TABLE `tb_pengumuman` (
  `id` smallint(4) UNSIGNED NOT NULL,
  `judul` varchar(64) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `isi` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_pengumuman`
--

INSERT INTO `tb_pengumuman` (`id`, `judul`, `slug`, `isi`, `created_at`, `updated_at`) VALUES
(15, 'TA', 'ta', '<p>AKHIRNYA WIS-UDAH&nbsp;</p>', '2019-05-23 19:40:24', '2019-05-23 19:40:24');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peserta`
--

CREATE TABLE `tb_peserta` (
  `id` smallint(4) UNSIGNED NOT NULL,
  `email` varchar(64) NOT NULL,
  `username` char(8) NOT NULL,
  `password` char(8) NOT NULL,
  `nisn` char(10) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `nama_panggilan` varchar(32) NOT NULL,
  `jenis_kelamin` enum('P','L') DEFAULT NULL,
  `agama` enum('0','1','2','3','4','5','6') DEFAULT NULL COMMENT '0=lainnya; 1=islam; 2=katolik; 3=protestan; 4=hindu; 5=budha; 6=Konghucu',
  `ket_agama` varchar(32) DEFAULT NULL,
  `tempat_lahir` varchar(32) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `status_anak` enum('0','1') DEFAULT NULL COMMENT '0=angkat; 1=kandung',
  `anak_ke` varchar(2) DEFAULT NULL,
  `jumlah_saudara` varchar(2) DEFAULT NULL,
  `tmp_tinggal_dengan` enum('0','1','2','3','4') DEFAULT NULL COMMENT '0=lainnya; 1=orang tua; 2=kakak; 3=paman/bibi; 4=kakek/nenek',
  `tmp_ket_tinggal_dengan` varchar(32) DEFAULT NULL,
  `tmp_alamat` varchar(255) DEFAULT NULL,
  `tmp_telepon` varchar(16) DEFAULT NULL,
  `ort_nama_ayah` varchar(64) DEFAULT NULL,
  `ort_pekerjaan_ayah` enum('0','1','2','3','4','5','6','7') DEFAULT NULL COMMENT '0=lainnya; 1=pns; 2=tni/polri; 3=petani/nelayan; 4=buruh; 5=pedagang/wiraswasta; 6=tukang becak/ojek; 7=sopir',
  `ort_ket_pekerjaan_ayah` varchar(32) DEFAULT NULL,
  `ort_nama_ibu` varchar(64) DEFAULT NULL,
  `ort_pekerjaan_ibu` enum('0','1','2','3','4','5','6','7','8') DEFAULT NULL COMMENT '0=lainnya; 1=pns; 2=tni/polri; 3=petani/nelayan; 4=buruh; 5=pedagang/wiraswasta; 6=tukang becak/ojek; 7=sopir; 8=ibu rumah tangga(tidak bekerja)',
  `ort_ket_pekerjaan_ibu` varchar(32) DEFAULT NULL,
  `ort_alamat` varchar(255) DEFAULT NULL,
  `ort_telepon` varchar(16) DEFAULT NULL,
  `ort_penghasilan` varchar(12) DEFAULT NULL,
  `ska_nama` varchar(64) DEFAULT NULL,
  `ska_alamat` varchar(255) DEFAULT NULL,
  `ska_telepon` varchar(16) DEFAULT NULL,
  `ska_tahun_lulus` year(4) DEFAULT NULL,
  `ska_no_ijazah` varchar(32) DEFAULT NULL,
  `nil_bin_1` float(2,1) DEFAULT NULL,
  `nil_bin_2` float(2,1) DEFAULT NULL,
  `nil_bin_3` float(2,1) DEFAULT NULL,
  `status_pendaftaran` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=mengundurkan diri; 1=aktif',
  `status_biodata` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=belum lengkap; 1=sudah lengkap',
  `status_verifikasi` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=belum; 1=sudah',
  `status_seleksi` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = tidak lulus; 1=lulus;',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tb_peserta`
--

INSERT INTO `tb_peserta` (`id`, `email`, `username`, `password`, `nisn`, `nama`, `nama_panggilan`, `jenis_kelamin`, `agama`, `ket_agama`, `tempat_lahir`, `tanggal_lahir`, `status_anak`, `anak_ke`, `jumlah_saudara`, `tmp_tinggal_dengan`, `tmp_ket_tinggal_dengan`, `tmp_alamat`, `tmp_telepon`, `ort_nama_ayah`, `ort_pekerjaan_ayah`, `ort_ket_pekerjaan_ayah`, `ort_nama_ibu`, `ort_pekerjaan_ibu`, `ort_ket_pekerjaan_ibu`, `ort_alamat`, `ort_telepon`, `ort_penghasilan`, `ska_nama`, `ska_alamat`, `ska_telepon`, `ska_tahun_lulus`, `ska_no_ijazah`, `nil_bin_1`, `nil_bin_2`, `nil_bin_3`, `status_pendaftaran`, `status_biodata`, `status_verifikasi`, `status_seleksi`, `created_at`, `updated_at`) VALUES
(14, 'dwiagung@gmail.com', '51z2mNu0', 'ICLrJxvf', '1216108816', 'dwi nugroho agung', 'dwi ', 'L', '1', NULL, 'tangerang', '0000-00-00', NULL, NULL, NULL, NULL, NULL, 'qqqqqqqqqqqqqqqqqqqqqqqqqq', NULL, 'fullannah', NULL, NULL, NULL, NULL, NULL, 'tangeqqqqqqqqqq', NULL, NULL, 'pgri', 'asafewffv', NULL, NULL, '000000002223', 8.0, 8.9, 8.0, '1', '1', '1', '1', '2019-05-20 20:16:39', '2019-06-20 19:11:06'),
(16, 'dwiagung1@gmail.com', 'KPGuGYht', 'SEPWsuLJ', '1216108817', 'dwi agoenk', 'maleh', 'L', '1', NULL, 'pondok bambu', '0000-00-00', NULL, NULL, NULL, NULL, NULL, 'bsd', NULL, 'bapaku', NULL, NULL, NULL, NULL, NULL, 'bebas', NULL, NULL, 'pgri', 'adafaevaeb', NULL, NULL, '12345678910', 4.0, 4.5, 7.0, '1', '1', '0', '0', '2019-06-17 22:21:54', '2019-06-30 22:19:43'),
(17, 'dwiagung43@gmail.com', 'EtmHRX1j', 'B2rdIoMy', '1234567890', 'agung', 'maleh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', '0', '2019-06-18 17:23:04', '2019-06-18 17:23:04'),
(18, 'malih@gmail.com', 'ewC1lBy4', 'RgkqDBSh', '1216108867', 'jonss', 'bambang', 'L', '1', NULL, 'bsd', '0000-00-00', NULL, NULL, NULL, NULL, NULL, 'BSI BSD', NULL, 'maikel', NULL, NULL, NULL, NULL, NULL, 'kuburan', NULL, NULL, 'smk 1', 'deket 1', NULL, NULL, '1232143253534634', 9.0, 4.5, 8.0, '1', '1', '0', '0', '2019-07-01 16:34:51', '2019-07-01 16:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` tinyint(2) UNSIGNED NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` char(32) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `level` enum('operator','administrator') NOT NULL DEFAULT 'operator',
  `is_blokir` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `nama`, `level`, `is_blokir`, `created_at`, `updated_at`) VALUES
(18, 'agung', 'e172dd95f4feb21412a692e73929961e', 'dwi', 'administrator', '0', '2019-05-21 18:58:36', '2019-05-21 18:58:36'),
(20, 'kituuul', '3fc0a7acf087f549ac2b266baf94b8b1', 'kitul', 'administrator', '0', '2019-05-24 14:29:28', '2019-05-24 14:29:28'),
(21, 'galeh', '202cb962ac59075b964b07152d234b70', 'galeh', 'operator', '0', '2019-05-24 14:50:18', '2019-05-24 14:50:18'),
(22, 'arifaahh', 'd0ce47e20734cc992b3cdc0d2792d1c8', 'arifah', 'administrator', '0', '2019-05-24 14:57:57', '2019-05-24 14:57:57'),
(23, 'fullanah', 'd0ce47e20734cc992b3cdc0d2792d1c8', 'arifah', 'administrator', '0', '2019-05-24 14:58:14', '2019-05-24 14:58:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kontak`
--
ALTER TABLE `tb_kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengumuman`
--
ALTER TABLE `tb_pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nisn` (`nisn`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kontak`
--
ALTER TABLE `tb_kontak`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_pengumuman`
--
ALTER TABLE `tb_pengumuman`
  MODIFY `id` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  MODIFY `id` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

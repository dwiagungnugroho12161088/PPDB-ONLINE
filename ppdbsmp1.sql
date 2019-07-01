-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2017 at 04:12 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ppdbsmp1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kontak`
--

CREATE TABLE IF NOT EXISTS `tb_kontak` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `isi` text NOT NULL,
  `is_dibalas` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=belum dibalas; 1=sudah dibalas',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengumuman`
--

CREATE TABLE IF NOT EXISTS `tb_pengumuman` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(64) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `isi` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tb_pengumuman`
--

INSERT INTO `tb_pengumuman` (`id`, `judul`, `slug`, `isi`, `created_at`, `updated_at`) VALUES
(13, 'PENGUMUMAN PPDB ONLINE SMP NEGERI 1 WANASARI BREBES', 'pengumuman-ppdb-online-smp-negeri-1-wanasari-brebes', '<p>Akan diadakan pendaftaran penerimaan peserta didik baru di SMP Negeri 1 wanasari yang akan diselenggarakan sesuai jadwal</p>\r\n<p>&nbsp;</p>\r\n<p>Lihatlah JADWAL....!!!!!!!!</p>\r\n<p>&nbsp;</p>', '2017-08-06 09:31:50', '2017-08-06 09:31:50');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peserta`
--

CREATE TABLE IF NOT EXISTS `tb_peserta` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
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
  `nil_bin_4` float(2,1) DEFAULT NULL,
  `nil_bin_5` float(2,1) DEFAULT NULL,
  `nil_bin_rata` float(2,1) DEFAULT NULL,
  `nil_big_1` float(2,1) DEFAULT NULL,
  `nil_big_2` float(2,1) DEFAULT NULL,
  `nil_big_3` float(2,1) DEFAULT NULL,
  `nil_big_4` float(2,1) DEFAULT NULL,
  `nil_big_5` float(2,1) DEFAULT NULL,
  `nil_big_rata` float(2,1) DEFAULT NULL,
  `nil_mat_1` float(2,1) DEFAULT NULL,
  `nil_mat_2` float(2,1) DEFAULT NULL,
  `nil_mat_3` float(2,1) DEFAULT NULL,
  `nil_mat_4` float(2,1) DEFAULT NULL,
  `nil_mat_5` float(2,1) DEFAULT NULL,
  `nil_mat_rata` float(2,1) DEFAULT NULL,
  `nil_ipa_1` float(2,1) DEFAULT NULL,
  `nil_ipa_2` float(2,1) DEFAULT NULL,
  `nil_ipa_3` float(2,1) DEFAULT NULL,
  `nil_ipa_4` float(2,1) DEFAULT NULL,
  `nil_ipa_5` float(2,1) DEFAULT NULL,
  `nil_ipa_rata` float(2,1) DEFAULT NULL,
  `nil_ips_1` float(2,1) DEFAULT NULL,
  `nil_ips_2` float(2,1) DEFAULT NULL,
  `nil_ips_3` float(2,1) DEFAULT NULL,
  `nil_ips_4` float(2,1) DEFAULT NULL,
  `nil_ips_5` float(2,1) DEFAULT NULL,
  `nil_ips_rata` float(2,1) DEFAULT NULL,
  `status_pendaftaran` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=mengundurkan diri; 1=aktif',
  `status_biodata` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=belum lengkap; 1=sudah lengkap',
  `status_verifikasi` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=belum; 1=sudah',
  `status_seleksi` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = tidak lulus; 1=lulus;',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nisn` (`nisn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tb_peserta`
--

INSERT INTO `tb_peserta` (`id`, `email`, `username`, `password`, `nisn`, `nama`, `nama_panggilan`, `jenis_kelamin`, `agama`, `ket_agama`, `tempat_lahir`, `tanggal_lahir`, `status_anak`, `anak_ke`, `jumlah_saudara`, `tmp_tinggal_dengan`, `tmp_ket_tinggal_dengan`, `tmp_alamat`, `tmp_telepon`, `ort_nama_ayah`, `ort_pekerjaan_ayah`, `ort_ket_pekerjaan_ayah`, `ort_nama_ibu`, `ort_pekerjaan_ibu`, `ort_ket_pekerjaan_ibu`, `ort_alamat`, `ort_telepon`, `ort_penghasilan`, `ska_nama`, `ska_alamat`, `ska_telepon`, `ska_tahun_lulus`, `ska_no_ijazah`, `nil_bin_1`, `nil_bin_2`, `nil_bin_3`, `nil_bin_4`, `nil_bin_5`, `nil_bin_rata`, `nil_big_1`, `nil_big_2`, `nil_big_3`, `nil_big_4`, `nil_big_5`, `nil_big_rata`, `nil_mat_1`, `nil_mat_2`, `nil_mat_3`, `nil_mat_4`, `nil_mat_5`, `nil_mat_rata`, `nil_ipa_1`, `nil_ipa_2`, `nil_ipa_3`, `nil_ipa_4`, `nil_ipa_5`, `nil_ipa_rata`, `nil_ips_1`, `nil_ips_2`, `nil_ips_3`, `nil_ips_4`, `nil_ips_5`, `nil_ips_rata`, `status_pendaftaran`, `status_biodata`, `status_verifikasi`, `status_seleksi`, `created_at`, `updated_at`) VALUES
(3, 'dimaswahyudi72@gmail.com', 'ErQaRQ3w', 'rsjUBTDS', '0902930203', 'Dimas Wahyudi', 'dimas', 'L', '1', NULL, 'Brebes', '1999-11-04', '1', '3', '5', '1', NULL, 'Brebes', '08386849889', 'Simas', '7', NULL, 'Ani', '8', NULL, 'Brebes', '081800091299', '1000000', 'Sdn Klampok 5', 'Klampok', '09399999', 2009, '09204929999', 9.0, 9.0, 9.0, 9.0, 9.0, 9.0, 9.0, 9.0, 9.0, 9.0, 9.0, 9.0, 9.0, 9.0, 9.0, 9.0, 9.0, 9.0, 9.0, 9.0, 9.0, 9.0, 9.0, 9.0, 9.0, 9.0, 9.0, 9.0, 9.0, 9.0, '1', '1', '1', '1', '2017-08-03 17:33:34', '2017-08-03 17:36:45'),
(4, 'dimaswahyudi742@gmail.com', 'S6cqmXDd', 'vshTPSCM', '0943993939', 'Dimas', 'adi', 'L', '1', NULL, 'Brebes', '2010-02-09', '1', '6', '55', '1', NULL, 'Brebes', '08988889', 'Siman', '3', NULL, 'Suri', '8', NULL, 'Klampok', '089788889', '1000000', 'Sdn Klampok 5', 'Brebes', '0898987', 2010, '08989898', 9.0, 9.9, 9.0, 9.9, 9.0, 9.9, 9.9, 9.0, 9.0, 9.0, 9.0, 9.9, 9.0, 9.0, 9.0, 9.0, 9.9, 9.9, 9.0, 9.0, 9.0, 9.9, 9.0, 9.9, 9.0, 9.0, 9.0, 9.0, 9.9, 9.9, '1', '1', '1', '0', '2017-08-04 17:25:16', '2017-08-05 08:30:09'),
(5, 'didinirawan93@gmail.com', '1doisrMD', 'mpSHtmU5', '0919100000', 'Endang Sukamti', 'kamti', 'L', '2', NULL, 'Brebes', '2014-06-17', '1', '5', '10', '2', NULL, 'Brebes', 'brebes', 'Jihan', '3', NULL, 'Yanti', '4', NULL, 'Brebes', '0894549999', '1000000', 'Sd Klampok 6', 'Brebes', '0896583956', 2013, '0986958694', 9.9, 9.9, 9.9, 9.9, 9.9, 9.9, 9.9, 9.9, 9.9, 9.9, 9.9, 9.9, 9.9, 9.9, 9.9, 9.9, 9.9, 9.9, 9.9, 9.9, 9.9, 9.9, 9.9, 9.9, 9.9, 9.9, 9.9, 9.9, 9.9, 9.9, '1', '1', '0', '0', '2017-08-05 08:34:16', '2017-08-05 11:18:28'),
(12, 'didinirawan9333@gmail.com', 'HHXtfRBr', 'bYiF5GRO', '0999999988', 'Didin Irawan', 'didin', 'L', '1', NULL, 'Brebes', '2010-02-02', '1', '3', '6', '2', NULL, 'BREBES', '083932493888', 'JURI', '2', NULL, 'SARNI', '8', NULL, 'BREBES', '0940239', '083402348', 'Sdn Klampok 5', 'BREBES', '0849082348239', 2014, '093049320492300', 9.9, 9.9, 9.0, 9.0, 9.0, 9.4, 9.0, 9.9, 9.0, 9.9, 9.0, 9.4, 9.0, 9.0, 9.9, 9.9, 9.9, 9.5, 9.0, 9.0, 9.0, 9.9, 9.9, 9.4, 9.0, 9.0, 9.0, 9.0, 9.0, 9.0, '1', '1', '0', '0', '2017-08-06 14:40:14', '2017-08-06 14:51:11'),
(13, 'didinjaya@gmail', 'q0xYgb5s', 'EA2INzC3', '0458435343', 'Jaya', 'jaya', 'L', '1', NULL, 'BREBES', '2009-01-05', '1', '3', '5', '1', NULL, 'BREBES', '0893483999993', 'SORI', '4', NULL, 'Sinah', '5', NULL, 'Brebes', '045948593489', '1000000', 'Sdn Klampok 5', 'Klampok', '09839489', 2017, '0940r4052589', 9.9, 9.9, 9.9, 9.0, 9.0, 9.5, 9.0, 9.0, 9.0, 9.0, 9.0, 9.0, 9.9, 9.0, 9.0, 9.0, 9.0, 9.2, 9.9, 9.0, 9.0, 9.0, 9.0, 9.2, 9.0, 9.0, 9.0, 9.0, 9.0, 9.0, '1', '1', '0', '0', '2017-08-06 15:12:09', '2017-08-06 15:36:42');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` char(32) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `level` enum('operator','administrator') NOT NULL DEFAULT 'operator',
  `is_blokir` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `nama`, `level`, `is_blokir`, `created_at`, `updated_at`) VALUES
(15, 'dimas', '7d49e40f4b3d8f68c19406a58303f826', 'dimas', 'administrator', '0', '2017-08-06 09:28:06', '2017-08-06 09:28:06'),
(16, 'wayink', '6b52208675d79ca29cfb6fa2f01c7545', 'wayink', 'operator', '0', '2017-08-06 09:28:32', '2017-08-06 09:28:32');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

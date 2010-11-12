-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 12, 2010 at 08:28 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sidemik`
--
CREATE DATABASE `sidemik` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sidemik`;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `nip` varchar(20) NOT NULL,
  `username_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tahun_masuk` int(11) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` datetime NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `telp_rumah` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`nip`,`username_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--


-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `kode_mata_kuliah` varchar(10) NOT NULL,
  `hari` int(11) NOT NULL,
  `jam` int(11) NOT NULL,
  `ruangan` int(11) NOT NULL,
  PRIMARY KEY (`kode_mata_kuliah`,`hari`,`jam`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--


-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kosong_dosen`
--

CREATE TABLE IF NOT EXISTS `jadwal_kosong_dosen` (
  `nip_dosen` varchar(20) NOT NULL,
  `hari` int(11) NOT NULL,
  `jam` int(11) NOT NULL,
  PRIMARY KEY (`nip_dosen`,`hari`,`jam`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_kosong_dosen`
--


-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` varchar(12) NOT NULL,
  `username_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `telp_rumah` varchar(20) NOT NULL,
  `tahun_masuk` int(11) NOT NULL,
  `status_kelulusan` int(11) NOT NULL,
  PRIMARY KEY (`nim`),
  UNIQUE KEY `nim` (`nim`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--


-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE IF NOT EXISTS `matakuliah` (
  `kode` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `tingkat` int(11) NOT NULL,
  `semester_buka` int(11) NOT NULL COMMENT '1 -> hanya semester ganjil, 2 -> hanya semester genap, selain angka itu -> di kedua semester',
  PRIMARY KEY (`kode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--


-- --------------------------------------------------------

--
-- Table structure for table `mengajar`
--

CREATE TABLE IF NOT EXISTS `mengajar` (
  `nip_dosen` varchar(20) NOT NULL,
  `kode_mata_kuliah` varchar(10) NOT NULL,
  PRIMARY KEY (`nip_dosen`,`kode_mata_kuliah`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mengajar`
--


-- --------------------------------------------------------

--
-- Table structure for table `pengambilan_mk`
--

CREATE TABLE IF NOT EXISTS `pengambilan_mk` (
  `nim_mahasiswa` varchar(12) NOT NULL,
  `kode_kuliah` varchar(10) NOT NULL,
  `semester` int(11) NOT NULL,
  `nilai` varchar(1) NOT NULL COMMENT 'A, B, C, D atau E',
  PRIMARY KEY (`nim_mahasiswa`,`kode_kuliah`,`semester`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengambilan_mk`
--


-- --------------------------------------------------------

--
-- Table structure for table `refensi_status_kelulusan`
--

CREATE TABLE IF NOT EXISTS `refensi_status_kelulusan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `refensi_status_kelulusan`
--

INSERT INTO `refensi_status_kelulusan` (`id`, `status`) VALUES
(1, 'lulus'),
(2, 'belum lulus'),
(3, 'drop out');

-- --------------------------------------------------------

--
-- Table structure for table `referensi_hari`
--

CREATE TABLE IF NOT EXISTS `referensi_hari` (
  `id` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referensi_hari`
--

INSERT INTO `referensi_hari` (`id`, `hari`) VALUES
(1, 'senin'),
(2, 'selasa'),
(3, 'rabu'),
(4, 'kamis'),
(5, 'jumat'),
(6, 'sabtu'),
(7, 'minggu');

-- --------------------------------------------------------

--
-- Table structure for table `referensi_jam`
--

CREATE TABLE IF NOT EXISTS `referensi_jam` (
  `id` int(11) NOT NULL,
  `mulai` time NOT NULL,
  `selesai` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referensi_jam`
--


-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `role`
--


-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE IF NOT EXISTS `ruangan` (
  `no` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--


-- --------------------------------------------------------

--
-- Table structure for table `status_pembayaran`
--

CREATE TABLE IF NOT EXISTS `status_pembayaran` (
  `nim` varchar(12) NOT NULL,
  `semester` int(11) NOT NULL,
  `status` varchar(1) NOT NULL COMMENT '0 berarti belum bayar, 1 berarti telah bayar',
  PRIMARY KEY (`nim`,`semester`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_pembayaran`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 21, 2010 at 05:44 PM
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
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `name` varchar(20) NOT NULL,
  `value` varchar(20) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`name`, `value`) VALUES
('tahun', '2010'),
('semester', '1');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `nip` varchar(20) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tahun_masuk` int(11) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` int(1) NOT NULL DEFAULT '-1' COMMENT '0 => wanita, 1=> pria',
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `telp_rumah` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`nip`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `user_id` int(11) unsigned NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` int(1) NOT NULL DEFAULT '-1' COMMENT '0 => wanita, 1 => pria',
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `telp_rumah` varchar(20) NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `status_kelulusan` int(11) NOT NULL,
  PRIMARY KEY (`nim`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `user_id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `email`, `alamat`, `no_hp`, `nama_ayah`, `telp_rumah`, `tahun_masuk`, `status_kelulusan`) VALUES
('13508104', 6, 'Rezan Achmad', 'Palu', '1991-02-02', 1, 'rezanachmad@yahoo.co.id', 'Cisitu', '085255150506', 'Has Atjo', '', 2009, 2);

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE IF NOT EXISTS `matakuliah` (
  `kode` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jumlah_sks` int(2) NOT NULL,
  `deskripsi` text NOT NULL,
  `tingkat` int(11) NOT NULL,
  `semester_buka` int(11) NOT NULL COMMENT '1 -> hanya semester ganjil, 2 -> hanya semester genap, selain angka itu -> di kedua semester',
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`kode`, `nama`, `jumlah_sks`, `deskripsi`, `tingkat`, `semester_buka`) VALUES
('EL2095', 'Sistem Digital', 3, 'Sistem Digital', 2, 1),
('IF2030', 'Algoritma dan Struktur Data', 4, 'Algoritma dan Struktur Data', 2, 1),
('IF2032', 'Pemograman Berorientasi Objek', 4, 'Pemograman Berorientasi Objek', 2, 2),
('IF2034', 'Basis Data', 3, 'Basis Data', 2, 2),
('IF2050', 'Logika Informatika', 3, 'Logika Informatika', 2, 2),
('IF2091', 'Struktur Diskrit', 3, 'Struktur Diskrit', 2, 1),
('IF3037', 'RPPL', 3, 'RPLL', 3, 1),
('IF3051', 'Strategi Algoritma', 3, 'Strategi Algoritma', 3, 1),
('IF3054', 'Intelegensia Buatan', 3, 'Intelegensia Buatan', 3, 2),
('IF3057', 'Sistem Informasi', 3, 'Sistem Informasi', 3, 1),
('IF3058', 'Kriptografi', 3, 'Kriptografi', 3, 2),
('IF3094', 'KAP', 2, 'KAP', 3, 2),
('IF3097', 'Jaringan Komputer', 3, 'Jaringan Komputer', 3, 1),
('KU1011', 'TTKI', 2, 'TTKI', 1, 2),
('KU1101', 'KPIP', 2, 'KPIP', 2, 1),
('KU1201', 'SAS', 2, 'SAS', 1, 2),
('MA1101', 'Kalkulus IA', 4, 'Kalkulus IA', 1, 1),
('MA1201', 'Kalkulus IIA', 4, 'Kalkulus', 1, 2);

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim_mahasiswa` varchar(12) NOT NULL,
  `kode_kuliah` varchar(10) NOT NULL,
  `semester` int(11) NOT NULL,
  `nilai` varchar(1) DEFAULT NULL COMMENT 'A, B, C, D atau E',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nim_mahasiswa` (`nim_mahasiswa`,`kode_kuliah`,`semester`),
  KEY `nim_mahasiswa_2` (`nim_mahasiswa`),
  KEY `kode_kuliah` (`kode_kuliah`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `pengambilan_mk`
--

INSERT INTO `pengambilan_mk` (`id`, `nim_mahasiswa`, `kode_kuliah`, `semester`, `nilai`) VALUES
(1, '13508104', 'EL2095', 3, 'C'),
(2, '13508104', 'IF2030', 3, 'A'),
(3, '13508104', 'IF2091', 3, 'C'),
(4, '13508104', 'KU1101', 1, 'B'),
(5, '13508104', 'MA1101', 1, 'A'),
(6, '13508104', 'KU1011', 2, 'A'),
(7, '13508104', 'KU1201', 2, 'C'),
(8, '13508104', 'MA1201', 2, 'B');

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
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'login', 'Login privileges, granted after account confirmation'),
(2, 'admin', 'Administrative user, has access to everything.'),
(3, 'mahasiswa', 'Mahasiswa'),
(4, 'dosen', 'Dosen'),
(5, 'tata_usaha', 'Tata Usaha');

-- --------------------------------------------------------

--
-- Table structure for table `roles_users`
--

CREATE TABLE IF NOT EXISTS `roles_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `fk_role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles_users`
--

INSERT INTO `roles_users` (`user_id`, `role_id`) VALUES
(6, 1),
(9, 1),
(12, 1),
(9, 2),
(6, 3),
(12, 5);

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(12) NOT NULL,
  `semester` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nim` (`nim`,`semester`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `status_pembayaran`
--

INSERT INTO `status_pembayaran` (`id`, `nim`, `semester`) VALUES
(25, '13508104', 1),
(26, '13508104', 2),
(27, '13508104', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_tokens`
--

CREATE TABLE IF NOT EXISTS `user_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(32) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `expires` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_token` (`token`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user_tokens`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(127) NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` char(50) NOT NULL,
  `logins` int(10) unsigned NOT NULL DEFAULT '0',
  `last_login` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `logins`, `last_login`) VALUES
(6, '', '13508104', 'ad3af323f0fced5b7ecc7d202b86f517316ab055c29a916dfc', 21, 1290334440),
(9, '', 'admin', '08efffae32d267f573b00dc90b3bb904266d2e1006f6a80023', 40, 1290335995),
(12, '', 'tata_usaha', '2271bbf4923aa908ff07e84a96707347273c5f34909dfb4ffa', 6, 1290330348);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengambilan_mk`
--
ALTER TABLE `pengambilan_mk`
  ADD CONSTRAINT `pengambilan_mk_ibfk_1` FOREIGN KEY (`nim_mahasiswa`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengambilan_mk_ibfk_2` FOREIGN KEY (`kode_kuliah`) REFERENCES `matakuliah` (`kode`) ON DELETE CASCADE;

--
-- Constraints for table `roles_users`
--
ALTER TABLE `roles_users`
  ADD CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `status_pembayaran`
--
ALTER TABLE `status_pembayaran`
  ADD CONSTRAINT `status_pembayaran_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE;

--
-- Constraints for table `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

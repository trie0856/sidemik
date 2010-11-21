-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 21, 2010 at 07:06 
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
('13508047', 21, 'Pudy Prima', 'Jakarta', '1989-11-30', 0, 'pudy_prima@yahoo.co.uk', 'Jalan Mundinglaya 4 Bandung 40132', '085722419476', 'Slamet Arifin', '0218701476', 2008, 2),
('13508105', 23, 'Yudhistira Natawisastra', 'Cianjur', '1990-04-16', 1, 'yudhistira16@gmail.com', 'lilili', '0857', 'Natawisastra Senior', '123', 2008, 2),
('13508106', 24, 'Akbar Gumbira', 'Cianjur', '1990-10-09', 1, 'gumbira.mymind@gmail.com', 'syubidu', '1234', 'Gumbira Senior', '999', 2008, 2),
('13509042', 25, 'Zakiy Firdaus Alfikri', 'Bogor', '1990-06-27', 0, 'zakiy_f_a@yahoo.com', 'nyamnyam', '5555', 'Alfikri Senior', '8888', 2009, 2),
('13509050', 28, 'Arifin Luthfi Putranto', 'Bandung', '1990-11-26', 1, 'ipincups@yahoo.com', 'cimaho', '1111', 'Putranto Senior', '0101', 2009, 2),
('13509104', 6, 'Rezan Achmad', 'Palu', '1991-02-02', 1, 'rezanachmad@yahoo.co.id', 'Cisitu', '085255150506', 'Has Atjo', '', 2009, 2),
('13510036', 27, 'Fitriana Passa', 'Purworejo', '1990-04-17', 0, 'analuvncret@yahoo.com', 'sekosan sama ncret :P', '777', 'Passa Senior', '555', 2010, 2),
('13510044', 26, 'Sandy Socrates', 'Banyumas', '1990-02-10', 0, 'ncret@yahoo.com', 'hati ana', '6666', 'Socrates Senior', '8080', 2010, 2),
('13510100', 29, 'Irwan Fathurrahman', 'Padang', '1990-04-16', 1, 'wan@yahoo.com', 'hati ririn', '3333', 'Fathurrahman Senior', '3321', 2010, 2),
('13510110', 22, 'Mukhammad Ifanto', 'Magelang', '1990-12-15', 1, 'mukhammadifanto@gmail.com', 'lalala', '999', 'Ifanto Senior', '000', 2010, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=125 ;

--
-- Dumping data for table `pengambilan_mk`
--

INSERT INTO `pengambilan_mk` (`id`, `nim_mahasiswa`, `kode_kuliah`, `semester`, `nilai`) VALUES
(53, '13508047', 'MA1101', 1, 'B'),
(54, '13508047', 'KU1011', 2, 'D'),
(55, '13508047', 'KU1201', 2, 'A'),
(58, '13508047', 'IF2032', 4, 'E'),
(59, '13508047', 'IF2034', 4, 'B'),
(60, '13508047', 'IF3037', 5, 'B'),
(61, '13508047', 'IF3051', 5, 'D'),
(62, '13508047', 'IF3057', 5, 'A'),
(63, '13508047', 'IF3097', 5, 'C'),
(64, '13508105', 'MA1101', 1, 'D'),
(65, '13508105', 'KU1011', 2, 'B'),
(66, '13508105', 'KU1201', 2, 'B'),
(67, '13508105', 'MA1201', 2, 'A'),
(68, '13508105', 'EL2095', 3, 'B'),
(69, '13508105', 'IF2030', 3, 'C'),
(70, '13508105', 'IF2091', 3, 'A'),
(71, '13508105', 'KU1101', 3, 'E'),
(72, '13508105', 'IF2032', 4, 'E'),
(73, '13508105', 'IF2034', 4, 'B'),
(74, '13508105', 'IF2050', 4, 'C'),
(75, '13508105', 'IF3037', 5, 'A'),
(76, '13508105', 'IF3051', 5, 'D'),
(77, '13508105', 'IF3057', 5, 'A'),
(78, '13508105', 'IF3097', 5, 'C'),
(79, '13508106', 'MA1101', 1, 'A'),
(80, '13508106', 'KU1011', 2, 'E'),
(81, '13508106', 'KU1201', 2, 'B'),
(82, '13508106', 'MA1201', 2, 'A'),
(83, '13508106', 'EL2095', 3, 'D'),
(84, '13508106', 'IF2030', 3, 'E'),
(85, '13508106', 'IF2091', 3, 'E'),
(86, '13508106', 'KU1101', 3, 'E'),
(87, '13508106', 'IF2032', 4, 'E'),
(88, '13508106', 'IF2034', 4, 'C'),
(89, '13508106', 'IF2050', 4, 'D'),
(90, '13508106', 'IF3094', 4, 'A'),
(91, '13508106', 'IF3054', 5, 'D'),
(92, '13508106', 'IF3051', 5, 'D'),
(93, '13508106', 'IF3057', 5, 'A'),
(94, '13509042', 'MA1101', 1, 'D'),
(95, '13509042', 'KU1011', 2, 'D'),
(96, '13509042', 'EL2095', 3, 'D'),
(97, '13509042', 'IF2030', 3, 'C'),
(98, '13509042', 'IF2091', 3, 'C'),
(99, '13509050', 'MA1101', 1, 'A'),
(100, '13509050', 'KU1011', 2, 'B'),
(101, '13509050', 'KU1201', 2, 'C'),
(102, '13509050', 'EL2095', 3, 'A'),
(103, '13509050', 'KU1101', 3, 'C'),
(105, '13509104', 'MA1101', 1, 'B'),
(106, '13509104', 'MA1201', 1, 'A'),
(107, '13509104', 'IF2091', 1, 'D'),
(108, '13509104', 'KU1011', 2, 'A'),
(109, '13509104', 'KU1201', 2, 'C'),
(110, '13509104', 'EL2095', 3, 'A'),
(111, '13509104', 'IF2030', 3, 'D'),
(112, '13509104', 'KU1101', 3, 'C'),
(113, '13509104', 'IF3037', 3, 'A'),
(114, '13510036', 'MA1101', 1, 'B'),
(115, '13510044', 'MA1101', 1, 'B'),
(116, '13510100', 'MA1101', 1, 'B'),
(117, '13510100', 'KU1011', 1, 'C'),
(118, '13510110', 'MA1101', 1, 'E'),
(119, '13510110', 'IF2091', 1, 'C'),
(124, '13508047', 'IF2030', 3, NULL);

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
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(9, 2),
(6, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `status_pembayaran`
--

INSERT INTO `status_pembayaran` (`id`, `nim`, `semester`) VALUES
(28, '13508047', 2),
(29, '13508047', 3),
(30, '13508047', 5),
(31, '13508047', 6);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `logins`, `last_login`) VALUES
(6, '', '13508104', 'ad3af323f0fced5b7ecc7d202b86f517316ab055c29a916dfc', 21, 1290334440),
(9, '', 'admin', '08efffae32d267f573b00dc90b3bb904266d2e1006f6a80023', 41, 1290338124),
(12, '', 'tata_usaha', '2271bbf4923aa908ff07e84a96707347273c5f34909dfb4ffa', 6, 1290330348),
(21, '', '13508047', '61502d897989196ad30e3740099cce3304e354083703d52689', 0, NULL),
(22, '', '13508110', '17e438c87623d9816e15e5cdcfd54ed2db2b5cdb11ae025017', 0, NULL),
(23, '', '13508105', 'a03d442a7e0b6da18b964294eb5af190b10068060ae4774fd9', 0, NULL),
(24, '', '13508106', '6e28e9d01c51aa745cc4a22a17c31ebfdd4c571724e0d021c4', 0, NULL),
(25, '', '13508042', '03499472dfefb7f69b8c5a4834904ea44a5845839d35abe582', 0, NULL),
(26, '', '13508044', '31e1ae27375bca9ff9842d8913945ab43a2932597d4039db15', 0, NULL),
(27, '', '13508036', 'd4c3318e8fa61fa0e888c354eac8cb23880cc0ca710017a4e0', 0, NULL),
(28, '', '13508050', '35bd8543be1726785966fef04a94f5cd15e39dca5194eabda4', 0, NULL),
(29, '', '13508100', 'dbcb58ca306e5823bb76100bababdecb935553a718750cd8e1', 0, NULL);

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
  ADD CONSTRAINT `pengambilan_mk_ibfk_3` FOREIGN KEY (`nim_mahasiswa`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
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
  ADD CONSTRAINT `status_pembayaran_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

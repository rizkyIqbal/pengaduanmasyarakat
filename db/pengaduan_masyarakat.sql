-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 12:16 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan_masyarakat`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `tampilPetugas` ()  NO SQL
BEGIN
SELECT * FROM petugas ;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `tampilMasyarakat` () RETURNS INT(5) NO SQL
BEGIN
DECLARE JML INT(5);
SELECT COUNT(*) FROM masyarakat INTO JML;
RETURN JML;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `id_instansi` int(11) NOT NULL,
  `nama_instansi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`id_instansi`, `nama_instansi`) VALUES
(1, 'Dinas Pendidikan'),
(2, 'Dinas Perhubungan'),
(3, 'Badan Kepegawaian Daerah'),
(4, 'Dinas Komunikasi, Informatika dan Kehumasan'),
(5, 'Dinas Kesehatan'),
(6, 'Dinas Kependudukan'),
(10, 'Dinas Dinasan');

-- --------------------------------------------------------

--
-- Table structure for table `loginsession`
--

CREATE TABLE `loginsession` (
  `id` int(11) NOT NULL,
  `id_petugas` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `login_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loginsession`
--

INSERT INTO `loginsession` (`id`, `id_petugas`, `username`, `login_date`) VALUES
(1, 'root@localhost', '2021-04-06 10:47:51', '0000-00-00 00:00:00'),
(2, 'root@localhost', 'root@localhost', '2021-04-06 03:50:15'),
(3, 'root@localhost', 'root@localhost', '2021-04-08 03:07:40');

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` char(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp` varchar(16) NOT NULL,
  `level` varchar(4) NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telp`, `level`, `foto`) VALUES
('1231231', 'Liquid Vape', 'rrq', '$2y$10$.JcPpWm.s02VFg33jP1bWun.nCWw4/ZP54syUsTQbdH', '23123', 'user', ''),
('1231231123123', 'M.Iqbal Arizki', 'iqbal', '$2y$10$wZ/mt1mbudTkjUyLemiYeeQrASc1rw46yjvc/MB7EFTzAdM3gcDIa', '4343123', 'user', 'nightraid.png'),
('12312312313123', 'awokawoawkok', 'awkwk', '$2y$10$keMqGDgXVpoWZyVFQGUO1eIF8kv/ACQ/zcOvjovLkSxHq0N1Xvp76', '1231232131', 'user', ''),
('212', 'rr', 'rr', '123', '12', 'user', ''),
('343434', 'Djalu Prakerja', 'ere', '$2y$10$1yBNfwXUNwdJlc1i2hlaeejsBlfb6S68kPeRdCf7irRz2EqETG65S', '123123', 'user', '_MG_0190.JPG'),
('3508274658', 'Iqbal', 'rizky', '123', '0838383838383', 'user', ''),
('354534346', 'haha', 'tete', '$2y$10$GjppOlKDNUQijb5OxX3D.eeLjyRRrW1e1uw1IYEWgT9', '2131232131', 'user', ''),
('4141', 'fasdf', 'ew', '$2y$10$6CUwvXfhxXE0INYqnLohAeRmEYZbRnVjOZRsf8Sat.H', '123', 'user', ''),
('45234623456', 'zynztia', 'rere', '$2y$10$k.cPOXcyeg5DnhSAp5eF8.OJ/dpaDy3s1yZ.76EFIsU', '2312314', 'user', ''),
('6655234', 'zynztia', 'lol', '$2y$10$h4nlpsQtFOwbq6DMWKC9m.r.g7BUfZBp91mvXDW8eTc53o0sM0LW6', '423423', 'user', ''),
('909092828', 'Rizky Muhammad', 'rickyz', '$2y$10$0wrwQvtZeWlNXxC2oxXmg.N5smY4RoDSV/.knfzqsB1001Pg8w8qy', '1232123131', 'user', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `judul_pengaduan` varchar(50) NOT NULL,
  `nik` char(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto_pengaduan` varchar(50) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `status` enum('0','proses','selesai','ditolak') NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `judul_pengaduan`, `nik`, `isi_laporan`, `foto_pengaduan`, `tujuan`, `status`, `created_date`, `update_date`) VALUES
(19, 'kwkw', '343434', 'okaokwoak', 'IMG_84331.JPG', 'Dinas Pendidikan ', 'ditolak', '2021-04-08 01:26:12', '2021-04-08 07:55:55'),
(22, 'hahahahh', '909092828', 'hahahahah', '', 'Dinas Pendidikan ', 'selesai', '2021-04-08 07:26:50', '2021-04-09 02:35:28'),
(23, 'Halte rusakkk', '343434', 'adfasdfasdf', '', 'Dinas Pendidikan ', 'selesai', '2021-04-08 08:12:00', '2021-04-22 04:25:00'),
(24, 'asdfasdfasdfasf', '343434', 'sdfasdfasf', '', 'Dinas Pendidikan ', 'selesai', '2021-04-26 12:22:17', '2021-04-26 12:22:44');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` char(16) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp` varchar(16) NOT NULL,
  `level` enum('admin','petugas') NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`, `posisi`, `created_date`, `update_date`) VALUES
('123131313131', 'wkwkwkwkw', 'yaya', '$2y$10$BIShcWBLc.P0zAPHLuAEtunvxTFLcDnvfNrBCKKQShkUBf0lTHsHi', '21312313', 'petugas', 'Dinas Komunikasi, Informatika dan Kehumasan', '2021-04-08 03:07:40', '2021-04-08 03:07:40'),
('4543423312312', 'kakak', 'kk', '$2y$10$D.BdkPHPuJv5Ibf4wpYi9u3Wncc6SDE20PPAKb4LKR4P/s9XpJc2u', '545454544', 'admin', 'Dinas Pendidikan', '2021-04-04 05:23:50', '2021-04-04 05:23:50'),
('4545454', 'Susi', 'susi123', '$2y$10$Z/653F0jDmxSn.Ss0mnrNeNP7zyPynRLIm5ftIij7MvEhxzfeZTei', '23333', 'admin', 'Bupati', '2021-04-03 18:14:20', '2021-04-03 20:17:53'),
('454545454', 'asu', 'asu', '$2y$10$2cqHLQDbId.u6Jp3yD4rUOzzTVuwt4hWFQyzGGRgJk94Bsg7Iogui', '33321', 'petugas', 'Badan Kepegawaian Daerah', '2021-04-04 03:36:42', '2021-04-04 03:36:42'),
('53454554', 'Budi Sujatmiko', 'budi', '$2y$10$NwAz0Nd61pe9COCypgKufe.Lcz1rRUJukQm1bJN.O61pJDAlH0tiO', '232323', 'petugas', 'Bupati', '2021-03-31 15:36:18', '2021-04-03 20:17:36'),
('566557777', 'babal', 'wkwkwk', '$2y$10$vhvjTz5jQ3vMiS2skyVyUeZC0RNBt1wjpnjrBetz/kM61IbnWgoZy', '3453453456567', 'petugas', 'Dinas Pendidikan', '2021-04-06 03:47:51', '2021-04-06 03:47:51'),
('6565767', 'Eko', 'eko', '$2y$10$9LIf8OhlCqbWNpDeNvbMyu9MjsVNV8eu8flnvr11Towtls/2ZUjNm', '443123', 'admin', 'Dinas Kesehatan', '2021-04-04 03:43:12', '2021-04-04 03:43:12'),
('9090909989898978', 'uuuu', 'qq', '$2y$10$t4FLEU5VKwUT4cfrIqSC3O5Yiu4RWDZJHtVzkTHxKNZoEbVe1ppLO', '123456789', 'petugas', 'Dinas Komunikasi, Informatika dan Kehumasan', '2021-04-06 03:50:15', '2021-04-06 03:50:15');

--
-- Triggers `petugas`
--
DELIMITER $$
CREATE TRIGGER `logon` AFTER INSERT ON `petugas` FOR EACH ROW BEGIN 
INSERT INTO loginsession VALUES( 
'',USER(),USER(),NOW()); 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` char(16) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tanggapan`, `id_petugas`, `created_date`, `update_date`) VALUES
(14, 19, 'Tanggapan sudah kami verifikasi dan kami akan menindaklanjuti laporan anda, terima kasih telah mengirim laporan', '4543423312312', '2021-04-08 07:23:03', '2021-04-08 07:23:03'),
(15, 22, 'Tanggapan sudah kami verifikasi dan kami akan menindaklanjuti laporan anda, terima kasih telah mengirim laporan', '4543423312312', '2021-04-08 07:55:51', '2021-04-08 07:55:51'),
(16, 23, 'Tanggapan sudah kami verifikasi dan kami akan menindaklanjuti laporan anda, terima kasih telah mengirim laporan', '4543423312312', '2021-04-09 02:32:10', '2021-04-09 02:32:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `loginsession`
--
ALTER TABLE `loginsession`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id_instansi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `loginsession`
--
ALTER TABLE `loginsession`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

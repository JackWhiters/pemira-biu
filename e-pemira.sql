-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2022 at 02:00 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-pemira`
--

-- --------------------------------------------------------

--
-- Table structure for table `attempt_count`
--

CREATE TABLE `attempt_count` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `time_count` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attempt_count`
--

INSERT INTO `attempt_count` (`id`, `ip_address`, `time_count`) VALUES
(0, '', 1646512300),
(0, '', 1646512464),
(0, '', 1646513303),
(0, '', 1646513310),
(0, '', 1646513319),
(0, '', 1646513333),
(0, '', 1646513442),
(0, '', 1646513701),
(0, '::1', 1653220758),
(0, '::1', 1653220767);

-- --------------------------------------------------------

--
-- Table structure for table `data_paslon`
--

CREATE TABLE `data_paslon` (
  `id` int(11) NOT NULL,
  `nim_ketua` varchar(9) NOT NULL,
  `nm_paslon_ketua` varchar(50) NOT NULL,
  `gambar1` varchar(100) NOT NULL,
  `nim_wakil` varchar(9) NOT NULL,
  `nm_paslon_wakil` varchar(50) NOT NULL,
  `gambar2` varchar(100) NOT NULL,
  `no_urut` int(1) NOT NULL,
  `visi` varchar(255) NOT NULL,
  `misi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_paslon`
--

INSERT INTO `data_paslon` (`id`, `nim_ketua`, `nm_paslon_ketua`, `gambar1`, `nim_wakil`, `nm_paslon_wakil`, `gambar2`, `no_urut`, `visi`, `misi`) VALUES
(37, '20231231', 'test', '274893674_334519548622754_9072225869595966189_n.jpg', '20231231', 'werewfwefwe', '274294385_3112243205718118_6254273342058181329_n.jpg', 2, 'fsf dsvdsvdsvdsvdsvdsvds', 'sdfsdsdvvvvvvvvvvvvvvvvvvvvvvvvvvv'),
(38, '23213123', 'qweqweqwdqw', '274237264_654124335890395_5150522818647288776_n.jpg', '213123123', 'ohaiyooo', 'iphone.jpg', 1, 'menjadikan bem yang terbaik', 'menjadi lebih baik\r\nmemajukan bem');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akses`
--

CREATE TABLE `tbl_akses` (
  `nim` varchar(10) NOT NULL,
  `kode_akses` varchar(6) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_akses`
--

INSERT INTO `tbl_akses` (`nim`, `kode_akses`, `level`) VALUES
('2019320021', 'TKXICJ', ''),
('2020310084', 'EAZHEB', ''),
('2020310093', 'E1FPFP', ''),
('BEMBIU22', 'NX278Y', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dpt`
--

CREATE TABLE `tbl_dpt` (
  `nim` varchar(10) NOT NULL,
  `nama_mhs` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `waktu` varchar(15) NOT NULL,
  `email` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dpt`
--

INSERT INTO `tbl_dpt` (`nim`, `nama_mhs`, `status`, `waktu`, `email`) VALUES
('2019320021', 'Muhammad Aldisyah Rahman', 'Belum memilih', 'Belum memilih', 'marinuyul2@gmail.com'),
('2020310084', 'test', 'Belum memilih', 'Belum memilih', 'hola@gmail.com'),
('2020310093', 'Bagas', 'Belum memilih', 'Belum memilih', 'apbagas96@gmail.com'),
('BEMBIU22', 'Administrator', '(Sudah Memilih)', '21:48:12pm', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paslon`
--

CREATE TABLE `tbl_paslon` (
  `kode_akses` varchar(6) NOT NULL,
  `nomor_paslon` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_paslon`
--

INSERT INTO `tbl_paslon` (`kode_akses`, `nomor_paslon`) VALUES
('1', 1),
('EZQBGA', 1),
('NX278Y', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `token` varchar(80) NOT NULL,
  `timemodified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `nim`, `token`, `timemodified`) VALUES
(4, 'BEMBIU22', 'eyskR5UW2r', '2022-03-11 12:30:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_paslon`
--
ALTER TABLE `data_paslon`
  ADD PRIMARY KEY (`id`,`nim_ketua`);

--
-- Indexes for table `tbl_akses`
--
ALTER TABLE `tbl_akses`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tbl_dpt`
--
ALTER TABLE `tbl_dpt`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tbl_paslon`
--
ALTER TABLE `tbl_paslon`
  ADD PRIMARY KEY (`kode_akses`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_paslon`
--
ALTER TABLE `data_paslon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

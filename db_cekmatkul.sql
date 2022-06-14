-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2022 at 04:56 PM
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
-- Database: `db_cekmatkul`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_matkul`
--

CREATE TABLE `t_matkul` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_matkul` varchar(15) NOT NULL,
  `nama_matkul` varchar(100) NOT NULL,
  `sks` int(11) NOT NULL,
  `tahun_kurikulum` varchar(30) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_matkul`
--

INSERT INTO `t_matkul` (`id`, `id_user`, `kode_matkul`, `nama_matkul`, `sks`, `tahun_kurikulum`, `status`) VALUES
(4, 0, 'adw', 'awd', 2, 'qw', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `level` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id`, `username`, `password`, `nama_user`, `no_hp`, `level`, `keterangan`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', '', 1, '0', '1'),
(189, 'dosen', 'ce28eed1511f631af6b2a7bb0a85d636', 'Dosen', '', 2, '0', '1'),
(190, 'mahasiswa', '5787be38ee03a9ae5360f54d9026465f', 'mahasiswa', '', 3, '0', '1'),
(191, 'dos', '202cb962ac59075b964b07152d234b70', 'dos', '', 2, '', '1'),
(193, 'mah', '202cb962ac59075b964b07152d234b70', 'mah', '', 3, '', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_matkul`
--
ALTER TABLE `t_matkul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_matkul`
--
ALTER TABLE `t_matkul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

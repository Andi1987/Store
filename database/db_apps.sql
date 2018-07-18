-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2018 at 08:45 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_apps`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `idjenis` int(11) NOT NULL,
  `jenis_barang` varchar(15) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`idjenis`, `jenis_barang`, `status`) VALUES
(1, 'Makanan', 1),
(2, 'Minuman', 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_barang`
--

CREATE TABLE `master_barang` (
  `idbarang` int(11) NOT NULL,
  `kode_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jenis` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_barang`
--

INSERT INTO `master_barang` (`idbarang`, `kode_barang`, `nama_barang`, `jenis`, `jumlah`, `satuan`) VALUES
(1, 'KB0001', 'AIR MINUM VIT GELAS', 2, 10, 1),
(2, 'KB0002', 'MIE INSTAN SEDAP GORENG', 1, 10, 1),
(3, 'KB0003', 'AIR MINERAL AQUA BOTOL', 2, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_karyawan`
--

CREATE TABLE `master_karyawan` (
  `nik` varchar(15) DEFAULT NULL,
  `nama_karyawan` varchar(35) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `telepon` varchar(12) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_karyawan`
--

INSERT INTO `master_karyawan` (`nik`, `nama_karyawan`, `alamat`, `telepon`, `id`) VALUES
('19910002', 'Albert', 'Jl. Syech Quro No. 120', '081382280232', 2),
('19870001', 'Gugun Gondrong', 'Jl. Pangkal Perjuangan No. 45', '081282180832', 1),
('19900003', 'Dudung', 'JL. A. Yani', '08123214768', 5),
(NULL, NULL, NULL, NULL, 6),
('19860004', NULL, 'JL. Panjang No. 45', NULL, 7),
('19860004', NULL, 'JL. Panjang No. 45', NULL, 8),
('19860004', NULL, 'Jl. Panjang No. 67', NULL, 9),
('19860004', NULL, 'Jl. Panjang No. 67', NULL, 10),
('19860004', NULL, 'Jl. Panjang No. 67', NULL, 11),
('19860004', NULL, 'Jl. Panjang No. 67', NULL, 12),
('19860004', NULL, 'Jl. Panjang No. 67', NULL, 13),
('19860004', NULL, 'Jl. Panjang No. 67', NULL, 14),
('19860004', NULL, 'Jl. Panjang No. 67', NULL, 15),
('19860004', NULL, 'Jl. Panjang No. 67', NULL, 16),
('19860004', NULL, 'Jl. Panjang No. 67', NULL, 17),
('19860004', NULL, 'Jl. Panjang No. 67', NULL, 18);

-- --------------------------------------------------------

--
-- Table structure for table `satuan_barang`
--

CREATE TABLE `satuan_barang` (
  `id` int(11) NOT NULL,
  `nama_satuan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan_barang`
--

INSERT INTO `satuan_barang` (`id`, `nama_satuan`) VALUES
(1, 'Dus'),
(2, 'Botol');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `iduser` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email_user` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`iduser`, `username`, `email_user`, `password`, `status`) VALUES
(1, 'abdee', 'admin@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 1),
(2, 'dodi', 'dodi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`idjenis`);

--
-- Indexes for table `master_barang`
--
ALTER TABLE `master_barang`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indexes for table `satuan_barang`
--
ALTER TABLE `satuan_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `idjenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_barang`
--
ALTER TABLE `master_barang`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `satuan_barang`
--
ALTER TABLE `satuan_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

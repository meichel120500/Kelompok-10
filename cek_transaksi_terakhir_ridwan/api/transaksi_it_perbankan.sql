-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2023 at 06:28 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transaksi_it_perbankan`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_transaksi_bank`
--

CREATE TABLE `data_transaksi_bank` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nilai_saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_transaksi_bank`
--

INSERT INTO `data_transaksi_bank` (`id`, `nama`, `nilai_saldo`) VALUES
(1, 'Felix', 2500000),
(2, 'Muhammad Daffa Aditya', 5000000),
(3, 'Ridwan', 4000000),
(4, 'Afrizal', 5500000),
(5, 'Umar', 7000000);

-- --------------------------------------------------------

--
-- Table structure for table `mutasi_rekening`
--

CREATE TABLE `mutasi_rekening` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tanggal_transaksi` datetime DEFAULT NULL,
  `jenis_transaksi` varchar(255) DEFAULT NULL,
  `jumlah_transaksi` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mutasi_rekening`
--

INSERT INTO `mutasi_rekening` (`id`, `nama`, `tanggal_transaksi`, `jenis_transaksi`, `jumlah_transaksi`) VALUES
(1, 'Muhammad Daffa Aditya', '2023-09-15 13:00:00', 'Uang Masuk', '2000000'),
(2, 'Umar', '2023-09-16 15:00:15', 'Uang Masuk', '3000000'),
(3, 'Afrizal', '2023-09-18 20:00:30', 'Uang Masuk', '2500000'),
(4, 'Ridwan', '2023-09-19 09:16:34', 'Uang Keluar', '1000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_transaksi_bank`
--
ALTER TABLE `data_transaksi_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mutasi_rekening`
--
ALTER TABLE `mutasi_rekening`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mutasi_rekening`
--
ALTER TABLE `mutasi_rekening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
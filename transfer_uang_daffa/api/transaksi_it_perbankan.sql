-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2023 at 04:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_transaksi_bank`
--

INSERT INTO `data_transaksi_bank` (`id`, `nama`, `nilai_saldo`) VALUES
(1, 'Felix', 2500000),
(2, 'Muhammad Daffa Aditya', 5000000),
(3, 'Ridwan', 4000000),
(4, 'Afrizal', 5500000),
(5, 'Umar', 7000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_transaksi_bank`
--
ALTER TABLE `data_transaksi_bank`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

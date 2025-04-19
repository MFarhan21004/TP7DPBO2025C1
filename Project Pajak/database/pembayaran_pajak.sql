-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2025 at 11:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pembayaran_pajak`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenispajak`
--

CREATE TABLE `jenispajak` (
  `id_jenis` int(11) NOT NULL,
  `nama_pajak` varchar(100) NOT NULL,
  `tarif_persen` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenispajak`
--

INSERT INTO `jenispajak` (`id_jenis`, `nama_pajak`, `tarif_persen`) VALUES
(1, 'Pajak Bumi & Bangunan', 10.00),
(2, 'Pajak Kendaraan Bermotor', 12.50),
(3, 'Pajak Penghasilan', 15.00);

-- --------------------------------------------------------

--
-- Table structure for table `transaksipajak`
--

CREATE TABLE `transaksipajak` (
  `id_transaksi` int(11) NOT NULL,
  `id_wp` int(11) DEFAULT NULL,
  `id_jenis` int(11) DEFAULT NULL,
  `tanggal_bayar` date NOT NULL,
  `jumlah_bayar` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksipajak`
--

INSERT INTO `transaksipajak` (`id_transaksi`, `id_wp`, `id_jenis`, `tanggal_bayar`, `jumlah_bayar`) VALUES
(1, 1, 1, '2025-04-01', 1000000.00),
(2, 2, 2, '2025-04-05', 1500000.00),
(3, 3, 3, '2025-04-10', 2000000.00),
(4, 1, 2, '2025-04-15', 1250000.00);

-- --------------------------------------------------------

--
-- Table structure for table `wajibpajak`
--

CREATE TABLE `wajibpajak` (
  `id_wp` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` char(16) NOT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wajibpajak`
--

INSERT INTO `wajibpajak` (`id_wp`, `nama`, `nik`, `alamat`, `no_hp`) VALUES
(1, 'Budi Santoso', '3201010101010001', 'Jl. Merdeka No. 10, Bandung', '081234567890'),
(2, 'Siti Aminah', '3201010202020002', 'Jl. Sudirman No. 45, Jakarta', '082233445566'),
(3, 'Dewi Lestari', '3201010303030003', 'Jl. Diponegoro No. 7, Surabaya', '083344556677');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenispajak`
--
ALTER TABLE `jenispajak`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `transaksipajak`
--
ALTER TABLE `transaksipajak`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_wp` (`id_wp`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `wajibpajak`
--
ALTER TABLE `wajibpajak`
  ADD PRIMARY KEY (`id_wp`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenispajak`
--
ALTER TABLE `jenispajak`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksipajak`
--
ALTER TABLE `transaksipajak`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wajibpajak`
--
ALTER TABLE `wajibpajak`
  MODIFY `id_wp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksipajak`
--
ALTER TABLE `transaksipajak`
  ADD CONSTRAINT `transaksipajak_ibfk_1` FOREIGN KEY (`id_wp`) REFERENCES `wajibpajak` (`id_wp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksipajak_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenispajak` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

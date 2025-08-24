-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 24, 2025 at 04:52 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kepegawaian`
--

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nomor_seluler` varchar(15) DEFAULT NULL,
  `status_perkawinan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `jenis_kelamin`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `nomor_seluler`, `status_perkawinan`) VALUES
(2, 'Akbar', 'Laki-laki', 'Kampung Rambutan No. 23, Jakarta Timur', 'Jakarta', '2015-08-05', '0891234567890', 'Belum Menikah'),
(3, 'Gilang Ramadhan', 'Laki-laki', 'Kalijati No. 3, Subang ', 'Bandung', '2005-06-21', '0891234756890', 'Belum Menikah'),
(4, 'Budi Santoso', 'Laki-laki', 'Jl. Merdeka No. 10', 'Jakarta', '1995-05-15', '081234567890', 'Belum Menikah'),
(5, 'Siti Aisyah', 'Perempuan', 'Jl. Pahlawan No. 25', 'Surabaya', '1998-09-22', '082345678901', 'Belum Menikah'),
(6, 'Ahmad Fauzi', 'Laki-laki', 'Jl. Kenanga No. 5', 'Bandung', '1992-03-10', '083456789012', 'Menikah'),
(7, 'Dian Novita', 'Perempuan', 'Jl. Mawar No. 12', 'Yogyakarta', '1997-11-30', '085678901234', 'Belum Menikah'),
(8, 'Rio Pratama', 'Laki-laki', 'Jl. Sudirman No. 88', 'Medan', '1990-07-07', '087890123456', 'Menikah'),
(9, 'Linda Susanti', 'Perempuan', 'Jl. Gajah Mada No. 45', 'Palembang', '1994-02-18', '089012345678', 'Menikah'),
(10, 'Eko Prasetyo', 'Laki-laki', 'Jl. Pemuda No. 70', 'Semarang', '1991-04-05', '081122334455', 'Menikah'),
(11, 'Wulan Sari ihma', 'Perempuan', 'Jl. Veteran No. 33', 'Solo', '1996-08-11', 'Belum ada', 'Belum Menikah'),
(12, 'Teguh Wicaksono', 'Laki-laki', 'Jl. Diponegoro No. 2', 'Makasar', '1993-01-20', '085566778899', 'Menikah'),
(13, 'Rina Rahayu Bayu', 'Perempuan', 'Jl. Kartini No. 99', 'Denpasar', '1999-10-01', 'Belum ada', 'Belum Menikah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2021 at 02:29 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_maps`
--

-- --------------------------------------------------------

--
-- Table structure for table `datamap`
--

CREATE TABLE `datamap` (
  `id` int(11) NOT NULL,
  `nama_polisi` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datamap`
--

--Menambahkan data secara manual untuk import ke DB
-- INSERT INTO `datamap` (`id`, `nama_polisi`, `alamat`, `latitude`, `longitude`) VALUES 
-- (1, 'Polsek Bubutan', 'Jl. Raden Saleh No.2, Bubutan, Kec. Bubutan, Kota SBY, Jawa Timur 60174', '-7.251123963263027', '112.73509836669923'),



--
-- Indexes for dumped tables
--

--
-- Indexes for table `datamap`
--
ALTER TABLE `datamap`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datamap`
--
ALTER TABLE `datamap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

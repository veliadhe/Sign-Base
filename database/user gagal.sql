-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2017 at 11:21 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `isp`
--

CREATE TABLE `isp` (
  `id` int(9) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `lat` float NOT NULL,
  `long` float NOT NULL,
  `id_kota` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `isp`
--

INSERT INTO `isp` (`id`, `nama`, `lat`, `long`, `id_kota`) VALUES
(1, 'ipb', -6.55812, 106.726, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(9) NOT NULL,
  `nama_kota` varchar(30) NOT NULL,
  `lat` float NOT NULL,
  `long` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`, `lat`, `long`) VALUES
(1, 'bogor', -6.59715, 106.806);

-- --------------------------------------------------------

--
-- Table structure for table `rating_isp`
--

CREATE TABLE `rating_isp` (
  `id` int(9) NOT NULL,
  `isp_id` int(9) NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rating_wifi`
--

CREATE TABLE `rating_wifi` (
  `id` int(9) NOT NULL,
  `wifi_id` int(9) NOT NULL,
  `rating` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `id_user` int(9) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id_user`, `username`, `password`, `email`, `name`) VALUES
(2, 'hehe', '', '', ''),
(3, 'velia', '', '', ''),
(4, 'atun', '', '', ''),
(5, 'hehe', '$2y$10$jXQRvPsGRcZ6bT6FmFlDheC', '', ''),
(6, 'hehe', '123', 'hehe@gmail.com', 'heheh'),
(7, 'yuhu', '$2y$10$o.yu7yTmHhzWBkdvXs8IIuM', '', ''),
(8, 'vela', '$2y$10$3y3ZTCyNc.kB55I8x0Wl7uG', '', ''),
(9, 'hay', '$2y$10$xEzTSUlkojaDIx7KIQTqHeL', '', ''),
(10, 'rey', '$2y$10$y43SLKdWikyElhlFsOP4Reh', '', ''),
(11, 'korea', '$2y$10$.waJaKX8vfsihhX7DYKjMez', '', ''),
(12, 'ya', '$2y$10$siBBH1UNutXPZR0FFbI39uC', '', ''),
(13, 'tu', '$2y$10$LcaE1wfYgTeX0tIv00wHT.j', '', 'tu'),
(14, 'hh', '$2y$10$lGwzQ7Ts2kQmMEEU8G7KP.i', '', 'hh'),
(15, 'kk', '$2y$10$hndi5y2t6Lw/Hy6AsfECteq', 'veliaaime@gmail.com', 'kamu kamu'),
(16, 'qw', '$2y$10$lQyWKysdjWxkKhROndUvB.h', 'veliaaime@gmail.com', 'qw'),
(17, 'deby', '$2y$10$0FlqpQJt8mbDbBvVKy/ms.Y', 'veliaaime@gmail.com', 'velia deby rahmawati');

-- --------------------------------------------------------

--
-- Table structure for table `wifi`
--

CREATE TABLE `wifi` (
  `id_wifi` int(9) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `lat` float NOT NULL,
  `long` float NOT NULL,
  `type` varchar(20) NOT NULL,
  `id_kota` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wifi_public`
--

CREATE TABLE `wifi_public` (
  `id_wifi` int(9) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `lat` float NOT NULL,
  `long` float NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `wifi_public`
--

INSERT INTO `wifi_public` (`id_wifi`, `nama`, `lat`, `long`, `type`) VALUES
(1, 'Ibukota Provinsi Aceh', 5.55018, 95.3193, 'ibukota'),
(2, 'Ibukota Kab.Aceh Jaya', 4.72789, 95.6014, 'ibukota'),
(3, 'Ibukota Abdya', 3.81857, 96.8318, 'ibukota'),
(4, 'Ibukota Kotamadya Langsa', 4.47602, 97.9524, 'ibukota'),
(5, 'Ibukota Kotamadya Sabang', 5.90928, 95.3047, 'ibukota');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `isp`
--
ALTER TABLE `isp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_kota` (`id_kota`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `rating_isp`
--
ALTER TABLE `rating_isp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `isp_id` (`isp_id`);

--
-- Indexes for table `rating_wifi`
--
ALTER TABLE `rating_wifi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wifi_id` (`wifi_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `wifi`
--
ALTER TABLE `wifi`
  ADD PRIMARY KEY (`id_wifi`),
  ADD UNIQUE KEY `id_kota` (`id_kota`);

--
-- Indexes for table `wifi_public`
--
ALTER TABLE `wifi_public`
  ADD PRIMARY KEY (`id_wifi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `isp`
--
ALTER TABLE `isp`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rating_isp`
--
ALTER TABLE `rating_isp`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rating_wifi`
--
ALTER TABLE `rating_wifi`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id_user` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `wifi`
--
ALTER TABLE `wifi`
  MODIFY `id_wifi` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wifi_public`
--
ALTER TABLE `wifi_public`
  MODIFY `id_wifi` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `isp`
--
ALTER TABLE `isp`
  ADD CONSTRAINT `isp_ibfk_1` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating_isp`
--
ALTER TABLE `rating_isp`
  ADD CONSTRAINT `rating_isp_ibfk_1` FOREIGN KEY (`id`) REFERENCES `isp` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating_wifi`
--
ALTER TABLE `rating_wifi`
  ADD CONSTRAINT `rating_wifi_ibfk_1` FOREIGN KEY (`wifi_id`) REFERENCES `wifi` (`id_wifi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wifi`
--
ALTER TABLE `wifi`
  ADD CONSTRAINT `wifi_ibfk_1` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2017 at 11:15 AM
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
  `id_isp` int(9) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `lat` float NOT NULL,
  `long` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `isp`
--

INSERT INTO `isp` (`id_isp`, `nama`, `lat`, `long`) VALUES
(1, 'ipb', -6.55812, 106.726),
(3, 'njjjj', -6.97867, 64828),
(4, 'huhuhu', 78707900, 565877000),
(5, 'juji', 0, 546765),
(6, 'kakakaka', 64735, 83736);

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
(1, 'bogor', -6.59715, 106.806),
(2, 'jakarta', -6.17511, 106.865),
(3, 'bandung', -6.91746, 107.619),
(4, 'jakarta', -6.17511, 106.865),
(5, 'bandung', -6.91746, 107.619),
(6, 'semarang', -7.00515, 110.438),
(7, 'semarang', -7.00515, 110.438),
(8, 'jogja', -7.79558, 110.369),
(9, 'jogja', -7.79558, 110.369);

-- --------------------------------------------------------

--
-- Table structure for table `post_rating`
--

CREATE TABLE `post_rating` (
  `rating_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `rating_number` int(11) NOT NULL,
  `total_points` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Block, 0 = Unblock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_rating`
--

INSERT INTO `post_rating` (`rating_id`, `post_id`, `rating_number`, `total_points`, `created`, `modified`, `status`) VALUES
(1, 1, 20, 45, '2017-05-29 15:24:58', '2017-06-06 10:45:25', 1),
(2, 2, 11, 25, '0000-00-00 00:00:00', '2017-06-06 11:07:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rating_isp`
--

CREATE TABLE `rating_isp` (
  `id` int(9) NOT NULL,
  `kota_id` int(9) NOT NULL,
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
(6, 'hehe', '123', 'hehe@gmail.com', 'heheh'),
(15, 'kk', '$2y$10$hndi5y2t6Lw/Hy6AsfECteq', 'veliaaime@gmail.com', 'kamu kamu'),
(16, 'qw', '$2y$10$lQyWKysdjWxkKhROndUvB.h', 'veliaaime@gmail.com', 'qw'),
(17, 'deby', '$2y$10$0FlqpQJt8mbDbBvVKy/ms.Y', 'veliaaime@gmail.com', 'velia deby rahmawati'),
(18, 'huee', '$2y$10$qfzrmkCABpDk7UBjtfuFROt', 'hue@gmail.com', 'hueee'),
(19, 'woylah', '$2y$10$Je0WRIae5OwckOPya.ST6eY', 'woy@gmail.com', 'woy'),
(20, 'nama', '$2y$10$n8Z./vErIWkD190SxWe6.OO', 'nama@ex.com', 'nama'),
(27, 'iwi', '$2y$10$6MKtODnBZUV9D6nJttMzvOV', 'iwi@iwi.io', 'iwi'),
(28, 'juju', '$2y$10$BKFM4K/x7S9vVHeh/Xy53Ox', 'juju@gmail.com', 'juju'),
(29, 'jujuju', '$2y$10$wkJPsqbVMg4N/K7YWKIfveb', 'jujuju@ju.com', 'jujuju'),
(30, 'jujujuju', '$2y$10$/SDI8hKnyKZrK/2jiHWPCeu', 'jujujuju@ju.com', 'jujujuju'),
(31, 'heuheu', '$2y$10$3o1YrNpqPcrZWuqyG6dLxOX', 'heuheu@gmial.com', 'heuheu'),
(32, 'heuheuh', '$2y$10$4pdI0AFTfDlrnMEVoRhmjex', 'heuheuh@gmial.com', 'heuheuh'),
(33, 'bahahaa', '$2y$10$5jnvWoiPwahaQ8UuTM5r/.Y', 'bahahaa@gmial.com', 'bahahaa'),
(34, 'bahahaha', '$2y$10$qOph26UTan/TcPKxLSRFa.G', 'bahahaha@gmail.com', 'bahahaha'),
(35, 'gege', '$2y$10$21V8n9RrLpuJoYdnOBin6.Q', 've@gmail.com', 'gegeg'),
(36, 'kosong', '$2y$10$0st./iue//x4C6AMA.6nkeM', 'kosong@coba.com', 'kosong ajaj'),
(37, 'cobaaja', '$2y$10$pvpszVQ.pltLEoFg5PXLTeq', 'cobabikin@coba', 'coba bikin lagi'),
(38, 'berhasil', '$2y$10$96xKfCu2w4ddAL3fQ0pGweU', 'berhasil@berhasil.com', 'berhasil'),
(39, 'kaki', '$2y$10$sTVl6DZ6PqP0/x.kbh4eeuo', 'kaki@gmail.com', 'kamu aku kita');

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
  ADD PRIMARY KEY (`id_isp`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `post_rating`
--
ALTER TABLE `post_rating`
  ADD PRIMARY KEY (`rating_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `rating_isp`
--
ALTER TABLE `rating_isp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `isp_id` (`kota_id`);

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
  MODIFY `id_isp` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `post_rating`
--
ALTER TABLE `post_rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
  MODIFY `id_user` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
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
-- Constraints for table `post_rating`
--
ALTER TABLE `post_rating`
  ADD CONSTRAINT `post_rating_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `kota` (`id_kota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating_isp`
--
ALTER TABLE `rating_isp`
  ADD CONSTRAINT `rating_isp_ibfk_1` FOREIGN KEY (`id`) REFERENCES `isp` (`id_isp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_isp_ibfk_2` FOREIGN KEY (`kota_id`) REFERENCES `kota` (`id_kota`) ON DELETE CASCADE ON UPDATE CASCADE;

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

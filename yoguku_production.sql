-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Des 2016 pada 10.33
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yoguku_production`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `api_access`
--

CREATE TABLE IF NOT EXISTS `api_access` (
`id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `api_access`
--

INSERT INTO `api_access` (`id`, `username`, `password`) VALUES
(1, 'production', 'fd89784e59c72499525556f80289b2c7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `production_access`
--

CREATE TABLE IF NOT EXISTS `production_access` (
`id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data untuk tabel `production_access`
--

INSERT INTO `production_access` (`id`, `code`, `created_date`) VALUES
(1, '0', '0000-00-00 00:00:00'),
(2, '1', '0000-00-00 00:00:00'),
(3, '0', '0000-00-00 00:00:00'),
(4, '0', '0000-00-00 00:00:00'),
(5, '0', '0000-00-00 00:00:00'),
(6, '0', '0000-00-00 00:00:00'),
(7, '0', '0000-00-00 00:00:00'),
(8, '0', '0000-00-00 00:00:00'),
(9, 'i1S2S1Fpdp', '0000-00-00 00:00:00'),
(10, '', '0000-00-00 00:00:00'),
(11, 'VSFpjLDYCU', '0000-00-00 00:00:00'),
(12, 'I9EIAbRTww', '0000-00-00 00:00:00'),
(13, 'hjlqfHs88X', '0000-00-00 00:00:00'),
(14, 'SEAq68TW29', '0000-00-00 00:00:00'),
(15, 'JQcMl1xEqJ', '0000-00-00 00:00:00'),
(16, 'byCHBoslxU', '0000-00-00 00:00:00'),
(17, 'YO1jWwu4m8', '0000-00-00 00:00:00'),
(18, 'yQdTbWqPU4', '0000-00-00 00:00:00'),
(19, 'zukiTdRy05', '0000-00-00 00:00:00'),
(20, 'qlsmW7LNKi', '0000-00-00 00:00:00'),
(21, 'U9O7Luokgb', '0000-00-00 00:00:00'),
(22, 'lkdsFZIWff', '0000-00-00 00:00:00'),
(23, 'X3kwpwE3fn', '0000-00-00 00:00:00'),
(24, 'JzX4Q48T0C', '0000-00-00 00:00:00'),
(25, 'O0cz9E1xre', '0000-00-00 00:00:00'),
(26, 'ZjWJ6vnvMd', '0000-00-00 00:00:00'),
(27, 'Wp21nLi1Sp', '0000-00-00 00:00:00'),
(28, 'NSEvFzZGCp', '0000-00-00 00:00:00'),
(29, '05voInFXNO', '0000-00-00 00:00:00'),
(30, 'AKeZH4dmjN', '0000-00-00 00:00:00'),
(31, 'EsKrFvRXQe', '0000-00-00 00:00:00'),
(32, '1OhR1Zz5dW', '0000-00-00 00:00:00'),
(33, 'NVbVdfr3TB', '0000-00-00 00:00:00'),
(34, 'GZoMoqCoKt', '0000-00-00 00:00:00'),
(35, 'V6Y8EeluGo', '0000-00-00 00:00:00'),
(36, 'uEm1wQx43L', '0000-00-00 00:00:00'),
(37, 'BruIuJi2Gj', '0000-00-00 00:00:00'),
(38, 'gifocvNIu8', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2016-11-27 22:56:42', '2016-11-29 11:31:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_access`
--
ALTER TABLE `api_access`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `production_access`
--
ALTER TABLE `production_access`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_access`
--
ALTER TABLE `api_access`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `production_access`
--
ALTER TABLE `production_access`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

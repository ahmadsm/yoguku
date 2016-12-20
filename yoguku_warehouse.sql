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
-- Database: `yoguku_warehouse`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `demand`
--

CREATE TABLE IF NOT EXISTS `demand` (
`id` int(11) NOT NULL,
  `code_transaction_demand` varchar(7) NOT NULL,
  `fk_material` varchar(50) DEFAULT NULL,
  `qty` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `demand`
--

INSERT INTO `demand` (`id`, `code_transaction_demand`, `fk_material`, `qty`, `created_at`, `updated_at`) VALUES
(1, 'MNXUVT', '1', 10, '2016-12-16 10:04:48', '2016-12-16 10:04:48'),
(2, 'MNXUVT', '2', 10, '2016-12-16 10:04:48', '2016-12-16 10:04:48'),
(3, 'MNXUVT', '3', 10, '2016-12-16 10:04:48', '2016-12-16 10:04:48'),
(4, 'WKRTSX', '1', 1, '2016-12-16 10:05:36', '2016-12-16 10:05:36'),
(5, 'WKRTSX', '2', 1, '2016-12-16 10:05:36', '2016-12-16 10:05:36'),
(6, 'WKRTSX', '3', 1, '2016-12-16 10:05:36', '2016-12-16 10:05:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `material`
--

CREATE TABLE IF NOT EXISTS `material` (
`id` int(11) NOT NULL,
  `kode` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `satuan` varchar(100) DEFAULT NULL,
  `total` varchar(50) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `material`
--

INSERT INTO `material` (`id`, `kode`, `nama`, `satuan`, `total`, `created_at`, `updated_at`) VALUES
(1, 'BTL', 'Botol', 'Pcs', '15', '2016-12-14 04:20:49', '2016-12-14 04:22:42'),
(2, 'SKM', 'Skim', 'Kg', '30', '2016-12-14 04:21:01', '2016-12-14 04:22:42'),
(3, 'MLK', 'Milk', 'Liter', '20', '2016-12-14 04:21:11', '2016-12-14 04:23:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
`id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `telepon` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `alamat`, `telepon`, `created_at`, `updated_at`) VALUES
(1, 'PT. Pertama', 'asdf', '123000', '2016-12-14 04:21:39', '2016-12-14 04:21:39'),
(2, 'PT. Kedua', 'asdf', '123000', '2016-12-14 04:21:48', '2016-12-14 04:21:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supply`
--

CREATE TABLE IF NOT EXISTS `supply` (
`id` int(11) NOT NULL,
  `fk_material` varchar(50) DEFAULT NULL,
  `fk_supplier` varchar(50) DEFAULT NULL,
  `qty` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `supply`
--

INSERT INTO `supply` (`id`, `fk_material`, `fk_supplier`, `qty`, `created_at`, `updated_at`) VALUES
(1, '2', '1', 10, '2016-12-14 04:22:03', '2016-12-14 04:22:03'),
(2, '2', '2', 20, '2016-12-14 04:22:17', '2016-12-14 04:22:17'),
(3, '1', '2', 15, '2016-12-14 04:22:26', '2016-12-14 04:22:26'),
(4, '3', '2', 20, '2016-12-14 04:23:21', '2016-12-14 04:23:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_demand`
--

CREATE TABLE IF NOT EXISTS `transaction_demand` (
`id` int(11) NOT NULL,
  `code` varchar(7) NOT NULL,
  `title` varchar(200) NOT NULL,
  `notes` text NOT NULL,
  `status` enum('A','R','N') NOT NULL,
  `request_date` varchar(15) NOT NULL,
  `created_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `transaction_demand`
--

INSERT INTO `transaction_demand` (`id`, `code`, `title`, `notes`, `status`, `request_date`, `created_date`, `update_date`) VALUES
(1, 'MNXUVT', 'Test Request Demand', 'Gak Pakai Lama', 'N', '2016/19/12', '2016-12-16', '0000-00-00'),
(2, 'WKRTSX', 'asdasdsad12312', 'dasdsadas', 'N', '13123121213', '2016-12-16', '0000-00-00');

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
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2016-11-27 22:56:42', '2016-12-17 13:19:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `demand`
--
ALTER TABLE `demand`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supply`
--
ALTER TABLE `supply`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_demand`
--
ALTER TABLE `transaction_demand`
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
-- AUTO_INCREMENT for table `demand`
--
ALTER TABLE `demand`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `supply`
--
ALTER TABLE `supply`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transaction_demand`
--
ALTER TABLE `transaction_demand`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

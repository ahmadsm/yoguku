-- phpMyAdmin SQL Dump
-- version 4.4.6.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 01 Des 2016 pada 01.55
-- Versi Server: 5.6.24
-- PHP Version: 5.3.29

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
-- Struktur dari tabel `token`
--

CREATE TABLE IF NOT EXISTS `token` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `token` text NOT NULL,
  `created_at` datetime NOT NULL,
  `expired_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `token`
--

INSERT INTO `token` (`id`, `username`, `token`, `created_at`, `expired_at`) VALUES
(0, 'admin', '3IO5XjRpbT', '2016-12-01 00:30:13', '2016-12-02 00:30:13'),
(0, 'admin', 'Hv3XqDprCu', '2016-12-01 00:31:16', '2016-12-02 00:31:16'),
(0, 'admin', 'rqNbIqiP0c', '2016-12-01 00:32:46', '2016-12-02 00:32:46'),
(0, 'admin', 'qPvaObpgq1', '2016-12-01 00:35:54', '2016-12-02 00:35:54'),
(0, 'admin', 'bBETSuVceg', '2016-12-01 08:18:55', '2016-12-02 08:18:55'),
(0, 'admin', 'vaptDL7UQn', '2016-12-01 08:28:22', '2016-12-02 08:28:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_demand`
--

CREATE TABLE IF NOT EXISTS `transaction_demand` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_demand_item`
--

CREATE TABLE IF NOT EXISTS `transaction_demand_item` (
  `id` int(11) NOT NULL,
  `id_transaction_demand` int(11) NOT NULL,
  `id_material` int(11) NOT NULL,
  `qty_request` int(11) NOT NULL,
  `status` enum('N','A','R') NOT NULL,
  `created_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2016-11-27 22:56:42', '2016-11-29 11:31:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaction_demand`
--
ALTER TABLE `transaction_demand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_demand_item`
--
ALTER TABLE `transaction_demand_item`
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
-- AUTO_INCREMENT for table `transaction_demand`
--
ALTER TABLE `transaction_demand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaction_demand_item`
--
ALTER TABLE `transaction_demand_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

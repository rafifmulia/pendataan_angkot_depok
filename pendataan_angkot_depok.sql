-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2018 at 01:17 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendataan_angkot_depok`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_angkot`
--

CREATE TABLE `data_angkot` (
  `kode_angkot` varchar(5) NOT NULL,
  `total_angkot` int(11) NOT NULL,
  `angkot_tersedia` int(11) NOT NULL,
  `angkot_terpakai` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_angkot`
--

INSERT INTO `data_angkot` (`kode_angkot`, `total_angkot`, `angkot_tersedia`, `angkot_terpakai`, `created_at`, `updated_at`) VALUES
('D01', 11, 10, 1, '2018-11-26 06:53:56', '2018-11-26 12:53:56'),
('D02', 16, 14, 2, '2018-11-30 04:10:11', '2018-11-30 10:10:11'),
('D03', 12, 12, 0, '2018-12-30 06:50:06', '2018-12-30 12:50:06'),
('D04', 14, 14, 0, '2018-12-30 06:56:23', '2018-12-30 12:56:23'),
('D05', 15, 15, 0, '2018-12-30 06:56:33', '2018-12-30 12:56:33');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_narik`
--

CREATE TABLE `jadwal_narik` (
  `id_jadwal` bigint(16) NOT NULL,
  `awal_narik` time NOT NULL,
  `akhir_narik` time NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_narik`
--

INSERT INTO `jadwal_narik` (`id_jadwal`, `awal_narik`, `akhir_narik`, `created_at`, `updated_at`) VALUES
(1, '12:55:00', '17:55:00', '2018-11-26 13:12:19', '2018-11-26 19:12:19'),
(7, '13:00:00', '06:00:00', '2018-11-26 13:36:58', '2018-11-26 19:36:58'),
(8, '10:10:00', '17:01:00', '2018-11-28 13:42:37', '2018-11-28 19:42:37'),
(9, '14:02:00', '21:09:00', '2018-11-30 04:14:17', '2018-11-30 10:14:17');

-- --------------------------------------------------------

--
-- Table structure for table `juragan`
--

CREATE TABLE `juragan` (
  `id_juragan` bigint(16) NOT NULL,
  `foto_juragan` varchar(125) DEFAULT NULL,
  `nama_juragan` varchar(125) NOT NULL,
  `umur` int(2) DEFAULT NULL,
  `jenis_kelamin` varchar(25) DEFAULT NULL,
  `agama` varchar(25) DEFAULT NULL,
  `kode_pos` varchar(5) DEFAULT NULL,
  `alamat` varchar(125) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `juragan`
--

INSERT INTO `juragan` (`id_juragan`, `foto_juragan`, `nama_juragan`, `umur`, `jenis_kelamin`, `agama`, `kode_pos`, `alamat`, `created_at`, `updated_at`) VALUES
(1, '1543199254.png', 'yusuf', 18, 'Laki-Laki', 'Islam', '16412', 'cilodongnya gatau sebelah mana', '2018-11-25 07:03:35', '2018-11-25 13:03:35'),
(7, '1543326272.jpeg', 'rafif', 18, 'Laki-Laki', 'Islam', '16431', 'green', '0000-00-00 00:00:00', '2018-11-27 20:44:32'),
(8, '1543544840.jpeg', 'bintang', 19, 'Laki-Laki', 'Islam', '16423', 'depok', '0000-00-00 00:00:00', '2018-11-30 09:27:20'),
(9, '1546061866.jpg', 'shanks', 27, 'Laki-Laki', 'Kristen', '16418', 'depok', '0000-00-00 00:00:00', '2018-12-24 23:09:37');

-- --------------------------------------------------------

--
-- Table structure for table `kepemilikan_angkot`
--

CREATE TABLE `kepemilikan_angkot` (
  `id_kepm` bigint(16) NOT NULL,
  `kode_angkot` varchar(5) NOT NULL,
  `id_juragan` bigint(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kepemilikan_angkot`
--

INSERT INTO `kepemilikan_angkot` (`id_kepm`, `kode_angkot`, `id_juragan`) VALUES
(14, 'D01', 1),
(28, 'D02', 7),
(34, 'D03', 9),
(35, 'D04', 9),
(36, 'D05', 7);

-- --------------------------------------------------------

--
-- Table structure for table `penggunaan_angkot`
--

CREATE TABLE `penggunaan_angkot` (
  `id_penggunaan` bigint(16) NOT NULL,
  `kode_angkot` varchar(5) NOT NULL,
  `nip` bigint(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penggunaan_angkot`
--

INSERT INTO `penggunaan_angkot` (`id_penggunaan`, `kode_angkot`, `nip`) VALUES
(6, 'D01', 3),
(16, 'D02', 9),
(17, 'D02', 8);

--
-- Triggers `penggunaan_angkot`
--
DELIMITER $$
CREATE TRIGGER `minusStokAngkot` AFTER INSERT ON `penggunaan_angkot` FOR EACH ROW UPDATE data_angkot SET angkot_tersedia = angkot_tersedia-1,
angkot_terpakai = angkot_terpakai+1 WHERE kode_angkot=NEW.kode_angkot
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `minusStokAngkot1` BEFORE DELETE ON `penggunaan_angkot` FOR EACH ROW UPDATE data_angkot SET angkot_tersedia = angkot_tersedia+1,
angkot_terpakai = angkot_terpakai-1 WHERE kode_angkot=OLD.kode_angkot
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `penugasan`
--

CREATE TABLE `penugasan` (
  `id_tugas` bigint(16) NOT NULL,
  `id_jadwal` bigint(16) NOT NULL,
  `nip` bigint(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penugasan`
--

INSERT INTO `penugasan` (`id_tugas`, `id_jadwal`, `nip`) VALUES
(1, 1, 3),
(7, 7, 7),
(8, 9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `perutean`
--

CREATE TABLE `perutean` (
  `id_perutean` bigint(16) NOT NULL,
  `id_rute` bigint(16) NOT NULL,
  `kode_angkot` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perutean`
--

INSERT INTO `perutean` (`id_perutean`, `id_rute`, `kode_angkot`) VALUES
(2, 3, 'D01'),
(9, 10, 'D02'),
(13, 12, 'D03'),
(14, 14, 'D04'),
(15, 13, 'D05');

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `id_rute` bigint(16) NOT NULL,
  `rute` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`id_rute`, `rute`, `created_at`, `updated_at`) VALUES
(3, 'Terminal Depok - Depok 1 Dalam(edit)', '2018-11-26 09:39:46', '0000-00-00 00:00:00'),
(10, 'depok 2 - depok timur', '2018-11-30 04:10:37', '2018-11-30 10:10:37'),
(12, 'tes', '2018-12-26 04:53:58', '2018-12-26 10:53:58'),
(13, 'tes5', '2018-12-30 06:43:22', '2018-12-30 12:43:22'),
(14, 'tes2', '2018-12-30 06:56:37', '2018-12-30 12:56:37');

-- --------------------------------------------------------

--
-- Table structure for table `supir`
--

CREATE TABLE `supir` (
  `nip` bigint(16) NOT NULL,
  `foto_supir` varchar(125) DEFAULT NULL,
  `nama_supir` varchar(125) NOT NULL,
  `umur` int(2) DEFAULT NULL,
  `jenis_kelamin` varchar(25) DEFAULT NULL,
  `agama` varchar(25) DEFAULT NULL,
  `kode_pos` varchar(5) DEFAULT NULL,
  `alamat` varchar(125) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supir`
--

INSERT INTO `supir` (`nip`, `foto_supir`, `nama_supir`, `umur`, `jenis_kelamin`, `agama`, `kode_pos`, `alamat`, `created_at`, `updated_at`) VALUES
(3, '1543200269.jpeg', 'BEJO', 25, 'Laki-Laki', 'Islam', '16412', 'gatau', '2018-11-26 09:37:08', '2018-11-26 09:37:08'),
(4, '1543200063.jpeg', 'syahid', 19, 'Laki-Laki', 'Islam', '16433', 'beji', '2018-11-26 09:37:08', '2018-11-26 09:41:03'),
(7, '1543244558.jpeg', 'sheli', 22, 'Laki-Laki', 'Islam', '16453', 'pondok cabe', '2018-11-26 09:37:08', '2018-11-26 22:02:38'),
(8, '1543377683.png', 'ahmad', 23, 'Laki-Laki', 'Islam', '16421', 'jl. maliki', '2018-11-26 09:37:08', '2018-11-26 22:03:57'),
(9, '1543380200.jpeg', 'yanto', 17, 'Laki-Laki', 'Islam', '16432', 'citayem', '0000-00-00 00:00:00', '2018-11-28 11:43:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_angkot`
--
ALTER TABLE `data_angkot`
  ADD PRIMARY KEY (`kode_angkot`);

--
-- Indexes for table `jadwal_narik`
--
ALTER TABLE `jadwal_narik`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `juragan`
--
ALTER TABLE `juragan`
  ADD PRIMARY KEY (`id_juragan`);

--
-- Indexes for table `kepemilikan_angkot`
--
ALTER TABLE `kepemilikan_angkot`
  ADD PRIMARY KEY (`id_kepm`),
  ADD UNIQUE KEY `id_angkot` (`kode_angkot`),
  ADD KEY `id_juragan` (`id_juragan`);

--
-- Indexes for table `penggunaan_angkot`
--
ALTER TABLE `penggunaan_angkot`
  ADD PRIMARY KEY (`id_penggunaan`),
  ADD UNIQUE KEY `nip` (`nip`) USING BTREE,
  ADD KEY `kode_angkot` (`kode_angkot`) USING BTREE;

--
-- Indexes for table `penugasan`
--
ALTER TABLE `penugasan`
  ADD PRIMARY KEY (`id_tugas`),
  ADD UNIQUE KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `nip` (`nip`) USING BTREE;

--
-- Indexes for table `perutean`
--
ALTER TABLE `perutean`
  ADD PRIMARY KEY (`id_perutean`),
  ADD UNIQUE KEY `kode_angkot` (`kode_angkot`),
  ADD KEY `id_rute` (`id_rute`) USING BTREE;

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id_rute`);

--
-- Indexes for table `supir`
--
ALTER TABLE `supir`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal_narik`
--
ALTER TABLE `jadwal_narik`
  MODIFY `id_jadwal` bigint(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `juragan`
--
ALTER TABLE `juragan`
  MODIFY `id_juragan` bigint(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kepemilikan_angkot`
--
ALTER TABLE `kepemilikan_angkot`
  MODIFY `id_kepm` bigint(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `penggunaan_angkot`
--
ALTER TABLE `penggunaan_angkot`
  MODIFY `id_penggunaan` bigint(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `penugasan`
--
ALTER TABLE `penugasan`
  MODIFY `id_tugas` bigint(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `perutean`
--
ALTER TABLE `perutean`
  MODIFY `id_perutean` bigint(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id_rute` bigint(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `supir`
--
ALTER TABLE `supir`
  MODIFY `nip` bigint(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kepemilikan_angkot`
--
ALTER TABLE `kepemilikan_angkot`
  ADD CONSTRAINT `kepemilikan_angkot_ibfk_2` FOREIGN KEY (`kode_angkot`) REFERENCES `data_angkot` (`kode_angkot`),
  ADD CONSTRAINT `kepemilikan_angkot_ibfk_3` FOREIGN KEY (`id_juragan`) REFERENCES `juragan` (`id_juragan`);

--
-- Constraints for table `penggunaan_angkot`
--
ALTER TABLE `penggunaan_angkot`
  ADD CONSTRAINT `penggunaan_angkot_ibfk_2` FOREIGN KEY (`kode_angkot`) REFERENCES `data_angkot` (`kode_angkot`),
  ADD CONSTRAINT `penggunaan_angkot_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `supir` (`nip`);

--
-- Constraints for table `penugasan`
--
ALTER TABLE `penugasan`
  ADD CONSTRAINT `penugasan_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_narik` (`id_jadwal`),
  ADD CONSTRAINT `penugasan_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `supir` (`nip`);

--
-- Constraints for table `perutean`
--
ALTER TABLE `perutean`
  ADD CONSTRAINT `perutean_ibfk_1` FOREIGN KEY (`kode_angkot`) REFERENCES `data_angkot` (`kode_angkot`),
  ADD CONSTRAINT `perutean_ibfk_2` FOREIGN KEY (`id_rute`) REFERENCES `rute` (`id_rute`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

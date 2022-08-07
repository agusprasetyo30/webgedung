-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 04, 2022 at 02:22 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsewagedung`
--

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` varchar(50) NOT NULL,
  `fasilitas` varchar(200) DEFAULT NULL,
  `jumlah` int(200) DEFAULT NULL,
  `foto` mediumtext,
  `harga_fsl` varchar(200) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `fasilitas`, `jumlah`, `foto`, `harga_fsl`, `keterangan`) VALUES
('F001', 'Kursi', 20, '62ddd591497f3.png', '2000', '-'),
('F002', 'meja kkk', 10, '62ddd60b56de1.jpg', '99000', '-');

-- --------------------------------------------------------

--
-- Table structure for table `gedung`
--

CREATE TABLE `gedung` (
  `id_gedung` varchar(20) NOT NULL,
  `nama_gedung` varchar(100) DEFAULT NULL,
  `foto` mediumtext,
  `harga_gdg` varchar(200) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gedung`
--

INSERT INTO `gedung` (`id_gedung`, `nama_gedung`, `foto`, `harga_gdg`, `keterangan`) VALUES
('G001', 'Gedung b', '62dd5e456fbc9.png', '60000', '-'),
('G002', 'Gedung Utama nn', '62dd5e619e021.png', '600', '-');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_sewa`
--

CREATE TABLE `jadwal_sewa` (
  `id_jadwal` varchar(30) NOT NULL,
  `tanggalpakai` date DEFAULT NULL,
  `tanggaltempo` date DEFAULT NULL,
  `id_gedung` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` varchar(50) NOT NULL,
  `fasilitas` varchar(200) DEFAULT NULL,
  `paket` varchar(200) DEFAULT NULL,
  `harga` varchar(200) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `fasilitas`, `paket`, `harga`, `keterangan`) VALUES
('P001', 'kkkk', 'Paket B', '2000', '-');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_sewa` varchar(20) CHARACTER SET latin1 NOT NULL,
  `reviewdata` text CHARACTER SET latin1,
  `username` varchar(255) CHARACTER SET latin1 NOT NULL,
  `denda` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` varchar(10) CHARACTER SET latin1 NOT NULL,
  `foto` mediumtext NOT NULL,
  `nama_penyewa` varchar(255) CHARACTER SET latin1 NOT NULL,
  `tgl` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `review_sesudah`
--

CREATE TABLE `review_sesudah` (
  `id_sewa` varchar(20) CHARACTER SET latin1 NOT NULL,
  `reviewdata` text CHARACTER SET latin1,
  `username` varchar(255) CHARACTER SET latin1 NOT NULL,
  `denda` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` varchar(10) CHARACTER SET latin1 NOT NULL,
  `foto` mediumtext NOT NULL,
  `nama_penyewa` varchar(255) CHARACTER SET latin1 NOT NULL,
  `tgl` date DEFAULT NULL,
  `tgl_admin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` varchar(200) NOT NULL,
  `nama_penyewa` varchar(200) DEFAULT NULL,
  `username` varchar(255) CHARACTER SET latin1 NOT NULL,
  `alamat_penyewa` varchar(300) DEFAULT NULL,
  `telp_penyewa` varchar(20) DEFAULT NULL,
  `id_paket` varchar(50) DEFAULT NULL,
  `tanggalpakai` date DEFAULT NULL,
  `tanggaltempo` date DEFAULT NULL,
  `lamasewa` int(30) DEFAULT NULL,
  `id_gedung` varchar(20) DEFAULT NULL,
  `id_fasilitas` text NOT NULL,
  `sudahbayar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_sewa`
--

CREATE TABLE `transaksi_sewa` (
  `id_bayar` varchar(20) NOT NULL,
  `id_sewa` varchar(20) DEFAULT NULL,
  `norek` varchar(30) DEFAULT NULL,
  `foto` mediumtext NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` varchar(255) CHARACTER SET latin1 NOT NULL,
  `totalbayar` varchar(255) CHARACTER SET latin1 NOT NULL,
  `nama_penyewa` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `tanggalpakai` date DEFAULT NULL,
  `tanggaltempo` date DEFAULT NULL,
  `notifedAdmin` tinyint(1) DEFAULT '1',
  `notifedUser` tinyint(1) DEFAULT '1',
  `notifedReview` tinyint(1) DEFAULT '1',
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(3, 'faryap1901', '$2y$10$KLP.bJlBY5/ETQFbmovOVOsUjWOranFf9p3TQs9b71MCRwv4dJ9va', '2022-06-19 22:23:15'),
(4, 'penyewa1', '$2y$10$PxgTtNRctQbYpvUfKyMsi.M4RpNSCuS.XoZpbRE0DOBI3HkReOuUu', '2022-06-19 22:40:39'),
(7, 'user123', '$2y$10$GFehH1st0MEjzus/eb9Bhui7kuLJ.VfRNVEspLq7ZYfC8zg4jpgzS', '2022-06-20 05:48:36'),
(8, 'usersewa1', '$2y$10$BatAXSca.lYEMUdbUYgVk.YMGcVsp4V62sjS/kAF7KW7P/UVBmsGO', '2022-06-24 00:35:23'),
(9, 'eldha', '$2y$10$uiXDDGWHcy9IoIuozfiOhe466cWjRNaU555XJGteqwXelC8lJ0DkO', '2022-07-02 19:31:51');

-- --------------------------------------------------------

--
-- Table structure for table `users_admin`
--

CREATE TABLE `users_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_admin`
--

INSERT INTO `users_admin` (`id`, `username`, `password`, `created_at`) VALUES
(5, 'admin', '$2y$10$10uzXabBKTlXVbjZfEs/zOe1/RMDBVlNQmxRWi7Wqz.OAq9G5Ze5y', '2022-06-19 23:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `users_review`
--

CREATE TABLE `users_review` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_review`
--

INSERT INTO `users_review` (`id`, `username`, `password`, `created_at`) VALUES
(8, 'review', '$2y$10$JeKimL0e5dC6PoSBqCJCmO8PkSZjDTKdlvsGXhJEgNAoWQA4dQyJ2', '2022-06-20 22:20:19'),
(9, 'pengecek', '$2y$10$cK7gIhmMvzgOGAKRKWdkw.QZyBpS5z/cqcVIMDBdiuEFEfvbadlWK', '2022-07-03 14:35:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`id_gedung`);

--
-- Indexes for table `jadwal_sewa`
--
ALTER TABLE `jadwal_sewa`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `id_sewa` (`id_sewa`) USING BTREE;

--
-- Indexes for table `review_sesudah`
--
ALTER TABLE `review_sesudah`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `id_sewa` (`id_sewa`) USING BTREE;

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_gedung` (`id_gedung`);

--
-- Indexes for table `transaksi_sewa`
--
ALTER TABLE `transaksi_sewa`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `id_sewa` (`id_sewa`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users_admin`
--
ALTER TABLE `users_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users_review`
--
ALTER TABLE `users_review`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users_admin`
--
ALTER TABLE `users_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_review`
--
ALTER TABLE `users_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `sewa_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`),
  ADD CONSTRAINT `sewa_ibfk_2` FOREIGN KEY (`id_gedung`) REFERENCES `gedung` (`id_gedung`);

--
-- Constraints for table `transaksi_sewa`
--
ALTER TABLE `transaksi_sewa`
  ADD CONSTRAINT `transaksi_sewa_ibfk_1` FOREIGN KEY (`id_sewa`) REFERENCES `sewa` (`id_sewa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

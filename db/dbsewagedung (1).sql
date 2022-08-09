-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 08, 2022 at 01:52 AM
-- Server version: 8.0.26
-- PHP Version: 7.3.30

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
  `id_fasilitas` varchar(50) CHARACTER SET ascii NOT NULL,
  `fasilitas` varchar(200) CHARACTER SET ascii DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `foto` mediumtext CHARACTER SET ascii,
  `harga_fsl` varchar(200) CHARACTER SET ascii DEFAULT NULL,
  `keterangan` text CHARACTER SET ascii
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id_gedung` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_gedung` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `foto` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `harga_gdg` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gedung`
--

INSERT INTO `gedung` (`id_gedung`, `nama_gedung`, `foto`, `harga_gdg`, `keterangan`) VALUES
('G001', 'Gedung B', '62dd5e456fbc9.png', '60000', '-'),
('G002', 'Gedung A', '62dd5e619e021.png', '600', '-');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_sewa`
--

CREATE TABLE `jadwal_sewa` (
  `id_jadwal` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tanggalpakai` date DEFAULT NULL,
  `tanggaltempo` date DEFAULT NULL,
  `id_gedung` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_gedung` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fasilitas` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `paket` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `harga` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `id_gedung`, `fasilitas`, `paket`, `harga`, `keterangan`) VALUES
('P001', 'G001', 'kkkk', 'TEST PAKET B', '2000', '-'),
('P002', 'G002', 'TEST', 'TEST PAKET A', '80000', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_sewa` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `reviewdata` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `denda` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `foto` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_penyewa` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review_sesudah`
--

CREATE TABLE `review_sesudah` (
  `id_sewa` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `reviewdata` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `denda` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `foto` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_penyewa` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl` date DEFAULT NULL,
  `tgl_admin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_penyewa` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat_penyewa` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `telp_penyewa` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_paket` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tanggalpakai` date DEFAULT NULL,
  `tanggaltempo` date DEFAULT NULL,
  `lamasewa` int DEFAULT NULL,
  `id_gedung` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_fasilitas` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sudahbayar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `nama_penyewa`, `username`, `alamat_penyewa`, `telp_penyewa`, `id_paket`, `tanggalpakai`, `tanggaltempo`, `lamasewa`, `id_gedung`, `id_fasilitas`, `sudahbayar`) VALUES
('PKT222552', 'ASDAS paket', 'eldha', 'Test alamat2 paket', 'dsadas', 'P001', '2022-07-06', '2022-07-08', 3, 'G001', '0', '0'),
('REG1982578', 'test', 'eldha', 'd', 'rgs', NULL, '2022-08-15', '2022-08-17', 3, 'G001', '0:Tanpa Fasilitas,', '0'),
('REG2199562', 'SCA', 'eldha', 'AC', 'AF', NULL, '2022-09-07', '2022-09-17', 11, 'G001', '0:Tanpa Fasilitas,2000:Kursi,', '0'),
('REG5463506', 'test januari', 'eldha', 'alamat januari', 'telepon januari', NULL, '2022-01-05', '2022-01-08', 4, 'G001', '0:Tanpa Fasilitas,2000:Kursi,99000:meja kkk,', '0'),
('REG6413381', 'Test', 'eldha', 'test3', 'csaac', NULL, '2022-08-07', '2022-08-10', 4, 'G001', '0:Tanpa Fasilitas,2000:Kursi,99000:meja kkk,', '0'),
('REG680846', 'halo tes', 'eldha', 'csaa', 'no test', NULL, '2022-08-21', '2022-08-27', 7, 'G002', '0:Tanpa Fasilitas,2000:Kursi,', '0'),
('REG8316134', 'test pebruari', 'eldha', 'test pebruari', 'test pebruari', NULL, '2022-02-07', '2022-02-10', 4, 'G001', '0:Tanpa Fasilitas,2000:Kursi,', '0'),
('REG8629321', 'VSDKMLK', 'eldha', 'SAC', 'GSGS', NULL, '2022-09-01', '2022-09-03', 3, 'G002', '0:Tanpa Fasilitas,', '0'),
('REG9398469', 'fwef', 'eldha', 'dvsv', 'gwrgw', NULL, '2022-08-28', '2022-09-02', 6, 'G001', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_sewa`
--

CREATE TABLE `transaksi_sewa` (
  `id_bayar` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_sewa` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `norek` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `foto` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `totalbayar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_penyewa` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tanggalpakai` date DEFAULT NULL,
  `tanggaltempo` date DEFAULT NULL,
  `notifedAdmin` tinyint(1) DEFAULT '1',
  `notifedUser` tinyint(1) DEFAULT '1',
  `notifedReview` tinyint(1) DEFAULT '1',
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id` int NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id` int NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  ADD PRIMARY KEY (`id_paket`),
  ADD KEY `sewa_segung_paket_1` (`id_gedung`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users_admin`
--
ALTER TABLE `users_admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_review`
--
ALTER TABLE `users_review`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `paket`
--
ALTER TABLE `paket`
  ADD CONSTRAINT `sewa_segung_paket_1` FOREIGN KEY (`id_gedung`) REFERENCES `gedung` (`id_gedung`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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

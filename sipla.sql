-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2023 at 07:46 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipla`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `foto`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Mia Sarasmita', 'app/admin/1-1691620395-9Ng6Z.jpg', 'mia@gmail.com', '$2y$10$.QML8d.yHm.B16923IIwseqlrNpASc096PHE90mOGHb3Bc.2hIG0i', NULL, '2023-08-09 22:33:15');

-- --------------------------------------------------------

--
-- Table structure for table `lahan`
--

CREATE TABLE `lahan` (
  `id` int(11) NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `luas` varchar(225) NOT NULL,
  `satuan_luas` varchar(10) NOT NULL,
  `lokasi` longtext NOT NULL,
  `kategori` longtext NOT NULL,
  `kategori_lahan` enum('Pertanian','Perkebunan') NOT NULL,
  `lat` varchar(50) NOT NULL,
  `lng` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lahan`
--

INSERT INTO `lahan` (`id`, `id_pemilik`, `luas`, `satuan_luas`, `lokasi`, `kategori`, `kategori_lahan`, `lat`, `lng`, `gambar`, `created_at`, `updated_at`) VALUES
(8, 16, '3', 'Hektare', 'Jalan Tanpa Nama, Mekar Jaya, Kec. Sungai Melayu Rayak, Kabupaten Ketapang, Kalimantan Barat, Indonesia', 'Kec. Sungai Melayu Rayak', 'Pertanian', '-1.7545401528620692', '110.41552930000003', 'app/lahan/-1692011788-Dls.png', '2023-08-15 01:16:28', '2023-08-15 23:34:01'),
(9, 14, '12', 'Hektare', 'Jalan Tanpa Nama, Sedahan Jaya, Kec. Sukadana, Kabupaten Kayong Utara, Kalimantan Barat 78852, Indonesia', 'Kec. Sukadana', 'Perkebunan', '-1.2053069201643694', '110.02308743953493', 'app/lahan/-1692018630-AEx.jpg', '2023-08-15 03:10:31', '2023-08-15 03:10:31'),
(10, 16, '3', 'Hektare', 'Jalan Tanpa Nama, Mekar Jaya, Kec. Sungai Melayu Rayak, Kabupaten Ketapang, Kalimantan Barat, Indonesia', 'Kec. Sungai Melayu Rayak', 'Pertanian', '-1.7545401528620692', '110.41552930000003', 'app/lahan/-1692018701-xJM.jpg', '2023-08-15 03:11:41', '2023-08-15 03:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `pemilik`
--

CREATE TABLE `pemilik` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` longtext NOT NULL,
  `tlp` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemilik`
--

INSERT INTO `pemilik` (`id`, `nama`, `alamat`, `tlp`, `created_at`, `updated_at`) VALUES
(13, 'Siti Wasilah', 'Sei awan kanan', '0895702452821', '2023-08-09 22:49:26', '2023-08-09 22:49:26'),
(14, 'Hadi Susanto', 'Sei awan kiri', '089616681386', '2023-08-09 22:49:56', '2023-08-09 22:49:56'),
(16, 'Uu Sudrajat', 'Tempurukan', '089694207560', '2023-08-09 22:51:17', '2023-08-09 22:51:17'),
(18, 'artasukma', 'kalinilam', '089694207560', '2023-08-10 03:34:39', '2023-08-10 03:34:39');

-- --------------------------------------------------------

--
-- Table structure for table `pengairan`
--

CREATE TABLE `pengairan` (
  `id` int(11) NOT NULL,
  `id_lahan` int(11) NOT NULL,
  `banyak_pengairan` int(11) NOT NULL,
  `ph_air` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengairan`
--

INSERT INTO `pengairan` (`id`, `id_lahan`, `banyak_pengairan`, `ph_air`, `created_at`, `updated_at`) VALUES
(8, 8, 4, 5.6, '2023-08-15 01:16:28', '2023-08-15 23:34:01'),
(9, 9, 12, 4.6, '2023-08-15 03:10:31', '2023-08-15 03:10:31'),
(10, 10, 4, 5.6, '2023-08-15 03:11:41', '2023-08-15 03:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `tanah`
--

CREATE TABLE `tanah` (
  `id` int(11) NOT NULL,
  `id_lahan` int(11) NOT NULL,
  `tekstur` varchar(50) NOT NULL,
  `kedalaman` varchar(100) NOT NULL,
  `ph_tanah` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tanah`
--

INSERT INTO `tanah` (`id`, `id_lahan`, `tekstur`, `kedalaman`, `ph_tanah`, `created_at`, `updated_at`) VALUES
(8, 8, 'Padat', '4', 2.3, '2023-08-15 01:16:28', '2023-08-15 23:34:01'),
(9, 9, 'Berair', '2', 5.5, '2023-08-15 03:10:31', '2023-08-15 03:10:31'),
(10, 10, 'Padat', '4', 2.3, '2023-08-15 03:11:41', '2023-08-15 03:11:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lahan`
--
ALTER TABLE `lahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengairan`
--
ALTER TABLE `pengairan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tanah`
--
ALTER TABLE `tanah`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lahan`
--
ALTER TABLE `lahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pengairan`
--
ALTER TABLE `pengairan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tanah`
--
ALTER TABLE `tanah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

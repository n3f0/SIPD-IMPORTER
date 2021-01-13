-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2021 at 10:04 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sumbarprov`
--
CREATE DATABASE IF NOT EXISTS `sumbarprov` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sumbarprov`;

-- --------------------------------------------------------

--
-- Table structure for table `belanjaopd_tmp`
--

CREATE TABLE `belanjaopd_tmp` (
  `tahun` varchar(5) NOT NULL,
  `tahap` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_skpd` int(11) NOT NULL,
  `kode_skpd` varchar(30) NOT NULL,
  `nama_skpd` varchar(100) NOT NULL,
  `total_giat` int(11) NOT NULL,
  `set_pagu_giat` decimal(15,2) NOT NULL,
  `set_pagu_skpd` decimal(15,2) NOT NULL,
  `pagu_giat` decimal(15,2) NOT NULL,
  `rinci_giat` decimal(15,2) NOT NULL,
  `totalgiat` int(11) NOT NULL,
  `batasanpagu` decimal(15,2) NOT NULL,
  `nilaipagu` decimal(15,2) NOT NULL,
  `nilaipagumurni` decimal(15,2) NOT NULL,
  `nilairincian` decimal(15,2) NOT NULL,
  `realisasi` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id_bidang_urusan` int(11) NOT NULL,
  `id_urusan` int(11) NOT NULL,
  `kode_bidang_urusan` varchar(20) NOT NULL,
  `nama_bidang_urusan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_giat` int(11) NOT NULL,
  `kode_giat` varchar(20) NOT NULL,
  `nama_giat` varchar(100) NOT NULL,
  `id_program` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_tmp`
--

CREATE TABLE `kegiatan_tmp` (
  `id_urusan` int(11) NOT NULL,
  `kode_urusan` varchar(5) NOT NULL,
  `nama_urusan` varchar(100) NOT NULL,
  `id_bidang_urusan` int(11) NOT NULL,
  `kode_bidang_urusan` varchar(8) NOT NULL,
  `nama_bidang_urusan` varchar(100) NOT NULL,
  `id_program` int(11) NOT NULL,
  `kode_program` varchar(10) NOT NULL,
  `nama_program` varchar(100) NOT NULL,
  `id_giat` int(11) NOT NULL,
  `kode_giat` varchar(15) NOT NULL,
  `nama_giat` varchar(100) NOT NULL,
  `id_sub_giat` int(11) NOT NULL,
  `kode_sub_giat` varchar(17) NOT NULL,
  `nama_sub_giat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `popd_tmp`
--

CREATE TABLE `popd_tmp` (
  `id_unit` int(11) NOT NULL,
  `id_skpd` int(11) NOT NULL,
  `kode_skpd` varchar(30) NOT NULL,
  `nama_skpd` varchar(100) NOT NULL,
  `nilaitotal` decimal(10,0) NOT NULL,
  `nilaimurni` decimal(10,0) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `tahap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `princi_tmp`
--

CREATE TABLE `princi_tmp` (
  `id_pendapatan` int(11) NOT NULL,
  `kode_akun` varchar(100) NOT NULL,
  `nama_akun` varchar(100) NOT NULL,
  `uraian` varchar(100) NOT NULL,
  `skpd_koordinator` int(11) NOT NULL,
  `urusan_koordinator` int(11) NOT NULL,
  `program_koordinator` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `rekening` varchar(100) NOT NULL,
  `nilaimurni` decimal(10,0) NOT NULL,
  `id_skpd` int(11) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `tahap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id_bidang_urusan` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `kode_program` varchar(20) NOT NULL,
  `nama_program` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subkegiatan`
--

CREATE TABLE `subkegiatan` (
  `id_sub_giat` int(11) NOT NULL,
  `kode_sub_giat` varchar(30) NOT NULL,
  `nama_sub_giat` varchar(100) NOT NULL,
  `id_giat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `urusan`
--

CREATE TABLE `urusan` (
  `id_urusan` int(11) NOT NULL,
  `id_fungsi` int(11) NOT NULL,
  `kode_urusan` varchar(20) NOT NULL,
  `nama_urusan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `belanjaopd_tmp`
--
ALTER TABLE `belanjaopd_tmp`
  ADD PRIMARY KEY (`tahun`,`tahap`,`id_skpd`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id_bidang_urusan`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_giat`);

--
-- Indexes for table `kegiatan_tmp`
--
ALTER TABLE `kegiatan_tmp`
  ADD PRIMARY KEY (`id_urusan`,`id_bidang_urusan`,`id_program`,`id_giat`,`id_sub_giat`);

--
-- Indexes for table `popd_tmp`
--
ALTER TABLE `popd_tmp`
  ADD PRIMARY KEY (`id_skpd`,`tahun`,`tahap`);

--
-- Indexes for table `princi_tmp`
--
ALTER TABLE `princi_tmp`
  ADD PRIMARY KEY (`id_pendapatan`,`id_skpd`,`tahun`,`tahap`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id_program`);

--
-- Indexes for table `subkegiatan`
--
ALTER TABLE `subkegiatan`
  ADD PRIMARY KEY (`id_sub_giat`);

--
-- Indexes for table `urusan`
--
ALTER TABLE `urusan`
  ADD PRIMARY KEY (`id_urusan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2020 at 04:23 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rskg_dpa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_agendarapat`
--

CREATE TABLE `tb_agendarapat` (
  `id_a` int(11) NOT NULL,
  `no_urut_a` varchar(225) NOT NULL,
  `tanggal_a` date NOT NULL,
  `nm_kegiatan_a` varchar(225) NOT NULL,
  `upload_uan_a` varchar(225) DEFAULT NULL,
  `undangan_a` varchar(225) DEFAULT NULL,
  `absensi_a` varchar(225) DEFAULT NULL,
  `notulensi_a` varchar(225) DEFAULT NULL,
  `foto_kegiatan_a` varchar(225) DEFAULT NULL,
  `action_a` varchar(225) DEFAULT NULL,
  `date_a` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bagian`
--

CREATE TABLE `tb_bagian` (
  `id_bg` int(11) NOT NULL,
  `id_kode` int(11) NOT NULL,
  `nama_bg` varchar(225) NOT NULL,
  `date_bg` date NOT NULL,
  `username_bg` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bagian`
--

INSERT INTO `tb_bagian` (`id_bg`, `id_kode`, `nama_bg`, `date_bg`, `username_bg`) VALUES
(1, 1, 'Bagian Administrasi & Umum', '2020-05-25', ''),
(2, 1, 'Bagian Pengembangan RS', '2020-05-25', NULL),
(3, 1, 'Bidang Pelayanan Medis', '2020-05-25', NULL),
(4, 1, 'Bidang Keperawatan', '2020-05-25', NULL),
(5, 2, 'Instalasi Gawat Darurat', '2020-05-25', NULL),
(6, 2, 'Instalasi Rawat Jalan', '2020-05-25', NULL),
(7, 2, 'Instalasi Rawat Inap', '2020-05-25', NULL),
(8, 2, 'Instalasi Bedah', '2020-05-25', NULL),
(9, 2, 'Instalasi Care Unit', '2020-05-25', NULL),
(10, 2, 'Instalasi Laboratorium', '2020-05-25', NULL),
(11, 2, 'Instalasi Radiologi', '2020-05-25', NULL),
(12, 2, 'Instalasi Check Up', '2020-05-25', NULL),
(13, 2, 'Instalasi Gizi', '2020-05-25', NULL),
(14, 2, 'Instalasi Farmasi', '2020-05-25', NULL),
(15, 2, 'Instalasi Rekam Medis', '2020-05-25', NULL),
(16, 2, 'Instalasi Pemeliharaan Sarana RS', '2020-05-25', NULL),
(17, 3, 'Komite Medis', '2020-05-25', NULL),
(18, 3, 'Komite Etik', '2020-05-25', NULL),
(19, 3, 'Komite Keperawatan & Nakes Lain', '2020-05-25', NULL),
(20, 3, 'Komite PMKP', '2020-05-25', NULL),
(21, 3, 'Komite Rekam Medis', '2020-05-25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokumeneksternal`
--

CREATE TABLE `tb_dokumeneksternal` (
  `id_de` int(11) NOT NULL,
  `no_urut_de` varchar(225) NOT NULL,
  `tanggal_de` date NOT NULL,
  `no_dok_de` varchar(225) NOT NULL,
  `judul_de` varchar(225) NOT NULL,
  `penerbit_de` varchar(225) NOT NULL,
  `upload_de` varchar(225) DEFAULT NULL,
  `keterangan_de` text NOT NULL,
  `action_de` varchar(225) DEFAULT NULL,
  `date_de` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kode`
--

CREATE TABLE `tb_kode` (
  `id_kode` int(11) NOT NULL,
  `nama_kode` varchar(225) NOT NULL,
  `date_kode` date NOT NULL,
  `username_kode` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kode`
--

INSERT INTO `tb_kode` (`id_kode`, `nama_kode`, `date_kode`, `username_kode`) VALUES
(1, 'Bagian/Bidang', '2020-05-25', NULL),
(2, 'Instalasi', '2020-05-25', NULL),
(3, 'Komite/Tim', '2020-05-25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_log`
--

CREATE TABLE `tb_log` (
  `log_id` int(10) NOT NULL,
  `log_user` varchar(100) NOT NULL,
  `log_type` varchar(100) NOT NULL,
  `log_date` date NOT NULL,
  `log_remarks` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_log`
--

INSERT INTO `tb_log` (`log_id`, `log_user`, `log_type`, `log_date`, `log_remarks`) VALUES
(1, 'admin', 'login', '2020-05-30', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_notaintern`
--

CREATE TABLE `tb_notaintern` (
  `id_n` int(11) NOT NULL,
  `no_urut_n` varchar(225) NOT NULL,
  `tanggal_n` date NOT NULL,
  `no_dokumen_n` varchar(225) NOT NULL,
  `judul_n` varchar(225) NOT NULL,
  `bagian_n` varchar(225) NOT NULL,
  `upload_n` varchar(225) DEFAULT NULL,
  `keterangan_n` text NOT NULL,
  `action_n` varchar(225) DEFAULT NULL,
  `date_n` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_singkatan`
--

CREATE TABLE `tb_singkatan` (
  `id_sing` int(11) NOT NULL,
  `id_bg` int(11) NOT NULL,
  `kode_sing` varchar(225) NOT NULL,
  `date_sing` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_singkatan`
--

INSERT INTO `tb_singkatan` (`id_sing`, `id_bg`, `kode_sing`, `date_sing`) VALUES
(1, 1, 'ADM', '2020-05-25'),
(2, 2, 'BPRS', '2020-05-25'),
(3, 3, 'YANMED', '2020-05-25'),
(4, 4, 'KEP', '2020-05-25'),
(5, 5, 'IGD', '2020-05-25'),
(6, 6, 'IRJ', '2020-05-25'),
(7, 7, 'IRNA', '2020-05-25'),
(8, 8, 'OKE', '2020-05-25'),
(9, 9, 'ICU', '2020-05-25'),
(10, 10, 'LAB', '2020-05-25'),
(11, 11, 'RAD', '2020-05-25'),
(12, 12, 'MCU', '2020-05-25'),
(13, 13, 'GIZI', '2020-05-25'),
(14, 14, 'FARM', '2020-05-25'),
(15, 15, 'IRM', '2020-05-25'),
(16, 16, 'IPSRS', '2020-05-25'),
(17, 17, 'KOMED', '2020-05-25'),
(18, 18, 'ETIK', '2020-05-25'),
(19, 19, 'KKNL', '2020-05-25'),
(20, 20, 'PMKP', '2020-05-25'),
(21, 21, 'KRM', '2020-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_suratkeputusan`
--

CREATE TABLE `tb_suratkeputusan` (
  `id_sk` int(11) NOT NULL,
  `no_urut_sk` varchar(225) NOT NULL,
  `tanggal_sk` date NOT NULL,
  `no_dok_sk` varchar(225) NOT NULL,
  `judul_sk` varchar(225) NOT NULL,
  `bagian_sk` varchar(225) NOT NULL,
  `upload_sk` varchar(225) NOT NULL,
  `keterangan_sk` text,
  `action_sk` varchar(225) DEFAULT NULL,
  `date_sk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_role` enum('superadmin','admin','user') NOT NULL,
  `full_name` varchar(225) NOT NULL,
  `foto` varchar(225) DEFAULT NULL,
  `jenis_kelamin` varchar(225) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` varchar(225) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `date_user` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `username`, `password`, `user_role`, `full_name`, `foto`, `jenis_kelamin`, `email`, `alamat`, `no_hp`, `jabatan`, `unit`, `date_user`) VALUES
(1, 'admin', '123123', 'admin', 'Muhammad Amran', 'comment_1.png', 'Pria', 'amranrskg@gmail.com', 'Bandung', '08780230909', 'Software Engineer', 'Bagian Administrasi & Umum', '0000-00-00'),
(2, 'rskg', '123123', 'superadmin', 'RSKG Ny. R.A. Habibie', 'header.png', 'Pria', 'rskgitbandung@gmail.com', 'Jl. Sekeloa, Kota Bandung, Jawa Barat', '098980', 'IT', 'Bagian Administrasi & Umum', '2020-05-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_agendarapat`
--
ALTER TABLE `tb_agendarapat`
  ADD PRIMARY KEY (`id_a`);

--
-- Indexes for table `tb_bagian`
--
ALTER TABLE `tb_bagian`
  ADD PRIMARY KEY (`id_bg`);

--
-- Indexes for table `tb_dokumeneksternal`
--
ALTER TABLE `tb_dokumeneksternal`
  ADD PRIMARY KEY (`id_de`);

--
-- Indexes for table `tb_kode`
--
ALTER TABLE `tb_kode`
  ADD PRIMARY KEY (`id_kode`);

--
-- Indexes for table `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tb_notaintern`
--
ALTER TABLE `tb_notaintern`
  ADD PRIMARY KEY (`id_n`);

--
-- Indexes for table `tb_singkatan`
--
ALTER TABLE `tb_singkatan`
  ADD PRIMARY KEY (`id_sing`);

--
-- Indexes for table `tb_suratkeputusan`
--
ALTER TABLE `tb_suratkeputusan`
  ADD PRIMARY KEY (`id_sk`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_agendarapat`
--
ALTER TABLE `tb_agendarapat`
  MODIFY `id_a` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_bagian`
--
ALTER TABLE `tb_bagian`
  MODIFY `id_bg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tb_dokumeneksternal`
--
ALTER TABLE `tb_dokumeneksternal`
  MODIFY `id_de` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_kode`
--
ALTER TABLE `tb_kode`
  MODIFY `id_kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_log`
--
ALTER TABLE `tb_log`
  MODIFY `log_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_notaintern`
--
ALTER TABLE `tb_notaintern`
  MODIFY `id_n` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_singkatan`
--
ALTER TABLE `tb_singkatan`
  MODIFY `id_sing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tb_suratkeputusan`
--
ALTER TABLE `tb_suratkeputusan`
  MODIFY `id_sk` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

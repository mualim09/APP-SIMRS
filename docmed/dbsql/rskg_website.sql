-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2020 at 01:25 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rskg_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id_dokter` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `nama_dokter` varchar(255) DEFAULT NULL,
  `senin` varchar(255) DEFAULT NULL,
  `selasa` varchar(255) DEFAULT NULL,
  `rabu` varchar(255) DEFAULT NULL,
  `kamis` varchar(255) DEFAULT NULL,
  `jumat` varchar(255) DEFAULT NULL,
  `sabtu` varchar(255) DEFAULT NULL,
  `minggu` varchar(255) DEFAULT NULL,
  `status_dokter` varchar(255) DEFAULT NULL,
  `ket_spesialis` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dokter`
--

INSERT INTO `tb_dokter` (`id_dokter`, `foto`, `nama_dokter`, `senin`, `selasa`, `rabu`, `kamis`, `jumat`, `sabtu`, `minggu`, `status_dokter`, `ket_spesialis`) VALUES
(1, '12.png', 'drg. R. Yulia Puspitasari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spesialis', 'Dokter Gigi'),
(3, '1.png', 'dr. Esther Sylviani Sutedjo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Umum', NULL),
(4, 'dr-astrid.png', 'dr. Astried Indrasari, SpPD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'spesialis', 'Dokter Spesialis Penyakit Dalam'),
(5, NULL, 'dr. Enita Rakhmawati Kurniaatmaja, MSC., SpPD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spesialis', 'Dokter Spesialis Penyakit Dalam'),
(6, 'dr-ria-yolanda.png', 'dr. Ria Yolanda Vitri, SpPD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spesialis', 'Dokter Spesialis Penyakit Dalam'),
(7, NULL, 'dr. Ria Bandriara, SpPD-KGH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spesialis', 'Dokter Spesialis Penyakit Dalam Ginjal - Hipertensi'),
(8, 'dr-lukman.png', 'dr. Lukman Pura, SpPD-KGH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spesialis', 'Dokter Spesialis Penyakit Dalam Ginjal - Hipertensi'),
(9, 'dr-yasmin.png', 'dr. Nuraini Yasmin Kusumawardhani, SpPD., SpJP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spesialis', 'Dokter Spesialis Penyakit Dalam - Jantung dan Pembuluh Darah'),
(10, NULL, 'dr. Rama Nusjirwan, Sp.BTKV', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spesialis', 'Dokter Spesialis Bedah Toraks Kardiovaskuler'),
(11, 'dr-tommy.png', 'dr. Tommy M. Seno Utomo, SpU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spesialis', 'Dokter Spesialis Urologi'),
(12, 'dr-ruri.png', 'dr. Ruri Intania, SpP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spesialis', 'Dokter Spesialis Paru (Purmonologi)'),
(13, 'dr-caroline.png', 'dr. Caroline Wulur, Sp.An', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spesialis', 'Dokter Spesialis Anasthesiologi'),
(14, NULL, 'dr. Tresna Kamila, SpPK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spesialis', 'Dokter Spesialis Patologi Klinik'),
(15, 'dr-sri.png', 'dr. Sri Dyah Panji, Sp.Rad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spesialis', 'Dokter Spesialis Radiologi'),
(16, 'dr-raissa.png', 'drg. Raissa Indiwina, Sp.KG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spesialis', 'Dokter Gigi Spesialis Konservasi Gizi'),
(17, NULL, 'drg. Elih, Sp.Ort', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spesialis', 'Dokter Gigi Spesialis Ortodensia'),
(18, NULL, 'drg. Rosida Manurung, Sp. Pros(K)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spesialis', 'Dokter Gigi Spesialis Protodensia'),
(19, NULL, 'drg. Otoy Hidayat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spesialis', 'Dokter Gigi'),
(20, '2.png', 'dr. Elda Arini Hartono', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Umum', NULL),
(21, '3.png', 'dr. Irene Ranny Krsitya N, MH.Kes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Umum', NULL),
(22, '5.png', 'dr. Melita Hendriani, MMRS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Umum', NULL),
(23, '7.png', 'dr. Nia Sylviani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Umum', NULL),
(24, '8.png', 'dr. Ade Astrida', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Umum', NULL),
(25, '9.png', 'dr. Nandya Meitadani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Umum', NULL),
(26, '10.png', 'dr. Rany Ramadhan Kusuma Sejati', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Umum', NULL),
(27, '11.png', 'dr. Yovan Rivanzah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Umum', NULL),
(28, '13.png', 'dr. Vera Dianwari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Umum', NULL),
(29, '14.png', 'dr. Dhia Ramadhani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Umum', NULL),
(30, '15.png', 'dr. Ratih Yonarita Nasution', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Umum', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

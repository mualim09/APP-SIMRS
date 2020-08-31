-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2020 at 10:51 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rskg_akreditasi`
--

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
(21, 3, 'Komite Rekam Medis', '2020-05-25', NULL),
(22, 4, 'wdw', '2020-06-22', 'RSKG Ny. R.A. Habibie');

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
-- Table structure for table `tb_kritiksaran`
--

CREATE TABLE `tb_kritiksaran` (
  `id_ks` int(11) NOT NULL,
  `kritik` text NOT NULL,
  `saran` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'admin', 'login', '2020-05-30', ' '),
(2, 'admin', 'login', '2020-05-30', ' '),
(3, 'rskg', 'login', '2020-05-30', ' '),
(4, 'admin', 'login', '2020-05-31', ' '),
(5, 'rskg', 'login', '2020-05-31', ' '),
(6, 'rskg', 'login', '2020-05-31', ' '),
(7, 'admin', 'login', '2020-05-31', ' '),
(8, 'admin', 'login', '2020-05-31', ' '),
(9, 'rskg', 'login', '2020-05-31', ' '),
(10, 'rskg', 'login', '2020-05-31', ' '),
(11, 'rskg', 'login', '2020-05-31', ' '),
(12, 'amranhakim9@gmail.com', 'login', '2020-06-17', ' '),
(13, 'amranrskg@gmail.com', 'login', '2020-06-18', ' '),
(14, 'amranhakim9@gmail.com', 'login', '2020-06-19', ' '),
(15, 'amranrskg@gmail.com', 'login', '2020-06-19', ' '),
(16, 'amranrskg@gmail.com', 'login', '2020-06-19', ' '),
(17, 'amranhakim9@gmail.com', 'login', '2020-06-19', ' '),
(18, 'amranhakim9@gmail.com', 'login', '2020-06-20', ' '),
(19, 'amranrskg@gmail.com', 'login', '2020-06-20', ' '),
(20, 'amranrskg@gmail.com', 'login', '2020-06-20', ' '),
(21, 'amranhakim9@gmail.com', 'login', '2020-06-20', ' '),
(22, 'rskgitbandung@gmail.com', 'login', '2020-06-22', ' '),
(23, 'amranrskg@gmail.com', 'login', '2020-06-23', ' '),
(24, 'rskgitbandung@gmail.com', 'login', '2020-06-23', ' '),
(25, 'amranhakim9@gmail.com', 'login', '2020-06-24', ' '),
(26, 'amranhakim9@gmail.com', 'login', '2020-06-26', ' '),
(27, 'amranhakim9@gmail.com', 'login', '2020-06-26', ' '),
(28, 'amranrskg@gmail.com', 'login', '2020-06-26', ' '),
(29, 'amranhakim9@gmail.com', 'login', '2020-06-29', ' '),
(30, 'amranrskg@gmail.com', 'login', '2020-06-29', ' '),
(31, 'amranhakim9@gmail.com', 'login', '2020-06-29', ' '),
(32, 'amranrskg@gmail.com', 'login', '2020-06-29', ' '),
(33, 'rusma@angelfire.com', 'login', '2020-07-02', ' '),
(34, 'rusma@angelfire.com', 'login', '2020-07-02', ' '),
(35, 'rusma@angelfire.com', 'login', '2020-07-02', ' '),
(36, 'rusma@angelfire.com', 'login', '2020-07-02', ' '),
(37, 'rusma@angelfire.com', 'login', '2020-07-02', ' '),
(38, 'rusma@angelfire.com', 'login', '2020-07-02', ' '),
(39, 'sriayu843@gmail.com', 'login', '2020-07-03', ' '),
(40, 'melyayunurdian@gmail.com', 'login', '2020-07-03', ' '),
(41, 'rusma@angelfire.com', 'login', '2020-07-03', ' '),
(42, 'rusma@angelfire.com', 'login', '2020-07-03', ' '),
(43, 'rusma@angelfire.com', 'login', '2020-07-03', ' '),
(44, 'sriayu843@gmail.com', 'login', '2020-07-03', ' '),
(45, 'rusma@angelfire.com', 'login', '2020-07-03', ' '),
(46, 'sriayu843@gmail.com', 'login', '2020-07-03', ' '),
(47, 'sriayu843@gmail.com', 'login', '2020-07-03', ' '),
(48, 'rusma@angelfire.com', 'login', '2020-07-06', ' '),
(49, 'sriayu843@gmail.com', 'login', '2020-07-06', ' '),
(50, 'rusma@angelfire.com', 'login', '2020-07-08', ' '),
(51, 'sriayu843@gmail.com', 'login', '2020-07-08', ' '),
(52, 'rusma@angelfire.com', 'login', '2020-07-08', ' '),
(53, 'rusma@angelfire.com', 'login', '2020-07-08', ' '),
(54, 'sriayu843@gmail.com', 'login', '2020-07-08', ' '),
(55, 'amranrskg@gmail.com', 'login', '2020-07-09', ' '),
(56, 'rusma@angelfire.com', 'login', '2020-07-09', ' '),
(57, 'rusma@angelfire.com', 'login', '2020-07-09', ' '),
(58, 'amranrskg@gmail.com', 'login', '2020-07-09', ' '),
(59, 'rusma@angelfire.com', 'login', '2020-07-10', ' '),
(60, 'sriayu843@gmail.com', 'login', '2020-07-10', ' '),
(61, 'rusma@angelfire.com', 'login', '2020-07-10', ' '),
(62, 'rusma@angelfire.com', 'login', '2020-07-10', ' '),
(63, 'sriayu843@gmail.com', 'login', '2020-07-10', ' '),
(64, 'rusma@angelfire.com', 'login', '2020-07-14', ' '),
(65, 'sriayu843@gmail.com', 'login', '2020-07-16', ' '),
(66, 'eurapermanarskg@gmail.com', 'login', '2020-07-16', ' '),
(67, 'sriayu843@gmail.com', 'login', '2020-07-21', ' '),
(68, 'amranrskg@gmail.com', 'login', '2020-07-22', ' '),
(69, 'adm.rskghabibie@gmail.com', 'login', '2020-07-22', ' '),
(70, 'adm.rskghabibie@gmail.com', 'login', '2020-07-22', ' '),
(71, 'adm.rskghabibie@gmail.com', 'login', '2020-07-22', ' '),
(72, 'adm.rskghabibie@gmail.com', 'login', '2020-07-22', ' '),
(73, 'adm.rskghabibie@gmail.com', 'login', '2020-07-22', ' '),
(74, 'adm.rskghabibie@gmail.com', 'login', '2020-07-22', ' '),
(75, 'adm.rskghabibie@gmail.com', 'login', '2020-07-22', ' '),
(76, 'sriayu843@gmail.com', 'login', '2020-07-22', ' '),
(77, 'sriayu843@gmail.com', 'login', '2020-07-23', ' '),
(78, 'sriayu843@gmail.com', 'login', '2020-07-23', ' '),
(79, 'adm.rskghabibie@gmail.com', 'login', '2020-07-23', ' '),
(80, 'sriayu843@gmail.com', 'login', '2020-07-24', ' '),
(81, 'adm.rskghabibie@gmail.com', 'login', '2020-07-24', ' '),
(82, 'sriayu843@gmail.com', 'login', '2020-07-28', ' '),
(83, 'adm.rskghabibie@gmail.com', 'login', '2020-07-28', ' '),
(84, 'adm.rskghabibie@gmail.com', 'login', '2020-07-29', ' '),
(85, 'adm.rskghabibie@gmail.com', 'login', '2020-07-29', ' '),
(86, 'sriayu843@gmail.com', 'login', '2020-07-29', ' '),
(87, 'sriayu843@gmail.com', 'login', '2020-07-29', ' '),
(88, 'adm.rskghabibie@gmail.com', 'login', '2020-07-30', ' '),
(89, 'adm.rskghabibie@gmail.com', 'login', '2020-07-31', ' '),
(90, 'adm.rskghabibie@gmail.com', 'login', '2020-07-31', ' '),
(91, 'herirobin21@gmail.com', 'login', '2020-08-01', ' '),
(92, 'adm.rskghabibie@gmail.com', 'login', '2020-08-01', ' '),
(93, 'adm.rskghabibie@gmail.com', 'login', '2020-08-01', ' '),
(94, 'sriayu843@gmail.com', 'login', '2020-08-01', ' '),
(95, 'adm.rskghabibie@gmail.com', 'login', '2020-08-01', ' '),
(96, 'sriayu843@gmail.com', 'login', '2020-08-01', ' '),
(97, 'adm.rskghabibie@gmail.com', 'login', '2020-08-01', ' '),
(98, 'adm.rskghabibie@gmail.com', 'login', '2020-08-01', ' '),
(99, 'sriayu843@gmail.com', 'login', '2020-08-01', ' '),
(100, 'sriayu843@gmail.com', 'login', '2020-08-01', ' '),
(101, 'adm.rskghabibie@gmail.com', 'login', '2020-08-02', ' '),
(102, 'sriayu843@gmail.com', 'login', '2020-08-02', ' '),
(103, 'adm.rskghabibie@gmail.com', 'login', '2020-08-02', ' '),
(104, 'sriayu843@gmail.com', 'login', '2020-08-02', ' '),
(105, 'sriayu843@gmail.com', 'login', '2020-08-02', ' '),
(106, 'sriayu843@gmail.com', 'login', '2020-08-02', ' '),
(107, 'sriayu843@gmail.com', 'login', '2020-08-02', ' '),
(108, 'sriayu843@gmail.com', 'login', '2020-08-02', ' '),
(109, 'sriayu843@gmail.com', 'login', '2020-08-03', ' '),
(110, 'adm.rskghabibie@gmail.com', 'login', '2020-08-03', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_notif`
--

CREATE TABLE `tb_notif` (
  `id_notif` int(11) NOT NULL,
  `username` varchar(225) DEFAULT NULL,
  `dokumen` varchar(225) DEFAULT NULL,
  `judul` varchar(225) DEFAULT NULL,
  `kode` varchar(225) NOT NULL,
  `date_notif` datetime DEFAULT NULL,
  `status` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_ppd`
--

CREATE TABLE `tb_ppd` (
  `id_peru` int(11) NOT NULL,
  `date_ppd` datetime DEFAULT NULL,
  `kode` varchar(225) NOT NULL,
  `pemohon` varchar(225) DEFAULT NULL,
  `bagian` varchar(225) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `pem_dokumen` varchar(225) DEFAULT NULL,
  `pem_judul` varchar(225) DEFAULT NULL,
  `pem_no_dok` varchar(225) DEFAULT NULL,
  `pem_tgl_berlaku` date DEFAULT NULL,
  `peru_dokumen` varchar(225) DEFAULT NULL,
  `peru_judul` varchar(225) DEFAULT NULL,
  `peru_no_dok` varchar(225) DEFAULT NULL,
  `peru_tgl_berlaku` date DEFAULT NULL,
  `peru_status_revisi` varchar(225) DEFAULT NULL,
  `peru_bagian_revisi` text,
  `peru_diubah_menjadi` text,
  `peru_alasan` text,
  `non_dokumen` varchar(225) DEFAULT NULL,
  `non_judul` varchar(225) DEFAULT NULL,
  `non_no_dok` varchar(225) DEFAULT NULL,
  `non_status_revisi` varchar(225) DEFAULT NULL,
  `non_tgl` date DEFAULT NULL,
  `non_alasan` text,
  `valiadasi` varchar(225) DEFAULT NULL,
  `alasan_admin` varchar(225) DEFAULT NULL,
  `upload_lam` varchar(225) DEFAULT NULL,
  `username` varchar(225) NOT NULL,
  `admin_dok` varchar(225) DEFAULT NULL,
  `verify` varchar(225) DEFAULT NULL,
  `date_verify` datetime DEFAULT NULL,
  `status_pengecekan` varchar(225) DEFAULT NULL,
  `dokumen` varchar(225) NOT NULL,
  `publish` varchar(225) DEFAULT NULL,
  `file_result` varchar(225) DEFAULT NULL,
  `hapus` varchar(225) DEFAULT NULL,
  `date_hapus` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_ppd_his`
--

CREATE TABLE `tb_ppd_his` (
  `id_his` int(11) NOT NULL,
  `his_id_peru` int(11) NOT NULL,
  `his_date_ppd` datetime DEFAULT NULL,
  `his_kode` varchar(225) NOT NULL,
  `his_pemohon` varchar(225) DEFAULT NULL,
  `his_bagian` varchar(225) DEFAULT NULL,
  `his_tanggal` date DEFAULT NULL,
  `his_pem_dokumen` varchar(225) DEFAULT NULL,
  `his_pem_judul` varchar(225) DEFAULT NULL,
  `his_pem_no_dok` varchar(225) DEFAULT NULL,
  `his_pem_tgl_berlaku` date DEFAULT NULL,
  `his_peru_dokumen` varchar(225) DEFAULT NULL,
  `his_peru_judul` varchar(225) DEFAULT NULL,
  `his_peru_no_dok` varchar(225) DEFAULT NULL,
  `his_peru_tgl_berlaku` date DEFAULT NULL,
  `his_peru_status_revisi` varchar(225) DEFAULT NULL,
  `his_peru_bagian_revisi` text,
  `his_peru_diubah_menjadi` text,
  `his_peru_alasan` text,
  `his_non_dokumen` varchar(225) DEFAULT NULL,
  `his_non_judul` varchar(225) DEFAULT NULL,
  `his_non_no_dok` varchar(225) DEFAULT NULL,
  `his_non_status_revisi` varchar(225) DEFAULT NULL,
  `his_non_tgl` date DEFAULT NULL,
  `his_non_alasan` text,
  `his_valiadasi` varchar(225) DEFAULT NULL,
  `his_alasan_admin` text,
  `his_upload_lam` varchar(225) DEFAULT NULL,
  `his_username` varchar(225) DEFAULT NULL,
  `his_admin_dok` varchar(225) DEFAULT NULL,
  `his_verify` varchar(225) DEFAULT NULL,
  `his_date_verify` datetime DEFAULT NULL,
  `his_status_pengecekan` varchar(225) DEFAULT NULL,
  `his_dokumen` varchar(225) DEFAULT NULL,
  `his_publish` varchar(225) DEFAULT NULL,
  `his_file_result` varchar(225) DEFAULT NULL,
  `his_hapus` varchar(225) DEFAULT NULL,
  `his_date_hapus` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_revisi`
--

CREATE TABLE `tb_revisi` (
  `id_revisi` int(11) NOT NULL,
  `id_peru` int(11) DEFAULT NULL,
  `date_revisi` datetime DEFAULT NULL,
  `keterangan` text,
  `oleh` varchar(225) DEFAULT NULL,
  `balasan` text,
  `file_revisi` varchar(225) DEFAULT NULL
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
  `alamat` text,
  `no_hp` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `date_user` date NOT NULL,
  `tgl_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `username`, `password`, `user_role`, `full_name`, `foto`, `jenis_kelamin`, `email`, `alamat`, `no_hp`, `jabatan`, `unit`, `date_user`, `tgl_lahir`) VALUES
(1, 'adm.rskghabibie@gmail.com', '123123', 'user', 'Adiministrator Akreditasi RSKG', 'rskg.png', 'L', 'adm.rskghabibie@gmail.com', 'Jl. Sekeloa, Kota Bandung', '-', 'IT', 'IT', '2020-07-22', '2020-07-22'),
(2, 'herirobin21@gmail.com', '21081990', 'user', 'Robin Heri Erawan', 'avatar.png', 'L', 'herirobin21@gmail.com', '-', '87738478374', '-', '-', '2020-07-13', '1990-08-21'),
(3, 'tata.sutiaman@gmail.com', '1011977', 'user', 'Tata Sutiaman', 'avatar.png', 'L', 'tata.sutiaman@gmail.com', 'Komplek Griya Winaya B 10 No. 20 Rt/Rw 03/12', '81320725211', '-', '-', '2020-07-13', '1977-01-01'),
(4, 'bellava.valentina@gmail.com', '14021993', 'user', 'Bella Valentina', 'avatar.png', 'P', 'bellava.valentina@gmail.com', 'Jl. Yupiter VII Blok E2 No. 51', '89664327236', '-', '-', '2020-07-13', '1993-02-14'),
(5, 'melita.hendriani@gmail.com', '29041978', 'user', 'Melita Hendriani', 'avatar.png', 'P', 'melita.hendriani@gmail.com', 'Jl. Terusan Dadali No. 68 RT 05/02 Kel. Maleber Kec. Andir Bandung', '8122068811', '-', '-', '2020-07-13', '1978-04-29'),
(6, 'elicpk7009@gmail.com', '9101970', 'user', 'Ely Rostina', 'avatar.png', 'P', 'elicpk7009@gmail.com', 'Graha Bukit Raya 3 C/8 No. 19 RT 006/025', '8122017862', '-', '-', '2020-07-13', '1970-10-09'),
(7, 'airenenugraha@gmail.com', '5051980', 'user', 'Irene Ranny Kristya N', 'avatar.png', 'P', 'airenenugraha@gmail.com', 'Jl. Babakan Sukaresik No. 28 RT 04/02', '8122379720', '-', '-', '2020-07-13', '1980-05-05'),
(8, 'nia_sylviani@yahoo.co.id', '4091977', 'user', 'Nia Sylviani', 'avatar.png', 'P', 'nia_sylviani@yahoo.co.id', 'Komp. Griya Bukit Mas Blok D2/3 Bojongkoneng', '81802122333', '-', '-', '2020-07-13', '1977-09-04'),
(9, 'yatnorskg@yahoo.com', '18091970', 'user', 'Yatno', 'avatar.png', 'L', 'yatnorskg@yahoo.com', 'Jl. Palem 1 No. 58 RT 002/013', '81321855509', '-', '-', '2020-07-13', '1970-09-18'),
(10, 'dewijuniarmi@gmail.com', '8061975', 'user', 'Juniarmi Dewi Damanik', 'avatar.png', 'P', 'dewijuniarmi@gmail.com', 'Graha Bukit Raya 3 Blok C1 No. 26 RT 012/025', '81395010636', '-', '-', '2020-07-13', '1975-06-08'),
(11, 'sylvianiesther54@gmail.com', '5041975', 'user', 'Esther Sylviani Sutedjo', 'avatar.png', 'P', 'sylvianiesther54@gmail.com', 'Jl. Pasirjaya IX No. 8 RT 004/006', '8122119871', '-', '-', '2020-07-13', '1975-04-05'),
(12, 'adeastrida@gmail.com', '11091988', 'user', 'Ade Astrida', 'avatar.png', 'P', 'adeastrida@gmail.com', 'Jl. Sari Asih No. 54', '81264677949', '-', '-', '2020-07-13', '1988-09-11'),
(13, 'nneni08@gmail.com', '19041978', 'user', 'Neni Nuraeni', 'avatar.png', 'P', 'nneni08@gmail.com', 'Komp. GPA Blok C/2 No. 27 RT 002/015', '81322714894', '-', '-', '2020-07-13', '1978-04-19'),
(14, 'rusmahidayati@gmail.com', '9121969', 'user', 'Noor Rusma Hidayati', 'avatar.png', 'P', 'rusmahidayati@gmail.com', 'Jl. Situ Ciburuy No. 19 RT 01/03', '8122424330', '-', '-', '2020-07-13', '1969-12-09'),
(15, 'safasigit@gmail.com', '17121987', 'user', 'Maghfilda Aulia Shaffata', 'avatar.png', 'P', 'safasigit@gmail.com', 'Jl. Pasirluyu VI No. 15 RT 03/08', '82116380353', '-', '-', '2020-07-13', '1987-12-17'),
(16, 'nandhio08@gmail.com', '30051991', 'user', 'Nandya Meitadani', 'avatar.png', 'P', 'nandhio08@gmail.com', 'Jl. Gatot Subroto No. H.99 RT 003/011', '81214007138', '-', '-', '2020-07-13', '1991-05-30'),
(17, 'elda_arini@hotmail.com', '1051989', 'user', 'Elda Arini Hartono', 'avatar.png', 'P', 'elda_arini@hotmail.com', 'Komp. PPR ITB No. G.12 RT 002/007', '87823964980', '-', '-', '2020-07-13', '1989-05-01'),
(18, 'prabandaratih@yahoo.com', '22091991', 'user', 'Ratih Prabandari', 'avatar.png', 'P', 'prabandaratih@yahoo.com', 'Jl. Villa Asri Raya B16 RT 02/10 Komp. Bumi Asri 3', '81394904492', '-', '-', '2020-07-13', '1991-09-22'),
(19, 'rany.ramadhani@yahoo.co.id', '28031992', 'user', 'Rany Ramadhan Kusuma Sejati', 'avatar.png', 'P', 'rany.ramadhani@yahoo.co.id', 'Jl. Blk Cikutra Barat No. 27 RT 02/05', '8112342803', '-', '-', '2020-07-13', '1992-03-28'),
(20, 'yovanrivanzah@yahoo.com', '21121993', 'user', 'Yovan Rivanzah', 'avatar.png', 'L', 'yovanrivanzah@yahoo.com', 'Jl. Babakan Hantap No. 27 RT 01/09', '81224923222', '-', '-', '2020-07-13', '1993-12-21'),
(21, 'dhiar780@gmail.com', '1041993', 'user', 'Dhia Ramadhani', 'avatar.png', 'P', 'dhiar780@gmail.com', 'Jl. Rereng Manis No. 12 RT 08/11', '85220882117', '-', '-', '2020-07-13', '1993-04-01'),
(22, 'nurinviony@yahoo.com', '17031994', 'user', 'Szzanurindah Viony Dewi', 'avatar.png', 'P', 'nurinviony@yahoo.com', 'Jl. Mars IX No. 5', '82117000033', '-', '-', '2020-07-13', '1994-03-17'),
(23, 'rara.ardianti@gmail.com', '9021993', 'user', 'RR. Ardianti Rachma Wardhani', 'avatar.png', 'P', 'rara.ardianti@gmail.com', 'Jl. Cigadung Raya Barat No. 34', '8118081686', '-', '-', '2020-07-13', '1993-02-09'),
(24, 'ratihyonarita@gmail.com', '10061992', 'user', 'Ratih Yonarita Nasution', 'avatar.png', 'P', 'ratihyonarita@gmail.com', 'Jl. Sariasih Blok G No. 35 Gg. I RT 07/03', '81320207762', '-', '-', '2020-07-13', '1992-06-10'),
(25, 'mhd.ridho.ap@gmail.com', '14111992', 'user', 'M. Ridho Kurnianda Adi Putra', 'avatar.png', 'L', 'mhd.ridho.ap@gmail.com', 'Komp. Cibiru Town House No. 2 Jl. Pandan Wangi RT 07/19', '85314750554', '-', '-', '2020-07-13', '1992-11-14'),
(26, 'verdian.anwari@gmail.com', '15011995', 'user', 'Vera Dianwari', 'avatar.png', 'P', 'verdian.anwari@gmail.com', 'Kp. Sekemirung No. 04 RT 006/009', '82126107829', '-', '-', '2020-07-13', '1995-01-15'),
(27, 'yulia76ps@gmail.com', '10111976', 'user', 'R. Yulia Puspitasari', 'avatar.png', 'P', 'yulia76ps@gmail.com', 'Jl. Panorama II No. 24', '81382263089', '-', '-', '2020-07-13', '1976-11-10'),
(28, 'otoyhidayat@gmail.com', '30041991', 'user', 'Otoy Hidayat', 'avatar.png', 'L', 'otoyhidayat@gmail.com', 'Kp. Cangkuang RT 24/06', '85722801012', '-', '-', '2020-07-13', '1991-04-30'),
(29, 'fitrianimubarok8785@gmail.com', '16021995', 'user', 'Fitriani', 'avatar.png', 'P', 'fitrianimubarok8785@gmail.com', 'Dusun Puhun RT 14/04 Desa Sindangbarang', '85220055769', '-', '-', '2020-07-13', '1995-02-16'),
(30, 'Nkhoerunniswah@gmail.com', '14091996', 'user', 'Nur Sifa Khoerunniswah', 'avatar.png', 'P', 'Nkhoerunniswah@gmail.com', 'Kp. Haurwangi RT 03/02', '85320255929', '-', '-', '2020-07-13', '1996-09-14'),
(31, 'siska.6564@yahoo.com', '6051964', 'user', 'Fransiska Sriwatini', 'avatar.png', 'P', 'siska.6564@yahoo.com', 'Jl. Karawang Dalam No. 27 RT 007/008', '8122115866', '-', '-', '2020-07-13', '1964-05-06'),
(32, '-', '21021978', 'user', 'Nelys Mustika Nurul Aeni', 'avatar.png', 'P', '-', 'Cibarengkok No. 22A RT 001/007', '85703113304', '-', '-', '2020-07-13', '1978-02-21'),
(33, 'sukamtohp74@gmail.com', '11031974', 'user', 'Sukamto Hadi Prayitno', 'avatar.png', 'L', 'sukamtohp74@gmail.com', 'Cibarengkok No. 22A RT 001/007', '83829708615', '-', '-', '2020-07-13', '1974-03-11'),
(34, '-', '4011977', 'user', 'Slamet Riyadi', 'avatar.png', 'L', '-', 'Graha Bukit Raya 3 C/1 No. 33 RT 012/025', '81321512371', '-', '-', '2020-07-13', '1977-01-04'),
(35, '-', '28071967', 'user', 'Enung Nurhasanah', 'avatar.png', 'P', '-', 'Gg. H. Idrus No. 130/88 RT 006/001', '022-642202', '-', '-', '2020-07-13', '1967-07-28'),
(36, 'idasusantipurba79@gmail.com', '8081979', 'user', 'Ida Susanti Purba', 'avatar.png', 'P', 'idasusantipurba79@gmail.com', 'Komp. Bumi Hanjuang Blok J No. 4', '022-6646525', '-', '-', '2020-07-13', '1979-08-08'),
(37, 'moelyantz81@gmail.com', '30071981', 'user', 'Mulyanto', 'avatar.png', 'L', 'moelyantz81@gmail.com', 'Komp. Grand Ujung Berung Residence A/31 RT 003/004', '8156198613', '-', '-', '2020-07-13', '1981-07-30'),
(38, '-', '11101987', 'user', 'Imas Siti Aisyah', 'avatar.png', 'P', '-', 'Komp. Griya Winaya B/10 No. 2 RT 003/012', '85221502879', '-', '-', '2020-07-13', '1987-10-11'),
(39, '-', '17041987', 'user', 'Ina Susilowati', 'avatar.png', 'P', '-', 'Jl. Cimuncang No. 154 RT 06/12', '8522173696', '-', '-', '2020-07-13', '1987-04-17'),
(40, '-', '9111981', 'user', 'Nur Fathonah Hasanah', 'avatar.png', 'P', '-', 'Jl. Bangbayang No. 72/157 C RT 03/08', '81395122750', '-', '-', '2020-07-13', '1981-11-09'),
(41, 'chaira.syahida86@gmail.com', '23121986', 'user', 'Chaira Syahida', 'avatar.png', 'P', 'chaira.syahida86@gmail.com', 'Jl. Palem 1 No. 58 RT 002/013', '81370435568', '-', '-', '2020-07-13', '1986-12-23'),
(42, '-', '22101988', 'user', 'Yunanengsih', 'avatar.png', 'P', '-', 'Jl. Cicukang Kidul RT 01/09', '81320012605', '-', '-', '2020-07-13', '1988-10-22'),
(43, '-', '3061988', 'user', 'Dadang Hermawan', 'avatar.png', 'L', '-', 'Jl. Tubagus Ismail No. 39A RT 002/011', '85295878747', '-', '-', '2020-07-13', '1988-06-03'),
(44, 'sifaneliti90@yahoo.com', '2071990', 'user', 'Siti Ariffah Nelia Wartini', 'avatar.png', 'P', 'sifaneliti90@yahoo.com', 'Kp. Ciburuy Rt 04/18', '85793266628', '-', '-', '2020-07-13', '1990-07-02'),
(45, 'ude.a.suhendar@gmail.com', '7121989', 'user', 'Asep Suhendar', 'avatar.png', 'L', 'ude.a.suhendar@gmail.com', 'Kp. Bbk Nenggeng RT 007/004', '81802191040', '-', '-', '2020-07-13', '1989-12-07'),
(46, '-', '24031990', 'user', 'Neni Nuryani', 'avatar.png', 'P', '-', 'Jl. Sukajadi Gg. Marjaban No. 39 RT 06/04', '85222205079', '-', '-', '2020-07-13', '1990-03-24'),
(47, 'regina.mariyam@gmail.com', '1041989', 'user', 'Regina Mariyam', 'avatar.png', 'P', 'regina.mariyam@gmail.com', 'Jl. Pasirleutik D Bamboo Regency Kav 12 RT 002/009', '87724578728', '-', '-', '2020-07-13', '1989-04-01'),
(48, 'priyantinovi@ymail.com', '28111990', 'user', 'Novi Priyanti', 'avatar.png', 'P', 'priyantinovi@ymail.com', 'Jl. Raya Cibeureum Blok Citopeng VII No. 346 RT 06/22', '85659631623', '-', '-', '2020-07-13', '1990-11-28'),
(49, '-', '30081990', 'user', 'Rita Sapita', 'avatar.png', 'P', '-', 'Dsn. Bakan Bandung RT 04/03 Desa Ranjeg', '85220766100', '-', '-', '2020-07-13', '1990-08-30'),
(50, '-', '21081990', 'user', 'Erlin Karlina Dewi', 'avatar.png', 'P', '-', 'Kp. Neglasari RT 002/003', '89656425969', '-', '-', '2020-07-13', '1990-08-21'),
(51, 'liuraianastazia@yahoo.com', '25071989', 'user', 'Liurai Anastazia Sitinjak', 'avatar.png', 'P', 'liuraianastazia@yahoo.com', 'Jl. Cibarengkok 635/182A RT 006/005', '85721432529', '-', '-', '2020-07-13', '1989-07-25'),
(52, 'salisya@yahoo.com', '28111989', 'user', 'R. Sara Nur Alisya Islami', 'avatar.png', 'P', 'salisya@yahoo.com', 'Jl. Muararajeun PLN No. 11 RT 001/011', '8562183873', '-', '-', '2020-07-13', '1989-11-28'),
(53, 'mulyaniashari31@yahoo.co.id', '9091990', 'user', 'Mulyani Ashari', 'avatar.png', 'P', 'mulyaniashari31@yahoo.co.id', 'Kp. Leuweung Kaleng RT 02/02', '85320575242', '-', '-', '2020-07-13', '1990-09-09'),
(54, '-', '20111990', 'user', 'Cepi Supiadi', 'avatar.png', 'L', '-', 'Kp. Solokan Jeruk RT 001/002', '87722650315', '-', '-', '2020-07-13', '1990-11-20'),
(55, 'masturohsiti88@yahoo.co.id', '9121991', 'user', 'Siti Masturoh', 'avatar.png', 'P', 'masturohsiti88@yahoo.co.id', 'Jl. Gatot Subroto No. 134 RT 001/008', '85221350668', '-', '-', '2020-07-13', '1991-12-09'),
(56, '-', '4091993', 'user', 'Winda Trisnawati', 'avatar.png', 'P', '-', 'Dusun Baturumpil RT 03/08 Desa Cisempur', '85320149203', '-', '-', '2020-07-13', '1993-09-04'),
(57, 'febriawulandhani1994@gmail.com', '15021994', 'user', 'Febria Wulandhani', 'avatar.png', 'P', 'febriawulandhani1994@gmail.com', 'Kp. Jl. Ciputer RT 02/02', '81382915941', '-', '-', '2020-07-13', '1994-02-15'),
(58, 'rina.1005@gmail.com', '10051995', 'user', 'Rina Mariana', 'avatar.png', 'P', 'rina.1005@gmail.com', 'Jl. Stasion KA Gg. Masjid RT 04/06', '89630730663', '-', '-', '2020-07-13', '1995-05-10'),
(59, 'ssheee@gmail.com', '22011994', 'user', 'Susi Ernawati', 'avatar.png', 'P', 'ssheee@gmail.com', 'Kp. Babakan Cijaha Ds. Cisangkel', '82218643138', '-', '-', '2020-07-13', '1994-01-22'),
(60, 'hamdan_pasta@yahoo.co.id', '15101994', 'user', 'Hamdan', 'avatar.png', 'L', 'hamdan_pasta@yahoo.co.id', 'Kp. Sayang Heulang RT 04/05', '82197390204', '-', '-', '2020-07-13', '1994-10-15'),
(61, 'shintiasugihar@gmail.com', '7111995', 'user', 'Shintia Sugiharti', 'avatar.png', 'P', 'shintiasugihar@gmail.com', 'Kp. Haurngombong RT 02/09 Ds. Jagabaya', '85603112301', '-', '-', '2020-07-13', '1995-11-07'),
(62, 'rizkiindaha@gmail.com', '21111995', 'user', 'Rizki Indah Amalia', 'avatar.png', 'P', 'rizkiindaha@gmail.com', 'Ds. Kertawinangun Blok Kebon II RT 05/02', '85659128929', '-', '-', '2020-07-13', '1995-11-21'),
(63, 'akbarmohamadfalah@yahoo.co.id', '30111994', 'user', 'M. Falah Akbar', 'avatar.png', 'L', 'akbarmohamadfalah@yahoo.co.id', 'Komp. Permata Biru Blok AD 43 RT 01/24', '85659204053', '-', '-', '2020-07-13', '1994-11-30'),
(64, 'nnuraprilyanti@gmail.com', '14041995', 'user', 'Nina Nuraprilyanti', 'avatar.png', 'P', 'nnuraprilyanti@gmail.com', 'Kp. Desa Ciluncat RT 03/01', '85720066700', '-', '-', '2020-07-13', '1995-04-14'),
(65, 'mpuuspita@gmail.com', '29121995', 'user', 'Puspita Restu Utami', 'avatar.png', 'P', 'mpuuspita@gmail.com', 'Jl. Jurang No. 623/181 RT 006/005', '85720309129', '-', '-', '2020-07-13', '1995-12-29'),
(66, 'sitinurani.aprilianti@yahoo.co.id', '11041995', 'user', 'Siti Nurani Aprilianti', 'avatar.png', 'P', 'sitinurani.aprilianti@yahoo.co.id', 'Kp. Cibanteng RT 02/18 Ds. Gununghalu', '81313112378', '-', '-', '2020-07-13', '1995-04-11'),
(67, 'dwiw017@gmail.com', '1031996', 'user', 'Dwi Martina Widya Pangestika', 'avatar.png', 'P', 'dwiw017@gmail.com', 'Kp. Kamarung Utara RT 30/08 Desa Kamarung', '85295355796', '-', '-', '2020-07-13', '1996-03-01'),
(68, 'geafauziah90@gmail.com', '2081990', 'user', 'Ghea Fauziah Adam', 'avatar.png', 'P', 'geafauziah90@gmail.com', 'Kp. Sukagalih 04/02 Desa Sirnabakti', '85320030304', '-', '-', '2020-07-13', '1990-08-02'),
(69, 'fiqoh_arini95@yahoo.co.id', '4091995', 'user', 'Fiqoh Arini', 'avatar.png', 'P', 'fiqoh_arini95@yahoo.co.id', 'Sukagalih RT 05/06', '81312827234', '-', '-', '2020-07-13', '1995-09-04'),
(70, 'mnurani16@gmail.com', '8011994', 'user', 'Mega Nurani', 'avatar.png', 'P', 'mnurani16@gmail.com', 'Kp. Pangkalan RT 01/11 Desa Sariwangi', '81320077168', '-', '-', '2020-07-13', '1994-01-08'),
(71, 'reginaselviawati14@gmail.com', '14091995', 'user', 'Regina Selviawati Diani Putri', 'avatar.png', 'P', 'reginaselviawati14@gmail.com', 'Jl. Akasia V No. 28A RT 03/09 Perum Taman Bukit Lagadar', '82127882346', '-', '-', '2020-07-13', '1995-09-14'),
(72, 'shamfauzi001@gmail.com', '2051995', 'user', 'Sham Mahesa Fauzi', 'avatar.png', 'L', 'shamfauzi001@gmail.com', 'Jl. Veteran Linguar Selatan Cianjur Kp. Gunung Jati RT 01/01 Desa Rahong', '81221221016', '-', '-', '2020-07-13', '1995-05-02'),
(73, 'novieyulianidhea@gmail.com', '2071995', 'user', 'Dhea Novie Yuliani', 'avatar.png', 'P', 'novieyulianidhea@gmail.com', 'Komp. Tanimulya Jl. Bonsai No. 13 RT 06/15', '82117674178', '-', '-', '2020-07-13', '1995-07-02'),
(74, 'noermuharam@gmail.com', '3081991', 'user', 'Wildan Nur Muharram', 'avatar.png', 'L', 'noermuharam@gmail.com', 'Jl. Tambaksari RT 04/01', '85393409314', '-', '-', '2020-07-13', '1991-08-03'),
(75, 'raigor.stone33@gmail.com', '3031993', 'user', 'Doni Gilang Ramadhan', 'avatar.png', 'L', 'raigor.stone33@gmail.com', 'Gg. Haji Yasin VI No. 183 RT 04/02', '82116783834', '-', '-', '2020-07-13', '1993-03-03'),
(76, 'junianirvan8@gmail.com', '5071995', 'user', 'Irvan Yuliana', 'avatar.png', 'L', 'junianirvan8@gmail.com', 'Jl. Sadang Sari No. 49', '82119235027', '-', '-', '2020-07-13', '1995-07-05'),
(77, 'yayangsgilang@gmail.com', '17011995', 'user', 'Yayang Siti Gilang', 'avatar.png', 'P', 'yayangsgilang@gmail.com', 'Kp. Cisasawi RT 02/05 Desa Cihanjuang', '82110154445', '-', '-', '2020-07-13', '1995-01-17'),
(78, 'trosidah5@gmail.com', '14121994', 'user', 'Tuti Rosidah', 'avatar.png', 'P', 'trosidah5@gmail.com', 'Kp. Rontog RT 002/011 Desa Sukahaji', '82214309590', '-', '-', '2020-07-13', '1994-12-14'),
(79, 'agungpurnamaazi05@gmail.com', '5051995', 'user', 'Agung Purnama Azi', 'avatar.png', 'L', 'agungpurnamaazi05@gmail.com', 'Kp. Citiis RT 01/13 Desa Batulayang', '83817461995', '-', '-', '2020-07-13', '1995-05-05'),
(80, 'nendigusmawan@gmail.com', '5021995', 'user', 'Nendi Gusmawan', 'avatar.png', 'L', 'nendigusmawan@gmail.com', 'Jl. Cihanjuang Rahayu Kp. Mokla RT 01/13', '87823690089', '-', '-', '2020-07-13', '1995-02-05'),
(81, 'saputraniki13@gmail.com', '22061995', 'user', 'Niki Pusakawati Saputra', 'avatar.png', 'P', 'saputraniki13@gmail.com', 'Kp. Cipasung RT 003/004', '82218108295', '-', '-', '2020-07-13', '1995-06-22'),
(82, 'mirnafrilanie@gmail.com', '25031994', 'user', 'Mirna Frilanie', 'avatar.png', 'P', 'mirnafrilanie@gmail.com', 'Kp. Sekip RT 01/08 No. 29', '85855380936', '-', '-', '2020-07-13', '1994-03-25'),
(83, 'kikianggarini@yahoo.com', '19081990', 'user', 'Kiki Angga Rini', 'avatar.png', 'P', 'kikianggarini@yahoo.com', 'Kp. Pasir Garut Rt 02/09', '81809790134', '-', '-', '2020-07-13', '1990-08-19'),
(84, '-', '19111988', 'user', 'Wida Susanti', 'avatar.png', 'P', '-', 'Jl. Cimuncang RT 05/11', '87825545320', '-', '-', '2020-07-13', '1988-11-19'),
(85, 'mayafirmansyah27@yahoo.com', '23121991', 'user', 'Maya Firmansyah', 'avatar.png', 'P', 'mayafirmansyah27@yahoo.com', 'Karasak RT 04/02', '85222735155', '-', '-', '2020-07-13', '1991-12-23'),
(86, '-', '1071989', 'user', 'Adam Cindy Ekapriatna', 'avatar.png', 'L', '-', 'Kp. Bongkor RT 04/03', '85795345527', '-', '-', '2020-07-13', '1989-07-01'),
(87, 'ajisantosa011@gmail.com', '16061992', 'user', 'Wahyu Aji Santosa', 'avatar.png', 'L', 'ajisantosa011@gmail.com', 'Jl. Sindangsari RT 05/04 No. 160', '8987131988', '-', '-', '2020-07-13', '1992-06-16'),
(88, 'riankurniawan216@gmail.com', '5071991', 'user', 'Rian Kurniawan Juliansyah', 'avatar.png', 'L', 'riankurniawan216@gmail.com', 'Jl. Kebonkol No. 06A RT 02/03', '85295095216', '-', '-', '2020-07-13', '1991-07-05'),
(89, 'maulindautami@ymail.com', '9091992', 'user', 'Maulinda Utami', 'avatar.png', 'P', 'maulindautami@ymail.com', 'Pakar Barat RT 03/07', '85720033249', '-', '-', '2020-07-13', '1992-09-09'),
(90, '-', '13121991', 'user', 'Nur Ratna Wulandari', 'avatar.png', 'P', '-', 'Kp. Kancah RT 03/14', '85624372804', '-', '-', '2020-07-13', '1991-12-13'),
(91, 'rezatrisnanaziz@gmail.com', '8031993', 'user', 'Reza Trisnan Aziz', 'avatar.png', 'L', 'rezatrisnanaziz@gmail.com', 'Jl. Kebon Seureuh No. 30 RT 03/04', '82295301855', '-', '-', '2020-07-13', '1993-03-08'),
(92, 'canciyus10@gmail.com', '29101995', 'user', 'Canci Yuslinih', 'avatar.png', 'P', 'canciyus10@gmail.com', 'Ds. Juntikrebon RT 02/04', '82316029553', '-', '-', '2020-07-13', '1995-10-29'),
(93, 'dachie_28hikari@yahoo.com', '28021992', 'user', 'Pevi Febriyanti', 'avatar.png', 'P', 'dachie_28hikari@yahoo.com', 'Kp. Cikancung Hilir RT 01/08 Desa Cikancung', '81220340605', '-', '-', '2020-07-13', '1992-02-28'),
(94, 'rinafujianti67@gmail.com', '3031993', 'user', 'Rina Fujianti', 'avatar.png', 'P', 'rinafujianti67@gmail.com', 'Kp. Cibereum RT 01/08 Desa Citalem', '87824534999', '-', '-', '2020-07-13', '1993-03-03'),
(95, '-', '31051979', 'user', 'Imas Wuri Wulandari', 'avatar.png', 'P', '-', 'Griya Pasir Honje No. 10 RT 07/02', '8122129837', '-', '-', '2020-07-13', '1979-05-31'),
(96, 'arifalvian2@gmail.com', '4031995', 'user', 'Arif Alvian', 'avatar.png', 'L', 'arifalvian2@gmail.com', 'Puri Mulya Blok B-8 No. 1', '89603818555', '-', '-', '2020-07-13', '1995-03-04'),
(97, 'roni.dzaa@gmail.com', '18111985', 'user', 'Saroni', 'avatar.png', 'L', 'roni.dzaa@gmail.com', 'Blok Dangdeur RT 006/012', '85224345355', '-', '-', '2020-07-13', '1985-11-18'),
(98, 'desyardiansyah@gmail.com', '29121992', 'user', 'Desy Maesaroh', 'avatar.png', 'P', 'desyardiansyah@gmail.com', 'Jajawan Timur RT 002/018', '89655116337', '-', '-', '2020-07-13', '1992-12-29'),
(99, 'aprilianurhayati232@gmail.com', '18041994', 'user', 'Aprilia Nur Hayati', 'avatar.png', 'P', 'aprilianurhayati232@gmail.com', 'Jl. Cibogo No. 24 RT 02/03', '85717282290', '-', '-', '2020-07-13', '1994-04-18'),
(100, 'adeliapputri81@gmail.com', '22101995', 'user', 'Adelia Putri Herdiana', 'avatar.png', 'P', 'adeliapputri81@gmail.com', 'Jl. Gradiul No. 115 RT 06/09', '81225661627', '-', '-', '2020-07-13', '1995-10-22'),
(101, 'irmalanovi@gmail.com', '7111995', 'user', 'Novi Irmala', 'avatar.png', 'P', 'irmalanovi@gmail.com', 'Komp. Golf Residence A15 Arcamanik', '85320188218', '-', '-', '2020-07-13', '1995-11-07'),
(102, '-', '14071992', 'user', 'Widi Alfiansyah', 'avatar.png', 'L', '-', 'Kp. Ciroyom RT 02/02 Desa Mekar Wangi', '89601998368', '-', '-', '2020-07-13', '1992-07-14'),
(103, 'faizalmoch01@gmail.com', '7041993', 'user', 'Moch. Faizal Widyasani', 'avatar.png', 'L', 'faizalmoch01@gmail.com', 'Kp. Manisi Jl. Geusan Ulun RT 01/04', '81223118819', '-', '-', '2020-07-13', '1993-04-07'),
(104, 'dennyrksw@yahoo.com', '26041994', 'user', 'Denny Rakasiwi', 'avatar.png', 'L', 'dennyrksw@yahoo.com', 'Jl. Garuda No. 6 RT 01/02', '85722330203', '-', '-', '2020-07-13', '1994-04-26'),
(105, '-', '11061992', 'user', 'Mahmud Muharam', 'avatar.png', 'L', '-', 'Kp. Sukawangi RT 001/009', '81321718998', '-', '-', '2020-07-13', '1992-06-11'),
(106, 'chikka.chandra@yahoo.com', '27101991', 'user', 'Chikka Chandra Hadiana', 'avatar.png', 'P', 'chikka.chandra@yahoo.com', 'Jl. A. Yani Gg. Tanjung No. 953 RT 04/09', '82218594074', '-', '-', '2020-07-13', '1991-10-27'),
(107, 'sheilalutfiana95@gmail.com', '7051995', 'user', 'Sheila Lutfiana Yahya', 'avatar.png', 'P', 'sheilalutfiana95@gmail.com', 'Sadang RT 06/03', '82315024306', '-', '-', '2020-07-13', '1995-05-07'),
(108, 'randy.triady@gmail.com', '19101996', 'user', 'Randy Triady', 'avatar.png', 'L', 'randy.triady@gmail.com', 'Dsn. Nusa Indah RT 01/08 Desa Girimukti', '82114449202', '-', '-', '2020-07-13', '1996-10-19'),
(109, 'lanabeha@gmail.com', '2041993', 'user', 'Lana Belinda Harmawan', 'avatar.png', 'P', 'lanabeha@gmail.com', 'Perum Griya Permata Alam Blok HM 21 RT 007/011', '8986367971', '-', '-', '2020-07-13', '1993-04-02'),
(110, '-', '5121995', 'user', 'Desri Fauzia Khoerunisa', 'avatar.png', 'P', '-', 'Jl. Melong Raya Cijerah 2 Blok 2 Gg. Setra Asih No. 52 RT 05/31', '85315066769', '-', '-', '2020-07-13', '1995-12-05'),
(111, 'rafdyraissa@gmail.com', '6061993', 'user', 'Rafdy Muhammad Raissa', 'avatar.png', 'L', 'rafdyraissa@gmail.com', 'Perum Taman Asri Blok B 17 No. 7 RT 05/14', '85721111619', '-', '-', '2020-07-13', '1993-06-06'),
(112, 'rosianarina988@gmail.com', '19031993', 'user', 'Rina Rosiana', 'avatar.png', 'P', 'rosianarina988@gmail.com', 'Kp. Bongas RT 04/03 Desa Bongas', '81809570095', '-', '-', '2020-07-13', '1993-03-19'),
(113, 'robin.heri@gmail.com', '21081990', 'user', 'Robin Heri Erawan', 'avatar.png', 'L', 'robin.heri@gmail.com', 'Cirateun RT 01/02', '87824506021', '-', '-', '2020-07-13', '1990-08-21'),
(114, 'nursetum6@gmail.com', '29121995', 'user', 'Nurhasanah', 'avatar.png', 'P', 'nursetum6@gmail.com', 'Kp. Babakan Jati RT 03/01 Desa Padamukti', '82320356606', '-', '-', '2020-07-13', '1995-12-29'),
(115, 'fsiti4898@gmail.com', '6051994', 'user', 'Siti Fatimah', 'avatar.png', 'P', 'fsiti4898@gmail.com', 'Dsn. Mandala Herang RT 01/02 Ds. Mandala Herang', '83816703705', '-', '-', '2020-07-13', '1994-05-06'),
(116, 'ardizoldyck@gmail.com', '27061992', 'user', 'Ardian Wicaksono', 'avatar.png', 'L', 'ardizoldyck@gmail.com', 'Dsn. Baon Suruhan Desa Kedungsari RT 03/04', '81290267818', '-', '-', '2020-07-13', '1992-06-27'),
(117, '-', '14021991', 'user', 'Ineu Rahmawati', 'avatar.png', 'P', '-', 'Kp. Cikondang RT 09/02', '87821266782', '-', '-', '2020-07-13', '1991-02-14'),
(118, 'armanusaaditian@gmail.com', '28041993', 'user', 'Armanusa Aditian', 'avatar.png', 'L', 'armanusaaditian@gmail.com', 'Jl. Maleber Barat RT 01/03', '85368136336', '-', '-', '2020-07-13', '1993-04-28'),
(119, '-', '15051979', 'user', 'Tantri Herdiyani', 'avatar.png', 'P', '-', 'Jl. Jatiwangi 12 No. 6', '8.96E+11', '-', '-', '2020-07-13', '1979-05-15'),
(120, 'ellanurlaila31@gmail.com', '31011978', 'user', 'Ella Nurlaila', 'avatar.png', 'P', 'ellanurlaila31@gmail.com', 'Jl. Kebon Jeruk 263 RT 03/20', '85220060055', '-', '-', '2020-07-13', '1978-01-31'),
(121, 'ulfashafira.azmy96@gmail.com', '4101996', 'user', 'Ulfa Shafira Azmy', 'avatar.png', 'P', 'ulfashafira.azmy96@gmail.com', 'Kp. Kancil No. 05 RT 02/02 Ds. Gunung Leutik', '81931342906', '-', '-', '2020-07-13', '1996-10-04'),
(122, 'sucialestari16@gmail.com', '16021994', 'user', 'Sucia Lestari', 'avatar.png', 'P', 'sucialestari16@gmail.com', 'Jl. Karang Sari No. 235 RT 06/01', '82217511821', '-', '-', '2020-07-13', '1994-02-16'),
(123, '-', '30111968', 'user', 'Dedeh Komariah', 'avatar.png', 'P', '-', 'Kp. Patrol RT 01/01', '81221293565', '-', '-', '2020-07-13', '1968-11-30'),
(124, '-', '29031985', 'user', 'Purwanti', 'avatar.png', 'P', '-', 'Babakan Jati RT 06/08', '89618505501', '-', '-', '2020-07-13', '1985-03-29'),
(125, 'aihawaliah56@gmail.com', '3031996', 'user', 'Ai Hawaliah', 'avatar.png', 'P', 'aihawaliah56@gmail.com', 'Kp. Ciseel RT 01/05 Ds. Lingkung Pasir', '82217953762', '-', '-', '2020-07-13', '1996-03-03'),
(126, '-', '27061999', 'user', 'Mely Ayu Nurdian', 'avatar.png', 'P', '-', 'Sukasari II RT 06/02', '82316090706', '-', '-', '2020-07-13', '1999-06-27'),
(127, 'detunki@gmail.com', '5012001', 'user', 'Jasmine Khoeratun Ikhsan', 'avatar.png', 'P', 'detunki@gmail.com', 'Jl. Cicendo Gg. Cicendo No. 2/5B RT 03/02', '89666438306', '-', '-', '2020-07-13', '2001-01-05'),
(128, 'heninurjanah84@gmail.com', '12061984', 'user', 'Heni SIti Nurjanah', 'avatar.png', 'P', 'heninurjanah84@gmail.com', 'Komp. Griya Winaya Blok B3 No. 3 RT 05/14', '81221945315', '-', '-', '2020-07-13', '1984-06-12'),
(129, '-', '6041980', 'user', 'Tita Hertati', 'avatar.png', 'P', '-', 'Jl. Tubagus Ismail No. 50/15 RT 02/11', '81322111580', '-', '-', '2020-07-13', '1980-04-06'),
(130, '-', '1021972', 'user', 'Suhartono', 'avatar.png', 'L', '-', 'Kp. Cicarita No. 3 04/19', '82128449077', '-', '-', '2020-07-13', '1972-02-01'),
(131, '-', '8021991', 'user', 'Rini Lasmini', 'avatar.png', 'P', '-', 'Jl. Ciheulang No. 53 RT 04/11', '89671149953', '-', '-', '2020-07-13', '1991-02-08'),
(132, 'saa_tralala@yahoo.com', '15071991', 'user', 'Fasa Astari Gerisa', 'avatar.png', 'P', 'saa_tralala@yahoo.com', 'Jl. Cigadung Raya Timur No. A 84 RT 01/10', '81220797181', '-', '-', '2020-07-13', '1991-07-15'),
(133, '-', '22051985', 'user', 'Zenal Mutaqin', 'avatar.png', 'L', '-', 'Jl. Tubagus Ismail RT 001/012', '85721151687', '-', '-', '2020-07-13', '1985-05-22'),
(134, 'jiryanto@gmail.com', '16091989', 'user', 'Jonatha Iryanto', 'avatar.png', 'L', 'jiryanto@gmail.com', 'Komp. Paledang Indah R 11 RT 07/11', '81573747636', '-', '-', '2020-07-13', '1989-09-16'),
(135, 'annsaprillia@gmail.com', '10041997', 'user', 'Annisa Aprilia S', 'avatar.png', 'P', 'annsaprillia@gmail.com', 'Jl. Ciheulang No. 3 RT 03/11', '89601428565', '-', '-', '2020-07-13', '1997-04-10'),
(136, 'hardiantylaura@gmail.com', '3091993', 'user', 'Laura Hardianty Pandiangan', 'avatar.png', 'P', 'hardiantylaura@gmail.com', 'Jl. Tubagus Ismail Dalam No. 31', '82386291668', '-', '-', '2020-07-13', '1993-09-03'),
(137, 'wicaksanaadiputra51@gmail.com', '12111994', 'user', 'Wicaksana Adiputra', 'avatar.png', 'L', 'wicaksanaadiputra51@gmail.com', 'Kp. Bongkor RT 04/03', '82116305538', '-', '-', '2020-07-13', '1994-11-12'),
(138, 'irfanerhan9@gmail.com', '24101995', 'user', 'Irfan Erhan Firmansyah', 'avatar.png', 'L', 'irfanerhan9@gmail.com', 'Kp. Ciburial No. 11 RT 01/15 Desa Margajaya', '81224488958', '-', '-', '2020-07-13', '1995-10-24'),
(139, 'ramdankiki459@gmail.com', '28021995', 'user', 'Kiki Ramadan Sutisna', 'avatar.png', 'L', 'ramdankiki459@gmail.com', 'Jl. Hegarmanah Kulon RT 05/08', '85793014544', '-', '-', '2020-07-13', '1995-02-28'),
(140, 'mochfirdaus.mf@gmail.com', '31031997', 'user', 'Firda Muhammad Firdaus', 'avatar.png', 'L', 'mochfirdaus.mf@gmail.com', 'Jl. Sayati Hilir No. 169 RT 02/08', '82129548925', '-', '-', '2020-07-13', '1997-03-31'),
(141, 'nabilazmiami@gmail.com', '31031997', 'user', 'Nabilah Fauziyyah Azmi', 'avatar.png', 'P', 'nabilazmiami@gmail.com', 'Jl. Haur Mekar C-2 RT 003/001', '82321641900', '-', '-', '2020-07-13', '1997-03-31'),
(142, 'belarifanisa@gmail.com', '18101995', 'user', 'Oktavia Bela Nisa', 'avatar.png', 'P', 'belarifanisa@gmail.com', 'Jl. Industri No. 33/28A RT 01/07', '87775862248', '-', '-', '2020-07-13', '1995-10-18'),
(143, 'faujifajrin@gmail.com', '15021991', 'user', 'Penny Fauzi Fajrin', 'avatar.png', 'P', 'faujifajrin@gmail.com', 'Jl. Terusan Sersan Bajuri No. 59 RT 01/07', '8996811568', '-', '-', '2020-07-13', '1991-02-15'),
(144, 'zisyafiyu@gmail.com', '26011994', 'user', 'Iqrima Nur Nazila', 'avatar.png', 'P', 'zisyafiyu@gmail.com', 'Pondok Padalarang Indah Blok F1 No. 15 RT 02/27', '87722742797', '-', '-', '2020-07-13', '1994-01-26'),
(145, 'finitaputri1996@gmail.com', '3061996', 'user', 'F. Putri Cahyani', 'avatar.png', 'P', 'finitaputri1996@gmail.com', 'Jl. Salak No. 1 RT 07/08', '81312204112', '-', '-', '2020-07-13', '1996-06-03'),
(146, 'irmapermatasr@gmail.com', '3061995', 'user', 'Irma Permata Sari', 'avatar.png', 'P', 'irmapermatasr@gmail.com', 'Jl. Sadang Hegar I No. 32A Rt 06/13', '8983830339', '-', '-', '2020-07-13', '1995-06-03'),
(147, 'ariyanirina95@gmail.com', '10081995', 'user', 'Rina Ariyani', 'avatar.png', 'P', 'ariyanirina95@gmail.com', 'Jl. Terusan Sukaasih V Bawah', '89631902706', '-', '-', '2020-07-13', '1995-08-10'),
(148, '-', '6021996', 'user', 'Vera Listiana', 'avatar.png', 'P', '-', 'Jl. Purba Kencana Dalam RT 04/05', '83822242241', '-', '-', '2020-07-13', '1996-02-06'),
(149, 'muqnirahayyu@yahoo.com', '6041993', 'user', 'Muqni Rahayyu', 'avatar.png', 'P', 'muqnirahayyu@yahoo.com', 'Jl. Jalaprang Perumnas Sukaluyu No. 122 Blok E3', '85355523138', '-', '-', '2020-07-13', '1993-04-06'),
(150, 'santikaipal@gmail.com', '16011996', 'user', 'Santika', 'avatar.png', 'P', 'santikaipal@gmail.com', 'Jl. Ciawitali RT 06/10 No. 37', '81802285943', '-', '-', '2020-07-13', '1996-01-16'),
(151, 'eriskawati177@gmail.com', '17071996', 'user', 'Eriskawati', 'avatar.png', 'P', 'eriskawati177@gmail.com', 'Jl. Cibaduyut Gg. Maeja No. 98 RT 02/03', '81214694264', '-', '-', '2020-07-13', '1996-07-17'),
(152, 'nuriyantify@gmail.com', '27071996', 'user', 'Fungki Nuriyanti', 'avatar.png', 'P', 'nuriyantify@gmail.com', 'Kp. Panyingkiran 03/05 Desa Wanasari', '8871314573', '-', '-', '2020-07-13', '1996-07-27'),
(153, 'neeta13849@gmail.com', '11061984', 'user', 'Nuni Yunita Anggraini Daniati', 'avatar.png', 'P', 'neeta13849@gmail.com', 'Jl. Gudang Utara Dalam I No. 12 RT 06/05', '81214012020', '-', '-', '2020-07-13', '1984-06-11'),
(154, 'ruditresna812@gmail.com', '8061973', 'user', 'Rudi Tresna', 'avatar.png', 'L', 'ruditresna812@gmail.com', 'Kp. Cukang Kawung RT 01/11', '85974621237', '-', '-', '2020-07-13', '1973-06-08'),
(155, 'Fajaramdhan02@gmail.com', '20021994', 'user', 'Fajar Ramdhan', 'avatar.png', 'L', 'Fajaramdhan02@gmail.com', 'Kp. Babakan Sumedang RT 04/05', '8978926936', '-', '-', '2020-07-13', '1994-02-20'),
(156, 'adamwazzaousky@gmail.com', '17091996', 'user', 'Septian Adam Wicaksono', 'avatar.png', 'L', 'adamwazzaousky@gmail.com', 'Bajong RT 02/02', '8993464837', '-', '-', '2020-07-13', '1996-09-17'),
(157, 'nthardianti@gmail.com', '31071995', 'user', 'Hardianti', 'avatar.png', 'P', 'nthardianti@gmail.com', 'Dsn. Cisambeng RT 01/08', '81280316346', '-', '-', '2020-07-13', '1995-07-31'),
(158, 'saepulbachry20@gmail.com', '16011992', 'user', 'Cecep Saepul Bahri', 'avatar.png', 'L', 'saepulbachry20@gmail.com', 'Jl. Sindangsari RT 05/04', '89683931999', '-', '-', '2020-07-13', '1992-01-16'),
(159, 'Afrizkiyudhea@gmail.com', '11041996', 'user', 'Yudhea Afrizki', 'avatar.png', 'P', 'Afrizkiyudhea@gmail.com', 'Dusun Nangka Pandak RT 04/04', '89671952736', '-', '-', '2020-07-13', '1996-04-11'),
(160, 'Meliyanisr@gmail.com', '2051995', 'user', 'Meliyani Sri Rejeki', 'avatar.png', 'P', 'Meliyanisr@gmail.com', 'Jl. Sekeloa No. 16 RT 05/04', '81322479289', '-', '-', '2020-07-13', '1995-05-02'),
(161, 'kharismadewikania@gmail.com', '16071995', 'user', 'Yulia Sari Dewi', 'avatar.png', 'P', 'kharismadewikania@gmail.com', 'Jl. Bojongkoneng Gg. Kamas II RT 005/016', '89646453660', '-', '-', '2020-07-13', '1995-07-16'),
(162, 'lilianisuryanii@gmail.com', '26041993', 'user', 'Liliani Suryani', 'avatar.png', 'P', 'lilianisuryanii@gmail.com', 'Jl. Topografi No. 115 H KPAD RT 005/002', '85720319967', '-', '-', '2020-07-13', '1993-04-26'),
(163, 'yessiaprilia20@gmail.com', '5041993', 'user', 'Yessi Aprilia', 'avatar.png', 'P', 'yessiaprilia20@gmail.com', 'Kp. Babakan Anyar RT 02/10', '83822100563', '-', '-', '2020-07-13', '1993-04-05'),
(164, 'aisyahuii@yahoo.com', '9021994', 'user', 'Sustinawati Aisyah', 'avatar.png', 'P', 'aisyahuii@yahoo.com', 'Jl. Mirabilis 1 C VIII No. 1 Rt 04/04 Komp. Gempol Sari Indah', '81321736042', '-', '-', '2020-07-13', '1994-02-09'),
(165, 'reviandim21@gmail.com', '21061995', 'user', 'Reviandi Muharram', 'avatar.png', 'L', 'reviandim21@gmail.com', 'Jl. Ciumbuleuit Gg. Bukit Indah RT 05/07', '81572178842', '-', '-', '2020-07-13', '1995-06-21'),
(166, 'eriscapratiwi29@gmail.com', '29091996', 'user', 'Erisca Pratiwi', 'avatar.png', 'P', 'eriscapratiwi29@gmail.com', 'Margahayu Raya Jl. Neptunus Timur I Blok KII No. 46', '81222237482', '-', '-', '2020-07-13', '1996-09-29'),
(167, 'intan.shofariah14@gmail.com', '14081993', 'user', 'Intan Sopariah', 'avatar.png', 'P', 'intan.shofariah14@gmail.com', 'Kp. Bbk Mundel RT 02/03 Ds. Solokan', '81222525954', '-', '-', '2020-07-13', '1993-08-14'),
(168, 'iwankustiwan.ik@gmail.com', '2041974', 'user', 'Iwan Kustiwan', 'avatar.png', 'L', 'iwankustiwan.ik@gmail.com', 'Kp. Cikapayang No. 179/144F RT 001/003', '8122390764', '-', '-', '2020-07-13', '1974-04-02'),
(169, 'naramda123rm@gmail.com', '10091975', 'user', 'Nyi Raden Ramdaningsih', 'avatar.png', 'P', 'naramda123rm@gmail.com', 'Komp. Geo Asri B. 57', '81220889700', '-', '-', '2020-07-13', '1975-09-10'),
(170, 'sriayu843@gmail.com', '7081996', 'admin', 'Sri Ayu Nurdianti', 'avatar.png', 'P', 'sriayu843@gmail.com', 'Blok Mekarjaya Ds. Sagara RT 02/01', '85860838624', '-', '-', '2020-07-13', '1996-08-07'),
(171, 'mizanokta@gmail.com', '2101996', 'user', 'Mizani Oktavianingsih', 'avatar.png', 'P', 'mizanokta@gmail.com', 'Jl. Bojongkoneng Lio RT 03/15', '87825363820', '-', '-', '2020-07-13', '1996-10-02'),
(172, 'yudaprawira@gmail.com', '10111993', 'user', 'Yuda Prawira', 'avatar.png', 'L', 'yudaprawira@gmail.com', 'Kp. Sawah Lega RT 02/06', '83119993697', '-', '-', '2020-07-13', '1993-11-10'),
(173, 'rezaramadhan1228@gmail.com', '28121998', 'user', 'Reza Ramadhan Widyanto', 'avatar.png', 'L', 'rezaramadhan1228@gmail.com', 'Jl. Tubagus Ismail III No. 48 RT 02/07', '8984834144', '-', '-', '2020-07-13', '1998-12-28'),
(174, 'fajarmuktigusmawan123@gmail.com', '11051998', 'user', 'Fajar Mukti Gusmawan', 'avatar.png', 'L', 'fajarmuktigusmawan123@gmail.com', 'Jl. Ciheulang No. 37 RT 02/11', '87705464888', '-', '-', '2020-07-13', '1998-05-11'),
(175, 'intandewic@gmail.com', '4041997', 'user', 'Intan Dewi Cahyani', 'avatar.png', 'P', 'intandewic@gmail.com', 'Jl. Sersan Surip No. 163/169 A RT 04/04', '87824962822', '-', '-', '2020-07-13', '1997-04-04'),
(176, 'bellaoktavp@gmail.com', '10101997', 'user', 'Bella Oktavia Pertiwi', 'avatar.png', 'P', 'bellaoktavp@gmail.com', 'Gg. Sawargi, Jl. Tengah CIater', '82320685123', '-', '-', '2020-07-13', '1997-10-10'),
(177, 'user.fernandi@gmail.com', '18022001', 'user', 'Fernandi Koswara Putra', 'avatar.png', 'L', 'user.fernandi@gmail.com', 'Kp. Langensari RT 03/04 Desa Langensari', '85314387848', '-', '-', '2020-07-13', '2001-02-18'),
(178, 'fikrisaiful23@gmail.com', '13091995', 'user', 'Fikri Saiful Iman', 'avatar.png', 'L', 'fikrisaiful23@gmail.com', 'Dusun Sayang RT 01/08', '81912302765', '-', '-', '2020-07-13', '1995-09-13'),
(179, 'r.rudimurwantoro@gmail.com', '13111977', 'user', 'R. Rudi Murwantoro', 'avatar.png', 'L', 'r.rudimurwantoro@gmail.com', 'Komp. Pemda No. 417 RT 05/04', '82121767610', '-', '-', '2020-07-13', '1977-11-13'),
(180, '-', '10041975', 'user', 'Zunaedi Solehudin', 'avatar.png', 'L', '-', 'Jl. Hegar Asih II No. 32 Rt 05/03', '81223594326', '-', '-', '2020-07-13', '1975-04-10'),
(181, '-', '29051977', 'user', 'Syani Hermawan', 'avatar.png', 'L', '-', 'Graha Bukit Raya C-8 No. 22 RT 06/25', '81321613570', '-', '-', '2020-07-13', '1977-05-29'),
(182, '-', '17081974', 'user', 'Andriansyah', 'avatar.png', 'L', '-', 'Komp. Geo Asri B-57 RT 02/10', '82127712265', '-', '-', '2020-07-13', '1974-08-17'),
(183, '-', '5021988', 'user', 'Yonathan Daud Febrian', 'avatar.png', 'L', '-', 'Jl. Cilengkrang 2 RT 02/01', '81327415142', '-', '-', '2020-07-13', '1988-02-05'),
(184, 'asum66.as@gmail.com', '22031966', 'user', 'Asep Sumpena', 'avatar.png', 'L', 'asum66.as@gmail.com', 'Jl. Saluyu Indah XVII No. 124 RT 03/13', '81321811966', '-', '-', '2020-07-13', '1966-03-22'),
(185, 'windasarifebriani28@gmail.com', '28021991', 'user', 'Winda Sari Febriani', 'avatar.png', 'P', 'windasarifebriani28@gmail.com', 'Jl. Pakar Barat II No. 56', '85221369421', '-', '-', '2020-07-13', '1991-02-28'),
(186, 'nsuprihatin@yahoo.com', '1011963', 'user', 'Neneng Suprihatin', 'avatar.png', 'P', 'nsuprihatin@yahoo.com', 'Gg. Saluyu Selatan 1 No. 2 RT 05/09', '81224792493', '-', '-', '2020-07-13', '1963-01-01'),
(187, 'tis_n@yahoo.co.id', '9061972', 'user', 'Sutisna', 'avatar.png', 'L', 'tis_n@yahoo.co.id', 'Komp. Suka Asih Atas Jl. Suka Asih Atas II No. 287 RT 03/06', '82219127208', '-', '-', '2020-07-13', '1972-06-09'),
(188, 'roserosmawati5@gmail.com', '14071976', 'user', 'Rose Rosmawati', 'avatar.png', 'P', 'roserosmawati5@gmail.com', 'Jl. Kiastra Manggala No. 25 RT 004/012', '81222413376', '-', '-', '2020-07-13', '1976-07-14'),
(189, '-', '3101977', 'user', 'Winny Oktiyanti', 'avatar.png', 'P', '-', 'Komp. Pemda No. 417 RT 05/04', '82115266515', '-', '-', '2020-07-13', '1977-10-03'),
(190, 'astristrini07@gmail.com', '7031989', 'user', 'Astri Setiorini', 'avatar.png', 'P', 'astristrini07@gmail.com', 'Jl. Encep Kartawiria Kp. Cisurup RT 06/07', '85220569264', '-', '-', '2020-07-13', '1989-03-07'),
(191, 'lianaastiana@gmail.com', '30081992', 'user', 'Liana Astiana', 'avatar.png', 'P', 'lianaastiana@gmail.com', 'Jl. Tubagus Ismail RT 01/12', '85711872210', '-', '-', '2020-07-13', '1992-08-30'),
(192, 'eurapermanarskg@gmail.com', '20071990', 'user', 'Yura Permana', 'avatar.png', 'L', 'eurapermanarskg@gmail.com', 'Jl. Terusan Cigadung (Babakan Sembung) RT 04/12 No. 145A', '8813077580', '-', '-', '2020-07-13', '1990-07-20'),
(193, '6436a.40261@gmail.com', '11091996', 'superadmin', 'Ari Rifan', 'avatar.png', 'L', '6436a.40261@gmail.com', 'Jl. Karapitan III No. 64/36A', '8988548844', '-', '-', '2020-07-13', '1996-09-11'),
(194, 'lindaekarivanti15@gmail.com', '15071996', 'user', 'Linda Eka Rivanti', 'avatar.png', 'P', 'lindaekarivanti15@gmail.com', 'Jl. Budhi RT 01/12', '8156189110', '-', '-', '2020-07-13', '1996-07-15'),
(195, 'rinisetiawati1010@gmail.com', '28031979', 'user', 'Rini Setiawati', 'avatar.png', 'P', 'rinisetiawati1010@gmail.com', 'Jl. Kubang Selatan IV No. 105 RT 04/14', '85724995196', '-', '-', '2020-07-13', '1979-03-28'),
(196, 'putriaprdn95@gmail.com', '13041995', 'user', 'Putri Apridana', 'avatar.png', 'P', 'putriaprdn95@gmail.com', 'Jl. Babakan Surabaya RT 05/11', '87823621329', '-', '-', '2020-07-13', '1995-04-13'),
(197, 'yahandoko26@gmail.com', '26101980', 'user', 'Handoko Wibowo', 'avatar.png', 'L', 'yahandoko26@gmail.com', 'Jl. Malangbong VI No. 32', '81394567880', '-', '-', '2020-07-13', '1980-10-26'),
(198, '-', '29101985', 'user', 'Rina Olistiana', 'avatar.png', 'P', '-', 'Dusun III Hara Desa Kedaton RT 05/03', '82217425604', '-', '-', '2020-07-13', '1985-10-29'),
(199, 'siti.mash0312@gmail.com', '3121992', 'user', 'Siti Masitoh', 'avatar.png', 'P', 'siti.mash0312@gmail.com', 'Jl. Tubagus Ismail Raya Gg. Mesjid 2 No. 02/07', '8996017408', '-', '-', '2020-07-13', '1992-12-03'),
(200, '-', '30031989', 'user', 'Elhayah Prasastiari', 'avatar.png', 'P', '-', 'Jl. Kihapit Barat RT 11/09', '85794652471', '-', '-', '2020-07-13', '1989-03-30'),
(201, '-', '5071996', 'user', 'Dewi Nur Anisa', 'avatar.png', 'P', '-', 'Jl. Tubagus Ismail III No. 25/153-A RT 04/08', '81221966646', '-', '-', '2020-07-13', '1996-07-05'),
(202, 'chubby_nionk@yahoo.com', '26041987', 'user', 'Siti Kurnia', 'avatar.png', 'P', 'chubby_nionk@yahoo.com', 'Jl. Sarijadi Blok II No. 140A RT 08/02', '85759987276', '-', '-', '2020-07-13', '1987-04-26'),
(203, 'daniel.adirianto@yahoo.com', '26081991', 'user', 'Daniel Adirianto', 'avatar.png', 'L', 'daniel.adirianto@yahoo.com', 'Gg. Reuma Kidul II No. 22 RT 04/19', '82217737991', '-', '-', '2020-07-13', '1991-08-26'),
(204, 'amranrskg@gmail.com', '10071997', 'superadmin', 'Muhammad Amran', 'avatar.png', 'L', 'amranrskg@gmail.com', 'Jl. Ibnu Chattab', '87802390549', '-', '-', '2020-07-13', '1997-07-10'),
(205, 'endanurendasari@gmail.com', '4021996', 'user', 'Enda Nur Endasari', 'avatar.png', 'P', 'endanurendasari@gmail.com', 'Blok Pangampiran Rt 02/05', '8.95E+11', '-', '-', '2020-07-13', '1996-02-04'),
(206, 'andini.lisawati09@gmail.com', '9021996', 'user', 'Andini Lisawati', 'avatar.png', 'P', 'andini.lisawati09@gmail.com', 'Jl. Perumnas Cijerah II Blok 19 No. 101', '89507165008', '-', '-', '2020-07-13', '1996-02-09'),
(207, 'maulaniirma17@gmail.com', '17111997', 'user', 'Irma Maulani', 'avatar.png', 'P', 'maulaniirma17@gmail.com', 'Jl. Tubagus Ismail Gg. Mesjid 2 No. 3 RT 02/07', '89655928689', '-', '-', '2020-07-13', '1997-11-17'),
(208, 'vunninovap@gmail.com', '27111998', 'user', 'Vunni Nova Puspita', 'avatar.png', 'P', 'vunninovap@gmail.com', 'Jl. Dipatiukur Gg. Kubang Selatan No. 120 RT 04/14', '81321555930', '-', '-', '2020-07-13', '1998-11-27'),
(209, 'oktaviadevi12@gmail.com', '12101996', 'user', 'Devianti Dwi Oktavia', 'avatar.png', 'P', 'oktaviadevi12@gmail.com', 'Jl. Cikajang 5 No. 9 RT 04/20', '81214194325', '-', '-', '2020-07-13', '1996-10-12'),
(210, '-', '27051983', 'user', 'Suryadi', 'avatar.png', 'L', '-', 'Kp. Pangauban RT 01/05 Ds. Pangauban', '81214453006', '-', '-', '2020-07-13', '1983-05-27'),
(211, '-', '6061980', 'user', 'Dadang Supendi', 'avatar.png', 'L', '-', 'Jl. Ciheulang No. 20 RT 003/011', '89631533385', '-', '-', '2020-07-13', '1980-06-06'),
(212, '-', '17011991', 'user', 'Ridwan Adrianto', 'avatar.png', 'L', '-', 'Jl. Awiligar Kp. Ligarmekar RT 04/26', '8.96E+11', '-', '-', '2020-07-13', '1991-01-17'),
(213, '-', '2121970', 'user', 'Amung Sunarya', 'avatar.png', 'L', '-', 'Jl. Soekarno Hatta Gg. H. Kosin RT 02/02 No. 129', '81321101157', '-', '-', '2020-07-13', '1970-12-02'),
(214, '-', '12111976', 'user', 'Zaenal Arifin', 'avatar.png', 'L', '-', 'Jl. Sarikaso VII No. 9 RT 06/01 Desa Sarijadi', '82217425612', '-', '-', '2020-07-13', '1976-11-12'),
(215, '-', '29081982', 'user', 'Andika Dian Primana', 'avatar.png', 'L', '-', 'Jl. Jend. Achmad Yani No. 05 RT 003/005', '81320614750', '-', '-', '2020-07-13', '1982-08-29'),
(216, '-', '16081973', 'user', 'Agus Kurnia', 'avatar.png', 'L', '-', 'Jl. Ciheulang No. 37 RT 02/11', '81222971167', '-', '-', '2020-07-13', '1973-08-16'),
(217, '-', '10041977', 'user', 'Hendra Kurniawan', 'avatar.png', 'L', '-', 'Dusun I Rt 001/001', '81394111805', '-', '-', '2020-07-13', '1977-04-10'),
(218, '-', '19031979', 'user', 'Suramdi', 'avatar.png', 'L', '-', 'Jl. Babakan Sembung No. 103A RT 02/12', '81910232140', '-', '-', '2020-07-13', '1979-03-19'),
(219, '-', '8081980', 'user', 'Wawan Gunawan', 'avatar.png', 'L', '-', 'Terusan Cisokan Dalam No. 27 RT 05/08', '81221558320', '-', '-', '2020-07-13', '1980-08-08'),
(220, '-', '6071970', 'user', 'Enjang Rohimat', 'avatar.png', 'L', '-', 'Jl. Ciheulang No. 37 RT 02/11', '8.95E+11', '-', '-', '2020-07-13', '1970-07-06'),
(221, '-', '8051977', 'user', 'Nurhayati', 'avatar.png', 'P', '-', 'Kp. Sodong RT 002/015', '81224802091', '-', '-', '2020-07-13', '1977-05-08'),
(222, '-', '29121971', 'user', 'Murtinah', 'avatar.png', 'P', '-', 'Jl. Tamansari No. 121/58 RT 03/13', '81322525586', '-', '-', '2020-07-13', '1971-12-29'),
(223, '-', '24091979', 'user', 'Uum Rumsih', 'avatar.png', 'P', '-', 'Bojong Awi Kaler RT 003/003', '81322359637', '-', '-', '2020-07-13', '1979-09-24'),
(224, '-', '27021973', 'user', 'Iprel Rosahid', 'avatar.png', 'P', '-', 'Jl. Babakan Nanjung 51/B RT 02/07', '82219190473', '-', '-', '2020-07-13', '1973-02-27'),
(225, '-', '8101973', 'user', 'Rini Purwani', 'avatar.png', 'P', '-', 'Sukasari I No. 85 RT 003/001', '82219074955', '-', '-', '2020-07-13', '1973-10-08'),
(226, '-', '27021991', 'user', 'Yuli Febrianti', 'avatar.png', 'P', '-', 'Kp. Muhara RT 001/002', '82211397278', '-', '-', '2020-07-13', '1991-02-27'),
(227, '-', '14081989', 'user', 'Raswi', 'avatar.png', 'P', '-', 'Jl. Ranca Bentang RT 05/13', '82114066247', '-', '-', '2020-07-13', '1989-08-14'),
(228, '-', '6121981', 'user', 'Homsatun', 'avatar.png', 'P', '-', 'Kp. Babakan Santri RT 02/07', '81381553255', '-', '-', '2020-07-13', '1981-12-06'),
(229, '-', '18031974', 'user', 'Ela Amalia', 'avatar.png', 'P', '-', 'Jl. Parakan Panjang No. 30 RT 06/02', '89631967706', '-', '-', '2020-07-13', '1974-03-18'),
(230, 'arum.putri2016@gmail.com', '14011998', 'user', 'Arum Putri Ramdini', 'avatar.png', 'P', 'arum.putri2016@gmail.com', 'Jl. Saluyu C 9 No. 94 RT 07/09', '85220017428', '-', '-', '2020-07-13', '1998-01-14'),
(231, '-', '27051993', 'user', 'Ervi Lestarina', 'avatar.png', 'P', '-', 'Kp. Pasir Honje RT 04/02', '83820913958', '-', '-', '2020-07-13', '1993-05-27'),
(232, 'linairma6@gmail.com', '27111995', 'user', 'Irma Lina Nurjanah', 'avatar.png', 'P', 'linairma6@gmail.com', 'Jl. Cigadung Raya Barat RT 03/02', '8981152908', '-', '-', '2020-07-13', '1995-11-27'),
(233, 'sitinuye@gmail.com', '4111996', 'user', 'Siti Nurjannah', 'avatar.png', 'P', 'sitinuye@gmail.com', 'Jl. Jatihandap Timur RT 04/15', '85323494792', '-', '-', '2020-07-13', '1996-11-04'),
(234, 'edar_75@yahoo.co.id', '22071975', 'user', 'Euis Darliasari', 'avatar.png', 'P', 'edar_75@yahoo.co.id', 'Jl. Griya Bandung Asri I Blok H No. 16', '81321989391', '-', '-', '2020-07-13', '1975-07-22'),
(235, '-', '8041974', 'user', 'Jojo Warjo', 'avatar.png', 'P', '-', 'Jl. Mekar Asih RT 02/09', '81321223830', '-', '-', '2020-07-13', '1974-04-08'),
(236, '-', '27081968', 'user', 'Edi Susanto', 'avatar.png', 'L', '-', 'Jl. Sukasari I No. 104 RT 03/01', '81214928678', '-', '-', '2020-07-13', '1968-08-27'),
(237, 'titiensuartini@gmail.com', '31101959', 'user', 'Titin Suartini', 'avatar.png', 'P', 'titiensuartini@gmail.com', 'Jl. Tubagus Ismail Gg. Virgo No. 13', '8122415662', '-', '-', '2020-07-13', '1959-10-31'),
(238, '-', '5061974', 'user', 'Sulistyowati', 'avatar.png', 'P', '-', 'Jl. Cijerkaso No. 88 RT 07/01', '82116323337', '-', '-', '2020-07-13', '1974-06-05'),
(239, '-', '18011970', 'user', 'Edy Djunaedi', 'avatar.png', 'L', '-', 'Kp. Cibodas RT 02/07', '85318794061', '-', '-', '2020-07-13', '1970-01-18'),
(240, '-', '7111973', 'user', 'Toto Gunadi', 'avatar.png', 'L', '-', 'Jl. Ciheulang No. 53 RT 04/11', '81214726452', '-', '-', '2020-07-13', '1973-11-07'),
(241, '-', '21051989', 'user', 'Deni Sopian', 'avatar.png', 'L', '-', 'Jl. Ciheulang Lama No. 24 RT 03/11', '85794020810', '-', '-', '2020-07-13', '1989-05-21'),
(242, '-', '4021986', 'user', 'Alamsyah', 'avatar.png', 'L', '-', 'Ciheulang No. 53 RT 04/11', '89628336652', '-', '-', '2020-07-13', '1986-02-04'),
(243, '-', '13101987', 'user', 'Sopian', 'avatar.png', 'L', '-', 'Jl. Cibeunying Kolot RT 02/21', '82211397278', '-', '-', '2020-07-13', '1987-10-13'),
(244, '-', '30061986', 'user', 'Firman Gunadi', 'avatar.png', 'L', '-', 'Jl. Ciheulang No. 14 RT 04/11', '87821955475', '-', '-', '2020-07-13', '1986-06-30'),
(245, '-', '29101973', 'user', 'Didi Rusmadi', 'avatar.png', 'L', '-', 'Jl. Tubagus Ismail III No. 25/153-A RT 04/08', '81321007173', '-', '-', '2020-07-13', '1973-10-29'),
(246, '-', '5071964', 'user', 'Rusdianto', 'avatar.png', 'L', '-', 'Jl. Tubagus Ismail Raya 43B RT 001/011', '81220036117', '-', '-', '2020-07-13', '1964-07-05'),
(247, '-', '29061975', 'user', 'Beni Priyanto', 'avatar.png', 'L', '-', 'Jl. Tubagus Ismail III No. 45 RT 02/07', '85220733042', '-', '-', '2020-07-13', '1975-06-29'),
(248, '-', '19081980', 'user', 'Dani Lukman', 'avatar.png', 'L', '-', 'Jl. Babakan Sembung No. 49-A RT 05/12', '81809072748', '-', '-', '2020-07-13', '1980-08-19'),
(249, '-', '29111967', 'user', 'Ujang Juhara', 'avatar.png', 'L', '-', 'Jl. Tubagus Ismail III No. 41 RT 01/07', '89693027507', '-', '-', '2020-07-13', '1967-11-29'),
(250, '-', '7061983', 'user', 'Herdiyana', 'avatar.png', 'L', '-', 'Jl. Ciheulang No. 24 RT 03/11', '87825548175', '-', '-', '2020-07-13', '1983-06-07'),
(251, '-', '5051990', 'user', 'Tatang Taryana', 'avatar.png', 'L', '-', 'Kp. Mekar Asih RT 02/09', '89655969866', '-', '-', '2020-07-13', '1990-05-05'),
(252, '-', '17011988', 'user', 'Dindin Fachrudin', 'avatar.png', 'L', '-', 'Jl. Ciheulang No. 16 RT 04/11', '89519621248', '-', '-', '2020-07-13', '1988-01-17'),
(253, '-', '11011996', 'user', 'Purnama Giri', 'avatar.png', 'L', '-', 'Jl. Ciheulang RT 03/11', '82120006173', '-', '-', '2020-07-13', '1996-01-11'),
(254, '-', '7081982', 'user', 'Yatu Priyono', 'avatar.png', 'L', '-', 'Dk Tlaga RT 002/001 Ds. Tlogosari', '82213709544', '-', '-', '2020-07-13', '1982-08-07'),
(255, 'fratami33@gmail.com', '2031996', 'user', 'Wieke Fratami', 'avatar.png', 'P', 'fratami33@gmail.com', 'Babakan Leuwi Bandung RT 04/02 No. 109', '89636594441', '-', '-', '2020-07-13', '1996-03-02'),
(256, '-', '5081965', 'user', 'Qania Mufliani', 'avatar.png', 'P', '-', 'Jl. Kota Baru VI No. 4 RT 07/08', '8122146542', '-', '-', '2020-07-13', '1965-08-05'),
(257, '-', '18041973', 'user', 'Mudjahidin', 'avatar.png', 'L', '-', 'Kp. Ligar Mekar RT 03/26', '85797242237', '-', '-', '2020-07-13', '1973-04-18'),
(258, '-', '10111963', 'user', 'Endang Rajiman', 'avatar.png', 'L', '-', 'Jl. Sukagalih Gg. H. Gojali RT 02/05 No. 36', '89678148757', '-', '-', '2020-07-13', '1963-11-10'),
(259, '-', '4101970', 'user', 'Agus Hasan', 'avatar.png', 'L', '-', 'Jl. Sukagalih No. 12 RT 01/08', '82117355299', '-', '-', '2020-07-13', '1970-10-04');
INSERT INTO `tb_user` (`user_id`, `username`, `password`, `user_role`, `full_name`, `foto`, `jenis_kelamin`, `email`, `alamat`, `no_hp`, `jabatan`, `unit`, `date_user`, `tgl_lahir`) VALUES
(260, '-', '10051979', 'user', 'Zerry Gahara', 'avatar.png', 'L', '-', 'Komp. Cipaku RT 005/002', '82176355798', '-', '-', '2020-07-13', '1979-05-10'),
(261, '-', '24041982', 'user', 'Dodi Kusnadi', 'avatar.png', 'L', '-', 'Jl. Muhamad IV No. 67 RT 08/06', '85862436306', '-', '-', '2020-07-13', '1982-04-24'),
(262, '-', '13041982', 'user', 'Rohmat Kusdiana', 'avatar.png', 'L', '-', 'Jl. Tubagus Ismail VIII Dalam No. 6A RT 01/12', '82119988924', '-', '-', '2020-07-13', '1982-04-13'),
(263, '-', '1011978', 'user', 'Jana Suhendar', 'avatar.png', 'L', '-', 'Jl. Ciheulang No. 16 RT 04/11', '81221567977', '-', '-', '2020-07-13', '1978-01-01'),
(264, '-', '7031957', 'user', 'Nanan Sunarya', 'avatar.png', 'L', '-', 'Kp. Cikendal Hilir RT 01/03', '85352512183', '-', '-', '2020-07-13', '1957-03-07'),
(265, '-', '4081960', 'user', 'Dedi Sumardi', 'avatar.png', 'L', '-', 'Jl. Tamansari No. 47/56 RT 05/', '82115523456', '-', '-', '2020-07-13', '1960-08-04'),
(266, '-', '22121971', 'user', 'Iwan Setiawan', 'avatar.png', 'L', '-', 'Jl. Ciheulang No. 4E RT 03/11', '85294944058', '-', '-', '2020-07-13', '1971-12-22'),
(267, '-', '27081956', 'user', 'Nana Rusmana', 'avatar.png', 'L', '-', 'Jl. Ciheulang No. 1 RT 03/11', '87822006568', '-', '-', '2020-07-13', '1956-08-27'),
(268, '-', '25011985', 'user', 'Deni Kurniawan', 'avatar.png', 'L', '-', 'Kp. Pangauban RT 01/05 Ds. Pangauban', '81910061542', '-', '-', '2020-07-13', '1985-01-25'),
(269, '-', '17111984', 'user', 'Heri Supriatna', 'avatar.png', 'L', '-', 'Jl. Tubagus Ismail Raya No. 43C RT 01/11', '83821788600', '-', '-', '2020-07-13', '1984-11-17'),
(270, 'rashendatimoty@yahoo.co.id', '7021984', 'user', 'Rashenda Timoty Molisa', 'avatar.png', 'P', 'rashendatimoty@yahoo.co.id', 'Margawani No. 9', '82121277889', '-', '-', '2020-07-13', '1984-02-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bagian`
--
ALTER TABLE `tb_bagian`
  ADD PRIMARY KEY (`id_bg`);

--
-- Indexes for table `tb_kode`
--
ALTER TABLE `tb_kode`
  ADD PRIMARY KEY (`id_kode`);

--
-- Indexes for table `tb_kritiksaran`
--
ALTER TABLE `tb_kritiksaran`
  ADD PRIMARY KEY (`id_ks`);

--
-- Indexes for table `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tb_notif`
--
ALTER TABLE `tb_notif`
  ADD PRIMARY KEY (`id_notif`);

--
-- Indexes for table `tb_ppd`
--
ALTER TABLE `tb_ppd`
  ADD PRIMARY KEY (`id_peru`);

--
-- Indexes for table `tb_ppd_his`
--
ALTER TABLE `tb_ppd_his`
  ADD PRIMARY KEY (`id_his`);

--
-- Indexes for table `tb_revisi`
--
ALTER TABLE `tb_revisi`
  ADD PRIMARY KEY (`id_revisi`);

--
-- Indexes for table `tb_singkatan`
--
ALTER TABLE `tb_singkatan`
  ADD PRIMARY KEY (`id_sing`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bagian`
--
ALTER TABLE `tb_bagian`
  MODIFY `id_bg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tb_kode`
--
ALTER TABLE `tb_kode`
  MODIFY `id_kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_kritiksaran`
--
ALTER TABLE `tb_kritiksaran`
  MODIFY `id_ks` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_log`
--
ALTER TABLE `tb_log`
  MODIFY `log_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `tb_notif`
--
ALTER TABLE `tb_notif`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_ppd`
--
ALTER TABLE `tb_ppd`
  MODIFY `id_peru` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_ppd_his`
--
ALTER TABLE `tb_ppd_his`
  MODIFY `id_his` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_revisi`
--
ALTER TABLE `tb_revisi`
  MODIFY `id_revisi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_singkatan`
--
ALTER TABLE `tb_singkatan`
  MODIFY `id_sing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

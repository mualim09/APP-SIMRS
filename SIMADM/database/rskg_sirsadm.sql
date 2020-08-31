-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2020 at 11:49 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rskg_sirsadm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_ani`
--

CREATE TABLE `tb_ani` (
  `id_ani` int(11) NOT NULL,
  `berkas_ani` varchar(225) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nomor_intern` varchar(225) DEFAULT NULL,
  `perihal_ani` varchar(225) DEFAULT NULL,
  `ket_ani` text,
  `lampiran_ani` varchar(500) DEFAULT NULL,
  `date_ani` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ani`
--

INSERT INTO `tb_ani` (`id_ani`, `berkas_ani`, `tanggal`, `nomor_intern`, `perihal_ani`, `ket_ani`, `lampiran_ani`, `date_ani`) VALUES
(4, '01/02/I/RSKG/2020', '2020-01-02', 'Diklat 01/01/I/Dik/2020', 'Laporan Kegiatan Desember 2019 & Usulan Kegiatan Bulan Januari 2020', '', '', '2020-02-13'),
(5, '02/03/I/RSKG/2020', '2020-01-02', 'Diklat 02/02/I/Dik/2020', 'Permohonan Workshop PPRA', '', '', '2020-02-13'),
(6, '03/03/I/RSKG/2020', '2020-01-03', 'Direktur 01/03/I/Dir-RSKG/2020', 'Penyesuaian Golongan Gaji Karyawan a.n dr. Melita Henriyani', '', '', '2020-02-13'),
(7, '04/03/I/RSKG/2020', '2020-01-03', '', 'Pengajuan Jaminan Pensiun Pegawai', '', '', '2020-02-13'),
(8, '05/06/I/RSKG/2020', '2020-01-05', '', 'Pengajuan Pelatihan BTCLS', '', '', '2020-02-13'),
(9, '06/06/I/RSKG/2020', '2020-01-06', 'Direktur 02/06/I/DIR-RSKG/2020', 'Penyesuaian Golongan Gaji a.n dr. Irene Ranny. N', '', '', '2020-02-13'),
(10, '07/07/I/RSKG/2020', '2019-12-31', '01/06/I/RSKG/2020', 'Permohonan Upgrade Komputer untuk Backup Server', '', '', '2020-02-13'),
(11, '08/07/I/RSKG/2020', '2020-01-07', '', 'Pengajuan SKP IDI Jabar untuk pelatihan Dialisis A. 32', '', '', '2020-02-13'),
(12, '09/07/I/RSKG/2020', '2020-01-07', 'RT 01/01/RT-RSKG/2020', 'Pengajuan Lampu Ambulance', '', '', '2020-02-13'),
(13, '10/07/I/RSKG/2020', '2020-01-07', 'Pembangunan 1/PBGN-RSKG/I/2020', 'Water Heater untuk Bangunan Baru', '', '', '2020-02-13'),
(14, '11/07/I/RSKG/2020', '2020-01-07', '2/PBGN-RSKG/2020', 'Pengecatan Ruangan yang Sudah Kotor', '', '', '2020-02-13'),
(15, '12/08/I/RSKG/2020', '2020-01-08', 'Pokja PAP 01/08/Pap-RSKG/2020', 'Pelatihan Early Warning System', '', '', '2020-02-13'),
(16, '13/09/I/RSKG/2020', '2020-02-09', 'Bedah 01/09/I/Bed-RSKG/2020', 'Permohonan Mengikuti BTCLS', '', '', '2020-02-13'),
(17, '14/09/I/RSKG/2020', '2020-01-09', 'Pokja Progras', 'Pengajuan Workshop Progras - Malang', '', '', '2020-02-13'),
(18, '15/10/I/RSKG/2020', '2020-01-10', 'Case Manager', 'Pengajuan Pelatihan Case Manager - Semarang', '', '', '2020-02-13'),
(19, '16/10/I/RSKG/2020', '2020-01-10', 'IGD', 'Pengajuan Seminar Keperawatan', '', '', '2020-02-13'),
(20, '17/10/I/RSKG/2020', '2020-01-10', 'Bangunan', 'Pengajuan Pembelian Partisi untuk Ranap Airbone Desease', '', '', '2020-02-13'),
(21, '18/10/I/RSKG/2020', '2020-01-10', 'Lab', 'Pengajuan Pengukuran Persisi dan Akurasi Alat Fotometer', '', '', '2020-02-13'),
(22, '19/10/I/RSKG/2020', '2020-01-10', 'Lab 02/I/Lab-RSKG/2020', 'Pengajuan Pembelian Alat Lab', '', '', '2020-02-13'),
(23, '20/10/I/RSKG/2020', '2020-01-10', '08/09/I/Dik-RSKG/2020', 'Pembuatan Sarana dan Prasarana Simulasi Reuse', '', '', '2020-02-13'),
(24, '21/10/I/RSKG/2020', '2020-01-11', '02/II/I/RSKG-Rawat Jalan/2020', 'Pengajuan Pelatihan BTCLS Perawat Rajal', '', '', '2020-02-13'),
(25, '22/11/I/RSKG/2020', '2020-01-11', 'Ranap', 'Pengajuan Pelatihan BTCLS Perawat Ranap', '', '', '2020-02-13'),
(26, '23/13/I/RSKG/2020', '2020-01-13', 'RT 01/01/RT-RSKG/2020', 'Pengajuan Pembelian Kelengkapan Ambulance Isuzu Baru', '', '', '2020-02-13'),
(27, '24/14/I/RSKG/2020', '2020-01-14', 'SDM', 'Pengajuan Karyawan Magang a.n Diana Permatasari Bag. Apoteker', '', '', '2020-02-13'),
(28, '25/14/I/RSKG/2020', '2020-01-14', 'Lab', 'Pengajuan Pembelian Peralatan Lab.', '', '', '2020-02-13'),
(29, '26/15/I/RSKG/2020', '2020-01-15', 'RT  ', 'Pembelian Sparepart Mobil Ambulance Kijang', '', '', '2020-02-13'),
(30, '27/15/I/RSKG/2020', '2020-01-15', 'RT', 'Pembelian Konsumsi Tamu Belanda', '', '', '2020-02-13'),
(31, '28/16/I/RSKG/2020', '2020-01-16', 'Dik', 'Permohonan Pembuatan Brosur Pelatihan Dialisis', '', '', '2020-02-13'),
(32, '29/17/I/RSKG/2020', '2020-01-17', 'Farmasi', 'Harga Instrumen Bedah Lokal', '', '', '2020-02-13'),
(33, '30/17/I/RSKG/2020', '2020-01-17', 'Tek', 'Pembelian Sound System', '', '', '2020-02-13'),
(34, '31/17/I/RSKG/2020', '2020-01-17', 'RT', 'Pengajuan Perbaikan Kursi yang rusak', '', '', '2020-02-13'),
(35, '32/17/I/RSKG/2020', '2020-01-17', 'dr. Ade', 'Tenaga Kerja Gizi', '', '', '2020-02-13'),
(36, '33/17/I/RSKG/2020', '2020-01-17', 'dr. Ade', 'Pelatihan Mutu', '', '', '2020-02-13'),
(37, '34/21/I/RSKG/2020', '2020-01-21', 'IGD', 'Pengajuan Pengadaan Fasilitas Kursi', '', '', '2020-02-13'),
(38, '35/21/I/RSKG/2020', '2020-01-21', 'IGD', 'Pengajuan Patient Monitor', '', '', '2020-02-13'),
(39, '36/21/I/RSKG/2020', '2020-01-21', 'RT', 'Pembelian Meja Lipat & Kursi Chitose untuk Aula Lt.4', '', '', '2020-02-13'),
(40, '37/21/I/RSKG/2020', '2020-01-21', 'Rad', 'Penilaian Radiografer & Permohonan Perekruitan', '', '', '2020-02-13'),
(41, '38/21/I/RSKG/2020', '2020-01-21', 'RT', 'Pengajuan Perubahan Pemakaian Chemical Laundry', '', '', '2020-02-13'),
(42, '39/22/I/RSKG/2020', '2020-01-22', 'IGD 05/20/I/RSKG-Gawat darurat/2020', 'Pengajuan Pengadaan Fasilitas Kasur', '', '', '2020-02-13'),
(43, '40/22/I/RSKG/2020', '2020-01-22', 'Kesling/Teknisi', 'Pembelian Lampu Ultraviolet untuk WTP', '', '', '2020-02-13'),
(44, '41/22/I/RSKG/2020', '2020-01-22', 'Kesling/Teknisi', 'Permohonan Pemutusan Kontrak Kerja a.n Irma Widya K.', '', '', '2020-02-13'),
(45, '42/22/I/RSKG/2020', '2020-01-22', 'Kesling/Teknisi', 'Pengajuan Tenaga Kesling', '', '', '2020-02-13'),
(46, '43/23/I/RSKG/2020', '2020-01-23', 'Pegdn', 'Sumbangan untuk Mesjid At-Taufiq', '', '', '2020-02-13'),
(47, '44/23/I/RSKG/2020', '2020-01-23', 'pegdn', 'Penambahan Stainer Filter', '', '', '2020-02-13'),
(48, '45/23/I/RSKG/2020', '2020-01-23', 'Bedah  ', 'Pengajuan Pelatihan Keterampilan Dasar dan Resertifikasi Bagi Perawat Kamar Bedah', '', '', '2020-02-13'),
(49, '46/23/I/RSKG/2020', '2020-02-23', 'Bedah  ', 'Pengajuan Non Medis (Perbaikan Alat USG)', '', '', '2020-02-13'),
(50, '47/23/I/RSKG/2020', '2020-01-23', 'Bedah  ', 'Pengajuan Bantal yang Dilapisi Bahan Tahan Air', '', '', '2020-02-13'),
(51, '48/23/I/RSKG/2020', '2020-01-23', 'Farmasi', 'Pengajuan Workshop Nakes', '', '', '2020-02-13'),
(52, '49/23/I/RSKG/2020', '2020-01-23', 'Farmasi', 'Perpanjangan PKS Evaluasi TLD Badge dengan CV Kasmalara', '', '', '2020-02-13'),
(53, '50/23/I/RSKG/2020', '2020-01-23', 'RT', 'Pengajuan Pemberian Minuman Tambahan untuk Petugas Laundry', '', '', '2020-02-13'),
(54, '51/24/I/RSKG/2020', '2020-01-24', 'TU & Sosial', 'Perbandingan Kanopi untuk Ruang Jenazah', '', '', '2020-02-13'),
(55, '52/24/I/RSKG/2020', '2020-01-24', 'SDM', 'Permohonan Kary. Tetap a.n Hamdan', '', '', '2020-02-13'),
(56, '53/24/I/RSKG/2020', '2020-01-24', 'SDM', 'Permohonan Tahun Ke-2 kary. a.n Puspita & Vikoh', '', '', '2020-02-13'),
(57, '54/24/I/RSKG/2020', '2020-01-24', 'SDM', 'Permohonan Kontrak th. 1 a.n Ajeng, Erik, Paptik, Made, Anggiani, Mitha', '', '', '2020-02-13'),
(58, '55/24/I/RSKG/2020', '2020-01-24', 'SDM', 'Permohonan Kontrak Th. 1 a.n Krishma Dewi', '', '', '2020-02-13'),
(59, '56/24/I/RSKG/2020', '2020-01-24', 'Tu', 'Pengajuan Alat Musik Keyboard', '', '', '2020-02-13'),
(60, '57/24/I/RSKG/2020', '2020-01-24', 'Lab', 'Pengajuan Rancangan Tarif Pemeriksaan Kimia Klinik', '', '', '2020-02-13'),
(61, '58/27/I/RSKG/2020', '2020-01-27', 'IGD', 'Pengajuan Seminar  ', '', '', '2020-02-13'),
(62, '59/27/I/RSKG/2020', '2020-01-27', 'SDM', 'Peraturan Umum Kepegawaian', '', '', '2020-02-13'),
(63, '60/27/I/RSKG/2020', '2020-01-27', 'SDM', 'Pengajuan SP 1', '', '', '2020-02-13'),
(64, '61/27/I/RSKG/2020', '2020-01-27', 'DIK', 'Rencana Resertifikasi Pel. BHD dan HD', '', '', '2020-02-13'),
(65, '62/27/I/RSKG/2020', '2020-01-27', 'Dik', 'Rencana Kegiatan Feb 2020', '', '', '2020-02-13'),
(66, '63/27/I/RSKG/2020', '2020-01-27', 'Lab', 'Pengajuan Prasarana Instalasi Lab', '', '', '2020-02-13'),
(67, '64/27/I/RSKG/2020', '2020-01-27', 'Lab', 'Pengajuan Pembelian Tabung Reaksi', '', '', '2020-02-13'),
(68, '65/27/I/RSKG/2020', '2020-01-27', 'Lab', 'Pengajuan Pembelian Reagen dan Consumable Alat Cobas CIII', '', '', '2020-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ask`
--

CREATE TABLE `tb_ask` (
  `id_ask` int(11) NOT NULL,
  `berkas_ask` varchar(225) DEFAULT NULL,
  `alamat_penerima` text,
  `tanggal` date DEFAULT NULL,
  `perihal_ask` varchar(255) DEFAULT NULL,
  `ket_ask` text,
  `lampiran_ask` varchar(500) DEFAULT NULL,
  `date_ask` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ask`
--

INSERT INTO `tb_ask` (`id_ask`, `berkas_ask`, `alamat_penerima`, `tanggal`, `perihal_ask`, `ket_ask`, `lampiran_ask`, `date_ask`) VALUES
(4, '02/02/I/RSKG-DIR/2020', 'PT. Inova Medika Solusindo', '2020-01-02', 'Migrasi Server Database /Website ke Server SIMRS', 'dikirim ke prandowandi@inovamedika.com', '', '2020-02-18'),
(5, '01/02/I/RSKG-DIR/2020', 'Dinas Kesehatan Kota Bandung', '2020-01-02', 'Permohonan Ijin Pemberian Materi Untuk OJT HIV', 'dikirim langsung ke tempat', '', '2020-02-19'),
(6, '03/02/I/RSKG-DIR/2020', 'Dr. Ronald Jonathan', '2020-01-02', 'Permohonan Menjadi Narasumber untuk Acara OJT HIV', '', '', '2020-02-19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_asm`
--

CREATE TABLE `tb_asm` (
  `id_asm` int(11) NOT NULL,
  `berkas_asm` varchar(225) DEFAULT NULL,
  `alamat_pengirim` text,
  `tanggal` date DEFAULT NULL,
  `nomor_asm` varchar(225) DEFAULT NULL,
  `perihal_asm` varchar(225) DEFAULT NULL,
  `ket_asm` text,
  `lampiran_asm` varchar(500) DEFAULT NULL,
  `date_asm` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_asm`
--

INSERT INTO `tb_asm` (`id_asm`, `berkas_asm`, `alamat_pengirim`, `tanggal`, `nomor_asm`, `perihal_asm`, `ket_asm`, `lampiran_asm`, `date_asm`) VALUES
(8, '01/02/I/RSKG/2020', 'SMK CIPTA SKILL', '2020-01-02', '', 'Permohonan Ijin Prakerin', '', '', '2020-02-13'),
(9, '02/08/I/RSKG/2020', 'RS. ST. Borromeus', '2020-01-08', '', 'Tarif Baru RS. ST. Borromeus Th. 2020', '', '', '2020-02-13'),
(10, '03/10/I/RSKG/2020', 'BPJS Kesehatan', '2020-01-10', '', 'Pemberian Perubahan FKRTL Provider Kerjasama', '', '', '2020-02-13'),
(11, '04/10/I/RSKG/2020', 'PERSI', '2020-01-10', '', 'Undangan Promosi Kesehatan', '', '', '2020-02-13'),
(12, '05/16/I/RSKG/2020', 'UNPAS', '2020-01-16', '', 'Permohonan Pembayaran SPP', '', '', '2020-02-13'),
(13, '06/17/I/RSKG/2020', 'STIKEP PPNI', '2020-01-17', '', 'Ijin Praktek', '', '', '2020-02-13'),
(14, '07/17/I/RSKG/2020', 'BPJS Kesehatan', '2020-01-17', '', 'Implementasi Program Rujuk Balik (PRB)', '', '', '2020-02-13'),
(15, '08/17/I/RSKG/2020', 'STIKes Rajawali', '2020-01-17', '', 'Ijin Studi Banding', '', '', '2020-02-13'),
(16, '09/17/I/RSKG/2020', 'BPJS Kesehatan', '2020-01-17', '', 'Update Fitur Apl. Vidi', '', '', '2020-02-13'),
(17, '10/17/I/RSKG/2020', 'BPJS Kesehatan', '2020-01-17', '', 'Total Referensi Apotek', '', '', '2020-02-13'),
(18, '11/18/I/RSKG/2020', 'PT. Tirta Teknosys', '2020-01-18', '', 'Permohonan Jadwal Presentasi', '', '', '2020-02-13'),
(19, '12/20/I/RSKG/2020', 'Cv. Zona Limit', '2020-01-20', '', 'Penawaran Harga Pemasangan Pompa', '', '', '2020-02-13'),
(20, '13/20/I/RSKG/2020', 'Universitas Jenderal Soedirman', '2020-01-20', '', 'Permohona Magang Mandiri', '', '', '2020-02-13'),
(21, '14/22/I/RSKG/2020', 'BPJS Kesehatan', '2020-01-22', '', 'Update Fitur Pada Aplikasi VIDI Versi 1.15.0 dan V-Claim 1.16.0', '', 'RSKG-IT-SK-PEDOMAN PENGORGANISASIAN UNIT IT.pdf', '2020-02-13'),
(22, '15/22/I/RSKG/2020', 'BPJS Kesehatan', '2020-01-22', '', 'Tabel Periode Apotek Periode 2018 Tahap III', '', '', '2020-02-13'),
(23, '16/22/I/RSKG/2020', 'Dinas Kesehatan Kota Bandung', '2020-01-22', '', 'Undangan', '', '', '2020-02-13'),
(24, '17/23/I/RSKG/2020', 'KARS', '2020-01-23', '', 'Workshop Instrumen Akreditasi SNARS Edisi 1.1', '', '', '2020-02-13'),
(25, '18/23/I/RSKG/2020', 'Transmedic', '2020-01-23', '', 'Presentasi  Mesin Reuse', '', '', '2020-02-13'),
(26, '19/23/I/RSKG/2020', 'Ns. Creative', '2020-01-23', '', 'Seminar Kesehatan Optimalisasi  Perawat  & Apoteker dalam Pelayanan Kesehatan', '', '', '2020-02-13'),
(27, '20/27/I/RSKG/2020', 'UNISBA', '2020-01-27', '', 'Ijin Penelitian', '', '', '2020-02-13'),
(28, '21/27/I/RSKG/2020', 'Griya Nutrisi', '2020-01-27', '347/Dir/PTGN/XII/2019', 'Permohonan Kenaikan Harga', '', '', '2020-02-13'),
(29, '22/27/I/RSKG/2020', 'BPJS Kesehatan', '2020-01-27', '', 'Undangan Pertemuan', '', '', '2020-02-13'),
(30, '23/27/I/RSKG/2020', 'STIKES Rajawali', '2020-01-27', '', 'Studi  Pendahuluan dan Penelitian a.n Winda Widiawati', '', '', '2020-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_client`
--

CREATE TABLE `tb_client` (
  `id_client` int(11) NOT NULL,
  `nama` varchar(225) DEFAULT NULL,
  `foto` varchar(225) DEFAULT NULL,
  `telepon` varchar(225) DEFAULT NULL,
  `fax` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `alamat` text,
  `date_client` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_client`
--

INSERT INTO `tb_client` (`id_client`, `nama`, `foto`, `telepon`, `fax`, `email`, `alamat`, `date_client`) VALUES
(9, 'Bank Bukopin', NULL, '["4234569"]', '', '', '-', '2020-02-15'),
(10, 'Bank Niaga Dago', NULL, '["4241511","4241511","81321090202"]', '', '', '-', '2020-02-15'),
(11, 'Bank BNI ITB', NULL, '["2508760"]', '2508140', '', '-', '2020-02-15'),
(12, 'BRI', NULL, '["081321279000"]', '', '', '-', '2020-02-15'),
(13, 'Bank BNI Taman Sari', NULL, '["25044915"]', '', '', '-', '2020-02-15'),
(14, 'Bank Jabar pusat', NULL, '["4207905"]', '', '', '-', '2020-02-15'),
(15, 'Taman Sari', NULL, '["4206666"]', '', '', '-', '2020-02-15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ekspedisi`
--

CREATE TABLE `tb_ekspedisi` (
  `id_ekspedisi` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `nomor_surat` varchar(225) DEFAULT NULL,
  `perihal` varchar(225) DEFAULT NULL,
  `penerima` varchar(225) DEFAULT NULL,
  `date_ekspedisi` date DEFAULT NULL,
  `lampiran` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ekspedisi`
--

INSERT INTO `tb_ekspedisi` (`id_ekspedisi`, `tanggal`, `nomor_surat`, `perihal`, `penerima`, `date_ekspedisi`, `lampiran`) VALUES
(5, '2020-02-17', 'jo', 'dtft', '["Muhammad Amran"]', '2020-02-17', '7837823rskg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_extention`
--

CREATE TABLE `tb_extention` (
  `id_ext` int(11) NOT NULL,
  `ruangan` varchar(225) DEFAULT NULL,
  `nama` varchar(225) DEFAULT NULL,
  `nomor` varchar(225) DEFAULT NULL,
  `date_ext` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_extention`
--

INSERT INTO `tb_extention` (`id_ext`, `ruangan`, `nama`, `nomor`, `date_ext`) VALUES
(4, 'Direksi', 'Bank Bukopin', '000', '2020-02-16'),
(5, 'SDM', 'Bank Bukopin', '000', '2020-02-17'),
(6, 'Farmasi', 'Bank Bukopin', '000', '2020-02-17'),
(7, 'Dokter', 'Bank Bukopin', '000', '2020-02-17'),
(8, 'ADM,SDM,KEU', 'Bank Bukopin', '000', '2020-02-17'),
(9, 'Rumah Tangga', 'Bank Bukopin', '000', '2020-02-17'),
(10, 'Laboratoium', 'Bank Bukopin', '000', '2020-02-17'),
(11, 'Dokter & Perawat', 'Bank Bukopin', '000', '2020-02-17'),
(12, 'Rekam Medis & Gizi', 'Bank Bukopin', '000', '2020-02-17'),
(13, 'Keuangan', 'Bank Bukopin', '000', '2020-02-17'),
(14, 'IPSRS', 'Bank Bukopin', '000', '2020-02-17'),
(15, 'Radiologi', 'Bank Bukopin', '000', '2020-02-17'),
(16, 'Re-Use', 'Bank Bukopin', '000', '2020-02-17'),
(17, 'Diklat', 'Bank Bukopin', '000', '2020-02-17'),
(18, 'Ruang JKN', 'a', '000', '2020-02-17'),
(19, 'P.O.S & LINEN', 'Bank Bukopin', '000', '2020-02-17'),
(20, 'POLI', 'Bank Bukopin', '000', '2020-02-17'),
(21, 'Sosial & Pengadaan', 'Bank Bukopin', '000', '2020-02-17'),
(22, 'Ruang Rapat', 'Bank Bukopin', '000', '2020-02-17'),
(23, 'Direksi', 'Direktur', '105', '2020-02-18'),
(24, 'Direksi', 'Ketua Yayasan', '119', '2020-02-18'),
(25, 'Direksi', 'Komisaris', '130', '2020-02-18'),
(26, 'Direksi', 'Pengurus Harian Yayasan ', '120', '2020-02-18');

-- --------------------------------------------------------

--
-- Table structure for table `tb_laporankgt`
--

CREATE TABLE `tb_laporankgt` (
  `id_laporankgt` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `selesai` date DEFAULT NULL,
  `kegiatan` text,
  `username` varchar(225) DEFAULT NULL,
  `tempat` text,
  `date_laporankgt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_laporankgt`
--

INSERT INTO `tb_laporankgt` (`id_laporankgt`, `tanggal`, `selesai`, `kegiatan`, `username`, `tempat`, `date_laporankgt`) VALUES
(9, '2020-01-07', '2020-01-07', 'Workshop dam Bimbingan Teknis\r\nPenatalayanan Antibiotik Konsep\r\nRASPRO dalam menjalankan Fungsi\r\nPPRA di RS. (Dr. Melita, Dr. Yola,\r\nLiliani, Iqrima, Maya, Imas dan Dewi D)', '["Dr. Melita","Dr. Yola","Liliani","Iqrima","Maya","Imas","Dewi D"]', 'Zest Hotel Sukajadi Bandung\r\nJl. Sukajadi No. 16\r\nBandung', '2020-02-15'),
(10, '2020-01-10', '2020-01-11', 'Workshop Manajemen Informasi dan\r\nRekam Medis (MIRM) dan Manajemen\r\nKomunikasi dan Edukasi (MKE) dalam\r\nStandar Nasional Akreditasi Rumah Sakit\r\n(SNARS) Edisi 1.1, (Bu Siska dan Bu\r\nHenny)', '["Bu Siska","Bu Henny"]', 'Hotel Harris Kelapa Gading\r\nJakarta', '2020-02-15'),
(11, '2020-01-15', '2020-01-19', 'Pelatihan Basic Training Cardiac Live\r\nSupport (BTCLS), (Widi,Amd.kep,\r\nSaroni, AMK)', '["Widi, Amd.Kep"]', 'Gedung Emnur Indonesia\r\nJl. Garuda No. 52\r\nBandung', '2020-02-15'),
(12, '2020-01-28', '2020-01-28', 'Sosialisasi E-Claim Pelayanan Klaim\r\nObat (Bu Nuni)', '["Bu Nuni"]', 'R.S Yudistrira Lt. 5\r\nKantor Cabang Bandung', '2020-02-15'),
(13, '2020-01-23', '2020-01-23', 'Kegiatan pengembangann kerja dan\r\npemanfaatan data kependudukan untuk\r\npelayanan publik di Lembaga Kesehatan\r\nTingkat Kota Bandung (Dr. Qania dan Pa\r\nIwan)', '["dr. Qania Mufliani","Iwan Kustiawan, SH"]', 'Hotel Horison\r\nJl. Pelajar Pejuang 45\r\nNo. 121 Bandung', '2020-02-15'),
(14, '2020-01-28', '2020-01-29', 'Workshop Khusus Manajer Pelayanan\r\nPasien (MPP-Case Manager) dalam\r\nSNARS Edisi 1, (Dr. Nia dan Dr. Elda)', '["dr. Nia","dr. Elda"]', 'Novotel Hotel,\r\nSemarang', '2020-02-15'),
(15, '2020-01-30', '2020-01-31', 'Workshop Program Nasional dalam\r\nSNARS edisi 1.1 (PONEK Tb dan HIV -\r\nPPRA-Pelayanan Geriatri), (Dr. Safa)', '["dr. Safa"]', 'Hotel Atria\r\nMalang', '2020-02-15');

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
(1, 'admin', 'login', '2020-02-11', ' '),
(2, 'admin', 'login', '2020-02-11', ' '),
(3, 'admin', 'login', '2020-02-11', ' '),
(4, 'admin', 'login', '2020-02-11', ' '),
(5, 'admin', 'login', '2020-02-11', ' '),
(6, 'admin', 'login', '2020-02-11', ' '),
(7, 'admin', 'login', '2020-02-11', ' '),
(8, 'admin', 'login', '2020-02-11', ' '),
(9, 'admin', 'login', '2020-02-11', ' '),
(10, 'admin', 'login', '2020-02-11', ' '),
(11, 'admin', 'login', '2020-02-11', ' '),
(12, 'admin', 'login', '2020-02-11', ' '),
(13, 'admin', 'login', '2020-02-11', ' '),
(14, 'admin', 'login', '2020-02-12', ' '),
(15, 'admin', 'login', '2020-02-12', ' '),
(16, 'admin', 'login', '2020-02-12', ' '),
(17, 'admin', 'login', '2020-02-12', ' '),
(18, 'admin', 'login', '2020-02-13', ' '),
(19, 'admin', 'login', '2020-02-14', ' '),
(20, 'admin', 'login', '2020-02-14', ' '),
(21, 'admin', 'login', '2020-02-14', ' '),
(22, 'admin', 'login', '2020-02-14', ' '),
(23, 'operator', 'login', '2020-02-14', ' '),
(24, 'admin', 'login', '2020-02-14', ' '),
(25, 'admin1', 'login', '2020-02-14', ' '),
(26, 'admin', 'login', '2020-02-14', ' '),
(27, 'admin.admin', 'login', '2020-02-14', ' '),
(28, 'admin', 'login', '2020-02-14', ' '),
(29, 'operator', 'login', '2020-02-14', ' '),
(30, 'admin', 'login', '2020-02-14', ' '),
(31, 'operator', 'login', '2020-02-14', ' '),
(32, 'admin', 'login', '2020-02-14', ' '),
(33, 'operator', 'login', '2020-02-14', ' '),
(34, 'operator', 'login', '2020-02-14', ' '),
(35, 'admin', 'login', '2020-02-15', ' '),
(36, 'operator', 'login', '2020-02-15', ' '),
(37, 'operator', 'login', '2020-02-16', ' '),
(38, 'operator', 'login', '2020-02-17', ' '),
(39, 'Operator', 'login', '2020-02-17', ' '),
(40, 'admin', 'login', '2020-02-18', ' '),
(41, 'linda.linda', 'login', '2020-02-18', ' '),
(42, 'admin', 'login', '2020-02-18', ' '),
(43, 'Administrator', 'login', '2020-02-18', ' '),
(44, 'liana.liana', 'login', '2020-02-18', ' '),
(45, 'Administrator', 'login', '2020-02-19', ' '),
(46, 'admin', 'login', '2020-02-19', ' '),
(47, 'liana.liana', 'login', '2020-02-19', ' '),
(48, 'Administrator', 'login', '2020-02-19', ' '),
(49, 'admin', 'login', '2020-02-19', ' '),
(50, 'Administrator', 'login', '2020-02-19', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rtsi`
--

CREATE TABLE `tb_rtsi` (
  `id_rtsi` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `no_berkas` varchar(225) DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `mutasi` time DEFAULT NULL,
  `penerima` varchar(225) DEFAULT NULL,
  `date_rtsi` date DEFAULT NULL,
  `lampiran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rtsi`
--

INSERT INTO `tb_rtsi` (`id_rtsi`, `tanggal`, `no_berkas`, `jam`, `mutasi`, `penerima`, `date_rtsi`, `lampiran`) VALUES
(1, '2020-02-17', 'No Berkas*', '03:51:00', '04:51:00', '["Muhammad Amran","Operator SIRS ADM"]', '2020-02-17', 'RSKG-LOGO.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rtsm`
--

CREATE TABLE `tb_rtsm` (
  `id_rtsm` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `no_berkas` varchar(225) DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `mutasi` time DEFAULT NULL,
  `penerima` varchar(225) DEFAULT NULL,
  `date_rtsm` date DEFAULT NULL,
  `lampiran` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rtsm`
--

INSERT INTO `tb_rtsm` (`id_rtsm`, `tanggal`, `no_berkas`, `jam`, `mutasi`, `penerima`, `date_rtsm`, `lampiran`) VALUES
(4, '2020-02-17', 'No Berkas*', '03:36:00', '04:36:00', '["Muhammad Amran","Operator SIRS ADM","Test Admin","Dr. Melita"]', '2020-02-17', ''),
(5, '2020-02-15', 'No Berkas*1', '03:36:00', '07:36:00', '["Dr. Yola","Liliani"]', '2020-02-17', '7837823rskg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruangan`
--

CREATE TABLE `tb_ruangan` (
  `tb_ruangan` int(11) NOT NULL,
  `ruangan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`tb_ruangan`, `ruangan`) VALUES
(1, 'Direksi'),
(2, 'SDM'),
(3, 'Farmasi'),
(4, 'Dokter'),
(5, 'ADM,SDM,KEU'),
(6, 'Rumah Tangga'),
(7, 'Laboratoium'),
(8, 'Dokter & Perawat'),
(9, 'Rekam Medis & Gizi'),
(10, 'Keuangan'),
(11, 'IPSRS'),
(12, 'Radiologi'),
(13, 'Re-Use'),
(14, 'Diklat'),
(15, 'Ruang JKN'),
(16, 'P.O.S & LINEN'),
(17, 'POLI'),
(18, 'Sosial & Pengadaan'),
(19, 'Ruang Rapat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_snw`
--

CREATE TABLE `tb_snw` (
  `id_snw` int(11) NOT NULL,
  `kegiatan` varchar(225) DEFAULT NULL,
  `tempat` varchar(225) DEFAULT NULL,
  `wp_mulai` date DEFAULT NULL,
  `wp_selesai` date DEFAULT NULL,
  `dp_nama` varchar(225) DEFAULT NULL,
  `dp_nik` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `date_snw` date DEFAULT NULL,
  `rg_ceklis` varchar(225) DEFAULT NULL,
  `rg_nama` varchar(225) DEFAULT NULL,
  `rg_biaya` varchar(225) DEFAULT NULL,
  `rg_bp` varchar(225) DEFAULT NULL,
  `tt_jenis` varchar(225) DEFAULT NULL,
  `tt_biaya` varchar(225) DEFAULT NULL,
  `tt_bp` varchar(225) DEFAULT NULL,
  `ak_tempat` text,
  `ak_biaya` varchar(225) DEFAULT NULL,
  `ak_bp` varchar(225) DEFAULT NULL,
  `ak_mulai` date DEFAULT NULL,
  `ak_selesai` date DEFAULT NULL,
  `rg_lampiran` varchar(500) DEFAULT NULL,
  `date_rgl` date DEFAULT NULL,
  `tt_lampiran` varchar(500) DEFAULT NULL,
  `date_ttl` date DEFAULT NULL,
  `ak_lampiran` varchar(500) DEFAULT NULL,
  `date_akl` date DEFAULT NULL,
  `remark` text,
  `remark_lampiran` varchar(225) DEFAULT NULL,
  `date_remark` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_snw`
--

INSERT INTO `tb_snw` (`id_snw`, `kegiatan`, `tempat`, `wp_mulai`, `wp_selesai`, `dp_nama`, `dp_nik`, `email`, `date_snw`, `rg_ceklis`, `rg_nama`, `rg_biaya`, `rg_bp`, `tt_jenis`, `tt_biaya`, `tt_bp`, `ak_tempat`, `ak_biaya`, `ak_bp`, `ak_mulai`, `ak_selesai`, `rg_lampiran`, `date_rgl`, `tt_lampiran`, `date_ttl`, `ak_lampiran`, `date_akl`, `remark`, `remark_lampiran`, `date_remark`) VALUES
(3, 'Pelatihan IT', 'Bandung', '2020-01-01', '2020-01-02', 'Muhammad Amran', '12021900790001', 'rskgitbandung@gmail.com', '2020-02-18', NULL, 'Selesai', '10000', '0000000', 'Kreta Api', '1000000', '09090', 'Aston Bandung Test', '1000000', '123123123213', '2020-02-18', '2020-02-19', NULL, '0000-00-00', NULL, '2020-02-19', 'Laporan Kegiatan 2020.docx', '2020-02-19', 'Kepada Yth,\r\nIbu/Bapak (Nama Peserta)\r\n\r\nBerikut kami lampirkan bukti pembayaran pendaftaran Seminar/Workshop (Nama Pelatihan/Seminar/Workshop) yang akan dilaksanakan pada (MM-DD-YY) sampai dengan (MM-DD-YY) di (Nama Tempat).\r\n\r\nDemikian kami sampaikan, atas perhatiannya kami ucapkan terima kasih.', NULL, '2020-02-19'),
(4, 'Workshop Kredensialing Hisfarsi PD IAI ', 'Hisfarsi PD IAI Jakarta', '2020-02-22', '2020-02-23', 'Liliani Suryani', '', 'lilianisur@gmail.com', '2020-02-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tlpkel`
--

CREATE TABLE `tb_tlpkel` (
  `id_tlpkel` int(11) NOT NULL,
  `ext` varchar(225) DEFAULT NULL,
  `telepon` varchar(225) DEFAULT NULL,
  `PIC` varchar(225) DEFAULT NULL,
  `keterangan` text,
  `date_tlpkel` date DEFAULT NULL,
  `date_tlp` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tlpkel`
--

INSERT INTO `tb_tlpkel` (`id_tlpkel`, `ext`, `telepon`, `PIC`, `keterangan`, `date_tlpkel`, `date_tlp`) VALUES
(1, '120', '081321989391', 'Pa Yofy', '-', '2020-02-18', '2020-02-18');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(10) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) DEFAULT NULL,
  `fullname` varchar(225) DEFAULT NULL,
  `role` enum('admin','user','unit','superadmin') DEFAULT NULL,
  `unit` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `foto` varchar(225) DEFAULT 'default.png',
  `joindate` date DEFAULT NULL,
  `date_user` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `username`, `password`, `fullname`, `role`, `unit`, `email`, `foto`, `joindate`, `date_user`) VALUES
(1, 'admin', '123123', 'Muhammad Amran', 'superadmin', 'IT', 'amranrskg@gmail.com', 'clem-onojeghuo-3.jpg', '2020-01-06', '2020-02-11'),
(2, 'operator', '123123', 'Operator SIRS ADM', 'admin', 'Operator', 'operator@gmail.com', 'joe-gardner-2.jpg', '2020-02-11', '2020-02-11'),
(4, 'admin.admin', '123123', 'Test Admin', 'admin', 'IT', 'amran@yahoo.com', 'RSKG-LOGO.png', '2019-11-02', '2020-02-14'),
(5, 'dr.melita', '123123', 'Dr. Melita', 'user', 'Dokter', '-', 'default.png', '2020-02-15', '2020-02-15'),
(6, 'dr.yola', '123123', 'Dr. Yola', 'user', 'Dokter', '-', 'default.png', '2020-02-15', '2020-02-15'),
(7, 'liliani.liliani', '123123', 'Liliani', 'user', '-', '-', 'default.png', '2020-02-15', '2020-02-15'),
(8, 'iqrima.iqrima', '123123', 'Iqrima', 'user', '-', '-', 'default.png', '2020-02-15', '2020-02-15'),
(9, 'maya.maya', '123123', 'Maya', 'user', '-', '-', 'default.png', '2020-02-15', '2020-02-15'),
(10, 'imas.imas', '123123', 'Imas', 'user', '-', '-', 'default.png', '2020-02-15', '2020-02-15'),
(11, 'dewi.dewi', '123123', 'Dewi D', 'user', '-', '-', 'default.png', '2020-02-15', '2020-02-15'),
(12, 'siska.siska', '123123', 'Bu Siska', 'user', '-', '-', 'default.png', '2020-02-15', '2020-02-15'),
(13, 'henny.henny', '123123', 'Bu Henny', 'user', '-', '-', 'default.png', '2020-02-15', '2020-02-15'),
(14, 'widi.widi', '123123', 'Widi, Amd.Kep', 'user', '-', '-', 'default.png', '2020-02-15', '2020-02-15'),
(15, 'saroni.saroni', '123123', 'Saroni, AMK', 'user', '-', '-', 'default.png', '2020-02-15', '2020-02-15'),
(16, 'nuni.nuni', '123123', 'Bu Nuni', 'user', '-', '-', 'default.png', '2020-02-15', '2020-02-15'),
(17, 'qania.qania', '123123', 'dr. Qania Mufliani', 'user', '-', '-', 'default.png', '2020-02-15', '2020-02-15'),
(18, 'iwan.kustiwan', '123123', 'Iwan Kustiawan, SH', 'user', '-', '-', 'default.png', '2020-02-15', '2020-02-15'),
(19, 'nia.nia', '123123', 'dr. Nia', 'user', '-', '-', 'default.png', '2020-02-15', '2020-02-15'),
(20, 'elda.elda', '123123', 'dr. Elda', 'user', '-', '-', 'default.png', '2020-02-15', '2020-02-15'),
(21, 'safa.safa', '123123', 'dr. Safa', 'user', '-', '-', 'default.png', '2020-02-15', '2020-02-15'),
(22, 'linda.linda', '123123', 'Linda Eka Rivanti', 'admin', 'Operator', 'lindaekarivanti15@gmail.com', 'default.png', '2020-02-18', '2020-02-18'),
(23, 'liana.liana', '123123', 'Liana Astiana', 'admin', 'Operator', '-', 'default.png', '2020-02-18', '2020-02-18'),
(25, 'Administrator', '123123', 'Muhammad Amran', 'admin', 'IT', 'amranrskg@gmail.com', 'default.png', '2020-02-19', '2020-02-19');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `department` varchar(225) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user',
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `department`, `username`, `password`, `nama`, `email`, `role`, `foto`) VALUES
(1, 'Software Engineer', 'admin', '4297f44b13955235245b2497399d7a93', 'Operator 1 RSKG', 'amranhakim9@gmail.com', 'admin', 'joe-gardner-2.jpg'),
(2, 'HRD', 'user', '4297f44b13955235245b2497399d7a93', 'User', 'amranhakim9@gmail.com', 'user', 'kaci-baum-2.jpg'),
(3, 'Administrator', 'Muhammad', '4297f44b13955235245b2497399d7a93', 'Operator 2 RSKG', 'amranmhd10@gmail.com', 'admin', 'clem-onojeghuo-3.jpg'),
(4, 'HRD', 'gilang', '4297f44b13955235245b2497399d7a93', 'Gilang', 'amranmhd10@gmail.com', 'user', 'clem-onojeghuo-2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_ani`
--
ALTER TABLE `tb_ani`
  ADD PRIMARY KEY (`id_ani`);

--
-- Indexes for table `tb_ask`
--
ALTER TABLE `tb_ask`
  ADD PRIMARY KEY (`id_ask`);

--
-- Indexes for table `tb_asm`
--
ALTER TABLE `tb_asm`
  ADD PRIMARY KEY (`id_asm`);

--
-- Indexes for table `tb_client`
--
ALTER TABLE `tb_client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `tb_ekspedisi`
--
ALTER TABLE `tb_ekspedisi`
  ADD PRIMARY KEY (`id_ekspedisi`);

--
-- Indexes for table `tb_extention`
--
ALTER TABLE `tb_extention`
  ADD PRIMARY KEY (`id_ext`);

--
-- Indexes for table `tb_laporankgt`
--
ALTER TABLE `tb_laporankgt`
  ADD PRIMARY KEY (`id_laporankgt`);

--
-- Indexes for table `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tb_rtsi`
--
ALTER TABLE `tb_rtsi`
  ADD PRIMARY KEY (`id_rtsi`);

--
-- Indexes for table `tb_rtsm`
--
ALTER TABLE `tb_rtsm`
  ADD PRIMARY KEY (`id_rtsm`);

--
-- Indexes for table `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  ADD PRIMARY KEY (`tb_ruangan`);

--
-- Indexes for table `tb_snw`
--
ALTER TABLE `tb_snw`
  ADD PRIMARY KEY (`id_snw`);

--
-- Indexes for table `tb_tlpkel`
--
ALTER TABLE `tb_tlpkel`
  ADD PRIMARY KEY (`id_tlpkel`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_ani`
--
ALTER TABLE `tb_ani`
  MODIFY `id_ani` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `tb_ask`
--
ALTER TABLE `tb_ask`
  MODIFY `id_ask` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_asm`
--
ALTER TABLE `tb_asm`
  MODIFY `id_asm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tb_client`
--
ALTER TABLE `tb_client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tb_ekspedisi`
--
ALTER TABLE `tb_ekspedisi`
  MODIFY `id_ekspedisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_extention`
--
ALTER TABLE `tb_extention`
  MODIFY `id_ext` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tb_laporankgt`
--
ALTER TABLE `tb_laporankgt`
  MODIFY `id_laporankgt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tb_log`
--
ALTER TABLE `tb_log`
  MODIFY `log_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `tb_rtsi`
--
ALTER TABLE `tb_rtsi`
  MODIFY `id_rtsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_rtsm`
--
ALTER TABLE `tb_rtsm`
  MODIFY `id_rtsm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  MODIFY `tb_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tb_snw`
--
ALTER TABLE `tb_snw`
  MODIFY `id_snw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_tlpkel`
--
ALTER TABLE `tb_tlpkel`
  MODIFY `id_tlpkel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

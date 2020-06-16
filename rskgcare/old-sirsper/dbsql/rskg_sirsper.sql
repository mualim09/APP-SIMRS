-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2020 at 04:10 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rskg_sirsper`
--

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
(1, 'admin', 'login', '2020-03-11', ' '),
(2, 'admin', 'login', '2020-03-11', ' '),
(3, 'admin', 'login', '2020-03-11', ' '),
(4, 'admin', 'login', '2020-03-11', ' '),
(5, 'admin', 'login', '2020-03-11', ' '),
(6, 'admin', 'login', '2020-03-11', ' '),
(7, 'admin', 'login', '2020-03-11', ' '),
(8, 'admin', 'login', '2020-03-11', ' '),
(9, 'admin', 'login', '2020-03-11', ' '),
(10, 'admin', 'login', '2020-03-11', ' '),
(11, 'admin', 'login', '2020-03-11', ' '),
(12, 'admin', 'login', '2020-03-12', ' '),
(13, 'admin', 'login', '2020-03-12', ' '),
(14, 'admin', 'login', '2020-03-12', ' '),
(15, 'admin', 'login', '2020-03-12', ' '),
(16, 'admin', 'login', '2020-03-18', ' '),
(17, 'admin', 'login', '2020-03-31', ' '),
(18, 'admin', 'login', '2020-03-31', ' '),
(19, 'admin', 'login', '2020-03-31', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ppi_rawatinap`
--

CREATE TABLE `tb_ppi_rawatinap` (
  `id_ppi_rawatinap` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_audit` date DEFAULT NULL,
  `ruangan` varchar(225) DEFAULT NULL,
  `RI_1` varchar(225) DEFAULT NULL,
  `RI_2` text,
  `RI_3` text,
  `RI_4` varchar(225) DEFAULT NULL,
  `RI_5` text,
  `RI_6` text,
  `RI_7` varchar(225) DEFAULT NULL,
  `RI_8` text,
  `RI_9` text,
  `RI_10` varchar(225) DEFAULT NULL,
  `RI_11` text,
  `RI_12` text,
  `RI_13` varchar(225) DEFAULT NULL,
  `RI_14` text,
  `RI_15` text,
  `RI_16` varchar(225) DEFAULT NULL,
  `RI_17` text,
  `RI_18` text,
  `RI_19` varchar(225) DEFAULT NULL,
  `RI_20` text,
  `RI_21` text,
  `RI_22` varchar(225) DEFAULT NULL,
  `RI_23` text,
  `RI_24` text,
  `RI_25` varchar(225) DEFAULT NULL,
  `RI_26` text,
  `RI_27` text,
  `RI_28` varchar(225) DEFAULT NULL,
  `RI_29` text,
  `RI_30` text,
  `RI_31` varchar(225) DEFAULT NULL,
  `RI_32` text,
  `RI_33` text,
  `RI_34` varchar(225) DEFAULT NULL,
  `RI_35` text,
  `RI_36` text,
  `RI_37` varchar(225) DEFAULT NULL,
  `RI_38` text,
  `RI_39` text,
  `RI_40` varchar(225) DEFAULT NULL,
  `RI_41` text,
  `RI_42` text,
  `RI_43` varchar(225) DEFAULT NULL,
  `RI_44` text,
  `RI_45` text,
  `RI_46` varchar(225) DEFAULT NULL,
  `RI_47` text,
  `RI_48` text,
  `RI_49` varchar(225) DEFAULT NULL,
  `RI_50` text,
  `RI_51` text,
  `RI_52` varchar(225) DEFAULT NULL,
  `RI_53` text,
  `RI_54` text,
  `RI_55` varchar(225) DEFAULT NULL,
  `RI_56` text,
  `RI_57` text,
  `RI_58` varchar(225) DEFAULT NULL,
  `RI_59` text,
  `RI_60` text,
  `RI_61` varchar(225) DEFAULT NULL,
  `RI_62` text,
  `RI_63` text,
  `RI_64` varchar(225) DEFAULT NULL,
  `RI_65` text,
  `RI_66` text,
  `RI_67` varchar(225) DEFAULT NULL,
  `RI_68` text,
  `RI_69` text,
  `RI_70` varchar(225) DEFAULT NULL,
  `RI_71` text,
  `RI_72` text,
  `RI_73` varchar(225) DEFAULT NULL,
  `RI_74` text,
  `RI_75` text,
  `RI_76` varchar(225) DEFAULT NULL,
  `RI_77` text,
  `RI_78` text,
  `RI_79` varchar(225) DEFAULT NULL,
  `RI_80` text,
  `RI_81` text,
  `RI_82` varchar(225) DEFAULT NULL,
  `RI_83` text,
  `RI_84` text,
  `RI_85` varchar(225) DEFAULT NULL,
  `RI_86` text,
  `RI_87` text,
  `RI_88` varchar(225) DEFAULT NULL,
  `RI_89` text,
  `RI_90` text,
  `RI_91` varchar(225) DEFAULT NULL,
  `RI_92` text,
  `RI_93` text,
  `RI_94` varchar(225) DEFAULT NULL,
  `RI_95` text,
  `RI_96` text,
  `RI_97` varchar(225) DEFAULT NULL,
  `RI_98` text,
  `RI_99` text,
  `RI_100` varchar(225) DEFAULT NULL,
  `RI_101` text,
  `RI_102` text,
  `RI_103` varchar(225) DEFAULT NULL,
  `RI_104` text,
  `RI_105` text,
  `RI_106` varchar(225) DEFAULT NULL,
  `RI_107` text,
  `RI_108` text,
  `RI_109` varchar(225) DEFAULT NULL,
  `RI_110` text,
  `RI_111` text,
  `RI_112` varchar(225) DEFAULT NULL,
  `RI_113` text,
  `RI_114` text,
  `RI_115` varchar(225) DEFAULT NULL,
  `RI_116` text,
  `RI_117` text,
  `RI_118` varchar(225) DEFAULT NULL,
  `RI_119` text,
  `RI_120` text,
  `RI_121` varchar(225) DEFAULT NULL,
  `RI_122` text,
  `RI_123` text,
  `RI_124` varchar(225) DEFAULT NULL,
  `RI_125` text,
  `RI_126` text,
  `RI_127` varchar(225) DEFAULT NULL,
  `RI_128` text,
  `RI_129` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ppi_rawatinap`
--

INSERT INTO `tb_ppi_rawatinap` (`id_ppi_rawatinap`, `user_id`, `date_audit`, `ruangan`, `RI_1`, `RI_2`, `RI_3`, `RI_4`, `RI_5`, `RI_6`, `RI_7`, `RI_8`, `RI_9`, `RI_10`, `RI_11`, `RI_12`, `RI_13`, `RI_14`, `RI_15`, `RI_16`, `RI_17`, `RI_18`, `RI_19`, `RI_20`, `RI_21`, `RI_22`, `RI_23`, `RI_24`, `RI_25`, `RI_26`, `RI_27`, `RI_28`, `RI_29`, `RI_30`, `RI_31`, `RI_32`, `RI_33`, `RI_34`, `RI_35`, `RI_36`, `RI_37`, `RI_38`, `RI_39`, `RI_40`, `RI_41`, `RI_42`, `RI_43`, `RI_44`, `RI_45`, `RI_46`, `RI_47`, `RI_48`, `RI_49`, `RI_50`, `RI_51`, `RI_52`, `RI_53`, `RI_54`, `RI_55`, `RI_56`, `RI_57`, `RI_58`, `RI_59`, `RI_60`, `RI_61`, `RI_62`, `RI_63`, `RI_64`, `RI_65`, `RI_66`, `RI_67`, `RI_68`, `RI_69`, `RI_70`, `RI_71`, `RI_72`, `RI_73`, `RI_74`, `RI_75`, `RI_76`, `RI_77`, `RI_78`, `RI_79`, `RI_80`, `RI_81`, `RI_82`, `RI_83`, `RI_84`, `RI_85`, `RI_86`, `RI_87`, `RI_88`, `RI_89`, `RI_90`, `RI_91`, `RI_92`, `RI_93`, `RI_94`, `RI_95`, `RI_96`, `RI_97`, `RI_98`, `RI_99`, `RI_100`, `RI_101`, `RI_102`, `RI_103`, `RI_104`, `RI_105`, `RI_106`, `RI_107`, `RI_108`, `RI_109`, `RI_110`, `RI_111`, `RI_112`, `RI_113`, `RI_114`, `RI_115`, `RI_116`, `RI_117`, `RI_118`, `RI_119`, `RI_120`, `RI_121`, `RI_122`, `RI_123`, `RI_124`, `RI_125`, `RI_126`, `RI_127`, `RI_128`, `RI_129`) VALUES
(1, 1, '2020-03-12', 'Rawat Inap', 'on', 'a', '1', 'on', 'b', '2', 'on', 'c', '3', 'on', 'd', '4', 'on', 'e', '5', 'on', 'f', '6', 'on', 'g', '7', 'on', 'h', '8', 'on', 'i', '9', 'on', 'j', '0', 'on', 'k', '11', 'on', 'l', '22', 'on', 'm', '33', 'on', 'n', '44', 'on', 'o', '55', 'on', 'p', '66', 'on', 'q', '77', 'on', 'r', '88', 'on', 's', '99', 'on', 't', '00', 'on', 'u', '111', 'on', 'v', '222', 'on', 'w', '333', 'on', 'x', '444', 'on', 'y', '555', 'on', 'z', '666', 'on', 'aa', '777', 'on', 'bb', '888', 'on', 'cc', '999', 'on', 'dd', '000', 'on', 'ee', '1111', 'on', 'ff', '2222', 'on', 'gg', '3333', NULL, 'hh', '4444', 'on', 'ii', '5555', 'on', 'jj', '6666', 'on', 'kk', '7777', 'on', 'll', '8888', 'on', 'mm', '9999', 'on', 'oo', '0000', 'on', 'pp', '11111', 'on', 'qq', '22222', 'on', 'rr', '33333'),
(2, 1, '2020-03-12', 'Rawat Inap', 'Yes', '', '', 'No', '', '', 'Yes', '', '', 'No', '', '', 'Yes', '', '', 'No', '', '', 'Yes', '', '', 'No', '', '', 'Yes', '', '', 'No', '', '', 'Yes', '', '', 'No', '', '', 'Yes', '', '', 'No', '', '', 'Yes', '', '', 'No', '', '', 'Yes', '', '', 'No', '', '', 'Yes', '', '', 'No', '', '', 'Yes', '', '', 'No', '', '', 'Yes', '', '', 'No', '', '', 'Yes', '', '', 'No', '', '', 'Yes', '', '', 'No', '', '', 'Yes', '', '', 'No', '', '', 'Yes', '', '', 'No', '', '', 'Yes', '', '', NULL, '', '', 'Yes', '', '', 'No', '', '', 'Yes', '', '', 'No', '', '', 'Yes', '', '', 'No', '', '', 'Yes', '', '', 'No', '', '', 'Yes', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(10) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) DEFAULT NULL,
  `fullname` varchar(225) DEFAULT NULL,
  `role` enum('admin','perawat','unit','superadmin') DEFAULT NULL,
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
(1, 'admin', '123123', 'Muhammad Amran', 'superadmin', 'IT', 'amranrskg@gmail.com', 'clem-onojeghuo-3.jpg', '2020-01-06', '2020-02-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tb_ppi_rawatinap`
--
ALTER TABLE `tb_ppi_rawatinap`
  ADD PRIMARY KEY (`id_ppi_rawatinap`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_log`
--
ALTER TABLE `tb_log`
  MODIFY `log_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tb_ppi_rawatinap`
--
ALTER TABLE `tb_ppi_rawatinap`
  MODIFY `id_ppi_rawatinap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

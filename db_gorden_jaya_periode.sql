-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2023 at 05:59 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gorden_jaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `id_kriteria` varchar(10) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `jenis_kriteria` varchar(50) NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`id_kriteria`, `nama_kriteria`, `jenis_kriteria`, `bobot`) VALUES
('K1', 'Jenis Barang', 'Benefit', 0.3),
('K2', 'Nominal Uang', 'Benefit', 0.3),
('K3', 'Intensitas Belanja', 'Benefit', 0.25),
('K4', 'Ketepatan Pembayaran', 'Cost', 0.15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_resaller` int(11) NOT NULL,
  `nilai` double NOT NULL,
  `tgl_penilaian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id_nilai`, `id_resaller`, `nilai`, `tgl_penilaian`) VALUES
(1, 1, 0.11172812004679, '2022-12-20'),
(2, 4, 0.15816010713674, '2022-12-20'),
(3, 5, 0.051428628051215, '2022-12-20'),
(4, 6, 0.19976262185364, '2022-12-20'),
(5, 8, 0.19874277869706, '2022-12-20'),
(6, 9, 0.092011299611535, '2022-12-20'),
(7, 10, 0.18487527379143, '2022-12-20'),
(8, 13, 0.077059357782718, '2022-12-20'),
(9, 14, 0.092011299611535, '2022-12-20'),
(10, 15, 0.092011299611535, '2022-12-20'),
(11, 16, 0.071210042253089, '2022-12-20'),
(12, 17, 0.097860615141164, '2022-12-20'),
(13, 18, 0.072229885409661, '2022-12-20'),
(14, 19, 0.051428628051215, '2022-12-20'),
(15, 20, 0.092011299611535, '2022-12-20'),
(16, 21, 0.051428628051215, '2022-12-20'),
(17, 22, 0.15418330933205, '2022-12-20'),
(18, 23, 0.072229885409661, '2022-12-20'),
(19, 24, 0.13946312985806, '2022-12-20'),
(20, 25, 0.097860615141164, '2022-12-20'),
(21, 26, 0.051428628051215, '2022-12-20'),
(22, 27, 0.11764202934304, '2022-12-20'),
(23, 28, 0.072229885409661, '2022-12-20'),
(24, 29, 0.051428628051215, '2022-12-20'),
(25, 30, 0.097860615141164, '2022-12-20'),
(26, 31, 0.18487527379143, '2022-12-20'),
(27, 32, 0.072229885409661, '2022-12-20'),
(28, 33, 0.092011299611535, '2022-12-20'),
(29, 34, 0.15418330933205, '2022-12-20'),
(30, 35, 0.092011299611535, '2022-12-20'),
(31, 36, 0.051428628051215, '2022-12-20'),
(32, 37, 0.051428628051215, '2022-12-20'),
(33, 38, 0.096840771984592, '2022-12-20'),
(34, 39, 0.097860615141164, '2022-12-20'),
(35, 40, 0.096840771984592, '2022-12-20'),
(36, 41, 0.16509385958956, '2022-12-20'),
(37, 42, 0.072229885409661, '2022-12-20'),
(38, 43, 0.092011299611535, '2022-12-20'),
(39, 44, 0.051428628051215, '2022-12-20'),
(40, 45, 0.15924454405993, '2022-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai_detail`
--

CREATE TABLE `tbl_nilai_detail` (
  `id_nilai_detail` int(11) NOT NULL,
  `id_resaller` int(11) NOT NULL,
  `id_kriteria` varchar(10) CHARACTER SET latin1 NOT NULL,
  `nilai` int(11) DEFAULT NULL,
  `tgl_penilaian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_nilai_detail`
--

INSERT INTO `tbl_nilai_detail` (`id_nilai_detail`, `id_resaller`, `id_kriteria`, `nilai`, `tgl_penilaian`) VALUES
(1, 1, 'K1', 1, '2022-12-20'),
(2, 1, 'K2', 2, '2022-12-20'),
(3, 1, 'K3', 2, '2022-12-20'),
(4, 1, 'K4', 3, '2022-12-20'),
(5, 4, 'K1', 2, '2022-12-20'),
(6, 4, 'K2', 3, '2022-12-20'),
(7, 4, 'K3', 2, '2022-12-20'),
(8, 4, 'K4', 3, '2022-12-20'),
(9, 5, 'K1', 1, '2022-12-20'),
(10, 5, 'K2', 1, '2022-12-20'),
(11, 5, 'K3', 1, '2022-12-20'),
(12, 5, 'K4', 3, '2022-12-20'),
(13, 6, 'K1', 4, '2022-12-20'),
(14, 6, 'K2', 3, '2022-12-20'),
(15, 6, 'K3', 2, '2022-12-20'),
(16, 6, 'K4', 3, '2022-12-20'),
(17, 8, 'K1', 3, '2022-12-20'),
(18, 8, 'K2', 3, '2022-12-20'),
(19, 8, 'K3', 2, '2022-12-20'),
(20, 8, 'K4', 1, '2022-12-20'),
(21, 9, 'K1', 2, '2022-12-20'),
(22, 9, 'K2', 1, '2022-12-20'),
(23, 9, 'K3', 1, '2022-12-20'),
(24, 9, 'K4', 1, '2022-12-20'),
(25, 10, 'K1', 4, '2022-12-20'),
(26, 10, 'K2', 3, '2022-12-20'),
(27, 10, 'K3', 1, '2022-12-20'),
(28, 10, 'K4', 1, '2022-12-20'),
(29, 13, 'K1', 1, '2022-12-20'),
(30, 13, 'K2', 2, '2022-12-20'),
(31, 13, 'K3', 1, '2022-12-20'),
(32, 13, 'K4', 3, '2022-12-20'),
(33, 14, 'K1', 2, '2022-12-20'),
(34, 14, 'K2', 1, '2022-12-20'),
(35, 14, 'K3', 1, '2022-12-20'),
(36, 14, 'K4', 1, '2022-12-20'),
(37, 15, 'K1', 2, '2022-12-20'),
(38, 15, 'K2', 1, '2022-12-20'),
(39, 15, 'K3', 1, '2022-12-20'),
(40, 15, 'K4', 1, '2022-12-20'),
(41, 16, 'K1', 1, '2022-12-20'),
(42, 16, 'K2', 1, '2022-12-20'),
(43, 16, 'K3', 1, '2022-12-20'),
(44, 16, 'K4', 1, '2022-12-20'),
(45, 17, 'K1', 2, '2022-12-20'),
(46, 17, 'K2', 2, '2022-12-20'),
(47, 17, 'K3', 1, '2022-12-20'),
(48, 17, 'K4', 3, '2022-12-20'),
(49, 18, 'K1', 2, '2022-12-20'),
(50, 18, 'K2', 1, '2022-12-20'),
(51, 18, 'K3', 1, '2022-12-20'),
(52, 18, 'K4', 3, '2022-12-20'),
(53, 19, 'K1', 1, '2022-12-20'),
(54, 19, 'K2', 1, '2022-12-20'),
(55, 19, 'K3', 1, '2022-12-20'),
(56, 19, 'K4', 3, '2022-12-20'),
(57, 20, 'K1', 2, '2022-12-20'),
(58, 20, 'K2', 1, '2022-12-20'),
(59, 20, 'K3', 1, '2022-12-20'),
(60, 20, 'K4', 1, '2022-12-20'),
(61, 21, 'K1', 1, '2022-12-20'),
(62, 21, 'K2', 1, '2022-12-20'),
(63, 21, 'K3', 1, '2022-12-20'),
(64, 21, 'K4', 3, '2022-12-20'),
(65, 22, 'K1', 3, '2022-12-20'),
(66, 22, 'K2', 3, '2022-12-20'),
(67, 22, 'K3', 1, '2022-12-20'),
(68, 22, 'K4', 2, '2022-12-20'),
(69, 23, 'K1', 2, '2022-12-20'),
(70, 23, 'K2', 1, '2022-12-20'),
(71, 23, 'K3', 1, '2022-12-20'),
(72, 23, 'K4', 3, '2022-12-20'),
(73, 24, 'K1', 4, '2022-12-20'),
(74, 24, 'K2', 2, '2022-12-20'),
(75, 24, 'K3', 1, '2022-12-20'),
(76, 24, 'K4', 3, '2022-12-20'),
(77, 25, 'K1', 2, '2022-12-20'),
(78, 25, 'K2', 2, '2022-12-20'),
(79, 25, 'K3', 1, '2022-12-20'),
(80, 25, 'K4', 3, '2022-12-20'),
(81, 26, 'K1', 1, '2022-12-20'),
(82, 26, 'K2', 1, '2022-12-20'),
(83, 26, 'K3', 1, '2022-12-20'),
(84, 26, 'K4', 3, '2022-12-20'),
(85, 27, 'K1', 2, '2022-12-20'),
(86, 27, 'K2', 2, '2022-12-20'),
(87, 27, 'K3', 1, '2022-12-20'),
(88, 27, 'K4', 1, '2022-12-20'),
(89, 28, 'K1', 2, '2022-12-20'),
(90, 28, 'K2', 1, '2022-12-20'),
(91, 28, 'K3', 1, '2022-12-20'),
(92, 28, 'K4', 3, '2022-12-20'),
(93, 29, 'K1', 1, '2022-12-20'),
(94, 29, 'K2', 1, '2022-12-20'),
(95, 29, 'K3', 1, '2022-12-20'),
(96, 29, 'K4', 3, '2022-12-20'),
(97, 30, 'K1', 2, '2022-12-20'),
(98, 30, 'K2', 2, '2022-12-20'),
(99, 30, 'K3', 1, '2022-12-20'),
(100, 30, 'K4', 3, '2022-12-20'),
(101, 31, 'K1', 4, '2022-12-20'),
(102, 31, 'K2', 3, '2022-12-20'),
(103, 31, 'K3', 1, '2022-12-20'),
(104, 31, 'K4', 1, '2022-12-20'),
(105, 32, 'K1', 2, '2022-12-20'),
(106, 32, 'K2', 1, '2022-12-20'),
(107, 32, 'K3', 1, '2022-12-20'),
(108, 32, 'K4', 3, '2022-12-20'),
(109, 33, 'K1', 2, '2022-12-20'),
(110, 33, 'K2', 1, '2022-12-20'),
(111, 33, 'K3', 1, '2022-12-20'),
(112, 33, 'K4', 1, '2022-12-20'),
(113, 34, 'K1', 3, '2022-12-20'),
(114, 34, 'K2', 3, '2022-12-20'),
(115, 34, 'K3', 1, '2022-12-20'),
(116, 34, 'K4', 2, '2022-12-20'),
(117, 35, 'K1', 2, '2022-12-20'),
(118, 35, 'K2', 1, '2022-12-20'),
(119, 35, 'K3', 1, '2022-12-20'),
(120, 35, 'K4', 1, '2022-12-20'),
(121, 36, 'K1', 1, '2022-12-20'),
(122, 36, 'K2', 1, '2022-12-20'),
(123, 36, 'K3', 1, '2022-12-20'),
(124, 36, 'K4', 3, '2022-12-20'),
(125, 37, 'K1', 1, '2022-12-20'),
(126, 37, 'K2', 1, '2022-12-20'),
(127, 37, 'K3', 1, '2022-12-20'),
(128, 37, 'K4', 3, '2022-12-20'),
(129, 38, 'K1', 1, '2022-12-20'),
(130, 38, 'K2', 2, '2022-12-20'),
(131, 38, 'K3', 1, '2022-12-20'),
(132, 38, 'K4', 1, '2022-12-20'),
(133, 39, 'K1', 2, '2022-12-20'),
(134, 39, 'K2', 2, '2022-12-20'),
(135, 39, 'K3', 1, '2022-12-20'),
(136, 39, 'K4', 3, '2022-12-20'),
(137, 40, 'K1', 1, '2022-12-20'),
(138, 40, 'K2', 2, '2022-12-20'),
(139, 40, 'K3', 1, '2022-12-20'),
(140, 40, 'K4', 1, '2022-12-20'),
(141, 41, 'K1', 4, '2022-12-20'),
(142, 41, 'K2', 3, '2022-12-20'),
(143, 41, 'K3', 1, '2022-12-20'),
(144, 41, 'K4', 3, '2022-12-20'),
(145, 42, 'K1', 2, '2022-12-20'),
(146, 42, 'K2', 1, '2022-12-20'),
(147, 42, 'K3', 1, '2022-12-20'),
(148, 42, 'K4', 3, '2022-12-20'),
(149, 43, 'K1', 2, '2022-12-20'),
(150, 43, 'K2', 1, '2022-12-20'),
(151, 43, 'K3', 1, '2022-12-20'),
(152, 43, 'K4', 1, '2022-12-20'),
(153, 44, 'K1', 1, '2022-12-20'),
(154, 44, 'K2', 1, '2022-12-20'),
(155, 44, 'K3', 1, '2022-12-20'),
(156, 44, 'K4', 3, '2022-12-20'),
(157, 45, 'K1', 4, '2022-12-20'),
(158, 45, 'K2', 2, '2022-12-20'),
(159, 45, 'K3', 1, '2022-12-20'),
(160, 45, 'K4', 1, '2022-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_resaller` int(11) NOT NULL,
  `tipe` enum('Lokal','Impor','Premium') NOT NULL,
  `banyak` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `pembayaran` enum('Kontan','Cicil') NOT NULL,
  `tgl_penjualan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_penjualan`
--

INSERT INTO `tbl_penjualan` (`id_penjualan`, `id_resaller`, `tipe`, `banyak`, `total_harga`, `pembayaran`, `tgl_penjualan`) VALUES
(4, 1, 'Lokal', 3, 1000000, 'Cicil', '2023-03-28'),
(5, 1, 'Impor', 21, 23000000, 'Kontan', '2023-03-22'),
(7, 4, 'Impor', 6, 1500000, 'Cicil', '2023-03-25'),
(8, 5, 'Premium', 8, 2200000, 'Kontan', '2023-03-24'),
(9, 1, 'Premium', 5, 5000000, 'Kontan', '2023-04-12'),
(10, 6, 'Lokal', 2, 2000000, 'Kontan', '2023-04-10'),
(12, 8, 'Impor', 3, 5000000, 'Kontan', '2023-05-12'),
(13, 9, 'Lokal', 1, 2500000, 'Kontan', '2023-05-21'),
(14, 9, 'Lokal', 5, 5000000, 'Cicil', '2023-02-09'),
(15, 10, 'Impor', 5, 12000000, 'Kontan', '2023-05-24'),
(16, 13, 'Premium', 3, 15000000, 'Kontan', '2023-01-11'),
(17, 14, 'Lokal', 10, 14000000, 'Cicil', '2023-01-24'),
(18, 15, 'Premium', 3, 12000000, 'Kontan', '2023-02-06'),
(19, 16, 'Lokal', 5, 5000000, 'Kontan', '2023-02-12'),
(20, 17, 'Lokal', 4, 2000000, 'Kontan', '2023-02-25'),
(21, 18, 'Lokal', 6, 12000000, 'Cicil', '2023-03-04'),
(22, 19, 'Premium', 2, 12000000, 'Kontan', '2023-03-10'),
(23, 20, 'Impor', 4, 12000000, 'Kontan', '2023-03-17'),
(24, 21, 'Lokal', 3, 15000000, 'Cicil', '2023-04-02'),
(25, 22, 'Premium', 2, 8000000, 'Kontan', '2023-04-09'),
(26, 23, 'Impor', 3, 9000000, 'Kontan', '2023-04-19'),
(27, 24, 'Premium', 2, 9000000, 'Kontan', '2023-04-23'),
(28, 25, 'Lokal', 7, 11500000, 'Cicil', '2023-05-02'),
(29, 26, 'Premium', 2, 8600000, 'Kontan', '2023-05-09'),
(30, 27, 'Premium', 3, 15000000, 'Cicil', '2023-05-12'),
(31, 28, 'Impor', 4, 8000000, 'Cicil', '2023-05-15'),
(32, 29, 'Impor', 3, 75000000, 'Cicil', '2023-05-17'),
(33, 30, 'Premium', 3, 12500000, 'Kontan', '2023-05-18'),
(34, 23, 'Impor', 4, 9500000, 'Kontan', '2023-05-18'),
(35, 13, 'Lokal', 5, 7500000, 'Cicil', '2023-05-20'),
(36, 17, 'Impor', 2, 6000000, 'Kontan', '2023-05-21'),
(37, 31, 'Lokal', 4, 4400000, 'Kontan', '2023-05-22'),
(38, 32, 'Lokal', 5, 5000000, 'Kontan', '2023-05-22'),
(39, 33, 'Lokal', 6, 6600000, 'Kontan', '2023-05-22'),
(40, 34, 'Impor', 4, 8000000, 'Cicil', '2023-05-23'),
(41, 35, 'Lokal', 3, 3600000, 'Kontan', '2023-05-23'),
(42, 36, 'Premium', 3, 12000000, 'Cicil', '2023-05-23'),
(43, 37, 'Impor', 2, 3200000, 'Kontan', '2023-05-24'),
(44, 38, 'Premium', 4, 4400000, 'Cicil', '2023-05-24'),
(45, 39, 'Lokal', 2, 1000000, 'Kontan', '2023-05-24'),
(46, 40, 'Lokal', 3, 1500000, 'Cicil', '2023-05-24'),
(47, 41, 'Impor', 3, 4200000, 'Kontan', '2023-05-24'),
(48, 42, 'Lokal', 5, 2500000, 'Kontan', '2023-05-24'),
(49, 43, 'Lokal', 2, 1200000, 'Kontan', '2023-05-25'),
(50, 44, 'Lokal', 4, 4000000, 'Kontan', '2023-05-25'),
(51, 45, 'Impor', 5, 5500000, 'Cicil', '2023-05-25'),
(52, 30, 'Premium', 3, 12300000, 'Kontan', '2023-05-25'),
(53, 31, 'Lokal', 2, 1000000, 'Kontan', '2023-05-26'),
(54, 33, 'Impor', 4, 5600000, 'Kontan', '2023-05-26'),
(55, 32, 'Lokal', 3, 3300000, 'Kontan', '2023-05-26'),
(56, 9, 'Impor', 5, 6500000, 'Kontan', '2023-07-03'),
(57, 9, 'Lokal', 3, 2500000, 'Cicil', '2023-07-11'),
(58, 18, 'Premium', 4, 10200000, 'Cicil', '2023-07-05'),
(59, 39, 'Lokal', 6, 6500000, 'Kontan', '2023-07-07'),
(60, 34, 'Premium', 2, 5500000, 'Kontan', '2023-07-08'),
(61, 23, 'Impor', 3, 3600000, 'Kontan', '2022-08-02'),
(62, 8, 'Lokal', 4, 4400000, 'Cicil', '2022-08-03'),
(63, 34, 'Premium', 2, 8000000, 'Kontan', '2022-08-07'),
(64, 22, 'Impor', 5, 10000000, 'Kontan', '2022-08-07'),
(65, 4, 'Impor', 3, 5600000, 'Kontan', '2022-07-02'),
(66, 1, 'Lokal', 2, 2200000, 'Kontan', '2022-07-03'),
(67, 6, 'Premium', 3, 9000000, 'Kontan', '2022-07-07'),
(68, 8, 'Impor', 3, 9000000, 'Cicil', '2022-07-07'),
(69, 4, 'Impor', 3, 5600000, 'Kontan', '2022-07-02'),
(70, 1, 'Lokal', 2, 2200000, 'Kontan', '2022-07-03'),
(71, 6, 'Premium', 3, 9000000, 'Kontan', '2022-07-07'),
(72, 8, 'Impor', 3, 9000000, 'Cicil', '2022-07-07'),
(73, 4, 'Impor', 3, 5600000, 'Kontan', '2022-07-02'),
(74, 1, 'Lokal', 2, 2200000, 'Kontan', '2022-07-09'),
(75, 6, 'Premium', 3, 9000000, 'Kontan', '2022-07-13'),
(76, 8, 'Impor', 3, 6000000, 'Cicil', '2022-07-17'),
(77, 10, 'Premium', 5, 15000000, 'Cicil', '2022-07-21'),
(78, 9, 'Impor', 2, 4400000, 'Cicil', '2022-08-03'),
(79, 13, 'Lokal', 6, 7600000, 'Kontan', '2022-09-02'),
(80, 15, 'Impor', 1, 2500000, 'Cicil', '2022-09-11'),
(81, 16, 'Lokal', 3, 3300000, 'Cicil', '2022-09-15'),
(82, 17, 'Impor', 5, 7500000, 'Kontan', '2022-09-22'),
(83, 19, 'Lokal', 2, 3000000, 'Kontan', '2022-09-25'),
(84, 22, 'Lokal', 5, 6000000, 'Cicil', '2022-10-03'),
(85, 25, 'Impor', 3, 7800000, 'Kontan', '2022-10-04'),
(86, 27, 'Impor', 4, 8000000, 'Cicil', '2022-10-07'),
(87, 28, 'Impor', 2, 3600000, 'Kontan', '2022-10-07'),
(88, 30, 'Impor', 3, 9000000, 'Kontan', '2022-10-16'),
(89, 31, 'Premium', 3, 12000000, 'Cicil', '2022-11-01'),
(90, 32, 'Impor', 2, 4000000, 'Kontan', '2022-11-02'),
(91, 34, 'Impor', 4, 6400000, 'Cicil', '2022-11-08'),
(92, 37, 'Lokal', 3, 3000000, 'Kontan', '2022-11-18'),
(93, 39, 'Impor', 3, 5000000, 'Kontan', '2022-11-21'),
(94, 40, 'Lokal', 5, 7500000, 'Cicil', '2022-11-28'),
(95, 41, 'Premium', 4, 12000000, 'Kontan', '2022-11-28'),
(96, 42, 'Impor', 1, 3000000, 'Cicil', '2022-12-02'),
(97, 45, 'Impor', 2, 5600000, 'Kontan', '2022-12-04'),
(98, 32, 'Lokal', 3, 4300000, 'Kontan', '2022-12-08'),
(99, 25, 'Impor', 2, 2400000, 'Kontan', '2022-12-13'),
(100, 5, 'Lokal', 2, 2200000, 'Kontan', '2022-07-17'),
(101, 14, 'Impor', 3, 3600000, 'Cicil', '2022-08-10'),
(102, 18, 'Impor', 1, 1100000, 'Kontan', '2022-08-19'),
(103, 20, 'Impor', 5, 4500000, 'Cicil', '2022-09-11'),
(104, 21, 'Lokal', 4, 2800000, 'Kontan', '2022-09-03'),
(105, 24, 'Premium', 2, 7500000, 'Kontan', '2022-09-16'),
(106, 26, 'Lokal', 1, 700000, 'Kontan', '2022-08-04'),
(107, 29, 'Lokal', 3, 1800000, 'Kontan', '2022-10-02'),
(108, 35, 'Impor', 2, 3000000, 'Cicil', '2022-10-05'),
(109, 36, 'Lokal', 4, 4000000, 'Kontan', '2022-10-22'),
(110, 33, 'Impor', 3, 3600000, 'Cicil', '2022-10-26'),
(111, 38, 'Lokal', 5, 5000000, 'Cicil', '2022-11-04'),
(112, 42, 'Impor', 2, 2600000, 'Kontan', '2022-11-09'),
(113, 43, 'Impor', 3, 3000000, 'Cicil', '2022-11-26'),
(114, 44, 'Lokal', 4, 1600000, 'Kontan', '2022-11-27'),
(115, 45, 'Premium', 3, 9000000, 'Cicil', '2022-11-29'),
(116, 25, 'Lokal', 2, 1500000, 'Kontan', '2022-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resaller`
--

CREATE TABLE `tbl_resaller` (
  `id_resaller` int(11) NOT NULL,
  `nama_resaller` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_resaller`
--

INSERT INTO `tbl_resaller` (`id_resaller`, `nama_resaller`, `email`, `alamat`, `no_hp`) VALUES
(1, 'Agus Setiawan', 'agus1234@gmail.com', 'Dusun Manis RT 003 RW 002 Desa Legok', '087466616611'),
(4, 'Ros', 'ros123@gmail.com', 'Blok Cibuah Rt 005, Rw 003 Desa Nanggela', '087466266631'),
(5, 'Amsor', 'amsor321@gmail.com', 'Dusun Pahing Rt 002, Rw  002 Desa Cipancur', '081256789732'),
(6, 'Tuti', 'tutiawal@gmail.com', 'Dusun Manis RT 005 RW 003 Desa Cilimus', '085224271819'),
(8, 'Dodo', 'dodorosadi@gmail.com', 'Dusun Wage RT 007 RW 007 Desa Jalaksana', '084541451651'),
(9, 'Yanti Suryani', 'yanti6213@gmail.com', 'Dusun Pahing RT 002 RW 001 Desa Cidahu', '087762718121'),
(10, 'Mamat', 'mamat6278@gmail.com', 'Dusun Puhun RT 020  RW 008 Desa Cikaso', '089762627213'),
(13, 'Oneng', 'onengsj162@gmail.com', 'Dusun Wage TR 002 RW 001 Desa Cidahu', '087724891029'),
(14, 'Ujang', '-', 'Dusun Pahing RT 002 RW 002 Desa Cibulan', '085224216281'),
(15, 'Masud', '-', 'Dusun Puhun RT 001 RW 001 Desa Japara', '089283711282'),
(16, 'Tuti', '-', 'Dusun Manis RT 001 RW 003 Desa Cengal', '089982718121'),
(17, 'Tini', '-', 'Dusun Wage RT 002 RW 002 Desa Wano', '085224162918'),
(18, 'Riska', 'riska1992@gmail.com', 'Dusun Puhun RT 002 RW  002 Desa Rajagaluh', '085628172912'),
(19, 'Anah', '-', 'Dusun Pahing RT 003 RW 003 Desa Cikeleng', '085224172819'),
(20, 'Een', '-', 'Dusun Manis RT 002 RW 001 Desa Dukuh Dalem', '089928371821'),
(21, 'Esah', '-', 'Dusun Puhun RT 001 RW 004 Desa Garawangi', '087723819212'),
(22, 'Joko', '-', 'Dusun Wage RT 002 RW 002 Desa Lebakwangi', '089928394721'),
(23, 'Danang', 'danangdnr@gmail.com', 'Dusun Pahing RT 001 RW 001 Desa Ciarja', '085244261727'),
(24, 'Susan', 'susansmh982@gmail.com', 'Dusun Manis RT 006 RW 006 Desa Cilowa', '085627281845'),
(25, 'Ratna', 'ratnawt2983@gmail.com', 'Dusun Pahing RT 003 RW 003 Desa Cikeleng', '083928103728'),
(26, 'Iis', 'iistqmh@gmail.com', 'Dusun Pahing RT 001 RW 001 Desa Oleced', '089937462182'),
(27, 'Ika', 'ikarwti99@gmail.com', 'Dusun Pahing RT 001 RW 001 Desa Cikubangmulya', '087736238172'),
(28, 'Eloh', '-', 'Dusun Manis RT 003 RW 003 Desa Cihaur', '081212718290'),
(29, 'Mela', 'melasywt19@gmail.com', 'Dusun Manis RT 004 RW 002 Desa Cidahu', '083823713987'),
(30, 'Adit', 'aditkurniawan21@gmail.com', 'Dusun Puhun RT 002 RW 001 Desa Cikubangsari', '081212938102'),
(31, 'Udin', '-', 'Dusun Manis RT 003 RW 003 Desa Ancaran', '089938261834'),
(32, 'Dini Layla', 'dinilayla@gmail.com', 'Dusun Pahing RT 001 RW 001 Desa Ciawi', '087723816382'),
(33, 'Ani', 'anirsnwt42@gmail.com', 'Dusun 2 RT 003 RW 001 Desa Karangmuncang', '085224173873'),
(34, 'Lida', '-', 'Dusun 4 RT 002 RW 001 Desa Cileuleuy', '089923829374'),
(35, 'Amid', 'amidtahmid@gmail.com', 'Dusun 5 RT 021 RW 005 Desa Sidaraja', '083627391723'),
(36, 'Yunus', 'yunuskrnwn99@gmail.com', 'Dusun Wage RT 002 RW 002 Desa Peusing', '081212836352'),
(37, 'Uyat', 'uyatsytna1989@gmail.com', 'Dusun Puhun RT 017 RW 007 Desa Cigedang', '0899283816382'),
(38, 'Ikah', 'ikahmlyna1991@gmail.com', 'Dusun Wage RT 009 RW 009 Desa Cilaja', '087728261839'),
(39, 'Dian', 'dianirawati21@gmail.com', 'Dusun Manis RT 004 RW 004 Desa Cipancur', '087729387192'),
(40, 'Neneng', 'nenengnrjnh987@gmail.com', 'Dusun Pahing RT 001 RW 001 Desa Kertajaya', '089928362812'),
(41, 'Deni', 'denisetiabudi89@gmail.com', 'Dusun Puhun RT 005 RW 004 Desa Sayana', '081126739271'),
(42, 'Yayah', '-', 'Dusun 2 RT 004 RW 001 Desa Sukamukti', '089938862734'),
(43, 'Jajang', 'jajangnrjmn97@gmail.com', 'Dusun Pahing RT 001 RW 001 Desa Susukan', '085629371293'),
(44, 'Siti', '-', 'Dusun Manis RT 001 RW 002 Desa Ciomas', '085224172637'),
(45, 'Yuli', 'yuliani91@gmail.com', 'Dusun Wage RT 008 RW 007 Desa Pangkalan', '085224816394');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('Admin','Owner') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `email`, `username`, `password`, `role`) VALUES
(1, 'M. Irfan Hilmi', 'Cidahu', 'irfan', 'irfan123', 'Admin'),
(2, 'Asep Saepudin', 'saedpudin123@gmail.com', 'asep', 'asep123', 'Owner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tbl_nilai_detail`
--
ALTER TABLE `tbl_nilai_detail`
  ADD PRIMARY KEY (`id_nilai_detail`),
  ADD KEY `id_resaller` (`id_resaller`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_resaller` (`id_resaller`);

--
-- Indexes for table `tbl_resaller`
--
ALTER TABLE `tbl_resaller`
  ADD PRIMARY KEY (`id_resaller`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `tbl_nilai_detail`
--
ALTER TABLE `tbl_nilai_detail`
  MODIFY `id_nilai_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=481;

--
-- AUTO_INCREMENT for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `tbl_resaller`
--
ALTER TABLE `tbl_resaller`
  MODIFY `id_resaller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_nilai_detail`
--
ALTER TABLE `tbl_nilai_detail`
  ADD CONSTRAINT `tbl_nilai_detail_ibfk_1` FOREIGN KEY (`id_resaller`) REFERENCES `tbl_resaller` (`id_resaller`),
  ADD CONSTRAINT `tbl_nilai_detail_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `tbl_kriteria` (`id_kriteria`);

--
-- Constraints for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD CONSTRAINT `tbl_penjualan_ibfk_1` FOREIGN KEY (`id_resaller`) REFERENCES `tbl_resaller` (`id_resaller`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

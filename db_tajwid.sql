-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2021 at 06:08 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tajwid`
--

-- --------------------------------------------------------

--
-- Table structure for table `huruf`
--

CREATE TABLE `huruf` (
  `id_huruf` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `nama_huruf` varchar(7) CHARACTER SET latin1 NOT NULL,
  `hijaiyah` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `makhroj` varchar(30) CHARACTER SET latin1 NOT NULL,
  `sifat` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `huruf`
--

INSERT INTO `huruf` (`id_huruf`, `nama_huruf`, `hijaiyah`, `makhroj`, `sifat`) VALUES
('h01', 'Alif', 'ا', 'm1', ''),
('h02', 'Ba', 'ب', 'm16', ''),
('h03', 'Ta', 'ت', 'm12', ''),
('h04', 'Tsa', 'ث', 'm14', ''),
('h05', 'Jim', 'ج', 'm7', ''),
('h06', 'ha', 'ح', 'm3', ''),
('h07', 'Kho', 'خ', 'm4', ''),
('h08', 'Dal', 'د', 'm12', ''),
('h09', 'Dzal', 'ذ', 'm14', ''),
('h10', 'Ro', 'ر', 'm11', ''),
('h11', 'Zay', 'ز', 'm13', ''),
('h12', 'Sin', 'س', 'm13', ''),
('h13', 'Syin', 'ش', 'm7', ''),
('h14', 'Shod', 'ص', 'm13', ''),
('h15', 'Dhod', 'ض', 'm8', ''),
('h16', 'Tho', 'ط', 'm12', ''),
('h17', 'Zho', 'ظ', 'm14', ''),
('h18', 'Ain', 'ع', 'm3', ''),
('h19', 'Ghoin', 'غ', 'm4', ''),
('h20', 'Fa', 'ف', 'm15', ''),
('h21', 'Qof', 'ق', 'm5', ''),
('h22', 'Kaf', 'ك', 'm6', ''),
('h23', 'Lam', 'ل', 'm9', ''),
('h24', 'Mim', 'م', 'm16', ''),
('h25', 'nun', 'ن', 'm10', ''),
('h26', 'Waw', 'و', 'm16', ''),
('h27', 'Ha', 'ه', 'm2', ''),
('h28', 'hamzah', 'ء', 'm2', ''),
('h29', 'Ya', 'ي', 'm7', '');

-- --------------------------------------------------------

--
-- Table structure for table `makhroj`
--

CREATE TABLE `makhroj` (
  `id_makhroj` varchar(3) CHARACTER SET latin1 NOT NULL,
  `nama_makhroj` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `arti_makhroj` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tempat_makhroj` varchar(16) CHARACTER SET latin1 NOT NULL,
  `deskripsi` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `makhroj`
--

INSERT INTO `makhroj` (`id_makhroj`, `nama_makhroj`, `arti_makhroj`, `tempat_makhroj`, `deskripsi`) VALUES
('m1', 'Al-Jauf', 'Lubang Mulut', 'Al-Jauf', ''),
('m10', 'Thorful Lisani Tahtal makhroji', '', 'Al-Lisan', ''),
('m11', 'Dhorurrosil Lisani', '', 'Al-Lisan', ''),
('m12', 'Thorful Lisani Ma\'A Athrofis tsanayal Ulya', '', 'Al-Lisan', ''),
('m13', 'Thorful Lisani Wamin FauQis tsanayal Ulya', '', 'Al-Lisan', ''),
('m14', 'Thorful Lisani Ma\'A Athrofis tsanayal Ulya', '', 'Al-Lisan', ''),
('m15', 'Mimba\'A Nis Tsafatis Sufla Ma\'A Athrofis tsanayal ', '', 'Asy-Syafatain', ''),
('m16', 'Bainasyafatani', '', 'Asy-Syafatain', ''),
('m17', 'Al-Khoisum', '', 'Al-Khoisum', ''),
('m2', 'Aqshal halqi', 'Pangkal Tenggorokan', 'Al-Halaq', ''),
('m3', 'Wasthul halqi', 'Tengah Tenggorokan', 'Al-Halaq', ''),
('m4', 'Adnal halqiy', '', 'Al-Halaq', ''),
('m5', 'Aqshal Lisani Fauqu', '', 'Al-Lisan', ''),
('m6', 'Aqshal Lisani Asfalu', '', 'Al-Lisan', ''),
('m7', 'Wasthul Lisani', '', 'Al-Lisan', ''),
('m8', 'Hafatil Lisani Ma\'A Adrosi', '', 'Al-Lisan', ''),
('m9', 'Ad\'dnal Lisani Limun TaHaHa', '', 'Al-Lisan', '');

-- --------------------------------------------------------

--
-- Table structure for table `sifat`
--

CREATE TABLE `sifat` (
  `id_sifat` int(3) NOT NULL,
  `nama_sifat` enum('Jahr','Hams','Rikhwah','Syiddah','Istifal','Isti''la','Infitah','Ithbaq','Ishmat','Idzlaq','Tawassuth') CHARACTER SET latin1 NOT NULL,
  `jenis_sifat` enum('Mutadhodah','Ghoir Mutadhodah') CHARACTER SET latin1 NOT NULL,
  `id_huruf` varchar(3) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sifat`
--

INSERT INTO `sifat` (`id_sifat`, `nama_sifat`, `jenis_sifat`, `id_huruf`) VALUES
(1, 'Jahr', 'Mutadhodah', 'h01'),
(2, 'Rikhwah', 'Mutadhodah', 'h01'),
(3, 'Istifal', 'Mutadhodah', 'h01'),
(4, 'Infitah', 'Mutadhodah', 'h01'),
(5, 'Ishmat', 'Mutadhodah', 'h01'),
(6, 'Jahr', 'Mutadhodah', 'h02'),
(7, 'Syiddah', 'Mutadhodah', 'h02'),
(8, 'Istifal', 'Mutadhodah', 'h02'),
(9, 'Infitah', 'Mutadhodah', 'h02'),
(10, 'Idzlaq', 'Mutadhodah', 'h02'),
(11, 'Hams', 'Mutadhodah', 'h04'),
(12, 'Rikhwah', 'Mutadhodah', 'h04'),
(13, 'Istifal', 'Mutadhodah', 'h04'),
(14, 'Infitah', 'Mutadhodah', 'h04'),
(15, 'Ishmat', 'Mutadhodah', 'h04'),
(16, 'Hams', 'Mutadhodah', 'h03'),
(17, 'Syiddah', 'Mutadhodah', 'h03'),
(18, 'Istifal', 'Mutadhodah', 'h03'),
(19, 'Infitah', 'Mutadhodah', 'h03'),
(20, 'Ishmat', 'Mutadhodah', 'h03'),
(21, 'Jahr', 'Mutadhodah', 'h05'),
(22, 'Syiddah', 'Mutadhodah', 'h05'),
(23, 'Istifal', 'Mutadhodah', 'h05'),
(24, 'Infitah', 'Mutadhodah', 'h05'),
(25, 'Ishmat', 'Mutadhodah', 'h05'),
(26, 'Hams', 'Mutadhodah', 'h06'),
(27, 'Rikhwah', 'Mutadhodah', 'h06'),
(28, 'Istifal', 'Mutadhodah', 'h06'),
(29, 'Infitah', 'Mutadhodah', 'h06'),
(30, 'Ishmat', 'Mutadhodah', 'h06'),
(31, 'Hams', 'Mutadhodah', 'h07'),
(32, 'Rikhwah', 'Mutadhodah', 'h07'),
(33, 'Isti\'la', 'Mutadhodah', 'h07'),
(34, 'Infitah', 'Mutadhodah', 'h07'),
(35, 'Ishmat', 'Mutadhodah', 'h07'),
(36, 'Jahr', 'Mutadhodah', 'h08'),
(37, 'Syiddah', 'Mutadhodah', 'h08'),
(38, 'Istifal', 'Mutadhodah', 'h08'),
(39, 'Infitah', 'Mutadhodah', 'h08'),
(40, 'Ishmat', 'Mutadhodah', 'h08'),
(41, 'Jahr', 'Mutadhodah', 'h09'),
(42, 'Rikhwah', 'Mutadhodah', 'h09'),
(43, 'Istifal', 'Mutadhodah', 'h09'),
(44, 'Infitah', 'Mutadhodah', 'h09'),
(45, 'Ishmat', 'Mutadhodah', 'h09'),
(46, 'Jahr', 'Mutadhodah', 'h10'),
(47, 'Tawassuth', 'Mutadhodah', 'h10'),
(48, 'Istifal', 'Mutadhodah', 'h10'),
(49, 'Infitah', 'Mutadhodah', 'h10'),
(50, 'Idzlaq', 'Mutadhodah', 'h10'),
(51, 'Jahr', 'Mutadhodah', 'h11'),
(52, 'Rikhwah', 'Mutadhodah', 'h11'),
(53, 'Istifal', 'Mutadhodah', 'h11'),
(54, 'Infitah', 'Mutadhodah', 'h11'),
(55, 'Ishmat', 'Mutadhodah', 'h11'),
(56, 'Hams', 'Mutadhodah', 'h12'),
(57, 'Rikhwah', 'Mutadhodah', 'h12'),
(58, 'Istifal', 'Mutadhodah', 'h12'),
(59, 'Infitah', 'Mutadhodah', 'h12'),
(60, 'Ishmat', 'Mutadhodah', 'h12'),
(61, 'Hams', 'Mutadhodah', 'h13'),
(62, 'Rikhwah', 'Mutadhodah', 'h13'),
(63, 'Istifal', 'Mutadhodah', 'h13'),
(64, 'Infitah', 'Mutadhodah', 'h13'),
(65, 'Ishmat', 'Mutadhodah', 'h13'),
(66, 'Hams', 'Mutadhodah', 'h14'),
(67, 'Rikhwah', 'Mutadhodah', 'h14'),
(68, 'Isti\'la', 'Mutadhodah', 'h14'),
(69, 'Ithbaq', 'Mutadhodah', 'h14'),
(70, 'Ishmat', 'Mutadhodah', 'h14'),
(71, 'Jahr', 'Mutadhodah', 'h15'),
(72, 'Rikhwah', 'Mutadhodah', 'h15'),
(73, 'Isti\'la', 'Mutadhodah', 'h15'),
(74, 'Ithbaq', 'Mutadhodah', 'h15'),
(75, 'Ishmat', 'Mutadhodah', 'h15'),
(76, 'Jahr', 'Mutadhodah', 'h16'),
(77, 'Syiddah', 'Mutadhodah', 'h16'),
(78, 'Isti\'la', 'Mutadhodah', 'h16'),
(79, 'Ithbaq', 'Mutadhodah', 'h16'),
(80, 'Ishmat', 'Mutadhodah', 'h16'),
(81, 'Jahr', 'Mutadhodah', 'h17'),
(82, 'Rikhwah', 'Mutadhodah', 'h17'),
(83, 'Isti\'la', 'Mutadhodah', 'h17'),
(84, 'Ithbaq', 'Mutadhodah', 'h17'),
(85, 'Ishmat', 'Mutadhodah', 'h17'),
(86, 'Jahr', 'Mutadhodah', 'h18'),
(87, 'Rikhwah', 'Mutadhodah', 'h18'),
(88, 'Istifal', 'Mutadhodah', 'h18'),
(89, 'Infitah', 'Mutadhodah', 'h18'),
(90, 'Ishmat', 'Mutadhodah', 'h18'),
(91, 'Jahr', 'Mutadhodah', 'h19'),
(92, 'Rikhwah', 'Mutadhodah', 'h19'),
(93, 'Isti\'la', 'Mutadhodah', 'h19'),
(94, 'Infitah', 'Mutadhodah', 'h19'),
(95, 'Ishmat', 'Mutadhodah', 'h19'),
(96, 'Hams', 'Mutadhodah', 'h20'),
(97, 'Rikhwah', 'Mutadhodah', 'h20'),
(98, 'Istifal', 'Mutadhodah', 'h20'),
(99, 'Infitah', 'Mutadhodah', 'h20'),
(100, 'Idzlaq', 'Mutadhodah', 'h20'),
(101, 'Jahr', 'Mutadhodah', 'h21'),
(102, 'Syiddah', 'Mutadhodah', 'h21'),
(103, 'Isti\'la', 'Mutadhodah', 'h21'),
(104, 'Infitah', 'Mutadhodah', 'h21'),
(105, 'Ishmat', 'Mutadhodah', 'h21'),
(106, 'Hams', 'Mutadhodah', 'h22'),
(107, 'Syiddah', 'Mutadhodah', 'h22'),
(108, 'Istifal', 'Mutadhodah', 'h22'),
(109, 'Infitah', 'Mutadhodah', 'h22'),
(110, 'Ishmat', 'Mutadhodah', 'h22'),
(111, 'Jahr', 'Mutadhodah', 'h23'),
(112, 'Tawassuth', 'Mutadhodah', 'h23'),
(113, 'Istifal', 'Mutadhodah', 'h23'),
(114, 'Infitah', 'Mutadhodah', 'h23'),
(115, 'Idzlaq', 'Mutadhodah', 'h23'),
(116, 'Jahr', 'Mutadhodah', 'h24'),
(117, 'Tawassuth', 'Mutadhodah', 'h24'),
(118, 'Istifal', 'Mutadhodah', 'h24'),
(119, 'Infitah', 'Mutadhodah', 'h24'),
(120, 'Idzlaq', 'Mutadhodah', 'h24'),
(121, 'Jahr', 'Mutadhodah', 'h25'),
(122, 'Tawassuth', 'Mutadhodah', 'h25'),
(123, 'Istifal', 'Mutadhodah', 'h25'),
(124, 'Infitah', 'Mutadhodah', 'h25'),
(125, 'Idzlaq', 'Mutadhodah', 'h25'),
(126, 'Jahr', 'Mutadhodah', 'h26'),
(127, 'Rikhwah', 'Mutadhodah', 'h26'),
(128, 'Istifal', 'Mutadhodah', 'h26'),
(129, 'Infitah', 'Mutadhodah', 'h26'),
(130, 'Ishmat', 'Mutadhodah', 'h26'),
(131, 'Hams', 'Mutadhodah', 'h27'),
(132, 'Syiddah', 'Mutadhodah', 'h27'),
(133, 'Istifal', 'Mutadhodah', 'h27'),
(134, 'Infitah', 'Mutadhodah', 'h27'),
(135, 'Ishmat', 'Mutadhodah', 'h27'),
(136, 'Jahr', 'Mutadhodah', 'h28'),
(137, 'Syiddah', 'Mutadhodah', 'h28'),
(138, 'Istifal', 'Mutadhodah', 'h28'),
(139, 'Infitah', 'Mutadhodah', 'h28'),
(140, 'Ishmat', 'Mutadhodah', 'h28'),
(141, 'Jahr', 'Mutadhodah', 'h29'),
(142, 'Rikhwah', 'Mutadhodah', 'h29'),
(143, 'Istifal', 'Mutadhodah', 'h29'),
(144, 'Infitah', 'Mutadhodah', 'h29'),
(145, 'Ishmat', 'Mutadhodah', 'h29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `huruf`
--
ALTER TABLE `huruf`
  ADD PRIMARY KEY (`id_huruf`),
  ADD KEY `makhroj` (`makhroj`);

--
-- Indexes for table `makhroj`
--
ALTER TABLE `makhroj`
  ADD PRIMARY KEY (`id_makhroj`);

--
-- Indexes for table `sifat`
--
ALTER TABLE `sifat`
  ADD PRIMARY KEY (`id_sifat`),
  ADD KEY `id_huruf` (`id_huruf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sifat`
--
ALTER TABLE `sifat`
  MODIFY `id_sifat` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `huruf`
--
ALTER TABLE `huruf`
  ADD CONSTRAINT `huruf_ibfk_1` FOREIGN KEY (`makhroj`) REFERENCES `makhroj` (`id_makhroj`);

--
-- Constraints for table `sifat`
--
ALTER TABLE `sifat`
  ADD CONSTRAINT `sifat_ibfk_1` FOREIGN KEY (`id_huruf`) REFERENCES `huruf` (`id_huruf`),
  ADD CONSTRAINT `sifat_ibfk_2` FOREIGN KEY (`id_huruf`) REFERENCES `huruf` (`id_huruf`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

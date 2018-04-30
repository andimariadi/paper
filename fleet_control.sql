-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2018 at 05:42 AM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fleet_control`
--

-- --------------------------------------------------------

--
-- Table structure for table `dispatcher`
--

CREATE TABLE IF NOT EXISTS `dispatcher` (
`id` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `zip_code` int(10) NOT NULL,
  `about_me` text NOT NULL,
  `picture` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `dispatcher`
--

INSERT INTO `dispatcher` (`id`, `first_name`, `last_name`, `username`, `email`, `address`, `city`, `country`, `zip_code`, `about_me`, `picture`, `password`) VALUES
(1, 'ANDI', 'MARIADI', 'andimariadi', 'mariadi.andi@gmail.com', 'Tambang SIS', '', '', 0, '', '', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Table structure for table `dispatch_fleet`
--

CREATE TABLE IF NOT EXISTS `dispatch_fleet` (
`id` int(100) NOT NULL,
  `id_dispatch` int(10) NOT NULL,
  `id_fleet` int(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `dispatch_fleet`
--

INSERT INTO `dispatch_fleet` (`id`, `id_dispatch`, `id_fleet`) VALUES
(1, 1, 3),
(2, 1, 1),
(3, 1, 8),
(4, 1, 9),
(5, 1, 10),
(6, 1, 11),
(7, 1, 12),
(8, 1, 13),
(9, 1, 1),
(10, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `dump_spot`
--

CREATE TABLE IF NOT EXISTS `dump_spot` (
`id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `coal` float NOT NULL,
  `ob` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `enum`
--

CREATE TABLE IF NOT EXISTS `enum` (
`id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `refid` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `enum`
--

INSERT INTO `enum` (`id`, `name`, `type`, `refid`) VALUES
(1, 'RFU', 'status', 0),
(2, 'BS', 'status', 0),
(3, 'BUS', 'status', 0),
(4, 'STB', 'status', 0),
(5, 'CENTRAL', 'pit', 0),
(6, 'NORTH WEST', 'pit', 0),
(7, 'WARA', 'pit', 0),
(8, 'OB', 'material', 0),
(9, 'COAL', 'material', 0),
(10, 'MUD', 'material', 0),
(11, 'SPOIL', 'material', 0),
(12, 'GEN', 'material', 0),
(13, 'TOP SOIL', 'material', 0),
(14, 'NORTH 1', 'jalur', 6),
(15, 'NORTH 2', 'jalur', 6),
(16, 'NORTH 3', 'jalur', 6),
(17, 'NORTH 4', 'jalur', 6),
(18, 'WEST 1', 'jalur', 6),
(19, 'WEST 2', 'jalur', 6),
(20, 'CT2 OB1', 'jalur', 5),
(21, 'CT2 OB2', 'jalur', 5),
(22, 'IPD 1', 'jalur', 5),
(23, 'IPD 2', 'jalur', 5),
(24, 'CT1 HW', 'jalur', 5),
(25, 'WARA 1', 'jalur', 7),
(26, 'WARA 2', 'jalur', 7),
(27, 'WARA 3', 'jalur', 7),
(28, 'WARA 4', 'jalur', 7),
(29, 'WARA 5', 'jalur', 7),
(30, 'PIT 03', 'jalur', 7),
(31, 'EX PIT', 'jalur', 7),
(32, 'N1 + N2', 'area', 6),
(33, 'N3 + WEST', 'area', 6),
(34, 'NW COAL', 'area', 6),
(35, 'NW SPARE', 'area', 6),
(36, 'STB NW', 'area', 6),
(37, 'C1', 'area', 5),
(38, 'C2', 'area', 5),
(39, 'CT COAL', 'area', 5),
(40, 'CT SPARE', 'area', 5),
(41, 'STB CT', 'area', 5),
(42, 'WARA', 'area', 7),
(43, 'STB WR', 'area', 7),
(44, 'CAT777', 'type_hauler', 0),
(45, 'CAT785', 'type_hauler', 0),
(46, 'CAT789', 'type_hauler', 0),
(47, 'EH1700', 'type_hauler', 0),
(48, 'EH3500', 'type_hauler', 0),
(49, 'HD1500', 'type_hauler', 0),
(50, 'HD785', 'type_hauler', 0),
(51, 'HD785_DUCKTAIL', 'type_hauler', 0),
(52, 'HD785_JUMBO', 'type_hauler', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hauler_capacity`
--

CREATE TABLE IF NOT EXISTS `hauler_capacity` (
`id` int(10) NOT NULL,
  `type` varchar(25) NOT NULL,
  `coal` float NOT NULL,
  `ob` float NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `hauler_capacity`
--

INSERT INTO `hauler_capacity` (`id`, `type`, `coal`, `ob`) VALUES
(1, 'CAT777', 50, 42),
(2, 'CAT785', 72, 60),
(3, 'CAT789', 95, 80),
(4, 'EH1700', 50, 42),
(5, 'EH3500', 95, 80),
(6, 'HD1500', 90, 60),
(7, 'HD785', 50, 42),
(8, 'HD785_DUCKTAIL', 60, 42),
(9, 'HD785_JUMBO', 80, 42);

-- --------------------------------------------------------

--
-- Table structure for table `loading_time`
--

CREATE TABLE IF NOT EXISTS `loading_time` (
`id` int(100) NOT NULL,
  `type_loader` varchar(50) NOT NULL,
  `type_hauler` varchar(50) NOT NULL,
  `ob` float NOT NULL,
  `coal` float NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=122 ;

--
-- Dumping data for table `loading_time`
--

INSERT INTO `loading_time` (`id`, `type_loader`, `type_hauler`, `ob`, `coal`) VALUES
(1, 'EX5600 eSH', 'EH4000', 2.775, 6.5),
(2, 'EX5600 eSH', 'CAT793', 2.775, 6.5),
(3, 'EX5600 eSH', 'EH3500', 2.475, 6.5),
(4, 'EX5600 eSH', 'CAT789', 2.475, 6.5),
(5, 'EX5600 eSH', 'CAT785', 1.88, 6.5),
(6, 'EX5600 eSH', 'HD1500', 1.88, 6.5),
(7, 'EX5600 eSH', 'HD785', 1.285, 6.5),
(8, 'EX5600 eSH', 'EH1700', 1.285, 6.5),
(9, 'EX5600 eSH', 'CAT777', 1.285, 6.5),
(10, 'SH 4000', 'EH4000', 3.275, 6.5),
(11, 'SH 4000', 'CAT793', 3.275, 6.5),
(12, 'SH 4000', 'EH3500', 2.975, 6.5),
(13, 'SH 4000', 'CAT789', 2.975, 6.5),
(14, 'SH 4000', 'CAT785', 2.38, 6.5),
(15, 'SH 4000', 'HD1500', 2.38, 6.5),
(16, 'SH 4000', 'HD785', 1.785, 6.5),
(17, 'SH 4000', 'EH1700', 1.785, 6.5),
(18, 'SH 4000', 'CAT777', 1.785, 6.5),
(19, 'EX3600', 'EH4000', 3.275, 6.5),
(20, 'EX3600', 'CAT793', 3.275, 6.5),
(21, 'EX3600', 'EH3500', 2.975, 6.5),
(22, 'EX3600', 'CAT789', 2.975, 6.5),
(23, 'EX3600', 'CAT785', 2.38, 6.5),
(24, 'EX3600', 'HD1500', 2.38, 6.5),
(25, 'EX3600', 'HD785', 1.785, 6.5),
(26, 'EX3600', 'EH1700', 1.785, 6.5),
(27, 'EX3600', 'CAT777', 1.785, 6.5),
(28, 'LI R9400', 'EH4000', 3.275, 6.5),
(29, 'LI R9400', 'CAT793', 3.275, 6.5),
(30, 'LI R9400', 'EH3500', 2.975, 6.5),
(31, 'LI R9400', 'CAT789', 2.975, 6.5),
(32, 'LI R9400', 'CAT785', 2.38, 6.5),
(33, 'LI R9400', 'HD1500', 2.38, 6.5),
(34, 'LI R9400', 'HD785', 1.785, 6.5),
(35, 'LI R9400', 'EH1700', 1.785, 6.5),
(36, 'LI R9400', 'CAT777', 1.785, 6.5),
(37, 'LI R9350', 'EH4000', 3.275, 6.5),
(38, 'LI R9350', 'CAT793', 3.275, 6.5),
(39, 'LI R9350', 'EH3500', 3.57, 6.5),
(40, 'LI R9350', 'CAT789', 3.57, 6.5),
(41, 'LI R9350', 'CAT785', 2.38, 6.5),
(42, 'LI R9350', 'HD1500', 2.38, 6.5),
(43, 'LI R9350', 'HD785', 1.785, 6.5),
(44, 'LI R9350', 'EH1700', 1.785, 6.5),
(45, 'LI R9350', 'CAT777', 1.785, 6.5),
(46, 'LI R9250', 'EH4000', 5.165, 6.5),
(47, 'LI R9250', 'CAT793', 5.165, 6.5),
(48, 'LI R9250', 'EH3500', 4.165, 6.5),
(49, 'LI R9250', 'CAT789', 4.165, 6.5),
(50, 'LI R9250', 'CAT785', 2.975, 6.5),
(51, 'LI R9250', 'HD1500', 2.975, 6.5),
(52, 'LI R9250', 'HD785', 2.38, 6.5),
(53, 'LI R9250', 'EH1700', 2.38, 6.5),
(54, 'LI R9250', 'CAT777', 2.38, 6.5),
(55, 'PC3000', 'EH4000', 5.165, 6.5),
(56, 'PC3000', 'CAT793', 5.165, 6.5),
(57, 'PC3000', 'EH3500', 4.165, 6.5),
(58, 'PC3000', 'CAT789', 4.165, 6.5),
(59, 'PC3000', 'CAT785', 2.975, 6.5),
(60, 'PC3000', 'HD1500', 2.975, 6.5),
(61, 'PC3000', 'HD785', 2.38, 6.5),
(62, 'PC3000', 'EH1700', 2.38, 6.5),
(63, 'PC3000', 'CAT777', 2.38, 6.5),
(64, 'EX2500', 'EH4000', 5.165, 6.5),
(65, 'EX2500', 'CAT793', 5.165, 6.5),
(66, 'EX2500', 'EH3500', 4.165, 6.5),
(67, 'EX2500', 'CAT789', 4.165, 6.5),
(68, 'EX2500', 'CAT785', 2.975, 6.5),
(69, 'EX2500', 'HD1500', 2.975, 6.5),
(70, 'EX2500', 'HD785', 2.38, 6.5),
(71, 'EX2500', 'EH1700', 2.38, 6.5),
(72, 'EX2500', 'CAT777', 2.38, 6.5),
(73, 'PC2000', 'EH4000', 6.355, 6.5),
(74, 'PC2000', 'CAT793', 6.355, 6.5),
(75, 'PC2000', 'EH3500', 5.355, 6.5),
(76, 'PC2000', 'CAT789', 5.355, 6.5),
(77, 'PC2000', 'CAT785', 4.165, 6.5),
(78, 'PC2000', 'HD1500', 4.165, 6.5),
(79, 'PC2000', 'HD785', 2.975, 6.5),
(80, 'PC2000', 'EH1700', 2.975, 6.5),
(81, 'PC2000', 'CAT777', 2.975, 6.5),
(82, 'PC1250', 'EH4000', 7.255, 6.5),
(83, 'PC1250', 'CAT793', 7.255, 6.5),
(84, 'PC1250', 'EH3500', 6.255, 6.5),
(85, 'PC1250', 'CAT789', 6.255, 6.5),
(86, 'PC1250', 'CAT785', 5.065, 6.5),
(87, 'PC1250', 'HD1500', 5.065, 6.5),
(88, 'PC1250', 'HD785', 3.875, 6.5),
(89, 'PC1250', 'EH1700', 3.875, 6.5),
(90, 'PC1250', 'CAT777', 3.875, 6.5),
(91, 'EX1200', 'EH4000', 7.255, 6.5),
(92, 'EX1200', 'CAT793', 7.255, 6.5),
(93, 'EX1200', 'EH3500', 6.255, 6.5),
(94, 'EX1200', 'CAT789', 6.255, 6.5),
(95, 'EX1200', 'CAT785', 5.065, 6.5),
(96, 'EX1200', 'HD1500', 5.065, 6.5),
(97, 'EX1200', 'HD785', 3.875, 6.5),
(98, 'EX1200', 'EH1700', 3.875, 6.5),
(99, 'EX1200', 'CAT777', 3.875, 6.5),
(100, 'EX5600 eSH', 'HD785_JUMBO', 1.285, 6.5),
(101, 'SH 4000', 'HD785_JUMBO', 1.785, 6.5),
(102, 'EX3600', 'HD785_JUMBO', 1.785, 6.5),
(103, 'LI R9400', 'HD785_JUMBO', 1.785, 6.5),
(104, 'LI R9350', 'HD785_JUMBO', 1.785, 6.5),
(105, 'LI R9250', 'HD785_JUMBO', 2.38, 6.5),
(106, 'PC3000', 'HD785_JUMBO', 2.38, 6.5),
(107, 'EX2500', 'HD785_JUMBO', 2.38, 6.5),
(108, 'PC2000', 'HD785_JUMBO', 2.975, 6.5),
(109, 'PC1250', 'HD785_JUMBO', 3.875, 6.5),
(110, 'EX1200', 'HD785_JUMBO', 3.875, 6.5),
(111, 'EX5600 eSH', 'HD785_DUCKTAIL', 1.285, 6.5),
(112, 'SH 4000', 'HD785_DUCKTAIL', 1.785, 6.5),
(113, 'EX3600', 'HD785_DUCKTAIL', 1.785, 6.5),
(114, 'LI R9400', 'HD785_DUCKTAIL', 1.785, 6.5),
(115, 'LI R9350', 'HD785_DUCKTAIL', 1.785, 6.5),
(116, 'LI R9250', 'HD785_DUCKTAIL', 2.38, 6.5),
(117, 'PC3000', 'HD785_DUCKTAIL', 2.38, 6.5),
(118, 'EX2500', 'HD785_DUCKTAIL', 2.38, 6.5),
(119, 'PC2000', 'HD785_DUCKTAIL', 2.975, 6.5),
(120, 'PC1250', 'HD785_DUCKTAIL', 3.875, 6.5),
(121, 'EX1200', 'HD785_DUCKTAIL', 3.875, 6.5);

-- --------------------------------------------------------

--
-- Table structure for table `master_fleet`
--

CREATE TABLE IF NOT EXISTS `master_fleet` (
`id` int(100) NOT NULL,
  `id_fleet` int(100) NOT NULL,
  `cn_hauler` varchar(10) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `master_fleet`
--

INSERT INTO `master_fleet` (`id`, `id_fleet`, `cn_hauler`, `time`, `date`, `status`) VALUES
(1, 2, 'D5-002', '10:39:16', '2018-04-30', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `set_fleet`
--

CREATE TABLE IF NOT EXISTS `set_fleet` (
`id` int(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `shift` int(11) NOT NULL,
  `cn_loader` varchar(10) NOT NULL,
  `speed` float NOT NULL,
  `status` int(10) NOT NULL,
  `pit` int(10) NOT NULL,
  `jalur` int(10) NOT NULL,
  `area` int(10) NOT NULL,
  `material` int(10) NOT NULL,
  `disposal` varchar(100) NOT NULL,
  `coal_seam` varchar(10) NOT NULL,
  `coal_series` varchar(10) NOT NULL,
  `spv` varchar(100) NOT NULL,
  `gl_front` varchar(100) NOT NULL,
  `gl_disp` varchar(100) NOT NULL,
  `distance` int(10) NOT NULL,
  `refid` int(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `set_fleet`
--

INSERT INTO `set_fleet` (`id`, `date`, `time`, `shift`, `cn_loader`, `speed`, `status`, `pit`, `jalur`, `area`, `material`, `disposal`, `coal_seam`, `coal_series`, `spv`, `gl_front`, `gl_disp`, `distance`, `refid`) VALUES
(2, '2018-04-30', '10:02:55', 1, 'X7-012', 0, 1, 5, 20, 37, 8, '', '', '', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shoutbox`
--

CREATE TABLE IF NOT EXISTS `shoutbox` (
`id` int(10) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `shoutbox`
--

INSERT INTO `shoutbox` (`id`, `message`, `date`, `time`, `username`) VALUES
(1, 'ye', '2018-04-30', '11:31:41', 'andimariadi');

-- --------------------------------------------------------

--
-- Table structure for table `tbhauler`
--

CREATE TABLE IF NOT EXISTS `tbhauler` (
  `cn_hauler` varchar(10) NOT NULL,
  `type` varchar(100) NOT NULL,
  `fix_fleet` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbhauler`
--

INSERT INTO `tbhauler` (`cn_hauler`, `type`, `fix_fleet`) VALUES
('D3-006', '47', 'X2-028'),
('D3-007', '47', 'X2-028'),
('D3-012', '47', 'X2-028'),
('D3-013', '47', ''),
('D3-014', '47', ''),
('D3-015', '47', 'X2-028'),
('D3-045', '52', 'X4-003'),
('D3-046', '52', 'X4-003'),
('D3-047', '52', 'X4-003'),
('D3-049', '52', 'X4-021'),
('D3-053', '52', 'X4-021'),
('D3-054', '52', 'X4-014'),
('D3-058', '50', 'S6-003'),
('D3-063', '52', 'X2-050'),
('D3-064', '52', 'X4-021'),
('D3-065', '50', 'X4-007'),
('D3-067', '50', 'S6-003'),
('D3-076', '50', 'X2-053'),
('D3-078', '50', 'X2-053'),
('D3-079', '50', 'X2-053'),
('D3-081', '52', 'X4-001'),
('D3-084', '52', 'X4-001'),
('D3-085', '52', 'X4-024'),
('D3-086', '52', 'X4-024'),
('D3-087', '52', 'X4-022'),
('D3-088', '52', 'X4-001'),
('D3-091', '52', 'X4-011'),
('D3-092', '51', 'S6-003'),
('D3-093', '51', 'S6-003'),
('D3-094', '52', 'X4-011'),
('D3-095', '52', 'X4-011'),
('D3-096', '51', 'S6-003'),
('D3-097', '52', 'X4-022'),
('D3-098', '51', 'S6-003'),
('D3-099', '52', 'X2-050'),
('D3-100', '52', 'X4-012'),
('D3-101', '52', 'X4-012'),
('D3-102', '52', 'X4-012'),
('D3-108', '52', 'X4-018'),
('D3-109', '52', 'X4-018'),
('D3-110', '52', 'X2-048'),
('D3-111', '50', 'X4-006'),
('D3-112', '52', 'X4-018'),
('D3-113', '52', 'X2-048'),
('D3-114', '50', 'X5-012'),
('D3-115', '50', 'X4-006'),
('D3-116', '50', 'X4-006'),
('D3-117', '50', 'X4-006'),
('D3-118', '50', 'X4-006'),
('D3-119', '50', 'X4-006'),
('D3-120', '51', ''),
('D3-121', '50', 'X4-006'),
('D3-122', '50', 'X4-006'),
('D3-123', '50', 'X4-006'),
('D3-124', '50', 'X4-006'),
('D3-125', '50', 'S6-003'),
('D3-126', '50', 'S6-003'),
('D3-127', '50', 'S6-003'),
('D3-128', '50', 'S6-003'),
('D3-129', '50', 'S6-003'),
('D3-130', '50', 'X2-043'),
('D3-131', '50', 'X2-043'),
('D3-132', '52', 'X4-002'),
('D3-133', '52', 'X4-002'),
('D3-134', '50', 'X5-009'),
('D3-135', '50', 'X5-009'),
('D3-136', '50', 'X5-009'),
('D3-137', '50', 'X4-007'),
('D3-138', '50', 'X5-009'),
('D3-139', '50', 'X2-043'),
('D3-140', '52', 'X2-050'),
('D3-145', '50', 'X4-005'),
('D3-146', '50', 'X4-007'),
('D3-147', '50', 'X4-015'),
('D3-148', '50', 'X5-012'),
('D3-149', '50', 'X4-015'),
('D3-150', '50', 'X4-015'),
('D3-151', '50', 'X4-015'),
('D3-152', '50', 'X4-015'),
('D3-154', '50', 'X4-015'),
('D3-163', '50', 'X4-006'),
('D3-166', '50', 'X5-009'),
('D3-167', '50', 'X4-006'),
('D3-169', '51', 'S6-003'),
('D3-170', '50', 'X4-005'),
('D3-177', '50', 'X4-007'),
('D3-178', '52', 'X4-002'),
('D3-179', '52', 'X4-022'),
('D3-180', '50', 'X4-015'),
('D3-181', '50', 'X4-015'),
('D3-182', '50', 'X4-015'),
('D3-183', '50', 'X4-023'),
('D3-186', '50', 'X4-015'),
('D3-214', '50', 'X4-005'),
('D3-215', '50', 'X4-007'),
('D3-219', '52', 'X2-048'),
('D3-221', '44', 'X4-010'),
('D3-222', '44', 'X4-010'),
('D3-223', '44', 'X4-010'),
('D3-224', '44', 'X4-010'),
('D3-225', '44', 'X4-010'),
('D3-226', '44', 'X4-010'),
('D3-227', '44', 'X4-010'),
('D3-228', '44', 'X4-010'),
('D3-229', '44', ''),
('D3-230', '44', 'X4-010'),
('D3-231', '44', 'X4-010'),
('D3-232', '44', 'X4-010'),
('D3-233', '44', 'X4-010'),
('D3-234', '44', 'X4-014'),
('D3-235', '44', 'X4-014'),
('D3-241', '50', 'X5-012'),
('D3-242', '50', 'X5-012'),
('D3-243', '50', 'X5-012'),
('D3-244', '50', 'X5-012'),
('D3-245', '52', 'X4-009'),
('D3-246', '52', 'X4-009'),
('D3-247', '52', 'X4-009'),
('D3-248', '52', 'X4-009'),
('D3-249', '50', 'X5-012'),
('D3-250', '50', 'X5-012'),
('D3-254', '50', 'X5-012'),
('D3-256', '50', 'X5-012'),
('D3-257', '50', 'X5-012'),
('D3-258', '50', 'X5-012'),
('D3-259', '44', 'X2-052'),
('D3-260', '44', 'X2-052'),
('D3-262', '44', 'X2-052'),
('D3-264', '44', 'X2-052'),
('D3-266', '44', 'X2-060'),
('D3-267', '44', ''),
('D3-269', '44', 'X2-060'),
('D3-271', '44', ''),
('D3-272', '44', 'X2-057'),
('D3-273', '44', 'X2-057'),
('D3-274', '44', 'X2-057'),
('D3-277', '44', 'X5-009'),
('D3-279', '44', 'X5-009'),
('D3-280', '44', 'X5-009'),
('D3-281', '44', 'X5-009'),
('D3-282', '44', 'X5-009'),
('D3-285', '44', 'X5-009'),
('D3-286', '44', 'X4-031'),
('D3-287', '44', 'X4-031'),
('D3-288', '44', 'X4-031'),
('D3-289', '44', 'X4-031'),
('D3-290', '44', 'X4-031'),
('D3-291', '44', 'X4-031'),
('D3-292', '44', 'X4-031'),
('D3-293', '44', 'X4-031'),
('D3-294', '44', 'X4-031'),
('D3-295', '44', 'X2-059'),
('D3-303', '44', 'X2-056'),
('D3-304', '44', 'X2-056'),
('D3-305', '44', 'X2-056'),
('D3-307', '44', 'X2-056'),
('D3-308', '44', 'X5-009'),
('D3-310', '44', 'X4-024'),
('D3-311', '44', 'X2-059'),
('D3-319', '50', 'X4-007'),
('D3-355', '44', 'X4-023'),
('D3-356', '44', 'X4-023'),
('D3-357', '44', 'X4-023'),
('D3-358', '44', 'X4-023'),
('D3-359', '44', 'X4-023'),
('D3-360', '44', 'X4-023'),
('D3-362', '44', 'X4-023'),
('D3-363', '44', 'X4-023'),
('D3-364', '44', 'X4-023'),
('D3-371', '45', 'X2-028'),
('D4-001', '45', 'S7-002'),
('D4-002', '45', 'S7-002'),
('D4-003', '45', 'S7-002'),
('D4-004', '45', 'S7-002'),
('D4-005', '45', 'S7-002'),
('D4-006', '45', 'S7-002'),
('D4-007', '45', 'S7-002'),
('D4-008', '45', 'S7-002'),
('D4-009', '45', 'S7-002'),
('D4-010', '45', 'S7-002'),
('D4-011', '45', 'S7-002'),
('D4-012', '45', 'S7-002'),
('D4-013', '45', 'X5-036'),
('D4-014', '45', 'X5-036'),
('D4-015', '49', 'S7-002'),
('D4-016', '49', 'S7-002'),
('D4-017', '49', 'S7-002'),
('D4-018', '49', 'X4-014'),
('D4-019', '49', 'X4-014'),
('D4-020', '49', 'X4-014'),
('D4-021', '49', 'X7-004'),
('D4-022', '49', 'X7-004'),
('D4-023', '49', 'X7-004'),
('D4-024', '49', 'X7-004'),
('D4-025', '49', 'X7-004'),
('D4-026', '49', 'X7-004'),
('D4-027', '49', 'X7-004'),
('D4-028', '49', 'X7-004'),
('D4-029', '49', 'X7-004'),
('D4-030', '49', 'X7-004'),
('D4-031', '45', 'X5-036'),
('D4-032', '45', 'X5-036'),
('D4-033', '45', 'X5-036'),
('D4-034', '45', 'X5-036'),
('D4-035', '49', 'X7-004'),
('D4-036', '49', 'X7-004'),
('D4-037', '49', 'X7-004'),
('D4-038', '49', 'X5-008'),
('D4-039', '49', 'X5-008'),
('D4-040', '49', 'X5-008'),
('D4-041', '49', 'X5-008'),
('D4-042', '49', 'X5-008'),
('D4-043', '49', 'X5-008'),
('D4-044', '49', 'X5-008'),
('D4-045', '49', 'X5-008'),
('D4-046', '49', 'X5-008'),
('D4-047', '45', 'X5-036'),
('D4-048', '45', 'X5-036'),
('D4-049', '45', 'X5-036'),
('D4-050', '45', 'X7-002'),
('D4-051', '45', 'X7-002'),
('D4-052', '45', 'X7-002'),
('D4-053', '45', 'X7-002'),
('D4-054', '45', 'X7-002'),
('D4-055', '45', 'X7-002'),
('D4-056', '45', 'X7-002'),
('D4-057', '45', 'X7-002'),
('D4-058', '45', 'X7-002'),
('D4-059', '45', 'X7-002'),
('D4-060', '45', 'X7-002'),
('D4-061', '45', ''),
('D4-062', '45', 'X7-002'),
('D4-063', '45', 'X7-002'),
('D4-064', '45', 'X7-002'),
('D4-065', '45', 'X7-002'),
('D4-066', '45', ''),
('D4-067', '45', 'X7-007'),
('D4-068', '45', 'X7-007'),
('D4-069', '45', 'X7-007'),
('D4-070', '45', 'X7-007'),
('D4-071', '45', 'X7-007'),
('D4-072', '45', 'X7-007'),
('D4-073', '45', ''),
('D4-074', '45', 'X7-007'),
('D4-075', '45', 'X7-007'),
('D4-076', '45', 'X7-007'),
('D4-077', '45', 'X7-007'),
('D4-078', '49', 'X7-005'),
('D4-079', '49', ''),
('D4-080', '49', 'X7-005'),
('D4-081', '49', 'X7-005'),
('D4-082', '49', 'X7-005'),
('D4-083', '49', 'X7-005'),
('D4-084', '49', 'X7-005'),
('D4-085', '49', 'X7-005'),
('D4-086', '49', 'X7-005'),
('D4-087', '49', 'X7-005'),
('D4-088', '49', 'X7-005'),
('D4-089', '49', 'X7-005'),
('D4-090', '49', 'X7-005'),
('D4-091', '49', 'X7-005'),
('D4-092', '49', 'X7-005'),
('D4-093', '49', 'X5-011'),
('D4-094', '49', 'X5-011'),
('D4-095', '49', 'X5-011'),
('D4-096', '49', 'X5-011'),
('D4-097', '49', ''),
('D4-098', '49', 'X5-011'),
('D4-099', '49', 'X5-011'),
('D4-100', '49', 'X5-011'),
('D4-101', '49', 'X5-011'),
('D4-102', '49', 'X5-011'),
('D4-103', '49', 'X5-011'),
('D5-001', '46', 'X7-003'),
('D5-002', '46', 'X7-003'),
('D5-003', '46', 'X7-003'),
('D5-004', '46', 'X7-003'),
('D5-005', '46', 'X7-003'),
('D5-006', '46', 'X7-003'),
('D5-007', '46', 'X7-003'),
('D5-008', '46', 'X7-003'),
('D5-009', '46', 'X7-003'),
('D5-010', '46', 'X7-003'),
('D5-011', '48', 'X7-008'),
('D5-012', '48', ''),
('D5-013', '48', 'X7-008'),
('D5-014', '48', 'X7-008'),
('D5-015', '48', 'X7-008'),
('D5-016', '48', 'X7-008'),
('D5-017', '48', 'X7-008'),
('D5-018', '48', 'X7-008'),
('D5-019', '48', 'X7-008'),
('D5-020', '48', 'X7-008'),
('D5-021', '48', 'X7-008'),
('D5-022', '48', 'X7-008'),
('D5-023', '48', 'X7-008'),
('D5-024', '48', 'X7-003'),
('D5-025', '48', 'X7-003'),
('D5-026', '46', 'X7-007'),
('D5-027', '46', 'X7-007'),
('D5-028', '46', 'X7-007'),
('D5-029', '46', 'X7-007'),
('D5-030', '46', 'X7-007'),
('D5-031', '46', ''),
('D5-032', '46', 'X7-006'),
('D5-033', '46', 'X7-006'),
('D5-034', '46', 'X7-006'),
('D5-035', '46', ''),
('D5-036', '46', 'X7-006'),
('D5-037', '46', 'X7-006'),
('D5-038', '46', 'X7-006'),
('D5-039', '46', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbloader`
--

CREATE TABLE IF NOT EXISTS `tbloader` (
  `cn_jigsaw` varchar(10) NOT NULL,
  `type` varchar(100) NOT NULL,
  `old_eqp` varchar(100) NOT NULL,
  `model` varchar(10) NOT NULL,
  `ellipse_eqp` varchar(100) NOT NULL,
  `ob` int(10) NOT NULL,
  `coal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbloader`
--

INSERT INTO `tbloader` (`cn_jigsaw`, `type`, `old_eqp`, `model`, `ellipse_eqp`, `ob`, `coal`) VALUES
('S5-001', 'LI R9250', 'R9250-SH01', 'R9250', 'SH250-0001', 950, 800),
('S6-001', 'LI R9350', 'R9350-SH01', 'R9350', 'SH300-0001A', 1250, 1000),
('S6-002', 'LI R9350', 'R9350-SH02', 'R9350', 'SH300-0002A', 1250, 1000),
('S6-003', 'LI R9350', 'R9350-SH03', 'R9350', 'SH300-0003A', 1250, 1000),
('S6-004', 'LI R9350', 'R9350-SH04', 'R9350', 'SH300-0004A', 1250, 1000),
('S7-001', 'EX3600 SH', 'PC4000 SH01', 'PC4000', 'SH350-0001A', 1440, 1150),
('S7-002', 'SH 4000', 'PC4000 SH02', 'PC4000', 'SH350-0002A', 1440, 1150),
('S7-003', 'SH 4000', 'PC4000 SH03', 'PC4000', 'SH350-0003A', 1440, 1150),
('X0-003', 'CAT330', 'CAT330-003', 'CAT330', 'EX030-0003', 0, 0),
('X0-004', 'CAT330', 'CAT330-004', 'CAT330', 'EX030-0004', 0, 0),
('X0-005', 'CAT330', 'CAT330-005', 'CAT330', 'EX030-0005', 0, 0),
('X0-006', 'ZX350H-5G', 'ZX350-006', 'ZX350', 'EX030-0006', 0, 0),
('X0-007', 'ZX350H-5G', 'ZX350-007', 'ZX350', 'EX030-0007', 0, 0),
('X0-008', 'CAT336DL', 'CAT336-008', 'CAT336', 'EX030-0008', 0, 0),
('X0-009', 'CAT336DL', 'CAT336-009', 'CAT336', 'EX030-0009', 0, 0),
('X0-010', 'CAT336DL', 'CAT336-010', 'CAT336', 'EX030-0010', 0, 0),
('X0-011', 'CAT336DL', 'CAT336-011', 'CAT336', 'EX030-0011', 0, 0),
('X0-012', 'CAT336DL', 'CAT336-012', 'CAT336', 'EX030-0012', 0, 0),
('X0-019', 'CAT320', 'CAT320-019', 'CAT320', 'EX020-0019', 0, 0),
('X0-020', 'CAT320', 'CAT320-020', 'CAT320', 'EX020-0020', 0, 0),
('X1-008', 'CAT336', 'CAT336-008', 'CAT336', 'EX030 - 0008', 350, 300),
('X1-009', 'CAT336', 'CAT336-009', 'CAT336', 'EX030 - 0009', 350, 300),
('X1-010', 'CAT336', 'CAT336-010', 'CAT336', 'EX030 - 0010', 350, 300),
('X1-014', 'PC800', 'EX800-14', 'EX800', 'EX080-0014', 350, 300),
('X1-020', 'CAT375L', 'CAT375-020', 'CAT375', 'EX080-0020', 350, 300),
('X1-021', 'CAT385', 'CAT385-021', 'CAT385', 'EX080-0021', 350, 300),
('X1-022', 'CAT385', 'CAT785-022', 'CAT785', 'EX080-0022', 350, 300),
('X1-023', 'CAT5110B', 'CAT11-023', 'CAT11', 'EX080-0023', 350, 300),
('X2-007', 'PC1250', 'PC1250-047', 'PC1250', 'EX120-0007', 450, 400),
('X2-015', 'PC1250', 'PC1250-015', 'PC1250', 'EX120-0015', 450, 400),
('X2-025', 'PC1250', 'PC1250-025', 'PC1250', 'EX120-0025', 450, 400),
('X2-028', 'PC1250', 'PC1250-028', 'PC1250', 'EX120-0028', 450, 400),
('X2-029', 'PC1250', 'PC1250-029', 'PC1250', 'EX120-0029', 450, 400),
('X2-033', 'PC1250', 'PC1250-033', 'PC1250', 'EX120-0033', 450, 400),
('X2-037', 'PC1250', 'PC1250-37', 'PC1250', 'EX120-0037A', 450, 400),
('X2-038', 'PC1250', 'PC1250-038', 'PC1250', 'EX120-0038A', 450, 400),
('X2-043', 'PC1250', 'PC1250-043', 'PC1250', 'EX120-0043', 450, 400),
('X2-048', 'PC1250', 'PC1250-048', 'PC1250', 'EX120-0048', 450, 400),
('X2-049', 'EX1200', 'EX1200-049', 'EX1200', 'EX020-0009', 450, 400),
('X2-050', 'EX1200', 'EX1200-050', 'EX1200', 'EX120-0050', 450, 400),
('X2-051', 'PC1250', 'KOCORAN', '', 'EX120-0051', 450, 400),
('X2-052', 'PC1250', 'PC1250-052', 'PC1250', 'EX120-0052', 450, 400),
('X2-053', 'PC1250', 'PC1250-053', 'PC1250', 'EX120-0053', 450, 400),
('X2-055', 'EX1200', 'EX1200-055', 'EX1200', 'EX020-0055', 450, 400),
('X2-056', 'LI R9100', 'R9100-56', 'R9100', 'EX120-0056', 450, 400),
('X2-057', 'LI R984', 'R984-057', 'R984', 'EX120-0057', 450, 400),
('X2-058', 'LI R984', 'R984-058', 'R984', 'EX120-0058', 450, 400),
('X2-059', 'LI R984', 'R984-059', 'R984', 'EX120-0059', 450, 400),
('X2-060', 'LI R984', 'R984-060', 'R984', 'EX120-0060', 450, 400),
('X2-061', 'LI R984', 'R984-061', 'R984', 'EX120-0061', 450, 400),
('X2-062', 'LI R984', 'R984-062', 'R984', 'EX120-0062', 450, 400),
('X2-063', 'PC1250', 'PC1250-063', 'PC1250', 'EX120-0063', 450, 400),
('X2-064', 'PC1250', 'PC1250-064', 'PC1250', 'EX120-0064', 450, 400),
('X2-065', 'PC1250', 'PC1250-065', 'PC1250', 'EX120-0065', 450, 400),
('X3-002', '', '', '', '', 0, 0),
('X3-003', '', '', '', '', 0, 0),
('X4-001', 'PC2000', 'PC2000-072', 'PC2000', 'EX200-0001', 750, 650),
('X4-002', 'PC2000', 'PC2000-073', 'PC2000', 'EX200-0002', 750, 650),
('X4-003', 'PC2000', 'PC2000-074', 'PC2000', 'EX200-0003', 750, 650),
('X4-004', 'PC2000', 'PC2000-093', 'PC2000', 'EX200-0004', 750, 650),
('X4-005', 'PC2000', 'PC2000-102', 'PC2000', 'EX200-0005', 750, 650),
('X4-006', 'PC2000', 'PC2000-103', 'PC2000', 'EX200-0006', 750, 650),
('X4-007', 'PC2000', 'PC2000-106', 'PC2000', 'EX200-0007', 750, 650),
('X4-008', 'PC2000', 'PC2000-08', 'PC2000', 'EX200-0008', 750, 650),
('X4-009', 'PC2000', 'PC2000-108', 'PC2000', 'EX200-0009', 750, 650),
('X4-010', 'PC2000', 'PC2000-109', 'PC2000', 'EX200-0010', 750, 650),
('X4-011', 'PC2000', 'PC2000-146', 'PC2000', 'EX200-0011', 750, 650),
('X4-012', 'PC2000', 'PC2000-012', 'PC2000', 'EX200-0012A', 750, 650),
('X4-014', 'PC2000', 'PC2000-014', 'PC2000', 'EX200-0014A', 750, 650),
('X4-015', 'PC2000', 'PC2000-015', 'PC2000', 'EX200-0015A', 750, 650),
('X4-018', 'PC2000', 'PC2000-018', 'PC2000', 'EX200-0018A', 750, 650),
('X4-021', 'PC2000', 'PC2000-021', 'PC2000', 'EX200-0021A', 750, 650),
('X4-022', 'PC2000', 'PC2000-022', 'PC2000', 'EX200-0022A', 750, 650),
('X4-023', 'PC2000', 'PC2000-023', 'PC2000', 'EX200-0023A', 750, 650),
('X4-024', 'PC2000', 'PC2000-024', 'PC2000', 'EX200-0024A', 750, 650),
('X4-026', 'PC2000', 'PC2000-026', 'PC2000', 'EX200-0026A', 750, 650),
('X4-027', 'PC2000', 'PC2000-027', 'PC2000', 'EX200-0027', 750, 650),
('X4-030', 'LI R994', 'R994-030', 'R994', 'EX200-0032', 650, 650),
('X4-031', 'LI R994', 'R994-031', 'R994', 'EX200-0031', 650, 650),
('X4-032', 'LI R994', 'R994-032', 'R994', 'EX200-0032', 650, 650),
('X4-033', 'LI R994', 'R994-033', 'R994', 'EX200-0033', 650, 650),
('X5-001', 'LI R9250', 'R9250-01', 'R9250', 'EX250-0001', 950, 800),
('X5-002', 'PC3000', 'PC3000-091', 'PC3000', 'EX250-0002', 950, 800),
('X5-003', 'PC3000', 'EX2500-03', 'EX2500', 'EX250-0003', 950, 800),
('X5-004', 'PC3000', 'EX2500-04', 'EX2500', 'EX250-0004', 950, 800),
('X5-005', 'PC3000', 'EX2500-05', 'EX2500', 'EX250-0005', 950, 800),
('X5-006', 'EX2500', 'EX2500-104', 'EX2500', 'EX250-0006', 950, 800),
('X5-007', 'EX2500', 'EX2500-105', 'EX2500', 'EX250-0007', 950, 800),
('X5-008', 'LI R9250', 'R9250-08', 'R9250', 'EX250-0008A', 950, 800),
('X5-009', 'EX2500', 'EX2500-09', 'EX2500', 'EX250-0009', 950, 800),
('X5-010', 'LI R9250', 'R9250-10', 'R9250', 'EX250-0010', 950, 800),
('X5-011', 'LI R9250', 'R9250-11', 'R9250', 'EX250-0011', 950, 800),
('X5-012', 'EX2500', 'R9250-12', 'R9250', 'EX250-0012', 950, 800),
('X5-035', 'LI R9200', 'R9200-035', 'R9200', 'EX200-0035', 950, 800),
('X5-036', 'LI R9200', 'R9200-036', 'R9200', 'EX200-0036', 950, 800),
('X7-001', 'EX3600', 'EX3600-01', 'EX3600', 'EX350-0001A', 1440, 1150),
('X7-002', 'EX3600', 'EX3600-02', 'EX3600', 'EX350-0002A', 1440, 1150),
('X7-003', 'EX3600', 'EX3600-03', 'EX3600', 'EX350-0003A', 1440, 1150),
('X7-004', 'LI R9400', 'R9400-04', 'R9400', 'EX350-0004A', 1440, 1150),
('X7-005', 'LI R9400', 'R9400-05', 'R9400', 'EX350-0005A', 1440, 1150),
('X7-006', 'LI R9400', 'R9400-06', 'R9400', 'EX350-0006A', 1440, 1150),
('X7-007', 'LI R9400', 'R9400-07', 'R9400', 'EX350-0007A', 1440, 1150),
('X7-008', 'EX3600', 'EX3600-08', 'EX3600', 'EX350-0008A', 1440, 1150),
('X7-009', 'EX3600', 'EX3600-09', 'EX3600', 'EX350-0009A', 1440, 1150),
('X7-010', 'EX3600', 'EX3600-10', 'EX3600', 'EX350-0010A', 1440, 1150),
('X7-011', 'LI R9400', 'R9400-011', 'R9400', 'EX350-0011', 1440, 1150),
('X7-012', 'LI R9400', 'R9400-012', 'R9400', 'EX350-0012', 1440, 1150);

-- --------------------------------------------------------

--
-- Table structure for table `travel_speed`
--

CREATE TABLE IF NOT EXISTS `travel_speed` (
`id` int(100) NOT NULL,
  `id_jalur` int(10) NOT NULL,
  `coal` float NOT NULL,
  `ob` float NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `travel_speed`
--

INSERT INTO `travel_speed` (`id`, `id_jalur`, `coal`, `ob`) VALUES
(1, 14, 19, 20.8194),
(2, 15, 19, 20.8194),
(3, 16, 19, 19.8731),
(4, 17, 19, 17.9804),
(5, 18, 19, 18.9268),
(6, 19, 19, 18.9268),
(7, 20, 19, 22.1439),
(8, 21, 19, 21.1675),
(9, 22, 19, 21.1374),
(10, 23, 19, 20.6635),
(11, 24, 19, 21.1374),
(12, 25, 18, 20.2882),
(13, 26, 18, 19.8246),
(14, 27, 18, 19.8246),
(15, 28, 18, 19.8246),
(16, 29, 18, 18.5936),
(17, 30, 18, 20.2882),
(18, 31, 18, 19.8246);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dispatcher`
--
ALTER TABLE `dispatcher`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dispatch_fleet`
--
ALTER TABLE `dispatch_fleet`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dump_spot`
--
ALTER TABLE `dump_spot`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enum`
--
ALTER TABLE `enum`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hauler_capacity`
--
ALTER TABLE `hauler_capacity`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loading_time`
--
ALTER TABLE `loading_time`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_fleet`
--
ALTER TABLE `master_fleet`
 ADD PRIMARY KEY (`id`), ADD KEY `id_fleet` (`id_fleet`), ADD KEY `cn_hauler` (`cn_hauler`);

--
-- Indexes for table `set_fleet`
--
ALTER TABLE `set_fleet`
 ADD PRIMARY KEY (`id`), ADD KEY `cn_hauler` (`cn_loader`,`status`,`jalur`), ADD KEY `status` (`status`), ADD KEY `jalur` (`jalur`), ADD KEY `pit` (`pit`);

--
-- Indexes for table `shoutbox`
--
ALTER TABLE `shoutbox`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbhauler`
--
ALTER TABLE `tbhauler`
 ADD PRIMARY KEY (`cn_hauler`), ADD KEY `fix_fleet` (`fix_fleet`);

--
-- Indexes for table `tbloader`
--
ALTER TABLE `tbloader`
 ADD PRIMARY KEY (`cn_jigsaw`);

--
-- Indexes for table `travel_speed`
--
ALTER TABLE `travel_speed`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dispatcher`
--
ALTER TABLE `dispatcher`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dispatch_fleet`
--
ALTER TABLE `dispatch_fleet`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `dump_spot`
--
ALTER TABLE `dump_spot`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `enum`
--
ALTER TABLE `enum`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `hauler_capacity`
--
ALTER TABLE `hauler_capacity`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `loading_time`
--
ALTER TABLE `loading_time`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=122;
--
-- AUTO_INCREMENT for table `master_fleet`
--
ALTER TABLE `master_fleet`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `set_fleet`
--
ALTER TABLE `set_fleet`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `shoutbox`
--
ALTER TABLE `shoutbox`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `travel_speed`
--
ALTER TABLE `travel_speed`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

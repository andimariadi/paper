-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 29, 2018 at 04:35 PM
-- Server version: 5.5.29
-- PHP Version: 5.3.10-1ubuntu3.26

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
  `id` int(10) NOT NULL AUTO_INCREMENT,
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
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
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
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `id_dispatch` int(10) NOT NULL,
  `id_fleet` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

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
(9, 1, 14),
(10, 1, 15),
(11, 1, 16),
(12, 1, 17),
(13, 1, 18),
(14, 1, 19);

-- --------------------------------------------------------

--
-- Table structure for table `dump_spot`
--

CREATE TABLE IF NOT EXISTS `dump_spot` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `coal` float NOT NULL,
  `ob` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `enum`
--

CREATE TABLE IF NOT EXISTS `enum` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `refid` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

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
(43, 'STB WR', 'area', 7);

-- --------------------------------------------------------

--
-- Table structure for table `hauler_capacity`
--

CREATE TABLE IF NOT EXISTS `hauler_capacity` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` varchar(25) NOT NULL,
  `coal` float NOT NULL,
  `ob` float NOT NULL,
  PRIMARY KEY (`id`)
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
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `type_loader` varchar(50) NOT NULL,
  `type_hauler` varchar(50) NOT NULL,
  `ob` float NOT NULL,
  `coal` float NOT NULL,
  PRIMARY KEY (`id`)
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
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `id_fleet` int(100) NOT NULL,
  `cn_hauler` varchar(10) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_fleet` (`id_fleet`),
  KEY `cn_hauler` (`cn_hauler`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `master_fleet`
--

INSERT INTO `master_fleet` (`id`, `id_fleet`, `cn_hauler`, `time`, `date`, `status`) VALUES
(1, 1, 'D4-001', '13:19:54', '2018-04-26', 'available'),
(2, 1, 'D4-002', '13:19:59', '2018-04-26', 'available'),
(3, 1, 'D4-003', '13:20:02', '2018-04-26', 'available'),
(4, 1, 'D4-004', '13:20:07', '2018-04-26', 'available'),
(5, 1, 'D4-006', '13:20:12', '2018-04-26', 'available'),
(6, 1, 'D4-008', '13:20:19', '2018-04-26', 'available'),
(7, 1, 'D4-009', '13:20:25', '2018-04-26', 'available'),
(8, 1, 'D4-013', '13:20:37', '2018-04-26', 'available'),
(10, 1, 'D4-019', '14:59:31', '2018-04-26', 'available'),
(11, 1, 'D4-029', '14:59:43', '2018-04-26', 'available'),
(12, 1, 'D4-034', '14:59:50', '2018-04-26', 'available'),
(13, 1, 'D4-043', '14:59:55', '2018-04-26', 'available'),
(14, 1, 'D4-044', '15:00:00', '2018-04-26', 'available'),
(15, 1, 'D4-046', '15:00:04', '2018-04-26', 'available'),
(16, 1, 'D4-086', '15:00:11', '2018-04-26', 'available'),
(17, 1, 'D4-087', '15:00:15', '2018-04-26', 'available'),
(18, 1, 'D4-100', '15:00:21', '2018-04-26', 'available'),
(19, 1, 'D4-102', '15:00:25', '2018-04-26', 'available'),
(21, 1, 'D4-102', '16:00:25', '2018-04-26', 'delete'),
(22, 2, 'D3-006', '18:19:17', '2018-04-27', 'available'),
(23, 2, 'D3-007', '01:19:19', '2018-04-28', 'available'),
(24, 2, 'D3-012', '02:19:21', '2018-04-28', 'available'),
(25, 3, 'D5-003', '08:59:38', '2018-04-28', 'available'),
(26, 3, 'D5-004', '08:59:44', '2018-04-28', 'available'),
(27, 3, 'D5-005', '08:59:45', '2018-04-28', 'available'),
(28, 3, 'D5-038', '08:59:57', '2018-04-28', 'available'),
(29, 8, 'D3-006', '11:50:52', '2018-04-28', 'delete'),
(30, 8, 'D3-063', '14:12:34', '2018-04-28', 'delete'),
(31, 9, 'D3-006', '12:12:19', '2018-04-29', 'available'),
(32, 9, 'D3-006', '12:12:20', '2018-04-29', 'available'),
(33, 9, 'D3-012', '12:12:21', '2018-04-29', 'available'),
(34, 9, 'D3-015', '12:12:22', '2018-04-29', 'available'),
(35, 9, 'D3-047', '12:12:24', '2018-04-29', 'available'),
(36, 10, 'D3-013', '14:30:23', '2018-04-29', 'available'),
(37, 10, 'D3-049', '14:30:25', '2018-04-29', 'available'),
(38, 10, 'D3-064', '14:30:27', '2018-04-29', 'available'),
(39, 19, 'D5-011', '14:33:24', '2018-04-29', 'available'),
(40, 19, 'D5-013', '14:33:35', '2018-04-29', 'available'),
(41, 19, 'D5-016', '14:33:57', '2018-04-29', 'available'),
(42, 19, 'D5-017', '14:34:02', '2018-04-29', 'available'),
(43, 19, 'D5-018', '14:34:06', '2018-04-29', 'available'),
(44, 19, 'D5-019', '14:34:10', '2018-04-29', 'available'),
(45, 19, 'D5-021', '14:34:16', '2018-04-29', 'available'),
(46, 19, 'D5-022', '14:34:19', '2018-04-29', 'available'),
(47, 19, 'D5-024', '14:34:23', '2018-04-29', 'available'),
(48, 19, 'D5-025', '14:34:26', '2018-04-29', 'available'),
(49, 19, 'D5-015', '14:34:27', '2018-04-29', 'available'),
(50, 19, 'D5-015', '15:30:00', '2018-04-29', 'delete'),
(51, 0, '', '00:00:00', '0000-00-00', 'delete'),
(52, 0, '', '00:00:00', '0000-00-00', 'delete'),
(53, 48, '', '00:00:00', '0000-00-00', 'delete'),
(54, 48, '', '00:00:00', '0000-00-00', 'delete'),
(55, 48, '', '00:00:00', '0000-00-00', 'delete'),
(56, 48, '', '00:00:00', '0000-00-00', 'delete'),
(58, 19, 'D5-024', '16:04:08', '2018-04-29', 'delete'),
(59, 19, 'D5-022', '16:04:54', '2018-04-29', 'delete'),
(60, 19, 'D5-011', '16:06:10', '2018-04-29', 'delete'),
(61, 19, 'D5-013', '16:06:11', '2018-04-29', 'delete'),
(62, 19, 'D5-016', '16:06:11', '2018-04-29', 'delete'),
(63, 19, 'D5-017', '16:06:11', '2018-04-29', 'delete'),
(64, 19, 'D5-018', '16:06:11', '2018-04-29', 'delete'),
(65, 19, 'D5-019', '16:06:11', '2018-04-29', 'delete'),
(66, 19, 'D5-021', '16:06:12', '2018-04-29', 'delete'),
(67, 19, 'D5-021', '16:06:13', '2018-04-29', 'delete'),
(68, 19, 'D5-021', '16:06:14', '2018-04-29', 'delete'),
(69, 19, 'D5-021', '16:06:14', '2018-04-29', 'delete'),
(70, 19, 'D5-021', '16:06:15', '2018-04-29', 'delete'),
(71, 19, 'D5-021', '16:06:15', '2018-04-29', 'delete'),
(72, 19, 'D5-025', '16:07:21', '2018-04-29', 'delete'),
(73, 19, 'D5-012', '16:10:19', '2018-04-29', 'available'),
(74, 19, 'D5-015', '16:31:26', '2018-04-29', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `set_fleet`
--

CREATE TABLE IF NOT EXISTS `set_fleet` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
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
  `refid` int(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cn_hauler` (`cn_loader`,`status`,`jalur`),
  KEY `status` (`status`),
  KEY `jalur` (`jalur`),
  KEY `pit` (`pit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `set_fleet`
--

INSERT INTO `set_fleet` (`id`, `date`, `time`, `shift`, `cn_loader`, `speed`, `status`, `pit`, `jalur`, `area`, `material`, `disposal`, `coal_seam`, `coal_series`, `spv`, `gl_front`, `gl_disp`, `distance`, `refid`) VALUES
(1, '2018-04-26', '11:00:22', 1, 'X7-004', 21.2, 1, 5, 21, 37, 8, 'C2OB_RL+108', '', '', 'HERMANTO', 'HERMANTO', 'ENGGAL', 6450, 0),
(2, '2018-04-27', '09:05:38', 2, 'X5-036', 21.9, 1, 5, 21, 37, 8, 'OB_1', '', '', 'OB_1', 'OB_1', 'OB_1', 9808, 0),
(3, '2018-04-28', '08:58:21', 1, 'X7-006', 20, 1, 6, 19, 33, 8, 'W2_RL+48', '', '', 'MBAH LURAH', 'ALI', 'ADNAN', 1726, 0),
(8, '2018-04-28', '10:39:32', 1, 'X7-012', 20, 1, 5, 20, 37, 8, '', '', '', '', '', '', 1897, 0),
(19, '2018-04-29', '14:33:14', 1, 'X7-003', 21.82, 1, 6, 14, 32, 8, 'DN1OB_RL+075', '', '', 'SURYA', 'FERDYANSYAH', 'NGASRAN', 6384, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbhauler`
--

CREATE TABLE IF NOT EXISTS `tbhauler` (
  `cn_hauler` varchar(10) NOT NULL,
  `type` varchar(100) NOT NULL,
  `fix_fleet` varchar(10) NOT NULL,
  PRIMARY KEY (`cn_hauler`),
  KEY `fix_fleet` (`fix_fleet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbhauler`
--

INSERT INTO `tbhauler` (`cn_hauler`, `type`, `fix_fleet`) VALUES
('D3-006', 'EH1700', 'X2-028'),
('D3-007', 'EH1700', 'X2-028'),
('D3-012', 'EH1700', 'X2-028'),
('D3-013', 'EH1700', ''),
('D3-014', 'EH1700', ''),
('D3-015', 'EH1700', 'X2-028'),
('D3-045', 'HD785_JUMBO', 'X4-003'),
('D3-046', 'HD785_JUMBO', 'X4-003'),
('D3-047', 'HD785_JUMBO', 'X4-003'),
('D3-049', 'HD785_JUMBO', 'X4-021'),
('D3-053', 'HD785_JUMBO', 'X4-021'),
('D3-054', 'HD785_JUMBO', 'X4-014'),
('D3-058', 'HD785', 'S6-003'),
('D3-063', 'HD785_JUMBO', 'X2-050'),
('D3-064', 'HD785_JUMBO', 'X4-021'),
('D3-065', 'HD785', 'X4-007'),
('D3-067', 'HD785', 'S6-003'),
('D3-076', 'HD785', 'X2-053'),
('D3-078', 'HD785', 'X2-053'),
('D3-079', 'HD785', 'X2-053'),
('D3-081', 'HD785_JUMBO', 'X4-001'),
('D3-084', 'HD785_JUMBO', 'X4-001'),
('D3-085', 'HD785_JUMBO', 'X4-024'),
('D3-086', 'HD785_JUMBO', 'X4-024'),
('D3-087', 'HD785_JUMBO', 'X4-022'),
('D3-088', 'HD785_JUMBO', 'X4-001'),
('D3-091', 'HD785_JUMBO', 'X4-011'),
('D3-092', 'HD785_DUCKTAIL', 'S6-003'),
('D3-093', 'HD785_DUCKTAIL', 'S6-003'),
('D3-094', 'HD785_JUMBO', 'X4-011'),
('D3-095', 'HD785_JUMBO', 'X4-011'),
('D3-096', 'HD785_DUCKTAIL', 'S6-003'),
('D3-097', 'HD785_JUMBO', 'X4-022'),
('D3-098', 'HD785_DUCKTAIL', 'S6-003'),
('D3-099', 'HD785_JUMBO', 'X2-050'),
('D3-100', 'HD785_JUMBO', 'X4-012'),
('D3-101', 'HD785_JUMBO', 'X4-012'),
('D3-102', 'HD785_JUMBO', 'X4-012'),
('D3-108', 'HD785_JUMBO', 'X4-018'),
('D3-109', 'HD785_JUMBO', 'X4-018'),
('D3-110', 'HD785_JUMBO', 'X2-048'),
('D3-111', 'HD785', 'X4-006'),
('D3-112', 'HD785_JUMBO', 'X4-018'),
('D3-113', 'HD785_JUMBO', 'X2-048'),
('D3-114', 'HD785', 'X5-012'),
('D3-115', 'HD785', 'X4-006'),
('D3-116', 'HD785', 'X4-006'),
('D3-117', 'HD785', 'X4-006'),
('D3-118', 'HD785', 'X4-006'),
('D3-119', 'HD785', 'X4-006'),
('D3-120', 'HD785_DUCKTAIL', ''),
('D3-121', 'HD785', 'X4-006'),
('D3-122', 'HD785', 'X4-006'),
('D3-123', 'HD785', 'X4-006'),
('D3-124', 'HD785', 'X4-006'),
('D3-125', 'HD785', 'S6-003'),
('D3-126', 'HD785', 'S6-003'),
('D3-127', 'HD785', 'S6-003'),
('D3-128', 'HD785', 'S6-003'),
('D3-129', 'HD785', 'S6-003'),
('D3-130', 'HD785', 'X2-043'),
('D3-131', 'HD785', 'X2-043'),
('D3-132', 'HD785_JUMBO', 'X4-002'),
('D3-133', 'HD785_JUMBO', 'X4-002'),
('D3-134', 'HD785', 'X5-009'),
('D3-135', 'HD785', 'X5-009'),
('D3-136', 'HD785', 'X5-009'),
('D3-137', 'HD785', 'X4-007'),
('D3-138', 'HD785', 'X5-009'),
('D3-139', 'HD785', 'X2-043'),
('D3-140', 'HD785_JUMBO', 'X2-050'),
('D3-145', 'HD785', 'X4-005'),
('D3-146', 'HD785', 'X4-007'),
('D3-147', 'HD785', 'X4-015'),
('D3-148', 'HD785', 'X5-012'),
('D3-149', 'HD785', 'X4-015'),
('D3-150', 'HD785', 'X4-015'),
('D3-151', 'HD785', 'X4-015'),
('D3-152', 'HD785', 'X4-015'),
('D3-154', 'HD785', 'X4-015'),
('D3-163', 'HD785', 'X4-006'),
('D3-166', 'HD785', 'X5-009'),
('D3-167', 'HD785', 'X4-006'),
('D3-169', 'HD785_DUCKTAIL', 'S6-003'),
('D3-170', 'HD785', 'X4-005'),
('D3-177', 'HD785', 'X4-007'),
('D3-178', 'HD785_JUMBO', 'X4-002'),
('D3-179', 'HD785_JUMBO', 'X4-022'),
('D3-180', 'HD785', 'X4-015'),
('D3-181', 'HD785', 'X4-015'),
('D3-182', 'HD785', 'X4-015'),
('D3-183', 'HD785', 'X4-023'),
('D3-186', 'HD785', 'X4-015'),
('D3-214', 'HD785', 'X4-005'),
('D3-215', 'HD785', 'X4-007'),
('D3-219', 'HD785_JUMBO', 'X2-048'),
('D3-221', 'CAT777', 'X4-010'),
('D3-222', 'CAT777', 'X4-010'),
('D3-223', 'CAT777', 'X4-010'),
('D3-224', 'CAT777', 'X4-010'),
('D3-225', 'CAT777', 'X4-010'),
('D3-226', 'CAT777', 'X4-010'),
('D3-227', 'CAT777', 'X4-010'),
('D3-228', 'CAT777', 'X4-010'),
('D3-229', 'CAT777', ''),
('D3-230', 'CAT777', 'X4-010'),
('D3-231', 'CAT777', 'X4-010'),
('D3-232', 'CAT777', 'X4-010'),
('D3-233', 'CAT777', 'X4-010'),
('D3-234', 'CAT777', 'X4-014'),
('D3-235', 'CAT777', 'X4-014'),
('D3-241', 'HD785', 'X5-012'),
('D3-242', 'HD785', 'X5-012'),
('D3-243', 'HD785', 'X5-012'),
('D3-244', 'HD785', 'X5-012'),
('D3-245', 'HD785_JUMBO', 'X4-009'),
('D3-246', 'HD785_JUMBO', 'X4-009'),
('D3-247', 'HD785_JUMBO', 'X4-009'),
('D3-248', 'HD785_JUMBO', 'X4-009'),
('D3-249', 'HD785', 'X5-012'),
('D3-250', 'HD785', 'X5-012'),
('D3-254', 'HD785', 'X5-012'),
('D3-256', 'HD785', 'X5-012'),
('D3-257', 'HD785', 'X5-012'),
('D3-258', 'HD785', 'X5-012'),
('D3-259', 'CAT777', 'X2-052'),
('D3-260', 'CAT777', 'X2-052'),
('D3-262', 'CAT777', 'X2-052'),
('D3-264', 'CAT777', 'X2-052'),
('D3-266', 'CAT777', 'X2-060'),
('D3-267', 'CAT777', ''),
('D3-269', 'CAT777', 'X2-060'),
('D3-271', 'CAT777', ''),
('D3-272', 'CAT777', 'X2-057'),
('D3-273', 'CAT777', 'X2-057'),
('D3-274', 'CAT777', 'X2-057'),
('D3-277', 'CAT777', 'X5-009'),
('D3-279', 'CAT777', 'X5-009'),
('D3-280', 'CAT777', 'X5-009'),
('D3-281', 'CAT777', 'X5-009'),
('D3-282', 'CAT777', 'X5-009'),
('D3-285', 'CAT777', 'X5-009'),
('D3-286', 'CAT777', 'X4-031'),
('D3-287', 'CAT777', 'X4-031'),
('D3-288', 'CAT777', 'X4-031'),
('D3-289', 'CAT777', 'X4-031'),
('D3-290', 'CAT777', 'X4-031'),
('D3-291', 'CAT777', 'X4-031'),
('D3-292', 'CAT777', 'X4-031'),
('D3-293', 'CAT777', 'X4-031'),
('D3-294', 'CAT777', 'X4-031'),
('D3-295', 'CAT777', 'X2-059'),
('D3-303', 'CAT777', 'X2-056'),
('D3-304', 'CAT777', 'X2-056'),
('D3-305', 'CAT777', 'X2-056'),
('D3-307', 'CAT777', 'X2-056'),
('D3-308', 'CAT777', 'X5-009'),
('D3-310', 'CAT777', 'X4-024'),
('D3-311', 'CAT777', 'X2-059'),
('D3-319', 'HD785', 'X4-007'),
('D3-355', 'CAT777', 'X4-023'),
('D3-356', 'CAT777', 'X4-023'),
('D3-357', 'CAT777', 'X4-023'),
('D3-358', 'CAT777', 'X4-023'),
('D3-359', 'CAT777', 'X4-023'),
('D3-360', 'CAT777', 'X4-023'),
('D3-362', 'CAT777', 'X4-023'),
('D3-363', 'CAT777', 'X4-023'),
('D3-364', 'CAT777', 'X4-023'),
('D4-001', 'CAT785', 'S7-002'),
('D4-002', 'CAT785', 'S7-002'),
('D4-003', 'CAT785', 'S7-002'),
('D4-004', 'CAT785', 'S7-002'),
('D4-005', 'CAT785', 'S7-002'),
('D4-006', 'CAT785', 'S7-002'),
('D4-007', 'CAT785', 'S7-002'),
('D4-008', 'CAT785', 'S7-002'),
('D4-009', 'CAT785', 'S7-002'),
('D4-010', 'CAT785', 'S7-002'),
('D4-011', 'CAT785', 'S7-002'),
('D4-012', 'CAT785', 'S7-002'),
('D4-013', 'CAT785', 'X5-036'),
('D4-014', 'CAT785', 'X5-036'),
('D4-015', 'HD1500', 'S7-002'),
('D4-016', 'HD1500', 'S7-002'),
('D4-017', 'HD1500', 'S7-002'),
('D4-018', 'HD1500', 'X4-014'),
('D4-019', 'HD1500', 'X4-014'),
('D4-020', 'HD1500', 'X4-014'),
('D4-021', 'HD1500', 'X7-004'),
('D4-022', 'HD1500', 'X7-004'),
('D4-023', 'HD1500', 'X7-004'),
('D4-024', 'HD1500', 'X7-004'),
('D4-025', 'HD1500', 'X7-004'),
('D4-026', 'HD1500', 'X7-004'),
('D4-027', 'HD1500', 'X7-004'),
('D4-028', 'HD1500', 'X7-004'),
('D4-029', 'HD1500', 'X7-004'),
('D4-030', 'HD1500', 'X7-004'),
('D4-031', 'CAT785', 'X5-036'),
('D4-032', 'CAT785', 'X5-036'),
('D4-033', 'CAT785', 'X5-036'),
('D4-034', 'CAT785', 'X5-036'),
('D4-035', 'HD1500', 'X7-004'),
('D4-036', 'HD1500', 'X7-004'),
('D4-037', 'HD1500', 'X7-004'),
('D4-038', 'HD1500', 'X5-008'),
('D4-039', 'HD1500', 'X5-008'),
('D4-040', 'HD1500', 'X5-008'),
('D4-041', 'HD1500', 'X5-008'),
('D4-042', 'HD1500', 'X5-008'),
('D4-043', 'HD1500', 'X5-008'),
('D4-044', 'HD1500', 'X5-008'),
('D4-045', 'HD1500', 'X5-008'),
('D4-046', 'HD1500', 'X5-008'),
('D4-047', 'CAT785', 'X5-036'),
('D4-048', 'CAT785', 'X5-036'),
('D4-049', 'CAT785', 'X5-036'),
('D4-050', 'CAT785', 'X7-002'),
('D4-051', 'CAT785', 'X7-002'),
('D4-052', 'CAT785', 'X7-002'),
('D4-053', 'CAT785', 'X7-002'),
('D4-054', 'CAT785', 'X7-002'),
('D4-055', 'CAT785', 'X7-002'),
('D4-056', 'CAT785', 'X7-002'),
('D4-057', 'CAT785', 'X7-002'),
('D4-058', 'CAT785', 'X7-002'),
('D4-059', 'CAT785', 'X7-002'),
('D4-060', 'CAT785', 'X7-002'),
('D4-061', 'CAT785', ''),
('D4-062', 'CAT785', 'X7-002'),
('D4-063', 'CAT785', 'X7-002'),
('D4-064', 'CAT785', 'X7-002'),
('D4-065', 'CAT785', 'X7-002'),
('D4-066', 'CAT785', ''),
('D4-067', 'CAT785', 'X7-007'),
('D4-068', 'CAT785', 'X7-007'),
('D4-069', 'CAT785', 'X7-007'),
('D4-070', 'CAT785', 'X7-007'),
('D4-071', 'CAT785', 'X7-007'),
('D4-072', 'CAT785', 'X7-007'),
('D4-073', 'CAT785', ''),
('D4-074', 'CAT785', 'X7-007'),
('D4-075', 'CAT785', 'X7-007'),
('D4-076', 'CAT785', 'X7-007'),
('D4-077', 'CAT785', 'X7-007'),
('D4-078', 'HD1500', 'X7-005'),
('D4-079', 'HD1500', ''),
('D4-080', 'HD1500', 'X7-005'),
('D4-081', 'HD1500', 'X7-005'),
('D4-082', 'HD1500', 'X7-005'),
('D4-083', 'HD1500', 'X7-005'),
('D4-084', 'HD1500', 'X7-005'),
('D4-085', 'HD1500', 'X7-005'),
('D4-086', 'HD1500', 'X7-005'),
('D4-087', 'HD1500', 'X7-005'),
('D4-088', 'HD1500', 'X7-005'),
('D4-089', 'HD1500', 'X7-005'),
('D4-090', 'HD1500', 'X7-005'),
('D4-091', 'HD1500', 'X7-005'),
('D4-092', 'HD1500', 'X7-005'),
('D4-093', 'HD1500', 'X5-011'),
('D4-094', 'HD1500', 'X5-011'),
('D4-095', 'HD1500', 'X5-011'),
('D4-096', 'HD1500', 'X5-011'),
('D4-097', 'HD1500', ''),
('D4-098', 'HD1500', 'X5-011'),
('D4-099', 'HD1500', 'X5-011'),
('D4-100', 'HD1500', 'X5-011'),
('D4-101', 'HD1500', 'X5-011'),
('D4-102', 'HD1500', 'X5-011'),
('D4-103', 'HD1500', 'X5-011'),
('D5-001', 'CAT789', 'X7-003'),
('D5-002', 'CAT789', 'X7-003'),
('D5-003', 'CAT789', 'X7-003'),
('D5-004', 'CAT789', 'X7-003'),
('D5-005', 'CAT789', 'X7-003'),
('D5-006', 'CAT789', 'X7-003'),
('D5-007', 'CAT789', 'X7-003'),
('D5-008', 'CAT789', 'X7-003'),
('D5-009', 'CAT789', 'X7-003'),
('D5-010', 'CAT789', 'X7-003'),
('D5-011', 'EH3500', 'X7-008'),
('D5-012', 'EH3500', ''),
('D5-013', 'EH3500', 'X7-008'),
('D5-014', 'EH3500', 'X7-008'),
('D5-015', 'EH3500', 'X7-008'),
('D5-016', 'EH3500', 'X7-008'),
('D5-017', 'EH3500', 'X7-008'),
('D5-018', 'EH3500', 'X7-008'),
('D5-019', 'EH3500', 'X7-008'),
('D5-020', 'EH3500', 'X7-008'),
('D5-021', 'EH3500', 'X7-008'),
('D5-022', 'EH3500', 'X7-008'),
('D5-023', 'EH3500', 'X7-008'),
('D5-024', 'EH3500', 'X7-003'),
('D5-025', 'EH3500', 'X7-003'),
('D5-026', 'CAT789', 'X7-007'),
('D5-027', 'CAT789', 'X7-007'),
('D5-028', 'CAT789', 'X7-007'),
('D5-029', 'CAT789', 'X7-007'),
('D5-030', 'CAT789', 'X7-007'),
('D5-031', 'CAT789', ''),
('D5-032', 'CAT789', 'X7-006'),
('D5-033', 'CAT789', 'X7-006'),
('D5-034', 'CAT789', 'X7-006'),
('D5-035', 'CAT789', ''),
('D5-036', 'CAT789', 'X7-006'),
('D5-037', 'CAT789', 'X7-006'),
('D5-038', 'CAT789', 'X7-006'),
('D5-039', 'CAT789', '');

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
  `coal` int(10) NOT NULL,
  PRIMARY KEY (`cn_jigsaw`)
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
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `id_jalur` int(10) NOT NULL,
  `coal` float NOT NULL,
  `ob` float NOT NULL,
  PRIMARY KEY (`id`)
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

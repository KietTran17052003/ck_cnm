-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2025 at 10:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `savoriarestaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `ban`
--

CREATE TABLE `ban` (
  `idban` int(11) NOT NULL,
  `soghe` int(11) NOT NULL,
  `vitri` varchar(110) DEFAULT NULL,
  `trangthai` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tenkh` varchar(200) DEFAULT NULL,
  `ngaydatban` datetime DEFAULT NULL,
  `sdt` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ban`
--

INSERT INTO `ban` (`idban`, `soghe`, `vitri`, `trangthai`, `id_user`, `tenkh`, `ngaydatban`, `sdt`) VALUES
(1, 4, '1', 0, NULL, NULL, NULL, NULL),
(2, 6, '1', 0, NULL, NULL, NULL, NULL),
(3, 8, '2', 0, NULL, NULL, NULL, NULL),
(4, 4, '1', 0, NULL, NULL, NULL, NULL),
(5, 6, '4', 0, NULL, NULL, NULL, NULL),
(6, 8, '2', 0, NULL, NULL, NULL, NULL),
(7, 4, '4', 0, NULL, NULL, NULL, NULL),
(8, 6, '1', 0, NULL, NULL, NULL, NULL),
(9, 8, '3', 0, NULL, NULL, NULL, NULL),
(10, 4, '3', 0, NULL, NULL, NULL, NULL),
(11, 6, '1', 0, NULL, NULL, NULL, NULL),
(12, 8, '4', 0, NULL, NULL, NULL, NULL),
(13, 4, '4', 0, NULL, NULL, NULL, NULL),
(14, 6, '4', 0, NULL, NULL, NULL, NULL),
(15, 8, '3', 0, NULL, NULL, NULL, NULL),
(16, 4, '3', 0, NULL, NULL, NULL, NULL),
(17, 6, '2', 0, NULL, NULL, NULL, NULL),
(18, 8, '2', 0, NULL, NULL, NULL, NULL),
(19, 4, '2', 0, NULL, NULL, NULL, NULL),
(20, 6, '3', 1, 2, NULL, '2025-05-17 16:32:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chatbox`
--

CREATE TABLE `chatbox` (
  `id_chat` int(11) NOT NULL,
  `cauhoi` varchar(1000) DEFAULT NULL,
  `cautraloi` varchar(1000) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `thoigian` datetime DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chatbox`
--

INSERT INTO `chatbox` (`id_chat`, `cauhoi`, `cautraloi`, `id_user`, `thoigian`, `id_role`, `is_read`) VALUES
(1, 'help me', NULL, 2, '2025-05-19 12:06:13', 4, 1),
(2, 'hi', NULL, 2, '2025-05-19 12:07:40', 4, 1),
(3, 'hello', NULL, 2, '2025-05-19 12:07:44', 4, 1),
(23, 'ádf', NULL, 5, '2025-05-19 13:22:57', 1, 0),
(24, 'ádf', NULL, 5, '2025-05-19 13:24:27', 1, 0),
(25, 'ádf', NULL, 5, '2025-05-19 13:29:13', 1, 0),
(26, '312312', NULL, 5, '2025-05-19 13:29:37', 1, 0),
(27, '231231', NULL, 5, '2025-05-19 13:30:49', 1, 0),
(28, '1231', NULL, 5, '2025-05-19 13:32:30', 1, 0),
(29, 'me m', NULL, 5, '2025-05-19 13:36:01', 1, 0),
(30, 'ádf', '', 5, '2025-05-19 13:42:22', 1, 0),
(31, '', 'test123', 5, '2025-05-19 18:44:15', 1, 0),
(32, '123123', '', 5, '2025-05-19 13:49:36', 1, 0),
(33, 'ádfasfd', '', 5, '2025-05-19 13:50:27', 1, 0),
(34, 'ádfas', '', 5, '2025-05-19 13:50:43', 1, 0),
(35, 'ádf', '', 5, '2025-05-19 14:01:56', 1, 0),
(36, 'mem ', '', 5, '2025-05-19 14:04:31', 1, 0),
(37, 'ádfsa', '', 5, '2025-05-19 14:04:50', 1, 0),
(38, '', 'mẹ m', 2, '2025-05-19 14:13:36', 1, 0),
(39, 'cc', '', 2, '2025-05-19 14:16:05', 4, 1),
(40, '', 'giởn mặt t hả m', 2, '2025-05-19 14:16:43', 1, 0),
(41, 'ê m', '', 16, '2025-05-19 14:21:37', 4, 1),
(42, '', 'ê cc', 16, '2025-05-19 14:27:12', 1, 0),
(43, 'alo', '', 2, '2025-05-20 12:48:06', 4, 1),
(44, '', 'alo', 2, '2025-05-20 12:48:34', 1, 0),
(45, '', 'alo', 2, '2025-05-20 12:49:14', 1, 0),
(46, '', 'alo', 2, '2025-05-20 12:56:04', 1, 0),
(47, 'alo', '', 2, '2025-05-20 13:00:45', 4, 1),
(48, '', 'alo', 2, '2025-05-20 13:00:51', 1, 0),
(49, 'alo aloa lo', '', 2, '2025-05-20 13:01:20', 4, 1),
(50, 'he he he', '', 2, '2025-05-20 13:01:22', 4, 1),
(51, 'hihihi', '', 2, '2025-05-20 13:01:25', 4, 1),
(52, '', 'alo', 2, '2025-05-20 13:08:53', 1, 0),
(53, '', 'alo', 2, '2025-05-20 13:09:02', 1, 0),
(54, 'alo', '', 2, '2025-05-20 13:09:04', 4, 1),
(55, '', 'alo', 2, '2025-05-20 13:09:12', 1, 0),
(56, 'alo', '', 2, '2025-05-20 13:09:23', 4, 1),
(57, 'alo', '', 2, '2025-05-20 13:10:05', 4, 1),
(58, '', 'cai gi', 2, '2025-05-20 13:10:10', 1, 0),
(59, 'alo', '', 2, '2025-05-20 13:10:13', 4, 1),
(60, 'alo', '', 2, '2025-05-20 13:10:26', 4, 1),
(61, 'lo', '', 2, '2025-05-20 13:10:27', 4, 1),
(62, '', 'lo', 2, '2025-05-20 13:10:30', 1, 0),
(63, '', 'lo', 2, '2025-05-20 13:10:31', 1, 0),
(64, '', 'alo', 2, '2025-05-20 13:13:17', 1, 0),
(65, 'ok', '', 2, '2025-05-20 13:13:21', 4, 1),
(66, 'alo', '', 2, '2025-05-20 13:17:41', 4, 1),
(67, 'alo', '', 2, '2025-05-20 13:17:47', 4, 1),
(68, '', 'lo', 2, '2025-05-20 13:17:50', 1, 0),
(69, 'alo', '', 2, '2025-05-20 13:17:53', 4, 1),
(70, 'alo', '', 2, '2025-05-20 13:17:57', 4, 1),
(71, 'alo', '', 2, '2025-05-20 13:29:17', 4, 1),
(72, 'gi the', '', 2, '2025-05-20 13:29:28', 4, 1),
(73, 'ha', '', 2, '2025-05-20 13:29:32', 4, 1),
(74, 'gi the', '', 2, '2025-05-20 13:29:44', 4, 1),
(75, '', 'lo', 2, '2025-05-20 13:29:50', 1, 0),
(76, '', 'ha', 2, '2025-05-20 13:29:57', 1, 0),
(77, '', 'a', 14, '2025-05-20 13:30:07', 1, 0),
(78, '', 'a', 2, '2025-05-20 13:30:10', 1, 0),
(79, 'halo', '', 2, '2025-05-20 13:30:14', 4, 1),
(80, 'alo', '', 2, '2025-05-20 13:34:32', 4, 1),
(81, 'me m', '', 2, '2025-05-20 13:34:41', 4, 1),
(82, '', 'mẹ gì', 2, '2025-05-20 13:34:51', 1, 0),
(83, 'sao m sao', '', 2, '2025-05-20 13:34:58', 4, 1),
(84, '', 'a', 2, '2025-05-20 13:35:04', 1, 0),
(85, 'alo', '', 2, '2025-05-20 13:36:03', 4, 1),
(86, '', 'gi', 2, '2025-05-20 13:36:06', 1, 0),
(87, 'alo', '', 2, '2025-05-21 09:27:52', 4, 1),
(88, 'alo', '', 2, '2025-05-21 09:28:03', 4, 1),
(89, 'alo', '', 2, '2025-05-21 09:28:09', 4, 1),
(90, 'alo', '', 2, '2025-05-21 09:28:26', 4, 1),
(91, 'alo', '', 2, '2025-05-21 09:29:18', 4, 1),
(92, 'alo', '', 2, '2025-05-21 09:29:29', 4, 1),
(93, '', 'alo', 2, '2025-05-21 09:30:03', 1, 0),
(94, '', 'alo', 2, '2025-05-21 09:30:07', 1, 0),
(95, '', 'alo', 2, '2025-05-21 09:30:09', 1, 0),
(96, '', 'alo', 2, '2025-05-21 09:30:10', 1, 0),
(97, 'alo', '', 2, '2025-05-21 09:30:13', 4, 1),
(98, 'alo', '', 2, '2025-05-21 09:30:29', 4, 1),
(99, '', 'alo', 2, '2025-05-21 09:30:33', 1, 0),
(100, 'alo', '', 2, '2025-05-21 09:30:52', 4, 1),
(101, '', 'alo', 2, '2025-05-21 09:31:08', 1, 0),
(102, 'alo', '', 2, '2025-05-21 09:31:20', 4, 1),
(103, '', 'alo', 2, '2025-05-21 09:31:28', 1, 0),
(104, 'alo', '', 2, '2025-05-21 09:31:46', 4, 1),
(105, 'alo', '', 2, '2025-05-21 09:31:51', 4, 1),
(106, 'alo', '', 2, '2025-05-21 09:31:58', 4, 1),
(107, 'alo', '', 2, '2025-05-21 09:31:59', 4, 1),
(108, 'alo', '', 2, '2025-05-21 09:32:05', 4, 1),
(109, '', 'alo', 2, '2025-05-21 09:32:11', 1, 0),
(110, '', 'alo', 2, '2025-05-21 09:32:16', 1, 0),
(111, 'me m', '', 2, '2025-05-21 09:33:34', 4, 1),
(112, '', 'alo', 2, '2025-05-21 09:33:40', 1, 0),
(113, 'alo', '', 2, '2025-05-21 09:33:43', 4, 1),
(114, 'alo', '', 2, '2025-05-21 09:36:10', 4, 1),
(115, 'alo', '', 2, '2025-05-21 09:37:07', 4, 1),
(116, 'alo', '', 2, '2025-05-21 09:37:17', 4, 1),
(117, '', 'alo', 2, '2025-05-21 09:37:21', 1, 0),
(118, 'alo', '', 2, '2025-05-21 09:39:06', 4, 1),
(119, 'me m', '', 2, '2025-05-21 09:49:14', 4, 1),
(120, 'alo', '', 2, '2025-05-21 09:49:25', 4, 1),
(121, '', 'lo', 2, '2025-05-21 09:49:28', 1, 0),
(122, 'alo', '', 2, '2025-05-21 09:49:34', 4, 1),
(123, 'lo', '', 2, '2025-05-21 09:54:01', 4, 1),
(124, 'ádlfasl', '', 2, '2025-05-21 09:54:03', 4, 1),
(125, 'sadfas', '', 2, '2025-05-21 09:54:03', 4, 1),
(126, 'fdsalfas;', '', 2, '2025-05-21 09:54:14', 4, 1),
(127, 'ádfsda', '', 2, '2025-05-21 09:54:15', 4, 1),
(128, '', 'ádfsa', 2, '2025-05-21 09:54:18', 1, 0),
(129, 'alo', '', 2, '2025-05-21 09:58:08', 4, 1),
(130, 'alo', '', 2, '2025-05-21 09:59:03', 4, 1),
(131, 'alo', '', 2, '2025-05-21 09:59:11', 4, 1),
(132, 'alo', '', 2, '2025-05-21 10:04:57', 4, 1),
(133, 'alo', '', 2, '2025-05-21 10:05:28', 4, 1),
(134, '', 'alo', 2, '2025-05-21 10:05:33', 1, 0),
(135, 'ALO', '', 2, '2025-05-21 10:09:12', 4, 1),
(136, 'ME M', '', 2, '2025-05-21 10:09:25', 4, 1),
(137, 'ghe k', '', 2, '2025-05-21 10:09:32', 4, 1),
(138, 'alo', '', 2, '2025-05-21 10:09:37', 4, 1),
(139, 'ư', '', 2, '2025-05-21 10:09:44', 4, 1),
(140, 'alo', '', 2, '2025-05-21 10:09:46', 4, 1),
(141, 'ne m', '', 2, '2025-05-21 10:09:47', 4, 1),
(142, '', 'alo', 2, '2025-05-21 10:09:52', 1, 0),
(143, 'alo', '', 2, '2025-05-21 10:31:20', 4, 1),
(144, '', 'alo', 2, '2025-05-21 10:32:17', 1, 0),
(145, 'alo', '', 2, '2025-05-21 10:32:21', 4, 1),
(146, 'alo', '', 2, '2025-05-21 10:56:06', 4, 1),
(147, 'lo', '', 2, '2025-05-21 10:56:16', 4, 1),
(148, 'alo', '', 2147483647, '2025-05-21 12:11:22', 4, 0),
(149, 'alo', '', 2147483647, '2025-05-21 12:11:28', 4, 0),
(150, 'alo', '', 17, '2025-05-21 12:23:59', 4, 1),
(151, '', 'alo', 17, '2025-05-21 12:24:41', 1, 0),
(152, 'alo', '', 2, '2025-05-23 08:59:16', 4, 1),
(153, 'helo', '', 18, '2025-05-23 09:49:05', 4, 1),
(154, '', 'lo cc', 18, '2025-05-23 09:49:35', 1, 0),
(155, '?', '', 18, '2025-05-23 09:49:40', 4, 1),
(156, 'alo', '', 21, '2025-05-25 08:14:59', 4, 1),
(157, 'alo', '', 17, '2025-05-26 14:40:05', 4, 1),
(158, 'alo', '', 17, '2025-05-26 15:16:23', 4, 1),
(159, '', 'Chào bạn. Tôi có thể giúp gì cho bạn', 17, '2025-05-26 15:16:56', 1, 0),
(160, 'alo', '', 2, '2025-05-27 06:14:20', 4, 1),
(161, 'alo', '', 2, '2025-05-27 06:14:50', 4, 1),
(162, 'alo', '', 24, '2025-05-27 06:24:28', 4, 1),
(163, 'alo', '', 23, '2025-05-27 06:24:52', 4, 1),
(164, 'helo', '', 23, '2025-05-27 13:18:35', 4, 1),
(165, 'helo', '', 23, '2025-05-27 13:19:57', 4, 1),
(166, 'helo', '', 23, '2025-05-27 13:20:09', 4, 1),
(167, 'hi', '', 23, '2025-05-27 13:20:14', 4, 1),
(168, '', 'ba', 23, '2025-05-27 13:20:19', 1, 0),
(169, 'helo', '', 23, '2025-05-27 13:20:31', 4, 1),
(170, '', 'helo', 23, '2025-05-27 13:20:44', 1, 0),
(171, 'alo', '', 23, '2025-05-27 13:32:24', 4, 1),
(172, '', 'xin chao', 23, '2025-05-27 13:32:43', 1, 0),
(173, 'alo', '', 23, '2025-05-27 13:48:45', 4, 1),
(174, 'alo', '', 28, '2025-05-27 15:03:56', 4, 1),
(175, '', 'xin chao', 28, '2025-05-27 15:04:12', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dondatban`
--

CREATE TABLE `dondatban` (
  `idddb` int(11) NOT NULL,
  `tenkh` varchar(200) DEFAULT NULL,
  `ngaydatban` datetime DEFAULT NULL,
  `sdt` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `ghichu` varchar(1000) DEFAULT NULL,
  `soluong` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dondatban`
--

INSERT INTO `dondatban` (`idddb`, `tenkh`, `ngaydatban`, `sdt`, `email`, `ghichu`, `soluong`, `trangthai`, `id_user`) VALUES
(1, 'Trần Cao Kiệt', '2025-05-05 22:05:00', '0364127297', 'abc@gmail.com', '123123', 1, 2, NULL),
(2, 'Trần Văn Ân', '2025-05-17 17:27:00', '0352856380', 'abc@gmail.com', 'sfsdg', 5, 2, NULL),
(6, 'ấdfdasf', '2025-05-23 16:59:00', '12321323123', 'abc@gmail.com', 'ádfads', 2, 1, 2),
(7, 'Trần Cao Kiệt', '2025-05-23 15:08:00', '0364127297', 'admin@admin.com', '123123', 4, 2, 17),
(8, 'Trần Cao Kiệt', '2025-05-25 16:14:00', '0364127297', 'abc@gmail.com', '', 3, 1, 21),
(9, 'Kiệt', '2025-05-25 19:53:00', '0323456789', 'abc@gmail.com', '', 2, 0, 18),
(10, 'Trần Cao Kiệt', '2025-05-27 20:09:00', '0364127297', 'trancaokiet99@gmail.com', '', 6, 1, 28);

-- --------------------------------------------------------

--
-- Table structure for table `loaimonan`
--

CREATE TABLE `loaimonan` (
  `idloaimon` int(11) NOT NULL,
  `tenloai` varchar(50) NOT NULL,
  `field` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaimonan`
--

INSERT INTO `loaimonan` (`idloaimon`, `tenloai`, `field`) VALUES
(1, 'Khai vị', 'starter'),
(2, 'Món chính', 'main'),
(3, 'Tráng miệng', 'dessert'),
(4, 'Đồ uống', 'drink'),
(5, 'Ăn nhẹ', 'snack');

-- --------------------------------------------------------

--
-- Table structure for table `monan`
--

CREATE TABLE `monan` (
  `idmonan` int(11) NOT NULL,
  `tenmonan` varchar(50) NOT NULL,
  `mota` varchar(500) DEFAULT NULL,
  `giaban` float DEFAULT NULL,
  `hinhanh` varchar(1000) DEFAULT NULL,
  `trangthai` int(11) NOT NULL,
  `idloaimonan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `monan`
--

INSERT INTO `monan` (`idmonan`, `tenmonan`, `mota`, `giaban`, `hinhanh`, `trangthai`, `idloaimonan`) VALUES
(1, 'gỏi cuốn', 'Gỏi cuốn tôm thịt ăn kèm nước chấm chua ngọt.', 25000, 'goicuon.jpg', 1, 1),
(2, 'Súp cua', 'Súp cua nóng hổi, giàu dinh dưỡng.', 30000, 'supcua.jpg', 1, 1),
(3, 'Cơm chiên dương châu', 'Gà giòn rụm, cơm thơm béo, kèm nước mắm chua ngọt.', 45000, 'com.jpg', 1, 2),
(4, 'Phở bò', 'Phở bò truyền thống với nước dùng đậm đà.', 40000, 'phobo.jpg', 1, 2),
(5, 'Chè đậu đỏ', 'Chè truyền thống ngọt dịu.', 20000, 'chedaudo.jpg', 1, 3),
(6, 'Bánh flan', 'Bánh flan mềm mịn, dùng kèm cà phê sữa.', 18000, 'flan.jpg', 1, 3),
(7, 'Trà đào', 'Trà đào mát lạnh, topping miếng đào giòn.', 25000, 'tradao.jpg', 1, 4),
(8, 'Sinh tố bơ', 'Sinh tố bơ nguyên chất, béo ngậy.', 30000, 'botto.jpg', 1, 4),
(9, 'Khoai tây chiên', 'Khoai tây chiên giòn rụm, ăn kèm tương ớt.', 20000, 'khoaitay.jpg', 1, 5),
(10, 'Bánh mì que', 'Bánh mì giòn với nhân pate cay.', 15000, 'banhmyque.jpg', 1, 5),
(11, 'Burger nhỏ', 'burger nhỏ', 40000, 'burger.jpg', 1, 2),
(12, 'Beefsteek', 'bò Mỹ chất lương cao', 350000, '552_P-RICE-KING.png', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id_user` int(11) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `gioitinh` int(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `sdt` varchar(15) NOT NULL,
  `id_role` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`id_user`, `hoten`, `gioitinh`, `email`, `sdt`, `id_role`, `password`, `trangthai`) VALUES
(1, 'Nguyễn Văn An', 1, 'nguyenvanan@gmail.com', '0912345678', 2, 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, 'trancaokiet', 1, 'trancaokiet@gmail.com', '0123456789', 4, 'e10adc3949ba59abbe56e057f20f883e', 1),
(3, 'quynh huong', 0, 'huong123@gmail.com', '0986345724', 2, 'e10adc3949ba59abbe56e057f20f883e', 1),
(4, 'Nguyễn Minh', 1, 'minh123@gmail.com', '0324685468', 3, 'e10adc3949ba59abbe56e057f20f883e', 0),
(5, 'admin', 1, 'admin@admin.com', '0123456789', 1, '21232f297a57a5a743894a0e4a801fc3', 1),
(6, 'Trần Văn Ân', 1, 'an@gmail.com', '0123456789', 1, '123456', 1),
(14, 'kiệt trần', 1, 'abc@gmail.com', '0364127297', 4, 'e10adc3949ba59abbe56e057f20f883e', 1),
(16, 'kiet tran', 1, '123@123.om', '123123123', 4, 'e10adc3949ba59abbe56e057f20f883e', 1),
(19, 'kiệt trần', 1, 'kiet@gmail.com', '0364127297', 4, 'e10adc3949ba59abbe56e057f20f883e', 1),
(20, 'kiệt trần', 1, 'kiet1@gmail.com', '0824395019', 4, 'e10adc3949ba59abbe56e057f20f883e', 1),
(21, 'kiệt trần', 1, 'trancaokiet9@gmail.com', '0364127297', 4, '202cb962ac59075b964b07152d234b70', 1),
(23, 'Kiệt Trần Cao', NULL, 'trancaokiet1705@gmail.com', '', 4, '', 1),
(24, 'Dương Dương', NULL, 'trancaokiet98@gmail.com', '', 4, '', 1),
(25, 'A Tran', NULL, 'danviip201220@gmail.com', '', 4, '', 1),
(26, 'Kiệt Trần', NULL, 'trancaokiet99@gmail.com', '', 4, '', 1),
(27, 'kiet tran', NULL, 'trancaokiet170503@gmail.com', '', 4, '', 1),
(28, 'Quynh Huong', NULL, 'huonggquynh03@gmail.com', '', 4, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vaitro`
--

CREATE TABLE `vaitro` (
  `id_role` int(11) NOT NULL,
  `tenvaitro` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vaitro`
--

INSERT INTO `vaitro` (`id_role`, `tenvaitro`) VALUES
(1, 'Quản trị viên'),
(2, 'Quản lý'),
(3, 'Nhân viên'),
(4, 'Khách hàng');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ban`
--
ALTER TABLE `ban`
  ADD PRIMARY KEY (`idban`),
  ADD KEY `fk_ban_nguoidung` (`id_user`);

--
-- Indexes for table `chatbox`
--
ALTER TABLE `chatbox`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indexes for table `dondatban`
--
ALTER TABLE `dondatban`
  ADD PRIMARY KEY (`idddb`);

--
-- Indexes for table `loaimonan`
--
ALTER TABLE `loaimonan`
  ADD PRIMARY KEY (`idloaimon`);

--
-- Indexes for table `monan`
--
ALTER TABLE `monan`
  ADD PRIMARY KEY (`idmonan`),
  ADD KEY `fk_monan_loaimonan` (`idloaimonan`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_id_role` (`id_role`);

--
-- Indexes for table `vaitro`
--
ALTER TABLE `vaitro`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ban`
--
ALTER TABLE `ban`
  MODIFY `idban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `chatbox`
--
ALTER TABLE `chatbox`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `dondatban`
--
ALTER TABLE `dondatban`
  MODIFY `idddb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `monan`
--
ALTER TABLE `monan`
  MODIFY `idmonan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `vaitro`
--
ALTER TABLE `vaitro`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ban`
--
ALTER TABLE `ban`
  ADD CONSTRAINT `fk_ban_nguoidung` FOREIGN KEY (`id_user`) REFERENCES `nguoidung` (`id_user`);

--
-- Constraints for table `monan`
--
ALTER TABLE `monan`
  ADD CONSTRAINT `fk_monan_loaimonan` FOREIGN KEY (`idloaimonan`) REFERENCES `loaimonan` (`idloaimon`);

--
-- Constraints for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `fk_id_role` FOREIGN KEY (`id_role`) REFERENCES `vaitro` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

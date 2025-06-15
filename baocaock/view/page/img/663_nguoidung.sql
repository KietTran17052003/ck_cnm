-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2025 at 02:28 PM
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
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id_user` int(11) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `gioitinh` int(11) NOT NULL,
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
(1, 'Nguyễn Văn An', 1, 'nguyenvanan@gmail.com', '0912345678', 1, 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, 'trancaokiet', 1, 'trancaokiet@gmail.com', '0123456789', 4, 'e10adc3949ba59abbe56e057f20f883e', 1),
(3, 'quynh huong', 0, 'huong123@gmail.com', '0986345724', 2, 'e10adc3949ba59abbe56e057f20f883e', 1),
(4, 'Nguyễn Minh', 1, 'minh123@gmail.com', '0324685468', 3, 'e10adc3949ba59abbe56e057f20f883e', 1),
(5, 'admin', 1, 'admin@admin.com', '0123456789', 1, '21232f297a57a5a743894a0e4a801fc3', 1),
(6, 'Trần Văn Ân', 1, 'an@gmail.com', '0123456789', 1, '123456', 1),
(14, 'kiệt trần', 1, 'abc@gmail.com', '0364127297', 4, 'e10adc3949ba59abbe56e057f20f883e', 1),
(16, 'kiet tran', 1, '123@123.om', '123123123', 4, 'e10adc3949ba59abbe56e057f20f883e', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `fk_id_role` FOREIGN KEY (`id_role`) REFERENCES `vaitro` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

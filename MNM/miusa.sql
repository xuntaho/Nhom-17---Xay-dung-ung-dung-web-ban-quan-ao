-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 27, 2025 at 12:24 PM
-- Server version: 8.0.44
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miusa`
--

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hang`
--

DROP TABLE IF EXISTS `chi_tiet_don_hang`;
CREATE TABLE IF NOT EXISTS `chi_tiet_don_hang` (
  `id_ct` int NOT NULL AUTO_INCREMENT,
  `id_don_hang` int DEFAULT NULL,
  `id_san_pham` int DEFAULT NULL,
  `id_kich_co` int DEFAULT NULL,
  `so_luong` int DEFAULT NULL,
  `don_gia` int DEFAULT NULL,
  PRIMARY KEY (`id_ct`),
  KEY `fk_ctdh_dh_final` (`id_don_hang`),
  KEY `fk_ctdh_sp_final` (`id_san_pham`),
  KEY `fk_ctdh_kc_final` (`id_kich_co`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`id_ct`, `id_don_hang`, `id_san_pham`, `id_kich_co`, `so_luong`, `don_gia`) VALUES
(1, 1, 1, 2, 1, 350000),
(2, 1, 2, 3, 1, 300000),
(3, 2, 5, 1, 1, 300000),
(4, 3, 1, 3, 1, 350000),
(5, 4, 1, 3, 1, 350000),
(6, 5, 2, 2, 1, 300000),
(7, 6, 1, 4, 160, 350000),
(8, 7, 2, 3, 80, 300000),
(9, 8, 2, 1, 1, 300000),
(10, 9, 2, 1, 1, 300000),
(11, 10, 3, 2, 1, 280000),
(12, 11, 3, 2, 1, 280000),
(13, 12, 3, 4, 1, 280000),
(14, 13, 3, 3, 1, 280000),
(15, 14, 2, 1, 1, 300000),
(16, 15, 3, 4, 1, 280000),
(17, 16, 1, 2, 3, 350000),
(18, 17, 3, 1, 1, 370000),
(19, 18, 4, 1, 1, 500000),
(20, 19, 2, 1, 1, 480000),
(21, 20, 7, 1, 1, 450000);

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

DROP TABLE IF EXISTS `danh_muc`;
CREATE TABLE IF NOT EXISTS `danh_muc` (
  `id_danh_muc` int NOT NULL AUTO_INCREMENT,
  `ten_danh_muc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_danh_muc`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danh_muc`
--

INSERT INTO `danh_muc` (`id_danh_muc`, `ten_danh_muc`) VALUES
(1, 'Áo khoác\r\n'),
(2, 'Quần\r\n'),
(3, 'Áo thun\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `don_hang`
--

DROP TABLE IF EXISTS `don_hang`;
CREATE TABLE IF NOT EXISTS `don_hang` (
  `id_don_hang` int NOT NULL AUTO_INCREMENT,
  `id_nguoi_dung` int DEFAULT NULL,
  `ngay_dat` datetime DEFAULT CURRENT_TIMESTAMP,
  `tong_tien` int DEFAULT NULL,
  `ho_ten` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi_nhan` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_dien_thoai_nhan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phuong_thuc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghi_chu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `trang_thai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Đang xử lý',
  `ten_ngan_hang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_tai_khoan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_don_hang`),
  KEY `fk_dh_nd_final` (`id_nguoi_dung`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `don_hang`
--

INSERT INTO `don_hang` (`id_don_hang`, `id_nguoi_dung`, `ngay_dat`, `tong_tien`, `ho_ten`, `dia_chi_nhan`, `so_dien_thoai_nhan`, `phuong_thuc`, `ghi_chu`, `trang_thai`, `ten_ngan_hang`, `so_tai_khoan`) VALUES
(1, NULL, '2025-11-28 23:00:00', 650000, 'Khách hàng cũ', 'TPHCM', '000000000', 'COD', '', 'Đã hoàn thành', NULL, NULL),
(2, NULL, '2025-11-28 23:47:52', 300000, 'Nha', 'TPHCM', '0303030303', 'COD', '', 'Đang xử lý', NULL, NULL),
(3, NULL, '2025-11-29 00:53:05', 350000, 'Nha', 'TPHCM', '0303030303', 'COD', '', 'Đang xử lý', NULL, NULL),
(4, NULL, '2025-11-29 19:20:32', 350000, 'Nha', 'TPHCM', '0303030303', 'Bank', '', 'Đang xử lý', 'Vietcombank', '11111'),
(5, NULL, '2025-11-30 04:51:48', 300000, 'Nha', 'TPHCM', '0303030303', 'Bank', '', 'Đang xử lý', 'MBBank', '11111'),
(6, NULL, '2025-11-30 18:57:43', 56000000, 'kkk', 'hhhhhhh', '190012345', 'Bank', 'kkk', 'Đang xử lý', 'ACB', '28487297'),
(7, 3, '2025-11-30 20:30:55', 24000000, 'Nha', 'Cai Be', '000000000', 'Bank', '', 'Đang xử lý', 'MBBank', '11111'),
(8, NULL, '2025-11-30 20:36:08', 300000, 'Nha', 'Cai Be', '000000000', 'COD', '', 'Đang xử lý', '', ''),
(9, NULL, '2025-12-02 03:16:10', 300000, 'Nha', 'TPHCM', '0303030303', 'COD', '', 'Đang xử lý', '', ''),
(10, NULL, '2025-12-02 03:17:28', 280000, 'Nha', 'TPHCM', '0303030303', 'COD', '', 'Đang xử lý', '', ''),
(11, NULL, '2025-12-02 04:20:24', 280000, 'Nha', 'TPHCM', '0303030303', 'COD', '', 'Đang xử lý', '', ''),
(12, NULL, '2025-12-02 04:46:36', 280000, 'Nha', 'TPHCM', '0303030303', 'COD', '', 'Đang xử lý', '', ''),
(13, NULL, '2025-12-02 04:56:08', 280000, 'Nha', 'TPHCM', '0303030303', 'Bank', '', 'Đang xử lý', 'Vietcombank', '11111'),
(14, NULL, '2025-12-02 04:57:46', 300000, 'Nha', 'TPHCM', '0303030303', 'Bank', '', 'Đang xử lý', 'MBBank', '11111'),
(15, 4, '2025-12-03 02:14:33', 280000, 'jrj', 'jj', '5654', 'COD', 'jgj', 'Đang xử lý', '', ''),
(16, 1, '2025-12-10 02:04:11', 1050000, 'Vo Thi', 'tphcm', '123456', 'COD', '', 'Đang xử lý', '', ''),
(17, 1, '2025-12-10 02:06:01', 370000, 'Vo Thi', 'tphcm', '123456', 'Bank', '', 'Đang xử lý', 'Vietcombank', '12345'),
(18, 1, '2025-12-10 02:09:10', 500000, 'Vo Thi', 'tphcm', '123456', 'COD', '', 'Đang xử lý', '', ''),
(19, 1, '2025-12-14 12:05:41', 100000, 'Vo Thi', 'tphcm', '0987654321', 'COD', '', 'Đang xử lý', '', ''),
(20, 1, '2025-12-14 12:06:23', 100000, 'TTTT', 'Q9', '09', 'Bank', '', 'Đang xử lý', 'Vietcombank', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `kich_co`
--

DROP TABLE IF EXISTS `kich_co`;
CREATE TABLE IF NOT EXISTS `kich_co` (
  `id_kich_co` int NOT NULL AUTO_INCREMENT,
  `ten_kich_co` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_kich_co`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kich_co`
--

INSERT INTO `kich_co` (`id_kich_co`, `ten_kich_co`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL');

-- --------------------------------------------------------

--
-- Table structure for table `loai_san_pham`
--

DROP TABLE IF EXISTS `loai_san_pham`;
CREATE TABLE IF NOT EXISTS `loai_san_pham` (
  `id_loai` int NOT NULL AUTO_INCREMENT,
  `ten_loai` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_loai`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loai_san_pham`
--

INSERT INTO `loai_san_pham` (`id_loai`, `ten_loai`) VALUES
(1, 'Áo'),
(2, 'Váy'),
(3, 'Khoác');

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dung`
--

DROP TABLE IF EXISTS `nguoi_dung`;
CREATE TABLE IF NOT EXISTS `nguoi_dung` (
  `id_nguoi_dung` int NOT NULL AUTO_INCREMENT,
  `ten_dang_nhap` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mat_khau` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ho_ten` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_dien_thoai` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dia_chi` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngay_tao` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_nguoi_dung`),
  UNIQUE KEY `ten_dang_nhap` (`ten_dang_nhap`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`id_nguoi_dung`, `ten_dang_nhap`, `mat_khau`, `ho_ten`, `so_dien_thoai`, `dia_chi`, `ngay_tao`) VALUES
(1, 'thao', '123', 'Võ Thị Xuân Thao', '0909123456', 'Quận 8', '2025-12-01 01:38:51'),
(2, 'Uyên', '281004Uyen@', 'Hoàng Uyên', '00000000000', 'TPHCM', '2025-11-25 19:45:31'),
(3, 'wy', '123456Nha@', 'wywy', '0123456005', 'Nha Be', '2025-11-30 20:26:40'),
(4, 'Nha', '123456Nha@', 'Phong Nha', '0939843654', 'TPHCM', '2025-12-01 02:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

DROP TABLE IF EXISTS `san_pham`;
CREATE TABLE IF NOT EXISTS `san_pham` (
  `id_san_pham` int NOT NULL AUTO_INCREMENT,
  `ten_san_pham` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gia` int DEFAULT NULL,
  `hinh_anh` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `id_danh_muc` int DEFAULT NULL,
  PRIMARY KEY (`id_san_pham`),
  KEY `fk_sp_dm_final` (`id_danh_muc`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`id_san_pham`, `ten_san_pham`, `gia`, `hinh_anh`, `mo_ta`, `id_danh_muc`) VALUES
(1, '419 BOXY TEE', 350000, 'ao419.jpg', '419 BOXY TEE', 2),
(2, 'NON STANDARD HOODIE', 480000, 'hoodie.jpg', 'NON STANDARD REGULAR HOODIE', 1),
(3, 'SICK FAME TEE', 370000, 'sickfame.jpg', 'SICK FAME TEE', 2),
(4, 'THE GO HOODIE ZIP', 500000, 'hoodiezip.jpg', 'S-ON THE GO HOODIE ZIP - GREY', 1),
(5, 'RYOKO TEE', 300000, 'ryokotee.jpg', 'BAD RYOKO TEE', 2),
(6, 'SWEATPANTS - BLACK', 490000, 'quanblack.jpg', 'BAD DESTROYED SWEATPANTS - BLACK', 3),
(7, 'ARMY CARGO SHORTS', 450000, 'quancagro.jpg', 'ARMY CARGO SHORTS', 3),
(8, 'DRAGON KHAKI PANTS', 490000, 'quankaki.jpg', 'DRAGON KHAKI PANTS', 3),
(9, 'S-ULTIMATE SHORTS', 450000, 'quan.jpg', 'S-ULTIMATE SHORTS', 3),
(10, 'SWEATPANTS - GREY', 490000, 'quangrey.jpg', 'BAD DESTROYED SWEATPANTS - GREY', 3);

-- --------------------------------------------------------

--
-- Table structure for table `san_pham_kich_co`
--

DROP TABLE IF EXISTS `san_pham_kich_co`;
CREATE TABLE IF NOT EXISTS `san_pham_kich_co` (
  `id_spkc` int NOT NULL AUTO_INCREMENT,
  `id_san_pham` int DEFAULT NULL,
  `id_kich_co` int DEFAULT NULL,
  `so_luong` int DEFAULT NULL,
  PRIMARY KEY (`id_spkc`),
  UNIQUE KEY `idx_spkc_unique_final` (`id_san_pham`,`id_kich_co`),
  KEY `fk_spkc_kc_final` (`id_kich_co`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `san_pham_kich_co`
--

INSERT INTO `san_pham_kich_co` (`id_spkc`, `id_san_pham`, `id_kich_co`, `so_luong`) VALUES
(1, 1, 1, 10),
(2, 1, 2, 10),
(3, 1, 3, 8),
(4, 1, 4, 6),
(5, 2, 1, 5),
(6, 2, 2, 10),
(7, 2, 3, 10),
(8, 2, 4, 5),
(9, 3, 1, 5),
(10, 3, 2, 8),
(11, 3, 3, 8),
(12, 3, 4, 5),
(13, 4, 1, 10),
(14, 4, 2, 10),
(15, 4, 3, 10),
(16, 4, 4, 10),
(17, 5, 1, 10),
(18, 5, 2, 10),
(19, 5, 3, 10),
(20, 5, 4, 10),
(21, 6, 1, 10),
(22, 6, 2, 10),
(23, 6, 3, 10),
(24, 6, 4, 10),
(25, 7, 1, 9),
(26, 7, 2, 10),
(27, 7, 3, 10),
(28, 7, 4, 10),
(29, 8, 1, 10),
(30, 8, 2, 10),
(31, 8, 3, 10),
(32, 8, 4, 10),
(33, 9, 1, 10),
(34, 9, 2, 10),
(35, 9, 3, 10),
(36, 9, 4, 10),
(37, 10, 1, 10),
(38, 10, 2, 10),
(39, 10, 3, 10),
(40, 10, 4, 10);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `fk_ctdh_dh_final` FOREIGN KEY (`id_don_hang`) REFERENCES `don_hang` (`id_don_hang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ctdh_kc_final` FOREIGN KEY (`id_kich_co`) REFERENCES `kich_co` (`id_kich_co`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ctdh_sp_final` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id_san_pham`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `fk_dh_nd_final` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id_nguoi_dung`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `fk_sp_dm_final` FOREIGN KEY (`id_danh_muc`) REFERENCES `danh_muc` (`id_danh_muc`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `san_pham_kich_co`
--
ALTER TABLE `san_pham_kich_co`
  ADD CONSTRAINT `fk_spkc_kc_final` FOREIGN KEY (`id_kich_co`) REFERENCES `kich_co` (`id_kich_co`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_spkc_sp_final` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id_san_pham`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

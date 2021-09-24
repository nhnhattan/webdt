-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 28, 2020 lúc 09:26 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_dienthoai`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adminEmail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `adminUser` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adminPass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'huy', 'huy@gmail.com', 'huyadmin', 'e10adc3949ba59abbe56e057f20f883e', 0),
(2, 'admin', 'admin@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`brandId`, `brandName`) VALUES
(1, 'iPhone'),
(2, 'Samsung'),
(3, 'Vsmart'),
(4, 'Vivo'),
(5, 'Oppo'),
(8, 'Oneplus'),
(20, 'Xiaomi'),
(21, 'Nokia'),
(22, 'Realme');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `sId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`cartId`, `productId`, `sId`, `productName`, `price`, `quantity`, `image`) VALUES
(21, 26, 'or4rstav0953u3c8jvl922g469', 'Điện thoại Vsmart Joy 4 (4GB/64GB)', '3590000', 1, '5ac8e9e16f.png'),
(28, 27, '7pur4rs60pgk76sj5umgi3r6u1', 'Điện thoại iPhone 12 mini 64GB', '19490000', 1, '81c0f40c76.jpg'),
(32, 27, '459e78adu22ffc2n4e23prttoo', 'Điện thoại iPhone 12 mini 64GB', '19490000', 1, '81c0f40c76.jpg'),
(55, 27, 'ct9nahrkju95i04lve1sh7iodp', 'Điện thoại iPhone 12 mini 64GB', '19490000', 1, '81c0f40c76.jpg'),
(65, 121, 'pnhtfd7ah8t06tjc29bql4sars', 'Điện thoại OPPO Find X2', '19880000', 1, '59bff9a806.jpg'),
(67, 118, 'kmjf1hjg22bqe07thp2llq1l65', 'Điện thoại iPhone 12 64GB', '22499000', 2, 'c29b8ca1ea.jpg'),
(68, 125, '5ubvvb1rqemf77c2dciq61ebe7', 'Điện thoại iPhone 12 Pro Max 512GB', '40990000', 1, '73af96c6ee.jpg'),
(91, 115, 'kins7lrlenl318rvsdaa1p2s86', 'Điện thoại OPPO Reno 5', '10389000', 1, 'dd03bd637c.jpg'),
(92, 140, 'kins7lrlenl318rvsdaa1p2s86', 'Điện thoại OnePlus 8T 5G', '17990000', 2, '97b5596edc.jpg'),
(93, 125, 'kins7lrlenl318rvsdaa1p2s86', 'Điện thoại iPhone 12 Pro Max 512GB', '40990000', 1, '73af96c6ee.jpg'),
(94, 102, 'kins7lrlenl318rvsdaa1p2s86', 'Điện thoại Samsung Galaxy S20 FE', '14990000', 1, '5f284a821c.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`catId`, `catName`) VALUES
(18, 'Hãng khác'),
(19, 'Samsung'),
(20, 'Oppo'),
(21, 'Vivo'),
(22, 'Xiaomi'),
(23, 'Vsmart'),
(24, 'iPhone');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `compare`
--

CREATE TABLE `compare` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `city`, `country`, `zipcode`, `phone`, `email`, `password`) VALUES
(6, 'Huy Lưu', 'Quận Thủ Đức', 'ĐHQG HCM', 'hcm', '20000', '0387671894', 'luuquochuy171020@gmail.com', '6bea12f8ad7ff0d08d25a5598ee2a138'),
(8, 'Huy Frenkie', 'Nhà văn hóa sinh viên - ĐHQG HCM', 'Tỉnh Bình Dương', 'dn', '90000', '0387671998', 'blabla@gmail.com', 'df5ea29924d39c3be8785734f13169c6'),
(9, 'depzaiprovipp', 'Nhà văn hóa sinh viên - ĐHQG HCM', 'Thành phố Hồ Chí Minh', 'hcm', '9900', '0969671998', 'ahiuhiu@gmail.com', '24dca22fdab7a594baa005d55db4f7bf'),
(10, 'huyhuy', 'District 9', 'VNU HCM', 'hcm', '80000', '0998792868', 'ahihi@gmail.com', '24dca22fdab7a594baa005d55db4f7bf'),
(11, 'Lưu Quốc Huy', 'District 10', 'VNU HCM City', 'hcm', '8900', '0989888999', 'hello@gmail.com', '5d41402abc4b2a76b9719d911017c592'),
(12, 'QHuy', 'Nhà văn hóa sinh viên - ĐHQG HCM', 'Thành phố Hồ Chí Minh', 'hcm', '9500', '0988928899', 'hehe@gmail.com', '529ca8050a00180790cf88b63468826a'),
(13, 'hehe', 'Nhà văn hóa sinh viên - ĐHQG HCM', 'Thành phố Hồ Chí Minh', 'hcm', '12', '13', 'hoho@gmail.com', '4297f44b13955235245b2497399d7a93'),
(14, 'haha1', 'Nhà văn hóa sinh viên - ĐHQG HCM', 'Thành phố Hồ Chí Minh', 'hcm', '10000', '123123123', 'haha@gmail.com', '4297f44b13955235245b2497399d7a93'),
(15, 'Huy Huy', 'District 9', 'Thành phố Hồ Chí Minh', 'hcm', '99000', '0989799879', 'huyhuy@gmail.com', 'cc0d45bc2f499fc4666d09691485a0f9'),
(16, 'Văn Hiếu', 'Quận Thủ Đức', 'VNU Ho Chi Minh', 'hcm', '22000', '0988768989', 'hieuhieu@gmail.com', 'b6c6a280c7a9add8c3c4c45c0a6cc9cd'),
(17, 'Cuong Huy', 'Di An', 'VNU hcm', 'bd', '29000', '0919823588', 'hieu123@gmail.com', '851e75ea635566ea5d3887102ce633ad'),
(18, 'HuyHuy', 'Quận 2', 'VNU IT HCM', 'hcm', '89900', '0999989888', 'provip@gmail.com', 'cc0d45bc2f499fc4666d09691485a0f9'),
(20, 'Huy Quốc', 'Quận 20', 'HCM 11', 'bd', '199999', '0399888798', 'khanhconfc@gmail.com', '6bea12f8ad7ff0d08d25a5598ee2a138'),
(21, 'abc', 'Hcm', 'Ho Chi Minh City', 'bd', '99999999', '0233454569', 'propro@gmail.com', 'c9a92c3df421b6e9fdbd4ac7ac31fefd');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_order` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `productId`, `productName`, `customer_id`, `quantity`, `price`, `image`, `status`, `date_order`) VALUES
(61, 26, 'Điện thoại Vsmart Joy 4 (4GB/64GB)', 6, 1, '3590000', '5ac8e9e16f.png', 2, '2020-12-18 14:00:59'),
(64, 27, 'Điện thoại iPhone 12 mini 64GB', 6, 2, '38980000', '81c0f40c76.jpg', 2, '2020-07-15 20:51:41'),
(65, 26, 'Điện thoại Vsmart Joy 4 (4GB/64GB)', 6, 1, '3590000', '5ac8e9e16f.png', 0, '2020-03-11 21:53:32'),
(66, 27, 'Điện thoại iPhone 12 mini 64GB', 6, 1, '19490000', '81c0f40c76.jpg', 0, '2020-10-12 23:21:57'),
(68, 24, 'Điện thoại Vivo S1 Pro', 6, 1, '5490000', 'a40a862ddf.png', 0, '2020-11-08 01:53:40'),
(69, 27, 'Điện thoại iPhone 12 mini 64GB', 6, 2, '38980000', '81c0f40c76.jpg', 0, '2020-10-16 14:33:42'),
(71, 17, 'Điện thoại OPPO A93', 8, 1, '7490000', 'c62232bc16.jpg', 0, '2020-08-21 18:11:29'),
(75, 26, 'Điện thoại Vsmart Joy 4 (4GB/64GB)', 8, 6, '3590000', '5ac8e9e16f.png', 2, '2020-05-12 13:09:49'),
(76, 125, 'Điện thoại iPhone 12 Pro Max 512GB', 8, 1, '40990000', '73af96c6ee.jpg', 0, '2020-01-10 15:07:59'),
(77, 121, 'Điện thoại OPPO Find X2', 8, 1, '19880000', '59bff9a806.jpg', 2, '2020-02-16 16:07:59'),
(78, 124, 'Điện thoại Vsmart Joy 3 (3GB/32GB)', 8, 2, '7576000', '60e46c0386.jpg', 0, '2020-03-11 08:12:49'),
(79, 123, 'Điện thoại Xiaomi Redmi Note 9', 8, 2, '8380000', 'fc20edd699.jpg', 0, '2020-04-22 05:17:01'),
(80, 112, 'Điện thoại Samsung Galaxy Note 20 Ultra 5G Trắng', 8, 4, '107480000', '6d65454a8b.jpg', 0, '2020-05-15 07:29:45'),
(81, 122, 'Điện thoại Vivo Y11', 8, 5, '13900000', '74b313d77e.jpg', 0, '2020-06-16 13:29:23'),
(82, 112, 'Điện thoại Samsung Galaxy Note 20 Ultra 5G Trắng', 8, 2, '53740000', '6d65454a8b.jpg', 0, '2020-10-24 00:46:12'),
(83, 121, 'Điện thoại OPPO Find X2', 8, 1, '19880000', '59bff9a806.jpg', 0, '2020-02-27 11:53:08'),
(84, 124, 'Điện thoại Vsmart Joy 3 (3GB/32GB)', 8, 2, '7576000', '60e46c0386.jpg', 0, '2020-12-27 11:55:20'),
(85, 102, 'Điện thoại Samsung Galaxy S20 FE', 8, 2, '29980000', '5f284a821c.jpg', 0, '2020-06-27 14:28:55'),
(86, 140, 'Điện thoại OnePlus 8T 5G', 8, 2, '35980000', '97b5596edc.jpg', 0, '2020-12-27 14:32:26'),
(87, 121, 'Điện thoại OPPO Find X2', 8, 4, '79520000', '59bff9a806.jpg', 0, '2020-08-21 14:34:49'),
(88, 110, 'Điện thoại OPPO A92', 8, 4, '29120000', '8c083bf336.jpg', 0, '2020-04-27 19:59:32'),
(89, 24, 'Điện thoại Vivo S1 Pro', 8, 1, '5490000', 'a40a862ddf.png', 0, '2020-07-27 20:01:21'),
(90, 139, 'Điện thoại iPhone 12 256GB', 10, 1, '26890000', '5b4a45d905.png', 0, '2020-08-27 20:07:41'),
(91, 102, 'Điện thoại Samsung Galaxy S20 FE', 10, 2, '29980000', '5f284a821c.jpg', 0, '2020-06-27 20:08:31'),
(92, 24, 'Điện thoại Vivo S1 Pro', 10, 2, '10980000', 'a40a862ddf.png', 0, '2020-12-27 20:11:02'),
(93, 27, 'Điện thoại iPhone 12 mini 64GB', 11, 2, '38980000', '81c0f40c76.jpg', 0, '2020-12-27 20:15:37'),
(94, 112, 'Điện thoại Samsung Galaxy Note 20 Ultra 5G Trắng', 12, 2, '53740000', '6d65454a8b.jpg', 0, '2020-12-28 11:03:41'),
(95, 119, 'Điện thoại Samsung Galaxy A20s 64GB', 12, 2, '9798000', 'abaecea45f.jpg', 0, '2020-12-28 12:00:11'),
(96, 105, 'Điện thoại Xiaomi Redmi Note 9 Pro (6GB/128GB)', 12, 1, '6819000', 'd4770c91c5.jpg', 0, '2020-12-28 12:04:47'),
(97, 121, 'Điện thoại OPPO Find X2', 12, 2, '39760000', '59bff9a806.jpg', 0, '2020-12-28 12:49:39'),
(98, 17, 'Điện thoại OPPO A93', 12, 2, '14980000', 'c62232bc16.jpg', 0, '2020-12-28 13:19:44'),
(99, 121, 'Điện thoại OPPO Find X2', 10, 2, '39760000', '59bff9a806.jpg', 0, '2020-12-28 13:59:38'),
(100, 120, 'Điện thoại Samsung Galaxy A21s (6GB/64GB)', 10, 2, '11576000', '8d671e0cf4.jpg', 0, '2020-12-28 14:00:06'),
(101, 121, 'Điện thoại OPPO Find X2', 10, 1, '19880000', '59bff9a806.jpg', 0, '2020-12-28 14:03:57'),
(102, 139, 'Điện thoại iPhone 12 256GB', 10, 1, '26890000', '5b4a45d905.png', 0, '2020-12-28 14:11:59'),
(103, 124, 'Điện thoại Vsmart Joy 3 (3GB/32GB)', 10, 1, '3788000', '60e46c0386.jpg', 0, '2020-12-28 14:16:54'),
(104, 124, 'Điện thoại Vsmart Joy 3 (3GB/32GB)', 10, 1, '3788000', '60e46c0386.jpg', 0, '2020-12-28 14:18:10'),
(105, 124, 'Điện thoại Vsmart Joy 3 (3GB/32GB)', 10, 1, '3788000', '60e46c0386.jpg', 0, '2020-12-28 14:20:56'),
(106, 121, 'Điện thoại OPPO Find X2', 10, 1, '19880000', '59bff9a806.jpg', 0, '2020-12-28 14:33:16'),
(107, 121, 'Điện thoại OPPO Find X2', 13, 1, '19880000', '59bff9a806.jpg', 0, '2020-12-28 14:35:06'),
(108, 139, 'Điện thoại iPhone 12 256GB', 14, 1, '26890000', '5b4a45d905.png', 0, '2020-12-28 14:36:49'),
(109, 121, 'Điện thoại OPPO Find X2', 14, 1, '19880000', '59bff9a806.jpg', 0, '2020-12-28 14:37:12'),
(110, 120, 'Điện thoại Samsung Galaxy A21s (6GB/64GB)', 14, 1, '5788000', '8d671e0cf4.jpg', 0, '2020-12-28 14:37:48'),
(111, 121, 'Điện thoại OPPO Find X2', 14, 1, '19880000', '59bff9a806.jpg', 0, '2020-12-28 14:41:08'),
(112, 124, 'Điện thoại Vsmart Joy 3 (3GB/32GB)', 14, 2, '7576000', '60e46c0386.jpg', 0, '2020-12-28 16:12:06'),
(113, 139, 'Điện thoại iPhone 12 256GB', 8, 4, '107560000', '5b4a45d905.png', 0, '2020-12-28 16:58:40'),
(114, 124, 'Điện thoại Vsmart Joy 3 (3GB/32GB)', 15, 4, '15152000', '60e46c0386.jpg', 0, '2020-12-28 17:12:37'),
(115, 121, 'Điện thoại OPPO Find X2', 15, 1, '19880000', '59bff9a806.jpg', 0, '2020-12-28 17:58:10'),
(116, 139, 'Điện thoại iPhone 12 256GB', 15, 1, '26890000', '5b4a45d905.png', 1, '2020-12-28 18:17:58'),
(117, 124, 'Điện thoại Vsmart Joy 3 (3GB/32GB)', 15, 2, '7576000', '60e46c0386.jpg', 0, '2020-12-28 18:17:58'),
(118, 124, 'Điện thoại Vsmart Joy 3 (3GB/32GB)', 8, 1, '3788000', '60e46c0386.jpg', 0, '2020-12-28 20:00:04'),
(119, 121, 'Điện thoại OPPO Find X2', 11, 1, '19880000', '59bff9a806.jpg', 0, '2020-12-28 21:56:14'),
(120, 124, 'Điện thoại Vsmart Joy 3 (3GB/32GB)', 11, 2, '7576000', '60e46c0386.jpg', 0, '2020-12-28 21:56:30'),
(121, 139, 'Điện thoại iPhone 12 256GB', 11, 1, '26890000', '5b4a45d905.png', 0, '2020-12-28 22:13:02'),
(122, 120, 'Điện thoại Samsung Galaxy A21s (6GB/64GB)', 11, 1, '5788000', '8d671e0cf4.jpg', 0, '2020-12-28 22:13:02'),
(123, 119, 'Điện thoại Samsung Galaxy A20s 64GB', 11, 2, '9798000', 'abaecea45f.jpg', 0, '2020-12-28 22:13:02'),
(124, 139, 'Điện thoại iPhone 12 256GB', 16, 4, '107560000', '5b4a45d905.png', 2, '2020-12-28 22:16:25'),
(125, 121, 'Điện thoại OPPO Find X2', 17, 2, '39760000', '59bff9a806.jpg', 0, '2020-12-28 22:19:49'),
(126, 112, 'Điện thoại Samsung Galaxy Note 20 Ultra 5G Trắng', 17, 2, '53740000', '6d65454a8b.jpg', 0, '2020-12-28 22:20:54'),
(127, 139, 'Điện thoại iPhone 12 256GB', 8, 2, '53780000', '5b4a45d905.png', 1, '2020-12-28 22:22:14'),
(128, 118, 'Điện thoại iPhone 12 64GB', 8, 1, '22499000', 'c29b8ca1ea.jpg', 0, '2020-12-28 22:55:52'),
(129, 119, 'Điện thoại Samsung Galaxy A20s 64GB', 16, 2, '9798000', 'abaecea45f.jpg', 0, '2020-12-28 23:19:35'),
(130, 124, 'Điện thoại Vsmart Joy 3 (3GB/32GB)', 16, 2, '7576000', '60e46c0386.jpg', 0, '2020-12-28 23:29:49'),
(132, 111, 'Điện thoại iPhone 12 Pro 256GB', 18, 4, '120396000', '87a2c49e13.jpg', 0, '2020-12-29 01:12:06'),
(133, 139, 'Điện thoại iPhone 12 256GB', 16, 2, '53780000', '5b4a45d905.png', 0, '2020-12-29 02:58:45'),
(134, 119, 'Điện thoại Samsung Galaxy A20s 64GB', 16, 2, '9798000', 'abaecea45f.jpg', 0, '2020-12-29 03:02:04'),
(135, 115, 'Điện thoại OPPO Reno 5', 16, 5, '51945000', 'dd03bd637c.jpg', 0, '2020-12-29 03:05:31'),
(136, 139, 'Điện thoại iPhone 12 256GB', 16, 5, '134450000', '5b4a45d905.png', 1, '2020-12-29 03:08:12'),
(137, 124, 'Điện thoại Vsmart Joy 3 (3GB/32GB)', 16, 4, '15152000', '60e46c0386.jpg', 0, '2020-12-29 03:22:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `productName` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `product_code` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `productQuantity` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_soldout` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `product_remain` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `product_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`productId`, `productName`, `product_code`, `productQuantity`, `product_soldout`, `product_remain`, `catId`, `brandId`, `product_desc`, `type`, `price`, `image`) VALUES
(17, 'Điện thoại OPPO A93', 'OPPO A93', '22', '0', '22', 20, 5, '<p>+<span>OPPO A93 được trang bị chipset MediaTek Helio P95 tốc độ CPU đạt 2.2 GHz</span></p>\r\n<p>+H<span>oạt động tốt với nhiều ứng dụng nặng hay thao tác cuộn trang đều diễn ra trơn tru cảm giác như không có độ trễ</span></p>\r\n<p>+Hệ thống Camera cùng khả năng sạc nhanh lên đến 18W</p>', 0, '7490000', 'c62232bc16.jpg'),
(24, 'Điện thoại Vivo S1 Pro', 'VivoS1', '26', '0', '26', 21, 4, '<p>Vivo S1 Pro đa chức năng, hoạt động mạnh mẽ</p>', 0, '5490000', 'a40a862ddf.png'),
(26, 'Điện thoại Vsmart Joy 4 (4GB/64GB)', 'VismartJ4', '80', '8', '72', 23, 3, '<p><span>Vsmart Joy 4 là một bước tiến lớn về thiết kế so với các phiên bản trước</span></p>', 0, '3590000', '5ac8e9e16f.png'),
(27, 'Điện thoại iPhone 12 mini 64GB', 'iPhone12 Mini', '99', '3', '96', 24, 1, '<p>+Kích thước nhỏ gọn, tiện lợi, hiệu năng đỉnh cao</p>\r\n<p>+Sạc pin nhanh, dung lượng pin lớn</p>\r\n<p>+Bộ camera selfie chất lượng cao</p>', 0, '19490000', '81c0f40c76.jpg'),
(28, 'Điện thoại Samsung Galaxy Note 20 Ultra', 'SamsungUltra 20', '74', '4', '70', 19, 2, '<p>+Màn hình tràn viền lên đến 6.9 Inch sở hữu góc cạnh tối đa</p>\r\n<p>+Được trang bị công nghệ màn hình Dynamic AMOLED 2X</p>\r\n<p>+Thiết kế trẻ trung, hiện đại nhưng không kém phần sang trọng</p>', 0, '27990000', 'b51e1261c1.png'),
(102, 'Điện thoại Samsung Galaxy S20 FE', 'SS Galaxy', '88', '6', '82', 19, 2, '+Camera trên S20 FE là 3 cảm biến cho chất lượng ảnh đỉnh cao\r\n<br>\r\n+Bộ nhớ trong 128GB,  dung lượng pin lên đến 4500 mAh có trang bị tính năng sạc nhanh', 0, '14990000', '5f284a821c.jpg'),
(103, 'Điện thoại OPPO Reno3 Pro', 'Reno3 Pro', '39', '0', '39', 20, 5, '+Được trang bị màn hình AMOLED, 6.4\", Full HD+, hệ điều hành Adroid 10\r\n<br>\r\n+Camera sau với cấu hình khủng: 48 MP & Phụ 13 MP, 8 MP, 2 MP\r\n<br>\r\n+Thiết kế  trẻ trung năng động hướng tới giới trẻ cùng chức năng sạc nhanh với dung lượng pin lên đến 4025 mAh', 0, '6990000', '4e2ae7fc4d.jpg'),
(104, 'Điện thoại Vivo Y20', 'Vivo Y20', '46', '0', '46', 21, 4, '+Cấu hình mạnh mẽ trang bị CPU Snapdragon 460 8 nhân, bộ nhớ trong 8GB\r\n<br>\r\n+Màn hình tràn viền thiết kế giọt nước với tên gọi Halo Fullview, tỷ lệ khung hình 20:9 hiện đại, cho phép Y20 hiển thị nhiều thông tin hơn\r\n<br>\r\n+Độ phân giải HD+ cho độ chi tiết tốt, hình ảnh mịn, ít bị răng cưa.', 0, '3990000', '8c0c4ceabc.jpg'),
(105, 'Điện thoại Xiaomi Redmi Note 9 Pro (6GB/128GB)', 'Xiaomi Note 9 Pro', '68', '0', '68', 22, 20, '+Cấu hình mạnh mẽ cùng hệ thống 4 Camera sau chất lượng \r\n<br>\r\n+Thiết kế theo phong cách thể thao hướng đến các bạn trẻ và được trang bị công nghệ sạc nhanh với dung lượng pin lên đến 5020 mAh', 0, '6819000', 'd4770c91c5.jpg'),
(106, 'Điện thoại Vsmart Live 4 6GB', 'Vsmart Live 4', '92', '0', '92', 23, 3, '+Mặt trước của máy được bảo vệ lớp kính cường lực Corning Gorilla Glass 3 có độ bền nhất định, ít trầy xước và chịu được lực ấn mạnh tay hay va chạm nhẹ.\r\n<br>\r\n+Thân máy được hoàn thiện bằng chất liệu nhựa nhám mờ, ở giữa nổi bật là logo màu xám trắng dễ dàng nhận biết, thiết kế này thì phù hợp với mọi lứa tuổi.', 1, '4490000', 'ed12906801.jpg'),
(107, 'Điện thoại iPhone 12 mini 256GB', 'IP 12 Mini', '76', '0', '76', 24, 1, '+Nổi bật với camera trước 12 MP, camera sau với 2 camera 12 MP, bộ  nhớ trong 256 GB\r\n<br>\r\n+Đây là sản phẩm hỗ trợ 5G có thiết nhỏ nhất, nhẹ nhất, mỏng nhất trên thế giới cho đến thời điểm hiện tại (10/2020).', 0, '23990000', 'c77e6307bf.jpg'),
(108, 'Điện thoại Xiaomi Mi 10T Pro 5G', 'XM 10T', '86', '0', '86', 22, 20, '+Mượt mà trong từng khung hình với tần số quét 144 Hz\r\n<br>\r\n+Trang bị tần số quét 144 Hz là một trong những điểm ấn tượng của Mi 10T Pro, cung cấp lên đến 144 khung hình/giây mang đến sự mượt mà tối đa, nâng cao mọi trải nghiệm cho dù bạn đang chơi game, xem phim hay chỉ đơn giản là cuộn trang web để xem tin tức', 0, '12890000', 'd79a5fc84c.jpg'),
(109, 'Điện thoại Vivo Y1s', 'Vivo Y1s', '58', '0', '58', 21, 4, '+Màn hình máy có độ phân giải HD+ (720 x 1520 Pixels) vừa đủ để mang tới những trải nghiệm hình ảnh sống động, tuyệt vời.\r\n<br>\r\n+Được trang bị màn hình lớn kích thước 6.22 inch sử dụng tấm nền IPS LCD cho góc nhìn tốt, độ sáng cao, dễ dàng thao tác dưới nhiều điều kiện ánh sáng khác nhau.', 0, '2289000', 'ab5f197223.jpg'),
(110, 'Điện thoại OPPO A92', 'Oppo A92', '23', '0', '23', 20, 5, '+Máy được trang bị chipset Media Tek Helio P95 tốc độ CPU đạt 2.9 GHz với sức mạnh như thế này thì A93 sẽ không làm bạn thất vọng khi có thể hoạt động tốt với nhiều ứng dụng nặng hay thao tác cuộn trang đều diễn ra trơn tru cảm giác như không có độ trễ.\r\n<br>\r\n+Dung lượng pin lớn lên đến 4000 mAh cùng khả năng sạc nhanh', 0, '7280000', '8c083bf336.jpg'),
(111, 'Điện thoại iPhone 12 Pro 256GB', 'iP pro 12', '91', '0', '91', 24, 1, '+Thiết kế dạng hộp với phần khung viền vuông vức, mạnh mẽ đã từng xuất hiện trên iPhone 5, đồng thời kết thúc kỷ nguyên “bo cong” từ thế hệ iPhone 6.\r\n<br>\r\n+Công nghệ màn hình tràn viền sắc nét cùng với bộ nhớ trong mạnh mẽ lên đến 256 GB', 0, '30099000', '87a2c49e13.jpg'),
(112, 'Điện thoại Samsung Galaxy Note 20 Ultra 5G Trắng', 'SS GL 8', '81', '0', '81', 19, 2, '+Samsung Galaxy Note 20 Ultra 5G sở hữu một thiết kế đẹp như một tuyệt tác đồng thời sở hữu một hiệu năng cùng cấu hình vô cùng mạnh mẽ\r\n<br>\r\n+Samsung đã tối ưu mọi trải nghiệm với kiểu thiết kế tối giản với phần khung nhôm và 2 mặt kính cao cấp, 4 góc sắc cạnh làm tăng sự mạnh mẽ nam tính, nhưng vẫn cho cảm giác cầm nắm dễ chịu và đẳng cấp nhờ 2 cạnh viền được bo cong tinh tế khéo léo.', 0, '26870000', '6d65454a8b.jpg'),
(113, 'Điện thoại Vsmart Aris (8GB/128GB)', 'VM Aris', '77', '0', '77', 23, 3, '+Phần thiết kế của Vsmart Aris có độ hoàn thiện cao với phần khung viền kim loại và mặt lưng là một lớp kính phủ nhám tốt giúp chống bám mồ hôi, dấu vân tay hiệu quả.\r\n<br>\r\n+Được trang bị Chip bảo mật Quantis QRNG an toàn tuyệt đối\r\n<br>\r\n+Trải nghiệm thoải mái và đã mắt với màn hình 6.39\", AMOLED Full HD+ cùng với bộ 4 Camera AI thông minh', 0, '6588000', '2ed5f49870.jpg'),
(114, 'Điện thoại Xiaomi Redmi Note 8 Pro (6GB/128GB)', 'XM Note8', '67', '0', '67', 22, 20, '+Trang bị công nghệ màn hình tràn cạnh AMOLED MODERN mang đến trải nghiệm người dùng tuyệt vời và hiện đại nhất.\r\n<br>\r\n+Cấu hình khá mạnh mẽ với RAM 6GB và bộ nhớ trong lên đến 128 GB cùng với công nghệ sạc nhanh', 0, '5720000', '846adfd5e5.jpg'),
(115, 'Điện thoại OPPO Reno 5', 'Oppo R5', '33', '0', '33', 20, 5, '+Oppo Reno 5 được tích hợp công nghệ đèn Led RGB nhiều chế độ, âm thanh sống động cùng kết nối Bluetooth 5.0 hiện đại\r\n<br>\r\n+Trang bị công nghệ video phơi sáng kép, video hiển thị kép Auto10 và thiết kể tinh gọn, thể thao nhưng có cấu hình vô cùng vượt trội so với các sản phẩm cùng phân khúc', 0, '10389000', 'dd03bd637c.jpg'),
(116, 'Điện thoại Vsmart Joy 4 (6GB/64GB)', 'Vs 4', '95', '0', '95', 23, 3, '+Vsmart Joy 4 cải tiến vượt bậc về ngoại hình với phần lưng được làm nhám nên rất ít bám vân tay, kèm với những tông màu trẻ trung cho hiệu ứng chuyển màu gradient khi nghiêng máy ở các góc khác nhau.\r\n<br>\r\n+Tích hợp nhiều tính năng nổi bật từ hiệu năng mạnh mẽ, cụm 4 camera đa tính năng cho đến pin khủng 5000 mAh, hứa hẹn sẽ được nhiều người dùng săn đón.\r\n', 1, '3699000', '1c5ca0d485.jpg'),
(117, 'Điện thoại Vivo U10', 'Vivo 10', '56', '0', '56', 21, 4, '+Vivo U10 là một chiếc smartphone thuộc phân khúc giá tầm trung, gây ấn tượng với thiết kế màn hình giọt nước tràn viền, dung lượng pin khủng\r\n<br>\r\n+Màn hình chiếc điện thoại Vivo U10 có kích thước 6.35 inch độ phân giải HD+ trên tấm nền IPS LCD độ sáng cao, cho góc nhìn tốt, màu sắc trung tính giúp bạn có được trải nghiệm màn hình giải trí chất lượng.', 1, '3390000', '8743ead46b.jpg'),
(118, 'Điện thoại iPhone 12 64GB', 'IP 12', '52', '0', '52', 24, 1, '+Apple đã trang bị con chip mới nhất của hãng (tính đến 11/2020) cho iPhone 12 đó là A14 Bionic, được sản xuất trên tiến trình 5 nm với hiệu suất ổn định hơn so với chip A13 được trang bị trên phiên bản tiền nhiệm iPhone 11.\r\n<br>\r\n+Máy được trang bị công nghệ OLED rực rỡ, thiết kế sang trọng, vừa vặn\r\n<br>\r\n+Cấu hình vượt trội với CPU Apple A14 Bionic 6 nhân, bộ nhớ trong lên đến 64 GB  cùng cụm Camera Smart HDR3 sở hữu góc chụp siêu rộng, siêu nét', 0, '22499000', 'c29b8ca1ea.jpg'),
(119, 'Điện thoại Samsung Galaxy A20s 64GB', 'SS A20s', '35', '0', '35', 19, 2, '+Trong phân khúc điện thoại tầm trung, Samsung Galaxy A20s là một trong những smartphone hiếm hoi được trang bị cụm 3 camera sau.\r\n<br>\r\n+Samsung Galaxy A20s 64GB là phiên bản cải tiến của chiếc Samsung Galaxy A20 64GB  đã ra mắt trước đó với những nâng cấp về mặt camera và kích thước màn hình do đó hướng đến trải nghiệm người dùng chất lượng nhất', 0, '4899000', 'abaecea45f.jpg'),
(120, 'Điện thoại Samsung Galaxy A21s (6GB/64GB)', 'SS GL', '44', '0', '44', 19, 2, '+Samsung Galaxy A21s là chiếc điện thoại tầm trung mới của Samsung, mang trong mình có thiết kế màn hình nốt ruồi thời thượng, cùng cụm 4 camera sau độ phân giải lên đến 48 MP hỗ trợ nhiều tính năng chụp ảnh hấp dẫn.\r\n<br>\r\n+Máy sở hữu thiết kế siêu tràn viền theo xu hướng 2020 với viền màn hình tràn ra các cạnh và camera trước dạng nốt ruồi giúp không gian sử dụng rộng hơn, ít gây cảm giác khó chịu cho người dùng.', 1, '5788000', '8d671e0cf4.jpg'),
(121, 'Điện thoại OPPO Find X2', 'Oppo X2', '37', '1', '36', 20, 5, '+Find X2 sở hữu màn hình AMOLED Ultra Vision cao cấp với kích thước lên đến 6.78 inch cùng độ phân giải 2K+ cực nét được bảo vệ bằng kính cường lực Corning Gorilla Glass 6 cao cấp.\r\n<br>\r\n+Find X2 được tích hợp những đường nét thanh lịch từ thiết kế phần cứng cho đến trải nghiệm phần mềm, hứa hẹn một vẻ đẹp hoàn hảo, một sức mạnh xứng tầm.', 0, '19880000', '59bff9a806.jpg'),
(122, 'Điện thoại Vivo Y11', 'VV Y11', '29', '0', '29', 21, 4, '+Chiếc điện thoại Vivo sở hữu viên pin dung lượng “khủng” 5.000 mAh cho bạn thời lượng sử dụng điện thoại miệt mài trong một ngày dài chỉ với một lần sạc.\r\n<br>\r\n+Cấu hình mạnh mẽ với CPU Snapdragon 439 8 nhân cùng với RAM 3GB và bộ nhớ trong lên tới 32GB', 1, '2780000', '74b313d77e.jpg'),
(123, 'Điện thoại Xiaomi Redmi Note 9', 'XM RED', '36', '0', '36', 22, 20, '+Xiaomi Redmi Note 9 sở hữu thiết kế bo cong mềm mại ở các cạnh, cho trải nghiệm dễ cầm nắm và đằm tay hơn. Mặt sau vẫn được làm nổi bật và dễ nhận biết từ xa với cụm camera nổi bật, đặc trưng của dòng Redmi Note năm nay.\r\n<br>\r\n+Xiaomi Redmi Note 9 là mẫu smartphone tầm trung, cân bằng giữa các yếu tố thiết kế, camera và hiệu năng, đáp ứng mượt mà hầu hết các nhu cầu từ cơ bản đến nâng cao của người dùng.', 1, '4190000', 'fc20edd699.jpg'),
(124, 'Điện thoại Vsmart Joy 3 (3GB/32GB)', 'VS J3', '64', '0', '64', 23, 3, '+ Vsmart Joy 3 3GB/32GB mang trong mình thiết kế trẻ trung, hiện đại, hiệu năng tốt cùng thời lượng pin lớn với giá bán hấp dẫn phù hợp với đại đa số người dùng\r\n<br>\r\n+Với thiết kế mặt lưng chuyển màu sắc độc đáo ôm khít thân máy, các góc cạnh được bo tròn mềm mại giúp Vsmart Joy 3 nằm gọn trong lòng bàn tay bạn.', 1, '3788000', '60e46c0386.jpg'),
(125, 'Điện thoại iPhone 12 Pro Max 512GB', 'MH123123', '94', '0', '94', 24, 1, '+ iPhone 12 Pro Max 512GB đã làm đứng ngồi không yên bao “fan cứng” nhà Apple, với những nâng cấp vô cùng nổi bật hứa hẹn sẽ mang đến những trải nghiệm tốt nhất về mọi mặt mà chưa một chiếc iPhone tiền nhiệm nào có được.\r\n<br>\r\n+Cấu hình siêu việt với RAM 6GB , Chip A14 và mạng 5G tiên tiến cùng bộ 3 Camera sau chụp đêm siêu đỉnh\r\n<br>\r\n+Quay trở lại đầy hoài niệm với thiết kế phẳng, vuông vức tương tự iPhone 4 nhưng không hề cho cảm giác lỗi thời mà hoàn toàn sang trọng với thiết kế tinh tế và được cấu tạo từ những vật liệu cao cấp hơn.', 1, '40990000', '73af96c6ee.jpg'),
(135, 'Điện thoại Realme C3 (3GB/64GB)', 'RM C3', '16', '0', '16', 18, 22, '+Realme C3 là một trong những chiếc điện thoại hiếm hoi trong phân khúc giá rẻ trang bị cụm 3 camera sau, mang đến nhiều tính năng chụp hình đa dạng hơn cho người dùng thỏa sức sáng tạo.\r\n<br>\r\n+sở hữu hiệu năng vượt trội trong tầm giá với vi xử lý Helio G70, cụm camera sau đa tính năng, màn hình tràn viền thời thượng. Nay ra mắt thêm tùy chọn bộ nhớ 64 GB, cho phép người dùng lưu trữ hay cài đặt ứng dụng thoải mái hơn.', 1, '3599000', '2300f71cb6.jpg'),
(136, 'Điện thoại Realme 5i (4GB/64GB)', 'RM 5i', '24', '0', '24', 18, 22, '+Realme 5i 4GB/64GB là một smartphone mới ra mắt của Realme trong năm 2020. Chiếc điện thoại nổi bật với thiết kế 4 camera hiện đại, hiệu năng tốt, dung lượng pin khủng cùng với giá bán cực kỳ hấp dẫn.\r\n<br>\r\n+Chiếc điện thoại Realme 5i được trang bị màn hình kích thước 6.52 inch với độ phân giải HD+ sử dụng tấm nền IPS-LCD cho góc nhìn tốt kết hợp cùng mặt kính cường lực Corning Gorilla Glass 3+ với độ bền cao.', 1, '3610000', 'e47394ecb9.jpg'),
(137, 'Điện thoại Nokia 3.4', 'NK 3', '18', '0', '18', 18, 21, '+Công ty HMD Global đến từ Phần Lan vừa chính thức bổ sung thành viên mới cho loạt smartphone giá rẻ của mình. Đây là một sản phẩm có màn hình lớn, thiết kế cứng cáp và là điện thoại Nokia series 3 đầu tiên sở hữu màn hình \"đục lỗ\", đó chính là Nokia 3.4.\r\n<br>\r\n+Nokia 3.4 sở hữu màn hình IPS LCD kích thước 6.39 inch độ phân giải HD+, màn hình có thiết kế theo kiểu đục lỗ đang là xu hướng, với một màn hình lớn thì bạn có thể tận dụng được tối đa khả năng hiển thị để phục vụ các nhu cầu như vui chơi, giải trí và làm việc.', 1, '3389000', '75cdf1b560.jpg'),
(139, 'Điện thoại iPhone 12 256GB', 'IP 256GB', '83', '29', '54', 24, 1, '+iPhone 12 256 GB được Apple cho ra mắt đã đem đến làn sóng mạnh mẽ đối với những ai yêu công nghệ nói chung và “fan hâm mộ” trung thành của iPhone nói riêng, với con chip mạnh, dung lượng lưu trữ lớn cùng thiết kế toàn diện và khả năng hiển thị hình ảnh xuất sắc.\r\n<br>\r\n+Màn hình Super Retina XDR 6.1 inch sắc nét, màu sắc sống động, đem đến những hình ảnh chi tiết, sắc nét và chân thật.', 1, '26890000', '5b4a45d905.png'),
(140, 'Điện thoại OnePlus 8T 5G', '8T 5GB', '96', '0', '96', 18, 8, '+OnePlus 8T là chiếc flagship mới nhất của OnePlus vừa được trình làng, gây ấn tượng với màn hình 120 Hz, tốc độ sạc siêu nhanh và cấu hình mạnh mẽ.\r\n<br>\r\n+OnePlus 8T có thiết kế mang nhiều nét tương đồng với \"người anh em\" OnePlus 8 Pro khi cũng sở hữu màn hình AMOLED kích thước 6.55 inch, thon dài tỉ lệ 20:9, bo mép cong 3D hai bên, viền màn hình siêu mỏng, sang trọng và cuốn hút ngay từ cái nhìn đầu tiên. ', 1, '17990000', '97b5596edc.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `sliderId` int(11) NOT NULL,
  `sliderName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`sliderId`, `sliderName`, `slider_image`, `type`) VALUES
(12, 'Slide Giảm Giá', '4707c33947.jpg', 1),
(13, 'Slide iPhone', 'a621cd4b31.png', 0),
(14, 'Slide Samsung', '4f2c51f1e7.png', 0),
(15, 'Slide Oppo', '315b4bd9ab.png', 0),
(16, 'Slide Vivo', 'c23d12790b.png', 0),
(17, 'Slide Pro', 'daec5b1d5c.png', 0),
(18, 'Slide Tiger Sale', 'b0ead7e461.png', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `warehouse`
--

CREATE TABLE `warehouse` (
  `id_warehouse` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `sl_nhap` varchar(50) NOT NULL,
  `sl_ngaynhap` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `warehouse`
--

INSERT INTO `warehouse` (`id_warehouse`, `id_sanpham`, `sl_nhap`, `sl_ngaynhap`) VALUES
(1, 22, '5', '2019-07-16 18:31:22'),
(2, 21, '10', '2019-07-16 18:32:03'),
(3, 21, '3', '2019-07-16 18:42:59'),
(4, 20, '5', '2019-07-16 18:51:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wishlist`
--

INSERT INTO `wishlist` (`id`, `customer_id`, `productId`, `productName`, `price`, `image`) VALUES
(5, 6, 27, 'Điện thoại iPhone 12 mini 64GB', '19490000', '81c0f40c76.jpg'),
(6, 6, 24, 'Điện thoại Vivo S1 Pro', '5490000', 'a40a862ddf.png'),
(8, 8, 125, 'Điện thoại iPhone 12 Pro Max 512GB', '40990000', '73af96c6ee.jpg'),
(9, 8, 115, 'Điện thoại OPPO Reno 5', '10389000', 'dd03bd637c.jpg'),
(10, 8, 140, 'Điện thoại OnePlus 8T 5G', '17990000', '97b5596edc.jpg'),
(11, 11, 139, 'Điện thoại iPhone 12 256GB', '26890000', '5b4a45d905.png'),
(12, 10, 121, 'Điện thoại OPPO Find X2', '19880000', '59bff9a806.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `fk_cart_product` (`productId`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catId`);

--
-- Chỉ mục cho bảng `compare`
--
ALTER TABLE `compare`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_or_comp` (`customer_id`),
  ADD KEY `fk_or_pro_com` (`productId`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_or_cus` (`customer_id`),
  ADD KEY `fk_order_prod` (`productId`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `fk_or_product` (`catId`),
  ADD KEY `fk_prod_brand` (`brandId`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`sliderId`);

--
-- Chỉ mục cho bảng `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id_warehouse`);

--
-- Chỉ mục cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_wi_pro` (`productId`),
  ADD KEY `fk_wi_prod` (`customer_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `compare`
--
ALTER TABLE `compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `sliderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id_warehouse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_product` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`);

--
-- Các ràng buộc cho bảng `compare`
--
ALTER TABLE `compare`
  ADD CONSTRAINT `fk_or_comp` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `fk_or_pro_com` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_or_cus` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `fk_order_prod` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_or_product` FOREIGN KEY (`catId`) REFERENCES `category` (`catId`),
  ADD CONSTRAINT `fk_prod_brand` FOREIGN KEY (`brandId`) REFERENCES `brand` (`brandId`);

--
-- Các ràng buộc cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `fk_wi_pro` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`),
  ADD CONSTRAINT `fk_wi_prod` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

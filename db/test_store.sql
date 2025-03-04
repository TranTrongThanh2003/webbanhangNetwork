-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th9 10, 2024 lúc 02:33 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `test_store`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`adminid`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_client`
--

CREATE TABLE `cart_client` (
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_client`
--

INSERT INTO `cart_client` (`cart_id`, `customer_id`, `product_id`, `quantity`, `date_added`) VALUES
(30, 7, 961461, 4, '2024-08-31 14:57:55'),
(80, 52, 431860, 1, '2024-09-09 23:26:43'),
(81, 53, 7, 1, '2024-09-10 01:00:15'),
(82, 53, 28, 2, '2024-09-10 01:00:23'),
(83, 56, 961461, 1, '2024-09-10 01:47:48'),
(84, 56, 431860, 2, '2024-09-10 01:47:52'),
(87, 1, 11, 1, '2024-09-10 02:08:07'),
(91, 8, 961461, 1, '2024-09-10 07:14:07'),
(92, 8, 431860, 2, '2024-09-10 07:14:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`contact_id`, `email`, `message`) VALUES
(1, '', ''),
(2, '', ''),
(3, '', 'Xin chào, sản phẩm bên bạn rất tốt nha'),
(4, '', ''),
(5, '', ''),
(6, '', ''),
(7, '', ''),
(8, '', ''),
(9, '', ''),
(10, '', ''),
(11, '', ''),
(12, '', ''),
(13, '', ''),
(14, '', ''),
(15, '', ''),
(16, '', ''),
(17, '', ''),
(18, '', ''),
(19, '', ''),
(20, '', ''),
(21, '', ''),
(22, '', ''),
(23, 'thutuong16012003@gmail.com', 'Tôi muốn mua sản phẩm router wifi bên bạn có không ?'),
(24, '', ''),
(25, '', ''),
(26, '', ''),
(27, '', ''),
(28, '', ''),
(29, '', ''),
(30, '', ''),
(31, '', ''),
(32, '', ''),
(33, '', ''),
(34, '', ''),
(35, '', ''),
(36, '', ''),
(37, '', ''),
(38, '', ''),
(39, '', ''),
(40, '', ''),
(41, '', ''),
(42, '', ''),
(43, '', ''),
(44, '', ''),
(45, '', ''),
(46, '', ''),
(47, '', ''),
(48, '', ''),
(49, '', ''),
(50, '', ''),
(51, '', ''),
(52, '', ''),
(53, '', ''),
(54, '', ''),
(55, '', ''),
(56, '', ''),
(57, '', ''),
(58, 'lan@gmail', ''),
(59, '', ''),
(60, '', ''),
(61, '', ''),
(62, '', ''),
(63, '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `customerid` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `mi` varchar(1) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `zipcode` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`customerid`, `firstname`, `mi`, `lastname`, `address`, `country`, `zipcode`, `mobile`, `telephone`, `email`, `password`) VALUES
(1, 'Trần', 'T', 'Thành', 'An Bình, Dĩ An', 'Đồng Nai', '10000', '0398292488', '0398292488', '2151150058@ut.edu.vn', '12345'),
(7, 'Hieu', 'N', 'PC', 'số 1, đường số 2, phường 25, Q. Bình Thạnh', 'Hồ Chí Minh', '7000', '0123456789', '023456782', 'hieupc@gmail.com', '67890'),
(8, 'Linh', 'Q', 'Nguyễn', 'thôn Hoa Sen, xã Diễn Lâm, huyện Diễn Châu', 'Nghệ An', '20000', '0375678512', '037890124', 'linhnguyen@gmail.com', 'linhcute'),
(41, 'TRAN', 'T', 'QUYNH', 'số 70 Tô Ký', '100000', '100000', '0398292466', '0398292444', 'quynh@gmail.com', '67890'),
(52, 'TRAN', 'T', 'CONG', 'số 8 bình chánh', 'Sài Gòn', '100000', '0398292489', '', 'cong@gmail.com', '67890'),
(53, 'LE', 'V', 'THANG', 'số 70 Tân Bình', 'Sài Gòn', '100000', '0398292417', '', 'thang@gmail.com', '67890'),
(56, 'LÝ', 'N', 'HÂN', 'số 7', 'LA', '100000', '0398292461', '', 'han@gmail.com', '67890');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_client`
--

CREATE TABLE `order_client` (
  `order_id` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(10) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `order_status` varchar(50) NOT NULL DEFAULT 'Pending',
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_client`
--

INSERT INTO `order_client` (`order_id`, `customerid`, `customer_name`, `address`, `country`, `email`, `mobile`, `product_name`, `quantity`, `size`, `price`, `total_price`, `order_status`, `order_date`) VALUES
(116, 8, 'Linh Nguyễn', 'thôn Hoa Sen, xã Diễn Lâm, huyện Diễn Châu', 'Nghệ An', 'linhnguyen@gmail.com', '0375678512', 'RASA5506W-E-FTD-K9', 1, '1.8kg', 30.00, 76.00, 'ON HOLD', '2024-09-04 21:20:05'),
(117, 8, 'Linh Nguyễn', 'thôn Hoa Sen, xã Diễn Lâm, huyện Diễn Châu', 'Nghệ An', 'linhnguyen@gmail.com', '0375678512', 'ASA5525-K9', 1, '1.7kg', 46.00, 76.00, 'ON HOLD', '2024-09-04 21:20:05'),
(118, 8, 'Linh Nguyễn', 'thôn Hoa Sen, xã Diễn Lâm, huyện Diễn Châu', 'Nghệ An', 'linhnguyen@gmail.com', '0375678512', 'FPR9K-SM24-FTD-BUN', 1, '2.3kg', 40.00, 40.00, 'ON HOLD', '2024-09-04 21:20:41'),
(119, 8, 'Linh Nguyễn', 'thôn Hoa Sen, xã Diễn Lâm, huyện Diễn Châu', 'Nghệ An', 'linhnguyen@gmail.com', '0375678512', 'FPR9K-SM24-FTD-BUN', 1, '2.3kg', 40.00, 40.00, 'ON HOLD', '2024-09-04 22:08:39'),
(120, 8, 'Linh Nguyễn', 'thôn Hoa Sen, xã Diễn Lâm, huyện Diễn Châu', 'Nghệ An', 'linhnguyen@gmail.com', '0375678512', 'FP7110-K9', 1, '1.3kg', 27.00, 27.00, 'ON HOLD', '2024-09-04 22:09:12'),
(121, 1, 'Trần Thành', 'An Bình, Dĩ An', 'Đồng Nai', '2151150058@ut.edu.vn', '0398292488', 'RASA5506W-E-FTD-K9', 1, '1.8kg', 30.00, 84.00, 'ON HOLD', '2024-09-04 22:34:17'),
(122, 1, 'Trần Thành', 'An Bình, Dĩ An', 'Đồng Nai', '2151150058@ut.edu.vn', '0398292488', 'FP7110-K9', 2, '1.3kg', 27.00, 84.00, 'ON HOLD', '2024-09-04 22:34:17'),
(123, 1, 'Trần Thành', 'An Bình, Dĩ An', 'Đồng Nai', '2151150058@ut.edu.vn', '0398292488', 'RASA5506W-E-FTD-K9', 1, '1.8kg', 30.00, 84.00, 'ON HOLD', '2024-09-04 22:58:48'),
(124, 1, 'Trần Thành', 'An Bình, Dĩ An', 'Đồng Nai', '2151150058@ut.edu.vn', '0398292488', 'FP7110-K9', 2, '1.3kg', 27.00, 84.00, 'ON HOLD', '2024-09-04 22:58:48'),
(125, 8, 'Linh Nguyễn', 'thôn Hoa Sen, xã Diễn Lâm, huyện Diễn Châu', 'Nghệ An', 'linhnguyen@gmail.com', '0375678512', 'FP7110-K9', 1, '1.3kg', 27.00, 69.00, 'ON HOLD', '2024-09-05 09:50:00'),
(126, 8, 'Linh Nguyễn', 'thôn Hoa Sen, xã Diễn Lâm, huyện Diễn Châu', 'Nghệ An', 'linhnguyen@gmail.com', '0375678512', 'SF95D-08 - SF95D-08-AS', 1, '1.8kg', 42.00, 69.00, 'ON HOLD', '2024-09-05 09:50:00'),
(127, 8, 'Linh Nguyễn', 'thôn Hoa Sen, xã Diễn Lâm, huyện Diễn Châu', 'Nghệ An', 'linhnguyen@gmail.com', '0375678512', 'CISCO ASA 5555-X', 1, '1.5kg', 36.00, 36.00, 'ON HOLD', '2024-09-05 10:04:39'),
(128, 8, 'Linh Nguyễn', 'thôn Hoa Sen, xã Diễn Lâm, huyện Diễn Châu', 'Nghệ An', 'linhnguyen@gmail.com', '0375678512', 'CISCO ASA 5555-X', 1, '1.5kg', 36.00, 36.00, 'ON HOLD', '2024-09-05 10:05:08'),
(129, 1, 'Trần Thành', 'An Bình, Dĩ An', 'Đồng Nai', '2151150058@ut.edu.vn', '0398292488', 'RASA5506W-E-FTD-K9', 1, '1.8kg', 30.00, 306.00, 'ON HOLD', '2024-09-09 20:29:21'),
(130, 1, 'Trần Thành', 'An Bình, Dĩ An', 'Đồng Nai', '2151150058@ut.edu.vn', '0398292488', 'ASA5525-K9', 6, '1.7kg', 46.00, 306.00, 'ON HOLD', '2024-09-09 20:29:21'),
(131, 52, 'TRAN CONG', 'số 8 bình chánh', 'Sài Gòn', 'cong@gmail.com', '0398292489', 'ASA5525-K9', 6, '1.7kg', 46.00, 276.00, 'ON HOLD', '2024-09-09 20:30:22'),
(132, 52, 'TRAN CONG', 'số 8 bình chánh', 'Sài Gòn', 'cong@gmail.com', '0398292489', 'ASA5525-K9', 6, '1.7kg', 46.00, 308.00, 'ON HOLD', '2024-09-09 20:36:27'),
(133, 52, 'TRAN CONG', 'số 8 bình chánh', 'Sài Gòn', 'cong@gmail.com', '0398292489', 'FPR4110', 1, '1.5kg', 32.00, 308.00, 'ON HOLD', '2024-09-09 20:36:27'),
(134, 52, 'TRAN CONG', 'số 8 bình chánh', 'Sài Gòn', 'cong@gmail.com', '0398292489', 'ASA5525-K9', 6, '1.7kg', 46.00, 412.00, 'ON HOLD', '2024-09-09 21:02:38'),
(135, 52, 'TRAN CONG', 'số 8 bình chánh', 'Sài Gòn', 'cong@gmail.com', '0398292489', 'FPR4110', 3, '1.5kg', 32.00, 412.00, 'ON HOLD', '2024-09-09 21:02:38'),
(136, 52, 'TRAN CONG', 'số 8 bình chánh', 'Sài Gòn', 'cong@gmail.com', '0398292489', 'FPR9K-SM24-FTD-BUN', 1, '2.3kg', 40.00, 412.00, 'ON HOLD', '2024-09-09 21:02:38'),
(137, 52, 'TRAN CONG', 'số 8 bình chánh', 'Sài Gòn', 'cong@gmail.com', '0398292489', 'ASA5525-K9', 6, '1.7kg', 46.00, 412.00, 'Đang giao hàng', '2024-09-09 21:08:25'),
(138, 52, 'TRAN CONG', 'số 8 bình chánh', 'Sài Gòn', 'cong@gmail.com', '0398292489', 'FPR4110', 3, '1.5kg', 32.00, 412.00, 'Đang giao hàng', '2024-09-09 21:08:25'),
(139, 52, 'TRAN CONG', 'số 8 bình chánh', 'Sài Gòn', 'cong@gmail.com', '0398292489', 'FPR9K-SM24-FTD-BUN', 1, '2.3kg', 40.00, 412.00, 'Đang giao hàng', '2024-09-09 21:08:25'),
(140, 52, 'TRAN CONG', 'số 8 bình chánh', 'Sài Gòn', 'cong@gmail.com', '0398292489', 'ASA5525-K9', 6, '1.7kg', 46.00, 412.00, 'Cancelled', '2024-09-09 21:08:45'),
(141, 52, 'TRAN CONG', 'số 8 bình chánh', 'Sài Gòn', 'cong@gmail.com', '0398292489', 'FPR4110', 3, '1.5kg', 32.00, 412.00, 'Cancelled', '2024-09-09 21:08:45'),
(142, 52, 'TRAN CONG', 'số 8 bình chánh', 'Sài Gòn', 'cong@gmail.com', '0398292489', 'FPR9K-SM24-FTD-BUN', 1, '2.3kg', 40.00, 412.00, 'Cancelled', '2024-09-09 21:08:45'),
(143, 52, 'TRAN CONG', 'số 8 bình chánh', 'Sài Gòn', 'cong@gmail.com', '0398292489', 'FPR2140-K9', 1, '2kg', 29.00, 29.00, 'ON HOLD', '2024-09-09 21:10:52'),
(144, 52, 'TRAN CONG', 'số 8 bình chánh', 'Sài Gòn', 'cong@gmail.com', '0398292489', 'FPR2140-K9', 1, '2kg', 29.00, 29.00, 'ON HOLD', '2024-09-09 21:11:09'),
(145, 52, 'TRAN CONG', 'số 8 bình chánh', 'Sài Gòn', 'cong@gmail.com', '0398292489', 'FPR2140-K9', 1, '2kg', 29.00, 29.00, 'ON HOLD', '2024-09-09 21:16:03'),
(146, 52, 'TRAN CONG', 'số 8 bình chánh', 'Sài Gòn', 'cong@gmail.com', '0398292489', 'FPR2140-K9', 1, '2kg', 29.00, 65.00, 'ON HOLD', '2024-09-09 21:23:27'),
(147, 52, 'TRAN CONG', 'số 8 bình chánh', 'Sài Gòn', 'cong@gmail.com', '0398292489', 'CISCO ASA 5555-X', 1, '1.5kg', 36.00, 65.00, 'ON HOLD', '2024-09-09 21:23:27'),
(148, 52, 'TRAN CONG', 'số 8 bình chánh', 'Sài Gòn', 'cong@gmail.com', '0398292489', 'FPR2140-K9', 1, '2kg', 29.00, 65.00, 'ON HOLD', '2024-09-09 21:23:30'),
(149, 52, 'TRAN CONG', 'số 8 bình chánh', 'Sài Gòn', 'cong@gmail.com', '0398292489', 'CISCO ASA 5555-X', 1, '1.5kg', 36.00, 65.00, 'ON HOLD', '2024-09-09 21:23:30'),
(150, 52, 'TRAN CONG', 'số 8 bình chánh', 'Sài Gòn', 'cong@gmail.com', '0398292489', 'FPR2140-K9', 1, '2kg', 29.00, 65.00, 'Confirmed', '2024-09-09 21:27:30'),
(151, 52, 'TRAN CONG', 'số 8 bình chánh', 'Sài Gòn', 'cong@gmail.com', '0398292489', 'CISCO ASA 5555-X', 1, '1.5kg', 36.00, 65.00, 'Confirmed', '2024-09-09 21:27:30'),
(152, 52, 'TRAN CONG', 'số 8 bình chánh', 'Sài Gòn', 'cong@gmail.com', '0398292489', 'FP7110-K9', 1, '1.3kg', 27.00, 27.00, 'ON HOLD', '2024-09-09 22:24:12'),
(153, 52, 'TRAN CONG', 'số 8 bình chánh', 'Sài Gòn', 'cong@gmail.com', '0398292489', 'FP7110-K9', 1, '1.3kg', 27.00, 27.00, 'ON HOLD', '2024-09-09 22:37:08'),
(154, 52, 'TRAN CONG', 'số 8 bình chánh', 'Sài Gòn', 'cong@gmail.com', '0398292489', 'FP7110-K9', 1, '1.3kg', 27.00, 27.00, 'ON HOLD', '2024-09-09 22:48:59'),
(155, 52, 'TRAN CONG', 'số 8 bình chánh', 'Sài Gòn', 'cong@gmail.com', '0398292489', 'FP7110-K9', 1, '1.3kg', 27.00, 27.00, 'ON HOLD', '2024-09-09 23:10:49'),
(156, 52, 'TRAN CONG', 'số 8 bình chánh', 'Sài Gòn', 'cong@gmail.com', '0398292489', 'FP7110-K9', 1, '1.3kg', 27.00, 27.00, 'ON HOLD', '2024-09-09 23:15:33'),
(158, 52, 'TRAN CONG', 'số 8 bình chánh', 'Sài Gòn', 'cong@gmail.com', '0398292489', 'ASA5516-FPWR-K9', 1, '1kg', 19.00, 19.00, 'Đang giao hàng', '2024-09-10 06:26:50'),
(159, 52, 'TRAN CONG', 'số 8 bình chánh', 'Sài Gòn', 'cong@gmail.com', '0398292489', 'ASA5516-FPWR-K9', 1, '1kg', 19.00, 19.00, 'Đã hủy đơn hàng', '2024-09-10 06:27:06'),
(160, 52, 'TRAN CONG', 'số 8 bình chánh', 'Sài Gòn', 'cong@gmail.com', '0398292489', 'ASA5516-FPWR-K9', 1, '1kg', 19.00, 19.00, 'Đã hủy đơn hàng', '2024-09-10 07:55:15'),
(161, 53, 'LE THANG', 'số 70 Tân Bình', 'Sài Gòn', 'thang@gmail.com', '0398292417', 'CISCO ASA 5555-X', 1, '1.5kg', 36.00, 66.00, 'Đang giao hàng', '2024-09-10 08:00:45'),
(162, 53, 'LE THANG', 'số 70 Tân Bình', 'Sài Gòn', 'thang@gmail.com', '0398292417', 'RASA5506W-E-FTD-K9', 1, '1.8kg', 30.00, 66.00, 'Đang giao hàng', '2024-09-10 08:00:45'),
(163, 53, 'LE THANG', 'số 70 Tân Bình', 'Sài Gòn', 'thang@gmail.com', '0398292417', 'CISCO ASA 5555-X', 1, '1.5kg', 36.00, 66.00, 'Đã hủy đơn hàng', '2024-09-10 08:01:21'),
(164, 53, 'LE THANG', 'số 70 Tân Bình', 'Sài Gòn', 'thang@gmail.com', '0398292417', 'RASA5506W-E-FTD-K9', 1, '1.8kg', 30.00, 66.00, 'Đã hủy đơn hàng', '2024-09-10 08:01:21'),
(165, 56, 'LÝ HÂN', 'số 7', 'LA', 'han@gmail.com', '0398292461', 'ASA5525-K9', 1, '1.7kg', 46.00, 65.00, 'Đang giao hàng', '2024-09-10 08:47:55'),
(166, 56, 'LÝ HÂN', 'số 7', 'LA', 'han@gmail.com', '0398292461', 'ASA5516-FPWR-K9', 1, '1kg', 19.00, 65.00, 'Đang giao hàng', '2024-09-10 08:47:55'),
(167, 56, 'LÝ HÂN', 'số 7', 'LA', 'han@gmail.com', '0398292461', 'ASA5525-K9', 1, '1.7kg', 46.00, 65.00, 'Đã hủy đơn hàng', '2024-09-10 08:48:52'),
(168, 56, 'LÝ HÂN', 'số 7', 'LA', 'han@gmail.com', '0398292461', 'ASA5516-FPWR-K9', 1, '1kg', 19.00, 65.00, 'Đã hủy đơn hàng', '2024-09-10 08:48:52'),
(169, 1, 'Trần Thành', 'An Bình, Dĩ An', 'Đồng Nai', '2151150058@ut.edu.vn', '0398292488', 'CISCO ASA 5555-X', 1, '1.5kg', 36.00, 36.00, 'Đang giao hàng', '2024-09-10 08:56:19'),
(170, 1, 'Trần Thành', 'An Bình, Dĩ An', 'Đồng Nai', '2151150058@ut.edu.vn', '0398292488', 'ASA5506H-SP-BUN-K8', 1, '1.8kg', 34.00, 34.00, 'Đang giao hàng', '2024-09-10 09:02:35'),
(171, 1, 'Trần Thành', 'An Bình, Dĩ An', 'Đồng Nai', '2151150058@ut.edu.vn', '0398292488', 'FPR2140-K9', 1, '2kg', 29.00, 29.00, 'Đang giao hàng', '2024-09-10 09:08:11'),
(172, 1, 'Trần Thành', 'An Bình, Dĩ An', 'Đồng Nai', '2151150058@ut.edu.vn', '0398292488', 'FPR2140-K9', 1, '2kg', 29.00, 29.00, 'Đã hủy đơn hàng', '2024-09-10 09:08:36'),
(173, 1, 'Trần Thành', 'An Bình, Dĩ An', 'Đồng Nai', '2151150058@ut.edu.vn', '0398292488', 'FPR2140-K9', 1, '2kg', 29.00, 29.00, 'Đã hủy đơn hàng', '2024-09-10 09:56:56'),
(174, 8, 'Linh Nguyễn', 'thôn Hoa Sen, xã Diễn Lâm, huyện Diễn Châu', 'Nghệ An', 'linhnguyen@gmail.com', '0375678512', 'ASA5525-K9', 1, '1.7kg', 46.00, 65.00, 'Đang giao hàng', '2024-09-10 12:26:19'),
(175, 8, 'Linh Nguyễn', 'thôn Hoa Sen, xã Diễn Lâm, huyện Diễn Châu', 'Nghệ An', 'linhnguyen@gmail.com', '0375678512', 'ASA5516-FPWR-K9', 1, '1kg', 19.00, 65.00, 'Đang giao hàng', '2024-09-10 12:26:19'),
(176, 8, 'Linh Nguyễn', 'thôn Hoa Sen, xã Diễn Lâm, huyện Diễn Châu', 'Nghệ An', 'linhnguyen@gmail.com', '0375678512', 'ASA5525-K9', 1, '1.7kg', 46.00, 65.00, 'Đã hủy đơn hàng', '2024-09-10 12:26:48'),
(177, 8, 'Linh Nguyễn', 'thôn Hoa Sen, xã Diễn Lâm, huyện Diễn Châu', 'Nghệ An', 'linhnguyen@gmail.com', '0375678512', 'ASA5516-FPWR-K9', 1, '1kg', 19.00, 65.00, 'Đã hủy đơn hàng', '2024-09-10 12:26:48'),
(178, 1, 'Trần Thành', 'An Bình, Dĩ An', 'Đồng Nai', '2151150058@ut.edu.vn', '0398292488', 'ASA5525-K9', 1, '1.7kg', 46.00, 65.00, 'Đã hủy đơn hàng', '2024-09-10 12:34:48'),
(179, 1, 'Trần Thành', 'An Bình, Dĩ An', 'Đồng Nai', '2151150058@ut.edu.vn', '0398292488', 'ASA5516-FPWR-K9', 1, '1kg', 19.00, 65.00, 'Đã hủy đơn hàng', '2024-09-10 12:34:48'),
(180, 1, 'Trần Thành', 'An Bình, Dĩ An', 'Đồng Nai', '2151150058@ut.edu.vn', '0398292488', 'ASA5525-K9', 1, '1.7kg', 46.00, 65.00, 'Đã hủy đơn hàng', '2024-09-10 13:50:31'),
(181, 1, 'Trần Thành', 'An Bình, Dĩ An', 'Đồng Nai', '2151150058@ut.edu.vn', '0398292488', 'ASA5516-FPWR-K9', 1, '1kg', 19.00, 65.00, 'Đã hủy đơn hàng', '2024-09-10 13:50:31'),
(182, 8, 'Linh Nguyễn', 'thôn Hoa Sen, xã Diễn Lâm, huyện Diễn Châu', 'Nghệ An', 'linhnguyen@gmail.com', '0375678512', 'ASA5525-K9', 1, '1.7kg', 46.00, 65.00, 'Đang giao hàng', '2024-09-10 14:14:19'),
(183, 8, 'Linh Nguyễn', 'thôn Hoa Sen, xã Diễn Lâm, huyện Diễn Châu', 'Nghệ An', 'linhnguyen@gmail.com', '0375678512', 'ASA5516-FPWR-K9', 1, '1kg', 19.00, 65.00, 'Đang giao hàng', '2024-09-10 14:14:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_size` varchar(50) NOT NULL,
  `product_image` varchar(500) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_size`, `product_image`, `brand`, `category`) VALUES
(3, 'ASA5505-BUN-K9', '41', '1.9kg', 'ASA5505-BUN-K9.jpg', 'cisco', 'feature'),
(4, 'ASA5508-FTD-K9', '33', '2.2kg', 'ASA5508-FTD-K9.jpg', 'cisco', 'feature'),
(6, 'ASA5506H-SP-BUN-K8', '34', '1.8kg', 'ASA5506H-SP-BUN-K8.jpg', 'cisco', 'Firewall'),
(7, 'CISCO ASA 5555-X', '36', '1.5kg', 'CISCO ASA 5555-X.jpg', 'cisco', 'Firewall'),
(8, 'FPR9K-SM24-FTD-BUN', '40', '2.3kg', 'FPR9K-SM24-FTD-BUN.jpg', 'cisco', 'Firewall'),
(9, 'FP7110-K9', '27', '1.3kg', 'FP7110-K9.jpg', 'cisco', 'Firewall'),
(10, 'FPR4110', '32', '1.5kg', 'FPR4110.jpg', 'cisco', 'Firewall'),
(11, 'FPR2140-K9', '29', '2kg', 'FPR2140-K9.jpg', 'cisco', 'Firewall'),
(13, 'Security Bundle CISCO 1941-SEC-K9', '28', '2.1kg', 'Security Bundle CISCO 1941-SEC-K9.jpg', 'cisco', 'feature'),
(14, 'C881SRST-K9', '35', '2kg', 'C881SRST-K9.jpg', 'cisco', 'Router'),
(15, 'C8200-UCPE-1N8', '28', '1.7kg', 'C8200-UCPE-1N8.jpg', 'cisco', 'Router'),
(16, 'C3925-VSEC-K9', '26', '2.1kg', 'C3925-VSEC-K9.jpg', 'cisco', 'Router'),
(17, 'C2911-VSEC-CUBE-K9', '31', '2kg', 'C2911-VSEC-CUBE-K9.jpg', 'cisco', 'Router'),
(19, 'SF95D-08 - SF95D-08-AS', '42', '1.8kg', 'SF95D-08 - SF95D-08-AS.jpg', 'cisco', 'Switch'),
(20, 'C9200-48P-E', '36', '1.3kg', 'C9200-48P-E.jpg', 'cisco', 'Switch'),
(21, 'WS-C3650-12X48FD-E', '39', '2.4kg', 'WS-C3650-12X48FD-E.jpg', 'cisco', 'Switch'),
(26, 'C2901-WAASX-SEC-K9', '44', '1.8kg', 'C2901-WAASX-SEC-K9.jpg', 'cisco', 'feature'),
(28, 'RASA5506W-E-FTD-K9', '30', '1.8kg', 'RASA5506W-E-FTD-K9.jpg', 'cisco', 'Firewall'),
(29, 'WS-C3850-12S-E', '45', '1.7kg', 'WS-C3850-12S-E.jpg', 'cisco', 'Switch'),
(30, 'C9500-24Q-A', '24', '2kg', 'C9500-24Q-A.jpg', 'cisco', 'Switch'),
(31, 'C9200-24P-0A', '43', '1.5kg', 'C9200-24P-0A.jpg', 'cisco', 'Switch'),
(157, 'ASA5508-K9', '41', '2.4kg', 'ASA5508-K9.jpg', 'cisco', 'feature'),
(21561, '1941-HSEC+K9 ', '46', '1.9kg', '1941-HSEC+K9.jpg', 'cisco', 'feature'),
(51292, 'A9K-MPA-1X100G-FC', '34', '2.2kg', 'A9K-MPA-1X100G-FC.jpg', 'cisco', 'Router'),
(358159, 'A99-48X10GE-1G-FC', '23', '3kg', 'A99-48X10GE-1G-FC.jpg', 'cisco', 'Router'),
(431860, 'ASA5516-FPWR-K9', '19', '1kg', 'ASA5516-FPWR-K9.jpg', 'cisco', 'Firewall'),
(961461, 'ASA5525-K9', '46', '1.7kg', 'ASA5525-K9.jpg', 'cisco', 'Firewall'),
(6938948, 'FW', '20 ', '2', '70694396297232428giaohang.jpg', 'cisco', 'Router');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`id`, `email`, `comment`, `rating`, `created_at`) VALUES
(1, '2151150058@ut.edu.vn', 'hay lắm', 3, '2024-08-12 00:58:07'),
(2, 'thutuong16012003@gmail.com', 'tạm được ', 5, '2024-08-12 01:11:20'),
(3, 'Hariwonhq@gmail.com', 'dùng gia đình được không bác?', 5, '2024-08-12 01:31:32'),
(4, 'congtyVNPT@gmail.com', 'Mình sẽ tiếp tục ủng hộ hàng bên đây. Uy tín !!!', 4, '2024-08-12 02:10:15'),
(0, 'hieupc@gmail.com', 'xài ok lắm', 5, '2024-08-16 06:56:19'),
(0, 'sontungmtp1994@gmail.com', 'công ty tôi mới thử, thấy chất lượng cũng ok được cái tư vấn nhiệt tình', 3, '2024-08-16 06:58:51'),
(0, 'Kimteahee1990@gmail.com', 'Giá hơi chua so với công ty của em huhu', 1, '2024-08-16 07:04:16'),
(0, 'hanni2004@gmail.com', 'Xài ổn định lắm ạ ~_~', 4, '2024-08-19 13:42:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `stock`
--

INSERT INTO `stock` (`stock_id`, `product_id`, `qty`) VALUES
(1, 71339, 20),
(2, 82631, 30),
(3, 3, 20),
(4, 4, 20),
(5, 6, 9),
(6, 7, 20),
(7, 8, 18),
(8, 9, 19),
(9, 10, 17),
(10, 11, 23),
(11, 13, 18),
(12, 14, 20),
(13, 15, 20),
(14, 16, 17),
(15, 17, 20),
(16, 19, 17),
(17, 20, 20),
(18, 21, 20),
(19, 26, 13),
(20, 28, 19),
(21, 29, 13),
(22, 30, 20),
(23, 31, 9),
(26, 431860, 7),
(27, 21561, 29),
(28, 358159, 20),
(29, 157, 24),
(30, 51292, 20),
(31, 961461, 6),
(32, 6938948, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `order_stat` varchar(100) NOT NULL,
  `order_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `customerid`, `amount`, `order_stat`, `order_date`) VALUES
(1, 1, 34, 'Đã hủy đơn hàng', 'Sep 10, 2024'),
(22, 8, 65, 'Đã hủy đơn hàng', 'Sep 10, 2024'),
(35, 1, 29, 'Đã hủy đơn hàng', 'Sep 10, 2024'),
(58, 1, 36, 'Đã hủy đơn hàng', 'Sep 10, 2024'),
(95, 8, 65, 'Đang giao hàng', 'Sep 10, 2024');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `transacton_detail_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `transaction_detail`
--

INSERT INTO `transaction_detail` (`transacton_detail_id`, `product_id`, `order_qty`, `transaction_id`) VALUES
(203, 961461, 1, 7),
(204, 431860, 1, 7),
(207, 11, 1, 35),
(206, 6, 1, 1),
(208, 961461, 1, 22),
(209, 431860, 1, 22),
(210, 961461, 1, 95),
(211, 431860, 1, 95);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Chỉ mục cho bảng `cart_client`
--
ALTER TABLE `cart_client`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerid`);

--
-- Chỉ mục cho bảng `order_client`
--
ALTER TABLE `order_client`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customerid` (`customerid`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Chỉ mục cho bảng `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD PRIMARY KEY (`transacton_detail_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `cart_client`
--
ALTER TABLE `cart_client`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `customerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `order_client`
--
ALTER TABLE `order_client`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT cho bảng `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `transaction_detail`
--
ALTER TABLE `transaction_detail`
  MODIFY `transacton_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart_client`
--
ALTER TABLE `cart_client`
  ADD CONSTRAINT `cart_client_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customerid`),
  ADD CONSTRAINT `cart_client_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Các ràng buộc cho bảng `order_client`
--
ALTER TABLE `order_client`
  ADD CONSTRAINT `order_client_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `customer` (`customerid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

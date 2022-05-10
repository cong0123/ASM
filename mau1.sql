-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 10, 2022 lúc 04:48 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mau1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone_number` bigint(50) NOT NULL,
  `usertype` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`adminID`, `username`, `password`, `phone_number`, `usertype`) VALUES
(1, 'admin', '3b34c61468032ba2db65cf8590f30d8c', 999888999, 'user'),
(3, 'admin1', '123', 999666, 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(18, 'Giày', '2022-05-03 02:36:32', '2022-05-10 03:13:45'),
(20, 'Áo', '2022-05-10 00:36:48', '2022-05-10 00:36:48'),
(21, 'Quần', '2022-05-10 00:44:48', '2022-05-10 00:44:48'),
(22, 'Dép', '2022-05-10 00:01:49', '2022-05-10 00:01:49'),
(23, 'Áo len', '2022-05-10 00:19:49', '2022-05-10 00:19:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `fullname`, `phone_number`, `email`, `address`, `order_date`) VALUES
(1, 'e', 'e', 'e@gmail.com', 'e', '2022-05-05 01:30:36'),
(2, '1', '1', '1@gmail.com', '1', '2022-05-05 02:04:04'),
(3, '1', '1', '1@gmail.com', '1', '2022-05-05 02:08:46'),
(4, 'cong', '0999', 'cong@gmail.com', 'ww', '2022-05-05 04:27:29'),
(5, 'dia', 'cc', 'dkdk@gmail.com', 'ddd', '2022-05-05 10:30:40'),
(6, '1', '1', 'cong1@gmail.com', '1', '2022-05-09 15:35:22'),
(7, 'minh cong', '0964696447', 'cong1@gmail.com', 'nguyen xi', '2022-05-10 01:01:16'),
(8, 'cong', '0964696447', 'cong1233@gmail.com', 'nguyen xi', '2022-05-10 03:06:08'),
(9, 'cong', '0964696447', 'cong1233@gmail.com', 'nguyen xi', '2022-05-10 03:46:13'),
(10, 'cong', '0964696447', 'cong1233@gmail.com', 'nguyen xi', '2022-05-10 04:09:24'),
(11, 'minh', '0964696447', 'cong1@gmail.com', 'Cong Hoa', '2022-05-10 04:33:33'),
(12, 'minh', '0964696447', 'cong1@gmail.com', 'Cong Hoa', '2022-05-10 04:33:46'),
(13, 'cong', '0964696447', 'cong1233@gmail.com', 'nguyen xi', '2022-05-10 06:04:26'),
(14, 'minh', '0964696447', 'shou.usc@gmail.com', 'Cong Hoa', '2022-05-10 13:21:02'),
(15, 'cong', '0964696447', 'cong1233@gmail.com', 'nguyen xi', '2022-05-10 13:57:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `num`, `price`) VALUES
(1, 2, 13, 1, 100),
(2, 3, 9, 27, 111),
(3, 4, 13, 1, 100),
(4, 5, 13, 1, 100),
(5, 6, 13, 2, 100),
(6, 7, 23, 4, 200),
(7, 7, 22, 1, 60),
(8, 8, 21, 2, 70),
(9, 9, 20, 1, 100),
(10, 10, 20, 3, 100),
(11, 10, 22, 3, 60),
(12, 11, 22, 2, 60),
(13, 12, 22, 1, 60),
(14, 13, 20, 2, 100),
(15, 14, 29, 3, 40),
(16, 14, 31, 2, 100),
(17, 15, 23, 3, 200);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `price` float DEFAULT NULL,
  `thumbnail` varchar(500) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `title`, `price`, `thumbnail`, `content`, `id_category`, `created_at`, `updated_at`) VALUES
(20, 'Quần baggy', 16, 'https://saigonsneaker.com/wp-content/uploads/2020/11/Quan-Baggy-Nam-Khaki-Den-2.jpg', '    Phù hợp mặc vào mùa hè  ', 21, '2022-05-10 00:00:50', '2022-05-10 14:37:01'),
(23, 'Giày Adidas Alphaboost', 200, 'https://ordixi.com/wp-content/uploads/2019/08/giay-adidas-alphaboost-system-g2858007.jpg', '  Giày phù hợp cho việc hoạt động thể thao ngoài trời', 18, '2022-05-10 00:50:52', '2022-05-10 00:50:52'),
(27, 'Áo len nữ', 1111, 'https://didalat.com/images/news/ao-len-da-lat-9.jpg', '  dd', 18, '2022-05-10 03:27:34', '2022-05-10 03:54:39'),
(29, 'áo len nữ ', 40, 'https://didalat.com/images/news/ao-len-da-lat-9.jpg', '  Áo len cho tuổi teen', 23, '2022-05-10 03:34:40', '2022-05-10 03:34:53'),
(31, 'cong dep trai', 100, 'https://afamilycdn.com/150157425591193600/2020/12/11/img5851-1607676310547853636978.jpg', 'đéo đổi được dũng làm tró', 23, '2022-05-10 04:14:01', '2022-05-10 04:54:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phone_number` mediumint(100) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `phone_number`, `address`, `email`, `created_at`, `updated_at`) VALUES
(35, 'cong', 'eb62f6b9306db575c2d596b1279627a4', 8388607, 'nguyen xi', 'cong1233@gmail.com', '2022-05-10 00:11:57', '2022-05-10 00:11:57'),
(36, 'cong1', '827ccb0eea8a706c4c34a16891f84e7b', 8388607, 'Cong Hoa', 'cong1@gmail.com', '2022-05-10 03:29:26', '2022-05-10 03:29:26'),
(37, 'cong01', '81dc9bdb52d04dc20036dbd8313ed055', 8388607, 'nguyen xi', 'cong123@gmail.com', '2022-05-10 05:54:59', '2022-05-10 05:54:59'),
(38, 'cong111', '202cb962ac59075b964b07152d234b70', 999, '1', '1@gmail.com', '2022-05-10 06:10:01', '2022-05-10 06:10:01'),
(39, 'cong100', 'c81e728d9d4c2f636f067f89cc14862c', 123, '1234', '1@gmail.com', '2022-05-10 10:26:06', '2022-05-10 10:26:06'),
(40, 'cong111', '202cb962ac59075b964b07152d234b70', 999, '111', '1@gmail.com', '2022-05-10 10:37:42', '2022-05-10 10:37:42'),
(41, 'congdz', '202cb962ac59075b964b07152d234b70', 8388607, 'Cong Hoa', 'shou.usc@gmail.com', '2022-05-10 13:37:20', '2022-05-10 13:37:20'),
(42, 'congkdz', '202cb962ac59075b964b07152d234b70', 8388607, 'nguyen xi', 'cong1233@gmail.com', '2022-05-10 13:25:37', '2022-05-10 13:25:37'),
(43, 'c1', 'c81e728d9d4c2f636f067f89cc14862c', 1, '1', '1@gmail.com', '2022-05-10 13:37:43', '2022-05-10 13:37:43');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

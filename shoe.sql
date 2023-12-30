-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 30, 2023 lúc 01:22 PM
-- Phiên bản máy phục vụ: 8.2.0
-- Phiên bản PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shoe`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `shoe_id` int NOT NULL,
  `shoe_color` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `shoe_size` int NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `shoe_id` (`shoe_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cart_id` int NOT NULL,
  `quantity` int NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_id` (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shoe`
--

DROP TABLE IF EXISTS `shoe`;
CREATE TABLE IF NOT EXISTS `shoe` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price` bigint NOT NULL,
  `img_name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `roles` int NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `review` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `shoe`
--

INSERT INTO `shoe` (`id`, `name`, `price`, `img_name`, `roles`, `category`, `color`, `review`) VALUES
(3, 'Adidas 1', 100000, 'add1', 2, 'Adidas', 'xanh', ''),
(7, 'Adidas 2', 100000, 'add2', 1, 'Adidas', 'xanh', ''),
(8, 'Nike 1', 100000, 'nike1', 2, 'nike', 'xanh', ''),
(9, 'Nike 2', 100000, 'nike2', 0, 'nike', 'xanh', ''),
(10, 'MLB 1', 100000, 'mlb1', 1, 'MLB', 'xanh', ''),
(11, 'MLB 2', 100000, 'mlb2', 2, 'MLB', 'xanh', ''),
(13, 'Vans 1', 100000, 'vans1', 1, 'vans', 'xanh', ''),
(24, 'Puma 1', 100000, 'puma1', 0, 'puma', 'xanh', ''),
(28, 'Adidas3', 0, 'add3', 0, 'Adidas', '[value-7]', '[value-8]'),
(32, 'Nike3', 0, 'nike3', 0, 'nike', '[value-7]', '[value-8]'),
(34, 'Puma2', 0, 'puma2', 0, 'puma', '[value-7]', '[value-8]'),
(36, 'Vans2', 0, 'vans2', 0, 'vans', '[value-7]', '[value-8]'),
(37, 'Vans3', 0, 'vans3', 0, 'vans', '[value-7]', '[value-8]');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `address`, `role`, `email`, `phone`) VALUES
(15, 'truong', '25d55ad283aa400af464c76d713c07ad', 'Bắc Ninh', 0, 'truongjae@gmail.com', '0345382198'),
(17, 'son', '123456', '[value-4]', 0, '[value-6]', '[value-7]'),
(18, 'Phuc', '123456', '[value-4]', 1, '[value-6]', '[value-7]'),
(20, 'Quan', '123456', '', 0, '', ''),
(21, 'phucdinh', '123', '', 0, '', ''),
(22, 'khue0804gl', '123456', '', 0, '', '');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`shoe_id`) REFERENCES `shoe` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

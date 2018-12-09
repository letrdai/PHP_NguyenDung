-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2018 at 05:05 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `thumbnail`, `parent_id`, `status`) VALUES
(1, 'Điện thoại', '', 'glyphicon glyphicon-phone', 1, 1),
(2, 'Tablet', '', 'fa fa-tablet', 1, 1),
(3, 'Macbook', '', 'fa fa-laptop', 1, 1),
(4, 'Phụ kiên', '', 'fab fa-usb', 1, 1),
(5, 'Âm nhạc', '', 'fa fa-music', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `note` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fullname`, `email`, `address`, `phone`, `note`, `status`, `created_time`) VALUES
(8, 0, 'Trung Bảo Lộc Đỗ', 'nguyenthituyettrinh1191995@gmail.com', 'huế', '969239834', '', 0, '0000-00-00'),
(9, 0, 'Trung Bảo Lộc Đỗ', 'eeee@gmail.com', 'huế', '969239834', '', 0, '0000-00-00'),
(10, 0, 'Trung Bảo Lộc Đỗ', 'rap.vn_bu@yahoo.com', 'huế', '969239834', '', 0, '0000-00-00'),
(11, 0, 'Trung Bảo Lộc Đỗ', 'eeee@gmail.com', 'huế', '969239834', '', 0, '0000-00-00'),
(12, 0, 'Trung Bảo Lộc Đỗ', 'eeee@gmail.com', 'huế', '969239834', '', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(8, 9, 3, 1, 23500000),
(9, 10, 3, 1, 23500000),
(10, 11, 3, 2, 23500000),
(11, 12, 9, 1, 12800000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `saleoff` double NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `thumbnail`, `description`, `price`, `saleoff`, `category_id`, `status`) VALUES
(1, 'Samsung A7 Chính hãng', '', '', 8000000, 0, 0, 1),
(2, 'Apple iPhone 7 Plus 128GB', '', '* Giảm tới 1% giá hóa đơn, 10% giá bao da, ốp, miếng dán* Trả góp 0% với thẻ tín dụng ngân hàng (tối thiểu 3 triệu)* Miễn phí cà thẻ (ngoại trừ AMEX, UnionPay & JCB)', 6300000, 33, 0, 1),
(3, 'Apple iPhone X 64Gb chính hãng', 'https://cellphones.com.vn/media/catalog/product/cache/7/image/9df78eab33525d08d6e5fb8d27136e95/x/-/x-gray_1_16_1.jpg', '* Giảm tới 1% giá hóa đơn, 10% giá bao da, ốp, miếng dán\r\n* Trả góp 0% với thẻ tín dụng ngân hàng (tối thiểu 3 triệu)\r\n* Miễn phí cà thẻ (ngoại trừ AMEX, UnionPay & JCB)', 23500000, 0, 1, 1),
(4, 'Huawei nova 3e Chính hãng', 'https://cellphones.com.vn/media/catalog/product/cache/7/image/9df78eab33525d08d6e5fb8d27136e95/n/o/nova-3e-blue_2_1.jpg', 'Phiên bản limit', 10000000, 0, 1, 1),
(5, 'Xiaomi Redmi Note 5 32GB Chính hãng', 'https://cellphones.com.vn/media/catalog/product/cache/7/image/9df78eab33525d08d6e5fb8d27136e95/r/e/redmi-note-5-pro-black_1.jpg', '* Giảm tới 1% giá hóa đơn, 10% giá bao da, ốp, miếng dán\r\n* Trả góp 0% với thẻ tín dụng ngân hàng (tối thiểu 3 triệu)\r\n* Miễn phí cà thẻ (ngoại trừ AMEX, UnionPay & JCB)', 4390000, 0, 1, 1),
(6, 'Apple MacBook Pro 13 inch 128GB MPXR2', 'https://cellphones.com.vn/media/catalog/product/cache/7/image/9df78eab33525d08d6e5fb8d27136e95/m/b/mbp13-silver_3.jpg', '', 28690000, 0, 3, 1),
(7, 'Samsung Galaxy S8+ Chính hãng', 'https://cellphones.com.vn/media/catalog/product/cache/7/image/9df78eab33525d08d6e5fb8d27136e95/s/8/s8plus-gray_3.jpg', '', 17900000, 0, 1, 1),
(8, 'Apple iPad 9.7 4G 32GB', 'https://cellphones.com.vn/media/catalog/product/cache/7/image/9df78eab33525d08d6e5fb8d27136e95/i/p/ipad-9-7-gold_1.jpg', 'Giảm tới 1% giá hóa đơn, 10% giá bao da, ốp, miếng dán\r\nTrả góp 0% với thẻ tín dụng ngân hàng (tối thiểu 3 triệu)', 6700000, 0, 2, 1),
(9, 'Apple iPad Pro 10.5 Wi-Fi 64GB', 'https://cellphones.com.vn/media/catalog/product/cache/7/image/9df78eab33525d08d6e5fb8d27136e95/i/p/ipad-pro-10in-gold_7.jpg', '', 12800000, 0, 2, 1),
(10, 'Huawei MediaPad M3 2017 Chính hãng', 'https://cellphones.com.vn/media/catalog/product/cache/7/thumbnail/9df78eab33525d08d6e5fb8d27136e95/m/e/mediapad-m3-lite-8-gray.jpg', '', 5990000, 0, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `group` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `avatar`, `address`, `phone`, `email`, `group`, `status`) VALUES
(1, 'ducadmin', 'cnttk39c', 'ahihi', 'upload/IMG_9826.jpg', 'câccâc', '987949888', 'duccnttk39c@gmail.com', 1, 1),
(17, 'kubomnek', 'maoicuucon', 'Trung Bảo Lộc Đỗ', '', '', '969239834', 'nguyenthituyettrinh1191995@gmail.com', 0, 1),
(18, 'kubomnek1', 'maoicuucon1', 'Trung Bảo Lộc Đỗ', 'upload/IMG_9826.jpg', '<p>aaaaaa</p>\r\n', '969239834', 'nguyenthituyettrinh1191995@gmail.com', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2018 at 02:13 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `address` text CHARACTER SET latin1 NOT NULL,
  `address2` text CHARACTER SET latin1 NOT NULL,
  `city` varchar(20) CHARACTER SET latin1 NOT NULL,
  `country` varchar(20) CHARACTER SET latin1 NOT NULL,
  `phone` int(11) NOT NULL,
  `pay_method` enum('0','1') CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `order_date` datetime NOT NULL,
  `order_status` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `cust_id`, `address`, `address2`, `city`, `country`, `phone`, `pay_method`, `order_date`, `order_status`) VALUES
(34, 3, 'House 10A, 123123, 123123', '123123', 'Rawalpindi', 'Pakistan', 2147483647, '1', '2018-11-01 01:11:03', 'active'),
(35, 3, 'House 10A, 123123, 123123', '123123', 'Rawalpindi', 'Pakistan', 2147483647, '1', '2018-11-01 01:11:47', 'active'),
(36, 3, 'House 10A, 123123, 123123', '123123', 'Rawalpindi', 'Pakistan', 2147483647, '1', '2018-11-01 01:11:26', 'active'),
(37, 3, 'House 10A, 123123, 123123', '123123', 'Rawalpindi', 'Pakistan', 2147483647, '1', '2018-11-01 01:11:51', 'active'),
(38, 3, 'House 10A, 123123, 123123', '123123', 'Rawalpindi', 'Pakistan', 2147483647, '1', '2018-11-01 01:11:38', 'active'),
(39, 3, 'Rawalpindi', '13', 'Rawalpindi', 'United States', 2147483647, '1', '2018-11-01 01:11:51', 'active'),
(40, 3, 'Rawalpindi', '13', 'Rawalpindi', 'United States', 2147483647, '1', '2018-11-01 01:11:10', 'active'),
(41, 3, 'Rawalpindi', '13', 'Rawalpindi', 'United States', 2147483647, '1', '2018-11-01 01:11:07', 'active'),
(42, 3, 'House 10A, 123123, 123123', '123123', 'Rawalpindi', 'Pakistan', 2147483647, '1', '2018-11-01 01:11:53', 'active'),
(43, 3, 'House 10A, 123123, 123123', '123123', 'Rawalpindi', 'Pakistan', 2147483647, '1', '2018-11-01 01:11:11', 'active'),
(44, 3, 'House 10A, 123123, 123123, 123123', '123123', 'Rawalpindi', 'United States', 2147483647, '1', '2018-11-01 01:11:33', 'active'),
(45, 3, 'House 10A, 123123, 123123', '123123', 'Rawalpindi', 'Pakistan', 2147483647, '1', '2018-11-01 01:11:24', 'active'),
(46, 3, 'House 10A, 123123, 123123', '123123', 'Rawalpindi', 'Pakistan', 2147483647, '1', '2018-11-01 01:11:26', 'active'),
(47, 3, 'House 10A, 123123, 123123', '123123', 'Rawalpindi', 'Pakistan', 2147483647, '1', '2018-11-01 01:11:21', 'active'),
(48, 3, 'House 10A, 123123, 123123', '123123', 'Rawalpindi', 'Pakistan', 2147483647, '1', '2018-11-01 01:11:25', 'active'),
(49, 3, 'House 10A, 123123, 123123', '123123', 'Rawalpindi', 'Pakistan', 2147483647, '1', '2018-11-01 01:11:02', 'active'),
(50, 5, 'House 10A, 123123, 123123', '123123', 'Rawalpindi', 'Pakistan', 2147483647, '0', '2018-11-02 01:11:49', 'Out to delivery'),
(51, 5, 'House 10A, 123123, 123123', '123123', 'Rawalpindi', 'Pakistan', 2147483647, '0', '2018-11-02 01:11:00', 'Out to delivery'),
(52, 7, '4/352 shah', 'faisal colony', 'karachi', 'Pakistan', 2147483647, '0', '2018-11-02 18:11:00', 'active'),
(53, 7, '4/352 shah', 'faisal colony', 'karachi', 'Pakistan', 2147483647, '0', '2018-11-02 18:11:52', 'active'),
(54, 7, '4/352 shah', 'faisal colony', 'karachi', 'Pakistan', 2147483647, '0', '2018-11-02 18:11:29', 'active'),
(55, 7, '4/352 shah', 'faisal colony', 'karachi', 'Pakistan', 2147483647, '0', '2018-11-02 18:11:49', 'active'),
(56, 7, '4/352 shah', 'faisal colony', 'karachi', 'Pakistan', 2147483647, '0', '2018-11-03 04:11:30', 'active'),
(57, 8, '4/352 shah', 'faisal colony', 'karachi', 'Pakistan', 2147483647, '0', '2018-11-03 05:11:33', 'Finished'),
(58, 10, 'Riyadh100', '', 'Riyadh', 'Saudi Arabia', 566622744, '0', '2018-11-03 05:11:10', 'Finished'),
(59, 10, 'Riyadh100', '', 'Riyadh', 'Saudi Arabia', 566622744, '0', '2018-11-03 05:11:11', 'active'),
(60, 10, 'Riyadh100', '', 'Riyadh', 'Saudi Arbia', 56666336, '1', '2018-11-03 05:11:49', 'active'),
(61, 12, 'Riyadh100', '', 'riyadh', 'Saudi', 2444, '0', '2018-11-04 18:11:52', 'Finished'),
(62, 12, 'ff', '', 'ff', 'fff', 555555555, '1', '2018-11-04 18:11:02', 'Finished'),
(63, 18, 'riuadh', '', 'jeddaj', 'Saudi Arabia', 566622746, '0', '2018-11-05 19:11:06', 'Finished');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(10) NOT NULL,
  `unit_price` int(10) NOT NULL,
  `total_price` int(10) NOT NULL,
  `delivery_date` date NOT NULL,
  `delivery_time` varchar(255) NOT NULL,
  `custom_ingredients` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`order_id`, `product_id`, `quantity`, `unit_price`, `total_price`, `delivery_date`, `delivery_time`, `custom_ingredients`) VALUES
(8, 9, 1, 87, 87, '2018-10-24', '09:00:00', ''),
(8, 7, 5, 200, 1000, '2018-10-23', '04:00:00', ''),
(9, 7, 8, 200, 1600, '2018-10-30', '06:00:00', ''),
(10, 9, 1, 87, 87, '2018-10-31', '04:00:00', ''),
(11, 7, 8, 200, 1600, '2018-10-30', '06:00:00', ''),
(11, 9, 1, 87, 87, '2018-10-31', '04:00:00', ''),
(12, 7, 2, 200, 400, '2018-10-17', '04:00:00', ''),
(13, 9, 2, 87, 174, '2018-10-23', '04:00:00', ''),
(14, 7, 5, 200, 1000, '2018-10-22', '01:00:00', 'mayo'),
(15, 7, 14, 200, 2800, '2018-10-24', '09:00:00', 'Test'),
(16, 7, 14, 200, 2800, '2018-10-24', '09:00:00', 'Test'),
(17, 17, 1, 900, 900, '2018-10-19', '09:00:00', ''),
(18, 17, 1, 900, 900, '2018-10-19', '09:00:00', ''),
(19, 8, 1, 550, 550, '2018-10-31', '06:00:00', ''),
(19, 7, 1, 200, 200, '2018-10-31', '09:00:00', ''),
(20, 7, 1, 200, 200, '2018-11-14', '04:00:00', ''),
(21, 7, 1, 200, 200, '2018-11-15', '09:00:00', ''),
(22, 7, 1, 200, 200, '2018-11-09', '06:00:00', ''),
(23, 7, 1, 200, 200, '2018-11-15', '09:00:00', ''),
(25, 7, 1, 200, 200, '2018-11-08', '09:00:00', ''),
(28, 7, 1, 200, 200, '2018-11-09', '09:00:00', ''),
(29, 7, 1, 200, 200, '2018-11-09', '09:00:00', ''),
(30, 7, 1, 200, 200, '2018-11-09', '09:00:00', ''),
(31, 7, 1, 200, 200, '2018-11-09', '09:00:00', ''),
(32, 7, 1, 200, 200, '2018-11-09', '09:00:00', ''),
(33, 7, 1, 200, 200, '2018-11-09', '09:00:00', ''),
(34, 7, 1, 200, 200, '2018-11-09', '09:00:00', ''),
(35, 7, 1, 200, 200, '2018-11-09', '09:00:00', ''),
(36, 7, 1, 200, 200, '2018-11-09', '09:00:00', ''),
(37, 7, 1, 200, 200, '2018-11-09', '09:00:00', ''),
(38, 7, 1, 200, 200, '2018-11-09', '09:00:00', ''),
(39, 7, 2, 200, 400, '2018-11-09', '09:00:00', ''),
(40, 7, 2, 200, 400, '2018-11-09', '09:00:00', ''),
(41, 7, 2, 200, 400, '2018-11-09', '09:00:00', ''),
(42, 7, 2, 200, 400, '2018-11-09', '09:00:00', ''),
(43, 7, 2, 200, 400, '2018-11-09', '09:00:00', ''),
(44, 7, 2, 200, 400, '2018-11-09', '09:00:00', ''),
(45, 7, 2, 200, 400, '2018-11-09', '09:00:00', ''),
(46, 7, 2, 200, 400, '2018-11-09', '09:00:00', ''),
(47, 7, 2, 200, 400, '2018-11-09', '09:00:00', ''),
(48, 7, 2, 200, 400, '2018-11-09', '09:00:00', ''),
(49, 7, 5, 200, 1000, '2018-11-09', '09:00:00', ''),
(50, 10, 1, 100, 100, '2018-11-15', '09:00:00', ''),
(51, 10, 5, 100, 500, '2018-11-07', '09:00:00', ''),
(51, 9, 3, 100, 300, '2018-11-29', '09:00:00', ''),
(52, 9, 1, 100, 100, '2018-11-28', '09:00:00', ''),
(53, 10, 1, 100, 100, '2018-11-20', '09:00:00', ''),
(53, 9, 1, 100, 100, '2018-11-29', '09:00:00', ''),
(54, 10, 1, 100, 100, '2018-11-28', '09:00:00', ''),
(54, 9, 1, 100, 100, '2018-11-29', '09:00:00', ''),
(55, 10, 1, 100, 100, '2018-11-13', '09:00:00', ''),
(55, 9, 1, 100, 100, '2018-11-14', '09:00:00', ''),
(56, 9, 1, 100, 100, '2018-11-20', '09:00:00', ''),
(57, 10, 1, 100, 100, '2018-11-27', '09:00:00', ''),
(58, 12, 1, 4, 4, '2018-12-07', '04:00:00', 'd'),
(60, 12, 1, 4, 4, '2018-12-20', '04:00:00', 'ddd'),
(61, 13, 1, 7, 7, '2019-01-12', '09:00 AM', 'honey'),
(62, 13, 1, 8, 8, '2018-12-13', '09:00 PM', 'h'),
(63, 18, 1, 3, 3, '2018-11-30', '07:00 AM', 'df');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `transaction` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `orderid`, `amount`, `transaction`, `date`) VALUES
(1, 60, 4, 'txn_1DSAY4HRY0OdNmY6jTsPQTxD', '2018-11-03 05:27:51'),
(2, 62, 8, 'txn_1DSj22HRY0OdNmY6DnNgeDEG', '2018-11-04 18:18:05');

-- --------------------------------------------------------

--
-- Table structure for table `paymenttypes`
--

CREATE TABLE `paymenttypes` (
  `id` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymenttypes`
--

INSERT INTO `paymenttypes` (`id`, `type`) VALUES
(1, 'Pay on Delivery'),
(2, 'Pay through Card');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `name_ar` varchar(50) CHARACTER SET utf8 NOT NULL,
  `description` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `description_ar` varchar(500) CHARACTER SET utf8 NOT NULL,
  `price` int(11) DEFAULT NULL,
  `image` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `date_added` datetime NOT NULL,
  `stock_id` int(11) DEFAULT NULL,
  `product_type_id` int(11) DEFAULT NULL,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `name_ar`, `description`, `description_ar`, `price`, `image`, `date_added`, `stock_id`, `product_type_id`, `added_by`) VALUES
(9, 'checking', 'checking', 'checking', 'checking', 100, 'checking_41.jpg', '2018-11-21 00:00:00', 41, 2, 8),
(10, 'asd', 'asd', '55', '55', 100, 'asd_51.png', '2018-11-02 00:42:32', 51, 2, 8),
(11, 'Fatima Cake', 'x', 's', 's', 4, 'Fatima Cake_52.jpg', '2018-11-03 05:19:04', 52, 2, 9),
(12, 'Fatima Cake', 'x', 's', 's', 4, 'Fatima Cake_53.jpg', '2018-11-03 05:19:06', 53, 2, 9),
(14, 'hoho', 'اخاخ', 'hhoo', 'اممام', 4, 'hoho_55.png', '2018-11-05 18:51:12', 55, 2, 17),
(15, 'hoh', 'خاخ', 'pgp', 'اكمم', 5, 'hoh_56.png', '2018-11-05 18:51:51', 56, 1, 17),
(16, 'Norah Kabsa', 'اا', 'hh', 'اا', 4, 'Norah Kabsa_57.jpg', '2018-11-05 18:52:48', 57, 2, 17),
(17, 'Norah Kabsa', ']ي', 'Dd', 'يي', 4, 'Norah Kabsa_58.jpg', '2018-11-05 18:54:19', 58, 3, 17),
(18, 'ttrry', 'مم', 'lll', 'ةت', 3, 'ttrry_59.png', '2018-11-05 18:55:57', 59, 1, 17),
(19, '4fi', 'بب', 'f', 'ب', 5, '4fi_60.png', '2018-11-05 18:56:51', 60, 1, 17),
(20, 'Fatima Cake', 'ب', 'ff', 'بمم', 4, 'Fatima Cake_61.png', '2018-11-05 18:57:25', 61, 1, 17),
(21, 'toto cake', 'r', 'r', 'r', 4, 'toto cake_62.png', '2018-11-05 18:58:07', 62, 1, 17),
(22, 'Fatima Cake', 'r', 'r', 'ق', 3, 'Fatima Cake_63.png', '2018-11-05 18:58:49', 63, 1, 17),
(23, 'Cookie ', 'ق', '?', 'ق', 2, 'Cookie _64.png', '2018-11-05 18:59:27', 64, 1, 17);

-- --------------------------------------------------------

--
-- Table structure for table `producttypes`
--

CREATE TABLE `producttypes` (
  `id` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `type_ar` varchar(50) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producttypes`
--

INSERT INTO `producttypes` (`id`, `type`, `type_ar`) VALUES
(1, 'Traditional Food', 'اكل تقليدي'),
(2, 'Baked', 'مخبوز'),
(3, 'DESERT', 'الحلوى');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `quantity`) VALUES
(1, 20),
(2, 20),
(3, 23),
(4, 200),
(5, 100),
(6, 120),
(7, 20),
(8, 3),
(9, 10),
(10, 90),
(11, 12),
(12, 12),
(13, 12),
(14, 12),
(15, 12),
(16, 12),
(17, 12),
(18, 12),
(19, 12),
(20, 9),
(21, 9),
(22, 9),
(23, 9),
(24, 9),
(25, 9),
(26, 90),
(27, 90),
(28, 90),
(29, 90),
(30, 90),
(31, 90),
(32, 90),
(33, 90),
(34, 90),
(35, 90),
(36, 90),
(37, 12),
(38, 12),
(39, 12),
(40, 12),
(41, 558),
(42, 558),
(43, 558),
(44, 558),
(45, 558),
(46, 55),
(47, 55),
(48, 55),
(49, 55),
(50, 100),
(51, 100),
(52, 5),
(53, 5),
(54, 10),
(55, 5),
(56, 2),
(57, 5),
(58, 5),
(59, 5),
(60, 4),
(61, 2),
(62, 3),
(63, 4),
(64, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` enum('admin','vendor','customer') CHARACTER SET latin1 NOT NULL,
  `secretanswer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `type`, `secretanswer`) VALUES
(6, 'hassan', 'shahid', 'hassanrrs@gmail.com', '$1$somethin$COEJ0zKut7beTen0WfTr2/', 'admin', ''),
(7, 'anas', 'siddiqui', 'anassiddiqui288@gmail.com', 'anas1234', 'customer', ''),
(8, 'anas', 'siddiqui', 'anassiddiqui29@gmail.com', 'anas1234', 'vendor', ''),
(9, 'Ali', 'ALOTAIBI', 'm7med.k.m@hotmail.com', '$1$somethin$COEJ0zKut7beTen0WfTr2/', 'vendor', ''),
(10, 'fa', 'fa', 'otaibimk1428@gmail.com', '$1$somethin$COEJ0zKut7beTen0WfTr2/', 'customer', ''),
(11, 'toto', 'toto', 'toto@hotmail.com', '1234', 'vendor', ''),
(12, 'bobo', 'bobo', 'bobo@hotmail.com', '1234', 'customer', ''),
(27, 'anas', 'siddiqui', 'anassiddiqui278@gmail.com', '$1$somethin$RyP7gl4eGmi0yv9iiaj.F0', 'customer', 'biryani');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymenttypes`
--
ALTER TABLE `paymenttypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_id` (`stock_id`),
  ADD KEY `product_type_id` (`product_type_id`);

--
-- Indexes for table `producttypes`
--
ALTER TABLE `producttypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paymenttypes`
--
ALTER TABLE `paymenttypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `producttypes`
--
ALTER TABLE `producttypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`stock_id`) REFERENCES `stock` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`product_type_id`) REFERENCES `producttypes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

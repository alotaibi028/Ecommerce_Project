-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 03, 2018 at 05:31 AM
-- Server version: 10.0.37-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `corex_depypay`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `address2` text NOT NULL,
  `city` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `phone` int(11) NOT NULL,
  `pay_method` enum('0','1') NOT NULL DEFAULT '0',
  `order_date` datetime NOT NULL,
  `order_status` varchar(50) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(60, 10, 'Riyadh100', '', 'Riyadh', 'Saudi Arbia', 56666336, '1', '2018-11-03 05:11:49', 'active');

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
  `delivery_time` time NOT NULL,
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
(60, 12, 1, 4, 4, '2018-12-20', '04:00:00', 'ddd');

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
(1, 60, 4, 'txn_1DSAY4HRY0OdNmY6jTsPQTxD', '2018-11-03 05:27:51');

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
(12, 'Fatima Cake', 'x', 's', 's', 4, 'Fatima Cake_53.jpg', '2018-11-03 05:19:06', 53, 2, 9);

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
(53, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` char(32) NOT NULL,
  `type` enum('admin','vendor','customer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `type`) VALUES
(6, 'hassan', 'shahid', 'hassanrrs@gmail.com', 'asdfg', 'admin'),
(7, 'anas', 'siddiqui', 'anassiddiqui278@gmail.com', 'anas1234', 'customer'),
(8, 'anas', 'siddiqui', 'anassiddiqui29@gmail.com', 'anas1234', 'vendor'),
(9, 'Ali', 'ALOTAIBI', 'm7med.k.m@hotmail.com', '123', 'vendor'),
(10, 'fa', 'fa', 'otaibimk1428@gmail.com', '123', 'customer');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paymenttypes`
--
ALTER TABLE `paymenttypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `producttypes`
--
ALTER TABLE `producttypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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

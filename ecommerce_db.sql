-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2018 at 05:16 AM
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
-- Table structure for table `deliverytypes`
--

CREATE TABLE `deliverytypes` (
  `id` int(11) NOT NULL,
  `types` varchar(50) DEFAULT NULL,
  `types_ar` varchar(50) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deliverytypes`
--

INSERT INTO `deliverytypes` (`id`, `types`, `types_ar`) VALUES
(1, 'Provided', 'قدمت'),
(2, 'Not Provided', 'غير مزود');

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
(1, 1, '4/352 shah', 'faisal colony', 'karachi', 'Pakistan', 2147483647, '0', '2018-10-29 05:10:40', 'Is Making');

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
(1, 1, 1, 100, 100, '2018-10-31', '09:00:00', 'asdasd');

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
  `delivery_type_id` int(11) DEFAULT NULL,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `name_ar`, `description`, `description_ar`, `price`, `image`, `date_added`, `stock_id`, `product_type_id`, `delivery_type_id`, `added_by`) VALUES
(1, 'checking', 'checking', 'checking', 'checking', 100, 'checking_41.jpg', '2018-10-29 05:05:44', 41, 1, 1, 3);

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
(37, 1),
(38, 2),
(39, 20),
(40, 11),
(41, 200);

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
(1, 'Nauman', 'Shafqat', 'naumansh7@gmail.com', '11111', 'customer'),
(3, 'Ali', 'Raza', 'ali@gmail.com', 'ali', 'vendor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deliverytypes`
--
ALTER TABLE `deliverytypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
  ADD KEY `product_type_id` (`product_type_id`),
  ADD KEY `delivery_type_id` (`delivery_type_id`);

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
-- AUTO_INCREMENT for table `deliverytypes`
--
ALTER TABLE `deliverytypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `producttypes`
--
ALTER TABLE `producttypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`stock_id`) REFERENCES `stock` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`product_type_id`) REFERENCES `producttypes` (`id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`delivery_type_id`) REFERENCES `deliverytypes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

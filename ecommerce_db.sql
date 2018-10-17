-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2018 at 08:35 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

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
  `types` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deliverytypes`
--

INSERT INTO `deliverytypes` (`id`, `types`) VALUES
(1, 'Provided'),
(2, 'Not Provided');

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
  `order_status` enum('active','delivered') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `cust_id`, `address`, `address2`, `city`, `country`, `phone`, `pay_method`, `order_date`, `order_status`) VALUES
(8, 1, 'kljk', 'nnjj', 'jio', 'jio', 2111, '0', '2018-10-04 07:10:02', 'active'),
(9, 1, 'Abc, Street, Lahore ', '', 'Lahore', 'Lahore', 495228458, '0', '2018-10-05 04:10:13', 'active'),
(10, 1, 'Test', '', 'Lahore', 'Lahore', 48379587, '0', '2018-10-05 04:10:48', 'delivered'),
(11, 1, 'My Address', '', 'Lahore', 'Lahore', 2147483647, '0', '2018-10-05 04:10:50', 'delivered'),
(13, 1, 'XYZ street', '', 'Lahore', 'Pakistan', 2147483647, '0', '2018-10-05 07:10:52', 'active'),
(14, 1, 'dlsmfkmklmlk', 'mlkmlkm', 'lkm', 'klmlkm', 34523, '0', '2018-10-07 20:10:57', 'active'),
(15, 1, 'asdn', 'nkjl', 'jjk', 'jlkjk', 3423, '0', '2018-10-08 22:10:45', 'active'),
(16, 1, 'lksfdk', 'lklkjkl', 'lkjklj', 'kljkl', 341234, '0', '2018-10-09 04:10:58', 'active');

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
(16, 7, 14, 200, 2800, '2018-10-24', '09:00:00', 'Test');

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
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `date_added` datetime NOT NULL,
  `stock_id` int(11) DEFAULT NULL,
  `product_type_id` int(11) DEFAULT NULL,
  `delivery_type_id` int(11) DEFAULT NULL,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `discount`, `image`, `date_added`, `stock_id`, `product_type_id`, `delivery_type_id`, `added_by`) VALUES
(7, 'Food Item 1', 'Here is my latest and Delicious Food Item', 200, 10, 'Food Item 1_6.jpg', '2018-09-08 21:08:34', 6, 3, 2, 3),
(8, 'Item 2', 'Here it is a new Food', 550, 50, 'Item 2_7.jpg', '2018-09-11 18:24:08', 7, 2, 1, 2),
(9, 'Item 3', 'Test', 87, 9, 'Item 3_8.jpg', '2018-09-11 19:50:04', 8, 3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `producttypes`
--

CREATE TABLE `producttypes` (
  `id` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producttypes`
--

INSERT INTO `producttypes` (`id`, `type`) VALUES
(1, 'Traditional Food'),
(2, 'Baked'),
(3, 'DESERT');

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
(8, 3);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `paymenttypes`
--
ALTER TABLE `paymenttypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `producttypes`
--
ALTER TABLE `producttypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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

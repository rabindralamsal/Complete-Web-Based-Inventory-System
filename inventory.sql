-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 21, 2018 at 12:17 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_active` int(11) NOT NULL,
  `brand_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_active`, `brand_status`) VALUES
(1, 'Nokia', 2, 1),
(2, 'Samsung', 1, 1),
(3, 'Sony', 2, 1),
(4, 'Apple', 1, 1),
(5, 'Western Digital', 1, 1),
(6, 'Kingston', 1, 1),
(7, 'OnePlus', 1, 1),
(8, 'Motorola', 1, 1),
(9, 'Transcend', 1, 1),
(10, 'Dell', 1, 1),
(11, 'Acer', 1, 1),
(12, 'Micromax', 1, 1),
(13, 'Vivo', 2, 1),
(14, 'Brotherrrr', 1, 1),
(15, 'Lenovo', 1, 1),
(17, 'Philips', 1, 1),
(18, 'Okia', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_active` int(3) DEFAULT NULL,
  `category_status` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_active`, `category_status`) VALUES
(1, 'Mobile Phones', 1, 1),
(2, 'Laptops', 1, 1),
(3, 'Hard Drives', 1, 1),
(4, 'Printers', 1, 1),
(5, 'Monitors', 1, 1),
(6, 'Speakers', 1, 1),
(7, 'Pendrives', 2, 1),
(8, 'Television', 2, 1),
(9, 'CPU Casing', 1, 1),
(10, 'Ear Phones', 1, 1),
(11, 'Desktop', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_contact` varchar(255) NOT NULL,
  `product_id` int(3) DEFAULT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `noOfProducts` int(3) DEFAULT NULL,
  `sub_total` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `paid` varchar(255) NOT NULL,
  `due` varchar(255) NOT NULL,
  `payment_type` varchar(11) NOT NULL,
  `payment_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `client_name`, `client_contact`, `product_id`, `product_name`, `noOfProducts`, `sub_total`, `vat`, `discount`, `total_amount`, `paid`, `due`, `payment_type`, `payment_status`) VALUES
(9, '2018-04-18', 'Rabindra Lamsal', '9560160172', 3, 'Dell XPS A9', 2, '240000', '13%', '2400', '268488', '268485', '0', 'cash', 'completed'),
(10, '2018-04-18', 'Amit Sharma', '9123456789', 3, 'Dell XPS A9', 2, '240000', '13%', '2400', '268488', '268485', '0', 'cash', 'completed'),
(11, '2018-04-18', 'Rohan Negi', '9876543212', 4, 'WD Passport', 1, '3000', '13%', '30', '3356.1', '3350', '6', 'card', 'partial'),
(13, '2018-04-19', 'Oneeb Dadgar', '1234567654', 9, 'Brother XT900', 1, '40000', '13%', '800', '44296', '44290', '0', 'card', 'completed'),
(15, '2018-04-20', 'Rabindra Lamsal', '9849916003', 6, 'Galaxy S8', 1, '80000', '13%', '800', '89496', '85000', '0', 'ebanking', 'completed'),
(16, '2018-04-20', 'Shubham Katiyar', '9595959595', 4, 'WD Passport', 2, '6000', '13%', '60', '6712.2', '6500', '6', 'upi', 'partial'),
(17, '2018-04-20', 'Pradip Silwal', '9560342312', 7, 'Sony Earphones XT900', 2, '1600', '13%', '16', '1789.92', '1780', '9', 'upi', 'partial'),
(18, '2018-04-20', 'Suman', '9876543456', 3, 'Dell XPS A9', 1, '120000', '13%', '1200', '134244', '134200', '44', 'ebanking', 'partial'),
(19, '2018-04-20', 'Saurav Shah', '9543214563', 14, 'Okia A9', 2, '10000', '13%', '500', '10735', '10720', '0', 'upi', 'completed'),
(20, '2018-04-20', 'Prof. Vijay', '9876543212', 6, 'Galaxy S8', 1, '80000', '13%', '800', '89496', '89490', '0', 'upi', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `brand_id`, `category_id`, `quantity`, `rate`, `active`, `status`) VALUES
(3, 'Dell XPS A9', 10, 2, '0', '120000', 1, 1),
(4, 'WD Passport', 5, 3, '97', '3000', 1, 1),
(5, 'Galaxy S7', 2, 1, '10', '49000', 1, 1),
(6, 'Galaxy S8', 2, 1, '8', '80000', 1, 1),
(7, 'Sony Earphones XT900', 3, 10, '298', '800', 1, 1),
(8, 'Bravia 900', 3, 8, '10', '200000', 1, 1),
(9, 'Brother XT900', 14, 4, '4', '40000', 1, 1),
(10, 'Dhoom 11 Multimedia', 17, 6, '15', '6000', 1, 1),
(11, 'Desktop Casing', 11, 9, '20', '700', 1, 1),
(12, 'Storage 360', 6, 7, '0', '300', 1, 1),
(13, 'iMac 2018', 4, 11, '5', '100000', 1, 1),
(14, 'Okia A9', 18, 1, '48', '5000', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2023 at 06:02 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventorysys_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(1, 'Asus'),
(2, 'Acer'),
(3, 'Dell'),
(4, 'MSI'),
(5, 'HP'),
(6, 'Lenovo');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `foldername` varchar(255) NOT NULL,
  `names` varchar(255) NOT NULL,
  `ext` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `descriptions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id`, `foldername`, `names`, `ext`, `category`, `brand`, `quantity`, `label`, `descriptions`) VALUES
(50, 'NewArrival', '20230210071740.jpg', 'jpg', '4', 'Asus', 10, 'GPU', 'awawdawda'),
(51, 'BrandNew', '20230210071757.jpeg', 'jpeg', '1', 'Acer', 20, 'Samsung Curve', 'Renovating the productivity!'),
(52, 'Surplus', '20230210071813.png', 'png', '1', 'Acer', 7, 'SSD 1TB', 'SSD is the new thing!'),
(53, 'NewArrival', '20230210172123.jpg', 'jpg', '1', 'GeForce', 10, 'GeForce 1060ti', 'Unleash The Beast!'),
(54, 'BrandNew', '20230210173434.jpg', 'jpg', '2', 'Samsung', 4, 'Samsung Curve Monitor', 'The all new samsung curved monitor has arrived!'),
(55, 'NewArrival', '20230210174253.jpg', 'jpg', '1', 'acer', 4, 'Awit', 'qwe'),
(56, 'NewArrival', '20230210185726.jpg', 'jpg', '1', 'Samsung', 10, 'Samsung', 'The Curved'),
(57, 'NewArrival', '20230213015703.jpg', 'jpg', '2', 'Asus', 1, 'Librada', 'Abnoy abnoy'),
(58, 'BrandNew', '20230213082018.jpg', 'jpg', '3', 'Acer', 10, 'Oliver', 'Abnoy Abnoy'),
(60, '3', '20230215082326.jpg', 'jpg', '1', '2', 10, 'a', 'a'),
(61, 'NewArrival', '20230215083102.png', 'png', 'Motherboard', 'Asus', 123, '1231', '123'),
(62, 'Surplus', '20230215083113.jpg', 'jpg', 'Monitor', 'Acer', 123, '12312', '3123'),
(63, 'Surplus', '20230216020111.jpg', 'jpg', 'Motherboard', 'Asus', 1, '1', '1'),
(64, 'AddItem', '20230216023435.jpg', 'jpg', 'Monitor', 'Acer', 123, 'aa', 'aa'),
(65, 'NewArrival', '20230216024423.png', 'png', 'Motherboard', 'Asus', 123, '123', '123'),
(66, 'NewArrival', '20230216035540.png', 'png', 'Motherboard', 'Asus', 123, '123', '123'),
(67, 'Surplus', '20230218084739.jpg', 'jpg', 'Motherboard', 'Asus', 10, '123', '123'),
(68, 'Surplus', '20230222055035.png', 'png', 'Monitor', 'Asus', 1, 'asdadas', 'asdasdas');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `lists_id` varchar(255) NOT NULL,
  `cart_quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userid`, `lists_id`, `cart_quantity`) VALUES
(63, '3', '20', '2'),
(66, '3', '20', '1'),
(69, '3', '20', '3'),
(70, '3', '20', '5'),
(85, '5', '22', '4');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `product_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `product_type`) VALUES
(1, 'Motherboard'),
(2, 'Monitor'),
(3, 'Graphics Card'),
(4, 'HDD'),
(5, 'Fan');

-- --------------------------------------------------------

--
-- Table structure for table `foldernames`
--

CREATE TABLE `foldernames` (
  `id` int(11) NOT NULL,
  `foldername` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foldernames`
--

INSERT INTO `foldernames` (`id`, `foldername`) VALUES
(1, 'NewArrival');

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `id` int(11) NOT NULL,
  `foldername` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `names` varchar(255) NOT NULL,
  `ext` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `ptype` varchar(255) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `descriptions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`id`, `foldername`, `product_code`, `names`, `ext`, `category`, `ptype`, `brand_id`, `price`, `quantity`, `label`, `descriptions`) VALUES
(21, 'AddItem', '5GKLJ', '20230216095823.jpeg', 'jpeg', 'Graphics', 'Surplus', 1, 15000, 4, 'GTX 1060Ti', 'The Next Generation Gaming GPU has Arrived!'),
(22, 'AddItem', '23KNZ', '20230216160132.jpg', 'jpg', 'Monitor', 'Surplus', 2, 7000, 15, 'Monitor Oled 16\"', 'Curved Monitor 16\" Oled Display'),
(23, 'AddItem', '444LKN', '20230217172649.jpg', 'jpg', 'Motherboard', 'Brand New', 3, 10000, 70, 'Meow', 'Meowski'),
(24, 'AddItem', 'NKZ322', '20230218064754.jpg', 'jpg', 'Monitor', 'Brand New', 3, 5000, 10, 'Monitor', 'akwhdakjwhdakjdw'),
(25, 'AddItem', 'CN12LK', '20230218084259.jpg', 'jpg', 'Motherboard', 'Brand New', 2, 10000, 15, 'awit', '1231231312312adawhdakwhdlkawhdkahwdkajwh'),
(26, 'AddItem', 'H230AC', '20230227094621.png', 'png', 'Monitor', 'Brand New', 4, 50000, 200, 'YouTube', 'Pa Nga!'),
(28, 'AddItem', 'PKLZNA12', '20230304024213.png', 'png', 'HDD', 'Surplus', 4, 2000, 5, 'HDD 1TB', 'DELL NAMBAWAN');

-- --------------------------------------------------------

--
-- Table structure for table `procurement`
--

CREATE TABLE `procurement` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `unit_price` int(255) NOT NULL,
  `total_price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `product_brand` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `supplier_contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_contact`) VALUES
(1, 'Cisco', '12345'),
(2, 'Librada', '090909'),
(3, 'Reynan', '696969'),
(4, 'MSI', '99999'),
(5, 'APPLE', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `contact` decimal(15,0) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `pword` varchar(255) NOT NULL,
  `roles` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `contact`, `email`, `address1`, `pword`, `roles`) VALUES
(1, 'admin', '9055270361', 'dolot.hero@gmail.com', '#10 Ruby St. Sta Lucia Village PH5 Punturin Valenzuela City', '$2y$10$lQxi1M/1hY12cX/eb2hyieOjitEvMi1hPQDjU4zhL1Ql7tXyO11pO', 'admin'),
(2, 'user1', '1234', 'abcd@gmail.com', 'abcd', '$2y$10$HBKVV94PnxcBT846BDUjgeheanIjIOrK3iyX35yLxhuhIR0hFH2xq', 'user'),
(3, 'user2', '123', 'abcd@gmail.com', '123', '$2y$10$FDOkBInFJoeHQkKHU/NzyOia5IS7fqCKx8.KsJ48.rYvNv.9kQKT6', 'user'),
(5, 'user3', '123', '123@gmail.com', '123', '$2y$10$32wUwAhTod73SO7jafTVgOWjCQj8WUFrpISTSoFgkz5B4JkuJaG/m', 'user'),
(6, 'Lexi', '123', '123@gmail.com', 'Meycauayan Bulucan', '$2y$10$2ki.f78u8fb4fE3PCeoxweg/jd6Onb/A6aon4QlCvqQKLl5g2vYZG', 'user'),
(7, 'Olive', '123', '123@gmail.com', 'Libtong', '$2y$10$SauLAR8ks43dHwe200jSg.DFXEA4X1sj3Esa09y.emWgza7zdGG/a', 'user'),
(8, 'Hero', '123', 'abc@gmail.com', '123', '$2y$10$FG0FZk3w6pqSulqMdj1XDuYT2EDfJE4PEXyAnZ31Rs9suKHg9Wnw2', 'admin'),
(9, 'user', '123', '123@gmail.com', '123', '$2y$10$CbNyI9FykZ1I42GqBLRw6uWM6rp9U5Sk.HJS9UAg.roVB0Wh7DYmy', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foldernames`
--
ALTER TABLE `foldernames`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procurement`
--
ALTER TABLE `procurement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `foldernames`
--
ALTER TABLE `foldernames`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `procurement`
--
ALTER TABLE `procurement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

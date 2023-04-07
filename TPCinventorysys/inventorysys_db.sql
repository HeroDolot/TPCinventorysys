-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 07, 2023 at 08:58 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

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
(68, 'Surplus', '20230222055035.png', 'png', 'Monitor', 'Asus', 1, 'asdadas', 'asdasdas'),
(69, 'NewArrival', '20230405002202.jpg', 'jpg', 'Motherboard', 'Asus', 3, '4', '5');

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
(85, '5', '22', '4'),
(88, '3', '23', '4'),
(89, '3', '24', '2'),
(90, '3', '28', '3'),
(91, '3', '21', '4');

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
  `id` int(100) NOT NULL,
  `foldername` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `names` varchar(255) NOT NULL,
  `ext` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `ptype` varchar(255) NOT NULL,
  `brand_id` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `descriptions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`id`, `foldername`, `product_code`, `names`, `ext`, `category`, `ptype`, `brand_id`, `price`, `quantity`, `label`, `descriptions`) VALUES
(32, 'AddItem', '21', '20230407084950.jpg', 'jpg', 'Motherboard', 'Brand New', 3, 22, 22, 'Sample items Add Label', 'Sample Decription');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `contact_no` int(255) NOT NULL,
  `delivery_type` int(1) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '0',
  `date_now` datetime NOT NULL,
  `brand_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `list_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `fullname`, `contact_no`, `delivery_type`, `status`, `date_now`, `brand_id`, `user_id`, `cart_id`, `list_id`) VALUES
(26, 'Allan Condiman', 432426565, 1, 0, '2023-03-29 23:47:53', 3, 3, 88, 23),
(27, 'Allan Condiman', 432426565, 1, 1, '2023-03-29 23:47:53', 3, 3, 89, 24),
(28, 'Allan Condiman', 432426565, 1, 1, '2023-03-29 23:47:53', 4, 3, 90, 28),
(29, 'Allan Condiman', 965566777, 1, 0, '2023-03-29 23:51:16', 3, 3, 88, 23),
(30, 'Allan Condiman', 965566777, 1, 0, '2023-03-29 23:51:16', 3, 3, 89, 24),
(31, 'Allan Condiman', 965566777, 1, 1, '2023-03-29 23:51:16', 4, 3, 90, 28),
(32, 'Allan Condiman', 965566777, 1, 1, '2023-03-29 23:51:16', 1, 3, 91, 21),
(33, 'Allan Condiman', 965566777, 2, 0, '2023-03-29 23:52:29', 3, 3, 88, 23),
(34, 'Allan Condiman', 965566777, 2, 1, '2023-03-29 23:52:29', 3, 3, 89, 24),
(35, 'Allan Condiman', 965566777, 2, 0, '2023-03-29 23:52:29', 4, 3, 90, 28),
(36, 'Allan Condiman', 965566777, 2, 1, '2023-03-29 23:52:29', 1, 3, 91, 21);

-- --------------------------------------------------------

--
-- Table structure for table `procurement`
--

CREATE TABLE `procurement` (
  `id` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `supplier_contact` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `unit_price` varchar(255) DEFAULT NULL,
  `total_price` varchar(255) DEFAULT NULL,
  `po_code` varchar(255) DEFAULT NULL,
  `procurement_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `procurement`
--

INSERT INTO `procurement` (`id`, `supplier_name`, `supplier_contact`, `item`, `quantity`, `unit_price`, `total_price`, `po_code`, `procurement_date`) VALUES
(1, 'Cisco', '12345', 'Graphics Card', '1', '1', '1', 'PO-1', '2023-03-30'),
(2, 'Cisco', '12345', 'Graphics Card', '1', '12', '12', 'PO-8', '2023-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `procurement_number`
--

CREATE TABLE `procurement_number` (
  `po_id` int(11) NOT NULL,
  `po_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `procurement_number`
--

INSERT INTO `procurement_number` (`po_id`, `po_code`) VALUES
(1, 'PO-1'),
(2, 'PO-2'),
(3, 'PO-1'),
(4, 'PO-1'),
(5, 'PO-1'),
(6, 'PO-1'),
(7, 'PO-1'),
(8, 'PO-1'),
(9, ''),
(10, ''),
(11, 'PO-13'),
(12, 'PO-13'),
(13, 'PO-8'),
(14, 'PO-8');

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
(5, 'APPLE', '123456789'),
(6, 'Acer', '09999'),
(7, 'asus', '0982312'),
(8, 'GeForce', '112123'),
(9, 'amd', '3213213'),
(10, 'samsung', '123123123');

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
(9, 'user', '123', '123@gmail.com', '123', '$2y$10$CbNyI9FykZ1I42GqBLRw6uWM6rp9U5Sk.HJS9UAg.roVB0Wh7DYmy', 'user'),
(10, 'Diaz', '123', '123@gmail.com', '123', '$2y$10$SsW3NSMnrsmeQbunXhMHJeoBbLdg6q62arlOaoJ8F7RNAQj0crNs6', 'user');

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procurement`
--
ALTER TABLE `procurement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procurement_number`
--
ALTER TABLE `procurement_number`
  ADD PRIMARY KEY (`po_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `foldernames`
--
ALTER TABLE `foldernames`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `procurement`
--
ALTER TABLE `procurement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `procurement_number`
--
ALTER TABLE `procurement_number`
  MODIFY `po_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

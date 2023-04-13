-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 13, 2023 at 04:59 PM
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
(69, 'NewArrival', '20230405002202.jpg', 'jpg', 'Motherboard', 'Asus', 3, '4', '5'),
(70, 'NewArrival', '20230407085304.png', 'png', 'Motherboard', 'MSI', 324, 'Sample MotherBoard Label', 'Sample MotherBoard Description'),
(71, 'NewArrival', '20230407090314.jpg', 'jpg', 'HDD', 'Asus', 22, 'Sample Hdd another', '22');

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
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemID` int(11) NOT NULL,
  `supplierName` varchar(255) NOT NULL,
  `productCode` varchar(255) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `productCondition` varchar(255) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `unitPrice` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemID`, `supplierName`, `productCode`, `itemName`, `productCondition`, `categories`, `unitPrice`) VALUES
(29, 'Cisco', 'CISCOL', 'Monitor', 'Brand New', 'Monitor', 3500),
(30, 'GeForce', 'GEGC', 'GTX 1060Ti', 'Surplus', 'Graphics Card', 6500);

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
(28, 'AddItem', 'PKLZNA12', '20230304024213.png', 'png', 'HDD', 'Surplus', 4, 2000, 5, 'HDD 1TB', 'DELL NAMBAWAN'),
(29, 'AddItem', '22', '20230405151308.jpg', 'jpg', 'Motherboard', 'Brand New', 0, 2222, 22, 'fdsf', 'fsdfs'),
(30, 'AddItem', '22', '20230407083734.jpg', 'jpg', 'HDD', 'Brand New', 0, 2222, 233, 'Sample Hdd', 'Sample Description of Hdd'),
(31, 'AddItem', '213', '20230407132521.jpg', 'jpg', 'HDD', 'Brand New', 1, 2222, 23, 'Sample MotherBoard Label', 'Sample Description of Hdd'),
(32, 'AddItem', 'dsd', '20230409233239.jpg', 'jpg', 'Motherboard', 'Brand New', 1, 2222, 22, 'Sample MotherBoard Label', 'Sample MotherBoard Description');

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
  `ref_no` varchar(255) DEFAULT NULL,
  `brand_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `list_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `fullname`, `contact_no`, `delivery_type`, `status`, `date_now`, `ref_no`, `brand_id`, `user_id`, `cart_id`, `list_id`) VALUES
(26, 'Allan Condiman', 432426565, 1, 2, '2023-03-29 23:47:53', 'fX7p0gUYGir4', 3, 3, 88, 23),
(27, 'Allan Condiman', 432426565, 1, 1, '2023-03-29 23:47:53', '7wEwk5h7RnDo', 3, 3, 89, 24),
(28, 'Allan Condiman', 432426565, 1, 1, '2023-03-29 23:47:53', 'A3ckU9B2nr3O', 4, 3, 90, 28),
(29, 'Allan Condiman', 965566777, 1, 2, '2023-03-29 23:51:16', 'sxnDmq8xtN27', 3, 3, 88, 23),
(30, 'Allan Condiman', 965566777, 1, 2, '2023-03-29 23:51:16', 'O3enH3R5IgO6', 3, 3, 89, 24),
(31, 'Allan Condiman', 965566777, 1, 1, '2023-03-29 23:51:16', '1iBYqka1il2s', 4, 3, 90, 28),
(32, 'Allan Condiman', 965566777, 1, 1, '2023-03-29 23:51:16', 'HSPjkFSUDxEs', 1, 3, 91, 21),
(33, 'Allan Condiman', 965566777, 2, 0, '2023-03-29 23:52:29', 'zIoBMxQaS1LM', 3, 3, 88, 23),
(34, 'Allan Condiman', 965566777, 2, 1, '2023-03-29 23:52:29', 'ThtIVoGZVuyv', 3, 3, 89, 24),
(35, 'Allan Condiman', 965566777, 2, 0, '2023-03-29 23:52:29', 'T89NJtoehIWW', 4, 3, 90, 28),
(36, 'Allan Condiman', 965566777, 2, 1, '2023-03-29 23:52:29', 'aT8U2OCn1RsM', 1, 3, 91, 21),
(37, 'Allan Condiman', 2147483647, 1, 0, '2023-04-09 23:08:58', 'Mb34OKy93EXt', 1, 2, 92, 21),
(40, 'Allan Condiman', 2147483647, 1, 0, '2023-04-09 23:23:15', 'aPObzcKp7fYd', 1, 2, 92, 21),
(41, 'awdaw', 12312312, 2, 0, '2023-04-10 02:47:23', NULL, 1, 2, 93, 21),
(45, 'Hero Dolot', 123, 1, 1, '2023-04-13 08:37:15', 'X7ftJvht5AZs', 4, 2, 96, 26);

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
(10, 'samsung', '123123123'),
(11, 'M4k1-b0t', '123456789');

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
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemID`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

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
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

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
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

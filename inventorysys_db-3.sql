-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 03, 2023 at 08:49 AM
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `foldername` varchar(255) NOT NULL,
  `images` mediumblob NOT NULL,
  `names` varchar(255) NOT NULL,
  `ext` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `foldername`, `images`, `names`, `ext`) VALUES
(20, 'aa', '', '../../assets/images/aa/20230202192659.jpg', 'jpg'),
(21, 'aa', '', '../../assets/images/aa/20230202192915.png', 'png'),
(22, 'aa', '', '../../assets/images/aa/20230202193004.png', 'png'),
(23, 'aa', '', '../../assets/images/aa/20230202193138.png', 'png'),
(24, 'aa', '', '../../assets/images/aa/20230202193147.png', 'png'),
(25, 'aa', '', '../../assets/images/aa/20230202193527.png', 'png'),
(26, 'aa', '', '../../assets/images/aa/20230202193627.png', 'png');

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
(6, 'ADMIN', '123456789', 'tpcsurplusmeyc@gmail.com', 'Libtong, Meycauayan Bulacan', '$2y$10$D9g9URJJ.M4hQgbZRHCzTOj5E40.DgSQbzceJz9Xq9VnV/EtN1Rp6', 'admin'),
(7, 'Doctor', '123455', 'doctormanyak@gmail.com', 'St.francis bulacan', '$2y$10$4IJQK8UKgcLdJzawfuTmiuKf0yKpb/nSNBOnyBHUAW8M.cHFIW0DS', 'user'),
(18, 'Hero Dolot', '9055270361', 'dolot.hero@gmail.com', '#10 Ruby St. Sta Lucia Village Phase V Punturin Valenzuela City', '$2y$10$k/vTJS/ZauYa8OjLH2Sr.Ox7n6pFIcRqfTWLzCY06.seWuM.cjDe.', 'admin'),
(19, 'jajamine', '9561421115', 'jazmineellioteeugenio@gmail.com', '159 Pio Valenzuela St. Marulas Valenzuela City', '$2y$10$XMjkKTHBiG3LYWsuo7/Fvu7I1dc5SHo.4jhiUoQDEVryyyPX40np2', 'user'),
(20, 'SystemAd', '12345', 'sysad@gmail.com', 'tpc', '$2y$10$/Tw1ekoC0Z8sGc.5kSRzJuPbNTDtz1VymmelyPLl/QY/QWhYzEpR.', 'user'),
(21, 'Maintenance', '123', 'maintenance@gmail.com', 'tpc', '$2y$10$qJZ1yhfvKvJT355KyKDANedoBUZ80uk.fsryoOD87ua6JzteIW7Su', 'user'),
(22, 'IT', '1234567', 'itunit@gmail.com', 'TPC', '$2y$10$Ne6AzA6uqZ.0gM087LDyvu5x03w7ITyhqon10C44Lyy2zu2T2G6J2', 'user'),
(23, 'Jana', '123456789', 'jana.omadto@gmail.com', 'Gen. T Valenzuela City', '$2y$10$ij0n/BVnq3prUKYJIvsPH.MkXVAFayMFInkwSbXKKLvrtb3Q/b2de', 'user'),
(24, 'quilario', '123123', '123123@gmail.com', '123', '$2y$10$hwWpWK7bgTcJK0mqoSsPUOskmeQPwSJPHi4XzQmNAtgE7qzdRwf.q', 'user'),
(25, '111', '111', 'awkdjahwd@gmail.com', '123', '$2y$10$ukHa3PejM1gvekQfbrn49OlZHP4ajEqHQoBLTz3kGTP.qywT.S4n.', 'user'),
(26, 'user', '123123', '123@gmail.com', '123', '$2y$10$1HgFXJP5sCAZj8UqruNoC.hqGJ/VRHYtsAPVLzSuDF0UvekfrKKam', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 05:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sweemory`
--
CREATE DATABASE IF NOT EXISTS `sweemory` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sweemory`;

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE `ingredient` (
  `ingredient_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` int(11) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` (`ingredient_id`, `name`, `category`, `description`, `picture`) VALUES
(6, 'Grapes', 1, 'Grapes', '645124e081488.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ingredient_quantity`
--

DROP TABLE IF EXISTS `ingredient_quantity`;
CREATE TABLE `ingredient_quantity` (
  `iq_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `arrival_date` date NOT NULL,
  `expired_date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredient_quantity`
--

INSERT INTO `ingredient_quantity` (`iq_id`, `ingredient_id`, `arrival_date`, `expired_date`, `quantity`, `price`) VALUES
(4, 6, '2023-05-02', '2023-05-09', 5, 5.99),
(5, 6, '2023-05-02', '2023-05-09', 5, 5.99);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `full_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE `notification` (
  `notify_id` int(11) NOT NULL,
  `notify_type` varchar(10) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notify_id`, `notify_type`, `timestamp`) VALUES
(7, 'lowStock', '2023-05-03 14:48:10'),
(8, 'lowStock', '2023-05-03 14:48:10'),
(9, 'lowStock', '2023-05-03 14:57:37'),
(10, 'lowStock', '2023-05-03 14:57:37'),
(11, 'lowStock', '2023-05-03 14:57:43'),
(12, 'lowStock', '2023-05-03 14:57:43'),
(13, 'lowStock', '2023-05-03 15:00:47'),
(14, 'lowStock', '2023-05-03 15:00:47');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` int(25) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_quantity`
--

DROP TABLE IF EXISTS `product_quantity`;
CREATE TABLE `product_quantity` (
  `pq_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `produced_date` date NOT NULL,
  `expired_date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `first_name`, `middle_name`, `last_name`, `email`, `phone_number`, `status`) VALUES
(2, 'Nicole', '', 'Bautista', 'nicole@gmail.com', '5141234567', 'active'),
(3, 'Deven', '', 'Patel', 'deven@gmail.com', '5141234567', 'active'),
(4, 'Rachelle', 'Secret', 'Badua', 'rachelle@gmail.com', '5141234567', 'inactive'),
(14, 'Mubeen', 'Academy', 'Khan', 'mubeen@email.com', '5141234567', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

DROP TABLE IF EXISTS `recipe`;
CREATE TABLE `recipe` (
  `recipe_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `treshold`
--

DROP TABLE IF EXISTS `treshold`;
CREATE TABLE `treshold` (
  `treshold_id` int(11) NOT NULL,
  `treshold_category` varchar(25) NOT NULL,
  `treshold_days` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `treshold`
--

INSERT INTO `treshold` (`treshold_id`, `treshold_category`, `treshold_days`, `timestamp`) VALUES
(1, 'Fruits', 3, '2023-05-03 14:38:16'),
(2, 'Dairy', 12, '2023-05-03 14:38:16'),
(3, 'Sweets', 50, '2023-05-03 14:38:16'),
(4, 'Fat and Oils', 30, '2023-05-03 14:38:16'),
(5, 'Baking Products', 30, '2023-05-03 14:38:16'),
(6, 'Others', 20, '2023-05-03 14:38:16');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_type` varchar(12) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(72) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_type`, `username`, `password_hash`) VALUES
(1, 'itspecialist', 'itspecialist', '$2y$10$RUJd5d.C02znWlNyzZeGgOasNkkvXrwV.lr3p2V5BWAHQD4Px4GG2'),
(2, 'admin', 'Nicole', '$2y$10$MM.fKeE0SWVsfdj1K8ZHru1/qkqX8u8EV1.xCqBragA/EkqGZSW8q'),
(3, 'admin', 'Deven', '$2y$10$zaiI4rIJ3ZEMVkzGOtTLIuTuu3usc8/QLJq3.c.EbsTXo6KoLyPg.'),
(4, 'employee', 'Rachelle', '$2y$10$dPLEgTN9QKC5E3Z6u/IYN./YsL07/aG/MSS1XAfEYNyH/lrLGcVf.'),
(14, 'employee', 'employee', '$2y$10$Ll3.loOOb8rS9YkBPuvUrOH30lpPpgZTRZ.qpD6ixn4BhkjCEcH9.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`ingredient_id`),
  ADD KEY `treshold_to_ingredient` (`category`);

--
-- Indexes for table `ingredient_quantity`
--
ALTER TABLE `ingredient_quantity`
  ADD PRIMARY KEY (`iq_id`),
  ADD KEY `inquantity_to_ingredient` (`ingredient_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notify_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `treshold_to_product` (`category`);

--
-- Indexes for table `product_quantity`
--
ALTER TABLE `product_quantity`
  ADD PRIMARY KEY (`pq_id`),
  ADD KEY `pro quantity_to_product` (`product_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`recipe_id`);

--
-- Indexes for table `treshold`
--
ALTER TABLE `treshold`
  ADD PRIMARY KEY (`treshold_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `ingredient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ingredient_quantity`
--
ALTER TABLE `ingredient_quantity`
  MODIFY `iq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notify_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_quantity`
--
ALTER TABLE `product_quantity`
  MODIFY `pq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `recipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `treshold`
--
ALTER TABLE `treshold`
  MODIFY `treshold_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD CONSTRAINT `treshold_to_ingredient` FOREIGN KEY (`category`) REFERENCES `treshold` (`treshold_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ingredient_quantity`
--
ALTER TABLE `ingredient_quantity`
  ADD CONSTRAINT `inquantity_to_ingredient` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredient` (`ingredient_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `treshold_to_product` FOREIGN KEY (`category`) REFERENCES `treshold` (`treshold_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_quantity`
--
ALTER TABLE `product_quantity`
  ADD CONSTRAINT `pro quantity_to_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_to_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

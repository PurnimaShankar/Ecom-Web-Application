-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2022 at 01:32 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `quantity`, `price`, `description`, `image`, `email`, `status`, `created_at`, `name`) VALUES
(13, '5', '300', '    Discover the latest trends in Mango fashion, footwear and accessories. Shop the best outfits for this season at our online store. Discover the latest trends in Mango fashion, footwear and accessories. Shop the best outfits for this season at our online store..Discover the latest trends in Mango fashion, footwear and accessories. Shop the best outfits for this season at our online store.', '166872istockphoto-184276818-612x612.jpg', 'kundansingh754285@gmail.com', '2', '2022-09-09 05:12:27', 'Apple'),
(17, '1', '300', '    Discover the latest trends in Mango fashion, footwear and accessories. Shop the best outfits for this season at our online store. Discover the latest trends in Mango fashion, footwear and accessories. Shop the best outfits for this season at our online store..Discover the latest trends in Mango fashion, footwear and accessories. Shop the best outfits for this season at our online store.', '166872istockphoto-184276818-612x612.jpg', 'kundansingh754285@gmail.com', '2', '2022-09-09 05:10:14', 'Apple'),
(20, '4', '150', 'A book is a medium for recording information in the form of writing or images, typically composed of many pages bound together and protected by a cover.', '398378images.jpg', 'kundansingh754285@gmail.com', '0', '2022-09-08 12:30:21', 'Novel'),
(21, '4', '150', 'A book is a medium for recording information in the form of writing or images, typically composed of many pages bound together and protected by a cover.', '398378images.jpg', 'deepak@gmail.com', '2', '2022-09-09 05:05:18', 'Novel'),
(22, '', '1500', 'Buy mobiles online from popular brands such as Apple, Samsung, OnePlus, Vivo and more at Reliance Digital. Get delivery in 3 hours on select mobile phones ', '644297download (1).jpg', 'deepak@gmail.com', '2', '2022-09-09 05:04:17', 'Mobile Vivo'),
(23, '10', '150', 'A book is a medium for recording information in the form of writing or images, typically composed of many pages bound together and protected by a cover.', '398378images.jpg', 'deepak@gmail.com', '0', '2022-09-09 06:05:54', 'Novel');

-- --------------------------------------------------------

--
-- Table structure for table `customerorder`
--

CREATE TABLE `customerorder` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `zip` varchar(100) NOT NULL,
  `landmark` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `creat` timestamp NOT NULL DEFAULT current_timestamp(),
  `cemail` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `main`
--

CREATE TABLE `main` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main`
--

INSERT INTO `main` (`id`, `email`, `password`) VALUES
(1, '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `category` varchar(110) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `description`, `quantity`, `file`, `category`, `created_at`) VALUES
(30, 'Mango', '200', '   Discover the latest trends in Mango fashion, footwear and accessories. Shop the best outfits for this season at our online store.  ', '45', '845774istockphoto-184276818-612x612.jpg', 'Fruits', '2022-09-08 11:25:18'),
(32, 'Orange', '400', '   Discover the latest trends in Mango fashion, footwear and accessories. Shop the best outfits for this season at our online store.  ', '35', '553369download.jpg', 'Fruit', '2022-09-08 07:42:25'),
(33, 'Novel', '150', 'A book is a medium for recording information in the form of writing or images, typically composed of many pages bound together and protected by a cover.', '10', '398378images.jpg', 'Book', '2022-09-08 12:29:33'),
(34, 'Mobile Vivo', '1500', 'Buy mobiles online from popular brands such as Apple, Samsung, OnePlus, Vivo and more at Reliance Digital. Get delivery in 3 hours on select mobile phones ', '50', '644297download (1).jpg', 'Electronics', '2022-09-08 12:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(2, 'kundan singh', 'kundansingh754285@gmail.com', '123456'),
(3, 'Deepak Singh', 'deepak@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerorder`
--
ALTER TABLE `customerorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `customerorder`
--
ALTER TABLE `customerorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `main`
--
ALTER TABLE `main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

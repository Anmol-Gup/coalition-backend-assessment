-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2024 at 12:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coalition`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `datetime` datetime NOT NULL,
  `total_value` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `quantity`, `price`, `datetime`, `total_value`) VALUES
(1, 'dairy milk', 10, 10.00, '2024-03-16 12:12:02', 100.00),
(2, 'bourbon', 5, 30.00, '2024-03-16 12:13:05', 150.00),
(3, 'pencil', 1, 5.00, '2024-03-16 12:15:06', 5.00),
(4, 'pen', 5, 10.00, '2024-03-16 08:45:58', 50.00),
(15, 'earphones', 2, 130.00, '2024-03-16 12:11:12', 260.00),
(16, '5-star chocolate', 20, 20.00, '2024-03-16 12:13:53', 400.00),
(21, 'good day biscuit', 2, 10.00, '2024-03-16 08:29:47', 20.00),
(22, 'tiger crunch', 5, 10.00, '2024-03-16 08:48:50', 50.00),
(26, 'mom\'s magic', 2, 10.00, '2024-03-16 05:36:09', 20.00),
(28, 'parle-g', 10, 5.00, '2024-03-16 05:54:28', 50.00),
(29, 'lux soap', 5, 20.00, '2024-03-16 05:55:38', 100.00),
(30, 'monaco', 3, 10.00, '2024-03-16 06:08:15', 30.00),
(31, 'cadbury celebrations', 1, 100.00, '2024-03-16 11:34:02', 100.00),
(32, 'tide', 1, 300.00, '2024-03-16 11:35:01', 300.00),
(33, 'surf excel powder', 1, 360.00, '2024-03-16 11:42:36', 360.00),
(34, 'Pears', 4, 30.00, '2024-03-16 11:45:14', 120.00),
(35, 'badam', 2, 2000.00, '2024-03-16 11:50:02', 4000.00),
(36, 'dark fantasy', 1, 30.00, '2024-03-16 11:54:33', 30.00),
(37, 'lotte choco pie', 14, 10.00, '2024-03-16 11:57:20', 140.00),
(38, 'kitkat', 2, 20.00, '2024-03-16 12:02:24', 40.00),
(39, 'britannia 50-50', 5, 10.00, '2024-03-16 12:03:02', 50.00),
(40, 'krackjack', 5, 10.00, '2024-03-16 12:05:52', 50.00),
(41, 'krackjack', 5, 10.00, '2024-03-16 12:05:53', 50.00),
(42, 'appy fizz', 2, 20.00, '2024-03-16 12:06:21', 40.00),
(43, 'magix cream biscuit', 1, 10.00, '2024-03-16 12:14:26', 10.00),
(44, 'dove soap', 35, 2.00, '2024-03-16 12:14:53', 70.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

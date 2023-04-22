-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2023 at 05:58 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barbing`
--

-- --------------------------------------------------------

--
-- Table structure for table `styles`
--

CREATE TABLE `styles` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `style_image` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `styles`
--

INSERT INTO `styles` (`id`, `userid`, `title`, `style_image`, `created_at`) VALUES
(2, 1, 'Low Cut', '636725.jpg', '2023-04-18 15:37:25'),
(3, 1, 'Punk', 'early_code_barbing_style_451022.jpg', '2023-04-18 15:38:47'),
(4, 3, 'Mohawk', 'early_code_barbing_style_145118.jpg', '2023-04-18 15:59:39'),
(5, 1, 'Donut', 'early_code_barbing_style_223989.png', '2023-04-18 16:02:43'),
(7, 1, 'Round Cut', 'early_code_barbing_style_991021.jpg', '2023-04-18 16:37:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `passwords` varchar(300) NOT NULL,
  `reset_token` varchar(10) DEFAULT NULL,
  `reset_timestamp` varchar(100) DEFAULT NULL,
  `avatar` varchar(50) NOT NULL DEFAULT 'user.png',
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `phone`, `dob`, `passwords`, `reset_token`, `reset_timestamp`, `avatar`, `created_at`) VALUES
(1, 'Eleanora Krajcik', 'tester@gmail.com', '331-607-3030', '2023-07-28', '$2y$10$0NvAwUXPAejCXL/cNR9L5ugMJVeRs2JISX4Z4lfh6NgAM8g4SkhdC', '861142', '1682178560', 'early_code_barbing_avatar_1.gif', '2023-04-11'),
(3, 'Eleanora Krajcik', 'tester65658@gmail.com', '09025364766', '2024-03-10', '$2y$10$.L3lFeWbGb9.6ykkx5MtNOc7NLrgXNZoJwOq18fP/ie2CRNzC5T9i', NULL, NULL, 'user.png', '2023-04-11'),
(4, 'Lydia Farrell', 'tester39222@gmail.com', '166-241-6639', '2022-12-29', '$2y$10$6D1L2QriTGFSHVtLFFlk6e./oUnZgAM5/hL2CtaH75gFCB6UYJV3G', NULL, NULL, 'user.png', '2023-04-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `styles`
--
ALTER TABLE `styles`
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
-- AUTO_INCREMENT for table `styles`
--
ALTER TABLE `styles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

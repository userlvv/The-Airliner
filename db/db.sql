-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jun 17, 2026 at 11:32 AM
-- Server version: 8.4.8
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydatabase`
--
CREATE DATABASE IF NOT EXISTS `mydatabase` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `mydatabase`;

-- --------------------------------------------------------

--
-- Table structure for table `admininformation`
--

CREATE TABLE `admininformation` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admininformation`
--

INSERT INTO `admininformation` (`id`, `username`, `password_hash`) VALUES
(1, 'admin', '$2y$12$.ggQO0J7LPKpox/wYHojcecvzM8QLCFhltLPjdo337dHAKM0dwKdq');

-- --------------------------------------------------------

--
-- Table structure for table `all-inclusive`
--

CREATE TABLE `all-inclusive` (
  `id` int NOT NULL,
  `destination` varchar(255) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `all-inclusive`
--

INSERT INTO `all-inclusive` (`id`, `destination`, `price`) VALUES
(2, 'Dubai', 699),
(3, 'Bali', 499),
(4, 'New York', 999),
(5, 'Maldives', 699),
(6, 'Ibiza', 899),
(7, 'Nice', 1099);

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `id` int NOT NULL,
  `destination` varchar(255) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`id`, `destination`, `price`) VALUES
(1, 'Amsterdam Dubai', 349),
(2, 'Amsterdam New York', 499),
(4, 'Amsterdam Bali', 399),
(5, 'Amsterdam Tokyo', 579),
(6, 'Amsterdam Paris', 129);

-- --------------------------------------------------------

--
-- Table structure for table `travel plans`
--

CREATE TABLE `travel plans` (
  `id` int NOT NULL,
  `destination` varchar(255) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `travel plans`
--

INSERT INTO `travel plans` (`id`, `destination`, `price`) VALUES
(1, 'Dubai', 349),
(2, 'New York', 499),
(3, 'Bali', 399),
(4, 'Tokyo', 579),
(5, 'Paris', 129),
(6, 'Cape Town', 699);

-- --------------------------------------------------------

--
-- Table structure for table `userinformation`
--

CREATE TABLE `userinformation` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `userinformation`
--

INSERT INTO `userinformation` (`id`, `name`, `email`, `password_hash`) VALUES
(1, 'Luke', 'luke@luke.nl', '$2y$12$VDJtmsCIcz8/FlEnQYYDTOcUHeAGYAE43REZgGxFCnfrQZTkARsvK'),
(3, 'Admin', 'Admin@Admin.nl', '$2y$12$.ggQO0J7LPKpox/wYHojcecvzM8QLCFhltLPjdo337dHAKM0dwKdq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admininformation`
--
ALTER TABLE `admininformation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `all-inclusive`
--
ALTER TABLE `all-inclusive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travel plans`
--
ALTER TABLE `travel plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userinformation`
--
ALTER TABLE `userinformation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admininformation`
--
ALTER TABLE `admininformation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `all-inclusive`
--
ALTER TABLE `all-inclusive`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `travel plans`
--
ALTER TABLE `travel plans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userinformation`
--
ALTER TABLE `userinformation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

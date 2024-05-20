-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 19, 2024 at 09:16 PM
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
-- Database: `chatapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `unique_idd` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `unique_idd`, `name`, `username`, `password`, `status`) VALUES
(1, '1690817043', 'admin', 'admin', '63a9f0ea7bb98050796b649e85481845', 'Active now'),
(9, '1682777399', 'admin1', 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', 'Offline now'),
(10, '1482486098', 'admin2', 'admin2', 'c84258e9c39059a89ab77d846ddab909', 'Offline now'),
(11, '1498864146', 'admin3', 'admin3', '32cacb2f994f6b42183a1300d9a3e8d6', 'Offline now'),
(12, '1225511376', 'admin4', 'admin4', 'fc1ebc848e31e0a68e868432225e3c82', 'Offline now');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(1, 1671929919, 212799696, 'hiiii'),
(2, 212799696, 1671929919, 'Hello');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL,
  `campus` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `fname`, `lname`, `major`, `campus`, `email`, `password`, `img`, `status`) VALUES
(1, 1671929919, 'Jad', 'Rammal', 'computer science', 'beirut', '12110192@students.liu.edu.lb', 'e4db6e365cc0f71c75a47de3374305fe', '1716037383IMG_8789.jpg', 'Offline now'),
(2, 212799696, 'test', '1', 'mathematics', 'saida', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6', '17160396091378278.jpg', 'Offline now'),
(3, 1476642852, 'test', '2', 'mathematics', 'mount lebanon', 'test2@gmail.com', 'ad0234829205b9033196ba818f7a872b', '17161461315950192.jpg', 'Offline now'),
(4, 1562385556, 'test', '3', 'environmental studies', 'bekaa', 'test3@gmail.com', '8ad8757baa8564dc136c1e07507f4a98', '1716146167Apple-Far-Out-Event-Wallpaper-for-6K-desktop.png', 'Offline now');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

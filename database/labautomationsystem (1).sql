-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2024 at 07:35 AM
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
-- Database: `labautomationsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigntests`
--

CREATE TABLE `assigntests` (
  `id` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `tid` int(11) DEFAULT NULL,
  `testperformdate` date DEFAULT NULL,
  `result` enum('pass','fail') DEFAULT NULL,
  `remarks` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `testingid` varchar(255) DEFAULT NULL,
  `tester` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assigntests`
--

INSERT INTO `assigntests` (`id`, `pid`, `tid`, `testperformdate`, `result`, `remarks`, `created_at`, `updated_at`, `testingid`, `tester`) VALUES
(16, 17, 4, '2024-07-29', 'pass', 'all good', '2024-07-19 15:50:54', '2024-07-23 19:43:55', '2147483647', 'adam'),
(17, 17, 5, '2024-07-24', 'pass', 'all good', '2024-07-19 15:51:39', '2024-07-23 19:43:32', '2147483647', 'adam'),
(18, 16, 4, NULL, NULL, NULL, '2024-07-19 15:52:04', '2024-07-19 20:52:04', '2147483647', NULL),
(19, 15, 4, NULL, 'pass', NULL, '2024-07-19 15:53:26', '2024-07-22 20:54:41', '2147483647', NULL),
(20, 15, 5, NULL, 'pass', NULL, '2024-07-19 15:54:15', '2024-07-22 20:54:49', '2147483647', NULL),
(21, 15, 3, NULL, NULL, NULL, '2024-07-19 15:55:24', '2024-07-19 20:55:24', '30000000015', NULL),
(22, 17, 3, '2024-07-24', 'fail', 'all good', '2024-07-20 14:29:17', '2024-07-23 20:34:32', '30000000017', 'adam');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(14, 'Fuses'),
(16, 'switchgear');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `pid` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`pid`, `cid`) VALUES
(15, 14),
(16, 16),
(17, 14);

-- --------------------------------------------------------

--
-- Table structure for table `category_test`
--

CREATE TABLE `category_test` (
  `cid` int(11) DEFAULT NULL,
  `tid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_test`
--

INSERT INTO `category_test` (`cid`, `tid`) VALUES
(16, 4);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `pcode` varchar(225) DEFAULT NULL,
  `name` varchar(225) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pcode`, `name`, `uid`, `created_at`, `updated_at`) VALUES
(9, '0000000001', 'fuse', NULL, '2024-07-10 14:52:01', '2024-07-11 23:09:36'),
(10, '0000000010', 'cap', 1, '2024-07-10 15:20:39', '2024-07-10 20:40:41'),
(13, '0000000013', 'cap', NULL, '2024-07-12 18:23:52', '2024-07-12 23:23:52'),
(14, '0000000014', 'capicitor', NULL, '2024-07-13 14:20:01', '2024-07-13 19:20:01'),
(15, '0000000015', 'fuse', NULL, '2024-07-13 14:20:22', '2024-07-13 19:20:22'),
(16, '0000000016', 'switchgear 1', NULL, '2024-07-13 14:59:29', '2024-07-13 19:59:29'),
(17, '0000000017', 'fuse2', NULL, '2024-07-16 11:00:38', '2024-07-16 16:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'ManufacturerA'),
(3, 'ManufacturerB'),
(4, 'tester'),
(5, 'Boss');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `rid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`rid`, `uid`) VALUES
(2, 8),
(4, 11),
(1, 12),
(5, 13);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(3, 'Leakage Current Test', 'This test measures the small amount of current ', '2024-07-11 15:51:12', '2024-07-15 23:06:05'),
(4, 'initial testing', 'initital testing 123123', '2024-07-12 05:13:14', '2024-07-12 10:13:14'),
(5, 'secondry testing ', 'secondry testing 456', '2024-07-12 05:14:32', '2024-07-12 10:14:32'),
(6, 'final testing ', 'final testing 3333', '2024-07-12 05:14:49', '2024-07-12 10:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` int(225) NOT NULL,
  `verified_email` tinyint(1) DEFAULT 0,
  `verification_code` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `verified_email`, `verification_code`, `created_at`, `updated_at`) VALUES
(1, 'ali', 'ali000@gmail.com', '12345678', 0, 1, NULL, '2024-06-24 05:25:01', '2024-06-24 10:25:01'),
(8, 'rubbas', 'rubbas@gmail.com', 'AmV6vG3n', 311288783, 0, NULL, '2024-07-05 04:08:52', '2024-07-05 09:08:52'),
(11, 'owais', 'owais009@gmail.com', 'PbJHg4uj', 311288, 0, NULL, '2024-07-15 14:46:50', '2024-07-15 19:46:50'),
(12, 'admin', 'admin1@gmail.com', 'Ip5FS1Am', 311111111, 0, NULL, '2024-07-15 18:17:43', '2024-07-15 23:17:43'),
(13, 'boss', 'boss11@gmail.com', 'qnuLNz9z', 2147483647, 0, NULL, '2024-07-16 10:48:20', '2024-07-16 15:48:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigntests`
--
ALTER TABLE `assigntests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`pid`),
  ADD KEY `tid` (`tid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD KEY `pid` (`pid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `category_test`
--
ALTER TABLE `category_test`
  ADD KEY `cid` (`cid`),
  ADD KEY `tid` (`tid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pcode` (`pcode`),
  ADD KEY `users` (`uid`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `rid` (`rid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assigntests`
--
ALTER TABLE `assigntests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigntests`
--
ALTER TABLE `assigntests`
  ADD CONSTRAINT `assigntests_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `assigntests_ibfk_2` FOREIGN KEY (`tid`) REFERENCES `tests` (`id`);

--
-- Constraints for table `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `category_product_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `category` (`id`);

--
-- Constraints for table `category_test`
--
ALTER TABLE `category_test`
  ADD CONSTRAINT `category_test_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `category_test_ibfk_2` FOREIGN KEY (`tid`) REFERENCES `tests` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `users` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `role_user_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

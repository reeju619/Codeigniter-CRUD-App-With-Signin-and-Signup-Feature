-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2023 at 01:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Reeju Ballabh', 'reejuballabh269@gmail.com', '$2y$10$p6YlabaVk9raDw9MfPPaN.z/JNZf1IefAQ.8/1VyPQNA8iz2CvO.K', '2023-09-20 11:05:19'),
(3, 'Partha Chakraborty', 'reeju.academiaassist@gmail.com', '$2y$10$sngZ8M34SzgDDd8sONZ21uLaVqqz3dYI910RSHp/VoSg/Lauabq4m', '2023-09-21 09:27:19');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('reeju.academiaassist@gmail.com', '2eefb12a9e45caee63ac890c293b5186', '2023-09-21 10:01:22'),
('reeju.academiaassist@gmail.com', '47fb80c28db895ae5007b5613c93f4b7', '2023-09-21 10:20:04'),
('reeju.academiaassist@gmail.com', '58c098383da87364777b36fb88f0d357', '2023-09-21 09:52:48'),
('reeju.academiaassist@gmail.com', '5d50ac8117e64edfcf26f5392629399e', '2023-09-21 11:12:40'),
('reeju.academiaassist@gmail.com', '8a735eed5570bf7d5e4f5a7d2bf0de6c', '2023-09-21 11:14:13'),
('reeju.academiaassist@gmail.com', 'ab7a7c7bfdf8c5a300b0074a88267913', '2023-09-21 11:12:26'),
('reejuballabh269@gmail.com', '3a00014ef35c339ab4582ad80553abfd', '2023-09-21 11:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`) VALUES
(2, 'Reeju Ballabh', 'reejuballabh269@gmail.com'),
(3, 'Amit Mishra', 'admin@admin.com'),
(4, 'Ajay Jadeja', 'test@test.com'),
(6, 'Partha Chakraborty', 'reeju.academiaassist@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`,`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

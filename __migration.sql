-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 26, 2025 at 01:03 PM
-- Server version: 8.0.44-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fatheen_newdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` tinytext NOT NULL,
  `phone` varchar(12) NOT NULL,
  `blocked` int NOT NULL DEFAULT '0',
  `active` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `username`, `password`, `email`, `phone`, `blocked`, `active`) VALUES
(52, 'Fatheen', 'safsdgfdsg', 'sdfdsf@gmail.com', '0772803633', 0, 0),
(53, 'Fatheen', 'zfdgfdh', 'sdfdsf@gmail.com', '0772803633', 0, 0),
(76, 'vfgf', '', '', '', 0, 0),
(81, 'Amanullah', 'd41d8cd98f00b204e9800998ecf8427e', 'Aman@gmail.com', '0779832866', 0, 0),
(86, 'sfsdfgdf', '', 'sadsads@gmail.com', '6789034567', 0, 0),
(88, 'sdsf', 'sdfsf', 'dsfdgf@gmail.com', '0779865433', 0, 0),
(90, 'dfdgfdgb', 'd41d8cd98f00b204e9800998ecf8427e', 'sadsd@gmail.com', '0786954321', 0, 0),
(91, 'xcfdsgvdfg', 'd41d8cd98f00b204e9800998ecf8427e', 'sadsd@gmail.com', '0786954321', 0, 0),
(92, 'testhash', 'd41d8cd98f00b204e9800998ecf8427e', 'testhash3@gmail.com', '9988776655', 0, 0),
(93, 'myname', 'a238c046e7f6ba2b817d357ef82f3951', 'name@gmail.com', '2345876980', 0, 0),
(94, 'anonymus', 'b78f67321adfcfb72c7bbf560d55d82b', 'anonymus@gmail.com', '2345876980', 0, 0),
(95, 'marstest', '6e773778a0efd9bffde43a9238c6ef98', 'anonymus@gmail.com', '2345876980', 0, 0),
(96, 'tester', '69b7f4f8e9866b455ba83dbe09c487e6', 'anonymus@gmail.com', '2345876980', 0, 0),
(104, 'root1', '18198c97e0f4e7ed468da31749e8c545', 'root1@gmail.com', '1234567890', 0, 0),
(105, 'root2', 'a4f9a6084d6ab942b08f0887ec0eb6da', 'root2@gmail.com', '1234567890', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `bio` longtext NOT NULL,
  `avatar` varchar(1024) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `dob` date DEFAULT NULL,
  `instagram` varchar(1024) DEFAULT NULL,
  `twitter` varchar(1024) DEFAULT NULL,
  `facebook` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE `users` ADD CONSTRAINT `auth_users` FOREIGN KEY (`id`) REFERENCES `auth`(`id`) ON DELETE RESTRICT ON UPDATE NO ACTION;
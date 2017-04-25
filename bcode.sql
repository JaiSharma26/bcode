-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2017 at 01:33 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bcode`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(30) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(500) NOT NULL,
  `email` varchar(250) NOT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `active`) VALUES
(1, 'admin', '$2a$08$oEXuXKpTeomcp9zf88PABO5N5a.RYsXkUwxXEgTK/jKZEzFP38rUm', 'admin@gmail.com', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `job_posts`
--

CREATE TABLE `job_posts` (
  `job_Id` int(50) UNSIGNED NOT NULL,
  `customerId` int(50) NOT NULL,
  `title` varchar(150) NOT NULL,
  `skills` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_posts`
--

INSERT INTO `job_posts` (`job_Id`, `customerId`, `title`, `skills`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 'test', '[\"test\",\"a\",\"b\",\"c\",\"d\"]', 'this is just a test job posted to test the functionality', 'active', '2017-04-24 09:35:06', '0000-00-00 00:00:00'),
(3, 6, 'For Gotham City', '[\"Martial art\"]', 'I am God dam batman ...', 'active', '2017-04-24 16:16:10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `profile_customer`
--

CREATE TABLE `profile_customer` (
  `Id` int(50) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profile_freelancer`
--

CREATE TABLE `profile_freelancer` (
  `Id` int(50) UNSIGNED NOT NULL,
  `userId` int(50) NOT NULL,
  `description` text NOT NULL,
  `expertise` varchar(1000) NOT NULL,
  `experience` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `proposal_Id` int(50) UNSIGNED NOT NULL,
  `jobId` int(50) NOT NULL,
  `freelancerId` int(50) NOT NULL,
  `proposal` text NOT NULL,
  `amount` float NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`proposal_Id`, `jobId`, `freelancerId`, `proposal`, `amount`, `created_at`, `updated_at`) VALUES
(1, 3, 5, 'Hay, this is a dummy proposal posted by dev :)', 150, '2017-04-25 12:01:51', '0000-00-00 00:00:00'),
(2, 3, 7, 'Hey I am Iron Man ......', 1500, '2017-04-25 13:21:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(50) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(700) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'freelancer',
  `active` enum('Y','N') NOT NULL DEFAULT 'N',
  `created_at` datetime NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `name`, `username`, `email`, `password`, `type`, `active`, `created_at`, `last_login`) VALUES
(2, 'Abc', 'Abc', 'abc@bcode.com', '$2a$08$yaOICX8X4JgUwmnnzUWB7ej5N4ZV4.dC4/G66RbPCqxF9q0dtXCVG', 'freelancer', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'xyz', 'xyz', 'xyz@bcode.com', '$2a$08$AeH8wAflUL7xhmYvtSGlo.q.Cat9wpOWJDzXIDcIk0qIF8i2wOdo.', 'freelancer', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Dev', 'dev', 'dev@bcode.com', '$2a$08$RblLt4EUejGL29CTJST4Oeexs/CweAeW6ybbiI4PrFDtXXUaYSCaq', 'freelancer', 'Y', '2017-04-17 15:03:02', '2017-04-25 08:57:13'),
(6, 'Bruce Wayne', 'Batman', 'batman@wayne.com', '$2a$08$yLPFahAoYT/FatIdzHVefe9zyZsdgf5lVN3mZRSOxGYdz6Mn11FD2', 'customer', 'Y', '2017-04-24 10:19:39', '2017-04-25 08:55:24'),
(7, 'Iron Man', 'ironman', 'ironman@stark.com', '$2a$08$bKaH3IrEq0O4w6T7fyQ91.jmkyJZac659PVwtjEM7FxgYRekRUxaa', 'freelancer', 'N', '2017-04-25 13:20:25', '2017-04-25 13:20:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_posts`
--
ALTER TABLE `job_posts`
  ADD PRIMARY KEY (`job_Id`);

--
-- Indexes for table `profile_customer`
--
ALTER TABLE `profile_customer`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `profile_freelancer`
--
ALTER TABLE `profile_freelancer`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`proposal_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `job_posts`
--
ALTER TABLE `job_posts`
  MODIFY `job_Id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `profile_customer`
--
ALTER TABLE `profile_customer`
  MODIFY `Id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profile_freelancer`
--
ALTER TABLE `profile_freelancer`
  MODIFY `Id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `proposal_Id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2023 at 04:27 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatbot`
--

-- --------------------------------------------------------

--
-- Table structure for table `botreply`
--

CREATE TABLE `botreply` (
  `enrollno` bigint(20) UNSIGNED NOT NULL,
  `queries` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `replies` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `botreply`
--

INSERT INTO `botreply` (`enrollno`, `queries`, `type`, `replies`, `created_at`, `updated_at`) VALUES
(1, 'hi', 'simple', '<p>hi there i am disha and chat assitant!! made by shimanta das!</p>', '2023-06-24 14:34:01', '2023-06-24 14:34:01'),
(2, 'who is the principal', 'simple', '<p>dr. manishankar roy</p>', '2023-06-24 14:35:48', '2023-06-24 14:35:48'),
(3, 'where does admission of 6th sem will start ?', 'simple', '<p>from 28th july</p>', '2023-06-24 14:38:34', '2023-06-24 14:38:34'),
(4, 'who is db sir ?', 'simple', '<p>he known as debasish barman!</p>\r\n\r\n<p>read more:&nbsp;<strong><a href=\"http://www.sirgurudasmahavidyalaya.com/department/computer-science/debashish-barman-2/\">view profile</a></strong></p>', '2023-06-24 14:39:50', '2023-06-24 14:39:50'),
(5, 'who are you', 'simple', '<p>fbkfbf&nbsp; v ffb</p>', '2023-06-26 08:33:16', '2023-06-26 08:33:16');

-- --------------------------------------------------------

--
-- Table structure for table `chatbotadmins`
--

CREATE TABLE `chatbotadmins` (
  `id` int(11) NOT NULL,
  `email` varchar(240) NOT NULL,
  `passd` varchar(240) NOT NULL,
  `security_string` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chatbotadmins`
--

INSERT INTO `chatbotadmins` (`id`, `email`, `passd`, `security_string`) VALUES
(1, 'meshimanta@yahoo.com', 'shi123', 'clg');

-- --------------------------------------------------------

--
-- Table structure for table `chathistory`
--

CREATE TABLE `chathistory` (
  `enrollno` bigint(20) UNSIGNED NOT NULL,
  `queries` varchar(255) NOT NULL,
  `dates` date NOT NULL,
  `msgtime` time NOT NULL,
  `loc` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chathistory`
--

INSERT INTO `chathistory` (`enrollno`, `queries`, `dates`, `msgtime`, `loc`, `created_at`, `updated_at`) VALUES
(1, 'hi', '2023-06-25', '01:33:14', '::1', NULL, NULL),
(2, 'hi', '2023-06-24', '01:34:11', '::1', NULL, NULL),
(3, 'principal', '2023-06-25', '01:36:17', '::1', NULL, NULL),
(4, 'who is the principal', '2023-06-25', '01:36:25', '::1', NULL, NULL),
(5, 'principal', '2023-06-24', '01:36:46', '::1', NULL, NULL),
(6, 'where does admission of 6th sem will start ?', '2023-06-25', '01:37:11', '::1', NULL, NULL),
(7, 'who is db sir ?', '2023-06-25', '01:37:31', '::1', NULL, NULL),
(8, 'db sir', '2023-06-24', '01:40:21', '::1', NULL, NULL),
(9, '6th sem admission', '2023-06-25', '01:40:42', '::1', NULL, NULL),
(10, 'hi', '2023-06-26', '07:28:48', '::1', NULL, NULL),
(11, 'who are you', '2023-06-26', '07:29:00', '::1', NULL, NULL),
(12, 'who are you', '2023-06-26', '07:33:27', '::1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `unreserved_query`
--

CREATE TABLE `unreserved_query` (
  `enrollno` bigint(20) UNSIGNED NOT NULL,
  `queries` varchar(255) NOT NULL,
  `dates` date NOT NULL,
  `msgtime` time NOT NULL,
  `loc` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unreserved_query`
--

INSERT INTO `unreserved_query` (`enrollno`, `queries`, `dates`, `msgtime`, `loc`, `created_at`, `updated_at`) VALUES
(2, 'principal', '2023-06-24', '01:36:16', '::1', NULL, NULL),
(3, 'who is the principal', '2023-06-24', '01:36:25', '::1', NULL, NULL),
(6, '6th sem admission', '2023-06-24', '01:40:42', '::1', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `botreply`
--
ALTER TABLE `botreply`
  ADD PRIMARY KEY (`enrollno`);

--
-- Indexes for table `chatbotadmins`
--
ALTER TABLE `chatbotadmins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chathistory`
--
ALTER TABLE `chathistory`
  ADD PRIMARY KEY (`enrollno`);

--
-- Indexes for table `unreserved_query`
--
ALTER TABLE `unreserved_query`
  ADD PRIMARY KEY (`enrollno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `botreply`
--
ALTER TABLE `botreply`
  MODIFY `enrollno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chatbotadmins`
--
ALTER TABLE `chatbotadmins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chathistory`
--
ALTER TABLE `chathistory`
  MODIFY `enrollno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `unreserved_query`
--
ALTER TABLE `unreserved_query`
  MODIFY `enrollno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

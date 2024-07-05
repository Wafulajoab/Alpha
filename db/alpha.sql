-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2024 at 01:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alpha`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `totalDepositsBalance` decimal(10,2) DEFAULT 0.00,
  `accountBalance` decimal(10,2) DEFAULT 0.00,
  `totalWithdrawn` decimal(10,2) DEFAULT 0.00,
  `referralsEarnings` decimal(10,2) DEFAULT 0.00,
  `lastDepositUpdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `totalDepositsBalance`, `accountBalance`, `totalWithdrawn`, `referralsEarnings`, `lastDepositUpdate`) VALUES
(113, 'Joab254', 274100.00, 800.00, 37000.00, 0.00, '2024-06-21 08:59:40'),
(116, 'Faith254', 43000.00, 39800.00, 6500.00, 0.00, '2024-06-26 16:11:06'),
(119, 'Wafula joab', 78000.00, 46100.00, 0.00, 0.00, '2024-06-22 02:28:33'),
(125, 'Joab', 35000.00, 35000.00, 0.00, 0.00, '2024-06-18 13:45:52'),
(136, 'Caroo', 59000.00, 52050.00, 5500.00, 0.00, '2024-06-18 14:58:06'),
(141, 'David', 92000.00, 86000.00, 0.00, 0.00, '2024-06-18 17:54:23'),
(144, 'Brian21', 2000.00, 0.00, 0.00, 0.00, NULL),
(145, 'Brayoo', 12000.00, 12000.00, 0.00, 0.00, '2024-06-19 18:06:22'),
(146, 'Trizah', 125000.00, 61000.00, 0.00, 0.00, '2024-06-20 04:30:25'),
(150, 'Moses', 50000.00, 50000.00, 0.00, 0.00, '2024-06-20 11:09:40'),
(151, 'Ruth', 50000.00, 45000.00, 0.00, 0.00, '2024-06-20 23:12:28'),
(157, 'Dennis254', 62000.00, 52000.00, 10000.00, 0.00, '2024-06-25 02:50:01'),
(159, 'Vayoo', 150000.00, 75500.00, 74500.00, 0.00, '2024-06-25 10:30:31'),
(161, 'wafulajoan', 1000.00, 0.00, 0.00, 0.00, NULL),
(162, 'Gift', 1000.00, 500.00, 500.00, 0.00, '2024-06-29 12:57:51');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(30, 'ADMIN', '$2y$10$9KGDLB9B6As2eo9ErK11QOieLsjI9xJHS/aO8qCSPu4isOB1HmFzu');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `transaction_code` varchar(255) NOT NULL,
  `deposit_amount` decimal(10,2) NOT NULL,
  `status` enum('Pending','Approved','Rejected') DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_reaction` varchar(1) DEFAULT NULL,
  `deposit_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `username`, `transaction_code`, `deposit_amount`, `status`, `created_at`, `admin_reaction`, `deposit_date`) VALUES
(79, 'Joab254', 'GHJHKLKJHG', 1000.00, 'Approved', '2024-06-17 04:41:26', '✔', '2024-06-17 07:41:26'),
(80, 'Joab254', 'UIYUGHSAJV', 7000.00, 'Approved', '2024-06-17 06:14:22', '✔', '2024-06-17 09:14:22'),
(81, 'Joab254', 'KHJXHBNWKM', 9000.00, 'Approved', '2024-06-17 06:14:46', '✔', '2024-06-17 09:14:46'),
(82, 'Faith254', 'BVBCVDTRYT', 1000.00, 'Approved', '2024-06-17 06:41:16', '✔', '2024-06-17 09:41:16'),
(83, 'FAITH254', 'MNBVGFGHJK', 6000.00, 'Approved', '2024-06-17 06:45:28', '✔', '2024-06-17 09:45:28'),
(84, 'FAITH254', 'SDFHGJHKJG', 30000.00, 'Approved', '2024-06-17 06:52:34', '✔', '2024-06-17 09:52:34'),
(85, 'Wafula joab', 'ADSFDGHJKJ', 8000.00, 'Approved', '2024-06-18 01:33:09', '✔', '2024-06-18 04:33:09'),
(86, 'Wafula joab', 'ADSFDGHJKL', 1000.00, 'Approved', '2024-06-18 01:34:08', '✔', '2024-06-18 04:34:08'),
(87, 'Wafula joab', 'HGGDFSDUYT', 3000.00, 'Rejected', '2024-06-18 01:55:35', '❌', '2024-06-18 04:55:35'),
(88, 'Wafula joab', 'TYTUHJUTRD', 50000.00, 'Approved', '2024-06-18 01:56:30', '✔', '2024-06-18 04:56:30'),
(89, 'Wafula joab', 'HGHJHKJJKO', 7000.00, 'Rejected', '2024-06-18 01:57:43', '❌', '2024-06-18 04:57:43'),
(90, 'Wafula Joab', 'HGJKLJH7TF', 9000.00, 'Approved', '2024-06-18 06:59:01', '✔', '2024-06-18 09:59:01'),
(91, 'Joab', 'OIUYYTFHG8', 10000.00, 'Approved', '2024-06-18 08:11:19', '✔', '2024-06-18 11:11:19'),
(92, 'Joab', 'ZXCVBNJHGF', 7000.00, 'Approved', '2024-06-18 08:12:15', '✔', '2024-06-18 11:12:15'),
(93, 'Joab', 'GHFGDDGHGF', 8000.00, 'Approved', '2024-06-18 08:12:58', '✔', '2024-06-18 11:12:58'),
(94, 'Joab', '4ERDTFYGUH', 6000.00, 'Approved', '2024-06-18 08:16:09', '✔', '2024-06-18 11:16:09'),
(95, 'Joab', 'ZX5ERSDSFG', 4000.00, 'Approved', '2024-06-18 08:28:07', '✔', '2024-06-18 11:28:07'),
(96, 'Joab254', 'YTYRTHGJHK', 60000.00, 'Approved', '2024-06-18 09:11:32', '✔', '2024-06-18 12:11:32'),
(97, 'Joab254', 'KJHGFDSDFD', 3000.00, 'Approved', '2024-06-18 09:20:49', '✔', '2024-06-18 12:20:49'),
(98, 'Joab254', 'KHJGFGDFSR', 7000.00, 'Approved', '2024-06-18 09:51:33', '✔', '2024-06-18 12:51:33'),
(99, 'Joab254', 'ASJGHDJVHB', 3000.00, 'Approved', '2024-06-18 09:55:07', '✔', '2024-06-18 12:55:07'),
(100, 'Joab254', 'LJKJDLEJKE', 100000.00, 'Rejected', '2024-06-18 09:55:52', '❌', '2024-06-18 12:55:52'),
(101, 'Joab254', 'KJHJGHFGYT', 20000.00, 'Approved', '2024-06-18 10:02:59', '✔', '2024-06-18 13:02:59'),
(102, 'Caroo', 'LKJHGHFGDG', 7000.00, 'Approved', '2024-06-18 11:24:04', '✔', '2024-06-18 14:24:04'),
(103, 'Caroo', 'KJHGHF4GHF', 600.00, 'Approved', '2024-06-18 11:25:10', '✔', '2024-06-18 14:25:10'),
(104, 'Caroo', 'SBVCHGJKLN', 700.00, 'Rejected', '2024-06-18 11:25:39', '❌', '2024-06-18 14:25:39'),
(105, 'Caroo', 'IHJGFGFHGJ', 700.00, 'Approved', '2024-06-18 11:26:26', '✔', '2024-06-18 14:26:26'),
(106, 'Caroo', 'RTGFHGJKJJ', 50000.00, 'Approved', '2024-06-18 11:27:05', '✔', '2024-06-18 14:27:05'),
(107, 'David', 'HSY7RUJHSH', 2000.00, 'Approved', '2024-06-18 14:49:07', '✔', '2024-06-18 17:49:07'),
(108, 'David', 'FERE5EADSF', 50000.00, 'Approved', '2024-06-18 14:49:42', '✔', '2024-06-18 17:49:42'),
(109, 'David', 'JSGS7SGHJH', 40000.00, 'Approved', '2024-06-18 14:50:02', '✔', '2024-06-18 17:50:02'),
(110, 'Brian21', 'JKHJGFGH56', 2000.00, 'Approved', '2024-06-19 04:56:52', '✔', '2024-06-19 07:56:52'),
(111, 'Brayoo', 'KHJGFGDFSD', 12000.00, 'Approved', '2024-06-19 15:05:05', '✔', '2024-06-19 18:05:05'),
(112, 'Trizah', 'HFGDTGUJH5', 5000.00, 'Approved', '2024-06-20 01:22:25', '✔', '2024-06-20 04:22:25'),
(113, 'Trizah', 'UTYRFGUYYR', 30000.00, 'Approved', '2024-06-20 01:24:09', '✔', '2024-06-20 04:24:09'),
(114, 'Trizah', 'SASWQQW232', 50000.00, 'Approved', '2024-06-20 01:24:29', '✔', '2024-06-20 04:24:29'),
(115, 'Trizah', 'JHFGDCHJKJ', 40000.00, 'Approved', '2024-06-20 01:25:06', '✔', '2024-06-20 04:25:06'),
(116, 'Moses', 'OPIUIYUTYF', 50000.00, 'Approved', '2024-06-20 07:22:11', '✔', '2024-06-20 10:22:11'),
(117, 'Ruth', 'HJGFGDFLJK', 50000.00, 'Approved', '2024-06-20 20:11:45', '✔', '2024-06-20 23:11:45'),
(118, 'Joab254', 'UGFHGJHO78', 100.00, 'Approved', '2024-06-21 04:49:36', '✔', '2024-06-21 07:49:36'),
(119, 'Joab254', 'LKJHGFDSFD', 50000.00, 'Approved', '2024-06-21 05:53:41', '✔', '2024-06-21 08:53:41'),
(120, 'Joab254', 'LLLLLLLMLK', 2000.00, 'Approved', '2024-06-21 05:54:32', '✔', '2024-06-21 08:54:32'),
(121, 'Joab254', 'DGFHGFXGFH', 12000.00, 'Approved', '2024-06-21 05:58:17', '✔', '2024-06-21 08:58:17'),
(122, 'Faith254', 'IUYT6RFGHJ', 6000.00, 'Approved', '2024-06-24 19:04:44', '✔', '2024-06-24 22:04:44'),
(123, 'Dennis254', 'YTEDGFHCVU', 12000.00, 'Approved', '2024-06-24 23:49:08', '✔', '2024-06-25 02:49:08'),
(124, 'Dennis254', 'JHGFGHGJHK', 50000.00, 'Approved', '2024-06-24 23:49:21', '✔', '2024-06-25 02:49:21'),
(125, 'Vayoo', 'YEHGHUHEUR', 100000.00, 'Approved', '2024-06-25 07:29:23', '✔', '2024-06-25 10:29:23'),
(126, 'Vayoo', 'UEIUFRUFJR', 50000.00, 'Approved', '2024-06-25 07:29:45', '✔', '2024-06-25 10:29:45'),
(127, 'wafulajoan', 'ZXCVBNYUTR', 1000.00, 'Approved', '2024-06-26 13:55:45', '✔', '2024-06-26 16:55:45'),
(128, 'Gift', 'UYTREWDSFH', 1000.00, 'Approved', '2024-06-29 09:57:08', '✔', '2024-06-29 12:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `investments`
--

CREATE TABLE `investments` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `package_name` varchar(255) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `maturity_date` date DEFAULT NULL,
  `return_rate` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `investments`
--

INSERT INTO `investments` (`id`, `username`, `amount`, `status`, `created_at`, `user_id`, `package_name`, `duration`, `maturity_date`, `return_rate`) VALUES
(30, 'Joab254', 0.00, 'Matured', '2024-06-17 04:44:57', 0, 'Silver Package', 3, '2024-06-20', NULL),
(31, 'Joab254', 0.00, 'Matured', '2024-06-17 04:46:02', 0, 'Silver Package', 3, '2024-06-20', NULL),
(32, 'Joab254', 0.00, 'Matured', '2024-06-17 06:18:49', 0, 'Bronze Package', 4, '2024-06-21', NULL),
(33, 'Joab254', 0.00, 'Matured', '2024-06-17 06:20:09', 0, 'Silver Package', 3, '2024-06-20', NULL),
(34, 'Joab254', 0.00, 'Matured', '2024-06-17 06:26:16', 0, 'Executive Package', 10, '2024-06-27', NULL),
(35, 'Joab254', 0.00, 'Matured', '2024-06-17 06:26:44', 0, 'Executive Package', 10, '2024-06-27', NULL),
(36, 'Joab254', 0.00, 'Matured', '2024-06-17 06:28:19', 0, 'gold Package', 6, '2024-06-23', NULL),
(37, 'Joab254', 0.00, 'Matured', '2024-06-17 06:30:50', 0, 'Executive Package', 10, '2024-06-27', NULL),
(38, 'FAITH254', 0.00, 'Matured', '2024-06-17 06:51:17', 0, 'Silver Package', 3, '2024-06-20', NULL),
(39, 'FAITH254', 0.00, 'Matured', '2024-06-17 06:52:03', 0, 'Bronze Package', 4, '2024-06-21', NULL),
(40, 'FAITH254', 0.00, 'Matured', '2024-06-17 06:55:22', 0, 'Silver Package', 3, '2024-06-20', NULL),
(41, 'FAITH254', 0.00, 'Matured', '2024-06-17 06:55:27', 0, 'Bronze Package', 4, '2024-06-21', NULL),
(42, 'FAITH254', 0.00, 'Matured', '2024-06-17 06:56:25', 0, 'Silver Package', 3, '2024-06-20', NULL),
(43, 'FAITH254', 0.00, 'Matured', '2024-06-17 07:09:58', 0, 'Executive Package', 10, '2024-06-27', NULL),
(44, 'FAITH254', 0.00, 'Matured', '2024-06-17 07:10:43', 0, 'Gold Package', 6, '2024-06-23', NULL),
(45, 'FAITH254', 0.00, 'Matured', '2024-06-17 07:20:43', 0, 'Silver Package', 3, '2024-06-20', NULL),
(46, 'FAITH254', 0.00, 'Matured', '2024-06-17 07:21:52', 0, 'Gold Package', 6, '2024-06-23', NULL),
(47, 'FAITH254', 0.00, 'Matured', '2024-06-17 07:22:24', 0, 'Executive Package', 10, '2024-06-27', NULL),
(48, 'FAITH254', 0.00, 'Matured', '2024-06-17 07:28:43', 0, 'Executive Package', 10, '2024-06-27', NULL),
(49, 'FAITH254', 0.00, 'Matured', '2024-06-17 07:35:14', 0, 'Gold Package', 6, '2024-06-23', NULL),
(50, 'FAITH254', 0.00, 'Matured', '2024-06-17 07:37:13', 0, 'Bronze Package', 4, '2024-06-21', NULL),
(51, 'FAITH254', 0.00, 'Matured', '2024-06-17 07:39:59', 0, 'Executive Package', 10, '2024-06-27', NULL),
(52, 'Joab254', 0.00, 'Matured', '2024-06-17 09:13:05', 0, 'Silver Package', 3, '2024-06-20', NULL),
(53, 'Joab254', 0.00, 'Matured', '2024-06-17 09:21:48', 0, 'Silver Package', 3, '2024-06-20', NULL),
(54, 'Joab254', 0.00, 'Matured', '2024-06-17 09:22:01', 0, 'Executive Package', 10, '2024-06-27', NULL),
(55, 'Wafula joab', 0.00, 'Matured', '2024-06-18 02:06:14', 0, 'Silver Package', 3, '2024-06-21', NULL),
(56, 'Wafula joab', 0.00, 'Matured', '2024-06-18 02:06:26', 0, 'Bronze Package', 4, '2024-06-22', NULL),
(57, 'Wafula joab', 0.00, 'Matured', '2024-06-18 04:11:15', 0, 'Silver Package', 3, '2024-06-21', NULL),
(58, 'Joab254', 0.00, 'Matured', '2024-06-18 10:41:31', 0, 'gold Package', 6, '2024-06-24', NULL),
(59, 'Caroo', 0.00, 'Matured', '2024-06-18 12:01:38', 0, 'Silver Package', 3, '2024-06-21', NULL),
(60, 'David', 0.00, 'Matured', '2024-06-18 14:55:01', 0, 'Executive Package', 10, '2024-06-28', NULL),
(61, 'David', 0.00, 'Matured', '2024-06-18 14:55:14', 0, 'Bronze Package', 4, '2024-06-22', NULL),
(62, 'David', 0.00, 'Matured', '2024-06-18 14:57:07', 0, 'Bronze Package', 4, '2024-06-22', NULL),
(63, 'David', 0.00, 'Matured', '2024-06-18 14:57:19', 0, 'Gold Package', 6, '2024-06-24', NULL),
(64, 'Brayoo', 0.00, 'Matured', '2024-06-19 15:06:40', 0, 'Silver Package', 3, '2024-06-22', NULL),
(65, 'Trizah', 0.00, 'Matured', '2024-06-20 04:21:18', 0, 'Silver Package', 3, '2024-06-23', NULL),
(66, 'Trizah', 0.00, 'Matured', '2024-06-20 04:22:17', 0, 'Gold Package', 6, '2024-06-26', NULL),
(67, 'Moses', 0.00, 'Matured', '2024-06-20 08:10:24', 0, 'Bronze Package', 4, '2024-06-24', NULL),
(68, 'Ruth', 0.00, 'Matured', '2024-06-20 20:12:48', 0, 'Silver Package', 3, '2024-06-23', NULL),
(69, 'Ruth', 0.00, 'Matured', '2024-06-20 20:13:05', 0, 'Executive Package', 10, '2024-06-30', NULL),
(70, 'Ruth', 0.00, 'Matured', '2024-06-20 20:13:25', 0, 'Gold Package', 6, '2024-06-26', NULL),
(71, 'Joab254', 0.00, 'Matured', '2024-06-21 04:45:02', 0, 'Silver Package', 3, '2024-06-24', NULL),
(72, 'Caroo', 0.00, 'Matured', '2024-06-21 20:45:20', 0, 'Bronze Package', 4, '2024-06-25', NULL),
(73, 'Caroo', 0.00, 'Matured', '2024-06-21 20:45:30', 0, 'Gold Package', 6, '2024-06-27', NULL),
(74, 'Caroo', 0.00, 'Matured', '2024-06-21 20:45:38', 0, 'Executive Package', 10, '2024-07-01', NULL),
(75, 'Dennis254', 0.00, 'Matured', '2024-06-24 23:50:29', 0, 'Silver Package', 3, '2024-06-28', NULL),
(76, 'Dennis254', 0.00, 'Matured', '2024-06-24 23:50:40', 0, 'Gold Package', 6, '2024-07-01', NULL),
(77, 'Dennis254', 0.00, 'Matured', '2024-06-24 23:50:48', 0, 'Executive Package', 10, '2024-07-05', NULL),
(78, 'Dennis254', 0.00, 'Matured', '2024-06-24 23:51:11', 0, 'Executive Package', 10, '2024-07-05', NULL),
(79, 'Vayoo', 0.00, 'Matured', '2024-06-25 07:31:09', 0, 'Bronze Package', 4, '2024-06-29', NULL),
(80, 'Vayoo', 0.00, 'Matured', '2024-06-25 07:31:20', 0, 'Bronze Package', 4, '2024-06-29', NULL),
(81, 'Vayoo', 0.00, 'Matured', '2024-06-25 07:31:33', 0, 'Executive Package', 10, '2024-07-05', NULL),
(82, 'Vayoo', 0.00, 'Matured', '2024-06-25 07:31:46', 0, 'Silver Package', 3, '2024-06-28', NULL),
(83, 'Vayoo', 0.00, 'Matured', '2024-06-25 07:32:05', 0, 'Executive Package', 10, '2024-07-05', NULL),
(84, 'faith254', 0.00, 'Matured', '2024-06-27 23:14:58', 0, 'Silver Package', 3, '2024-07-01', NULL),
(85, 'faith254', 1000.00, 'Active', '2024-06-27 23:15:07', 0, 'Executive Package', 10, '2024-07-08', NULL),
(86, 'faith254', 0.00, 'Matured', '2024-06-28 17:22:27', 0, 'Bronze Package', 4, '2024-07-02', NULL),
(87, 'faith254', 0.00, 'Matured', '2024-06-28 17:46:07', 0, 'Silver Package', 3, '2024-07-01', NULL),
(88, 'Gift', 0.00, 'Matured', '2024-06-29 09:58:30', 0, 'Silver Package', 3, '2024-07-02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender`, `receiver`, `message`, `timestamp`) VALUES
(17, 'Caroo', 'joab', 'hello', '2024-06-18 12:59:32'),
(18, 'Dennis254', 'joab', 'hello', '2024-06-24 23:52:41'),
(19, 'Vayoo', 'joab', 'hello', '2024-06-25 07:34:33'),
(20, 'Gift', 'joab', 'fsds', '2024-06-29 10:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `id` int(11) NOT NULL,
  `referrer_username` varchar(255) NOT NULL,
  `referred_username` varchar(255) NOT NULL,
  `referral_level` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `transaction_code` varchar(10) NOT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `activation_status` enum('pending','activated') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `username`, `amount`, `transaction_code`, `transaction_date`, `activation_status`) VALUES
(1, 123, '', 100.00, 'VTH65RTYUU', '2024-06-18 06:43:40', 'activated'),
(2, 123, '', 100.00, 'VTH65RTYUU', '2024-06-18 06:45:49', 'activated'),
(3, 123, 'Joab254', 100.00, 'GHF5RTGFHG', '2024-06-18 07:26:18', 'activated'),
(4, 123, 'Joab254', 100.00, 'GHF5RTGFHG', '2024-06-18 07:27:36', 'activated'),
(5, 123, 'Nelson', 100.00, 'HY6YGCHJKL', '2024-06-18 07:28:52', 'activated'),
(6, 123, 'Nelson', 100.00, 'HY6YGCHJKL', '2024-06-18 07:30:35', 'activated'),
(7, 123, 'Robie', 100.00, 'ADSFDGGHH5', '2024-06-18 08:03:54', 'activated'),
(8, 123, 'Joab', 100.00, 'ZXCVBNM765', '2024-06-18 08:05:46', 'activated'),
(9, 123, 'Agnes254', 100.00, 'ZXCVBN6TFG', '2024-06-18 08:50:05', 'activated'),
(10, 123, 'Caroo', 100.00, 'FDGFHJKJ76', '2024-06-18 10:48:13', 'activated'),
(11, 123, 'David', 100.00, 'UGHGJHH3GF', '2024-06-18 14:48:10', 'activated'),
(12, 123, 'Amani', 100.00, 'JKHJGFGH56', '2024-06-19 04:45:15', 'activated'),
(13, 123, 'Brian21', 100.00, 'GFDDHJK4GF', '2024-06-19 04:54:45', 'activated'),
(14, 123, 'Lucie', 100.00, 'SASWQQW232', '2024-06-19 06:16:44', 'activated'),
(15, 123, 'Lucie', 100.00, 'SASWQQW232', '2024-06-19 06:26:42', 'activated'),
(16, 123, 'Mellisa', 100.00, 'GHFDSDTFYT', '2024-06-19 08:26:27', 'activated'),
(17, 123, 'Joshua', 100.00, 'HSDH65YTHG', '2024-06-19 11:29:07', 'activated'),
(18, 123, 'Peniel', 100.00, 'YTREDGFHJH', '2024-06-19 12:45:45', 'activated'),
(19, 123, 'Peniel', 100.00, 'YTREDGFHJH', '2024-06-19 12:47:42', 'activated'),
(20, 123, 'Peniel', 100.00, 'YTREDGFHJH', '2024-06-19 12:55:29', 'activated'),
(21, 123, 'Faith', 100.00, 'KJHGDHDJ6D', '2024-06-19 12:59:46', 'activated'),
(22, 123, 'steve', 100.00, 'SFDGHGJHKL', '2024-06-19 13:00:41', 'activated'),
(23, 123, 'ALICE', 100.00, 'KJHGFDFGFH', '2024-06-19 13:01:33', 'activated'),
(24, 121, 'Joab', 100.00, 'GHFDSDTFYT', '2024-06-19 13:09:13', 'activated'),
(25, 113, 'JOASH', 100.00, 'LKJHGFDSFD', '2024-06-19 13:10:26', 'activated'),
(26, 123, 'JOASH', 100.00, 'LKJHGFDSFD', '2024-06-19 13:10:50', 'activated'),
(27, 123, 'JOASH', 100.00, 'LKJHGFDSFD', '2024-06-19 13:11:55', 'activated'),
(28, 123, 'JOASH', 100.00, 'LKJHGFDSFD', '2024-06-19 13:22:44', ''),
(29, 123, 'JOASH', 100.00, 'LKJHGFDSFD', '2024-06-19 13:25:54', 'activated'),
(30, 123, 'Amani254', 100.00, 'ZSDFTYUIOI', '2024-06-19 13:48:21', 'activated'),
(31, 123, 'Amani254', 100.00, 'ZSDFTYUIOI', '2024-06-19 13:57:36', 'activated'),
(32, 123, 'Amani254', 100.00, 'ZSDFTYUIOI', '2024-06-19 13:57:43', 'activated'),
(33, 123, 'Amani254', 100.00, 'ZSDFTYUIOI', '2024-06-19 13:59:02', 'activated'),
(34, 123, 'jedd', 100.00, 'SADSSDSSDW', '2024-06-19 14:00:51', 'activated'),
(35, 140, 'jedd', 100.00, 'SADSSDSSDW', '2024-06-19 14:03:23', 'activated'),
(36, 141, 'jedz', 100.00, 'HJGFDFSTDF', '2024-06-19 14:09:19', 'activated'),
(37, 141, 'jedz', 100.00, 'HJGFDFSTDF', '2024-06-19 14:18:31', 'activated'),
(38, 142, 'Filipo', 100.00, 'ZXCVBNYUTR', '2024-06-19 14:29:23', 'activated'),
(39, 142, 'Filipo', 100.00, 'ZXCVBNYUTR', '2024-06-19 14:33:52', 'activated'),
(40, 123, 'Filipo', 100.00, 'ZXCVBNYUTR', '2024-06-19 14:40:40', 'activated'),
(41, 123, 'Ezekiel', 100.00, 'SFDGHJKJHG', '2024-06-19 14:42:51', 'activated'),
(42, 123, 'Ezekiel', 100.00, 'SFDGHJKJHG', '2024-06-19 14:45:35', 'activated'),
(43, 123, 'David254', 100.00, 'KHJGFHGJKS', '2024-06-19 14:56:09', 'activated'),
(44, 123, 'Brayoo', 100.00, 'DFGHJKLKJH', '2024-06-19 15:02:01', 'activated'),
(45, 123, 'Forex22', 100.00, 'ADSFDRSE55', '2024-06-19 17:54:17', 'activated'),
(46, 123, 'Tonny', 100.00, 'YUYT67UGJH', '2024-06-19 17:57:45', 'activated'),
(47, 123, 'Trizah', 100.00, 'FGFHJH543E', '2024-06-19 18:08:29', 'activated'),
(48, 123, 'Tonny', 100.00, 'YUYT67UGJH', '2024-06-19 19:19:39', 'activated'),
(49, 123, 'Trizah', 100.00, 'FGFHJH543E', '2024-06-19 19:19:52', 'activated'),
(50, 123, 'Moses', 100.00, 'YTRUF545TG', '2024-06-20 07:06:17', 'activated'),
(51, 123, 'Moses256', 100.00, 'JHGFGHGJHK', '2024-06-20 08:02:00', 'activated'),
(52, 123, 'Moses29876', 100.00, 'JHGFGHGJHK', '2024-06-20 08:03:26', 'activated'),
(53, 123, 'Moses001', 100.00, 'JHGFGHGJHK', '2024-06-20 08:03:46', 'activated'),
(54, 123, 'Morris254', 100.00, 'YGHJHK665T', '2024-06-20 09:23:11', 'activated'),
(55, 123, 'Yusuf', 100.00, 'YYTY6567UY', '2024-06-20 09:25:25', 'activated'),
(56, 123, 'Yusuf', 100.00, 'YYTY6567UY', '2024-06-20 09:28:37', 'activated'),
(57, 123, 'David256', 100.00, 'HJGFDFSTRY', '2024-06-20 17:28:12', 'activated'),
(58, 123, 'Ruth', 100.00, 'FGFHGJHJGH', '2024-06-20 20:09:58', 'activated'),
(59, 123, 'Velma254', 100.00, 'ZXXFTGRTTR', '2024-06-22 02:42:52', 'activated'),
(60, 123, 'Joab234', 100.00, 'GHGHVSHGST', '2024-06-24 21:42:08', 'activated'),
(61, 123, 'WafulaJoan', 100.00, 'KJJSAKKASJ', '2024-06-24 21:44:31', 'activated'),
(62, 123, 'Yoshie', 100.00, 'ASDFGHJKLK', '2024-06-24 21:58:58', 'activated'),
(63, 123, 'wamboo', 100.00, 'ZXCVBNUTRD', '2024-06-24 22:18:28', 'activated'),
(64, 123, 'fidelis', 100.00, 'ZXCVJHHFGD', '2024-06-24 22:44:57', 'activated'),
(65, 123, 'wafjoab', 100.00, 'FGFFRTHJDF', '2024-06-24 22:47:04', 'activated'),
(66, 123, 'waffjoab', 100.00, 'KJJHGGDSHH', '2024-06-24 22:48:46', 'activated'),
(67, 123, 'Elikanah', 100.00, 'SJGSHGHSDG', '2024-06-24 23:15:01', 'activated'),
(68, 123, 'Dennis254', 100.00, 'KHJGFDVJHF', '2024-06-24 23:47:50', 'activated'),
(69, 123, 'Vayoo', 100.00, 'CHJHJCHWKJ', '2024-06-25 07:26:54', 'activated'),
(70, 123, 'Viginia', 100.00, 'ASADFEW23E', '2024-06-26 14:09:10', 'activated'),
(71, 123, 'Joabjob', 100.00, 'ZHGDTYTUYG', '2024-06-27 17:59:00', 'activated'),
(72, 123, 'halima', 100.00, 'GFHJHJKJLK', '2024-06-27 22:23:03', 'activated'),
(73, 123, 'kenn', 100.00, 'ADSFDGFHGJ', '2024-06-27 22:39:11', 'activated'),
(74, 123, 'samm', 100.00, 'FSFJHGKJHJ', '2024-06-27 22:41:45', 'activated'),
(75, 123, 'peter', 100.00, 'LIKUJGHFHG', '2024-06-27 23:07:10', 'activated'),
(76, 123, 'John2544', 100.00, 'TFGDFHGJKJ', '2024-06-27 23:10:18', 'activated'),
(77, 123, 'Gift', 100.00, 'KJHGFSDFIU', '2024-06-29 09:54:58', 'activated'),
(78, 123, 'joabb', 100.00, 'UIYUTUGIHO', '2024-07-05 21:34:47', 'activated');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `campus` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_time` datetime DEFAULT current_timestamp(),
  `balance` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `phone_number`, `campus`, `password`, `registration_time`, `balance`) VALUES
(107, 'Joab254', '0789756456', '', '$2y$10$WJyq8FMeXGmNx/Fv2EuvAuJxGS8qeOrJzTHuCWuk7XCCpD.fmk9bq', '2024-06-17 07:40:52', 0.00),
(108, 'Faith254', '0789678765', '', '$2y$10$UQjVmfJqVrFW68tGIoDxQO.qoseTsOnvCQk090jFCOKw/XadGqe4i', '2024-06-17 09:39:33', 0.00),
(109, 'Wafula Joab', '0794777333', '', '$2y$10$hWJcVIAyMO/7Bau0jnRLROKQj2f/62XYLhqHEu.IunQ..uDMvCi4.', '2024-06-18 04:05:52', 0.00),
(110, 'Caro', '0765435465', '', '$2y$10$JFRj43bdP.GYvjYoP46Ikef.b0eJrFz.olhWaucYbd0RHCoAT/FHS', '2024-06-18 08:27:06', 0.00),
(111, 'Benn', '0765454657', '', '$2y$10$FALDbj3BXUpo/6NrB47YGe0gDazCTEPxPixRXVzse/9QE.uwz2Zo.', '2024-06-18 08:30:35', 0.00),
(112, 'John', '0987654345', '', '$2y$10$YGUQei61LlZ.KwW589qRp.kE4D6Ol06/H/HFlAqk/XSAJDDAVbPdO', '2024-06-18 08:46:54', 0.00),
(113, 'Joash', '0877654565', '', '$2y$10$qd/HWmDIk9W7JKM.SHb.T.nP0xfsFIY2sej9Ri/VQ5LOHpZgw8efO', '2024-06-18 09:02:18', 0.00),
(114, 'Waff254', '0788446767', '', '$2y$10$RlUgVpp7OPK6YbmDw/06IOOWFXeQFJOy3mC3/54GeG3NIhlNd1rGW', '2024-06-18 10:17:55', 0.00),
(115, 'Joab257', '0798665544', '', '$2y$10$hMcg0tpwbpK9sC7qCBEWv.Cw4n/0KpwGSabOxZZPZaE5LyJGeABMG', '2024-06-18 10:23:24', 0.00),
(116, 'Joab257', '0798665544', '', '$2y$10$ZSrs.9.skiMASLpAIRHQf.WbBM53N5zkXedgjRvddRcvdvdhSjfaa', '2024-06-18 10:23:44', 0.00),
(117, 'Nelson', '0732323283', '', '$2y$10$aRZAeTEolchgImF/VQ88m.LkxQREWAFbJExbOCj8HUxGgtbs9JwRW', '2024-06-18 10:28:13', 0.00),
(118, 'Dennis', '0765435465', '', '$2y$10$NvW.w1zY0/A.nAt0xCVlgecLnY0g.dymYgKisMOLfrucj0HsxA/Xy', '2024-06-18 10:32:37', 0.00),
(119, 'Robie', '0756765434', '', '$2y$10$HIn07hHKva3oWBsoS8ULl.j/9A0C2/h4ltn48pESlYcwmikOXg/VW', '2024-06-18 11:01:06', 0.00),
(120, 'Robie', '0756765434', '', '$2y$10$aH5WLq/MrloSEuFfuD0dW.ipwlJRqLhtERfqgf3SzMOga7GCG/5j2', '2024-06-18 11:01:25', 0.00),
(121, 'Joab', '0754343546', '', '$2y$10$2xj2hzA2b7MszW04IdV7ueXiJ7eAmXNOalOGJ4AYj8uSiLXu0Kkyy', '2024-06-18 11:05:30', 0.00),
(122, 'Agnes254', '0765433456', '', '$2y$10$sUthKSVEYuDNzoorKdc45eOThBY0m/s9VEXTM4gG5kHTjMsFA7yzu', '2024-06-18 11:49:31', 0.00),
(123, 'Caroo', '0765434567', '', '$2y$10$nzagEJ9TX3TL7YGIHHXoC.wfQs2O2eyczfw8gjJ0iLfiJ2/ftx98a', '2024-06-18 13:46:51', 0.00),
(124, 'David ', '0745677364', '', '$2y$10$SAxRv2zsYH07mPid6mK5kOqOnVqvnzczBj5h9goAaTADREnYRZ8uW', '2024-06-18 17:47:19', 0.00),
(125, 'Amani', '0793594657', '', '$2y$10$jJNfWEM5re6N.wvSh6FIyebd7vlM1CVGLGVf5x0jBjVhMLv.fOjT.', '2024-06-19 07:44:55', 0.00),
(126, 'Brian21', '0754334565', '', '$2y$10$a5VZD.M2yjMDK9C5tOXbwO/UaooqoiJfPKuNqozhc85w3YrHBt3BW', '2024-06-19 07:54:22', 0.00),
(127, 'Lucie', '0756784765', '', '$2y$10$O9JXGDTJVXF65SfMD6F2O.WaxkrIZinaJ6vQf6gY9NgavlSlJQqKO', '2024-06-19 09:16:08', 0.00),
(128, 'BRENDA', '0745654332', '', '$2y$10$QogcQ4Xdr11qEHetvFk/4eOZjVdHr2Ypk6nswIFcu8yKyT.bUL6lO', '2024-06-19 11:22:27', 0.00),
(129, 'Boaz', '0765434546', '', '$2y$10$md3SgqtnK/iY/ZQc9NRKQe5FC33oFPBmxqjh/3zQ8/M0cln8wkHUe', '2024-06-19 11:24:09', 0.00),
(130, 'phylis', '0765432456', '', '$2y$10$A/zSQJL7O2sxdZ.ReJxuv.slf81gTbuwXtnKfDsC4z8zvR75A7Aty', '2024-06-19 11:25:02', 0.00),
(131, 'Mellisa', '0743434545', '', '$2y$10$1WgZY3lGKEPY7DhDv9cnR.V5DOvlylr61ssHFRaD1IWlLjpmE9I62', '2024-06-19 11:26:03', 0.00),
(132, 'Joshua', '0754465246', '', '$2y$10$F325mVrWqUQy4EU/D7IDzOiKf.qNbXTmX9BA0UQxiksUdJMk5c4kC', '2024-06-19 14:28:27', 0.00),
(133, 'Peniel', '0754345475', '', '$2y$10$qN1JGqjDziW76tT1chRTyutP5HDnPRc6jYup6udYJE7yUP2tttUqK', '2024-06-19 15:45:24', 0.00),
(134, 'Faith', '0754345678', '', '$2y$10$e1wt.YoHwk.xdW3RXGFkFON2Y2VK.iNoyuxVFr3DhiHvy8pYPhtGG', '2024-06-19 15:58:25', 0.00),
(135, 'steve', '0765432456', '', '$2y$10$nZh2Xth1OQysaPHj98xtzOSyRw8gGXFRtq7ocHQRM6Nwm3WsA.i/C', '2024-06-19 16:00:21', 0.00),
(136, 'ALICEKE', '0754345487', '', '$2y$10$G4oSNiexQABJizk7D88vCOH05Fi4pK29176kS3DFidSkuntSNjU..', '2024-06-19 16:01:11', 0.00),
(137, 'joab22', '0765643423', '', '$2y$10$fv2QjYR62OqR7R/WtY6DMucXbt1aJlA6j4qMy7e6TSLYlZvjRx1A6', '2024-06-19 16:03:22', 0.00),
(138, 'JOASH1', '0754323456', '', '$2y$10$A796UZuWncwLCNJxlrc28uNVuKd2c7t3g.JUk4N.o8yN0WqQWH8RK', '2024-06-19 16:10:02', 0.00),
(139, 'Amani254', '0765432345', '', '$2y$10$SsiqjDfdOuVtMVg1NqpRdOFDoDuNXHLw6AVwGbtNA9JywG7HxOIjm', '2024-06-19 16:48:02', 0.00),
(140, 'jedd', '0876564678', '', '$2y$10$rD6gD.FAwlyivzZNO58kZOTkCyB/tIPynqbXTtAbsYx5SBFNCniB6', '2024-06-19 17:00:36', 0.00),
(141, 'Jedz', '0765434354', '', '$2y$10$ynd0IFbicITRaYoP1wEBDeR2h3XSFJrvZrGJ7eSllQsxW4hIInh6S', '2024-06-19 17:08:08', 0.00),
(142, 'Filipo', '0765435467', '', '$2y$10$DokM63EQeKzMWFEUNTeo1uC6RYnolj0/i6yKfDUqVnI6wSvk1KKTO', '2024-06-19 17:29:07', 0.00),
(143, 'Ezekiel', '0765432456', '', '$2y$10$QRbfEEk6xKyEMm9S.r4YUu5KOV0MYYTDhHu8JidSRlqINt.h1L.W6', '2024-06-19 17:42:27', 0.00),
(144, 'David254', '0754345676', '', '$2y$10$j.ygayxxuUE3mPDpz69WNOXMBUhYRKs1JmixuPA6RlQMEzTlz1nze', '2024-06-19 17:55:43', 0.00),
(145, 'Brayoo', '0765434567', '', '$2y$10$tiQlLWzMItGscPi9sYPxcOSOcPHEUgiBFFSFHEA1uz2tYwd5EBrCe', '2024-06-19 18:01:15', 0.00),
(146, 'Forex22', '0743454443', '', '$2y$10$GgfExnKb9FeotNz6LtCi3uhfHx1Sg3rFIf2ISCOR5RIk3Tk5daAhm', '2024-06-19 20:52:46', 0.00),
(147, 'Tonny', '0765435456', '', '$2y$10$OUbU.jMukkNHgKdmm2RHjuYPTAKBR8gOzlt2Fn6zondfKOj5.yL/S', '2024-06-19 20:56:50', 0.00),
(148, 'Trizah', '0798765432', '', '$2y$10$bd8y5DB2sIslXLmgsYIEduHub3B3jSrUqjpEeZRSxdQBhWC9RdKiu', '2024-06-19 21:08:05', 0.00),
(149, 'Moses', '0764534546', '', '$2y$10$GKAKURDEyTEUj4HDv7gfuuv1WW/ek39eADsy.aKBGJOslCxnhjcsy', '2024-06-20 10:05:41', 0.00),
(150, 'Moses256', '0765434354', '', '$2y$10$dkEu/oWLHOhVydpDweZJTOQpY8jLH5l5flNhYQtWFBZvsrqY.wNbC', '2024-06-20 10:59:39', 0.00),
(151, 'Morris254', '0754323456', '', '$2y$10$wflW4NZhWTe8nUHiWAeYeu7EXeFsdMH.gzN3NipWjEK9HBBD0o6Uq', '2024-06-20 12:22:40', 0.00),
(152, 'Yusuf', '0754354676', '', '$2y$10$5AupXuA98BwPjBaeqezdOe6utdKH50PMxOg3mBqp9kyQRlP.v6Ibe', '2024-06-20 12:24:28', 0.00),
(153, 'David256', '0765434545', '', '$2y$10$hmVkk1JcgqNjRoCgx.PA7.BGk3nlXtC01HD8CUjcI86jl3Eq6iEW.', '2024-06-20 20:27:36', 0.00),
(154, 'ruth', '0754344567', '', '$2y$10$iAfZQWFnprSAVMzzwloX5O0XxxNuIGND0WGRBfji06ytulub1Fkny', '2024-06-20 23:09:33', 0.00),
(155, 'Velma254', '0745678777', '', '$2y$10$JtwePiIz0.cLYARUm.35Ke1nAE6CJ4fDzIVneWZfgsRac/UFAoTdK', '2024-06-22 05:42:21', 0.00),
(156, 'Joab234', '0765465566', '', '$2y$10$qB7Jz.LbqYIZSzOxQYD5E.dltdVfu8LPfZk5fZregFVaELhSVJrTK', '2024-06-25 00:41:31', 0.00),
(157, 'WafulaJoan', '0754345467', '', '$2y$10$XEQ2RUylPtVOS1OXQ0Os1eBNay27YYdlRIDrn/qpMQN7xto1awbLC', '2024-06-25 00:44:07', 0.00),
(158, 'Yoshie', '0754324356', '', '$2y$10$3ZLxem3oSXHV/5Kkx6fGJuBKaowRgqLWAffiZrncCNYy859XWQ4i2', '2024-06-25 00:58:38', 0.00),
(159, 'wamboo', '0754356756', '', '$2y$10$hZQGvHhTcdwMp4gt/TkshO70/ndFWVfp0nTR4Y5RL9QxBhvjKt8ea', '2024-06-25 01:18:09', 0.00),
(160, 'fidelis', '0765434567', '', '$2y$10$Pco5f74EB5LQ180JppjAmOfJZbANiRdNuDW0ZYHzbI5LfzogfoG6S', '2024-06-25 01:44:36', 0.00),
(161, 'wafjoab', '0765432345', '', '$2y$10$KR3unpcK.e2qztAJsnjL9Ohm0OhOdnzJzfseHM.lW7OZRcOT06F4O', '2024-06-25 01:46:34', 0.00),
(162, 'Waffjoab', '0767543565', '', '$2y$10$x0rd70Fr0t9ZlxMOhQWAQe3EazxEX5/zdVHjG2EXK7vNIeQhROeV6', '2024-06-25 01:48:28', 0.00),
(163, 'Elikanah', '0765456564', '', '$2y$10$U2s0o8qFZtkx.W8RYaP01e3jKlqGvIzjCfigpeFYd.pDeo8CkPKwy', '2024-06-25 02:14:39', 0.00),
(164, 'Dennis254', '0754333456', '', '$2y$10$gdv7gd2oC/YPSU4LEsYU0uyRUdLDMyJn7oRzJPxSUkUiJ4v9bm2oC', '2024-06-25 02:47:25', 0.00),
(165, 'Vayoo', '0763272367', '', '$2y$10$j5aFfkvfg11PwXFuYah11eeqk1mDinG9FAZxW4y2MyM2cbmnwSA9O', '2024-06-25 10:26:34', 0.00),
(166, 'Viginia', '0765432345', '', '$2y$10$nbIFRLFfGTRYFKhpvcGHx.wnAklUWjdBsKWuJZtZmKM2/cKuNqdG6', '2024-06-26 17:08:47', 0.00),
(167, 'Joabjob', '0754335456', '', '$2y$10$BZQDhgi.MQ72PxQDQxvbD.aGbLz2bmFM1UbezsF42OBviGjJ2e50S', '2024-06-27 20:58:41', 0.00),
(168, 'Halima', '0765432456', '', '$2y$10$xNOJbIVzJl2E2qQ2leeLl.9lDgJVf.rr/LPp0tyJUTT0UPVAPeDwy', '2024-06-28 01:22:38', 0.00),
(169, 'kenn', '0765453454', '', '$2y$10$hMUErXTK3KHoDcIqg1gTIODdxHdRZ81sZB/fo/AHokm3n7Fw9NtHG', '2024-06-28 01:38:34', 0.00),
(170, 'Samm', '0754343546', '', '$2y$10$i78N.ErJTTHvJA2cNalsG.8PVLMchkW8OdgZNDH8XmqORVRBV6ONm', '2024-06-28 01:41:21', 0.00),
(171, 'peter', '0765435467', '', '$2y$10$Ife3PAmTOJCt9Do./0FHfOSyYFS.hJztXIoX6jq./DEJrMY0Ays5a', '2024-06-28 02:06:42', 0.00),
(172, 'John2544', '0756432323', '', '$2y$10$XYZPgDrC/mc3SUWQVLsizuxMrDizHjIBZdiQZ68eeRFPegIjQ3aUa', '2024-06-28 02:09:52', 0.00),
(173, 'Gift', '0765432235', '', '$2y$10$6vMtrsFGI3qLGhz6Lju6V.L3ZIBYKT7xjxkUgS60H9XJOzg8fD4RS', '2024-06-29 12:54:21', 0.00),
(174, 'Joabb', '0765545470', '', '$2y$10$F9FRNBopWU4AnwEwqAQ2ZeEPQMvG74Fda3odxa0EEnYZ/7PM2oLOS', '2024-07-06 00:34:25', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_requested` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `withdrawals`
--

INSERT INTO `withdrawals` (`id`, `username`, `amount`, `phone_number`, `status`, `date_requested`) VALUES
(1, 'FAITH254', 500.00, '0798564677', 'Rejected', '2024-06-17 08:10:27'),
(2, 'FAITH254', 500.00, '0798564677', 'Rejected', '2024-06-17 08:11:26'),
(3, 'FAITH254', 500.00, '600', 'Rejected', '2024-06-17 08:21:34'),
(4, 'FAITH254', 600.00, '0776387980', 'Rejected', '2024-06-17 08:22:56'),
(5, 'FAITH254', 2000.00, '0793456765', 'Approved', '2024-06-17 08:23:39'),
(6, 'Joab254', 200.00, '0793456765', 'Approved', '2024-06-17 09:32:24'),
(7, 'Joab254', 200.00, '0793456765', 'Approved', '2024-06-17 09:32:53'),
(8, 'Joab254', 150.00, '0745678765', 'Approved', '2024-06-17 11:56:46'),
(9, 'Joab254', 150.00, '0745678765', 'Approved', '2024-06-17 12:02:40'),
(10, 'Joab254', 0.00, '', 'Approved', '2024-06-17 12:03:46'),
(11, 'Joab254', 200.00, '0756456765', 'Approved', '2024-06-17 12:04:28'),
(12, 'Joab254', 0.00, '', 'Approved', '2024-06-17 12:04:32'),
(13, 'Joab254', 300.00, '0767987545', 'Approved', '2024-06-17 14:36:08'),
(14, 'Wafula joab', 8000.00, '0795656640', 'Approved', '2024-06-18 02:36:14'),
(15, 'Wafula joab', 9000.00, '0738765454', 'Approved', '2024-06-18 03:11:00'),
(16, 'Wafula joab', 4000.00, '0738484848', 'Approved', '2024-06-18 03:40:23'),
(17, 'Wafula joab', 900.00, '0754535465', 'Approved', '2024-06-18 03:45:44'),
(18, 'Joab254', 5000.00, '0756543234', 'Approved', '2024-06-18 09:15:18'),
(19, 'Caroo', 150.00, '0753563565', 'Approved', '2024-06-18 12:57:42'),
(20, 'Caroo', 100.00, '0746646464', 'Approved', '2024-06-18 14:44:04'),
(21, 'David', 6000.00, '0764532345', 'Approved', '2024-06-18 14:58:30'),
(22, 'Trizah', 4000.00, '0776543234', 'Rejected', '2024-06-20 01:35:48'),
(23, 'Trizah', 60000.00, '0776543234', 'Approved', '2024-06-20 01:36:03'),
(24, 'Joab254', 5000.00, '0765643546', 'Approved', '2024-06-20 09:30:57'),
(25, 'Joab254', 4000.00, '0765434545', 'Approved', '2024-06-20 09:49:11'),
(26, 'Joab254', 60000.00, '0776543234', 'Approved', '2024-06-20 09:49:43'),
(27, 'Joab254', 5000.00, '0724546574', 'Approved', '2024-06-20 10:19:26'),
(28, 'Ruth', 5000.00, '0776543234', 'Approved', '2024-06-20 20:15:42'),
(29, 'Joab254', 3000.00, '0754678675', 'Approved', '2024-06-21 10:15:30'),
(30, 'Faith254', 500.00, '0754324569', 'Approved', '2024-06-21 18:25:04'),
(31, 'Faith254', 500.00, '0776543234', 'Rejected', '2024-06-21 18:30:18'),
(32, 'Faith254', 500.00, '0776543234', 'Pending', '2024-06-21 18:47:33'),
(33, 'Faith254', 5000.00, '0754324569', 'Approved', '2024-06-21 20:08:01'),
(34, 'Faith254', 500.00, '0745345543', 'Approved', '2024-06-21 20:20:23'),
(35, 'Faith254', 500.00, '0776543234', 'Approved', '2024-06-21 20:24:48'),
(36, 'Faith254', 100.00, '0776543234', 'Approved', '2024-06-21 20:25:01'),
(37, 'Faith254', 1000.00, '0745345543', 'Approved', '2024-06-21 20:26:28'),
(38, 'Caroo', 500.00, '0776543234', 'Approved', '2024-06-21 20:46:42'),
(39, 'Caroo', 500.00, '0745345543', 'Approved', '2024-06-21 22:01:34'),
(40, 'Caroo', 5000.00, '0765643546', 'Approved', '2024-06-21 22:01:43'),
(41, 'faith254', 6000.00, '0776543234', 'Approved', '2024-06-24 19:19:57'),
(42, 'Dennis254', 5000.00, '0776543234', 'Approved', '2024-06-24 23:51:41'),
(43, 'Dennis254', 5000.00, '0776543234', 'Approved', '2024-06-24 23:51:53'),
(44, 'Vayoo', 60000.00, '0776543234', 'Approved', '2024-06-25 07:33:19'),
(45, 'Vayoo', 500.00, '0765643546', 'Approved', '2024-06-25 07:33:35'),
(46, 'Vayoo', 4000.00, '0765434545', 'Approved', '2024-06-25 07:33:47'),
(47, 'Vayoo', 10000.00, '0776543234', 'Approved', '2024-06-25 07:33:59'),
(48, 'FAITH254', 500.00, '0776543234', 'Approved', '2024-06-27 17:56:47'),
(49, 'Joab254', 37000.00, '0745345543', 'Pending', '2024-06-27 23:21:01'),
(50, 'Gift', 500.00, '0745345543', 'Approved', '2024-06-29 09:59:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investments`
--
ALTER TABLE `investments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `investments`
--
ALTER TABLE `investments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

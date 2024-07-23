-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2024 at 04:09 PM
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
(125, 'Joab', 53000.00, 40000.00, 3000.00, 0.00, '2024-07-15 14:43:17'),
(136, 'Caroo', 59000.00, 52050.00, 5500.00, 0.00, '2024-06-18 14:58:06'),
(141, 'David', 92000.00, 86000.00, 0.00, 0.00, '2024-06-18 17:54:23'),
(145, 'Brayoo', 12000.00, 12000.00, 0.00, 0.00, '2024-06-19 18:06:22'),
(146, 'Trizah', 125000.00, 61000.00, 0.00, 0.00, '2024-06-20 04:30:25'),
(150, 'Moses', 50000.00, 50000.00, 0.00, 0.00, '2024-06-20 11:09:40'),
(151, 'Ruth', 50000.00, 45000.00, 0.00, 0.00, '2024-06-20 23:12:28'),
(157, 'Dennis254', 62000.00, 52000.00, 10000.00, 0.00, '2024-06-25 02:50:01'),
(159, 'Vayoo', 150000.00, 75500.00, 74500.00, 0.00, '2024-06-25 10:30:31'),
(162, 'Gift', 1000.00, 500.00, 500.00, 0.00, '2024-06-29 12:57:51'),
(165, 'Pablo', 12000.00, 500.00, 500.00, 0.00, '2024-07-14 16:31:02'),
(172, 'NoahMichael', 70000.00, 150000.00, 0.00, 0.00, '2024-07-18 14:39:19'),
(173, 'Wafula', 10000.00, 10000.00, 0.00, 0.00, '2024-07-20 07:04:56'),
(174, 'Mjoab', 70000.00, 0.00, 0.00, 0.00, NULL),
(175, 'Mjoabk', 2000.00, 1200.00, 800.00, 0.00, '2024-07-20 11:00:40'),
(176, 'Kasee', 2000.00, 2000.00, 0.00, 0.00, '2024-07-20 15:05:34'),
(177, 'fala', 4000.00, 4000.00, 0.00, 0.00, '2024-07-20 15:09:53'),
(178, 'JCaro', 30000.00, 0.00, 0.00, 0.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `token_expiry` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `reset_token`, `token_expiry`) VALUES
(33, 'ADMIN', '$2y$10$kvED9tlLrPyvpv1fotE0lur9o5..3Cvs1.4vMjYVtn9hS./Oz07Xu', NULL, NULL);

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
(87, 'Wafula joab', 'HGGDFSDUYT', 3000.00, 'Approved', '2024-06-18 01:55:35', '✔', '2024-06-18 04:55:35'),
(88, 'Wafula joab', 'TYTUHJUTRD', 50000.00, 'Approved', '2024-06-18 01:56:30', '✔', '2024-06-18 04:56:30'),
(89, 'Wafula joab', 'HGHJHKJJKO', 7000.00, 'Approved', '2024-06-18 01:57:43', '✔', '2024-06-18 04:57:43'),
(90, 'Wafula Joab', 'HGJKLJH7TF', 9000.00, 'Rejected', '2024-06-18 06:59:01', '❌', '2024-06-18 09:59:01'),
(91, 'Joab', 'OIUYYTFHG8', 10000.00, 'Approved', '2024-06-18 08:11:19', '✔', '2024-06-18 11:11:19'),
(92, 'Joab', 'ZXCVBNJHGF', 7000.00, 'Approved', '2024-06-18 08:12:15', '✔', '2024-06-18 11:12:15'),
(93, 'Joab', 'GHFGDDGHGF', 8000.00, 'Approved', '2024-06-18 08:12:58', '✔', '2024-06-18 11:12:58'),
(94, 'Joab', '4ERDTFYGUH', 6000.00, 'Rejected', '2024-06-18 08:16:09', '❌', '2024-06-18 11:16:09'),
(95, 'Joab', 'ZX5ERSDSFG', 4000.00, 'Approved', '2024-06-18 08:28:07', '✔', '2024-06-18 11:28:07'),
(96, 'Joab254', 'YTYRTHGJHK', 60000.00, 'Approved', '2024-06-18 09:11:32', '✔', '2024-06-18 12:11:32'),
(97, 'Joab254', 'KJHGFDSDFD', 3000.00, 'Approved', '2024-06-18 09:20:49', '✔', '2024-06-18 12:20:49'),
(98, 'Joab254', 'KHJGFGDFSR', 7000.00, 'Approved', '2024-06-18 09:51:33', '✔', '2024-06-18 12:51:33'),
(99, 'Joab254', 'ASJGHDJVHB', 3000.00, 'Approved', '2024-06-18 09:55:07', '✔', '2024-06-18 12:55:07'),
(100, 'Joab254', 'LJKJDLEJKE', 100000.00, 'Rejected', '2024-06-18 09:55:52', '❌', '2024-06-18 12:55:52'),
(101, 'Joab254', 'KJHJGHFGYT', 20000.00, 'Rejected', '2024-06-18 10:02:59', '❌', '2024-06-18 13:02:59'),
(102, 'Caroo', 'LKJHGHFGDG', 7000.00, 'Approved', '2024-06-18 11:24:04', '✔', '2024-06-18 14:24:04'),
(103, 'Caroo', 'KJHGHF4GHF', 600.00, 'Approved', '2024-06-18 11:25:10', '✔', '2024-06-18 14:25:10'),
(104, 'Caroo', 'SBVCHGJKLN', 700.00, 'Rejected', '2024-06-18 11:25:39', '❌', '2024-06-18 14:25:39'),
(105, 'Caroo', 'IHJGFGFHGJ', 700.00, 'Approved', '2024-06-18 11:26:26', '✔', '2024-06-18 14:26:26'),
(106, 'Caroo', 'RTGFHGJKJJ', 50000.00, 'Approved', '2024-06-18 11:27:05', '✔', '2024-06-18 14:27:05'),
(107, 'David', 'HSY7RUJHSH', 2000.00, 'Approved', '2024-06-18 14:49:07', '✔', '2024-06-18 17:49:07'),
(108, 'David', 'FERE5EADSF', 50000.00, 'Approved', '2024-06-18 14:49:42', '✔', '2024-06-18 17:49:42'),
(109, 'David', 'JSGS7SGHJH', 40000.00, 'Rejected', '2024-06-18 14:50:02', '❌', '2024-06-18 17:50:02'),
(110, 'Brian21', 'JKHJGFGH56', 2000.00, 'Approved', '2024-06-19 04:56:52', '✔', '2024-06-19 07:56:52'),
(111, 'Brayoo', 'KHJGFGDFSD', 12000.00, 'Rejected', '2024-06-19 15:05:05', '❌', '2024-06-19 18:05:05'),
(112, 'Trizah', 'HFGDTGUJH5', 5000.00, 'Rejected', '2024-06-20 01:22:25', '❌', '2024-06-20 04:22:25'),
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
(123, 'Dennis254', 'YTEDGFHCVU', 12000.00, 'Rejected', '2024-06-24 23:49:08', '❌', '2024-06-25 02:49:08'),
(124, 'Dennis254', 'JHGFGHGJHK', 50000.00, 'Approved', '2024-06-24 23:49:21', '✔', '2024-06-25 02:49:21'),
(125, 'Vayoo', 'YEHGHUHEUR', 100000.00, 'Approved', '2024-06-25 07:29:23', '✔', '2024-06-25 10:29:23'),
(126, 'Vayoo', 'UEIUFRUFJR', 50000.00, 'Approved', '2024-06-25 07:29:45', '✔', '2024-06-25 10:29:45'),
(127, 'wafulajoan', 'ZXCVBNYUTR', 1000.00, 'Approved', '2024-06-26 13:55:45', '✔', '2024-06-26 16:55:45'),
(128, 'Gift', 'UYTREWDSFH', 1000.00, 'Approved', '2024-06-29 09:57:08', '✔', '2024-06-29 12:57:08'),
(129, 'Joab', 'KJHGFGDFST', 4000.00, 'Approved', '2024-07-13 12:10:59', '✔', '2024-07-13 15:10:59'),
(130, 'Joab', 'IOUKJHQOIJ', 12000.00, 'Approved', '2024-07-14 11:23:32', '✔', '2024-07-14 14:23:32'),
(131, 'Pablo', 'OIYUTYRTER', 10000.00, 'Rejected', '2024-07-14 13:06:31', '❌', '2024-07-14 16:06:31'),
(132, 'Pablo', 'KJGHFDGFHG', 2000.00, 'Rejected', '2024-07-14 13:30:11', '❌', '2024-07-14 16:30:11'),
(133, 'Joab', 'LAUSDHNOIJ', 2000.00, 'Approved', '2024-07-15 11:20:33', '✔', '2024-07-15 14:20:33'),
(134, 'NoahMichael', '9UYIJWJDHU', 20000.00, 'Approved', '2024-07-16 07:02:03', '✔', '2024-07-16 10:02:03'),
(135, 'NoahMichael', '9UYIJWJDPO', 20000.00, 'Approved', '2024-07-16 07:04:21', '✔', '2024-07-16 10:04:21'),
(136, 'NoahMichael', 'SRTRYTUYIU', 20000.00, 'Approved', '2024-07-16 07:05:19', '✔', '2024-07-16 10:05:19'),
(137, 'NoahMichael', 'SRTRYTHJGH', 20000.00, 'Approved', '2024-07-16 07:05:46', '✔', '2024-07-16 10:05:46'),
(138, 'NoahMichael', 'IOUJGHFGJH', 70000.00, 'Approved', '2024-07-18 11:38:51', '✔', '2024-07-18 14:38:51'),
(139, 'Wafula', 'WKLJHJCBKE', 10000.00, 'Approved', '2024-07-20 04:04:02', '✔', '2024-07-20 07:04:02'),
(140, 'Mjoab', 'OIUYUTYRTD', 70000.00, 'Approved', '2024-07-20 06:34:42', '✔', '2024-07-20 09:34:42'),
(141, 'Mjoabk', 'KJHGHDSJHD', 2000.00, 'Approved', '2024-07-20 06:58:44', '✔', '2024-07-20 09:58:44'),
(142, 'Kasee', 'LKHJGFTUFY', 2000.00, 'Approved', '2024-07-20 12:03:44', '✔', '2024-07-20 15:03:44'),
(143, 'fala', 'OIYUTGHUIP', 4000.00, 'Approved', '2024-07-20 12:06:47', '✔', '2024-07-20 15:06:47'),
(144, 'JCaro', 'UEWHFJFLKJ', 30000.00, 'Approved', '2024-07-23 11:25:22', '✔', '2024-07-23 14:25:22');

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
(85, 'faith254', 1000.00, 'Matured', '2024-06-27 23:15:07', 0, 'Executive Package', 10, '2024-07-08', NULL),
(86, 'faith254', 0.00, 'Matured', '2024-06-28 17:22:27', 0, 'Bronze Package', 4, '2024-07-02', NULL),
(87, 'faith254', 0.00, 'Matured', '2024-06-28 17:46:07', 0, 'Silver Package', 3, '2024-07-01', NULL),
(88, 'Gift', 0.00, 'Matured', '2024-06-29 09:58:30', 0, 'Silver Package', 3, '2024-07-02', NULL),
(89, 'Joab', 10000.00, 'Active', '2024-07-13 12:21:15', 0, 'Executive Package', 10, '2024-07-23', NULL),
(90, 'Pablo', 5000.00, 'Active', '2024-07-14 13:08:07', 0, 'Executive Package', 10, '2024-07-24', NULL),
(91, 'Pablo', 2000.00, 'Matured', '2024-07-14 13:31:30', 0, 'Silver Package', 3, '2024-07-17', NULL),
(92, 'Pablo', 4000.00, 'Matured', '2024-07-14 13:31:42', 0, 'Gold Package', 6, '2024-07-20', NULL),
(93, 'NoahMichael', 6000.00, 'Matured', '2024-07-16 07:08:21', 0, 'Gold Package', 6, '2024-07-22', NULL),
(94, 'NoahMichael', 8000.00, 'Active', '2024-07-16 07:08:33', 0, 'Executive Package', 10, '2024-07-26', NULL),
(95, 'NoahMichael', 1000.00, 'Matured', '2024-07-16 12:39:56', 0, 'Bronze Package', 4, '2024-07-20', NULL),
(96, 'NoahMichael', 1000.00, 'Matured', '2024-07-16 12:40:14', 0, 'Silver Package', 3, '2024-07-19', NULL),
(97, 'NoahMichael', 1000.00, 'Matured', '2024-07-16 12:40:24', 0, 'Gold Package', 6, '2024-07-22', NULL),
(98, 'NoahMichael', 1000.00, 'Active', '2024-07-16 12:40:35', 0, 'Executive Package', 10, '2024-07-26', NULL);

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
(78, 123, 'joabb', 100.00, 'UIYUTUGIHO', '2024-07-05 21:34:47', 'activated'),
(79, 123, 'Pablo', 100.00, 'UYTYGJPIOY', '2024-07-14 13:04:32', 'activated'),
(80, 123, 'NoahMchael', 100.00, 'OIUUFGFHJH', '2024-07-15 14:48:33', 'activated'),
(81, 123, 'Wafula', 100.00, 'SKLXNJNCNL', '2024-07-20 03:34:17', 'activated'),
(82, 123, 'Carojj', 100.00, 'KHJGFGAHGJ', '2024-07-20 06:12:41', 'activated'),
(83, 123, 'Mjoab', 100.00, 'OIUYRFHGJK', '2024-07-20 06:33:45', 'activated'),
(84, 123, 'Mjoabk', 100.00, 'KJHJGDALFU', '2024-07-20 06:56:18', 'activated'),
(85, 123, 'Doggy', 100.00, 'KLJHAGHFDG', '2024-07-20 10:12:46', 'activated'),
(86, 123, 'JJOAB', 100.00, 'KJHGFAYUYU', '2024-07-20 11:02:45', 'activated'),
(87, 123, 'Fala', 100.00, 'KHJXKLNMWK', '2024-07-20 11:09:58', 'activated'),
(88, 123, 'UIIJJB', 100.00, 'KHJXKLNMWK', '2024-07-20 11:11:07', 'activated'),
(89, 123, 'Kasee', 100.00, 'LKJHASHBID', '2024-07-20 11:14:44', ''),
(90, 123, 'Kasee', 100.00, 'LKJHASHBID', '2024-07-20 11:47:33', 'activated'),
(91, 123, 'Joab', 100.00, 'KLSJXNJSNA', '2024-07-21 18:39:04', ''),
(92, 123, 'Joab', 100.00, 'HUGCUUWEHO', '2024-07-22 13:40:29', 'activated'),
(93, 123, 'JCaro', 100.00, 'IYUWQHDJIJ', '2024-07-23 11:22:25', 'activated');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_time` datetime DEFAULT current_timestamp(),
  `account_status` enum('Active','Inactive') NOT NULL DEFAULT 'Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `phone_number`, `password`, `registration_time`, `account_status`) VALUES
(4, 'Joab', '0754526157', '$2y$10$.4RBwXbPWgLK8fjLGoO5VujtsbxwUtuUBgLydmdOSnL69qsvFbWzu', '2024-07-22 16:40:09', 'Active');

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
(1, 'FAITH254', 500.00, '0798564677', 'Approved', '2024-06-17 08:10:27'),
(2, 'FAITH254', 500.00, '0798564677', 'Approved', '2024-06-17 08:11:26'),
(3, 'FAITH254', 500.00, '600', 'Approved', '2024-06-17 08:21:34'),
(4, 'FAITH254', 600.00, '0776387980', 'Approved', '2024-06-17 08:22:56'),
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
(22, 'Trizah', 4000.00, '0776543234', 'Approved', '2024-06-20 01:35:48'),
(23, 'Trizah', 60000.00, '0776543234', 'Approved', '2024-06-20 01:36:03'),
(24, 'Joab254', 5000.00, '0765643546', 'Approved', '2024-06-20 09:30:57'),
(25, 'Joab254', 4000.00, '0765434545', 'Approved', '2024-06-20 09:49:11'),
(26, 'Joab254', 60000.00, '0776543234', 'Approved', '2024-06-20 09:49:43'),
(27, 'Joab254', 5000.00, '0724546574', 'Approved', '2024-06-20 10:19:26'),
(28, 'Ruth', 5000.00, '0776543234', 'Approved', '2024-06-20 20:15:42'),
(29, 'Joab254', 3000.00, '0754678675', 'Approved', '2024-06-21 10:15:30'),
(30, 'Faith254', 500.00, '0754324569', 'Approved', '2024-06-21 18:25:04'),
(31, 'Faith254', 500.00, '0776543234', 'Approved', '2024-06-21 18:30:18'),
(32, 'Faith254', 500.00, '0776543234', 'Approved', '2024-06-21 18:47:33'),
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
(49, 'Joab254', 37000.00, '0745345543', 'Approved', '2024-06-27 23:21:01'),
(50, 'Gift', 500.00, '0745345543', 'Rejected', '2024-06-29 09:59:53'),
(51, 'Joab', 1000.00, '1000', 'Approved', '2024-07-13 10:41:28'),
(52, 'Pablo', 500.00, '0765434546', 'Approved', '2024-07-14 13:32:42'),
(53, 'Joab', 2000.00, '0766451246', 'Approved', '2024-07-15 11:24:32'),
(54, 'Mjoabk', 800.00, '0765435675', 'Approved', '2024-07-20 08:23:21');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `investments`
--
ALTER TABLE `investments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

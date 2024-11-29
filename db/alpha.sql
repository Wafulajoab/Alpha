-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2024 at 01:18 PM
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
  `lastDepositUpdate` datetime DEFAULT NULL,
  `referralsEarnings` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `totalDepositsBalance`, `accountBalance`, `totalWithdrawn`, `lastDepositUpdate`, `referralsEarnings`) VALUES
(113, 'Joab254', 274100.00, 800.00, 37000.00, '2024-06-21 08:59:40', 0.00),
(116, 'Faith254', 43000.00, 39800.00, 6500.00, '2024-06-26 16:11:06', 0.00),
(119, 'Wafula joab', 78000.00, 46100.00, 0.00, '2024-06-22 02:28:33', 0.00),
(125, 'Joab', 67000.00, 17000.00, 23000.00, '2024-10-21 14:23:38', 0.00),
(136, 'Caroo', 59000.00, 52050.00, 5500.00, '2024-06-18 14:58:06', 0.00),
(141, 'David', 92000.00, 86000.00, 0.00, '2024-06-18 17:54:23', 0.00),
(145, 'Brayoo', 12000.00, 12000.00, 0.00, '2024-06-19 18:06:22', 0.00),
(146, 'Trizah', 125000.00, 61000.00, 0.00, '2024-06-20 04:30:25', 0.00),
(150, 'Moses', 50000.00, 50000.00, 0.00, '2024-06-20 11:09:40', 0.00),
(151, 'Ruth', 50000.00, 45000.00, 0.00, '2024-06-20 23:12:28', 0.00),
(157, 'Dennis254', 62000.00, 52000.00, 10000.00, '2024-06-25 02:50:01', 0.00),
(159, 'Vayoo', 150000.00, 75500.00, 74500.00, '2024-06-25 10:30:31', 0.00),
(162, 'Gift', 1000.00, 500.00, 500.00, '2024-06-29 12:57:51', 0.00),
(165, 'Pablo', 12000.00, 500.00, 500.00, '2024-07-14 16:31:02', 0.00),
(172, 'NoahMichael', 70000.00, 150000.00, 0.00, '2024-07-18 14:39:19', 0.00),
(173, 'Wafula', 10000.00, 10000.00, 0.00, '2024-07-20 07:04:56', 0.00),
(174, 'Mjoab', 70000.00, 70000.00, 0.00, '2024-07-24 12:35:14', 0.00),
(175, 'Mjoabk', 2000.00, 1200.00, 800.00, '2024-07-20 11:00:40', 0.00),
(176, 'Kasee', 2000.00, 2000.00, 0.00, '2024-07-20 15:05:34', 0.00),
(177, 'fala', 4000.00, 4000.00, 0.00, '2024-07-20 15:09:53', 0.00),
(178, 'JCaro', 30000.00, 30000.00, 0.00, '2024-07-23 17:23:04', 0.00),
(179, 'Kenn', 10000.00, 5000.00, 0.00, '2024-07-24 16:41:56', 0.00),
(180, 'DennoMigz', 30000.00, 18000.00, 5000.00, '2024-07-30 16:49:27', 0.00),
(181, 'Domie', 10000.00, 2500.00, 4000.00, '2024-07-30 17:02:15', 0.00),
(183, 'Juma', 20000.00, 10000.00, 5000.00, '2024-09-07 18:26:07', 0.00),
(185, 'Joabjob', 30000.00, 20500.00, 6500.00, '2024-09-23 15:37:57', 0.00),
(186, 'Mashujaa', 30000.00, 13000.00, 6000.00, '2024-10-20 12:18:20', 0.00),
(187, 'Dennomigz254', 20000.00, 17000.00, 1000.00, '2024-11-02 13:38:42', 0.00),
(188, 'Trader', 50000.00, 8500.00, 38500.00, '2024-11-29 08:40:11', 0.00),
(189, 'Ezra', 12000.00, 12000.00, 0.00, '2024-11-29 10:43:10', 0.00);

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
(144, 'JCaro', 'UEWHFJFLKJ', 30000.00, 'Approved', '2024-07-23 11:25:22', '✔', '2024-07-23 14:25:22'),
(145, 'Kenn', 'KHJAJHBKJH', 10000.00, 'Approved', '2024-07-24 13:41:15', '✔', '2024-07-24 16:41:15'),
(146, 'DennoMigz', 'UIYHWKEFJW', 30000.00, 'Approved', '2024-07-30 13:48:53', '✔', '2024-07-30 16:48:53'),
(147, 'Domie', 'JKHGFSAGJH', 10000.00, 'Approved', '2024-07-30 14:01:34', '✔', '2024-07-30 17:01:34'),
(148, 'Joab', 'JHGFSHGAFT', 12000.00, 'Rejected', '2024-09-07 15:19:55', '❌', '2024-09-07 18:19:55'),
(149, 'Juma', 'JKHJGHFGAH', 20000.00, 'Approved', '2024-09-07 15:24:58', '✔', '2024-09-07 18:24:58'),
(150, 'Joab', 'JHGHKJSLKG', 2000.00, 'Approved', '2024-09-18 16:59:40', '✔', '2024-09-18 19:59:40'),
(151, 'Joabjob', 'XXWDWQDXWS', 30000.00, 'Approved', '2024-09-23 12:37:11', '✔', '2024-09-23 15:37:11'),
(152, 'Mashujaa', 'YTREDGFHJH', 30000.00, 'Approved', '2024-10-20 09:16:19', '✔', '2024-10-20 12:16:19'),
(153, 'Dennomigz254', 'UIYTFHGJH2', 20000.00, 'Approved', '2024-11-02 10:38:03', '✔', '2024-11-02 13:38:03'),
(154, 'Trader', '6TRDFDGFHG', 50000.00, 'Approved', '2024-11-28 19:53:16', '✔', '2024-11-28 22:53:16'),
(155, 'Ezra', '8YUGJGKHJG', 12000.00, 'Approved', '2024-11-29 07:23:21', '✔', '2024-11-29 10:23:21');

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
(89, 'Joab', 0.00, 'Matured', '2024-07-13 12:21:15', 0, 'Executive Package', 10, '2024-07-23', NULL),
(90, 'Pablo', 5000.00, 'Matured', '2024-07-14 13:08:07', 0, 'Executive Package', 10, '2024-07-24', NULL),
(91, 'Pablo', 2000.00, 'Matured', '2024-07-14 13:31:30', 0, 'Silver Package', 3, '2024-07-17', NULL),
(92, 'Pablo', 4000.00, 'Matured', '2024-07-14 13:31:42', 0, 'Gold Package', 6, '2024-07-20', NULL),
(93, 'NoahMichael', 6000.00, 'Matured', '2024-07-16 07:08:21', 0, 'Gold Package', 6, '2024-07-22', NULL),
(94, 'NoahMichael', 8000.00, 'Matured', '2024-07-16 07:08:33', 0, 'Executive Package', 10, '2024-07-26', NULL),
(95, 'NoahMichael', 1000.00, 'Matured', '2024-07-16 12:39:56', 0, 'Bronze Package', 4, '2024-07-20', NULL),
(96, 'NoahMichael', 1000.00, 'Matured', '2024-07-16 12:40:14', 0, 'Silver Package', 3, '2024-07-19', NULL),
(97, 'NoahMichael', 1000.00, 'Matured', '2024-07-16 12:40:24', 0, 'Gold Package', 6, '2024-07-22', NULL),
(98, 'NoahMichael', 1000.00, 'Matured', '2024-07-16 12:40:35', 0, 'Executive Package', 10, '2024-07-26', NULL),
(99, 'Kenn', 5000.00, 'Matured', '2024-07-24 13:42:11', 0, 'Bronze Package', 4, '2024-07-28', NULL),
(100, 'JOAB', 0.00, 'Matured', '2024-07-26 03:24:36', 0, 'Silver Package', 3, '2024-07-29', NULL),
(101, 'DennoMigz', 3000.00, 'Matured', '2024-07-30 13:49:49', 0, 'Bronze Package', 4, '2024-08-03', NULL),
(102, 'DennoMigz', 1000.00, 'Matured', '2024-07-30 13:49:57', 0, 'Executive Package', 10, '2024-08-09', NULL),
(103, 'DennoMigz', 3000.00, 'Matured', '2024-07-30 13:50:12', 0, 'Gold Package', 6, '2024-08-05', NULL),
(104, 'Domie', 3000.00, 'Matured', '2024-07-30 14:02:40', 0, 'gold Package', 6, '2024-08-05', NULL),
(105, 'Domie', 500.00, 'Matured', '2024-07-30 14:03:05', 0, 'Silver Package', 3, '2024-08-02', NULL),
(106, 'Juma', 5000.00, 'Matured', '2024-09-07 15:26:55', 0, 'Executive Package', 10, '2024-09-17', NULL),
(107, 'Joabjob', 3000.00, 'Matured', '2024-09-23 12:38:14', 0, 'Silver Package', 3, '2024-09-26', NULL),
(108, 'Mashujaa', 1000.00, 'Matured', '2024-10-20 09:18:32', 0, 'Silver Package', 3, '2024-10-23', NULL),
(109, 'Mashujaa', 3000.00, 'Matured', '2024-10-21 00:33:00', 0, 'Bronze Package', 4, '2024-10-25', NULL),
(110, 'Mashujaa', 3000.00, 'Matured', '2024-10-21 00:33:14', 0, 'Gold Package', 6, '2024-10-27', NULL),
(111, 'Mashujaa', 1000.00, 'Matured', '2024-10-21 00:33:22', 0, 'Gold Package', 6, '2024-10-27', NULL),
(112, 'Mashujaa', 3000.00, 'Matured', '2024-10-21 00:33:30', 0, 'Executive Package', 10, '2024-10-31', NULL),
(113, 'Dennomigz254', 2000.00, 'Matured', '2024-11-02 10:39:13', 0, 'Silver Package', 3, '2024-11-05', NULL),
(114, 'Trader', 3000.00, 'Active', '2024-11-29 06:10:16', 0, 'Silver Package', 3, '2024-12-02', NULL),
(115, 'Joab', 1000.00, 'Active', '2024-11-29 10:50:24', 0, 'Executive Package', 10, '2024-12-09', NULL),
(116, 'Joab', 5000.00, 'Active', '2024-11-29 10:50:48', 0, 'Silver Package', 3, '2024-12-02', NULL),
(117, 'Joab', 5000.00, 'Active', '2024-11-29 10:51:14', 0, 'Gold Package', 6, '2024-12-05', NULL),
(118, 'Joab', 4000.00, 'Active', '2024-11-29 10:51:30', 0, 'Bronze Package', 4, '2024-12-03', NULL);

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
  `upline_username` varchar(255) NOT NULL,
  `referred_username` varchar(255) NOT NULL,
  `status` enum('pending','active','inactive') DEFAULT 'pending',
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
(93, 123, 'JCaro', 100.00, 'IYUWQHDJIJ', '2024-07-23 11:22:25', 'activated'),
(94, 123, 'Wafula', 100.00, 'KHJGJJKHFR', '2024-07-23 14:51:25', 'activated'),
(95, 123, 'Mjoab', 100.00, 'KJSHDLJCLK', '2024-07-24 09:34:30', 'activated'),
(96, 123, 'Amos', 100.00, 'IUIYJGAHJK', '2024-07-24 12:37:39', 'activated'),
(97, 123, 'Dann', 100.00, '98UYGHJKLK', '2024-07-24 12:39:36', 'activated'),
(98, 123, 'Bonny', 100.00, 'ZXCVJUYRTU', '2024-07-24 13:06:30', 'activated'),
(99, 123, 'Jane', 100.00, 'LJKHJAGSKD', '2024-07-24 13:08:22', 'activated'),
(100, 123, 'Kenn', 100.00, 'JKDHJDNLDN', '2024-07-24 13:37:56', 'activated'),
(101, 123, 'Clem', 100.00, 'KHDSDHDJDK', '2024-07-24 14:20:12', 'activated'),
(102, 123, 'Waff', 100.00, 'JHADLCKJHL', '2024-07-25 06:45:35', 'activated'),
(103, 123, 'juuu', 100.00, 'XCVBNKLJKH', '2024-07-26 05:16:37', 'activated'),
(104, 123, 'jooo', 100.00, 'FGJHKHJGJG', '2024-07-26 05:17:29', 'activated'),
(105, 123, 'joou', 100.00, 'FGHJKHGJFH', '2024-07-26 05:17:57', 'activated'),
(106, 123, 'DennoMigz', 100.00, 'JGSDJGKJHF', '2024-07-30 13:47:32', 'activated'),
(107, 123, 'Domie', 100.00, 'KHGFDSFHGA', '2024-07-30 13:59:43', 'activated'),
(108, 123, 'Juma', 100.00, 'JHGFDGAHDJ', '2024-09-07 15:24:06', 'activated'),
(109, 123, 'Joabjob', 100.00, 'KDHJAHKHAN', '2024-09-23 12:20:06', 'activated'),
(110, 123, 'Mashujaa', 100.00, 'KSHKJFLKEM', '2024-10-20 08:58:37', 'activated'),
(111, 123, 'jeff', 100.00, 'YTREDGFHJH', '2024-10-21 02:16:42', 'activated'),
(112, 123, 'Joas', 100.00, 'IUYTYFHGJH', '2024-10-21 11:52:20', 'activated'),
(113, 123, 'Joasl', 100.00, 'IUYTYFHGJH', '2024-10-21 11:52:29', 'activated'),
(114, 37, 'vayo', 100.00, 'KJGHFGADFG', '2024-10-21 11:59:49', 'activated'),
(115, 37, 'vayo', 100.00, 'KJGHFGADFG', '2024-10-21 12:00:18', 'activated'),
(116, 37, 'Vayo', 100.00, 'OJGHFHJDHK', '2024-10-21 12:04:13', 'activated'),
(117, 4, 'Joab', 100.00, 'JKHGFSASSF', '2024-10-21 12:10:42', 'activated'),
(118, 4, 'joab', 100.00, 'LKJGHFDFSF', '2024-10-21 12:12:25', 'activated'),
(119, 38, 'DennoMigz254', 100.00, 'JGHFHDVJ2H', '2024-11-02 10:36:09', 'activated'),
(120, 39, 'Trader', 100.00, 'LKJHFJMK40', '2024-11-28 19:25:59', 'activated'),
(121, 40, 'Valentine', 100.00, 'L8YUGHJHKJ', '2024-11-29 06:14:42', 'activated'),
(122, 42, 'eva254', 100.00, '8UGJSHKJJQ', '2024-11-29 06:22:22', 'activated'),
(123, 43, 'Nalo', 100.00, '8YUFGCVBKL', '2024-11-29 06:29:18', 'activated'),
(124, 44, 'Bado', 100.00, '9UIYGHDJHJ', '2024-11-29 06:31:09', 'activated'),
(125, 45, 'Willy', 100.00, '8YUGHFHAJH', '2024-11-29 06:35:07', 'activated'),
(126, 46, 'Naomi', 100.00, '9UUGGHGSHJ', '2024-11-29 06:38:31', 'activated'),
(127, 47, 'Paulo', 100.00, '6TRFGAHJKJ', '2024-11-29 06:39:28', 'activated'),
(128, 48, 'pauloo', 100.00, '9UYGFVBJKJ', '2024-11-29 06:40:30', 'activated'),
(129, 49, 'Johnny', 100.00, '6TGJSHAJHG', '2024-11-29 06:45:27', 'activated'),
(130, 50, 'Pauline', 100.00, '43RFDBFBDD', '2024-11-29 06:47:20', 'activated'),
(131, 51, 'Anita', 100.00, '7YGHJHKJAJ', '2024-11-29 06:50:29', 'activated'),
(132, 52, 'Ezra', 100.00, '67TYFHSGJK', '2024-11-29 06:52:00', 'activated'),
(133, 53, 'Precious', 100.00, '33REMFNBRF', '2024-11-29 06:58:23', 'activated'),
(134, 54, 'Brenda', 100.00, '7AUSYIUIUD', '2024-11-29 10:12:46', 'activated'),
(135, 55, 'brocode', 100.00, '3WEDSVBNBG', '2024-11-29 10:14:39', 'activated'),
(136, 56, 'bowny', 100.00, '78TYFHGJLD', '2024-11-29 10:18:14', ''),
(137, 57, 'Belinda', 100.00, '24FHRKJFLK', '2024-11-29 10:21:49', 'activated'),
(138, 58, 'Evans', 100.00, '56YAFHGJHJ', '2024-11-29 11:28:35', 'activated');

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
  `account_status` enum('Active','Inactive') NOT NULL DEFAULT 'Inactive',
  `upline_username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `phone_number`, `password`, `registration_time`, `account_status`, `upline_username`) VALUES
(4, 'Joab', '0754526157', '$2y$10$.4RBwXbPWgLK8fjLGoO5VujtsbxwUtuUBgLydmdOSnL69qsvFbWzu', '2024-07-22 16:40:09', 'Active', NULL),
(6, 'Wafula', '0745653715', '$2y$10$By9DM6Vub8.vI/e1hUVYzuCHKj8F/YutAj8YnjyRZ2ieU2f.oKr/G', '2024-07-23 17:44:50', 'Active', 'Joab'),
(7, 'Kennedy', '0754132653', '$2y$10$ccA77uEZQDONg7IoaEZRm.hAxcA7kiqJNTwsqv6Tj5W303q5Hwgeq', '2024-07-23 17:46:16', 'Inactive', 'Joab'),
(9, 'Faith', '0742354645', '$2y$10$1t0754I0qSv.t821oyNBHuO9EQzzsmdK7t6DpKQSlbKz5AqwnFv42', '2024-07-23 17:51:03', 'Inactive', 'wafula'),
(10, 'Mjoab', '0765623232', 'zxcvbm', '2024-07-24 12:34:10', 'Active', 'Joab'),
(11, 'Amos', '0765356787', '$2y$10$57CLK3QbEXVtH9BMs1LErux.p7Ca/NJteZPPALdEPJFTf7cFrcLXi', '2024-07-24 15:37:20', 'Active', 'Joab'),
(12, 'Amos', '0765356787', '$2y$10$J//Y4qYMwlIQOAMZb4ekm.sWl7bsvt5AwID3NoAm47bSLaBz9Eo2S', '2024-07-24 15:37:20', 'Active', 'Joab'),
(13, 'dann', '0765323585', '$2y$10$wxawit1ShkFSlZxRkx3t.O9yspneW.EKtYB/MihqZmwJMaPjIhsUa', '2024-07-24 15:39:19', 'Active', 'Joab'),
(14, 'Bonny', '0765356535', '$2y$10$1vQHSy14SmG3YllAGqJ13OFnbBwB9DjcZQ98Ez7oBM36SSRrHmvei', '2024-07-24 16:06:10', 'Active', 'Joab'),
(15, 'Jane', '0755323567', '$2y$10$BSK5J2Aog/viEv/rCbkc5eo3ANFXMIk5gWsFi/8p0iugw8N4Ow1f.', '2024-07-24 16:08:09', 'Active', 'faith'),
(16, 'Kenn', '0767563678', '$2y$10$.2Li8EgxMING1JHXzfJyX.H25gWlgzlx4Q7JtFkU.MgYBdsCFpPb2', '2024-07-24 16:36:24', 'Active', 'Joab'),
(17, 'Clemoo', '0755356575', '$2y$10$KlxBzJrDc6CaK3wspFIcAecuP.EuUoeosKIFTjRSxT3WozlkN/xQS', '2024-07-24 17:15:57', 'Inactive', NULL),
(18, 'Clem', '0755356575', '$2y$10$icBXtIWV.un7dHAuNZRiyO1FPyECk2SINH1MrnzGXSusV5Tlz6xBy', '2024-07-24 17:19:57', 'Active', 'joab'),
(19, 'Waff', '0765654657', '$2y$10$PKgRAajnLUwNIKD1nZpc4e23lSuFPlIHKC.OpnKZwc4P181hRKFqK', '2024-07-25 09:45:15', 'Active', 'joab'),
(20, 'juuu', '0765321235', '$2y$10$NfS8MY2u92HNwjMQ0M17jeeGEPctRcWKJjvC07Nhk7ENoL4Z6nCQC', '2024-07-26 08:14:41', 'Active', 'joab'),
(21, 'jooo', '0753235676', '$2y$10$CR0hm7DSih.oPvKceF9U3.ztaSr3QIeOh1sm7MGoXWpdAzwY9ehhG', '2024-07-26 08:17:15', 'Active', 'joab'),
(22, 'joou', '0753235670', '$2y$10$rg4VKsJ9TZ8NgYAjDXKysOtJ1vu/uQp74AupyF/VO2JD/NLAmL3ny', '2024-07-26 08:17:44', 'Active', 'joab'),
(23, 'DennoMigz', '0753356535', '$2y$10$PdwYrBvCs8adkoTScuwuE.EFn/xZ8NvPLdQy3oSSPT3VOeIcim9bi', '2024-07-30 16:47:10', 'Active', 'Joab'),
(24, 'Domie', '0732356787', '$2y$10$kqBRIDyWlraoMvl13Q2oL.J9.F68CE.BD4ZsZAvI4M9T0qKinTZJy', '2024-07-30 16:59:03', 'Active', 'DennoMigz'),
(25, 'Juma', '0752416554', '$2y$10$Aw2lzet76zqcwbqb3clmuu0DHSvRG46AX28jnOCTY6u7/etur6aAq', '2024-09-07 18:23:20', 'Active', 'Joab'),
(26, 'Joabjob', '0767563687', '$2y$10$z1aOwUnyWhlKrcyRxJzseebp4wJysCrzldB2fzVCQcRcGnapotNIS', '2024-09-23 15:19:53', 'Active', 'joab'),
(27, 'Mashujaa', '0797138798', '$2y$10$J7KainnFJ1Rx0T96pG92nOW1bgBuGYDbukgwEA.PpYnB5ZUwrqs3K', '2024-10-20 11:58:14', 'Active', 'joab'),
(29, 'Jona', '0756434546', '$2y$10$7kSwveDSbSVWCq17zuhNl.Oh9CGHyXq0Wuukg5HnbMS4PdknaXmQu', '2024-10-21 14:27:37', 'Active', 'joab'),
(30, 'Jona', '0756434546', '$2y$10$R2yPOEA2ftS7aKjyyh3aZOgW7mlHnQbC0GCP7d0f/rES5j16WVIb2', '2024-10-21 14:27:38', 'Inactive', 'joab'),
(31, 'jonh', '0756423654', '$2y$10$.MzF5/0R8dI1o4brd4SrcupTOFo2zRC.8GvfquylCJSQRfJvO.om6', '2024-10-21 14:28:34', 'Inactive', 'joab'),
(32, 'joyo', '0765643435', '$2y$10$a37ubTgwPVKGJG2ZnsMPjeU5LIHyiVfdUNRAvknP5fDzP83C6iOwu', '2024-10-21 14:35:58', 'Inactive', 'joab'),
(33, 'joably', '0765434435', '$2y$10$BJ.Sr.twrnyhg7ZYqkEOlO664d0AOVrAepp8Wksi5QKCFhfi8pNYm', '2024-10-21 14:41:15', 'Inactive', 'joab'),
(34, 'faithj', '0765643456', '$2y$10$x8jjCyL9q74b7rz.aTxhJOG5.PdPYjLxSyvZJ7gqCpVriGE2N82BW', '2024-10-21 14:45:46', 'Inactive', 'joab'),
(35, 'kevo', '0754344546', '$2y$10$8MiODou.MyfV1StSO/lpYeXrl73rEGp9WC8gc19NM3iUfXzqwA7sm', '2024-10-21 14:48:14', 'Inactive', 'Joab'),
(36, 'joas', '0765534243', '$2y$10$dc.lHwAzUXlITiDZRYPloeXXjeAzygzCfQRUd5GEG1yMrSTs2bjhm', '2024-10-21 14:50:59', 'Active', 'joab'),
(37, 'vayo', '0754345464', '$2y$10$YNfi0Ge2ruXLmsKvuahy3etPEsfBR2tTP.hC2IQGjGfB2au1wzxfq', '2024-10-21 14:59:18', 'Active', 'joab'),
(38, 'Dennomigz254', '0753456898', '$2y$10$ZkS3Gg0EwWw18uQlF4I19eMJLBOGS/e7IkQTnZCozilKqszImO9hK', '2024-11-02 13:35:38', 'Active', 'Joab'),
(39, 'Trader', '0798765566', '$2y$10$HYtmhUYmPsBhKTsVeYYuu.w/UNfcfq7NOlWscJKY7SLCSc2b4rtkq', '2024-11-28 22:25:41', 'Active', 'Joab'),
(40, 'Valentine', '0798654456', '$2y$10$.ebcxE00t7uUx73Fri6ateZ8wpQiDuKLgdXOHy4eayQ4raSNxb2bq', '2024-11-29 09:14:20', 'Active', 'Trader'),
(41, 'Valentines', '0765434566', '$2y$10$/HfnSQXVFgDwRWFGFL1tWe62CSw7S33tJE0uUpoKVrv37b2FAx5CO', '2024-11-29 09:20:47', 'Inactive', 'Trader'),
(42, 'Eva254', '0746672663', '$2y$10$fDdxugBMcfJMNogAGjq62eqqsPDhCehyewRDFRSMn8RSY/Guy16kS', '2024-11-29 09:22:07', 'Active', 'trader'),
(43, 'Nalo', '0798654323', '$2y$10$8J0sXkNtARpj1c/mbTQbkOU5DwXJO44iGF/gA9OV3SguZ8KEMylky', '2024-11-29 09:29:00', 'Active', 'trader'),
(44, 'Bado', '0789876567', '$2y$10$2VoL2tym9u.9oaAW3ybJdOIB7913eSSZ3aqNFE1yTcMfrnKPznfGG', '2024-11-29 09:30:49', 'Active', 'Trader'),
(45, 'Willy', '0798765567', '$2y$10$I97KrOAu5EolUNFah037aOeKuwX26Via9aGTwkwTpRnSn63r8ZNky', '2024-11-29 09:33:08', 'Active', 'Trader'),
(46, 'Naomi', '0789654456', '$2y$10$s3l9WH1dnBER5eGv4nNQwuo2wiXnYATP73CdxQIQZpPG3tcBuaad6', '2024-11-29 09:38:15', 'Active', 'Trader'),
(47, 'paulo', '0789876545', '$2y$10$EwgvSF3rucysWj.LJROqou8ZZhTQArdgygV8cB0Xq0KdAagg5OcAq', '2024-11-29 09:39:10', 'Active', 'trader'),
(48, 'pauloo', '0789876545', '$2y$10$uxX.w7VADOxbcH9ouDbWT.BH93Vz/DNw2K.90i/0pReS.M.dXcGvm', '2024-11-29 09:40:17', 'Active', 'trader'),
(49, 'Johnny', '0789384559', '$2y$10$0xv443DEebbKPGnsifg0WOAJwtqinJVQLsJgggq/97Rkk83BbJ9he', '2024-11-29 09:45:07', 'Active', 'trader'),
(50, 'Pauline', '0789822487', '$2y$10$lWrD13V6AAb4S44s/vRyROJlKwNjRtNXWlIDCYXejvHQKQ8LOAkYm', '2024-11-29 09:46:54', 'Active', 'trader'),
(51, 'Anita', '0789826368', '$2y$10$9Cn9gmMIz8VfU2SrjcmfoelvNnqXGrpekmnsjopGRksGlb/pAMnsO', '2024-11-29 09:49:59', 'Active', 'trader'),
(52, 'Ezra', '0764689848', '$2y$10$PhasaeYV9I0Ka6efVB89I.03xxw9PGi5w1b6ZUfs/9tt2d10Y16jG', '2024-11-29 09:51:44', 'Active', 'Trader'),
(53, 'Precious', '0789656566', '$2y$10$7FlaWncmrWWpdHIqt1Hbw.6Um2QYp8V1NYIqcnCOxXnd6isMqtHQa', '2024-11-29 09:58:03', 'Active', 'Trader'),
(54, 'Brenda', '0783286424', '$2y$10$ySrwDF/JaX8q4iErgGP.MO.IoMw2l.hQCANYq9Jj/uT/4gk0OrVCe', '2024-11-29 13:12:20', 'Active', 'trader'),
(55, 'Brocode', '0723435465', '$2y$10$p7xPz4mOA12JOypmo./d8uGjOPJ7mhhSqRYKS9nnNv520gfNqR4U6', '2024-11-29 13:14:16', 'Active', 'trader'),
(56, 'Bowny', '0789564466', '$2y$10$h0pMZoWdIoZjJQWfgUV8VeNFJkTMp5LfhrTotUx39/wm4RTbxbvVu', '2024-11-29 13:17:27', 'Active', 'Trader'),
(57, 'Belinda', '0732444456', '$2y$10$hkhbkQM07GJODXyG7dCUI.VzhB6D0SOYN4OH10bFO4mepVnQGI4H.', '2024-11-29 13:21:19', 'Active', 'Trader'),
(58, 'Evans', '0775136318', '$2y$10$sa4t/8zEoAICk2Xm85uL/u1zasqb9knfmsQ4rSTn7FAtYkXGRupJO', '2024-11-29 14:28:20', 'Active', 'trader');

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
(51, 'Joab', 1000.00, '1000', 'Rejected', '2024-07-13 10:41:28'),
(52, 'Pablo', 500.00, '0765434546', 'Approved', '2024-07-14 13:32:42'),
(53, 'Joab', 2000.00, '0766451246', 'Approved', '2024-07-15 11:24:32'),
(54, 'Mjoabk', 800.00, '0765435675', 'Approved', '2024-07-20 08:23:21'),
(55, 'DennoMigz', 5000.00, '0776543234', 'Approved', '2024-07-30 13:51:44'),
(56, 'Domie', 4000.00, '0776543234', 'Approved', '2024-07-30 14:03:32'),
(57, 'Juma', 5000.00, '0753235677', 'Approved', '2024-09-07 15:27:50'),
(58, 'Joabjob', 500.00, '0776543234', 'Approved', '2024-09-23 12:39:21'),
(59, 'Joabjob', 6000.00, '0745345543', 'Approved', '2024-09-23 12:39:41'),
(60, 'Mashujaa', 500.00, '0776543234', 'Approved', '2024-10-21 00:34:09'),
(61, 'Mashujaa', 5000.00, '0776543234', 'Approved', '2024-10-21 00:43:49'),
(62, 'Mashujaa', 500.00, '0776543234', 'Approved', '2024-10-21 00:49:00'),
(63, 'Joab', 6000.00, '0776543234', 'Approved', '2024-10-21 13:13:15'),
(64, 'Joab', 5000.00, '0776543234', 'Approved', '2024-10-21 14:24:41'),
(65, 'Joab', 4000.00, '0765643546', 'Approved', '2024-10-21 14:24:53'),
(66, 'Joab', 5000.00, '0776543234', 'Pending', '2024-10-21 14:40:20'),
(67, 'Dennomigz254', 1000.00, '0776543234', 'Approved', '2024-11-02 10:40:42'),
(68, 'Trader', 30000.00, '0793594637', 'Approved', '2024-11-29 06:11:08'),
(69, 'Trader', 6000.00, '0798765566', 'Pending', '2024-11-29 09:58:51'),
(70, 'Trader', 2000.00, '0798765566', 'Pending', '2024-11-29 09:59:05'),
(71, 'Trader', 500.00, '0798765566', 'Pending', '2024-11-29 10:02:38');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `investments`
--
ALTER TABLE `investments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2024 at 05:30 PM
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
(113, 'Joab254', 210000.00, 55000.00, 0.00, 0.00, '2024-06-18 12:56:03'),
(116, 'Faith254', 37000.00, 3900.00, 0.00, 0.00, '2024-06-17 09:54:37'),
(119, 'Wafula joab', 78000.00, 21600.00, 0.00, 0.00, '2024-06-18 05:05:49'),
(125, 'Joab', 35000.00, 35000.00, 0.00, 0.00, '2024-06-18 13:45:52'),
(136, 'Caroo', 59000.00, 50.00, 0.00, 0.00, '2024-06-18 14:58:06'),
(141, 'David', 92000.00, 11600.00, 0.00, 0.00, '2024-06-18 17:54:23'),
(144, 'Brian21', 2000.00, 0.00, 0.00, 0.00, NULL),
(145, 'Brayoo', 12000.00, 6000.00, 0.00, 0.00, '2024-06-19 18:06:22');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `phone_number`) VALUES
(6, 'Steve254', '$2y$10$GY0CvRRf6mPbCLpayyn6J.p.f1YSgLxGl0FutqM1b77I5tplJiP.S', '0789645345'),
(7, 'Caro', '$2y$10$uohi2Oig9O7UYFJ6Z7QJqegQhMSDkAS.GToPbVi17s8GspBhsAdem', '0789765434'),
(8, 'Amani', '$2y$10$XGmMcbjr6GLw3f8sKit8w.h2fXC8B4z4zgZOWpY07J1aZYlKrcfoW', '0786432435'),
(9, 'Elikanah', '$2y$10$EWQnnKdCsuWAFbHz5g.Boumd6L6R26Tm43LPJPxUoGzq01BonRVcy', '0765354553');

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
(111, 'Brayoo', 'KHJGFGDFSD', 12000.00, 'Approved', '2024-06-19 15:05:05', '✔', '2024-06-19 18:05:05');

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
(30, 'Joab254', 500.00, 'Active', '2024-06-17 04:44:57', 0, 'Silver Package', 3, '2024-06-20', NULL),
(31, 'Joab254', 500.00, 'Active', '2024-06-17 04:46:02', 0, 'Silver Package', 3, '2024-06-20', NULL),
(32, 'Joab254', 1000.00, 'Active', '2024-06-17 06:18:49', 0, 'Bronze Package', 4, '2024-06-21', NULL),
(33, 'Joab254', 3000.00, 'Active', '2024-06-17 06:20:09', 0, 'Silver Package', 3, '2024-06-20', NULL),
(34, 'Joab254', 3000.00, 'Active', '2024-06-17 06:26:16', 0, 'Executive Package', 10, '2024-06-27', NULL),
(35, 'Joab254', 5000.00, 'Active', '2024-06-17 06:26:44', 0, 'Executive Package', 10, '2024-06-27', NULL),
(36, 'Joab254', 1000.00, 'Active', '2024-06-17 06:28:19', 0, 'gold Package', 6, '2024-06-23', NULL),
(37, 'Joab254', 100.00, 'Active', '2024-06-17 06:30:50', 0, 'Executive Package', 10, '2024-06-27', NULL),
(38, 'FAITH254', 500.00, 'Active', '2024-06-17 06:51:17', 0, 'Silver Package', 3, '2024-06-20', NULL),
(39, 'FAITH254', 5000.00, 'Active', '2024-06-17 06:52:03', 0, 'Bronze Package', 4, '2024-06-21', NULL),
(40, 'FAITH254', 3000.00, 'Active', '2024-06-17 06:55:22', 0, 'Silver Package', 3, '2024-06-20', NULL),
(41, 'FAITH254', 3000.00, 'Active', '2024-06-17 06:55:27', 0, 'Bronze Package', 4, '2024-06-21', NULL),
(42, 'FAITH254', 500.00, 'Active', '2024-06-17 06:56:25', 0, 'Silver Package', 3, '2024-06-20', NULL),
(43, 'FAITH254', 500.00, 'Active', '2024-06-17 07:09:58', 0, 'Executive Package', 10, '2024-06-27', NULL),
(44, 'FAITH254', 3000.00, 'Active', '2024-06-17 07:10:43', 0, 'Gold Package', 6, '2024-06-23', NULL),
(45, 'FAITH254', 3000.00, 'Active', '2024-06-17 07:20:43', 0, 'Silver Package', 3, '2024-06-20', NULL),
(46, 'FAITH254', 3000.00, 'Active', '2024-06-17 07:21:52', 0, 'Gold Package', 6, '2024-06-23', NULL),
(47, 'FAITH254', 3000.00, 'Active', '2024-06-17 07:22:24', 0, 'Executive Package', 10, '2024-06-27', NULL),
(48, 'FAITH254', 500.00, 'Active', '2024-06-17 07:28:43', 0, 'Executive Package', 10, '2024-06-27', NULL),
(49, 'FAITH254', 3000.00, 'Active', '2024-06-17 07:35:14', 0, 'Gold Package', 6, '2024-06-23', NULL),
(50, 'FAITH254', 1000.00, 'Active', '2024-06-17 07:37:13', 0, 'Bronze Package', 4, '2024-06-21', NULL),
(51, 'FAITH254', 1000.00, 'Active', '2024-06-17 07:39:59', 0, 'Executive Package', 10, '2024-06-27', NULL),
(52, 'Joab254', 500.00, 'Active', '2024-06-17 09:13:05', 0, 'Silver Package', 3, '2024-06-20', NULL),
(53, 'Joab254', 600.00, 'Active', '2024-06-17 09:21:48', 0, 'Silver Package', 3, '2024-06-20', NULL),
(54, 'Joab254', 600.00, 'Active', '2024-06-17 09:22:01', 0, 'Executive Package', 10, '2024-06-27', NULL),
(55, 'Wafula joab', 10000.00, 'Active', '2024-06-18 02:06:14', 0, 'Silver Package', 3, '2024-06-21', NULL),
(56, 'Wafula joab', 5000.00, 'Active', '2024-06-18 02:06:26', 0, 'Bronze Package', 4, '2024-06-22', NULL),
(57, 'Wafula joab', 500.00, 'Active', '2024-06-18 04:11:15', 0, 'Silver Package', 3, '2024-06-21', NULL),
(58, 'Joab254', 10000.00, 'Active', '2024-06-18 10:41:31', 0, 'gold Package', 6, '2024-06-24', NULL),
(59, 'Caroo', 58000.00, 'Active', '2024-06-18 12:01:38', 0, 'Silver Package', 3, '2024-06-21', NULL),
(60, 'David', 54000.00, 'Active', '2024-06-18 14:55:01', 0, 'Executive Package', 10, '2024-06-28', NULL),
(61, 'David', 6000.00, 'Active', '2024-06-18 14:55:14', 0, 'Bronze Package', 4, '2024-06-22', NULL),
(62, 'David', 7900.00, 'Active', '2024-06-18 14:57:07', 0, 'Bronze Package', 4, '2024-06-22', NULL),
(63, 'David', 6500.00, 'Active', '2024-06-18 14:57:19', 0, 'Gold Package', 6, '2024-06-24', NULL),
(64, 'Brayoo', 6000.00, 'Active', '2024-06-19 15:06:40', 0, 'Silver Package', 3, '2024-06-22', NULL);

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
(17, 'Caroo', 'joab', 'hello', '2024-06-18 12:59:32');

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
(44, 123, 'Brayoo', 100.00, 'DFGHJKLKJH', '2024-06-19 15:02:01', 'activated');

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
(145, 'Brayoo', '0765434567', '', '$2y$10$tiQlLWzMItGscPi9sYPxcOSOcPHEUgiBFFSFHEA1uz2tYwd5EBrCe', '2024-06-19 18:01:15', 0.00);

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
(21, 'David', 6000.00, '0764532345', 'Approved', '2024-06-18 14:58:30');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `investments`
--
ALTER TABLE `investments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

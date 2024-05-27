-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2024 at 11:02 PM
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
-- Database: `alpha`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `work_id` varchar(50) NOT NULL,
  `rank` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `work_id`, `rank`, `username`, `password`, `created_at`) VALUES
(49, '103399', 'Chief Security Officer', 'Joab', '$2y$10$03VZK5afC0I10STnJauDPeW7GDpFuAtI1Swd7lhnBUIlT04MwsBji', '2024-02-28 01:52:30'),
(61, '212', 'Chief Security Officer', 'jo', '$2y$10$5O7LCJU1ufpeQY8AdWLfkucRJnQR7kCZaYIj2MXI1/ajScXvJnCDK', '2024-03-03 12:31:52'),
(74, 'JFaith', 'Chief Security Officer', 'Jfaith', '$2y$10$VqwmYt6c2opcQ5ELJYLqVe06ibUXStk1yiBa67ZOlSuGZhKYvU95C', '2024-03-05 09:23:43'),
(75, '22344', 'Chief Security Officer', 'Faith', '$2y$10$QyAxaRyKXk0LqW0Z/tddiOGOt5RjuokXiuXzaScifeJ/qW9Mc1Ztm', '2024-03-05 09:27:27'),
(80, '12343', 'Chief Security Officer', 'Sir John', '$2y$10$nuvIamWGoQvaKVJzAuMZO.J0IaCkx4IGb8ohn3d.yaC0XdYo0CBue', '2024-04-08 17:33:29'),
(81, '948467', 'Chief Security Officer', 'Robert', '$2y$10$7XMcwqY8Htd.YqvtZZepK.X7T7ch9lPAcp8S5hZrsQ2gxptRpK0QK', '2024-04-08 17:34:42'),
(83, '233454', 'Chief Executive Officer', 'joab', '$2y$10$kAvZvW2dRFPIe8WXBgazZ.8Qn8YZhhqpkJXUs6/8o/F62/bU.8SDm', '2024-04-15 18:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `announcement_id` int(11) NOT NULL,
  `announcement_content` text DEFAULT NULL,
  `announcement_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`announcement_id`, `announcement_content`, `announcement_date`, `file`, `created_at`) VALUES
(1, 'good morning\r\n', '2024-03-13 13:19:38', '', '2024-04-15 16:12:17'),
(2, 'Hello', '2024-03-13 13:21:43', '', '2024-04-15 16:12:17'),
(3, 'Hello', '2024-03-13 13:22:20', '', '2024-04-15 16:12:17'),
(4, 'Kinuthia', '2024-03-13 14:07:37', '', '2024-04-15 16:12:17'),
(5, 'hellow', '2024-03-13 14:19:33', '', '2024-04-15 16:12:17'),
(6, 'hellow', '2024-03-13 14:24:33', '', '2024-04-15 16:12:17'),
(7, 'hellow', '2024-03-13 14:24:38', '', '2024-04-15 16:12:17'),
(8, 'hi too', '2024-03-13 14:36:15', '', '2024-04-15 16:12:17'),
(9, 'hi too Readdd', '2024-03-13 14:37:01', '', '2024-04-15 16:12:17'),
(10, 'hi too Readdd', '2024-03-13 14:37:06', '', '2024-04-15 16:12:17'),
(11, 'Free', '2024-03-13 14:41:05', '', '2024-04-15 16:12:17'),
(12, 'Tommorow there ....', '2024-03-13 14:43:21', '', '2024-04-15 16:12:17'),
(13, 'hi', '2024-03-13 14:57:14', '', '2024-04-15 16:12:17'),
(14, 'hi\r\n', '2024-03-13 19:38:26', '', '2024-04-15 16:12:17'),
(15, 'hi\r\ngood girl', '2024-03-13 19:38:45', '', '2024-04-15 16:12:17'),
(16, 'hi\r\ngood girl', '2024-03-13 19:38:50', '', '2024-04-15 16:12:17'),
(17, 'Joab Wafula I s coming', '2024-03-13 20:23:08', '', '2024-04-15 16:12:17'),
(18, 'Ayeeh', '2024-03-13 20:48:29', '', '2024-04-15 16:12:17'),
(19, '', '2024-03-13 21:20:24', '', '2024-04-15 16:12:17'),
(20, 'hi girl', '2024-03-13 21:24:21', '', '2024-04-15 16:12:17'),
(21, 'Joabjob is a Developer', '2024-03-13 21:26:29', '', '2024-04-15 16:12:17'),
(22, 'Joabjob is a Developer', '2024-03-13 21:31:05', '', '2024-04-15 16:12:17'),
(23, 'hi', '2024-03-13 21:32:08', '', '2024-04-15 16:12:17'),
(24, 'baby', '2024-03-13 21:32:27', '', '2024-04-15 16:12:17'),
(25, 'hi', '2024-03-13 21:43:10', '', '2024-04-15 16:12:17'),
(26, 'hi', '2024-03-13 21:43:15', '', '2024-04-15 16:12:17'),
(27, 'hi', '2024-03-13 21:43:22', '', '2024-04-15 16:12:17'),
(28, 'good', '2024-03-13 21:44:47', '', '2024-04-15 16:12:17'),
(29, 'hello', '2024-03-13 21:45:44', '', '2024-04-15 16:12:17'),
(30, 'gel', '2024-03-13 21:48:54', '', '2024-04-15 16:12:17'),
(31, 'gel', '2024-03-13 21:49:00', '', '2024-04-15 16:12:17'),
(32, 'ALL are welcomed', '2024-03-13 21:49:40', '', '2024-04-15 16:12:17'),
(33, 'Fine', '2024-03-13 21:56:15', '', '2024-04-15 16:12:17'),
(34, 'Lucy is happy', '2024-03-13 22:45:56', '', '2024-04-15 16:12:17'),
(35, 'hello', '2024-03-14 08:08:06', '', '2024-04-15 16:12:17'),
(36, 'i need security', '2024-03-14 08:08:32', '', '2024-04-15 16:12:17'),
(37, 'Hacknight ', '2024-03-15 10:35:25', 'CAT 1.docx', '2024-04-15 16:12:17'),
(38, 'hello guys', '2024-04-08 17:35:51', '', '2024-04-15 16:12:17');

-- --------------------------------------------------------

--
-- Table structure for table `announcement_replies`
--

CREATE TABLE `announcement_replies` (
  `id` int(11) NOT NULL,
  `announcement_id` int(11) NOT NULL,
  `reply_content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement_replies`
--

INSERT INTO `announcement_replies` (`id`, `announcement_id`, `reply_content`, `created_at`) VALUES
(1, 1, 'wow', '2024-04-08 17:31:40'),
(2, 2, 'thanks', '2024-04-15 16:14:10');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `deposit_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `deposit_amount` decimal(10,2) NOT NULL,
  `deposit_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `investments`
--

CREATE TABLE `investments` (
  `investment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `investment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `package_name` varchar(255) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `maturity_date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `admin_response` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `admin_response`, `created_at`) VALUES
(1, 'Joab Wafula Mongoma', 'wafulajoab98@gmail.com', 'hi', 'hi too', '2024-02-26 16:44:22'),
(2, 'joab', 'j@gmail.com', 'hello sir', 'kwenda uko', '2024-02-26 17:01:38'),
(3, 'Joab Wafula Mongoma', 'wafulajoab98@gmail.com', 'hello security in our hostel is wanting please pass the relevant guards to come and help us', 'okay noted', '2024-02-26 19:30:49'),
(4, 'Joab Wafula Mongoma', 'wafulajoab98@gmail.com', 'hi', '', '2024-02-27 06:34:40'),
(5, 'Joab Wafula Mongoma', 'wafulajoab98@gmail.com', 'jhfgjhkjn', '', '2024-02-27 14:47:34'),
(6, 'Joab Wafula Mongoma', 'wafula@gmail.com', 'hi', '', '2024-02-27 16:40:43'),
(7, 'Joab Wafula Mongoma', 'wafula@gmail.com', 'Hello am Joab\r\n', '', '2024-02-28 14:01:57'),
(8, 'wafula joab', 'j@gmail.com', 'Hi Its Lucy wa Joab', '', '2024-02-28 19:27:06'),
(9, 'Joab Wafula Mongoma', 'wafula@gmail.com', 'Hi, there is an issue at ECA ', 'okay i will come', '2024-03-02 14:44:50'),
(10, 'Sylver', 'j@gmail.com', 'hi i need a job', 'okay its available', '2024-03-02 14:52:23'),
(11, 'Joab Wafula Mongoma', 'wafulajoab98@gmail.com', 'hi', 'Niko sherehe', '2024-03-02 15:28:25'),
(12, 'Joab Wafula Mongoma', 'wafulajoab98@gmail.com', 'hyiiu', 'hi', '2024-03-04 14:53:34'),
(13, 'Joab Wafula Mongoma', 'wafula@gmail.com', 'Good morning sir', '', '2024-03-05 07:45:16'),
(14, 'Joab Wafula Mongoma', 'wa@gmail.com', 'hello', '', '2024-03-05 09:49:38'),
(15, 'Joab Wafula Mongoma', 'wafulajoab98@gmail.com', 'hello am joan', 'nimekusikia', '2024-03-05 10:13:36'),
(16, 'Joab Wafula Mongoma', 'wafulajoab98@gmail.com', 'hello', '', '2024-03-10 09:27:56'),
(17, 'Joab Wafula Mongoma', 'wafula@gmail.com', 'hello Can be helped', 'yess', '2024-03-10 18:14:36'),
(18, 'Diana', 'wafulajoab98@gmail.com', 'I want to have some information about security measures', '', '2024-03-14 07:58:45'),
(19, 'collo', 'wafula@gmail.com', 'i need security', 'okayyyy', '2024-03-14 08:04:27'),
(20, 'Joab Wafula Mongoma', 'wafulajoab98@gmail.com', 'Hello', '', '2024-03-14 20:36:09'),
(21, 'Joab wafula', 'joabfx22@gmail.com', 'hello sir', 'hello too', '2024-04-08 17:32:31');

-- --------------------------------------------------------

--
-- Table structure for table `normal_announcements`
--

CREATE TABLE `normal_announcements` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `normal_announcements`
--

INSERT INTO `normal_announcements` (`id`, `title`, `content`, `created_at`) VALUES
(1, 'MEETING', 'We are all required to attend the meeting\r\n', '2024-04-08 17:28:41'),
(2, 'MEETING', 'You are blessed', '2024-04-15 16:14:02');

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `referral_id` int(11) NOT NULL,
  `referred_by` int(11) NOT NULL,
  `referral_bonus` decimal(10,2) NOT NULL,
  `referral_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(3, 'denoste', '07653553', 'meru', 'zxcvb', '2024-02-26 18:50:18', 0.00),
(5, 'lucy', '0976', 'Nairobi', '34', '2024-02-26 18:53:07', 0.00),
(6, 'Ken', '56', 'meru', '3', '2024-02-26 18:55:59', 0.00),
(8, 'Joab', '079324567', 'Meru', 'zxcvb', '2024-02-27 01:38:29', 0.00),
(21, 'JoabJob', '07352665', 'Nairobi', 'zxcvb', '2024-02-28 22:31:42', 0.00),
(22, 'Kenn', '083756367', 'Nairobi', '12345', '2024-03-02 17:42:01', 0.00),
(23, 'Johnk', '0763555353', 'Nairobi', '12345', '2024-03-02 18:30:40', 0.00),
(24, 'aass', '11', 'zxxz', 'sasas', '2024-03-03 16:38:21', 0.00),
(25, '1111', 'aaadad', 'adadad', 'aadaad', '2024-03-03 16:38:37', 0.00),
(26, 'adad', 'adadad', 'adadad', 'aadad', '2024-03-03 16:38:53', 0.00),
(27, 'adadad', 'aadad', 'adada', 'adadad', '2024-03-03 16:39:08', 0.00),
(28, '11', '113', 'ddd', 'adad', '2024-03-03 16:39:26', 0.00),
(29, 'ghfhj', '3456789', 'xvfgjhk.l/', 'fdsddfghjk', '2024-03-03 16:39:47', 0.00),
(30, 'fdghjkl;', 'fdghjkl', 'fdghjkl', '345678', '2024-03-03 16:40:04', 0.00),
(31, 'sdfsdfsdfdfss', 'ssdfdsds', 'sfsfdsd', 'ssfsfddd', '2024-03-03 16:40:21', 0.00),
(40, 'nhjghfgdfgfhjk', ',nvbcxcgchv', '987654', 'nmbnvbcvxcbvnbn', '2024-03-03 16:43:43', 0.00),
(41, '324567', '345678', 'ghfdsfghjkjl', 'qwertyui', '2024-03-03 16:44:03', 0.00),
(42, 'Eliud Kipchoge', '0735353533', 'Meru', 'zxcvb', '2024-03-04 11:32:31', 0.00),
(43, 'Kelvin Cheptoo', '12345', 'Nairobi', 'zxcvb', '2024-03-04 12:08:27', 0.00),
(46, 'j', '9', 'jk', 'm', '2024-03-05 12:44:55', 0.00),
(47, 'qw', '11', '11', 'qq', '2024-03-05 13:56:39', 0.00),
(48, 'Domie', '0798345543', 'Nairobi', 'zxcvbn', '2024-03-10 20:04:09', 0.00),
(49, 'Dennomigz', '0789645234', 'Mombasa', 'zxcvbn', '2024-03-10 20:14:29', 0.00),
(50, 'Dennomigz', '0789645234', 'Mombasa', 'zxcvbn', '2024-03-10 20:15:46', 0.00),
(51, 'Faith', '0789635273', 'Nairobi', 'zxcvbn', '2024-03-10 20:16:20', 0.00),
(52, 'Emmy Koskei', '0767543234', 'Nairobi', 'zxcvbn', '2024-03-10 20:20:49', 0.00),
(53, 'Wamboo', '079876', 'Meru', 'zxcvbn', '2024-03-10 20:57:14', 0.00),
(54, 'Alex', '0765345876', 'Mombasa', 'zxcvbn', '2024-03-10 22:40:32', 0.00),
(55, 'Devie', '072345654', 'Mombasa', 'zxcvbn', '2024-03-10 22:47:10', 0.00),
(56, 'Michael', '0723456876', 'Mombasa', 'zxcvbn', '2024-03-11 09:27:04', 0.00),
(57, 'Mike', '0786234543', 'Mombasa', 'zxcvbn', '2024-03-11 13:30:29', 0.00),
(58, 'Faith001', '0789654234', 'Mombasa', 'zxc', '2024-03-11 13:41:53', 0.00),
(59, 'Velma K', '0798234567', 'Mombasa', 'zxcvbn', '2024-03-11 13:51:50', 0.00),
(60, 'Jerry', '0798345432', 'Nairobi', 'zxcvbn', '2024-03-12 09:42:05', 0.00),
(61, 'Joooo', '072987678', 'Nairobi', 'zxcvbn', '2024-03-13 11:13:04', 0.00),
(62, 'Samuel ', '0767567987', 'Nairobi', 'zxcvbn', '2024-03-14 01:24:35', 0.00),
(63, 'Diana moraa', '0114141772', 'Meru', 'Dian001', '2024-03-14 10:52:04', 0.00),
(64, 'Diana', '0786543566', 'Nairobi', 'zxcvbn', '2024-03-14 10:53:53', 0.00),
(65, 'Collo', '072353633', 'Meru', 'zxcvbn', '2024-03-14 11:01:45', 0.00),
(66, 'Joooo', '0786456543', 'Nairobi', 'zxcvb', '2024-03-14 11:06:15', 0.00),
(67, 'Dan', '072635474', 'Mombasa', 'zxcvbn', '2024-03-14 11:30:55', 0.00),
(68, 'Joabjob', '0789654345', 'Nairobi', 'zxcvbn', '2024-03-14 23:31:41', 0.00),
(69, 'Joab ', '0793456765', 'Mombasa', 'zxcvbn', '2024-04-08 20:14:35', 0.00),
(70, 'Faith', '0798456345', 'kemu', 'zxcvbn', '2024-04-08 20:35:25', 0.00),
(71, 'Joab12', '0797222133', '', '$2y$10$djpKM2fmg4SgnhE6pXeQh.XhUMq6dpAaPQTXJEUVx88hyrn0OyblK', '2024-04-15 16:32:51', 0.00),
(72, 'Joabj', '0789876567', '', '$2y$10$eGQKstLXSYJVfvvkVd1MOOcOyi8wpbZTfmZ9htGOTtZlQXrD6dQvS', '2024-04-15 18:08:37', 0.00),
(73, 'Joabjob', '0786543234', '', '$2y$10$6zVlQG8630nqz354fKGeQu1BOAa5pW6D8T.5x0dwh.evAP5GxmYwG', '2024-04-18 14:01:49', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `withdrawal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `withdrawal_amount` decimal(10,2) NOT NULL,
  `withdrawal_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `announcement_replies`
--
ALTER TABLE `announcement_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `announcement_id` (`announcement_id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`deposit_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `investments`
--
ALTER TABLE `investments`
  ADD PRIMARY KEY (`investment_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `normal_announcements`
--
ALTER TABLE `normal_announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`referral_id`),
  ADD KEY `referred_by` (`referred_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`withdrawal_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `announcement_replies`
--
ALTER TABLE `announcement_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `deposit_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `investments`
--
ALTER TABLE `investments`
  MODIFY `investment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `normal_announcements`
--
ALTER TABLE `normal_announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `referral_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `withdrawal_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement_replies`
--
ALTER TABLE `announcement_replies`
  ADD CONSTRAINT `announcement_replies_ibfk_1` FOREIGN KEY (`announcement_id`) REFERENCES `normal_announcements` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `deposits`
--
ALTER TABLE `deposits`
  ADD CONSTRAINT `deposits_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `investments`
--
ALTER TABLE `investments`
  ADD CONSTRAINT `investments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `referrals`
--
ALTER TABLE `referrals`
  ADD CONSTRAINT `referrals_ibfk_1` FOREIGN KEY (`referred_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD CONSTRAINT `withdrawals_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

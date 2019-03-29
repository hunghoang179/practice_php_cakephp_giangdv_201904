-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2019 at 12:31 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(19) NOT NULL,
  `id_category` bigint(19) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_short` text COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `out_stock` int(11) NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `create_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `update_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_deleted` bigint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `id_category`, `title`, `content_short`, `stock`, `out_stock`, `author`, `year`, `create_user`, `update_user`, `create_time`, `update_time`, `is_deleted`) VALUES
(1, 1, 'Van hoc', 'sach giao duc pho thong', 10, 0, 'ngo tran ai', 2019, '', '', '2019-03-28 03:24:48', '0000-00-00 00:00:00', 1),
(2, 2, 'anh hung xa dieu', 'truyen kiem hiep', 19, 0, 'Kim dung', 2019, '', '', '2019-03-28 03:24:48', '0000-00-00 00:00:00', 1),
(3, 3, 'ky thuat trong cay', 'ky thuat canh tac dat ruong', 18, 0, 'lan dung', 2019, '', '', '2019-03-28 03:24:48', '0000-00-00 00:00:00', 1),
(4, 4, 'marketing online', 'kinh doanh online', 0, 12, 'van lam', 2019, '', '', '2019-03-28 03:24:48', '0000-00-00 00:00:00', 1),
(5, 1, 'Van hoc', 'sach giao duc pho thong', 10, 1, 'ngo tran ai', 2019, '', '', '2019-03-28 03:25:26', '0000-00-00 00:00:00', 1),
(6, 2, 'anh hung xa dieu', 'truyen kiem hiep', 19, 1, 'Kim dung', 2019, '', '', '2019-03-28 03:25:26', '0000-00-00 00:00:00', 1),
(7, 3, 'ky thuat trong cay', 'ky thuat canh tac dat ruong', 18, 0, 'lan dung', 2019, '', '', '2019-03-28 03:25:26', '0000-00-00 00:00:00', 1),
(8, 4, 'marketing online', 'kinh doanh online', 0, 12, 'van lam', 2019, '', '', '2019-03-28 03:25:26', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `borrow_orders`
--

CREATE TABLE `borrow_orders` (
  `id` bigint(19) NOT NULL,
  `id_user` bigint(19) NOT NULL,
  `id_book` bigint(19) NOT NULL,
  `borrow_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `return_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `note` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `create_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `update_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_deleted` bigint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `borrow_orders`
--

INSERT INTO `borrow_orders` (`id`, `id_user`, `id_book`, `borrow_date`, `return_date`, `note`, `status`, `create_user`, `update_user`, `create_time`, `update_time`, `is_deleted`) VALUES
(1, 1, 1, '2019-03-27 17:00:00', '2019-03-30 17:00:00', 'muon 15 ngay', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 2, 2, '2019-03-27 17:00:00', '2019-03-30 17:00:00', 'muon 30 ngay', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(19) NOT NULL,
  `id_parent` bigint(19) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `update_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_deleted` bigint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `id_parent`, `name`, `create_user`, `update_user`, `create_time`, `update_time`, `is_deleted`) VALUES
(1, 0, 'giao duc', '', '', '2019-03-28 03:20:51', '0000-00-00 00:00:00', 1),
(2, 0, 'tieu thuyet', '', '', '2019-03-28 03:20:51', '0000-00-00 00:00:00', 1),
(3, 0, 'chan nuoi', '', '', '2019-03-28 03:20:51', '0000-00-00 00:00:00', 0),
(4, 0, 'kinh doanh', '', '', '2019-03-28 03:20:51', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(19) NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `create_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `update_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `mail`, `address`, `phone`, `role`, `create_user`, `update_user`, `create_time`, `update_time`, `is_deleted`) VALUES
(36, '2222222', '123', '2222@gmail.com', 'nghia hung nam dinh', '0384511666', 0, '', '', '2019-03-29 08:58:15', '0000-00-00 00:00:00', 0),
(37, '333', '827ccb0eea8a706c4c34a16891f84e7b', '333@gmail.com', 'nghia hung nam dinh', '0384511666', 0, '', '', '2019-03-28 10:46:07', '0000-00-00 00:00:00', 0),
(38, 'admin', '123', 'admin@gmail.com', 'nghia hung nam dinh', '0912345678', 0, '', '', '2019-03-29 09:21:03', '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrow_orders`
--
ALTER TABLE `borrow_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `borrow_orders`
--
ALTER TABLE `borrow_orders`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2019 at 12:58 PM
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
  `quantity` int(11) NOT NULL,
  `out_stock` int(11) NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `create_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `update_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` bigint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `id_category`, `title`, `content_short`, `quantity`, `out_stock`, `author`, `year`, `create_user`, `update_user`, `create_time`, `update_time`, `is_deleted`) VALUES
(1, 1, 'Van hoc', 'sach giao duc pho thong', 10, 0, 'ngo tran ai', 2019, 'giang', 'admin', '0000-00-00 00:00:00', '04/30/2019', 1),
(2, 2, 'thuy hu', 'truyen kiem hiep', 19, 0, 'Kim dung', 2019, '11', '11', '0000-00-00 00:00:00', '04/25/2019', 1),
(3, 3, 'ky thuat chan nuoi', 'ky thuat nuoi ca', 18, 0, 'lan dung', 2019, 'giang', 'admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(4, 4, 'marketing online', 'kinh doanh online', 0, 12, 'van lam', 2019, 'giang', '11', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(5, 1, 'Van hoc', 'sach giao duc pho thong', 10, 1, 'ngo tran ai', 2019, 'giang', 'admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(6, 2, 'anh hung xa dieu', 'truyen kiem hiep', 19, 1, 'Kim dung', 2019, '', '', '2019-03-28 03:25:26', '0000-00-00 00:00:00', 1),
(7, 3, 'ky thuat trong cay', 'ky thuat canh tac dat ruong', 18, 0, 'lan dung', 2019, '', '', '2019-03-28 03:25:26', '0000-00-00 00:00:00', 1),
(8, 4, 'marketing online', 'kinh doanh online', 0, 12, 'van lam', 2019, '', '', '2019-03-28 03:25:26', '0000-00-00 00:00:00', 1),
(9, 5, 'doremon', 'truyen tranh thieu nhi', 10, 1, 'Fujiko Fujio', 1999, '', '', '2019-04-03 01:54:10', '0000-00-00 00:00:00', 0),
(11, 1, 'giao duc cong dan', 'giao duc cong dan', 10, 111, 'giao duc', 0, '', '', '2019-04-03 03:50:54', '0000-00-00 00:00:00', 0),
(12, 1, 'giao duc cong dan', 'giao duc cong dan', 10, 111, 'giao duc', 0, '', '', '2019-04-03 03:50:59', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `book_order`
--

CREATE TABLE `book_order` (
  `id` bigint(20) NOT NULL,
  `id_book` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book_order`
--

INSERT INTO `book_order` (`id`, `id_book`, `id_user`, `quantity`) VALUES
(1, 1, 36, 4),
(2, 2, 37, 7);

-- --------------------------------------------------------

--
-- Table structure for table `borrow_orders`
--

CREATE TABLE `borrow_orders` (
  `id` bigint(19) NOT NULL,
  `id_user` bigint(19) NOT NULL,
  `id_book` bigint(19) NOT NULL,
  `borrow_date` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `return_date` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `create_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `update_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `update_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` bigint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `borrow_orders`
--

INSERT INTO `borrow_orders` (`id`, `id_user`, `id_book`, `borrow_date`, `return_date`, `note`, `status`, `create_user`, `update_user`, `create_time`, `update_time`, `is_deleted`) VALUES
(1, 37, 1, '04/12/2019', '04/17/2019', 'muon 15 ngay', 0, 'giang', 'admin', '04/11/2019', '04/11/2019', 1),
(2, 38, 2, '04/5/2019', '04/17/2019', 'muon 30 ngay', 1, 'giang', 'admin', '04/24/2019', '0000-00-00', 1),
(3, 36, 3, '04/19/2019', '04/17/2019', 'mượn 10 ngày', 4, 'admin', 'admin', '04/10/2019', '0000-00-00', 0),
(4, 37, 4, '04/03/2019', '04/30/2019', 'mượn 1 tháng', 2, 'giang', 'admin', '04/03/2019', '0000-00-00', 0),
(5, 36, 5, '04/10/2019', '04/22/2019', 'mượn 1 tuần', 3, 'giang', 'admin', '04/03/2019', '0000-00-00', 0),
(6, 36, 7, '04/21/2019', '04/05/2019', 'mượn 1 ngày', 4, 'dev', 'admin', '04/25/2019', '0000-00-00', 0);

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
(1, 0, 'giao duc', 'giang', '03', '2019-03-28 03:20:00', '2019-04-03 03:51:00', 1),
(2, 0, 'tieu thuyet', 'admin', '11', '2019-04-03 04:00:00', '2019-04-03 04:00:00', 1),
(3, 0, 'chan nuoi', '', '', '2019-03-28 03:20:51', '0000-00-00 00:00:00', 0),
(4, 0, 'kinh doanh', '', '', '2019-03-28 03:20:51', '0000-00-00 00:00:00', 1),
(5, 7, 'truyen tranh', '11', '11', '2019-04-02 10:01:00', '2024-11-30 00:00:00', 0),
(6, 0, 'the thao', 'dev', '03/04/2019', '2019-04-03 04:04:00', '2024-11-30 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(19) NOT NULL,
  `role_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role_name`, `role`) VALUES
(1, 'Thành viên', 0),
(2, 'Thủ thư', 1),
(3, 'Admin', 2);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` bigint(20) NOT NULL,
  `name_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name_status`, `status`) VALUES
(1, 'pendding', 0),
(2, 'approve', 1),
(3, 'cancer', 2),
(4, 'return', 3),
(5, 'missing', 4);

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
  `role_id` int(11) NOT NULL,
  `create_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `update_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `mail`, `address`, `phone`, `role_id`, `create_user`, `update_user`, `create_time`, `update_time`, `is_deleted`) VALUES
(36, 'user', '827ccb0eea8a706c4c34a16891f84e7b', '222222@gmail.com', 'nghia hung', '12345678', 1, '', '', '2019-04-02 09:20:00', '2019-04-02 06:02:00', 0),
(37, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'giang@gmail.com', 'ha noi', '12345123123', 3, '', '', '2019-04-02 09:20:00', '2019-04-01 08:10:00', 0),
(38, 'librian', '827ccb0eea8a706c4c34a16891f84e7b', 'librian@gmail.com', 'nam dinh', '0912345', 2, '', '', '2019-04-02 09:24:19', '2019-04-02 06:04:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_order`
--
ALTER TABLE `book_order`
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
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
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
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `book_order`
--
ALTER TABLE `book_order`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `borrow_orders`
--
ALTER TABLE `borrow_orders`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

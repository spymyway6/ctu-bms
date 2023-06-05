-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 05, 2023 at 11:22 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ctu_library_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int NOT NULL,
  `accession_no` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `book_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `other_author` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `edition` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `publish_date` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `copyright_date` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `location` text COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` int NOT NULL,
  `available` int NOT NULL,
  `unavailable` int NOT NULL,
  `category` text COLLATE utf8mb4_general_ci NOT NULL,
  `book_image` text COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `accession_no`, `book_name`, `author`, `other_author`, `edition`, `publish_date`, `copyright_date`, `location`, `quantity`, `available`, `unavailable`, `category`, `book_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AN-2023-06-1', 'Save the book 1', 'MJj', 'John', '1st Edition', '2023-06-17', '2023-06-02', 'Mandaue', 2, 1, 1, 'Business & Money', 'p_64797e9cdc0da.jpg', 'Active', '2023-06-02 03:29:56', '2023-06-04 16:25:38'),
(2, 'AN-2023-06-2', 'My Jenyy', 'John', 'Loyd', '2nd', '2023-06-16', '2023-05-29', 'Basak', 2, 1, 1, 'Personal Development', '', 'Active', '2023-06-02 03:31:42', '2023-06-04 16:25:42'),
(3, 'AN-2023-06-3', 'Book2', 'wqwe', 'qwe', 'qwe', '2023-06-16', '2023-06-08', 'qwe', 4, 4, 0, 'Autobiography', '', 'Active', '2023-06-02 03:32:46', '2023-06-05 06:06:01'),
(4, 'AN-2023-06-4', 'Change Image', 'awe', 'qwe', 'qwe', '2023-06-03', '2023-05-31', 'qwe', 2, 2, 0, 'Autobiography', 'p_6479811ecd5f3.jpg', 'Inactive', '2023-06-02 03:33:19', '2023-06-02 06:27:01'),
(5, 'AN-2023-06-5', 'book4', 'qwe', 'qwe', 'qwe', '2023-06-01', '2023-06-03', 'qwe', 3, 3, 0, 'Autobiography', 'p_64797dc79a16e.jpg', 'Active', '2023-06-02 03:36:52', '2023-06-05 11:11:38'),
(6, 'AN-2023-06-6', 'book5', 'qwe', 'qwe', 'qwe', '2023-06-03', '2023-06-03', 'wqe', 2, 2, 0, 'Autobiography', '', 'Inactive', '2023-06-02 03:37:30', '2023-06-02 06:27:19'),
(7, 'AN-2023-06-7', 'Save the book 5', 'MJj', '3', 'qwe', '2023-06-03', '2023-06-16', 'qwe', 3, 3, 0, 'Business & Money', 'p_64797fa66213e.jpg', 'Inactive', '2023-06-02 05:35:34', '2023-06-02 09:42:44'),
(8, '2023-06-02-8', 'Save the book 2323', 'MJj', 'John', '1st Edition', '2023-06-08', '2023-06-13', 'Mandaue', 23, 23, 0, 'Autobiography', '', 'Active', '2023-06-02 05:43:31', '2023-06-02 06:27:24'),
(9, '2323', 'Save the book 1', 'MJj', 'qwe-edit', '1st Edition', '2023-06-02', '2023-06-01', 'qwe', 3, 3, 0, 'Autobiography', '', 'Active', '2023-06-02 05:45:45', '2023-06-02 06:27:26'),
(10, '2323', 'Save the book 2323', 'MJj', 'qwe', '1st Edition', '2023-06-02', '2023-07-05', 'Mandaue', 23, 23, 0, 'Business & Money', '', 'Active', '2023-06-02 06:20:21', '2023-06-02 06:27:29'),
(11, '2323', 'Save the book 2323', 'MJj', 'qwe', '1st Edition', '2023-06-02', '2023-07-05', 'Mandaue', 23, 22, 0, 'Business & Money', '', 'Active', '2023-06-02 06:20:33', '2023-06-04 15:38:53'),
(12, '232323', 'MJ Book 1', 'John', 'Weak', '1st Edition', '2023-06-03', '2023-06-30', 'qwe', 2, 5, 0, 'Humor & Entertainment', 'p_64798b46aa416.jpg', 'Active', '2023-06-02 06:25:10', '2023-06-04 15:42:15'),
(13, '2224422', 'MJ Book 2 Edit', 'MJj', 'John', '1st Edition', '2023-06-03', '2023-06-17', 'Mandaue', 2, 0, 0, 'Humor & Entertainment', '', 'Active', '2023-06-04 15:43:22', '2023-06-05 05:55:44');

-- --------------------------------------------------------

--
-- Table structure for table `book_categories`
--

CREATE TABLE `book_categories` (
  `category_id` int NOT NULL,
  `category_name` text COLLATE utf8mb4_general_ci NOT NULL,
  `category_status` int NOT NULL COMMENT '0 Inactive, 1 Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_categories`
--

INSERT INTO `book_categories` (`category_id`, `category_name`, `category_status`, `created_at`, `updated_at`) VALUES
(1, 'Business & Money', 1, '2023-06-05 11:09:46', '2023-06-05 11:09:46'),
(2, 'Personal Development', 1, '2023-06-05 11:09:54', '2023-06-05 11:09:54'),
(3, 'Autobiography', 1, '2023-06-05 11:10:01', '2023-06-05 11:10:01'),
(4, 'Humor & Entertainment', 1, '2023-06-05 11:11:55', '2023-06-05 11:11:55'),
(5, 'New cat 1', 0, '2023-06-05 11:12:35', '2023-06-05 11:21:55'),
(6, 'John Category 1 edit', 0, '2023-06-05 11:20:08', '2023-06-05 11:22:05');

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `issue_id` int NOT NULL,
  `user_id` int NOT NULL,
  `book_id` int NOT NULL,
  `request_type` int NOT NULL COMMENT '1 Borrow, 2 Reserve',
  `request_status` int NOT NULL COMMENT '0 Pending, 1 Approve, 2 Decline, 3 Returned',
  `expiry_date` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `return_date` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`issue_id`, `user_id`, `book_id`, `request_type`, `request_status`, `expiry_date`, `return_date`, `created_at`, `updated_at`) VALUES
(22, 2, 13, 1, 3, '2023-06-07', '2023-06-04', '2023-06-04 16:28:31', '2023-06-04 16:29:27'),
(23, 2, 13, 1, 3, '2023-06-08', '2023-06-05', '2023-06-05 02:11:58', '2023-06-05 05:37:17'),
(24, 5, 13, 1, 3, '2023-06-08', '2023-06-05', '2023-06-05 04:27:25', '2023-06-05 05:43:41'),
(26, 3, 13, 1, 3, '2023-06-08', '2023-06-05', '2023-06-05 05:08:04', '2023-06-05 05:43:44'),
(27, 3, 3, 1, 2, NULL, NULL, '2023-06-05 05:46:10', '2023-06-05 05:56:09'),
(30, 3, 3, 1, 3, '2023-06-08', '2023-06-05', '2023-06-05 06:05:21', '2023-06-05 06:06:01'),
(31, 3, 3, 1, 2, NULL, NULL, '2023-06-05 06:06:08', '2023-06-05 06:06:24'),
(32, 3, 5, 1, 3, '2023-06-04', '2023-06-05', '2023-06-01 06:07:13', '2023-06-05 06:14:05');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int NOT NULL,
  `page_name` text COLLATE utf8mb4_general_ci NOT NULL,
  `page_content` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `slug` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `page_content`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'General Rules Edit lagi', 'Edit ni bai', 'general-rules', '2023-06-04 14:30:55', '2023-06-04 15:35:32'),
(2, 'Borrowing Policy edit', '<h1>Test Header</h1><div><br></div><span style=\"font-weight: bold;\">Borrowing Policy edited</span><div><span style=\"font-weight: bold;\"><br></span></div><div><span style=\"font-weight: bold;\"><a href=\"https://google.com\" target=\"_blank\">Gogole</a></span></div>', 'borrowing-policy', '2023-06-04 14:30:55', '2023-06-04 15:28:58'),
(3, 'Circulation Service', 'Lorenm', 'circulation-services', '2023-06-04 14:36:09', '2023-06-04 15:29:18'),
(4, 'Library Orientation and Instruction', 'Library Orientation and Instruction', 'library-orientation', '2023-06-04 14:39:47', '2023-06-04 15:29:25'),
(5, 'Document Delivery (DD)', 'LOrem', 'document-delivery', '2023-06-04 14:39:47', '2023-06-04 15:29:37'),
(6, 'Inter-Library / Referral Services', 'Lorem', 'inter-library', '2023-06-04 14:39:47', '2023-06-04 15:29:43'),
(7, 'Reference and Information Services', 'Lorem', 'information-services', '2023-06-04 14:39:47', '2023-06-04 15:30:00'),
(8, 'Scanning, Photocopy, and Printing Services', 'Lorem', 'printing-services', '2023-06-04 14:39:47', '2023-06-04 15:30:07'),
(9, 'Internet Access Services', 'Lorem', 'internet-access', '2023-06-04 14:39:47', '2023-06-04 15:30:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` text COLLATE utf8mb4_general_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `pic` text COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address` text COLLATE utf8mb4_general_ci NOT NULL,
  `role` int NOT NULL COMMENT '1 Admin, 2 Student, 3 Teachers',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `contact`, `pic`, `status`, `department`, `address`, `role`, `created_at`, `updated_at`) VALUES
(1, 'MJCoupon', 'test4', 'johncloyd', '1tfe_coup_mja4@yopmail.com', '202cb962ac59075b964b07152d234b70', '09312149163', '', 'Active', 'Admin or Librarian', '576 Cedar Lane', 1, '2023-06-01 23:27:45', '2023-06-04 11:33:23'),
(2, '1TFV MJ Coupon', '1TFV', 'merz', '1tfv_coup_mja40@yopmail.com', '4297f44b13955235245b2497399d7a93', '09312149163', '', 'Active', 'IT', '576 Cedar Lane', 2, '2023-06-01 23:27:45', '2023-06-04 10:48:14'),
(3, 'Luedit', 'YiLuedit', 'luLuedit', 'luesdit@yopmail.com', '202cb962ac59075b964b07152d234b70', '0389338383823232232323', 'p_647c6314dfdb0.jpg', 'Active', 'ITLueditc', '576 Cedar LaneLuedit', 2, '2023-06-04 09:52:38', '2023-06-04 10:10:44'),
(4, 'Mj', 'Pins', 'mj', 'mj@yopmail.com', '202cb962ac59075b964b07152d234b70', '03893383838', 'p_647c668229a58.jpg', 'Active', 'IT', '576 Cedar Lane', 1, '2023-06-04 10:25:06', '2023-06-04 10:25:06'),
(5, 'Teacher', 'MJ', 'teacher', 'teacher@yopmail.com', '202cb962ac59075b964b07152d234b70', '231234123', 'p_647c7455a4680.jpg', 'Active', 'Teacher', '576 Cedar Lane', 3, '2023-06-04 10:41:27', '2023-06-04 11:24:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_categories`
--
ALTER TABLE `book_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `issue_book`
--
ALTER TABLE `issue_book`
  ADD PRIMARY KEY (`issue_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `book_categories`
--
ALTER TABLE `book_categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `issue_book`
--
ALTER TABLE `issue_book`
  MODIFY `issue_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

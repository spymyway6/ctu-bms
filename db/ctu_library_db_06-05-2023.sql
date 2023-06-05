-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 05, 2023 at 02:31 PM
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

INSERT INTO `books` (`id`, `accession_no`, `book_name`, `author`, `other_author`, `edition`, `publish_date`, `copyright_date`, `location`, `quantity`, `unavailable`, `category`, `book_image`, `status`, `created_at`, `updated_at`) VALUES
(1, '647dd7428cd46', 'To Kill a Mockingbird', 'Harper Lee', 'N/A', '1st Edition', '1960-06-08', '2023-06-05', 'Mandaue', 2, 0, '1', 'p_647dd7998914b.jpg', 'Active', '2023-06-05 12:39:28', '2023-06-05 12:39:53'),
(2, '647dd79b1c1c6', '1984 by George Orwell', 'George Orwell', 'N/A', '1st Edition', '1999-06-07', '2023-06-06', 'Mandaue', 1, 0, '1', 'p_647dd826c38ab.jpg', 'Active', '2023-06-05 12:41:23', '2023-06-05 13:59:16'),
(3, '647dd7f64f413', 'Pride and Prejudice', 'Jane Austen', '', '1st Edition', '1812-06-08', '1823-06-27', '', 1, 0, '8', 'p_647dd82d0425d.jpg', 'Active', '2023-06-05 12:42:07', '2023-06-05 13:59:27'),
(4, '647dd82e23253', 'The Great Gatsby', 'F. Scott Fitzgerald', '', '1st Edition', '1892-06-14', '1985-05-31', '', 1, 0, '2', 'p_647dd85c2f5ea.jpg', 'Active', '2023-06-05 12:43:00', '2023-06-05 12:43:08'),
(5, '647dd85d52c57', 'The Catcher in the Rye', 'J.D. Salinger', '', '1st Edition', '1923-06-07', '1990-06-07', '', 3, 0, '9', 'p_647dd8877c350.jpg', 'Active', '2023-06-05 12:43:45', '2023-06-05 12:43:51'),
(6, '647dd888a43aa', 'To the Lighthouse', 'Virginia Woolf', 'John Virginia Woolf', '1st Edition', '1998-06-08', '1998-06-26', '', 1, 0, '10', 'p_647dd8aedc933.jpg', 'Active', '2023-06-05 12:44:30', '2023-06-05 12:44:30'),
(7, '647dd8b1dda42', 'Moby-Dick', 'Herman Melville', '', '1st Edition', '1851-06-05', '1892-06-08', '', 2, 0, '7', 'p_647dd8e04b429.jpg', 'Active', '2023-06-05 12:45:20', '2023-06-05 12:45:20'),
(8, '647dd8e36fdc8', 'The Lord of the Rings', 'J.R.R. Tolkien', '', '1st Edition', '1954-06-08', '2023-06-13', '', 1, 0, '3', 'p_647dd9170cdf6.jpg', 'Active', '2023-06-05 12:46:15', '2023-06-05 12:46:15'),
(9, '647dd91846aaa', 'Jane Eyre', 'Charlotte Brontë', 'N/A', '1st Edition', '1974-06-14', '1923-05-31', '', 3, 0, '1', 'p_647dd959c9a72.jpg', 'Active', '2023-06-05 12:47:21', '2023-06-05 13:01:31'),
(10, '647dd95cca416', 'The Hobbit', 'J.R.R. Tolkien', 'John', '1st Edition', '1990-06-06', '1892-06-13', '', 2, 0, '6', 'p_647dd98b90be8.jpg', 'Active', '2023-06-05 12:48:11', '2023-06-05 12:48:11'),
(11, '647dd98e9956c', 'Brave New World', 'Aldous Huxley', '', '1st Edition', '1992-05-31', '1782-07-05', 'Mandaue', 2, 0, '1', 'p_647dd9bb58811.jpg', 'Active', '2023-06-05 12:48:59', '2023-06-05 13:59:19'),
(12, '647dd9be94893', 'The Odyssey', 'Homer', 'John', '1st Edition', '2023-06-07', '2023-07-06', 'Basak', 1, 0, '5', 'p_647dd9e0c4693.jpg', 'Active', '2023-06-05 12:49:36', '2023-06-05 12:49:36');

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
(1, 'Classic', 1, '2023-06-05 11:09:46', '2023-06-05 12:14:12'),
(2, 'Modernist', 1, '2023-06-05 11:09:54', '2023-06-05 12:14:48'),
(3, 'Fiction', 1, '2023-06-05 11:10:01', '2023-06-05 12:14:07'),
(4, 'Dystopian', 1, '2023-06-05 11:11:55', '2023-06-05 12:14:21'),
(5, 'Coming-of-Age', 1, '2023-06-05 11:12:35', '2023-06-05 12:14:41'),
(6, 'Romance', 1, '2023-06-05 11:20:08', '2023-06-05 12:14:31'),
(7, 'Stream of Consciousness', 1, '2023-06-05 12:14:53', '2023-06-05 12:14:53'),
(8, 'Adventure', 1, '2023-06-05 12:15:00', '2023-06-05 12:15:00'),
(9, 'Fantasy', 1, '2023-06-05 12:15:08', '2023-06-05 12:15:08'),
(10, 'Epic', 1, '2023-06-05 12:15:12', '2023-06-05 12:15:12'),
(11, 'Gothic', 1, '2023-06-05 12:15:17', '2023-06-05 12:15:17'),
(12, 'Greek Mythology', 1, '2023-06-05 12:15:28', '2023-06-05 12:15:28');

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
(1, 2, 2, 1, 3, '2023-06-08', '2023-06-05', '2023-06-05 13:02:00', '2023-06-05 13:09:48'),
(2, 2, 3, 1, 3, '2023-06-04', '2023-06-05', '2023-06-05 13:11:22', '2023-06-05 13:15:46'),
(3, 5, 3, 1, 3, '2023-06-08', '2023-06-05', '2023-06-05 13:12:17', '2023-06-05 13:59:14'),
(4, 2, 2, 1, 3, '2023-06-08', '2023-06-05', '2023-06-05 13:20:44', '2023-06-05 13:59:16'),
(5, 2, 3, 1, 3, '2023-06-08', '2023-06-05', '2023-06-05 13:36:26', '2023-06-05 13:59:26'),
(7, 2, 11, 1, 3, '2023-06-08', '2023-06-05', '2023-06-05 13:41:35', '2023-06-05 13:59:18'),
(8, 5, 2, 2, 2, NULL, NULL, '2023-06-05 13:44:31', '2023-06-05 13:58:57');

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
(1, 'John Cloyd', 'Rosios', 'johncloyd', 'johncloyd@yopmail.com', '202cb962ac59075b964b07152d234b70', '09312149163', 'p_647dd6534f51f.jpg', 'Active', 'Developer', '576 Cedar Lane', 1, '2023-06-01 23:27:45', '2023-06-05 12:34:27'),
(2, 'Student 1', 'Magalona', 'student1', 'student1@yopmail.com', '202cb962ac59075b964b07152d234b70', '09312149163', 'p_647dd4a26b6a1.jpg', 'Active', 'BSIT', '576 Cedar Lane', 2, '2023-06-01 23:27:45', '2023-06-05 12:27:14'),
(3, 'Student 2', 'Lion', 'student2', 'student2@yopmail.com', '202cb962ac59075b964b07152d234b70', '09848589567', 'p_647dd49b29c4c.jpg', 'Active', 'BS-HRM', '576 Cedar LaneLuedit', 2, '2023-06-04 09:52:38', '2023-06-05 12:27:07'),
(4, 'MJ', 'Pins', 'mj', 'mj@yopmail.com', '202cb962ac59075b964b07152d234b70', '093893383838', 'p_647dd6451385d.jpg', 'Active', 'Senior Developer', 'Basak, Mandaue City', 1, '2023-06-04 10:25:06', '2023-06-05 12:35:12'),
(5, 'Teacher 1', 'Galoeqe', 'teacher', 'teacher@yopmail.com', '202cb962ac59075b964b07152d234b70', '0922998378', 'p_647dd431d840f.jpg', 'Active', 'Teacher in Math', '576 Cedar Lane', 3, '2023-06-04 10:41:27', '2023-06-05 12:25:21');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `book_categories`
--
ALTER TABLE `book_categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `issue_book`
--
ALTER TABLE `issue_book`
  MODIFY `issue_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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

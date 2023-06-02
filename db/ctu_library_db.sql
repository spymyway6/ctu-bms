-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 02, 2023 at 10:14 AM
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
(1, 'AN-2023-06-1', 'Save the book 1', 'MJj', 'John', '1st Edition', '2023-06-17', '2023-06-02', 'Mandaue', 2, 2, 0, 'Business & Money', 'p_64797e9cdc0da.jpg', 'Active', '2023-06-02 03:29:56', '2023-06-02 06:19:59'),
(2, 'AN-2023-06-2', 'My Jenyy', 'John', 'Loyd', '2nd', '2023-06-16', '2023-05-29', 'Basak', 2, 2, 0, 'Personal Development', '', 'Active', '2023-06-02 03:31:42', '2023-06-02 06:26:57'),
(3, 'AN-2023-06-3', 'Book2', 'wqwe', 'qwe', 'qwe', '2023-06-16', '2023-06-08', 'qwe', 2, 4, 0, 'Autobiography', '', 'Active', '2023-06-02 03:32:46', '2023-06-02 09:02:24'),
(4, 'AN-2023-06-4', 'Change Image', 'awe', 'qwe', 'qwe', '2023-06-03', '2023-05-31', 'qwe', 2, 2, 0, 'Autobiography', 'p_6479811ecd5f3.jpg', 'Inactive', '2023-06-02 03:33:19', '2023-06-02 06:27:01'),
(5, 'AN-2023-06-5', 'book4', 'qwe', 'qwe', 'qwe', '2023-06-01', '2023-06-03', 'qwe', 4, 4, 0, 'Autobiography', 'p_64797dc79a16e.jpg', 'Active', '2023-06-02 03:36:52', '2023-06-02 08:27:37'),
(6, 'AN-2023-06-6', 'book5', 'qwe', 'qwe', 'qwe', '2023-06-03', '2023-06-03', 'wqe', 2, 2, 0, 'Autobiography', '', 'Inactive', '2023-06-02 03:37:30', '2023-06-02 06:27:19'),
(7, 'AN-2023-06-7', 'Save the book 5', 'MJj', '3', 'qwe', '2023-06-03', '2023-06-16', 'qwe', 3, 3, 0, 'Business & Money', 'p_64797fa66213e.jpg', 'Inactive', '2023-06-02 05:35:34', '2023-06-02 09:42:44'),
(8, '2023-06-02-8', 'Save the book 2323', 'MJj', 'John', '1st Edition', '2023-06-08', '2023-06-13', 'Mandaue', 23, 23, 0, 'Autobiography', '', 'Active', '2023-06-02 05:43:31', '2023-06-02 06:27:24'),
(9, '2323', 'Save the book 1', 'MJj', 'qwe-edit', '1st Edition', '2023-06-02', '2023-06-01', 'qwe', 3, 3, 0, 'Autobiography', '', 'Active', '2023-06-02 05:45:45', '2023-06-02 06:27:26'),
(10, '2323', 'Save the book 2323', 'MJj', 'qwe', '1st Edition', '2023-06-02', '2023-07-05', 'Mandaue', 23, 23, 0, 'Business & Money', '', 'Active', '2023-06-02 06:20:21', '2023-06-02 06:27:29'),
(11, '2323', 'Save the book 2323', 'MJj', 'qwe', '1st Edition', '2023-06-02', '2023-07-05', 'Mandaue', 23, 23, 0, 'Business & Money', '', 'Active', '2023-06-02 06:20:33', '2023-06-02 09:33:18'),
(12, '2323', 'Test 1', 'MJj', 'qwe', '1st Edition', '2023-06-02', '2023-06-28', 'Mandaue', 3, 1, 2, 'Autobiography', 'p_64798b46aa416.jpg', 'Active', '2023-06-02 06:25:10', '2023-06-02 09:49:13');

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
(4, 2, 5, 1, 3, '2023-06-05', '2023-06-02', '2023-06-02 07:20:01', '2023-06-02 09:24:26'),
(5, 2, 3, 1, 3, '2023-06-05', '2023-06-02', '2023-06-02 08:46:04', '2023-06-02 09:24:34'),
(6, 2, 11, 1, 3, '2023-06-05', '2023-06-02', '2023-06-02 09:18:00', '2023-06-02 09:33:18'),
(7, 2, 12, 1, 2, NULL, NULL, '2023-06-02 09:34:15', '2023-06-02 09:35:27'),
(8, 2, 12, 1, 3, '2023-06-05', '2023-06-02', '2023-06-02 09:38:18', '2023-06-02 09:49:13'),
(9, 2, 12, 1, 1, '2023-06-01', NULL, '2023-06-02 09:38:29', '2023-06-02 10:02:24');

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
  `role` int NOT NULL COMMENT '1 Admin, 2 Student',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `contact`, `pic`, `status`, `department`, `address`, `role`, `created_at`, `updated_at`) VALUES
(1, 'John Cloyd', 'Rosios', 'johncloyd', 'jcboy0923@gmail.com', '202cb962ac59075b964b07152d234b70', '09312149163', '', 'Yes', '', '', 1, '2023-06-01 23:27:45', '2023-06-01 23:56:24'),
(2, 'Merz', 'Cepeda', 'merz', 'merz@gmail.com', '202cb962ac59075b964b07152d234b70', '09312149163', '', 'Yes', '', '', 2, '2023-06-01 23:27:45', '2023-06-01 23:56:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_book`
--
ALTER TABLE `issue_book`
  ADD PRIMARY KEY (`issue_id`);

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
-- AUTO_INCREMENT for table `issue_book`
--
ALTER TABLE `issue_book`
  MODIFY `issue_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

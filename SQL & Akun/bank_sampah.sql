-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2020 at 09:18 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank_sampah`
--

-- --------------------------------------------------------

--
-- Table structure for table `beswans`
--

CREATE TABLE `beswans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beswans`
--

INSERT INTO `beswans` (`id`, `name`, `school`, `created_at`, `updated_at`) VALUES
(1, 'Budi', 'SMAN 11 Yogyakarta', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'kertas'),
(2, 'plastik'),
(3, 'kaca'),
(4, 'besi'),
(5, 'logam'),
(6, 'elektronik'),
(7, 'lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transactions`
--

CREATE TABLE `detail_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `trash_id` int(11) NOT NULL,
  `weight` double(8,2) NOT NULL,
  `price` int(11) NOT NULL,
  `donatur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_transactions`
--

INSERT INTO `detail_transactions` (`id`, `transaction_id`, `trash_id`, `weight`, `price`, `donatur`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 500.00, 700000, 'Dummy', NULL, NULL),
(2, 2, 1, 700.00, 800000, 'Anto', NULL, NULL),
(3, 3, 4, 500.00, 500000, 'Tono', NULL, NULL),
(4, 4, 6, 900.00, 900000, 'Bima', NULL, NULL),
(5, 5, 6, 750.00, 750000, 'Bimbim', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_12_012838_create_transactions_table', 1),
(3, '2019_12_12_013212_create_categories_table', 1),
(4, '2019_12_12_013241_create_trashes_table', 1),
(5, '2019_12_12_013306_create_detail_transactions_table', 1),
(6, '2020_02_23_160337_create_notifications_table', 1),
(7, '2020_07_04_060040_create_beswans_table', 1),
(8, '2020_07_04_060154_create_payments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `information` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `beswan_id` int(11) NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `beswan_id`, `month`, `year`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'Februari', 2020, 300000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `weightTotal` double(8,2) NOT NULL,
  `priceTotal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `date`, `weightTotal`, `priceTotal`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-03-02', 1000.00, 1400000, NULL, '2020-11-03 01:12:35'),
(2, 1, '2020-05-05', 700.00, 800000, NULL, NULL),
(3, 1, '2019-03-08', 500.00, 500000, NULL, NULL),
(4, 1, '2020-03-11', 900.00, 900000, NULL, NULL),
(5, 1, '2019-11-20', 750.00, 750000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trashes`
--

CREATE TABLE `trashes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `trash_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trashes`
--

INSERT INTO `trashes` (`id`, `category_id`, `trash_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kardus', NULL, NULL),
(2, 1, 'HVS', NULL, NULL),
(3, 2, 'Botol', NULL, NULL),
(4, 3, 'UC1000', NULL, NULL),
(5, 4, 'Besi A', NULL, NULL),
(6, 5, 'Tembaga Kabel', NULL, NULL),
(7, 6, 'HP', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', '$2y$10$TjdKxBSWfhL2x.MdBY2ZtuugCX7jDHURakIJfRxiM5OkZqrxqe6lK', 'Super Admin', 'super admin', NULL, '2020-11-03 07:38:53', '2020-11-03 01:05:10'),
(2, 'admin', '$2y$10$ZiHh0l81Ag.noDWqSfddJuBRHI0cqQP7310cIWksQGd0hoskjy9gS', 'Admin', 'admin', NULL, '2020-11-03 01:06:13', '2020-11-03 01:06:13'),
(3, 'beswan', '$2y$10$rU/tsIHsuAEDoUGsnvqJ2OI/mM.mJkj6vjjKo9oqJknU33ISanAW.', 'Beswan', 'beswan', NULL, '2020-11-03 01:06:37', '2020-11-03 01:06:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beswans`
--
ALTER TABLE `beswans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_transactions`
--
ALTER TABLE `detail_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trashes`
--
ALTER TABLE `trashes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beswans`
--
ALTER TABLE `beswans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `detail_transactions`
--
ALTER TABLE `detail_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trashes`
--
ALTER TABLE `trashes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

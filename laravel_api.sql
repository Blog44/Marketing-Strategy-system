-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2018 at 12:28 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `interest_id` int(11) NOT NULL,
  `budget` int(11) NOT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `product_id`, `location_id`, `interest_id`, `budget`, `duration`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 6, 12000, '7 days', '2018-04-18 22:17:21', '2018-04-18 22:47:54'),
(6, 1, 1, 1, 23000, '5 days', '2018-04-19 01:39:07', '2018-04-19 01:39:07');

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
  `id` int(10) UNSIGNED NOT NULL,
  `interest_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`id`, `interest_name`, `created_at`, `updated_at`) VALUES
(1, 'games', '2018-04-18 21:48:11', '2018-04-18 21:48:11'),
(2, 'dance', '2018-04-18 21:48:26', '2018-04-18 22:21:36'),
(3, 'birthday', '2018-04-18 21:48:34', '2018-04-18 21:48:34'),
(4, 'mothers day', '2018-04-18 21:50:02', '2018-04-18 21:50:02'),
(5, 'childrens day', '2018-04-18 21:50:12', '2018-04-18 21:50:12'),
(6, 'dance', '2018-04-18 21:50:53', '2018-04-18 21:50:53'),
(7, 'tennis', '2018-04-18 21:51:54', '2018-04-18 21:51:54'),
(8, 'football', '2018-04-18 21:52:22', '2018-04-18 21:52:22'),
(9, 'football', '2018-04-18 21:52:44', '2018-04-18 21:52:44');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `location_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location_name`, `created_at`, `updated_at`) VALUES
(1, 'kathmandu', '2018-04-18 21:52:58', '2018-04-18 21:52:58'),
(3, 'kathmandu', '2018-04-18 21:53:19', '2018-04-19 00:40:56'),
(4, 'lalitpur', '2018-04-19 00:42:47', '2018-04-19 00:42:47'),
(6, 'location_name', '2018-04-19 01:10:52', '2018-04-19 01:10:52'),
(7, 'Damak', '2018-04-19 01:27:53', '2018-04-19 01:27:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2018_04_06_065221_create_ad_table', 1),
(12, '2018_04_06_065947_create_target_user_table', 1),
(13, '2018_04_06_070428_create_interest_table', 1),
(14, '2018_04_06_070518_create_location_table', 1),
(97, '2018_04_07_081327_create_locations_table', 2),
(113, '2014_10_12_000000_create_users_table', 3),
(114, '2014_10_12_100000_create_password_resets_table', 3),
(115, '2018_04_02_151444_create_products_table', 3),
(116, '2018_04_07_080743_create_targets_table', 3),
(117, '2018_04_07_081526_create_interests_table', 3),
(118, '2018_04_07_081847_create_ads_table', 3),
(119, '2018_04_18_084908_create_locations_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `no_of_order`, `created_at`, `updated_at`) VALUES
(1, 'cake', 100, NULL, '2018-04-18 22:35:03'),
(3, 'product_name', 5, '2018-04-19 01:24:05', '2018-04-19 01:24:05'),
(4, 'Earring', 10, '2018-04-19 01:26:08', '2018-04-19 01:26:08'),
(5, 'Wedding cake', 19, '2018-04-19 01:26:25', '2018-04-19 01:26:25'),
(6, 'Necklace', 25, '2018-04-19 01:27:02', '2018-04-19 01:27:02'),
(7, 'Cup', 50, '2018-04-19 01:27:23', '2018-04-19 01:27:23'),
(8, 'cake', 15, '2018-04-20 03:32:30', '2018-04-20 03:32:30'),
(9, 'Skirt', 5, '2018-04-20 03:35:09', '2018-04-20 03:35:09');

-- --------------------------------------------------------

--
-- Table structure for table `targets`
--

CREATE TABLE `targets` (
  `id` int(10) UNSIGNED NOT NULL,
  `ad_id` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `targets`
--

INSERT INTO `targets` (`id`, `ad_id`, `age`, `gender`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 'Male', '2018-04-18 22:13:22', '2018-04-18 22:13:22'),
(2, 2, 10, 'male', '2018-04-18 22:17:21', '2018-04-18 22:47:54'),
(3, 3, 10, 'male', '2018-04-19 00:48:20', '2018-04-19 00:48:20'),
(4, 4, 10, 'male', '2018-04-19 00:49:15', '2018-04-19 00:49:15'),
(5, 5, 30, 'male', '2018-04-19 01:37:22', '2018-04-19 01:37:22'),
(6, 6, 25, 'female', '2018-04-19 01:39:07', '2018-04-19 01:39:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `targets`
--
ALTER TABLE `targets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `targets`
--
ALTER TABLE `targets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2023 at 05:35 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_with_auth`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `product_title` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `name`, `email`, `phone`, `address`, `product_title`, `price`, `quantity`, `image`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(27, 'experiment', 'munabbirulsaqlain@yahoo.com', '79689413748', 'ijdfgioufgwe890', 'Dynamic Directives Representative', '1368', '4', '1691893311.jpg', '1', '4', '2023-09-15 10:35:58', '2023-09-15 19:33:04');

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catagory_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`id`, `catagory_name`, `created_at`, `updated_at`) VALUES
(1, 'Shirt', '2023-08-10 08:38:36', '2023-08-10 08:38:36'),
(2, 'laptop', '2023-08-12 20:17:41', '2023-08-12 20:17:41'),
(3, 'monitor', '2023-08-12 20:17:47', '2023-08-12 20:17:47'),
(4, 'mouse', '2023-08-12 20:17:53', '2023-08-12 20:17:53'),
(5, 'car', '2023-08-12 20:17:55', '2023-08-12 20:17:55'),
(6, 'pant', '2023-08-12 20:18:00', '2023-08-12 20:18:00'),
(7, 'shoe', '2023-08-12 20:18:05', '2023-08-12 20:18:05'),
(8, 'smartphone', '2023-08-12 20:18:13', '2023-08-12 20:18:13'),
(9, 'keyboard', '2023-08-12 21:47:12', '2023-08-12 21:47:12');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `comment` longtext DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `user_id`, `created_at`, `updated_at`, `product_id`) VALUES
(3, 'experiment', 'fhdfgbhdfg', '4', '2023-09-12 10:35:38', '2023-09-12 10:35:38', NULL),
(4, 'experiment', 'dagdafaf', '4', '2023-09-12 10:40:29', '2023-09-12 10:40:29', NULL),
(5, 'experiment', 'dvcvefdbhdfvb', '4', '2023-09-13 09:33:35', '2023-09-13 09:33:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_07_03_162038_create_catagories_table', 1),
(7, '2023_07_09_080627_create_products_table', 1),
(8, '2023_08_08_064929_create_carts_table', 1),
(9, '2023_08_09_042039_create_sessions_table', 1),
(10, '2023_08_19_075242_create_orders_table', 2),
(11, '2023_09_02_183304_create_notifications_table', 3),
(12, '2023_09_12_153723_create_comments_table', 4),
(13, '2023_09_12_154107_create_replies_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `product_title` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `delivery_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `product_title`, `quantity`, `price`, `image`, `product_id`, `payment_status`, `delivery_status`, `created_at`, `updated_at`) VALUES
(1, '2', 'user', 'user@gmail.com', '24563463', 'userdafgwdt24e', 'Dynamic Directives Representative', '1', '342', '1691893311.jpg', '1', 'unpaid', 'Delivered', '2023-08-19 02:48:56', '2023-08-20 08:57:49'),
(2, '2', 'user', 'user@gmail.com', '24563463', 'userdafgwdt24e', 'Monitor', '2', '978', '1691898337.jfif', '2', 'unpaid', 'Delivered', '2023-08-19 02:48:56', '2023-08-20 13:12:36'),
(3, '2', 'user', 'user@gmail.com', '24563463', 'userdafgwdt24e', 'Dynamic Directives Representative', '2', '684', '1691893311.jpg', '1', 'unpaid', 'Confirmed', '2023-08-19 02:53:02', '2023-08-20 13:15:54'),
(4, '2', 'user', 'user@gmail.com', '24563463', 'userdafgwdt24e', 'Car', '2', '976', '1691898413.jfif', '3', 'unpaid', 'Delivered', '2023-08-19 02:56:15', '2023-08-20 13:19:05'),
(5, '2', 'user', 'user@gmail.com', '24563463', 'userdafgwdt24e', 'Monitor', '1', '489', '1691898337.jfif', '2', 'unpaid', 'pending', '2023-08-19 02:57:40', '2023-08-19 02:57:40'),
(6, '2', 'user', 'user@gmail.com', '24563463', 'userdafgwdt24e', 'Monitor', '2', '978', '1691898337.jfif', '2', 'Paid', 'pending', '2023-08-20 02:09:23', '2023-08-20 02:09:23'),
(7, '2', 'user', 'user@gmail.com', '24563463', 'userdafgwdt24e', 'Car', '2', '976', '1691898413.jfif', '3', 'Paid', 'pending', '2023-08-20 02:09:23', '2023-08-20 02:09:23'),
(8, '3', 'Munabbirul Saqlain', 'munabbirulsaqlain@gmail.com', '2345678901', 'fgbsadfdafdsfsd', 'Dynamic Directives Representative', '2', '684', '1691893311.jpg', '1', 'Paid', 'Delivered', '2023-09-03 00:12:58', '2023-09-03 00:13:35'),
(9, '3', 'Munabbirul Saqlain', 'munabbirulsaqlain@gmail.com', '2345678901', 'fgbsadfdafdsfsd', 'Monitor', '1', '489', '1691898337.jfif', '2', 'Paid', 'Delivered', '2023-09-03 00:12:58', '2023-09-03 00:13:38'),
(10, '4', 'experiment', 'munabbirulsaqlain@yahoo.com', '79689413748', 'ijdfgioufgwe890', 'Dynamic Directives Representative', '2', '684', '1691893311.jpg', '1', 'Paid', 'Delivered', '2023-09-03 01:28:19', '2023-09-03 01:28:47'),
(11, '4', 'experiment', 'munabbirulsaqlain@yahoo.com', '79689413748', 'ijdfgioufgwe890', 'Car', '2', '976', '1691898413.jfif', '3', 'Paid', 'canceled', '2023-09-03 01:28:19', '2023-09-04 04:16:33');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `catagory` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `discount_price` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `catagory`, `quantity`, `price`, `discount_price`, `created_at`, `updated_at`, `comments`) VALUES
(1, 'Dynamic Directives Representative', 'Explicabo possimus blanditiis quaerat eos quasi iusto.', '1691893311.jpg', 'smartphone', '598', '318', '342', '2023-08-12 20:21:51', '2023-08-12 20:21:51', NULL),
(2, 'Monitor', 'Voluptate cupiditate quos reiciendis dolor incidunt vitae dolor.', '1691898337.jfif', 'monitor', '133', '510', '489', '2023-08-12 21:45:37', '2023-08-12 21:45:37', NULL),
(3, 'Car', 'Distinctio quos reiciendis.', '1691898413.jfif', 'car', '235', '506', '488', '2023-08-12 21:46:53', '2023-08-12 21:46:53', NULL),
(4, 'keyboard', 'Beatae similique accusamus.', '1691898463.jfif', 'keyboard', '561', '2671', '490', '2023-08-12 21:47:43', '2023-08-12 21:47:43', NULL),
(5, 'Mouse', 'Beatae praesentium vel amet veritatis dicta mollitia asperiores rem nisi.', '1691898506.jfif', 'mouse', '638', '376', '292', '2023-08-12 21:48:26', '2023-08-12 21:48:26', NULL),
(6, 'Pant', 'Quis explicabo enim commodi possimus.', '1691898528.jfif', 'pant', '295', '900', '185', '2023-08-12 21:48:48', '2023-08-12 21:48:48', NULL),
(7, 'shoe', 'Eveniet architecto aspernatur dolorem repudiandae.', '1691898545.jfif', 'shoe', '250', '344', '150', '2023-08-12 21:49:05', '2023-08-12 21:49:05', NULL),
(8, 'phone', 'Excepturi et corporis occaecati explicabo.', '1691898570.jfif', 'smartphone', '384', '2140', '352', '2023-08-12 21:49:30', '2023-08-12 21:49:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `comment_id` varchar(255) DEFAULT NULL,
  `reply` longtext DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `name`, `comment_id`, `reply`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'experiment', '3', 'first reply', '4', '2023-09-13 10:41:21', '2023-09-13 10:41:21'),
(2, 'experiment', '4', '2nd reply', '4', '2023-09-13 10:52:45', '2023-09-13 10:52:45'),
(3, 'experiment', '5', '3rd reply', '4', '2023-09-13 10:53:44', '2023-09-13 10:53:44'),
(4, 'Munabbirul Saqlain', '3', 'reply of reply', '3', '2023-09-13 10:57:40', '2023-09-13 10:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('C5BxLczNiNkraVvfCaPDy0rycEdKP6lKa005BwgJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36 Edg/116.0.1938.81', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQ1J3cUFvZVpBN0FIM0RQTDBHYkgwOUppUDVHVXFJaGxTeGtPdmxhZCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC8/cGFnZT0xIjt9czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3JlZGlyZWN0Ijt9fQ==', 1694834973);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT '0',
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `usertype`, `phone`, `address`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '1', '23453545', 'adminasdfdfas', '2023-09-01 06:39:42', '$2y$10$nbtfQQlqXMt4n/.CNuDUPe7gbt3NK/JMZljWyO7CGBF3P0qugr1wu', NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-10 07:34:50', '2023-08-10 07:34:50'),
(2, 'user', 'user@gmail.com', '0', '24563463', 'userdafgwdt24e', NULL, '$2y$10$k4R.4QtnkTHWJRhdlI./JOU8MAKxADaKckoSuMIbjRBcs3R9ylU46', NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-10 08:04:52', '2023-08-10 08:04:52'),
(3, 'Munabbirul Saqlain', 'munabbirulsaqlain@gmail.com', '1', '2345678901', 'fgbsadfdafdsfsd', '2023-09-01 00:03:35', '$2y$10$8o7fGCkiMRKz4aZYXFbNQuZsNWAMFNcM6wS88nCch/c5r/4MbfpMW', NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-01 00:02:05', '2023-09-01 00:03:35'),
(4, 'experiment', 'munabbirulsaqlain@yahoo.com', '0', '79689413748', 'ijdfgioufgwe890', '2023-09-03 01:27:09', '$2y$10$kUHyaMg8As.p0GkgLlJFI.p/s./rCBH2dKoXtFaYtHmwfQPhsoH12', NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-03 01:26:43', '2023-09-03 01:27:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

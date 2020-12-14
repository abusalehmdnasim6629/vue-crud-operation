-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2020 at 05:24 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `offer_used_id` bigint(20) UNSIGNED NOT NULL,
  `partner_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rate` tinyint(4) NOT NULL DEFAULT 0,
  `feedback` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `offer_used_id`, `partner_id`, `user_id`, `rate`, `feedback`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 5, 'awsome offer .', '2020-11-19 13:45:52', '2020-11-19 13:45:52');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth` date NOT NULL,
  `rankingOfTest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rankingOfODI` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rankingOfT20` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `age`, `birth`, `rankingOfTest`, `rankingOfODI`, `rankingOfT20`, `created_at`, `updated_at`) VALUES
(5, 'A S M Nasim', '42', '2020-12-03', '04', '05', '05', '2020-12-12 08:40:54', '2020-12-12 08:40:54'),
(8, 'Sanjidul Islam', '24', '2020-12-11', '01', '02', '04', '2020-12-14 10:21:24', '2020-12-14 10:22:14');

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
(5, '2020_10_09_213639_create_members_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `partner_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_free` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Active => 1, Inactive => 0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `partner_id`, `description`, `image`, `slug`, `created_at`, `updated_at`, `is_free`) VALUES
(1, 1, 'wow offer for all', 'offer/Oq3m36fOaHtRgs3UHSXXmpxbWTcrcOq6ULMZNJEM.png', 'wow-offer-for-all', '2020-11-19 13:39:07', '2020-11-19 13:39:07', 1),
(2, 32, 'fdsafs', 'dfsadfw', 'frdsadf', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `offer_useds`
--

CREATE TABLE `offer_useds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_passes_id` bigint(20) UNSIGNED NOT NULL,
  `pass_id` bigint(20) UNSIGNED NOT NULL,
  `offer_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `is_used` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => not used, 1 => used',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offer_useds`
--

INSERT INTO `offer_useds` (`id`, `order_passes_id`, `pass_id`, `offer_id`, `user_id`, `is_used`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 1, 2, 1, '2020-11-19 13:45:10', '2020-11-19 13:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_count` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 2 COMMENT 'Admin => 1, Normal User => 2',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Active => 1, Inactive => 0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `neighbourhood_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `phone`, `bio`, `dob`, `age`, `sex`, `address`, `avatar`, `email_verified_at`, `password`, `provider`, `provider_id`, `login_count`, `type`, `status`, `remember_token`, `created_at`, `updated_at`, `city_id`, `neighbourhood_id`) VALUES
(1, 'Admin', 'Admin', 'admin', 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-17 12:53:51', '$2y$10$kbefIvsJjUuP/Fjt/iSRnOt3smphUMXwI/RlycSQ2mMnl5HbI3//S', NULL, NULL, NULL, 1, 1, 'cUQSfsl9gM', '2020-11-17 12:53:52', '2020-11-17 12:53:52', NULL, NULL),
(2, 'Md sazib', 'uddin', 'sazibuddinmd9', 'sazibuddinmd9@gmail.com', '01729441788', 'kljaskldjfklsdj', '1999-06-15', NULL, 'male', 'b-block, newmarket, jessore.', NULL, '2020-11-19 19:40:13', '$2y$10$GjyeP.Y2dMxTE/swlLBX0uIeFkzSmxaEiFU.SD.pyxDOynpLSHHYG', NULL, NULL, NULL, 2, 1, NULL, '2020-11-17 12:56:13', '2020-11-17 13:04:57', NULL, NULL),
(3, 'Sabbir', 'hossian', 'sabbirhossain', 'sabbir@gmail.com', '01631770675', 'zdfsd', '2020-11-10', NULL, 'male', NULL, NULL, NULL, '$2y$10$lC3COvb.EEzDmhZdg/yFye/pcNvwBR3M0.gai4x34QP0M8exR0A7S', NULL, NULL, NULL, 2, 1, NULL, '2020-11-17 14:31:18', '2020-11-17 14:31:18', NULL, NULL),
(4, 'kazi atik', 'foysal', 'atikfoysal', 'atik@gmail.com', '12345678', NULL, '2020-11-04', NULL, 'male', NULL, NULL, NULL, '$2y$10$Tx8dFNoc5ovNBU1f4Uo.V.vlK8/FauQOUMuSiP12Vukie1q17amFC', NULL, NULL, NULL, 2, 1, NULL, '2020-11-17 14:42:24', '2020-11-17 14:42:24', NULL, NULL),
(5, 'Admin', 'asdf', 'ajkfsahdf', 'admin@smartcommerce.com', '01729441733', 'jknklkljkljkl', '2020-11-11', NULL, 'male', 'b-block, newmarket, jessore.', NULL, NULL, '$2y$10$io4AMYZYWtUq.CM0FL3oW.Q.Dtu2ZpUzD69Bm5w3Lz.azYK8/SXTC', NULL, NULL, NULL, 2, 1, NULL, '2020-11-17 14:50:03', '2020-11-17 15:12:17', 3, 5),
(6, 'Mr Sumi', 'sabbir', 'sumisabbir', 'sumisabbir@gmail.com', '1234567890', NULL, '2020-11-03', NULL, 'female', NULL, 'avatar/0EDSfV2EA13aoBULw5kG1019eruaTXWHjxL4Iqnj.jpeg', NULL, '$2y$10$LfI/3wrwRdIwZEXbr/HCc.Zums3zJyUUwjNN9nDlFWourA.a84oQS', NULL, NULL, NULL, 2, 1, NULL, '2020-11-17 15:13:40', '2020-11-17 15:26:36', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offers_partner_id_foreign` (`partner_id`);

--
-- Indexes for table `offer_useds`
--
ALTER TABLE `offer_useds`
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
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `offer_useds`
--
ALTER TABLE `offer_useds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

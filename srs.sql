-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2017 at 03:43 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srs`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(10) UNSIGNED NOT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thana` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `district`, `thana`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 'Mirpur', '2017-12-21 08:34:56', '2017-12-21 08:34:56'),
(2, 'Dhaka', 'Shere Bangla Nagar', '2017-12-21 08:35:40', '2017-12-21 08:35:40');

-- --------------------------------------------------------

--
-- Table structure for table `area_heads`
--

CREATE TABLE `area_heads` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `area_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `area_heads`
--

INSERT INTO `area_heads` (`id`, `user_id`, `area_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2017-12-21 08:34:56', '2017-12-21 08:34:56'),
(2, 3, 2, '2017-12-21 08:35:40', '2017-12-21 08:35:40');

-- --------------------------------------------------------

--
-- Table structure for table `headmasters`
--

CREATE TABLE `headmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `school_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `headmasters`
--

INSERT INTO `headmasters` (`id`, `user_id`, `created_at`, `updated_at`, `school_id`) VALUES
(1, 4, '2017-12-21 08:37:17', '2017-12-21 08:37:17', 1),
(2, 5, '2017-12-21 08:37:41', '2017-12-21 08:37:41', 2);

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
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2017_11_06_144747_create_permission_tables', 1),
(13, '2017_11_07_092207_create_areas_table', 1),
(14, '2017_11_08_134216_create_schools_table', 1),
(15, '2017_11_14_180135_create_school_ranking_criterias_table', 1),
(16, '2017_11_21_192135_create_area_heads_table', 1),
(17, '2017_11_21_195657_create_headmasters_table', 1),
(18, '2017_12_21_142411_create_rank_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_id`, `model_type`) VALUES
(1, 1, 'App\\User'),
(2, 2, 'App\\User'),
(2, 3, 'App\\User'),
(3, 4, 'App\\User'),
(3, 5, 'App\\User');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'add user', 'web', '2017-12-21 08:31:30', '2017-12-21 08:31:30'),
(2, 'edit user', 'web', '2017-12-21 08:31:35', '2017-12-21 08:31:35'),
(3, 'delete user', 'web', '2017-12-21 08:31:40', '2017-12-21 08:31:40'),
(4, 'add area', 'web', '2017-12-21 08:31:45', '2017-12-21 08:31:45'),
(5, 'edit area', 'web', '2017-12-21 08:31:52', '2017-12-21 08:31:52'),
(6, 'delete area', 'web', '2017-12-21 08:32:00', '2017-12-21 08:32:00'),
(7, 'add school', 'web', '2017-12-21 08:32:09', '2017-12-21 08:32:09'),
(8, 'edit school', 'web', '2017-12-21 08:32:14', '2017-12-21 08:32:14'),
(9, 'delete school', 'web', '2017-12-21 08:32:24', '2017-12-21 08:32:24'),
(10, 'add criteria', 'web', '2017-12-21 08:32:29', '2017-12-21 08:32:29'),
(11, 'edit criteria', 'web', '2017-12-21 08:32:34', '2017-12-21 08:32:34'),
(12, 'delete criteria', 'web', '2017-12-21 08:32:39', '2017-12-21 08:32:39');

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `id` int(10) UNSIGNED NOT NULL,
  `rank` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`id`, `rank`, `school_id`, `created_at`, `updated_at`) VALUES
(3, 1, 1, '2017-12-21 08:42:30', '2017-12-21 08:42:30'),
(4, 2, 2, '2017-12-21 08:42:30', '2017-12-21 08:42:30');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'deo', 'web', '2017-12-21 08:32:55', '2017-12-21 08:32:55'),
(2, 'ah', 'web', '2017-12-21 08:33:12', '2017-12-21 08:33:12'),
(3, 'hm', 'web', '2017-12-21 08:33:20', '2017-12-21 08:33:20');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 3),
(11, 1),
(11, 3),
(12, 1),
(12, 3);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `code`, `website`, `email`, `phone`, `area_id`, `created_at`, `updated_at`) VALUES
(1, 'Mirpur Bangla School', 12345, 'http://www.sefiducoha.tv', 'wegotec@yahoo.com', '01676165117', 1, '2017-12-21 08:37:17', '2017-12-21 08:37:17'),
(2, 'Shere Bangla Nagar Govt Boys High School', 12365, 'http://www.wotihuxefak.tv', 'mepohe@hotmail.com', '01676165118', 2, '2017-12-21 08:37:41', '2017-12-21 08:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `school_ranking_criterias`
--

CREATE TABLE `school_ranking_criterias` (
  `id` int(10) UNSIGNED NOT NULL,
  `pass` double(8,2) NOT NULL,
  `attendance` double(8,2) NOT NULL,
  `students` int(11) NOT NULL,
  `fee` int(11) NOT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_ranking_criterias`
--

INSERT INTO `school_ranking_criterias` (`id`, `pass`, `attendance`, `students`, `fee`, `class`, `school_id`, `created_at`, `updated_at`) VALUES
(1, 55.00, 53.00, 73, 42, 'one', 1, '2017-12-21 08:39:15', '2017-12-21 08:39:15'),
(2, 74.00, 72.00, 20, 400, 'two', 1, '2017-12-21 08:39:26', '2017-12-21 08:39:26'),
(3, 70.00, 45.00, 60, 150, 'one', 2, '2017-12-21 08:39:54', '2017-12-21 08:39:54'),
(4, 87.00, 50.00, 150, 600, 'two', 2, '2017-12-21 08:40:13', '2017-12-21 08:40:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@example.com', '$2y$10$AAcfApZvBRm3BV4uOhH8UuZBrHP/orrKklewF4bGBEdPuV7flgYhi', 'MrTALdDUdEjmuhwIcc6L85rYwwAe0gJUVuBFCV5y0k6Yxf5241w9KMIn3KDw', '2017-12-21 08:30:40', '2017-12-21 08:30:40'),
(2, 'ah', 'ah@example.com', '$2y$10$6opiZLfqD8Vl5Ly3DoG4k.SAItmNQ.XSOMlb.2l/Gc3htSbCDzbrC', 'iQqYF5VAWxyK1WpxtwfAzrPcSAeTLW78pLxjhLOCHH0z3YDr6fDy402LOfPa', '2017-12-21 08:34:13', '2017-12-21 08:34:13'),
(3, 'ah2', 'ah2@example.com', '$2y$10$5IQgeZmknBtYSrE0gnqSw.Enehp7lQVzopC6v/qjqVXQ5AmAsXLHC', 'UA4mSTt7vcCdBEHo83HuZfThYV7YZGKNawycP4I4nQnT89NOxEfdljOgz5qg', '2017-12-21 08:34:37', '2017-12-21 08:34:37'),
(4, 'hm', 'hm@example.com', '$2y$10$g343tXVvlmJZVQrnAHLjyeyuYpehgNwX/cw/DvJxZHTM808mAYL/6', 'sEsLaJkYJzohJKf7AZ3dip9KBdGtxUvHqGEeB648YLf5jYEYS4WNRrDYCPnI', '2017-12-21 08:36:18', '2017-12-21 08:36:18'),
(5, 'hm2', 'hm2@example.com', '$2y$10$RH57srzqmvqW.g4p1oE8X.QdMU9etfOD7L52AOtI5mDUDQ8QYiWG6', 'sm101Ih5h198iEWEbggZbdSbJxOuQoPZPEWY9rhkB1xcVD1TFgh01zM2K651', '2017-12-21 08:36:34', '2017-12-21 08:36:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area_heads`
--
ALTER TABLE `area_heads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `area_heads_user_id_foreign` (`user_id`),
  ADD KEY `area_heads_area_id_foreign` (`area_id`);

--
-- Indexes for table `headmasters`
--
ALTER TABLE `headmasters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `headmasters_user_id_foreign` (`user_id`),
  ADD KEY `headmasters_school_id_foreign` (`school_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `schools_code_unique` (`code`),
  ADD KEY `schools_area_id_foreign` (`area_id`);

--
-- Indexes for table `school_ranking_criterias`
--
ALTER TABLE `school_ranking_criterias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_ranking_criterias_school_id_foreign` (`school_id`);

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
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `area_heads`
--
ALTER TABLE `area_heads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `headmasters`
--
ALTER TABLE `headmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `rank`
--
ALTER TABLE `rank`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `school_ranking_criterias`
--
ALTER TABLE `school_ranking_criterias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `area_heads`
--
ALTER TABLE `area_heads`
  ADD CONSTRAINT `area_heads_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`),
  ADD CONSTRAINT `area_heads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `headmasters`
--
ALTER TABLE `headmasters`
  ADD CONSTRAINT `headmasters_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`),
  ADD CONSTRAINT `headmasters_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `schools`
--
ALTER TABLE `schools`
  ADD CONSTRAINT `schools_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`);

--
-- Constraints for table `school_ranking_criterias`
--
ALTER TABLE `school_ranking_criterias`
  ADD CONSTRAINT `school_ranking_criterias_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

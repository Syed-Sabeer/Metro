-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2025 at 05:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelmetro`
--

-- --------------------------------------------------------

--
-- Table structure for table `casefiles`
--

CREATE TABLE `casefiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_id` bigint(20) UNSIGNED NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `casefiles`
--

INSERT INTO `casefiles` (`id`, `case_id`, `file_path`, `created_at`, `updated_at`) VALUES
(2, 2, 'uploads/1736083844_v-b-gmRiGbWsJKU-unsplash.jpg', '2025-01-05 08:30:44', '2025-01-05 08:30:44'),
(3, 2, 'uploads/1736084967_Accounting-Voucher-1-PDF.pdf', '2025-01-05 08:49:27', '2025-01-05 08:49:27');

-- --------------------------------------------------------

--
-- Table structure for table `casenews`
--

CREATE TABLE `casenews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `origin` varchar(255) NOT NULL,
  `priority` varchar(255) NOT NULL,
  `owner_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `case_no` varchar(255) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `casenews`
--

INSERT INTO `casenews` (`id`, `status_id`, `origin`, `priority`, `owner_id`, `client_id`, `case_no`, `account_name`, `subject`, `description`, `created_at`, `updated_at`) VALUES
(2, 8, 'Email', 'High', 5, 6, '9719', 'METRO TEXTILE INC', 'this is subject for dummy case', 'this is description', '2025-01-05 06:27:17', '2025-01-06 08:59:44');

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
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `room_id`, `message`, `created_at`, `updated_at`) VALUES
(40, 5, 2, 'gfhgfgh', '2025-01-06 09:49:50', '2025-01-06 09:49:50'),
(41, 6, 2, 'hjghhjghj', '2025-01-06 09:50:10', '2025-01-06 09:50:10'),
(42, 5, 2, 'vxcvxcvxc', '2025-01-06 09:50:14', '2025-01-06 09:50:14'),
(43, 6, 2, 'dfjdfhjd', '2025-01-06 10:08:21', '2025-01-06 10:08:21'),
(44, 5, 2, 'dsdsd', '2025-01-06 10:09:49', '2025-01-06 10:09:49');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_12_11_095645_create_user_details_table', 2),
(6, '2024_12_31_134215_create_statuses_table', 3),
(7, '2025_01_05_084036_create_casenews_table', 4),
(8, '2025_01_05_093845_create_room_participants_table', 5),
(9, '2025_01_05_131008_create_casefiles_table', 6);

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
-- Table structure for table `room_participants`
--

CREATE TABLE `room_participants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_participants`
--

INSERT INTO `room_participants` (`id`, `case_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 2, 6, '2025-01-05 06:27:17', '2025-01-05 06:27:17'),
(4, 2, 5, '2025-01-05 06:27:17', '2025-01-05 06:27:17'),
(5, 2, 12, '2025-01-05 06:27:17', '2025-01-05 06:27:17');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_name` varchar(255) NOT NULL,
  `status_number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `status_name`, `status_number`, `created_at`, `updated_at`) VALUES
(3, 'New', 1, '2025-01-01 04:08:18', '2025-01-05 03:10:24'),
(4, 'Customer Awaited', 2, '2025-01-01 04:08:37', '2025-01-05 09:54:46'),
(5, 'Factory Awaited', 3, '2025-01-05 09:55:08', NULL),
(6, 'In Process', 4, '2025-01-05 09:56:00', NULL),
(7, 'In Production', 5, '2025-01-05 09:56:18', NULL),
(8, 'Shipped', 6, '2025-01-05 09:56:37', NULL),
(9, 'Delivered', 7, '2025-01-05 09:56:54', NULL),
(10, 'Close', 8, '2025-01-05 09:57:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Owner', 'admin@gmail.com', 'supperadmin', NULL, '$2y$10$ZgNkB4OcnZV/m6P2ZezpoeXQalXozw/M8cB9sOJlReuHzEd8VsrHW', 1, NULL, NULL, NULL),
(6, 'dummy', 'sabeer@gmail.com', 'customer', NULL, '$2y$10$ZgNkB4OcnZV/m6P2ZezpoeXQalXozw/M8cB9sOJlReuHzEd8VsrHW', 1, NULL, '2024-12-11 07:25:56', '2025-01-02 03:07:38'),
(7, 'hazii', 'fehi@mailinator.com', 'customer', NULL, '$2y$12$I/xseywr1Ys8QWI4YAX9a.juadALGAWyd4AbsHhJjQMS79mT1vDMG', 0, NULL, '2024-12-11 08:48:01', '2025-01-06 04:33:27'),
(8, 'Voluptatem velit vit', 'fyrewacypi@mailinator.com', 'customer', NULL, '$2y$12$KStedPsmog3O5r3z5XNXbO2HA0Wm5eNpO9Oh3IqJjDEJTIYsgfI0S', 0, NULL, '2025-01-01 08:06:18', '2025-01-06 03:51:40'),
(9, 'Green and Byrd Associates', 'cemoz@mailinator.com', 'customer', NULL, '$2y$12$R0RMbtapFVHymcPsN6V7AeFRqezGuhYkxwLQ.hhdWfXlKpr7hUsEm', 0, NULL, '2025-01-01 08:40:08', '2025-01-06 03:51:37'),
(11, 'Hampton Mullen LLC', 'pifyr@mailinator.com', 'employee', NULL, '$2y$12$KD/0IOqMNx1M2k5Z2PniBOTLLlZTzSafFBNIGTM8HJhYu0Bok2zwG', 0, NULL, '2025-01-02 01:54:14', '2025-01-06 05:05:42'),
(12, 'Admin', 'pivu@mailinator.com', 'admin', NULL, '$2y$12$gLeVaUKXRd1WF60Kj1aN4eXNcmMpwwDfp45VkKWVkfcTmK36POsaK', 0, NULL, '2025-01-02 02:20:16', '2025-01-06 08:55:48');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `suite` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `cell_phone_number` varchar(255) DEFAULT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `first_name`, `last_name`, `address`, `suite`, `city`, `state`, `zipcode`, `country`, `cell_phone_number`, `website_url`, `phone`, `fax`, `description`, `created_at`, `updated_at`) VALUES
(1, 5, 'Dummy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+1 (909) 353-1824', '+1 (485) 909-5124', 'Qui quos omnis incid', NULL, NULL),
(2, 6, 'Sierra', 'Bradford', 'Et iure quos qui cil', 'Aut qui est tenetur', 'Quia reiciendis magn', 'Error ut et et dolor', '83960', 'Eos corrupti corru', '+1 (127) 411-3483', 'https://www.lemyhuse.me', '+1 (511) 491-7149', '+1 (928) 836-6534', 'Voluptate quis cumqu', '2024-12-11 07:25:56', '2025-01-01 09:10:51'),
(3, 7, 'hazii', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+1 (796) 994-5114', '+1 (476) 763-2066', 'Officia vero omnis i', '2024-12-11 08:48:01', '2024-12-11 08:48:01'),
(4, 8, 'Vivien Donaldson', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+1 (635) 555-9768', '+1 (141) 961-7286', 'Pariatur Sed laboru', '2025-01-01 08:06:18', '2025-01-01 08:06:18'),
(5, 9, 'Rama', 'Mckinney', 'Culpa quasi qui rei', 'Non ea tempora eos e', 'Veniam elit a quia', 'Incidunt qui quae a', '44012', '37', '+1 (632) 901-9605', 'https://www.wokadabyzew.co.uk', '+1 (586) 949-9951', '+1 (624) 394-6581', 'Sapiente dolore corr', '2025-01-01 08:40:08', '2025-01-01 08:40:08'),
(7, 11, 'Brennan', 'Petty', 'Quidem illo providen', 'Do et illo quia aut', 'Reprehenderit quia q', 'Facere facere iusto', '36474', '96', '+1 (747) 731-6428', 'https://www.kybamihokese.org.au', '+1 (428) 369-1845', '+1 (922) 343-6285', 'Vel aut cillum nulla', '2025-01-02 01:54:14', '2025-01-02 01:54:14'),
(8, 12, 'Hamza', 'Salazar', 'Et qui molestias nos', 'Et mollit in facere', 'Sunt magni commodo i', 'Aut voluptates labor', '57050', '83', '+1 (846) 511-9446', 'https://www.tam.biz', '+1 (157) 256-6163', '+1 (511) 941-1709', 'Adipisicing asperior', '2025-01-02 02:20:16', '2025-01-02 02:20:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `casefiles`
--
ALTER TABLE `casefiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `casefiles_case_id_foreign` (`case_id`);

--
-- Indexes for table `casenews`
--
ALTER TABLE `casenews`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `casenews_case_no_unique` (`case_no`),
  ADD KEY `casenews_owner_id_foreign` (`owner_id`),
  ADD KEY `casenews_client_id_foreign` (`client_id`),
  ADD KEY `casenews_status_id_foreign` (`status_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_sender_id_foreign` (`sender_id`),
  ADD KEY `messages_room_id_foreign` (`room_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `room_participants`
--
ALTER TABLE `room_participants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_participants_case_id_foreign` (`case_id`),
  ADD KEY `room_participants_user_id_foreign` (`user_id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_details_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `casefiles`
--
ALTER TABLE `casefiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `casenews`
--
ALTER TABLE `casenews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_participants`
--
ALTER TABLE `room_participants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `casefiles`
--
ALTER TABLE `casefiles`
  ADD CONSTRAINT `casefiles_case_id_foreign` FOREIGN KEY (`case_id`) REFERENCES `casenews` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `casenews`
--
ALTER TABLE `casenews`
  ADD CONSTRAINT `casenews_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `casenews_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `casenews_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `room_participants`
--
ALTER TABLE `room_participants`
  ADD CONSTRAINT `room_participants_case_id_foreign` FOREIGN KEY (`case_id`) REFERENCES `casenews` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `room_participants_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

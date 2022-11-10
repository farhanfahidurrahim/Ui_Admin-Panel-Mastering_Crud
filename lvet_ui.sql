-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2022 at 04:46 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lvet_ui`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `created_at`, `updated_at`) VALUES
(18, 'Travels', 'travels', NULL, NULL),
(19, 'International', 'international', NULL, NULL),
(20, 'Politics', 'politics', NULL, NULL),
(21, 'Sports', 'sports', NULL, NULL),
(22, 'Entertainment', 'entertainment', NULL, NULL),
(24, 'Business', 'business', NULL, NULL),
(25, 'Bangladesh', 'bangldesh', NULL, NULL),
(26, 'Lifestyle', 'lifestytle', NULL, NULL),
(27, 'Youth', 'youth', NULL, NULL),
(28, 'Opinion', 'opinion', NULL, NULL),
(31, 'Education', 'education', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_04_063331_create_categories_table', 2),
(6, '2022_11_06_161824_create_subcategories_table', 3),
(7, '2022_11_08_032714_create_posts_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `subcategory_id`, `user_id`, `title`, `slug`, `post_date`, `image`, `description`, `tags`, `status`, `created_at`, `updated_at`) VALUES
(2, 20, 12, 1, 'FFR No more mega schemes, go for small rural projects: PM', 'ffr-no-more-mega-schemes-go-for-small-rural-projects-pm', '2022-11-08', 'public/media/ffr-no-more-mega-schemes-go-for-small-rural-projects-pm.jpg', '<p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.22222em; margin-left: 0px; padding: 0px; font-size: 18px; text-rendering: optimizelegibility; line-height: inherit; letter-spacing: 0.5px; color: rgb(0, 0, 0); font-family: &quot;Tiempos Headline&quot;, sans-serif; background-color: rgb(247, 247, 247);\"><span style=\"box-sizing: inherit; line-height: inherit; font-family: &quot;Tiempos Headline Medium&quot;, sans-serif;\">Prime Minister Sheikh Hasina today (November 8, 2022) asked the authorities concerned not to go for mega projects and instead take up small ones focusing on rural development and public welfare.</span></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.22222em; margin-left: 0px; padding: 0px; font-size: 18px; text-rendering: optimizelegibility; line-height: inherit; letter-spacing: 0.5px; color: rgb(0, 0, 0); font-family: &quot;Tiempos Headline&quot;, sans-serif; background-color: rgb(247, 247, 247);\">The prime minister made the directives while chairing the meeting of the Executive Committee of National Economic Council (Ecnec) at NEC conference room in Dhaka\'s Sher-e Bangla Nagar area.</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.22222em; margin-left: 0px; padding: 0px; font-size: 18px; text-rendering: optimizelegibility; line-height: inherit; letter-spacing: 0.5px; color: rgb(0, 0, 0); font-family: &quot;Tiempos Headline&quot;, sans-serif; background-color: rgb(247, 247, 247);\">\"The Prime Minister said the luxury projects can\'t be taken up. But small rural projects or welfare-oriented projects cannot be compromised. Mega projects can\'t be undertaken,\" said Planning Minister MA Mannan while briefing reporters after the meeting.</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.22222em; margin-left: 0px; padding: 0px; font-size: 18px; text-rendering: optimizelegibility; line-height: inherit; letter-spacing: 0.5px; color: rgb(0, 0, 0); font-family: &quot;Tiempos Headline&quot;, sans-serif; background-color: rgb(247, 247, 247);\">Hasina, also the Ecnec chairperson, stressed the need for a thorough feasibility study in case of undertaking any big project.</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.22222em; margin-left: 0px; padding: 0px; font-size: 18px; text-rendering: optimizelegibility; line-height: inherit; letter-spacing: 0.5px; color: rgb(0, 0, 0); font-family: &quot;Tiempos Headline&quot;, sans-serif; background-color: rgb(247, 247, 247);\">She also asked the authorities concerned to find out uncultivated lands everywhere across the country to grow food and other crops.</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.22222em; margin-left: 0px; padding: 0px; font-size: 18px; text-rendering: optimizelegibility; line-height: inherit; letter-spacing: 0.5px; color: rgb(0, 0, 0); font-family: &quot;Tiempos Headline&quot;, sans-serif; background-color: rgb(247, 247, 247);\">\"The Prime Minister said production will have to be raised. Not a single inch of land can be kept uncultivated,\" said Mannan adding that she directed the cabinet secretary to identify the uncultivated lands with the help of deputy commissioners.</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.22222em; margin-left: 0px; padding: 0px; font-size: 18px; text-rendering: optimizelegibility; line-height: inherit; letter-spacing: 0.5px; color: rgb(0, 0, 0); font-family: &quot;Tiempos Headline&quot;, sans-serif; background-color: rgb(247, 247, 247);\">The PM asked everyone to be frugal and stop wastages amid the global recession.</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.22222em; margin-left: 0px; padding: 0px; font-size: 18px; text-rendering: optimizelegibility; line-height: inherit; letter-spacing: 0.5px; color: rgb(0, 0, 0); font-family: &quot;Tiempos Headline&quot;, sans-serif; background-color: rgb(247, 247, 247);\">The Ecnec meeting cleared seven projects with a total estimated cost of Tk 3,981.90 crore (only additional costs of three revised projects were counted here).</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.22222em; margin-left: 0px; padding: 0px; font-size: 18px; text-rendering: optimizelegibility; line-height: inherit; letter-spacing: 0.5px; color: rgb(0, 0, 0); font-family: &quot;Tiempos Headline&quot;, sans-serif; background-color: rgb(247, 247, 247);\">Of the cost, Tk 3,392.33 crore will be drawn from the government\'s fund, while Tk 267.35 crore from the own funds of the organisations concerned and Tk 332.21 crore will come from the foreign sources.</p>', 'Bd,pm,project', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory_name`, `subcategory_slug`, `created_at`, `updated_at`) VALUES
(1, 21, 'Cricket', 'cricket', NULL, NULL),
(3, 18, 'Saint Martin', 'saint-martin', NULL, NULL),
(8, 21, 'Football', 'football', '2022-11-07 09:17:46', '2022-11-07 09:17:46'),
(9, 18, 'Cox Bazar', 'cox-bazar', '2022-11-07 09:18:20', '2022-11-07 09:18:20'),
(10, 22, 'Movie', 'movie', '2022-11-07 09:18:37', '2022-11-07 09:18:37'),
(11, 22, 'Series', 'series', '2022-11-07 09:18:49', '2022-11-07 09:18:49'),
(12, 20, 'Country', 'country', '2022-11-08 00:07:17', '2022-11-08 00:07:17'),
(13, 19, 'Funds', 'funds', '2022-11-08 00:07:34', '2022-11-08 00:07:34'),
(14, 31, 'English', 'english', '2022-11-08 00:09:17', '2022-11-08 00:09:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Farhan Fahidur', 'farhan@gmail.com', NULL, '$2y$10$6qpzew599Z25cIb/TJo6quQAPnM4VxrWzt8VwIEAbYvR4Zq315cm6', 'DfENExPd1GRudn6q4hvXbsSN6jgVAz8v60X100KO3U78sGOFOBE4huqSEeof', '2022-11-04 00:24:51', '2022-11-09 08:25:57'),
(2, 'Md. Fahidur Rahim', 'farhan.fahidurrahim@gmail.com', NULL, '$2y$10$2NMvSxR.L3wNHEkHfA/i9OCJJvaBcIdEJQdFKOR6TikZnLKVGRqsq', NULL, '2022-11-05 06:06:09', '2022-11-05 06:06:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_subcategory_id_foreign` (`subcategory_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

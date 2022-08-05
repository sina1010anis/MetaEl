-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 04, 2022 at 01:02 PM
-- Server version: 8.0.27
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metael`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `status` int NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` bigint UNSIGNED NOT NULL,
  `city_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `addresses_state_id_foreign` (`state_id`),
  KEY `addresses_city_id_foreign` (`city_id`),
  KEY `addresses_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `status`, `location`, `state_id`, `city_id`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 1, 'بلوار اول', 2, 1, '2022-06-22 06:29:52', '2022-06-22 06:29:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `attr_comments`
--

DROP TABLE IF EXISTS `attr_comments`;
CREATE TABLE IF NOT EXISTS `attr_comments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `step_1` int NOT NULL,
  `step_2` int NOT NULL,
  `step_3` int NOT NULL,
  `step_4` int NOT NULL,
  `comment_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attr_comments_comment_id_foreign` (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attr_comments`
--

INSERT INTO `attr_comments` (`id`, `text`, `status`, `step_1`, `step_2`, `step_3`, `step_4`, `comment_id`, `created_at`, `updated_at`) VALUES
(1, 'null', 1, 70, 60, 40, 50, 1, '2022-06-22 06:29:52', '2022-06-22 06:29:52'),
(2, 'null', 1, 70, 60, 40, 50, 2, '2022-06-22 06:29:52', '2022-06-22 06:29:52'),
(3, 'null', 1, 10, 9, 10, 8, 15, '2022-06-14 20:30:37', '2022-06-14 20:30:37'),
(4, 'null', 1, 10, 10, 10, 10, 16, '2022-06-15 12:02:26', '2022-06-15 12:02:26'),
(5, 'null', 1, 100, 100, 100, 100, 17, '2022-06-15 12:04:04', '2022-06-15 12:04:04'),
(6, 'null', 1, 70, 90, 100, 50, 18, '2022-06-15 13:23:25', '2022-06-15 13:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` enum('start','center','end') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `name`, `image`, `url`, `location`, `status`, `created_at`, `updated_at`) VALUES
(1, 'banner_1', 'banner_2.png', 'test', 'start', 1, '2020-10-04 07:00:00', '2020-10-04 07:00:00'),
(2, '3', 'banner_3.jpg', 'test', 'center', 1, '2020-10-04 07:00:00', '2020-10-04 07:00:00'),
(3, '4', 'banner_4.jpg', 'test', 'center', 1, '2020-10-04 07:00:00', '2020-10-04 07:00:00'),
(4, '5', 'banner_2.jpg', 'test', 'end', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `total_price` bigint NOT NULL,
  `number` bigint NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `status` int NOT NULL,
  `size_product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carts_user_id_foreign` (`user_id`),
  KEY `carts_product_id_foreign` (`size_product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `send_price` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `send_price`, `created_at`, `updated_at`) VALUES
(1, 'خراسان رضوی', 85000, '2022-06-22 06:29:52', '2022-06-22 06:29:52'),
(2, 'تهران', 45000, '2022-06-29 06:29:52', '2022-06-22 06:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `comment_panels`
--

DROP TABLE IF EXISTS `comment_panels`;
CREATE TABLE IF NOT EXISTS `comment_panels` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_panels_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment_products`
--

DROP TABLE IF EXISTS `comment_products`;
CREATE TABLE IF NOT EXISTS `comment_products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vote` int NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_products_product_id_foreign` (`product_id`),
  KEY `comment_products_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment_products`
--

INSERT INTO `comment_products` (`id`, `subject`, `text`, `vote`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'بی نظیر!!', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است', 1, 1, 1, '2022-06-22 06:29:52', '2022-06-22 06:29:52'),
(2, 'بی نظیر!!', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است', 1, 1, 1, '2022-06-22 06:29:52', '2022-06-22 06:29:52'),
(17, 'یک محصول عالی !!!!', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww', 1, 1, 1, '2022-06-15 12:04:04', '2022-06-15 12:04:04'),
(16, 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 10, 1, 1, '2022-06-15 12:02:26', '2022-06-15 12:02:26'),
(15, 'یک محصول عالی !!!!', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4', 1, 1, 1, '2022-06-14 20:30:37', '2022-06-14 20:30:37'),
(18, 'zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz', 'zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz', 1, 1, 1, '2022-06-15 13:23:25', '2022-06-15 13:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `datail_products`
--

DROP TABLE IF EXISTS `datail_products`;
CREATE TABLE IF NOT EXISTS `datail_products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `send_price` bigint NOT NULL,
  `send_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `datail_products_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `datail_products`
--

INSERT INTO `datail_products` (`id`, `send_price`, `send_time`, `weight`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 16000, 'نهایتا تا 5 روز', '156', 1, '2022-06-22 06:29:52', '2022-06-22 06:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

DROP TABLE IF EXISTS `data_rows`;
CREATE TABLE IF NOT EXISTS `data_rows` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `data_type_id` int UNSIGNED NOT NULL,
  `field` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

DROP TABLE IF EXISTS `data_types`;
CREATE TABLE IF NOT EXISTS `data_types` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_name_unique` (`name`),
  UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discount_codes`
--

DROP TABLE IF EXISTS `discount_codes`;
CREATE TABLE IF NOT EXISTS `discount_codes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `status` int NOT NULL,
  `score` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `discount_codes_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_codes`
--

INSERT INTO `discount_codes` (`id`, `description`, `value`, `code`, `user_id`, `status`, `score`, `created_at`, `updated_at`) VALUES
(1, 'test', 50, 'test', 0, 0, 5600, '2020-10-04 07:00:00', '2020-10-04 07:00:00'),
(2, 'test2', 40, 'test2', 2, 1, 0, '2020-10-04 07:00:00', '2020-10-04 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `factors`
--

DROP TABLE IF EXISTS `factors`;
CREATE TABLE IF NOT EXISTS `factors` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `mobile` bigint NOT NULL,
  `code_pay` bigint NOT NULL,
  `total_price` bigint NOT NULL,
  `send_status` int NOT NULL,
  `buy_status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `factors_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `factors`
--

INSERT INTO `factors` (`id`, `user_id`, `mobile`, `code_pay`, `total_price`, `send_status`, `buy_status`, `created_at`, `updated_at`) VALUES
(50, 1, 9100000000, 887631, 55085000, 404, 404, '2022-07-24 13:26:49', '2022-07-24 13:26:55'),
(49, 1, 9100000000, 887574, 50085000, 100, 200, '2022-07-24 11:43:53', '2022-07-24 11:44:00'),
(48, 1, 9100000000, 885773, 52085000, 100, 200, '2022-07-21 22:09:49', '2022-07-21 22:09:56'),
(47, 1, 9100000000, 885770, 104085000, 1, 100, '2022-07-21 22:07:13', '2022-07-21 22:07:14'),
(46, 1, 9100000000, 885769, 52085000, 1, 100, '2022-07-21 22:06:54', '2022-07-21 22:06:55');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `filters`
--

DROP TABLE IF EXISTS `filters`;
CREATE TABLE IF NOT EXISTS `filters` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_filter_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `filters_title_filter_id_foreign` (`title_filter_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `filters`
--

INSERT INTO `filters` (`id`, `name`, `title_filter_id`, `created_at`, `updated_at`) VALUES
(1, '8 MG_PEXEL', 1, '2022-06-22 06:29:52', '2022-06-22 06:29:52'),
(2, '16 MG_PEXEL', 1, '2022-06-29 06:29:52', '2022-06-22 06:29:52'),
(3, '32 MG_PEXEL', 1, '2022-06-21 06:31:20', '2022-06-21 06:31:20'),
(4, '2', 2, '2022-07-28 06:24:16', NULL),
(5, '4', 2, '2022-07-28 06:34:08', '2022-07-28 06:34:08'),
(6, '8', 2, '2022-07-28 06:34:08', '2022-07-28 06:34:08'),
(7, '16', 2, '2022-07-28 06:34:08', '2022-07-28 06:34:08'),
(8, 'اندروید', 3, '2022-07-28 06:34:08', '2022-07-28 06:34:08'),
(9, 'IOS', 3, '2022-07-28 06:34:08', '2022-07-28 06:34:08'),
(10, 'TFT', 4, '2022-07-28 06:34:08', '2022-07-28 06:34:08'),
(11, 'Amoled', 4, '2022-07-28 06:34:08', '2022-07-28 06:34:08'),
(12, 'Soper Amoled', 4, '2022-07-28 06:34:08', '2022-07-28 06:34:08');

-- --------------------------------------------------------

--
-- Table structure for table `filter_products`
--

DROP TABLE IF EXISTS `filter_products`;
CREATE TABLE IF NOT EXISTS `filter_products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint UNSIGNED NOT NULL,
  `filter_id` bigint UNSIGNED NOT NULL,
  `title_filter_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `filter_products_product_id_foreign` (`product_id`),
  KEY `filter_products_filter_id_foreign` (`filter_id`),
  KEY `filter_products_title_filter_id_foreign` (`title_filter_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `filter_products`
--

INSERT INTO `filter_products` (`id`, `product_id`, `filter_id`, `title_filter_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, '2022-06-22 06:29:52', '2022-06-22 06:29:52'),
(2, 1, 7, 2, '2022-06-29 06:29:52', '2022-06-22 06:29:52'),
(3, 1, 8, 3, '2022-06-21 06:31:20', '2022-06-21 06:31:20'),
(4, 1, 12, 4, '2022-07-28 04:25:36', '2022-07-28 04:25:36'),
(5, 2, 2, 1, '2022-07-29 04:25:36', '2022-07-28 04:25:36'),
(6, 2, 6, 2, '2022-07-29 04:25:36', '2022-07-29 04:25:36'),
(7, 2, 8, 3, '2022-07-29 04:25:36', '2022-07-29 04:25:36'),
(8, 2, 12, 4, '2022-07-28 04:25:36', '2022-07-28 04:25:36');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `images_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `image`, `product_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'S22', 'product_24.jpg', 1, 1, '2020-10-04 07:00:00', '2020-10-04 07:00:00'),
(2, 'S22', 'product_25.jpg', 1, 1, '2020-10-04 07:00:00', '2020-10-04 07:00:00'),
(3, 'S22', 'product_26.jpg', 1, 1, '2020-10-04 07:00:00', '2020-10-04 07:00:00'),
(4, 'S22', 'product_27.jpg', 1, 1, '2020-10-04 07:00:00', '2020-10-04 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` enum('start','center','end') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `image`, `location`, `created_at`, `updated_at`) VALUES
(1, 'تحویل سریع', 'ارسال به موقع و دقیق به مشتری .', 'item_1.svg', 'start', '2022-06-22 06:29:52', '2022-06-22 06:29:52'),
(2, 'تحویل سریع', 'ارسال به موقع و دقیق به مشتری .', 'item_2.svg', 'center', '2022-06-29 06:29:52', '2022-06-22 06:29:52'),
(3, 'تحویل سریع', 'ارسال به موقع و دقیق به مشتری .', 'item_3.svg', 'end', '2022-06-21 06:31:20', '2022-06-21 06:31:20');

-- --------------------------------------------------------

--
-- Table structure for table `item_footers`
--

DROP TABLE IF EXISTS `item_footers`;
CREATE TABLE IF NOT EXISTS `item_footers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_footer_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `item_footers_title_footer_id_foreign` (`title_footer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `b_menus` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `b_menus` (`id`, `name`, `icon`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'موبایل', 'bi bi-phone', 1, 'Mobile.png', '2022-05-09 05:15:39', '2022-05-10 05:15:39'),
(2, 'کامپیوتر', 'bi bi-pc-display-horizontal', 1, 'pc.png', '2022-05-10 05:15:39', '2022-05-11 05:15:39'),
(3, 'اداری', 'bi bi-building', 1, 'office.png', '2022-05-12 05:15:39', '2022-05-05 05:15:39'),
(4, 'خانه هوشمند', 'bi bi-house', 1, 'home.png', '2022-06-01 05:15:39', '2022-05-31 05:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_30_044427_create_items_table', 1),
(6, '2022_05_30_044656_create_carts_table', 1),
(7, '2022_05_30_044736_create_supports_table', 1),
(8, '2022_05_30_044750_create_states_table', 1),
(9, '2022_05_30_044805_create_banners_table', 1),
(10, '2022_05_30_044835_create_comment_panels_table', 1),
(11, '2022_05_30_044850_create_cities_table', 1),
(12, '2022_05_30_044911_create_reply_comments_table', 1),
(13, '2022_05_30_044928_create_comment_products_table', 1),
(14, '2022_05_30_044952_create_attr_comments_table', 1),
(15, '2022_05_30_045010_create_products_table', 1),
(16, '2022_05_30_045034_create_datail_products_table', 1),
(17, '2022_05_30_045108_create_sun_menus_table', 1),
(18, '2022_05_30_045122_create_menus_table', 1),
(19, '2022_05_30_045136_create_sliders_table', 1),
(20, '2022_05_30_045154_create_offs_table', 1),
(21, '2022_05_30_050940_create_addresses_table', 1),
(22, '2022_06_02_131711_add_name_to_sliders', 2),
(23, '2022_06_04_052746_add_image_to_banners', 3),
(24, '2022_06_06_053736_create_factors_table', 4),
(25, '2022_06_06_054018_create_product_factors_table', 4),
(26, '2022_06_06_054133_create_filters_table', 4),
(27, '2022_06_06_054316_create_title_filters_table', 4),
(28, '2022_06_06_054435_create_filter_products_table', 4),
(29, '2022_06_06_060610_add_slug_to_products', 5),
(30, '2022_06_06_143136_create_title_footers_table', 6),
(31, '2022_06_06_143259_create_item_footers_table', 6),
(32, '2022_06_06_143351_create_brands_table', 6),
(33, '2022_06_08_131411_create_images_table', 7),
(34, '2022_06_09_053318_create_price_products_table', 8),
(35, '2022_06_09_060233_add_price_to_price_product', 9),
(36, '2022_06_09_060751_add_price_to_price_products', 10),
(37, '2022_06_09_060857_add_price_to_price_products', 11),
(38, '2022_06_11_044252_add_vote_to_comment_products', 12),
(39, '2022_06_11_124507_add_step_to_attr_comments', 13),
(40, '2022_06_13_061509_add_user_id_to_reply_comments', 14),
(41, '2022_06_15_141354_create_save_products_table', 15),
(42, '2022_06_16_070012_add_status_to_products', 16),
(43, '2022_07_03_133452_add_banner_to_sun_menus', 17),
(44, '2022_07_07_042156_add_title_filter_id_to_filter_products', 18),
(45, '2022_07_11_055608_add_location_to_addresses', 19),
(46, '2022_07_11_060138_add_user_id_to_addresses', 20),
(47, '2022_07_11_061400_create_news_table', 21),
(48, '2022_07_14_124003_create_return_products_table', 22),
(49, '2022_07_18_054926_add_status_to_carts', 23),
(50, '2022_07_21_121441_create_discount_codes_table', 24),
(51, '2022_07_24_045058_add_score_to_users', 25),
(52, '2016_01_01_000000_add_voyager_user_fields', 26),
(53, '2016_01_01_000000_create_data_types_table', 26);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test', '2022-06-22 06:29:52', '2022-06-22 06:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `offs`
--

DROP TABLE IF EXISTS `offs`;
CREATE TABLE IF NOT EXISTS `offs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `off` int NOT NULL,
  `sub_menu_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `offs_sub_menu_id_foreign` (`sub_menu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `price_products`
--

DROP TABLE IF EXISTS `price_products`;
CREATE TABLE IF NOT EXISTS `price_products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `price_products_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `price_products`
--

INSERT INTO `price_products` (`id`, `name`, `price`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'size 1', 49000000, 1, '2022-06-22 06:29:52', '2022-06-22 06:29:52'),
(2, 'size 2', 50000000, 1, '2022-06-29 06:29:52', '2022-06-22 06:29:52'),
(3, 'size 3', 55000000, 1, '2022-06-22 06:29:52', '2022-06-22 06:29:52'),
(4, 'size 4', 48000000, 1, '2022-06-29 06:29:52', '2022-06-22 06:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint NOT NULL,
  `status` int NOT NULL,
  `description_a` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_menu_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_sub_menu_id_foreign` (`sub_menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `description`, `image`, `price`, `status`, `description_a`, `sub_menu_id`, `created_at`, `updated_at`) VALUES
(1, 'samsung s22 256g 5g', 'samsung-s22-256g-5g', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4', 'product_6.jpg', 48000000, 0, '<h1>S22</h1>\nگوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچی است که با استفاده از پنل Super AMOLED تصاویر شفاف و زنده‌ای را به نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 411 پیکسل را نشان می‌دهد. تراشه‌ی این محصول، Mediatek Helio G80 از تراشه‌های 12 نانومتری شرکت مدیاتک است که به همراه 6 گیگابایت رم عرضه می‌شود. تراشه‌ی گرافیکی Mali-G52 MC2 هم برای پخش ویدئو و بازی مناسب است. این نسخه از گوشی با حافظه 128گیگابایتی عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه داخلی را باز هم افزایش دهید. دوربین اصلی A32 سنسور 64 مگاپیکسلی دارد و از نوع عریض (Wide) است. یک سنسور 8 مگاپیکسلی و دو سنسور 5 مگاپیکسلی دیگر هم در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A32 را تشکیل داده‌اند. دوربین سلفی 20 مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری 5000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C و حسگر اثرانگشت هم از دیگر ویژگی‌های این تازه‌وارد است. سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است تا میان‌رده‌ای با باند ارتباطی مدرن و عمر طولانی باتری روانه بازار کند.\n<div class=\"d-flex justify-content-between my-3\">\n<img src=\"/image/product/product_25.jpg\" class=\"w-25\" alt=\"img\">\n<img src=\"/image/product/product_26.jpg\" class=\"w-25\" alt=\"img\">\n<img src=\"/image/product/product_27.jpg\" class=\"w-25\" alt=\"img\">\n</div>', 1, '2021-10-13 06:59:34', '2020-10-04 07:00:00'),
(2, 'a32', 'a32', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4', 'product_10.jpg', 7500000, 0, 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچی است که با استفاده از پنل Super AMOLED تصاویر شفاف و زنده‌ای را به نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 411 پیکسل را نشان می‌دهد. تراشه‌ی این محصول، Mediatek Helio G80 از تراشه‌های 12 نانومتری شرکت مدیاتک است که به همراه 6 گیگابایت رم عرضه می‌شود. تراشه‌ی گرافیکی Mali-G52 MC2 هم برای پخش ویدئو و بازی مناسب است. این نسخه از گوشی با حافظه 128گیگابایتی عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه داخلی را باز هم افزایش دهید. دوربین اصلی A32 سنسور 64 مگاپیکسلی دارد و از نوع عریض (Wide) است. یک سنسور 8 مگاپیکسلی و دو سنسور 5 مگاپیکسلی دیگر هم در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A32 را تشکیل داده‌اند. دوربین سلفی 20 مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری 5000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C و حسگر اثرانگشت هم از دیگر ویژگی‌های این تازه‌وارد است. سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است تا میان‌رده‌ای با باند ارتباطی مدرن و عمر طولانی باتری روانه بازار کند.', 1, '2021-10-13 06:59:34', '2020-10-04 07:00:00'),
(3, 'mi 11', 'mi-11', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4', 'product_14.jpg', 12000000, 0, 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچی است که با استفاده از پنل Super AMOLED تصاویر شفاف و زنده‌ای را به نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 411 پیکسل را نشان می‌دهد. تراشه‌ی این محصول، Mediatek Helio G80 از تراشه‌های 12 نانومتری شرکت مدیاتک است که به همراه 6 گیگابایت رم عرضه می‌شود. تراشه‌ی گرافیکی Mali-G52 MC2 هم برای پخش ویدئو و بازی مناسب است. این نسخه از گوشی با حافظه 128گیگابایتی عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه داخلی را باز هم افزایش دهید. دوربین اصلی A32 سنسور 64 مگاپیکسلی دارد و از نوع عریض (Wide) است. یک سنسور 8 مگاپیکسلی و دو سنسور 5 مگاپیکسلی دیگر هم در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A32 را تشکیل داده‌اند. دوربین سلفی 20 مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری 5000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C و حسگر اثرانگشت هم از دیگر ویژگی‌های این تازه‌وارد است. سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است تا میان‌رده‌ای با باند ارتباطی مدرن و عمر طولانی باتری روانه بازار کند.', 2, '2021-10-13 06:59:34', '2020-10-04 07:00:00'),
(4, 'poco x3', 'poco-x3', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4', 'product_12.jpg', 80000000, 0, 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچی است که با استفاده از پنل Super AMOLED تصاویر شفاف و زنده‌ای را به نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 411 پیکسل را نشان می‌دهد. تراشه‌ی این محصول، Mediatek Helio G80 از تراشه‌های 12 نانومتری شرکت مدیاتک است که به همراه 6 گیگابایت رم عرضه می‌شود. تراشه‌ی گرافیکی Mali-G52 MC2 هم برای پخش ویدئو و بازی مناسب است. این نسخه از گوشی با حافظه 128گیگابایتی عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه داخلی را باز هم افزایش دهید. دوربین اصلی A32 سنسور 64 مگاپیکسلی دارد و از نوع عریض (Wide) است. یک سنسور 8 مگاپیکسلی و دو سنسور 5 مگاپیکسلی دیگر هم در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A32 را تشکیل داده‌اند. دوربین سلفی 20 مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری 5000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C و حسگر اثرانگشت هم از دیگر ویژگی‌های این تازه‌وارد است. سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است تا میان‌رده‌ای با باند ارتباطی مدرن و عمر طولانی باتری روانه بازار کند.', 2, '2021-10-13 06:59:34', '2020-10-04 07:00:00'),
(5, 'z51 70', 'z51-70', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4', 'product_l_16.jpg', 16000000, 0, 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچی است که با استفاده از پنل Super AMOLED تصاویر شفاف و زنده‌ای را به نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 411 پیکسل را نشان می‌دهد. تراشه‌ی این محصول، Mediatek Helio G80 از تراشه‌های 12 نانومتری شرکت مدیاتک است که به همراه 6 گیگابایت رم عرضه می‌شود. تراشه‌ی گرافیکی Mali-G52 MC2 هم برای پخش ویدئو و بازی مناسب است. این نسخه از گوشی با حافظه 128گیگابایتی عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه داخلی را باز هم افزایش دهید. دوربین اصلی A32 سنسور 64 مگاپیکسلی دارد و از نوع عریض (Wide) است. یک سنسور 8 مگاپیکسلی و دو سنسور 5 مگاپیکسلی دیگر هم در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A32 را تشکیل داده‌اند. دوربین سلفی 20 مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری 5000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C و حسگر اثرانگشت هم از دیگر ویژگی‌های این تازه‌وارد است. سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است تا میان‌رده‌ای با باند ارتباطی مدرن و عمر طولانی باتری روانه بازار کند.', 3, '2021-10-13 06:59:34', '2020-10-04 07:00:00'),
(6, 'z50 70', 'z50-70', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4', 'product_l_17.jpg', 13000000, 0, 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچی است که با استفاده از پنل Super AMOLED تصاویر شفاف و زنده‌ای را به نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 411 پیکسل را نشان می‌دهد. تراشه‌ی این محصول، Mediatek Helio G80 از تراشه‌های 12 نانومتری شرکت مدیاتک است که به همراه 6 گیگابایت رم عرضه می‌شود. تراشه‌ی گرافیکی Mali-G52 MC2 هم برای پخش ویدئو و بازی مناسب است. این نسخه از گوشی با حافظه 128گیگابایتی عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه داخلی را باز هم افزایش دهید. دوربین اصلی A32 سنسور 64 مگاپیکسلی دارد و از نوع عریض (Wide) است. یک سنسور 8 مگاپیکسلی و دو سنسور 5 مگاپیکسلی دیگر هم در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A32 را تشکیل داده‌اند. دوربین سلفی 20 مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری 5000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C و حسگر اثرانگشت هم از دیگر ویژگی‌های این تازه‌وارد است. سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است تا میان‌رده‌ای با باند ارتباطی مدرن و عمر طولانی باتری روانه بازار کند.', 3, '2021-10-13 06:59:34', '2020-10-04 07:00:00'),
(7, 'omen 17GT', 'omen-17GT', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4', 'product_l_8.jpg', 38000000, 0, 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچی است که با استفاده از پنل Super AMOLED تصاویر شفاف و زنده‌ای را به نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 411 پیکسل را نشان می‌دهد. تراشه‌ی این محصول، Mediatek Helio G80 از تراشه‌های 12 نانومتری شرکت مدیاتک است که به همراه 6 گیگابایت رم عرضه می‌شود. تراشه‌ی گرافیکی Mali-G52 MC2 هم برای پخش ویدئو و بازی مناسب است. این نسخه از گوشی با حافظه 128گیگابایتی عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه داخلی را باز هم افزایش دهید. دوربین اصلی A32 سنسور 64 مگاپیکسلی دارد و از نوع عریض (Wide) است. یک سنسور 8 مگاپیکسلی و دو سنسور 5 مگاپیکسلی دیگر هم در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A32 را تشکیل داده‌اند. دوربین سلفی 20 مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری 5000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C و حسگر اثرانگشت هم از دیگر ویژگی‌های این تازه‌وارد است. سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است تا میان‌رده‌ای با باند ارتباطی مدرن و عمر طولانی باتری روانه بازار کند.', 3, '2021-10-13 06:59:34', '2020-10-04 07:00:00'),
(8, 'omen 14GT', 'omen_14GT', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4', 'product_l_10.jpg', 30000000, 0, 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچی است که با استفاده از پنل Super AMOLED تصاویر شفاف و زنده‌ای را به نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 411 پیکسل را نشان می‌دهد. تراشه‌ی این محصول، Mediatek Helio G80 از تراشه‌های 12 نانومتری شرکت مدیاتک است که به همراه 6 گیگابایت رم عرضه می‌شود. تراشه‌ی گرافیکی Mali-G52 MC2 هم برای پخش ویدئو و بازی مناسب است. این نسخه از گوشی با حافظه 128گیگابایتی عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه داخلی را باز هم افزایش دهید. دوربین اصلی A32 سنسور 64 مگاپیکسلی دارد و از نوع عریض (Wide) است. یک سنسور 8 مگاپیکسلی و دو سنسور 5 مگاپیکسلی دیگر هم در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A32 را تشکیل داده‌اند. دوربین سلفی 20 مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری 5000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C و حسگر اثرانگشت هم از دیگر ویژگی‌های این تازه‌وارد است. سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است تا میان‌رده‌ای با باند ارتباطی مدرن و عمر طولانی باتری روانه بازار کند.', 3, '2021-10-13 06:59:34', '2020-10-04 07:00:00'),
(9, 'پرینتر کانن i-SENSYS MF3010\n', 'پرینتر-لیزری-کانن-مدل-i-SENSYS-MF3010\n', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4', 'product_17.jpg', 7500000, 0, 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچی است که با استفاده از پنل Super AMOLED تصاویر شفاف و زنده‌ای را به نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 411 پیکسل را نشان می‌دهد. تراشه‌ی این محصول، Mediatek Helio G80 از تراشه‌های 12 نانومتری شرکت مدیاتک است که به همراه 6 گیگابایت رم عرضه می‌شود. تراشه‌ی گرافیکی Mali-G52 MC2 هم برای پخش ویدئو و بازی مناسب است. این نسخه از گوشی با حافظه 128گیگابایتی عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه داخلی را باز هم افزایش دهید. دوربین اصلی A32 سنسور 64 مگاپیکسلی دارد و از نوع عریض (Wide) است. یک سنسور 8 مگاپیکسلی و دو سنسور 5 مگاپیکسلی دیگر هم در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A32 را تشکیل داده‌اند. دوربین سلفی 20 مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری 5000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C و حسگر اثرانگشت هم از دیگر ویژگی‌های این تازه‌وارد است. سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است تا میان‌رده‌ای با باند ارتباطی مدرن و عمر طولانی باتری روانه بازار کند.', 5, '2021-10-13 06:59:34', '2020-10-04 07:00:00'),
(10, 'پرینتر اچ پی Laser MFP 135w', 'پرینتر-چندکاره-لیزری-اچ-پی-مدل-Laser-MFP-135w', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4', 'product_16.jpg', 6500000, 0, 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچی است که با استفاده از پنل Super AMOLED تصاویر شفاف و زنده‌ای را به نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 411 پیکسل را نشان می‌دهد. تراشه‌ی این محصول، Mediatek Helio G80 از تراشه‌های 12 نانومتری شرکت مدیاتک است که به همراه 6 گیگابایت رم عرضه می‌شود. تراشه‌ی گرافیکی Mali-G52 MC2 هم برای پخش ویدئو و بازی مناسب است. این نسخه از گوشی با حافظه 128گیگابایتی عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه داخلی را باز هم افزایش دهید. دوربین اصلی A32 سنسور 64 مگاپیکسلی دارد و از نوع عریض (Wide) است. یک سنسور 8 مگاپیکسلی و دو سنسور 5 مگاپیکسلی دیگر هم در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A32 را تشکیل داده‌اند. دوربین سلفی 20 مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری 5000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C و حسگر اثرانگشت هم از دیگر ویژگی‌های این تازه‌وارد است. سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است تا میان‌رده‌ای با باند ارتباطی مدرن و عمر طولانی باتری روانه بازار کند.', 5, '2021-10-13 06:59:34', '2020-10-04 07:00:00'),
(11, 'LIDE 220', 'LIDE-220', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4', 'product_l_8.jpg', 6500000, 0, 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچی است که با استفاده از پنل Super AMOLED تصاویر شفاف و زنده‌ای را به نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 411 پیکسل را نشان می‌دهد. تراشه‌ی این محصول، Mediatek Helio G80 از تراشه‌های 12 نانومتری شرکت مدیاتک است که به همراه 6 گیگابایت رم عرضه می‌شود. تراشه‌ی گرافیکی Mali-G52 MC2 هم برای پخش ویدئو و بازی مناسب است. این نسخه از گوشی با حافظه 128گیگابایتی عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه داخلی را باز هم افزایش دهید. دوربین اصلی A32 سنسور 64 مگاپیکسلی دارد و از نوع عریض (Wide) است. یک سنسور 8 مگاپیکسلی و دو سنسور 5 مگاپیکسلی دیگر هم در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A32 را تشکیل داده‌اند. دوربین سلفی 20 مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری 5000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C و حسگر اثرانگشت هم از دیگر ویژگی‌های این تازه‌وارد است. سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است تا میان‌رده‌ای با باند ارتباطی مدرن و عمر طولانی باتری روانه بازار کند.', 6, '2021-10-13 06:59:34', '2020-10-04 07:00:00'),
(12, 'DR F120', 'DR-F120', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4', 'product_l_10.jpg', 8600000, 0, 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچی است که با استفاده از پنل Super AMOLED تصاویر شفاف و زنده‌ای را به نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 411 پیکسل را نشان می‌دهد. تراشه‌ی این محصول، Mediatek Helio G80 از تراشه‌های 12 نانومتری شرکت مدیاتک است که به همراه 6 گیگابایت رم عرضه می‌شود. تراشه‌ی گرافیکی Mali-G52 MC2 هم برای پخش ویدئو و بازی مناسب است. این نسخه از گوشی با حافظه 128گیگابایتی عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه داخلی را باز هم افزایش دهید. دوربین اصلی A32 سنسور 64 مگاپیکسلی دارد و از نوع عریض (Wide) است. یک سنسور 8 مگاپیکسلی و دو سنسور 5 مگاپیکسلی دیگر هم در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A32 را تشکیل داده‌اند. دوربین سلفی 20 مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری 5000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C و حسگر اثرانگشت هم از دیگر ویژگی‌های این تازه‌وارد است. سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است تا میان‌رده‌ای با باند ارتباطی مدرن و عمر طولانی باتری روانه بازار کند.', 5, '2021-10-13 06:59:34', '2020-10-04 07:00:00'),
(13, 'آداپتور سوئیچینگ 12 ولت 30 آمپر کد 04', 'آداپتور-سوئیچینگ-12-ولت-30-آمپر-کد-04', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4', 'product_20.jpg', 350000, 0, 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچی است که با استفاده از پنل Super AMOLED تصاویر شفاف و زنده‌ای را به نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 411 پیکسل را نشان می‌دهد. تراشه‌ی این محصول، Mediatek Helio G80 از تراشه‌های 12 نانومتری شرکت مدیاتک است که به همراه 6 گیگابایت رم عرضه می‌شود. تراشه‌ی گرافیکی Mali-G52 MC2 هم برای پخش ویدئو و بازی مناسب است. این نسخه از گوشی با حافظه 128گیگابایتی عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه داخلی را باز هم افزایش دهید. دوربین اصلی A32 سنسور 64 مگاپیکسلی دارد و از نوع عریض (Wide) است. یک سنسور 8 مگاپیکسلی و دو سنسور 5 مگاپیکسلی دیگر هم در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A32 را تشکیل داده‌اند. دوربین سلفی 20 مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری 5000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C و حسگر اثرانگشت هم از دیگر ویژگی‌های این تازه‌وارد است. سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است تا میان‌رده‌ای با باند ارتباطی مدرن و عمر طولانی باتری روانه بازار کند.', 7, '2021-10-13 06:59:34', '2020-10-04 07:00:00'),
(14, 'آداپتور سوئیچینگ 12 ولت 5 آمپر مدل S-250-12', 'آداپتور-سوئیچینگ-12-ولت-5-آمپر-مدل-S-250-12', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4', 'product_21.jpg', 650000, 0, 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچی است که با استفاده از پنل Super AMOLED تصاویر شفاف و زنده‌ای را به نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 411 پیکسل را نشان می‌دهد. تراشه‌ی این محصول، Mediatek Helio G80 از تراشه‌های 12 نانومتری شرکت مدیاتک است که به همراه 6 گیگابایت رم عرضه می‌شود. تراشه‌ی گرافیکی Mali-G52 MC2 هم برای پخش ویدئو و بازی مناسب است. این نسخه از گوشی با حافظه 128گیگابایتی عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه داخلی را باز هم افزایش دهید. دوربین اصلی A32 سنسور 64 مگاپیکسلی دارد و از نوع عریض (Wide) است. یک سنسور 8 مگاپیکسلی و دو سنسور 5 مگاپیکسلی دیگر هم در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A32 را تشکیل داده‌اند. دوربین سلفی 20 مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری 5000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C و حسگر اثرانگشت هم از دیگر ویژگی‌های این تازه‌وارد است. سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است تا میان‌رده‌ای با باند ارتباطی مدرن و عمر طولانی باتری روانه بازار کند.', 7, '2021-10-13 06:59:34', '2020-10-04 07:00:00'),
(15, 'MICOP FD350', 'MICOP-FD350', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4', 'product_22.jpg', 950000, 0, 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچی است که با استفاده از پنل Super AMOLED تصاویر شفاف و زنده‌ای را به نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 411 پیکسل را نشان می‌دهد. تراشه‌ی این محصول، Mediatek Helio G80 از تراشه‌های 12 نانومتری شرکت مدیاتک است که به همراه 6 گیگابایت رم عرضه می‌شود. تراشه‌ی گرافیکی Mali-G52 MC2 هم برای پخش ویدئو و بازی مناسب است. این نسخه از گوشی با حافظه 128گیگابایتی عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه داخلی را باز هم افزایش دهید. دوربین اصلی A32 سنسور 64 مگاپیکسلی دارد و از نوع عریض (Wide) است. یک سنسور 8 مگاپیکسلی و دو سنسور 5 مگاپیکسلی دیگر هم در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A32 را تشکیل داده‌اند. دوربین سلفی 20 مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری 5000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C و حسگر اثرانگشت هم از دیگر ویژگی‌های این تازه‌وارد است. سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است تا میان‌رده‌ای با باند ارتباطی مدرن و عمر طولانی باتری روانه بازار کند.', 8, '2021-10-13 06:59:34', '2020-10-04 07:00:00'),
(16, 'MICOP RTP9850', 'MICOP-RTP9850', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4', 'product_23.jpg', 1800000, 0, 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچی است که با استفاده از پنل Super AMOLED تصاویر شفاف و زنده‌ای را به نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 411 پیکسل را نشان می‌دهد. تراشه‌ی این محصول، Mediatek Helio G80 از تراشه‌های 12 نانومتری شرکت مدیاتک است که به همراه 6 گیگابایت رم عرضه می‌شود. تراشه‌ی گرافیکی Mali-G52 MC2 هم برای پخش ویدئو و بازی مناسب است. این نسخه از گوشی با حافظه 128گیگابایتی عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه داخلی را باز هم افزایش دهید. دوربین اصلی A32 سنسور 64 مگاپیکسلی دارد و از نوع عریض (Wide) است. یک سنسور 8 مگاپیکسلی و دو سنسور 5 مگاپیکسلی دیگر هم در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A32 را تشکیل داده‌اند. دوربین سلفی 20 مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری 5000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C و حسگر اثرانگشت هم از دیگر ویژگی‌های این تازه‌وارد است. سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است تا میان‌رده‌ای با باند ارتباطی مدرن و عمر طولانی باتری روانه بازار کند.', 8, '2021-10-13 06:59:34', '2020-10-04 07:00:00'),
(17, 's22', 's22', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4', 'product_6.jpg', 48000000, 0, 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچی است که با استفاده از پنل Super AMOLED تصاویر شفاف و زنده‌ای را به نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 411 پیکسل را نشان می‌دهد. تراشه‌ی این محصول، Mediatek Helio G80 از تراشه‌های 12 نانومتری شرکت مدیاتک است که به همراه 6 گیگابایت رم عرضه می‌شود. تراشه‌ی گرافیکی Mali-G52 MC2 هم برای پخش ویدئو و بازی مناسب است. این نسخه از گوشی با حافظه 128گیگابایتی عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه داخلی را باز هم افزایش دهید. دوربین اصلی A32 سنسور 64 مگاپیکسلی دارد و از نوع عریض (Wide) است. یک سنسور 8 مگاپیکسلی و دو سنسور 5 مگاپیکسلی دیگر هم در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A32 را تشکیل داده‌اند. دوربین سلفی 20 مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری 5000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C و حسگر اثرانگشت هم از دیگر ویژگی‌های این تازه‌وارد است. سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است تا میان‌رده‌ای با باند ارتباطی مدرن و عمر طولانی باتری روانه بازار کند.', 1, '2021-10-13 06:59:34', '2020-10-04 07:00:00'),
(18, 'a32', 'a32', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4', 'product_10.jpg', 7500000, 0, 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچی است که با استفاده از پنل Super AMOLED تصاویر شفاف و زنده‌ای را به نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 411 پیکسل را نشان می‌دهد. تراشه‌ی این محصول، Mediatek Helio G80 از تراشه‌های 12 نانومتری شرکت مدیاتک است که به همراه 6 گیگابایت رم عرضه می‌شود. تراشه‌ی گرافیکی Mali-G52 MC2 هم برای پخش ویدئو و بازی مناسب است. این نسخه از گوشی با حافظه 128گیگابایتی عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه داخلی را باز هم افزایش دهید. دوربین اصلی A32 سنسور 64 مگاپیکسلی دارد و از نوع عریض (Wide) است. یک سنسور 8 مگاپیکسلی و دو سنسور 5 مگاپیکسلی دیگر هم در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A32 را تشکیل داده‌اند. دوربین سلفی 20 مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری 5000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C و حسگر اثرانگشت هم از دیگر ویژگی‌های این تازه‌وارد است. سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است تا میان‌رده‌ای با باند ارتباطی مدرن و عمر طولانی باتری روانه بازار کند.', 1, '2021-10-13 06:59:34', '2020-10-04 07:00:00'),
(19, 'mi 11', 'mi-11', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4', 'product_14.jpg', 12000000, 0, 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچی است که با استفاده از پنل Super AMOLED تصاویر شفاف و زنده‌ای را به نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 411 پیکسل را نشان می‌دهد. تراشه‌ی این محصول، Mediatek Helio G80 از تراشه‌های 12 نانومتری شرکت مدیاتک است که به همراه 6 گیگابایت رم عرضه می‌شود. تراشه‌ی گرافیکی Mali-G52 MC2 هم برای پخش ویدئو و بازی مناسب است. این نسخه از گوشی با حافظه 128گیگابایتی عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه داخلی را باز هم افزایش دهید. دوربین اصلی A32 سنسور 64 مگاپیکسلی دارد و از نوع عریض (Wide) است. یک سنسور 8 مگاپیکسلی و دو سنسور 5 مگاپیکسلی دیگر هم در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A32 را تشکیل داده‌اند. دوربین سلفی 20 مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری 5000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C و حسگر اثرانگشت هم از دیگر ویژگی‌های این تازه‌وارد است. سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است تا میان‌رده‌ای با باند ارتباطی مدرن و عمر طولانی باتری روانه بازار کند.', 2, '2021-10-13 06:59:34', '2020-10-04 07:00:00'),
(20, 'poco x3', 'poco-x3', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4', 'product_12.jpg', 80000000, 0, 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچی است که با استفاده از پنل Super AMOLED تصاویر شفاف و زنده‌ای را به نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 411 پیکسل را نشان می‌دهد. تراشه‌ی این محصول، Mediatek Helio G80 از تراشه‌های 12 نانومتری شرکت مدیاتک است که به همراه 6 گیگابایت رم عرضه می‌شود. تراشه‌ی گرافیکی Mali-G52 MC2 هم برای پخش ویدئو و بازی مناسب است. این نسخه از گوشی با حافظه 128گیگابایتی عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه داخلی را باز هم افزایش دهید. دوربین اصلی A32 سنسور 64 مگاپیکسلی دارد و از نوع عریض (Wide) است. یک سنسور 8 مگاپیکسلی و دو سنسور 5 مگاپیکسلی دیگر هم در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A32 را تشکیل داده‌اند. دوربین سلفی 20 مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری 5000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C و حسگر اثرانگشت هم از دیگر ویژگی‌های این تازه‌وارد است. سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است تا میان‌رده‌ای با باند ارتباطی مدرن و عمر طولانی باتری روانه بازار کند.', 2, '2021-10-13 06:59:34', '2020-10-04 07:00:00'),
(21, 'z51 70', 'z51-70', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4', 'product_l_16.jpg', 16000000, 0, 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچی است که با استفاده از پنل Super AMOLED تصاویر شفاف و زنده‌ای را به نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 411 پیکسل را نشان می‌دهد. تراشه‌ی این محصول، Mediatek Helio G80 از تراشه‌های 12 نانومتری شرکت مدیاتک است که به همراه 6 گیگابایت رم عرضه می‌شود. تراشه‌ی گرافیکی Mali-G52 MC2 هم برای پخش ویدئو و بازی مناسب است. این نسخه از گوشی با حافظه 128گیگابایتی عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه داخلی را باز هم افزایش دهید. دوربین اصلی A32 سنسور 64 مگاپیکسلی دارد و از نوع عریض (Wide) است. یک سنسور 8 مگاپیکسلی و دو سنسور 5 مگاپیکسلی دیگر هم در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A32 را تشکیل داده‌اند. دوربین سلفی 20 مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری 5000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C و حسگر اثرانگشت هم از دیگر ویژگی‌های این تازه‌وارد است. سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است تا میان‌رده‌ای با باند ارتباطی مدرن و عمر طولانی باتری روانه بازار کند.', 3, '2021-10-13 06:59:34', '2020-10-04 07:00:00'),
(22, 'z50 70', 'z50-70', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4', 'product_l_17.jpg', 13000000, 0, 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچی است که با استفاده از پنل Super AMOLED تصاویر شفاف و زنده‌ای را به نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 411 پیکسل را نشان می‌دهد. تراشه‌ی این محصول، Mediatek Helio G80 از تراشه‌های 12 نانومتری شرکت مدیاتک است که به همراه 6 گیگابایت رم عرضه می‌شود. تراشه‌ی گرافیکی Mali-G52 MC2 هم برای پخش ویدئو و بازی مناسب است. این نسخه از گوشی با حافظه 128گیگابایتی عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه داخلی را باز هم افزایش دهید. دوربین اصلی A32 سنسور 64 مگاپیکسلی دارد و از نوع عریض (Wide) است. یک سنسور 8 مگاپیکسلی و دو سنسور 5 مگاپیکسلی دیگر هم در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A32 را تشکیل داده‌اند. دوربین سلفی 20 مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری 5000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C و حسگر اثرانگشت هم از دیگر ویژگی‌های این تازه‌وارد است. سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است تا میان‌رده‌ای با باند ارتباطی مدرن و عمر طولانی باتری روانه بازار کند.', 3, '2021-10-13 06:59:34', '2020-10-04 07:00:00'),
(23, 'omen 17GT', 'omen-17GT', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4', 'product_l_8.jpg', 38000000, 0, 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچی است که با استفاده از پنل Super AMOLED تصاویر شفاف و زنده‌ای را به نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 411 پیکسل را نشان می‌دهد. تراشه‌ی این محصول، Mediatek Helio G80 از تراشه‌های 12 نانومتری شرکت مدیاتک است که به همراه 6 گیگابایت رم عرضه می‌شود. تراشه‌ی گرافیکی Mali-G52 MC2 هم برای پخش ویدئو و بازی مناسب است. این نسخه از گوشی با حافظه 128گیگابایتی عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه داخلی را باز هم افزایش دهید. دوربین اصلی A32 سنسور 64 مگاپیکسلی دارد و از نوع عریض (Wide) است. یک سنسور 8 مگاپیکسلی و دو سنسور 5 مگاپیکسلی دیگر هم در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A32 را تشکیل داده‌اند. دوربین سلفی 20 مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری 5000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C و حسگر اثرانگشت هم از دیگر ویژگی‌های این تازه‌وارد است. سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است تا میان‌رده‌ای با باند ارتباطی مدرن و عمر طولانی باتری روانه بازار کند.', 3, '2021-10-13 06:59:34', '2020-10-04 07:00:00');
INSERT INTO `products` (`id`, `name`, `slug`, `description`, `image`, `price`, `status`, `description_a`, `sub_menu_id`, `created_at`, `updated_at`) VALUES
(24, 'omen 14GT', 'omen_14GT', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4', 'product_l_10.jpg', 30000000, 0, 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچی است که با استفاده از پنل Super AMOLED تصاویر شفاف و زنده‌ای را به نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 411 پیکسل را نشان می‌دهد. تراشه‌ی این محصول، Mediatek Helio G80 از تراشه‌های 12 نانومتری شرکت مدیاتک است که به همراه 6 گیگابایت رم عرضه می‌شود. تراشه‌ی گرافیکی Mali-G52 MC2 هم برای پخش ویدئو و بازی مناسب است. این نسخه از گوشی با حافظه 128گیگابایتی عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه داخلی را باز هم افزایش دهید. دوربین اصلی A32 سنسور 64 مگاپیکسلی دارد و از نوع عریض (Wide) است. یک سنسور 8 مگاپیکسلی و دو سنسور 5 مگاپیکسلی دیگر هم در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A32 را تشکیل داده‌اند. دوربین سلفی 20 مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری 5000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C و حسگر اثرانگشت هم از دیگر ویژگی‌های این تازه‌وارد است. سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است تا میان‌رده‌ای با باند ارتباطی مدرن و عمر طولانی باتری روانه بازار کند.', 3, '2021-10-13 06:59:34', '2020-10-04 07:00:00'),
(25, 'پرینتر چندکاره لیزری کانن مدل i-SENSYS MF3010\r\n', 'پرینتر-چندکاره-لیزری-کانن-مدل-i-SENSYS-MF3010\r\n', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4', 'product_17.jpg', 7500000, 0, 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچی است که با استفاده از پنل Super AMOLED تصاویر شفاف و زنده‌ای را به نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 411 پیکسل را نشان می‌دهد. تراشه‌ی این محصول، Mediatek Helio G80 از تراشه‌های 12 نانومتری شرکت مدیاتک است که به همراه 6 گیگابایت رم عرضه می‌شود. تراشه‌ی گرافیکی Mali-G52 MC2 هم برای پخش ویدئو و بازی مناسب است. این نسخه از گوشی با حافظه 128گیگابایتی عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه داخلی را باز هم افزایش دهید. دوربین اصلی A32 سنسور 64 مگاپیکسلی دارد و از نوع عریض (Wide) است. یک سنسور 8 مگاپیکسلی و دو سنسور 5 مگاپیکسلی دیگر هم در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A32 را تشکیل داده‌اند. دوربین سلفی 20 مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری 5000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C و حسگر اثرانگشت هم از دیگر ویژگی‌های این تازه‌وارد است. سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است تا میان‌رده‌ای با باند ارتباطی مدرن و عمر طولانی باتری روانه بازار کند.', 5, '2021-10-13 06:59:34', '2020-10-04 07:00:00'),
(26, 'پرینتر چندکاره لیزری اچ پی مدل Laser MFP 135w', 'پرینتر-چندکاره-لیزری-اچ-پی-مدل-Laser-MFP-135w', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4', 'product_16.jpg', 6500000, 0, 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچی است که با استفاده از پنل Super AMOLED تصاویر شفاف و زنده‌ای را به نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 411 پیکسل را نشان می‌دهد. تراشه‌ی این محصول، Mediatek Helio G80 از تراشه‌های 12 نانومتری شرکت مدیاتک است که به همراه 6 گیگابایت رم عرضه می‌شود. تراشه‌ی گرافیکی Mali-G52 MC2 هم برای پخش ویدئو و بازی مناسب است. این نسخه از گوشی با حافظه 128گیگابایتی عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه داخلی را باز هم افزایش دهید. دوربین اصلی A32 سنسور 64 مگاپیکسلی دارد و از نوع عریض (Wide) است. یک سنسور 8 مگاپیکسلی و دو سنسور 5 مگاپیکسلی دیگر هم در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A32 را تشکیل داده‌اند. دوربین سلفی 20 مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری 5000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C و حسگر اثرانگشت هم از دیگر ویژگی‌های این تازه‌وارد است. سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است تا میان‌رده‌ای با باند ارتباطی مدرن و عمر طولانی باتری روانه بازار کند.', 5, '2021-10-13 06:59:34', '2020-10-04 07:00:00'),
(27, 'LIDE 220', 'LIDE-220', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4', 'product_l_8.jpg', 6500000, 0, 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچی است که با استفاده از پنل Super AMOLED تصاویر شفاف و زنده‌ای را به نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 411 پیکسل را نشان می‌دهد. تراشه‌ی این محصول، Mediatek Helio G80 از تراشه‌های 12 نانومتری شرکت مدیاتک است که به همراه 6 گیگابایت رم عرضه می‌شود. تراشه‌ی گرافیکی Mali-G52 MC2 هم برای پخش ویدئو و بازی مناسب است. این نسخه از گوشی با حافظه 128گیگابایتی عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه داخلی را باز هم افزایش دهید. دوربین اصلی A32 سنسور 64 مگاپیکسلی دارد و از نوع عریض (Wide) است. یک سنسور 8 مگاپیکسلی و دو سنسور 5 مگاپیکسلی دیگر هم در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A32 را تشکیل داده‌اند. دوربین سلفی 20 مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری 5000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C و حسگر اثرانگشت هم از دیگر ویژگی‌های این تازه‌وارد است. سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است تا میان‌رده‌ای با باند ارتباطی مدرن و عمر طولانی باتری روانه بازار کند.', 6, '2021-10-13 06:59:34', '2020-10-04 07:00:00'),
(28, 'DR F120', 'DR-F120', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4', 'product_l_10.jpg', 8600000, 0, 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچی است که با استفاده از پنل Super AMOLED تصاویر شفاف و زنده‌ای را به نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 411 پیکسل را نشان می‌دهد. تراشه‌ی این محصول، Mediatek Helio G80 از تراشه‌های 12 نانومتری شرکت مدیاتک است که به همراه 6 گیگابایت رم عرضه می‌شود. تراشه‌ی گرافیکی Mali-G52 MC2 هم برای پخش ویدئو و بازی مناسب است. این نسخه از گوشی با حافظه 128گیگابایتی عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه داخلی را باز هم افزایش دهید. دوربین اصلی A32 سنسور 64 مگاپیکسلی دارد و از نوع عریض (Wide) است. یک سنسور 8 مگاپیکسلی و دو سنسور 5 مگاپیکسلی دیگر هم در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A32 را تشکیل داده‌اند. دوربین سلفی 20 مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری 5000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C و حسگر اثرانگشت هم از دیگر ویژگی‌های این تازه‌وارد است. سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است تا میان‌رده‌ای با باند ارتباطی مدرن و عمر طولانی باتری روانه بازار کند.', 5, '2021-10-13 06:59:34', '2020-10-04 07:00:00'),
(29, 'آداپتور سوئیچینگ 12 ولت 30 آمپر کد 04', 'آداپتور-سوئیچینگ-12-ولت-30-آمپر-کد-04', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4', 'product_20.jpg', 350000, 0, 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچی است که با استفاده از پنل Super AMOLED تصاویر شفاف و زنده‌ای را به نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 411 پیکسل را نشان می‌دهد. تراشه‌ی این محصول، Mediatek Helio G80 از تراشه‌های 12 نانومتری شرکت مدیاتک است که به همراه 6 گیگابایت رم عرضه می‌شود. تراشه‌ی گرافیکی Mali-G52 MC2 هم برای پخش ویدئو و بازی مناسب است. این نسخه از گوشی با حافظه 128گیگابایتی عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه داخلی را باز هم افزایش دهید. دوربین اصلی A32 سنسور 64 مگاپیکسلی دارد و از نوع عریض (Wide) است. یک سنسور 8 مگاپیکسلی و دو سنسور 5 مگاپیکسلی دیگر هم در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A32 را تشکیل داده‌اند. دوربین سلفی 20 مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری 5000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C و حسگر اثرانگشت هم از دیگر ویژگی‌های این تازه‌وارد است. سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است تا میان‌رده‌ای با باند ارتباطی مدرن و عمر طولانی باتری روانه بازار کند.', 7, '2021-10-13 06:59:34', '2020-10-04 07:00:00'),
(30, 'آداپتور سوئیچینگ 12 ولت 5 آمپر مدل S-250-12', 'آداپتور-سوئیچینگ-12-ولت-5-آمپر-مدل-S-250-12', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4', 'product_21.jpg', 650000, 0, 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچی است که با استفاده از پنل Super AMOLED تصاویر شفاف و زنده‌ای را به نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 411 پیکسل را نشان می‌دهد. تراشه‌ی این محصول، Mediatek Helio G80 از تراشه‌های 12 نانومتری شرکت مدیاتک است که به همراه 6 گیگابایت رم عرضه می‌شود. تراشه‌ی گرافیکی Mali-G52 MC2 هم برای پخش ویدئو و بازی مناسب است. این نسخه از گوشی با حافظه 128گیگابایتی عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه داخلی را باز هم افزایش دهید. دوربین اصلی A32 سنسور 64 مگاپیکسلی دارد و از نوع عریض (Wide) است. یک سنسور 8 مگاپیکسلی و دو سنسور 5 مگاپیکسلی دیگر هم در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A32 را تشکیل داده‌اند. دوربین سلفی 20 مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری 5000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C و حسگر اثرانگشت هم از دیگر ویژگی‌های این تازه‌وارد است. سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است تا میان‌رده‌ای با باند ارتباطی مدرن و عمر طولانی باتری روانه بازار کند.', 7, '2021-10-13 06:59:34', '2020-10-04 07:00:00'),
(31, 'MICOP FD350', 'MICOP-FD350', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4', 'product_22.jpg', 950000, 0, 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچی است که با استفاده از پنل Super AMOLED تصاویر شفاف و زنده‌ای را به نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 411 پیکسل را نشان می‌دهد. تراشه‌ی این محصول، Mediatek Helio G80 از تراشه‌های 12 نانومتری شرکت مدیاتک است که به همراه 6 گیگابایت رم عرضه می‌شود. تراشه‌ی گرافیکی Mali-G52 MC2 هم برای پخش ویدئو و بازی مناسب است. این نسخه از گوشی با حافظه 128گیگابایتی عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه داخلی را باز هم افزایش دهید. دوربین اصلی A32 سنسور 64 مگاپیکسلی دارد و از نوع عریض (Wide) است. یک سنسور 8 مگاپیکسلی و دو سنسور 5 مگاپیکسلی دیگر هم در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A32 را تشکیل داده‌اند. دوربین سلفی 20 مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری 5000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C و حسگر اثرانگشت هم از دیگر ویژگی‌های این تازه‌وارد است. سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است تا میان‌رده‌ای با باند ارتباطی مدرن و عمر طولانی باتری روانه بازار کند.', 8, '2021-10-13 06:59:34', '2020-10-04 07:00:00'),
(32, 'MICOP RTP9850', 'MICOP-RTP9850', 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4', 'product_23.jpg', 1800000, 0, 'گوشی موبایل Galaxy A32 با رم 6 گیگابایتی و حافظه داخلی 128گیگابایت روانه بازار شده است. این محصول دارای صفحه‌نمایش سوپر امولد است و ظاهر زیبایی دارد. سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با نسخه 11 از سیستم‌عامل اندروید روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچی است که با استفاده از پنل Super AMOLED تصاویر شفاف و زنده‌ای را به نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 411 پیکسل را نشان می‌دهد. تراشه‌ی این محصول، Mediatek Helio G80 از تراشه‌های 12 نانومتری شرکت مدیاتک است که به همراه 6 گیگابایت رم عرضه می‌شود. تراشه‌ی گرافیکی Mali-G52 MC2 هم برای پخش ویدئو و بازی مناسب است. این نسخه از گوشی با حافظه 128گیگابایتی عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه داخلی را باز هم افزایش دهید. دوربین اصلی A32 سنسور 64 مگاپیکسلی دارد و از نوع عریض (Wide) است. یک سنسور 8 مگاپیکسلی و دو سنسور 5 مگاپیکسلی دیگر هم در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A32 را تشکیل داده‌اند. دوربین سلفی 20 مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری 5000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C و حسگر اثرانگشت هم از دیگر ویژگی‌های این تازه‌وارد است. سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است تا میان‌رده‌ای با باند ارتباطی مدرن و عمر طولانی باتری روانه بازار کند.', 8, '2021-10-13 06:59:34', '2020-10-04 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_factors`
--

DROP TABLE IF EXISTS `product_factors`;
CREATE TABLE IF NOT EXISTS `product_factors` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `factor_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `price` bigint NOT NULL,
  `number` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_factors_factor_id_foreign` (`factor_id`),
  KEY `product_factors_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_factors`
--

INSERT INTO `product_factors` (`id`, `factor_id`, `product_id`, `price`, `number`, `created_at`, `updated_at`) VALUES
(7, 49, 2, 50000000, 1, '2022-07-24 11:44:00', '2022-07-24 11:44:00'),
(6, 48, 1, 49000000, 1, '2022-07-21 22:09:56', '2022-07-21 22:09:56'),
(5, 48, 3, 55000000, 1, '2022-07-21 22:09:56', '2022-07-21 22:09:56');

-- --------------------------------------------------------

--
-- Table structure for table `reply_comments`
--

DROP TABLE IF EXISTS `reply_comments`;
CREATE TABLE IF NOT EXISTS `reply_comments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reply_comments_comment_product_id_foreign` (`comment_product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reply_comments`
--

INSERT INTO `reply_comments` (`id`, `text`, `comment_product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'به نظر من عالی هستش ', 1, 1, '2022-06-22 06:29:52', '2022-06-22 06:29:52'),
(2, 'من هم خرید مفوق العادس', 1, 0, '2022-06-29 06:29:52', '2022-06-22 06:29:52'),
(3, 'سسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسس', 15, 1, '2022-06-15 13:21:47', '2022-06-15 13:21:47'),
(4, 'من هم موافقم', 2, 1, '2022-06-15 13:22:16', '2022-06-15 13:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `return_products`
--

DROP TABLE IF EXISTS `return_products`;
CREATE TABLE IF NOT EXISTS `return_products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `code` int NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `return_products_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `return_products`
--

INSERT INTO `return_products` (`id`, `user_id`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 12, 1, '2020-10-04 07:00:00', '2022-07-14 21:44:28');

-- --------------------------------------------------------

--
-- Table structure for table `return_product_items`
--

DROP TABLE IF EXISTS `return_product_items`;
CREATE TABLE IF NOT EXISTS `return_product_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `return_product_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `number` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `return_product_items_return_product_id_foreign` (`return_product_id`),
  KEY `return_product_items_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `return_product_items`
--

INSERT INTO `return_product_items` (`id`, `return_product_id`, `product_id`, `number`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, '2020-10-04 07:00:00', '2020-10-04 07:00:00'),
(2, 1, 2, 1, '2020-10-04 07:00:00', '2020-10-04 07:00:00'),
(3, 2, 3, 1, '2020-10-04 07:00:00', '2020-10-04 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `save_products`
--

DROP TABLE IF EXISTS `save_products`;
CREATE TABLE IF NOT EXISTS `save_products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `save_products_product_id_foreign` (`product_id`),
  KEY `save_products_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `save_products`
--

INSERT INTO `save_products` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 0, 1, '2022-06-22 06:29:52', '2022-06-22 06:29:52'),
(2, 0, 1, '2022-06-15 22:24:18', '2022-06-15 22:24:18'),
(3, 1, 1, '2022-06-15 22:45:42', '2022-06-15 22:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` int NOT NULL,
  `status` int NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_menu_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sliders_sub_menu_id_foreign` (`sub_menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `subject`, `description`, `url`, `location`, `status`, `image`, `sub_menu_id`, `created_at`, `updated_at`) VALUES
(1, 'product_1', 'اقتصادی فکر کن ....', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد', '/test', 0, 1, 'product_1.jpg', 0, '2022-06-29 13:07:55', '2022-06-29 13:07:55'),
(2, 'product_2', 'دیدن جزئیات توی گیم مهمه ....', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد', '/test', 0, 1, 'product_2.jpg', 0, '2022-06-29 13:07:55', '2022-06-29 13:07:55'),
(3, 'product_3', 'دوریبن خیلی مهمه  ....', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد', '/test', 0, 1, 'product_3.jpg', 0, '2020-10-04 07:00:00', '2020-10-04 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `states_city_id_foreign` (`city_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 'مشهد', 1, '2022-06-22 06:29:52', '2022-06-22 06:29:52'),
(2, 'نیشابور', 1, '2022-06-29 06:29:52', '2022-06-22 06:29:52'),
(3, 'تهران', 2, '2022-06-21 06:31:20', '2022-06-21 06:31:20'),
(4, 'دی', 2, '2022-07-28 06:24:16', '2022-07-28 04:25:36');

-- --------------------------------------------------------

--
-- Table structure for table `sun_menus`
--

DROP TABLE IF EXISTS `sun_menus`;
CREATE TABLE IF NOT EXISTS `sun_menus` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_menu_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sun_menus_b_menu_id_foreign` (`b_menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sun_menus`
--

INSERT INTO `sun_menus` (`id`, `name`, `banner`, `b_menu_id`, `created_at`, `updated_at`) VALUES
(1, 'سامسونگ', '', 1, '2020-10-04 07:00:00', '2021-10-06 06:33:38'),
(2, 'شیائومی', '', 1, '2020-10-31 07:00:00', '2022-05-11 05:15:39'),
(3, 'لنوو', '', 2, '2020-10-04 07:00:00', '2020-10-04 07:00:00'),
(4, 'اچ پی', '', 2, '2020-10-04 07:00:00', '2020-10-04 07:00:00'),
(5, 'پرینتر', '', 3, '2020-10-04 07:00:00', '2020-10-04 07:00:00'),
(6, 'اسکنر', '', 3, '2020-10-04 07:00:00', '2020-10-04 07:00:00'),
(7, 'اداپتور', '', 4, '2020-10-04 07:00:00', '2020-10-04 07:00:00'),
(8, 'ویس رکورد', '', 4, '2020-10-04 07:00:00', '2020-10-04 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `supports`
--

DROP TABLE IF EXISTS `supports`;
CREATE TABLE IF NOT EXISTS `supports` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `role` int NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `supports_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `title_filters`
--

DROP TABLE IF EXISTS `title_filters`;
CREATE TABLE IF NOT EXISTS `title_filters` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_menu_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `title_filters_b_menu_id_foreign` (`b_menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `title_filters`
--

INSERT INTO `title_filters` (`id`, `subject`, `b_menu_id`, `created_at`, `updated_at`) VALUES
(1, 'دوربین', 1, '2022-06-22 06:29:52', '2022-06-22 06:29:52'),
(2, 'Ram', 1, '2022-06-29 06:29:52', '2022-06-22 06:29:52'),
(3, 'سیستم عامل', 1, '2022-06-21 06:31:20', '2022-06-21 06:31:20'),
(4, 'صفحه نمایش', 1, '2022-07-28 06:24:16', '2022-07-28 06:24:16');

-- --------------------------------------------------------

--
-- Table structure for table `title_footers`
--

DROP TABLE IF EXISTS `title_footers`;
CREATE TABLE IF NOT EXISTS `title_footers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` bigint DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `score` bigint NOT NULL,
  `mobile` bigint NOT NULL,
  `address_id` int NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_mobile_unique` (`mobile`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `score`, `mobile`, `address_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'test', 'sina@gmail.com', 'users/default.png', 100, 9100000000, 1, NULL, '$2y$10$NSjeAXlFRC1xsxV9qIMiKO.cNoHSczn.oPJJrt5Xz5xxluIu5q1RS', NULL, '2022-06-07 13:21:39', '2022-07-24 12:54:32');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

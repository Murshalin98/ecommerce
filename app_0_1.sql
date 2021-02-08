-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 26, 2020 at 07:38 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_0.1`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `phone`, `email`, `address`, `about`, `created_at`, `updated_at`) VALUES
(11, '+01 123 456 789', 'youremail@gmail.com', '52 Web Bangale , Adress line2 , ip:3105', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2020-09-24 02:01:44', '2020-10-19 10:11:17');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `generate_cart_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `size_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `generate_cart_id`, `product_id`, `color_id`, `size_id`, `quantity`, `created_at`, `updated_at`) VALUES
(24, 'CART_20339', 1, 36, 1, '5', '2020-11-21 19:37:56', '2020-11-21 19:38:14');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(26, 'Men\'s Fashion', 'men\'s-fashion', '2020-09-23 06:54:22', '2020-09-23 06:54:22', NULL),
(27, 'Phones & Telecommunications', 'phones-&-telecommunications', '2020-09-23 06:54:30', '2020-09-23 06:54:30', NULL),
(28, 'Computer, Office & Security', 'computer-office-&-security', '2020-09-23 06:54:37', '2020-09-23 06:54:37', NULL),
(29, 'Consumer Electronics', 'consumer-electronics', '2020-09-23 06:54:43', '2020-09-23 06:54:43', NULL),
(30, 'Jewelry & Watches', 'jewelry-&-watches', '2020-09-23 06:54:48', '2020-09-23 06:54:48', NULL),
(31, 'Home, Pet & Appliances', 'home-pet-&-appliances', '2020-09-23 06:54:54', '2020-09-23 06:54:54', NULL),
(32, 'Women\'s Fashion', 'women\'s-fashion', '2020-09-23 06:55:00', '2020-09-23 06:55:00', NULL),
(33, 'Bags & Shoes', 'bags-&-shoes', '2020-09-23 06:55:05', '2020-09-23 06:55:05', NULL),
(34, 'Toys , Kids & Babies', 'toys--kids-&-babies', '2020-09-23 06:55:11', '2020-09-23 06:55:11', NULL),
(35, 'Outdoor Fun & Sports', 'outdoor-fun-&-sports', '2020-09-23 06:55:22', '2020-09-23 06:55:22', NULL),
(36, 'Beauty, Health & Hair', 'beauty-health-&-hair', '2020-09-23 06:55:28', '2020-09-23 06:55:28', NULL),
(37, 'Automobiles & Motorcycles', 'automobiles-&-motorcycles', '2020-09-23 06:55:34', '2020-09-23 06:55:34', NULL),
(38, 'Home Improvement & Tools', 'home-improvement-&-tools', '2020-09-23 06:55:40', '2020-09-23 06:55:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color_name`, `created_at`, `updated_at`) VALUES
(31, 'Red', '2020-09-25 06:44:53', NULL),
(32, 'Green', '2020-09-25 06:45:28', NULL),
(33, 'Gray', '2020-09-25 06:45:39', NULL),
(34, 'Black', '2020-09-25 06:45:53', NULL),
(35, 'White', '2020-09-25 06:46:04', NULL),
(36, 'Blue', '2020-09-25 06:46:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validity` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_code`, `discount`, `validity`, `created_at`, `updated_at`) VALUES
(1, 'New Year Offer', 'newyear21', '10', '2020-10-21 16:50:17', '2020-10-20 22:49:58', '2020-10-21 16:50:17'),
(2, 'Eid', 'eid20', '10', '2020-10-28 16:50:17', '2020-10-21 16:50:17', '2020-10-21 16:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_products`
--

CREATE TABLE `coupon_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupon_products`
--

INSERT INTO `coupon_products` (`id`, `coupon_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 7, '2020-10-21 16:52:55', '2020-10-21 16:52:55'),
(2, 1, 9, '2020-10-21 16:52:55', '2020-10-21 16:52:55'),
(3, 2, 11, '2020-10-21 16:55:16', '2020-10-21 16:55:16');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answear` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answear`, `created_at`, `updated_at`) VALUES
(1, 'General Inquiries', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.', '2020-10-01 09:49:59', NULL),
(2, 'How to Use', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.', '2020-10-01 09:50:10', NULL),
(3, 'Shipping & Delivery 1', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS .', '2020-10-01 09:50:19', '2020-10-19 10:11:28'),
(4, 'Additional Information', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.', '2020-10-01 09:50:42', NULL),
(5, 'Return Policy', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.', '2020-10-01 09:50:53', NULL);

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
(4, '2020_08_23_113233_create_categories_table', 1),
(5, '2020_08_24_121959_create_members_table', 1),
(6, '2020_08_24_183149_create_products_table', 1),
(7, '2020_08_25_090215_create_circulars_table', 1),
(8, '2020_08_26_161533_create_names_table', 1),
(9, '2020_08_28_141012_add_delete_to_categories_table', 1),
(10, '2020_09_03_033014_create_sub_categories_table', 1),
(12, '2020_09_11_182146_create_productsses_table', 2),
(13, '2020_09_12_201816_create_productsses_table', 3),
(14, '2020_09_13_072123_create_colors_table', 4),
(15, '2020_09_13_072442_create_products__attributes_table', 4),
(18, '2020_09_18_180006_create_product_sizes_table', 5),
(19, '2020_09_18_180431_add_size_id_to_products__attributes_table', 6),
(20, '2020_09_22_162923_create_abouts_table', 7),
(21, '2020_09_25_130216_create_products_images_table', 8),
(22, '2020_10_01_150719_create_faqs_table', 9),
(24, '2020_10_04_092915_create_carts_table', 10),
(29, '2020_10_21_163640_create_coupons_table', 11),
(30, '2020_10_21_164231_create_coupon_products_table', 11),
(32, '2020_10_25_165354_create_shippings_table', 12),
(33, '2020_10_25_171751_create_orders_table', 12),
(35, '2020_11_22_014906_create_permission_tables', 13);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_unit_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `shipping_id`, `product_id`, `quantity`, `product_unit_price`, `created_at`, `updated_at`) VALUES
(1, 11, 7, '2', '3.06', '2020-10-31 13:48:08', '2020-10-31 13:48:08'),
(2, 11, 9, '1', '29.69', '2020-10-31 13:48:08', '2020-10-31 13:48:08'),
(3, 11, 11, '3', '19.50', '2020-10-31 13:48:08', '2020-10-31 13:48:08'),
(4, 12, 7, '2', '3.06', '2020-10-31 13:48:18', '2020-10-31 13:48:18'),
(5, 12, 9, '1', '29.69', '2020-10-31 13:48:18', '2020-10-31 13:48:18'),
(6, 12, 11, '3', '19.50', '2020-10-31 13:48:18', '2020-10-31 13:48:18'),
(7, 13, 9, '1', '29.69', '2020-10-31 13:49:30', '2020-10-31 13:49:30'),
(8, 15, 9, '1', '29.69', '2020-10-31 13:50:47', '2020-10-31 13:50:47'),
(9, 16, 9, '5', '29.69', '2020-11-01 10:13:17', '2020-11-01 10:13:17'),
(10, 16, 11, '2', '19.50', '2020-11-01 10:13:17', '2020-11-01 10:13:17'),
(11, 16, 7, '1', '3.06', '2020-11-01 10:13:17', '2020-11-01 10:13:17'),
(12, 17, 9, '5', '29.69', '2020-11-01 10:13:38', '2020-11-01 10:13:38'),
(13, 17, 11, '2', '19.50', '2020-11-01 10:13:38', '2020-11-01 10:13:38'),
(14, 17, 7, '1', '3.06', '2020-11-01 10:13:38', '2020-11-01 10:13:38'),
(15, 18, 9, '5', '29.69', '2020-11-01 10:14:30', '2020-11-01 10:14:30'),
(16, 18, 11, '2', '19.50', '2020-11-01 10:14:30', '2020-11-01 10:14:30'),
(17, 19, 9, '5', '29.69', '2020-11-01 10:29:45', '2020-11-01 10:29:45'),
(18, 19, 11, '2', '19.50', '2020-11-01 10:29:45', '2020-11-01 10:29:45'),
(19, 20, 9, '5', '29.69', '2020-11-01 10:33:23', '2020-11-01 10:33:23'),
(20, 20, 11, '2', '19.50', '2020-11-01 10:33:23', '2020-11-01 10:33:23'),
(21, 21, 9, '5', '29.69', '2020-11-01 10:33:57', '2020-11-01 10:33:57'),
(22, 21, 11, '2', '19.50', '2020-11-01 10:33:57', '2020-11-01 10:33:57'),
(23, 22, 9, '5', '29.69', '2020-11-01 10:34:20', '2020-11-01 10:34:20'),
(24, 22, 11, '2', '19.50', '2020-11-01 10:34:20', '2020-11-01 10:34:20'),
(25, 23, 9, '5', '29.69', '2020-11-01 10:35:37', '2020-11-01 10:35:37'),
(26, 23, 11, '2', '19.50', '2020-11-01 10:35:37', '2020-11-01 10:35:37'),
(27, 24, 9, '5', '29.69', '2020-11-01 10:35:51', '2020-11-01 10:35:51'),
(28, 24, 11, '2', '19.50', '2020-11-01 10:35:51', '2020-11-01 10:35:51'),
(29, 25, 9, '5', '29.69', '2020-11-01 10:36:10', '2020-11-01 10:36:10'),
(30, 25, 11, '2', '19.50', '2020-11-01 10:36:10', '2020-11-01 10:36:10'),
(31, 26, 9, '5', '29.69', '2020-11-01 10:38:05', '2020-11-01 10:38:05'),
(32, 26, 11, '2', '19.50', '2020-11-01 10:38:05', '2020-11-01 10:38:05'),
(33, 27, 9, '5', '29.69', '2020-11-01 10:39:48', '2020-11-01 10:39:48'),
(34, 27, 11, '2', '19.50', '2020-11-01 10:39:48', '2020-11-01 10:39:48'),
(35, 28, 7, '3', '3.06', '2020-11-16 08:50:25', '2020-11-16 08:50:25'),
(36, 28, 9, '2', '29.69', '2020-11-16 08:50:25', '2020-11-16 08:50:25'),
(37, 28, 11, '1', '19.50', '2020-11-16 08:50:25', '2020-11-16 08:50:25'),
(38, 29, 7, '3', '3.06', '2020-11-16 09:15:37', '2020-11-16 09:15:37'),
(39, 29, 9, '2', '29.69', '2020-11-16 09:15:37', '2020-11-16 09:15:37'),
(40, 29, 11, '1', '19.50', '2020-11-16 09:15:37', '2020-11-16 09:15:37'),
(41, 30, 7, '3', '3.06', '2020-11-16 09:17:22', '2020-11-16 09:17:22'),
(42, 30, 9, '2', '29.69', '2020-11-16 09:17:22', '2020-11-16 09:17:22'),
(43, 30, 11, '1', '19.50', '2020-11-16 09:17:22', '2020-11-16 09:17:22'),
(44, 31, 7, '3', '3.06', '2020-11-16 09:20:08', '2020-11-16 09:20:08'),
(45, 31, 9, '2', '29.69', '2020-11-16 09:20:08', '2020-11-16 09:20:08'),
(46, 31, 11, '1', '19.50', '2020-11-16 09:20:08', '2020-11-16 09:20:08'),
(47, 32, 7, '3', '3.06', '2020-11-16 09:20:48', '2020-11-16 09:20:48'),
(48, 32, 9, '2', '29.69', '2020-11-16 09:20:48', '2020-11-16 09:20:48'),
(49, 32, 11, '1', '19.50', '2020-11-16 09:20:48', '2020-11-16 09:20:48'),
(50, 33, 7, '3', '3.06', '2020-11-16 09:21:26', '2020-11-16 09:21:26'),
(51, 33, 9, '2', '29.69', '2020-11-16 09:21:26', '2020-11-16 09:21:26'),
(52, 33, 11, '1', '19.50', '2020-11-16 09:21:26', '2020-11-16 09:21:26'),
(53, 34, 7, '3', '3.06', '2020-11-16 09:45:10', '2020-11-16 09:45:10'),
(54, 34, 9, '2', '29.69', '2020-11-16 09:45:10', '2020-11-16 09:45:10'),
(55, 34, 11, '1', '19.50', '2020-11-16 09:45:10', '2020-11-16 09:45:10'),
(56, 35, 7, '3', '3.06', '2020-11-16 09:45:25', '2020-11-16 09:45:25'),
(57, 35, 9, '2', '29.69', '2020-11-16 09:45:25', '2020-11-16 09:45:25'),
(58, 35, 11, '1', '19.50', '2020-11-16 09:45:25', '2020-11-16 09:45:25'),
(59, 36, 7, '3', '3.06', '2020-11-16 09:45:44', '2020-11-16 09:45:44'),
(60, 36, 9, '2', '29.69', '2020-11-16 09:45:44', '2020-11-16 09:45:44'),
(61, 36, 11, '1', '19.50', '2020-11-16 09:45:44', '2020-11-16 09:45:44'),
(62, 37, 7, '3', '3.06', '2020-11-16 09:46:04', '2020-11-16 09:46:04'),
(63, 37, 9, '2', '29.69', '2020-11-16 09:46:04', '2020-11-16 09:46:04'),
(64, 37, 11, '1', '19.50', '2020-11-16 09:46:04', '2020-11-16 09:46:04'),
(65, 38, 7, '3', '3.06', '2020-11-16 09:46:19', '2020-11-16 09:46:19'),
(66, 38, 9, '2', '29.69', '2020-11-16 09:46:19', '2020-11-16 09:46:19'),
(67, 38, 11, '1', '19.50', '2020-11-16 09:46:19', '2020-11-16 09:46:19'),
(68, 39, 7, '3', '3.06', '2020-11-16 09:48:23', '2020-11-16 09:48:23'),
(69, 39, 9, '2', '29.69', '2020-11-16 09:48:23', '2020-11-16 09:48:23'),
(70, 39, 11, '1', '19.50', '2020-11-16 09:48:23', '2020-11-16 09:48:23'),
(71, 40, 7, '3', '3.06', '2020-11-16 09:48:42', '2020-11-16 09:48:42'),
(72, 40, 9, '2', '29.69', '2020-11-16 09:48:42', '2020-11-16 09:48:42'),
(73, 40, 11, '1', '19.50', '2020-11-16 09:48:42', '2020-11-16 09:48:42'),
(74, 41, 7, '3', '3.06', '2020-11-16 09:48:54', '2020-11-16 09:48:54'),
(75, 41, 9, '2', '29.69', '2020-11-16 09:48:54', '2020-11-16 09:48:54'),
(76, 41, 11, '1', '19.50', '2020-11-16 09:48:54', '2020-11-16 09:48:54'),
(77, 42, 7, '3', '3.06', '2020-11-16 10:13:32', '2020-11-16 10:13:32'),
(78, 42, 9, '2', '29.69', '2020-11-16 10:13:32', '2020-11-16 10:13:32'),
(79, 42, 11, '1', '19.50', '2020-11-16 10:13:32', '2020-11-16 10:13:32'),
(80, 43, 7, '3', '3.06', '2020-11-16 10:13:50', '2020-11-16 10:13:50'),
(81, 43, 9, '2', '29.69', '2020-11-16 10:13:50', '2020-11-16 10:13:50'),
(82, 43, 11, '1', '19.50', '2020-11-16 10:13:50', '2020-11-16 10:13:50'),
(83, 44, 7, '3', '3.06', '2020-11-16 10:14:22', '2020-11-16 10:14:22'),
(84, 44, 9, '2', '29.69', '2020-11-16 10:14:22', '2020-11-16 10:14:22'),
(85, 44, 11, '1', '19.50', '2020-11-16 10:14:22', '2020-11-16 10:14:22'),
(86, 45, 7, '3', '3.06', '2020-11-16 10:22:55', '2020-11-16 10:22:55'),
(87, 45, 9, '2', '29.69', '2020-11-16 10:22:55', '2020-11-16 10:22:55'),
(88, 45, 11, '1', '19.50', '2020-11-16 10:22:55', '2020-11-16 10:22:55'),
(89, 46, 7, '3', '3.06', '2020-11-16 10:23:13', '2020-11-16 10:23:13'),
(90, 46, 9, '2', '29.69', '2020-11-16 10:23:13', '2020-11-16 10:23:13'),
(91, 46, 11, '1', '19.50', '2020-11-16 10:23:13', '2020-11-16 10:23:13'),
(92, 47, 7, '3', '3.06', '2020-11-16 10:26:32', '2020-11-16 10:26:32'),
(93, 47, 9, '2', '29.69', '2020-11-16 10:26:32', '2020-11-16 10:26:32'),
(94, 47, 11, '1', '19.50', '2020-11-16 10:26:32', '2020-11-16 10:26:32'),
(95, 48, 7, '3', '3.06', '2020-11-16 10:27:17', '2020-11-16 10:27:17'),
(96, 48, 9, '2', '29.69', '2020-11-16 10:27:17', '2020-11-16 10:27:17'),
(97, 48, 11, '1', '19.50', '2020-11-16 10:27:17', '2020-11-16 10:27:17'),
(98, 49, 7, '3', '3.06', '2020-11-16 10:27:39', '2020-11-16 10:27:39'),
(99, 49, 9, '2', '29.69', '2020-11-16 10:27:39', '2020-11-16 10:27:39'),
(100, 49, 11, '1', '19.50', '2020-11-16 10:27:39', '2020-11-16 10:27:39'),
(101, 50, 7, '3', '3.06', '2020-11-18 11:01:20', '2020-11-18 11:01:20'),
(102, 50, 9, '2', '29.69', '2020-11-18 11:01:20', '2020-11-18 11:01:20'),
(103, 52, 9, '3', '29.69', '2020-11-18 11:03:26', '2020-11-18 11:03:26'),
(104, 52, 7, '1', '3.06', '2020-11-18 11:03:26', '2020-11-18 11:03:26'),
(105, 53, 9, '3', '29.69', '2020-11-18 11:06:02', '2020-11-18 11:06:02'),
(106, 53, 7, '2', '3.06', '2020-11-18 11:06:02', '2020-11-18 11:06:02'),
(107, 53, 11, '1', '19.50', '2020-11-18 11:06:02', '2020-11-18 11:06:02'),
(108, 54, 2, '3', '344', '2020-11-18 11:09:10', '2020-11-18 11:09:10'),
(109, 54, 1, '2', '19', '2020-11-18 11:09:10', '2020-11-18 11:09:10'),
(110, 55, 1, '4', '19', '2020-11-18 11:10:03', '2020-11-18 11:10:03'),
(111, 55, 2, '1', '344', '2020-11-18 11:10:03', '2020-11-18 11:10:03'),
(112, 56, 2, '1', '344', '2020-11-18 11:11:27', '2020-11-18 11:11:27'),
(113, 57, 2, '6', '344', '2020-11-18 11:14:07', '2020-11-18 11:14:07'),
(114, 58, 1, '4', '19', '2020-11-18 11:22:00', '2020-11-18 11:22:00'),
(115, 59, 1, '5', '19', '2020-11-19 23:41:30', '2020-11-19 23:41:30'),
(116, 60, 1, '5', '19', '2020-11-19 23:43:31', '2020-11-19 23:43:31'),
(117, 61, 1, '5', '19', '2020-11-19 23:45:46', '2020-11-19 23:45:46'),
(118, 61, 2, '1', '344', '2020-11-19 23:45:46', '2020-11-19 23:45:46'),
(119, 61, 2, '1', '344', '2020-11-19 23:45:46', '2020-11-19 23:45:46'),
(120, 62, 1, '3', '19', '2020-11-20 10:13:50', '2020-11-20 10:13:50');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'category add', 'web', '2020-11-21 20:10:17', '2020-11-21 20:10:17'),
(2, 'category delete', 'web', '2020-11-21 20:10:24', '2020-11-21 20:10:24'),
(3, 'category edit', 'web', '2020-11-21 20:10:41', '2020-11-21 20:10:41'),
(4, 'category list', 'web', '2020-11-21 20:10:55', '2020-11-21 20:10:55'),
(5, 'product add', 'web', '2020-11-21 20:22:14', '2020-11-21 20:22:14'),
(6, 'product edit', 'web', '2020-11-21 20:22:21', '2020-11-21 20:22:21'),
(7, 'product delete', 'web', '2020-11-21 20:22:27', '2020-11-21 20:22:27'),
(8, 'product list', 'web', '2020-11-21 20:22:33', '2020-11-21 20:22:33');

-- --------------------------------------------------------

--
-- Table structure for table `productsses`
--

CREATE TABLE `productsses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no-image.png',
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productsses`
--

INSERT INTO `productsses` (`id`, `category_id`, `subcategory_id`, `title`, `slug`, `summary`, `description`, `price`, `thumbnail`, `quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 32, 148, 'Dolorum nostrud aper', 'dolorum-nostrud-aper', 'Est cupiditate et de', 'Non aliquid quia ita', '19', 'dolorum-nostrud-aper.png', NULL, '2020-11-18 11:07:48', NULL, NULL),
(2, 30, 120, 'Exercitationem dolor', 'exercitationem-dolor', 'Iste aut ipsa inven', 'Consectetur eligendi', '344', 'exercitationem-dolor.jpg', NULL, '2020-11-18 11:08:18', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

CREATE TABLE `products_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`id`, `product_id`, `images`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'images_jBZN2.png', '2020-11-18 11:07:48', NULL, NULL),
(2, 2, 'images_u86tZ.jpg', '2020-11-18 11:08:18', NULL, NULL),
(3, 2, 'images_CyxAK.jpg', '2020-11-18 11:08:18', NULL, NULL),
(4, 2, 'images_jt2Jy.jpg', '2020-11-18 11:08:18', NULL, NULL),
(5, 2, 'images_SKhve.jpg', '2020-11-18 11:08:18', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products__attributes`
--

CREATE TABLE `products__attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `size_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products__attributes`
--

INSERT INTO `products__attributes` (`id`, `product_id`, `color_id`, `quantity`, `created_at`, `updated_at`, `size_id`) VALUES
(1, 1, 36, '37', NULL, '2020-11-20 10:13:50', '4'),
(2, 2, 35, '28', NULL, '2020-11-19 23:45:46', '2');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `size`, `created_at`, `updated_at`) VALUES
(1, 'L', '2020-10-03 22:49:58', NULL),
(2, 'M', '2020-10-03 22:49:58', NULL),
(3, 'XL', '2020-10-03 22:50:38', NULL),
(4, 'XXL', '2020-10-03 22:50:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2020-11-21 20:20:38', '2020-11-21 20:20:38'),
(2, 'moderator', 'web', '2020-11-21 20:21:00', '2020-11-21 20:21:00'),
(3, 'writer', 'web', '2020-11-21 20:21:14', '2020-11-21 20:21:14');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 3),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(5, 1),
(5, 3),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0=pending, 1=shipping, 2=deliver',
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0=unpaid, 1=paid',
  `total_amount` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_discount` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `user_id`, `first_name`, `last_name`, `company_name`, `email`, `phone`, `country_id`, `city_id`, `zipcode`, `address`, `product_status`, `payment_status`, `total_amount`, `coupon_code`, `coupon_discount`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 'Alec', 'Fuller', 'Leonard and Salas Inc', 'warokoso@mailinator.com', '+1 (114) 386-9563', 6, 3, 'zivazojic@mailinator.com', 'Error eum quas offic', '0', '0', '140.44', NULL, NULL, NULL, '2020-10-31 13:26:34', '2020-10-31 13:26:34'),
(2, 1, 'Cairo', 'Harrison', 'Baldwin Young Plc', 'cobar@mailinator.com', '+1 (246) 507-8508', 3, 4, 'zelevez@mailinator.com', 'Provident sequi mag', '0', '0', '140.44', NULL, NULL, NULL, '2020-10-31 13:32:49', '2020-10-31 13:32:49'),
(3, 1, 'Hamilton', 'Tanner', 'Wolfe Morrow Associates', 'lehoravo@mailinator.com', '+1 (715) 746-2207', 8, 2, 'vacopidi@mailinator.com', 'Illo eius elit non', '0', '0', '140.44', NULL, NULL, NULL, '2020-10-31 13:33:22', '2020-10-31 13:33:22'),
(4, 1, 'Belle', 'Duke', 'Guthrie Landry Traders', 'kovesateco@mailinator.com', '+1 (969) 147-1629', 3, 9, 'xotu@mailinator.com', 'Ut illo tempora omni', '0', '0', '140.44', NULL, NULL, NULL, '2020-10-31 13:37:45', '2020-10-31 13:37:45'),
(5, 1, 'Lillian', 'Simmons', 'Hansen and Wise Traders', 'hisopiq@mailinator.com', '+1 (525) 622-4617', 9, 8, 'veginaca@mailinator.com', 'Hic veritatis distin', '0', '0', '140.44', NULL, NULL, NULL, '2020-10-31 13:43:13', '2020-10-31 13:43:13'),
(6, 1, 'Ciaran', 'Simon', 'Bowers and Calhoun Inc', 'pusabig@mailinator.com', '+1 (689) 145-4986', 3, 2, 'zorolyky@mailinator.com', 'Tempor itaque autem', '0', '0', '140.44', NULL, NULL, NULL, '2020-10-31 13:43:19', '2020-10-31 13:43:19'),
(7, 1, 'Ali', 'Mayo', 'Douglas and Watson Associates', 'nuxir@mailinator.com', '+1 (656) 873-9874', 3, 1, 'cucidexoze@mailinator.com', 'Tempora qui officiis', '0', '0', '94.31', NULL, NULL, NULL, '2020-10-31 13:43:57', '2020-10-31 13:43:57'),
(8, 1, 'Ali', 'Mayo', 'Douglas and Watson Associates', 'nuxir@mailinator.com', '+1 (656) 873-9874', 3, 1, 'cucidexoze@mailinator.com', 'Tempora qui officiis', '0', '0', '94.31', NULL, NULL, NULL, '2020-10-31 13:44:33', '2020-10-31 13:44:33'),
(9, 1, 'Gil', 'Stone', 'Hogan Tran LLC', 'voxev@mailinator.com', '+1 (751) 904-2178', 7, 3, 'zujiho@mailinator.com', 'Blanditiis suscipit', '0', '0', '94.31', NULL, NULL, NULL, '2020-10-31 13:44:55', '2020-10-31 13:44:55'),
(10, 1, 'Gil', 'Stone', 'Hogan Tran LLC', 'voxev@mailinator.com', '+1 (751) 904-2178', 7, 3, 'zujiho@mailinator.com', 'Blanditiis suscipit', '0', '0', '94.31', NULL, NULL, NULL, '2020-10-31 13:47:21', '2020-10-31 13:47:21'),
(11, 1, 'Daniel', 'Frye', 'Mclean Finch Trading', 'mefec@mailinator.com', '+1 (807) 999-2677', 6, 3, 'buqaqivixe@mailinator.com', 'Qui est non occaecat', '0', '0', '94.31', NULL, NULL, NULL, '2020-10-31 13:48:08', '2020-10-31 13:48:08'),
(12, 1, 'Daniel', 'Frye', 'Mclean Finch Trading', 'mefec@mailinator.com', '+1 (807) 999-2677', 6, 3, 'buqaqivixe@mailinator.com', 'Qui est non occaecat', '0', '0', '94.31', NULL, NULL, NULL, '2020-10-31 13:48:18', '2020-10-31 13:48:18'),
(13, 1, 'Kyra', 'Cruz', 'Trujillo Guerra Traders', 'mijos@mailinator.com', '+1 (719) 732-9923', 9, 5, 'hagexukyxy@mailinator.com', 'Accusantium inventor', '0', '0', '29.69', NULL, NULL, NULL, '2020-10-31 13:49:30', '2020-10-31 13:49:30'),
(14, 1, 'Kevyn', 'Chase', 'Singleton Cummings Trading', 'fojoxedije@mailinator.com', '+1 (809) 973-6868', 3, 8, 'gekihiwepy@mailinator.com', 'Explicabo Eu et ani', '0', '0', '29.69', NULL, NULL, NULL, '2020-10-31 13:50:34', '2020-10-31 13:50:34'),
(15, 1, 'Kevyn', 'Chase', 'Singleton Cummings Trading', 'fojoxedije@mailinator.com', '+1 (809) 973-6868', 3, 8, 'gekihiwepy@mailinator.com', 'Explicabo Eu et ani', '0', '0', '29.69', NULL, NULL, NULL, '2020-10-31 13:50:47', '2020-10-31 13:50:47'),
(16, 1, 'Emery', 'Atkinson', 'Powers Cervantes Inc', 'kohoxy@mailinator.com', '+1 (715) 575-4061', 6, 8, 'tyrurawe@mailinator.com', 'Sed quasi quisquam s', '0', '1', '190.51', NULL, NULL, NULL, '2020-11-01 10:13:17', '2020-11-01 10:13:18'),
(17, 1, 'Lilah', 'Harrington', 'Avery and Bartlett Co', 'kogu@mailinator.com', '+1 (372) 295-2317', 9, 2, 'qiryzetuky@mailinator.com', 'Beatae eos commodo i', '0', '1', '190.51', NULL, NULL, NULL, '2020-11-01 10:13:38', '2020-11-01 10:13:39'),
(18, 1, 'Christopher', 'Allison', 'Woods Mendoza Plc', 'duxaqiro@mailinator.com', '+1 (908) 559-2386', 9, 5, 'daxot@mailinator.com', 'Sapiente quae tenetu', '0', '1', '187.45', NULL, NULL, NULL, '2020-11-01 10:14:30', '2020-11-01 10:14:31'),
(19, 1, 'Reagan', 'Weiss', 'Love Myers Co', 'galitutup@mailinator.com', '+1 (109) 462-8384', 2, 1, 'vakymimyga@mailinator.com', 'Eaque odit voluptas', '0', '1', '187.45', NULL, NULL, NULL, '2020-11-01 10:29:45', '2020-11-01 10:29:46'),
(20, 1, 'Melanie', 'Larsen', 'Higgins and Weber Associates', 'sefohyjoh@mailinator.com', '+1 (742) 716-6106', 9, 1, 'pyjazupop@mailinator.com', 'Animi doloribus fac', '0', '1', '187.45', NULL, NULL, NULL, '2020-11-01 10:33:23', '2020-11-01 10:33:24'),
(21, 1, 'Melanie', 'Larsen', 'Higgins and Weber Associates', 'sefohyjoh@mailinator.com', '+1 (742) 716-6106', 9, 1, 'pyjazupop@mailinator.com', 'Animi doloribus fac', '0', '0', '187.45', NULL, NULL, NULL, '2020-11-01 10:33:57', '2020-11-01 10:33:57'),
(22, 1, 'Jasmine', 'Meyer', 'Mccullough and Mcconnell Inc', 'fogygejub@mailinator.com', '+1 (371) 202-5894', 9, 4, 'sysuco@mailinator.com', 'Incididunt incidunt', '0', '1', '187.45', NULL, NULL, NULL, '2020-11-01 10:34:20', '2020-11-01 10:34:21'),
(23, 1, 'Katelyn', 'Hays', 'Atkinson Elliott Trading', 'gyseler@mailinator.com', '+1 (973) 571-1348', 3, 9, 'sewa@mailinator.com', 'Ut libero lorem sit', '0', '1', '187.45', NULL, NULL, NULL, '2020-11-01 10:35:37', '2020-11-01 10:35:40'),
(24, 1, 'Katelyn', 'Hays', 'Atkinson Elliott Trading', 'gyseler@mailinator.com', '+1 (973) 571-1348', 3, 9, 'sewa@mailinator.com', 'Ut libero lorem sit', '0', '0', '187.45', NULL, NULL, NULL, '2020-11-01 10:35:51', '2020-11-01 10:35:51'),
(25, 1, 'Ava', 'Warner', 'Pacheco Lucas Inc', 'filyrete@mailinator.com', '+1 (902) 969-8407', 9, 6, 'nuxerutaf@mailinator.com', 'Recusandae Irure au', '0', '1', '187.45', NULL, NULL, NULL, '2020-11-01 10:36:10', '2020-11-01 10:36:11'),
(26, 1, 'Kirby', 'Berger', 'Stout Fitzgerald Trading', 'nexylanyn@mailinator.com', '+1 (709) 868-7783', 8, 1, 'gusigur@mailinator.com', 'Rem et mollit impedi', '0', '1', '187.45', NULL, NULL, NULL, '2020-11-01 10:38:05', '2020-11-01 10:38:06'),
(27, 1, 'Cara', 'Albert', 'Nolan and Bowen Inc', 'bitotivami@mailinator.com', '+1 (135) 153-4934', 4, 1, 'ruvobyso@mailinator.com', 'Magnam elit sint v', '0', '1', '187.45', NULL, NULL, NULL, '2020-11-01 10:39:48', '2020-11-01 10:39:49'),
(28, 1, 'Stacey', 'Waters', 'Patton and Mcneil Plc', 'denajito@mailinator.com', '+1 (197) 948-4638', 4, 9, 'lukevijo@mailinator.com', 'Nam officia eos culp', '0', '1', '88.06', NULL, NULL, NULL, '2020-11-16 08:50:25', '2020-11-16 08:50:26'),
(29, 1, 'Dana', 'Richmond', 'Brewer Blair Associates', 'polavuqi@mailinator.com', '+1 (402) 902-5557', 9, 6, 'fopun@mailinator.com', 'Temporibus quasi aut', '0', '1', '88.06', NULL, NULL, NULL, '2020-11-16 09:15:37', '2020-11-16 09:15:38'),
(30, 1, 'Uriel', 'Greene', 'Mercado and Evans Associates', 'murshalin98@gmail.com', '+1 (803) 112-5729', 8, 9, 'zeciku@mailinator.com', 'Et qui nisi quidem s', '0', '1', '88.06', NULL, NULL, NULL, '2020-11-16 09:17:22', '2020-11-16 09:17:23'),
(31, 1, 'Nathaniel', 'Garza', 'Ayala and Henson Inc', 'murshalin98@gmail.com', '+1 (414) 896-7897', 8, 3, 'qideby@mailinator.com', 'Adipisci sapiente in', '0', '1', '88.06', NULL, NULL, NULL, '2020-11-16 09:20:08', '2020-11-16 09:20:10'),
(32, 1, 'Lesley', 'Velazquez', 'Molina and Kemp LLC', 'murshalin98@gmail.com', '+1 (295) 427-4147', 7, 8, 'puge@mailinator.com', 'Ut ex voluptatem so', '0', '1', '88.06', NULL, NULL, NULL, '2020-11-16 09:20:48', '2020-11-16 09:20:49'),
(33, 1, 'Kerry', 'Blair', 'Riggs and Bridges Plc', 'murshalin98@gmail.com', '+1 (546) 247-7294', 4, 2, 'voxaw@mailinator.com', 'Eu sunt voluptates d', '0', '1', '88.06', NULL, NULL, NULL, '2020-11-16 09:21:26', '2020-11-16 09:21:27'),
(34, 1, 'Byron', 'Dickson', 'Lopez Holmes Plc', 'vyzigymyt@mailinator.com', '+1 (539) 438-3328', 3, 3, 'numuqu@mailinator.com', 'Sunt dolore Nam labo', '0', '1', '88.06', NULL, NULL, NULL, '2020-11-16 09:45:10', '2020-11-16 09:45:11'),
(35, 1, 'Byron', 'Dickson', 'Lopez Holmes Plc', 'vyzigymyt@mailinator.com', '+1 (539) 438-3328', 3, 3, 'numuqu@mailinator.com', 'Sunt dolore Nam labo', '0', '0', '88.06', NULL, NULL, NULL, '2020-11-16 09:45:25', '2020-11-16 09:45:25'),
(36, 1, 'Byron', 'Dickson', 'Lopez Holmes Plc', 'vyzigymyt@mailinator.com', '+1 (539) 438-3328', 3, 3, 'numuqu@mailinator.com', 'Sunt dolore Nam labo', '0', '1', '88.06', NULL, NULL, NULL, '2020-11-16 09:45:44', '2020-11-16 09:45:45'),
(37, 1, 'Byron', 'Dickson', 'Lopez Holmes Plc', 'vyzigymyt@mailinator.com', '+1 (539) 438-3328', 3, 3, 'numuqu@mailinator.com', 'Sunt dolore Nam labo', '0', '0', '88.06', NULL, NULL, NULL, '2020-11-16 09:46:04', '2020-11-16 09:46:04'),
(38, 1, 'Byron', 'Dickson', 'Lopez Holmes Plc', 'vyzigymyt@mailinator.com', '+1 (539) 438-3328', 3, 3, 'numuqu@mailinator.com', 'Sunt dolore Nam labo', '0', '1', '88.06', NULL, NULL, NULL, '2020-11-16 09:46:19', '2020-11-16 09:46:20'),
(39, 1, 'Byron', 'Dickson', 'Lopez Holmes Plc', 'vyzigymyt@mailinator.com', '+1 (539) 438-3328', 3, 3, 'numuqu@mailinator.com', 'Sunt dolore Nam labo', '0', '0', '88.06', NULL, NULL, NULL, '2020-11-16 09:48:23', '2020-11-16 09:48:23'),
(40, 1, 'Athena', 'York', 'Barron and Myers Inc', 'lyzasizixu@mailinator.com', '+1 (831) 528-4916', 2, 5, 'tequhamu@mailinator.com', 'Aspernatur alias sed', '0', '1', '88.06', NULL, NULL, NULL, '2020-11-16 09:48:42', '2020-11-16 09:48:43'),
(41, 1, 'Athena', 'York', 'Barron and Myers Inc', 'lyzasizixu@mailinator.com', '+1 (831) 528-4916', 2, 5, 'tequhamu@mailinator.com', 'Aspernatur alias sed', '0', '0', '88.06', NULL, NULL, NULL, '2020-11-16 09:48:54', '2020-11-16 09:48:54'),
(42, 1, 'Colin', 'Jacobson', 'May and Harris Co', 'suro@mailinator.com', '+1 (138) 414-6399', 9, 9, 'fevupa@mailinator.com', 'Quae dolores molesti', '0', '1', '88.06', NULL, NULL, NULL, '2020-11-16 10:13:32', '2020-11-16 10:13:33'),
(43, 1, 'Colin', 'Jacobson', 'May and Harris Co', 'suro@mailinator.com', '+1 (138) 414-6399', 9, 9, 'fevupa@mailinator.com', 'Quae dolores molesti', '0', '0', '88.06', NULL, NULL, NULL, '2020-11-16 10:13:50', '2020-11-16 10:13:50'),
(44, 1, 'Keely', 'Cantrell', 'Charles and Massey Traders', 'fuxibolet@mailinator.com', '+1 (235) 181-9313', 4, 6, 'ziris@mailinator.com', 'Quisquam aspernatur', '0', '1', '88.06', NULL, NULL, NULL, '2020-11-16 10:14:22', '2020-11-16 10:14:23'),
(45, 1, 'Keely', 'Cantrell', 'Charles and Massey Traders', 'fuxibolet@mailinator.com', '+1 (235) 181-9313', 4, 6, 'ziris@mailinator.com', 'Quisquam aspernatur', '0', '0', '88.06', NULL, NULL, NULL, '2020-11-16 10:22:55', '2020-11-16 10:22:55'),
(46, 1, 'Kylan', 'Leblanc', 'Bauer and Atkins Associates', 'dixo@mailinator.com', '+1 (969) 496-6768', 2, 9, 'mipudy@mailinator.com', 'Aut nostrum qui dele', '0', '1', '88.06', NULL, NULL, NULL, '2020-11-16 10:23:13', '2020-11-16 10:23:14'),
(47, 1, 'Vielka', 'Heath', 'Randall Richmond Associates', 'nibyj@mailinator.com', '+1 (652) 469-6511', 1, 5, 'kexigex@mailinator.com', 'Sunt aut eum itaque', '0', '1', '88.06', NULL, NULL, NULL, '2020-11-16 10:26:32', '2020-11-16 10:26:33'),
(48, 1, 'Vielka', 'Heath', 'Randall Richmond Associates', 'nibyj@mailinator.com', '+1 (652) 469-6511', 1, 5, 'kexigex@mailinator.com', 'Sunt aut eum itaque', '0', '0', '88.06', NULL, NULL, NULL, '2020-11-16 10:27:17', '2020-11-16 10:27:17'),
(49, 1, 'Joseph', 'Burch', 'Weber Shaffer Trading', 'burahu@mailinator.com', '+1 (322) 418-7452', 4, 9, 'qulokosula@mailinator.com', 'Excepturi eum eiusmo', '0', '1', '88.06', NULL, NULL, NULL, '2020-11-16 10:27:39', '2020-11-16 10:27:41'),
(50, 1, 'Theodore', 'Roman', 'Miranda Luna Traders', 'calopo@mailinator.com', '+1 (801) 992-3744', 3, 1, 'lekymuq@mailinator.com', 'Qui officia rerum in', '0', '1', '68.56', NULL, NULL, NULL, '2020-11-18 11:01:20', '2020-11-18 11:01:22'),
(51, 1, 'Cooper', 'Gamble', 'Compton and Bates Associates', 'pedynu@mailinator.com', '+1 (975) 692-5971', 9, 3, 'buvysuve@mailinator.com', 'Animi est eius dol', '0', '0', '0', NULL, NULL, NULL, '2020-11-18 11:02:00', '2020-11-18 11:02:00'),
(52, 1, 'Quincy', 'Golden', 'Henry and Gillespie Associates', 'vupekifu@mailinator.com', '+1 (565) 836-7483', 2, 2, 'qisecoz@mailinator.com', 'Veniam dolor distin', '0', '1', '92.13', NULL, NULL, NULL, '2020-11-18 11:03:26', '2020-11-18 11:03:28'),
(53, 1, 'Shea', 'Carney', 'Pierce and Burris Co', 'xiqokafih@mailinator.com', '+1 (108) 951-6185', 9, 2, 'jonycyz@mailinator.com', 'Itaque est illum qu', '0', '1', '114.69', NULL, NULL, NULL, '2020-11-18 11:06:02', '2020-11-18 11:06:04'),
(54, 1, 'Wallace', 'Pickett', 'Gaines and Randall Trading', 'zefuj@mailinator.com', '+1 (758) 236-4732', 3, 2, 'qazeqypisu@mailinator.com', 'Sed qui cupiditate o', '0', '1', '1070', NULL, NULL, NULL, '2020-11-18 11:09:10', '2020-11-18 11:09:12'),
(55, 1, 'Armando', 'Mcpherson', 'Marsh and Conner Traders', 'kopiwakyh@mailinator.com', '+1 (731) 504-5089', 7, 1, 'wonef@mailinator.com', 'Repellendus Cupidit', '0', '1', '420', NULL, NULL, NULL, '2020-11-18 11:10:03', '2020-11-18 11:10:04'),
(56, 1, 'Ignacia', 'Stafford', 'Joyner and Schroeder Trading', 'rahe@mailinator.com', '+1 (272) 451-1629', 1, 7, 'paravi@mailinator.com', 'Possimus molestias', '0', '1', '344', NULL, NULL, NULL, '2020-11-18 11:11:27', '2020-11-18 11:11:33'),
(57, 1, 'Jada', 'Walls', 'Cardenas and Washington Plc', 'xowyqaxala@mailinator.com', '+1 (955) 891-2041', 4, 8, 'venabame@mailinator.com', 'Voluptatem velit es', '0', '1', '2064', NULL, NULL, NULL, '2020-11-18 11:14:07', '2020-11-18 11:14:09'),
(58, 1, 'Addison', 'Wright', 'Phelps Miller Associates', 'rorigasu@mailinator.com', '+1 (317) 933-4536', 7, 3, 'lakycog@mailinator.com', 'Voluptas ipsum nesci', '0', '1', '76', NULL, NULL, NULL, '2020-11-18 11:22:00', '2020-11-18 11:22:01'),
(59, 1, 'Paula', 'Guerra', 'Briggs Cox Co', 'pocapeh@mailinator.com', '+1 (406) 751-9075', 8, 2, 'hycijel@mailinator.com', 'Neque fugit eiusmod', '0', '0', '439', NULL, NULL, NULL, '2020-11-19 23:41:30', '2020-11-19 23:41:30'),
(60, 1, 'Kim', 'Keller', 'Kerr Wilcox Inc', 'tucy@mailinator.com', '+1 (924) 662-8214', 6, 4, 'dobizeqy@mailinator.com', 'Voluptatum tempore', '0', '0', '439', NULL, NULL, NULL, '2020-11-19 23:43:31', '2020-11-19 23:43:31'),
(61, 1, 'Porter', 'Townsend', 'Cross Fowler Trading', 'qybolowizo@mailinator.com', '+1 (887) 746-3344', 2, 3, 'dasuhala@mailinator.com', 'Non cum ad sapiente', '0', '1', '783', NULL, NULL, NULL, '2020-11-19 23:45:46', '2020-11-19 23:45:47'),
(62, 1, 'Rhona', 'Douglas', 'Jensen and Gates Inc', 'cofis@mailinator.com', '+1 (368) 723-3627', 8, 4, 'hulyqojix@mailinator.com', 'Rerum ea aspernatur', '0', '1', '57', NULL, NULL, NULL, '2020-11-20 10:13:50', '2020-11-20 10:14:01');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `subcategory_name`, `category_id`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(68, 'Auto Replacement Parts', 37, 'auto-replacement-parts', '2020-09-23 06:56:23', NULL, NULL),
(69, 'Tools, Maintenance & Care', 37, 'tools-maintenance-care', '2020-09-23 06:56:33', NULL, NULL),
(70, 'Car Electronics', 37, 'car-electronics', '2020-09-23 06:56:46', NULL, NULL),
(71, 'Exterior Accessories', 37, 'exterior-accessories', '2020-09-23 06:56:55', NULL, NULL),
(72, 'Interior Accessories', 37, 'interior-accessories', '2020-09-23 06:57:11', NULL, NULL),
(73, 'Motorcycle Accessories & Parts', 37, 'motorcycle-accessories-parts', '2020-09-23 06:57:30', NULL, NULL),
(74, 'Men\'s Shoes', 33, 'mens-shoes', '2020-09-23 06:58:06', NULL, NULL),
(75, 'Men\'s Luggage & Bags', 33, 'mens-luggage-bags', '2020-09-23 06:58:19', NULL, NULL),
(76, 'Women\'s Luggage & Bags', 33, 'womens-luggage-bags', '2020-09-23 06:58:32', NULL, NULL),
(77, 'Women\'s Shoes', 33, 'womens-shoes', '2020-09-23 06:58:46', NULL, NULL),
(78, 'Bestselling Shoes', 33, 'bestselling-shoes', '2020-09-23 06:58:57', NULL, NULL),
(79, 'Other Bags & Accessories', 33, 'other-bags-accessories', '2020-09-23 06:59:08', NULL, NULL),
(80, 'Hair Weaves', 36, 'hair-weaves', '2020-09-23 06:59:51', NULL, NULL),
(81, 'Lace Wigs', 36, 'lace-wigs', '2020-09-23 07:00:02', NULL, NULL),
(82, 'Synthetic Hair', 36, 'synthetic-hair', '2020-09-23 07:00:12', NULL, NULL),
(83, 'Makeup', 36, 'makeup', '2020-09-23 07:00:29', NULL, NULL),
(84, 'Health Care', 36, 'health-care', '2020-09-23 07:00:59', NULL, NULL),
(85, 'Skin Care', 36, 'skin-care', '2020-09-23 07:01:14', NULL, NULL),
(86, 'Nail Art & Tools', 36, 'nail-art-tools', '2020-09-23 07:01:26', NULL, NULL),
(87, 'Personal Care', 36, 'personal-care', '2020-09-23 07:01:37', NULL, NULL),
(88, 'Tattoos & Body Art', 36, 'tattoos-body-art', '2020-09-23 07:01:48', NULL, NULL),
(89, 'Adult Items', 36, 'adult-items', '2020-09-23 07:01:57', '2020-09-23 07:03:48', '2020-09-23 07:03:48'),
(90, 'Components & Peripherals', 28, 'components-peripherals', '2020-09-23 07:04:12', NULL, NULL),
(91, 'Laptops', 28, 'laptops', '2020-09-23 07:04:24', NULL, NULL),
(92, 'Storage Devices', 28, 'storage-devices', '2020-09-23 07:04:33', NULL, NULL),
(93, 'Security & Protection', 28, 'security-protection', '2020-09-23 07:04:43', NULL, NULL),
(94, 'Office Electronics', 28, 'office-electronics', '2020-09-23 07:04:52', NULL, NULL),
(95, 'Computer Networking', 28, 'computer-networking', '2020-09-23 07:05:13', NULL, NULL),
(96, 'Accessories & Parts', 29, 'accessories-parts', '2020-09-23 07:05:30', NULL, NULL),
(97, 'Home Audio & Video', 29, 'home-audio-video', '2020-09-23 07:05:38', NULL, NULL),
(98, 'Camera & Photo', 29, 'camera-photo', '2020-09-23 07:05:50', NULL, NULL),
(99, 'Portable Audio & Video', 29, 'portable-audio-video', '2020-09-23 07:06:00', NULL, NULL),
(100, 'Smart Electronics', 29, 'smart-electronics', '2020-09-23 07:06:11', NULL, NULL),
(101, 'Video Games', 29, 'video-games', '2020-09-23 07:06:20', NULL, NULL),
(102, 'Tools', 38, 'tools', '2020-09-23 07:06:42', NULL, NULL),
(103, 'Indoor Lighting', 38, 'indoor-lighting', '2020-09-23 07:07:10', NULL, NULL),
(104, 'LED Lighting', 38, 'led-lighting', '2020-09-23 07:07:24', NULL, NULL),
(105, 'Home Improvement', 38, 'home-improvement', '2020-09-23 07:07:33', NULL, NULL),
(106, 'Outdoor Lighting', 38, 'outdoor-lighting', '2020-09-23 07:07:45', NULL, NULL),
(107, 'Pet Products', 31, 'pet-products', '2020-09-23 07:07:59', NULL, NULL),
(108, 'Art', 31, 'art', '2020-09-23 07:08:06', NULL, NULL),
(109, 'Home Textiles', 31, 'home-textiles', '2020-09-23 07:08:20', NULL, NULL),
(110, 'Celebrations', 31, 'celebrations', '2020-09-23 07:08:30', NULL, NULL),
(111, 'Household Items', 31, 'household-items', '2020-09-23 07:08:40', NULL, NULL),
(112, 'Home Storage', 31, 'home-storage', '2020-09-23 07:08:48', NULL, NULL),
(113, 'Furniture', 31, 'furniture', '2020-09-23 07:08:59', NULL, NULL),
(114, 'Garden Supplies', 31, 'garden-supplies', '2020-09-23 07:09:11', NULL, NULL),
(115, 'Home Decor', 31, 'home-decor', '2020-09-23 07:09:20', NULL, NULL),
(116, 'Kitchen', 31, 'kitchen', '2020-09-23 07:09:28', NULL, NULL),
(117, 'Fine Jewelry', 30, 'fine-jewelry', '2020-09-23 07:09:46', NULL, NULL),
(118, 'Wedding & Engagement', 30, 'wedding-engagement', '2020-09-23 07:10:00', NULL, NULL),
(119, 'Men\'s Watches', 30, 'mens-watches', '2020-09-23 07:10:12', NULL, NULL),
(120, 'Women\'s Watches', 30, 'womens-watches', '2020-09-23 07:10:24', NULL, NULL),
(121, 'Fashion Jewelry', 30, 'fashion-jewelry', '2020-09-23 07:10:32', NULL, NULL),
(122, 'Beads & DIY Jewelry', 30, 'beads-diy-jewelry', '2020-09-23 07:10:47', NULL, NULL),
(123, 'Hot Sale', 26, 'hot-sale', '2020-09-23 07:11:05', NULL, NULL),
(124, 'Bottoms', 26, 'bottoms', '2020-09-23 07:11:21', NULL, NULL),
(125, 'Outerwear & Jackets', 26, 'outerwear-jackets', '2020-09-23 07:11:33', NULL, NULL),
(126, 'Accessories', 26, 'accessories', '2020-09-23 07:11:46', NULL, NULL),
(127, 'Swimming', 35, 'swimming', '2020-09-23 07:12:58', NULL, NULL),
(128, 'Cycling', 35, 'cycling', '2020-09-23 07:13:10', NULL, NULL),
(129, 'Sneakers', 35, 'sneakers', '2020-09-23 07:13:20', NULL, NULL),
(130, 'Fishing', 35, 'fishing', '2020-09-23 07:13:31', NULL, NULL),
(131, 'Sportswear', 35, 'sportswear', '2020-09-23 07:13:41', NULL, NULL),
(132, 'Other Sports Equipment', 35, 'other-sports-equipment', '2020-09-23 07:13:50', NULL, NULL),
(133, 'Mobile Phones', 27, 'mobile-phones', '2020-09-23 07:14:10', NULL, NULL),
(134, 'Mobile Phone Accessories', 27, 'mobile-phone-accessories', '2020-09-23 07:14:20', NULL, NULL),
(135, 'Featured Accessories', 27, 'featured-accessories', '2020-09-23 07:14:35', NULL, NULL),
(136, 'Mobile Phone Parts', 27, 'mobile-phone-parts', '2020-09-23 07:14:45', NULL, NULL),
(137, 'Communication Equipments', 27, 'communication-equipments', '2020-09-23 07:14:54', NULL, NULL),
(138, 'Hot Cases & Covers', 27, 'hot-cases-covers', '2020-09-23 07:15:08', NULL, NULL),
(139, 'Hot Brands', 27, 'hot-brands', '2020-09-23 07:15:16', NULL, NULL),
(140, 'Mother & Baby Items', 34, 'mother-baby-items', '2020-09-23 07:15:36', NULL, NULL),
(141, 'Baby Clothing & Shoes', 34, 'baby-clothing-shoes', '2020-09-23 07:15:44', NULL, NULL),
(142, 'Girls Clothing', 34, 'girls-clothing', '2020-09-23 07:16:05', NULL, NULL),
(143, 'Boys Clothing', 34, 'boys-clothing', '2020-09-23 07:16:13', NULL, NULL),
(144, 'Shoes & Bags', 34, 'shoes-bags', '2020-09-23 07:16:28', NULL, NULL),
(145, 'Toys & Hobbies', 34, 'toys-hobbies', '2020-09-23 07:16:46', NULL, NULL),
(146, 'Accessories (Kids)', 34, 'accessories-kids', '2020-09-23 07:17:16', NULL, NULL),
(147, 'Women\'s Fashion', 32, 'womens-fashion', '2020-09-23 07:17:28', NULL, NULL),
(148, 'Bottoms (Woman\'s)', 32, 'bottoms-womans', '2020-09-23 07:18:01', '2020-09-23 07:19:33', NULL),
(149, 'Weddings & Events', 32, 'weddings-events', '2020-09-23 07:18:22', NULL, NULL),
(150, 'Accessories (Woman)', 32, 'accessories-woman', '2020-09-23 07:18:51', NULL, NULL),
(151, 'T Shirts', 26, 't-shirts', '2020-09-23 07:44:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dristict` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `phone`, `address`, `postal`, `dristict`, `country`, `pin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Laravel Trial', 'laravel.trial.smtp@gmail.com', '2020-09-05 21:00:42', '01982-917389', 'Las Vegas', '88901', 'Las Vegas', 'USA', '12345', '$2y$10$YjeocRfC5GWFtiVYweRXhOUwIBFTTbNhGlGROv3qhqCSurUvMWH4G', '3112fhOw20yaHTNKDdFqbi1Gl4g5GyzfZaJXxOSKQMWupTfBd4O4ZEQjFXZF', '2020-09-05 20:59:49', '2020-09-17 23:14:01'),
(5, 'Laravel Trial 1', 'laravel.trial.smtp1@gmail.com', '2020-09-05 21:00:42', '01982-917389', 'Las Vegas', '88901', 'Las Vegas', 'USA', '12345', '$2y$10$YjeocRfC5GWFtiVYweRXhOUwIBFTTbNhGlGROv3qhqCSurUvMWH4G', '3112fhOw20yaHTNKDdFqbi1Gl4g5GyzfZaJXxOSKQMWupTfBd4O4ZEQjFXZF', '2020-09-05 20:59:49', '2020-09-17 23:14:01'),
(6, 'Laravel Trial 3', 'laravel.trial.smtp3@gmail.com', '2020-09-05 21:00:42', '01982-917389', 'Las Vegas', '88901', 'Las Vegas', 'USA', '12345', '$2y$10$YjeocRfC5GWFtiVYweRXhOUwIBFTTbNhGlGROv3qhqCSurUvMWH4G', '3112fhOw20yaHTNKDdFqbi1Gl4g5GyzfZaJXxOSKQMWupTfBd4O4ZEQjFXZF', '2020-09-05 20:59:49', '2020-09-17 23:14:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_coupon_code_unique` (`coupon_code`);

--
-- Indexes for table `coupon_products`
--
ALTER TABLE `coupon_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `productsses`
--
ALTER TABLE `productsses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `productsses_slug_unique` (`slug`);

--
-- Indexes for table `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products__attributes`
--
ALTER TABLE `products__attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
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
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupon_products`
--
ALTER TABLE `coupon_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `productsses`
--
ALTER TABLE `productsses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products__attributes`
--
ALTER TABLE `products__attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

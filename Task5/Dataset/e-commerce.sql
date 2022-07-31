-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2022 at 03:32 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `street` varchar(255) NOT NULL,
  `buliding` tinyint(3) UNSIGNED NOT NULL,
  `floor` tinytext NOT NULL,
  `flat` tinyint(3) UNSIGNED NOT NULL,
  `notes` text DEFAULT NULL,
  `types` tinyint(1) UNSIGNED NOT NULL COMMENT '0=> home 1=>company',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `street`, `buliding`, `floor`, `flat`, `notes`, `types`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'haram', 2, '1', 12, NULL, 0, '2022-07-28 16:19:09', NULL, 1),
(2, 'haram', 2, '1', 12, NULL, 0, '2022-07-28 16:19:09', NULL, 9);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_verifition_at` timestamp NULL DEFAULT NULL,
  `verifition_code` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(64) NOT NULL,
  `name_ar` varchar(64) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL COMMENT '0=> not active brand 1=> active brand',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name_en`, `name_ar`, `image`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Samsung', 'سامسونج', 'samsung.png', 1, '2021-11-18 07:10:26', '2021-11-18 07:10:26'),
(10, 'DELL', 'ديل', 'dell.png', 1, '2021-11-18 07:10:26', '2021-11-18 07:10:26'),
(11, 'Lenovo', 'لينوفو', 'lenovo.png', 1, '2021-11-18 07:10:26', '2021-11-18 07:10:26'),
(12, 'apple', 'ابل', 'apple.png', 1, '2021-11-18 07:10:26', '2021-11-18 07:10:26'),
(13, 'oppo', 'oppo', 'oppo.png', 1, '2021-11-24 02:57:47', '2021-11-24 02:57:47'),
(14, 'lg', 'lg', 'lg.png', 1, '2021-11-24 02:57:47', '2021-11-24 02:57:47'),
(15, 'HP', 'HP', 'hp.png', 1, '2022-02-23 07:24:06', '2022-02-23 07:24:06'),
(16, 'ASUS', 'ASUS', 'asus.png', 1, '2022-02-23 07:24:06', '2022-02-23 07:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL COMMENT '0=> Not Active 1=> active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_ar`, `name_en`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ادوات كهربائية', 'electorinics', 'default.jpg', 1, '2021-11-17 08:05:23', '2021-11-17 08:10:48'),
(2, 'مطبخ', 'kitchen', 'default.jpg', 1, '2021-11-18 07:54:51', '2021-11-18 07:54:51'),
(3, 'سوبرماركت', 'supermarket', 'default.jpg', 1, '2022-02-23 05:26:47', '2022-02-23 05:26:47'),
(4, 'موضة وازياء', 'fashion', 'default.jpg', 1, '2022-02-23 05:26:47', '2022-02-23 05:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(32) NOT NULL,
  `name_ar` varchar(32) NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL COMMENT '0=> Cannot order 1=>can order',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `copouns`
--

CREATE TABLE `copouns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` bigint(20) UNSIGNED NOT NULL,
  `max_usage_count` tinyint(10) UNSIGNED NOT NULL,
  `max_usage_count_per_user` tinyint(1) UNSIGNED NOT NULL,
  `mini_order` tinyint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0=> NOT ACTIVE COPOUN 1=>ACTIVE COPOUN',
  `discount` tinyint(3) UNSIGNED NOT NULL,
  `discount_type` tinyint(1) UNSIGNED NOT NULL COMMENT '0=> fixed 1=>percent',
  `start_at` timestamp NULL DEFAULT NULL,
  `end_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `copouns`
--

INSERT INTO `copouns` (`id`, `code`, `max_usage_count`, `max_usage_count_per_user`, `mini_order`, `price`, `status`, `discount`, `discount_type`, `start_at`, `end_at`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 2, 20, '1234.00', 1, 3, 0, NULL, NULL, '2022-07-28 16:18:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `favoirts`
--

CREATE TABLE `favoirts` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `most_ordered_product`
-- (See below for the actual view)
--
CREATE TABLE `most_ordered_product` (
`Quantiy_order_product` decimal(42,0)
,`product_id` bigint(20) unsigned
,`name_en` varchar(32)
,`name_ar` varchar(32)
,`image` varchar(255)
,`price` decimal(8,2) unsigned
);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `discount` tinyint(5) UNSIGNED NOT NULL,
  `dicount_type` tinyint(1) UNSIGNED NOT NULL COMMENT '0=>fixed 1=>percent',
  `status` tinyint(1) NOT NULL COMMENT '0=>NOT active 1=>active',
  `start_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offers_products`
--

CREATE TABLE `offers_products` (
  `offer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price_after_offer` decimal(10,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` bigint(20) UNSIGNED NOT NULL,
  `payment_method` tinyint(1) NOT NULL COMMENT '0=>Cash 1=>Visa',
  `notes` varchar(255) DEFAULT NULL,
  `total_price` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0=> Rejected order , 1=>Accepted order , 2=>Delieverd order',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `copoun_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `number`, `payment_method`, `notes`, `total_price`, `status`, `created_at`, `updated_at`, `address_id`, `copoun_id`) VALUES
(5, 5, 0, NULL, 250, 1, '2022-07-28 16:20:20', NULL, 1, 1),
(6, 6, 0, NULL, 250, 1, '2022-07-28 17:04:49', '2022-07-28 17:05:04', 2, 1),
(7, 5, 0, NULL, 250, 1, '2022-07-28 16:20:20', NULL, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `price` decimal(8,2) UNSIGNED NOT NULL,
  `quantity` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`price`, `quantity`, `order_id`, `product_id`) VALUES
('33.00', 4, 5, 100),
('0.00', 5, 5, 107),
('250.00', 2, 5, 110),
('999999.99', 2, 6, 107),
('250.00', 2, 6, 110),
('1234.00', 20, 7, 105),
('999999.99', 2, 7, 107),
('1234.00', 10, 7, 108),
('1234.00', 10, 7, 110);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(32) NOT NULL,
  `name_ar` varchar(32) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `price` decimal(8,2) UNSIGNED NOT NULL,
  `details_en` text NOT NULL,
  `details_ar` text NOT NULL,
  `code` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0 => not active 1=> active ',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subcategory_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_en`, `name_ar`, `image`, `quantity`, `price`, `details_en`, `details_ar`, `code`, `status`, `created_at`, `updated_at`, `brand_id`, `subcategory_id`) VALUES
(99, 'laptop', 'لابتوب', 'dell.jpg', 1, '250.00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هن', 12345, 1, '2022-01-31 07:13:16', '2022-07-28 15:56:04', 10, 1),
(100, 'a 50', 'a 50', 'a50.jpg', 1, '4000.00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هن', 321244, 0, '2021-11-18 07:13:16', '2022-07-23 11:51:08', 10, 2),
(101, 'tv 55 inch', 'tv 55 inch', 'tv55.jpg', 1, '10000.00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هن', 55525, 1, '2021-11-18 07:13:16', '2022-07-23 11:51:15', 15, 4),
(102, 'MacBook PRo', 'MacBook PRo', 'mac.jpg', 2, '40000.00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هن', 52524, 1, '2021-09-21 02:07:40', '2022-07-28 10:47:59', 12, 1),
(103, 's21', 's21', 's21.jpg', 10, '15000.00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هن', 123213, 1, '2021-09-20 02:07:40', '2022-07-28 10:48:08', 9, 2),
(104, 'iphone 13', 'iphone 13', 'iphone13.jpg', 20, '25000.00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هن', 12525, 1, '2021-09-22 02:07:40', '2022-07-23 11:51:49', 12, 2),
(105, 'Reno 6', 'Reno 6', 'reno.jpg', 5, '10000.00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هن', 4444, 1, '2021-09-22 02:07:40', '2022-07-23 11:51:58', 11, 2),
(106, 'Lenovo Lapttop', 'Lenovo Lapttop', 'lenovo.jpg', 1, '17000.00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هن', 7754, 1, '2021-09-22 02:07:40', '2022-07-23 11:52:05', 11, 1),
(107, 'Dell Laptop', 'Dell Laptop', 'dell.jpg', 0, '20000.00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هن', 42424, 1, '2021-09-12 02:07:40', '2022-07-28 10:48:28', 10, 1),
(108, 'Lg TV', 'Lg TV', 'lg.jpg', 3, '12000.00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هن', 5545, 1, '2021-09-22 02:07:40', '2022-07-23 11:52:22', 14, 4),
(109, 'Samsung Tv', 'Samsung Tv', 'samsung.jpg', 7, '15000.00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هن', 7777, 1, '2024-09-17 02:07:40', '2022-07-28 15:56:47', 9, 4),
(110, 'Chepsi', 'Chepsi', 'chepsi.jpg', 0, '10.00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هن', 4247, 1, '2021-09-22 02:07:40', '2022-07-23 11:52:51', NULL, 5),
(111, 'samsung a70', 'سامسونج 70', 'a50.jpg', 5, '2500.00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هن', 29112021, 1, '2021-11-29 04:21:36', '2022-07-23 11:52:57', 9, 2),
(112, 'feta cheese', 'جبنة فيتا', 'feta.png', 100, '5.00', 'description', 'تفاصيل', 1100, 1, '2022-02-23 07:11:17', '2022-07-23 11:53:06', NULL, 7);

-- --------------------------------------------------------

--
-- Stand-in structure for view `products_detalis`
-- (See below for the actual view)
--
CREATE TABLE `products_detalis` (
`id` bigint(20) unsigned
,`name_en` varchar(32)
,`name_ar` varchar(32)
,`image` varchar(255)
,`quantity` tinyint(3) unsigned
,`price` decimal(8,2) unsigned
,`details_en` text
,`details_ar` text
,`code` bigint(20) unsigned
,`status` tinyint(1)
,`created_at` timestamp
,`updated_at` timestamp
,`brand_id` bigint(20) unsigned
,`subcategory_id` bigint(20) unsigned
,`brand_name_en` varchar(64)
,`subcategory_name_en` varchar(32)
,`category_name_en` varchar(255)
,`category_id` bigint(20) unsigned
,`reviews_count` bigint(21)
,`reviews_avg` decimal(7,4)
);

-- --------------------------------------------------------

--
-- Table structure for table `products_spaces`
--

CREATE TABLE `products_spaces` (
  `spaces_id` bigint(20) UNSIGNED NOT NULL,
  `products_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(32) NOT NULL,
  `name_en` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0=> can order 1=>cannot order',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `cities_id` bigint(20) UNSIGNED NOT NULL,
  `addresses_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `rate` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`user_id`, `product_id`, `comment`, `rate`, `created_at`, `updated_at`) VALUES
(9, 99, 'SONDOS', 4, '2022-07-30 14:29:29', NULL),
(24, 99, 'good\r\n', 3, '2022-07-30 21:11:52', NULL),
(24, 100, 'SONDOS', 4, '2022-07-30 14:29:29', NULL),
(24, 101, 'SONDOS', 4, '2022-07-30 14:29:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spaces`
--

CREATE TABLE `spaces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(32) NOT NULL,
  `name_ar` varchar(32) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0=> NOT ACTIVE 1=> ACTIVE',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `category_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name_en`, `name_ar`, `image`, `status`, `created_at`, `updated_at`, `category_id`) VALUES
(1, 'laptops', 'لابتوبات', 'default.png', 1, '2021-11-18 07:09:38', '2021-11-24 02:54:39', 1),
(2, 'mobiles', 'موبايلات', 'default.png', 1, '2021-11-18 07:09:38', '2021-11-18 07:09:38', 1),
(3, 'desktop', 'كمبيوتر', 'default.png', 1, '2021-11-18 07:09:38', '2021-11-18 07:09:38', 1),
(4, 'tv', 'تلفزيونات', 'default.png', 1, '2021-11-18 07:13:41', '2021-11-18 07:13:41', 1),
(5, 'chepsi', 'شيبسي', 'default.png', 1, '2021-11-24 02:56:26', '2021-11-24 02:56:26', 3),
(6, 'makeup', 'ادوات تجميل', '1.png', 1, '2022-02-23 05:28:06', '2022-02-23 05:28:06', 4),
(7, 'cheese', 'جبن', 'cheese.png', 1, '2022-02-23 07:11:01', '2022-02-23 07:11:01', 3),
(8, 'toys', 'العاب اطفال', 'a', 0, '2022-07-23 11:31:39', '2022-07-27 08:26:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(1) NOT NULL COMMENT 'f=>male , m=> female',
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=>not active 1=>active',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verification_code` int(6) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `phone`, `email`, `password`, `gender`, `image`, `status`, `email_verified_at`, `verification_code`, `created_at`, `updated_at`) VALUES
(1, 'sondos', 'ahmed', '01154468585', 'sondosjoo4@gmail.com', '$2y$10$82ucbqZ/Z4hiNOPzQBErOux0dBzz0XLSsQA0ONcU8wk3WRc.0.BhK', 'f', 'default.jpg', 1, '2022-07-28 16:01:21', 253533, '2022-07-28 16:01:05', '2022-07-31 00:24:43'),
(9, 'ahmed', 'refat', '01154468584', 'ahmed@gmail.com', '$2y$10$82ucbqZ/Z4hiNOPzQBErOux0dBzz0XLSsQA0ONcU8wk3WRc.0.BhK', 'm', 'default.jpg', 1, '2022-07-28 16:11:15', 383910, '2022-07-28 16:11:00', '2022-07-31 00:24:43'),
(24, 'sondos', 'ahmed', '01154468583', 'Engsondosahmed1@gmail.com', '$2y$10$xm93kR8chcfnjAN4nWCUZOW5PpFVRzoGeGEGUFogkXzZ9lGQqRlV2', 'f', 'default.jpg', 1, '2022-07-29 19:16:19', 800221, '2022-07-29 19:16:00', '2022-07-31 01:22:53');

-- --------------------------------------------------------

--
-- Structure for view `most_ordered_product`
--
DROP TABLE IF EXISTS `most_ordered_product`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `most_ordered_product`  AS SELECT sum(`orders_products`.`quantity`) AS `Quantiy_order_product`, `orders_products`.`product_id` AS `product_id`, `products`.`name_en` AS `name_en`, `products`.`name_ar` AS `name_ar`, `products`.`image` AS `image`, `products`.`price` AS `price` FROM (`orders_products` join `products` on(`products`.`id` = `orders_products`.`product_id`)) GROUP BY `products`.`id` ORDER BY sum(`orders_products`.`quantity`) DESC LIMIT 0, 44  ;

-- --------------------------------------------------------

--
-- Structure for view `products_detalis`
--
DROP TABLE IF EXISTS `products_detalis`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `products_detalis`  AS SELECT `products`.`id` AS `id`, `products`.`name_en` AS `name_en`, `products`.`name_ar` AS `name_ar`, `products`.`image` AS `image`, `products`.`quantity` AS `quantity`, `products`.`price` AS `price`, `products`.`details_en` AS `details_en`, `products`.`details_ar` AS `details_ar`, `products`.`code` AS `code`, `products`.`status` AS `status`, `products`.`created_at` AS `created_at`, `products`.`updated_at` AS `updated_at`, `products`.`brand_id` AS `brand_id`, `products`.`subcategory_id` AS `subcategory_id`, `brands`.`name_en` AS `brand_name_en`, `subcategories`.`name_en` AS `subcategory_name_en`, `categories`.`name_en` AS `category_name_en`, `categories`.`id` AS `category_id`, count(`reviews`.`rate`) AS `reviews_count`, if(round(avg(`reviews`.`rate`),0) is null,0,avg(`reviews`.`rate`)) AS `reviews_avg` FROM ((((`products` left join `brands` on(`brands`.`id` = `products`.`brand_id`)) left join `subcategories` on(`subcategories`.`id` = `products`.`subcategory_id`)) left join `categories` on(`categories`.`id` = `subcategories`.`id`)) left join `reviews` on(`products`.`id` = `reviews`.`product_id`)) GROUP BY `products`.`id``id`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addreses_user_fk` (`user_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `product_user_fk` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `copouns`
--
ALTER TABLE `copouns`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `favoirts`
--
ALTER TABLE `favoirts`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `favoirts_products_fk` (`product_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers_products`
--
ALTER TABLE `offers_products`
  ADD PRIMARY KEY (`offer_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_copouns_fk` (`copoun_id`),
  ADD KEY `addresses_orders_fk` (`address_id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `order-products_products_fk` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_ibfk_1` (`brand_id`),
  ADD KEY `products_subctegories_fk` (`subcategory_id`);

--
-- Indexes for table `products_spaces`
--
ALTER TABLE `products_spaces`
  ADD PRIMARY KEY (`spaces_id`,`products_id`),
  ADD KEY `products_spaces_p_fk` (`products_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_regions_fk` (`addresses_id`),
  ADD KEY `cities_regions_fk` (`cities_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `products` (`product_id`);

--
-- Indexes for table `spaces`
--
ALTER TABLE `spaces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_subcategories_fk` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `copouns`
--
ALTER TABLE `copouns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spaces`
--
ALTER TABLE `spaces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addreses_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `cart_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_user_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `favoirts`
--
ALTER TABLE `favoirts`
  ADD CONSTRAINT `favoirts_products_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favoirts_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `offers_products`
--
ALTER TABLE `offers_products`
  ADD CONSTRAINT `offers_products_ibfk_1` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `offers_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `addresses_orders_fk` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_copouns_fk` FOREIGN KEY (`copoun_id`) REFERENCES `copouns` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `order-products_products_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_products_orders_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_subctegories_fk` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`);

--
-- Constraints for table `products_spaces`
--
ALTER TABLE `products_spaces`
  ADD CONSTRAINT `products_spaces_p_fk` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_spaces_s_fk` FOREIGN KEY (`spaces_id`) REFERENCES `spaces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `addresses_regions_fk` FOREIGN KEY (`addresses_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cities_regions_fk` FOREIGN KEY (`cities_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `categories_subcategories_fk` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

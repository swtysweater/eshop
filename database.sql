-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 07, 2021 at 03:26 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `eshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `cityID` bigint(20) UNSIGNED NOT NULL,
  `userID` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `name`, `comment`, `cityID`, `userID`, `created_at`, `updated_at`) VALUES
(1, 'Просвещения пр-кт, дом 11, корпус 4', 'Комментарий!', 2, 4, '2021-06-06 04:55:37', '2021-06-06 07:49:29');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `expdate` varchar(255) NOT NULL,
  `cvc` int(11) NOT NULL,
  `userID` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `name`, `expdate`, `cvc`, `userID`, `created_at`, `updated_at`) VALUES
(1, '1234123412343232', '01/20', 123, 4, '2021-06-07 12:05:15', '2021-06-07 12:14:15');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `desc`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Фрукты', 'Фрукт — это плод кустарников или деревьев, имеющий сочную внутреннюю часть покрытую жесткой оболочкой и содержащий внутри семена.', '/images/fruits.jpg', NULL, NULL),
(2, 'Овощи', 'Овощи – это понятие, которое в кулинарии значит «съедобная часть». К ним могут относиться плоды, клубни отдельных видов растений, а также различная растительная твердая пища.', '/images/vegetables.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Москва', '2021-06-06 09:44:48', '2021-06-06 09:44:48'),
(2, 'Санкт-Петербург', '2021-06-06 09:44:48', '2021-06-06 09:44:48');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Россия', NULL, NULL),
(2, 'США', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `factories`
--

CREATE TABLE `factories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `countryID` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `factories`
--

INSERT INTO `factories` (`id`, `name`, `countryID`, `location`, `created_at`, `updated_at`) VALUES
(1, 'St.Louis', 2, 'Сейнт-Льюис', NULL, NULL),
(2, 'Omsk', 1, 'Омск', NULL, NULL);

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `protein` double(8,2) NOT NULL,
  `fats` double(8,2) NOT NULL,
  `carbs` double(8,2) NOT NULL,
  `mass` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` tinyint(4) NOT NULL DEFAULT '0',
  `categoryID` bigint(20) UNSIGNED NOT NULL,
  `factoryID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `protein`, `fats`, `carbs`, `mass`, `image`, `discount`, `categoryID`, `factoryID`, `created_at`, `updated_at`) VALUES
(1, 'Банан', 50, 1.10, 0.30, 23.00, 1000, '1.png', 0, 1, 1, '2021-06-06 07:07:56', '2021-06-06 07:07:56'),
(2, 'Картофель', 20, 2.00, 0.10, 17.00, 1000, '2.png', 0, 2, 2, '2021-06-06 07:07:56', '2021-06-06 07:07:56'),
(3, 'Морковь', 30, 1.00, 0.00, 9.50, 1000, '3.png', 0, 2, 2, '2021-06-06 07:07:56', '2021-06-06 07:07:56'),
(4, 'Капуста', 60, 1.00, 0.00, 2.00, 1000, '4.png', 0, 2, 2, '2021-06-06 07:07:56', '2021-06-06 07:07:56'),
(5, 'Лук репчатый', 15, 1.00, 0.00, 16.00, 1000, '5.png', 0, 2, 2, '2021-06-06 07:07:56', '2021-06-06 07:07:56'),
(6, 'Цветная капуста', 70, 2.00, 14.00, 7.00, 1000, '6.png', 0, 2, 2, '2021-06-06 07:07:56', '2021-06-06 07:07:56'),
(7, 'Виноград', 120, 0.00, 0.00, 23.00, 1000, '7.png', 0, 1, 2, '2021-06-06 07:07:56', '2021-06-06 07:07:56'),
(8, 'Яблоки', 55, 0.00, 0.00, 25.00, 1000, '8.png', 0, 1, 2, '2021-06-06 07:07:56', '2021-06-06 07:07:56'),
(9, 'Апельсины', 110, 1.00, 0.00, 19.00, 1000, '9.png', 0, 1, 2, '2021-06-06 07:07:56', '2021-06-06 07:07:56'),
(10, 'Сливы', 76, 1.00, 0.00, 24.00, 1000, '10.png', 0, 1, 2, '2021-06-06 07:07:56', '2021-06-06 07:07:56');

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
(4, '2020_10_27_152626_create_categories_table', 1),
(5, '2020_10_27_152932_create_countries_table', 1),
(6, '2020_10_27_153135_create_brand_table', 1),
(7, '2020_10_27_154226_create_factories_table', 1),
(8, '2020_10_27_154432_create_items_table', 1),
(9, '2020_10_27_155129_create_discountcards_table', 1),
(10, '2021_02_04_035000_create_payment_methods_table', 2),
(11, '2021_02_04_035103_create_orders_table', 3),
(12, '2021_02_04_040135_create_order_items_table', 4),
(13, '2021_06_06_074112_create_cruds_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userID` bigint(20) UNSIGNED NOT NULL,
  `payment_methodID` bigint(20) UNSIGNED NOT NULL,
  `total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userID`, `payment_methodID`, `total`, `created_at`, `updated_at`) VALUES
(6, 4, 2, 310.00, '2021-06-06 03:23:45', '2021-06-06 03:23:45'),
(9, 4, 3, 230.00, '2021-06-07 09:25:28', '2021-06-07 09:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orderID` bigint(20) UNSIGNED NOT NULL,
  `itemID` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `orderID`, `itemID`, `qty`, `created_at`, `updated_at`) VALUES
(8, 6, 2, 3, '2021-06-06 03:23:45', '2021-06-06 03:23:45'),
(9, 6, 1, 5, '2021-06-06 03:23:45', '2021-06-06 03:23:45'),
(16, 9, 9, 1, '2021-06-07 09:25:28', '2021-06-07 09:25:28'),
(17, 9, 7, 1, '2021-06-07 09:25:28', '2021-06-07 09:25:28');

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
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Наличными при получении', NULL, NULL),
(3, 'Картой', NULL, NULL);

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
(4, 'Дмитрий', 'user@eshop.online', NULL, '$2y$10$8HJAQ/Q2rh.mKoj74BNsQOR7tiE7RXNDWcbB7SrLaCdc/WRfxp2/O', NULL, '2021-06-06 00:24:56', '2021-06-06 00:24:56'),
(5, 'user', 'user@yacrudg.com', NULL, '$2y$10$rFPzP7p7tvKRSl4T8S5wAuTWyUfplzWEDLdDVEnve6DYnLHDHCpwy', NULL, '2021-06-06 04:42:19', '2021-06-06 04:42:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cityID` (`cityID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `factories`
--
ALTER TABLE `factories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `factories_countryid_foreign` (`countryID`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_categoryid_foreign` (`categoryID`),
  ADD KEY `items_factoryid_foreign` (`factoryID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_userid_foreign` (`userID`),
  ADD KEY `orders_payment_methodid_foreign` (`payment_methodID`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_orderid_foreign` (`orderID`),
  ADD KEY `order_items_itemid_foreign` (`itemID`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `factories`
--
ALTER TABLE `factories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`cityID`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `addresses_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `factories`
--
ALTER TABLE `factories`
  ADD CONSTRAINT `factories_countryid_foreign` FOREIGN KEY (`countryID`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_categoryid_foreign` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `items_factoryid_foreign` FOREIGN KEY (`factoryID`) REFERENCES `factories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_payment_methodid_foreign` FOREIGN KEY (`payment_methodID`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_userid_foreign` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_itemid_foreign` FOREIGN KEY (`itemID`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_orderid_foreign` FOREIGN KEY (`orderID`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

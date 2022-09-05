-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2022 at 04:22 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `woodmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Furnature', NULL, NULL),
(2, 'Clocks', NULL, NULL),
(3, 'Accessories', NULL, NULL),
(4, 'lighting', NULL, NULL),
(5, 'toys', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `product_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'this amazing product', '2022-07-22 04:18:21', '2022-07-22 04:18:21'),
(2, 1, 1, 'this is the second comment', '2022-07-22 04:31:26', '2022-07-22 04:31:26'),
(3, 1, 7, 'the first comment for that product', '2022-07-22 05:27:37', '2022-07-22 05:27:37');

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
(5, '2022_07_20_124921_create_products_table', 1),
(6, '2022_07_20_125704_create_comments_table', 1),
(7, '2022_07_20_130335_create_orders_table', 1),
(8, '2022_07_20_130414_create_order__products_table', 1),
(9, '2022_07_20_131718_create_wish_lists_table', 1),
(10, '2022_07_20_132958_create_categories_table', 1),
(11, '2022_07_20_133236_create_product__images_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `paymethod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `paymethod`, `address`, `phone`, `status`, `total`, `created_at`, `updated_at`) VALUES
(2, 1, 'cash on delever', 'assiut-dayrout-abojabal', '01210430759', 'shipping', 159.00, '2022-07-21 23:49:11', '2022-07-21 23:49:11'),
(3, 1, 'cash on delever', 'el madi', '01550322585', 'shipping', 120.00, '2022-07-22 00:22:58', '2022-07-22 00:22:58'),
(6, 1, 'cash on delever', 'El mnya', '01210430759', 'shipping', 759.35, '2022-07-22 05:17:04', '2022-07-22 05:17:04'),
(7, 1, 'cash on delever', 'asdasdasd', '01550322585', 'shipping', 638.00, '2022-07-22 05:20:52', '2022-07-22 05:20:52'),
(10, 1, 'cash on delever', 'asfderhrfv', '01210430759', 'shipping', 270.00, '2022-07-22 05:23:41', '2022-07-22 05:23:41');

-- --------------------------------------------------------

--
-- Table structure for table `order__products`
--

CREATE TABLE `order__products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` double(8,2) NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order__products`
--

INSERT INTO `order__products` (`id`, `order_id`, `product_id`, `qty`, `color`, `created_at`, `updated_at`) VALUES
(1, 2, 7, 1.00, 'blue', '2022-07-21 23:49:11', '2022-07-21 23:49:11'),
(2, 3, 1, 1.00, 'blue', '2022-07-22 00:22:58', '2022-07-22 00:22:58'),
(3, 6, 10, 1.00, 'blue', '2022-07-22 05:17:04', '2022-07-22 05:17:04'),
(4, 7, 3, 1.00, 'blue', '2022-07-22 05:20:52', '2022-07-22 05:20:52'),
(5, 10, 1, 1.00, 'blue', '2022-07-22 05:23:41', '2022-07-22 05:23:41'),
(6, 10, 2, 1.00, 'blue', '2022-07-22 05:23:41', '2022-07-22 05:23:41');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `rate` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `rate`, `created_at`, `updated_at`) VALUES
(1, 1, 'chair', 'setting room chair', 120.00, 5.00, '2022-07-20 16:43:31', '2022-07-20 16:43:31'),
(2, 1, 'bed', 'sleeping room bed', 150.00, 5.00, '2022-07-20 16:43:31', '2022-07-20 16:43:31'),
(3, 1, 'sofa', 'setting room sofa', 300.00, 3.00, '2022-07-20 16:43:31', '2022-07-20 16:43:31'),
(4, 2, 'Casio IQ-01S-7DF Wall Clock-White', 'About this item Wall clock Casio IQ-01S-7DF,Quartz clock,Housing made of a polymeric material,Analog: 3 arrows (hour, minute, second),Accuracy: +/- 20 seconds per month', 240.00, 5.00, '2022-07-20 16:43:31', '2022-07-20 16:43:31'),
(5, 2, 'Casio Analog Wall Clock IQ-02S-1DF, Black', 'About this item Type: Wall Clocks, Brand: Casio, Black, Safe to use, Add a great addition to your home', 299.00, 4.00, '2022-07-20 16:43:31', '2022-07-20 16:43:31'),
(6, 3, 'fxmimior Bohemian Dainty Gold Layered Choker Necklaces 3 Tier Sequins Pendant Long Chain Jewelry', 'Gender: Women,Girl .Bridal, Size: lenght from inside to outside is approx 15.7\" 17.7\" 19.6\", Color : gold, The best choice for gift to family, friends, parents', 150.00, 5.00, '2022-07-20 16:43:31', '2022-07-20 16:43:31'),
(7, 4, 'Lotus Metal Handmade Desk Lamp for Lighting ', 'Lotus Metal Handmade Desk Lamp, For Lighting and Decoration, Color - Black, Sleek design', 159.00, 5.00, '2022-07-20 16:43:31', '2022-07-20 16:43:31'),
(8, 4, 'Diamond fit table lamp - Gold', 'Light Type : Table lamp, Color : Gold, Material: coated metal & linen, Product Dimensions ‎: 16.5*16.5*37 cm, product doesn\'t include lamp', 199.00, 5.00, '2022-07-20 16:43:31', '2022-07-20 16:43:31'),
(9, 5, 'Large Fun Toys Crocodile Dentist Bite Finger Game Funny', 'About this item\nName: those trick toys biting my crocodile, Size: length: 15 cm, Material: ABS environmentally safe plastic (not easy to damage)', 89.99, 5.00, '2022-07-20 16:43:31', '2022-07-20 16:43:31'),
(10, 5, 'Domino Train Toy set , Rally Electric Train Model with Light and Sound', 'The chain reaction of dominoes is appealing to both kids and adults.  Help to inspire their intelligence,', 190.35, 2.00, '2022-07-20 16:43:31', '2022-07-20 16:43:31'),
(11, 5, 'frozen stationary set 1.0 Piece\r\n', 'made of high quality materials, unique and durable design, it ensure your kids will have fun while playing', 188.00, 5.00, '2022-07-20 16:43:31', '2022-07-20 16:43:31');

-- --------------------------------------------------------

--
-- Table structure for table `product__images`
--

CREATE TABLE `product__images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product__images`
--

INSERT INTO `product__images` (`id`, `product_id`, `img`, `color`, `created_at`, `updated_at`) VALUES
(1, 1, 'chaire-blue.jpg', 'blue', '2022-07-20 19:41:04', '2022-07-20 16:43:31'),
(2, 1, 'chaire-red.jpg', 'red', '2022-07-20 19:42:47', '2022-07-20 19:42:47'),
(3, 1, 'chaire-yellow.jpg', 'yellow', '2022-07-20 19:43:26', '2022-07-20 19:43:26'),
(4, 2, 'footer1.jpg', 'blue', '2022-07-20 19:43:52', '2022-07-20 19:43:52'),
(5, 3, 'sofa-green.jpg', 'green', '2022-07-20 19:45:46', '2022-07-20 19:45:46'),
(6, 4, 'clocks6.jpg', 'red', '2022-07-20 16:43:31', '2022-07-20 16:43:31'),
(7, 4, 'clocks6_3.jpg', 'gray', '2022-07-20 19:41:04', '2022-07-20 19:43:52'),
(8, 5, 'product-clock-3.jpg', 'black', '2022-07-20 16:43:31', '2022-07-20 19:43:26'),
(9, 5, 'product-clock-3-1.jpg', 'green', '2022-07-20 16:43:31', '2022-07-20 16:43:31'),
(10, 6, 'dock-black-walnut-ip6-grid-A4_7.jpg', 'black', '2022-07-20 19:43:52', '2022-07-20 19:43:26'),
(11, 7, 'product-accessories-10.jpg', 'white', '2022-07-20 16:43:31', '2022-07-20 19:43:52'),
(12, 8, 'product-accessories-10-2.jpg', 'blue', '2022-07-20 16:43:31', '2022-07-20 19:43:52'),
(13, 9, 'product-furniture-11.jpg', 'white', '2022-07-20 19:43:26', '2022-07-20 19:43:52'),
(14, 10, 'product-furniture-11-3.jpg', 'yellow', '2022-07-20 16:43:31', '2022-07-20 16:43:31'),
(15, 11, 'product-furniture-14.jpg', 'white', '2022-07-20 16:43:31', '2022-07-20 16:43:31'),
(16, 11, 'product-furniture-14-2.jpg', 'brouwn', '2022-07-20 16:43:31', '2022-07-20 19:43:26');

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
(1, 'moeen adly', 'moeenadly@gmail.com', NULL, '$2y$10$/5kWk3wkS7w5SOG1qwNZvuJs4KkHFi488Rt18sZCuOg/DmPx2BLti', NULL, '2022-07-21 22:54:04', '2022-07-21 22:54:04');

-- --------------------------------------------------------

--
-- Table structure for table `wish_lists`
--

CREATE TABLE `wish_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order__products`
--
ALTER TABLE `order__products`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product__images`
--
ALTER TABLE `product__images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order__products`
--
ALTER TABLE `order__products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product__images`
--
ALTER TABLE `product__images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wish_lists`
--
ALTER TABLE `wish_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

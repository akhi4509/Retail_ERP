-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2024 at 08:19 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store_keeper`
--

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_06_15_104501_add_user_type', 1),
(4, '2017_06_15_110730_create_stocks_table', 1),
(5, '2017_06_27_085931_create_sales_table', 1),
(6, '2017_06_29_185457_create_settings_table', 1),
(7, '2017_07_02_093808_create_reports_table', 1),
(8, '2017_07_25_105615_create_sales_return_table', 1),
(9, '2017_07_25_110844_create_purchase_return_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `drcr` varchar(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `date`, `details`, `type`, `amount`, `drcr`, `created_at`, `updated_at`) VALUES
(1, '01-04-2024', 'PID: 1, Name: ABC, Description: xyz, Units: 2, Price per Unit Rs. 50', 'purchase', 100.00, 'dr', '2024-03-31 23:03:23', '2024-03-31 23:03:23'),
(2, '02-04-2024', 'PID: 2, Name: Lenovo, Description: Le, Units: 19, Price per Unit Rs. 20', 'purchase', 380.00, 'dr', '2024-04-02 01:15:19', '2024-04-02 01:15:19'),
(3, '02-04-2024', 'PID: 3, Name: Moto, Description: Moto is good product, Units: 50, Price per Unit Rs. 5000', 'purchase', 250000.00, 'dr', '2024-04-02 01:29:22', '2024-04-02 01:29:22'),
(4, '02-04-2024', 'PID: 9, Name: Redmi, Description: Redi, Units: 10, Price per Unit Rs. 200', 'purchase', 2000.00, 'dr', '2024-04-02 05:22:53', '2024-04-02 05:22:53'),
(5, '03-04-2024', 'SID:1, <<Name: ABC, Qty: 1, Discount: 1.43, Unit Price: 69.97>> , Extra Added: , Extra Discount: , Trans. Mode:card', 'sale', 79.55, 'cr', '2024-04-02 22:39:47', '2024-04-02 22:39:47'),
(6, '04-04-2024', 'PID: 11, Name: Akhil, Description: Ajh, Units: 50, Price per Unit Rs. 300', 'purchase', 15000.00, 'dr', '2024-04-04 00:44:42', '2024-04-04 00:44:42'),
(7, '05-04-2024', 'SID:2, <<Name: Akhil, Qty: 1, Discount: 22.05, Unit Price: 418.95>> , Extra Added: , Extra Discount: , Trans. Mode:cash', 'sale', 438.39, 'cr', '2024-04-05 01:38:16', '2024-04-05 01:38:16');

-- --------------------------------------------------------

--
-- Table structure for table `returnin`
--

CREATE TABLE `returnin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`details`)),
  `unit` int(11) NOT NULL,
  `netAmt` double(8,2) NOT NULL,
  `cgstPercent` double(8,2) NOT NULL,
  `cgstAmt` double(8,2) NOT NULL,
  `sgstPercent` double(8,2) NOT NULL,
  `sgstAmt` double(8,2) NOT NULL,
  `discountPercent` double(8,2) NOT NULL,
  `discountAmt` double(8,2) NOT NULL,
  `totalAmt` double(8,2) NOT NULL,
  `tmode` varchar(255) NOT NULL,
  `sale_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `returnout`
--

CREATE TABLE `returnout` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `unit` int(11) NOT NULL,
  `unitPurchPrice` double(8,2) NOT NULL,
  `totalPurchAmount` double(8,2) NOT NULL,
  `stocks_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`details`)),
  `unit` int(11) NOT NULL,
  `netAmt` double(8,2) NOT NULL,
  `cgstPercent` double(8,2) NOT NULL,
  `cgstAmt` double(8,2) NOT NULL,
  `sgstPercent` double(8,2) NOT NULL,
  `sgstAmt` double(8,2) NOT NULL,
  `discountPercent` double(8,2) NOT NULL,
  `discountAmt` double(8,2) NOT NULL,
  `totalAmt` double(8,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tmode` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `name`, `details`, `unit`, `netAmt`, `cgstPercent`, `cgstAmt`, `sgstPercent`, `sgstAmt`, `discountPercent`, `discountAmt`, `totalAmt`, `status`, `tmode`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'ODR#33202493934', '{\"1\":{\"id\":1,\"name\":\"ABC | xyz\",\"price\":69.97,\"quantity\":1,\"attributes\":{\"tax\":1.4,\"discount\":1.43,\"status\":\"Sales\"},\"conditions\":[]}}', 1, 69.97, 8.00, 5.49, 8.00, 5.49, 2.00, 1.40, 79.55, 'Sale', 'card', 1, NULL, '2024-04-02 22:39:47', '2024-04-02 22:39:47'),
(2, 'ODR#53202412388', '{\"10\":{\"id\":10,\"name\":\"Akhil | Ajh\",\"price\":418.95,\"quantity\":1,\"attributes\":{\"tax\":21,\"discount\":22.05,\"status\":\"Sales\"},\"conditions\":[]}}', 1, 418.95, 5.00, 20.11, 4.00, 16.09, 4.00, 16.76, 438.39, 'Sale', 'cash', 1, NULL, '2024-04-05 01:38:16', '2024-04-05 01:38:16');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `business_name` varchar(255) NOT NULL,
  `business_address` varchar(255) NOT NULL,
  `business_phone_no` varchar(255) NOT NULL,
  `gst_no` varchar(255) NOT NULL,
  `sales_profit` double(8,2) NOT NULL,
  `discount` double(8,2) NOT NULL,
  `cgst` double(8,2) NOT NULL,
  `sgst` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `u_id`, `business_name`, `business_address`, `business_phone_no`, `gst_no`, `sales_profit`, `discount`, `cgst`, `sgst`, `created_at`, `updated_at`) VALUES
(1, 1, 'Medusts Technology Pvt. Ltd.', '83/18B Dum Dum Road. Kolkata-700074', '8981009500', 'None', 40.00, 0.00, 0.00, 0.00, '2024-03-31 22:59:47', '2024-04-03 05:50:15'),
(2, 1, 'Aapai Technologies Pvt. Ltd.', '83/18B Dum Dum Road. Kolkata-700074', '8981009500', 'None', 40.00, 0.00, 0.00, 0.00, '2024-04-02 00:12:14', '2024-04-02 00:12:14');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `unit` int(11) NOT NULL,
  `unitPurchPrice` double(8,2) NOT NULL,
  `totalPurchAmount` double(8,2) NOT NULL,
  `unitSalePrice` double(8,2) NOT NULL,
  `saleTax` double(8,2) NOT NULL,
  `saleDisount` double(8,2) NOT NULL,
  `unitSaleAmt` double(8,2) NOT NULL,
  `totalSaleAmount` double(8,2) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `name`, `description`, `unit`, `unitPurchPrice`, `totalPurchAmount`, `unitSalePrice`, `saleTax`, `saleDisount`, `unitSaleAmt`, `totalSaleAmount`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 'Samsung', 'Redi', 10, 200.00, 2000.00, 280.00, 5.60, 5.60, 277.03, 2770.32, 1, '2024-04-02 05:22:53', '2024-04-02 05:29:54', NULL),
(10, 'Akhil', 'Ajh', 49, 300.00, 15000.00, 420.00, 21.00, 22.05, 418.95, 20947.50, 1, '2024-04-04 00:44:22', '2024-04-05 01:38:16', NULL),
(11, 'Akhil', 'Ajh', 60, 300.00, 18000.00, 420.00, 21.00, 0.00, 441.00, 26460.00, 1, '2024-04-04 00:44:42', '2024-04-04 01:03:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `type`) VALUES
(1, 'Admin Admin', 'admin', 'admin@gmail.com', '$2y$10$6cObCBmGNpvxqO9Z9bWmX.2pnrg6/Y8zr/oPwPVnviJ6F/Dc6TV4O', NULL, NULL, NULL, 'admin'),
(3, 'Akhilesh', 'akhi_4509', 'akhileshdandI@gmail.com', '$2y$10$q3R.5U9GjvCC5yfhhLQx9OM0F/op2dm7P3x8t8nisaDDKhazGObMG', 'iLy87wBX6COlSLO2TBBufotkwN9CcP2vqKMF66bT', '2024-04-03 05:10:40', '2024-04-03 05:10:40', 'admin'),
(4, 'Akhilesh Dandi', 'akhi_450945', 'akhileshdandi4509@gmail.com', '$2y$10$WT8Vi6YDuxmMgQjTbbb/JupBmhcUgzi97ZGzceJccIc8QwVClUCgW', 'O9UlMRH1njqdefGn7f1Z4rp92TAGQUFIX2o9E1eJ', '2024-04-03 23:03:39', '2024-04-03 23:03:39', 'admin');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `returnin`
--
ALTER TABLE `returnin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `returnin_sale_id_foreign` (`sale_id`),
  ADD KEY `returnin_user_id_foreign` (`user_id`);

--
-- Indexes for table `returnout`
--
ALTER TABLE `returnout`
  ADD PRIMARY KEY (`id`),
  ADD KEY `returnout_stocks_id_foreign` (`stocks_id`),
  ADD KEY `returnout_user_id_foreign` (`user_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_user_id_foreign` (`user_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `returnin`
--
ALTER TABLE `returnin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `returnout`
--
ALTER TABLE `returnout`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `returnin`
--
ALTER TABLE `returnin`
  ADD CONSTRAINT `returnin_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`),
  ADD CONSTRAINT `returnin_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `returnout`
--
ALTER TABLE `returnout`
  ADD CONSTRAINT `returnout_stocks_id_foreign` FOREIGN KEY (`stocks_id`) REFERENCES `stocks` (`id`),
  ADD CONSTRAINT `returnout_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

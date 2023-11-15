-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 8.0.30 - MySQL Community Server - GPL
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- membuang struktur untuk table pos_shop.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `is_active` enum('1','0') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `customers_UN` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Membuang data untuk tabel pos_shop.customers: ~0 rows (lebih kurang)

-- membuang struktur untuk table pos_shop.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel pos_shop.failed_jobs: ~0 rows (lebih kurang)

-- membuang struktur untuk table pos_shop.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel pos_shop.migrations: ~0 rows (lebih kurang)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- membuang struktur untuk table pos_shop.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel pos_shop.password_reset_tokens: ~0 rows (lebih kurang)

-- membuang struktur untuk table pos_shop.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel pos_shop.personal_access_tokens: ~0 rows (lebih kurang)

-- membuang struktur untuk table pos_shop.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `category_id` int NOT NULL,
  `product_code` varchar(20) DEFAULT NULL,
  `is_active` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `description` text,
  `price` decimal(15,2) NOT NULL DEFAULT '0.00',
  `unit` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'PCS' COMMENT 'satuan',
  `discount_amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `stock` int NOT NULL DEFAULT '0' COMMENT 'stock',
  `image` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_UN` (`product_code`),
  KEY `products_FK` (`category_id`),
  CONSTRAINT `products_FK` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb3;

-- Membuang data untuk tabel pos_shop.products: ~7 rows (lebih kurang)
INSERT INTO `products` (`id`, `product_name`, `category_id`, `product_code`, `is_active`, `created_at`, `updated_at`, `created_by`, `updated_by`, `description`, `price`, `unit`, `discount_amount`, `stock`, `image`) VALUES
	(1, 'Sepatu', 1, 'P0001', '1', '2023-10-11 06:33:07', '2023-10-20 16:17:16', NULL, NULL, 'Sepatu ', 100000.00, 'PCS', 10.00, 0, NULL),
	(33, 'sepatu komersial', 1, 'P10001', '1', '2023-10-20 16:27:47', '2023-10-23 09:23:55', NULL, NULL, 'kokoh', 2000000.00, 'PCS', 0.00, 0, NULL),
	(58, 'sepatuuu12', 1, 'p34', '1', '2023-10-29 10:29:58', '2023-11-13 21:10:42', NULL, NULL, 'p34', 335.00, 'PCS', 0.00, 0, '["uploads\\/2xDfNewATEZK9g4woyJJAPR9IU7qRiQewgQjNYC3.jpg"]'),
	(60, 'sepatuuu', 2, 'P09', '1', '2023-10-30 02:36:40', '2023-10-31 13:42:15', NULL, NULL, 'P09', 90000.00, 'PCS', 0.00, 0, '["uploud/6541043747fa5_sepatu gunung.jpg"]'),
	(61, 'sepatuuu2', 3, 'P11', '1', '2023-10-31 12:42:21', '2023-10-31 14:35:55', NULL, NULL, 'p11', 1111111.00, 'PCS', 0.00, 0, '["uploud/654110cbecf58_sepatu gunung.jpg"]'),
	(66, 'sandal', 3, 'P12', '1', '2023-11-13 01:22:36', '2023-11-13 01:22:36', NULL, NULL, 'p12', 1200000.00, 'PCS', 0.00, 0, '["uploads\\/2oWzjuZQ5F5N6433VnSUUE2TKWLcMwJIxstyllKy.jpg"]'),
	(67, 'sepatuuu', 3, 'P000', '1', '2023-11-13 01:32:31', '2023-11-13 01:32:31', NULL, NULL, '0000', 0.00, 'PCS', 0.00, 0, '["uploads\\/vpiw2OlLubmhRLKpVdzDd54Qy2wPn6y5Lcs27EAA.jpg"]');

-- membuang struktur untuk table pos_shop.products_circulations
CREATE TABLE IF NOT EXISTS `products_circulations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `trx_date` date NOT NULL,
  `reff` varchar(20) DEFAULT NULL,
  `in` int NOT NULL DEFAULT '0',
  `out` int NOT NULL DEFAULT '0',
  `product_id` int NOT NULL,
  `remaining_stock` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Membuang data untuk tabel pos_shop.products_circulations: ~0 rows (lebih kurang)

-- membuang struktur untuk table pos_shop.product_categories
CREATE TABLE IF NOT EXISTS `product_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `is_active` enum('1','0') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Membuang data untuk tabel pos_shop.product_categories: ~3 rows (lebih kurang)
INSERT INTO `product_categories` (`id`, `category_name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `is_active`) VALUES
	(1, 'Sports', '2023-10-11 06:32:38', NULL, NULL, NULL, '1'),
	(2, 'Daily', '2023-10-11 06:32:42', NULL, NULL, NULL, '1'),
	(3, 'Accesoris', '2023-10-11 06:32:54', NULL, NULL, NULL, '1');

-- membuang struktur untuk table pos_shop.purchase
CREATE TABLE IF NOT EXISTS `purchase` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `trx_date` date NOT NULL,
  `sub_amount` decimal(15,2) DEFAULT NULL COMMENT 'total semua',
  `amount_total` decimal(15,2) DEFAULT NULL COMMENT 'total setelah diskon',
  `discount_amount` decimal(15,0) DEFAULT NULL COMMENT 'nominal diskon',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `total_products` int DEFAULT NULL,
  `vendor_id` int NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `purchases_UN` (`code`),
  KEY `purchase_FK` (`vendor_id`),
  CONSTRAINT `purchase_FK` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Membuang data untuk tabel pos_shop.purchase: ~0 rows (lebih kurang)

-- membuang struktur untuk table pos_shop.purchase_details
CREATE TABLE IF NOT EXISTS `purchase_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `purchase_id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `amount_total` decimal(15,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `purchase_details_FK` (`product_id`),
  CONSTRAINT `purchase_details_FK` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Membuang data untuk tabel pos_shop.purchase_details: ~0 rows (lebih kurang)

-- membuang struktur untuk table pos_shop.sales
CREATE TABLE IF NOT EXISTS `sales` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `trx_date` date NOT NULL,
  `sub_amount` decimal(15,2) DEFAULT NULL COMMENT 'total semua',
  `amount_total` decimal(15,2) DEFAULT NULL COMMENT 'total setelah diskon',
  `discount_amount` decimal(15,0) DEFAULT NULL COMMENT 'nominal diskon',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `total_products` int DEFAULT NULL,
  `customer_id` int NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sales_UN` (`code`),
  KEY `sales_FK` (`customer_id`),
  CONSTRAINT `sales_FK` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Membuang data untuk tabel pos_shop.sales: ~0 rows (lebih kurang)

-- membuang struktur untuk table pos_shop.sales_details
CREATE TABLE IF NOT EXISTS `sales_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sales_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `amount_total` decimal(15,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `sales_details_FK` (`product_id`),
  CONSTRAINT `sales_details_FK` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Membuang data untuk tabel pos_shop.sales_details: ~0 rows (lebih kurang)

-- membuang struktur untuk table pos_shop.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(64) DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `group_id` int NOT NULL,
  `is_active` enum('1','0') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_UN` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

-- Membuang data untuk tabel pos_shop.user: ~5 rows (lebih kurang)
INSERT INTO `user` (`id`, `name`, `email`, `phone_number`, `username`, `password`, `last_login_at`, `created_at`, `updated_at`, `created_by`, `updated_by`, `group_id`, `is_active`) VALUES
	(1, 'Super Admin', 'super@gmail.com', '001122334455', 'uadmin', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', NULL, '2023-10-11 06:23:15', '2023-10-11 06:23:59', NULL, NULL, 1, '1'),
	(2, 'Seller Satu', 'seller@gmail.com', '001122334456', 'seller', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', NULL, '2023-10-11 06:24:40', NULL, NULL, NULL, 2, '1'),
	(3, 'Admin Product', 'adminproduct@gmail.com', '001122334457', 'products', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', NULL, '2023-10-11 06:25:14', NULL, NULL, NULL, 3, '1'),
	(4, 'rahul', 'rahul@gmail.com', '085334550580', '085334550580', '$2y$10$8sRbjMv.JB3yH9oIAxmYmOQGsZO0JiiKMWwE48ZFFc../Vn4pAUEO', NULL, '2023-10-28 12:28:54', NULL, NULL, NULL, 3, '1'),
	(9, 'jeyaker', 'jeyaker@gmail.com', '085311888456', '085311888456', '$2y$10$BHAFM5DwK587dzjlf1JoNOfjdDmVXN2STG1law.zdGYUZbsWof0ZK', NULL, '2023-10-28 15:02:34', NULL, NULL, NULL, 3, '1'),
	(10, 'rj', 'rj@gmail.com', '085085085085', '085085085085', '$2y$10$I0BQTdXeJkyiPt4bap48YuFcZwsW7xYXHo0rQ07ZxDKmSxAi22pfG', NULL, '2023-10-31 11:58:19', NULL, NULL, NULL, 3, '1');

-- membuang struktur untuk table pos_shop.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel pos_shop.users: ~0 rows (lebih kurang)

-- membuang struktur untuk table pos_shop.user_groups
CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` int NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `is_active` enum('1','0') NOT NULL DEFAULT '1',
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Membuang data untuk tabel pos_shop.user_groups: ~3 rows (lebih kurang)
INSERT INTO `user_groups` (`id`, `group_name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `is_active`, `description`) VALUES
	(1, 'Super Admin', '2023-10-11 06:19:54', '2023-10-11 06:20:33', NULL, NULL, '1', 'Group user super admin'),
	(2, 'Seller', '2023-10-11 06:20:08', '2023-10-11 06:21:17', NULL, NULL, '1', 'Group user seller'),
	(3, 'Admin Products', '2023-10-11 06:21:32', '2023-10-11 06:21:40', NULL, NULL, '1', 'Group user admin product');

-- membuang struktur untuk table pos_shop.vendors
CREATE TABLE IF NOT EXISTS `vendors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `is_active` enum('1','0') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `vendors_UN` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Membuang data untuk tabel pos_shop.vendors: ~0 rows (lebih kurang)

-- membuang struktur untuk view pos_shop.view_data
-- Membuat tabel sementara untuk menangani kesalahan ketergantungan VIEW
CREATE TABLE `view_data` (
	`id` INT(10) NOT NULL,
	`product_name` VARCHAR(255) NOT NULL COLLATE 'utf8mb3_general_ci',
	`product_code` VARCHAR(20) NULL COLLATE 'utf8mb3_general_ci',
	`description` TEXT NULL COLLATE 'utf8mb3_general_ci',
	`price` DECIMAL(15,2) NOT NULL,
	`category_name` VARCHAR(255) NOT NULL COLLATE 'utf8mb3_general_ci',
	`image` TEXT NULL COLLATE 'utf8mb3_general_ci'
) ENGINE=MyISAM;

-- membuang struktur untuk view pos_shop.view_data
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `view_data`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_data` AS select `p`.`id` AS `id`,`p`.`product_name` AS `product_name`,`p`.`product_code` AS `product_code`,`p`.`description` AS `description`,`p`.`price` AS `price`,`c`.`category_name` AS `category_name`,`p`.`image` AS `image` from (`products` `p` join `product_categories` `c` on((`p`.`category_id` = `c`.`id`)));

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

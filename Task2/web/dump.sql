-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               8.0.12 - MySQL Community Server - GPL
-- Операционная система:         Win64
-- HeidiSQL Версия:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица test_rubric.features
CREATE TABLE IF NOT EXISTS `features` (
  `product_id` int(10) DEFAULT NULL,
  `feature_type` varchar(50) DEFAULT NULL,
  `feature_value` varchar(50) DEFAULT NULL,
  KEY `FK_features_products` (`product_id`),
  CONSTRAINT `FK_features_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Экспортируемые данные не выделены.
-- Дамп структуры для таблица test_rubric.headings
CREATE TABLE IF NOT EXISTS `headings` (
  `heading_id` int(10) NOT NULL AUTO_INCREMENT,
  `heading_code` int(3) DEFAULT NULL,
  `heading_name` varchar(100) DEFAULT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `level` int(10) DEFAULT NULL,
  PRIMARY KEY (`heading_id`),
  UNIQUE KEY `heading_id` (`heading_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Экспортируемые данные не выделены.
-- Дамп структуры для таблица test_rubric.prices
CREATE TABLE IF NOT EXISTS `prices` (
  `product_id` int(10) DEFAULT NULL,
  `price_type` varchar(50) DEFAULT NULL,
  `price_value` int(11) DEFAULT NULL,
  KEY `FK_prices_products` (`product_id`),
  CONSTRAINT `FK_prices_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Экспортируемые данные не выделены.
-- Дамп структуры для таблица test_rubric.products
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_code` int(6) DEFAULT NULL,
  `product_name` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=223 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Экспортируемые данные не выделены.
-- Дамп структуры для таблица test_rubric.products_headings
CREATE TABLE IF NOT EXISTS `products_headings` (
  `product_id` int(10) DEFAULT NULL,
  `heading_id` int(10) DEFAULT NULL,
  KEY `FK_products_headings_products` (`product_id`),
  KEY `FK_products_headings_headings` (`heading_id`),
  CONSTRAINT `FK_products_headings_headings` FOREIGN KEY (`heading_id`) REFERENCES `headings` (`heading_id`),
  CONSTRAINT `FK_products_headings_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Экспортируемые данные не выделены.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

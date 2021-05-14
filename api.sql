-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: May 14, 2021 at 01:09 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api`
--

-- --------------------------------------------------------

--
-- Table structure for table `gifs`
--

DROP TABLE IF EXISTS `gifs`;
CREATE TABLE IF NOT EXISTS `gifs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gifs`
--

INSERT INTO `gifs` (`id`, `name`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'sempson.gif', 'gun Man', 'gun man gif', '2020-11-30 22:00:00', '2020-12-14 22:00:00'),
(2, 'bokimon.gif', 'cartoon', 'bickatsho bokimon cartoon children', '2020-11-30 22:00:00', '2020-12-14 22:00:00'),
(3, 'naroto.gif', 'carton', 'naroto cartoon children', '2020-12-27 13:35:42', '2020-12-27 13:35:42'),
(4, 'dragon.gif', 'cartoon', 'dragon cartoon children', '2020-11-30 22:00:00', '2020-12-14 22:00:00'),
(5, 'tennis.gif', 'sport', 'sport tennis girl', '2020-12-17 10:17:18', '2020-12-17 09:58:04'),
(6, 'run.gif', 'sport', 'run sport girl', '2020-12-23 22:00:00', '2020-12-23 22:00:00'),
(7, 'football.gif', 'sport', 'sport ball football man', '2020-12-17 09:58:04', '2020-12-14 22:00:00'),
(8, 'bascketball.gif', 'sport', 'bascketball ball sport bascket', '2020-11-30 22:00:00', '2020-12-14 22:00:00'),
(9, 'toleeb.gif', 'flower', 'flower toleeb ', '2020-12-14 22:00:00', '2020-12-17 10:17:18'),
(10, 'yasmeen.gif', 'flower', 'flower yasmeen white', '2020-11-30 22:00:00', '2020-12-14 22:00:00'),
(11, 'pink.gif', 'flower', 'pink flower ', '2020-11-30 22:00:00', '2020-11-30 22:00:00'),
(12, 'jory.gif', 'flower', 'jory flower red', '2020-11-30 22:00:00', '2020-12-14 22:00:00'),
(13, 'abdo.gif', 'singer', 'sing song singer mohamed abdo ', '2020-12-27 22:00:00', '2020-12-07 22:00:00'),
(14, 'hiffa.gif', 'singer', 'sig singer song hiffa wehbi', '2020-11-30 22:00:00', '2020-12-14 22:00:00'),
(15, 'hiffa2.gif', 'singer', 'sing song hiffa ', '2020-12-27 13:35:42', '2020-12-27 13:35:42'),
(16, 'nancy.gif', 'singer', 'sing song nancy ajram', '2020-11-30 22:00:00', '2020-12-14 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'fadi', 'fadifadi@gmail.com', '$2y$10$SrppFEAOFKJku9JPNqw8VuPc77Bb0CAnEZtohCX5shygiNSWUMk42', 1, '2021-05-11 13:51:30', '2021-05-11 13:51:30');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

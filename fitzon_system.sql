-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 29, 2024 at 04:41 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitzon_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

DROP TABLE IF EXISTS `admin_tbl`;
CREATE TABLE IF NOT EXISTS `admin_tbl` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(250) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `contact` int NOT NULL,
  `admin_psw` varchar(20) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`admin_id`, `admin_name`, `admin_email`, `contact`, `admin_psw`) VALUES
(1, 'TechFix', 'wfffa@gmail.com', 214141441, '123');

-- --------------------------------------------------------

--
-- Table structure for table `class_tbl`
--

DROP TABLE IF EXISTS `class_tbl`;
CREATE TABLE IF NOT EXISTS `class_tbl` (
  `class_id` int NOT NULL AUTO_INCREMENT,
  `class_name` varchar(250) NOT NULL,
  `class_type` varchar(20) NOT NULL,
  `class_complexity` varchar(50) NOT NULL,
  `class_min` int NOT NULL,
  `class_tea` varchar(25) NOT NULL,
  `class_image` varchar(225) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `class_tbl`
--

INSERT INTO `class_tbl` (`class_id`, `class_name`, `class_type`, `class_complexity`, `class_min`, `class_tea`, `class_image`) VALUES
(13, 'STRENGTH Beginner', 'cardio', 'Beginner', 50, 'kavindu gamage', 'uploads/classes/class06.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `members_tbl`
--

DROP TABLE IF EXISTS `members_tbl`;
CREATE TABLE IF NOT EXISTS `members_tbl` (
  `mem_id` int NOT NULL AUTO_INCREMENT,
  `mem_name` varchar(250) NOT NULL,
  `mem_email` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `mem_type` varchar(20) NOT NULL,
  `mem_psw` varchar(20) NOT NULL,
  PRIMARY KEY (`mem_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `members_tbl`
--

INSERT INTO `members_tbl` (`mem_id`, `mem_name`, `mem_email`, `contact`, `mem_type`, `mem_psw`) VALUES
(1, 'tharindu pereea', 'kavinducgamage@gmail.com', '0764073224', 'gold', 'kavindu'),
(2, 'kavindu gamage', 'kavinducgamage@gmail.com', '0764073224', 'silver', 'kavindu'),
(3, 'kavindu gamage', 'kavinducgamage@gmail.com', '0764073224', 'platinum', 'kavindu'),
(4, 'kavindu gamage', 'kavinducgamage@gmail.com', '0764073224', 'gold', 'kavindu'),
(8, 'B.K.C.Gamage', 'kavinduchamaraa2001@gmail.com', '0788093953', 'gold', '1234568899'),
(6, 'kavindu chamara', 'kavinduchamaraa2001@gmail.com', '0788093953', 'basic', 'chamara'),
(9, 'chanuka shehan', 'chanukashehan423@gmail.com', '123456', 'platinum', 'chanu');

-- --------------------------------------------------------

--
-- Table structure for table `plan_tbl`
--

DROP TABLE IF EXISTS `plan_tbl`;
CREATE TABLE IF NOT EXISTS `plan_tbl` (
  `plan_id` int NOT NULL AUTO_INCREMENT,
  `plan_name` varchar(100) NOT NULL,
  `plan_price` int NOT NULL,
  `plan_fea` varchar(450) NOT NULL,
  `plan_due` varchar(10) NOT NULL,
  PRIMARY KEY (`plan_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `plan_tbl`
--

INSERT INTO `plan_tbl` (`plan_id`, `plan_name`, `plan_price`, `plan_fea`, `plan_due`) VALUES
(2, 'Basic', 2500, 'Access to gym equipment, Locker facility, Free Wi-Fi', 'Month'),
(3, 'Standard', 5000, 'Access to gym equipment, Group classes, Locker facility', 'Month'),
(5, 'Premium', 10000, 'Personal training, Group classes, Nutrition guidance	', 'Month');

-- --------------------------------------------------------

--
-- Table structure for table `tra`
--

DROP TABLE IF EXISTS `tra`;
CREATE TABLE IF NOT EXISTS `tra` (
  `tra_id` int NOT NULL AUTO_INCREMENT,
  `tra_name` varchar(250) NOT NULL,
  `tra_speci` varchar(100) NOT NULL,
  `contact` int NOT NULL,
  `year` int NOT NULL,
  PRIMARY KEY (`tra_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tra`
--

INSERT INTO `tra` (`tra_id`, `tra_name`, `tra_speci`, `contact`, `year`) VALUES
(1, 'kavindu gamage', 'cardio', 764073224, 50);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

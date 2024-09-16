-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2024 at 08:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `entrance_ms`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--
CREATE USER 'entrance_ms'@'localhost' IDENTIFIED WITH caching_sha2_password BY 'entrance_ms@Mysql123';
GRANT ALL PRIVILEGES ON *.* TO 'entrance_ms'@'localhost' WITH GRANT OPTION;
CREATE DATABASE `entrance_ms`;
CREATE TABLE `entrance_ms`.`student` (
  `SN` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Symbol_Number` varchar(50) NOT NULL,
  `Fathers_Name` varchar(55) NOT NULL,
  `Mothers_Name` varchar(55) NOT NULL,
  `Date_of_Birth` varchar(55) NOT NULL,
  `Address` varchar(55) NOT NULL,
  `Contact_Number` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `entrance_ms`.`student` (`SN`, `Name`, `Symbol_Number`, `Fathers_Name`, `Mothers_Name`, `Date_of_Birth`, `Address`, `Contact_Number`) VALUES
(4, 'test', 'test', 'test', 'test', 'test', 'test', '1111111111');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

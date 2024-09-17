-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2024 at 04:42 AM
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
-- Table structure for table `examinee_info`
--

CREATE TABLE `examinee_info` (
  `SN` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Symbol_Number` varchar(50) NOT NULL,
  `Grade` int(16) NOT NULL,
  `Fathers_Name` varchar(55) NOT NULL,
  `Mothers_Name` varchar(55) NOT NULL,
  `Date_of_Birth` date NOT NULL,
  `Address` varchar(55) NOT NULL,
  `Contact_Number` varchar(55) NOT NULL,
  `Exam_Completion_Status` tinyint(1) NOT NULL,
  `Examination_Date` date NOT NULL DEFAULT current_timestamp(),
  `Result` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `examinee_info`
--

INSERT INTO `examinee_info` (`SN`, `Name`, `Symbol_Number`, `Grade`, `Fathers_Name`, `Mothers_Name`, `Date_of_Birth`, `Address`, `Contact_Number`, `Exam_Completion_Status`, `Examination_Date`, `Result`) VALUES
(4, 'Test Examinee', 'admin', 9, 'Father Examinee', 'Mother Examinee', '2005-12-22', 'Examineepur', '1234567890', 0, '2024-09-17', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `examinee_info`
--
ALTER TABLE `examinee_info`
  ADD PRIMARY KEY (`SN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `examinee_info`
--
ALTER TABLE `examinee_info`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

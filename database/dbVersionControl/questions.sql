-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2024 at 07:11 PM
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
-- Database: `entrancems`
--

-- --------------------------------------------------------

--
-- Table structure for table `grade6`
--

CREATE TABLE `grade6` (
  `qid` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `queTitle` varchar(400) NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `correctOption` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grade6`
--

INSERT INTO `grade6` (`qid`, `subject`, `queTitle`, `option1`, `option2`, `option3`, `option4`, `correctOption`) VALUES
(1, 'Science', 'Dsaf', 'Adf', 'Dfa', 'Sdf', 'Dsf', 'Option1'),
(2, 'English', 'What is your name?', 'Ram', 'Shyam', 'Hari', 'Krishna', 'option3'),
(3, 'English', 'What is your name?', 'Ram', 'Shyam', 'Hari', 'Krishna', 'option3'),
(4, 'Health', 'Are you healthy? haha', 'Nah', 'Yes,i am healthy', 'Kinda', 'Super duper', 'option2'),
(5, 'Math', 'A+b', 'V+v', 'D+f', 'A-d', 'A+b', 'option4'),
(6, 'Science', 'A', 'ram', 'd+f', 'a-d', 'a+b', 'option4'),
(7, 'Science', 'A', 'ram', 'd+f', 'a-d', 'a+b', 'option4'),
(8, 'English', 'Asdfsd', 'asdfasdf', 'sdfsadf', 'sdfsdf', 'sadfads', 'option4');

-- --------------------------------------------------------

--
-- Table structure for table `grade7`
--

CREATE TABLE `grade7` (
  `qid` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `queTitle` varchar(400) NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `correctOption` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grade7`
--

INSERT INTO `grade7` (`qid`, `subject`, `queTitle`, `option1`, `option2`, `option3`, `option4`, `correctOption`) VALUES
(1, 'Math', 'What is your name?', 'adf', 'shyam', 'a-d', 'krishna', 'option2'),
(2, 'Science', 'Dfsd', 'sdfd', 'dsf', 'sf', 'adf', 'option4'),
(3, 'Math', 'Sdfsdf', 'asdfadsfasd', 'adsf', 'adsfa', 'sdfa', 'option3');

-- --------------------------------------------------------

--
-- Table structure for table `grade8`
--

CREATE TABLE `grade8` (
  `qid` int(11) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `queTitle` varchar(400) DEFAULT NULL,
  `option1` varchar(255) DEFAULT NULL,
  `option2` varchar(255) DEFAULT NULL,
  `option3` varchar(255) DEFAULT NULL,
  `option4` varchar(255) DEFAULT NULL,
  `correctOption` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grade8`
--

INSERT INTO `grade8` (`qid`, `subject`, `queTitle`, `option1`, `option2`, `option3`, `option4`, `correctOption`) VALUES
(1, 'Health', 'Dfg', 'asdf', 'adsf', 'adf', 'adfgaf', 'option3'),
(2, 'English', 'Asdf', 'agrg', ' cvz', 'gsr', 'adfadf', 'option4');

-- --------------------------------------------------------

--
-- Table structure for table `grade9`
--

CREATE TABLE `grade9` (
  `qid` int(11) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `queTitle` varchar(400) DEFAULT NULL,
  `option1` varchar(255) DEFAULT NULL,
  `option2` varchar(255) DEFAULT NULL,
  `option3` varchar(255) DEFAULT NULL,
  `option4` varchar(255) DEFAULT NULL,
  `correctOption` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grade9`
--

INSERT INTO `grade9` (`qid`, `subject`, `queTitle`, `option1`, `option2`, `option3`, `option4`, `correctOption`) VALUES
(1, 'Math', 'Asdf', 'teh', 'asdf', 'nhn', 'tgh', 'option2'),
(2, 'Math', 'Wer', 'yt', 'uy', 'bvcn', 'sdfg', 'option2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grade6`
--
ALTER TABLE `grade6`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `grade7`
--
ALTER TABLE `grade7`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `grade8`
--
ALTER TABLE `grade8`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `grade9`
--
ALTER TABLE `grade9`
  ADD PRIMARY KEY (`qid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grade6`
--
ALTER TABLE `grade6`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `grade7`
--
ALTER TABLE `grade7`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grade8`
--
ALTER TABLE `grade8`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grade9`
--
ALTER TABLE `grade9`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

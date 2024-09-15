-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: entrancems
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `grade6`
--

DROP TABLE IF EXISTS `grade6`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grade6` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `queTitle` varchar(400) NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `correctOption` varchar(255) NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grade6`
--

LOCK TABLES `grade6` WRITE;
/*!40000 ALTER TABLE `grade6` DISABLE KEYS */;
INSERT INTO `grade6` VALUES (1,'Science','Dsaf','Adf','Dfa','Sdf','Dsf','Option1'),(2,'English','What is your name?','Ram','Shyam','Hari','Krishna','option3'),(3,'English','What is your name?','Ram','Shyam','Hari','Krishna','option3'),(4,'Health','Are you healthy? haha','Nah','Yes,i am healthy','Kinda','Super duper','option2'),(5,'Math','A+b','V+v','D+f','A-d','A+b','option4'),(6,'Science','A','ram','d+f','a-d','a+b','option4'),(7,'Science','A','ram','d+f','a-d','a+b','option4'),(8,'English','Asdfsd','asdfasdf','sdfsadf','sdfsdf','sadfads','option4'),(9,'Science','Sfrhhhhhhhhhhhhhhhhhhhhhhh','srghe','asef','w','srh c','option1');
/*!40000 ALTER TABLE `grade6` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grade7`
--

DROP TABLE IF EXISTS `grade7`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grade7` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `queTitle` varchar(400) NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `correctOption` varchar(255) NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grade7`
--

LOCK TABLES `grade7` WRITE;
/*!40000 ALTER TABLE `grade7` DISABLE KEYS */;
INSERT INTO `grade7` VALUES (1,'Math','What is your name?','adf','shyam','a-d','krishna','option2'),(2,'Science','Dfsd','sdfd','dsf','sf','adf','option4'),(3,'Math','Sdfsdf','asdfadsfasd','adsf','adsfa','sdfa','option3');
/*!40000 ALTER TABLE `grade7` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grade8`
--

DROP TABLE IF EXISTS `grade8`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grade8` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) DEFAULT NULL,
  `queTitle` varchar(400) DEFAULT NULL,
  `option1` varchar(255) DEFAULT NULL,
  `option2` varchar(255) DEFAULT NULL,
  `option3` varchar(255) DEFAULT NULL,
  `option4` varchar(255) DEFAULT NULL,
  `correctOption` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grade8`
--

LOCK TABLES `grade8` WRITE;
/*!40000 ALTER TABLE `grade8` DISABLE KEYS */;
INSERT INTO `grade8` VALUES (1,'Health','Dfg','asdf','adsf','adf','adfgaf','option3'),(2,'English','Asdf','agrg',' cvz','gsr','adfadf','option4');
/*!40000 ALTER TABLE `grade8` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grade9`
--

DROP TABLE IF EXISTS `grade9`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grade9` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) DEFAULT NULL,
  `queTitle` varchar(400) DEFAULT NULL,
  `option1` varchar(255) DEFAULT NULL,
  `option2` varchar(255) DEFAULT NULL,
  `option3` varchar(255) DEFAULT NULL,
  `option4` varchar(255) DEFAULT NULL,
  `correctOption` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grade9`
--

LOCK TABLES `grade9` WRITE;
/*!40000 ALTER TABLE `grade9` DISABLE KEYS */;
INSERT INTO `grade9` VALUES (1,'Math','Asdf','teh','asdf','nhn','tgh','option2'),(2,'Math','Wer','yt','uy','bvcn','sdfg','option2');
/*!40000 ALTER TABLE `grade9` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stuinfo`
--

DROP TABLE IF EXISTS `stuinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stuinfo` (
  `SN` int(6) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Symbol_No` varchar(55) NOT NULL,
  `Fathers_Name` varchar(55) NOT NULL,
  `Mothers_name` varchar(55) NOT NULL,
  `Date_of_Birth` varchar(55) NOT NULL,
  `Address` varchar(55) NOT NULL,
  `Contact_No` varchar(55) NOT NULL,
  `completionStatus` tinyint(1) NOT NULL,
  `examDate` varchar(55) NOT NULL,
  `grade` int(2) NOT NULL,
  PRIMARY KEY (`SN`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stuinfo`
--

LOCK TABLES `stuinfo` WRITE;
/*!40000 ALTER TABLE `stuinfo` DISABLE KEYS */;
INSERT INTO `stuinfo` VALUES (1,'Example1','com-2081-1','ExampleDad1','ExampleMom1','xxxx/xx/xx','ExampleAdd','xxxxxxxxxx',0,'2081/02/01',6),(2,'Example2','com-2081-2','ExampleDad2','ExampleMom2','xxxx/xx/xx','ExampleAdd','xxxxxxxxxx',1,'2081/02/01',7);
/*!40000 ALTER TABLE `stuinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_selections`
--

DROP TABLE IF EXISTS `user_selections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_selections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `selected_option` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_selections`
--

LOCK TABLES `user_selections` WRITE;
/*!40000 ALTER TABLE `user_selections` DISABLE KEYS */;
INSERT INTO `user_selections` VALUES (1,1,1);
/*!40000 ALTER TABLE `user_selections` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-09-15 19:55:43

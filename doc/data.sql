-- MySQL dump 10.13  Distrib 5.6.24, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: buybuy
-- ------------------------------------------------------
-- Server version	5.6.24-0ubuntu2-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `by_address`
--

LOCK TABLES `by_address` WRITE;
/*!40000 ALTER TABLE `by_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `by_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `by_admin`
--

LOCK TABLES `by_admin` WRITE;
/*!40000 ALTER TABLE `by_admin` DISABLE KEYS */;
INSERT INTO `by_admin` VALUES (1,'root','dc76e9f0c0006e8f919e0c515c66dbba3982f785');
/*!40000 ALTER TABLE `by_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `by_area`
--

LOCK TABLES `by_area` WRITE;
/*!40000 ALTER TABLE `by_area` DISABLE KEYS */;
/*!40000 ALTER TABLE `by_area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `by_category`
--

LOCK TABLES `by_category` WRITE;
/*!40000 ALTER TABLE `by_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `by_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `by_commodity`
--

LOCK TABLES `by_commodity` WRITE;
/*!40000 ALTER TABLE `by_commodity` DISABLE KEYS */;
/*!40000 ALTER TABLE `by_commodity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `by_commodity_type`
--

LOCK TABLES `by_commodity_type` WRITE;
/*!40000 ALTER TABLE `by_commodity_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `by_commodity_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `by_user`
--

LOCK TABLES `by_user` WRITE;
/*!40000 ALTER TABLE `by_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `by_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-14 16:57:25

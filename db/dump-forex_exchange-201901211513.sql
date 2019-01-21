-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: forex_exchange
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.16.04.1

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
-- Table structure for table `surcharge`
--

DROP TABLE IF EXISTS `surcharge`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `surcharge` (
  `su_id` int(11) NOT NULL AUTO_INCREMENT,
  `fc_abbreviation` varchar(100) NOT NULL,
  `su_percentage` decimal(3,3) NOT NULL,
  PRIMARY KEY (`su_id`),
  KEY `surcharge_foreignCurrency_FK` (`fc_abbreviation`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `surcharge`
--

LOCK TABLES `surcharge` WRITE;
/*!40000 ALTER TABLE `surcharge` DISABLE KEYS */;
INSERT INTO `surcharge` VALUES (1,'GBP',0.050),(2,'EUR',0.050),(3,'KES',0.025),(4,'USD',0.075);
/*!40000 ALTER TABLE `surcharge` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `domesticCurrency`
--

DROP TABLE IF EXISTS `domesticCurrency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `domesticCurrency` (
  `dc_id` int(11) NOT NULL AUTO_INCREMENT,
  `dc_name` varchar(100) NOT NULL,
  `dc_abbreviation` varchar(100) NOT NULL,
  PRIMARY KEY (`dc_id`),
  UNIQUE KEY `domesticCurrency_dc_id_IDX` (`dc_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domesticCurrency`
--

LOCK TABLES `domesticCurrency` WRITE;
/*!40000 ALTER TABLE `domesticCurrency` DISABLE KEYS */;
INSERT INTO `domesticCurrency` VALUES (1,'South African Rand','ZAR');
/*!40000 ALTER TABLE `domesticCurrency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `or_id` int(11) NOT NULL AUTO_INCREMENT,
  `us_id` int(11) DEFAULT NULL,
  `fc_name` varchar(100) NOT NULL,
  `er_rate` decimal(13,7) NOT NULL,
  `or_surcharge_percentage` decimal(3,3) DEFAULT NULL,
  `or_foreign_currency` decimal(20,2) NOT NULL,
  `or_domestic_currency` decimal(20,2) NOT NULL,
  `or_surcharge_amount` decimal(20,2) NOT NULL,
  `or_date` date NOT NULL,
  PRIMARY KEY (`or_id`),
  KEY `order_user_FK` (`us_id`),
  KEY `order_foreignCurrency_FK` (`fc_name`),
  KEY `order_exchangeRate_FK` (`er_rate`),
  CONSTRAINT `order_user_FK` FOREIGN KEY (`us_id`) REFERENCES `user_bkup` (`us_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discount`
--

DROP TABLE IF EXISTS `discount`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discount` (
  `fc_abbreviation` varchar(100) NOT NULL,
  `di_id` int(11) NOT NULL AUTO_INCREMENT,
  `di_percentage` decimal(3,3) NOT NULL,
  PRIMARY KEY (`di_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discount`
--

LOCK TABLES `discount` WRITE;
/*!40000 ALTER TABLE `discount` DISABLE KEYS */;
INSERT INTO `discount` VALUES ('EUR',1,0.020);
/*!40000 ALTER TABLE `discount` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `us_id` int(11) NOT NULL AUTO_INCREMENT,
  `us_fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `us_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `us_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `us_phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `us_created` datetime NOT NULL,
  `us_modified` datetime NOT NULL,
  `us_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive ',
  PRIMARY KEY (`us_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'R T Mapindu','pintosoft@gmail.com','12d1d9b6c716968ed5fdeb879f26ac91','0124578588','2019-01-21 03:57:19','2019-01-21 03:57:19',1),(2,'Anotidaishe Mapindu','ano@gmail.com','32f16bae86f2c0ff1e35d0070540a839','02157885','2019-01-21 04:01:09','2019-01-21 04:01:09',1),(3,'Florence Paige','flo@gmail.com','536b8aab452c7c713292bd5c814d4b05','718532265','2019-01-21 04:03:56','2019-01-21 04:03:56',1),(4,'Teererai Maphosa','tere@gmail.com','15a8f2809fac227d72b9cd553a28c05a','012457888','2019-01-21 11:52:25','2019-01-21 11:52:25',1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exchangeRate`
--

DROP TABLE IF EXISTS `exchangeRate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exchangeRate` (
  `er_id` int(11) NOT NULL AUTO_INCREMENT,
  `dc_id` int(11) NOT NULL,
  `fc_id` int(11) NOT NULL,
  `er_rate` decimal(13,7) NOT NULL,
  PRIMARY KEY (`er_id`),
  KEY `exchangeRate_domesticCurrency_FK` (`dc_id`),
  KEY `exchangeRate_foreignCurrency_FK` (`fc_id`),
  CONSTRAINT `exchangeRate_domesticCurrency_FK` FOREIGN KEY (`dc_id`) REFERENCES `domesticCurrency` (`dc_id`),
  CONSTRAINT `exchangeRate_foreignCurrency_FK` FOREIGN KEY (`fc_id`) REFERENCES `foreignCurrency` (`fc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exchangeRate`
--

LOCK TABLES `exchangeRate` WRITE;
/*!40000 ALTER TABLE `exchangeRate` DISABLE KEYS */;
INSERT INTO `exchangeRate` VALUES (1,1,1,0.0527032),(2,1,2,0.0718710),(3,1,3,7.8149800),(4,1,4,0.0808279);
/*!40000 ALTER TABLE `exchangeRate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keys`
--

DROP TABLE IF EXISTS `keys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `keys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keys`
--

LOCK TABLES `keys` WRITE;
/*!40000 ALTER TABLE `keys` DISABLE KEYS */;
INSERT INTO `keys` VALUES (1,1,'CODEX@123',0,0,0,NULL,'2018-10-11 13:34:33');
/*!40000 ALTER TABLE `keys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orderDiscount`
--

DROP TABLE IF EXISTS `orderDiscount`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orderDiscount` (
  `od_id` int(11) NOT NULL AUTO_INCREMENT,
  `od_final_amount` decimal(20,2) NOT NULL,
  `od_created` datetime NOT NULL,
  `or_id` int(11) NOT NULL,
  PRIMARY KEY (`od_id`),
  KEY `orderDiscount_order_FK` (`or_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orderDiscount`
--

LOCK TABLES `orderDiscount` WRITE;
/*!40000 ALTER TABLE `orderDiscount` DISABLE KEYS */;
/*!40000 ALTER TABLE `orderDiscount` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `foreignCurrency`
--

DROP TABLE IF EXISTS `foreignCurrency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `foreignCurrency` (
  `fc_id` int(11) NOT NULL AUTO_INCREMENT,
  `fc_name` varchar(100) NOT NULL,
  `fc_abbreviation` varchar(100) NOT NULL,
  PRIMARY KEY (`fc_id`),
  UNIQUE KEY `foreignCurrency_UN` (`fc_name`,`fc_abbreviation`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `foreignCurrency`
--

LOCK TABLES `foreignCurrency` WRITE;
/*!40000 ALTER TABLE `foreignCurrency` DISABLE KEYS */;
INSERT INTO `foreignCurrency` VALUES (1,'British Pound','GBP'),(2,'EURO','EUR'),(3,'Kenyan Shilling','KES'),(4,'US Dollars','USD');
/*!40000 ALTER TABLE `foreignCurrency` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-21 15:13:22

-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: localhost    Database: db_store
-- ------------------------------------------------------
-- Server version	5.7.25-0ubuntu0.18.04.2

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
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
INSERT INTO `addresses` VALUES (8,2,'Ukraine','Lviv','Sheptyzkoro'),(9,4,'Ukraine','Lviv','Sheptyzkoro'),(10,1,'Ukraine','Zboriv','Shevchenko 87'),(11,41,'Ð£ÐºÑ€Ð°Ñ—Ð½Ð°','Ð—Ð±Ð¾Ñ€Ñ–Ð²','Ðœ.Ð“Ñ€ÑƒÑˆÐµÐ²ÑÑŒÐºÐ¾Ð³Ð¾');
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorys`
--

DROP TABLE IF EXISTS `categorys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorys` (
  `categoryID` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parentID` int(12) DEFAULT '0',
  PRIMARY KEY (`categoryID`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorys`
--

LOCK TABLES `categorys` WRITE;
/*!40000 ALTER TABLE `categorys` DISABLE KEYS */;
INSERT INTO `categorys` VALUES (14,'IT',0),(16,'Laptop',17),(17,'MyWinStory',3),(18,'Pens',19),(19,'Pen',14),(20,'Book',14),(25,'Office',17),(26,'Mouse',14);
/*!40000 ALTER TABLE `categorys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `productID` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `categoryID` int(12) DEFAULT NULL,
  `quantity` int(12) DEFAULT NULL,
  `cost` float DEFAULT '0',
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`productID`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `sku` (`sku`),
  KEY `categoryID` (`categoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (4,'Pen','436',16,50,50,'lol','images/2.jpg'),(7,'MyWinStorys','12-USTHF',17,1,15,'Sport','images/2.jpg'),(8,'Ball','14-PNM',18,12,123,'BAsketball','images/2.jpg'),(10,'English Boock','14-OP',16,12,15,'Books','images/2.jpg'),(14,'Monitor','12_monm',14,12,1500,'dasfadsfasdf','images/2.jpg'),(15,'Ball - 2','12-U',20,12,15,'hlklh','images/2.jpg'),(16,'Mose','12-hgdgh',14,125,154.56,'It`s mouse','images/2.jpg'),(17,'ss','1',16,1,1,'1','images/2.jpg'),(18,'Practic','14654',25,12,12,'images','images/2.jpg');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `sex` int(1) DEFAULT NULL,
  `Role` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'vasyl','f7c3bc1d808e04732adf679965ccc34ca7ae3441','wasylko@gmail.com','Vasyl','Matviishyn','+38067-53-28-514',20,1,1),(2,'test','f7c3bc1d808e04732adf679965ccc34ca7ae3441','email@gmail.com','Lol','Kep','+38068-03-28-817',58,1,2),(4,'mailre','f7c3bc1d808e04732adf679965ccc34ca7ae3441','wasylmatwiyishyn@gmail.com','Kristina','Gak','+38068-03-28-817',20,2,2),(16,'test234','12345678','wasylmatwiyishyn@gmail.com','Kristina','Gak','+38068-03-28-817',25,2,2),(36,'php33424','6ef19b0238bbacf2afcd8c81d716287fc6f8a385','wasylmatwiyishyn@gmail.com','Kristina','Matviishyn','+38068-03-88-145',20,1,2),(37,'test2w','f7c3bc1d808e04732adf679965ccc34ca7ae3441','wasylmatwiyishyn@gmail.com','vasyl','Matviishyn','+38068-03-28-817',100,2,2),(39,'wasylmatwiyishyn43','f7c3bc1d808e04732adf679965ccc34ca7ae3441','iyishyn@gmail.com','vasyl','Matviishyn','+38068-03-28-818',20,1,2),(40,'Yaroslav','f7c3bc1d808e04732adf679965ccc34ca7ae3441','iyishyn@gmail.com','vasyl4','Matviishyn','+38068-45-28-817',12,1,2),(41,'andriymiz','f7c3bc1d808e04732adf679965ccc34ca7ae3441','andriy160599miz@gmail.com','ÐÐ½Ð´Ñ€Ñ–Ð¹','ÐœÑ–Ð·ÑŒ','+38097-14-29-357',19,2,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-04  0:50:21

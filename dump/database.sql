CREATE DATABASE  IF NOT EXISTS `MittoAG` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `MittoAG`;
-- MySQL dump 10.13  Distrib 5.5.54, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: MittoAG
-- ------------------------------------------------------
-- Server version	5.5.54-0ubuntu0.14.04.1

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
-- Table structure for table `Countries`
--

DROP TABLE IF EXISTS `Countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `MobileCountryCode` int(11) NOT NULL,
  `CountryCode` int(11) NOT NULL,
  `PricePerSms` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Name_UNIQUE` (`Name`),
  UNIQUE KEY `MobileCountryCode_UNIQUE` (`MobileCountryCode`),
  UNIQUE KEY `CountryCode_UNIQUE` (`CountryCode`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Countries`
--

LOCK TABLES `Countries` WRITE;
/*!40000 ALTER TABLE `Countries` DISABLE KEYS */;
INSERT INTO `Countries` VALUES (1,'Germany',262,49,0.055),(2,'Austria',232,43,0.053),(3,'Poland',260,48,0.032);
/*!40000 ALTER TABLE `Countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Sms`
--

DROP TABLE IF EXISTS `Sms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Sms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Sender` varchar(45) NOT NULL,
  `Receiver` varchar(45) NOT NULL,
  `Text` varchar(45) NOT NULL,
  `IsSent` tinyint(1) NOT NULL DEFAULT '0',
  `DateFrom` datetime NOT NULL,
  `DateTo` datetime NOT NULL,
  `ReceiverCountryId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Sms_1_idx` (`ReceiverCountryId`),
  CONSTRAINT `fk_Sms_Country` FOREIGN KEY (`ReceiverCountryId`) REFERENCES `Countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=173 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Sms`
--

LOCK TABLES `Sms` WRITE;
/*!40000 ALTER TABLE `Sms` DISABLE KEYS */;
INSERT INTO `Sms` VALUES (2,'Fernando','00491234567','Fernando to peter',1,'2016-01-31 00:00:00','2016-01-31 00:00:01',1),(3,'Peter','0049875456','Peter to Fernando',1,'2016-01-31 00:00:03','2016-01-31 00:00:04',1),(4,'Martin','Fernando','Martin to Fernando',0,'2016-01-30 00:00:00','2016-01-30 00:00:31',2),(22,'The Sender',' 49123456789','Hello World',1,'2017-02-01 14:24:34','2017-02-01 14:24:34',1),(23,'The Sender',' 49123456789','Hello World',1,'2017-02-01 14:25:46','2017-02-01 14:25:46',1),(24,'The Sender',' 49123456789','Hello World',1,'2017-02-01 14:25:57','2017-02-01 14:25:57',1),(25,'The Sender',' 49123456789','Hello World',1,'2017-02-01 14:26:00','2017-02-01 14:26:00',1),(26,'The Sender',' 43123456789','Hello World',1,'2017-02-01 14:26:30','2017-02-01 14:26:30',2),(27,'The Sender',' 48123456789','Hello World',1,'2017-02-01 14:26:37','2017-02-01 14:26:37',3),(28,'The Sender',' 4917421293388','Hello World',1,'2017-02-01 18:52:41','2017-02-01 18:52:41',1),(29,'The Sender',' 4917421293388','Hello World',1,'2017-02-01 18:52:46','2017-02-01 18:52:46',1),(30,'The Sender',' 4917421293388','Hello World',1,'2017-02-01 18:52:46','2017-02-01 18:52:46',1),(31,'The Sender',' 4917421293388','Hello World',1,'2017-02-01 18:52:47','2017-02-01 18:52:47',1),(32,'The Sender',' 4917421293388','Hello World',1,'2017-02-01 18:52:47','2017-02-01 18:52:47',1),(33,'The Sender',' 4917421293388','Hello World',1,'2017-02-01 18:52:48','2017-02-01 18:52:48',1),(34,'The Sender',' 4917421293388','Hello World',1,'2017-02-01 18:52:48','2017-02-01 18:52:48',1),(35,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 20:04:15','2017-02-02 20:04:15',1),(36,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 20:16:13','2017-02-02 20:16:13',1),(37,'',' 4917421293388','Hello World',1,'2017-02-02 20:16:56','2017-02-02 20:16:56',1),(38,'',' 4917421293388','Hello World',1,'2017-02-02 20:19:15','2017-02-02 20:19:15',1),(39,'',' 4917421293388','Hello World',1,'2017-02-02 20:20:44','2017-02-02 20:20:44',1),(40,'',' 4917421293388','Hello World',1,'2017-02-02 20:22:13','2017-02-02 20:22:13',1),(41,'',' 4917421293388','Hello World',1,'2017-02-02 20:22:37','2017-02-02 20:22:37',1),(42,'',' 4917421293388','Hello World',1,'2017-02-02 20:24:04','2017-02-02 20:24:04',1),(43,'',' 4917421293388','Hello World',1,'2017-02-02 20:24:57','2017-02-02 20:24:57',1),(44,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 20:25:49','2017-02-02 20:25:49',1),(45,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 20:34:44','2017-02-02 20:34:44',1),(46,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 20:38:15','2017-02-02 20:38:15',1),(47,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 20:38:51','2017-02-02 20:38:51',1),(48,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 20:42:44','2017-02-02 20:42:44',1),(49,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 20:42:52','2017-02-02 20:42:52',1),(50,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 20:46:01','2017-02-02 20:46:01',1),(51,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 20:47:49','2017-02-02 20:47:49',1),(52,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 20:52:03','2017-02-02 20:52:03',1),(53,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 20:52:04','2017-02-02 20:52:04',1),(54,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:01:28','2017-02-02 21:01:28',1),(55,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:01:57','2017-02-02 21:01:57',1),(56,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:04:14','2017-02-02 21:04:14',1),(57,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:04:48','2017-02-02 21:04:48',1),(58,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:04:49','2017-02-02 21:04:49',1),(59,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:05:16','2017-02-02 21:05:16',1),(60,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:05:53','2017-02-02 21:05:53',1),(61,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:06:49','2017-02-02 21:06:49',1),(62,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:10:10','2017-02-02 21:10:10',1),(63,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:12:06','2017-02-02 21:12:06',1),(64,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:15:34','2017-02-02 21:15:34',1),(65,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:16:31','2017-02-02 21:16:31',1),(66,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:16:44','2017-02-02 21:16:44',1),(67,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:16:55','2017-02-02 21:16:55',1),(68,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:18:38','2017-02-02 21:18:38',1),(69,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:18:39','2017-02-02 21:18:39',1),(70,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:18:45','2017-02-02 21:18:45',1),(71,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:18:59','2017-02-02 21:18:59',1),(72,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:19:00','2017-02-02 21:19:00',1),(73,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:19:13','2017-02-02 21:19:13',1),(74,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:19:19','2017-02-02 21:19:19',1),(75,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:19:20','2017-02-02 21:19:20',1),(76,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:19:21','2017-02-02 21:19:21',1),(77,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:19:28','2017-02-02 21:19:28',1),(78,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:20:19','2017-02-02 21:20:19',1),(79,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:20:34','2017-02-02 21:20:34',1),(80,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:20:35','2017-02-02 21:20:35',1),(81,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:20:35','2017-02-02 21:20:35',1),(82,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:20:39','2017-02-02 21:20:39',1),(83,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:20:40','2017-02-02 21:20:40',1),(84,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:20:40','2017-02-02 21:20:40',1),(85,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:20:48','2017-02-02 21:20:48',1),(86,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:20:48','2017-02-02 21:20:48',1),(87,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:20:59','2017-02-02 21:20:59',1),(88,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:21:07','2017-02-02 21:21:07',1),(89,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:21:08','2017-02-02 21:21:08',1),(90,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:21:13','2017-02-02 21:21:13',1),(91,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:21:13','2017-02-02 21:21:13',1),(92,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:21:20','2017-02-02 21:21:20',1),(93,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:21:20','2017-02-02 21:21:20',1),(94,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:21:36','2017-02-02 21:21:36',1),(95,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:22:10','2017-02-02 21:22:10',1),(96,'The Sender',' 4917421293388','Hello World',1,'2017-02-02 21:22:22','2017-02-02 21:22:22',1),(97,'The Sender',' 4917421293388','Hello World',1,'2017-02-06 12:38:09','2017-02-06 12:38:09',1),(98,'asdf',' 4978542132','',1,'2017-02-06 13:55:11','2017-02-06 13:55:11',1),(99,'asdf',' 4978542132','asdf',1,'2017-02-06 14:29:53','2017-02-06 14:29:53',1),(100,'asdf',' 4978542132','asdf',1,'2017-02-06 14:30:28','2017-02-06 14:30:28',1),(101,'asdf',' 4978542132','asdf',1,'2017-02-06 14:30:33','2017-02-06 14:30:33',1),(102,'asdf',' 4978542132','asdf',1,'2017-02-06 14:30:53','2017-02-06 14:30:53',1),(103,'asdf',' 4978542132','asdfhhh',1,'2017-02-06 14:32:08','2017-02-06 14:32:08',1),(104,'asdf',' 4978542132','asdfhhh',1,'2017-02-06 14:32:26','2017-02-06 14:32:26',1),(105,'asdf',' 4978564232','wuakka',1,'2017-02-06 14:34:16','2017-02-06 14:34:16',1),(106,'asdf',' 4978542132','asdfhhh',1,'2017-02-06 14:34:50','2017-02-06 14:34:50',1),(107,'asdf',' 4978564232','wuakka',1,'2017-02-06 14:34:59','2017-02-06 14:34:59',1),(108,'asdf',' 4978564232','wuakka',1,'2017-02-06 14:35:04','2017-02-06 14:35:04',1),(109,'asdf',' 4978564232','wuakka',1,'2017-02-06 14:35:23','2017-02-06 14:35:23',1),(110,'asdf',' 49786548','asdf',1,'2017-02-06 14:37:58','2017-02-06 14:37:58',1),(111,'asdf',' 4978542154','waaaka Fernando',1,'2017-02-06 14:39:02','2017-02-06 14:39:02',1),(112,'fgasdgfdasf',' 495858585858','asdfasdfasdfasdf',1,'2017-02-06 14:42:47','2017-02-06 14:42:47',1),(113,'asdfsdf',' 497854565432','asdfasdf',1,'2017-02-06 14:49:57','2017-02-06 14:49:57',1),(114,'asdfsdf',' 497854565432','asdfasdf',1,'2017-02-06 14:50:37','2017-02-06 14:50:37',1),(115,'asdfsdf',' 497854565432','asdfasdf',1,'2017-02-06 14:50:41','2017-02-06 14:50:41',1),(116,'fgasdgfdasf',' 495858585858','asdfasdfasdfasdf',1,'2017-02-06 14:52:12','2017-02-06 14:52:12',1),(117,'fgasdgfdasf',' 495858585858','asdfasdfasdfasdf',1,'2017-02-06 14:53:08','2017-02-06 14:53:08',1),(118,'fgasdgfdasf',' 49858585858','asdfasdfasdfasdf',1,'2017-02-06 14:54:07','2017-02-06 14:54:07',1),(119,'asdfasdfasdf',' 497854565487','waaaaaka',1,'2017-02-06 14:55:11','2017-02-06 14:55:11',1),(120,'asdfasdfasdf',' 497854565487','waaaaaka',1,'2017-02-06 14:55:32','2017-02-06 14:55:32',1),(121,'The Sender',' 497421293388','Hello World',1,'2017-02-06 15:09:29','2017-02-06 15:09:29',1),(122,'The Sender',' 497421293388','Hello World',1,'2017-02-06 15:09:35','2017-02-06 15:09:35',1),(123,'asdfasdfasdf',' 497854565487','xxxxxxxxxx',1,'2017-02-06 15:10:29','2017-02-06 15:10:29',1),(124,'asdfasdfasdf',' 497854565487','xxxxxxxxxx',1,'2017-02-06 15:11:24','2017-02-06 15:11:24',1),(125,'asdfasdfasdf',' 497854565487','xxxxxxxxxx',1,'2017-02-06 15:13:28','2017-02-06 15:13:28',1),(126,'asdfasdfasdf',' 497854565487','xxxxxxxxxx',1,'2017-02-06 15:14:14','2017-02-06 15:14:14',1),(127,'asdf',' 4945678978','asdf',1,'2017-02-06 16:44:00','2017-02-06 16:44:00',1),(128,'asdf',' 4945678978','asdf',1,'2017-02-06 16:44:20','2017-02-06 16:44:20',1),(129,'asdf',' 4945678978','asdf',1,'2017-02-06 16:44:32','2017-02-06 16:44:32',1),(130,'asdf',' 4945678978','asdf',1,'2017-02-06 16:45:24','2017-02-06 16:45:24',1),(131,'asdf',' 4945678978','asdf',1,'2017-02-06 16:45:36','2017-02-06 16:45:36',1),(132,'asdf',' 4945678978','asdf',1,'2017-02-06 16:45:45','2017-02-06 16:45:45',1),(133,'asdf',' 4945678978','asdf',1,'2017-02-06 16:45:55','2017-02-06 16:45:55',1),(134,'agfaertre',' 49456789654321','asdf',1,'2017-02-06 16:49:15','2017-02-06 16:49:15',1),(135,'asdfasdfas',' 49456789654321','asdfasdfasdf',1,'2017-02-06 16:49:30','2017-02-06 16:49:30',1),(136,'asdfasdfas',' 49456789654321','asdfasdfasdf',1,'2017-02-06 16:50:05','2017-02-06 16:50:05',1),(137,'asdfasdf',' 49586549687','asdfasdf',1,'2017-02-06 16:50:26','2017-02-06 16:50:26',1),(138,'asdf',' 4945678978','asdf',1,'2017-02-06 17:02:54','2017-02-06 17:02:54',1),(139,'asdf',' 4945678978','asdf',1,'2017-02-06 17:03:01','2017-02-06 17:03:01',1),(140,'afdfasdf',' 4365465456465','asdfasdf',1,'2017-02-06 17:11:49','2017-02-06 17:11:49',2),(141,'afdfasdf',' 4865465456465','asdfasdf',1,'2017-02-06 17:11:55','2017-02-06 17:11:55',3),(142,'afdfasdf',' 4965465456465','asdfasdf',1,'2017-02-06 17:12:01','2017-02-06 17:12:01',1),(143,'asdfdasfdas',' 4854546548354','asdfasdfasdf',1,'2017-02-06 17:12:46','2017-02-06 17:12:46',3),(144,'atqewrt',' 49545454','asdfasdf',1,'2017-02-06 17:32:08','2017-02-06 17:32:08',1),(145,'asdfasdf',' 49654564654','asdfasdf',1,'2017-02-06 17:34:21','2017-02-06 17:34:21',1),(146,'asdfasdf',' 4998756468','asdfasdf',1,'2017-02-06 17:34:38','2017-02-06 17:34:38',1),(147,'asdf',' 4945678978','asdf',1,'2017-02-06 20:09:50','2017-02-06 20:09:50',1),(148,'asdfasdf',' 49654654654654','asdfasdf',1,'2017-02-06 20:10:16','2017-02-06 20:10:16',1),(149,'The Sender',' 4917421293388','Hello World',1,'2017-02-06 20:59:33','2017-02-06 20:59:33',1),(150,'The Sender',' 4917421293388','Hello World',1,'2017-02-06 21:01:01','2017-02-06 21:01:01',1),(151,'The Sender',' 4917421293388','Hello World',1,'2017-02-06 21:01:30','2017-02-06 21:01:30',1),(152,'The Sender',' 4917421293388','Hello Worldasdf',1,'2017-02-06 21:01:36','2017-02-06 21:01:36',1),(153,'The Sender',' 4917421293388','Hello Worldasdf',1,'2017-02-06 21:01:46','2017-02-06 21:01:46',1),(154,'The Sender',' 4917421293388','Hello World',1,'2017-02-06 21:02:07','2017-02-06 21:02:07',1),(155,'The Sender',' 4917421293388','Hello World',1,'2017-02-06 21:44:26','2017-02-06 21:44:26',1),(156,'asdf',' 49789456123','asdf',1,'2017-02-06 21:48:34','2017-02-06 21:48:34',1),(157,'asdfdasf',' 49789654321','asdf',1,'2017-02-06 22:19:55','2017-02-06 22:19:55',1),(158,'ASDASd',' 49789456132','asdf',1,'2017-02-07 13:13:35','2017-02-07 13:13:35',1),(159,'The Sender',' 4917421293388','Hello World',1,'2017-02-07 14:17:21','2017-02-07 14:17:21',1),(160,'The Sender',' 4917421293388','Hello World',1,'2017-02-07 14:34:53','2017-02-07 14:34:53',1),(161,'The Sender',' 4917421293388','Hello World',1,'2017-02-07 14:35:18','2017-02-07 14:35:18',1),(162,'asdfasdf',' 49456789456','asdf',1,'2017-02-07 14:37:55','2017-02-07 14:37:55',1),(163,'The Sender',' 4917421293388','Hello World',1,'2017-02-07 14:38:07','2017-02-07 14:38:07',1),(164,'The Sender',' 4917421293388','Hello World',1,'2017-02-07 14:38:28','2017-02-07 14:38:28',1),(165,'The Sender',' 4917421293388','Hello World',1,'2017-02-08 11:21:54','2017-02-08 11:21:54',1),(166,'The Sender',' 4917421293388','Hello World',1,'2017-02-09 23:10:50','2017-02-09 23:10:50',1),(167,'The Sender',' 4917421293388','Hello World',1,'2017-02-09 23:11:34','2017-02-09 23:11:34',1),(168,'The Sender',' 4917421293388','Hello World',1,'2017-02-09 23:11:34','2017-02-09 23:11:34',1),(169,'The Sender',' 4917421293388','Hello World',1,'2017-02-09 23:11:34','2017-02-09 23:11:34',1),(170,'The Sender',' 4917421293388','Hello World',1,'2017-02-09 23:17:48','2017-02-09 23:17:48',1),(171,'The Sender',' 4917421293388','Hello World',1,'2017-02-09 23:20:26','2017-02-09 23:20:26',1),(172,'The Sender',' 4917421293388','Hello World',1,'2017-02-09 23:20:49','2017-02-09 23:20:49',1);
/*!40000 ALTER TABLE `Sms` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-10  0:49:17

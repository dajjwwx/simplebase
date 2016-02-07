-- MySQL dump 10.13  Distrib 5.6.27, for Linux (x86_64)
--
-- Host: localhost    Database: simplegaokao
-- ------------------------------------------------------
-- Server version	5.6.27-log

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
-- Table structure for table `gk_coursepaper`
--

DROP TABLE IF EXISTS `gk_coursepaper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gk_coursepaper` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `province` int(11) NOT NULL COMMENT '省份ID',
  `course` int(11) NOT NULL COMMENT '科目',
  `paper` int(11) NOT NULL,
  `year` varchar(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `province` (`province`,`paper`),
  KEY `paper` (`paper`),
  CONSTRAINT `gk_coursepaper_ibfk_1` FOREIGN KEY (`province`) REFERENCES `simplebase`.`sb_region` (`id`),
  CONSTRAINT `gk_coursepaper_ibfk_2` FOREIGN KEY (`paper`) REFERENCES `gk_paper` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gk_coursepaper`
--

LOCK TABLES `gk_coursepaper` WRITE;
/*!40000 ALTER TABLE `gk_coursepaper` DISABLE KEYS */;
INSERT INTO `gk_coursepaper` VALUES (1,17,1,8,'2015'),(2,17,2,8,'2015'),(3,17,3,8,'2015'),(4,17,4,8,'2015'),(5,17,6,1,'2015'),(6,17,5,1,'2015'),(7,18,1,1,'2015'),(8,18,2,9,'2015'),(9,18,3,9,'2015'),(10,18,4,9,'2015'),(11,18,5,1,'2015'),(12,18,6,1,'2015'),(13,21,9,5,'2015'),(14,21,8,5,'2015'),(15,21,7,5,'2015'),(16,21,10,5,'2015'),(17,21,11,5,'2015'),(18,21,12,5,'2015'),(19,21,1,2,'2015'),(20,21,2,2,'2015'),(21,21,3,2,'2015'),(22,21,4,2,'2015'),(23,27,2,13,'2015'),(24,27,3,13,'2015'),(25,27,4,13,'2015'),(26,27,1,1,'2015'),(27,27,5,1,'2015'),(28,27,6,1,'2015');
/*!40000 ALTER TABLE `gk_coursepaper` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gk_gaokao`
--

DROP TABLE IF EXISTS `gk_gaokao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gk_gaokao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course` tinyint(4) NOT NULL,
  `year` varchar(4) NOT NULL,
  `paper` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fid` (`fid`),
  KEY `pid` (`pid`),
  KEY `paper` (`paper`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gk_gaokao`
--

LOCK TABLES `gk_gaokao` WRITE;
/*!40000 ALTER TABLE `gk_gaokao` DISABLE KEYS */;
INSERT INTO `gk_gaokao` VALUES (1,1,'2014',17,119,0),(2,1,'2015',1,120,0);
/*!40000 ALTER TABLE `gk_gaokao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gk_paper`
--

DROP TABLE IF EXISTS `gk_paper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gk_paper` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `year` varchar(4) NOT NULL,
  `provinces` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gk_paper`
--

LOCK TABLES `gk_paper` WRITE;
/*!40000 ALTER TABLE `gk_paper` DISABLE KEYS */;
INSERT INTO `gk_paper` VALUES (1,'新课标全国Ⅰ卷','2015','3,4,14,16'),(2,'新课标全国Ⅱ卷','2015','5,6,7,8,20,24,25,26,28,29,30,31'),(3,'安徽卷','2015','12'),(4,'北京卷','2015','1'),(5,'重庆卷','2015','22'),(6,'福建卷','2015','13'),(7,'海南卷','2015','21'),(8,'湖北卷','2015','17'),(9,'湖南卷','2015','18'),(10,'江苏卷','2015','10'),(11,'山东卷','2015','15'),(12,'上海卷','2015','9'),(13,'陕西卷','2015','27'),(14,'四川卷','2015','23'),(15,'天津卷','2015','2'),(16,'浙江卷','2015','11'),(17,'四川卷','2014','23'),(18,'上海卷','2014','9'),(19,'新课标全国Ⅰ卷','2014','3,4,16'),(20,'新课标全国Ⅱ卷','2014','5,24,26,28,29');
/*!40000 ALTER TABLE `gk_paper` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-01-26 17:44:29

-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: carjaidee
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.30-MariaDB

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
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brand` (
  `brandId` int(11) NOT NULL AUTO_INCREMENT,
  `brandPicture` varchar(255) DEFAULT NULL,
  `brandName` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`brandId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand`
--

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` VALUES (1,NULL,'ISUZU',1),(2,NULL,'TOYOTA',1),(3,NULL,'MITSUBISHI',1),(4,NULL,'NISSAN',1),(5,NULL,'CHEVROLET',1),(6,NULL,'FORD',1),(7,NULL,'MAZDA',1),(8,NULL,'HONDA',1);
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car_accessories`
--

DROP TABLE IF EXISTS `car_accessories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `car_accessories` (
  `car_accessoriesId` int(11) NOT NULL AUTO_INCREMENT,
  `car_accessoriesName` varchar(255) NOT NULL,
  `businessRegistration` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`car_accessoriesId`),
  KEY `fk_car_accessories_users1_idx` (`id`),
  CONSTRAINT `fk_car_accessories_users1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_accessories`
--

LOCK TABLES `car_accessories` WRITE;
/*!40000 ALTER TABLE `car_accessories` DISABLE KEYS */;
/*!40000 ALTER TABLE `car_accessories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car_profile`
--

DROP TABLE IF EXISTS `car_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `car_profile` (
  `car_profileId` int(11) NOT NULL AUTO_INCREMENT,
  `licenseplate` varchar(255) DEFAULT NULL,
  `mileage` varchar(255) DEFAULT NULL,
  `pictureFront` varchar(255) DEFAULT NULL,
  `pictureBack` varchar(255) DEFAULT NULL,
  `circlePlate` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`car_profileId`),
  KEY `fk_car_profile_users1_idx` (`id`),
  CONSTRAINT `fk_car_profile_users1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_profile`
--

LOCK TABLES `car_profile` WRITE;
/*!40000 ALTER TABLE `car_profile` DISABLE KEYS */;
/*!40000 ALTER TABLE `car_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `district` (
  `districtId` int(11) NOT NULL AUTO_INCREMENT,
  `districtName` varchar(255) NOT NULL,
  `provinceId` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`districtId`),
  KEY `fk_district_province_idx` (`provinceId`),
  CONSTRAINT `fk_district_province` FOREIGN KEY (`provinceId`) REFERENCES `province` (`provinceId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `district`
--

LOCK TABLES `district` WRITE;
/*!40000 ALTER TABLE `district` DISABLE KEYS */;
/*!40000 ALTER TABLE `district` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `garage`
--

DROP TABLE IF EXISTS `garage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `garage` (
  `garageId` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(45) NOT NULL,
  `businessRegistration` varchar(45) NOT NULL,
  `garageName` varchar(255) NOT NULL,
  `garageAddress` varchar(255) NOT NULL,
  `postCode` varchar(45) NOT NULL,
  `latitude` varchar(45) NOT NULL,
  `longtitude` varchar(45) NOT NULL,
  `garageMaster` varchar(255) NOT NULL,
  `approve` varchar(45) NOT NULL,
  `subdistrictId` int(11) NOT NULL,
  `districtId` int(11) NOT NULL,
  `province_provinceId` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`garageId`,`garageMaster`),
  KEY `fk_garage_subdistrict1_idx` (`subdistrictId`),
  KEY `fk_garage_district1_idx` (`districtId`),
  KEY `fk_garage_province1_idx` (`province_provinceId`),
  CONSTRAINT `fk_garage_district1` FOREIGN KEY (`districtId`) REFERENCES `district` (`districtId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_garage_province1` FOREIGN KEY (`province_provinceId`) REFERENCES `province` (`provinceId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_garage_subdistrict1` FOREIGN KEY (`subdistrictId`) REFERENCES `subdistrict` (`subdistrictId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `garage`
--

LOCK TABLES `garage` WRITE;
/*!40000 ALTER TABLE `garage` DISABLE KEYS */;
/*!40000 ALTER TABLE `garage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model`
--

DROP TABLE IF EXISTS `model`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model` (
  `modelId` int(11) NOT NULL AUTO_INCREMENT,
  `modelName` varchar(100) NOT NULL,
  `brandId` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `yearStart` int(11) NOT NULL,
  `yearEnd` int(11) DEFAULT NULL,
  PRIMARY KEY (`modelId`),
  KEY `brandId_idx` (`brandId`),
  CONSTRAINT `brandId` FOREIGN KEY (`brandId`) REFERENCES `brand` (`brandId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model`
--

LOCK TABLES `model` WRITE;
/*!40000 ALTER TABLE `model` DISABLE KEYS */;
INSERT INTO `model` VALUES (1,'TFR 4x2, DRAGON EYE',1,1,1989,0),(2,'TFR RODEO 4x4',1,2,1992,0),(3,'D-MAX 4X2',1,3,2002,2011),(4,'D-MAX 4X4,MU7,HILANDER (4x2 ยกสูง)',1,4,2002,2011),(5,'ALL New D-Max 4x2',1,5,2012,0),(6,'ALL New D-Max 4x4,V-Cross',1,6,2012,0),(7,'ALL New D-Max HILANDER (4x2 ยกสูง)',1,7,2012,0),(8,'MU-X',1,8,2014,0),(9,'HIACE PH50, YH50',2,9,1983,0),(10,'HIACE LH112 (รถตู้หัวจรวด)',2,10,1992,2004),(11,'COMMUTER(รถตู้)',2,11,2005,0),(12,'HILUX MIGHTY-X 4x2',2,12,1983,1988),(13,'HILUX MIGHTY-X LN90(C-CAB)',2,13,1990,1997),(14,'HILUX TIGER- B-CAB, D-CAB 4x2 (4ประตู)',2,14,1998,2003),(15,'HILUX TIGER- C-CAB 4x2 ',2,15,1998,2003),(16,'HILUX TIGER- TIGER 4x4, PRERUNNER (4x2 ยกสูง),SPORT RIDER',2,16,1998,2003),(17,'HILUX VIGO- VIGO 4x2',2,17,2004,2014),(18,'HILUX VIGO- VIGO 4x4, PRERUNNER (4x2ยกสูง)',2,18,2004,2014),(19,'FORTUNER',2,19,2004,2014),(20,'AVANZA F601,F602',2,20,2004,2009),(21,'AVANZA 1.5L',2,21,2011,0),(22,'INNOVA TGN40 2.0L, KUN40 2.5L',2,22,2004,2015),(23,'SOLUNA AL50 (ABS)',2,23,1996,2002),(24,'SOLUNA VIOS NCP42',2,24,2002,2006),(25,'SOLUNA VIOS TURBO',2,25,2002,2006),(26,'SOLUNA VIOS NEW VIOS',2,26,2007,2012),(27,'SOLUNA VIOS ALL NEW VIOS',2,27,2013,0),(28,'YARIS- NCP91',2,28,2007,2012),(29,'YARIS- NCP13#',2,29,2009,2012),(30,'YARIS- ALL NEW YARIS',2,30,2013,0),(31,'COROLLA ALTIS,LIMO',2,31,2001,2007),(32,'COROLLA ALTIS',2,32,2008,2013),(33,'COROLLA ALTIS',2,33,2014,0),(34,'CAMRY SXV20',2,34,1992,2002),(35,'CAMRY ACV30',2,35,2002,2006),(36,'CAMRY ACV40',2,36,2007,2011),(37,'CAMRY ACV40 HYBRID',2,37,2009,0),(38,'CAMRY ACV50',2,38,2012,0),(39,'L200,L200D(AERO BODY)',3,39,1979,2005),(40,'L200,L200D(CYCLONE), STRADA 4x2',3,40,1979,2005),(41,'STRADA 4x4',3,41,1979,2005),(42,'TRITON 4x2',3,42,2006,2013),(43,'TRITON 4x4, TRITON PLUS(4x2ยกสูง)',3,43,2005,2006),(44,'TRITON 4x2',3,44,2014,0),(45,'TRITON 4x4 (ABS)',3,45,2007,2013),(46,'PAJERO SPORT',3,46,2008,2015),(47,'MIRAGE',3,47,2012,0),(48,'ATTRAGE',3,48,2013,0),(49,'LANCER CK2A 1.6L (ท้ายเบนซ์)',3,49,1996,1999),(50,'LANCER CK5A 1.8L (ท้ายเบนซ์)',3,50,1996,1999),(51,'CEDIA CS3A1.6L',3,51,2001,2003),(52,'CHAMP II, CHAMP III',3,52,1989,0),(53,'BIG-M 4x2',4,53,1968,1985),(54,'FRONTIER 4x2',4,54,1998,2002),(55,'FRONTIER 4x4',4,55,1998,2002),(56,'NAVARA SINGLE CAB 4x2',4,56,2007,2013),(57,'NAVARA 4x4,KING CAB 4x2,DOUBLE CAB4x2, CALIBRE(4x2ยกสูง)',4,57,2007,2013),(58,'MARCH',4,58,2010,0),(59,'ALMERA',4,59,2011,0),(60,'TIDA',4,60,2006,0),(61,'SYLPHY',4,61,2012,0),(62,'X-TRAIL',4,62,2014,0),(63,'COLORADO 4x2',5,63,2002,2011),(64,'COLORADO 4x4,COLORADO Z71(4x2ยกสูง)',5,64,2002,2011),(65,'COLORADO 4x2',5,65,2011,2015),(66,'COLORADO 4x4,COLORADO Z71(4x2ยกสูง)',5,66,2011,2015),(67,'COLORADO 4x2',5,67,2015,0),(68,'COLORADO 4x4,COLORADO Z71(4x2ยกสูง)',5,68,2015,0),(69,'CAPTIVA 4x2',5,69,2007,2011),(70,'CAPTIVA 4x4',5,70,2007,2011),(71,'AVEO 1.4L',5,71,2006,2012),(72,'CRUZE 1.6L 1.8L',5,72,2008,2011),(73,'CRUZE 2.0L',5,73,2008,2011),(74,'OPTRA 1.6L 1.8L',5,74,2003,2007),(75,'APTRA 1.6L 1.8L',5,75,2008,2011),(76,'SONIC 1.4L',5,76,2013,2015),(77,'TRAIL BLAZER',5,77,2012,0),(78,'ZAFIRA',5,78,2000,2001),(79,'RANGER 4x2',6,79,1996,2006),(80,'RANGER 4x4',6,80,1996,2006),(81,'J97MU(4x2)',6,81,2006,2011),(82,'J97MU(4x4)',6,82,2006,2011),(83,'ALL NEW RANGER 4x2',6,83,2012,0),(84,'ALL NEW RANGER 4x4, HI-LANDER(4x2ยกสูง)',6,84,2012,0),(85,'EVEREST J90F, J90U (4x4)',6,85,2003,2006),(86,'EVEREST J97MU(4x4),J90U(4x4)',6,86,2006,2007),(87,'EVEREST J90F, J90(4x4)',6,87,2007,2015),(88,'LASER BJ2WD 1.3/1.6/1.8/2.0',6,88,1998,2000),(89,'FIESTA B299',6,89,2011,0),(90,'MAGNUM2005DI',7,90,1990,0),(91,'FIGHTER J97A/C 4x2',7,91,1998,2006),(92,'FIGHTER J97A/C 4x4',7,92,1998,2006),(93,'MAZDA 2 ',7,93,2010,2013),(94,'BT50 4x2',7,94,2006,2011),(95,'BT50 4x4',7,95,2006,2011),(96,'ALL NEW BT50 PRO 4x2',7,96,2012,0),(97,'ALL NEW BT50 PRO 4x4, HI-RACER(4x2ยกสูง)',7,97,2012,0),(98,'CIVIC 1.5EX เตารีด, CR-X, SPORT CIVIC',8,98,1992,1995),(99,'CIVIC EX ตาโต',8,99,1996,1999),(100,'CIVIC FD',8,100,2006,2013),(101,'CITY TYPE Z (ไม่มี ABS)',8,101,1996,2002),(102,'CITY TYPE Z (มี ABS)',8,102,1996,2002),(103,'CITY GD',8,103,2003,2008),(104,'CITY ZX',8,104,2005,2008),(105,'CITY GE',8,105,2009,2013),(106,'JAZZ GD',8,106,2003,2006),(107,'JAZZ GD',8,107,2006,2008),(108,'JAZZ GE',8,108,2009,2013),(109,'BRIO',8,109,2011,0);
/*!40000 ALTER TABLE `model` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `province`
--

DROP TABLE IF EXISTS `province`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `province` (
  `provinceId` int(11) NOT NULL AUTO_INCREMENT,
  `provinceName` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`provinceId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `province`
--

LOCK TABLES `province` WRITE;
/*!40000 ALTER TABLE `province` DISABLE KEYS */;
/*!40000 ALTER TABLE `province` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subdistrict`
--

DROP TABLE IF EXISTS `subdistrict`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subdistrict` (
  `subdistrictId` int(11) NOT NULL AUTO_INCREMENT,
  `subdistrictName` varchar(25) NOT NULL,
  `districtId` int(11) NOT NULL,
  `provinceId` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`subdistrictId`),
  KEY `fk_subdistrict_district1_idx` (`districtId`),
  KEY `fk_subdistrict_province1_idx` (`provinceId`),
  CONSTRAINT `fk_subdistrict_district1` FOREIGN KEY (`districtId`) REFERENCES `district` (`districtId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_subdistrict_province1` FOREIGN KEY (`provinceId`) REFERENCES `province` (`provinceId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subdistrict`
--

LOCK TABLES `subdistrict` WRITE;
/*!40000 ALTER TABLE `subdistrict` DISABLE KEYS */;
/*!40000 ALTER TABLE `subdistrict` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_profile`
--

DROP TABLE IF EXISTS `user_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_profile` (
  `user_profile` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `tell1` varchar(45) DEFAULT NULL,
  `tell2` varchar(45) NOT NULL,
  `provinceId` int(11) NOT NULL,
  `districtId` int(11) NOT NULL,
  `subdistrictId` int(11) NOT NULL,
  PRIMARY KEY (`user_profile`),
  KEY `fk_user_profile_province1_idx` (`provinceId`),
  KEY `fk_user_profile_district1_idx` (`districtId`),
  KEY `fk_user_profile_subdistrict1_idx` (`subdistrictId`),
  CONSTRAINT `fk_user_profile_district1` FOREIGN KEY (`districtId`) REFERENCES `district` (`districtId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_profile_province1` FOREIGN KEY (`provinceId`) REFERENCES `province` (`provinceId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_profile_subdistrict1` FOREIGN KEY (`subdistrictId`) REFERENCES `subdistrict` (`subdistrictId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_profile`
--

LOCK TABLES `user_profile` WRITE;
/*!40000 ALTER TABLE `user_profile` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userprofile`
--

DROP TABLE IF EXISTS `userprofile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userprofile` (
  `dataUser` int(11) NOT NULL,
  `firstname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `subdistrictId` int(11) NOT NULL,
  `districtId` int(11) NOT NULL,
  `provinceId` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `tell1` int(11) NOT NULL,
  `tell2` int(11) NOT NULL,
  PRIMARY KEY (`dataUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userprofile`
--

LOCK TABLES `userprofile` WRITE;
/*!40000 ALTER TABLE `userprofile` DISABLE KEYS */;
/*!40000 ALTER TABLE `userprofile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','$2y$10$z0glw9l0y.YcYQGPmM7eCuRmuNoZgVED5YxP/yVKBkJYrFaaNIVpe',1,'admin@admin',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'carjaidee'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-15 10:28:27

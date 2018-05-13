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
  PRIMARY KEY (`brandId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand`
--

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` VALUES (1,NULL,'BMW'),(2,NULL,'Lamborghini');
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
  `modelName` varchar(255) NOT NULL,
  `brandId` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`modelId`),
  KEY `brandId_idx` (`brandId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model`
--

LOCK TABLES `model` WRITE;
/*!40000 ALTER TABLE `model` DISABLE KEYS */;
INSERT INTO `model` VALUES (1,'i8','1'),(2,'M2','1'),(3,'Aventador','2'),(4,'Huracan','2');
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
  `provinceName` varchar(255) DEFAULT NULL,
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
  `status` varchar(45) NOT NULL,
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
  `category` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','$2y$10$z0glw9l0y.YcYQGPmM7eCuRmuNoZgVED5YxP/yVKBkJYrFaaNIVpe','1','admin@admin',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `year`
--

DROP TABLE IF EXISTS `year`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `year` (
  `brandId` int(11) NOT NULL,
  `modelId` int(11) NOT NULL,
  `year` varchar(45) NOT NULL,
  PRIMARY KEY (`brandId`,`modelId`,`year`),
  KEY `fk_brand_has_model_model1_idx` (`modelId`),
  KEY `fk_brand_has_model_brand1_idx` (`brandId`),
  CONSTRAINT `fk_brand_has_model_brand1` FOREIGN KEY (`brandId`) REFERENCES `brand` (`brandId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_brand_has_model_model1` FOREIGN KEY (`modelId`) REFERENCES `model` (`modelId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `year`
--

LOCK TABLES `year` WRITE;
/*!40000 ALTER TABLE `year` DISABLE KEYS */;
INSERT INTO `year` VALUES (1,1,'2016'),(1,1,'2017'),(1,2,'2016'),(2,1,'2015'),(2,1,'2016'),(2,2,'2014'),(2,2,'2015');
/*!40000 ALTER TABLE `year` ENABLE KEYS */;
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

-- Dump completed on 2018-05-13 16:23:53

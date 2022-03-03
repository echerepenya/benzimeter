-- MySQL dump 10.13  Distrib 8.0.28, for Linux (x86_64)
--
-- Host: localhost    Database: benzimeter
-- ------------------------------------------------------
-- Server version	8.0.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `car`
--

DROP TABLE IF EXISTS `car`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `car` (
  `id` int NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car`
--

LOCK TABLES `car` WRITE;
/*!40000 ALTER TABLE `car` DISABLE KEYS */;
INSERT INTO `car` VALUES (1,'Dodge','Journey','KA6588BH','2022-03-03 09:54:53');
/*!40000 ALTER TABLE `car` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currency`
--

DROP TABLE IF EXISTS `currency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `currency` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso_code` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currency`
--

LOCK TABLES `currency` WRITE;
/*!40000 ALTER TABLE `currency` DISABLE KEYS */;
INSERT INTO `currency` VALUES (1,'гривна','UAH'),(2,'евро','EUR');
/*!40000 ALTER TABLE `currency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20220210154055','2022-03-02 14:22:54',185),('DoctrineMigrations\\Version20220211054030','2022-03-02 14:22:54',34),('DoctrineMigrations\\Version20220212175549','2022-03-02 14:22:54',117),('DoctrineMigrations\\Version20220212203447','2022-03-02 14:22:54',1),('DoctrineMigrations\\Version20220214143024','2022-03-02 14:22:54',65),('DoctrineMigrations\\Version20220216091114','2022-03-02 14:22:54',810),('DoctrineMigrations\\Version20220217113452','2022-03-02 14:22:55',103),('DoctrineMigrations\\Version20220223085557','2022-03-02 14:22:55',35);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fuel`
--

DROP TABLE IF EXISTS `fuel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fuel` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fuel`
--

LOCK TABLES `fuel` WRITE;
/*!40000 ALTER TABLE `fuel` DISABLE KEYS */;
INSERT INTO `fuel` VALUES (1,'Бензин 95'),(2,'Бензин 95 спирт'),(3,'Бензин 92'),(4,'Газ'),(5,'Дизель');
/*!40000 ALTER TABLE `fuel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `petrol_station`
--

DROP TABLE IF EXISTS `petrol_station`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `petrol_station` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture_filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `petrol_station`
--

LOCK TABLES `petrol_station` WRITE;
/*!40000 ALTER TABLE `petrol_station` DISABLE KEYS */;
INSERT INTO `petrol_station` VALUES (1,'Другая','gas-station-sign-logo-4717751525-seeklogo-com-622074b873d5f.png');
/*!40000 ALTER TABLE `petrol_station` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `refuelling`
--

DROP TABLE IF EXISTS `refuelling`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `refuelling` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `car_id` int NOT NULL,
  `petrol_station_id` int NOT NULL,
  `fuel_id` int NOT NULL,
  `currency_id` int NOT NULL,
  `litres` decimal(6,2) NOT NULL,
  `cost` decimal(7,2) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_B5B3A1EBA76ED395` (`user_id`),
  KEY `IDX_B5B3A1EBC3C6F69F` (`car_id`),
  KEY `IDX_B5B3A1EB44C87A3B` (`petrol_station_id`),
  KEY `IDX_B5B3A1EB97C79677` (`fuel_id`),
  KEY `IDX_B5B3A1EB38248176` (`currency_id`),
  CONSTRAINT `FK_B5B3A1EB38248176` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`),
  CONSTRAINT `FK_B5B3A1EB44C87A3B` FOREIGN KEY (`petrol_station_id`) REFERENCES `petrol_station` (`id`),
  CONSTRAINT `FK_B5B3A1EB97C79677` FOREIGN KEY (`fuel_id`) REFERENCES `fuel` (`id`),
  CONSTRAINT `FK_B5B3A1EBA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_B5B3A1EBC3C6F69F` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refuelling`
--

LOCK TABLES `refuelling` WRITE;
/*!40000 ALTER TABLE `refuelling` DISABLE KEYS */;
/*!40000 ALTER TABLE `refuelling` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `sess_id` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sess_data` blob NOT NULL,
  `sess_lifetime` int NOT NULL,
  `sess_time` int NOT NULL,
  PRIMARY KEY (`sess_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('n3d51gv4ltgfu643j0oqucehlq',_binary '_sf2_attributes|a:4:{s:14:\"_security_main\";s:1187:\"O:68:\"Symfony\\Component\\Security\\Core\\Authentication\\Token\\RememberMeToken\":3:{i:0;s:32:\"3221a19cc10969885ab8b0d29a65bdda\";i:1;s:4:\"main\";i:2;a:5:{i:0;O:15:\"App\\Entity\\User\":10:{s:19:\"\0App\\Entity\\User\0id\";i:1;s:22:\"\0App\\Entity\\User\0email\";s:21:\"echerepenya@gmail.com\";s:22:\"\0App\\Entity\\User\0roles\";a:0:{}s:25:\"\0App\\Entity\\User\0password\";s:60:\"$2y$13$vZvVbS30ke34sZ/di1G2S./dYVKoe8b5ufHC.7GvRXDEOpmRyK6FK\";s:21:\"\0App\\Entity\\User\0name\";s:14:\"Евгений\";s:22:\"\0App\\Entity\\User\0phone\";s:13:\"+380937527958\";s:26:\"\0App\\Entity\\User\0createdAt\";O:17:\"DateTimeImmutable\":3:{s:4:\"date\";s:26:\"2022-03-02 19:21:25.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:11:\"Europe/Kiev\";}s:26:\"\0App\\Entity\\User\0updatedAt\";O:17:\"DateTimeImmutable\":3:{s:4:\"date\";s:26:\"2022-03-02 19:23:10.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:11:\"Europe/Kiev\";}s:27:\"\0App\\Entity\\User\0isVerified\";b:1;s:28:\"\0App\\Entity\\User\0refuellings\";O:33:\"Doctrine\\ORM\\PersistentCollection\":2:{s:13:\"\0*\0collection\";O:43:\"Doctrine\\Common\\Collections\\ArrayCollection\":1:{s:53:\"\0Doctrine\\Common\\Collections\\ArrayCollection\0elements\";a:0:{}}s:14:\"\0*\0initialized\";b:0;}}i:1;b:1;i:2;N;i:3;a:0:{}i:4;a:1:{i:0;s:9:\"ROLE_USER\";}}}\";s:15:\"_csrf/https-car\";s:43:\"2BB4v4ZkF7nHQEcrcZaJo5xn7H_OIPLpeY1-tqyCuyY\";s:26:\"_csrf/https-petrol_station\";s:43:\"xAZjRJpsBS0jWjPrrPJI5mwY0HclZAS6KKv0na_0cbk\";s:22:\"_csrf/https-refuelling\";s:43:\"rtZOM-ddVMDzwB69VhgSFIadzNukj78SrApERbsH-o0\";}_sf2_meta|a:3:{s:1:\"u\";i:1646294512;s:1:\"c\";i:1646293872;s:1:\"l\";i:0;}',1646295952,1646294512),('upgs6plq6h8ucs2gj5h056b1o1',_binary '_sf2_attributes|a:3:{s:23:\"_security.last_username\";s:21:\"echerepenya@gmail.com\";s:29:\"_csrf/https-registration_form\";s:43:\"oN9G5OVDeOzmmxbDbVdggn2vbKqtCme8ywj2IN5qlCA\";s:14:\"_security_main\";s:1155:\"O:74:\"Symfony\\Component\\Security\\Core\\Authentication\\Token\\UsernamePasswordToken\":3:{i:0;N;i:1;s:4:\"main\";i:2;a:5:{i:0;O:15:\"App\\Entity\\User\":10:{s:19:\"\0App\\Entity\\User\0id\";i:1;s:22:\"\0App\\Entity\\User\0email\";s:21:\"echerepenya@gmail.com\";s:22:\"\0App\\Entity\\User\0roles\";a:0:{}s:25:\"\0App\\Entity\\User\0password\";s:60:\"$2y$13$vZvVbS30ke34sZ/di1G2S./dYVKoe8b5ufHC.7GvRXDEOpmRyK6FK\";s:21:\"\0App\\Entity\\User\0name\";s:14:\"Евгений\";s:22:\"\0App\\Entity\\User\0phone\";s:13:\"+380937527958\";s:26:\"\0App\\Entity\\User\0createdAt\";O:17:\"DateTimeImmutable\":3:{s:4:\"date\";s:26:\"2022-03-02 19:21:25.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:11:\"Europe/Kiev\";}s:26:\"\0App\\Entity\\User\0updatedAt\";O:17:\"DateTimeImmutable\":3:{s:4:\"date\";s:26:\"2022-03-02 19:23:10.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:11:\"Europe/Kiev\";}s:27:\"\0App\\Entity\\User\0isVerified\";b:1;s:28:\"\0App\\Entity\\User\0refuellings\";O:33:\"Doctrine\\ORM\\PersistentCollection\":2:{s:13:\"\0*\0collection\";O:43:\"Doctrine\\Common\\Collections\\ArrayCollection\":1:{s:53:\"\0Doctrine\\Common\\Collections\\ArrayCollection\0elements\";a:0:{}}s:14:\"\0*\0initialized\";b:0;}}i:1;b:1;i:2;N;i:3;a:0:{}i:4;a:1:{i:0;s:9:\"ROLE_USER\";}}}\";}_sf2_meta|a:3:{s:1:\"u\";i:1646242698;s:1:\"c\";i:1646241822;s:1:\"l\";i:0;}',1646244138,1646242698);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `is_verified` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'echerepenya@gmail.com','[]','$2y$13$vZvVbS30ke34sZ/di1G2S./dYVKoe8b5ufHC.7GvRXDEOpmRyK6FK','Евгений','+380937527958','2022-03-02 19:21:25','2022-03-02 19:23:10',1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-03  8:15:07

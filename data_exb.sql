-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: localhost    Database: db_exb
-- ------------------------------------------------------
-- Server version	8.0.18

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_dados_exb`
--

DROP TABLE IF EXISTS `tbl_dados_exb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_dados_exb` (
  `cnpj` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nome_fantasia` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `razao_social` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cep` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `logradouro` varchar(75) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(75) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `complemento` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`cnpj`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_dados_exb`
--

LOCK TABLES `tbl_dados_exb` WRITE;
/*!40000 ALTER TABLE `tbl_dados_exb` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_dados_exb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_endereco`
--

DROP TABLE IF EXISTS `tbl_endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_endereco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cep` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `logradouro` varchar(75) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(75) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `complemento` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_pessoa_fisica` int(11) DEFAULT NULL,
  `id_pessoa_juridica` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_pessoa_fisica` (`id_pessoa_fisica`),
  KEY `fk_id_pessoa_juridica` (`id_pessoa_juridica`),
  CONSTRAINT `fk_id_pessoa_fisica` FOREIGN KEY (`id_pessoa_fisica`) REFERENCES `tbl_pessoa_fisica` (`id`),
  CONSTRAINT `fk_id_pessoa_juridica` FOREIGN KEY (`id_pessoa_juridica`) REFERENCES `tbl_pessoa_juridica` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_endereco`
--

LOCK TABLES `tbl_endereco` WRITE;
/*!40000 ALTER TABLE `tbl_endereco` DISABLE KEYS */;
INSERT INTO `tbl_endereco` VALUES (1,'','','','',NULL,'','',1,NULL),(2,'','','','',NULL,'','',2,NULL),(3,'','','','',NULL,'','',3,NULL),(4,'','','','',NULL,'','',4,NULL),(5,'','','','',NULL,'','',5,NULL),(6,'','','','',NULL,'','',6,NULL),(7,'','','','',NULL,'','',7,NULL),(8,'','','','',NULL,'','',8,NULL),(9,'','','','',NULL,'','',9,NULL),(10,'','','','',NULL,'','',10,NULL),(11,'','','','',NULL,'','',11,NULL),(12,'','','','',NULL,'','',12,NULL),(13,'dddd','ddddddd','dddd','ddd','SÃ£o Paulo','dd','',13,NULL),(14,'dddd','ddddddd','dddd','ddd','SÃ£o Paulo','dd','',14,NULL),(15,'dddd','ddddddd','dddd','ddd','SÃ£o Paulo','dd','',15,NULL),(16,'dddd','ddddddd','dddd','ddd','SÃ£o Paulo','dd','',16,NULL),(17,'dddd','ddddddd','dddd','ddd','SÃ£o Paulo','dd','',17,NULL),(18,'dddd','ddddddd','dddd','ddd','SÃ£o Paulo','dd','',18,NULL),(19,'dddd','ddddddd','dddd','ddd','SÃ£o Paulo','dd','',19,NULL),(20,'dddd','ddddddd','dddd','ddd','SÃ£o Paulo','dd','',20,NULL),(21,'dddd','ddddddd','dddd','ddd','SÃ£o Paulo','dd','',NULL,1),(22,'dddd','ddddddd','dddd','ddd','SÃ£o Paulo','dd','',NULL,2),(23,'dddd','ddddddd','dddd','ddd','SÃ£o Paulo','dd','',NULL,3),(24,'dddd','ddddddd','dddd','ddd','SÃ£o Paulo','dd','',NULL,4),(25,'dddd','ddddddd','dddd','ddd','SÃ£o Paulo','dd','',21,NULL),(26,'dddd','ddddddd','dddd','ddd','SÃ£o Paulo','dd','',22,NULL),(27,'dddd','ddddddd','dddd','ddd','SÃ£o Paulo','dd','',23,NULL),(28,'dddd','ddddddd','dddd','ddd','SÃ£o Paulo','dd','',24,NULL),(29,'dddd','ddddddd','dddd','ddd','SÃ£o Paulo','dd','',25,NULL),(30,'dddd','ddddddd','dddd','ddd','SÃ£o Paulo','dd','',26,NULL),(31,'dddd','ddddddd','dddd','ddd','SÃ£o Paulo','dd','',27,NULL),(32,'dddd','ddddddd','dddd','ddd','SÃ£o Paulo','dd','',28,NULL),(33,'dddd','ddddddd','dddd','ddd','SÃ£o Paulo','dd','',29,NULL),(34,'dddd','ddddddd','dddd','ddd','SÃ£o Paulo','dd','',30,NULL),(35,'dddd','ddddddd','dddd','ddd','SÃ£o Paulo','dd','',31,NULL),(36,'dddd','ddddddd','dddd','ddd','SÃ£o Paulo','dd','',NULL,5),(37,'dddd','ddddddd','dddd','ddd','SÃ£o Paulo','dd','',NULL,6),(38,'06622330','','','Jandira','SÃ£o Paulo','','',NULL,7);
/*!40000 ALTER TABLE `tbl_endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_itens_orcamento`
--

DROP TABLE IF EXISTS `tbl_itens_orcamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_itens_orcamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_item` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco` float(10,2) DEFAULT NULL,
  `id_orcamento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_orcamento` (`id_orcamento`),
  CONSTRAINT `fk_id_orcamento` FOREIGN KEY (`id_orcamento`) REFERENCES `tbl_orcamento` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_itens_orcamento`
--

LOCK TABLES `tbl_itens_orcamento` WRITE;
/*!40000 ALTER TABLE `tbl_itens_orcamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_itens_orcamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_orcamento`
--

DROP TABLE IF EXISTS `tbl_orcamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_orcamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hora` time DEFAULT NULL,
  `data` date DEFAULT NULL,
  `observacoes` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao_item` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco` float(10,2) DEFAULT NULL,
  `valor_desconto` float(10,2) DEFAULT NULL,
  `valor_total` float(10,2) DEFAULT NULL,
  `cnpj` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_entrega` date DEFAULT NULL,
  `situacao` int(11) DEFAULT NULL,
  `id_pessoa_fisica` int(11) DEFAULT NULL,
  `id_pessoa_juridica` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cnpj` (`cnpj`),
  KEY `fk_id_pf` (`id_pessoa_fisica`),
  KEY `fk_id_pj` (`id_pessoa_juridica`),
  CONSTRAINT `fk_cnpj` FOREIGN KEY (`cnpj`) REFERENCES `tbl_dados_exb` (`cnpj`),
  CONSTRAINT `fk_id_pf` FOREIGN KEY (`id_pessoa_fisica`) REFERENCES `tbl_pessoa_fisica` (`id`),
  CONSTRAINT `fk_id_pj` FOREIGN KEY (`id_pessoa_juridica`) REFERENCES `tbl_pessoa_juridica` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_orcamento`
--

LOCK TABLES `tbl_orcamento` WRITE;
/*!40000 ALTER TABLE `tbl_orcamento` DISABLE KEYS */;
INSERT INTO `tbl_orcamento` VALUES (12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,10,NULL),(13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,11,NULL),(14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,8,NULL),(15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,NULL),(16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,18,NULL),(18,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,20,NULL),(21,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),(22,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(23,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(24,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,25,NULL),(25,'15:12:30','2020-09-05','','ddd',14,15.00,51.00,0.00,NULL,NULL,15,31,NULL),(26,'15:16:29','2020-09-05','','ddd',14,15.00,51.00,0.00,NULL,NULL,15,NULL,6),(27,'16:45:26','2020-09-05','','ddd',4,54.00,2.00,0.00,NULL,NULL,15,NULL,7);
/*!40000 ALTER TABLE `tbl_orcamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pessoa_fisica`
--

DROP TABLE IF EXISTS `tbl_pessoa_fisica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_pessoa_fisica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpf` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pessoa_fisica`
--

LOCK TABLES `tbl_pessoa_fisica` WRITE;
/*!40000 ALTER TABLE `tbl_pessoa_fisica` DISABLE KEYS */;
INSERT INTO `tbl_pessoa_fisica` VALUES (1,'teste 01','4147-9875','(17)26312-5312','yasmin@gmail.com','451.487.847.77'),(2,'teste 01','4147-9875','(17)26312-5312','yasmin@gmail.com','451.487.847.77'),(3,'teste 01','4147-9875','(17)26312-5312','yasmin@gmail.com','451.487.847.77'),(4,'teste 01','4147-9875','(17)26312-5312','yasmin@gmail.com','451.487.847.77'),(5,'teste 01','4147-9875','(17)26312-5312','yasmin@gmail.com','451.487.847.77'),(6,'teste 01','4147-9875','(17)26312-5312','yasmin@gmail.com','451.487.847.77'),(7,'teste 01','4147-9875','(17)26312-5312','yasmin@gmail.com','451.487.847.77'),(8,'teste 01','4147-9875','(17)26312-5312','yasmin@gmail.com','451.487.847.77'),(9,'teste 01','4147-9875','(17)26312-5312','yasmin@gmail.com','451.487.847.77'),(10,'teste 01','4147-9875','(17)26312-5312','yasmin@gmail.com','451.487.847.77'),(11,'teste 01','4147-9875','(17)26312-5312','yasmin@gmail.com','451.487.847.77'),(12,'teste 01','4147-9875','(17)26312-5312','yasmin@gmail.com','451.487.847.77'),(13,'GECILENE LIMA DE CAMPOS','1142062441','123123','pedrohenriquelm500@gmail.com','487.7744'),(14,'GECILENE LIMA DE CAMPOS','1142062441','123123','pedrohenriquelm500@gmail.com','487.7744'),(15,'GECILENE LIMA DE CAMPOS','1142062441','123123','pedrohenriquelm500@gmail.com','487.7744'),(16,'GECILENE LIMA DE CAMPOS','1142062441','123123','pedrohenriquelm500@gmail.com','487.7744'),(17,'GECILENE LIMA DE CAMPOS','1142062441','123123','pedrohenriquelm500@gmail.com','487.7744'),(18,'GECILENE LIMA DE CAMPOS','1142062441','123123','pedrohenriquelm500@gmail.com','487.7744'),(19,'GECILENE LIMA DE CAMPOS','1142062441','123123','pedrohenriquelm500@gmail.com','487.7744'),(20,'GECILENE LIMA DE CAMPOS','1142062441','123123','pedrohenriquelm500@gmail.com','487.7744'),(21,'GECILENE LIMA DE CAMPOS','1142062441','123123','pedrohenriquelm500@gmail.com','487.7744'),(22,'GECILENE LIMA DE CAMPOS','1142062441','123123','pedrohenriquelm500@gmail.com','487.7744'),(23,'GECILENE LIMA DE CAMPOS','1142062441','123123','pedrohenriquelm500@gmail.com','487.7744'),(24,'GECILENE LIMA DE CAMPOS','1142062441','123123','pedrohenriquelm500@gmail.com','487.7744'),(25,'GECILENE LIMA DE CAMPOS','1142062441','123123','pedrohenriquelm500@gmail.com','487.7744'),(26,'GECILENE LIMA DE CAMPOS','1142062441','123123','pedrohenriquelm500@gmail.com','487.7744'),(27,'GECILENE LIMA DE CAMPOS','1142062441','123123','pedrohenriquelm500@gmail.com','487.7744'),(28,'GECILENE LIMA DE CAMPOS','1142062441','123123','pedrohenriquelm500@gmail.com','487.7744'),(29,'GECILENE LIMA DE CAMPOS','1142062441','123123','pedrohenriquelm500@gmail.com','487.7744'),(30,'GECILENE LIMA DE CAMPOS','1142062441','123123','pedrohenriquelm500@gmail.com','487.7744'),(31,'GECILENE LIMA DE CAMPOS','1142062441','123123','pedrohenriquelm500@gmail.com','487.7744');
/*!40000 ALTER TABLE `tbl_pessoa_fisica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pessoa_juridica`
--

DROP TABLE IF EXISTS `tbl_pessoa_juridica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_pessoa_juridica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razao_social` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nome_fantasia` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cnpj` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pessoa_juridica`
--

LOCK TABLES `tbl_pessoa_juridica` WRITE;
/*!40000 ALTER TABLE `tbl_pessoa_juridica` DISABLE KEYS */;
INSERT INTO `tbl_pessoa_juridica` VALUES (1,'teste','teste','teste','1142062441','123123','pedrohenriquelm500@gmail.com'),(2,'teste','teste','teste','1142062441','123123','pedrohenriquelm500@gmail.com'),(3,'teste','teste','teste','1142062441','123123','pedrohenriquelm500@gmail.com'),(4,'teste','teste','teste','1142062441','123123','pedrohenriquelm500@gmail.com'),(5,'teste','teste','teste','1142062441','123123','pedrohenriquelm500@gmail.com'),(6,'teste','teste','teste','1142062441','123123','pedrohenriquelm500@gmail.com'),(7,'OLA','OLA','OLA','1142062441','12312312312','pedrohenriquelm500@gmail.com');
/*!40000 ALTER TABLE `tbl_pessoa_juridica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_responsavel`
--

DROP TABLE IF EXISTS `tbl_responsavel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_responsavel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cnpj` int(11) NOT NULL,
  `senha` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `token` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cnpj_empresa` (`cnpj`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_responsavel`
--

LOCK TABLES `tbl_responsavel` WRITE;
/*!40000 ALTER TABLE `tbl_responsavel` DISABLE KEYS */;
INSERT INTO `tbl_responsavel` VALUES (3,'exb','exb@gmail.com','123456',1,'$2y$10$AYTfkbJGHVKZzAThJCQj7O9.5y9ekrzAzkbOB/JWpRXdNPlJ3FYqq','8f19de292d14569252476786e06177f8');
/*!40000 ALTER TABLE `tbl_responsavel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'db_exb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-09 22:33:40

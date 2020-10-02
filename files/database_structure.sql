CREATE DATABASE  IF NOT EXISTS `db_exb` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `db_exb`;
-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: localhost    Database: db_exb
-- ------------------------------------------------------
-- Server version	5.6.49-log

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
  `cnpj` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `nome_fantasia` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `razao_social` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cep` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logradouro` varchar(75) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(75) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `complemento` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`cnpj`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_endereco`
--

DROP TABLE IF EXISTS `tbl_endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_endereco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cep` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logradouro` varchar(75) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(75) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `complemento` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_pessoa_fisica` int(11) DEFAULT NULL,
  `id_pessoa_juridica` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_pessoa_fisica` (`id_pessoa_fisica`),
  KEY `fk_id_pessoa_juridica` (`id_pessoa_juridica`),
  CONSTRAINT `fk_id_pessoa_fisica` FOREIGN KEY (`id_pessoa_fisica`) REFERENCES `tbl_pessoa_fisica` (`id`),
  CONSTRAINT `fk_id_pessoa_juridica` FOREIGN KEY (`id_pessoa_juridica`) REFERENCES `tbl_pessoa_juridica` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `observacoes` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor_desconto` float(10,2) DEFAULT NULL,
  `valor_total` float(10,2) DEFAULT NULL,
  `condicao_pagamento` text COLLATE utf8_unicode_ci,
  `cnpj` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `situacao` int(11) DEFAULT NULL,
  `vendedor` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_pessoa_fisica` int(11) DEFAULT NULL,
  `id_pessoa_juridica` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cnpj` (`cnpj`),
  KEY `fk_id_pf` (`id_pessoa_fisica`),
  KEY `fk_id_pj` (`id_pessoa_juridica`),
  CONSTRAINT `fk_cnpj` FOREIGN KEY (`cnpj`) REFERENCES `tbl_dados_exb` (`cnpj`),
  CONSTRAINT `fk_id_pf` FOREIGN KEY (`id_pessoa_fisica`) REFERENCES `tbl_pessoa_fisica` (`id`),
  CONSTRAINT `fk_id_pj` FOREIGN KEY (`id_pessoa_juridica`) REFERENCES `tbl_pessoa_juridica` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_pessoa_fisica`
--

DROP TABLE IF EXISTS `tbl_pessoa_fisica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_pessoa_fisica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpf` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_pessoa_juridica`
--

DROP TABLE IF EXISTS `tbl_pessoa_juridica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_pessoa_juridica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razao_social` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nome_fantasia` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cnpj` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_responsavel`
--

DROP TABLE IF EXISTS `tbl_responsavel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_responsavel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `cnpj` int(11) NOT NULL,
  `senha` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `token` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cnpj_empresa` (`cnpj`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-02 12:35:30

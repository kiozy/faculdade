CREATE DATABASE  IF NOT EXISTS `infaculdade` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `infaculdade`;
-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: localhost    Database: infaculdade
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `aluno`
--

DROP TABLE IF EXISTS `aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aluno` (
  `cod_aluno` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_turma` int(11) unsigned NOT NULL,
  `cod_usuario` int(11) unsigned NOT NULL,
  `matricula_aluno` int(11) NOT NULL,
  `nome_aluno` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` char(11) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cod_aluno`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `matricula_aluno` (`matricula_aluno`),
  KEY `cod_turma_aluno_fk_idx` (`cod_turma`),
  KEY `cod_usuario_aluno_fk_idx` (`cod_usuario`),
  CONSTRAINT `cod_turma_aluno_fk` FOREIGN KEY (`cod_turma`) REFERENCES `turma` (`cod_turma`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `cod_usuario_aluno_fk` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `disciplina`
--

DROP TABLE IF EXISTS `disciplina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disciplina` (
  `cod_disciplina` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome_disc` varchar(32) NOT NULL,
  `ementa` varchar(64) NOT NULL,
  PRIMARY KEY (`cod_disciplina`),
  UNIQUE KEY `nome_disc` (`nome_disc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `endereco` (
  `cod_endereco` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(10) unsigned NOT NULL,
  `endereco` varchar(64) NOT NULL,
  `numero` varchar(4) NOT NULL,
  `bairro` varchar(12) NOT NULL,
  PRIMARY KEY (`cod_endereco`),
  KEY `cod_usuario` (`cod_usuario`),
  CONSTRAINT `cod_usuario_fk` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cod_usuario`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ponto`
--

DROP TABLE IF EXISTS `ponto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ponto` (
  `cod_ponto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_prof` int(11) unsigned NOT NULL,
  `hi` datetime NOT NULL,
  `hf` datetime DEFAULT NULL,
  `ht` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_ponto`),
  KEY `cod_prof_ponto_fk_idx` (`cod_prof`),
  CONSTRAINT `cod_prof_ponto_fk` FOREIGN KEY (`cod_prof`) REFERENCES `professor` (`cod_professor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `professor`
--

DROP TABLE IF EXISTS `professor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professor` (
  `cod_professor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(10) unsigned NOT NULL,
  `matricula_prof` varchar(8) CHARACTER SET latin1 NOT NULL,
  `nome_prof` varchar(45) CHARACTER SET latin1 NOT NULL,
  `cpf` char(11) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`cod_professor`),
  KEY `cod_usuario` (`cod_usuario`),
  CONSTRAINT `cod_usuario` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cod_usuario`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `telefone`
--

DROP TABLE IF EXISTS `telefone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefone` (
  `cod_telefone` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) unsigned NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `celular` varchar(12) NOT NULL,
  PRIMARY KEY (`cod_telefone`),
  KEY `cod_usuario_idx` (`cod_usuario`),
  CONSTRAINT `cod_usuario_tel_fk` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cod_usuario`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `turma`
--

DROP TABLE IF EXISTS `turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turma` (
  `cod_turma` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_professor` int(11) unsigned NOT NULL,
  `cod_disciplina` int(11) unsigned NOT NULL,
  `num_alunos` int(11) NOT NULL,
  PRIMARY KEY (`cod_turma`),
  KEY `cod_prof_turma_fk_idx` (`cod_professor`),
  KEY `cod_disc_turma_fk_idx` (`cod_disciplina`),
  CONSTRAINT `cod_prof_turma_fk` FOREIGN KEY (`cod_professor`) REFERENCES `professor` (`cod_professor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `cod_disc_turma_fk` FOREIGN KEY (`cod_disciplina`) REFERENCES `disciplina` (`cod_disciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `cod_usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(64) CHARACTER SET latin1 NOT NULL,
  `senha` varchar(16) CHARACTER SET latin1 NOT NULL DEFAULT 'batatinha',
  `tipo` varchar(4) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`cod_usuario`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-07-31 13:17:40

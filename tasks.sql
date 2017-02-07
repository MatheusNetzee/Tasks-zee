CREATE DATABASE  IF NOT EXISTS `tasks` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `tasks`;
-- MySQL dump 10.13  Distrib 5.7.13, for linux-glibc2.5 (x86_64)
--
-- Host: localhost    Database: tasks
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1

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
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `cor` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` VALUES (12,'Trabalho','atividades relacionadas ao trabalho','#0c33b5'),(13,'Lazer','tudo relacionado Ã  lazer e diversao','#11f940'),(14,'Importante','tarefas essenciais','#ed1111'),(15,'Financeiro','todos os tipos de contas','#fef728'),(16,'FÃ­sico','exercicios','#fb9000');
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarefa`
--

DROP TABLE IF EXISTS `tarefa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarefa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prioridade` enum('1','2','3') DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `descricao` text,
  `estado` enum('NI','A','F') DEFAULT NULL,
  `data` date DEFAULT NULL,
  `tempoEstimado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarefa`
--

LOCK TABLES `tarefa` WRITE;
/*!40000 ALTER TABLE `tarefa` DISABLE KEYS */;
INSERT INTO `tarefa` VALUES (1,'1','Conta de luz','conta','F','2017-01-26',30),(2,'2','Estudar','estudar','F','2017-01-26',60),(11,'2','Caminhar ','exercicio','F','2017-01-27',120),(16,'3','Jogar xadrez','diversÃ£o','F','2017-01-31',30),(18,'3','Trabalho','teste','NI','2017-01-31',40),(19,'3','Jogar','lazer','F','2017-01-25',60),(20,'3','Teste','teste','NI','2017-02-01',50),(21,'2','Caminhar','exercÃ­cio','F','2017-01-25',50),(22,'1','Estudar PHP','estudos','NI','2017-01-31',90),(23,'1','Conta de Ã¡gua','contas','NI','2017-01-31',30),(24,'1','Ir ao banco','Importante','NI','2017-01-31',40),(25,'2','Escrever relatÃ³rio','atividade do trabalho','F','2017-01-31',80),(26,'1','AlmoÃ§ar','pausa','NI','2017-01-31',30),(27,'3','Teste','teste','F','2017-01-30',80),(28,'1','Descansar','tempo livre','NI','2017-02-02',120),(30,'2','teste','teste','NI','2017-02-03',30),(31,'2','Subir site','tarefa trabalho','NI','2017-02-04',50),(32,'1','Teste 3','tste ','NI','2017-02-04',100);
/*!40000 ALTER TABLE `tarefa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarefa_tag`
--

DROP TABLE IF EXISTS `tarefa_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarefa_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tag` int(11) DEFAULT NULL,
  `id_tarefa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tag` (`id_tag`),
  KEY `id_tarefa` (`id_tarefa`),
  CONSTRAINT `tarefa_tag_ibfk_1` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tarefa_tag_ibfk_2` FOREIGN KEY (`id_tarefa`) REFERENCES `tarefa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarefa_tag`
--

LOCK TABLES `tarefa_tag` WRITE;
/*!40000 ALTER TABLE `tarefa_tag` DISABLE KEYS */;
INSERT INTO `tarefa_tag` VALUES (11,12,18),(12,14,18),(13,16,18),(18,13,19),(19,14,19),(20,15,1),(21,12,2),(23,16,11),(24,12,20),(25,16,20),(26,13,21),(27,14,21),(28,12,22),(29,14,22),(30,15,23),(31,14,24),(32,15,24),(38,13,16),(39,12,25),(40,14,25),(41,16,26),(42,13,27),(43,13,28),(45,14,30),(46,12,31),(47,14,31),(48,12,32),(49,13,32),(50,14,32),(51,15,32),(52,16,32);
/*!40000 ALTER TABLE `tarefa_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `id_tarefa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tarefa` (`id_tarefa`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tarefa`) REFERENCES `tarefa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'adm','adm@email.com',NULL,'123',NULL),(9,'teste','teste@email.com',NULL,'123',NULL),(10,'sadasdasdsa','email@2323.com',NULL,'2132354',NULL),(11,'asdasdsa','email@2323.com',NULL,'213214',NULL),(12,'dasdsa','email@2323.com',NULL,'2313sad',NULL),(13,'sadasd234a','email@2323.com',NULL,'sdase23',NULL),(14,'teste1','teste12@email.com',NULL,'123',NULL),(15,'teste1','contato@netzee.com.br',NULL,'1232',NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-31 14:12:12

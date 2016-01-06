-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: projet-tut-info-1.iut2.upmf-grenoble.fr    Database: 2015_M3301_groupe3_prod
-- ------------------------------------------------------
-- Server version	5.1.73-1+deb6u1

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
-- Table structure for table `Contacts`
--

DROP TABLE IF EXISTS `Contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Contacts` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `tel` int(12) NOT NULL,
  `metier` varchar(12) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `notes` varchar(1000) DEFAULT NULL,
  `derniere_maj` date DEFAULT NULL,
  `prochaine_maj` date DEFAULT NULL,
  `utilisateur` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Contacts`
--

LOCK TABLES `Contacts` WRITE;
/*!40000 ALTER TABLE `Contacts` DISABLE KEYS */;
INSERT INTO `Contacts` VALUES (14,'Doe','John',604171968,'booker','john@doe.fr',NULL,'2015-12-04','2015-12-04',1),(45,'Henry','Fonda',689567841,'Musicien','Henry.Fonda@gmail.com','DÃ©tails sur ce contact','2015-12-18','2016-03-18',0),(48,'BÃ©bÃ©','quipleur',2147483647,'Musicien','','DÃ©tails sur ce contact                                                            ','2015-12-18','2016-04-06',0),(41,'oui','youpla',0,'','','DÃ©tails sur ce contact                    ','2015-12-18','2016-03-18',0),(43,'Young','Angus',687569823,'Musicien','','DÃ©tails sur ce contact                    ','2015-12-18','2016-04-06',0),(44,'Fess','Estival',194675,'Musicien','','DÃ©tails sur ce contact                                                                                                                                                                                                                            ','2015-12-18','2016-04-06',0);
/*!40000 ALTER TABLE `Contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Espace_echange`
--

DROP TABLE IF EXISTS `Espace_echange`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Espace_echange` (
  `fichier` varchar(75) NOT NULL DEFAULT '',
  `proprietaire` int(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fichier`,`proprietaire`),
  KEY `proprietaire` (`proprietaire`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Espace_echange`
--

LOCK TABLES `Espace_echange` WRITE;
/*!40000 ALTER TABLE `Espace_echange` DISABLE KEYS */;
/*!40000 ALTER TABLE `Espace_echange` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Evenements`
--

DROP TABLE IF EXISTS `Evenements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Evenements` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `nom` varchar(70) DEFAULT NULL,
  `date_evt` date NOT NULL,
  `style` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Evenements`
--

LOCK TABLES `Evenements` WRITE;
/*!40000 ALTER TABLE `Evenements` DISABLE KEYS */;
/*!40000 ALTER TABLE `Evenements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Groupes`
--

DROP TABLE IF EXISTS `Groupes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Groupes` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `booker_associe` int(6) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `style` varchar(30) DEFAULT NULL,
  `mail` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `booker_associe` (`booker_associe`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Groupes`
--

LOCK TABLES `Groupes` WRITE;
/*!40000 ALTER TABLE `Groupes` DISABLE KEYS */;
INSERT INTO `Groupes` VALUES (31,14,'AC/DC','Rock','ADDC@groupe.fr');
/*!40000 ALTER TABLE `Groupes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Identifiants`
--

DROP TABLE IF EXISTS `Identifiants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Identifiants` (
  `contact` int(6) NOT NULL DEFAULT '0',
  `login` varchar(30) NOT NULL,
  `mdp` varchar(64) NOT NULL,
  PRIMARY KEY (`contact`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Identifiants`
--

LOCK TABLES `Identifiants` WRITE;
/*!40000 ALTER TABLE `Identifiants` DISABLE KEYS */;
INSERT INTO `Identifiants` VALUES (14,'doej','$2y$11$TsK.w2Smc3ek.m7KO8cgV.rVlRzqvUIsl5tGeCZHc8u45KrXpHxQC');
/*!40000 ALTER TABLE `Identifiants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Lieux`
--

DROP TABLE IF EXISTS `Lieux`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Lieux` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `adresse` varchar(250) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Lieux`
--

LOCK TABLES `Lieux` WRITE;
/*!40000 ALTER TABLE `Lieux` DISABLE KEYS */;
/*!40000 ALTER TABLE `Lieux` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Membres_groupe`
--

DROP TABLE IF EXISTS `Membres_groupe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Membres_groupe` (
  `contact` int(6) NOT NULL DEFAULT '0',
  `groupe` int(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`contact`,`groupe`),
  KEY `groupe` (`groupe`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Membres_groupe`
--

LOCK TABLES `Membres_groupe` WRITE;
/*!40000 ALTER TABLE `Membres_groupe` DISABLE KEYS */;
INSERT INTO `Membres_groupe` VALUES (43,31),(45,31),(48,31);
/*!40000 ALTER TABLE `Membres_groupe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Membres_structure`
--

DROP TABLE IF EXISTS `Membres_structure`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Membres_structure` (
  `contact` int(6) NOT NULL DEFAULT '0',
  `struct` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`contact`,`struct`),
  KEY `struct` (`struct`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Membres_structure`
--

LOCK TABLES `Membres_structure` WRITE;
/*!40000 ALTER TABLE `Membres_structure` DISABLE KEYS */;
/*!40000 ALTER TABLE `Membres_structure` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Organise`
--

DROP TABLE IF EXISTS `Organise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Organise` (
  `organisateur` varchar(50) NOT NULL,
  `evenement` int(6) NOT NULL,
  `lieu` int(6) NOT NULL,
  PRIMARY KEY (`organisateur`,`evenement`,`lieu`),
  KEY `evenement` (`evenement`),
  KEY `lieu` (`lieu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Organise`
--

LOCK TABLES `Organise` WRITE;
/*!40000 ALTER TABLE `Organise` DISABLE KEYS */;
/*!40000 ALTER TABLE `Organise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Participe`
--

DROP TABLE IF EXISTS `Participe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Participe` (
  `groupe` int(6) NOT NULL DEFAULT '0',
  `evenement` int(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`groupe`,`evenement`),
  KEY `evenement` (`evenement`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Participe`
--

LOCK TABLES `Participe` WRITE;
/*!40000 ALTER TABLE `Participe` DISABLE KEYS */;
/*!40000 ALTER TABLE `Participe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Structures`
--

DROP TABLE IF EXISTS `Structures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Structures` (
  `nom` varchar(50) NOT NULL DEFAULT '',
  `adresse_siege` varchar(250) DEFAULT NULL,
  `tel` int(10) NOT NULL,
  `mail` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`nom`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Structures`
--

LOCK TABLES `Structures` WRITE;
/*!40000 ALTER TABLE `Structures` DISABLE KEYS */;
/*!40000 ALTER TABLE `Structures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `developpeurs`
--

DROP TABLE IF EXISTS `developpeurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `developpeurs` (
  `id` int(11) NOT NULL,
  `nomDev` varchar(10) DEFAULT NULL,
  `prenomDev` varchar(20) DEFAULT NULL,
  `numTel` varchar(10) DEFAULT NULL,
  `motdepasse` varchar(180) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `developpeurs`
--

LOCK TABLES `developpeurs` WRITE;
/*!40000 ALTER TABLE `developpeurs` DISABLE KEYS */;
INSERT INTO `developpeurs` VALUES (1,'Gorka','Thomas','0604171968','$2y$11$Sc/DVjzHHDbZHDj2OEkj/uUSoaOaTU4eVZUdeXz9751x1TXl.Ud2y'),(2,'Laugier','Anne-Amelie','0614261431',''),(3,'Grondin','Jeremy','0782940018',''),(4,'Martin','Tim','0601630335',''),(5,'Claudel','Damien','0649721411',''),(6,'Bethoux','Antonin','0609145531','');
/*!40000 ALTER TABLE `developpeurs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-01-06 16:03:36

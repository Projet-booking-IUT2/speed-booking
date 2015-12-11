-- phpMyAdmin SQL Dump
-- version 3.3.7deb9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 11, 2015 at 02:42 PM
-- Server version: 5.1.73
-- PHP Version: 5.3.3-7+squeeze28

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `2015_M3301_groupe3_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `Contacts`
--

DROP TABLE IF EXISTS `Contacts`;
CREATE TABLE IF NOT EXISTS `Contacts` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `Contacts`
--

INSERT INTO `Contacts` (`id`, `nom`, `prenom`, `tel`, `metier`, `mail`, `notes`, `derniere_maj`, `prochaine_maj`, `utilisateur`) VALUES
(14, 'Doe', 'John', 604171968, 'booker', 'john@doe.fr', NULL, '2015-12-04', '2015-12-04', 1),
(19, 'Kiedis', 'Anthony', 0, 'Autre', '', 'DÃ©tails sur ce contact                                                                                                                                            ', '2015-12-04', '2016-01-04', 0),
(16, 'Dubedout', 'Hubert', 303030300, 'Festival', '', '                    ', '2015-12-04', '2016-03-11', 0),
(31, 'illÃ©pa', 'ajour', 600000000, 'Association', '', 'DÃ©tails sur ce contact                    ', '2014-05-15', '2016-12-04', 0),
(35, 'Johnson', 'Brian ', 692166585, 'Autre', 'Brian.Johnson@gmail.com', 'Chanteur du groupe AC/DC', '2015-12-10', '2016-03-10', 0),
(32, 'illÃ©', 'ajour', 450202020, 'Organisateur', '', 'DÃ©tails sur ce contact', '2015-02-09', '2013-04-02', 0),
(34, 'Dupont', 'Charles', 450202020, 'Autre', '', 'DÃ©tails sur ce contact', '2015-12-04', '2016-03-04', 0),
(36, 'Young', 'Angus ', 788596521, 'Guitariste', 'Angus.Young@gmail.com', 'Guitariste du groupe AC/DC', '2015-12-10', '2016-03-10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Espace_echange`
--

DROP TABLE IF EXISTS `Espace_echange`;
CREATE TABLE IF NOT EXISTS `Espace_echange` (
  `fichier` varchar(75) NOT NULL DEFAULT '',
  `proprietaire` int(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fichier`,`proprietaire`),
  KEY `proprietaire` (`proprietaire`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Espace_echange`
--


-- --------------------------------------------------------

--
-- Table structure for table `Evenements`
--

DROP TABLE IF EXISTS `Evenements`;
CREATE TABLE IF NOT EXISTS `Evenements` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `nom` varchar(70) DEFAULT NULL,
  `date_evt` date NOT NULL,
  `style` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `Evenements`
--


-- --------------------------------------------------------

--
-- Table structure for table `Groupes`
--

DROP TABLE IF EXISTS `Groupes`;
CREATE TABLE IF NOT EXISTS `Groupes` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `booker_associe` int(6) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `style` varchar(30) DEFAULT NULL,
  `mail` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `booker_associe` (`booker_associe`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `Groupes`
--


-- --------------------------------------------------------

--
-- Table structure for table `Identifiants`
--

DROP TABLE IF EXISTS `Identifiants`;
CREATE TABLE IF NOT EXISTS `Identifiants` (
  `contact` int(6) NOT NULL DEFAULT '0',
  `login` varchar(30) NOT NULL,
  `mdp` varchar(64) NOT NULL,
  PRIMARY KEY (`contact`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Identifiants`
--

INSERT INTO `Identifiants` (`contact`, `login`, `mdp`) VALUES
(14, 'doej', '$2y$11$TsK.w2Smc3ek.m7KO8cgV.rVlRzqvUIsl5tGeCZHc8u45KrXpHxQC');

-- --------------------------------------------------------

--
-- Table structure for table `Lieux`
--

DROP TABLE IF EXISTS `Lieux`;
CREATE TABLE IF NOT EXISTS `Lieux` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `adresse` varchar(250) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `Lieux`
--


-- --------------------------------------------------------

--
-- Table structure for table `Membres_groupe`
--

DROP TABLE IF EXISTS `Membres_groupe`;
CREATE TABLE IF NOT EXISTS `Membres_groupe` (
  `contact` int(6) NOT NULL DEFAULT '0',
  `groupe` int(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`contact`,`groupe`),
  KEY `groupe` (`groupe`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Membres_groupe`
--


-- --------------------------------------------------------

--
-- Table structure for table `Membres_structure`
--

DROP TABLE IF EXISTS `Membres_structure`;
CREATE TABLE IF NOT EXISTS `Membres_structure` (
  `contact` int(6) NOT NULL DEFAULT '0',
  `struct` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`contact`,`struct`),
  KEY `struct` (`struct`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Membres_structure`
--


-- --------------------------------------------------------

--
-- Table structure for table `Organise`
--

DROP TABLE IF EXISTS `Organise`;
CREATE TABLE IF NOT EXISTS `Organise` (
  `organisateur` varchar(50) NOT NULL,
  `evenement` int(6) NOT NULL,
  `lieu` int(6) NOT NULL,
  PRIMARY KEY (`organisateur`,`evenement`,`lieu`),
  KEY `evenement` (`evenement`),
  KEY `lieu` (`lieu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Organise`
--


-- --------------------------------------------------------

--
-- Table structure for table `Participe`
--

DROP TABLE IF EXISTS `Participe`;
CREATE TABLE IF NOT EXISTS `Participe` (
  `groupe` int(6) NOT NULL DEFAULT '0',
  `evenement` int(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`groupe`,`evenement`),
  KEY `evenement` (`evenement`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Participe`
--


-- --------------------------------------------------------

--
-- Table structure for table `Structures`
--

DROP TABLE IF EXISTS `Structures`;
CREATE TABLE IF NOT EXISTS `Structures` (
  `nom` varchar(50) NOT NULL DEFAULT '',
  `adresse_siege` varchar(250) DEFAULT NULL,
  `tel` int(10) NOT NULL,
  `mail` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`nom`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Structures`
--


-- --------------------------------------------------------

--
-- Table structure for table `developpeurs`
--

DROP TABLE IF EXISTS `developpeurs`;
CREATE TABLE IF NOT EXISTS `developpeurs` (
  `id` int(11) NOT NULL,
  `nomDev` varchar(10) DEFAULT NULL,
  `prenomDev` varchar(20) DEFAULT NULL,
  `numTel` varchar(10) DEFAULT NULL,
  `motdepasse` varchar(180) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `developpeurs`
--

INSERT INTO `developpeurs` (`id`, `nomDev`, `prenomDev`, `numTel`, `motdepasse`) VALUES
(1, 'Gorka', 'Thomas', '0604171968', '$2y$11$Sc/DVjzHHDbZHDj2OEkj/uUSoaOaTU4eVZUdeXz9751x1TXl.Ud2y'),
(2, 'Laugier', 'Anne-Amelie', '0614261431', ''),
(3, 'Grondin', 'Jeremy', '0782940018', ''),
(4, 'Martin', 'Tim', '0601630335', ''),
(5, 'Claudel', 'Damien', '0649721411', ''),
(6, 'Bethoux', 'Antonin', '0609145531', '');

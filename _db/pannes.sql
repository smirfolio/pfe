-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 31 Octobre 2012 à 23:37
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `pfesndp`
--

-- --------------------------------------------------------

--
-- Structure de la table `pannes`
--

CREATE TABLE IF NOT EXISTS `pannes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `label` varchar(45) DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `pannes`
--

INSERT INTO `pannes` (`id`, `label`, `description`) VALUES
(1, 'Panne électrique', NULL),
(2, 'Panne Moteur ', ''),
(3, 'Panne Chassie', ''),
(4, 'Autre', ''),
(5, 'Pneumatique', 'Jantes, pneu...'),
(15, 'Freinage', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

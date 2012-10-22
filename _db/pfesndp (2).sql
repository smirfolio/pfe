-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 22, 2012 at 05:22 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pfesndp`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `msg` text NOT NULL,
  `expediteur_id` int(10) NOT NULL,
  `destinataire_id` int(10) DEFAULT NULL,
  `reclamation_id` int(10) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `expediteur_id` (`expediteur_id`),
  KEY `destinataire_id` (`destinataire_id`),
  KEY `reclamations_id` (`reclamation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `msg`, `expediteur_id`, `destinataire_id`, `reclamation_id`, `created`) VALUES
(2, 'Some aspects attributed to the first RISC-labeled designs around 1975 include the observations that the memory-restricted compilers of the time were often unable to take advantage', 8, NULL, 35, '2012-10-22 04:25:11'),
(3, 'Toujours en attente de votre réponse \nmerci', 8, NULL, 35, '2012-10-22 05:07:53'),
(4, 'En contact avec réparateur ', 5, NULL, 35, '2012-10-22 05:10:57');

-- --------------------------------------------------------

--
-- Table structure for table `notifs_messages`
--

CREATE TABLE IF NOT EXISTS `notifs_messages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `reclamation_id` int(10) DEFAULT NULL,
  `message_id` int(10) DEFAULT NULL,
  `expediteur_id` int(10) NOT NULL,
  `destinateur_id` int(10) DEFAULT NULL,
  `created` datetime NOT NULL,
  `vue` tinyint(1) NOT NULL,
  `date_vue` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `notifs_messages`
--

INSERT INTO `notifs_messages` (`id`, `reclamation_id`, `message_id`, `expediteur_id`, `destinateur_id`, `created`, `vue`, `date_vue`) VALUES
(2, 35, 2, 8, 5, '2012-10-22 04:25:11', 1, NULL),
(3, 35, 3, 8, 5, '2012-10-22 05:07:53', 1, NULL),
(4, 35, 4, 5, 8, '2012-10-22 05:10:57', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifs_reclamations`
--

CREATE TABLE IF NOT EXISTS `notifs_reclamations` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `reclamation_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `vehicule_id` int(10) NOT NULL,
  `created` datetime NOT NULL,
  `vue` tinyint(1) NOT NULL,
  `date_vue` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Table structure for table `pannes`
--

CREATE TABLE IF NOT EXISTS `pannes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `label` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pannes`
--

INSERT INTO `pannes` (`id`, `label`) VALUES
(1, 'Panne électrique'),
(2, 'Panne Moteur '),
(3, 'Panne Chassie'),
(4, 'Autre');

-- --------------------------------------------------------

--
-- Table structure for table `reclamations`
--

CREATE TABLE IF NOT EXISTS `reclamations` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `vehicule_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `statu_id` int(10) DEFAULT NULL,
  `panne_id` int(10) NOT NULL,
  `panne` text NOT NULL,
  `reparator_id` int(11) DEFAULT NULL,
  `upnotif` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_declarations_vehicules1` (`vehicule_id`),
  KEY `fk_declarations_users1` (`user_id`),
  KEY `fk_declarations_status1` (`statu_id`),
  KEY `fk_declarations_pannes1` (`panne_id`),
  KEY `fk_declarations_reparateurs1` (`reparator_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `reclamations`
--

INSERT INTO `reclamations` (`id`, `identifiant`, `created`, `modified`, `vehicule_id`, `user_id`, `statu_id`, `panne_id`, `panne`, `reparator_id`, `upnotif`) VALUES
(35, '1/2012', '2012-10-22 04:24:35', '2012-10-22 05:10:36', 1, 8, 2, 1, 'Far Défectueux   ', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reparators`
--

CREATE TABLE IF NOT EXISTS `reparators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_contact` varchar(45) DEFAULT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `fax` varchar(45) DEFAULT NULL,
  `mail` varchar(45) DEFAULT NULL,
  `adresse` text,
  `rate` tinyint(4) DEFAULT NULL,
  `ste` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `reparators`
--

INSERT INTO `reparators` (`id`, `nom_contact`, `tel`, `fax`, `mail`, `adresse`, `rate`, `ste`) VALUES
(2, 'Hamadi', '71777222', '71777222', 'hamadi@hamadi.com', 'tunis', 2, 'Mécanique Général');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `label`) VALUES
(1, 'user'),
(2, 'admin'),
(3, 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE IF NOT EXISTS `sites` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `gouvernerat` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `nom`, `gouvernerat`) VALUES
(1, 'Site Bizert', 'Bizert'),
(2, 'Site Tunis', 'Tunis'),
(3, 'Site Sfax', 'Sfax'),
(4, 'Site Gabes', 'Gabes');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `label` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `label`) VALUES
(1, 'En attente'),
(2, 'Traitement en cours'),
(3, 'En réparation '),
(4, 'Réparée'),
(5, 'Annulée');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `username` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `role` varchar(10) NOT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `site_id` int(10) NOT NULL,
  `etat` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_user_role` (`role`),
  KEY `fk_users_sites1` (`site_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nom`, `username`, `password`, `role`, `mail`, `site_id`, `etat`) VALUES
(5, 'Ghassen1', 'admin', 'e7e27fa941e494489aa75885e3b8fa43197a89f6', 'admin', 'ghassen@ghassen.com', 2, 1),
(6, 'Mouhmed ben Gerra', 'RDHSfax', '5bba98ede6664e916e7fe77cc32c6ead13e71d0b', 'user', 'rdhsfax@usersndp.com', 3, 1),
(8, 'Ali Selmen', 'DCTunis', '5bba98ede6664e916e7fe77cc32c6ead13e71d0b', 'user', 'DCTunis@usersndp.om', 2, 1),
(9, 'Mondher HajKlifa', 'DPCTunis', '5bba98ede6664e916e7fe77cc32c6ead13e71d0b', '', 'DPCTunis@usersndp.com', 2, 1),
(10, 'Walid Mejri', 'PDGBizert', '5bba98ede6664e916e7fe77cc32c6ead13e71d0b', '', 'PDGBizert@usersndp.com', 1, 1),
(11, 'Nizar Nen Hmida', 'DSCBizert', '5bba98ede6664e916e7fe77cc32c6ead13e71d0b', '', 'DSCBizert@usersndp.com', 1, 1),
(12, 'Mouhamed Ali Ben Khlifia', 'DTSfax', '5bba98ede6664e916e7fe77cc32c6ead13e71d0b', '', 'DTSfax@usersndp.com', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicules`
--

CREATE TABLE IF NOT EXISTS `vehicules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(45) DEFAULT NULL,
  `marque` varchar(45) DEFAULT NULL,
  `model` varchar(45) DEFAULT NULL,
  `energie` varchar(45) DEFAULT NULL,
  `puissance` varchar(45) DEFAULT NULL,
  `date_circulation` datetime DEFAULT NULL,
  `site_id` int(10) NOT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `sites_id` (`site_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `vehicules`
--

INSERT INTO `vehicules` (`id`, `matricule`, `marque`, `model`, `energie`, `puissance`, `date_circulation`, `site_id`, `active`) VALUES
(1, '135Tunis6666', 'Renault', 'Clio', '4', '25', '2012-10-02 00:00:00', 2, 1),
(2, '122Tunis4333', 'Peugeot', '206+', '4', '25', '2011-01-06 00:00:00', 2, 1),
(3, '105Tunis1144', 'Peugeot', '206', '4', '25', '2011-10-01 00:00:00', 2, 1),
(4, '125Tunis255', 'Peugeot', '407', '6', '25', '2010-10-01 00:00:00', 1, 1),
(5, '101Tunis4577', 'Renault', 'Symbol', '5', '23', '2010-10-03 00:00:00', 1, 1),
(6, '122Tunis1544', 'Fiat', 'Punto', '4', '35', '2010-10-03 00:00:00', 1, 1),
(7, '114Tunis1594', 'Fiat', 'Palio', '4', '25', '2010-10-10 00:00:00', 1, 1),
(9, '135Tunis888', 'Renault', '106', '4', '25', '2011-01-03 05:00:00', 2, 1),
(10, '115Tunis824', 'Citroëne', 'C5', '4', '25', '2011-03-21 04:00:00', 2, 1),
(11, '124Tunis0015', 'Citroëne', 'C1', NULL, NULL, '2009-01-06 05:00:00', 2, 1),
(12, '165Tunis4555', 'Peugeot', '308', NULL, NULL, '2010-05-12 00:00:00', 2, 1),
(13, '105Tunis2547', 'Renault', 'Symbol', NULL, NULL, '2010-11-17 05:00:00', 2, 1),
(14, '119Tunis4117', 'Citroëne', 'C5', NULL, NULL, '2012-07-04 04:00:00', 2, 1),
(15, '132Tunis3468', 'Citroëne', 'C1', NULL, NULL, '2011-06-26 04:00:00', 2, 1),
(16, '100Tunis298', 'Peugeot', '308', NULL, NULL, '2010-07-06 04:00:00', 1, 1),
(17, '102Tunis298', 'Peugeot', '106', NULL, NULL, '2010-01-11 05:00:00', 1, 1),
(18, '110Tunis5351', 'Renault', 'Clio', NULL, NULL, '2010-10-05 04:00:00', 1, 1),
(19, '108Tunis4221', 'Peugeot', '206+', NULL, NULL, '2011-10-12 04:00:00', 1, 1),
(20, '130Tunis2221', 'Citroëne', 'Picasso', NULL, NULL, '2010-09-15 04:00:00', 1, 1),
(21, '115Tunis3224', 'Peugeot', '407', NULL, NULL, '2012-05-08 04:00:00', 1, 1),
(22, '120Tunis5468', 'Renault', 'Clio', NULL, NULL, '2012-04-03 04:00:00', 3, 1),
(23, '135Tunis4512', 'Renault', 'Symbol', NULL, NULL, '2012-08-13 04:00:00', 3, 1),
(24, '105Tunis5512', 'Peugeot', '308', NULL, NULL, '2012-06-11 04:00:00', 3, 1),
(25, '101Tunis8251', 'Peugeot', '206+', NULL, NULL, '2011-03-08 05:00:00', 3, 1),
(26, '111Tunis9425', 'Peugeot', '407', NULL, NULL, '2011-12-20 05:00:00', 3, 1),
(27, '110Tunis4275', 'Renault', 'Congo', NULL, NULL, '2009-04-15 04:00:00', 3, 1),
(28, '122Tunis5784', 'Citroëne', 'C1', NULL, NULL, '2011-02-14 05:00:00', 3, 1),
(29, '108Tunis2458', 'Fiat', 'Grande Punto', NULL, NULL, '2010-04-20 04:00:00', 3, 1),
(30, '108Tunis4218', 'Fiat', 'Palio', NULL, NULL, '2011-09-12 04:00:00', 3, 1),
(31, '120Tunis1975', 'Peugeot', '106', NULL, NULL, '2010-05-04 04:00:00', 3, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`expediteur_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`destinataire_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `messages_ibfk_3` FOREIGN KEY (`reclamation_id`) REFERENCES `reclamations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reclamations`
--
ALTER TABLE `reclamations`
  ADD CONSTRAINT `fk_declarations_pannes1` FOREIGN KEY (`panne_id`) REFERENCES `pannes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_declarations_status1` FOREIGN KEY (`statu_id`) REFERENCES `status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_declarations_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reclamations_ibfk_1` FOREIGN KEY (`reparator_id`) REFERENCES `reparators` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reclamations_ibfk_2` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicules` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_sites1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `vehicules`
--
ALTER TABLE `vehicules`
  ADD CONSTRAINT `vehicules_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

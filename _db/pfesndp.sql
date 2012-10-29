-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 29 Octobre 2012 à 01:08
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
-- Structure de la table `messages`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `msg`, `expediteur_id`, `destinataire_id`, `reclamation_id`, `created`) VALUES
(2, 'Some aspects attributed to the first RISC-labeled designs around 1975 include the observations that the memory-restricted compilers of the time were often unable to take advantage', 8, NULL, 35, '2012-10-22 04:25:11'),
(3, 'Toujours en attente de votre réponse \nmerci', 8, NULL, 35, '2012-10-22 05:07:53'),
(4, 'En contact avec réparateur ', 5, NULL, 35, '2012-10-22 05:10:57'),
(5, ':p', 5, NULL, 63, '2012-10-23 23:43:14'),
(6, 'Merci pour votre collaboration ;)', 6, NULL, 62, '2012-10-25 20:56:41'),
(7, 'de rien', 5, NULL, 62, '2012-10-25 22:40:46'),
(8, 'xxxxx', 8, NULL, 65, '2012-10-25 22:41:41'),
(9, 'dd', 8, NULL, 65, '2012-10-25 23:00:12'),
(10, 'allloooo ti winek', 8, NULL, 65, '2012-10-25 23:20:18'),
(11, 'hani houni', 5, NULL, 65, '2012-10-25 23:22:15'),
(12, 'hani jey', 5, NULL, 65, '2012-10-25 23:28:41'),
(13, 'ezreb rou7ek\n', 8, NULL, 65, '2012-10-25 23:32:33'),
(14, 'kkkkk', 8, NULL, 65, '2012-10-25 23:58:04'),
(15, 'traitement en cour', 5, NULL, 66, '2012-10-26 00:01:31'),
(16, 'sqsq', 5, NULL, 70, '2012-10-26 00:14:23'),
(17, 'jkjh,', 8, NULL, 66, '2012-10-26 00:33:01');

-- --------------------------------------------------------

--
-- Structure de la table `notifs_messages`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `notifs_messages`
--

INSERT INTO `notifs_messages` (`id`, `reclamation_id`, `message_id`, `expediteur_id`, `destinateur_id`, `created`, `vue`, `date_vue`) VALUES
(1, 63, 5, 5, 6, '2012-10-23 23:43:15', 0, NULL),
(2, 62, 6, 6, 5, '2012-10-25 20:56:41', 1, NULL),
(3, 62, 7, 5, 6, '2012-10-25 22:40:46', 0, NULL),
(4, 65, 8, 8, 5, '2012-10-25 22:41:41', 1, NULL),
(5, 65, 9, 8, 5, '2012-10-25 23:00:12', 1, NULL),
(6, 65, 10, 8, 5, '2012-10-25 23:20:18', 1, NULL),
(7, 65, 11, 5, 8, '2012-10-25 23:22:15', 1, NULL),
(8, 65, 12, 5, 8, '2012-10-25 23:28:42', 1, NULL),
(9, 65, 13, 8, 5, '2012-10-25 23:32:33', 1, NULL),
(10, 65, 14, 8, 5, '2012-10-25 23:58:05', 1, NULL),
(11, 66, 15, 5, 8, '2012-10-26 00:01:31', 1, NULL),
(12, 70, 16, 5, 10, '2012-10-26 00:14:23', 0, NULL),
(13, 66, 17, 8, 5, '2012-10-26 00:33:01', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `notifs_reclamations`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Contenu de la table `notifs_reclamations`
--

INSERT INTO `notifs_reclamations` (`id`, `reclamation_id`, `user_id`, `vehicule_id`, `created`, `vue`, `date_vue`) VALUES
(17, 62, 6, 22, '2012-10-23 00:57:38', 1, NULL),
(18, 63, 6, 23, '2012-10-23 00:57:56', 1, NULL),
(19, 64, 12, 29, '2012-10-23 00:58:46', 0, NULL),
(20, 65, 8, 1, '2012-10-23 00:59:37', 1, NULL),
(21, 66, 8, 9, '2012-10-23 00:59:58', 1, NULL),
(22, 67, 9, 12, '2012-10-23 01:00:34', 1, NULL),
(23, 68, 10, 5, '2012-10-23 01:01:10', 1, NULL),
(24, 69, 10, 17, '2012-10-23 01:01:57', 0, NULL),
(25, 70, 10, 20, '2012-10-23 01:02:28', 1, NULL),
(26, 71, 11, 7, '2012-10-23 01:03:04', 1, NULL),
(27, 72, 6, 30, '2012-10-25 20:55:44', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pannes`
--

CREATE TABLE IF NOT EXISTS `pannes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `label` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `pannes`
--

INSERT INTO `pannes` (`id`, `label`) VALUES
(1, 'Panne électrique'),
(2, 'Panne Moteur '),
(3, 'Panne Chassie'),
(4, 'Autre');

-- --------------------------------------------------------

--
-- Structure de la table `reclamations`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Contenu de la table `reclamations`
--

INSERT INTO `reclamations` (`id`, `identifiant`, `created`, `modified`, `vehicule_id`, `user_id`, `statu_id`, `panne_id`, `panne`, `reparator_id`, `upnotif`) VALUES
(62, '1/2012', '2012-10-23 00:57:38', '2012-10-24 22:36:23', 22, 6, 4, 2, 'Fumé échappement trop important', 2, 1),
(63, '63/2012', '2012-10-23 00:57:56', '2012-10-24 22:36:02', 23, 6, 1, 1, 'Pas de démarrage', NULL, 1),
(64, '64/2012', '2012-10-23 00:58:46', '2012-10-23 00:58:46', 29, 12, 1, 1, 'Clignotant défectueux', NULL, 1),
(65, '65/2012', '2012-10-23 00:59:37', '2012-10-24 21:45:01', 1, 8, 3, 3, 'Problème parechoc ', 2, 1),
(66, '66/2012', '2012-10-23 00:59:58', '2012-10-23 00:59:58', 9, 8, 1, 1, 'Pas de démarrage ', NULL, 1),
(67, '67/2012', '2012-10-23 01:00:34', '2012-10-23 01:00:34', 12, 9, 1, 2, 'Mauvaise carburation ', NULL, 1),
(68, '68/2012', '2012-10-23 01:01:10', '2012-10-23 01:01:10', 5, 10, 1, 1, 'Pas de démarrage ', NULL, 1),
(69, '69/2012', '2012-10-23 01:01:57', '2012-10-23 01:01:57', 17, 10, 1, 1, 'Feux Stop ne s''allume pas ', NULL, 1),
(70, '70/2012', '2012-10-23 01:02:28', '2012-10-23 01:02:28', 20, 10, 1, 2, 'Bruit niveau boite vitesse ', NULL, 1),
(71, '71/2012', '2012-10-23 01:03:04', '2012-10-23 01:03:04', 7, 11, 1, 1, 'Problème batterie', NULL, 1),
(72, '72/2012', '2012-10-25 20:55:44', '2012-10-25 20:55:44', 30, 6, 1, 2, 'Bruit trop forrrt.', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `reparators`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `reparators`
--

INSERT INTO `reparators` (`id`, `nom_contact`, `tel`, `fax`, `mail`, `adresse`, `rate`, `ste`) VALUES
(2, 'Hamadi', '71777222', '71777222', 'hamadi@hamadi.com', 'Cité El Khadhra tunis ', 5, 'Mécanique Général'),
(3, 'Smirnov Patatov', '71222000', '71222000', 'gmc@gmail.com', 'Tunis', NULL, 'Général Motors'),
(4, 'Sisqo', '71234657', '71234657', 'citroen.maintenance@citroen.com', 'Charguia', NULL, 'Citroen');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `roles`
--

INSERT INTO `roles` (`id`, `label`) VALUES
(1, 'user'),
(2, 'admin'),
(3, 'superadmin');

-- --------------------------------------------------------

--
-- Structure de la table `sites`
--

CREATE TABLE IF NOT EXISTS `sites` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `gouvernerat` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `adresse` text CHARACTER SET utf8mb4 NOT NULL,
  `tel` int(15) NOT NULL,
  `fax` int(10) NOT NULL,
  `mail` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `sites`
--

INSERT INTO `sites` (`id`, `nom`, `gouvernerat`, `adresse`, `tel`, `fax`, `mail`) VALUES
(1, 'Site Bizert', 'Bizert', '6 rue SadraBa3l 1006', 71234654, 71344444, 'SNDP.Bizert@sndp.com'),
(2, 'Site Tunis', 'Tunis', '', 0, 0, ''),
(3, 'Site Sfax', 'Sfax', '', 0, 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `label` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `status`
--

INSERT INTO `status` (`id`, `label`) VALUES
(1, 'En attente'),
(2, 'Traitement en cours'),
(3, 'En réparation '),
(4, 'Réparée'),
(5, 'Annulée');

-- --------------------------------------------------------

--
-- Structure de la table `users`
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
-- Contenu de la table `users`
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
-- Structure de la table `vehicules`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Contenu de la table `vehicules`
--

INSERT INTO `vehicules` (`id`, `matricule`, `marque`, `model`, `energie`, `puissance`, `date_circulation`, `site_id`, `active`) VALUES
(1, '135Tunis6666', 'Renault', 'Clio', '4', '25', '2012-10-02 00:00:00', 2, 0),
(2, '122Tunis4333', 'Peugeot', '206+', '4', '25', '2011-01-06 00:00:00', 2, 1),
(3, '105Tunis1144', 'Peugeot', '206', '4', '25', '2011-10-01 00:00:00', 2, 1),
(4, '125Tunis255', 'Peugeot', '407', '6', '25', '2010-10-01 00:00:00', 1, 1),
(5, '101Tunis4577', 'Renault', 'Symbol', '5', '23', '2010-10-03 00:00:00', 1, 0),
(6, '122Tunis1544', 'Fiat', 'Punto', '4', '35', '2010-10-03 00:00:00', 1, 1),
(7, '114Tunis1594', 'Fiat', 'Palio', '4', '25', '2010-10-10 00:00:00', 1, 0),
(9, '135Tunis888', 'Renault', '106', '4', '25', '2011-01-03 05:00:00', 2, 0),
(10, '115Tunis824', 'Citroëne', 'C5', '4', '25', '2011-03-21 04:00:00', 2, 1),
(11, '124Tunis0015', 'Citroëne', 'C1', NULL, NULL, '2009-01-06 05:00:00', 2, 1),
(12, '165Tunis4555', 'Peugeot', '308', NULL, NULL, '2010-05-12 00:00:00', 2, 0),
(13, '105Tunis2547', 'Renault', 'Symbol', NULL, NULL, '2010-11-17 05:00:00', 2, 1),
(14, '119Tunis4117', 'Citroëne', 'C5', NULL, NULL, '2012-07-04 04:00:00', 2, 1),
(15, '132Tunis3468', 'Citroëne', 'C1', NULL, NULL, '2011-06-26 04:00:00', 2, 1),
(16, '100Tunis298', 'Peugeot', '308', NULL, NULL, '2010-07-06 04:00:00', 1, 1),
(17, '102Tunis298', 'Peugeot', '106', NULL, NULL, '2010-01-11 05:00:00', 1, 0),
(18, '110Tunis5351', 'Renault', 'Clio', NULL, NULL, '2010-10-05 04:00:00', 1, 1),
(19, '108Tunis4221', 'Peugeot', '206+', NULL, NULL, '2011-10-12 04:00:00', 1, 1),
(20, '130Tunis2221', 'Citroëne', 'Picasso', NULL, NULL, '2010-09-15 04:00:00', 1, 0),
(21, '115Tunis3224', 'Peugeot', '407', NULL, NULL, '2012-05-08 04:00:00', 1, 1),
(22, '120Tunis5468', 'Renault', 'Clio', NULL, NULL, '2012-04-03 04:00:00', 3, 0),
(23, '135Tunis4512', 'Renault', 'Symbol', NULL, NULL, '2012-08-13 04:00:00', 3, 0),
(24, '105Tunis5512', 'Peugeot', '308', NULL, NULL, '2012-06-11 04:00:00', 3, 1),
(25, '101Tunis8251', 'Peugeot', '206+', NULL, NULL, '2011-03-08 05:00:00', 3, 1),
(26, '111Tunis9425', 'Peugeot', '407', NULL, NULL, '2011-12-20 05:00:00', 3, 1),
(27, '110Tunis4275', 'Renault', 'Congo', NULL, NULL, '2009-04-15 04:00:00', 3, 1),
(28, '122Tunis5784', 'Citroëne', 'C1', NULL, NULL, '2011-02-14 05:00:00', 3, 1),
(29, '108Tunis2458', 'Fiat', 'Grande Punto', NULL, NULL, '2010-04-20 04:00:00', 3, 0),
(30, '108Tunis4218', 'Fiat', 'Palio', NULL, NULL, '2011-09-12 04:00:00', 3, 0),
(31, '120Tunis1975', 'Peugeot', '106', NULL, NULL, '2010-05-04 04:00:00', 3, 1),
(32, '162Tunis1111', 'Citroen', 'C4', 'Essence', '7 chx', '2012-10-16 00:00:00', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

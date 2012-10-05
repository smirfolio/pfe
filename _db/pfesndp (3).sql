-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 05 Octobre 2012 à 22:39
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
  `destinataire_id` int(10) NOT NULL,
  `reclamation_id` int(10) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `expediteur_id` (`expediteur_id`),
  KEY `destinataire_id` (`destinataire_id`),
  KEY `reclamations_id` (`reclamation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`id`),
  KEY `fk_declarations_vehicules1` (`vehicule_id`),
  KEY `fk_declarations_users1` (`user_id`),
  KEY `fk_declarations_status1` (`statu_id`),
  KEY `fk_declarations_pannes1` (`panne_id`),
  KEY `fk_declarations_reparateurs1` (`reparator_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `reclamations`
--

INSERT INTO `reclamations` (`id`, `identifiant`, `created`, `modified`, `vehicule_id`, `user_id`, `statu_id`, `panne_id`, `panne`, `reparator_id`) VALUES
(2, '001/2013', '2012-10-02 00:00:00', '2012-10-02 00:00:00', 1, 6, 1, 1, '', 2),
(3, '002/2012', '2012-10-04 00:00:00', '2012-10-04 00:00:00', 1, 8, 2, 2, '', 2),
(4, '002/2012', '2012-10-04 00:00:00', '2012-10-04 00:00:00', 1, 8, 2, 2, '', 2),
(6, '105/2012', '2012-10-04 22:49:03', '2012-10-04 22:49:03', 1, 6, 1, 2, 'Joint de culasse', NULL),
(7, '105/2012', '2012-10-04 23:18:05', '2012-10-04 23:18:05', 2, 6, 1, 1, 'Clignotant gauche non fonctionel', NULL),
(8, NULL, '2012-10-05 00:04:08', '2012-10-05 00:04:08', 1, 6, 1, 2, 'panne mopteur', NULL),
(9, '9/2012', '2012-10-05 00:05:36', '2012-10-05 00:05:36', 1, 6, 1, 2, 'Joint de culasse', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `reparators`
--

INSERT INTO `reparators` (`id`, `nom_contact`, `tel`, `fax`, `mail`, `adresse`, `rate`, `ste`) VALUES
(2, 'Hamadi', '71777222', '71777222', 'hamadi@hamadi.com', 'tunis', 2, 'Mécanique Général');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `sites`
--

INSERT INTO `sites` (`id`, `nom`, `gouvernerat`) VALUES
(1, 'Site Bizert', 'Bizert'),
(2, 'Site Tunis', 'Tunis'),
(3, 'Site Sfax', 'Sfax'),
(4, 'Site Gabes', 'Gabes');

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `label` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `status`
--

INSERT INTO `status` (`id`, `label`) VALUES
(1, 'En attente'),
(2, 'Traitement en cours');

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_user_role` (`role`),
  KEY `fk_users_sites1` (`site_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `username`, `password`, `role`, `mail`, `site_id`) VALUES
(5, 'Ghassen', 'ghassen', 'e7e27fa941e494489aa75885e3b8fa43197a89f6', 'admin', 'ghassen@ghassen.com', 2),
(6, 'user', 'user', '5bba98ede6664e916e7fe77cc32c6ead13e71d0b', 'user', 'user@user.com', 2),
(8, 'user1', 'user1', NULL, 'user', 'user1@user.om', 2);

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
  `sites_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sites_id` (`sites_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `vehicules`
--

INSERT INTO `vehicules` (`id`, `matricule`, `marque`, `model`, `energie`, `puissance`, `date_circulation`, `sites_id`) VALUES
(1, '135Tunis3444', 'Renault', 'Clio', '4', '4', '2012-10-02 00:00:00', 2),
(2, '122Tunis4333', 'Peugeot', '206+', '4', '4', '2011-01-06 00:00:00', 2);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`expediteur_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`destinataire_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `messages_ibfk_3` FOREIGN KEY (`reclamation_id`) REFERENCES `reclamations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `reclamations`
--
ALTER TABLE `reclamations`
  ADD CONSTRAINT `fk_declarations_pannes1` FOREIGN KEY (`panne_id`) REFERENCES `pannes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_declarations_status1` FOREIGN KEY (`statu_id`) REFERENCES `status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_declarations_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reclamations_ibfk_1` FOREIGN KEY (`reparator_id`) REFERENCES `reparators` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reclamations_ibfk_2` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicules` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_sites1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `vehicules`
--
ALTER TABLE `vehicules`
  ADD CONSTRAINT `vehicules_ibfk_1` FOREIGN KEY (`sites_id`) REFERENCES `sites` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

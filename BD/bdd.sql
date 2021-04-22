-- Adminer 4.7.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `t_commentaire`;
CREATE TABLE `t_commentaire` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_date` datetime DEFAULT NULL,
  `com_auteur` varchar(100) DEFAULT NULL,
  `com_contenu` varchar(200) DEFAULT NULL,
  `ref_tick_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`com_id`),
  KEY `ref_tick_id` (`ref_tick_id`),
  CONSTRAINT `t_commentaire_ibfk_1` FOREIGN KEY (`ref_tick_id`) REFERENCES `t_tickets` (`tick_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `t_etats`;
CREATE TABLE `t_etats` (
  `etat_id` int(11) NOT NULL AUTO_INCREMENT,
  `etat_nom` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`etat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `t_etats` (`etat_id`, `etat_nom`) VALUES
(1,	'ouvert'),
(2,	'en_dév'),
(3,	'fermé');

DROP TABLE IF EXISTS `t_tickets`;
CREATE TABLE `t_tickets` (
  `tick_id` int(11) NOT NULL AUTO_INCREMENT,
  `tick_date` datetime DEFAULT NULL,
  `tick_titre` varchar(100) DEFAULT NULL,
  `tick_contenu` varchar(400) DEFAULT NULL,
  `ref_etat_nom` int(11) DEFAULT NULL,
  PRIMARY KEY (`tick_id`),
  KEY `ref_etat_nom` (`ref_etat_nom`),
  CONSTRAINT `t_tickets_ibfk_1` FOREIGN KEY (`ref_etat_nom`) REFERENCES `t_etats` (`etat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- 2020-02-12 08:12:37

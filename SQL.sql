# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Hôte: 127.0.0.1 (MySQL 5.7.17-0ubuntu0.16.04.1)
# Base de données: lfr
# Temps de génération: 2017-04-26 15:51:20 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Affichage de la table characters
# ------------------------------------------------------------

DROP TABLE IF EXISTS `characters`;

CREATE TABLE `characters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `race` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `classe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `faction` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `itemLevel` int(11) NOT NULL,
  `serveur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `characters_user_id_foreign` (`user_id`),
  CONSTRAINT `characters_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `characters` WRITE;
/*!40000 ALTER TABLE `characters` DISABLE KEYS */;

INSERT INTO `characters` (`id`, `pseudo`, `race`, `classe`, `level`, `faction`, `itemLevel`, `serveur`, `user_id`, `created_at`, `updated_at`)
VALUES
	(1,'Didier','Orc','Chevalier de la mort',110,'Horde',909,'Ysondre',1,'2017-04-18 12:08:11','2017-04-18 12:08:11');

/*!40000 ALTER TABLE `characters` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table characters_event
# ------------------------------------------------------------

DROP TABLE IF EXISTS `characters_event`;

CREATE TABLE `characters_event` (
  `event_id` int(10) unsigned NOT NULL,
  `character_id` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `characters_event_event_id_foreign` (`event_id`),
  KEY `characters_event_character_id_foreign` (`character_id`),
  CONSTRAINT `characters_event_character_id_foreign` FOREIGN KEY (`character_id`) REFERENCES `characters` (`id`),
  CONSTRAINT `characters_event_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `characters_event` WRITE;
/*!40000 ALTER TABLE `characters_event` DISABLE KEYS */;

INSERT INTO `characters_event` (`event_id`, `character_id`, `status`, `created_at`, `updated_at`)
VALUES
	(9,1,1,'2017-04-18 12:08:29','2017-04-18 12:08:29');

/*!40000 ALTER TABLE `characters_event` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table events
# ------------------------------------------------------------

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nbCharacters` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `difficulte` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `instance_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `events_instance_id_foreign` (`instance_id`),
  KEY `events_user_id_foreign` (`user_id`),
  CONSTRAINT `events_instance_id_foreign` FOREIGN KEY (`instance_id`) REFERENCES `instances` (`id`),
  CONSTRAINT `events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;

INSERT INTO `events` (`id`, `nom`, `nbCharacters`, `date`, `heure`, `description`, `difficulte`, `instance_id`, `user_id`, `created_at`, `updated_at`)
VALUES
	(9,'ezezezrezr ezrezrerezrezn,ze,;ez ;,eze ez,nezzeezez ; ezr ,;ezrezrez',7,'2017-02-02','00:02:00','eddeded','Normal',1,1,'2017-04-18 10:48:22','2017-04-18 10:48:22'),
	(10,'relknnoer ;,repore mrepore repore',6,'2018-01-03','01:01:00','efm,omnoez :ezlnmez: poren :rezpnor ez;:','Normal',1,1,'2017-04-18 10:49:24','2017-04-18 10:49:24'),
	(11,'e,zmolnerelknnoer ;,repore mrepore repore',6,'2018-01-03','01:01:00','efm,omnoez :ezlnmez: poren :rezpnor ez;:','Normal',1,1,'2017-04-18 10:49:49','2017-04-18 10:49:49'),
	(12,'e,zmolnerelknnoer ;,repore mreporeez;:  eznr ezoirez;ez repore',6,'2018-01-03','01:01:00','efm,omnoez :ezlnmez: poren :rezpnor ez;:','Normal',1,1,'2017-04-18 10:51:53','2017-04-18 10:51:53');

/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table instances
# ------------------------------------------------------------

DROP TABLE IF EXISTS `instances`;

CREATE TABLE `instances` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `typeInstance` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `instances` WRITE;
/*!40000 ALTER TABLE `instances` DISABLE KEYS */;

INSERT INTO `instances` (`id`, `nom`, `typeInstance`, `created_at`, `updated_at`)
VALUES
	(1,'Grimrail Depot','Donjon',NULL,NULL);

/*!40000 ALTER TABLE `instances` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Affichage de la table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `btag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_btag_unique` (`btag`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `nom`, `prenom`, `btag`, `email`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Libeert','Pierre-Henri','Bënz#2915','worfut@hotmail.fr','$2y$10$/PipKiCK48w5SFU.u1Mb1es1ld/8.JO2XsdW3yhw4TL/v8.er2Yn.',NULL,NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

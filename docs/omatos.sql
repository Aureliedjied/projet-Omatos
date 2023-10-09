-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `client_id` (`client_id`),
  CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `admins` (`id`, `client_id`) VALUES
(1,	4);

DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL COMMENT 'Le nom du client',
  `adresse` varchar(128) NOT NULL COMMENT 'adresse de livraison',
  `email` varchar(128) NOT NULL,
  `password` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `clients` (`id`, `name`, `adresse`, `email`, `password`) VALUES
(4,	'Aurelie djied',	'rue de la quatrieme',	'aurelie.djied@oclock.io',	'$2y$10$CuJgO9gbsgR.C65ESG.5we.Kg7FKwKJTJtMqah/bf5NaIwSgBd1Le');

DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL COMMENT 'Le nom du produit',
  `description` text DEFAULT NULL COMMENT 'La description du produit',
  `picture` varchar(128) DEFAULT NULL COMMENT 'L''URL de l''image du produit',
  `price` decimal(10,2) NOT NULL COMMENT 'Le tarif journalier',
  `stock` int(11) NOT NULL DEFAULT 0 COMMENT 'Le stock du produit',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `items` (`id`, `name`, `description`, `picture`, `price`, `stock`) VALUES
(1,	'Drone DJI Mavic Air 2',	'Drone compact avec une excellente qualité d\'image.',	'assets/images/produits/djiMAvicAir.jpg',	19.99,	24),
(2,	'Appareil Photo Sony Alpha A7III',	'Appareil photo plein format avec 24,2 mégapixels.',	'assets/images/produits/sonyA7III.jpg',	15.99,	6),
(3,	'Caméra de Voyage GoPro Hero 9',	'Caméra d\'action 4K avec écran tactile.',	'assets/images/produits/gopro.jpg',	19.99,	57),
(4,	'Drone DJI Phantom 4 Pro',	'Drone professionnel avec caméra 4K.',	'assets/images/produits/djiPhantom4.jpg',	29.99,	69),
(5,	'Appareil Photo Canon EOS 5D Mark IV',	'Appareil photo reflex numérique haut de gamme.',	'assets/images/produits/canonMark.jpg',	19.99,	70),
(6,	'Caméra de Voyage Panasonic Lumix GX9',	'Caméra compacte avec stabilisation d\'image.',	'assets/images/produits/panasonicLumix.jpg',	24.99,	44),
(7,	'Drone DJI Mini 2',	'Drone ultra-léger et compact pour les débutants.',	'assets/images/produits/mini2.jpg',	19.99,	9),
(8,	'Appareil Photo Olympus OM-D',	'Appareil photo 4K reflex numérique avec 30,9 mégapixels.',	'assets/images/produits/olympus.jpg',	9.99,	11);

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE `reservations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date_debut` date NOT NULL,
  `date_retour` date NOT NULL,
  `client_id` int(10) unsigned NOT NULL COMMENT 'a qui appartient la commande',
  `item_id` int(10) unsigned NOT NULL,
  `quantite` int(10) unsigned NOT NULL COMMENT 'quantité totale de la reservation',
  `status` varchar(55) NOT NULL COMMENT 'panier, confirmé ou annulé',
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `reservation_items`;
CREATE TABLE `reservation_items` (
  `reservation_id` int(10) unsigned NOT NULL COMMENT 'numéro de commande',
  `item_id` int(10) unsigned NOT NULL COMMENT 'item confirmé au panier',
  `quantite` int(11) NOT NULL COMMENT 'quantité de l''article dans cette commande',
  PRIMARY KEY (`reservation_id`,`item_id`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `reservation_items_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`),
  CONSTRAINT `reservation_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2023-10-09 18:24:45
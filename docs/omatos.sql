-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL COMMENT 'Le nom du produit',
  `description` text DEFAULT NULL COMMENT 'La description du produit',
  `image` varchar(128) DEFAULT NULL COMMENT 'URL de l image',
  `price` decimal(10,2) NOT NULL COMMENT 'Tarif journalier',
  `stock` int(11) NOT NULL DEFAULT 0 COMMENT 'Stock du produit',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO `items` (`id`, `name`, `description`, `image`, `price`, `stock`) VALUES
(1,	'Drone DJI Mavic Air 2',	'Drone compact avec une excellente qualité d\'image.',	'assets/images/items/djiMAvicAir.jpg',	19.99,	24),
(2,	'Appareil Photo Sony Alpha A7III',	'Appareil photo plein format avec 24,2 mégapixels.',	'assets/images/items/sonyA7III.jpg',	15.99,	6),
(3,	'Caméra de Voyage GoPro Hero 9',	'Caméra d\'action 4K avec écran tactile.',	'assets/images/items/gopro.jpg',	19.99,	57),
(4,	'Drone DJI Phantom 4 Pro',	'Drone professionnel avec caméra 4K.',	'assets/images/items/djiPhantom4.jpg',	29.99,	69),
(5,	'Appareil Photo Canon EOS 5D Mark IV',	'Appareil photo reflex numérique haut de gamme.',	'assets/images/items/canonMark.jpg',	19.99,	70),
(6,	'Caméra de Voyage Panasonic Lumix GX9',	'Caméra compacte avec stabilisation d\'image.',	'assets/images/items/panasonicLumix.jpg',	24.99,	44),
(7,	'Drone DJI Mini 2',	'Drone ultra-léger et compact pour les débutants.',	'assets/images/items/mini2.jpg',	19.99,	9),
(8,	'Appareil Photo Olympus OM-D',	'Appareil photo 4K reflex numérique avec 30,9 mégapixels.',	'assets/images/items/olympus.jpg',	9.99,	11);

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE `reservations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `userID` int(11) NOT NULL COMMENT 'A qui appartient la commande',
  `status` enum('confirmé','annulé','en cours') DEFAULT 'en cours',
  `total` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `UserID` (`userID`),
  CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`id`) REFERENCES `items` (`ID`),
  CONSTRAINT `reservations_ibfk_3` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `reservation_items`;
CREATE TABLE `reservation_items` (
  `reservationID` int(10) unsigned NOT NULL,
  `itemID` int(10) unsigned NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'Quantité de produits dans la reservation',
  PRIMARY KEY (`reservationID`,`itemID`),
  KEY `ItemID` (`itemID`),
  CONSTRAINT `reservation_items_ibfk_1` FOREIGN KEY (`ReservationID`) REFERENCES `reservations` (`ID`),
  CONSTRAINT `reservation_items_ibfk_2` FOREIGN KEY (`ItemID`) REFERENCES `items` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(128) DEFAULT NULL COMMENT 'Adresse de livraison du client',
  `role` enum('client','admin') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id`, `name`, `email`, `password`, `address`, `role`) VALUES
(2,	'Aurelie Djied',	'aurelie.djied@oclock.io',	'$2y$10$ySAiCLyCOhAbGRrRKw7TqOxjWuH7UX34/NaHTctw2ivi/pe7b.0s6',	'rue de la premiere',	'admin'),
(3,	'matthieu deuxt',	'matthieu.leflock@oclock.io',	'$2y$10$uk5yisWSYqafyJt4UcsdJOqqYPQu8xTSjeMAOwqe7VeMgVDe2j8zS',	'rue de la deuxieme',	'client'),
(4,	'matthieu neige',	'matthieu.leflocon@oclock.io',	'$2y$10$Dwozc7goCyMOASRa9eFiYOPhR6kZhYN4Whb2sB9frO5Qc9OTEoj1u',	'rue de la troisieme',	'client');

-- 2023-10-11 20:11:12
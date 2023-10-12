-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
<<<<<<< HEAD
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(45) NOT NULL COMMENT 'Le nom du produit',
  `description` TEXT NULL COMMENT 'La description du produit',
  `picture` VARCHAR(128) NULL COMMENT 'URL de l\image du produit',
  `price` DECIMAL(10,2) NOT NULL DEFAULT 0 COMMENT 'Le tarif journalier',
  `stock` INT(11) NOT NULL DEFAULT 0 COMMENT 'Le stock du produit'
)
UPDATE `items`
SET `stock` = FLOOR(RAND() * 100) + 1;

-- ici je demande des valeurs aléatoires entre 1 et 100

ENGINE = InnoDB;


=======
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
>>>>>>> 03f9ecf3f19c3755dcdf163f150dde3d8083a327
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
<<<<<<< HEAD
  `reservation_id` INT UNSIGNED NOT NULL,
  `item_id` INT UNSIGNED NOT NULL,
  `quantite` INT NOT NULL,
  PRIMARY KEY (`reservation_id`, `item_id`),
  FOREIGN KEY (`reservation_id`) REFERENCES `reservations`(`id`),
  FOREIGN KEY (`item_id`) REFERENCES `items`(`id`)
)
ENGINE = InnoDB;



START TRANSACTION;
INSERT INTO `clients` (`id`, `name`,  `adresse`, `email`, `password`) VALUES (1, 'Philippe Candille','rue de la premiere', 'philippe@oclock.io', 'rocknroll');
INSERT INTO `clients` (`id`, `name`, `adresse`, `email`, `password`) VALUES (2, 'Lucie Copin', 'rue de la deuxieme', 'lucie@oclock.io', 'cameleon');
INSERT INTO `clients` (`id`, `name`,  `adresse`, `email`, `password`) VALUES (3, 'Nicole Café','rue de la troisieme', 'nicole@oclock.io', 'onews');

COMMIT;


START TRANSACTION;
INSERT INTO items (name, description, picture, price)
VALUES
    ('Drone DJI Mavic Air 2', 'Drone compact avec une excellente qualité d\image', 'assets/images/produits/djiMAvicAir.jpg', 19.99),

    ('Appareil Photo Sony Alpha A7III', 'Appareil photo plein format avec 24,2 megapixels', 'assets/images/produits/sonyA7III.jpg', 15.99),

    ('Caméra de Voyage GoPro Hero 9', 'Caméra d\action 4K avec écran tactile.', 'assets/images/produits/gopro.jpg', 19.99),

    ('Drone DJI Phantom 4 Pro', 'Drone professionnel avec caméra 4K.', 'assets/images/produits/djiPhantom4.jpg', 29.99),

    ('Appareil Photo Canon EOS 5D Mark IV', 'Appareil photo reflex numérique haut de gamme.', 'assets/images/produits/canonMark.jpg', 19.99),

    ('Caméra de Voyage Panasonic Lumix GX9', 'Caméra compacte avec stabilisation d\image.', 'assets/images/produits/panasonicLumix.jpg', 24.99),

    ('Drone DJI Mini 2', 'Drone ultra-léger et compact pour les débutants.', 'assets/images/produits/mini2.jpg', 19.99),

    ('Appareil Photo Olympus OM-D', 'Appareil photo 4K reflex numérique avec 30,9 mégapixels.', 'assets/images/produits/olympus.jpg', 9.99);

  COMMIT;
=======
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
>>>>>>> 03f9ecf3f19c3755dcdf163f150dde3d8083a327

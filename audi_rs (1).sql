-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 23 juil. 2020 à 09:57
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `audi_rs`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'suv'),
(2, 'berline'),
(3, '4 * 4'),
(4, 'cabriolet');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(250) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=225 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `mail`, `content`) VALUES
(223, 'malik@gmail.com', 'bonjour'),
(224, 'sonia@gmail.com', 'sdfdsgfdg ');

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `n_commande` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL DEFAULT '"en cours"',
  `shipped_date` varchar(255) NOT NULL DEFAULT '10 jours',
  `total` float NOT NULL,
  PRIMARY KEY (`n_commande`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `order`
--

INSERT INTO `order` (`n_commande`, `user_id`, `order_date`, `status`, `shipped_date`, `total`) VALUES
(100, 32, '2020-07-15 19:45:12', '\"en cour\"', '10 jours', 90000),
(101, 32, '2020-07-15 20:14:20', '\"en cour\"', '10 jours', 120000),
(102, 33, '2020-07-21 17:35:29', '\"en cours\"', '10 jours', 120000);

-- --------------------------------------------------------

--
-- Structure de la table `orderdetails`
--

DROP TABLE IF EXISTS `orderdetails`;
CREATE TABLE IF NOT EXISTS `orderdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `n_commande` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idProduct` (`id_product`),
  KEY `order_id` (`n_commande`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `n_commande`, `id_product`) VALUES
(35, 101, 71),
(36, 102, 71);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `path` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `edited_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `buy_price` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCategory` (`id_category`),
  KEY `idUser` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `id_category`, `id_user`, `name`, `path`, `description`, `created_at`, `edited_at`, `buy_price`) VALUES
(71, 4, 32, 'audi R8', 'cab1.jpg', 'lorem jdkiij dfsiufdslkj slfuj iolu ', '2020-07-15 18:42:39', '2020-07-15 18:42:39', 120000),
(72, 1, 33, 'audi RSQ5', 'suv1.jpg', 'loreml dskjhfds kjl f ', '2020-07-21 17:33:10', '2020-07-21 17:33:10', 90000),
(73, 2, 33, 'audi A5', 'b2.jpg', 'loreldskfj  ', '2020-07-21 17:33:53', '2020-07-21 17:33:53', 85000),
(74, 3, 34, 'Audi RSQ8', '441.jpg', 'lorem jkdlfj mlsdfj lk', '2020-07-23 09:14:21', '2020-07-23 09:14:21', 130000);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(100) NOT NULL,
  `pseudo` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `edited_at` timestamp NULL DEFAULT NULL,
  `is_activated` tinyint(4) NOT NULL DEFAULT 0,
  `role` varchar(100) NOT NULL DEFAULT '"client"',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `mail`, `pseudo`, `password`, `created_at`, `edited_at`, `is_activated`, `role`) VALUES
(32, 'sonia@gmail.com', 'sonia', '$2y$10$BD39IvpxNjRYMHrcMwzipO76ItgeX7zZl3IbMEU9gZYIjBCjEQJZy', '2020-07-15 18:41:46', NULL, 0, '\"client\"'),
(33, 'kevin@gmail.com', 'kevin ', '$2y$10$iJhliSEaHTs.64u82wI1POzqWDbsPxfXCsbLH.ldBqa.8HG9VTBn6', '2020-07-21 17:15:12', NULL, 0, '\"client\"'),
(34, 'du.marion9@gmail.com', 'marion', '$2y$10$bqvfrGZZ4QmZch5rTazn..eG2TEMj8mwAzRo9mbNIs4NRSmEM7ESy', '2020-07-22 19:20:43', NULL, 0, '\"client\"');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`n_commande`) REFERENCES `order` (`n_commande`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

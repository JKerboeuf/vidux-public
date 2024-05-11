-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 11 mai 2024 à 18:05
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vidux`
--

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `log_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Dev'),
(3, 'Member'),
(4, 'Visitor');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `start_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date` datetime DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`session_id`) USING BTREE,
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`session_id`, `start_date`, `end_date`, `user_id`, `active`) VALUES
('1nqn4reog0cogn4e7j6vccjimv', '2023-07-26 13:10:41', '2023-07-26 13:19:30', 63, 0),
('1p7dpq0965alpv9u6vqdl8i2eq', '2023-07-26 13:19:34', '2023-07-26 13:41:51', 63, 0),
('2qjpm0i29scjkotnp4vss1bu2b', '2023-07-26 16:27:00', '2023-07-26 16:35:47', 1, 0),
('445uflr267rv90qdqdtg3ljt', '2023-07-24 20:31:36', '2023-07-24 20:31:53', 61, 0),
('45ld3b1vqj1o7ifrkui0s1o3ki', '2023-07-26 17:56:15', '2023-07-26 18:00:03', 1, 0),
('5s0f545o7hsl6snk82c2enp6oj', '2023-07-26 16:36:38', '2023-07-26 17:34:51', 1, 0),
('7bgetdhv2b8vjdg7ppcd3l1fo9', '2024-05-11 17:12:16', NULL, 1, 1),
('7kc55nmmdkkerubr4hk47dc1', '2023-07-21 18:16:04', '2023-07-21 18:26:25', 1, 0),
('7nue1ab2hr826jpg9prjjd2gt6', '2023-07-25 18:19:27', '2023-07-25 18:19:31', 63, 0),
('8gi0h1ecc5e29t5mcvto2jh9jd', '2023-07-26 16:36:10', '2023-07-26 16:36:10', 1, 0),
('99jafu4lmln53a4vilv1pokbot', '2023-07-26 14:07:36', '2023-07-26 15:34:48', 63, 0),
('aesu5potnldgootoed6cdhof', '2023-07-21 18:28:29', '2023-07-21 18:28:43', 1, 0),
('alu7p7kkghomiim5o239oss49k', '2023-09-05 14:54:00', NULL, 1, 1),
('bcfrrdknkudnsar2sdquvok3fj', '2023-07-26 12:52:33', '2023-07-26 13:10:37', 63, 0),
('bj94bp520tvsssdjvcbv0kj0t3', '2023-09-19 15:17:47', NULL, 1, 1),
('chafhkn2ebt47vuorh01071k', '2023-07-24 20:32:13', '2023-07-24 21:31:05', 1, 0),
('ci32nf7o4bkibsvn4ts6eum5nt', '2023-07-26 15:35:55', '2023-07-26 17:43:22', 63, 0),
('dj29fiulglh6jc9vfei8ta1s', '2023-07-24 21:24:30', '2023-07-24 21:24:35', 63, 0),
('fed85klvoi7l9j8q8ba6q5kks7', '2023-12-12 22:44:18', NULL, 1, 1),
('gthngvt27v7ptkaiak48rtgn5d', '2023-07-26 11:50:02', '2023-07-26 12:52:28', 63, 0),
('gveuo3vo91k9gdq3mbq5jch37v', '2023-07-26 17:44:02', NULL, 63, 1),
('haembn6qbep3k4g2ou459cqff3', '2023-07-26 17:35:22', '2023-07-26 17:56:07', 1, 0),
('jfds5m3qf2c9c8p9ukp9dcd7', '2023-07-21 18:26:47', '2023-07-21 18:27:59', 1, 0),
('k1vqro2oak9k3lq1qth7hfsb9j', '2023-07-25 18:19:36', '2023-07-25 18:19:42', 63, 0),
('lmph9th47mh4o4ck3f11hgad', '2023-07-21 18:29:38', '2023-07-21 18:29:50', 2, 0),
('o5g1oi59osdo504cslmrqsijgp', '2023-08-05 16:29:41', NULL, 1, 1),
('o9e9jso12h5qvf65d6ba8mma96', '2023-07-25 18:21:37', '2023-07-26 11:37:31', 63, 0),
('oq59r1j9dmtiosoascg2topg', '2023-07-24 21:23:52', '2023-07-24 21:23:55', 63, 0),
('pcv585mehr5ibnt1bgqr90agbs', '2023-07-26 18:00:10', NULL, 1, 1),
('pdabpb6omjp709tn9k5s5fet', '2023-07-23 10:58:56', '2023-07-24 15:18:36', 1, 0),
('qokneuap2c762brnn2eriram', '2023-07-24 21:26:50', '2023-07-24 21:29:33', 63, 0),
('s72b7bssfegrvujfhls86cld', '2023-07-24 21:23:33', '2023-07-24 21:23:36', 63, 0),
('tgnsi9k3q1281fucpmkd97bd', '2023-07-24 15:44:09', '2023-07-24 20:31:12', 1, 0),
('tlsjkh1cdhplqvqmjufslljoje', '2023-07-26 11:41:45', '2023-07-26 16:25:35', 1, 0),
('u4b7d14lhs70cucfotvsucn7', '2023-07-24 21:31:46', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` char(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role_id` int NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`) USING BTREE,
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `email`, `password`, `role_id`, `active`) VALUES
(1, 'Julien Kerboeuf', 'julien.kerboeuf@gmail.com', 'ab6ea24c8db4f40c30626ef3025b70b26fe11aaf886373a087582fc93545c7e0', 1, 1),
(2, 'Tamás Koncz', 'tamas.koncz@vidux.net', 'f78c2a6f163b9c85dad10da2877a157ffeb870d92017491849dd0e778dc4727d', 1, 1),
(5, 'Aaron Holt', 'phasellus.vitae@icloud.couk', '', 1, 1),
(10, 'Roth Hart', 'nullam@aol.com', '', 1, 0),
(11, 'Ivory Frost', 'et.nunc@icloud.edu', '', 2, 1),
(13, 'Teagan Callahan', 'posuere.vulputate.lacus@outlook.ca', '', 1, 0),
(17, 'Penelope Velezz', 'nunc.ullamcorper@aol.org', '', 2, 1),
(19, 'Pamela Cannon', 'consectetuer.adipiscing@protonmail.ca', '', 4, 1),
(20, 'Lyle Combs', 'sit.amet@hotmail.ca', '', 4, 1),
(21, 'Zane Heath', 'quis.pede@outlook.edu', '', 3, 1),
(24, 'Sonya Vaughn', 'amet.consectetuer@outlook.org', '', 2, 0),
(25, 'Jasper Marks', 'ac.facilisis@hotmail.net', '', 2, 1),
(26, 'Gil Mcdowell', 'non.nisi.aenean@aol.edu', '', 1, 0),
(27, 'Amena Manning', 'quis@icloud.org', '', 1, 1),
(28, 'Athena Fernandez', 'dolor.nulla@hotmail.org', '', 2, 0),
(29, 'Nissim Patrick', 'nam.tempor@aol.org', '', 3, 1),
(31, 'Guy Sosa', 'orci@google.couk', '', 3, 0),
(33, 'Raymond Lynn', 'eu.erat@icloud.com', '', 2, 1),
(34, 'Todd Boyer', 'nisl.elementum.purus@protonmail.net', '', 2, 0),
(35, 'Mikayla Guzman', 'sapien.aenean@yahoo.org', '', 3, 1),
(36, 'Levi Lee', 'rhoncus.nullam@aol.net', '', 1, 1),
(37, 'Reed Aguilar', 'tincidunt.nunc@icloud.couk', '', 4, 0),
(38, 'Cassady Mcdonald', 'auctor.nunc@icloud.edu', '', 3, 0),
(39, 'Zachary Neal', 'nec.urna.suscipit@hotmail.org', '', 2, 1),
(40, 'Sonia Bennett', 'mus.proin@google.edu', '', 2, 1),
(41, 'Abdul Barber', 'tellus.phasellus@google.net', '', 3, 0),
(42, 'Blossom Carter', 'elit@icloud.ca', '', 2, 0),
(43, 'Pearl Mckinney', 'lorem@google.ca', '', 4, 1),
(45, 'Phyllis Forbes', 'donec@hotmail.couk', '', 3, 0),
(46, 'Galena Harrison', 'dictum@protonmail.couk', '', 2, 0),
(47, 'Tana Sheppard', 'ornare.placerat.orci@hotmail.org', '', 3, 0),
(48, 'Lance Bentley', 'purus.mauris@google.org', '', 2, 1),
(49, 'Jemima Noel', 'ipsum.cursus@hotmail.net', '', 1, 0),
(50, 'Madeson Hanson', 'lorem.ipsum@protonmail.ca', '', 2, 0),
(51, 'Aristotle Britt', 'cursus.et@protonmail.ca', '', 2, 1),
(53, 'Xaviera Keith', 'semper.egestas@yahoo.net', '', 4, 0),
(54, 'Hilary Anthony', 'rhoncus@yahoo.com', '', 2, 1),
(55, 'Shelby West', 'id@yahoo.com', '', 4, 0),
(56, 'Kato Slater', 'faucibus.leo@google.edu', '', 1, 1),
(57, 'Yoko Patel', 'varius.ultrices@icloud.org', '', 3, 1),
(60, 'jfsdfms', 'fnsdugh@gsldgh', 'e7496076758f1d162aed9e9b98b2e41499ad849f8413e9d28d5382246dd50799', 2, 1),
(61, 'Marki moo', 'MARK@gmail.com', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 4, 1),
(62, 'inactive test', 'out@test.com', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 1, 0),
(63, 'test', 'test@test', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 2, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);

-- --------------------------------------------------------

--
-- Compte utilisateur de l'application
--

CREATE USER 'vidux' @'%' IDENTIFIED VIA password USING 'vidux';
GRANT USAGE ON *.* TO 'vidux' @'%';
GRANT ALL PRIVILEGES ON `vidux`.* TO 'vidux' @'%';

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

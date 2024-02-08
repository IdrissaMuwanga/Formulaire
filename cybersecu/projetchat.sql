-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : jeu. 08 fév. 2024 à 15:55
-- Version du serveur : 10.6.5-MariaDB
-- Version de PHP : 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetchat`
--

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chat`
--

INSERT INTO `chat` (`id`, `login`, `message`, `date_time`) VALUES
(24, 'Lionel MESSI', ' test\r\n', '2022-12-11 21:11:48'),
(23, 'Lionel MESSI', ' Je suis messi\r\n', '2022-12-11 21:01:29'),
(22, 'Lionel MESSI', ' test', '2022-12-11 21:01:22'),
(21, 'test', ' test', '2022-12-11 20:52:09'),
(20, 'mtnn', ' mtn', '2022-12-11 20:50:57'),
(19, 'test', ' test', '2022-12-11 20:42:25'),
(18, 'test', ' test', '2022-12-11 20:41:38'),
(17, 'lilan', ' test', '2022-12-05 14:55:49'),
(16, 'azert', ' test', '2022-12-05 14:51:04'),
(25, 'Cristiano RONALDO', ' je suis ronaldo', '2022-12-11 21:12:03'),
(26, 'Cristiano RONALDO', ' test de cr7', '2022-12-11 21:12:20'),
(27, 'Cristiano RONALDO', ' test de cr7', '2022-12-11 21:12:57'),
(28, 'Cristiano RONALDO', ' test de cr7', '2022-12-11 21:13:08'),
(29, 'Cristiano RONALDO', ' ok message pour la cdm', '2022-12-11 21:13:20'),
(30, 'Cristiano RONALDO', ' ok message pour la cdm', '2022-12-11 21:14:07'),
(31, 'Cristiano RONALDO', 'la France champion on espere', '2022-12-11 21:18:09'),
(32, 'Lionel MESSI', ' Je suis meilleur que ronaldo', '2022-12-11 21:19:54'),
(33, 'Olivier GIROUD', ' je suis Giroud le francais', '2022-12-11 21:46:40'),
(34, 'Cristiano RONALDO', 'message portugais', '2022-12-11 22:20:42'),
(35, 'Cristiano RONALDO', ' je suis portugais\r\n', '2022-12-12 09:42:25'),
(36, 'Lionel MESSI', ' je suis argentin', '2022-12-12 09:42:43'),
(37, 'Kylian MBAPPE', ' un des meilleurs fr de l histoire\r\n', '2022-12-12 12:19:29'),
(38, 'Lionel MESSI', ' azerty', '2022-12-12 12:28:12'),
(39, 'Lionel MESSI', ' ', '2022-12-12 12:28:35');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `mail`, `login`, `pass`) VALUES
(1, 'muwanga', 'idrissa', '', 'naruto', 'ab4f63f9ac65152575886860dde480a1'),
(2, 'pasmuwanga', 'pasidrissa', '', 'pasidrissanonplus', '7682fe272099ea26efe39c890b33675b'),
(3, 'djiav', 'hameed', '', 'hameed', 'b4a52707cf537f112e12418829513ab9'),
(4, 'Muwanga', 'Idrissa', '', 'Idrissa', 'ee9b7e52c2487090979fe07951de869c'),
(5, 'Nom', 'Prenom', '', 'Loginn', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0'),
(6, 'Muwanga', 'Idrissa', 'Idrissa@gmail.com', 'idrissa2', 'a8a97e8f72db3fe46b1aa9f9ddb8f353'),
(7, 'Ronaldo', 'Cristiano', 'cr7@gmail.com', 'cr7', 'c5aa3124b1adad080927ce4d144c6b33'),
(8, 'messi', 'lionel', 'messi@gmail.com', 'messi', '1463ccd2104eeb36769180b8a0c86bb6'),
(11, 'mbappe', 'kylian', 'mbappe@hotmail.fr', 'mbappe', '455ad4beb47b2970cd7ae57468d3e03e'),
(12, 'giroud', 'olivier', 'giroud@hotmail.com', 'giroud', '561f6e33ca3bfe95cdde815c4fb61af7'),
(13, 'benzema', 'karim', 'cr7@gmail.com', 'benzou', 'a00de8bd0f12de47ea4914f9296ef7b4'),
(14, 'zinedine', 'zidane', 'cr7@gmail.com', 'zizou', '6fa6bf8390d5ce21a4a3797a91c1c86b'),
(15, 'a', 'a', 'cr7@gmail.com', 'a', '0cc175b9c0f1b6a831c399e269772661'),
(16, 'c', 'c', 'cr7@gmail.com', 'c', '4a8a08f09d37b73795649038408b5f33'),
(17, 'a', 'a', 'cr7@gmail.com', 'aa', '0cc175b9c0f1b6a831c399e269772661'),
(18, 'a', 'aa', 'cr7@gmail.com', 'az', '0cc175b9c0f1b6a831c399e269772661'),
(19, 'a', 'a', 'cr7@gmail.com', 'aze', '0cc175b9c0f1b6a831c399e269772661'),
(20, 'a', 'a', 'cr7@gmail.com', 'v', '0cc175b9c0f1b6a831c399e269772661'),
(21, 'aze', 'aze', 'cr7@gmail.com', 'vava', 'c4055e3a20b6b3af3d10590ea446ef6c'),
(22, 'James', 'Lebron', 'cr7@gmail.com', 'legoat', '021a304869b110c86d032f41fdcd05c7'),
(23, 'ac', 'ac', 'cr7@gmail.com', 'ac', 'e2075474294983e013ee4dd2201c7a73'),
(24, 'curry', 'steph', 'cr7@gmail.com', 'curry', '6f374060aebf4d4f9a846337dd989c5a'),
(25, 'fg', 'fg', 'cr7@gmail.com', 'fg', '3d4044d65abdda407a92991f1300ec97'),
(26, 'gg', 'gg', 'cr7@gmail.com', 'gg', '73c18c59a39b18382081ec00bb456d43');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 17 Août 2018 à 07:36
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `adfab`
--

-- --------------------------------------------------------

--
-- Structure de la table `quizusers`
--

CREATE TABLE IF NOT EXISTS `quizusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `quizusers`
--

INSERT INTO `quizusers` (`id`, `name`, `email`, `password`) VALUES
(1, 'Kevin Shirley', 'kevinxshirley@gmail.com', 'kevin'),
(2, 'Paul', 'paul@temps.com', 'paul'),
(3, 'Jean', 'jean@gmail.com', 'jean'),
(4, 'Will', 'will@gmail.com', 'will'),
(5, 'Ali', 'ali@gmail.com', 'ali'),
(6, 'Tom', 'tom@gmail.com', 'tom'),
(7, 'Junior', 'junior@gmail.com', 'junior');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

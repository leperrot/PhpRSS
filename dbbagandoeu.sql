-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 10 Janvier 2017 à 14:52
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dbbagandoeu`
--

-- --------------------------------------------------------

--
-- Structure de la table `tadmin`
--

CREATE TABLE `tadmin` (
  `login` varchar(20) NOT NULL,
  `mdp` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tadmin`
--

INSERT INTO `tadmin` (`login`, `mdp`) VALUES
('king', 'azertyui1');

-- --------------------------------------------------------

--
-- Structure de la table `tflux`
--

CREATE TABLE `tflux` (
  `Lien` varchar(250) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tnews`
--

CREATE TABLE `tnews` (
  `Lien` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Titre` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Date` date NOT NULL,
  `Description` varchar(250) CHARACTER SET utf8 NOT NULL,
  `Categorie` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tnews`
--

INSERT INTO `tnews` (`Lien`, `Titre`, `Date`, `Description`, `Categorie`) VALUES
('http://9gag.com/', '9gag', '2016-12-13', 'WOW', 'Culture'),
('https://www.youtube.com/?gl=FR&hl=fr', 'Youtube', '2017-01-08', 'Vidéos en tous genres.', 'Informatique'),
('http://getbootstrap.com/components/', 'Bootstrap', '2017-01-08', 'Easy html', 'Nouvelles technologies');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `tflux`
--
ALTER TABLE `tflux`
  ADD PRIMARY KEY (`Lien`),
  ADD UNIQUE KEY `Lien` (`Lien`);

--
-- Index pour la table `tnews`
--
ALTER TABLE `tnews`
  ADD PRIMARY KEY (`Lien`),
  ADD UNIQUE KEY `Lien` (`Lien`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

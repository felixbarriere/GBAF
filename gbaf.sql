-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 29 jan. 2021 à 08:40
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gbaf`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_user` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date_message` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_article` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`ID`, `ID_user`, `message`, `date_message`, `id_article`) VALUES
(57, 'ugo', 'Bravo', '2021-01-28 11:34:07', 2),
(32, 'Fefe', 'J\'ai connu mieux.', '2021-01-21 01:21:24', 4),
(31, 'Fefe', 'Organisme de confiance', '2021-01-21 01:21:00', 3),
(42, 'Tom Tom Tom', 'Des collaborateurs de qualité', '2021-01-26 12:18:35', 1),
(41, 'Mae', 'Bon organisme', '2021-01-25 18:22:31', 2),
(40, 'Mae', 'Tres réactifs', '2021-01-25 18:20:52', 1),
(39, 'Mae', 'Super site', '2021-01-25 18:18:58', 1),
(38, 'JDOE', 'Super!', '2021-01-21 01:31:52', 1),
(26, 'Fefe', 'un autre test', '2021-01-21 01:09:10', 1),
(33, 'Fefe', 'Super', '2021-01-21 01:21:37', 2),
(34, 'JDOE', 'Un très bon relationnel client, je recommande!', '2021-01-21 01:22:48', 1),
(35, 'JDOE', 'Peut mieux faire...', '2021-01-21 01:23:05', 4),
(36, 'JDOE', 'Mon assureur préféré!', '2021-01-21 01:23:28', 2),
(37, 'JDOE', 'Mon organisme de financement préféré!', '2021-01-21 01:24:05', 2),
(56, 'ugo', 'Tres réactifs', '2021-01-28 11:33:49', 1),
(55, 'Tom Tom Tom', 'Bravo, tout simplement.', '2021-01-26 17:42:21', 3);

-- --------------------------------------------------------

--
-- Structure de la table `dislikes`
--

DROP TABLE IF EXISTS `dislikes`;
CREATE TABLE IF NOT EXISTS `dislikes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) NOT NULL,
  `id_membre` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `dislikes`
--

INSERT INTO `dislikes` (`id`, `id_article`, `id_membre`) VALUES
(88, 4, 32),
(87, 3, 32),
(85, 4, 15),
(84, 3, 15),
(81, 4, 16),
(76, 4, 17),
(71, 1, 10),
(65, 2, 10);

-- --------------------------------------------------------

--
-- Structure de la table `informations`
--

DROP TABLE IF EXISTS `informations`;
CREATE TABLE IF NOT EXISTS `informations` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `question_secrete` text NOT NULL,
  `reponse_question_secrete` text NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `username_2` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `informations`
--

INSERT INTO `informations` (`ID`, `nom`, `prenom`, `username`, `password`, `question_secrete`, `reponse_question_secrete`) VALUES
(6, 'Barrieere', 'felix', 'felix', 'lalala', 'ville de naissance', 'bordeaux'),
(10, 'Barrière', 'Félix', 'Fefe', '$2y$10$h4EOKDibRrODyuHchv18FOF1K39w8EfbJGA6G.sdjAaSSNEt4deQW', 'ville', 'Bordeaux'),
(32, 'roussillon', 'Ugo', 'Ugo', '$2y$10$TaCt2atc4zK3dI57vrh8GeEJ9UzjvnDoKkwgCzBFGDrwoDl.IhHEW', 'Instrument', 'guitare'),
(15, 'Baudinet', 'Thomas', 'Tom Tom Tom', '$2y$10$d2Am/wAyclaDm2xd3bKp2.cIphMKyTZpp3lSm7s/5wcX4xLsMUpVS', 'Metier', 'medecin'),
(16, 'Rouanne', 'Margot', 'Gomar', '$2y$10$qNMa/FDHc3EJmczYdwVetuw6zdS4seZgkT6r9O3.AZtA3WdG6b3nK', 'mon metier', 'vin'),
(31, 'Guiral', 'Maelys', 'Mae', '$2y$10$PjogDAzG9Bz0dmRs1dFTPOP52LSYwPSBnj9i07/TsBL/gapDR2t5i', 'ville', 'aix'),
(17, 'Doe', 'John', 'JDOE', '$2y$10$JQzFsZnfn5Zjw4GpXIgKJuA4hDMx2pJkeAhKNjqLa9biYmOM07bdq', 'pays', 'UK'),
(18, 'Durand', 'Robert', 'Bert', '$2y$10$MnF6MDyTCwSlPgoj68kSOe6hl4In5qwBXqt1ikBfBi0Slzqo.m84a', 'region', 'PACA'),
(19, 'Obama', 'Barack', 'YES', '$2y$10$ouJgstJITP5piuqBeu2rTe7H7BFEreLHfqV1VUnqYyxt9uID8.USW', 'pays', 'USA'),
(30, 'brgvfedc', 'okpm,', 'koml,', '$2y$10$QO5L1muZKf8z5PHm35k8leD74CarsSNLPe3i80afaSBSzDzIfyIJy', 'kml,', 'koml,;');

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) NOT NULL,
  `id_membre` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id`, `id_article`, `id_membre`) VALUES
(90, 2, 32),
(95, 1, 32),
(86, 1, 15),
(82, 2, 31),
(88, 1, 31),
(79, 3, 16),
(78, 2, 16),
(77, 1, 16),
(76, 3, 17),
(75, 1, 17);

-- --------------------------------------------------------

--
-- Structure de la table `partenaires`
--

DROP TABLE IF EXISTS `partenaires`;
CREATE TABLE IF NOT EXISTS `partenaires` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `logo` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `partenaires`
--

INSERT INTO `partenaires` (`ID`, `nom`, `description`, `logo`) VALUES
(1, 'Formation & Co', 'Formation&co est une association française présente sur tout le territoire.\r\nNous proposons à des personnes issues de tout milieu de devenir entrepreneur grâce à un crédit et un accompagnement professionnel et personnalisé.<br><br>\r\nNotre proposition :<br> \r\n	un financement jusqu’à 30 000€ ;<br>\r\n	un suivi personnalisé et gratuit ;<br>\r\n	une lutte acharnée contre les freins sociétaux et les stéréotypes.<br><br>\r\n\r\nLe financement est possible, peu importe le métier : coiffeur, banquier, éleveur de chèvres… . Nous collaborons avec des personnes talentueuses et motivées.<br>\r\nVous n’avez pas de diplômes ? Ce n’est pas un problème pour nous ! Nos financements s’adressent à tous.\r\n<br><br><br>\r\n', 'images/formation_co.png'),
(2, 'ProtectPeople', 'Protectpeople finance la solidarité nationale. \r\n\r\nNous appliquons le principe édifié par la Sécurité sociale française en 1945 : permettre à chacun de bénéficier d’une protection sociale.<br><br>\r\n\r\nChez Protectpeople, chacun cotise selon ses moyens et reçoit selon ses besoins.\r\nProectecpeople est ouvert à tous, sans considération d’âge ou d’état de santé.\r\nNous garantissons un accès aux soins et une retraite.<br>\r\n\r\nChaque année, nous collectons et répartissons 300 milliards d’euros.\r\nNotre mission est double :<br><br>\r\n\r\n\r\n	- sociale : nous garantissons la fiabilité des données sociales ;<br><br>\r\n\r\n\r\n	- économique : nous apportons une contribution aux activités économiques.<br>\r\n\r\n', 'images/protectpeople.png'),
(3, 'DSA France', 'Dsa France accélère la croissance du territoire et s’engage avec les collectivités territoriales.<br><br>\r\n\r\n\r\nNous accompagnons les entreprises dans les étapes clés de leur évolution.\r\nNotre philosophie : s’adapter à chaque entreprise.<br><br>\r\n\r\n\r\nNous les accompagnons pour voir plus grand et plus loin et proposons des solutions de financement adaptées à chaque étape de la vie des entreprises.<br>\r\n\r\n', 'images/Dsa_france.png'),
(4, 'CDE', 'La CDE (Chambre Des Entrepreneurs) accompagne les entreprises dans leurs démarches de formation. <br>\r\n\r\nSon président est élu pour 3 ans par ses pairs, chefs d’entreprises et présidents des CDE.\r\n', 'images/CDE.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

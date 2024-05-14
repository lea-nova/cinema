-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 13 mai 2024 à 09:57
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tmp`
--

-- --------------------------------------------------------

--
-- Déchargement des données de la table `acteur`
--

INSERT INTO `acteur` (`id`, `nom`, `prenom`) VALUES
(1, 'Allen', 'Alfie'),
(2, 'Brando', 'Marlon'),
(3, 'Brasseur', 'Claude'),
(28, 'Crowe', 'Russell'),
(15, 'De Funes', 'Louis'),
(4, 'De Niro', 'Robert'),
(5, 'Fishburne', 'Laurence'),
(6, 'Keaton', 'Diane'),
(7, 'L. Jackson', 'Samuel'),
(44, 'Lauby', 'Chantal'),
(34, 'Leonardo', 'Di Caprio'),
(33, 'Marion ', 'Cotillard'),
(8, 'Moss', 'Carrie-Anne'),
(30, 'Nielsen', 'Connie '),
(9, 'Pacino', 'Al'),
(10, 'Ratinier', 'Claude'),
(29, 'Reed', 'Oliver'),
(11, 'Reeves', 'Keanu'),
(12, 'Rich', 'Claude'),
(13, 'Thurman', 'Uma'),
(14, 'Travolta', 'John'),
(43, 'Washington', 'John David ');

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id`, `titre`, `realisateur`, `affiche`, `annee`) VALUES
(1, 'Matrix', 'Les Wachowski', 'http://fr.web.img6.acsta.net/r_1920_1080/medias/04/34/49/043449_af.jpg', 1999),
(2, 'La soupe aux choux', 'Jean Girault', 'http://fr.web.img6.acsta.net/r_1280_720/medias/nmedia/18/36/11/21/18478117.jpg', 1981),
(3, 'John Wick', 'David Leitch', 'http://fr.web.img4.acsta.net/pictures/14/10/08/11/49/255061.jpg', 2014),
(4, 'Le Parrain', 'Francis Ford Coppola', 'http://fr.web.img4.acsta.net/medias/nmedia/18/35/57/73/18660716.jpg', 1972),
(5, 'Le souper', 'Edouard Molinaro', 'http://www.cinemapassion.com/lesaffiches/Le-Souper-affiche-12388.jpg', 1992),
(6, 'Pulp Fiction', 'Quentin Tarantino', 'http://fr.web.img4.acsta.net/r_1920_1080/medias/nmedia/18/36/02/52/18686501.jpg', 1994),
(7, 'Le Parrain, 2eme Partie', 'Francis Ford Coppola', 'https://musicart.xboxlive.com/7/6d295200-0000-0000-0000-000000000002/504/image.jpg?w=1920&h=1080', 1974),
(22, 'Gladiator', 'Ridley Scott', 'http://fr.web.img6.acsta.net/r_1920_1080/medias/nmedia/18/68/64/41/19254510.jpg', 2000),
(25, 'Inception', 'Christopher Nolan', 'https://media.senscritique.com/media/000004710747/source_big/Inception.jpg', 2010),
(40, 'Tenet', 'Christopher Nolan', 'https://fr.web.img2.acsta.net/pictures/20/08/03/12/15/2118693.jpg', 2020),
(42, 'La Cité de la peur', ' Alain Berbérian', 'https://media.senscritique.com/media/000020381903/300/la_cite_de_la_peur.jpg', 1994);

-- --------------------------------------------------------
--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `id_film`, `id_acteur`, `personnage`) VALUES
(32, 4, 2, 'Vito Corleone'),
(26, 5, 3, 'Joseph Fouché'),
(21, 4, 4, 'Vito Corleone'),
(19, 1, 5, 'Morpheus'),
(24, 3, 6, 'Iosef Tarasov'),
(31, 7, 6, 'Kay Adams-Corleone'),
(29, 6, 7, 'Jules Winnfield'),
(25, 1, 8, 'Trinity '),
(22, 4, 9, 'Mickael Corleone'),
(23, 7, 9, 'Mickael Corleone'),
(17, 1, 11, 'Neo'),
(18, 3, 11, 'John Wick'),
(27, 5, 12, 'Talleyrand'),
(30, 6, 13, 'Mia Wallace'),
(28, 6, 14, 'Vincent Vega'),
(20, 2, 15, 'Le Glaude'),
(35, 22, 28, 'Maximus'),
(36, 22, 29, 'Proximo'),
(37, 22, 30, 'Lucilla'),
(40, 25, 33, 'Mall'),
(41, 25, 34, 'Dom Cobb'),
(51, 40, 43, 'Le protagoniste');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

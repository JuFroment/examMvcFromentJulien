-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 08, 2022 at 04:50 PM
-- Server version: 8.0.27
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exammvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `titre`, `image`) VALUES
(1, 'Montagne', '6201b0202bf46.jpeg'),
(3, 'Lac', '6201b16cdc3bc.jpeg'),
(2, 'Mer', '6201b095d3a24.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `isAdmin`) VALUES
(1, 'admin', 'admin', 'admin@admin.admin', 1),
(2, 'user', 'user', 'user@user.user', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

DROP TABLE IF EXISTS `vote`;
CREATE TABLE IF NOT EXISTS `vote` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int NOT NULL,
  `id_voyage` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_voyage` (`id_voyage`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `voyage`
--

DROP TABLE IF EXISTS `voyage`;
CREATE TABLE IF NOT EXISTS `voyage` (
  `id_voyage` int NOT NULL AUTO_INCREMENT,
  `picture` varchar(250) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `lattitude` decimal(15,6) NOT NULL,
  `longitude` decimal(15,6) NOT NULL,
  `id_category` int NOT NULL,
  PRIMARY KEY (`id_voyage`),
  KEY `id_categorie` (`id_category`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `voyage`
--

INSERT INTO `voyage` (`id_voyage`, `picture`, `nom`, `lattitude`, `longitude`, `id_category`) VALUES
(1, '62027a02ca962.jpeg', 'Alpes', '46.887619', '9.657000', 1),
(2, '62025db8b1b51.jpeg', 'Boulogne-sur-Merre', '50.725231', '1.613334', 2),
(47, '62025ddee4ea6.png', 'Much Noise', '11.223344', '55.667788', 6),
(48, '62025ec264aeb.jpeg', 'Lac d\'Aigue-Belette', '45.539000', '5.814000', 3),
(51, '620287c51a8dc.jpeg', 'Blob', '22.333333', '33.444444', 7),
(45, 'https://i.ibb.co/WHNBnJt/verynoise.png', 'Such Noise', '11.223344', '55.667788', 5),
(46, '62025c44ac961.png', 'Much Noise', '88.776655', '44.332211', 5),
(43, '6202517a1bb61.jpeg', 'Pyrénées', '43.019392', '0.149499', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

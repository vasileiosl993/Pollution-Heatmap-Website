-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: localhost
-- Χρόνος δημιουργίας: 29 Μάη 2016 στις 14:04:50
-- Έκδοση διακομιστή: 5.6.12-log
-- Έκδοση PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Βάση: `projectwebdb`
--
CREATE DATABASE IF NOT EXISTS `projectwebdb` DEFAULT CHARACTER SET greek COLLATE greek_general_ci;
USE `projectwebdb`;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `station` varchar(10) DEFAULT NULL,
  `date1` date DEFAULT NULL,
  `pollutant` varchar(10) NOT NULL,
  `t00` float DEFAULT NULL,
  `t01` float DEFAULT NULL,
  `t02` float DEFAULT NULL,
  `t03` float DEFAULT NULL,
  `t04` float DEFAULT NULL,
  `t05` float DEFAULT NULL,
  `t06` float DEFAULT NULL,
  `t07` float DEFAULT NULL,
  `t08` float DEFAULT NULL,
  `t09` float DEFAULT NULL,
  `t10` float DEFAULT NULL,
  `t11` float DEFAULT NULL,
  `t12` float DEFAULT NULL,
  `t13` float DEFAULT NULL,
  `t14` float DEFAULT NULL,
  `t15` float DEFAULT NULL,
  `t16` float DEFAULT NULL,
  `t17` float DEFAULT NULL,
  `t18` float DEFAULT NULL,
  `t19` float DEFAULT NULL,
  `t20` float DEFAULT NULL,
  `t21` float DEFAULT NULL,
  `t22` float DEFAULT NULL,
  `t23` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=greek AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `apikey` varchar(32) NOT NULL,
  `displaycounter` int(11) NOT NULL,
  `absolutecounter` int(11) NOT NULL,
  `averagecounter` int(11) NOT NULL,
  PRIMARY KEY (`apikey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `members`
--

INSERT INTO `members` (`email`, `password`, `apikey`, `displaycounter`, `absolutecounter`, `averagecounter`) VALUES
('manolios@trelakos', 'skatoules', 'prv/NAfV/dUrw', 11, 7, 8);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `stations`
--

CREATE TABLE IF NOT EXISTS `stations` (
  `id` varchar(10) NOT NULL,
  `name` varchar(60) NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `stations`
--

INSERT INTO `stations` (`id`, `name`, `lat`, `lng`) VALUES
('PAΙΙΙ', 'ΑΚΤΑΙΟ', 38.3041, 21.7889),
('ΑΞΠ', 'ΑΞΙΟΥΠΟΛΗ', 40.9833, 22.5333);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

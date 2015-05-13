-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 13, 2015 at 03:11 AM
-- Server version: 5.5.20
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nba_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `account_level` int(11) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `active` int(11) DEFAULT '1',
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `email`, `password`, `account_level`, `date_created`, `active`, `firstname`, `lastname`) VALUES
(1, 'admin@test.com', 'test', 99, '2015-05-07 07:19:58', 1, 'Kath', 'de Padua');

-- --------------------------------------------------------

--
-- Table structure for table `gameline`
--

CREATE TABLE `gameline` (
  `gameline_id` int(11) NOT NULL AUTO_INCREMENT,
  `game_date` datetime DEFAULT NULL,
  `game_match` varchar(45) DEFAULT NULL,
  `game_lineup` varchar(45) DEFAULT NULL,
  `standings` varchar(45) DEFAULT NULL,
  `win` varchar(45) DEFAULT NULL,
  `lose` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`gameline_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `gameline`
--

INSERT INTO `gameline` (`gameline_id`, `game_date`, `game_match`, `game_lineup`, `standings`, `win`, `lose`) VALUES
(2, '2015-05-13 20:00:00', '1', 'CHI', '2nd Central', '50', '32'),
(3, '2015-05-13 22:30:00', '2', 'HOU', '1st Southwest', '56', '26'),
(4, '2015-05-13 22:30:00', '2', 'LAC', '2nd Pacific', '56', '26'),
(5, '2015-05-13 20:00:00', '1', 'CLE', '1st Central', '56', '77');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

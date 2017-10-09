-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Vert: localhost
-- Generert den: 09. Mai, 2012 16:08 PM
-- Tjenerversjon: 5.5.20
-- PHP-Versjon: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `add this`
--

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL COMMENT 'Name of the file',
  `owner` char(32) NOT NULL COMMENT 'externaluser uid or internal uid',
  `descr` text NOT NULL COMMENT 'Description of the file contents',
  `size` int(11) NOT NULL COMMENT 'Size of the file',
  `date` datetime NOT NULL COMMENT 'The date/time of upload',
  `mime` varchar(128) NOT NULL COMMENT 'File mime type',
  `content` longblob NOT NULL COMMENT 'The actual content of the file',
  `newVersion` int(11) NOT NULL COMMENT 'Link to the new version of this file (if any)',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

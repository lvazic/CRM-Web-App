-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2015 at 06:50 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `cenovnik`
--

CREATE TABLE IF NOT EXISTS `cenovnik` (
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cena` double NOT NULL DEFAULT '0',
  `datumod` date DEFAULT NULL,
  `datumdo` date DEFAULT NULL,
  PRIMARY KEY (`pid`,`cid`),
  UNIQUE KEY `cid_2` (`cid`),
  KEY `cid` (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

--
-- Dumping data for table `cenovnik`
--

INSERT INTO `cenovnik` (`pid`, `cid`, `cena`, `datumod`, `datumdo`) VALUES
(1, 1, 744, '2015-01-01', NULL),
(2, 2, 635, '2015-01-01', NULL),
(3, 3, 855, '2015-01-01', NULL),
(4, 4, 895, '2015-01-01', NULL),
(5, 5, 694, '2015-01-01', NULL),
(6, 6, 815, '2015-01-01', NULL),
(7, 7, 550, '2015-01-01', NULL),
(8, 8, 456, '2015-01-01', NULL),
(9, 9, 360, '2015-01-01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `delatnost`
--

CREATE TABLE IF NOT EXISTS `delatnost` (
  `did` int(4) NOT NULL,
  `naziv` varchar(200) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`did`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `delatnost`
--

INSERT INTO `delatnost` (`did`, `naziv`) VALUES
(1, 'Delatnost 1'),
(2, 'Delatnost 2'),
(3, 'Delatnost 3'),
(4, 'Delatnost 4'),
(5, 'Delatnost 5');

-- --------------------------------------------------------

--
-- Table structure for table `firma`
--

CREATE TABLE IF NOT EXISTS `firma` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(200) COLLATE utf8_bin NOT NULL DEFAULT '',
  `telefon` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '',
  `email` varchar(50) COLLATE utf8_bin DEFAULT '',
  `websajt` varchar(80) COLLATE utf8_bin DEFAULT '',
  `potencijal` varchar(60) COLLATE utf8_bin DEFAULT 'nizak',
  `status` varchar(60) COLLATE utf8_bin DEFAULT 'novi',
  `napomene` text COLLATE utf8_bin,
  `did` int(4) NOT NULL,
  `kid_1` int(11) NOT NULL,
  `kid_2` int(11) DEFAULT NULL,
  PRIMARY KEY (`fid`),
  KEY `delatnost_fk` (`did`),
  KEY `komercijalista_dodao_fk` (`kid_1`),
  KEY `komercijalista_zaduzen_fk` (`kid_2`),
  FULLTEXT KEY `status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=13 ;

--
-- Dumping data for table `firma`
--

INSERT INTO `firma` (`fid`, `naziv`, `telefon`, `email`, `websajt`, `potencijal`, `status`, `napomene`, `did`, `kid_1`, `kid_2`) VALUES
(5, 'Novo ime kompanije', '222333', 'luka@proba.rs', 'test.rs', 'visok', 'dodeljen', 'Napomena je ovo', 2, 1, 1),
(6, 'Nova kompanija', '444555', 'mail@email.com', 'rs.rs', 'srednji', 'u razmatranju', 'Ovo je napomena', 3, 1, 1),
(7, 'aaa', '123456', 'luka@rs.rs', 'rs.rs', 'visok', 'novi', '', 2, 1, NULL),
(8, 'Fakultet organizacionih nauka', '123097', 'fon@fon.rs', 'fon.rs', 'nizak', 'u razmatranju', '', 5, 1, 1),
(9, 'MAXI MM TRADE DOO ZA TRGOVINU I USLUGE NOVI SAD', '0211110000', 'maximmtrade@gmail.com', '', 'nizak', 'u razmatranju', '', 2, 1, 1),
(10, 'Caffe Ameli', '9493320302', 'ameli@ameli.rs', 'ameli.rs', 'nizak', 'dodeljen', '', 3, 1, 1),
(11, '2Chainz Limited', '111222333', '2@chainz.com', '2chainz.com', 'srednji', 'novi', '', 4, 1, NULL),
(12, 'Roaming Electronics', '2392039', 'office@roaming.rs', 'www.roaming.rs', 'srednji', 'novi', '', 3, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `isplata`
--

CREATE TABLE IF NOT EXISTS `isplata` (
  `kid` int(11) NOT NULL,
  `datum` date NOT NULL,
  `iznos` double NOT NULL,
  `bonus` double DEFAULT '0',
  PRIMARY KEY (`kid`,`datum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `komercijalista`
--

CREATE TABLE IF NOT EXISTS `komercijalista` (
  `kid` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT '',
  `prezime` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT '',
  `datum_zaposlenja` date NOT NULL,
  `lozinka` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`kid`),
  UNIQUE KEY `kid` (`kid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `komercijalista`
--

INSERT INTO `komercijalista` (`kid`, `ime`, `prezime`, `datum_zaposlenja`, `lozinka`) VALUES
(1, 'Luka', 'Važić', '2014-09-14', 'lozinka'),
(2, 'Anja', 'Bjelotomić', '2015-02-26', 'lozinka2');

-- --------------------------------------------------------

--
-- Table structure for table `kontakt_osoba`
--

CREATE TABLE IF NOT EXISTS `kontakt_osoba` (
  `fid` int(11) NOT NULL,
  `koid` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(60) COLLATE utf8_bin NOT NULL DEFAULT '',
  `prezime` varchar(60) COLLATE utf8_bin NOT NULL DEFAULT '',
  `telefon` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '',
  `email` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `napomene` text COLLATE utf8_bin,
  PRIMARY KEY (`fid`,`koid`),
  KEY `koid` (`koid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=51 ;

--
-- Dumping data for table `kontakt_osoba`
--

INSERT INTO `kontakt_osoba` (`fid`, `koid`, `ime`, `prezime`, `telefon`, `email`, `napomene`) VALUES
(5, 1, 'Luka', 'Ivanović', '+381637070010', 'lvazic@gmail.com', 'Lične napomene'),
(5, 43, 'Jovana', 'Atlagić', '111222', 'jovana@atlagic.rs', 'Jovanina napomena'),
(5, 47, 'Anja', 'Bjelotomić', '790909', 'anjinimejl@gmail.com', 'Anja ima psa koji se zove Beti.'),
(6, 2, 'Petronije', 'Petrović', '99999999', 'petronije@petrovic.rs', 'Update napomena'),
(6, 41, 'Karađorđe', 'Petrović', '/', '/', 'Napomena'),
(6, 46, 'Miloš', 'Obrenović', '9988687', 'obrenović@drugiustanak.rs', 'Vođa II ustanka'),
(7, 3, 'Jovan', 'Petrović', '3333', 'jovan@petrovic.com', ''),
(8, 5, 'Milan', 'Martić', '123890', 'milan.martic@fon.rs', 'Dekan Fakulteta'),
(8, 44, 'Jelena', 'Jovanović', '34502093', 'jeljov@gmail.com', 'Vanredni profesor - Inteligentni sistemi'),
(9, 42, 'Petar', 'Petrović', '02199999', 'petar021@gmail.com', 'Napomena za Petra'),
(9, 45, 'Nikola', 'Nikolić', '111909', 'niknik@maxitrade.com', 'Nikolina napomena'),
(10, 48, 'Anja', 'Bjelotomić', '98392892', '', 'Napomena za Anju'),
(11, 49, 'Two', 'Chainz', '7890', '2chainz@gmail.com', 'Where U Been?'),
(12, 50, 'Nikola', 'Kovač', '09349309', 'kovac@roaming.rs', '');

-- --------------------------------------------------------

--
-- Table structure for table `kupovina`
--

CREATE TABLE IF NOT EXISTS `kupovina` (
  `fid` int(11) NOT NULL,
  `kupid` int(11) NOT NULL AUTO_INCREMENT,
  `datum` date NOT NULL,
  `napomene` text COLLATE utf8_bin,
  PRIMARY KEY (`fid`,`kupid`),
  UNIQUE KEY `kupid_2` (`kupid`),
  KEY `kupid` (`kupid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=30 ;

--
-- Dumping data for table `kupovina`
--

INSERT INTO `kupovina` (`fid`, `kupid`, `datum`, `napomene`) VALUES
(5, 2, '0000-00-00', 'efwwwef'),
(5, 4, '2015-03-02', 'efwwwefdwddw'),
(5, 6, '2015-01-02', 'dwdwdwdw'),
(5, 8, '2015-02-04', 'mmmmm'),
(5, 9, '2015-02-04', 'mmmmm'),
(5, 11, '2015-02-28', 'nnnnnnnnn'),
(5, 14, '2014-12-09', 'iiiiiiiiii'),
(5, 17, '2015-02-08', 'prodajna napomena'),
(5, 18, '2014-11-01', 'prodajna napomena'),
(5, 20, '2014-09-01', 'napomena uz prodaju'),
(5, 21, '2014-03-13', ''),
(5, 22, '2015-02-27', ''),
(5, 23, '2013-11-18', ''),
(5, 24, '2014-01-09', ''),
(5, 25, '2014-10-15', ''),
(5, 27, '2014-08-07', ''),
(5, 29, '2015-02-27', ''),
(10, 3, '0000-00-00', 'efwwwefdwddw'),
(10, 5, '0000-00-00', 'dwdwdwdw'),
(10, 7, '2014-12-31', 'tralalalalalal'),
(10, 13, '2014-12-01', 'iiiiiiiiii'),
(10, 15, '2015-02-20', 'napomena 2'),
(10, 16, '2015-02-20', 'napomena 2'),
(10, 19, '2014-08-01', ''),
(10, 26, '2014-03-04', ''),
(10, 28, '2014-09-10', '');

-- --------------------------------------------------------

--
-- Table structure for table `magacin`
--

CREATE TABLE IF NOT EXISTS `magacin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(60) NOT NULL,
  `adresa` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `magacin`
--

INSERT INTO `magacin` (`id`, `ime`, `adresa`, `lat`, `lng`) VALUES
(1, 'Magacin 1', 'Jurija Gagarina 16', 44.805786, 20.404181),
(2, 'Magacin 2', 'Blok 16', 44.815369, 20.438248),
(3, 'Magacin 3', 'Kneza Miloša 7a', 44.809715, 20.465368),
(4, 'Magacin 4', 'Pariske komune 13', 44.825356, 20.409170),
(5, 'Magacin 5', 'Bezistan', 44.813122, 20.462597);

-- --------------------------------------------------------

--
-- Table structure for table `plata`
--

CREATE TABLE IF NOT EXISTS `plata` (
  `kid` int(11) NOT NULL,
  `datum` date NOT NULL,
  `iznos` double NOT NULL DEFAULT '0',
  `bonus` double DEFAULT '0',
  PRIMARY KEY (`kid`,`datum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `plata`
--

INSERT INTO `plata` (`kid`, `datum`, `iznos`, `bonus`) VALUES
(1, '2014-10-14', 70000, 20000),
(1, '2014-11-14', 70000, 32000),
(1, '2014-12-14', 70000, 15000),
(1, '2015-01-14', 70000, 18000),
(1, '2015-02-14', 73000, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE IF NOT EXISTS `proizvod` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(200) COLLATE utf8_bin NOT NULL DEFAULT '',
  `opis` text COLLATE utf8_bin,
  `kolicina` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`pid`, `naziv`, `opis`, `kolicina`) VALUES
(1, 'Apple iPhone 6 64GB', 'Apple iPhone 6 sa 64GB memorije, izašao krajem 2014. godine', 60),
(2, 'Apple iPhone 6 16GB', 'Apple iPhone 6 sa 16GB memorije, izašao krajem 2014. godine', 40),
(3, 'Apple iPhone 6 128GB', 'Apple iPhone 6 sa 128GB memorije, izašao krajem 2014. godine', 20),
(4, 'Apple iPhone 6 Plus 128GB', 'Apple iPhone 6 Plus sa 128GB memorije, izašao krajem 2014. godine', 60),
(5, 'Apple iPhone 6 Plus 16GB', 'Apple iPhone 6 Plus sa 16GB memorije, izašao krajem 2014. godine', 67),
(6, 'Apple iPhone 6 Plus 64GB', 'Apple iPhone 6 Plus sa 64GB memorije, izašao krajem 2014. godine', 60),
(7, 'Apple iPhone 5s 32GB', 'Apple iPhone 5s sa 32GB memorije, izašao krajem 2014. godine', 200),
(8, 'Apple iPhone 5s 16GB', 'Apple iPhone 5s sa 16GB memorije, izašao krajem 2014. godine', 159),
(9, 'Apple iPhone 5c 16GB', 'Apple iPhone 5s sa 16GB memorije, izašao krajem 2014. godine', 126);

-- --------------------------------------------------------

--
-- Table structure for table `stavka_kupovine`
--

CREATE TABLE IF NOT EXISTS `stavka_kupovine` (
  `fid` int(11) NOT NULL,
  `kupid` int(11) NOT NULL,
  `skid` int(11) NOT NULL AUTO_INCREMENT,
  `kolicina` double DEFAULT '0',
  `pid` int(11) NOT NULL,
  PRIMARY KEY (`skid`,`fid`,`kupid`),
  UNIQUE KEY `skid_2` (`skid`),
  KEY `skid` (`skid`),
  KEY `pid` (`pid`),
  KEY `stavka_kupovine_fk1` (`fid`,`kupid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=28 ;

--
-- Dumping data for table `stavka_kupovine`
--

INSERT INTO `stavka_kupovine` (`fid`, `kupid`, `skid`, `kolicina`, `pid`) VALUES
(10, 13, 1, 2, 1),
(5, 14, 2, 6, 9),
(10, 15, 3, 5, 9),
(10, 16, 4, 5, 9),
(5, 17, 5, 10, 7),
(5, 18, 6, 2, 3),
(10, 19, 7, 2, 8),
(5, 20, 8, 3, 4),
(5, 21, 9, 4, 8),
(5, 22, 10, 1, 6),
(5, 23, 11, 2, 8),
(5, 23, 12, 3, 9),
(5, 24, 13, 2, 8),
(5, 24, 14, 7, 2),
(5, 25, 15, 5, 2),
(5, 25, 16, 2, 6),
(10, 26, 17, 1, 2),
(10, 26, 18, 2, 4),
(10, 26, 19, 3, 8),
(10, 26, 20, 4, 5),
(5, 27, 21, 1, 8),
(5, 27, 22, 2, 7),
(10, 28, 23, 1, 1),
(10, 28, 24, 2, 2),
(10, 28, 25, 3, 8),
(5, 29, 26, 1, 3),
(5, 29, 27, 3, 8);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cenovnik`
--
ALTER TABLE `cenovnik`
  ADD CONSTRAINT `cenovnik_fk` FOREIGN KEY (`pid`) REFERENCES `proizvod` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `firma`
--
ALTER TABLE `firma`
  ADD CONSTRAINT `delatnost_fk` FOREIGN KEY (`did`) REFERENCES `delatnost` (`did`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komercijalista_dodao_fk` FOREIGN KEY (`kid_1`) REFERENCES `komercijalista` (`kid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komercijalista_zaduzen_fk` FOREIGN KEY (`kid_2`) REFERENCES `komercijalista` (`kid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `isplata`
--
ALTER TABLE `isplata`
  ADD CONSTRAINT `isplata_fk` FOREIGN KEY (`kid`) REFERENCES `komercijalista` (`kid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kontakt_osoba`
--
ALTER TABLE `kontakt_osoba`
  ADD CONSTRAINT `kontakt_osoba_fk` FOREIGN KEY (`fid`) REFERENCES `firma` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kupovina`
--
ALTER TABLE `kupovina`
  ADD CONSTRAINT `kupovina_fk` FOREIGN KEY (`fid`) REFERENCES `firma` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plata`
--
ALTER TABLE `plata`
  ADD CONSTRAINT `plata_fk` FOREIGN KEY (`kid`) REFERENCES `komercijalista` (`kid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stavka_kupovine`
--
ALTER TABLE `stavka_kupovine`
  ADD CONSTRAINT `stavka_kupovine_fk1` FOREIGN KEY (`fid`, `kupid`) REFERENCES `kupovina` (`fid`, `kupid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stavka_kupovine_fk2` FOREIGN KEY (`fid`) REFERENCES `firma` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stavka_kupovine_fk3` FOREIGN KEY (`pid`) REFERENCES `proizvod` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

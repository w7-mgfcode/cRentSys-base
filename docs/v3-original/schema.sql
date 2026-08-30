-- =====================================================================
-- cRentSys (LocalRent v3) — Complete Relational Database Schema DDL
-- Database: localren_hu
-- Architecture: 6 Relational Tables
-- =====================================================================

SET FOREIGN_KEY_CHECKS = 0;

-- 1. Users / Accounts Table
DROP TABLE IF EXISTS `v3_user`;
CREATE TABLE `v3_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `usernev` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `szint` int(2) NOT NULL DEFAULT '1',
  `mail` varchar(100) NOT NULL,
  `veznev` varchar(50) NOT NULL,
  `kernev` varchar(50) NOT NULL,
  `szulido` varchar(20) DEFAULT NULL,
  `szulhely` varchar(50) DEFAULT NULL,
  `anynev` varchar(50) DEFAULT NULL,
  `nemzet` varchar(50) DEFAULT 'Magyar',
  `szemig` varchar(30) DEFAULT NULL,
  `jogsi` varchar(30) DEFAULT NULL,
  `lakvaros` varchar(50) DEFAULT NULL,
  `lakcim` varchar(100) DEFAULT NULL,
  `lakirsz` varchar(10) DEFAULT NULL,
  `tel` varchar(30) NOT NULL,
  `veztel` varchar(30) DEFAULT NULL,
  `regdate` datetime DEFAULT NULL,
  PRIMARY KEY (`uid`),
  KEY `idx_user_login` (`usernev`,`pass`)
) ENGINE=MyISAM DEFAULT CHARSET=latin2;

-- 2. Vehicle Model Categories Table
DROP TABLE IF EXISTS `v3_autotip`;
CREATE TABLE `v3_autotip` (
  `tipid` int(11) NOT NULL AUTO_INCREMENT,
  `gyarto` varchar(50) NOT NULL,
  `tipus` varchar(50) NOT NULL,
  `extra` text,
  `ar` int(11) NOT NULL,
  `megjegy` text,
  `kep` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tipid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin2;

-- 3. Physical Fleet Vehicles Table
DROP TABLE IF EXISTS `v3_auto`;
CREATE TABLE `v3_auto` (
  `autid` int(11) NOT NULL AUTO_INCREMENT,
  `auttip` int(11) NOT NULL,
  `rendszam` varchar(15) NOT NULL,
  `alvaz` varchar(50) DEFAULT NULL,
  `motor` varchar(50) DEFAULT NULL,
  `forgalmi` varchar(50) DEFAULT NULL,
  `tulaj` varchar(100) DEFAULT NULL,
  `kod` varchar(20) NOT NULL,
  PRIMARY KEY (`autid`),
  KEY `idx_auto_auttip` (`auttip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin2;

-- 4. Rental Bookings / Reservations Table
DROP TABLE IF EXISTS `v3_rent`;
CREATE TABLE `v3_rent` (
  `rentid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `autoid` int(11) NOT NULL,
  `eleje` datetime NOT NULL,
  `vege` datetime NOT NULL,
  `felvetel` varchar(100) NOT NULL,
  `vissza` varchar(100) NOT NULL,
  `autoar` int(11) NOT NULL,
  `felvar` int(11) NOT NULL DEFAULT '0',
  `visszar` int(11) NOT NULL DEFAULT '0',
  `megj` text,
  `apaly` varchar(10) DEFAULT 'nem',
  `takar` varchar(10) DEFAULT 'nem',
  `hatar` varchar(10) DEFAULT 'nem',
  PRIMARY KEY (`rentid`),
  KEY `idx_rent_dates` (`autoid`,`eleje`,`vege`),
  KEY `idx_rent_user` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin2;

-- 5. Operating Hours Schedule Table
DROP TABLE IF EXISTS `v3_nyitva`;
CREATE TABLE `v3_nyitva` (
  `nap` int(2) NOT NULL,
  `nyitora` time NOT NULL,
  `zarora` time NOT NULL,
  PRIMARY KEY (`nap`)
) ENGINE=MyISAM DEFAULT CHARSET=latin2;

-- 6. Location Delivery & Surcharge Fee Matrix Table
DROP TABLE IF EXISTS `v3_felv_ar`;
CREATE TABLE `v3_felv_ar` (
  `nyitva` int(2) NOT NULL,
  `iroda` int(11) NOT NULL DEFAULT '0',
  `ferihegy` int(11) NOT NULL DEFAULT '0',
  `egyeb` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nyitva`)
) ENGINE=MyISAM DEFAULT CHARSET=latin2;

-- =====================================================================
-- Seed Data Initialization
-- =====================================================================

INSERT INTO `v3_nyitva` (`nap`, `nyitora`, `zarora`) VALUES
(1, '08:00:00', '18:00:00'),
(2, '08:00:00', '18:00:00'),
(3, '08:00:00', '18:00:00'),
(4, '08:00:00', '18:00:00'),
(5, '08:00:00', '18:00:00'),
(6, '08:00:00', '14:00:00'),
(7, '08:00:00', '12:00:00');

INSERT INTO `v3_felv_ar` (`nyitva`, `iroda`, `ferihegy`, `egyeb`) VALUES
(1, 0, 3000, 2000),
(0, 2000, 5000, 4000);

SET FOREIGN_KEY_CHECKS = 1;

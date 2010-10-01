-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 02, 2010 at 04:36 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sptest`
--

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `lang_code` varchar(8) CHARACTER SET latin1 NOT NULL,
  `lang_name` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang_show` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `translated` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`lang_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`lang_code`, `lang_name`, `lang_show`, `translated`) VALUES
('en', 'English', 'English', 1),
('de', 'German', 'Deutsch', 1),
('fr', 'French', 'Français', 1),
('it', 'Italian', 'italiano', 0),
('es', 'Spanish', 'español', 1),
('pl', 'Polish', 'polski', 0),
('ru', 'Russian', 'Русский язык', 0),
('hi', 'Hindi', 'हिन्दी', 0),
('ar', 'Arabic', 'العربية', 0),
('pt', 'Portuguese', 'português', 0),
('sv', 'Swedish', 'Svenska', 0),
('no', 'Norwegian', 'Norsk', 0),
('da', 'Danish', 'dansk', 0),
('fi', 'Finnish', 'suomi', 0),
('hu', 'Hungarian', 'magyar', 0),
('nl', 'Dutch', 'Nederlands', 0),
('sr', 'Serbian', 'српски', 0),
('bg', 'Bulgarian', 'български', 0),
('uk', 'Ukrainian', 'Українська', 0),
('el', 'Greek', 'ελληνικά', 0),
('he', 'Hebrew', 'עברית / עִבְרִית', 0),
('ko', 'Korean', '한국어 [韓國語]', 0),
('zh', 'Chinese', '中文', 0),
('ja', 'Japanese', '日本語 ', 0),
('tl', 'Tagalog', 'Tagalog', 0),
('id', 'Indonesian', 'Bahasa Indonesia', 0),
('fa', 'Farsi', NULL, 0),
('th', 'Thai', 'ภาษาไทย', 0),
('ro', 'Romanian', 'română', 0),
('tr', 'Turkish', 'Türkçe', 0),
('hr', 'Croatian', 'Hrvatski', 0),
('mk', 'Macedonian', 'македонски', 0),
('bs', 'Bosnian', 'Bosanski', 0),
('sq', 'Albanian', 'shqip', 0),
('sw', 'Swahili', 'Kiswahili', 0),
('hy', 'Armenian', 'Հայերէն', 0),
('cs', 'Czech', 'čeština', 0),
('sk', 'Slovak', 'slovenčina', 0);

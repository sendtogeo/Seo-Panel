-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 22, 2010 at 02:21 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `seopanel.v.1.3.0`
--

-- --------------------------------------------------------

--
-- Table structure for table `backlinkresults`
--

CREATE TABLE IF NOT EXISTS `backlinkresults` (
  `website_id` int(11) NOT NULL,
  `google` int(11) NOT NULL,
  `yahoo` int(11) NOT NULL,
  `msn` int(11) NOT NULL,
  `altavista` int(11) NOT NULL,
  `alltheweb` int(11) NOT NULL,
  `result_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `backlinkresults`
--


-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `country_code` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `country_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`country_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_code`, `country_name`) VALUES
('AD', 'Andorra'),
('AE', 'United Arab Emirates'),
('AF', 'Afghanistan'),
('AG', 'Antigua and Barbuda'),
('AI', 'Anguilla'),
('AL', 'Albania'),
('AM', 'Armenia'),
('AN', 'Netherlands Antilles'),
('AO', 'Angola'),
('AP', 'Asia/Pacific Region'),
('AQ', 'Antarctica'),
('AR', 'Argentina'),
('AS', 'American Samoa'),
('AT', 'Austria'),
('AU', 'Australia'),
('AW', 'Aruba'),
('AX', 'Aland Islands'),
('AZ', 'Azerbaijan'),
('BA', 'Bosnia and Herzegovina'),
('BB', 'Barbados'),
('BD', 'Bangladesh'),
('BE', 'Belgium'),
('BF', 'Burkina Faso'),
('BG', 'Bulgaria'),
('BH', 'Bahrain'),
('BI', 'Burundi'),
('BJ', 'Benin'),
('BM', 'Bermuda'),
('BN', 'Brunei Darussalam'),
('BO', 'Bolivia'),
('BR', 'Brazil'),
('BS', 'Bahamas'),
('BT', 'Bhutan'),
('BV', 'Bouvet Island'),
('BW', 'Botswana'),
('BY', 'Belarus'),
('BZ', 'Belize'),
('CA', 'Canada'),
('CC', 'Cocos (Keeling) Islands'),
('CD', 'Congo'),
('CF', 'Central African Republic'),
('CG', 'Congo'),
('CH', 'Switzerland'),
('CI', 'Cote d''Ivoire'),
('CK', 'Cook Islands'),
('CL', 'Chile'),
('CM', 'Cameroon'),
('CN', 'China'),
('CO', 'Colombia'),
('CR', 'Costa Rica'),
('CU', 'Cuba'),
('CV', 'Cape Verde'),
('CX', 'Christmas Island'),
('CY', 'Cyprus'),
('CZ', 'Czech Republic'),
('DE', 'Germany'),
('DJ', 'Djibouti'),
('DK', 'Denmark'),
('DM', 'Dominica'),
('DO', 'Dominican Republic'),
('DZ', 'Algeria'),
('EC', 'Ecuador'),
('EE', 'Estonia'),
('EG', 'Egypt'),
('EH', 'Western Sahara'),
('ER', 'Eritrea'),
('ES', 'Spain'),
('ET', 'Ethiopia'),
('EU', 'Europe'),
('FI', 'Finland'),
('FJ', 'Fiji'),
('FK', 'Falkland Islands (Malvinas)'),
('FM', 'Micronesia Federated States of'),
('FO', 'Faroe Islands'),
('FR', 'France'),
('GA', 'Gabon'),
('GB', 'United Kingdom'),
('GD', 'Grenada'),
('GE', 'Georgia'),
('GF', 'French Guiana'),
('GG', 'Guernsey'),
('GH', 'Ghana'),
('GI', 'Gibraltar'),
('GL', 'Greenland'),
('GM', 'Gambia'),
('GN', 'Guinea'),
('GP', 'Guadeloupe'),
('GQ', 'Equatorial Guinea'),
('GR', 'Greece'),
('GS', 'South Georgia and the South Sandwich Islands'),
('GT', 'Guatemala'),
('GU', 'Guam'),
('GW', 'Guinea-Bissau'),
('GY', 'Guyana'),
('HK', 'Hong Kong'),
('HM', 'Heard Island and McDonald Islands'),
('HN', 'Honduras'),
('HR', 'Croatia'),
('HT', 'Haiti'),
('HU', 'Hungary'),
('ID', 'Indonesia'),
('IE', 'Ireland'),
('IL', 'Israel'),
('IM', 'Isle of Man'),
('IN', 'India'),
('IO', 'British Indian Ocean Territory'),
('IQ', 'Iraq'),
('IR', 'Iran Islamic Republic of'),
('IS', 'Iceland'),
('IT', 'Italy'),
('JE', 'Jersey'),
('JM', 'Jamaica'),
('JO', 'Jordan'),
('JP', 'Japan'),
('KE', 'Kenya'),
('KG', 'Kyrgyzstan'),
('KH', 'Cambodia'),
('KI', 'Kiribati'),
('KM', 'Comoros'),
('KN', 'Saint Kitts and Nevis'),
('KP', 'Korea Democratic People''s Republic of'),
('KR', 'Korea Republic of'),
('KW', 'Kuwait'),
('KY', 'Cayman Islands'),
('KZ', 'Kazakhstan'),
('LA', 'Lao People''s Democratic Republic'),
('LB', 'Lebanon'),
('LC', 'Saint Lucia'),
('LI', 'Liechtenstein'),
('LK', 'Sri Lanka'),
('LR', 'Liberia'),
('LS', 'Lesotho'),
('LT', 'Lithuania'),
('LU', 'Luxembourg'),
('LV', 'Latvia'),
('LY', 'Libyan Arab Jamahiriya'),
('MA', 'Morocco'),
('MC', 'Monaco'),
('MD', 'Moldova Republic of'),
('ME', 'Montenegro'),
('MG', 'Madagascar'),
('MH', 'Marshall Islands'),
('MK', 'Macedonia'),
('ML', 'Mali'),
('MM', 'Myanmar'),
('MN', 'Mongolia'),
('MO', 'Macao'),
('MP', 'Northern Mariana Islands'),
('MQ', 'Martinique'),
('MR', 'Mauritania'),
('MS', 'Montserrat'),
('MT', 'Malta'),
('MU', 'Mauritius'),
('MV', 'Maldives'),
('MW', 'Malawi'),
('MX', 'Mexico'),
('MY', 'Malaysia'),
('MZ', 'Mozambique'),
('NA', 'Namibia'),
('NC', 'New Caledonia'),
('NE', 'Niger'),
('NF', 'Norfolk Island'),
('NG', 'Nigeria'),
('NI', 'Nicaragua'),
('NL', 'Netherlands'),
('NO', 'Norway'),
('NP', 'Nepal'),
('NR', 'Nauru'),
('NU', 'Niue'),
('NZ', 'New Zealand'),
('OM', 'Oman'),
('PA', 'Panama'),
('PE', 'Peru'),
('PF', 'French Polynesia'),
('PG', 'Papua New Guinea'),
('PH', 'Philippines'),
('PK', 'Pakistan'),
('PL', 'Poland'),
('PM', 'Saint Pierre and Miquelon'),
('PN', 'Pitcairn'),
('PR', 'Puerto Rico'),
('PS', 'Palestinian Territory'),
('PT', 'Portugal'),
('PW', 'Palau'),
('PY', 'Paraguay'),
('QA', 'Qatar'),
('RE', 'Reunion'),
('RO', 'Romania'),
('RS', 'Serbia'),
('RU', 'Russian Federation'),
('RW', 'Rwanda'),
('SA', 'Saudi Arabia'),
('SB', 'Solomon Islands'),
('SC', 'Seychelles'),
('SD', 'Sudan'),
('SE', 'Sweden'),
('SG', 'Singapore'),
('SH', 'Saint Helena'),
('SI', 'Slovenia'),
('SJ', 'Svalbard and Jan Mayen'),
('SK', 'Slovakia'),
('SL', 'Sierra Leone'),
('SM', 'San Marino'),
('SN', 'Senegal'),
('SO', 'Somalia'),
('SR', 'Suriname'),
('ST', 'Sao Tome and Principe'),
('SV', 'El Salvador'),
('SY', 'Syrian Arab Republic'),
('SZ', 'Swaziland'),
('TC', 'Turks and Caicos Islands'),
('TD', 'Chad'),
('TF', 'French Southern Territories'),
('TG', 'Togo'),
('TH', 'Thailand'),
('TJ', 'Tajikistan'),
('TK', 'Tokelau'),
('TL', 'Timor-Leste'),
('TM', 'Turkmenistan'),
('TN', 'Tunisia'),
('TO', 'Tonga'),
('TR', 'Turkey'),
('TT', 'Trinidad and Tobago'),
('TV', 'Tuvalu'),
('TW', 'Taiwan'),
('TZ', 'Tanzania United Republic of'),
('UA', 'Ukraine'),
('UG', 'Uganda'),
('UM', 'United States Minor Outlying Islands'),
('US', 'United States'),
('UY', 'Uruguay'),
('UZ', 'Uzbekistan'),
('VA', 'Holy See (Vatican City State)'),
('VC', 'Saint Vincent and the Grenadines'),
('VE', 'Venezuela'),
('VG', 'Virgin Islands British'),
('VI', 'Virgin Islands U.S.'),
('VN', 'Vietnam'),
('VU', 'Vanuatu'),
('WF', 'Wallis and Futuna'),
('WS', 'Samoa'),
('YE', 'Yemen'),
('YT', 'Mayotte'),
('ZA', 'South Africa'),
('ZM', 'Zambia'),
('ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `directories`
--

CREATE TABLE IF NOT EXISTS `directories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `domain` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `submit_url` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `captcha_script` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT 'captcha.php',
  `search_script` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT 'index.php?q=[--keyword--]',
  `title_col` varchar(16) CHARACTER SET latin1 NOT NULL DEFAULT 'TITLE',
  `url_col` varchar(16) CHARACTER SET latin1 NOT NULL DEFAULT 'URL',
  `description_col` varchar(16) CHARACTER SET latin1 NOT NULL DEFAULT 'DESCRIPTION',
  `name_col` varchar(16) CHARACTER SET latin1 NOT NULL DEFAULT 'OWNER_NAME',
  `email_col` varchar(16) CHARACTER SET latin1 NOT NULL DEFAULT 'OWNER_EMAIL',
  `category_col` varchar(16) CHARACTER SET latin1 NOT NULL DEFAULT 'CATEGORY_ID',
  `cptcha_col` varchar(16) CHARACTER SET latin1 NOT NULL DEFAULT 'CAPTCHA',
  `imagehash_col` varchar(16) CHARACTER SET latin1 NOT NULL DEFAULT 'IMAGEHASH',
  `imagehashurl_col` varchar(16) CHARACTER SET latin1 NOT NULL DEFAULT 'imagehash',
  `extra_val` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'LINK_TYPE=normal&submit=Continue&AGREERULES=on',
  `is_captcha` tinyint(1) NOT NULL DEFAULT '0',
  `working` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=454 ;

--
-- Dumping data for table `directories`
--

INSERT INTO `directories` (`id`, `domain`, `submit_url`, `captcha_script`, `search_script`, `title_col`, `url_col`, `description_col`, `name_col`, `email_col`, `category_col`, `cptcha_col`, `imagehash_col`, `imagehashurl_col`, `extra_val`, `is_captcha`, `working`) VALUES
(1, 'http://directory.seofreetools.net', 'http://directory.seofreetools.net/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(2, 'http://www.fat64.net', 'http://www.fat64.net/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(3, 'http://www.onpaco.com', 'http://www.onpaco.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(4, 'http://www.bluefootbuys.com', 'http://www.bluefootbuys.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 0),
(5, 'http://www.777media.com', 'http://www.777media.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(6, 'http://www.freewebsitedirectory.com', 'http://www.freewebsitedirectory.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(7, 'http://www.mygreencorner.com', 'http://www.mygreencorner.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(8, 'http://www.webhotlink.com', 'http://www.webhotlink.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(9, 'http://www.skypemedia.com', 'http://www.skypemedia.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(10, 'http://www.directoryvault.com', 'http://www.directoryvault.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(11, 'http://www.pop-net.org', 'http://www.pop-net.org/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(12, 'http://www.123hitlinks.info', 'http://www.123hitlinks.info/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(13, 'http://www.pr3plus.com', 'http://www.pr3plus.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(14, 'http://www.tfwd.org', 'http://www.tfwd.org/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(15, 'http://www.ewebdir.com', 'http://www.ewebdir.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(16, 'http://www.cheapdirectory.net', 'http://www.cheapdirectory.net/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 0),
(17, 'http://www.alistsites.com', 'http://www.alistsites.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(18, 'http://www.miriblack.com', 'http://www.miriblack.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(19, 'http://www.domaining.in', 'http://www.domaining.in/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(20, 'http://www.sanory.com', 'http://www.sanory.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(21, 'http://www.aaawebdirectory.com', 'http://www.aaawebdirectory.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(22, 'http://www.pblake.com', 'http://www.pblake.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(23, 'http://www.1abc.org', 'http://www.1abc.org/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(24, 'http://www.therobot.info', 'http://www.therobot.info/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(25, 'http://www.yvir.com', 'http://www.yvir.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(26, 'http://www.triplewdirectory.com', 'http://www.triplewdirectory.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(27, 'http://www.linkedout.info', 'http://www.linkedout.info/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(28, 'http://www.seocourt.com', 'http://www.seocourt.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(29, 'http://www.placeyourlinks.com', 'http://www.placeyourlinks.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(30, 'http://www.clickmybrick.com', 'http://www.clickmybrick.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(31, 'http://directory.allaboutadtips.com', 'http://directory.allaboutadtips.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(32, 'http://directory.seoexecutive.com', 'http://directory.seoexecutive.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(33, 'http://www.hitalyzer.com', 'http://www.hitalyzer.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(34, 'http://www.linkspremium.com', 'http://www.linkspremium.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(35, 'http://www.crazyleafdesign.com/webdirectory', 'http://www.crazyleafdesign.com/webdirectory/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(36, 'http://www.generalwebdirectory.info', 'http://www.generalwebdirectory.info/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(37, 'http://www.freelistingdirectory.info', 'http://www.freelistingdirectory.info/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 0),
(38, 'http://www.webdirectory1.info', 'http://www.webdirectory1.info/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 0),
(39, 'http://www.nuclearland.com', 'http://www.nuclearland.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(40, 'http://www.webslink.info', 'http://www.webslink.info/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(41, 'http://www.omega-link.co.uk', 'http://www.omega-link.co.uk/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(42, 'http://www.indiabusinessdirectory.info', 'http://www.indiabusinessdirectory.info/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 0),
(43, 'http://www.gainweb.org', 'http://www.gainweb.org/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(44, 'http://www.goobz.biz', 'http://www.goobz.biz/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(45, 'http://www.magdalyns.com', 'http://www.magdalyns.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(46, 'http://www.directorybin.com', 'http://www.directorybin.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(47, 'http://www.deblinley.com', 'http://www.deblinley.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 0),
(48, 'http://www.jhucr.org', 'http://www.jhucr.org/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(49, 'http://www.boomdirectory.com', 'http://www.boomdirectory.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 0),
(50, 'http://www.doubledirectory.com', 'http://www.doubledirectory.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(51, 'http://www.lutonengineering.com', 'http://www.lutonengineering.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(52, 'http://www.sblinks.org', 'http://www.sblinks.org/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(53, 'http://www.mymaxlinks.org', 'http://www.mymaxlinks.org/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(54, 'http://www.holidaydig.com', 'http://www.holidaydig.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(55, 'http://www.yrkdirectory.com', 'http://www.yrkdirectory.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(56, 'http://www.addyourlnksnow.com', 'http://www.addyourlnksnow.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(57, 'http://www.submitsitenow.info', 'http://www.submitsitenow.info/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(58, 'http://www.directoryrank.net', 'http://www.directoryrank.net/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(59, 'http://www.webdiro.com', 'http://www.webdiro.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(60, 'http://www.aokdirectory.com', 'http://www.aokdirectory.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(61, 'http://www.tkdirectory.com', 'http://www.tkdirectory.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(62, 'http://www.jambezi.com', 'http://www.jambezi.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(63, 'http://www.greatdir.net', 'http://www.greatdir.net/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(64, 'http://www.insectuniverse.com', 'http://www.insectuniverse.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(65, 'http://www.gkiv.com', 'http://www.gkiv.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 0),
(66, 'http://www.haqj.com', 'http://www.haqj.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(67, 'http://www.owdirectory.com', 'http://www.owdirectory.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(68, 'http://www.picna.com', 'http://www.picna.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(69, 'http://www.w4directory.com', 'http://www.w4directory.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(70, 'http://www.towerpromote.com', 'http://www.towerpromote.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(71, 'http://www.increasedirectory.com', 'http://www.increasedirectory.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(72, 'http://www.thelivinglink.net', 'http://www.thelivinglink.net/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(73, 'http://www.mytopdirectory.info', 'http://www.mytopdirectory.info/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(74, 'http://www.seoname.com', 'http://www.seoname.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(75, 'http://www.businesssitesonthenet.co.uk', 'http://www.businesssitesonthenet.co.uk/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(76, 'http://www.counterdeal.com', 'http://www.counterdeal.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(77, 'http://www.mymaxlinks.info', 'http://www.mymaxlinks.info/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(78, 'http://www.prolificpi.com', 'http://www.prolificpi.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(79, 'http://www.migliana.com', 'http://www.migliana.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(80, 'http://www.tuenschel.com', 'http://www.tuenschel.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(81, 'http://www.hrce.com', 'http://www.hrce.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(82, 'http://www.lemurgene.com', 'http://www.lemurgene.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(83, 'http://www.biowatchmed.net', 'http://www.biowatchmed.net/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(84, 'http://www.gfxmedia.us', 'http://www.gfxmedia.us/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(85, 'http://www.ns8.biz', 'http://www.ns8.biz/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(86, 'http://www.coolwebsitelistings.com', 'http://www.coolwebsitelistings.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(87, 'http://www.freewd.org', 'http://www.freewd.org/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 0),
(88, 'http://www.agrieducation.org', 'http://www.agrieducation.org/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(89, 'http://www.liveurls.net', 'http://www.liveurls.net/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(90, 'http://www.zzdirectory.com', 'http://www.zzdirectory.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(91, 'http://www.homessearchengine.com', 'http://www.homessearchengine.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(92, 'http://www.teacherslounge.info', 'http://www.teacherslounge.info/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(93, 'http://www.yournetdirectory.com', 'http://www.yournetdirectory.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(94, 'http://z0p.com', 'http://z0p.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(95, 'http://www.babelea.org', 'http://www.babelea.org/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(96, 'http://www.etup.org', 'http://www.etup.org/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(97, 'http://www.ggfb.org', 'http://www.ggfb.org/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(98, 'http://www.jordangreen.info', 'http://www.jordangreen.info/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(99, 'http://www.linkfly.info', 'http://www.linkfly.info/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(100, 'http://www.thehdb.com', 'http://www.thehdb.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 0),
(101, 'http://www.zerotres.com', 'http://www.zerotres.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(102, 'http://www.anyweblist.com', 'http://www.anyweblist.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(103, 'http://www.cheapwebdir.com', 'http://www.cheapwebdir.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(104, 'http://www.directoryfreelink.com', 'http://www.directoryfreelink.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 0),
(105, 'http://www.directoryseofriendly.com', 'http://www.directoryseofriendly.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(106, 'http://www.freeonlineindex.com', 'http://www.freeonlineindex.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 0),
(107, 'http://www.freeweblist.info', 'http://www.freeweblist.info/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 0),
(108, 'http://www.generalnetdirectory.com', 'http://www.generalnetdirectory.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(109, 'http://www.heydirectory.com', 'http://www.heydirectory.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(110, 'http://www.inlinkdirectory.com', 'http://www.inlinkdirectory.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(111, 'http://www.monsterlinkdirectory.com', 'http://www.monsterlinkdirectory.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(112, 'http://www.netdirectorylink.com', 'http://www.netdirectorylink.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(113, 'http://www.searchpowertour.com', 'http://www.searchpowertour.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(114, 'http://www.seolistsite.com', 'http://www.seolistsite.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(115, 'http://www.urlvault.info', 'http://www.urlvault.info/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(116, 'http://www.websitelists.info', 'http://www.websitelists.info/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(117, 'http://www.worldurllink.com', 'http://www.worldurllink.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(118, 'http://www.netwerker.com', 'http://www.netwerker.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(119, 'http://www.netnamesindex.com', 'http://www.netnamesindex.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(120, 'http://www.edirectori.com', 'http://www.edirectori.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(121, 'http://www.stepmind.com', 'http://www.stepmind.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(122, 'http://www.devdir.biz', 'http://www.devdir.biz/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(123, 'http://www.findinfo.ws', 'http://www.findinfo.ws/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(124, 'http://www.vccllc.com', 'http://www.vccllc.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(125, 'http://www.freeonlineregister.com', 'http://www.freeonlineregister.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(126, 'http://www.thecommercialdirectory.com', 'http://www.thecommercialdirectory.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(127, 'http://www.visuallinkdirectory.com', 'http://www.visuallinkdirectory.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(128, 'http://directorywind.com', 'http://directorywind.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(129, 'http://www.directorydr.com', 'http://www.directorydr.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(130, 'http://www.seodir.eu', 'http://www.seodir.eu/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(131, 'http://www.corporategoof.com', 'http://www.corporategoof.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(132, 'http://www.easyadsworld.com', 'http://www.easyadsworld.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 0),
(133, 'http://www.lexormedia.com', 'http://www.lexormedia.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(134, 'http://www.minidirectory.info', 'http://www.minidirectory.info/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(135, 'http://www.extreme-directory.net', 'http://www.extreme-directory.net/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(136, 'http://www.faceahead.com', 'http://www.faceahead.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(137, 'http://www.firstfindengine.com', 'http://www.firstfindengine.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(138, 'http://www.go2directory.info', 'http://www.go2directory.info/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(139, 'http://www.interactive-directory.com', 'http://www.interactive-directory.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(140, 'http://www.w3c-software.com', 'http://www.w3c-software.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(141, 'http://www.wishdc.org', 'http://www.wishdc.org/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(142, 'http://www.westcelt.org', 'http://www.westcelt.org/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(143, 'http://www.webdirectorybook.com', 'http://www.webdirectorybook.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(144, 'http://www.oroop.com', 'http://www.oroop.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 0),
(145, 'http://www.listasweb.info', 'http://www.listasweb.info/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(146, 'http://www.sblinks.info', 'http://www.sblinks.info/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 0),
(147, 'http://www.thehopedirectory.com', 'http://www.thehopedirectory.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(148, 'http://www.clocktowerstudio.com', 'http://www.clocktowerstudio.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(149, 'http://www.infotechwv.com', 'http://www.infotechwv.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(150, 'http://www.dawsoneng.com', 'http://www.dawsoneng.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(151, 'http://www.cafrid.com', 'http://www.cafrid.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(152, 'http://www.fusionsalcedo.com', 'http://www.fusionsalcedo.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(153, 'http://www.justaskluke.com', 'http://www.justaskluke.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1),
(154, 'http://www.logha.com', 'http://www.logha.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(155, 'http://www.pacdec.org', 'http://www.pacdec.org/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 0),
(156, 'http://www.sitechakra.com', 'http://www.sitechakra.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(157, 'http://www.webbacklinks.com', 'http://www.webbacklinks.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 0),
(158, 'http://www.searchnsearch.com', 'http://www.searchnsearch.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(159, 'http://www.interwebindex.com', 'http://www.interwebindex.com/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 1, 1),
(160, 'http://www.o53.net', 'http://www.o53.net/submit.php', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'LINK_TYPE=normal&submit=Continue&AGREERULES=on', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dirsubmitinfo`
--

CREATE TABLE IF NOT EXISTS `dirsubmitinfo` (
  `id` bigint(24) unsigned NOT NULL AUTO_INCREMENT,
  `website_id` int(11) unsigned NOT NULL,
  `directory_id` int(11) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `submit_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `dirsubmitinfo`
--


-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE IF NOT EXISTS `keywords` (
  `id` bigint(24) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang_code` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_code` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website_id` int(11) DEFAULT NULL,
  `searchengines` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `keywords`
--


-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `lang_code` varchar(8) CHARACTER SET latin1 NOT NULL,
  `lang_name` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`lang_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`lang_code`, `lang_name`) VALUES
('en', 'English'),
('de', 'German'),
('fr', 'French'),
('it', 'Italian'),
('es', 'Spanish'),
('pl', 'Polish'),
('ru', 'Russian'),
('hi', 'Hindi'),
('ar', 'Arabic'),
('pt', 'Portuguese'),
('sv', 'Swedish'),
('no', 'Norwegian'),
('da', 'Danish'),
('fi', 'Finnish'),
('hu', 'Hungarian'),
('nl', 'Dutch'),
('sr', 'Serbian'),
('bg', 'Bulgarian'),
('uk', 'Ukrainian'),
('el', 'Greek'),
('he', 'Hebrew'),
('ko', 'Korean'),
('zh', 'Chinese'),
('ja', 'Japanese'),
('tl', 'Tagalog'),
('id', 'Indonesian'),
('fa', 'Farsi'),
('th', 'Thai'),
('ro', 'Romanian'),
('tr', 'Turkish'),
('hr', 'Croatian'),
('mk', 'Macedonian'),
('bs', 'Bosnian'),
('sq', 'Albanian'),
('sw', 'Swahili'),
('hy', 'Armenian'),
('cs', 'Czech'),
('sk', 'Slovak');

-- --------------------------------------------------------

--
-- Table structure for table `rankresults`
--

CREATE TABLE IF NOT EXISTS `rankresults` (
  `website_id` int(11) NOT NULL,
  `google_pagerank` int(8) NOT NULL,
  `alexa_rank` int(11) NOT NULL,
  `result_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rankresults`
--


-- --------------------------------------------------------

--
-- Table structure for table `saturationresults`
--

CREATE TABLE IF NOT EXISTS `saturationresults` (
  `website_id` int(11) NOT NULL,
  `google` int(11) NOT NULL,
  `yahoo` int(11) NOT NULL,
  `msn` int(11) NOT NULL,
  `result_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `saturationresults`
--


-- --------------------------------------------------------

--
-- Table structure for table `searchengines`
--

CREATE TABLE IF NOT EXISTS `searchengines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domain` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cookie_send` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_of_results_page` int(8) DEFAULT NULL,
  `start` int(11) NOT NULL DEFAULT '0',
  `max_results` int(11) NOT NULL DEFAULT '100',
  `regex` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_index` int(11) NOT NULL DEFAULT '1',
  `title_index` int(11) NOT NULL DEFAULT '2',
  `description_index` int(11) NOT NULL DEFAULT '3',
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `searchengines`
--

INSERT INTO `searchengines` (`id`, `domain`, `url`, `cookie_send`, `no_of_results_page`, `start`, `max_results`, `regex`, `url_index`, `title_index`, `description_index`, `status`) VALUES
(1, 'www.google.com', 'http://www.google.com/search?hl=[--lang--]&num=[--num--]&q=[--keyword--]&start=[--start--]&cr=country[--country--]', '', 100, 0, 100, '<li.*?class=g.*?<a.*?href="(.*?)".*?>(.*?)<\\/a>.*?<div.*?>(.*?)<cite>', 1, 2, 3, 1),
(2, 'www.yahoo.com', 'http://search.yahoo.com/search?p=[--keyword--]&n=[--num--]&b=[--start--]&vl=lang_[--lang--]&fl=1&v=1&vc=[--country--]', '', 100, 1, 100, '<li.*?<h3><a.*?>(.*?)<\\/a><\\/h3>.*?<div.*?>(.*?)<\\/div><span.*?>(.*?)<\\/span>', 3, 1, 2, 1),
(3, 'www.msn.com', 'http://www.bing.com/search?q=[--keyword--]&scope=web&first=[--start--]&setmkt=[--lang--]-[--country--]', 'SRCHHPGUSR=NEWWND=0&NRSLT=50&SRCHLANG=[--lang--]', 50, 1, 100, '<li.*?<h3><a.*?href="(.*?)".*?>(.*?)<\\/a><\\/h3>.*?<p.*?>(.*?)<\\/p>', 1, 2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `searchresultdetails`
--

CREATE TABLE IF NOT EXISTS `searchresultdetails` (
  `searchresult_id` bigint(24) unsigned DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `searchresultdetails`
--


-- --------------------------------------------------------

--
-- Table structure for table `searchresults`
--

CREATE TABLE IF NOT EXISTS `searchresults` (
  `id` bigint(24) unsigned NOT NULL AUTO_INCREMENT,
  `keyword_id` int(16) DEFAULT NULL,
  `searchengine_id` int(11) DEFAULT NULL,
  `rank` int(8) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `searchresults`
--


-- --------------------------------------------------------

--
-- Table structure for table `seoplugins`
--

CREATE TABLE IF NOT EXISTS `seoplugins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `version` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `installed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `seoplugins`
--

INSERT INTO `seoplugins` (`id`, `label`, `name`, `author`, `description`, `version`, `website`, `status`, `installed`) VALUES
(1, 'Meta Tag Generator', 'MetaTagGenerator', 'Geo Varghese', 'Meta Tag Generator', '1.0.0', 'http://www.seopanel.in/plugins/', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `seotools`
--

CREATE TABLE IF NOT EXISTS `seotools` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_section` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_access` tinyint(1) NOT NULL DEFAULT '1',
  `reportgen` tinyint(1) NOT NULL DEFAULT '1',
  `cron` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `seotools`
--

INSERT INTO `seotools` (`id`, `name`, `url_section`, `user_access`, `reportgen`, `cron`, `status`) VALUES
(1, 'Keyword Position Checker', 'keyword-position-checker', 1, 1, 1, 1),
(2, 'Sitemap Generator', 'sitemap-generator', 1, 0, 0, 1),
(3, 'Rank Checker', 'rank-checker', 1, 1, 1, 1),
(4, 'Backlinks Checker', 'backlink-checker', 1, 1, 1, 1),
(5, 'Directory Submission', 'directory-submission', 1, 0, 0, 1),
(6, 'Search Engine Saturation', 'saturation-checker', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `set_label` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `set_name` varchar(64) CHARACTER SET latin1 NOT NULL,
  `set_val` text COLLATE utf8_unicode_ci NOT NULL,
  `set_type` enum('small','bool','medium','large','text') CHARACTER SET latin1 DEFAULT 'small',
  PRIMARY KEY (`id`),
  UNIQUE KEY `set_name` (`set_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `set_label`, `set_name`, `set_val`, `set_type`) VALUES
(1, 'Seo Panel Title', 'SP_TITLE', 'Seo Panel: World\\''s first seo control panel for multiple web sites', 'large'),
(2, 'Seo Panel Description', 'SP_DESCRIPTION', 'A complete free control panel for managing search engine optimization of your websites. It containing lots of hot seo tools to increase and track the performace your websites. Its an open source software and also you can develop your own seo plugins for seo panel.', 'text'),
(3, 'Seo Panel Keywords', 'SP_KEYWORDS', 'Seo Panel,seo control panel,search engine optimization panel,seo tools kit,keyword rank checker,google pagerank checker,alexa rank checker,sitemap generator,meta tag generator,back link checker,Website Submission tool', 'text'),
(4, 'Number of entries per page', 'SP_PAGINGNO', '10', 'small'),
(5, 'Delay between each spider crawl(seconds)', 'SP_CRAWL_DELAY', '2', 'small'),
(6, 'Allow user to generate reports', 'SP_USER_GEN_REPORT', '0', 'bool'),
(7, 'Image hotlink protection enabled', 'SP_HOTLINKING', '0', 'bool'),
(8, 'User registration interface', 'SP_USER_REGISTRATION', '1', 'bool');

-- --------------------------------------------------------

--
-- Table structure for table `skipdirectories`
--

CREATE TABLE IF NOT EXISTS `skipdirectories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `website_id` int(11) NOT NULL,
  `directory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `website_id` (`website_id`,`directory_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `skipdirectories`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utype_id` int(11) DEFAULT NULL,
  `username` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `utype_id`, `username`, `password`, `first_name`, `last_name`, `email`, `created`, `status`) VALUES
(1, 1, 'spadmin', 'a4d312c461703c46a56b1bdcda9b5cdc', 'Seo Panel', 'Admin', 'sendtogeo@gmail.com', 1270708599, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE IF NOT EXISTS `usertypes` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`id`, `user_type`, `description`) VALUES
(1, 'admin', 'Super User'),
(2, 'user', 'Normal User');

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE IF NOT EXISTS `websites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner_email` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title3` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title4` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title5` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description2` text COLLATE utf8_unicode_ci,
  `description3` text COLLATE utf8_unicode_ci,
  `description4` text COLLATE utf8_unicode_ci,
  `description5` text COLLATE utf8_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `websites`
--


--
--This file includes the database changes of Seo Panel version from 1.2.0 to 2.0.2
--

--
-- Table structure for table `saturationresults`
--

CREATE TABLE IF NOT EXISTS `saturationresults` (
  `website_id` int(11) NOT NULL,
  `google` int(11) NOT NULL,
  `yahoo` int(11) NOT NULL,
  `msn` int(11) NOT NULL,
  `result_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


--
-- Table structure for table `seotools`
--

DROP TABLE IF EXISTS `seotools`;
CREATE TABLE IF NOT EXISTS `seotools` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `url_section` varchar(100) NOT NULL,
  `user_access` tinyint(1) NOT NULL DEFAULT '1',
  `reportgen` tinyint(1) NOT NULL DEFAULT '1',
  `cron` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

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


--
-- New column for users table
--
ALTER TABLE `users` ADD `created` INT( 11 ) NOT NULL AFTER `email`;
Update `users` set created=UNIX_TIMESTAMP() WHERE created=0;


--
-- New column for Seo Plugins table
--
ALTER TABLE `seoplugins` ADD `author` VARCHAR( 64 ) NOT NULL AFTER `name` ,
ADD `description` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER `author` ,
ADD `version` VARCHAR( 8 ) NOT NULL AFTER `description` ,
ADD `website` VARCHAR( 255 ) NOT NULL AFTER `version`;


--
-- New column for Directory table
-- 
ALTER TABLE `directories` ADD `is_captcha` BOOL NOT NULL DEFAULT '0' AFTER `extra_val`;


--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `set_label` varchar(64) NOT NULL,
  `set_name` varchar(64) NOT NULL,
  `set_val` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `set_type` enum('small','bool','medium','large','text') DEFAULT 'small',
  PRIMARY KEY (`id`),
  UNIQUE KEY `set_name` (`set_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `set_label`, `set_name`, `set_val`, `set_type`) VALUES
(1, 'Seo Panel Title', 'SP_TITLE', 'Seo Panel: World\'s first seo control panel for multiple web sites', 'large'),
(2, 'Seo Panel Description', 'SP_DESCRIPTION', 'A complete free control panel for managing search engine optimization of your websites. It containing lots of hot seo tools to increase and track the performace your websites. Its an open source software and also you can develop your own seo plugins for seo panel.', 'text'),
(3, 'Seo Panel Keywords', 'SP_KEYWORDS', 'Seo Panel,seo control panel,search engine optimization panel,seo tools kit,keyword rank checker,google pagerank checker,alexa rank checker,sitemap generator,meta tag generator,back link checker,Website Submission tool', 'text'),
(4, 'Number of entries per page', 'SP_PAGINGNO', '10', 'small'),
(5, 'Delay between each spider crawl(seconds)', 'SP_CRAWL_DELAY', '2', 'small'),
(6, 'Allow user to generate reports', 'SP_USER_GEN_REPORT', '0', 'bool'),
(7, 'Image hotlink protection enabled', 'SP_HOTLINKING', '0', 'bool'),
(8, 'User registration interface', 'SP_USER_REGISTRATION', '1', 'bool');


--
-- random title and description to websites table
--
ALTER TABLE `websites` ADD `title2` VARCHAR( 100 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER `keywords` ,
ADD `title3` VARCHAR( 100 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER `title2` ,
ADD `title4` VARCHAR( 100 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER `title3` ,
ADD `title5` VARCHAR( 100 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER `title4` ,
ADD `description2` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER `title5` ,
ADD `description3` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER `description2` ,
ADD `description4` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER `description3` ,
ADD `description5` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER `description4`;

--
-- Table structure for table `skipdirectories`
--

CREATE TABLE IF NOT EXISTS `skipdirectories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `website_id` int(11) NOT NULL,
  `directory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `website_id` (`website_id`,`directory_id`)
);

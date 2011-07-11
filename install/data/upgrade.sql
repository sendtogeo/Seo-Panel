--
-- Table structure for table `keywordcrontracker`
--

CREATE TABLE IF NOT EXISTS `keywordcrontracker` (
  `keyword_id` int(16) DEFAULT NULL,
  `searchengine_id` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  KEY `keyword_id` (`keyword_id`),
  KEY `searchengine_id` (`searchengine_id`),
  KEY `time` (`time`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


--
-- To save reciprocal url under website 
--
ALTER TABLE `websites` ADD `reciprocal_url` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL AFTER `description5`; 


--
-- Table structure for table `di_directory_meta`
--

DROP TABLE IF EXISTS `di_directory_meta`;
CREATE TABLE IF NOT EXISTS `di_directory_meta` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
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
  `reciprocal_col` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'RECPR_URL',
  `extra_val` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'LINK_TYPE=normal&submit=Continue&AGREERULES=on',
  `link_type_col` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'LINK_TYPE',
  `normal` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'normal',
  `free` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'free',
  `reciprocal` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'reciprocal',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `di_directory_meta`
--

INSERT INTO `di_directory_meta` (`id`, `name`, `captcha_script`, `search_script`, `title_col`, `url_col`, `description_col`, `name_col`, `email_col`, `category_col`, `cptcha_col`, `imagehash_col`, `imagehashurl_col`, `reciprocal_col`, `extra_val`, `link_type_col`, `normal`, `free`, `reciprocal`, `status`) VALUES
(1, 'phpLD', 'captcha.php', 'index.php?q=[--keyword--]', 'TITLE', 'URL', 'DESCRIPTION', 'OWNER_NAME', 'OWNER_EMAIL', 'CATEGORY_ID', 'CAPTCHA', 'IMAGEHASH', 'imagehash', 'RECPR_URL', 'LINK_TYPE=[--type--]&submit=Continue&AGREERULES=on', 'LINK_TYPE', 'normal', 'free', 'reciprocal', 1);


--
-- Changes to directories table for adding reciprocal links
--
ALTER TABLE `directories` ADD `script_type_id` INT( 11 ) NOT NULL DEFAULT '1';

ALTER TABLE `directories` ADD `reciprocal_col` VARCHAR( 16 ) NOT NULL DEFAULT 'RECPR_URL' AFTER `imagehashurl_col`;


--
-- Table structure for table `seotools`
--

DROP TABLE IF EXISTS `seotools`;
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
(2, 'Site Auditor', 'site-auditor', 1, 1, 0, 1),
(3, 'Rank Checker', 'rank-checker', 1, 1, 1, 1),
(4, 'Backlinks Checker', 'backlink-checker', 1, 1, 1, 1),
(5, 'Directory Submission', 'directory-submission', 1, 1, 0, 1),
(6, 'Search Engine Saturation', 'saturation-checker', 1, 1, 1, 1);


--
-- To remove some unwanted values from system settings interface
--
ALTER TABLE `settings` ADD `display` BOOL NOT NULL DEFAULT '1';
ALTER TABLE `settings` ADD `set_category` VARCHAR( 32 ) NOT NULL DEFAULT 'system' AFTER `set_val`; 
UPDATE `settings` SET `display` = '0' WHERE `settings`.`id` =7;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`set_label`, `set_name`, `set_val`, `set_category`, `set_type`, `display`) VALUES
('Maximum number of pages allowed per website', 'SA_MAX_NO_PAGES', '500', 'siteauditor', 'small', 1),
('Site auditor crawl delay', 'SA_CRAWL_DELAY_TIME', '20', 'siteauditor', 'small', 1),
('Maximum length of page title', 'SA_TITLE_MAX_LENGTH', '80', 'siteauditor', 'small', 0),
('Minimum length of page title', 'SA_TITLE_MIN_LENGTH', '50', 'siteauditor', 'small', 0),
('Maximum length of meta description', 'SA_DES_MAX_LENGTH', '200', 'siteauditor', 'small', 0),
('Minimumlength of meta description', 'SA_DES_MIN_LENGTH', '120', 'siteauditor', 'small', 0),
('Maximum length of meta keywords', 'SA_KEY_MAX_LENGTH', '200', 'siteauditor', 'small', 0),
('Minimumlength of meta keyword', 'SA_KEY_MIN_LENGTH', '80', 'siteauditor', 'small', 0),
('Google pagerank check level first', 'SA_PR_CHECK_LEVEL_FIRST', '3', 'siteauditor', 'small', 0),
('Backlinks check level', 'SA_BL_CHECK_LEVEL', '25', 'siteauditor', 'small', 0),
('Google pagerank check level second', 'SA_PR_CHECK_LEVEL_SECOND', '6', 'siteauditor', 'small', 0),
('Maximum links in a page', 'SA_TOTAL_LINKS_MAX', '50', 'siteauditor', 'small', 0);


--
-- To fix the issues with google parsing
--
ALTER TABLE `searchengines` ADD `from_pattern` VARCHAR( 64 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL AFTER `regex`;
ALTER TABLE `searchengines` ADD `to_pattern` VARCHAR( 64 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL AFTER `from_pattern`;
update searchengines set from_pattern='<div id="ires">',to_pattern='<\\/ol>' where  url LIKE '%google%';

--
-- To fix yahoo search engine url issue
--
update searchengines set regex='<li.*?<h3><a.*?\\*\\*(.*?)".*?>(.*?)<\\/a><\\/h3>.*?<div.*?>(.*?)<\\/div>.*?<\\/span>',url_index=1,title_index=2,description_index=3 where url LIKE '%yahoo%';

--
-- Changes for search engine like yandex 
--
ALTER TABLE searchengines ADD `start_offset` INT( 8 ) NOT NULL DEFAULT '0' AFTER `start`;
UPDATE `searchengines` SET `start_offset` = `no_of_results_page`;

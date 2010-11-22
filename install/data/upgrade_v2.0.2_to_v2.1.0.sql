--
-- This section includes the database changes of Seo Panel version from 2.0.0 to 2.1.0
--

--
-- To add proxy settings to settings table
--

INSERT INTO `settings` (`id`, `set_label`, `set_name`, `set_val`, `set_type`) VALUES
(9, 'Enable Proxy', 'SP_ENABLE_PROXY', '0', 'bool');

INSERT INTO `settings` (`id`, `set_label`, `set_name`, `set_val`, `set_type`) VALUES (NULL, 'Default Language', 'SP_DEFAULTLANG', 'en', 'small');

--
-- Table structure for table `proxylist`
--

CREATE TABLE IF NOT EXISTS `proxylist` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `proxy` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `port` int(8) DEFAULT NULL,
  `proxy_auth` tinyint(1) NOT NULL DEFAULT '0',
  `proxy_username` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proxy_password` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

--
-- alter search engine table for storing non utf8 search engines
--

ALTER TABLE `searchengines` ADD `encoding` VARCHAR( 32 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL AFTER `description_index`;

--
-- Alter user table to add lang_code
--
ALTER TABLE `users` ADD `lang_code` VARCHAR( 8 ) NOT NULL DEFAULT 'en' AFTER `email`;

--
-- Alter directroy table
--
ALTER TABLE `directories` ADD `google_pagerank` SMALLINT NOT NULL DEFAULT '0',
ADD `alexa_rank` INT( 11 ) NOT NULL DEFAULT '-1',
ADD `lang_code` VARCHAR( 8 ) NOT NULL DEFAULT 'en',
ADD `checked` BOOL NOT NULL DEFAULT '0';

ALTER TABLE `directories` ADD UNIQUE (
`submit_url`
);

--
-- to enable image saving for captcha
--
UPDATE `settings` SET `set_val` = '1' WHERE `settings`.`id` =7;

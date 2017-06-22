--
-- Seo Panel 3.11.0 changes
--

update `settings` set set_val='3.11.0' WHERE `set_name` LIKE 'SP_VERSION_NUMBER';

ALTER TABLE `keywords` ADD `crawled` TINYINT( 1 ) NOT NULL DEFAULT '0';

ALTER TABLE `websites` ADD `crawled` TINYINT( 1 ) NOT NULL DEFAULT '0';


ALTER TABLE `rankresults` ADD `result_date` DATE NULL , ADD INDEX ( `result_date` );
UPDATE `rankresults` SET `result_date` = FROM_UNIXTIME(result_time, '%Y-%m-%d');


ALTER TABLE `backlinkresults` ADD `result_date` DATE NULL , ADD INDEX ( `result_date` );
UPDATE `backlinkresults` SET `result_date` = FROM_UNIXTIME(result_time, '%Y-%m-%d');

ALTER TABLE `saturationresults` ADD `result_date` DATE NULL , ADD INDEX ( `result_date` );
UPDATE `saturationresults` SET `result_date` = FROM_UNIXTIME(result_time, '%Y-%m-%d');

INSERT INTO `settings` (`set_label`, `set_name`, `set_val`, `set_category`, `set_type`, `display`)  
VALUES ('Google API Key', 'SP_GOOGLE_API_KEY', '', 'google', 'large', '1');

INSERT INTO `seotools` (`name`, `url_section`, `user_access`, `reportgen`, `cron`, `status`) 
VALUES ('PageSpeed Insights', 'pagespeed', '1', '1', '1', '1');


CREATE TABLE IF NOT EXISTS `pagespeedresults` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `website_id` int(11) NOT NULL,
  `desktop_speed_score` smallint(6) NOT NULL,
  `mobile_speed_score` smallint(6) NOT NULL,
  `mobile_usability_score` smallint(6) NOT NULL,
  `result_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `result_date` (`result_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


INSERT INTO `texts` (`lang_code`, `category`, `label`, `content`) VALUES
('en', 'panel', 'Google Settings', 'Google Settings');

INSERT INTO `texts` (`lang_code`, `category`, `label`, `content`) VALUES
('en', 'settings', 'SP_GOOGLE_API_KEY', 'Google API Key');

INSERT INTO `texts` (`lang_code`, `category`, `label`, `content`) VALUES
('en', 'settings', 'click-to-get-google-api-key', 'Click here to get Google API Key');

INSERT INTO `texts` (`lang_code`, `category`, `label`, `content`) VALUES
('en', 'seotools', 'pagespeed', 'PageSpeed Insights');

INSERT INTO `texts` (`lang_code`, `category`, `label`, `content`) VALUES
('en', 'seotools', 'Quick PageSpeed Checker', 'Quick PageSpeed Checker');

INSERT INTO `texts` (`lang_code`, `category`, `label`, `content`) VALUES
('en', 'seotools', 'PageSpeed Reports', 'PageSpeed Reports');

INSERT INTO `texts` (`lang_code`, `category`, `label`, `content`) VALUES
('en', 'seotools', 'Generate Reports', 'Generate Reports');

INSERT INTO `texts` (`lang_code`, `category`, `label`, `content`) 
VALUES ('en', 'seotools', 'clickproceedaction', 'Enter URL''s <b>One per line</b>. Click on <b>Proceed</b> to check Results.');


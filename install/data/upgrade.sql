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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `pagespeeddetails` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `website_id` int(11) NOT NULL,
  `desktop_score_details` text NOT NULL,
  `mobile_score_details` text NOT NULL,
  `result_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `result_date` (`result_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

INSERT INTO `settings` (`set_label`, `set_name`, `set_val`, `set_category`, `set_type`, `display`) VALUES
('Number of websites needs to be checked in each cron execution', 'SP_NUMBER_WEBSITES_CRON', '1', 'report', 'small', 0);

update `settings` set set_val='1',display=0 WHERE `set_name` LIKE 'SP_NUMBER_KEYWORDS_CRON';


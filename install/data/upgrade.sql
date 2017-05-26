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

INSERT INTO `texts` (`lang_code`, `category`, `label`, `content`) VALUES
('en', 'panel', 'Google Settings', 'Google Settings');

INSERT INTO `texts` (`lang_code`, `category`, `label`, `content`) VALUES
('en', 'settings', 'SP_GOOGLE_API_KEY', 'Google API Key');

INSERT INTO `texts` (`lang_code`, `category`, `label`, `content`) VALUES
('en', 'settings', 'click-to-get-google-api-key', 'Click here to get Google API Key');
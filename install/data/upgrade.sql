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
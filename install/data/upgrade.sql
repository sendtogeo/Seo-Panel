--
-- Seo Panel 3.12.0 changes
--

update `settings` set set_val='3.12.0' WHERE `set_name` LIKE 'SP_VERSION_NUMBER';


ALTER TABLE `crawl_log` CHANGE `subject` `subject` VARCHAR(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL;

ALTER TABLE `auditorreports` CHANGE `page_title` `page_title` VARCHAR(180) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL;

ALTER TABLE `auditorreports` CHANGE `page_description` `page_description` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL;

ALTER TABLE `auditorreports` CHANGE `page_keywords` `page_keywords` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL;

ALTER TABLE `auditorreports` CHANGE `page_authority` `page_authority` FLOAT NOT NULL DEFAULT '0';


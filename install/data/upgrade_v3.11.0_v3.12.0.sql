--
-- Seo Panel 3.12.0 changes
--

update `settings` set set_val='3.12.0' WHERE `set_name` LIKE 'SP_VERSION_NUMBER';


ALTER TABLE `crawl_log` CHANGE `subject` `subject` VARCHAR(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL;

ALTER TABLE `crawl_log` CHANGE `crawl_cookie` `crawl_cookie` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ;

ALTER TABLE `crawl_log` CHANGE `crawl_referer` `crawl_referer` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ;

ALTER TABLE `crawl_log` CHANGE `crawl_post_fields` `crawl_post_fields` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ;

ALTER TABLE `crawl_log` CHANGE `crawl_useragent` `crawl_useragent` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL ;

ALTER TABLE `crawl_log` CHANGE `log_message` `log_message` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL ;

ALTER TABLE `crawl_log` CHANGE `proxy_id` `proxy_id` INT( 11 ) UNSIGNED NOT NULL DEFAULT '0';

ALTER TABLE `crawl_log` CHANGE `ref_id` `ref_id` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL ;


ALTER TABLE `auditorreports` CHANGE `page_title` `page_title` VARCHAR(180) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL;

ALTER TABLE `auditorreports` CHANGE `page_description` `page_description` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL;

ALTER TABLE `auditorreports` CHANGE `page_keywords` `page_keywords` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL;

ALTER TABLE `auditorreports` CHANGE `page_authority` `page_authority` FLOAT NOT NULL DEFAULT '0';


ALTER TABLE `saturationresults` CHANGE `result_time` `result_time` INT( 11 ) NOT NULL DEFAULT '0';
ALTER TABLE `backlinkresults` CHANGE `result_time` `result_time` INT( 11 ) NOT NULL DEFAULT '0';
ALTER TABLE `rankresults` CHANGE `result_time` `result_time` INT( 11 ) NOT NULL DEFAULT '0';
ALTER TABLE `rankresults` CHANGE `google_pagerank` `google_pagerank` INT( 8 ) NOT NULL DEFAULT '0';

ALTER TABLE `user_specs` ADD `spec_category` VARCHAR(32) NOT NULL DEFAULT 'system';
ALTER TABLE `user_specs` ADD UNIQUE( `user_type_id`, `spec_column`);

--
-- Seo Panel 3.16.0 changes
--

update `settings` set set_val='3.16.0' WHERE `set_name` LIKE 'SP_VERSION_NUMBER';

ALTER TABLE `crawl_log` CHANGE `crawl_link` `crawl_link` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL;

ALTER TABLE `crawl_log` CHANGE `crawl_referer` `crawl_referer` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL;

ALTER TABLE crawl_log DROP INDEX ref_id;

ALTER TABLE `crawl_log` CHANGE `ref_id` `ref_id` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL;


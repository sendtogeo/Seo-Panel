--
-- Seo Panel 3.16.0 changes
--

update `settings` set set_val='3.16.0' WHERE `set_name` LIKE 'SP_VERSION_NUMBER';

ALTER TABLE `crawl_log` CHANGE `crawl_link` `crawl_link` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL;

ALTER TABLE `crawl_log` CHANGE `crawl_referer` `crawl_referer` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL;

ALTER TABLE crawl_log DROP INDEX ref_id;

ALTER TABLE `crawl_log` CHANGE `ref_id` `ref_id` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL;


INSERT INTO `texts` (`category`, `label`, `content`) VALUES
('website', 'Sitemap successfully added to webmaster tools', 'Sitemap successfully added to webmaster tools'),
('panel', 'Submit Sitemap', 'Submit Sitemap'),
('website', 'Website successfully added to webmaster tools', 'Website successfully added to webmaster tools'),
('website', 'Successfully imported following websites', 'Successfully imported following websites'),
('website', 'Add to Webmaster Tools', 'Add to Webmaster Tools');


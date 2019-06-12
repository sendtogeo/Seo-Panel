--
-- Seo Panel 3.14.0 changes
--

update `settings` set set_val='3.14.0' WHERE `set_name` LIKE 'SP_VERSION_NUMBER';

CREATE TABLE IF NOT EXISTS `user_tokens` (
`id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `access_token` text COLLATE utf8_unicode_ci NOT NULL,
  `refresh_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token_type` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `expires_in` int(11) NOT NULL DEFAULT '3600' COMMENT 'seconds',
  `created` datetime NOT NULL,
  `token_category` enum('google','twitter','facebook','linkedin') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'google'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `user_tokens` ADD PRIMARY KEY (`id`);
ALTER TABLE `user_tokens` MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;


INSERT INTO `settings` (`set_label`, `set_name`, `set_val`, `set_category`, `set_type`, `display`) VALUES 
('Google API Client Id', 'SP_GOOGLE_API_CLIENT_ID', '', 'google', 'large', '1'),
('Google API Client Secret', 'SP_GOOGLE_API_CLIENT_SECRET', '', 'google', 'large', '1'),
('Google Analytics Tracking Code', 'SP_GOOGLE_ANALYTICS_TRACK_CODE', '', 'google', 'text', '1');

ALTER TABLE `users` ADD column `confirm_code` varchar(120) NOT NULL DEFAULT '';
ALTER TABLE `users` ADD column `confirm` tinyint(1) NOT NULL DEFAULT '0';

CREATE TABLE IF NOT EXISTS `website_search_analytics` (
`id` bigint(20) NOT NULL,
  `website_id` int(11) NOT NULL,
  `clicks` int(11) NOT NULL,
  `impressions` int(11) NOT NULL,
  `ctr` float NOT NULL,
  `average_position` float NOT NULL,
  `report_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `website_search_analytics` ADD `source` ENUM( 'google', 'yahoo', 'bing', 'baidu', 'yandex' ) NOT NULL DEFAULT 'google';
ALTER TABLE `website_search_analytics` ADD PRIMARY KEY (`id`), ADD KEY `website_id` (`website_id`);
ALTER TABLE `website_search_analytics` MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

CREATE TABLE IF NOT EXISTS `keyword_analytics` (
`id` bigint(20) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `clicks` int(11) NOT NULL,
  `impressions` int(11) NOT NULL,
  `ctr` float NOT NULL,
  `average_position` float NOT NULL,
  `report_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `keyword_analytics` ADD `source` ENUM( 'google', 'yahoo', 'bing', 'baidu', 'yandex' ) NOT NULL DEFAULT 'google';
ALTER TABLE `keyword_analytics` ADD PRIMARY KEY (`id`), ADD KEY `keyword_id` (`keyword_id`);
ALTER TABLE `keyword_analytics` MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

ALTER TABLE `usertypes` CHANGE `description` `description` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL;

ALTER TABLE `seotools` ADD `priority` INT NOT NULL DEFAULT '100' AFTER `cron` ;

UPDATE `seotools` SET `priority` = '10' WHERE url_section='keyword-position-checker';

INSERT `seotools` (`name`, `url_section` ,`user_access` ,`reportgen` ,`cron` ,`status`, `priority`)
VALUES ('Webmaster Tools', 'webmaster-tools', '1', '1', '1', '1', '20');

ALTER TABLE `seoplugins` ADD `priority` INT NOT NULL DEFAULT '100';

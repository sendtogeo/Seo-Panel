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
('Google API Key', 'SP_GOOGLE_API_CLIENT_ID', '', 'google', 'large', '1'),
('Google API Key', 'SP_GOOGLE_API_CLIENT_SECRET', '', 'google', 'large', '1');


CREATE TABLE IF NOT EXISTS `website_search_analytics` (
`id` bigint(20) NOT NULL,
  `website_id` int(11) NOT NULL,
  `clicks` int(11) NOT NULL,
  `impressions` int(11) NOT NULL,
  `ctr` float NOT NULL,
  `average_positon` float NOT NULL,
  `report_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `website_search_analytics` ADD PRIMARY KEY (`id`), ADD KEY `website_id` (`website_id`);
ALTER TABLE `website_search_analytics` MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

CREATE TABLE IF NOT EXISTS `keyword_analytics` (
`id` bigint(20) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `clicks` int(11) NOT NULL,
  `impressions` int(11) NOT NULL,
  `ctr` float NOT NULL,
  `average_positon` float NOT NULL,
  `report_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `keyword_analytics` ADD PRIMARY KEY (`id`), ADD KEY `keyword_id` (`keyword_id`);
ALTER TABLE `keyword_analytics` MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;


INSERT INTO `texts` (`lang_code`, `category`, `label`, `content`) VALUES
('en', 'settings', 'SP_GOOGLE_API_CLIENT_ID', 'Google API Client Id'),
('en', 'settings', 'SP_GOOGLE_API_CLIENT_SECRET', 'Google API Client Secret'),
('en', 'panel', 'Connections', 'Connections'),
('en', 'myaccount', 'Connect', 'Connect'),
('en', 'myaccount', 'Disconnect', 'Disconnect'),
('en', 'myaccount', 'Connected', 'Connected'),
('en', 'myaccount', 'Disconnected', 'Disconnected');

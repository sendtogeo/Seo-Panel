--
-- Seo Panel 3.15.0 changes
--

update `settings` set set_val='3.15.0' WHERE `set_name` LIKE 'SP_VERSION_NUMBER';


CREATE TABLE IF NOT EXISTS `user_report_logs` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `report_date` datetime NOT NULL
) ENGINE=MyISAM;
ALTER TABLE `user_report_logs` ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`);
ALTER TABLE `user_report_logs` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


CREATE TABLE IF NOT EXISTS `webmaster_keywords` (
`id` bigint(24) unsigned NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
ALTER TABLE `webmaster_keywords` ADD PRIMARY KEY (`id`), ADD KEY `website_id` (`website_id`);
ALTER TABLE `webmaster_keywords` MODIFY `id` bigint(24) unsigned NOT NULL AUTO_INCREMENT;

INSERT INTO `settings` (`set_label`, `set_name`, `set_val`, `set_category`, `set_type`, `display`) VALUES
('Enable Proxy for Google API', 'SP_ENABLE_PROXY_GOOGLE_API', '1', 'proxy', 'bool', 1);
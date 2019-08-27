--
-- Seo Panel 4.1.0 changes
--

update `settings` set set_val='4.1.0' WHERE `set_name` LIKE 'SP_VERSION_NUMBER';


CREATE TABLE IF NOT EXISTS `user_website_access` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `website_id` int(11) NOT NULL,
  `access` enum('read','write') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'read',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`,`website_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


--
-- Constraints for table `user_website_access`
--
ALTER TABLE `user_website_access`
  ADD CONSTRAINT `user_id_website_access_delete` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE `user_website_access`
  ADD CONSTRAINT `website_id_user_access_delete` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

  
CREATE TABLE `alerts` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `alert_subject` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `alert_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alert_category` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'general',
  `alert_message` text COLLATE utf8_unicode_ci NOT NULL,
  `alert_type` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'success',
  `visited` tinyint(1) NOT NULL DEFAULT '0',
  `alert_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `alerts` ADD PRIMARY KEY (`id`), ADD KEY `alert_user_delete` (`user_id`);
ALTER TABLE `alerts` MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `alerts` ADD CONSTRAINT `alert_user_delete` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;


CREATE TABLE `analytic_sources` (
  `id` bigint(20) NOT NULL,
  `source_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `analytic_sources` ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `source_name` (`source_name`);
ALTER TABLE `analytic_sources` MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;


CREATE TABLE `website_analytics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_id` int(11) NOT NULL,
  `source_id` bigint(20) NOT NULL,
  `users` int(11) NOT NULL,
  `newUsers` int(11) NOT NULL,
  `sessions` int(11) NOT NULL,
  `bounceRate` float NOT NULL,
  `avgSessionDuration` float NOT NULL,
  `goalCompletionsAll` int(11) NOT NULL,
  `report_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for table `website_analytics`
--
ALTER TABLE `website_analytics` ADD PRIMARY KEY (`id`), ADD KEY `website_analytics_delete` (`website_id`), ADD KEY `source_analytics_delete` (`source_id`);
ALTER TABLE `website_analytics` MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
ALTER TABLE `website_analytics`
  ADD CONSTRAINT `source_analytics_delete` FOREIGN KEY (`source_id`) REFERENCES `analytic_sources` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `website_analytics_delete` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;


ALTER TABLE `websites` ADD `analytics_view_id` VARCHAR(120) NULL AFTER `crawled`;


INSERT INTO `seotools` (`id`, `name`, `url_section`, `user_access`, `reportgen`, `cron`, `priority`, `status`) 
VALUES (NULL, 'Website Analytics', 'web-analytics', '1', '1', '1', '100', '1');

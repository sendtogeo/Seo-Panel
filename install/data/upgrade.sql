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

--
-- Text changes
-- 

INSERT INTO `texts` (`category`, `label`, `content`) VALUES
('panel', 'Alerts', 'Alerts'),
('panel', 'Website Access Manager', 'Website Access Manager');

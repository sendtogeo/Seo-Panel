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
-- Constraints for table `as_article`
--
ALTER TABLE `user_website_access`
  ADD CONSTRAINT `user_id_website_access_delete` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE `user_website_access`
  ADD CONSTRAINT `website_id_user_access_delete` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;



--
-- Text changes
-- 

INSERT INTO `texts` (`category`, `label`, `content`) VALUES
('panel', 'Website Access Manager', 'Website Access Manager');

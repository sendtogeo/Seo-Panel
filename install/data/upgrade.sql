--
-- Seo Panel 3.18.0 changes
--

update `settings` set set_val='3.18.0' WHERE `set_name` LIKE 'SP_VERSION_NUMBER';

ALTER TABLE websites ENGINE = InnoDB;

ALTER TABLE users ENGINE = InnoDB;


CREATE TABLE `social_media_links` (
  `id` int(11) NOT NULL,
  `website_id` int(11) NOT NULL,
  `name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'facebook',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `social_media_links` ADD PRIMARY KEY (`id`), ADD KEY `social_media_links_web_rel` (`website_id`);
ALTER TABLE `social_media_links` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `social_media_links` ADD CONSTRAINT `social_media_links_web_rel` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE `social_media_links` ADD UNIQUE( `website_id`, `url`);

CREATE TABLE `social_media_link_results` (
  `id` bigint(20) NOT NULL,
  `sm_link_id` int(11) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `followers` int(11) NOT NULL DEFAULT '0',
  `report_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


ALTER TABLE `social_media_link_results` ADD PRIMARY KEY (`id`), ADD KEY `social_media_link_rel` (`sm_link_id`);
ALTER TABLE `social_media_link_results` MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `social_media_link_results` ADD CONSTRAINT `social_media_link_rel` FOREIGN KEY (`sm_link_id`) REFERENCES `social_media_links` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

INSERT INTO `seotools` (`id`, `name`, `url_section`, `user_access`, `reportgen`, `cron`, `priority`, `status`) 
VALUES (NULL, 'Social Media Checker', 'sm-checker', '1', '1', '1', '100', '1');

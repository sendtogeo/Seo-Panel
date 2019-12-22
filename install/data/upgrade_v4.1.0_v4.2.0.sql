--
-- Seo Panel 4.2.0 changes
--

update `settings` set set_val='4.2.0' WHERE `set_name` LIKE 'SP_VERSION_NUMBER';

CREATE TABLE `review_links` (
  `id` int(11) NOT NULL,
  `website_id` int(11) NOT NULL,
  `name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'google_my_business',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `review_links` ADD PRIMARY KEY (`id`), ADD KEY `review_links_web_rel` (`website_id`);
ALTER TABLE `review_links` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `review_links` ADD CONSTRAINT `review_links_web_rel` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE `review_links` ADD UNIQUE( `website_id`, `url`);

CREATE TABLE `review_link_results` (
  `id` bigint(20) NOT NULL,
  `review_link_id` int(11) NOT NULL,
  `reviews` int(11) NOT NULL DEFAULT '0',
  `rating` float NOT NULL DEFAULT '0',
  `report_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


ALTER TABLE `review_link_results` ADD PRIMARY KEY (`id`), ADD KEY `review_link_rel` (`review_link_id`);
ALTER TABLE `review_link_results` MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `review_link_results` ADD CONSTRAINT `review_link_rel` FOREIGN KEY (`review_link_id`) REFERENCES `review_links` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

INSERT INTO `seotools` (`name`, `url_section`, `user_access`, `reportgen`, `cron`, `priority`, `status`) 
VALUES ('Review Manager', 'review-manager', '1', '1', '1', '100', '1');

UPDATE `searchengines` SET `regex` = '<div.*?class=\"?g.*?>.*?<div.*?class=\"r\"*?>.*?<a href=\"(.*?)\".*?>.*?<span.*?>(.*?)<\\/span><\\/h3>' WHERE `url` LIKE '%google%';

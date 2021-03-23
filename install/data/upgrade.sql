--
-- Seo Panel 4.9.0 changes
--

update `settings` set set_val='4.9.0' WHERE `set_name` LIKE 'SP_VERSION_NUMBER';

UPDATE `searchengines` SET `regex` = '<div.*?class=\"?g.*?>.*?<div.*?class=\"y.*?\">.*?<a href=\"(.*?)\".*?>.*?<h3.*?>(.*?)<\\/h3>' 
WHERE `url` LIKE '%google%';

CREATE TABLE `crawl_engines` (
  `id` int UNSIGNED NOT NULL,
  `engine_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `engine_category` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `regex1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `regex2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `regex3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `crawl_engines`  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `engine_name` (`engine_name`,`engine_category`);
ALTER TABLE `crawl_engines` MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

INSERT INTO `crawl_engines` (`id`, `engine_name`, `engine_category`, `regex1`, `regex2`, `regex3`, `status`) 
VALUES (NULL, 'alexa', 'rank', '/\\<popularity url\\=\"(.*?)\" TEXT\\=\"([0-9]+)\"/si', NULL, NULL, '1');
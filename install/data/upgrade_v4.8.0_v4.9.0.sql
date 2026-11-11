--
-- Seo Panel 4.9.0 changes
--

update `settings` set set_val='4.9.0' WHERE `set_name` LIKE 'SP_VERSION_NUMBER';

UPDATE `searchengines` SET `regex` = '<div.*?class=\"?g.*?>.*?<div.*?class=\"y.*?\">.*?<a href=\"(.*?)\".*?>.*?<h3.*?>(.*?)<\\/h3>' 
WHERE `url` LIKE '%google%';

CREATE TABLE `crawl_engines` (
  `id` int UNSIGNED NOT NULL,
  `engine_name` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `engine_category` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `regex1` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `regex2` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `regex3` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `regex4` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_part` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `crawl_engines`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `engine_name` (`engine_name`,`engine_category`);

ALTER TABLE `crawl_engines` MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

INSERT INTO `crawl_engines` (`engine_name`, `engine_category`, `regex1`, `regex2`, `regex3`, `regex4`, `url`, `url_part`, `status`) VALUES
('alexa', 'rank', '/\\<popularity url\\=\"(.*?)\" TEXT\\=\"([0-9]+)\"/si', NULL, NULL, NULL, '', NULL, 1),
('bing', 'backlink', '/([0-9\\,]+) results/si', '/id=\"count\".*?>.*?\\(([0-9\\,]+).*?\\)/si', '/id=\"count\".*?>.*?([0-9\\,]+).*?/si', '/class=\"sb_count\".*?>.*?([0-9\\,]+).*?<\\/span>/si', '', NULL, 1),
('alexa', 'backlink', '/linksin\".*?big.*?>(.*?)</si', NULL, NULL, NULL, '', NULL, 1),
('google', 'backlink', '/about ([0-9\\,]+) result/si', '/<div id=resultStats>([0-9\\,]+) result/si', '/([0-9\\,]+) result/si', '/about <b>([0-9\\,]+)<\\/b> linking/si', '', NULL, 1),
('google', 'saturation', '/about ([0-9\\,]+) result/si', '/<div id=resultStats>([0-9\\,]+) result/si', '/([0-9\\,]+) result/si', '/about <b>([0-9\\,]+)<\\/b> linking/si', '', NULL, 1),
('bing', 'saturation', '/([0-9\\,]+) results/si', '/id=\"count\".*?>.*?\\(([0-9\\,]+).*?\\)/si', '/id=\"count\".*?>.*?([0-9\\,]+).*?/si', '/class=\"sb_count\".*?>.*?([0-9\\,]+).*?<\\/span>/si', '', NULL, 1),
('facebook', 'social_media', '/description\".*?content=\".*?([\\d,]+) likes/is', '/Total Likes.*?>([\\d,]+).*?Total Follows/is', NULL, NULL, '', '?locale=en_US', 1),
('twitter', 'social_media', '/followers_count\".*?(\\d+)/is', NULL, NULL, NULL, 'https://cdn.syndication.twimg.com/widgets/followbutton/info.json?screen_names={ACC_NAME}', NULL, 1),
('instagram', 'social_media', '/edge_followed_by.*?\"count\":(.*?)\\}/is', NULL, NULL, NULL, '', '/?__a=1', 1),
('linkedin', 'social_media', '/<div.*?follower-count.*?>(.*?)<\\/div>/is', NULL, NULL, NULL, 'https://www.linkedin.com/pages-extensions/FollowCompany?id={CID}&counter=bottom', NULL, 1),
('pinterest', 'social_media', '/pinterestapp:followers.*?content=\"(.*?)\"/is', NULL, NULL, NULL, '', NULL, 1),
('youtube', 'social_media', '/subscriberCountText\".*?\"(\\d.*?) subscribers\"/is', NULL, NULL, NULL, '', '/about', 1),
('google', 'review', '/<span>([0-9.,]+) Google reviews<\\/span>/is', '/<\\/g-popup>.*?aria-label=\"Rated (\\d+\\.\\d+) out/is', NULL, NULL, '', NULL, 1),
('glassdoor', 'review', '/\"reviewCount\":([0-9.,]+)/is', '/\"overallRating\":(\\d+\\.\\d+)/is', NULL, NULL, '', NULL, 1);

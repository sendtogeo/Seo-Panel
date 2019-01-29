--
-- Seo Panel 3.17.0 changes
--

update `settings` set set_val='3.17.0' WHERE `set_name` LIKE 'SP_VERSION_NUMBER';

CREATE TABLE IF NOT EXISTS `webmaster_sitemaps` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `website_id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_submitted` datetime NOT NULL,
  `last_downloaded` datetime NOT NULL,
  `is_pending` tinyint(4) NOT NULL DEFAULT '0',
  `warnings` int(11) NOT NULL DEFAULT '0',
  `errors` int(11) NOT NULL DEFAULT '0',
  `submitted` int(11) NOT NULL DEFAULT '0',
  `indexed` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `website_id` (`website_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


update  `featured_directories` set status=0 WHERE `directory_name` LIKE 'beta-i.org';
INSERT INTO `featured_directories` (`directory_name`, `directory_link`, `google_pagerank`, `coupon_code`, `coupon_offer`, `status`)
VALUES ('directorymaximizer.com', 'http://www.directorymaximizer.com/af.php?af=207564&ad=5&p=1', '6', '', 0, '1');

INSERT INTO `user_specs` (`user_type_id`, `spec_column`, `spec_value`, `spec_category`) VALUES
(2, 'searchengine_count', '3', 'system'),
(2, 'directory_submit_limit', '150', 'system'),
(2, 'directory_submit_daily_limit', '100', 'system'),
(2, 'site_auditor_max_page_limit', '500', 'system'),
(2, 'plugin_1', '1', 'system'),
(2, 'plugin_2', '1', 'system'),
(2, 'plugin_3', '1', 'system'),
(2, 'seotool_1', '1', 'system'),
(2, 'seotool_2', '1', 'system'),
(2, 'seotool_3', '1', 'system'),
(2, 'seotool_4', '1', 'system'),
(2, 'seotool_5', '1', 'system'),
(2, 'seotool_6', '1', 'system'),
(2, 'seotool_7', '1', 'system'),
(2, 'seotool_8', '1', 'system') ON DUPLICATE KEY UPDATE spec_value=spec_value;


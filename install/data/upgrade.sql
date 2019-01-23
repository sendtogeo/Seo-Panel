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
VALUES ('directorymaximizer.com', 'http://www.directorymaximizer.com/af.php?af=207564&ad=5&p=1', '6', '', '', '1');


INSERT INTO `texts` (`category`, `label`, `content`) VALUES
('blog', 'Newer Posts', 'Newer Posts'),
('blog', 'Older Posts', 'Older Posts'),
('webmaster', 'Error: Google api connection failed', 'Error: Google api connection failed'),
('webmaster', 'Click here to connect to your google account', 'Click here to connect to your google account'),
('common', 'Blog', 'Blog'),
('seotools', 'Sitemap Reports Summary', 'Sitemap Reports Summary'),
('website', 'Successfully deleted sitemap from webmaster tools', 'Successfully deleted sitemap from webmaster tools'),
('website', 'Successfully sync sitemaps from webmaster tools', 'Successfully sync sitemaps from webmaster tools'),
('sitemap', 'Sync Sitemaps', 'Sync Sitemaps'),
('common', 'Errors', 'Errors'),
('common', 'Warnings', 'Warnings'),
('sitemap', 'Submitted', 'Submitted'),
('sitemap', 'Downloaded', 'Downloaded'),
('panel', 'Sitemaps', 'Sitemaps');

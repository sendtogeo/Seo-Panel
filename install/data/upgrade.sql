--
-- Seo Panel 4.10.0 changes
--

update `settings` set set_val='4.10.0' WHERE `set_name` LIKE 'SP_VERSION_NUMBER';

update `featured_directories` set status=0 WHERE `directory_name` LIKE 'directorymaximizer.com';


INSERT INTO `texts` (`category`, `label`, `content`) VALUES 
('panel', 'Project Manager', 'Project Manager'),
('panel', 'Project Summary', 'Project Summary'),
('QuickWebProxy', 'Url blocked in the web proxy', 'Url blocked in the web proxy'),
('QuickWebProxy', 'QWP_PROXY_BLOCK_URLS', 'Blocked Urls In Web Proxy'),
('QuickWebProxy', 'QWP_PROXY_BLOCK_URLS_comment', 'Insert urls separated with comma to block in web proxy.');



--
-- Seo Panel 4.10.0 changes
--

update `settings` set set_val='4.10.0' WHERE `set_name` LIKE 'SP_VERSION_NUMBER';

INSERT INTO `texts` (`category`, `label`, `content`) VALUES 
('QuickWebProxy', 'Url blocked in the web proxy', 'Url blocked in the web proxy'),
('QuickWebProxy', 'QWP_PROXY_BLOCK_URLS', 'Blocked Urls In Web Proxy'),
('QuickWebProxy', 'QWP_PROXY_BLOCK_URLS_comment', 'Insert urls separated with comma to block in web proxy.');



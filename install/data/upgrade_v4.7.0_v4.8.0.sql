--
-- Seo Panel 4.8.0 changes
--

update `settings` set set_val='4.8.0' WHERE `set_name` LIKE 'SP_VERSION_NUMBER';

UPDATE `searchengines` SET `regex` = '<div.*?class=\"?g.*?>.*?<div.*?class=\"r.*?\">.*?<a href=\"(.*?)\".*?>.*?<h3.*?>(.*?)<\\/h3>' 
WHERE `url` LIKE '%google%';

INSERT INTO `settings` (`set_label`, `set_name`, `set_val`, `set_category`, `set_type`, `display`) VALUES
('Country', 'SP_DEFAULT_COUNTRY', 'US', 'system', 'small', 1),
('Enable DataForSEO', 'SP_ENABLE_DFS', '0', 'dataforseo', 'bool', 1),
('DataForSEO API Login', 'SP_DFS_API_LOGIN', '', 'dataforseo', 'large', 1),
('DataForSEO API Password', 'SP_DFS_API_PASSWORD', '', 'dataforseo', 'large', 1),
('DataForSEO Balance', 'SP_DFS_BALANCE', '0', 'dataforseo', 'small', 1),
('Enable for Backlink and Saturation Checker', 'SP_ENABLE_DFS_BACK_SATU', '0', 'dataforseo', 'bool', 1),
('Enable Sandbox', 'SP_ENABLE_DFS_SANDBOX', '0', 'dataforseo', 'bool', 1);





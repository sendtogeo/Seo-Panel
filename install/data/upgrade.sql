--
-- Seo Panel 4.8.0 changes
--

update `settings` set set_val='4.8.0' WHERE `set_name` LIKE 'SP_VERSION_NUMBER';

UPDATE `searchengines` SET `regex` = '<div.*?class=\"?g.*?>.*?<div.*?class=\"r.*?\">.*?<a href=\"(.*?)\".*?>.*?<h3.*?>(.*?)<\\/h3>' WHERE `url` LIKE '%google%';
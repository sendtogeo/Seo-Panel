--
-- Seo Panel 3.9.0 changes
--

INSERT INTO `settings` (`set_label`, `set_name`, `set_val`, `set_category`, `set_type`, `display`)  
VALUES ('Seo Panel version', 'SP_VERSION_NUMBER', '3.9.0', 'system', 'medium', '0');

UPDATE `searchengines` SET `regex` = '<div.*?class="?g.*?><h3 class="r"><a href="\\/url\\?q=(.*?)&amp;sa=U.*?>(.*?)<\\/a>.*?<\\/div><span.*?>(.*?)<\\/span>' WHERE `url` LIKE '%google%';

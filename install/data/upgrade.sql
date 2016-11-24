--
-- Seo Panel 3.10.0 changes
--

update `settings` set set_val='3.10.0' WHERE `set_name` LIKE 'SP_VERSION_NUMBER';

UPDATE `searchengines` SET `regex` = '<div.*?class="?g.*?><h3 class="r"><a.*?href="\\/url\\?q=(.*?)&amp;sa=U.*?>(.*?)<\\/a>.*?<\\/div><span.*?>(.*?)<\\/span>', url = CONCAT(url, "&nfpr=1") WHERE `url` LIKE '%google%';


INSERT INTO `texts` (`lang_code`, `category`, `label`, `content`) VALUES
('en', 'common', 'Page Authority', 'Page Authority');
INSERT INTO `texts` (`lang_code`, `category`, `label`, `content`) VALUES
('en', 'common', 'Domain Authority', 'Domain Authority');
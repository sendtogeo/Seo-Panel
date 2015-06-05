--
-- Seo Panel 3.4.0 changes
--

INSERT INTO `settings` (`set_label`, `set_name`, `set_val`, `set_category`, `set_type`, `display`) 
VALUES ('Enable HTTP Proxy Tunnel', 'CURLOPT_HTTPPROXYTUNNEL_VAL', '1', 'proxy', 'bool', '1');

INSERT INTO `settings` (`set_label`, `set_name`, `set_val`, `set_category`, `set_type`, `display`) 
VALUES ('Deactivate Proxy When Crawling Failed', 'PROXY_DEACTIVATE_CRAWL', '0', 'proxy', 'bool', '1');

INSERT INTO `settings` (`set_label`, `set_name`, `set_val`, `set_category`, `set_type`, `display`) 
VALUES ('Check With Another Proxy When Crawling Failed', 'CHECK_WITH_ANOTHER_PROXY_IF_FAILED', '0', 'proxy', 'bool', '1');

INSERT INTO `settings` (`set_label`, `set_name`, `set_val`, `set_category`, `set_type`, `display`) 
VALUES ('SMTP Mail Port', 'SP_SMTP_PORT', '25', 'system', 'small', '1');

ALTER TABLE `proxylist` ADD `checked` TINYINT( 1 ) NOT NULL DEFAULT '0';

Update `searchengines` set `regex`='<li.*?<h3><a.*?\\*\\*(.*?)".*?>(.*?)<\\/a><\\/h3>.*?<div.*?>(.*?)<\\/div>' where url like '%yahoo.com%';



--
-- Seo Panel 3.9.0 changes
--

INSERT INTO `settings` (`set_label`, `set_name`, `set_val`, `set_category`, `set_type`, `display`)  
VALUES ('Seo Panel version', 'SP_VERSION_NUMBER', '3.9.0', 'system', 'medium', '0');

UPDATE `searchengines` SET `regex` = '<div.*?class="?g.*?><h3 class="r"><a href="\\/url\\?q=(.*?)&amp;sa=U.*?>(.*?)<\\/a>.*?<\\/div><span.*?>(.*?)<\\/span>' WHERE `url` LIKE '%google%';

ALTER TABLE `rankresults`  ADD `moz_rank` FLOAT NOT NULL  AFTER `alexa_rank`;
ALTER TABLE `auditorreports` CHANGE `pagerank` `pagerank` FLOAT NOT NULL DEFAULT '0';

INSERT INTO `settings` (`set_label`, `set_name`, `set_val`, `set_category`, `set_type`, `display`)  
VALUES ('Moz API Link', 'SP_MOZ_API_LINK', 'http://lsapi.seomoz.com/linkscape', 'moz', 'medium', '0');

INSERT INTO `settings` (`set_label`, `set_name`, `set_val`, `set_category`, `set_type`, `display`)  
VALUES ('Moz API Link', 'SP_MOZ_API_ACCESS_ID', '', 'moz', 'large', '1');

INSERT INTO `settings` (`set_label`, `set_name`, `set_val`, `set_category`, `set_type`, `display`)  
VALUES ('Moz API Link', 'SP_MOZ_API_SECRET', '', 'moz', 'large', '1');



INSERT INTO `texts` (`lang_code`, `category`, `label`, `content`) VALUES
('en', 'siteauditor', 'Check pagerank of pages', 'Check pagerank of pages');


INSERT INTO `texts` (`lang_code`, `category`, `label`, `content`) VALUES
('en', 'panel', 'MOZ Settings', 'MOZ Settings');
INSERT INTO `texts` (`lang_code`, `category`, `label`, `content`) VALUES
('en', 'settings', 'Verify connection', 'Verify connection');
INSERT INTO `texts` (`lang_code`, `category`, `label`, `content`) VALUES
('en', 'proxy', 'click-to-get-proxy', 'Click here to get proxy');
INSERT INTO `texts` (`lang_code`, `category`, `label`, `content`) VALUES
('en', 'settings', 'SP_MOZ_API_ACCESS_ID', 'Access ID');
INSERT INTO `texts` (`lang_code`, `category`, `label`, `content`) VALUES
('en', 'settings', 'SP_MOZ_API_SECRET', 'Secret Key');
INSERT INTO `texts` (`lang_code`, `category`, `label`, `content`) VALUES
('en', 'settings', 'click-to-get-moz-account', 'Click here to get MOZ account');
INSERT INTO `texts` (`lang_code`, `category`, `label`, `content`) VALUES
('en', 'common', 'MOZ Rank', 'MOZ Rank');

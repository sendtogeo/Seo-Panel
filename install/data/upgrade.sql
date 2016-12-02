--
-- Seo Panel 3.10.0 changes
--

update `settings` set set_val='3.10.0' WHERE `set_name` LIKE 'SP_VERSION_NUMBER';

UPDATE `searchengines` SET `regex` = '<div.*?class="?g.*?><h3 class="r"><a.*?href="\\/url\\?q=(.*?)&amp;sa=U.*?>(.*?)<\\/a>.*?<\\/div><span.*?>(.*?)<\\/span>', url = CONCAT(url, "&nfpr=1") WHERE `url` LIKE '%google%';


ALTER TABLE `rankresults`  ADD `domain_authority` FLOAT NOT NULL;
ALTER TABLE `rankresults`  ADD `page_authority` FLOAT NOT NULL;

ALTER TABLE `auditorreports`  ADD `page_authority` FLOAT NOT NULL;

INSERT INTO `settings` (`set_label`, `set_name`, `set_val`, `set_category`, `set_type`, `display`) VALUES
('Page authority check level first', 'SA_PA_CHECK_LEVEL_FIRST', '40', 'siteauditor', 'small', 0),
('Page authority check level second', 'SA_PA_CHECK_LEVEL_SECOND', '75', 'siteauditor', 'small', 0);

INSERT INTO `texts` (`lang_code`, `category`, `label`, `content`) VALUES
('en', 'common', 'Page Authority', 'Page Authority');
INSERT INTO `texts` (`lang_code`, `category`, `label`, `content`) VALUES
('en', 'common', 'Domain Authority', 'Domain Authority');


INSERT INTO `texts` (`lang_code`, `category`, `label`, `content`) VALUES
('en', 'siteauditor', 'The page is having excellent page authority value', 'The page is having excellent page authority value');
INSERT INTO `texts` (`lang_code`, `category`, `label`, `content`) VALUES
('en', 'siteauditor', 'The page is having very good page authority value', 'The page is having very good page authority value');
INSERT INTO `texts` (`lang_code`, `category`, `label`, `content`) VALUES
('en', 'siteauditor', 'The page is having good page authority valu', 'The page is having good page authority valu');
INSERT INTO `texts` (`lang_code`, `category`, `label`, `content`) VALUES
('en', 'siteauditor', 'The page is having poor page authority value', 'The page is having poor page authority value');
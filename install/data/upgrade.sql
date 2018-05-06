--
-- Seo Panel 3.13.0 changes
--

UPDATE `currency` SET `symbol` = '£' WHERE `currency`.`id` =25;

UPDATE `searchengines` SET `regex` = '<div.*?class="?g.*?><h3 class="r"><a href="(.*?)".*?>(.*?)<\\/a>.*?<\\/div><span.*?>(.*?)<\\/span>' WHERE `url` LIKE '%google%';


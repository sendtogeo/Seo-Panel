--
-- Seo Panel 3.9.0 changes
--

UPDATE `searchengines` SET `regex` = '<div.*?class="?g.*?><h3 class="r"><a href="\\/url\\?q=(.*?)&amp;sa=U.*?>(.*?)<\\/a>.*?<\\/div><span.*?>(.*?)<\\/span>' WHERE `url` LIKE '%google%';

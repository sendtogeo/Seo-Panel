--
-- This section includes the database changes of Seo Panel version from 2.2.0 to 2.3.0
--

--
-- to update google urls for disable instant search option
--
Update `searchengines` set `cookie_send`='',`url`=concat(url,'&as_qdr=all') WHERE `domain` LIKE "%google%";

--
-- To add user agent field to system settings
--
INSERT INTO `settings` (
`id` ,
`set_label` ,
`set_name` ,
`set_val` ,
`set_type`
)
VALUES (
NULL , 'User agent', 'SP_USER_AGENT', 'Mozilla/5.0 (Windows; U; MSIE 9.0; WIndows NT 9.0; en-US))', 'large'
);

--
-- To fix the issues with google parsing
--
ALTER TABLE `searchengines` ADD `from_pattern` VARCHAR( 64 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL AFTER `regex`;
ALTER TABLE `searchengines` ADD `to_pattern` VARCHAR( 64 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL AFTER `from_pattern`;
update searchengines set from_pattern='<div id="ires">',to_pattern='<\\/ol>' where  url LIKE '%google%';

--
-- To fix yahoo search engine url issue
--
update searchengines set regex='<li.*?<h3><a.*?\\*\\*(.*?)".*?>(.*?)<\\/a><\\/h3>.*?<div.*?>(.*?)<\\/div>.*?<\\/span>',url_index=1,title_index=2,description_index=3 where url LIKE '%yahoo%';

--
-- Changes for search engine like yandex 
--
ALTER TABLE searchengines ADD `start_offset` INT( 8 ) NOT NULL DEFAULT '0' AFTER `start`;
UPDATE `searchengines` SET `start_offset` = `no_of_results_page`;

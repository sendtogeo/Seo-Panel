--
-- To upgrade the Seo Panel test plugin
--

ALTER TABLE `testplugin` ADD `status` BOOL NOT NULL DEFAULT '0' AFTER `description`;

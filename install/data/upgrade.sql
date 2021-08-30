--
-- Seo Panel 4.10.0 changes
--

update `settings` set set_val='4.10.0' WHERE `set_name` LIKE 'SP_VERSION_NUMBER';
update `featured_directories` set status=0 WHERE `directory_name` LIKE 'directorymaximizer.com';
UPDATE `seoplugins` SET `version` = '2.1.0' WHERE name='QuickWebProxy';





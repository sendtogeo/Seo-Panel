--
-- Seo Panel 3.19.0 changes
--

update `settings` set set_val='3.19.0' WHERE `set_name` LIKE 'SP_VERSION_NUMBER';

INSERT INTO `texts` (`category`, `label`, `content`) 
VALUES ('common', 'Plugins', 'Plugins'),
VALUES ('common', 'Logout', 'Logout'),
VALUES ('common', 'Tools', 'Tools');



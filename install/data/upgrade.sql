--
-- Seo Panel 4.0.0 changes
--

update `settings` set set_val='4.0.0' WHERE `set_name` LIKE 'SP_VERSION_NUMBER';


INSERT INTO `texts` (`category`, `label`, `content`) VALUES 
('label', 'Month', 'Month'), 
('common', 'Plugins', 'Plugins'),
('common', 'Logout', 'Logout'),
('common', 'Tools', 'Tools');

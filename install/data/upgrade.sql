--
-- Seo Panel 4.2.0 changes
--

update `settings` set set_val='4.2.0' WHERE `set_name` LIKE 'SP_VERSION_NUMBER';




INSERT INTO `texts` (`category`, `label`, `content`) VALUES  
('home', 'Page Overview Report', 'Page Overview Report'),
('home', 'Keyword Overview Report', 'Keyword Overview Report'),
('label', 'Overview', 'Overview');




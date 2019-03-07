--
-- Seo Panel 3.18.0 changes
--

update `settings` set set_val='3.18.0' WHERE `set_name` LIKE 'SP_VERSION_NUMBER';


INSERT INTO `texts` (`category`, `label`, `content`) VALUES 
('settings', 'Send Email', 'Send Email'),
('panel', 'Test Email Settings', 'Test Email Settings');



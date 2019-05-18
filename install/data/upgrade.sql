--
-- Seo Panel 4.0.0 changes
--

update `settings` set set_val='4.0.0' WHERE `set_name` LIKE 'SP_VERSION_NUMBER';

INSERT INTO `settings` (`set_label`, `set_name`, `set_val`, `set_category`, `set_type`, `display`) VALUES
('Mail Encryption', 'SP_MAIL_ENCRYPTION', '', 'system', 'medium', 1);

INSERT INTO `texts` (`category`, `label`, `content`) VALUES 
('settings', 'SP_MAIL_ENCRYPTION', 'Mail Encryption'), 
('label', 'Month', 'Month'), 
('common', 'Plugins', 'Plugins'),
('common', 'Logout', 'Logout'),
('common', 'Tools', 'Tools');

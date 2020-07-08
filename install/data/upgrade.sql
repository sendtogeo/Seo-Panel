--
-- Seo Panel 4.6.0 changes
--

update `settings` set set_val='4.6.0' WHERE `set_name` LIKE 'SP_VERSION_NUMBER';

INSERT INTO `settings` (`set_label`, `set_name`, `set_val`, `set_category`, `set_type`, `display`) VALUES
('Seo Panel Demo', 'SP_DEMO', '0', 'system', 'large', 0),
('Seo Panel Hosted Version', 'SP_HOSTED_VERSION', '0', 'system', 'large', 0);

ALTER TABLE `usertypes` ADD `access_type` ENUM('read','write') NOT NULL DEFAULT 'write' AFTER `status`;


INSERT INTO `texts` (`category`, `label`, `content`) VALUES 
('subscription', 'Access Type', 'Access Type'),  
('label', 'Write', 'Write'), 
('label', 'Read', 'Read');

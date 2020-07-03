--
-- Seo Panel 4.6.0 changes
--

update `settings` set set_val='4.6.0' WHERE `set_name` LIKE 'SP_VERSION_NUMBER';

INSERT INTO `settings` (`set_label`, `set_name`, `set_val`, `set_category`, `set_type`, `display`) VALUES
('Seo Panel Demo', 'SP_DEMO', '0', 'system', 'large', 0),
('Seo Panel Hosted Version', 'SP_HOSTED_VERSION', '0', 'system', 'large', 0),
('Seo Panel Custom Dev', 'SP_CUSTOM_DEV', '0', 'system', 'large', 0);

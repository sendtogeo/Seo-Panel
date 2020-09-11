--
-- Seo Panel 4.6.0 changes
--

update `settings` set set_val='4.6.0' WHERE `set_name` LIKE 'SP_VERSION_NUMBER';

INSERT INTO `settings` (`set_label`, `set_name`, `set_val`, `set_category`, `set_type`, `display`) VALUES
('Seo Panel Demo', 'SP_DEMO', '0', 'system', 'large', 0),
('Seo Panel Hosted Version', 'SP_HOSTED_VERSION', '0', 'system', 'large', 0);

ALTER TABLE `usertypes` ADD `access_type` ENUM('read','write') NOT NULL DEFAULT 'write' AFTER `status`;

CREATE TABLE `mail_logs` (
  `id` bigint(20) NOT NULL,
  `from_address` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `to_address` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `cc_address` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `log_message` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail_category` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'general'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `mail_logs` ADD PRIMARY KEY (`id`);
ALTER TABLE `mail_logs` MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
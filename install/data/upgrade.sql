--
-- Seo Panel 3.15.0 changes
--

update `settings` set set_val='3.15.0' WHERE `set_name` LIKE 'SP_VERSION_NUMBER';


CREATE TABLE IF NOT EXISTS `user_report_logs` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `report_date` datetime NOT NULL
) ENGINE=InnoDB;
ALTER TABLE `user_report_logs` ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`);
ALTER TABLE `user_report_logs` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;



INSERT INTO `texts` (`category`, `label`, `content`) VALUES
('panel', 'Report Generation Logs', 'Report Generation Logs'),
('settings', 'Authorised redirect URI', 'Authorised redirect URI'),
('settings', 'click-to-get-google-api-client-id', 'Click here to get Google API Client Id'),
('home', 'Overall Report Summary', 'Overall Report Summary'),
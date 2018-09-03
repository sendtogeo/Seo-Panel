--
-- Seo Panel 3.15.0 changes
--

update `settings` set set_val='3.15.0' WHERE `set_name` LIKE 'SP_VERSION_NUMBER';


CREATE TABLE IF NOT EXISTS `report_logs` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `report_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `report_logs`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`);


ALTER TABLE `report_logs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
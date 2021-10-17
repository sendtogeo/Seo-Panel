--
-- Seo Panel 4.11.0 changes
--

update `settings` set set_val='4.11.0' WHERE `set_name` LIKE 'SP_VERSION_NUMBER';

UPDATE `currency` SET `symbol` = '€' WHERE `currency`.`id` = 23;
UPDATE `currency` SET `symbol` = 'د.إ' WHERE `currency`.`id` = 1;
UPDATE `currency` SET `symbol` = 'ƒ' WHERE `currency`.`id` = 2;
UPDATE `currency` SET `symbol` = '₩' WHERE `currency`.`id` = 36;
UPDATE `currency` SET `symbol` = '₡' WHERE `currency`.`id` = 18;
UPDATE `currency` SET `symbol` = 'Kč' WHERE `currency`.`id` = 19;
UPDATE `currency` SET `symbol` = 'E£' WHERE `currency`.`id` = 22;
UPDATE `currency` SET `symbol` = '₪' WHERE `currency`.`id` = 31;
UPDATE `currency` SET `symbol` = '¥' WHERE `currency`.`id` = 34;
UPDATE `currency` SET `symbol` = '₦' WHERE `currency`.`id` = 45;
UPDATE `currency` SET `symbol` = '﷼' WHERE `currency`.`id` = 48; 
UPDATE `currency` SET `symbol` = '₱' WHERE `currency`.`id` = 50;
UPDATE `currency` SET `symbol` = 'Zł' WHERE `currency`.`id` = 51;
UPDATE `currency` SET `symbol` = '₽' WHERE `currency`.`id` = 54;
UPDATE `currency` SET `symbol` = 'ł' WHERE `currency`.`id` = 58;
UPDATE `currency` SET `symbol` = '₫' WHERE `currency`.`id` = 65;
UPDATE `currency` SET `symbol` = '¥' WHERE `currency`.`id` = 16;
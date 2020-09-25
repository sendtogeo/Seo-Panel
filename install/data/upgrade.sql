--
-- Seo Panel 4.7.0 changes
--

update `settings` set set_val='4.7.0' WHERE `set_name` LIKE 'SP_VERSION_NUMBER';

INSERT INTO `settings` (`set_label`, `set_name`, `set_val`, `set_category`, `set_type`, `display`) VALUES
('Enable reCAPTCHA', 'SP_ENABLE_RECAPTCHA', '0', 'google', 'bool', 1),
('reCAPTCHA Site Key', 'SP_RECAPTCHA_SITE_KEY', '', 'google', 'large', 1),
('reCAPTCHA Secret Key', 'SP_RECAPTCHA_SECRET_KEY', '', 'google', 'large', 1);


--
-- Text changes
--

INSERT INTO `texts` (`category`, `label`, `content`) VALUES 
('common', 'reCAPTCHA verification failed', 'reCAPTCHA verification failed'),
('settings', 'SP_ENABLE_RECAPTCHA', 'Enable reCAPTCHA'),
('settings', 'SP_RECAPTCHA_SITE_KEY', 'reCAPTCHA Site Key'), 
('settings', 'SP_RECAPTCHA_SECRET_KEY', 'reCAPTCHA Secret Key');
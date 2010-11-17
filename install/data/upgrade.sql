--
-- This section includes the database changes of Seo Panel version from 2.1.0 to 2.2.0
--

--
-- to update google urls for disable instant search option
--
Update `searchengines` set `cookie_send`='',`url`=concat(url,'&as_qdr=all') WHERE `domain` LIKE "%google%";




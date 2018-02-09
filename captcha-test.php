<?php
include_once("includes/sp-load.php");
	
$spider = new Spider();
$cookieFile = SP_TMPPATH . "/cookie.jar.txt";
$spider->_CURLOPT_COOKIEJAR = $cookieFile;
$spider->_CURLOPT_COOKIEFILE = $cookieFile;

$url = "http://www.google.com/search?hl=&num=100&q=php+script&start=0&cr=&as_qdr=all&gws_rd=cr&nfpr=1&gws_rd=cr&ie=utf-8&pws=0&gl=";
$ret = $spider->getContent($url);

print highlight_string($ret['page']);
?>
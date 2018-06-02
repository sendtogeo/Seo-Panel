<?php
include_once("includes/sp-load.php");

include_once(SP_LIBPATH . "/google-api-php-client/vendor/autoload.php");
$apiKey = SP_GOOGLE_API_KEY;

$client = new Google_Client();
$client->setApplicationName("SP_CHECKER");
$client->setClientId(SP_GOOGLE_API_CLIENT_ID);
$client->setClientSecret(SP_GOOGLE_API_CLIENT_SECRET);

$client->setAccessType('offline');

$client->addScope(Google_Service_Webmasters::WEBMASTERS);
$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
$client->setRedirectUri($redirect_uri);

//$client->authenticate();
// $_SESSION['token'] = $client->getAccessToken();

// if (isset($_SESSION['token'])) { // extract token from session and configure client
// 	$token = $_SESSION['token'];
// 	$client->setAccessToken($token);
// }


// $client->setDeveloperKey($apiKey);


// $token = $client->revokeToken($_SESSION['access_token']);

// debugVar($token);


$service = new Google_Service_Webmasters($client);


debugVar($_SESSION['access_token'], false);

/************************************************
 * If we're logging out we just need to clear our
 * local access token in this case
 ************************************************/
if (isset($_REQUEST['logout'])) {
	unset($_SESSION['access_token']);
}

/************************************************
 * If we have a code back from the OAuth 2.0 flow,
 * we need to exchange that with the
 * Google_Client::fetchAccessTokenWithAuthCode()
 * function. We store the resultant access token
 * bundle in the session, and redirect to ourself.
 ************************************************/
if (isset($_GET['code'])) {
	$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
	$client->setAccessToken($token);

	// store in the session also
	$_SESSION['access_token'] = $token;

	// redirect back to the example
	header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}

/************************************************
 If we have an access token, we can make
 requests, else we generate an authentication URL.
 ************************************************/
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
	$client->setAccessToken($_SESSION['access_token']);
} else {
	$authUrl = $client->createAuthUrl();
}

/************************************************
 If we're signed in and have a request to shorten
 a URL, then we create a new URL object, set the
 unshortened URL, and call the 'insert' method on
 the 'url' resource. Note that we re-store the
 access_token bundle, just in case anything
 changed during the request - the main thing that
 might happen here is the access token itself is
 refreshed if the application has offline access.
 ************************************************/
if ($client->getAccessToken() && isset($_REQUEST['url'])) {
	
// 	debugvar($client->getAccessToken());
	
	if ($client->isAccessTokenExpired()) {
		
// 		$google_token= json_decode($client->getAccessToken());
// 		print $google_token->refresh_token;exit;
// 		debugVar($tokenInfo);
		$tokenInfo = $client->getAccessToken();
// 		print $tokenInfo['access_token'];exit;
		
// 		print $tokenInfo['access_token'];exit;
		
		$rr = $client->refreshToken($tokenInfo['access_token']);
		
		
// 		Array
// 		(
// 				[access_token] => ya29.GlvOBZst7Dabua4yJ88LBbijMQUnxAppW5_9X4LHHm8VadZiB3G7jZdoe8W5JqfzNMEm_YhEsHwLrE-VO1U_oXL7UGEo_9PH_7bWFh-fWX5X7ptwL31m7JRb6cHb
// 				[token_type] => Bearer
// 				[expires_in] => 3600
// 				[refresh_token] => 1/LqMLbcqKDdfIxyP0a2r9Kfo8kPZtyz8FXC28oCOzphU
// 				[created] => 1527950223
// 		)
		
		
		debugVar($rr, true);
		
		//$client->authorize();
// 		exit;
	}
	
// 	if (!validateCsrfToken()) {
// 		echo invalidCsrfTokenWarning();
// 		return;
// 	}
	
// 	$url = new Google_Service_Urlshortener_Url();
// 	$url->longUrl = $_REQUEST['url'];
// 	$short = $service->url->insert($url);

	
	$short = $service->sites->listSites();
	
	$_SESSION['access_token'] = $client->getAccessToken();
}




?>

<div class="box">
<?php if (isset($authUrl)): ?>
  <div class="request">
    <a class='login' href='<?= $authUrl ?>'>Connect Me!</a>
  </div>
<?php elseif (empty($short)): ?>
  <form id="url" method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <input name="url" class="url" type="text">
    <input type="hidden" name="csrf_token" value="<?php echo getCsrfToken() ?>" />
    <input type="submit" value="Shorten">
  </form>
  <form id="logout" method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <input type="hidden" name="logout" value="" />
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>" />
    <input type="submit" value="Logout">
  </form>
<?php else: 
	debugVar($short);
?>
  You created a short link! <br />
  <a href="<?= $short['id'] ?>"><?= $short['id'] ?></a>
  <div class="shortened">
    <pre><?php var_export($short) ?></pre>
  </div>
  <a href="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>">Create another</a>
<?php endif ?>
</div>

<?php 

exit;


$service = new Google_Service_Webmasters($client);

$list = $service->sites->listSites();

debugVar($list);

exit;
	
$spider = new Spider();
$cookieFile = SP_TMPPATH . "/cookie.jar.txt";
$spider->_CURLOPT_COOKIEJAR = $cookieFile;
$spider->_CURLOPT_COOKIEFILE = $cookieFile;

$url = "http://www.google.com/search?hl=&num=100&q=php+script&start=0&cr=&as_qdr=all&gws_rd=cr&nfpr=1&gws_rd=cr&ie=utf-8&pws=0&gl=";
$ret = $spider->getContent($url);

print highlight_string($ret['page']);
?>
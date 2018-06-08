<?php
include_once("includes/sp-load.php");

include_once(SP_CTRLPATH . "/components/webmaster.ctrl.php");
$userId = 1;
$siteUrl = "https://www.seopanel.in/";
$websiteId = 4;
$reportDate = "2018-06-06";

$gapiCtrler = new WebMasterController();

// $client = $gapiCtrler->getAuthClient($userId);

// $service = new Google_Service_Webmasters($client);
// $siteList = $service->sites->listSites();

// $paramList = array(
// 	'startDate' => "2018-06-01",
// 	'endDate' => "2018-06-04",
// 	'dimensions' => ['query'],
// );

// $resList = $gapiCtrler->getQueryResults($userId, $siteUrl, $paramList, 10000);

// print count($resList['resultList']);

// debugVar($resList);


$gapiCtrler->storeWebsiteAnalytics($websiteId, $reportDate);

exit;








$serviceRquest = new Google_Service_Webmasters_SearchAnalyticsQueryRequest();

$serviceRquest->startDate = "2018-06-01";
$serviceRquest->endDate = "2018-06-04";
$serviceRquest->dimensions = array('query');
$serviceRquest->rowLimit = 10;


$statRes = $service->searchanalytics->query("https://www.seopanel.in/", $serviceRquest);
$rowList = $stats->getRows();

debugVar($stats->getRows());

exit;




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

// $client->setDeveloperKey($apiKey);

$service = new Google_Service_Webmasters($client);
debugVar($_SESSION['access_token'], true);

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
	
	if ($client->isAccessTokenExpired()) {

		echo "Token expired- refresh token";
		$tokenInfo = $client->getAccessToken();
		$client->refreshToken($tokenInfo['refresh_token']);
		
	}
	
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
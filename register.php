<?php
include_once("includes/sp-load.php");
include_once(SP_CTRLPATH."/user.ctrl.php");
include_once(SP_CTRLPATH."/seoplugins.ctrl.php");
include_once(SP_CTRLPATH."/user-type.ctrl.php");
$controller = New UserController();
$controller->view->menu = 'register';

if($_GET['sec'] != 'pricing' && (isLoggedIn() || !SP_USER_REGISTRATION)) {
	redirectUrl(SP_WEBPATH."/");
}

// set site details according to customizer plugin
$custSiteInfo = getCustomizerDetails();
$siteName = !empty($custSiteInfo['site_name']) ? $custSiteInfo['site_name'] : "Seo Panel";
$controller->set('spTitle', "$siteName: User Registration");
$controller->set('spDescription', "$siteName: User Registration");
$controller->set('spKeywords', "$siteName User Registration");
$controller->spTextRegister = $controller->getLanguageTexts('register', $_SESSION['lang_code']);
$controller->set('spTextRegister', $controller->spTextRegister);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	switch($_POST['sec']){
		
		case "register":
			$controller->startRegistration();
			break;
	}
	
}else{
	switch($_GET['sec']){
		
		case "pricing":
			$controller->view->menu = 'pricing';
			$controller->showPricing();
			break;
		
		case "confirm":
			$controller->confirmUser($_GET['code']);
			break;

		default:
			$controller->register($_GET);
			break;
	}
}
?>
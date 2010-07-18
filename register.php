<?php

include_once("includes/sp-load.php");
if(isLoggedIn()){
	redirectUrl(SP_WEBPATH."/");
}

include_once(SP_CTRLPATH."/user.ctrl.php");
$controller = New UserController();
$controller->view->menu = 'register';

$controller->set('spTitle', 'Seo Tools: User Registration');
$controller->set('spDescription', 'Seo Tools: User Registration');
$controller->set('spKeywords', 'Seo tools User Registration');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	switch($_POST['sec']){
		
		case "register":
			$controller->startRegistration();
			break;
	}
	
}else{
	switch($_GET['sec']){
		
		case "confirm":
			$controller->confirmUser($_GET['cfm']);
			break;

		default:
			$controller->register();
			break;
	}
}

?>
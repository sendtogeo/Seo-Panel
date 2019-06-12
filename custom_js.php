<?php
include_once("includes/sp-load.php");
include_once(SP_CTRLPATH."/themes.ctrl.php");
$controller = New ThemesController();

header('Content-Type: application/javascript');

$custComp = $controller->createComponent("Customizer_Helper");
$themeInfo = $controller->__getActiveTheme();
$style = $custComp->getThemeCustomStyles($themeInfo['id'], 'js');
echo $style;
?>
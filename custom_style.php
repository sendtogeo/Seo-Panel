<?php
include_once("includes/sp-load.php");
include_once(SP_CTRLPATH."/themes.ctrl.php");
$controller = New ThemesController();

header("Content-type: text/css; charset: UTF-8");
echo '@CHARSET "UTF-8";';

$custComp = $controller->createComponent("Customizer_Helper");
$themeInfo = $controller->__getActiveTheme();
$style = $custComp->getThemeCustomStyles($themeInfo['id'], 'css');
echo $style;
?>
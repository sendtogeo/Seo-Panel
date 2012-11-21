<?php
require('libs/captcha.class.php');
$aFonts = array('fonts/tahoma.ttf' );
$oVisualCaptcha = new PhpCaptcha($aFonts, 200, 60);
$oVisualCaptcha->Create();
?>


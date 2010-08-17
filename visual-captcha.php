<?php
require('libs/captcha.class.php');
$aFonts = array('fonts/VeraBd.ttf', 'fonts/VeraIt.ttf', 'fonts/Vera.ttf', 'fonts/VeraMoBI.ttf', 'fonts/VeraMono.ttf','fonts/VeraSe.ttf', 'fonts/VeraBI.ttf', 'fonts/VeraMoBd.ttf', 'fonts/VeraMoIt.ttf', 'fonts/VeraSeBd.ttf' );
$oVisualCaptcha = new PhpCaptcha($aFonts, 200, 60);
$oVisualCaptcha->Create();
?>


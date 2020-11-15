<?php
// fix for is_countable function not found error
if (!function_exists('is_countable')) {
    function is_countable($var) {
        return (is_array($var) || $var instanceof Countable);
    }
}

require('libs/captcha.class.php');
$aFonts = array('fonts/tahoma.ttf' );
$oVisualCaptcha = new PhpCaptcha($aFonts, 200, 60);
$oVisualCaptcha->Create();
?>


<?php
	$homeClass = "";
	$supportClass = "";
	$loginClass = "";	
	$registerClass = "";
	switch($this->menu){
		case "support":
			$supportClass = "current";
			break;			
		
		case "register":
			$registerClass = "current";
			break;
			
		case "login":
			$loginClass = "current";
			break;
			
		case "home":
		default:
			$homeClass = "current";
			break;
	} 
?>
<li><a class="<?=$homeClass?>" href="<?=SP_WEBPATH?>/">Seo Panel</a></li>
<li><a class="" href="<?=SP_WEBPATH?>/seo-tools.php">Seo Tools</a></li>
<li><a class="" href="<?=SP_WEBPATH?>/seo-plugins.php">Seo Plugins</a></li>
<li><a class="<?=$supportClass?>" href="<?=SP_WEBPATH?>/support.php">Support</a></li>

<li style="float: right; margin-right: 30px;"><a class="<?=$loginClass?>" href="<?=SP_WEBPATH?>/login.php">My Account</a></li>
<?php if(!isLoggedIn() && SP_USER_REGISTRATION){?>
	<li style="float: right;"><a class="<?=$registerClass?>" title="register seo panel" href="<?=SP_WEBPATH?>/register.php">Sign Up</a></li>
<?php } ?>
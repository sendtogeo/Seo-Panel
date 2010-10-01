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
<li><a class="" href="<?=SP_WEBPATH?>/seo-tools.php"><?=$spText['common']['Seo Tools']?></a></li>
<li><a class="" href="<?=SP_WEBPATH?>/seo-plugins.php?sec=show"><?=$spText['common']['Seo Plugins']?></a></li>
<li><a class="<?=$supportClass?>" href="<?=SP_WEBPATH?>/support.php"><?=$spText['common']['Support']?></a></li>
<li><a href="<?=SP_DONATE_LINK?>" target="_blank"><?=$spText['common']['Donate']?></a></li>
<?php if (SP_DEMO) {?>
	<li><a href="<?=SP_DOWNLOAD_LINK?>" target="_blank"><?=$spText['label']['Download']?></a></li>
<?php }?>

<li style="float: right; margin-right: 30px;"><a class="<?=$loginClass?>" href="<?=SP_WEBPATH?>/login.php"><?=$spText['common']['My Account']?></a></li>
<?php if(!isLoggedIn() && SP_USER_REGISTRATION){?>
	<li style="float: right;"><a class="<?=$registerClass?>" title="register seo panel" href="<?=SP_WEBPATH?>/register.php"><?=$spText['common']['Sign Up']?></a></li>
<?php } ?>
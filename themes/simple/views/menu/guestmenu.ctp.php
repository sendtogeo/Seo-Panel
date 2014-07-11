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

	// reduce menu padding if larger text languages
	if (in_array($_SESSION['lang_code'], array('ru'))) {
	    ?>
	    <style>
	    #Tabs ul#MainTabs a:link,#Tabs ul#MainTabs a:visited {
	    	padding: 6px 10px;
	    }
	    </style>
	    <?php
	}
	
?>
<li><a class="<?=$homeClass?>" href="<?=SP_WEBPATH?>/"><?=$spText['common']['Home']?></a></li>
<li><a class="" href="<?=SP_WEBPATH?>/seo-tools.php"><?=$spText['common']['Seo Tools']?></a></li>
<li><a class="" href="<?=SP_WEBPATH?>/seo-plugins.php?sec=show"><?=$spText['common']['Seo Plugins']?></a></li>
<li><a class="<?=$supportClass?>" href="<?=SP_WEBPATH?>/support.php"><?=$spText['common']['Support']?></a></li>

<?php if (SP_DEMO) {?>
	<li><a href="<?=SP_DOWNLOAD_LINK?>" target="_blank"><?=$spText['label']['Download']?></a></li>
<?php } else {?>
	<li><a href="<?=SP_DONATE_LINK?>" target="_blank"><?=$spText['common']['Donate']?></a></li>
<?php }?>

<li style="padding-left: 2px;">
	<a href="https://twitter.com/seopanel" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false" data-dnt="true">Follow @seopanel</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</li>
<li>
	<!-- facebook like button -->
	<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fwww.seopanel.in&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=260885620597614" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe>
</li>

<li style="float: right; margin-right: 12px;">
	<a class="<?=$loginClass?>" href="<?=SP_WEBPATH?>/login.php"><?=$spText['common']['My Account']?></a>
</li>
<?php if(!isLoggedIn() && SP_USER_REGISTRATION){?>
	<li style="float: right;"><a class="<?=$registerClass?>" title="register seo panel" href="<?=SP_WEBPATH?>/register.php"><?=$spText['common']['Sign Up']?></a></li>
<?php } ?>
<?php
$homeClass = "";
$supportClass = "";
$loginClass = "";	
$registerClass = "";
$pricingClass = "";
$blogClass = "";
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
		
	case "pricing":
		$pricingClass = "current";
		break;
		
	case "home":
	default:
		$homeClass = "current";
		break;
		
	case "blog":
		$blogClass = "current";
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
<li><a class="<?php echo $homeClass?>" href="<?php echo SP_WEBPATH?>/"><?php echo $spText['common']['Home']?></a></li>
<li><a class="" href="<?php echo SP_WEBPATH?>/seo-tools.php"><?php echo $spText['common']['Seo Tools']?></a></li>
<li><a class="" href="<?php echo SP_WEBPATH?>/seo-plugins.php?sec=show"><?php echo $spText['common']['Seo Plugins']?></a></li>
<li><a class="<?php echo $supportClass?>" href="<?php echo SP_WEBPATH?>/support.php"><?php echo $spText['common']['Support']?></a></li>

<?php if (SP_DEMO) {?>
	<li><a href="<?php echo SP_DOWNLOAD_LINK?>" target="_blank"><?php echo $spText['label']['Download']?></a></li>
<?php } else if(empty($custSiteInfo)) {?>
	<li><a href="<?php echo SP_DONATE_LINK?>" target="_blank"><?php echo $spText['common']['Donate']?></a></li>
<?php }?>

<?php if (!empty($custSiteInfo['plugin_active'])) {?>
	<li><a href="<?php echo SP_WEBPATH?>/blog.php" class="<?php echo $blogClass?>" ><?php echo $spText['common']['Blog']?></a></li>
<?php } ?>

<li style="padding-left: 2px;">
	<a href="<?php echo !empty($custSiteInfo['twitter_page_url']) ? $custSiteInfo['twitter_page_url'] : "https://twitter.com/seopanel"?>" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false" data-dnt="true">Follow @seopanel</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</li>
<li>
	<!-- facebook like button -->
	<?php $fbPage = !empty($custSiteInfo['fb_page_url']) ? $custSiteInfo['fb_page_url'] : "https://www.facebook.com/seopanel/"?>
	<iframe src="//www.facebook.com/plugins/like.php?href=<?php echo $fbPage?>&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=260885620597614" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe>
</li>

<li style="float: right; margin-right: 12px;">
	<a class="<?php echo $loginClass?>" href="<?php echo SP_WEBPATH?>/login.php"><?php echo $spText['common']['My Account']?></a>
</li>
<?php if(!isLoggedIn() && SP_USER_REGISTRATION){?>
	<li style="float: right;"><a class="<?php echo $registerClass?>" title="register seo panel" href="<?php echo SP_WEBPATH?>/register.php"><?php echo $spText['common']['Sign Up']?></a></li>
<?php } ?>

<?php if (SP_HOSTED_VERSION) {?>
	<li style="float: right;">
		<a class="<?php echo $pricingClass?>" title="seo panel" href="<?php echo SP_WEBPATH?>/register.php?sec=pricing">
			<?php echo $spText['common']['Pricing']?>
		</a>
	</li>
<?php }?>

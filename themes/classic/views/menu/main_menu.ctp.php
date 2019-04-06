<?php
$userInfo = @Session::readSession('userInfo');
$userType = empty($userInfo['userType']) ? "guest" : $userInfo['userType'];
$homeClass = "";
$supportClass = "";
$loginClass = "";	
$registerClass = "";
$pricingClass = "";
$blogClass = "";
$adminClass = "";
$seoToolsClass = "";
$seoPluginsClass = "";
switch($this->menu){
	case "support":
		$supportClass = "active";
		break;			
	
	case "register":
		$registerClass = "active";
		break;
		
	case "login":
		$loginClass = "active";
		break;
		
	case "pricing":
		$pricingClass = "active";
		break;
		
	case "blog":
		$blogClass = "active";
		break;
		
	case "adminpanel":
		$adminClass = "active";
		break;		
		
	case "seotools":
		$seoToolsClass = "active";
		break;
		
	case "seoplugins":
		$seoPluginsClass = "active";
		break;
		
	case "home":
	default:
		$homeClass = "active";
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

$menuName = ($userType != "guest" && $userType != "admin") ? "user" : $userType;
$menuInfo = getCustomizerMenu($menuName);

if (!empty($menuInfo['item_list'])) {
	$linkStyle = !empty($menuInfo['bg_color']) ? "background-color: {$menuInfo['bg_color']};border-bottom-color: {$menuInfo['bg_color']}" : "";
	$linkStyle = !empty($menuInfo['font_color']) ? ";color: " . $menuInfo['font_color'] : "";
		
	// loop through menu items
	foreach ($menuInfo['item_list'] as $menuItem) {
		$linkTarget = ($menuItem['window_target'] == 'new_tab') ? "_blank" : "";
		$currClass = stristr($menuItem['url'], $_SERVER['SCRIPT_NAME']) ? "active" : "";
		?>
		<li class="nav-item <?php echo $currClass?>">
			<a class="nav-link" href="<?php echo $menuItem['url']?>" target="<?php echo $linkTarget?>" style="<?php echo $linkStyle?>" >
				<?php echo $menuItem['label']?>
			</a>
		</li>
		<?php
	}
	
} else {
	?>
	<li class="nav-item <?php echo $homeClass?>">
		<a class="nav-link" href="<?php echo SP_WEBPATH?>/">
			<?php echo ($userType == "guest") ? $spText['common']['Home'] : $spText['common']['Dashboard']?>
		</a>
	</li>
	
	<li class="nav-item <?php echo $seoToolsClass?>">
		<a class="nav-link" href="<?php echo SP_WEBPATH?>/seo-tools.php"><?php echo $spText['common']['Seo Tools']?></a>
	</li>
	<li class="nav-item <?php echo $seoPluginsClass?>">
		<a class="nav-link" href="<?php echo SP_WEBPATH?>/seo-plugins.php?sec=show"><?php echo $spText['common']['Seo Plugins']?></a>
	</li>
	<li class="nav-item <?php echo $supportClass?>">
		<a class="nav-link" href="<?php echo SP_WEBPATH?>/support.php"><?php echo $spText['common']['Support']?></a>
	</li>
	
	<?php if (SP_DEMO) {?>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo SP_DOWNLOAD_LINK?>" target="_blank"><?php echo $spText['label']['Download']?></a>
		</li>
	<?php }?>
	
	<?php if (!empty($custSiteInfo['plugin_active'])) {?>
		<li class="nav-item <?php echo $blogClass?>">
			<a class="nav-link" href="<?php echo SP_WEBPATH?>/blog.php" ><?php echo $spText['common']['Blog']?></a>
		</li>
	<?php } else { ?>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo SP_DONATE_LINK?>" target="_blank"><?php echo $spText['common']['Donate']?></a>
		</li>
	<?php }?>	
	
	<?php if (SP_HOSTED_VERSION) {?>
		<li class="nav-item <?php echo $pricingClass?>">
			<a class="nav-link" href="<?php echo SP_WEBPATH?>/register.php?sec=pricing"><?php echo $spText['common']['Pricing']?></a>
		</li>
	<?php }?>
	
	<?php if ($userType == "guest") {?>
		<li class="nav-item <?php echo $loginClass?>">
			<a class="nav-link" href="<?php echo SP_WEBPATH?>/login.php"><?php echo $spText['common']['signin']?></a>
		</li>				
	<?php } else {?>
		<li class="nav-item <?php echo $adminClass?>">
			<a class="nav-link" href="<?php echo SP_WEBPATH?>/admin-panel.php">
				<?php echo ($userType == "admin") ? $spText['common']['Admin Panel'] : $spText['common']['User Panel']?>
			</a>
		</li>		
		<li class="nav-item <?php echo $loginClass?>">
			<a class="nav-link" href="<?php echo SP_WEBPATH?>/login.php?sec=logout"><?php echo $spText['common']['Sign out']?></a>
		</li>
	<?php }?>
	
	<?php if ($userType == "guest") {?>
		<li class="nav-item">
			<a href="<?php echo !empty($custSiteInfo['twitter_page_url']) ? $custSiteInfo['twitter_page_url'] : "https://twitter.com/seopanel"?>" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false" data-dnt="true">Follow @seopanel</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</li>
		<li class="nav-item">
			<!-- facebook like button -->
			<?php $fbPage = !empty($custSiteInfo['fb_page_url']) ? $custSiteInfo['fb_page_url'] : "https://www.facebook.com/seopanel/"?>
			<iframe src="//www.facebook.com/plugins/like.php?href=<?php echo $fbPage?>&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=260885620597614" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe>
		</li>	
	<?php }?>
	
<?php }?>
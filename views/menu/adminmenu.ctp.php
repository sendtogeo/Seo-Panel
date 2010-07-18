<?php
$homeClass = "";
$adminClass = "";
$seoToolsClass = "";
$seoPluginsClass = "";
switch($this->menu){
	
	case "support":
		$supportClass = "current";
		break;
		
	case "adminpanel":
		$adminClass = "current";
		break;		
		
	case "seotools":
		$seoToolsClass = "current";
		break;
		
	case "seoplugins":
		$seoPluginsClass = "current";
		break;
		
	case "home":
	default:
		$homeClass = "current";
		break;
} 
?>
<li><a class="<?=$homeClass?>" href="<?=SP_WEBPATH?>/">Seo Panel</a></li>
<li><a class="<?=$seoToolsClass?>" href="<?=SP_WEBPATH?>/seo-tools.php">Seo Tools</a></li>
<li><a class="<?=$seoPluginsClass?>" href="<?=SP_WEBPATH?>/seo-plugins.php?sec=show">Seo Plugins</a></li>
<li><a class="<?=$supportClass?>" href="<?=SP_WEBPATH?>/support.php">Support</a></li>

<li style="float: right; margin-right: 30px;"><a class="<?=$adminClass?>" href="<?=SP_WEBPATH?>/admin-panel.php">Admin Panel</a>
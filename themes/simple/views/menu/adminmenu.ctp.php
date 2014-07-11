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
<li><a class="<?=$homeClass?>" href="<?=SP_WEBPATH?>/"><?=$spText['common']['Dashboard']?></a></li>
<li><a class="<?=$seoToolsClass?>" href="<?=SP_WEBPATH?>/seo-tools.php"><?=$spText['common']['Seo Tools']?></a></li>
<li><a class="<?=$seoPluginsClass?>" href="<?=SP_WEBPATH?>/seo-plugins.php?sec=show"><?=$spText['common']['Seo Plugins']?></a></li>
<li><a class="<?=$supportClass?>" href="<?=SP_WEBPATH?>/support.php"><?=$spText['common']['Support']?></a></li>
<li><a href="<?=SP_DONATE_LINK?>" target="_blank"><?=$spText['common']['Donate']?></a></li>
<?php if (SP_DEMO) {?>
	<li><a href="<?=SP_DOWNLOAD_LINK?>" target="_blank"><?=$spText['label']['Download']?></a></li>
<?php }?>

<li style="float: right; margin-right: 12px;"><a class="<?=$adminClass?>" href="<?=SP_WEBPATH?>/admin-panel.php"><?=$spText['common']['Admin Panel']?></a>
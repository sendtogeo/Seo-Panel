<?php

$bar_menu = apply_filters("filter_bar_menu",array(
    "home" => array("link" => SP_WEBPATH."/", "text" => $spText['common']['Dashboard']),
    "seotools" => array("link" => SP_WEBPATH."/seo-tools.php", "text" => $spText['common']['Seo Tools']),
    "seoplugins" => array("link" => SP_WEBPATH."/seo-plugins.php?sec=show", "text" => $spText['common']['Seo Plugins']),
    "support" => array("link" => SP_WEBPATH."/support.php", "text" => $spText['common']['Support']),
    "donate" => array("link" => SP_DONATE_LINK, "text" => $spText['common']['Donate']),
    )
        );
foreach($bar_menu as $k => $v){
    $add_class = "";
    if($this->menu == $k){
        $add_class = "current";
    }
    $target = "";
    if($k == 'donate'){
        $target = 'target="_blank"';
    }
    ?>
<li><a class="<?php echo $add_class?>" href="<?php echo $v['link']?>" <?php echo $target?>><?php echo $v['text'] ?></a></li>
<?php
}
?>
<?php if (SP_DEMO) {?>
	<li><a href="<?php echo SP_DOWNLOAD_LINK?>" target="_blank"><?php echo $spText['label']['Download']?></a></li>
<?php }?>
<?php 
$adminClass = '';
if($this->menu == 'adminpanel'){
    $adminClass = "current";
} ?>
<li style="float: right; margin-right: 12px;"><a class="<?php echo $adminClass?>" href="<?php echo SP_WEBPATH?>/admin-panel.php"><?php echo $spText['common']['User Panel']?></a></li>
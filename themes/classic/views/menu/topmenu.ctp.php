<?php
$menuInfo = getCustomizerMenu("top");
if (!empty($menuInfo['item_list'])) {
	$linkStyle = !empty($menuInfo['bg_color']) ? "background-color: " . $menuInfo['bg_color'] : ""; 
	$linkStyle .= !empty($menuInfo['font_color']) ? ";color: " . $menuInfo['font_color'] : "";
	
	// loop through menu items
	foreach ($menuInfo['item_list'] as $menuItem) {
		$linkTarget = ($menuItem['window_target'] == 'new_tab') ? "_blank" : "";
		?>
		<a href="<?php echo $menuItem['url']?>" target="<?php echo $linkTarget?>" style="<?php echo $linkStyle?>">
			<?php echo $menuItem['label']?>
		</a><span class="pipe"> | </span>
		<?php
	}
	
} else {
	?> 
	<a href="<?php echo !empty($custSiteInfo['contact_url']) ? $custSiteInfo['contact_url'] : SP_CONTACT_LINK?>" target="_blank">
		<?php echo $spText['common']['contact']?>
	</a><span class="pipe"> | </span>
	<a href="<?php echo !empty($custSiteInfo['help_url']) ? $custSiteInfo['help_url'] : SP_HELP_LINK?>" target="_blank">
		<?php echo $spText['common']['help']?>
	</a><span class="pipe">  |</span>
	<a href="<?php echo !empty($custSiteInfo['forum_url']) ? $custSiteInfo['forum_url'] : SP_FORUM_LINK?>" target="_blank">
		<?php echo $spText['common']['forum']?>
	</a><span class="pipe"> | </span> 
	<?php
}
?>
<select class="form-control form-control-sm" name="lang_code" id="lang_code" onchange="doLoadUrl('lang_code', '<?php echo $redirectUrl?>')">
	<?php
	foreach ($langList as $langInfo) {
		$selected = ($langInfo['lang_code'] == $_SESSION['lang_code']) ? "selected='selected'" : "";
		?>			
		<option value="<?php echo $langInfo['lang_code']?>" <?php echo $selected?>><?php echo $langInfo['lang_show']?></option>
		<?php
	}
	?>
</select>
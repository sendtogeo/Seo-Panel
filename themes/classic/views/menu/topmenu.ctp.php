<h3>
	<span id="floatright">
		<b><?=$spText['common']['lang']?>:</b> 
		<select name="lang_code" id="lang_code" class="lang_code" onchange="doLoadUrl('lang_code', '<?=$redirectUrl?>')">
			<?php
			foreach ($langList as $langInfo) {
				$selected = ($langInfo['lang_code'] == $_SESSION['lang_code']) ? "selected='selected'" : "";
				?>			
				<option value="<?=$langInfo['lang_code']?>" <?=$selected?>><?=$langInfo['lang_show']?></option>
				<?php
			}
			?>
		</select> 
		<a href="<?=SP_CONTACT_LINK?>" target="_blank" title="Contact Seo Panel"><?=$spText['common']['contact']?></a> <span class="pipe">|</span>
		<a href="<?=SP_HELP_LINK?>" target="_blank" title="Seo Panel Help Guide"><?=$spText['common']['help']?></a> <span class="pipe">|</span>
		<a href="<?=SP_FORUM_LINK?>" target="_blank" title="Seo Panel Forum"><?=$spText['common']['forum']?></a> <span class="pipe">|</span>
		<?php 
		$userInfo = @Session::readSession('userInfo');
		if(empty($userInfo['userId'])){	
		?> 			
			<a href="<?=SP_WEBPATH?>/login.php"><?=$spText['common']['signin']?></a>
		<?php }else{ ?>
			<a href="admin-panel.php?sec=myprofile"><?=$spText['common']['Profile']?></a> <span class="pipe">|</span>
			<a href="<?=SP_WEBPATH?>/login.php?sec=logout"><?=$spText['common']['Sign out']?></a>
		<?php }?>
	</span>
</h3>

<?php 
$headLabel = empty($headLabel) ? $spTextPanel['System Settings'] : $headLabel;
echo showSectionHead($headLabel);

// if saved successfully
if (!empty($saved)) {
    showSuccessMsg($spTextSettings['allsettingssaved'], false);
}

// save process failed
if (!empty($errorMsg)) {
    echo showErrorMsg($errorMsg, false);
}

// help text to get MOZ account
if ($category == "moz") {
	?>
	<div id="topnewsbox" style="margin-bottom: 20px;">
		<a class="bold_link" href="https://moz.com/checkout/api" target="_blank">
			<?php echo $spTextSettings['click-to-get-moz-account']; ?> &gt;&gt;
		</a>
	</div>
	<?php
} else if ($category == "google") {
	?>
	<div id="topnewsbox">
		<a class="bold_link" href="https://support.google.com/googleapi/answer/6158862?hl=en" target="_blank">
			<?php echo $spTextSettings['click-to-get-google-api-key']; ?> &gt;&gt;
		</a>
	</div>
	<div id="topnewsbox" style="margin-bottom: 20px;">
		<a class="bold_link" href="<?php echo SP_HELP_LINK?>user_guide/settings.html#google-oauth2-credentials" target="_blank">
			<?php echo $spTextSettings['click-to-get-google-api-client-id']; ?> &gt;&gt;
		</a>
	</div>
	<?php
} else if ($category == "dataforseo") {
    ?>
	<div id="topnewsbox" style="margin-bottom: 20px;">
		<a class="bold_link" href="https://www.seopanel.org/blog/2020/11/how-to-integrate-dataforseo-with-seo-panel/" target="_blank">
			<?php echo $spTextSettings['click-to-get-dataforseo-account']; ?> &gt;&gt;
		</a>
	</div>
	<?php
}
?>
<form id="updateSettings">
<input type="hidden" value="update" name="sec">
<input type="hidden" value="<?php echo $category?>" name="category">
<table class="list">
	<tr class="listHead">
		<td width='30%'><?php echo $headLabel?></td>
		<td>&nbsp;</td>
	</tr>
	<?php 
	foreach( $list as $listInfo){
		switch($listInfo['set_type']){			
			case "small":
				$width = 100;
				break;

			case "bool":
				if(empty($listInfo['set_val'])){
					$selectYes = "";					
					$selectNo = "selected";
				}else{					
					$selectYes = "selected";					
					$selectNo = "";
				}
				break;
				
			case "medium":
				$width = 300;
				break;

			case "large":
			case "text":
			    $width = 'large';
				break;
		}
		
		// sp demo settings
		$demoCheckArr = array(
			'SP_API_KEY', 'API_SECRET', 'SP_SMTP_PASSWORD', 'SP_MOZ_API_ACCESS_ID', 'SP_MOZ_API_SECRET', 'SP_GOOGLE_API_KEY',
			'SP_GOOGLE_API_CLIENT_ID', 'SP_GOOGLE_API_CLIENT_SECRET', 'SP_GOOGLE_ANALYTICS_TRACK_CODE', 'SP_RECAPTCHA_SITE_KEY', 
			'SP_RECAPTCHA_SECRET_KEY', 'SP_DFS_API_LOGIN', 'SP_DFS_API_PASSWORD',
		);
		if (SP_DEMO && in_array($listInfo['set_name'], $demoCheckArr)) {
			$listInfo['set_val'] = "********";
		}		
		?>
		<tr>
			<td class="td_left_col">
				<?php
				if ($listInfo['set_name'] == 'SP_PAYMENT_CURRENCY') {
				    echo $spTextSubscription["Currency"] . ":";
				} elseif ($listInfo['set_name'] == 'SP_DEFAULT_COUNTRY') {
			        echo $spText['common']["Country"] . ":";
				} else {
					echo $spTextSettings[$listInfo['set_name']] . ":";
				}
				?>
			</td>
			<td class="td_right_col">
				<?php if($listInfo['set_type'] != 'text'){?>
					<?php if($listInfo['set_type'] == 'bool'){?>
						<select  name="<?php echo $listInfo['set_name']?>">
							<option value="1" <?php echo $selectYes?>><?php echo $spText['common']['Yes']?></option>
							<option value="0" <?php echo $selectNo?>><?php echo $spText['common']['No']?></option>
						</select>
					<?php }else{?>
						<?php if($listInfo['set_name'] == 'SP_DEFAULTLANG') {?>
							<select name="<?php echo $listInfo['set_name']?>">
								<?php
								foreach ($langList as $langInfo) {
									$selected = ($langInfo['lang_code'] == $listInfo['set_val']) ? "selected" : "";
									?>			
									<option value="<?php echo $langInfo['lang_code']?>" <?php echo $selected?>><?php echo $langInfo['lang_name']?></option>
									<?php
								}
								?>
							</select>
						<?php } else if($listInfo['set_name'] == 'SP_TIME_ZONE') {?>
							<select name="<?php echo $listInfo['set_name']?>">
								<?php
								$listInfo['set_val'] = empty($listInfo['set_val']) ? ini_get('date.timezone') : $listInfo['set_val'];
								foreach ($timezoneList as $timezoneInfo) {
									$selected = ($timezoneInfo['timezone_name'] == $listInfo['set_val']) ? "selected" : "";
									?>			
									<option value="<?php echo $timezoneInfo['timezone_name']?>" <?php echo $selected?>><?php echo $timezoneInfo['timezone_label']?></option>
									<?php
								}
								?>
							</select>
						<?php } else if ($listInfo['set_name'] == 'SP_PAYMENT_CURRENCY') {?>
							<select  name="<?php echo $listInfo['set_name']?>">
								<?php						
								foreach ($currencyList as $currencyInfo) {
									$selectedVal = ($listInfo['set_val'] == $currencyInfo['iso_code']) ? "selected" : "";
									?>
									<option value="<?php echo $currencyInfo['iso_code']; ?>" <?php echo $selectedVal; ?>><?php echo $currencyInfo['name']; ?></option>
									<?php
								}
								?>
							</select>
						<?php } else if ($listInfo['set_name'] == 'SP_DEFAULT_COUNTRY') {?>
							<select  name="<?php echo $listInfo['set_name']?>">
								<?php						
								foreach ($countryList as $countryCode => $countryName) {
									$selectedVal = ($listInfo['set_val'] == $countryCode) ? "selected" : "";
									?>
									<option value="<?php echo $countryCode; ?>" <?php echo $selectedVal; ?>><?php echo $countryName; ?></option>
									<?php
								}
								?>
							</select>
						<?php } else if ($listInfo['set_name'] == 'SP_DFS_BALANCE') {?>
							<label id='sp_dfs_balance'><?php echo stripslashes($listInfo['set_val'])?></label>
						<?php } else {
							$passTypeList = array('SP_SMTP_PASSWORD', 'API_SECRET');
						    $type = in_array($listInfo['set_name'], $passTypeList) ? "password" : "text";
						    $styleOpt = ($width == 'large') ? "class='form-control'" : "style='width: $width"."px'"
						    ?>
							<input type="<?php echo $type?>" name="<?php echo $listInfo['set_name']?>" value="<?php echo stripslashes($listInfo['set_val'])?>" <?php echo $styleOpt?>>
							<?php if ($listInfo['set_name'] == 'SP_MOZ_API_SECRET') {?>
								<div style="padding: 10px 6px;">
									<a href="javascript:void(0);" onclick="checkMozConnection('settings.php?sec=checkMozCon', 'show_conn_res')" style="text-decoration: none;"><?php echo $spTextSettings['Verify connection']; ?> &gt;&gt;</a>
								</div>
								<div id="show_conn_res" style="padding: 10px 6px;"></div>
							<?php } else if ($listInfo['set_name'] == 'SP_GOOGLE_API_KEY') {?>
								<div style="padding: 10px 6px;">
									<a href="javascript:void(0);" onclick="checkGoogleAPIConnection('settings.php?sec=checkGoogleAPI', 'show_conn_res')" style="text-decoration: none;"><?php echo $spTextSettings['Verify connection']; ?> &gt;&gt;</a>
								</div>
								<div id="show_conn_res" style="padding: 10px 6px;"></div>
							<?php } else if ($listInfo['set_name'] == 'SP_DFS_API_PASSWORD') {?>
								<div style="padding: 10px 6px;">
									<a href="javascript:void(0);" onclick="checkDataForSEOAPIConnection('settings.php?sec=checkDataForSEOAPI', 'show_conn_res')" style="text-decoration: none;"><?php echo $spTextSettings['Verify connection']; ?> &gt;&gt;</a>
								</div>
								<div id="show_conn_res" style="padding: 10px 6px;"></div>
							<?php }?>
							
						<?php }?>
					<?php }?>
				<?php }else{?>
					<textarea name="<?php echo $listInfo['set_name']?>" class="form-control"><?php echo stripslashes($listInfo['set_val'])?></textarea>
				<?php }?>
			</td>
		</tr>
		<?php 
	}
	
	if ($category == "google") {
		?>
		<tr class="white_row">
			<td class="td_left_col"><?php echo $spTextSettings["Authorised redirect URI"]?></td>
			<td class="td_right_col"><?php echo SP_WEBPATH . "/admin-panel.php?sec=connections&action=connect_return&category=google"?></td>
		</tr>
		<?php
	}
	?>
</table>
<table class="actionSec">
	<tr>
    	<td style="padding-top: 6px;text-align:right;">
    		<a onclick="scriptDoLoad('settings.php?category=<?php echo $category?>', 'content', 'layout=ajax')" href="javascript:void(0);" class="actionbut">
         		<?php echo $spText['button']['Cancel']?>
         	</a>&nbsp;
         	<?php $actFun = SP_DEMO ? "alertDemoMsg()" : "confirmSubmit('settings.php', 'updateSettings', 'content')"; ?>
         	<a onclick="<?php echo $actFun?>" href="javascript:void(0);" class="actionbut">
         		<?php echo $spText['button']['Proceed']?>
         	</a>
    	</td>
	</tr>
</table>
</form>
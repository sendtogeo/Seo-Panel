<?php echo showSectionHead($spText['common']['Edit User Type']); ?>
<form id="editUserType">
<input type="hidden" name="sec" value="update"/>
<input type="hidden" name="old_user_type" value="<?php echo $post['old_user_type']?>"/>
<input type="hidden" name="id" value="<?php echo $post['id']?>"/>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left" width='30%'><?php echo $spText['common']['Edit User Type']?></td>
		<td class="right">&nbsp;</td>
	</tr>
	<tr class="blue_row">
		<td class="td_left_col"><?php echo $spText['common']['Name']?>:</td>
		<td class="td_right_col"><input type="text" name="user_type" value="<?php echo $post['user_type']?>"><?php echo $errMsg['user_type']?></td>
	</tr>
	<tr class="blue_row">
		<td class="td_left_col"><?php echo $spText['label']['Description']?>:</td>
		<td class="td_right_col"><textarea name="description" id="usertypedescription"><?php echo $post['description']?></textarea><?php echo $errMsg['description']?></td>
	</tr>
	<tr class="blue_row">
		<td class="td_left_col"><?php echo $spText['common']['Keywords Count']?>:</td>
		<td class="td_right_col">
			<input type="text" name="keywordcount" id="keywordcount" value="<?php echo $post['keywordcount']?>"><?php echo $errMsg['keywordcount']?>
			<p><?php echo $spTextSubscription['infinite_limit_text']?></p>
		</td>
	</tr>
	<tr class="blue_row">
		<td class="td_left_col"><?php echo $spText['common']['Websites Count']?>:</td>
		<td class="td_right_col">
			<input type="text" name="websitecount" id="websitecount" value="<?php echo $post['websitecount']?>"><?php echo $errMsg['websitecount']?>
			<p><?php echo $spTextSubscription['infinite_limit_text']?></p>
		</td>
	</tr>
	<tr class="blue_row">
		<td class="td_left_col"><?php echo $spText['common']['Search Engine Count']?>:</td>
		<td class="td_right_col">
			<input type="text" name="searchengine_count" id="searchengine_count" value="<?php echo $post['searchengine_count']?>">
			<?php echo $errMsg['searchengine_count']?>
			<p><?php echo $spTextSubscription['infinite_limit_text']?></p>
		</td>
	</tr>	
	
	<tr class="blue_row">
		<td class="td_left_col"><?php echo $spTextSubscription['Directory Submit Limit']?>:</td>
		<td class="td_right_col">
			<input type="text" name="directory_submit_limit" id="directory_submit_limit" value="<?php echo $post['directory_submit_limit']?>">
			<?php echo $errMsg['directory_submit_limit']?>
			<p><?php echo $spTextSubscription['infinite_limit_text']?></p>
		</td>
	</tr>	
	
	<tr class="blue_row">
		<td class="td_left_col"><?php echo $spTextSubscription['Directory Submit Daily Limit']?>:</td>
		<td class="td_right_col">
			<input type="text" name="directory_submit_daily_limit" id="directory_submit_daily_limit" value="<?php echo $post['directory_submit_daily_limit']?>">
			<?php echo $errMsg['directory_submit_daily_limit']?>
			<p><?php echo $spTextSubscription['infinite_limit_text']?></p>
		</td>
	</tr>	
	
	<tr class="blue_row">
		<td class="td_left_col"><?php echo $spTextSubscription['site_auditor_max_page_limit']?>:</td>
		<td class="td_right_col">
			<input type="text" name="site_auditor_max_page_limit" id="site_auditor_max_page_limit" value="<?php echo $post['site_auditor_max_page_limit']?>">
			<?php echo $errMsg['site_auditor_max_page_limit']?>
		</td>
	</tr>
	
	<?php if ($isPluginSubsActive) {?>
		<tr class="blue_row">
			<td class="td_left_col"><?php echo $spText['common']['Price']?>:</td>
			<td class="td_right_col">
				<?php echo $currencyList[SP_PAYMENT_CURRENCY]['symbol']; ?><input type="text" name="price" id="price" value="<?php echo $post['price']?>"><?php echo $errMsg['price']?>
			</td>
		</tr>
	<?php }?>
	<tr class="blue_row">
		<td class="td_left_col"><?php echo $spText['common']['Status']?>:</td>
		<td class="td_right_col">
			<select name="user_type_status" id="user_type_status">
				<?php if ($post['status']) { ?>
					<option value="1" selected="selected"><?php echo $_SESSION['text']['common']['Active']?></option>
					<option value="0"><?php echo $_SESSION['text']['common']['Inactive']?></option>
				<?php } else { ?>
					<option value="1"><?php echo $_SESSION['text']['common']['Active']?></option>
					<option value="0" selected="selected"><?php echo $_SESSION['text']['common']['Inactive']?></option>
				<?php } ?>
			</select>
		</td>
	</tr>
	
	<tr class="white_row"><td class="td_left_col left bold" colspan="2"><?php echo $spTextSubscription['Plugin Access Settings']?></td></tr>
	<?php 
	foreach ($pluginAccessList as $i => $pluginInfo) {
		$selectYes = $pluginInfo['value'] ? " selected" : "";
		?>
		<tr class="blue_row">
			<td class="td_left_col"><?php echo $pluginInfo['label']?>:</td>
			<td class="td_right_col">
				<select  name="<?php echo $pluginInfo['name']?>">
					<option value="0"><?php echo $spText['common']['No']?></option>
					<option value="1" <?php echo $selectYes?>><?php echo $spText['common']['Yes']?></option>
				</select>
				<?php echo $errMsg[$pluginInfo['name']]?>
			</td>
		</tr>	
	<?php }?>
	
	<tr class="white_row"><td class="td_left_col left bold" colspan="2"><?php echo $spTextSubscription['Seo Tools Access Settings']?></td></tr>
	<?php 
	foreach ($toolAccessList as $i => $toolInfo) {
		$selectYes = $toolInfo['value'] ? " selected" : "";
		?>
		<tr class="blue_row">
			<td class="td_left_col"><?php echo $toolInfo['label']?>:</td>
			<td class="td_right_col">
				<select  name="<?php echo $toolInfo['name']?>">
					<option value="0"><?php echo $spText['common']['No']?></option>
					<option value="1" <?php echo $selectYes?>><?php echo $spText['common']['Yes']?></option>
				</select>
				<?php echo $errMsg[$toolInfo['name']]?>
			</td>
		</tr>	
	<?php }?>
			
	<tr class="white_row">
		<td class="tab_left_bot_noborder"></td>
		<td class="tab_right_bot"></td>
	</tr>
	<tr class="listBot">
		<td class="left" colspan="1"></td>
		<td class="right"></td>
	</tr>
</table>
<table width="100%" cellspacing="0" cellpadding="0" border="0" class="actionSec">
	<tr>
    	<td style="padding-top: 6px;text-align:right;">
    		<a onclick="scriptDoLoad('user-types-manager.php', 'content')" href="javascript:void(0);" class="actionbut">
         		<?php echo $spText['button']['Cancel']?>
         	</a> &nbsp;
         	<?php $actFun = SP_DEMO ? "alertDemoMsg()" : "confirmSubmit('user-types-manager.php', 'editUserType', 'content')"; ?>         		
         	<a onclick="<?php echo $actFun?>" href="javascript:void(0);" class="actionbut">
         		<?php echo $spText['button']['Proceed']?>
         	</a>
    	</td>
	</tr>
</table>
</form>
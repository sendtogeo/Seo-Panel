<?php echo showSectionHead($spTextProxy['Edit Proxy']); ?>
<form id="editProxy">
<input type="hidden" name="sec" value="update"/>
<input type="hidden" name="oldProxy" value="<?=$post['oldProxy']?>"/>
<input type="hidden" name="id" value="<?=$post['id']?>"/>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left" width='30%'><?=$spTextProxy['Edit Proxy']?></td>
		<td class="right">&nbsp;</td>
	</tr>
	<tr class="white_row">
		<td class="td_left_col"><?=$spText['label']['Proxy']?>:</td>
		<td class="td_right_col"><input type="text" name="proxy" value="<?=$post['proxy']?>"><?=$errMsg['proxy']?></td>
	</tr>
	<tr class="blue_row">
		<td class="td_left_col"><?=$spText['label']['Port']?>:</td>
		<td class="td_right_col">
			<input type="text" name="port" value="<?=$post['port']?>" style="width:60px;"><?=$errMsg['port']?>
		</td>
	</tr>
	<tr class="white_row">
		<td class="td_left_col"><?=$spText['label']['Authentication']?>:</td>
		<td class="td_right_col"><input type="checkbox" id="proxy_auth" name="proxy_auth" <?php echo empty($post['proxy_auth']) ? "" : "checked"; ?> > Yes</td>
	</tr>
	<tr class="white_row">
		<td class="td_left_col"><?=$spTextProxy['Proxy Username']?>:</td>
		<td class="td_right_col"><input type="text" name="proxy_username" value="<?=$post['proxy_username']?>"><?=$errMsg['proxy_username']?></td>
	</tr>
	<tr class="blue_row">
		<td class="td_left_col"><?=$spTextProxy['Proxy Password']?>:</td>
		<td class="td_right_col">
			<input type="password" name="proxy_password" value="<?=$post['proxy_password']?>"><?=$errMsg['proxy_password']?>
		</td>
	</tr>
	<tr class="blue_row">
		<td class="td_left_col"><?=$spText['common']['Status']?>:</td>
		<td class="td_right_col">
			<select name="status" onchange="<?=$searchFun?>">
				<?php				
				$inactCheck = $actCheck = "";
				if ($post['status']) {
				    $actCheck = "selected";
				} else {
				    $inactCheck = "selected";
				}
				?>
				<option value="1" <?=$actCheck?> ><?=$spText['common']["Active"]?></option>
				<option value="0" <?=$inactCheck?> ><?=$spText['common']["Inactive"]?></option>
			</select>
		</td>
	</tr>
	<tr class="blue_row">
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
    		<a onclick="scriptDoLoad('proxy.php', 'content')" href="javascript:void(0);" class="actionbut">
         		<?=$spText['button']['Cancel']?>
         	</a>&nbsp;
         	<?php $actFun = SP_DEMO ? "alertDemoMsg()" : "confirmSubmit('proxy.php', 'editProxy', 'content')"; ?>
         	<a onclick="<?=$actFun?>" href="javascript:void(0);" class="actionbut">
         		<?=$spText['button']['Proceed']?>
         	</a>
    	</td>
	</tr>
</table>
</form>
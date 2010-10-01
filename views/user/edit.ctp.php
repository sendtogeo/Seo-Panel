<?php echo showSectionHead($spTextUser['Edit User']); ?>
<form id="updateUser">
<input type="hidden" name="sec" value="update"/>
<input type="hidden" name="oldName" value="<?=$post['oldName']?>"/>
<input type="hidden" name="id" value="<?=$post['id']?>"/>
<input type="hidden" name="oldEmail" value="<?=$post['oldEmail']?>"/>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left" width='30%'><?=$spTextUser['Edit User']?></td>
		<td class="right">&nbsp;</td>
	</tr>
	<tr class="white_row">
		<td class="td_left_col"><?=$spText['login']['Username']?>:</td>
		<td class="td_right_col"><input type="text" name="userName" value="<?=$post['userName']?>"><?=$errMsg['userName']?></td>
	</tr>
	<tr class="blue_row">
		<td class="td_left_col"><?=$spText['login']['Password']?>:</td>
		<td class="td_right_col"><input type="password" name="password" value=""><?=$errMsg['password']?></td>
	</tr>
	<tr class="white_row">
		<td class="td_left_col"><?=$spText['login']['Confirm Password']?>:</td>
		<td class="td_right_col"><input type="password" name="confirmPassword" value=""><?=$errMsg['confirmPassword']?></td>
	</tr>
	<tr class="blue_row">
		<td class="td_left_col"><?=$spText['login']['First Name']?>:</td>
		<td class="td_right_col"><input type="text" name="firstName" value="<?=$post['firstName']?>"><?=$errMsg['firstName']?></td>
	</tr>
	<tr class="white_row">
		<td class="td_left_col"><?=$spText['login']['Last Name']?>:</td>
		<td class="td_right_col"><input type="text" name="lastName" value="<?=$post['lastName']?>"><?=$errMsg['lastName']?></td>
	</tr>
	<tr class="white_row">
		<td class="td_left_col"><?=$spText['login']['Email']?>:</td>
		<td class="td_right_col"><input type="text" name="email" value="<?=$post['email']?>"><?=$errMsg['email']?></td>
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
    		<a onclick="scriptDoLoad('users.php', 'content', 'layout=ajax')" href="javascript:void(0);" class="actionbut">
         		<?=$spText['button']['Cancel']?>
         	</a>&nbsp;
         	<a onclick="confirmSubmit('users.php', 'updateUser', 'content')" href="javascript:void(0);" class="actionbut">
         		<?=$spText['button']['Proceed']?>
         	</a>
    	</td>
	</tr>
</table>
</form>
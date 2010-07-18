<?php echo showSectionHead($sectionHead); ?>
<form id="updateplugin">
<input type="hidden" name="sec" value="update"/>
<input type="hidden" name="id" value="<?=$post['id']?>"/>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left" width='20%'>Edit Seo Plugin</td>
		<td class="right">&nbsp;</td>
	</tr>
	<tr class="white_row">
		<td class="td_left_col">Plugin Name:</td>
		<td class="td_right_col"><input type="text" name="plugin_name" value="<?=$post['label']?>"><?=$errMsg['plugin_name']?></td>
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
    		<a onclick="scriptDoLoad('seo-plugins-manager.php', 'content')" href="javascript:void(0);">
         		<img border="0" alt="" src="<?=SP_IMGPATH?>/cancel.gif"/>
         	</a>
         	<a onclick="confirmSubmit('seo-plugins-manager.php', 'updateplugin', 'content')" href="javascript:void(0);">
         		<img border="0" alt="" src="<?=SP_IMGPATH?>/proceed.gif"/>
         	</a>
    	</td>
	</tr>
</table>
</form>
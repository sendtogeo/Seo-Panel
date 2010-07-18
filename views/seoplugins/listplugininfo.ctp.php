<?php echo showSectionHead($sectionHead); ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left" width='20%'><?php echo $pluginInfo['label']?></td>
		<td class="right">&nbsp;</td>
	</tr>
	<tr class="white_row">
		<td class="td_left_col bold">Plugin Name:</td>
		<td class="td_right_col"><?php echo $pluginInfo['label']?></td>
	</tr>
	<tr class="blue_row">
		<td class="td_left_col bold">Version:</td>
		<td class="td_right_col"><?php echo $pluginInfo['version']?></td>
	</tr>
	<tr class="white_row">
		<td class="td_left_col bold">Author:</td>
		<td class="td_right_col"><?php echo $pluginInfo['author']?></td>
	</tr>
	<tr class="blue_row">
		<td class="td_left_col bold">Website:</td>
		<td class="td_right_col"><a href="<?php echo $pluginInfo['website']?>" target="_blank"><?php echo $pluginInfo['website']?></a></td>
	</tr>	
	<tr class="white_row">
		<td class="td_left_col bold">Description:</td>
		<td class="td_right_col"><?php echo $pluginInfo['description']?></td>
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
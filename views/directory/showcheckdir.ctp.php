<?php echo showSectionHead($sectionHead); ?>
<form id='search_form'>
<table width="36%" border="0" cellspacing="0" cellpadding="0" class="search">
	<tr>				
		<th>Status: </th>
		<td>
			<select name="stscheck" id="stscheck">
				<option value="0">Inactive</option>			
				<option value="1">Active</option>				
			</select>
		</td>
		<td style="padding-left: 9px;">
			<a href="javascript:void(0);" onclick="scriptDoLoadPost('directories.php', 'search_form', 'subcontent', '&sec=startdircheck')"><img alt="" src="<?=SP_IMGPATH?>/proceed.gif"></a>
		</td>
	</tr>
</table>
</form>
<div id='subcontent'>
	<p class='note'>Click on <b>Proceed</b> to Check Directory Status.</p>
</div>
<?php echo showSectionHead($spTextDir['Check Directory Status']); ?>
<form id='search_form'>
<table width="36%" border="0" cellspacing="0" cellpadding="0" class="search">
	<tr>				
		<th><?=$spText['common']['Status']?>: </th>
		<td>
			<select name="stscheck" id="stscheck">
				<option value="0"><?=$spText['common']['Inactive']?></option>			
				<option value="1"><?=$spText['common']['Active']?></option>				
			</select>
		</td>
		<td style="padding-left: 9px;">
			<a href="javascript:void(0);" onclick="scriptDoLoadPost('directories.php', 'search_form', 'subcontent', '&sec=startdircheck')" class="actionbut">
			<?=$spText['button']['Proceed']?>
			</a>
		</td>
	</tr>
</table>
</form>
<div id='subcontent'>
	<p class='note'><?=$spTextDir['clicktoproceeddirsts']?></p>
</div>
<?php echo showSectionHead($spTextTools['Generate Rank Reports']); ?>
<form id='search_form'>
<table width="400px" border="0" cellspacing="0" cellpadding="0" class="search">
	<tr>
		<th><?=$spText['common']['Website']?>: </th>
		<td>
			<select name="website_id" style='width:170px;' id="website_id">
				<option value="">-- Select --</option>
				<?php foreach($websiteList as $websiteInfo){?>
					<?php if($websiteInfo['id'] == $websiteId){?>
						<option value="<?=$websiteInfo['id']?>" selected><?=$websiteInfo['name']?></option>
					<?php }else{?>
						<option value="<?=$websiteInfo['id']?>"><?=$websiteInfo['name']?></option>
					<?php }?>
				<?php }?>
			</select>
		</td>
		<td><a href="javascript:void(0);" onclick="scriptDoLoadPost('rank.php', 'search_form', 'subcontent', '&sec=generate')" class="actionbut"><?=$spText['button']['Proceed']?></a></td>		
	</tr>
</table>
</form>

<div id='subcontent'>
	<p class='note'><?=$spTextTools['clickgeneratereports']?></p>
</div>
<?php echo showSectionHead($sectionHead); ?>
<form id='search_form'>
<table width="400px" border="0" cellspacing="0" cellpadding="0" class="search">
	<tr>
		<th>Website: </th>
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
		<td><a href="javascript:void(0);" onclick="scriptDoLoadPost('backlinks.php', 'search_form', 'subcontent', '&sec=generate')"><img alt="" src="<?=SP_IMGPATH?>/proceed.gif"></a></td>		
	</tr>
</table>
</form>

<div id='subcontent'>
	<p class='note'>Click on <b>Proceed</b> to generate backlinks reports</p>
</div>
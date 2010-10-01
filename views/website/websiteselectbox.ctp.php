<select name="website_id" id="website_id" style="width:150px;" onchange="<?=$onChange?>">
	<?php if($websiteNull){ ?>
		<option value="">-- <?=$spText['common']['Select']?> --</option>
	<?php } ?>
	<?php foreach($websiteList as $websiteInfo){?>
		<?php if($websiteInfo['id'] == $websiteId){?>
			<option value="<?=$websiteInfo['id']?>" selected><?=$websiteInfo['name']?></option>
		<?php }else{?>
			<option value="<?=$websiteInfo['id']?>"><?=$websiteInfo['name']?></option>
		<?php }?>
	<?php }?>
</select>
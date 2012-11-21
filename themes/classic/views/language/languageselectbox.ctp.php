<?php $langStyle = empty($langStyle) ? 150 : $langStyle; ?>  
<select name="lang_code" id="lang_code" style="width:<?=$langStyle?>px;" onchange="<?=$onChange?>">
	<?php if($langNull){ ?>
		<option value="">-- all --</option>
	<?php } ?>
	<?php foreach($langList as $langInfo){?>
		<?php if($langInfo['lang_code'] == $post['lang_code']){?>
			<option value="<?=$langInfo['lang_code']?>" selected><?=$langInfo['lang_name']?></option>
		<?php }else{?>
			<option value="<?=$langInfo['lang_code']?>"><?=$langInfo['lang_name']?></option>
		<?php }?>
	<?php }?>
</select>

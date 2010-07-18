<?php $seStyle = empty($seStyle) ? 150 : $seStyle; ?>  
<select name="se_id" id="se_id" style="width:<?=$seStyle?>px;" onchange="<?=$onChange?>">
	<?php if($seNull){ ?>
		<option value="">-- Select --</option>
	<?php } ?>
	<?php foreach($seList as $seInfo){?>
		<?php if($seInfo['id'] == $seId){?>
			<option value="<?=$seInfo['id']?>" selected><?=$seInfo['domain']?></option>
		<?php }else{?>
			<option value="<?=$seInfo['id']?>"><?=$seInfo['domain']?></option>
		<?php }?>
	<?php }?>
</select>
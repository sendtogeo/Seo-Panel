<select name="keyword_id" id="keyword_id" style="width:150px;" onchange="<?=$onChange?>">
	<?php if($keyNull){ ?>
		<option value="">-- Select --</option>
	<?php } ?>
	<?php foreach($keywordList as $keywordInfo){?>
		<?php if($keywordInfo['id'] == $keywordId){?>
			<option value="<?=$keywordInfo['id']?>" selected><?=$keywordInfo['name']?></option>
		<?php }else{?>
			<option value="<?=$keywordInfo['id']?>"><?=$keywordInfo['name']?></option>
		<?php }?>
	<?php }?>
</select>
<select name="link_id" id="link_id" onchange="<?php echo $onChange?>">
	<?php if($linkNull){ ?>
		<option value="">-- <?php echo $spText['common']['Select']?> --</option>
	<?php } ?>
	<?php 
	foreach($linkList as $linkInfo){
        $selectedVal = ($linkInfo['id'] == $linkId) ? "selected" : "";
        $label = ($linkInfo['type'] == "linkedin") ? $linkInfo['name'] : $linkInfo['url'];
        ?>
	    <option value="<?php echo $linkInfo['id']?>" <?php echo $selectedVal;?> ><?php echo $label?></option>
		<?php
	}
	?>
</select>
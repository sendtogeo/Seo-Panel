<?php $countryStyle = empty($countryStyle) ? 150 : $countryStyle; ?>  
<select name="country_code" id="country_code" style="width:<?=$countryStyle?>px;" onchange="<?=$onChange?>">
	<?php if($langNull){ ?>
		<option value="">-- all --</option>
	<?php } ?>
	<?php foreach($countryList as $countryInfo){?>
		<?php if($countryInfo['country_code'] == $post['country_code']){?>
			<option value="<?=$countryInfo['country_code']?>" selected><?=$countryInfo['country_name']?></option>
		<?php }else{?>
			<option value="<?=$countryInfo['country_code']?>"><?=$countryInfo['country_name']?></option>
		<?php }?>
	<?php }?>
</select>

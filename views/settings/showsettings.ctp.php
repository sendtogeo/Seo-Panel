<?php echo showSectionHead($sectionHead); ?>
<?php if(!empty($saved)) showSuccessMsg('System settings saved successfully!', false); ?>
<form id="updateSettings">
<input type="hidden" value="update" name="sec">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left" width='30%'>System Settings</td>
		<td class="right">&nbsp;</td>
	</tr>
	<?php 
	foreach( $list as $i => $listInfo){ 
		$class = ($i % 2) ? "blue_row" : "white_row";
		switch($listInfo['set_type']){
			
			case "small":
				$width = 40;
				break;

			case "bool":
				if(empty($listInfo['set_val'])){
					$selectYes = "";					
					$selectNo = "selected";
				}else{					
					$selectYes = "selected";					
					$selectNo = "";
				}
				break;
				
			case "medium":
				$width = 200;
				break;

			case "large":
			case "text":
				$width = 500;
				break;
		}
		?>
		<tr class="<?=$class?>">
			<td class="td_left_col"><?=$listInfo['set_label']?>:</td>
			<td class="td_right_col">
				<?php if($listInfo['set_type'] != 'text'){?>
					<?php if($listInfo['set_type'] == 'bool'){?>
						<select  name="<?=$listInfo['set_name']?>">
							<option value="1" <?=$selectYes?>>Yes</option>
							<option value="0" <?=$selectNo?>>No</option>
						</select>
					<?php }else{?>
						<input type="text" name="<?=$listInfo['set_name']?>" value="<?=stripslashes($listInfo['set_val'])?>" style='width:<?=$width?>px'>
					<?php }?>
				<?php }else{?>
					<textarea name="<?=$listInfo['set_name']?>" style='width:<?=$width?>px'><?=stripslashes($listInfo['set_val'])?></textarea>
				<?php }?>
			</td>
		</tr>
		<?php 
	}
	?>		
	<tr class="blue_row">
		<td class="tab_left_bot_noborder"></td>
		<td class="tab_right_bot"></td>
	</tr>
	<tr class="listBot">
		<td class="left" colspan="1"></td>
		<td class="right"></td>
	</tr>
</table>
<table width="100%" cellspacing="0" cellpadding="0" border="0" class="actionSec">
	<tr>
    	<td style="padding-top: 6px;text-align:right;">
    		<a onclick="scriptDoLoad('settings.php', 'content', 'layout=ajax')" href="javascript:void(0);">
         		<img border="0" alt="" src="<?=SP_IMGPATH?>/cancel.gif"/>
         	</a>
         	<a onclick="confirmSubmit('settings.php', 'updateSettings', 'content')" href="javascript:void(0);">
         		<img border="0" alt="" src="<?=SP_IMGPATH?>/proceed.gif"/>
         	</a>
    	</td>
	</tr>
</table>
</form>
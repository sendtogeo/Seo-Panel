<?php 
$headLabel = empty($headLabel) ? $spTextPanel['System Settings'] : $headLabel;
echo showSectionHead($headLabel);

// if saved successfully
if (!empty($saved)) {
    showSuccessMsg($spTextSettings['syssettingssaved'], false);
}

// save process failed
if (!empty($errorMsg)) {
    echo showErrorMsg($errorMsg, false);
}

?>
<form id="updateSettings">
<input type="hidden" value="update" name="sec">
<input type="hidden" value="<?=$category?>" name="category">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left" width='30%'><?=$headLabel?></td>
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
			<td class="td_left_col"><?=$spTextSettings[$listInfo['set_name']]?>:</td>
			<td class="td_right_col">
				<?php if($listInfo['set_type'] != 'text'){?>
					<?php if($listInfo['set_type'] == 'bool'){?>
						<select  name="<?=$listInfo['set_name']?>">
							<option value="1" <?=$selectYes?>><?=$spText['common']['Yes']?></option>
							<option value="0" <?=$selectNo?>><?=$spText['common']['No']?></option>
						</select>
					<?php }else{?>
						<?php if($listInfo['set_name'] == 'SP_DEFAULTLANG') {?>
							<select name="<?=$listInfo['set_name']?>">
								<?php
								foreach ($langList as $langInfo) {
									$selected = ($langInfo['lang_code'] == $listInfo['set_val']) ? "selected" : "";
									?>			
									<option value="<?=$langInfo['lang_code']?>" <?=$selected?>><?=$langInfo['lang_name']?></option>
									<?php
								}
								?>
							</select>
						<?php } else {
						    $type = ($listInfo['set_name'] == 'SP_SMTP_PASSWORD') ? "password" : "text";
						    ?>
							<input type="<?=$type?>" name="<?=$listInfo['set_name']?>" value="<?=stripslashes($listInfo['set_val'])?>" style='width:<?=$width?>px'>
						<?php }?>
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
    		<a onclick="scriptDoLoad('settings.php?category=<?=$category?>', 'content', 'layout=ajax')" href="javascript:void(0);" class="actionbut">
         		<?=$spText['button']['Cancel']?>
         	</a>&nbsp;
         	<?php $actFun = SP_DEMO ? "alertDemoMsg()" : "confirmSubmit('settings.php', 'updateSettings', 'content')"; ?>
         	<a onclick="<?=$actFun?>" href="javascript:void(0);" class="actionbut">
         		<?=$spText['button']['Proceed']?>
         	</a>
    	</td>
	</tr>
</table>
</form>
<?php echo showSectionHead($sectionHead); ?>
<form id='search_form'>
<table width="88%" border="0" cellspacing="0" cellpadding="0" class="search">
	<tr>
		<?php $submitLink = "scriptDoLoadPost('directories.php', 'search_form', 'content', '&sec=directorymgr')";?>
		<th>Directory: </th>
		<td><input type="text" name="dir_name" value="<?=$info['dir_name']?>" onblur="<?=$submitLink?>"></td>
		<th>Status: </th>
		<td>
			<select name="stscheck" onchange="<?=$submitLink?>">
				<?php foreach($statusList as $key => $val){?>
					<?php if($info['stscheck'] == $val){?>
						<option value="<?=$val?>" selected><?=$key?></option>
					<?php }else{?>
						<option value="<?=$val?>"><?=$key?></option>
					<?php }?>
				<?php }?>
			</select>
		</td>
		<th>Captcha: </th>
		<td>
			<select name="capcheck" onchange="<?=$submitLink?>">
				<option value="">-- All --</option>
				<?php foreach($captchaList as $key => $val){?>
					<?php if($info['capcheck'] == $val){?>
						<option value="<?=$val?>" selected><?=$key?></option>
					<?php }else{?>
						<option value="<?=$val?>"><?=$key?></option>
					<?php }?>
				<?php }?>
			</select>
		</td>
		<td>
			<a href="javascript:void(0);" onclick="scriptDoLoadPost('directories.php', 'search_form', 'content', '&sec=directorymgr')">
				<img alt="" src="<?=SP_IMGPATH?>/show_records.gif">
			</a>
		</td>
	</tr>
</table>
</form>
<?=$pagingDiv?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left">ID</td>		
		<td>Website</td>
		<td>Catpcha</td>
		<td>Status</td>
		<td class="right">Action</td>
	</tr>
	<?php
	$colCount = 5; 
	if(count($list) > 0){
		$catCount = count($list);
		foreach($list as $i => $listInfo){
			$class = ($i % 2) ? "blue_row" : "white_row";
            if($catCount == ($i + 1)){
                $leftBotClass = "tab_left_bot";
                $rightBotClass = "tab_right_bot";
            }else{
                $leftBotClass = "td_left_border td_br_right";
                $rightBotClass = "td_br_right";
            }
            
            $statusLink = $ctrler->getStatusLink($listInfo['id'], $listInfo['working']);
            $checkLink = scriptAJAXLinkHref('directories.php', "status_{$listInfo['id']}", "sec=checkdir&dir_id={$listInfo['id']}&nodebug=1", "Check Status"); 
			?>
			<tr class="<?=$class?>">
				<td class="<?=$leftBotClass?>"><?=$listInfo['id']?></td>
				
				<td class="td_br_right left"><?php echo str_replace('http://', '', $listInfo['domain']); ?></td>
				<td class="td_br_right" id="captcha_<?=$listInfo['id']?>"><?php echo $listInfo['is_captcha'] ? "Yes" : "No";	?></td>
				<td class="td_br_right" id="status_<?=$listInfo['id']?>"><?php echo $statusLink;	?></td>
				<td class="<?=$rightBotClass?>" width="100px"><?php echo $checkLink; ?></td>
			</tr>
			<?php
		}
	}else{	 
		echo showNoRecordsList($colCount-2);		
	} 
	?>
	<tr class="listBot">
		<td class="left" colspan="<?=($colCount-1)?>"></td>
		<td class="right"></td>
	</tr>
</table>
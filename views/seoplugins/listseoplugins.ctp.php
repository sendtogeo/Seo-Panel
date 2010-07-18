<?php echo showSectionHead($sectionHead); ?>
<?php 
if(!empty($msg)){ 
	echo $error ? showErrorMsg($msg, false) : showSuccessMsg($msg, false); 
} 
?>
<?=$pagingDiv?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left">Plugin</td>		
		<td>Author</td>		
		<td>Website</td>
		<td>Status</td>		
		<td>Installation</td>
		<td class="right">Action</td>
	</tr>
	<?php
	$colCount = 6; 
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
		
			if($listInfo['status']){
				$statLabel = "Active";
			}else{
				$statLabel = "Inactive";
			}
            $activateLink = scriptAJAXLinkHref('seo-plugins-manager.php', 'content', "sec=changestatus&seoplugin_id={$listInfo['id']}&status={$listInfo['status']}", $statLabel);
			?>
			<tr class="<?=$class?>">
				<td class="<?=$leftBotClass?>">
					<a href="javascript:void(0);" onclick="scriptDoLoad('seo-plugins-manager.php?sec=listinfo&pid=<?=$listInfo['id']?>', 'content')"><?=$listInfo['label']?> <?=$listInfo['version']?></a>
				</td>				
				<td class="td_br_right left"><?=$listInfo['author']?></td>
				<td class="td_br_right left"><a href="<?=$listInfo['website']?>" target="_blank"><?=$listInfo['website']?></a></td>
				<td class="td_br_right"><?=$activateLink?></td>
				<td class="td_br_right"><? echo $listInfo['installed'] ? "<font class='green'>Success</font>" : "<font class='red'>Failed</font>"; ?></td>
				<td class="<?=$rightBotClass?>" width="100px">
					<select name="action" id="action<?=$listInfo['id']?>" onchange="doAction('seo-plugins-manager.php', 'content', 'pid=<?=$listInfo['id']?>', 'action<?=$listInfo['id']?>')">
						<option value="select">-- Select --</option>
						<option value="edit">Edit</option>
						<option value="upgrade">Upgrade</option>
						<option value="reinstall">Re-install</option>
					</select>
				</td>
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
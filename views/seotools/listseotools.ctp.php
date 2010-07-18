<?php echo showSectionHead($sectionHead); ?>
<?=$pagingDiv?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left">ID</td>
		<td>Name</td>
		<td>User Access</td>
		<td>Reports</td>
		<td>Cron</td>
		<td class="right">Status</td>
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
            $activateLink = scriptAJAXLinkHref('seo-tools-manager.php', 'content', "sec=changestatus&seotool_id={$listInfo['id']}&status={$listInfo['status']}", $statLabel);
            
            $statLabel = ($listInfo['reportgen']) ? "Active" : "Inactive"; 
            $reportgenLink = scriptAJAXLinkHref('seo-tools-manager.php', 'content', "sec=changereportgen&seotool_id={$listInfo['id']}&status={$listInfo['reportgen']}", $statLabel);
            
            $statLabel = ($listInfo['cron']) ? "Active" : "Inactive"; 
            $cronLink = scriptAJAXLinkHref('seo-tools-manager.php', 'content', "sec=changecron&seotool_id={$listInfo['id']}&status={$listInfo['cron']}", $statLabel);
            
            $accessLabel = ($listInfo['user_access']) ? "Yes" : "No"; 
            $accessLink = scriptAJAXLinkHref('seo-tools-manager.php', 'content', "sec=changeaccess&seotool_id={$listInfo['id']}&user_access={$listInfo['user_access']}", $accessLabel);
            
			?>
			<tr class="<?=$class?>">
				<td class="<?=$leftBotClass?>"><?echo $listInfo['id'];?></td>
				<td class="td_br_right left"><? echo $listInfo['name'];?></td>
				<td class="td_br_right"><? echo $accessLink;?></td>				
				<td class="td_br_right"><? echo $reportgenLink;?></td>
				<td class="td_br_right"><? echo $cronLink;?></td>
				<td class="<?=$rightBotClass?>" width="100px"><? echo $activateLink;?></td>
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
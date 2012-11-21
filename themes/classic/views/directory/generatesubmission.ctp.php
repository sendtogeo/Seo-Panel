<table width="100%" border="0" cellspacing="0" cellpadding="2px;" class="list" align='center'>
	<tr>
	<td width='33%'>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left" width='340px'><?=$spText['common']['Directory']?></td>
		<td><?=$spText['common']['Date']?></td>
		<td><?=$spTextDir['Confirmation']?></td>
		<td class="right"><?=$spText['common']['Status']?></td>
	</tr>
	<?php
	$colCount = 4; 
	if(count($list) > 0){
		$catCount = count($list);
		$i = 0;
		foreach($list as $listInfo){
			
			$class = ($i % 2) ? "blue_row" : "white_row";
            if($catCount == ($i + 1)){
                $leftBotClass = "tab_left_bot";
                $rightBotClass = "tab_right_bot";
            }else{
                $leftBotClass = "td_left_border td_br_right";
                $rightBotClass = "td_br_right";
            }
            $confirm = empty($listInfo['status']) ? $spText['common']["No"] : $spText['common']["Yes"];
            $statusId = "status_".$listInfo['id'];
            $checkStatusLink = "<script>scriptDoLoad('directories.php', '$statusId', 'sec=checkstatus&id={$listInfo['id']}');</script>";
			?>
			<tr class="<?=$class?>">
				<td class="<?=$leftBotClass?>" style='text-align:left;padding-left:10px;'><?=$listInfo['domain']?></td>
				<td class='td_br_right'><?php echo date('Y-m-d', $listInfo['submit_time']); ?></td>
				<td class='td_br_right'><?=$confirm?></td>				
				<td class="<?=$rightBotClass?>" id="<?=$statusId?>"><?=$checkStatusLink?></td>
			</tr>
			<?php
			$i++;
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
	</td>
	</tr>
</table>
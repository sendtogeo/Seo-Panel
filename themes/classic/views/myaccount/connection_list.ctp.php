<?php 
echo showSectionHead($spTextPanel["Connections"]);

if ($successMsg) {
	showSuccessMsg($successMsg, false);
}

if ($errorMsg) {
	showErrorMsg($errorMsg, false);
}
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="leftid"><?php echo $spText['common']['Id']?></td>		
		<td><?php echo $spText['label']['Name']?></td>
		<td><?php echo $spText['common']['Status']?></td>
		<td class="right"><?php echo $spText['common']['Action']?></td>
	</tr>
	<?php
	$colCount = 4; 
	if (count($list) > 0) {
		$catCount = count($list);
		
		foreach ($list as $i => $listInfo) {
			$class = ($i % 2) ? "blue_row" : "white_row";
            if ($catCount == ($i + 1)) {
                $leftBotClass = "tab_left_bot";
                $rightBotClass = "tab_right_bot";
            } else {
                $leftBotClass = "td_left_border td_br_right";
                $rightBotClass = "td_br_right";
            }            
			?>
			<tr class="<?php echo $class?>">
				<td class="<?php echo $leftBotClass?>"><?php echo $i + 1;?></td>
				<td class="td_br_right left"><?php echo ucfirst($listInfo['name'])?></td>
				<td class="td_br_right">
					<?php
					if ($listInfo['status']) {
						echo "<b class='success'>{$spTextMyAccount['Connected']}</b>";
					} else {
						echo "<b class='error'>{$spTextMyAccount['Disconnected']}</b>";
					}
					?>
				</td>
				<td class="<?php echo $rightBotClass?>">
					<?php
					if ($listInfo['status']) {
						$disconnectFun = SP_DEMO ? "alertDemoMsg()" :  "confirmLoad('connections.php', 'content', 'action=disconnect&category={$listInfo['name']}')";
						?>
						<a onclick="<?php echo $disconnectFun?>" href="javascript:void(0);"><?php echo $spTextMyAccount['Disconnect']?></a>
						<?php
					} else {
						
						// check whether auth url set
						if ($listInfo['auth_url_info']['auth_url']) {
							?>
							<a href="<?php echo $listInfo['auth_url_info']['auth_url']?>"><?php echo $spTextMyAccount['Connect']?></a>
							<?php
						} else {
							echo "<b class='error'>{$listInfo['auth_url_info']['msg']}</b>";
						}
						
					}
					?>
				</td>
			</tr>
			<?php
		}
	}else{	 
		echo showNoRecordsList($colCount-2);		
	} 
	?>
	<tr class="listBot">
		<td class="left" colspan="<?php echo ($colCount-1)?>"></td>
		<td class="right"></td>
	</tr>
</table>
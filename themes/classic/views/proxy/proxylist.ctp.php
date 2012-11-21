<?php echo showSectionHead($spTextPanel["Proxy Manager"]); ?>
<?=$pagingDiv?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left"><?=$spText['common']['Id']?></td>		
		<td><?=$spText['label']['Proxy']?></td>
		<td><?=$spText['label']['Port']?></td>
		<td><?=$spText['label']['Authentication']?></td>
		<td><?=$spText['common']['Status']?></td>
		<td class="right"><?=$spText['common']['Action']?></td>
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
            $proxyLink = scriptAJAXLinkHref('proxy.php', 'content', "sec=edit&proxyId={$listInfo['id']}", "{$listInfo['proxy']}");
			?>
			<tr class="<?=$class?>">
				<td class="<?=$leftBotClass?>"><?=$listInfo['id']?></td>
				
				<td class="td_br_right left"><?=$proxyLink?></td>
				<td class="td_br_right"><?=$listInfo['port']?></td>
				<td class="td_br_right"><?php echo $listInfo['proxy_auth'] ? $spText['common']["Yes"] : $spText['common']["No"]; ?></td>
				<td class="td_br_right"><?php echo $listInfo['status'] ? $spText['common']["Active"] : $spText['common']["Inactive"]; ?></td>
				<td class="<?=$rightBotClass?>" width="100px">
					<?php
						if($listInfo['status']){
							$statLabel = $spText['common']["Inactivate"];
						}else{
							$statLabel = $spText['common']["Activate"];
						} 
					?>
					<select name="action" id="action<?=$listInfo['id']?>" onchange="doAction('proxy.php', 'content', 'proxyId=<?=$listInfo['id']?>&pageno=<?=$pageNo?>', 'action<?=$listInfo['id']?>')">
						<option value="select">-- <?=$spText['common']['Select']?> --</option>						
						<option value="checkstatus"><?=$spText['button']['Check Status']?></option>
						<option value="<?=$statLabel?>"><?=$statLabel?></option>
						<option value="edit"><?=$spText['common']['Edit']?></option>
						<option value="delete"><?=$spText['common']['Delete']?></option>
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
<table width="100%" cellspacing="0" cellpadding="0" border="0" class="actionSec">
	<tr>
    	<td style="padding-top: 6px;">
         	<a onclick="scriptDoLoad('proxy.php', 'content', 'sec=new')" href="javascript:void(0);" class="actionbut">
         		<?=$spTextPanel['New Proxy']?>
         	</a>
    	</td>
	</tr>
</table>

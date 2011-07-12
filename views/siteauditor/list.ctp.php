<form name="listform" id="listform">
<?php echo showSectionHead($spTextTools['Auditor Projects']); ?>
<?php if(!empty($isAdmin)){ ?>
	<table width="50%" border="0" cellspacing="0" cellpadding="0" class="search">
		<tr>
			<th><?=$spText['common']['User']?>: </th>
			<td>
				<select name="userid" id="userid" onchange="doLoad('userid', 'siteauditor.php', 'content')">
					<option value="">-- <?=$spText['common']['Select']?> --</option>
					<?php foreach($userList as $userInfo){?>
						<?php if($userInfo['id'] == $userId){?>
							<option value="<?=$userInfo['id']?>" selected><?=$userInfo['username']?></option>
						<?php }else{?>
							<option value="<?=$userInfo['id']?>"><?=$userInfo['username']?></option>
						<?php }?>
					<?php }?>
				</select>
			</td>
		</tr>
	</table>
<?php } ?>
<?=$pagingDiv?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="leftid"><input type="checkbox" id="checkall" onclick="checkList('checkall')"></td>
		<td><?=$spText['common']['Id']?></td>		
		<td><?=$spText['common']['Website']?></td>
		<?php if(!empty($isAdmin)){ ?>		
			<td><?=$spText['common']['User']?></td>
		<?php } ?>		
		<td><?=$spTextSA['Maximum Pages']?></td>		
		<td><?=$spTextSA['Pages Found']?></td>		
		<td><?=$spTextSA['Crawled Pages']?></td>		
		<td><?=$spText['label']['Cron']?></td>
		<td><?=$spText['label']['Score']?></td>		
		<td><?=$spText['label']['Updated']?></td>
		<td><?=$spText['common']['Status']?></td>
		<td class="right"><?=$spText['common']['Action']?></td>
	</tr>
	<?php
	$colCount = empty($isAdmin) ? 11 : 12; 
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
            $websiteLink = scriptAJAXLinkHref('siteauditor.php', 'content', "sec=edit&project_id={$listInfo['id']}", "{$listInfo['name']}")
			?>
			<tr class="<?=$class?>">
				<td class="<?=$leftBotClass?>"><input type="checkbox" name="ids[]" value="<?=$listInfo['id']?>"></td>
				<td class="td_br_right"><?=$listInfo['id']?></td>				
				<td class="td_br_right left"><?=$websiteLink?></td>
				<?php if(!empty($isAdmin)){ ?>
					<td class="td_br_right left"><?=$listInfo['username']?></td>
				<?php } ?>
				<td class="td_br_right"><?=$listInfo['max_links']?></td>
				<td class="td_br_right"><?=$listInfo['total_links']?></td>
				<td class="td_br_right"><?=$listInfo['crawled_links']?></td>
				<td class="td_br_right"><?php echo $listInfo['cron'] ? $spText['common']['Yes'] : $spText['common']['No']; ?></td>
				<td class="td_br_right">
				    <?php
			        if ($listInfo['score'] < 0) {
			            $scoreClass = 'minus';
			            $listInfo['score'] = $listInfo['score'] * -1;
			        } else {
			            $scoreClass = 'plus';
			        }
			        for($b=0;$b<=$listInfo['score'];$b++) echo "<span class='$scoreClass'>&nbsp;</span>";
				    ?>					
				</td>
				<td class="td_br_right bold"><?=$listInfo['last_updated']?></td>
				<td class="td_br_right"><?php echo $listInfo['status'] ? $spText['common']["Active"] : $spText['common']["Inactive"];	?></td>
				<td class="<?=$rightBotClass?>" width="100px">
					<?php
						if($listInfo['status']){
							$statVal = "Inactivate";
							$statLabel = $spText['common']["Inactivate"];
						}else{
							$statVal = "Activate";
							$statLabel = $spText['common']["Activate"];
						} 
					?>
					<select style="width: 110px;" name="action" id="action<?=$listInfo['id']?>" onchange="doAction('siteauditor.php', 'content', 'project_id=<?=$listInfo['id']?>&pageno=<?=$pageNo?>', 'action<?=$listInfo['id']?>')">
						<option value="select">-- <?=$spText['common']['Select']?> --</option>
						<?php if ($listInfo['status']) {?>
    						<?php if ($listInfo['max_links'] > $listInfo['crawled_links']) {?>
    							<option value="showrunproject"><?=$spTextSA['Run Project']?></option>
    						<?php }?>
    						<?php if ($listInfo['total_links'] > 0) {?>
    							<option value="viewreports"><?=$spText['label']['View Reports']?></option>
    							<option value="recheckreport"><?=$spTextSA['Recheck Pages']?></option>
    						<?php }?>
    					<?php } ?>
						<option value="<?=$statVal?>"><?=$statLabel?></option>
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
<?php
if (SP_DEMO) {
    $actFun = $inactFun = $delFun = "alertDemoMsg()";
} else {
    $actFun = "confirmSubmit('siteauditor.php', 'listform', 'content', '&sec=activateall&pageno=$pageNo')";
    $inactFun = "confirmSubmit('siteauditor.php', 'listform', 'content', '&sec=inactivateall&pageno=$pageNo')";
    $delFun = "confirmSubmit('siteauditor.php', 'listform', 'content', '&sec=deleteall&pageno=$pageNo')";
}   
?>
<table width="100%" cellspacing="0" cellpadding="0" border="0" class="actionSec">
	<tr>
    	<td style="padding-top: 6px;">
         	<a onclick="scriptDoLoad('siteauditor.php', 'content', 'sec=new')" href="javascript:void(0);" class="actionbut">
         		<?=$spTextPanel['New Project']?>
         	</a>&nbsp;&nbsp;
         	<a onclick="<?=$actFun?>" href="javascript:void(0);" class="actionbut">
         		<?=$spText['common']["Activate"]?>
         	</a>&nbsp;&nbsp;
         	<a onclick="<?=$inactFun?>" href="javascript:void(0);" class="actionbut">
         		<?=$spText['common']["Inactivate"]?>
         	</a>&nbsp;&nbsp;
         	<a onclick="<?=$delFun?>" href="javascript:void(0);" class="actionbut">
         		<?=$spText['common']['Delete']?>
         	</a>
    	</td>
	</tr>
</table>
</form>
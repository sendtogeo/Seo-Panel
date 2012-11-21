<form name="listform" id="listform">
<?php echo showSectionHead($spTextPanel['Search Engine Manager']); ?>
<?=$pagingDiv?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="leftid"><input type="checkbox" id="checkall" onclick="checkList('checkall')"></td>
		<td><?=$spText['common']['Id']?></td>
		<td><?=$spText['common']['Name']?></td>
		<td><?=$spTextSE['no_of_results_page']?></td>
		<td><?=$spTextSE['max_results']?></td>
		<td><?=$spText['common']['Status']?></td>
		<td class="right"><?=$spText['common']['Action']?></td>
	</tr>
	<?php
	$colCount = 7; 
	if(count($seList) > 0){
		$catCount = count($seList);
		foreach($seList as $i => $seInfo){
			$class = ($i % 2) ? "blue_row" : "white_row";
            if($catCount == ($i + 1)){
                $leftBotClass = "tab_left_bot";
                $rightBotClass = "tab_right_bot";
            }else{
                $leftBotClass = "td_left_border td_br_right";
                $rightBotClass = "td_br_right";
            }
			?>
			<tr class="<?=$class?>">				
				<td class="<?=$leftBotClass?>"><input type="checkbox" name="ids[]" value="<?=$seInfo['id']?>"></td>
				<td class="td_br_right"><?=$seInfo['id']?></td>
				<td class="td_br_right left"><?=$seInfo['domain']?></td>
				<td class="td_br_right"><?=$seInfo['no_of_results_page']?></td>
				<td class="td_br_right"><?=$seInfo['max_results']?></td>
				<td class="td_br_right"><?php echo $seInfo['status'] ? $spText['common']["Active"] : $spText['common']["Inactive"];	?></td>
				<td class="<?=$rightBotClass?>" width="100px">
					<?php
						if($seInfo['status']){
							$statVal = "Inactivate";
							$statLabel = $spText['common']["Inactivate"];
						}else{
							$statVal = "Activate";
							$statLabel = $spText['common']["Activate"];
						} 
					?>
					<select name="action" id="action<?=$seInfo['id']?>" onchange="doAction('searchengine.php', 'content', 'seId=<?=$seInfo['id']?>&pageno=<?=$pageNo?>', 'action<?=$seInfo['id']?>')">
						<option value="select">-- <?=$spText['common']['Select']?> --</option>
						<option value="<?=$statVal?>"><?=$statLabel?></option>
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
    $actFun = "confirmSubmit('searchengine.php', 'listform', 'content', '&sec=activateall&pageno=$pageNo')";
    $inactFun = "confirmSubmit('searchengine.php', 'listform', 'content', '&sec=inactivateall&pageno=$pageNo')";
    $delFun = "confirmSubmit('searchengine.php', 'listform', 'content', '&sec=deleteall&pageno=$pageNo')";
}   
?>
<table width="100%" cellspacing="0" cellpadding="0" border="0" class="actionSec">
	<tr>
    	<td style="padding-top: 6px;">
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
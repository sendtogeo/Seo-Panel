<?php 
echo showSectionHead($spTextPanel["Proxy Manager"]);
$searchFun = "scriptDoLoadPost('proxy.php', 'listform', 'content')"; 
?>
<form name="listform" id="listform" onsubmit="<?=$searchFun?>">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="search">
	<tr>
		<th><?=$spText['common']['Keyword']?>: </th>
		<td><input type="text" name="keyword" value="<?=htmlentities($keyword, ENT_QUOTES)?>" onblur="<?=$searchFun?>"></td>
		<th><?=$spText['common']['Status']?>: </th>
		<td>
			<select name="status" onchange="<?=$searchFun?>">
				<option value="">-- <?=$spText['common']['Select']?> --</option>
				<?php				
				$inactCheck = $actCheck = "";
				if ($statVal == 'active') {
				    $actCheck = "selected";
				} elseif($statVal == 'inactive') {
				    $inactCheck = "selected";
				}
				?>
				<option value="active" <?=$actCheck?> ><?=$spText['common']["Active"]?></option>
				<option value="inactive" <?=$inactCheck?> ><?=$spText['common']["Inactive"]?></option>
			</select>
		</td>
		<td>
			<a href="javascript:void(0);" onclick="<?=$searchFun?>" class="actionbut"><?=$spText['button']['Show Records']?></a>
		</td>
	</tr>
</table>
<?=$pagingDiv?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="leftid"><input type="checkbox" id="checkall" onclick="checkList('checkall')"></td>
		<td><?=$spText['common']['Id']?></td>		
		<td><?=$spText['label']['Proxy']?></td>
		<td><?=$spText['label']['Port']?></td>
		<td><?=$spText['label']['Authentication']?></td>
		<td><?=$spText['common']['Status']?></td>
		<td class="right"><?=$spText['common']['Action']?></td>
	</tr>
	<?php
	$colCount = 7; 
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
				<td class="<?=$leftBotClass?>"><input type="checkbox" name="ids[]" value="<?=$listInfo['id']?>"></td>
				<td class="td_br_right"><?=$listInfo['id']?></td>
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
					<select name="action" id="action<?=$listInfo['id']?>" onchange="doAction('proxy.php', 'content', 'proxyId=<?=$listInfo['id']?>&pageno=<?=$pageNo?><?=$urlParams?>', 'action<?=$listInfo['id']?>')">
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
<?php
if (SP_DEMO) {
    $actFun = $inactFun = $delFun = "alertDemoMsg()";
} else {
    $actFun = "confirmSubmit('proxy.php', 'listform', 'content', '&sec=activateall&pageno=$pageNo')";
    $inactFun = "confirmSubmit('proxy.php', 'listform', 'content', '&sec=inactivateall&pageno=$pageNo')";
    $delFun = "confirmSubmit('proxy.php', 'listform', 'content', '&sec=deleteall&pageno=$pageNo')";
    $checkFun = "confirmSubmit('proxy.php', 'listform', 'content', '&sec=checkall&pageno=$pageNo')";
}   
?>
<table width="100%" cellspacing="0" cellpadding="0" border="0" class="actionSec">
	<tr>
    	<td style="padding-top: 6px;" class='left'>
         	<a onclick="scriptDoLoad('proxy.php', 'content', 'sec=new')" href="javascript:void(0);" class="actionbut">
         		<?=$spTextPanel['New Proxy']?>
         	</a>&nbsp;&nbsp;
         	<a onclick="<?=$checkFun?>" href="javascript:void(0);" class="actionbut">
         		<?=$spText['button']["Check Status"]?>
         	</a>&nbsp;&nbsp;
         	<a onclick="<?=$actFun?>" href="javascript:void(0);" class="actionbut">
         		<?=$spText['common']["Activate"]?>
         	</a>&nbsp;&nbsp;
         	<a onclick="<?=$inactFun?>" href="javascript:void(0);" class="actionbut">
         		<?=$spText['common']["Inactivate"]?>
         	</a>&nbsp;&nbsp;
         	<a onclick="<?=$delFun?>" href="javascript:void(0);" class="actionbut">
         		<?=$spText['common']['Delete']?>
         	</a>&nbsp;&nbsp;
         	<a target="_blank" href="http://www.squidproxies.com/billing/aff.php?aff=249" class="actionbut">
         		Get Proxy
         	</a>
    	</td>
	</tr>
</table>
</form>

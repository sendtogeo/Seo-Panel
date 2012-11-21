<?php
echo showSectionHead($spTextTools['Keywords Manager']);
$searchFun = "scriptDoLoadPost('keywords.php', 'listform', 'content')";
?>
<form name="listform" id="listform">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="search">
	<tr>
		<th><?=$spText['common']['Keyword']?>: </th>
		<td><input type="text" name="keyword" value="<?=$keyword?>" onblur="<?=$searchFun?>"></td>
		<th><?=$spText['common']['Website']?>: </th>
		<td>
			<select name="website_id" id="website_id" onchange="<?=$searchFun?>">
				<option value="">-- <?=$spText['common']['Select']?> --</option>
				<?php foreach($websiteList as $websiteInfo){?>
					<?php if($websiteInfo['id'] == $websiteId){?>
						<option value="<?=$websiteInfo['id']?>" selected><?=$websiteInfo['name']?></option>
					<?php }else{?>
						<option value="<?=$websiteInfo['id']?>"><?=$websiteInfo['name']?></option>
					<?php }?>
				<?php }?>
			</select>
		</td>
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
		<td><?=$spText['common']['Name']?></td>
		<td><?=$spText['common']['Website']?></td>
		<td><?=$spText['common']['Country']?></td>
		<td><?=$spText['common']['lang']?></td>
		<td><?=$spText['common']['Status']?></td>
		<td class="right"><?=$spText['common']['Action']?></td>
	</tr>
	<?php
	$colCount = 8; 
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
            $keywordLink = scriptAJAXLinkHref('keywords.php', 'content', "sec=edit&keywordId={$listInfo['id']}", "{$listInfo['name']}")
			?>
			<tr class="<?=$class?>">
				<td class="<?=$leftBotClass?>"><input type="checkbox" name="ids[]" value="<?=$listInfo['id']?>"></td>
				<td class="td_br_right"><?=$listInfo['id']?></td>
				<td class="td_br_right left"><?=$keywordLink?></td>
				<td class="td_br_right left"><?=$listInfo['website']?></td>
				<td class="td_br_right"><? echo empty($listInfo['country_name']) ? $spText['common']["All"] : $listInfo['country_name']; ?></td>
				<td class="td_br_right"><? echo empty($listInfo['lang_name']) ? $spText['common']["All"] : $listInfo['lang_name']; ?></td>
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
					<select name="action" id="action<?=$listInfo['id']?>" onchange="doAction('keywords.php', 'content', 'keywordId=<?=$listInfo['id']?>&pageno=<?=$pageNo?>&website_id=<?=$websiteId?>', 'action<?=$listInfo['id']?>')">
						<option value="select">-- <?=$spText['common']['Select']?> --</option>
						<?if($listInfo['webstatus'] && $listInfo['status']){?>
							<option value="reports"><?=$spText['common']['Reports']?></option>
						<?php }?>
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
    $actFun = "confirmSubmit('keywords.php', 'listform', 'content', '&sec=activateall&pageno=$pageNo')";
    $inactFun = "confirmSubmit('keywords.php', 'listform', 'content', '&sec=inactivateall&pageno=$pageNo')";
    $delFun = "confirmSubmit('keywords.php', 'listform', 'content', '&sec=deleteall&pageno=$pageNo')";
}   
?>
<table width="100%" cellspacing="0" cellpadding="0" border="0" class="actionSec">
	<tr>
    	<td style="padding-top: 6px;">
         	<a onclick="scriptDoLoad('keywords.php', 'content', 'sec=new&website_id=<?=$websiteId?>')" href="javascript:void(0);" class="actionbut">
         		<?=$spTextKeyword['New Keyword']?>
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
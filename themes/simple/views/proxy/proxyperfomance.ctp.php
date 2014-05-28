<?php 
echo showSectionHead($spTextPanel["Proxy Perfomance"]);
$searchFun = "scriptDoLoadPost('proxy.php', 'listform', 'content')";
?>
<form name="listform" id="listform" onsubmit="<?=$searchFun?>">
<input type="hidden" name="sec" value="perfomance">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="search">
	<tr>
		<th><?=$spText['button']['Search']?>: </th>
		<td><input type="text" name="keyword" value="<?=htmlentities($keyword, ENT_QUOTES)?>" onblur="<?=$searchFun?>"></td>
		<th><?=$spText['common']['Period']?>:</th>
    	<td width="236px">
    		<input type="text" style="width: 80px;margin-right:0px;" value="<?=$fromTime?>" name="from_time"/> 
    		<img align="bottom" onclick="displayDatePicker('from_time', false, 'ymd', '-');" src="<?=SP_IMGPATH?>/cal.gif"/> 
    		<input type="text" style="width: 80px;margin-right:0px;" value="<?=$toTime?>" name="to_time"/> 
    		<img align="bottom" onclick="displayDatePicker('to_time', false, 'ymd', '-');" src="<?=SP_IMGPATH?>/cal.gif"/>
    	</td>
		<th><?=$spText['label']['Order By']?>: </th>
		<td>
			<select name="order_by" onchange="<?=$searchFun?>">
				<?php				
				$inactCheck = $actCheck = "";
				if ($statVal == 'success') {
				    $actCheck = "selected";
				} elseif($statVal == 'fail') {
				    $inactCheck = "selected";
				}
				?>
				<option value="success" <?=$actCheck?> ><?=$spText['label']["Success"]?></option>
				<option value="fail" <?=$inactCheck?> ><?=$spText['label']["Fail"]?></option>
			</select>
		</td>
		<td>
			<a href="javascript:void(0);" onclick="<?=$searchFun?>" class="actionbut"><?=$spText['button']['Search']?></a>
		</td>
	</tr>
</table>
<?=$pagingDiv?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="leftid"><input type="checkbox" id="checkall" onclick="checkList('checkall')"></td>
		<td><?=$spText['common']['Id']?></td>
		<td><?=$spText['label']['Proxy']?></td>
		<td><?=$spTextProxy['Request Count']?></td>
		<td><?=$spText['label']['Success']?></td>
		<td class="right"><?=$spText['label']['Fail']?></td>
	</tr>
	<?php
	$colCount = 6; 
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
            
            $logLink = scriptAJAXLinkHrefDialog('proxy.php', 'content', "sec=edit&proxyId=".$listInfo['proxy_id'], $listInfo['proxy'].":".$listInfo['port']);
            $countLink = scriptAJAXLinkHrefDialog('log.php', 'content', "sec=crawl_log"."$urlParams&status=&proxy_id=".$listInfo['proxy_id'], $listInfo['count'], '', 'OnClick', 1000);
			$successLink = scriptAJAXLinkHrefDialog('log.php', 'content', "sec=crawl_log"."$urlParams&status=success&proxy_id=".$listInfo['proxy_id'], $listInfo['success'], '', 'OnClick', 1000);
			$failLink = scriptAJAXLinkHrefDialog('log.php', 'content', "sec=crawl_log"."$urlParams&status=fail&proxy_id=".$listInfo['proxy_id'], $listInfo['fail'], '', 'OnClick', 1000);
            ?>
			<tr class="<?=$class?>">
				<td class="<?=$leftBotClass?>"><input type="checkbox" name="ids[]" value="<?=$listInfo['id']?>"></td>
				<td class="td_br_right"><?=$listInfo['proxy_id']?></td>
				<td class="td_br_right left"><?=$logLink?></td>
				<td class="td_br_right"><?=$countLink?></td>
				<td class="td_br_right"><?=$successLink?></td>
				<td class="<?=$rightBotClass?>"><?=$failLink?></td>
			</tr>
			<?php
		}
	} else {	 
		echo showNoRecordsList($colCount-2);		
	} 
	?>
	<tr class="listBot">
		<td class="left" colspan="<?=($colCount-1)?>"></td>
		<td class="right"></td>
	</tr>
</table>
</form>

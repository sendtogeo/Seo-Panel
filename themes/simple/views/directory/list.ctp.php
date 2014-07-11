<?php echo showSectionHead($spTextPanel['Directory Manager']); ?>
<form id='search_form'>
<table width="88%" border="0" cellspacing="0" cellpadding="0" class="search">
	<?php $submitLink = "scriptDoLoadPost('directories.php', 'search_form', 'content', '&sec=directorymgr')";?>
	<tr>
		<th><?=$spText['common']['Directory']?>: </th>
		<td width="100px"><input type="text" name="dir_name" value="<?=htmlentities($info['dir_name'], ENT_QUOTES)?>" onblur="<?=$submitLink?>"></td>
		<th><?=$spText['common']['Status']?>: </th>
		<td width="100px">
			<select name="stscheck" onchange="<?=$submitLink?>">
				<?php foreach($statusList as $key => $val){?>
					<?php if($info['stscheck'] == $val){?>
						<option value="<?=$val?>" selected><?=$key?></option>
					<?php }else{?>
						<option value="<?=$val?>"><?=$key?></option>
					<?php }?>
				<?php }?>
			</select>
		</td>
		<th><?=$spTextDir['Captcha']?>: </th>
		<td>
			<select name="capcheck" onchange="<?=$submitLink?>">
				<option value="">-- All --</option>
				<?php foreach($captchaList as $key => $val){?>
					<?php if($info['capcheck'] == $val){?>
						<option value="<?=$val?>" selected><?=$key?></option>
					<?php }else{?>
						<option value="<?=$val?>"><?=$key?></option>
					<?php }?>
				<?php }?>
			</select>
		</td>		
	</tr>
	<tr>		
		<th><?=$spText['common']['Google Pagerank']?>: </th>
		<td>
			<select name="google_pagerank" onchange="<?=$submitLink?>">
				<option value="">-- <?=$spText['common']['Select']?> --</option>				
				<?php
				for ($i=0; $i<=10; $i++) {
					$selected = (($info['google_pagerank'] != '') && ($i == $info['google_pagerank'])) ? "selected" : "";					
					?>			
					<option value="<?=$i?>" <?=$selected?>>PR <?=$i?></option>
					<?php
				}
				?>
			</select>
		</td>
		<th><?=$spText['common']['lang']?>: </th>
		<td>
			<select name="lang_code" onchange="<?=$submitLink?>">
				<option value="">-- <?=$spText['common']['Select']?> --</option>
				<?php
				foreach ($langList as $langInfo) {
					$selected = ($langInfo['lang_code'] == $info['lang_code']) ? "selected" : "";
					?>			
					<option value="<?=$langInfo['lang_code']?>" <?=$selected?>><?=$langInfo['lang_name']?></option>
					<?php
				}
				?>
			</select>
		</td>
		<td colspan="2" style="text-align: center;">
			<a href="javascript:void(0);" onclick="scriptDoLoadPost('directories.php', 'search_form', 'content', '&sec=directorymgr')" class="actionbut">
				<?=$spText['button']['Show Records']?>
			</a>
		</td>
	</tr>
</table>
<br></br>
</form>
<?=$pagingDiv?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left"><?=$spText['common']['Id']?></td>		
		<td><?=$spText['common']['Website']?></td>
		<td>PR</td>
		<td><?=$spTextDir['Captcha']?></td>
		<td><?=$spText['common']['lang']?></td>
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
            
            $statusLink = $ctrler->getStatusLink($listInfo['id'], $listInfo['working']);
            $checkLink = scriptAJAXLinkHref('directories.php', "status_{$listInfo['id']}", "sec=checkdir&dir_id={$listInfo['id']}&nodebug=1&checkpr=1", $spText['button']["Check Status"]); 
			?>
			<tr class="<?=$class?>">
				<td class="<?=$leftBotClass?>"><?=$listInfo['id']?></td>
				
				<td class="td_br_right left"><a target="_blank" href="<?=$listInfo['submit_url']?>"><?php echo str_replace('http://', '', $listInfo['domain']); ?></a></td>
				<td class="td_br_right" id="pr_<?=$listInfo['id']?>"><?=$listInfo['google_pagerank']?></td>
				<td class="td_br_right" id="captcha_<?=$listInfo['id']?>"><?php echo $listInfo['is_captcha'] ? $spText['common']["Yes"] : $spText['common']["No"];	?></td>
				<td class="td_br_right"><?=$listInfo['lang_name']?></td>
				<td class="td_br_right" id="status_<?=$listInfo['id']?>"><?php echo $statusLink;	?></td>
				<td class="<?=$rightBotClass?>" width="100px"><?php echo $checkLink; ?></td>
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
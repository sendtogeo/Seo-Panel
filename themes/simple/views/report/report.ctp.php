<?php echo showSectionHead($spTextKeyword['Detailed Keyword Position Reports']); ?>
<form id='search_form'>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="search">
	<tr>
		<th><?=$spText['common']['Website']?>: </th>
		<td>
			<select name="website_id" id="website_id" style='width:190px;' onchange="doLoad('website_id', 'keywords.php', 'keyword_area', 'sec=keywordbox')">
				<?php foreach($websiteList as $websiteInfo){?>
					<?php if($websiteInfo['id'] == $websiteId){?>
						<option value="<?=$websiteInfo['id']?>" selected><?=$websiteInfo['name']?></option>
					<?php }else{?>
						<option value="<?=$websiteInfo['id']?>"><?=$websiteInfo['name']?></option>
					<?php }?>
				<?php }?>
			</select>
		</td>
		<th><?=$spText['common']['Keyword']?>: </th>
		<td id="keyword_area" colspan='3'>
			<?php echo $this->render('keyword/keywordselectbox', 'ajax'); ?>
		</td>
	</tr>
	<tr>
		<th><?=$spText['common']['Period']?>:</th>
		<td>
			<input type="text" style="width: 80px;margin-right:0px;" value="<?=$fromTime?>" name="from_time"/> 
			<img align="bottom" onclick="displayDatePicker('from_time', false, 'ymd', '-');" src="<?=SP_IMGPATH?>/cal.gif"/> 
			<input type="text" style="width: 80px;margin-right:0px;" value="<?=$toTime?>" name="to_time"/> 
			<img align="bottom" onclick="displayDatePicker('to_time', false, 'ymd', '-');" src="<?=SP_IMGPATH?>/cal.gif"/>
		</td>		
		<th><?=$spText['common']['Search Engine']?>: </th>
		<td>
			<?php echo $this->render('searchengine/seselectbox', 'ajax'); ?>
		</td>
		<td colspan="2"><a href="javascript:void(0);" onclick="scriptDoLoadPost('reports.php', 'search_form', 'content')" class="actionbut"><?=$spText['button']['Show Records']?></a></td>
	</tr>
</table>
</form>

<?php
	if(empty($keywordId)){
		?>
		<p class='note error'><?=$spText['common']['No Keywords Found']?>!</p>
		<?php
		exit;
	} 
?>

<div id='subcontent'>
<table width="100%" border="0" cellspacing="0" cellpadding="2px;" class="list">
	<tr>
	<td width='33%'>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left"><?=$spText['common']['Date']?></td>
		<td><?=$seInfo['domain']?> <?=$spText['common']['Results']?></td>
		<td class="right"><?=$spText['common']['Rank']?></td>
	</tr>
	<?php
	$colCount = 3; 
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
            $scriptLink = "sec=show-info&keyId={$listInfo['keyword_id']}&time={$listInfo['time']}&seId=$seId";
            $dateLink = scriptAJAXLinkHref('reports.php', 'subcontent', $scriptLink, date('Y-m-d', $listInfo['time']) );
			?>
			<tr class="<?=$class?>">
				<td class="<?=$leftBotClass?>" width='100px;'><?php echo $dateLink; ?></td>
				<td class='td_br_right' id='seresult'>
					<a href='<?=$listInfo['url']?>' target='_blank'><? echo stripslashes($listInfo['title']);?></a>
					<p><? echo stripslashes($listInfo['description']);?><p>
					<label><?=$listInfo['url']?></label>
				</td>
				<td class="<?=$rightBotClass?>" width="100px" style='text-align:left;'><b><?=$listInfo['rank'].'</b> '. $listInfo['rank_diff']?></td>
			</tr>
			<?php
			$i++;
		}
	}else{
		?>
		<tr class="blue_row">
		    <td class="tab_left_bot_noborder">&nbsp;</td>
		    <td class="td_bottom_border" colspan="1"><?=$spText['common']['No Records Found']?>!</td>
		    <td class="tab_right_bot">&nbsp;</td>
		</tr>
		<?		
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
</div>
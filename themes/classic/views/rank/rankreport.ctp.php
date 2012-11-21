<?php echo showSectionHead($spTextRank['Google and Alexa Rank Reports']); ?>
<form id='search_form'>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="search">
	<tr>
		<th><?=$spText['common']['Website']?>: </th>
		<td>
			<select name="website_id" id="website_id" style='width:190px;' onchange="scriptDoLoadPost('rank.php', 'search_form', 'content', '&sec=reports')">
				<?php foreach($websiteList as $websiteInfo){?>
					<?php if($websiteInfo['id'] == $websiteId){?>
						<option value="<?=$websiteInfo['id']?>" selected><?=$websiteInfo['name']?></option>
					<?php }else{?>
						<option value="<?=$websiteInfo['id']?>"><?=$websiteInfo['name']?></option>
					<?php }?>
				<?php }?>
			</select>
		</td>
		<th><?=$spText['common']['Period']?>:</th>
		<td>
			<input type="text" style="width: 80px;margin-right:0px;" value="<?=$fromTime?>" name="from_time"/> 
			<img align="bottom" onclick="displayDatePicker('from_time', false, 'ymd', '-');" src="<?=SP_IMGPATH?>/cal.gif"/> 
			<input type="text" style="width: 80px;margin-right:0px;" value="<?=$toTime?>" name="to_time"/> 
			<img align="bottom" onclick="displayDatePicker('to_time', false, 'ymd', '-');" src="<?=SP_IMGPATH?>/cal.gif"/>
		</td>
		<td colspan="2"><a href="javascript:void(0);" onclick="scriptDoLoadPost('rank.php', 'search_form', 'content', '&sec=reports')" class="actionbut"><?=$spText['button']['Show Records']?></a></td>
	</tr>
</table>
</form>

<?php
	if(empty($websiteId)){
		?>
		<p class='note error'><?=$spText['common']['No Records Found']?>!</p>
		<?php
		exit;
	} 
?>

<div id='subcontent'>
<table width="100%" border="0" cellspacing="0" cellpadding="2px;" class="list" align='center'>
	<tr>
	<td width='33%'>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left"><?=$spText['common']['Date']?></td>
		<td><?=$spText['common']['Google Pagerank']?></td>
		<td class="right"><?=$spText['common']['Alexa Rank']?></td>
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
			?>
			<tr class="<?=$class?>">
				<td class="<?=$leftBotClass?>"><?php echo date('Y-m-d', $listInfo['result_time']); ?></td>
				<td class='td_br_right' style='text-align:left;padding-left:120px;'><b><?=$listInfo['google_pagerank'].'</b> '. $listInfo['rank_diff_google']?></td>
				<td class="<?=$rightBotClass?>" style='text-align:left;padding-left:160px;'><b><?=$listInfo['alexa_rank'].'</b> '. $listInfo['rank_diff_alexa']?></td>
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
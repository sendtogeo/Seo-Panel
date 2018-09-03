<?php echo showSectionHead($spTextTools['Website Search Reports']); ?>
<form id='search_form'>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="search">
	<tr>
		<th><?php echo $spText['common']['Website']?>: </th>
		<td>
			<select name="website_id" id="website_id" style='width:190px;' onchange="scriptDoLoadPost('webmaster-tools.php', 'search_form', 'content', '&sec=viewWebsiteSearchReports')">
				<?php foreach($websiteList as $websiteInfo){?>
					<?php if($websiteInfo['id'] == $websiteId){?>
						<option value="<?php echo $websiteInfo['id']?>" selected><?php echo $websiteInfo['name']?></option>
					<?php }else{?>
						<option value="<?php echo $websiteInfo['id']?>"><?php echo $websiteInfo['name']?></option>
					<?php }?>
				<?php }?>
			</select>
		</td>
		<th><?php echo $spText['common']['Period']?>:</th>
		<td>
			<input type="text" style="width: 80px;margin-right:0px;" value="<?php echo $fromTime?>" name="from_time"/> 
			<img align="bottom" onclick="displayDatePicker('from_time', false, 'ymd', '-');" src="<?php echo SP_IMGPATH?>/cal.gif"/> 
			<input type="text" style="width: 80px;margin-right:0px;" value="<?php echo $toTime?>" name="to_time"/> 
			<img align="bottom" onclick="displayDatePicker('to_time', false, 'ymd', '-');" src="<?php echo SP_IMGPATH?>/cal.gif"/>
		</td>
		<td colspan="2">
			<a href="javascript:void(0);" onclick="scriptDoLoadPost('webmaster-tools.php', 'search_form', 'content', '&sec=viewWebsiteSearchReports')" class="actionbut">
				<?php echo $spText['button']['Show Records']?>
			</a>
		</td>
	</tr>
</table>
</form>

<?php
if(empty($websiteId)){
	?>
	<p class='note error'><?php echo $spText['common']['No Records Found']?>!</p>
	<?php
	exit;
}
?>

<br><br>
<div id='subcontent'>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left"><?php echo $spText['common']['Date']?></td>
		<td><?php echo $spText['label']['Clicks']?></td>
		<td><?php echo $spText['label']['Impressions']?></td>
		<td><?php echo "CTR"?></td>
		<td class="right"><?php echo $spTextWB['Average Position']?></td>
	</tr>
	<?php
	$colCount = 4; 
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
			<tr class="<?php echo $class?>">
				<td class="<?php echo $leftBotClass?>"><?php echo $listInfo['report_date']; ?></td>
				<td class='td_br_right left'><b><?php echo $listInfo['clicks'].'</b> '. $listInfo['rank_diff_clicks']?></td>
				<td class='td_br_right left'><b><?php echo $listInfo['impressions'].'</b> '. $listInfo['rank_diff_impressions']?></td>
				<td class='td_br_right left'><b><?php echo $listInfo['ctr'].'</b> '. $listInfo['rank_diff_ctr']?></td>
				<td class="<?php echo $rightBotClass?>" style='text-align:left;padding-left:10px;'><b><?php echo $listInfo['average_position'].'</b> '. $listInfo['rank_diff_average_position']?></td>
			</tr>
			<?php
			$i++;
		}
	}else{
		?>
		<tr class="blue_row">
		    <td class="tab_left_bot_noborder">&nbsp;</td>
		    <td class="td_bottom_border" colspan="<?php echo ($colCount-1)?>"><?php echo $spText['common']['No Records Found']?>!</td>
		    <td class="tab_right_bot">&nbsp;</td>
		</tr>
		<?php		
	} 
	?>
	<tr class="listBot">
		<td class="left" colspan="<?php echo ($colCount-1)?>"></td>
		<td class="right"></td>
	</tr>
</table>
</div>
<?php echo showSectionHead($spTextTools['PageSpeed Reports']); ?>
<form id='search_form'>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="search">
	<tr>
		<th><?php echo $spText['common']['Website']?>: </th>
		<td>
			<select name="website_id" id="website_id" style='width:190px;' onchange="scriptDoLoadPost('pagespeed.php', 'search_form', 'content', '&sec=reports')">
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
		<td colspan="2"><a href="javascript:void(0);" onclick="scriptDoLoadPost('pagespeed.php', 'search_form', 'content', '&sec=reports')" class="actionbut"><?php echo $spText['button']['Show Records']?></a></td>
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

<div id='subcontent'>
<table width="100%" border="0" cellspacing="0" cellpadding="2px;" class="list" align='center'>
	<tr>
	<td width='33%'>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left"><?php echo $spText['common']['Date']?></td>
		<td><?php echo $spTextPS['Desktop Speed']?></td>
		<td><?php echo $spTextPS['Mobile Speed']?></td>
		<td class="right"><?php echo $spTextPS['Mobile Usability']?></td>
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
				<td class="<?php echo $leftBotClass?>"><?php echo $listInfo['result_date']; ?></td>
				<td class='td_br_right' style='text-align:left;padding-left:40px;'><a><?php echo $listInfo['desktop_speed_score'].'</a> '. $listInfo['rank_diff_desktop_speed_score']?></td>
				<td class='td_br_right' style='text-align:left;padding-left:40px;'><a><?php echo $listInfo['mobile_speed_score'].'</a> '. $listInfo['rank_diff_mobile_speed_score']?></td>
				<td class='<?php echo $rightBotClass?>' style='text-align:left;padding-left:40px;'>
					<a><?php echo $listInfo['mobile_usability_score'].'</a> '. $listInfo['rank_diff_mobile_usability_score']?>
					<?php 
					if ($i == 0) {
						
						// if loaded through popup
						if ($fromPopUp) {
							$detailsLink = "scriptDoLoad('index.php', 'popup_tmp', 'sec=showdiv&div_id=details_id')";
						} else {	
							$detailsLink = "scriptDoLoadDialog('index.php', 'tmp', 'sec=showdiv&div_id=details_id', 1000, 800)";
						}
						?>
						&nbsp;&nbsp;
						<a href="javascript:void(0);" onclick="<?php echo $detailsLink;?>"><?php echo $spText['common']['Details']?> >></a>
						<div id="details_id" style="display: none;">
							<?php
							$url = "http://website:com";
							$reportList[$url]['desktop']['details'] = unserialize($detailsInfo['desktop_score_details']);
							$reportList[$url]['desktop']['speed_score'] = $listInfo['desktop_speed_score'];
							$reportList[$url]['mobile']['details'] = unserialize($detailsInfo['mobile_score_details']);
							$reportList[$url]['mobile']['speed_score'] = $listInfo['mobile_speed_score'];
							$reportList[$url]['mobile']['usability_score'] = $listInfo['mobile_usability_score'];
							include(SP_VIEWPATH."/pagespeed/pagespeeddetails.ctp.php");
							?>
						</div>
					<?php }?>
				</td>
			</tr>
			<?php
			$i++;
		}
	}else{
		echo showNoRecordsList($colCount-2);		
	} 
	?>
	<tr class="listBot">
		<td class="left" colspan="<?php echo ($colCount-1)?>"></td>
		<td class="right"></td>
	</tr>
	</table>
	</td>
	</tr>
</table>
</div>
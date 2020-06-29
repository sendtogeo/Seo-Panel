<?php 
echo showSectionHead($spTextTools['PageSpeed Reports']);
$webUrl = "";
?>
<form id='search_form'>
<table width="100%" class="search">
	<tr>
		<th><?php echo $spText['common']['Website']?>: </th>
		<td>
			<select name="website_id" id="website_id" style='width:190px;' onchange="scriptDoLoadPost('pagespeed.php', 'search_form', 'content', '&sec=reports')">
				<?php foreach($websiteList as $websiteInfo){?>
					<?php 
					if($websiteInfo['id'] == $websiteId){
						$webUrl = $websiteInfo['url'];
						?>
						<option value="<?php echo $websiteInfo['id']?>" selected><?php echo $websiteInfo['name']?></option>
					<?php }else{?>
						<option value="<?php echo $websiteInfo['id']?>"><?php echo $websiteInfo['name']?></option>
					<?php }?>
				<?php }?>
			</select>
		</td>
		<th><?php echo $spText['common']['Period']?>:</th>
		<td>
			<input type="text" value="<?php echo $fromTime?>" name="from_time"/> 
			<input type="text" value="<?php echo $toTime?>" name="to_time"/>
			<script type="text/javascript">
			$(function() {
				$( "input[name='from_time'], input[name='to_time']").datepicker({dateFormat: "yy-mm-dd"});
			});
		  	</script>
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
<table width="100%" class="list">
	<tr class="listHead">
		<td><?php echo $spText['common']['Date']?></td>
		<td><?php echo $spTextPS['Desktop Speed']?></td>
		<td><?php echo $spTextPS['Mobile Speed']?></td>
		<td><?php echo $spText['common']['Details']?></td>
	</tr>
	<?php
	$colCount = 4; 
	if(count($list) > 0){
		foreach($list as $listInfo){ 
			?>
			<tr>
				<td><?php echo $listInfo['result_date']; ?></td>
				<td><a><?php echo $listInfo['desktop_speed_score'].'</a> '. $listInfo['rank_diff_desktop_speed_score']?></td>
				<td><a><?php echo $listInfo['mobile_speed_score'].'</a> '. $listInfo['rank_diff_mobile_speed_score']?></td>
				<td>
					<a href="https://developers.google.com/speed/pagespeed/insights/?url=<?php echo $webUrl; ?>" target="_blank">
						<?php echo $spText['common']['Details']?> &gt;&gt;
					</a>
				</td>
			</tr>
			<?php
		}
	}else{
		echo showNoRecordsList($colCount-2);		
	} 
	?>
</table>
</div>
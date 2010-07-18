<?php echo showSectionHead($sectionHead); ?>
<form id='search_form'>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="search">
	<tr>
		<th>Website: </th>
		<td>
			<select name="website_id" style='width:190px;' id="website_id" onchange="doLoad('website_id', 'keywords.php', 'keyword_area', 'sec=keywordbox')">
				<?php foreach($websiteList as $websiteInfo){?>
					<?php if($websiteInfo['id'] == $websiteId){?>
						<option value="<?=$websiteInfo['id']?>" selected><?=$websiteInfo['name']?></option>
					<?php }else{?>
						<option value="<?=$websiteInfo['id']?>"><?=$websiteInfo['name']?></option>
					<?php }?>
				<?php }?>
			</select>
		</td>
		<th>Keyword: </th>
		<td id="keyword_area" colspan='2'>
			<?php echo $this->render('keyword/keywordselectbox', 'ajax'); ?>
		</td>
	</tr>
	<tr>
		<th>Period:</th>
		<td>
			<input type="text" style="width: 72px;margin-right:0px;" value="<?=$fromTime?>" name="from_time"/> 
			<img align="bottom" onclick="displayDatePicker('from_time', false, 'ymd', '-');" src="<?=SP_IMGPATH?>/cal.gif"/> 
			<input type="text" style="width: 72px;margin-right:0px;" value="<?=$toTime?>" name="to_time"/> 
			<img align="bottom" onclick="displayDatePicker('to_time', false, 'ymd', '-');" src="images/cal.gif"/>
		</td>		
		<th>Search Engine: </th>
		<td>
			<?php 
				echo $this->render('searchengine/seselectbox', 'ajax'); 
			?>
		</td>
		<td colspan="2"><a href="javascript:void(0);" onclick="scriptDoLoadPost('graphical-reports.php', 'search_form', 'content')"><img alt="" src="<?=SP_IMGPATH?>/show_records.gif"></a></td>
	</tr>
</table>
</form>

<?php
	if(empty($keywordId)){
		?>
		<p class='note error'>No <b>Keywords</b> Found</p>
		<?php
		exit;
	} 
?>

<div id='subcontent'>
	<div><img src='<?=$graphUrl?>'></div>
</div>
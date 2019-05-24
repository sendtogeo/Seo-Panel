<?php echo showSectionHead($spTextKeyword['Graphical Keyword Position Reports']); ?>
<form id='search_form'>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="search">
	<tr>
		<th><?php echo $spText['common']['Website']?>: </th>
		<td>
			<select name="website_id" style='width:190px;' id="website_id" onchange="doLoad('website_id', 'keywords.php', 'keyword_area', 'sec=keywordbox')">
				<?php foreach($websiteList as $websiteInfo){?>
					<?php if($websiteInfo['id'] == $websiteId){?>
						<option value="<?php echo $websiteInfo['id']?>" selected><?php echo $websiteInfo['name']?></option>
					<?php }else{?>
						<option value="<?php echo $websiteInfo['id']?>"><?php echo $websiteInfo['name']?></option>
					<?php }?>
				<?php }?>
			</select>
		</td>
		<th><?php echo $spText['common']['Keyword']?>: </th>
		<td id="keyword_area" colspan='3'>
			<?php echo $this->render('keyword/keywordselectbox', 'ajax'); ?>
		</td>
	</tr>
	<tr>
		<th><?php echo $spText['common']['Period']?>:</th>
		<td>
			<input type="text" value="<?php echo $fromTime?>" name="from_time" id="from_time"/>
			<input type="text" value="<?php echo $toTime?>" name="to_time" id="to_time"/>
			<script>
			  $( function() {
			    $( "#from_time, #to_time").datepicker({dateFormat: "yy-mm-dd"});
			  } );
		  	</script>
		</td>		
		<th><?php echo $spText['common']['Search Engine']?>: </th>
		<td>
			<?php 
				echo $this->render('searchengine/seselectbox', 'ajax'); 
			?>
		</td>
		<td colspan="2"><a href="javascript:void(0);" onclick="scriptDoLoadPost('graphical-reports.php', 'search_form', 'content')" class="actionbut"><?php echo $spText['button']['Show Records']?></a></td>
	</tr>
</table>
</form>

<?php
	if(empty($keywordId)){
		?>
		<p class='note error'><?php echo $spText['common']['No Keywords Found']?>!</p>
		<?php
		exit;
	} 
?>

<div id='subcontent'>
	<?php echo $graphContent; ?>
</div>
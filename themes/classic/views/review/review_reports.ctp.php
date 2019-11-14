<?php echo showSectionHead($spTextTools['Detailed Reports']); ?>
<form id='search_form'>
<table width="100%" class="search">
	<tr>
		<th><?php echo $spText['common']['Website']?>: </th>
		<td>
			<select name="website_id" id="website_id" onchange="doLoad('website_id', '<?php echo $pageScriptPath ?>', 'link_area', 'sec=linkSelectBox')">
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
			<input type="text" value="<?php echo $fromTime?>" name="from_time"/>
			<input type="text" value="<?php echo $toTime?>" name="to_time"/>
			<script>
			$(function() {
				$( "input[name='from_time'], input[name='to_time']").datepicker({dateFormat: "yy-mm-dd"});
			});
		  	</script>
		</td>
	</tr>
	<tr>
		<th><?php echo $spText['common']['Url']?>: </th>
		<td id="link_area">
			<?php echo $this->render('socialmedia/social_media_link_select_box', 'ajax'); ?>
		</td>
		<td colspan="2">
			<a href="javascript:void(0);" onclick="scriptDoLoadPost('<?php echo $pageScriptPath ?>', 'search_form', 'content', '&sec=viewDetailedReports')" class="actionbut"><?php echo $spText['button']['Show Records']?></a>
		</td>
	</tr>
</table>
</form>

<br><br>
<div id='subcontent'>
<table id="cust_tab">	
	<tr>
		<th><?php echo $spText['common']['Date']?></th>
		<th><?php echo $spText['label']['Followers']?></th>
		<th><?php echo $spText['label']['Likes']?></th>
	</tr>
	<?php
	if (count($list) > 0) {
    	foreach($list as $listInfo){            
    		?>
    		<tr>
    			<td><?php echo $listInfo['report_date']; ?></td>
    			<td><b><?php echo $listInfo['followers'].'</b> '. $listInfo['rank_diff_followers']?></td>
    			<td><b><?php echo $listInfo['likes'].'</b> '. $listInfo['rank_diff_likes']?></td>
    		</tr>
    		<?php	
    	}
	} else {
	    ?>
	    <tr><td colspan="3"><b><?php echo $_SESSION['text']['common']['No Records Found']?></b></tr>
	    <?php
	}
	?>
</table>
</div>
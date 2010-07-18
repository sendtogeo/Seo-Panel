<?php echo showSectionHead($sectionHead); ?>
<form id='search_form'>
<table width="700px" border="0" cellspacing="0" cellpadding="0" class="search">
	<tr>
		<th>Website: </th>
		<td>
			<select name="website_id" style='width:170px;' id="website_id" onchange="doLoad('website_id', 'keywords.php', 'keyword_area', 'sec=keywordbox&keyNull=1')">
				<option value="">-- Select --</option>
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
		<th>Search Engine: </th>
		<td>
			<?php 
				echo $this->render('searchengine/seselectbox', 'ajax'); 
			?>
		</td>
		<td><a href="javascript:void(0);" onclick="scriptDoLoadPost('generate-reports.php', 'search_form', 'subcontent')"><img alt="" src="<?=SP_IMGPATH?>/proceed.gif"></a></td>
		<td>&nbsp;</td>
	</tr>
</table>
</form>

<div id='subcontent'>
	<p class='note'>Click on <b>Proceed</b> to generate keyword position reports</p>
</div>
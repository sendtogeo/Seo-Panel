<?php echo showSectionHead($spTextTools['Generate Keyword Reports']); ?>
<form id='search_form'>
<table width="700px" border="0" cellspacing="0" cellpadding="0" class="search">
	<tr>
		<th><?=$spText['common']['Website']?>: </th>
		<td>
			<select name="website_id" style='width:170px;' id="website_id" onchange="doLoad('website_id', 'keywords.php', 'keyword_area', 'sec=keywordbox&keyNull=1')">
				<option value="">-- <?=$spText['common']['Select']?> --</option>
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
		<td id="keyword_area" colspan='2'>
			<?php echo $this->render('keyword/keywordselectbox', 'ajax'); ?>
		</td>
	</tr>
	<tr>
		<th><?=$spText['common']['Search Engine']?>: </th>
		<td>
			<?php 
				echo $this->render('searchengine/seselectbox', 'ajax'); 
			?>
		</td>
		<td><a href="javascript:void(0);" onclick="scriptDoLoadPost('generate-reports.php', 'search_form', 'subcontent')" class="actionbut"><?=$spText['button']['Proceed']?></a></td>
		<td>&nbsp;</td>
	</tr>
</table>
</form>

<div id='subcontent'>
	<p class='note'><?=$spTextTools['clickgeneratereports']?></p>
</div>
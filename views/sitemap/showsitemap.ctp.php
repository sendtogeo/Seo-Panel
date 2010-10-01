<?php echo showSectionHead($spTextTools['Google Sitemap Generator']); ?>
<form id='search_form'>
<table width="60%" border="0" cellspacing="0" cellpadding="0" class="search">
	<tr>				
		<th><?=$spText['common']['Website']?>: </th>
		<td>
			<?php echo $this->render('website/websiteselectbox', 'ajax'); ?>
		</td>
	</tr>	
	<tr>
		<th><?=$spTextSitemap['Sitemap Type']?>: </th>
		<td>
			<select name="sm_type" style="width:150px;">
				<option value="xml">XML</option>
				<option value="txt">Text</option>
				<option value="html">HTML</option>
			</select>
		</td>
	</tr>
	<tr>
		<th><?=$spTextSitemap['Change frequency']?>: </th>
		<td>
			<select name="freq" style="width:150px;">
				<option value="">None</option>
				<option value="always">Always</option>
				<option value="hourly">Hourly</option>
				<option value="daily">Daily</option>
				<option value="weekly">Weekly</option>
				<option value="monthly">Monthly</option>
				<option value="yearly">Yearly</option>
				<option value="never">Never</option>
			</select>
		</td>
	</tr>
	<tr>
		<th><?=$spText['common']['Priority']?>: </th>
		<td>
			<select name="priority" style="width:150px;">
				<option value="0.5">0.5</option>
				<option value="1">1</option>
				<option value="auto">Automatic Priority</option>
			</select>
		</td>
	</tr>		
	<tr>
		<th><?=$spTextSitemap['Exclude Url']?>: </th>
		<td>
			<input type="text" style="width: 250px;" value="" name="exclude_url"/>
		</td>
	</tr>
	<tr>
		<th>&nbsp;</th>
		<td style="padding-left: 9px;">
			<a href="javascript:void(0);" onclick="sitemapDoLoadPost('sitemap.php', 'search_form', 'subcontmed')" class="actionbut"><?=$spText['button']['Proceed']?></a>
		</td>
	</tr>
</table>
</form>

<div id='logcontent'>	
	<p class='note' id='proceed'><?=$spTextSitemap['clickproceedsitemap']?>.</p>
	<p class="note noteleft" id="message" style="display: none;">
		<b><?=$spTextSitemap['processtaketime']?>!</b>
	</p>
</div>

<div id='subcontmed'></div>
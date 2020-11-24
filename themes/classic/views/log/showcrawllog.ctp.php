<?php 
echo showSectionHead($spTextLog['Crawl Log Details']);

// crawl log is for keyword
if ($logInfo['crawl_type'] == 'keyword') {

	// if ref is is integer get keyword name
	if (!empty($logInfo['keyword'])) {
		$listInfo['ref_id'] = $listInfo['keyword'];
	}

	// find search engine info
	if (preg_match("/^\d+$/", $logInfo['subject'])) {
		$seCtrler = new SearchEngineController();
		$seInfo = $seCtrler->__getsearchEngineInfo($logInfo['subject']);
		$logInfo['subject'] = $seInfo['domain'];
	}

}
?>
<table class="list">
	<tr class="listHead">
		<td width='30%'><?php echo $spTextLog['Crawl Log Details']?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><?php echo $spText['label']['Report Type']?>:</td>
		<td><?php echo $logInfo['crawl_type']?></td>
	</tr>
	<tr>
		<td><?php echo $spText['label']['Reference']?>:</td>
		<td><?php echo $logInfo['ref_id']?></td>
	</tr>
	<tr>
		<td><?php echo $spText['label']['Subject']?>:</td>
		<td><?php echo $logInfo['subject']?></td>
	</tr>
	<tr>
		<td><?php echo $spText['common']['Url']?>:</td>
		<td><?php echo $logInfo['crawl_link']?></td>
	</tr>
	<tr>
		<td><?php echo $spText['label']['Referer']?>:</td>
		<td><?php echo $logInfo['crawl_referer']?></td>
	</tr>
	<tr>
		<td><?php echo $spText['label']['Cookie']?>:</td>
		<td><?php echo $logInfo['crawl_cookie']?></td>
	</tr>
	<tr>
		<td><?php echo $spTextLog['Post Fields']?>:</td>
		<td><?php echo $logInfo['crawl_post_fields']?></td>
	</tr>
	<tr>
		<td><?php echo $spText['label']['User agent']?>:</td>
		<td><?php echo $logInfo['crawl_useragent']?></td>
	</tr>
	<tr>
		<td><?php echo $spText['label']['Proxy']?>:</td>
		<td><?php echo !empty($logInfo['proxy_id']) ? $logInfo['proxy_id'] : ""?></td>
	</tr>
	<tr>
		<td><?php echo $spText['common']['Details']?>:</td>
		<td><?php echo $logInfo['log_message']?></td>
	</tr>
	<tr>
		<td><?php echo $spText['common']['Status']?>:</td>
		<td>
			<?php 
			if ($logInfo['crawl_status']) {
				echo "<b class='success'>{$spText['label']['Success']}</b>";
			} else {
				echo "<b class='error'>{$spText['label']['Fail']}</b>";
			}
			?>
		</td>
	</tr>
	<tr>
		<td><?php echo $spText['label']['Updated']?>:</td>
		<td><?php echo $logInfo['crawl_time']?></td>
	</tr>
</table>
<br><br>
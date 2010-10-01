<?php echo showSectionHead($spTextPanel['About Us']); ?>
<table width="60%" cellspacing="0" cellpadding="0" class="summary">
	<tr><td class="topheader" colspan="2"><?=$spText['label']['Developers']?></td></tr>
	<tr>
		<td class="content" style="border-left: none;width: 30%">PHP,MYSQL,AJAX,HTML</td>					
		<td class="contentmid" style="text-align: left;padding-left: 10px">Geo Varghese, <a href="http://www.seofreetools.net/" target="_blank">www.seofreetools.net</a></td>
	</tr>
</table>
<br><br>

<table width="60%" cellspacing="0" cellpadding="0" class="summary">
	<tr><td class="topheader" colspan="2"><?=$spText['label']['Translators']?></td></tr>
	<?php foreach($transList as $transInfo) {?>
		<tr>
			<td class="content" style="border-left: none;width: 30%"><?=$transInfo['lang_name']?></td>					
			<td class="contentmid" style="text-align: left;padding-left: 10px"><?=$transInfo['trans_name']?>, <a href="<?=$transInfo['trans_website']?>" target="_blank"><?=$transInfo['trans_company']?></a></td>
		</tr>
	<?php }?>
</table>

<br><br>
<table width="60%" cellspacing="0" cellpadding="0" class="summary">
	<tr><td class="topheader" colspan="2"><?=$spText['label']['Sponsors']?></td></tr>
	<?=$sponsors?>
	<tr><td class="contentmid" colspan="2" style="border-left: none;font-size: 13px;text-align: left"><a target="_blank" href="<?=SP_DONATE_LINK?>"><?=$spTextSettings['Click here to become a sponsor for Seo Panel']?></a></td></tr>
</table>

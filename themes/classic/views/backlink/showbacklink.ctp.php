<?php echo showSectionHead($spTextTools['Quick Backlinks Checker']); ?>
<form id='search_form'>
<table width="60%" border="0" cellspacing="0" cellpadding="0" class="search">
	<tr>				
		<th><?=$spText['common']['Website']?>: </th>
		<td>
			<textarea name="website_urls" cols="150" rows="8"></textarea>
		</td>
	</tr>
	<tr>
		<th>&nbsp;</th>
		<td style="padding-left: 9px;">
			<?php $actFun = SP_DEMO ? "alertDemoMsg()" : "scriptDoLoadPost('backlinks.php', 'search_form', 'subcontent')"; ?>
			<a href="javascript:void(0);" onclick="<?=$actFun?>" class="actionbut"><?=$spText['button']['Proceed']?></a>
		</td>
	</tr>
</table>
</form>
<div id='subcontent'>
	<p class='note'><?=$spTextBack['clickproceedbacklink']?></p>
</div>
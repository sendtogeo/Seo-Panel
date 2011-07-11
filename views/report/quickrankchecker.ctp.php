<?php echo showSectionHead($spTextKeyword['Quick Keyword Position Checker']); ?>
<form id='search_form'>
<table width="60%" border="0" cellspacing="0" cellpadding="0" class="search">
	<tr>				
		<th><?=$spText['common']['Search Engine']?>: </th>
		<td>
			<?php echo $this->render('searchengine/seselectbox', 'ajax'); ?>
		</td>
	</tr>
	<tr>
		<th><?=$spText['common']['lang']?>: </th>		
		<td>
			<?php echo $this->render('language/languageselectbox', 'ajax'); ?>
		</td>
	</tr>	
	<tr>
		<th><?=$spText['common']['Country']?>: </th>		
		<td>
			<?php echo $this->render('country/countryselectbox', 'ajax'); ?>
		</td>
	</tr>
	<tr>
		<th><?=$spText['common']['Website']?>: </th>
		<td>
			<input type="text" style="width: <?=$seStyle?>px;" value="" name="url"/>
		</td>
	</tr>
	<tr>
		<th><?=$spText['common']['Keyword']?>: </th>		
		<td>
			<input type="text" style="width: <?=$seStyle?>px;" value="" name="name"/>
		</td>
	</tr>	
	<tr>
		<th><?=$spTextKeyword['Show All results']?>: </th>		
		<td>
			<input type="checkbox" value="1" name="show_all"/>
		</td>
	</tr>
	<tr>
		<th>&nbsp;</th>
		<td style="padding-left: 9px;">
			<?php $actFun = SP_DEMO ? "alertDemoMsg()" : "scriptDoLoadPost('reports.php', 'search_form', 'subcontent', '&sec=kwchecker')"; ?>
			<a href="javascript:void(0);" onclick="<?=$actFun?>" class="actionbut"><?=$spText['button']['Proceed']?></a>
		</td>
	</tr>
</table>
</form>
<div id='subcontent'>
	<p class='note'><?=$spTextTools['clickgeneratereports']?></p>
</div>
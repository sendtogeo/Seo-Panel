<?php echo showSectionHead($sectionHead); ?>
<form id='search_form'>
<table width="60%" border="0" cellspacing="0" cellpadding="0" class="search">
	<tr>				
		<th>Search Engine: </th>
		<td>
			<?php echo $this->render('searchengine/seselectbox', 'ajax'); ?>
		</td>
	</tr>
	<tr>
		<th>Language: </th>		
		<td>
			<?php echo $this->render('language/languageselectbox', 'ajax'); ?>
		</td>
	</tr>	
	<tr>
		<th>Country: </th>		
		<td>
			<?php echo $this->render('country/countryselectbox', 'ajax'); ?>
		</td>
	</tr>
	<tr>
		<th>Website: </th>
		<td>
			<input type="text" style="width: <?=$seStyle?>px;" value="" name="url"/>
		</td>
	</tr>
	<tr>
		<th>Keyword: </th>		
		<td>
			<input type="text" style="width: <?=$seStyle?>px;" value="" name="name"/>
		</td>
	</tr>	
	<tr>
		<th>Show All results: </th>		
		<td>
			<input type="checkbox" value="1" name="show_all"/>
		</td>
	</tr>
	<tr>
		<th>&nbsp;</th>
		<td style="padding-left: 9px;">
			<a href="javascript:void(0);" onclick="scriptDoLoadPost('reports.php', 'search_form', 'subcontent', '&sec=kwchecker')"><img alt="" src="<?=SP_IMGPATH?>/proceed.gif"></a>
		</td>
	</tr>
</table>
</form>
<div id='subcontent'>
	<p class='note'>Click on <b>Proceed</b> to generate reports</p>
</div>
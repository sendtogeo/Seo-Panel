<?php echo showSectionHead($sectionHead); ?>
<form id='search_form'>
<table width="400px" border="0" cellspacing="0" cellpadding="0" class="search">
	<tr>
		<th>Website: </th>
		<td>
			<?php echo $this->render('website/websiteselectbox', 'ajax'); ?>
		</td>
		<td><a href="javascript:void(0);" onclick="scriptDoLoadPost('cron.php', 'search_form', 'subcontent', '&sec=generate')"><img alt="" src="<?=SP_IMGPATH?>/proceed.gif"></a></td>		
	</tr>
	<tr>
		<th nowrap="nowrap">Seo Tools: </th>
		<td colspan="2" style="font-size: 12px;">
			<?php foreach($repTools as $i => $repInfo){ ?>
				<input type="checkbox" name="repTools[]" value="<?php echo $repInfo['id']?>" checked="checked"> <?php echo $repInfo['name']?><br>				
			<?php }?>			
		</td>		
	</tr>
</table>
</form>

<div id='subcontent'>
	<p class='note'>Click on <b>Proceed</b> to generate reports</p>
</div>
<div id="run_project">
	<div id="run_info">
		<table width="100%" border="0" cellspacing="0" cellpadding="0px" class="summary_tab">
        	<tr>
        		<th class="leftcell" width="20%"><?=$spText['common']['Total']?>:</th>
        		<td width="40%" style="text-align: left;"><?=count($proxyList)?></td>
        		<th width="20%"><?=$spText['common']['Checked']?>:</th>
        		<td id='checked_count'>0</td>
        	</tr>
        	<tr>
        		<th class="leftcell"><?=$spText['common']["Active"]?>:</th>
        		<td style="text-align: left;" id="active_count"><?=$activeCount?></td>
        		<th><?=$spText['common']["Inactive"]?>:</th>
        		<td id="inactive_count"><?=$inActiveCount?></td>
        	</tr>
        </table>
	</div>
	<?php if (count($proxyList)) {
		$proxyInfo = $proxyList[0];
		$statusVar = isset($status) ? "&status=$status" : "";
		$scriptUrl = "proxy.php?sec=runcheckstatus&id=".$proxyInfo['id'].$statusVar;
		?>
		<p class='note'>
			<?=$spTextSA['pressescapetostopexecution']?>.
			<a <?=scriptPostAJAXLink('proxy.php', 'listform', 'subcontent')?> href='javascript:void(0);'>
				<?=$spText['label']['Click Here']?>
			</a>
			<?=$spTextSA['to run project again if you stopped execution']?>.
		</p>
		<div id="subcontmed">
			<script>scriptDoLoad('<?=$scriptUrl?>', 'subcontmed');</script>
		</div>
	<?php }?>
</div>

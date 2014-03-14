<div id="run_project" style="margin-top: 40px;">
	<div id="run_info">
		<table width="100%" border="0" cellspacing="0" cellpadding="0px" class="summary_tab">
        	<tr>
        		<th class="leftcell" width="20%"><?=$spText['common']['Total']?>:</th>
        		<td width="20%"><?=$resInfo['total']?></td>
        		<th width="20%"><?=$spTextPanel['Valid']?>:</th>
        		<td><?=$resInfo['valid']?></td>
        		<th width="20%"><?=$spTextPanel['Existing']?>:</th>
        		<td><?=$resInfo['existing']?></td>
        	</tr>
        	<tr>
        		<th class="leftcell"><?=$spText['common']["Checked"]?>:</th>
        		<td id='checked_count'>0</td>
        		<th width="20%"><?=$spText['common']['Active']?>:</th>
        		<td id="active_count">0</td>
        		<th><?=$spText['common']["Inactive"]?>:</th>
        		<td id="inactive_count" colspan="3">0</td>
        	</tr>
        </table>
	</div>
	<?php if (count($proxyList)) {
		$proxyInfo = $proxyList[0];
		$scriptUrl = "proxy.php?sec=runcheckstatus&id=".$proxyInfo['id']."&proxy_max_id=".$proxyMaxId;
		?>
		<p class='note'>
			<?=$spTextSA['pressescapetostopexecution']?>.
		</p>
		<div id="subcontmed">
			<script>scriptDoLoad('<?=$scriptUrl?>', 'subcontmed');</script>
		</div>
	<?php }?>
</div>

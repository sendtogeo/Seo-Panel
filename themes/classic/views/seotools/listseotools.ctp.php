<?php echo showSectionHead($spTextPanel['Seo Tools Manager']); ?>

<script type="text/javascript">
$(document).ready(function() { 
    $("table").tablesorter({ 
		sortList: [[2,0]]
    });
});
</script>

<table id="cust_tab" class="tablesorter">
	<thead>
		<tr class="listHead">
			<th><?php echo $spText['common']['Id']?></th>
			<th><?php echo $spText['common']['Name']?></th>
			<th><?php echo $spText['common']['Priority']?></th>
			<th><?php echo $spTextTools['User Access']?></th>
			<th><?php echo $spText['common']['Reports']?></th>
			<th><?php echo $spText['label']['Cron']?></th>
			<th><?php echo $spText['common']['Status']?></th>
			<th><?php echo $spText['common']['Action']?></th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach($list as $i => $listInfo){
		
			if($listInfo['status']){
				$statLabel = $spText['common']["Active"];
			}else{
				$statLabel = $spText['common']["Inactive"];
			}
            $activateLink = SP_DEMO ? scriptAJAXLinkHref('demo', '', "", $statLabel) : scriptAJAXLinkHref('seo-tools-manager.php', 'content', "sec=changestatus&seotool_id={$listInfo['id']}&status={$listInfo['status']}", $statLabel);
            
            $statLabel = ($listInfo['reportgen']) ? $spText['common']["Active"] : $spText['common']["Inactive"]; 
            $reportgenLink = SP_DEMO ? scriptAJAXLinkHref('demo', '', "", $statLabel) : scriptAJAXLinkHref('seo-tools-manager.php', 'content', "sec=changereportgen&seotool_id={$listInfo['id']}&status={$listInfo['reportgen']}", $statLabel);
            
            $statLabel = ($listInfo['cron']) ? $spText['common']["Active"] : $spText['common']["Inactive"]; 
            $cronLink = SP_DEMO ? scriptAJAXLinkHref('demo', '', "", $statLabel) : scriptAJAXLinkHref('seo-tools-manager.php', 'content', "sec=changecron&seotool_id={$listInfo['id']}&status={$listInfo['cron']}", $statLabel);
            
            $accessLabel = ($listInfo['user_access']) ? $spText['common']["Yes"] : $spText['common']["No"]; 
            $accessLink = SP_DEMO ? scriptAJAXLinkHref('demo', '', "", $accessLabel) : scriptAJAXLinkHref('seo-tools-manager.php', 'content', "sec=changeaccess&seotool_id={$listInfo['id']}&user_access={$listInfo['user_access']}", $accessLabel);
            
			?>
			<tr>
				<td><?php echo $listInfo['id'];?></td>
				<td><?php echo $listInfo['name'];?></td>
				<td><?php echo $listInfo['priority'];?></td>
				<td><?php echo $accessLink;?></td>				
				<td><?php echo $reportgenLink;?></td>
				<td><?php echo $cronLink;?></td>
				<td><?php echo $activateLink;?></td>
				<td>
					<select name="action" id="action<?php echo $listInfo['id']?>" onchange="doAction('seo-tools-manager.php', 'content', 'pid=<?php echo $listInfo['id']?>', 'action<?php echo $listInfo['id']?>')">
						<option value="select">-- <?php echo $spText['common']['Select']?> --</option>
						<option value="edit"><?php echo $spText['common']['Edit']?></option>
					</select>
				</td>
			</tr>
			<?php
		}
		?>
	</tbody>
</table>
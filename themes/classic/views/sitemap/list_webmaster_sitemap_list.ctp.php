<?php echo showSectionHead($spTextPanel['Sitemaps'] . "(" . $spTextTools['webmaster-tools'] . ")" ); ?>

<script type="text/javascript">
$(document).ready(function() { 
    $("table").tablesorter({ 
		sortList: [[4]]
    });
});
</script>

<table id="cust_tab" class="tablesorter">
	<thead>
		<tr class="listHead">
			<th><?php echo $spText['common']['Id']?></th>
			<th><?php echo $spText['common']['Url']?></th>
			<th><?php echo $spText['common']['Total']?></th>
			<th><?php echo $spTextHome['Indexed']?></th>
			<th><?php echo $spText['common']['Errors']?></th>
			<th><?php echo $spText['common']['Warnings']?></th>
			<th><?php echo $spTextDirectory['Pending']?></th>
			<th><?php echo $spTextSitemap['Submitted']?></th>
			<th><?php echo $spTextSitemap['Downloaded']?></th>
			<th><?php echo $spText['common']['Action']?></th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach($list as $listInfo){
			?>
			<tr>
				<td><?php echo $listInfo['id'];?></td>
				<td><?php echo $listInfo['path'];?></td>
				<td><?php echo $listInfo['submitted'];?></td>
				<td><?php echo $listInfo['indexed'];?></td>
				<td><?php echo $listInfo['errors'];?></td>
				<td><?php echo $listInfo['warnings'];?></td>
				<td>
					<?php echo $listInfo['is_pending'] ? $spText['common']['Yes'] : $spText['common']['No'];?>
				</td>
				<td><?php echo $listInfo['last_submitted'];?></td>
				<td><?php echo $listInfo['last_downloaded'];?></td>
				<td>
					<select name="action" id="action<?php echo $listInfo['id']?>" onchange="doAction('seo-tools-manager.php', 'content', 'pid=<?php echo $listInfo['id']?>', 'action<?php echo $listInfo['id']?>')">
						<option value="select">-- <?php echo $spText['common']['Select']?> --</option>
						<option value="delete"><?php echo $spText['common']['Delete']?></option>
					</select>
				</td>
			</tr>
			<?php
		}
		?>
	</tbody>
</table>
<br>
<table width="100%" class="actionSec">
	<tr>
    	<td style="padding-top: 6px;text-align:right;">
    		<a href="javascript:void(0);" onclick="scriptDoLoad('websites.php', 'content', 'sec=submitSitemap')" class="actionbut" >
				<?php echo $spTextPanel['Submit Sitemap']?> &gt;&gt;
			</a>
    	</td>
	</tr>
</table>
<?php 
echo showSectionHead($spTextPanel["Alerts"]);

$alertUrl = "";
if (!empty($listInfo['alert_url'])) {
    $alertUrl = stristr($listInfo['alert_url'], 'http') ? $listInfo['alert_url'] : Spider::addTrailingSlash(SP_WEBPATH) . $listInfo['alert_url'];
}
?>
<table id="cust_tab">
	<tr class="form_head">
		<th width='30%'><?php echo $spTextPanel["Alerts"]?></th>
		<th>&nbsp;</th>
	</tr>
	<tr class="form_data table-<?php echo $listInfo['alert_type']?>">
		<td><?php echo $spText['label']['Subject']?>:</td>
		<td><?php echo $listInfo['alert_subject']?>
	</tr>
	<tr class="form_data table-<?php echo $listInfo['alert_type']?>">
		<td><?php echo $spText['common']['Details']?>:</td>
		<td><?php echo $listInfo['alert_message']?>
	</tr>
	<tr class="form_data">
		<td><?php echo $spText['common']['Url']?>:</td>
		<td><a target="_blank" href="<?php echo $alertUrl?>"><?php echo $alertUrl?></a></td>
	</tr>
	<tr class="form_data">
		<td><?php echo $spText['common']['Category']?>:</td>
		<td><?php echo $alertCategory[$listInfo['alert_category']]?>
	</tr>
	<tr class="form_data">
		<td><?php echo $spText['label']['Updated']?>:</td>
		<td><?php echo $listInfo['alert_time']?>
	</tr>
</table>

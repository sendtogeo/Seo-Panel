<?php 
echo showSectionHead($spTextPanel["Alerts"]);
?>
<table id="cust_tab">
	<tr class="form_head">
		<th width='30%'><?php echo $spTextPanel["Alerts"]?></th>
		<th>&nbsp;</th>
	</tr>
	<tr class="form_data">
		<td><?php echo $spText['common']['Category']?>:</td>
		<td><?php echo $alertCategory[$listInfo['alert_category']]?>
	</tr>
	<tr class="form_data">
		<td><?php echo $spText['label']['Subject']?>:</td>
		<td><?php echo $listInfo['alert_subject']?>
	</tr>
	<tr class="form_data">
		<td><?php echo $spText['common']['Details']?>:</td>
		<td><?php echo $listInfo['alert_message']?>
	</tr>
	<tr class="form_data">
		<td><?php echo $spText['label']['Updated']?>:</td>
		<td><?php echo $listInfo['alert_time']?>
	</tr>
</table>

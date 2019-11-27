<?php 
echo showSectionHead($spTextTools['Quick Checker']);
$actFun = SP_DEMO ? "alertDemoMsg()" : "scriptDoLoadPost('$pageScriptPath', 'search_form', 'subcontent', '&sec=doQuickChecker')";
?>
<form id='search_form' onsubmit="<?php echo $actFun; ?>;return false;">
<table id="cust_tab">
	<tr class="form_head">
		<th width="30%"><?php echo $spTextTools['Quick Checker'];?></th>
		<th>&nbsp;</th>
	</tr>
	<tr class="form_data">
		<td><?php echo $spText['label']['Type']?>: </td>
		<td>
			<select name="type">
				<?php foreach($serviceList as $serviceName => $serviceInfo){?>
					<option value="<?php echo $serviceName?>"><?php echo $serviceInfo['label']?></option>
				<?php }?>
			</select>
		</td>
	</tr>
	<tr class="form_data">
		<td><?php echo $spText['common']['Link']?>: </td>		
		<td>
			<input type="url" style="width: 400px;" value="" name="url"/>
		</td>
	</tr>
	<tr class="form_data">
		<td style="border-right: 0px;">&nbsp;</td>
		<td style="border-left: 0px;">
			<br>
			<a href="javascript:void(0);" onclick="<?php echo $actFun?>" class="actionbut"><?php echo $spText['button']['Proceed']?></a>
			<br><br>
		</td>
	</tr>
</table>
</form>
<br><br>
<div id='subcontent'></div>
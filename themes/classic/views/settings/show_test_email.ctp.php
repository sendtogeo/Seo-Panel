<?php echo showSectionHead($spTextPanel['Test Email Settings']); ?>
<form id="emailForm">
<input type="hidden" value="send_test_email" name="sec">
<table id="cust_tab">
	<tr class="form_head">
		<th width='30%'><?php echo $spTextPanel['Test Email Settings']?></th>
		<th>&nbsp;</th>
	</tr>
	<tr class="form_data">
		<td><?php echo $spText['login']['Email']?>:</td>
		<td><input type="email" name="test_email" value=""><?php echo $errMsg['name']?></td>
	</tr>
</table>
<br>
<table width="100%" class="actionSec">
	<tr>
    	<td style="padding-top: 6px;text-align:right;">
    		<a onclick="scriptDoLoad('settings.php?sec=test_email', 'content', 'layout=ajax')" href="javascript:void(0);" class="actionbut">
         		<?php echo $spText['button']['Cancel']?>
         	</a>&nbsp;
         	<?php $actFun = SP_DEMO ? "alertDemoMsg()" : "confirmSubmit('settings.php', 'emailForm', 'subcontent')"; ?>
         	<a onclick="<?php echo $actFun?>" href="javascript:void(0);" class="actionbut">
         		<?php echo $spTextSettings['Send Email']?>
         	</a>
    	</td>
	</tr>
</table>
</form>
<div id="subcontent"></div>
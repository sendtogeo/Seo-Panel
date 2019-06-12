<?php echo showSectionHead($spTextTools['Edit Seo Tool']); ?>
<form id="update_seo_tool">
<input type="hidden" name="sec" value="update"/>
<input type="hidden" name="id" value="<?php echo $post['id']?>"/>

<table id="cust_tab" >
	<tr class="form_head">
		<th><?php echo $spTextTools['Edit Seo Tool']?></th>
		<th>&nbsp;</th>
	</tr>
	<tr class="form_data">
		<td><?php echo $spText['common']['Priority']?>:</td>
		<td><input type="text" name="priority" value="<?php echo $post['priority']?>"><?php echo $errMsg['priority']?></td>
	</tr>
</table>
<br>
<table width="100%" class="actionSec">
	<tr>
    	<td style="padding-top: 6px;text-align:right;">
    		<a onclick="scriptDoLoad('seo-tools-manager.php', 'content')" href="javascript:void(0);" class="actionbut">
         		<?php echo $spText['button']['Cancel']?>
         	</a>&nbsp;
         	<?php $actFun = SP_DEMO ? "alertDemoMsg()" : "confirmSubmit('seo-tools-manager.php', 'update_seo_tool', 'content')"; ?>
         	<a onclick="<?php echo $actFun?>" href="javascript:void(0);" class="actionbut">
         		<?php echo $spText['button']['Proceed']?>
         	</a>
    	</td>
	</tr>
</table>
</form>
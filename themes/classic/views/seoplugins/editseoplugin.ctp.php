<?php echo showSectionHead($spTextPlugin['Edit Seo Plugin']); ?>
<form id="updateplugin">
<input type="hidden" name="sec" value="update"/>
<input type="hidden" name="id" value="<?php echo $post['id']?>"/>

<table id="cust_tab" >
	<tr class="form_head">
		<th><?php echo $spTextPlugin['Edit Seo Plugin']?></th>
		<th>&nbsp;</th>
	</tr>
	<tr class="form_data">
		<td><?php echo $spTextPlugin['Plugin Name']?>:</td>
		<td><input type="text" name="plugin_name" value="<?php echo $post['label']?>"><?php echo $errMsg['plugin_name']?></td>
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
    		<a onclick="scriptDoLoad('seo-plugins-manager.php', 'content')" href="javascript:void(0);" class="actionbut">
         		<?php echo $spText['button']['Cancel']?>
         	</a>&nbsp;
         	<?php $actFun = SP_DEMO ? "alertDemoMsg()" : "confirmSubmit('seo-plugins-manager.php', 'updateplugin', 'content')"; ?>
         	<a onclick="<?php echo $actFun?>" href="javascript:void(0);" class="actionbut">
         		<?php echo $spText['button']['Proceed']?>
         	</a>
    	</td>
	</tr>
</table>
</form>
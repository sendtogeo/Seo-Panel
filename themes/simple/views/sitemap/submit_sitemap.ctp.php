<?php 
echo showSectionHead($spTextPanel['Submit Sitemap'] . "({$spTextTools['webmaster-tools']})");

if (!empty($msg)) {
	?>
	<p class="dirmsg">
		<font class="success"><?php echo $msg?></font>
	</p>
	<?php 
}	

if(!empty($validationMsg)){
	?>
	<p class="dirmsg">
		<font class="error"><?php echo $validationMsg?></font>
	</p>
	<?php 
	}
?>

<form id="projectform">
<input type="hidden" name="sec" value="submitSitemap"/>
<table id="cust_tab">
	<tr class="form_head">
		<th width="40%"><?php echo $spTextPanel['Submit Sitemap']; ?></th>
		<th>&nbsp;</th>
	</tr>
	<tr class="form_data">
		<td><?php echo $spText['common']['Website']?>:</td>
		<td>
			<select name="website_id">
				<?php foreach($websiteList as $websiteInfo){?>
					<?php if($websiteInfo['id'] == $websiteId){?>
						<option value="<?php echo $websiteInfo['id']?>" selected><?php echo $websiteInfo['name']?></option>
					<?php }else{?>
						<option value="<?php echo $websiteInfo['id']?>"><?php echo $websiteInfo['name']?></option>
					<?php }?>
				<?php }?>
			</select>
		</td>
	</tr>
	<tr class="form_data">
		<td><?php echo $spText['common']['Url']?>:</td>
		<td>
			<input type="text" name="sitemap_url" class="long">
			<p>The URL of the sitemap to add. For example: http://www.example.com/sitemap.xml</p>
		</td>
	</tr>
</table>
<br>
<table width="100%" class="actionSec">
	<tr>
    	<td style="padding-top: 6px;text-align:right;">
    		<a onclick="scriptDoLoad('websites.php?sec=listSitemap&website_id=<?php echo $websiteId?>', 'content')" href="javascript:void(0);" class="actionbut">
         		<?php echo $spText['button']['Cancel']?>
         	</a>&nbsp;
         	<?php $actFun = SP_DEMO ? "alertDemoMsg()" : "confirmSubmit('websites.php', 'projectform', 'import_result_div')"; ?>
         	<a onclick="<?php echo $actFun?>" href="javascript:void(0);" class="actionbut">
         		<?php echo $spText['button']['Proceed']?>
         	</a>
    	</td>
	</tr>
</table>
</form>
<div id="import_result_div"></div>
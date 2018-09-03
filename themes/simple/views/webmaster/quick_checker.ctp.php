<?php echo showSectionHead($spTextTools['Quick Checker']); ?>
<form id='search_form'>
<table width="60%" border="0" cellspacing="0" cellpadding="0" class="search">
	<tr>
		<th><?php echo $spText['common']['Website']?>: </th>
		<td>
			<select name="website_id" style='width:190px;'>
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
	<tr>
		<th><?php echo $spText['common']['Keyword']?>: </th>		
		<td>
			<input type="text" style="width: <?php echo $seStyle?>px;" value="" name="name"/>
		</td>
	</tr>
	<tr>
		<th>&nbsp;</th>
		<td style="padding-left: 9px;">
			<?php $actFun = SP_DEMO ? "alertDemoMsg()" : "scriptDoLoadPost('webmaster-tools.php', 'search_form', 'subcontent', '&sec=doQuickChecker')"; ?>
			<a href="javascript:void(0);" onclick="<?php echo $actFun?>" class="actionbut"><?php echo $spText['button']['Proceed']?></a>
		</td>
	</tr>
</table>
</form>
<div id='subcontent'>
	<p class='note'><?php echo $spTextTools['clickgeneratereports']?></p>
</div>
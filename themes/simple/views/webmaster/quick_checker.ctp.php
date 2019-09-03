<?php 
echo showSectionHead($spTextTools['Quick Checker']);
$actFun = SP_DEMO ? "alertDemoMsg()" : "scriptDoLoadPost('webmaster-tools.php', 'search_form', 'subcontent', '&sec=doQuickChecker')";
?>
<form id='search_form' onsubmit="<?php echo $actFun; ?>;return false;">
<table width="60%" class="search">
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
		<th width="100px;"><?php echo $spText['common']['Period']?>:</th>
    	<td width="236px">
    		<input type="text" value="<?php echo $fromTime?>" name="from_time"/> 
    		<input type="text" value="<?php echo $toTime?>" name="to_time"/>
			<script type="text/javascript">
			$(function() {
				$( "input[name='from_time'], input[name='to_time']").datepicker({dateFormat: "yy-mm-dd"});
			});
		  	</script>
    	</td>
    </tr>
	<tr>
		<th><?php echo $spText['common']['Keyword']?>: </th>		
		<td>
			<input type="text" style="width: 200px;" value="" name="name"/>
		</td>
	</tr>
	<tr>
		<th>&nbsp;</th>
		<td style="padding-left: 9px;">
			<a href="javascript:void(0);" onclick="<?php echo $actFun?>" class="actionbut"><?php echo $spText['button']['Proceed']?></a>
		</td>
	</tr>
</table>
</form>
<div id='subcontent'>
	<p class='note'><?php echo $spTextTools['clickgeneratereports']?></p>
</div>
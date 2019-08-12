<?php echo showSectionHead($spTextPanel['Website Access Manager']); ?>
<form id="UserWebsiteAccess">
<input type="hidden" name="sec" value="dowebsiteAccessManager"/>
<table width="100%" cellpadding="0" class="">
	<tr>
		<?php if ($isAdmin) { ?>
		<td>Select user : </td>
		<td>
			<select name="wam_user">
				<option value="">--Select--</option>
				<?php foreach($userList as $key => $val){?>
					<option value="<?php echo $val['id'];?>"><?php echo $val['username'];?></option>
				<?php }?>
			</select>
		</td>
		<?php } else { ?>
			<td>This feature is available for admin only!</td>
		<?php } ?>
	</tr>
</table>
<table width="100%" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left" width='20%'></td>
		<td class="left" width='50%'>Website</td>
		<td class="right" width='30%'>Access</td>
	</tr>
</table>
</form>
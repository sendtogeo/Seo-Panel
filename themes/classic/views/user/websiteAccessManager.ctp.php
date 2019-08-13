<?php echo showSectionHead($spTextPanel['Website Access Manager']); ?>
<?php echo $msg;?>
<form id="listform" name="listform">
<input type="hidden" name="sec" value="dowebsiteAccessManager"/>
<table class="search">
	<?php $fetchLink = "scriptDoLoadPost('users.php', 'listform', 'content')";?>
	<tr>
		<th><?php echo $spText['common']['User']?> : </th>
		<td>
			<select name="wam_user" onchange="<?php echo $fetchLink;?>">
				<?php foreach($userList as $key => $val) { 
				    if ($userId == $val['id']) { ?>
					<option value="<?php echo $val['id'];?>" selected><?php echo $val['username'];?></option>
				<?php } else { ?>
					<option value="<?php echo $val['id'];?>"><?php echo $val['username'];?></option>
				<?php } } ?>
			</select>
		</td>
	</tr>
</table>
<table id="cust_tab">
	<tr>
		<th width='80px'><input type="checkbox" id="checkall" onclick="checkList('checkall')"></th>
		<th><?php echo $spText['common']['Website']?></th>
		<!-- <th width='30%'>Access</th> -->
	</tr>
	<?php if ($userWebsiteList) { ?>
		<?php foreach($userWebsiteList as $key => $val) { ?>
			<tr>
    			<td>
    				<?php if ($val['access']) { ?>
    					<input type="checkbox" name="check_ws[]" value="<?php echo $val['id'];?>" checked>
    				<?php } else { ?>
    					<input type="checkbox" name="check_ws[]" value="<?php echo $val['id'];?>">
    				
    				<?php } ?>
    			</td>
    			<td><?php echo $val['url'];?></td>
    			<!-- <td>
    				<select name="user_ws_access_<?php echo $val['id'];?>">
    					<option value="read">Read</option>
    					<option value="write">Write</option>
    				</select>
    			</td> -->
			</tr>
		<?php }?>
	<?php } ?>
</table>
<?php if ($userId) { ?>
    <?php $submitLink = "scriptDoLoadPost('users.php', 'listform', 'content', '&action=updateUserWebsite')";?>
    <table class="actionSec">
    	<tr><td style="padding-top: 6px;text-align:right;"><a href="javascript:void(0);" class="actionbut" onclick="<?php echo $submitLink;?>">Update</a></td></tr>
    </table>
<?php } ?>
</form>
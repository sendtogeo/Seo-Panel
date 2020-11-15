<?php echo showSectionHead($spTextPanel['Report Generation Logs']); ?>
<form id='search_form'>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="search">
	<tr>
		<th><?php echo $spText['common']['Period']?>:</th>
		<td>
			<input type="text" value="<?php echo $fromTime?>" name="from_time"/>
			<input type="text" value="<?php echo $toTime?>" name="to_time"/>
			<script>
			$(function() {
				$( "input[name='from_time'], input[name='to_time']").datepicker({dateFormat: "yy-mm-dd"});
			});
		  	</script>
		</td>
		<th><?php echo $spText['common']['User']?>: </th>
		<td>
			<select name="user_id">
				<option value="">-- <?php echo $spText['common']['Select']?> --</option>
				<?php foreach($userList as $userInfo){?>
					<?php if($userInfo['id'] == $userId){?>
						<option value="<?php echo $userInfo['id']?>" selected><?php echo $userInfo['username']?></option>
					<?php }else{?>
						<option value="<?php echo $userInfo['id']?>"><?php echo $userInfo['username']?></option>
					<?php }?>
				<?php }?>
			</select>
		</td>
		<td colspan="2">
			<a href="javascript:void(0);" onclick="scriptDoLoadPost('reports.php', 'search_form', 'content', '&sec=report_gen_logs')" class="actionbut">
				<?php echo $spText['button']['Show Records']?>
			</a>
		</td>
	</tr>
</table>
</form>

<script type="text/javascript">
$(document).ready(function() { 
    $("table").tablesorter({ 
		sortList: [[2,0]]
    });
});
</script>

<br><br>
<b><?php echo $spTextPanel["Current Time"]?>:</b> <?php echo date("Y-m-d H:i:s <b>T(P)</b>"); ?>
<br><br>
<div id='subcontent'>
<table id="cust_tab" class="tablesorter">
	<thead>
		<tr class="listHead">
			<th><?php echo $spText['common']['Id']?></th>
			<th><?php echo $spText['common']['User']?></th>
			<th><?php echo $spText['common']['User Type']?></th>
			<th><?php echo $spTextUser['Expiry Date']?></th>
			<?php foreach ($logDateList as $logDate) {?>
				<th><?php echo $logDate?></th>
			<?php }?>
		</tr>
	</thead>	
	<tbody>
		<?php foreach ($logUserList as $i => $userInfo) {?>
			<tr>
				<td><?php echo $i + 1?></td>
				<td><?php echo $userInfo['username']?></td>
				<td><?php echo $userTypeList[$userInfo['utype_id']]['user_type']?></td>
				<td><?php echo $userInfo['expiry_date']?></td>
				<?php foreach ($logDateList as $logDate) {?>
					<td>
						<?php 
						echo !empty($logList[$logDate][$userInfo['id']]) ? "<font class='success'>{$spText['common']['Yes']}</font>" : "<font class='error'>{$spText['common']['No']}</font>";
						?>
					</td>
				<?php }?>
			</tr>
		<?php }?>
	</tbody>
</table>
</div>
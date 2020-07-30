<?php 
echo showSectionHead($spTextPanel["Alerts"]);
$searchFun = "scriptDoLoadPost('$pgScriptPath', 'listform', 'content')";
?>
<form name="listform" id="listform" onsubmit="<?php echo $searchFun?>">
<table width="60%" class="search">
	<tr>
		<th><?php echo $spText['button']['Search']?>: </th>
		<td><input type="text" name="keyword" value="<?php echo htmlentities($post['keyword'], ENT_QUOTES)?>"></td>
		<th><?php echo $spText['common']['Category']?>: </th>
		<td>
			<select name="alert_category" onchange="<?php echo $searchFun?>">
				<option value="">-- <?php echo $spText['common']['Select']?> --</option>
				<?php				
				foreach ($alertCategory as $cat => $catLabel) {
				    $selectType = ($cat == $post['alert_category']) ? "selected" : "";
					?>
					<option value="<?php echo $cat?>" <?php echo $selectType; ?> ><?php echo $catLabel?></option>
					<?php
				}	
				?>
			</select>
		</td>
	</tr>
	<tr>
		<th><?php echo $spText['common']['Period']?>:</th>
    	<td colspan="3">
    		<input type="text" value="<?php echo $fromTime?>" name="from_time"/> 
    		<input type="text" value="<?php echo $toTime?>" name="to_time"/>		
			<script>
			$(function() {
				$( "input[name='from_time'], input[name='to_time']").datepicker({dateFormat: "yy-mm-dd"});
			});
		  	</script>
			&nbsp;&nbsp;
			<a href="javascript:void(0);" onclick="<?php echo $searchFun?>" class="actionbut"><?php echo $spText['button']['Show Records']?></a>
		</td>
	</tr>
</table>

<br><br>
<b><?php echo $spTextPanel["Current Time"]?>:</b> <?php echo date("Y-m-d H:i:s <b>T(P)</b>"); ?>
<?php echo $pagingDiv?>
<table width="100%" id="cust_tab">
	<tr class="listHead">
		<th><input type="checkbox" id="checkall" onclick="checkList('checkall')"></th>
		<th><?php echo $spText['common']['Id']?></th>
		<th><?php echo $spText['common']['Category']?></th>	
		<th><?php echo $spText['label']['Subject']?></th>
		<th><?php echo $spText['common']['Details']?></th>
		<th><?php echo $spText['label']['Updated']?></th>
		<th><?php echo $spText['common']['Action']?></th>
	</tr>
	<?php
	$colCount = 7; 
	if (count($list) > 0) {
		foreach ($list as $listInfo) {
		    $alertLink = scriptAJAXLinkHrefDialog($pgScriptPath, 'content', "sec=alert_info&id=".$listInfo['id'], $listInfo['id']);            
			?>
			<tr class="table-<?php echo $listInfo['alert_type']?>">
				<td style="width: 20px;"><input type="checkbox" name="ids[]" value="<?php echo $listInfo['id']?>"></td>
				<td><?php echo $alertLink?></td>
				<td><?php echo $alertCategory[$listInfo['alert_category']]?></td>
				<td><?php echo stripslashes($listInfo['alert_subject'])?></td>
				<td><?php echo stripslashes($listInfo['alert_message'])?></td>
				<td><?php echo $listInfo['alert_time']?></td>
				<td>
					<select name="action" id="action<?php echo $listInfo['id']?>" onchange="doAction('<?php echo $pgScriptPath?>', 'content', 'id=<?php echo $listInfo['id']?>&pageno=<?php echo $pageNo?>', 'action<?php echo $listInfo['id']?>')">
						<option value="select">-- <?php echo $spText['common']['Select']?> --</option>
						<option value="delete_alert"><?php echo $spText['common']['Delete']?></option>
					</select>
				</td>
			</tr>
			<?php
		}
	}else{	 
		echo showNoRecordsList($colCount);		
	} 
	?>
</table>
<?php
$delFun = SP_DEMO ? "alertDemoMsg()" : "confirmSubmit('$pgScriptPath', 'listform', 'content', '&sec=delete_all_alerts&pageno=$pageNo')";
?>
<table width="100%" class="actionSec">
	<tr>
    	<td style="padding-top: 6px;" class="left">
         	<a onclick="<?php echo $delFun?>" href="javascript:void(0);" class="actionbut">
         		<?php echo $spText['common']['Delete']?>
         	</a>
    	</td>
	</tr>
</table>
</form>

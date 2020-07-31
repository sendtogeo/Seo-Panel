<form name="listform" id="listform">
<?php echo showSectionHead($spTextPanel['User Type Manager']); ?>
<?php 
if ($isPluginSubsActive) { 
	$currencySymbol = $currencyList[SP_PAYMENT_CURRENCY]['symbol'];
} else {
	?>
	<div id="topnewsbox">
		<a class="bold_link" href="<?php echo SP_MAIN_SITE?>/plugin/l/65/membership-subscription/" target="_blank">
			<?php echo $spTextSubscription['click-activate-pay-plugin']; ?> &gt;&gt;
		</a>
	</div>
	<?php 
}
?>
<?php echo $pagingDiv?>

<table id="cust_tab">
	<tr>
		<th><input type="checkbox" id="checkall" onclick="checkList('checkall')"></th>
		<th><?php echo $spText['common']['Id']?></th>			
		<th><?php echo $spText['common']['User Type']?></th>
		<th><?php echo $spText['label']['Description']?></th>
		<th><?php echo $spText['common']['Keywords Count']?></th>
		<th><?php echo $spText['common']['Websites Count']?></th>
		<th><?php echo $spTextSubscription['Social Media Link Count']?></th>
		<th><?php echo $spTextSubscription['Review Link Count']?></th>
		<th><?php echo $spTextSubscription['Directory Submit Limit']?></th>
		<?php if ($isPluginSubsActive) {?>
			<th><?php echo $spText['common']['Price']?></th>
			<th><?php echo $spTextSubscription['Access Type']?></th>
		<?php }?>
		<th><?php echo $spText['common']['Status']?></th>
		<th><?php echo $spText['common']['Action']?></th>
	</tr>
	<?php
	$colCount = $isPluginSubsActive ? 13 : 11; 
	if(count($list) > 0){
		foreach($list as $i => $listInfo){            
            $userTypeLink = scriptAJAXLinkHref('user-types-manager.php', 'content', "sec=edit&userTypeId={$listInfo['id']}", "{$listInfo['user_type']}")
			?>
			<tr>
				<td><input type="checkbox" name="ids[]" value="<?php echo $listInfo['id']?>"></td>
				<td><?php echo $listInfo['id']?></td>								
				<td><?php echo $userTypeLink?></td>		
				<td><?php echo $listInfo['description']?></td>		
				<td><?php echo $listInfo['keywordcount']?></td>	
				<td><?php echo $listInfo['websitecount']?></td>	
				<td><?php echo $listInfo['social_media_link_count']?></td>	
				<td><?php echo $listInfo['review_link_count']?></td>	
				<td><?php echo $listInfo['directory_submit_limit']?></td>
				<?php if ($isPluginSubsActive) {?>
					<td>
						<?php echo !empty($listInfo['price']) ? $currencySymbol . $listInfo['price'] : ""; ?>
					</td>
					<td><?php echo $accessTypeList[$listInfo['access_type']]; ?></td>
				<?php }?>
				<td><?php echo $listInfo['status'] ? $spText['common']["Active"] : $spText['common']["Inactive"];	?></td>
				<td>
					<?php
						if($listInfo['status']){
							$statVal = "Inactivate";
							$statLabel = $spText['common']["Inactivate"];
						}else{
							$statVal = "Activate";
							$statLabel = $spText['common']["Activate"];
						} 
					?>
					<select name="action" id="action<?php echo $listInfo['id']?>" onchange="doAction('user-types-manager.php', 'content', 'userTypeId=<?php echo $listInfo['id']?>', 'action<?php echo $listInfo['id']?>')">
						<option value="select">-- <?php echo $spText['common']['Select']?> --</option>
						<option value="<?php echo $statVal?>"><?php echo $statLabel?></option>
						<option value="edit"><?php echo $spText['common']['Edit']?></option>
						<option value="delete"><?php echo $spText['common']['Delete']?></option>
					</select>
				</td>
			</tr>
			<?php
		}
		
	} else {
	    ?>
		<tr><td colspan="<?php echo $colCount?>"><b><?php echo $_SESSION['text']['common']['No Records Found']?></b></tr>
		<?php		
	} 
	?>
</table>
<?php
if (SP_DEMO) {
	$actFun = $inactFun = $delFun = "alertDemoMsg()";
} else {
	$actFun = "confirmSubmit('user-types-manager.php', 'listform', 'content', '&sec=activateall&pageno=$pageNo')";
	$inactFun = "confirmSubmit('user-types-manager.php', 'listform', 'content', '&sec=inactivateall&pageno=$pageNo')";
	$delFun = "confirmSubmit('user-types-manager.php', 'listform', 'content', '&sec=deleteall&pageno=$pageNo')";
}
?>
<br>
<table width="100%" cellspacing="0" cellpadding="0" border="0" class="actionSec">
	<tr>
    	<td style="padding-top: 6px;">
         	<a onclick="scriptDoLoad('user-types-manager.php', 'content', 'sec=new')" href="javascript:void(0);" class="actionbut">
         		<?php echo $spTextPanel['New User Type']?>
         	</a>&nbsp;&nbsp;
         	<a onclick="<?php echo $actFun?>" href="javascript:void(0);" class="actionbut">
         		<?php echo $spText['common']["Activate"]?>
         	</a>&nbsp;&nbsp;
         	<a onclick="<?php echo $inactFun?>" href="javascript:void(0);" class="actionbut">
         		<?php echo $spText['common']["Inactivate"]?>
         	</a>&nbsp;&nbsp;
         	<a onclick="<?php echo $delFun?>" href="javascript:void(0);" class="actionbut">
         		<?php echo $spText['common']['Delete']?>
         	</a>
    	</td>
	</tr>
</table>
</form>
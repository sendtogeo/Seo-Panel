<?php 
echo showSectionHead($spTextPanel['Sync Search Engines']); 
Session::showSessionMessges();
echo $pagingDiv
?>
<table id="cust_tab">
	<thead>
		<tr class="listHead">
			<th><?php echo $spText['common']['Id']?></th>
			<th><?php echo $spText['common']['Date']?></th>
			<th><?php echo $spText['common']['Status']?></th>
			<th><?php echo $spText['common']['Results']?></th>
		</tr>
	</thead>
	<tbody>
		<?php
		if (!empty($syncList)) {
    		foreach($syncList as $listInfo) {
    			?>
    			<tr>
    				<td><?php echo $listInfo['id'];?></td>
    				<td><?php echo $listInfo['sync_time'];?></td>
    				<td>
    					<?php 
    					if($listInfo['status']){
    					    echo "<font class='success'>".$spText['label']["Success"]."</font>";
    					}else{
    					    echo "<font class='error'>".$spText['label']["Fail"]."</font>";
    					}
    					?>
					</td>
    				<td><?php echo $listInfo['result'];?></td>
    			</tr>
    			<?php
    		}
		} else {
		    echo showNoRecordsList(2);
		}
		?>
	</tbody>
</table>
<?php
if (SP_DEMO) {
    $syncFun = "alertDemoMsg()";
} else {
    $syncFun = "confirmSubmit('searchengine.php', 'listform', 'content', '&sec=do-sync-se')";
}   
?>
<table class="actionSec">
	<tr>
    	<td style="padding-top: 6px;">
         	<a onclick="<?php echo $syncFun?>" href="javascript:void(0);" class="actionbut">
         		<?php echo $spTextPanel['Sync Search Engines']?>
         	</a>
    	</td>
	</tr>
</table>
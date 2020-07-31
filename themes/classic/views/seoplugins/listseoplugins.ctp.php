<?php $submitLink = "scriptDoLoadPost('seo-plugins-manager.php', 'listform', 'content')";?>
<form name="listform" id="listform" onsubmit="<?php echo $submitLink?>;return false;">
<?php echo showSectionHead($spTextPanel['Seo Plugins Manager']); ?>
<?php 
if(!empty($msg)){ 
	echo $error ? showErrorMsg($msg, false) : showSuccessMsg($msg, false); 
} 
?>
<table class="search">
	<tr>
		<th><?php echo $spText['common']['Keyword']?>: </th>
		<td>
			<td>
				<input type="text" name="keyword" value="<?php echo htmlentities($info['keyword'], ENT_QUOTES)?>" onblur="<?php echo $submitLink?>">
			</td>
		</td>
		<th><?php echo $spText['common']['Status']?>: </th>
		<td>
			<select name="stscheck" onchange="<?php echo $submitLink?>">
				<option value="select">-- <?php echo $spText['common']['Select']?> --</option>
				<?php foreach($statusList as $key => $val){?>
					<?php if(isset($info['stscheck']) && $info['stscheck'] === $val){?>
						<option value="<?php echo $val?>" selected><?php echo $key?></option>
					<?php }else{?>
						<option value="<?php echo $val?>"><?php echo $key?></option>
					<?php }?>
				<?php }?>
			</select>
		</td>
		<td style="text-align: center;">
			<a href="javascript:void(0);" onclick="<?php echo $submitLink; ?>" class="actionbut">
				<?php echo $spText['button']['Search']?>
			</a>
		</td>
	</tr>
</table>
</form>

<?php echo $pagingDiv?>
<table id="cust_tab">
	<thead>
		<tr>
			<th><?php echo $spText['common']['Id']?></th>
			<th><?php echo $spText['label']['Plugin']?></th>
			<th><?php echo $spText['common']['Priority']?></th>		
			<th><?php echo $spText['label']['Author']?></th>		
			<th><?php echo $spText['common']['Website']?></th>
			<th><?php echo $spText['common']['Status']?></th>		
			<th><?php echo $spText['label']['Installation']?></th>
			<th><?php echo $spText['common']['Action']?></th>
		</tr>
	</thead>
	<tbody>
		<?php
		$colCount = 8; 
		if (!empty($list)) {
    		foreach($list as $i => $listInfo){
    		
    			if($listInfo['status']){
    				$statLabel = $spText['common']["Active"];
    			}else{
    				$statLabel = $spText['common']["Inactive"];
    			}
    			
                $activateLink = SP_DEMO ? "alertDemoMsg()" : "scriptDoLoad('seo-plugins-manager.php', 'content', 'sec=changestatus&seoplugin_id={$listInfo['id']}&status={$listInfo['status']}&pageno=$pageNo')";
    			?>
    			<tr>				
    				<td><?php echo $listInfo['id']?></td>
    				<td>
    					<a href="javascript:void(0);" onclick="scriptDoLoad('seo-plugins-manager.php?sec=listinfo&pid=<?php echo $listInfo['id']?>&pageno=<?php echo $pageNo?>', 'content')"><?php echo $listInfo['label']?> <?php echo $listInfo['version']?></a>
    				</td>				
    				<td><?php echo $listInfo['priority']?></td>				
    				<td><?php echo $listInfo['author']?></td>
    				<td><a href="<?php echo $listInfo['website']?>" target="_blank"><?php echo $listInfo['website']?></a></td>
    				<td><a href="javascript:void(0)" onclick="<?php echo $activateLink?>"><?php echo $statLabel?></a></td>
    				<td><?php echo $listInfo['installed'] ? "<font class='green'>Success</font>" : "<font class='red'>Failed</font>"; ?></td>
    				<td>
    					<select name="action" id="action<?php echo $listInfo['id']?>" onchange="doAction('seo-plugins-manager.php?pageno=<?php echo $pageNo?>', 'content', 'pid=<?php echo $listInfo['id']?>', 'action<?php echo $listInfo['id']?>')">
    						<option value="select">-- <?php echo $spText['common']['Select']?> --</option>
    						<option value="edit"><?php echo $spText['common']['Edit']?></option>
    						<option value="upgrade"><?php echo $spText['label']['Upgrade']?></option>
    						<option value="reinstall"><?php echo $spText['label']['Re-install']?></option>
    					</select>
    				</td>
    			</tr>
    			<?php
    		}
		} else {
		    echo showNoRecordsList($colCount-2);
		}
		?>
	</tbody>
</table>
<br>
<table width="100%" class="actionSec">
	<tr>
    	<td style="padding-top: 6px;text-align:right;">
    		<a href="<?php echo SP_PLUGINSITE?>" class="actionbut" target="_blank"><?php echo $spTextPlugin['Download Seo Panel Plugins']?> &gt;&gt;</a>
    	</td>
	</tr>
</table>
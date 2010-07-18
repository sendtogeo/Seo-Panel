<?php echo showSectionHead($sectionHead); ?>
<form id='search_form'>
<table width="68%" border="0" cellspacing="0" cellpadding="0" class="search">
	<tr>
		<th>Website: </th>
		<td>
			<?php echo $this->render('website/websiteselectbox', 'ajax'); ?>
		</td>
		<th>Status: </th>
		<td>
			<select name="active" style="width:150px;" onchange="scriptDoLoadPost('directories.php', 'search_form', 'content', '&sec=reports')">
				<option value="">-- Select --</option>
				<?php 
				$activeList = array('pending', 'approved');
				foreach($activeList as $val){
					if($val == $activeVal){
						?>
						<option value="<?=$val?>" selected><?=ucfirst($val)?></option>
						<?php
					}else{						
						?>
						<option value="<?=$val?>"><?=ucfirst($val)?></option>
						<?php	
					}
				} 
				?>
			</select>
		</td>		
		<td colspan="2"><a href="javascript:void(0);" onclick="scriptDoLoadPost('directories.php', 'search_form', 'content', '&sec=reports')"><img alt="" src="<?=SP_IMGPATH?>/show_records.gif"></a></td>
	</tr>
</table>
</form>

<?php
	if(empty($websiteId)){
		?>
		<p class='note error'>No reports found!!</p>
		<?php
		exit;
	} 
?>

<div id='subcontent'>
<?=$pagingDiv?>
<table width="100%" border="0" cellspacing="0" cellpadding="2px;" class="list" align='center'>
	<tr>
	<td width='33%'>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left">Directory</td>
		<td>Date</td>
		<td>Confirmation</td>
		<td>Status</td>
		<td class="right">Action</td>
	</tr>
	<?php
	$colCount = 5; 
	if(count($list) > 0){
		$catCount = count($list);
		$i = 0;
		foreach($list as $listInfo){
			
			$class = ($i % 2) ? "blue_row" : "white_row";
            if($catCount == ($i + 1)){
                $leftBotClass = "tab_left_bot";
                $rightBotClass = "tab_right_bot";
            }else{
                $leftBotClass = "td_left_border td_br_right";
                $rightBotClass = "td_br_right";
            }
            $confirm = empty($listInfo['status']) ? "No" : "Yes";
            $confirmId = "confirm_".$listInfo['id'];
            $confirmLink = "<a href='javascript:void(0);' onclick=\"scriptDoLoad('directories.php', '$confirmId', 'sec=changeconfirm&id={$listInfo['id']}&confirm=$confirm')\">$confirm</a>";
            
            $status = empty($listInfo['active']) ? "Pending" : "Approved";            
            $statusId = "status_".$listInfo['id'];
			?>
			<tr class="<?=$class?>">
				<td class="<?=$leftBotClass?>" style='text-align:left;padding-left:10px;'><?=$listInfo['domain']?></td>
				<td class='td_br_right'><?php echo date('Y-m-d', $listInfo['submit_time']); ?></td>
				<td class='td_br_right' id='<?=$confirmId?>'><?=$confirmLink?></td>
				<td class='td_br_right' id='<?=$statusId?>'><?=$status?></td>
				<td class="<?=$rightBotClass?>">
					<select name="action" id="action<?=$listInfo['id']?>" onchange="doAction('directories.php', '<?=$statusId?>', 'id=<?=$listInfo['id']?>', 'action<?=$listInfo['id']?>')">
						<option value="select">-- Select --</option>
						<option value="checkstatus">Check Status</option>
						<option value="delete">Delete</option>
					</select>
				</td>
			</tr>
			<?php
			$i++;
		}
	}else{
		echo showNoRecordsList($colCount-2);		
	} 
	?>
	<tr class="listBot">
		<td class="left" colspan="<?=($colCount-1)?>"></td>
		<td class="right"></td>
	</tr>
	</table>
	</td>
	</tr>
</table>
</div>
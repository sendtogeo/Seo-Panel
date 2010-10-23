<?php echo showSectionHead($spTextPanel['User Manager']); ?>
<?=$pagingDiv?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left"><?=$spText['common']['Id']?></td>
		<td><?=$spText['login']['Username']?></td>
		<td><?=$spText['common']['Name']?></td>
		<td><?=$spText['login']['Email']?></td>
		<td><?=$spText['common']['Status']?></td>
		<td class="right"><?=$spText['common']['Action']?></td>
	</tr>
	<?php
	$colCount = 6; 
	if(count($userList) > 0){
		$catCount = count($userList);
		foreach($userList as $i => $userInfo){
			$class = ($i % 2) ? "blue_row" : "white_row";
            if($catCount == ($i + 1)){
                $leftBotClass = "tab_left_bot";
                $rightBotClass = "tab_right_bot";
            }else{
                $leftBotClass = "td_left_border td_br_right";
                $rightBotClass = "td_br_right";
            }
            $usernameLink = scriptAJAXLinkHref('users.php', 'content', "sec=edit&userId={$userInfo['id']}", "{$userInfo['username']}")
			?>
			<tr class="<?=$class?>">
				<td class="<?=$leftBotClass?>"><?=$userInfo['id']?></td>
				<td class="td_br_right left"><?=$usernameLink?></td>
				<td class="td_br_right left"><?=$userInfo['first_name']." ".$userInfo['last_name']?></td>
				<td class="td_br_right left"><?=$userInfo['email']?></td>
				<td class="td_br_right"><?php echo $userInfo['status'] ? $spText['common']["Active"] : $spText['common']["Inactive"];	?></td>
				<td class="<?=$rightBotClass?>" width="100px">
					<?php
						if($userInfo['status']){
							$statVal = "Inactivate";
							$statLabel = $spText['common']["Inactivate"];
						}else{
							$statVal = "Activate";
							$statLabel = $spText['common']["Activate"];
						} 
					?>
					<select name="action" id="action<?=$userInfo['id']?>" onchange="doAction('users.php', 'content', 'userId=<?=$userInfo['id']?>&pageno=<?=$pageNo?>', 'action<?=$userInfo['id']?>')">
						<option value="select">-- <?=$spText['common']['Select']?> --</option>
						<option value="<?=$statVal?>"><?=$statLabel?></option>
						<option value="edit"><?=$spText['common']['Edit']?></option>
						<option value="delete"><?=$spText['common']['Delete']?></option>
					</select>
				</td>
			</tr>
			<?php
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
<table width="100%" cellspacing="0" cellpadding="0" border="0" class="actionSec">
	<tr>
    	<td style="padding-top: 6px;">
         	<a onclick="scriptDoLoad('users.php', 'content', 'sec=new')" href="javascript:void(0);" class="actionbut">
         		<?=$spTextPanel['New User']?>
         	</a>
    	</td>
	</tr>
</table>
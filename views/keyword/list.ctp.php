<?php echo showSectionHead($sectionHead); ?>
<table width="50%" border="0" cellspacing="0" cellpadding="0" class="search">
	<tr>
		<th>Website: </th>
		<td>
			<select name="website_id" id="website_id" onchange="doLoad('website_id', 'keywords.php', 'content')">
				<option value="">-- Select --</option>
				<?php foreach($websiteList as $websiteInfo){?>
					<?php if($websiteInfo['id'] == $websiteId){?>
						<option value="<?=$websiteInfo['id']?>" selected><?=$websiteInfo['name']?></option>
					<?php }else{?>
						<option value="<?=$websiteInfo['id']?>"><?=$websiteInfo['name']?></option>
					<?php }?>
				<?php }?>
			</select>
		</td>
	</tr>
</table>
<?=$pagingDiv?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left">ID</td>
		<td>Name</td>
		<td>Website</td>
		<td>Language</td>
		<td>Status</td>
		<td class="right">Action</td>
	</tr>
	<?php
	$colCount = 6; 
	if(count($list) > 0){
		$catCount = count($list);
		foreach($list as $i => $listInfo){
			$class = ($i % 2) ? "blue_row" : "white_row";
            if($catCount == ($i + 1)){
                $leftBotClass = "tab_left_bot";
                $rightBotClass = "tab_right_bot";
            }else{
                $leftBotClass = "td_left_border td_br_right";
                $rightBotClass = "td_br_right";
            }
            $keywordLink = scriptAJAXLinkHref('keywords.php', 'content', "sec=edit&keywordId={$listInfo['id']}", "{$listInfo['name']}")
			?>
			<tr class="<?=$class?>">
				<td class="<?=$leftBotClass?>"><?=$listInfo['id']?></td>
				<td class="td_br_right left"><?=$keywordLink?></td>
				<td class="td_br_right left"><?=$listInfo['website']?></td>
				<td class="td_br_right"><? echo empty($listInfo['lang_code']) ? "All" : $listInfo['lang_code']; ?></td>
				<td class="td_br_right"><?php echo $listInfo['status'] ? "active" : "inactive";	?></td>
				<td class="<?=$rightBotClass?>" width="100px">
					<?php
						if($listInfo['status']){
							$statLabel = "Inactivate";
						}else{
							$statLabel = "Activate";
						} 
					?>
					<select name="action" id="action<?=$listInfo['id']?>" onchange="doAction('keywords.php', 'content', 'keywordId=<?=$listInfo['id']?>&pageno=<?=$pageNo?>&website_id=<?=$websiteId?>', 'action<?=$listInfo['id']?>')">
						<option value="select">-- Select --</option>
						<?if($listInfo['webstatus'] && $listInfo['status']){?>
							<option value="reports">Reports</option>
						<?php }?>
						<option value="<?=$statLabel?>"><?=$statLabel?></option>
						<option value="edit">Edit</option>
						<option value="delete">Delete</option>
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
         	<a onclick="scriptDoLoad('keywords.php', 'content', 'sec=new&website_id=<?=$websiteId?>')" href="javascript:void(0);">
         		<img width="55" height="21" border="0" alt="" src="<?=SP_IMGPATH?>/create.gif"/>
         	</a>
    	</td>
	</tr>
</table>
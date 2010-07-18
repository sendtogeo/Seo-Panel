<?php echo showSectionHead($sectionHead); ?>
<form id='search_form'>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="search">
	<tr>
		<th width="100px">Website: </th>
		<td width="200px">
			<select name="website_id" id="website_id" style='width:190px;' onchange="scriptDoLoadPost('reports.php', 'search_form', 'content', '&sec=reportsum')">
				<?php foreach($websiteList as $websiteInfo){?>
					<?php if($websiteInfo['id'] == $websiteId){?>
						<option value="<?=$websiteInfo['id']?>" selected><?=$websiteInfo['name']?></option>
					<?php }else{?>
						<option value="<?=$websiteInfo['id']?>"><?=$websiteInfo['name']?></option>
					<?php }?>
				<?php }?>
			</select>
		</td>
		<td colspan="2"><a href="javascript:void(0);" onclick="scriptDoLoadPost('reports.php', 'search_form', 'content', '&sec=reportsum')"><img alt="" src="<?=SP_IMGPATH?>/show_records.gif"></a></td>
	</tr>
</table>
</form>

<?php
	if(empty($list)){
		?>
		<p class='note error'>No <b>Keywords</b> Found</p>
		<?php
		exit;
	} 
?>

<div id='subcontent'>
<table width="100%" border="0" cellspacing="0" cellpadding="2px;" class="list">
	<tr>
	<td width='33%'>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left">Keyword</td>
		<?php
		$seCount = count($seList);
		foreach ($seList as $i => $seInfo){
			if( ($i+1) == $seCount){			
				?>
				<td class="right"><?php echo $seInfo['domain']?></td>
				<?php	
			}else{
				?>
				<td><?php echo $seInfo['domain']?></td>
				<?php
			}
			
		}
		?>		
	</tr>
	<?php
	$colCount = $seCount + 1; 
	if(count($list) > 0){
		$catCount = count($list);
		$i = 0;
		foreach($list as $listInfo){
			$positionInfo = $listInfo['position_info'];
			$class = ($i % 2) ? "blue_row" : "white_row";
            if($catCount == ($i + 1)){
                $leftBotClass = "tab_left_bot";
                $rightBotClass = "tab_right_bot";
            }else{
                $leftBotClass = "td_left_border td_br_right";
                $rightBotClass = "td_br_right";
            }
            $scriptLink = "keyword_id={$listInfo['id']}&rep=1";
            $keywordLink = scriptAJAXLinkHref('reports.php', 'content', $scriptLink,  $listInfo['name']);           
			?>
			<tr class="<?=$class?>">
				<td class="<?=$leftBotClass?>" width='100px;'><?php echo $keywordLink; ?></td>
				<?php
				foreach ($seList as $index => $seInfo){
					$rank = empty($positionInfo[$seInfo['id']]['rank']) ? '-' : $positionInfo[$seInfo['id']]['rank'];
					$rankDiff = empty($positionInfo[$seInfo['id']]['rank_diff']) ? '' : $positionInfo[$seInfo['id']]['rank_diff']; 
					if( ($index+1) == $seCount){			
						?>
						<td class="<?=$rightBotClass?>" style='width:80px'><b><?php echo $rank.'</b> '. $rankDiff; ?></td>	
						<?php	
					}else{
						?>
						<td class='td_br_right' style='width:80px'><b><?php echo $rank.'</b> '. $rankDiff; ?></td>
						<?php
					}					
				}
				?>				
			</tr>
			<?php
			$i++;
		}
	}else{
		?>
		<tr class="blue_row">
		    <td class="tab_left_bot_noborder">&nbsp;</td>
		    <td class="td_bottom_border" colspan="<?=($colCount-2)?>">No Records Found!</td>
		    <td class="tab_right_bot">&nbsp;</td>
		</tr>
		<?		
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
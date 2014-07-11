<?php
if(!empty($printVersion)) {
    showPrintHeader($spTextTools['Keyword Position Summary']);
    ?>
    <table width="80%" border="0" cellspacing="0" cellpadding="0" class="search">
    	<?php if (!empty($websiteUrl)) {?>
    		<tr>
    			<th><?=$spText['common']['Website']?>:</th>
        		<td>
        			<?php echo $websiteUrl; ?>
    			</td>
    		</tr>
		<?php }?>
		<tr>
			<th><?=$spText['common']['Period']?>:</th>
    		<td>
    			<?=$fromTime?> - <?=$toTime?>
			</td>
		</tr>
	</table>
    <?php
} else {
    echo showSectionHead($spTextTools['Keyword Position Summary']);
    ?>
	<form id='search_form'>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="search">
		<tr>
			<th width="100px"><?=$spText['common']['Website']?>: </th>
			<td width="160px">
				<select name="website_id" id="website_id" style='width:160px;' onchange="scriptDoLoadPost('reports.php', 'search_form', 'content', '&sec=reportsum')">
					<option value="">-- <?=$spText['common']['All']?> --</option>
					<?php foreach($websiteList as $websiteInfo){?>
						<?php if($websiteInfo['id'] == $websiteId){?>
							<option value="<?=$websiteInfo['id']?>" selected><?=$websiteInfo['name']?></option>
						<?php }else{?>
							<option value="<?=$websiteInfo['id']?>"><?=$websiteInfo['name']?></option>
						<?php }?>
					<?php }?>
				</select>
			</td>
			<th width="100px;"><?=$spText['common']['Period']?>:</th>
    		<td width="236px">
    			<input type="text" style="width: 80px;margin-right:0px;" value="<?=$fromTime?>" name="from_time"/> 
    			<img align="bottom" onclick="displayDatePicker('from_time', false, 'ymd', '-');" src="<?=SP_IMGPATH?>/cal.gif"/> 
    			<input type="text" style="width: 80px;margin-right:0px;" value="<?=$toTime?>" name="to_time"/> 
    			<img align="bottom" onclick="displayDatePicker('to_time', false, 'ymd', '-');" src="<?=SP_IMGPATH?>/cal.gif"/>
    		</td>
			<td><a href="javascript:void(0);" onclick="scriptDoLoadPost('reports.php', 'search_form', 'content', '&sec=reportsum')" class="actionbut"><?=$spText['button']['Search']?></a></td>
		</tr>
	</table>
	</form>
	<?php
	if(empty($list)){
		?>
		<p class='note'>
			<?=$spText['common']['No Keywords Found']?>.
			<a href="javascript:void(0);" onclick="scriptDoLoad('keywords.php', 'content', 'sec=new&amp;website_id=')"><?=$spText['label']['Click Here']?></a> <?=$spTextKeyword['to create new keywords']?>.
		</p>
		<?php
		exit;
	}

	// url parameters
	$mainLink = SP_WEBPATH."/reports.php?sec=reportsum&website_id=$websiteId&from_time=$fromTime&to_time=$toTime";
	$directLink = $mainLink . "&order_col=$orderCol&order_val=$orderVal";
	?>
	<div style="float:right;margin-right: 10px;">
		<a href="<?=$directLink?>&doc_type=export"><img src="<?=SP_IMGPATH?>/icoExport.gif"></a> &nbsp;
		<a target="_blank" href="<?=$directLink?>&doc_type=print"><img src="<?=SP_IMGPATH?>/print_button.gif"></a>
	</div>
<?php }?>

<div id='subcontent' style="margin-top: 20px;">
<table width="100%" border="0" cellspacing="0" cellpadding="2px;" class="list">
	<tr>
	<td width='33%'>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<?php
		$linkClass = "";
        if ($orderCol == 'keyword') {
            $oVal = ($orderVal == 'DESC') ? "ASC" : "DESC";
            $linkClass .= "sort_".strtolower($orderVal);
        } else {
            $oVal = 'ASC';
        }
		$linkName = "<a id='sortLink' class='$linkClass' href='javascript:void(0)' onclick=\"scriptDoLoad('$mainLink&order_col=keyword&order_val=$oVal', 'content')\">{$spText['common']['Keyword']}</a>"; 
		?>		
		<?php if (empty($websiteId)) {?>
			<td class="left"><?=$spText['common']['Website']?></td>
			<td><?=$linkName?></td>
		<?php } else { ?>
			<td class="left"><?=$linkName?></td>
		<?php }?>
		<?php
		$seCount = count($seList);
		foreach ($seList as $i => $seInfo){
		    
		    $linkClass = "";
            if ($seInfo['id'] == $orderCol) {
                $oVal = ($orderVal == 'DESC') ? "ASC" : "DESC";
                $linkClass .= "sort_".strtolower($oVal);
            } else {
                $oVal = 'ASC';
            }
            $linkName = "<a id='sortLink' class='$linkClass' href='javascript:void(0)' onclick=\"scriptDoLoad('$mainLink&order_col={$seInfo['id']}&order_val=$oVal', 'content')\">{$seInfo['domain']}</a>";
		    
			if( ($i+1) == $seCount){			
				?>
				<td class="right"><?php echo $linkName; ?></td>
				<?php	
			}else{
				?>
				<td><?php echo $linkName; ?></td>
				<?php
			}
			
		}
		?>		
	</tr>
	<?php
	$colCount = empty($websiteId) ? $seCount + 2 : $seCount + 1; 
	if(count($list) > 0){
		$catCount = count($list);
		$i = 0;
		foreach($indexList as $keywordId => $rankValue){
		    $listInfo = $list[$keywordId];
			$positionInfo = $listInfo['position_info'];
			$class = ($i % 2) ? "blue_row" : "white_row";
            if($catCount == ($i + 1)){
                $leftBotClass = "tab_left_bot";
                $rightBotClass = "tab_right_bot";
            }else{
                $leftBotClass = "td_left_border td_br_right";
                $rightBotClass = "td_br_right";
            }
            $scriptLink = "website_id={$listInfo['website_id']}&keyword_id={$listInfo['id']}&rep=1";           
			?>
			<tr class="<?=$class?>">				
				<?php if (empty($websiteId)) {?>
					<td class="<?=$leftBotClass?> left" width='250px;'><?php echo $listInfo['weburl']; ?></td>
					<td class='td_br_right left'><?php echo $listInfo['name'] ?></td>
				<?php } else { ?>
					<td class="<?=$leftBotClass?> left" width='100px;'><?php echo $listInfo['name']; ?></td>
				<?php }?>				
				<?php
				foreach ($seList as $index => $seInfo){
				    $rank = empty($positionInfo[$seInfo['id']]['rank']) ? '-' : $positionInfo[$seInfo['id']]['rank'];
					$rankDiff = empty($positionInfo[$seInfo['id']]['rank_diff']) ? '' : $positionInfo[$seInfo['id']]['rank_diff'];
				    $rankPadding = "";
				    if ($rank != '-') {
				        $rankLink = scriptAJAXLinkHrefDialog('reports.php', 'content', $scriptLink."&se_id=".$seInfo['id'], $rank);
				        $graphLink = scriptAJAXLinkHrefDialog('graphical-reports.php', 'content', $scriptLink."&se_id=".$seInfo['id'], '&nbsp;', 'graphicon');
					    $rankPadding = empty($rankDiff) ? "" : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					    $rankLink = $rankPadding . $rankLink;
				    } else {
				        $rankDiff = $graphLink = "";
				        $rankLink = $rank;
				    }					
					if( ($index+1) == $seCount){			
						?>
						<td class="<?=$rightBotClass?>" style='width:100px' nowrap><?php echo "$rankLink $graphLink $rankDiff"; ?></td>	
						<?php	
					}else{
						?>
						<td class='td_br_right' style='width:100px' nowrap><?php echo "$rankLink $graphLink $rankDiff"; ?></td>
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
		    <td class="td_bottom_border" colspan="<?=($colCount-2)?>"><?=$spText['common']['No Records Found']?>!</td>
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
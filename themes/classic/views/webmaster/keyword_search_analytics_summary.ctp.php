<?php
$borderCollapseVal = $pdfVersion ? "border-collapse: collapse;" : "";

if(!empty($printVersion) || !empty($pdfVersion)) {
    $pdfVersion ? showPdfHeader($spTextTools['Keyword Search Summary']) : showPrintHeader($spTextTools['Keyword Search Summary']);
    ?>
    <table width="80%" border="0" cellspacing="0" cellpadding="0" class="search">
    	<?php if (!empty($websiteInfo['url'])) {?>
    		<tr>
    			<th><?php echo $spText['common']['Website']?>:</th>
        		<td>
        			<?php echo $websiteInfo['url']; ?>
    			</td>
    		</tr>
		<?php }?>
		<tr>
			<th><?php echo $spText['common']['Period']?>:</th>
    		<td>
    			<?php echo $fromTime?> - <?php echo $toTime?>
			</td>
		</tr>
	</table>
    <?php
} else {
    echo showSectionHead($spTextTools['Keyword Search Summary']);
    ?>
	<form id='search_form'>
	<?php $submitLink = "scriptDoLoadPost('webmaster-tools.php', 'search_form', 'content', '&sec=viewKeywordSearchSummary')";?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="search">
		<tr>
			<th><?php echo $spText['common']['Name']?>: </th>
			<td>
				<input type="text" name="search_name" value="<?php echo htmlentities($searchInfo['search_name'], ENT_QUOTES)?>" onblur="<?php echo $submitLink?>">
			</td>
			<th width="100px"><?php echo $spText['common']['Website']?>: </th>
			<td width="160px">
				<select name="website_id" id="website_id" style='width:100px;' onchange="<?php echo $submitLink?>">
					<?php foreach($websiteList as $websiteInfo){?>
						<?php if($websiteInfo['id'] == $websiteId){?>
							<option value="<?php echo $websiteInfo['id']?>" selected><?php echo $websiteInfo['name']?></option>
						<?php }else{?>
							<option value="<?php echo $websiteInfo['id']?>"><?php echo $websiteInfo['name']?></option>
						<?php }?>
					<?php }?>
				</select>
			</td>
			<th width="100px;"><?php echo $spText['common']['Period']?>:</th>
    		<td width="236px">
    			<input type="text" style="width: 80px;margin-right:0px;" value="<?php echo $fromTime?>" name="from_time"/> 
    			<img align="bottom" onclick="displayDatePicker('from_time', false, 'ymd', '-');" src="<?php echo SP_IMGPATH?>/cal.gif"/> 
    			<input type="text" style="width: 80px;margin-right:0px;" value="<?php echo $toTime?>" name="to_time"/> 
    			<img align="bottom" onclick="displayDatePicker('to_time', false, 'ymd', '-');" src="<?php echo SP_IMGPATH?>/cal.gif"/>
    		</td>
			<td><a href="javascript:void(0);" onclick="<?php echo $submitLink?>" class="actionbut"><?php echo $spText['button']['Search']?></a></td>
		</tr>
	</table>
	</form>
	<?php
	if(empty($baseReportList)){
		?>
		<p class='note'>
			<?php echo $spText['common']['No Keywords Found']?>.
			<a href="javascript:void(0);" onclick="scriptDoLoad('keywords.php', 'content', 'sec=new&amp;website_id=')"><?php echo $spText['label']['Click Here']?></a> <?php echo $spTextKeyword['to create new keywords']?>.
		</p>
		<?php
		exit;
	}

	// url parameters
	$mainLink = SP_WEBPATH."/webmaster-tools.php?sec=viewKeywordSearchSummary&website_id=$websiteId&from_time=$fromTime&to_time=$toTime&search_name=" . $searchInfo['search_name'];
	$directLink = $mainLink . "&order_col=$orderCol&order_val=$orderVal&pageno=$pageNo";
	?>
	<br><br>
	<div style="float:left;margin-right: 10px;">
		<a href="<?php echo $directLink?>&doc_type=pdf"><img src="<?php echo SP_IMGPATH?>/icon_pdf.png"></a> &nbsp;
		<a href="<?php echo $directLink?>&doc_type=export"><img src="<?php echo SP_IMGPATH?>/icoExport.gif"></a> &nbsp;
		<a target="_blank" href="<?php echo $directLink?>&doc_type=print"><img src="<?php echo SP_IMGPATH?>/print_button.gif?1"></a>
	</div>
	<?php echo $pagingDiv?>
<?php }?>

<div id='subcontent' style="margin-top: 0px;">

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list" style="<?php echo $borderCollapseVal; ?>">
	<tr class="squareHead">
		<?php
		$hrefAttr = $pdfVersion ? "" : "href='javascript:void(0)'";
		$baseColCount = count($colList);
		foreach (array_keys($colList) as $i => $colName){
		    
		    $linkClass = "";
            if ($colName == $orderCol) {
                $oVal = ($orderVal == 'DESC') ? "ASC" : "DESC";
                $linkClass .= "sort_".strtolower($orderVal);
            } else {
                $oVal = 'ASC';
            }
            
            $linkName = "<a id='sortLink' class='$linkClass' $hrefAttr onclick=\"scriptDoLoad('$mainLink&order_col=$colName&order_val=$oVal', 'content')\">$colList[$colName]</a>";
		    
            $tdClass = "";
            if ($i == 0) {
            	$tdClass = "left";
            } elseif(($i+1) == $baseColCount) {
            	$tdClass = "right";
            }
            
            $rowSpan = ($colName == "name") ? 2 : 1;
			?>
			<td rowspan="<?php echo $rowSpan?>" class="<?php echo $tdClass?>" colspan="3" style="border-right:2px solid #B0C2CC;"><?php echo $linkName; ?></td>
			<?php
			
		}
		?>
	</tr>	
	<tr class="squareSubHead">
		<?php
		$pTxt = str_replace("-", "/", substr($fromTime, -5));
		$cTxt = str_replace("-", "/", substr($toTime, -5));
		foreach ($colList as $colName => $colVal) {
			if ($colName == 'name') continue;
			?>
			<td><?php echo $pTxt; ?></td>
			<td><?php echo $cTxt; ?></td>
			<td style="border-right:2px solid #B0C2CC;">+ / -</td>
			<?php
		}
		?>
	</tr>
	<?php
	$colCount = ($baseColCount * 3) + 1;
	if (count($baseReportList) > 0) {
		
		$catCount = count($baseReportList);
		$i = 0;
		foreach($baseReportList as $listInfo){
			$keywordId = $listInfo['id'];
			$class = ($i % 2) ? "blue_row" : "white_row";
			
			if( !$i || ($catCount != ($i + 1)) ){
                $leftBotClass = "td_left_border td_br_right";
                $rightBotClass = "td_br_right";
            }
            
            $scriptLink = "website_id=$websiteId&keyword_id={$listInfo['id']}&rep=1&from_time=$fromTime&to_time=$toTime";          
			?>
			<tr class="<?php echo $class?>">
				<td colspan="3" class="<?php echo $leftBotClass?> left" width='100px;' style="border-right:2px solid #B0C2CC;"><?php echo $listInfo['name']; ?></td>
				<?php
				foreach ($colList as $colName => $colVal){
					if ($colName == 'name') continue;
					
					$prevRank = isset($listInfo[$colName]) ? $listInfo[$colName] : 0;
					$currRank = isset($compareReportList[$keywordId][$colName]) ? $compareReportList[$keywordId][$colName] : 0;
					$rankDiffTxt = "";
					
					// if both ranks are existing
					if ($prevRank != '' && $currRank != '') {
						$rankDiff = $currRank - $prevRank;
						
						if ($rankDiff > 0) {
							$rankDiffTxt = "<font class='green'>($rankDiff)</font>";
						} else if ($rankDiff < 0) {
							$rankDiffTxt = "<font class='red'>($rankDiff)</font>";
						} else {
							$rankDiffTxt = "0";
						}													
					}

					$prevRankLink = scriptAJAXLinkHrefDialog('webmaster-tools.php', 'content', $scriptLink."&se_id=".$seInfo['id'], $prevRank);
					$currRankLink = scriptAJAXLinkHrefDialog('webmaster-tools.php', 'content', $scriptLink."&se_id=".$seInfo['id'], $currRank);
					$graphLink = scriptAJAXLinkHrefDialog('webmaster-tools.php', 'content', $scriptLink."&se_id=".$seInfo['id'], '&nbsp;', 'graphicon');
					
					// if pdf report remove links
					if ($pdfVersion) {
						$prevRankLink = str_replace("href='javascript:void(0);'", "", $prevRankLink);
						$currRankLink = str_replace("href='javascript:void(0);'", "", $currRankLink);
						$graphLink = str_replace("href='javascript:void(0);'", "", $graphLink);
					}
				    ?>
					<td class="td_br_right"><?php echo $prevRankLink; ?></td>
					<td class="td_br_right"><?php echo $currRankLink; ?></td>
					<td class='td_br_right left' style="border-right:2px solid #B0C2CC; width: 50px;" nowrap><?php echo $graphLink . " " . $rankDiffTxt; ?></td>
					<?php					
				}
				?>				
			</tr>
			<?php
			$i++;
		}
	}
	?>
</table>
</div>
<?php
if(!empty($printVersion) || !empty($pdfVersion)) {
	echo $pdfVersion ? showPdfFooter($spText) : showPrintFooter($spText);
}
?>
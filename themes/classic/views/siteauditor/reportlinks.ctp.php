<table  width="98%" border="0" cellspacing="0px" cellpadding="0px" align="center" class="report_head">
	<tr>
		<td align="left" valign="bottom">
			<div><b><?=$spTextSA['Project Url']?></b>: <?=$projectInfo['url']?></div>
			<div style="margin-bottom: 0px;"><b><?=$spText['label']['Updated']?></b>: <?=$projectInfo['last_updated']?></div>
			<div style="margin-bottom: 0px;margin-top: 10px;"><b><?=$spText['label']['Total Results']?></b>: <?=$totalResults?></div>
		</td>

<?php
$mainLink = SP_WEBPATH."/siteauditor.php?project_id=$projectId&pageno=$pageNo"."$filter";
foreach ($headArr as $col => $val) {
    $linkName = $col."Link";
    $linkClass = "";
    if ($col == $orderCol) {
        $oVal = ($orderVal == 'DESC') ? "ASC" : "DESC";
        $linkClass .= "sort_".strtolower($orderVal);
    } else {
        $oVal = $orderVal;
    }
    $$linkName = "<a id='sortLink' class='$linkClass' href='javascript:void(0)' onclick=\"scriptDoLoadPost('siteauditor.php', 'search_form', 'subcontent', '&sec=showreport&order_col=$col&order_val=$oVal')\">$val</a>";
} 
if(!empty($printVersion)) {
    showPrintHeader("Link Reports");	
} else {    
    ?>	
	<td align="right" valign="bottom">
		<a href="<?=$mainLink?>&sec=showreport&report_type=rp_links&doc_type=export"><img src="<?=SP_IMGPATH?>/icoExport.gif"></a> &nbsp;
		<a target="_blank" href="<?=$mainLink?>&sec=showreport&report_type=rp_links&doc_type=print"><img src="<?=SP_IMGPATH?>/print_button.gif"></a>
		<?=$pagingDiv?>
	</td>
<?php }?>
	</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="plainHead">
		<td class="left" style="width: 30%;"><?=$page_urlLink?></td>
		<td><?=$pagerankLink?></td>
		<td><?=$google_backlinksLink?></td>
		<td><?=$bing_backlinksLink?></td>
		<td><?=$google_indexedLink?></td>
		<td><?=$bing_indexedLink?></td>
		<td><?=$external_linksLink?></td>
		<td><?=$total_linksLink?></td>
		<td><?=$scoreLink?></td>
		<td><?=$brockenLink?></td>
		<td class="right"><?=$spText['common']['Action']?></td>
	</tr>
	<?php
	$colCount = 11; 
	if(count($list) > 0){
		$catCount = count($list);
		foreach($list as $i => $listInfo){
			$class = ($i % 2) ? "blue_row" : "white_row";
			if( !$i || ($catCount != ($i + 1)) ){
                $leftBotClass = "td_left_border td_br_right";
                $rightBotClass = "td_br_right";
            }
            $pageLink = scriptAJAXLinkHref('siteauditor.php', 'subcontent', "sec=pagedetails&report_id={$listInfo['id']}&pageno=$pageNo&order_col=$orderCol&order_val=$orderVal", wordwrap($listInfo['page_url'], 100, "<br>", true))             
            ?>
			<tr class="<?=$class?>">
				<td class="<?=$leftBotClass?> left"><?=$pageLink?></td>
				<td class="td_br_right"><?=$listInfo['pagerank']?></td>
				<td class="td_br_right"><?=$listInfo['google_backlinks']?></td>
				<td class="td_br_right"><?=$listInfo['bing_backlinks']?></td>
				<td class="td_br_right"><?=$listInfo['google_indexed']?></td>
				<td class="td_br_right"><?=$listInfo['bing_indexed']?></td>
				<td class="td_br_right"><?=$listInfo['external_links']?></td>
				<td class="td_br_right"><?=$listInfo['total_links']?></td>
				<td class="td_br_right" style="text-align: right;">
				    <?php
				        if ($listInfo['score'] < 0) {
				            $scoreClass = 'minus';
				            $listInfo['score'] = $listInfo['score'] * -1;
				        } else {
				            $scoreClass = 'plus';
				        }
				        for($b=0;$b<=$listInfo['score'];$b++) echo "<span class='$scoreClass'>&nbsp;</span>";
				    ?>
				</td>
				<td class="td_br_right">
				    <?php echo $listInfo['brocken'] ? $spText['common']['Yes'] : $spText['common']['No']; ?>
				</td>
				<td class="<?=$rightBotClass?>">
				    <select style="width: 80px;" name="action" id="action<?=$listInfo['id']?>" onchange="doAction('siteauditor.php', 'subcontent', 'report_id=<?=$listInfo['id']?>&pageno=<?=$pageNo?>&order_col=<?=$orderCol?>&order_val=<?=$orderVal?>', 'action<?=$listInfo['id']?>')">
						<option value="select">-- <?=$spText['common']['Select']?> --</option>
						<option value="pagedetails"><?=$spTextSA['Page Details']?></option>
						<option value="checkscore"><?=$spTextSA['Check Score']?></option>
						<option value="deletepage"><?=$spText['common']['Delete']?></option>
					</select>
				</td>
			</tr>
			<?php
		}
	}else{	 
		echo showNoRecordsList($colCount-2, '', true);		
	} 
	?>
	<tr class="listBot">
		<td class="left" colspan="<?=($colCount-1)?>"></td>
		<td class="right"></td>
	</tr>
</table>
<?php if(empty($printVersion)) {?>
    <table width="100%" cellspacing="0" cellpadding="0" border="0" class="actionSec">
    	<tr>
        	<td style="padding-top: 6px;">
             	<a onclick="scriptDoLoad('siteauditor.php?sec=importlinks&project_id=<?=$projectId?>', 'content')" href="javascript:void(0);" class="actionbut">
             		<?=$spTextSA['Import Project Links']?>
             	</a>
        	</td>
    	</tr>
    </table>
<?php }?>
<?php 
$backLink = "scriptDoLoadPost('siteauditor.php', 'search_form', 'subcontent', '&sec=showreport&pageno={$post['pageno']}&order_col={$post['order_col']}&order_val={$post['order_val']}')";
?>
<br>
<div id="run_project">
	<div>&nbsp;<a href="javascript:void(0)" onclick="<?=$backLink?>" class="back">&#171&#171 Back</a></div>
	<div id="run_info">
		<table width="100%" border="0" cellspacing="0" cellpadding="0px" class="summary_tab">
        	<tr>
        		<td class="topheader" colspan="10"><?=$spTextSA['Page Details']?></td>
        	</tr>
        	<tr>
        		<th class="leftcell" width="20%"><?=$spTextSA['Page Link']?>:</th>
        		<td width="40%" style="text-align: left;"><a href="<?=$reportInfo['page_url']?>" target="_blank"><?=$reportInfo['page_url']?></a></td>
        		<th width="20%">Google Pagerank:</th>
        		<td><?=$reportInfo['pagerank']?></td>        		
        	</tr>
        	<tr>
        		<th class="leftcell"><?=$spText['label']['Title']?>:</th>
        		<td style="text-align: left;"><?=strip_tags($reportInfo['page_title'])?></td>
        		<th>Google <?=$spTextHome['Backlinks']?>:</th>
        		<td><?=$reportInfo['google_backlinks']?></td>
        	</tr>
        	<tr>
        		<th class="leftcell"><?=$spText['label']['Description']?>:</th>
        		<td style="text-align: left;"><?=strip_tags($reportInfo['page_description'])?></td>
        		<th>Bing <?=$spTextHome['Backlinks']?>:</th>
        		<td><?=$reportInfo['bing_backlinks']?></td>
        	</tr>
        	<tr>
        		<th class="leftcell"><?=$spText['label']['Keywords']?>:</th>
        		<td style="text-align: left;"><?=strip_tags($reportInfo['page_keywords'])?></td>
        		<th>Google <?=$spTextHome['Indexed']?>:</th>
        		<td><?=$reportInfo['google_indexed']?></td>
        	</tr>
        	<tr>
        		<th class="leftcell"><?=$spText['label']['Comments']?>:</th>
        		<td style="text-align: left;"><?=$reportInfo['comments']?></td>
        		<th>Bing <?=$spTextHome['Indexed']?>:</th>
        		<td><?=$reportInfo['bing_indexed']?></td>
        	</tr>
        	<tr>
        		<th class="leftcell"><?=$spTextSA['Total Links']?>:</th>
        		<td style="text-align: left;"><?=$reportInfo['total_links']?></td>
        		<th><?=$spTextSA['External Links']?>:</th>
        		<td><?=$reportInfo['external_links']?></td>
        	</tr>
        	<tr>
        		<th class="leftcell"><?=$spText['label']['Score']?>:</th>
        		<td style="text-align: left;">
        		    <?php
				        if ($reportInfo['score'] < 0) {
				            $scoreClass = 'minus';
				            $reportInfo['score'] = $reportInfo['score'] * -1;
				        } else {
				            $scoreClass = 'plus';
				        }
				        for($b=0;$b<=$reportInfo['score'];$b++) echo "<span class='$scoreClass'>&nbsp;</span>";
				    ?>
        		    <?=$reportInfo['score']?>
    			</td>
        		<th><?=$spText['label']['Brocken']?>:</th>
        		<td><?php echo $reportInfo['brocken'] ? $spText['common']['Yes'] : $spText['common']['No']; ?></td>
        	</tr>
        </table>
	</div>
	
	<br><br>
	<?php echo showSectionHead($spTextSA['Page Links']); ?>
	<div>		
		<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
        	<tr class="listHead">
        		<td class="leftid"><?=$spText['common']['No']?></td>		
        		<td><?=$spText['common']['Url']?></td>		
        		<td><?=$spTextSA['Anchor']?></td>		
        		<td><?=$spTextSA['Link Title']?></td>		
        		<td><?=$spTextSA['Nofollow']?></td>
        		<td class="right"><?=$spTextSA['External']?></td>
        	</tr>
        	<?php
        	$colCount = 6; 
        	if(count($linkList) > 0){
        		$catCount = count($list);
        		foreach($linkList as $i => $listInfo){
        			$class = ($i % 2) ? "blue_row" : "white_row";
                    if($catCount == ($i + 1)){
                        $leftBotClass = "tab_left_bot";
                        $rightBotClass = "tab_right_bot";
                    }else{
                        $leftBotClass = "td_left_border td_br_right";
                        $rightBotClass = "td_br_right";
                    }
        			?>
        			<tr class="<?=$class?>">
        				<td class="<?=$leftBotClass?>"><?=$i+1?></td>				
        				<td class="td_br_right left">
        				    <a href="<?=$listInfo['link_url']?>" target="_blank"><?=$listInfo['link_url']?></a>
        				</td>
        				<td class="td_br_right left"><?=$listInfo['link_anchor']?></td>
        				<td class="td_br_right left"><?=$listInfo['link_title']?></td>
        				<td class="td_br_right">
        				    <?php echo $listInfo['nofollow'] ? $spText['common']['Yes'] : $spText['common']['No']; ?>
        				</td>
        				<td class="<?=$rightBotClass?>">
        					<?php echo $listInfo['extrenal'] ? $spText['common']['Yes'] : $spText['common']['No']; ?>
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
	</div>
</div>
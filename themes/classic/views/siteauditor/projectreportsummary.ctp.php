<?php
if(!empty($printVersion)) {
    showPrintHeader($spTextSA["Project Summary"]);	
} else {  
?>
    <div style="float:right;margin-right: 10px;margin-top: -24px;">
    	<a href="<?=$mainLink?>&doc_type=export"><img src="<?=SP_IMGPATH?>/icoExport.gif"></a> &nbsp;
    	<a target="_blank" href="<?=$mainLink?>&doc_type=print"><img src="<?=SP_IMGPATH?>/print_button.gif"></a>
    </div>
<?php
}
?>
<div id="run_project" style="margin-top: 40px;">
	<div id="run_info">
		<table width="100%" border="0" cellspacing="0" cellpadding="0px" class="summary_tab">
        	<tr>
        		<td class="topheader" colspan="10"><?=$spTextSA['Project Summary']?></td>
        	</tr>
        	<tr>
        		<th class="leftcell" width="20%"><?=$spTextSA['Project Url']?>:</th>
        		<td style="text-align: left;"><?=$projectInfo['url']?></td>
        		<th><?=$spText['label']['Score']?>:</th>
        		<td style="text-align: left;">
        		    <?php
				        if ($projectInfo['score'] < 0) {
				            $scoreClass = 'minus';
				            $projectInfo['score'] = $projectInfo['score'] * -1;
				        } else {
				            $scoreClass = 'plus';
				        }
				        for($b=0;$b<=$projectInfo['score'];$b++) echo "<span class='$scoreClass'>&nbsp;</span>";
				    ?>
        		    <?=$projectInfo['score']?>
    			</td>
        		<th><?=$spText['label']['Updated']?>:</th>
        		<td style="text-align: left;"><?=$projectInfo['last_updated']?></td>
        	</tr>
        	<tr>
        		<th class="leftcell"><?=$spTextSA['Maximum Pages']?>:</th>
        		<td><?=$projectInfo['max_links']?></td>
        		<th><?=$spTextSA['Pages Found']?>:</th>
        		<td><?=$projectInfo['total_links']?></td>
        		<th><?=$spTextSA['Crawled Pages']?>:</th>
        		<td><?=$projectInfo['crawled_links']?></td>
        	</tr>
        	<tr>
            	<?php
        	    foreach ($metaArr as $col => $label) {
    		        $class = ($col == "page_title") ? "leftcell" : "";
    		        ?>
    		        <th class="<?=$class?>"><?=$label?>:</th>
        			<td>
        				<a href="javascript:void(0)" onclick="scriptDoLoad('siteauditor.php', 'content', '&sec=viewreports&project_id=<?=$projectInfo['id']?>&report_type=<?=$col?>&')"><?=$projectInfo["duplicate_".$col]?></a>
        			</td>
    		        <?php	        
        	    } 
            	?>
        	</tr>
        	<tr>
        		<th class="leftcell">PR10:</th>
        		<td><?=$projectInfo['PR10']?></td>
        		<th>PR9:</th>
        		<td><?=$projectInfo['PR9']?></td>
        		<th>PR8:</th>
        		<td><?=$projectInfo['PR8']?></td>
        	</tr>
        	<tr>
        		<th class="leftcell">PR7:</th>
        		<td><?=$projectInfo['PR7']?></td>
        		<th>PR6:</th>
        		<td><?=$projectInfo['PR6']?></td>
        		<th>PR5:</th>
        		<td><?=$projectInfo['PR5']?></td>
        	</tr>
        	<tr>
        		<th class="leftcell">PR4:</th>
        		<td><?=$projectInfo['PR4']?></td>
        		<th>PR3:</th>
        		<td><?=$projectInfo['PR3']?></td>
        		<th>PR2:</th>
        		<td><?=$projectInfo['PR2']?></td>
        	</tr>
        	<tr>
        		<th class="leftcell">PR1:</th>
        		<td><?=$projectInfo['PR1']?></td>
        		<th>PR0:</th>
        		<td><?=$projectInfo['PR0']?></td>
        		<th><?=$spText['label']['Brocken']?>:</th>
        		<td><?=$projectInfo['brocken']?></td>
        	</tr>
        	
        	<tr>
            	<?php
        	    foreach ($seArr as $i => $se) {
    		        $class = $i ? "" :"leftcell";
    		        ?>
    		        <th class="<?=$class?>"><?=ucfirst($se)?> <?=$spTextHome['Backlinks']?>:</th>
        			<td><?=$projectInfo[$se."_backlinks"]?></td>
    		        <?php	        
        	    } 
            	?>
        		<th>&nbsp;</th>
        		<td>&nbsp;</td>
        	</tr>
        	<tr>
            	<?php
        	    foreach ($seArr as $i => $se) {
    		        $class = $i ? "" :"leftcell";
    		        ?>
    		        <th class="<?=$class?>"><?=ucfirst($se)?> <?=$spTextHome['Indexed']?>:</th>
        			<td><?=$projectInfo[$se."_indexed"]?></td>
    		        <?php	        
        	    } 
            	?>
        		<th>&nbsp;</th>
        		<td>&nbsp;</td>
        	</tr>
        </table>
	</div>
</div>
<?php echo showSectionHead($spTextSA["Run Project"]); ?>
<div id="run_project">
	<div id="run_info">
		<table width="100%" border="0" cellspacing="0" cellpadding="0px" class="summary_tab">
        	<tr>
        		<td class="topheader" colspan="10"><?=$spTextSA['Project Summary']?></td>
        	</tr>
        	<tr>
        		<th class="leftcell" width="20%"><?=$spText['common']['Website']?>:</th>
        		<td width="40%" style="text-align: left;"><?=$projectInfo['url']?></td>
        		<th width="20%"><?=$spTextSA['Maximum Pages']?>:</th>
        		<td><?=$projectInfo['max_links']?></td>
        	</tr>
        	<tr>
        		<th class="leftcell"><?=$spText['label']['Updated']?>:</th>
        		<td style="text-align: left;" id="last_updated"><?=$projectInfo['last_updated']?></td>
        		<th><?=$spTextSA['Pages Found']?>:</th>
        		<td id="total_links"><?=$projectInfo['total_links']?></td>
        	</tr>
        	<tr>
        		<th class="leftcell"><?=$spTextSA['Crawling Page']?>:</th>
        		<td style="text-align: left;" id="crawling_url"><?=$projectInfo['crawling_url']?></td>
        		<th><?=$spTextSA['Crawled Pages']?>:</th>
        		<td id="crawled_pages"><?=$projectInfo['crawled_links']?></td>
        	</tr>
        </table>
	</div>
	<p class='note'>
		<?=$spTextSA['pressescapetostopexecution']?>.
	    <?=scriptAJAXLinkHref('siteauditor.php', 'content', "sec=showrunproject&project_id=".$projectInfo['id'], $spText['label']['Click Here'])?> <?=$spTextSA['to run project again if you stopped execution']?>.
	</p>
	<div id="subcontmed">
		<script>scriptDoLoad('siteauditor.php?sec=runproject&project_id=<?=$projectInfo['id']?>', 'subcontmed');</script>
	</div>
</div>
<?php if(!empty($printVersion)) {?>
	<div style="background-color:white;padding:50px 10px;">
	<?php echo showSectionHead($spTextTools['Keyword Position Summary']); ?>
	<script type="text/javascript">
	function loadJsCssFile(filename, filetype){
		if (filetype=="js"){ //if filename is a external JavaScript file
			var fileref=document.createElement('script')
			fileref.setAttribute("type","text/javascript")
			fileref.setAttribute("src", filename)
		}else if (filetype=="css"){ //if filename is an external CSS file
			var fileref=document.createElement("link")
			fileref.setAttribute("rel", "stylesheet")
			fileref.setAttribute("type", "text/css")
			fileref.setAttribute("href", filename)
		}
		if (typeof fileref!="undefined")
			document.getElementsByTagName("head")[0].appendChild(fileref)
	}
	window.print();
	</script>
	<?php 
	print '<script>loadJsCssFile("'.SP_CSSPATH."/screen.css".'", "css")</script>';
	$websiteId = '';
	?>
<?php } else {?>
	<?php echo showSectionHead($spTextTools['Keyword Position Summary']); ?>
	<form id='search_form'>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="search">
		<tr>
			<th width="100px"><?=$spText['common']['Website']?>: </th>
			<td width="200px">
				<select name="website_id" id="website_id" style='width:190px;' onchange="scriptDoLoadPost('reports.php', 'search_form', 'content', '&sec=reportsum')">
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
			<td colspan="2"><a href="javascript:void(0);" onclick="scriptDoLoadPost('reports.php', 'search_form', 'content', '&sec=reportsum')" class="actionbut"><?=$spText['button']['Show Records']?></a></td>
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
	?>
	<div style="float:right;margin-right: 10px;">
		<a href="<?=SP_WEBPATH?>/reports.php?sec=reportsum&doc_type=export&website_id=<?=$websiteId?>"><img src="<?=SP_IMGPATH?>/icoExport.gif"></a> &nbsp;
		<a target="_blank" href="<?=SP_WEBPATH?>/reports.php?sec=reportsum&doc_type=print&website_id=<?=$websiteId?>"><img src="<?=SP_IMGPATH?>/print_button.gif"></a>
	</div>
<?php }?>

<div id='subcontent' style="margin-top: 10px;">
<table width="100%" border="0" cellspacing="0" cellpadding="2px;" class="list">
	<tr>
	<td width='33%'>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">		
		<?php if (empty($websiteId)) {?>
			<td class="left"><?=$spText['common']['Website']?></td>
			<td><?=$spText['common']['Keyword']?></td>
		<?php } else { ?>
			<td class="left"><?=$spText['common']['Keyword']?></td>
		<?php }?>
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
	$colCount = empty($websiteId) ? $seCount + 2 : $seCount + 1; 
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
				<?php if (empty($websiteId)) {?>
					<td class="<?=$leftBotClass?>" width='250px;'><?php echo $listInfo['weburl']; ?></td>
					<td class='td_br_right' width='250px;'><?php echo $keywordLink; ?></td>
				<?php } else { ?>
					<td class="<?=$leftBotClass?>" width='100px;'><?php echo $keywordLink; ?></td>
				<?php }?>				
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

<?php if(!empty($printVersion)) {?>
</div>
<?php }?>
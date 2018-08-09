<?php echo showSectionHead($spTextTools['Website Search Reports']); ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left"><?php echo $spText['label']['Clicks']?></td>
		<td><?php echo $spText['label']['Impressions']?></td>
		<td><?php echo "CTR"?></td>
		<td class="right"><?php echo $spTextWB['Average Position']?></td>
	</tr>
	<tr class="white_row">
		<td class='tab_left_bot'><?php echo $websiteReport['clicks']?></td>
		<td class='td_br_right left'><?php echo $websiteReport['impressions']?></td>
		<td class='td_br_right left'><?php echo round($websiteReport['ctr'] * 100, 2)?></td>
		<td class="tab_right_bot" style='text-align:left;padding-left:10px;'><?php echo round($websiteReport['average_position'], 2)?></td>
	</tr>
	<tr class="listBot">
		<td class="left" colspan="3"></td>
		<td class="right"></td>
	</tr>
</table>

<br>
<?php echo showSectionHead($spTextTools['Keyword Search Reports']); ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left"><?php echo $spText['common']['Name']?></td>
		<td><?php echo $spText['label']['Clicks']?></td>
		<td><?php echo $spText['label']['Impressions']?></td>
		<td><?php echo "CTR"?></td>
		<td class="right"><?php echo $spTextWB['Average Position']?></td>
	</tr>
	<?php
	$colCount = 5; 
	if(count($keywordAnalytics) > 0){
		$catCount = count($keywordAnalytics);
		$i = 0;
		foreach($keywordAnalytics as $keyword => $listInfo){
			
			$class = ($i % 2) ? "blue_row" : "white_row";
            if($catCount == ($i + 1)){
                $leftBotClass = "tab_left_bot";
                $rightBotClass = "tab_right_bot";
            }else{
                $leftBotClass = "td_left_border td_br_right";
                $rightBotClass = "td_br_right";
            }
            
            $foundStyle = stristr($keyword, $searchInfo['name']) ? "background-color: #ffff00;" : "";
			?>
			<tr class="<?php echo $class?>" style="<?php echo $foundStyle?>">
				<td class="<?php echo $leftBotClass?>"><?php echo $keyword; ?></td>
				<td class='td_br_right left'><?php echo $listInfo['clicks']?></td>
				<td class='td_br_right left'><?php echo $listInfo['impressions']?></td>
				<td class='td_br_right left'><?php echo round($listInfo['ctr'] * 100, 2)?></td>
				<td class="<?php echo $rightBotClass?>" style='text-align:left;padding-left:10px;'>
					<?php echo round($listInfo['position'], 2)?>
				</td>
			</tr>
			<?php
			$i++;
		}
	}else{
		?>
		<tr class="blue_row">
		    <td class="tab_left_bot_noborder">&nbsp;</td>
		    <td class="td_bottom_border" colspan="<?php echo ($colCount-1)?>"><?php echo $spText['common']['No Records Found']?>!</td>
		    <td class="tab_right_bot">&nbsp;</td>
		</tr>
		<?php		
	} 
	?>
	<tr class="listBot">
		<td class="left" colspan="<?php echo ($colCount-1)?>"></td>
		<td class="right"></td>
	</tr>	
</table>
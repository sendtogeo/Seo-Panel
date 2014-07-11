<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left"><?=$spText['common']['Id']?></td>
		<td><?=$spText['common']['Url']?></td>		
		<td><?=$spText['common']['Google Pagerank']?></td>
		<td class="right"><?=$spText['common']['Alexa Rank']?></td>
	</tr>
	<?php
	$colCount = 4; 
	if(count($list) > 0){
		$catCount = count($list);
		$i = 0;
		foreach($list as $url){
			
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
				<td class="<?=$leftBotClass?>"><?=($i+1)?></td>
				<td class="td_br_right" style="text-align: left;"><?=$url?></td>
				<td width="150px" id='googlerank<?=$i?>' class='td_br_right rankarea'>
					<script type="text/javascript">
						scriptDoLoadPost('rank.php', 'tmp', 'googlerank<?=$i?>', 'sec=showpr&url=<? echo urlencode($url); ?>');
					</script>
				</td>
				<td class="<?=$rightBotClass?>" width="150px" id='alexarank<?=$i?>' class='rankarea'>
					<script type="text/javascript">
						scriptDoLoadPost('rank.php', 'tmp', 'alexarank<?=$i?>', 'sec=showalexa&url=<? echo urlencode($url); ?>');
					</script>
				</td>
			</tr>
			<?php
			$i++;
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
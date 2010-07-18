<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left">Url</td>
		<td>Google</td>
		<td>Yahoo</td>
		<td>MSN</td>
		<td>Altavista</td>
		<td class="right">Alltheweb</td>
	</tr>
	<?php
	$colCount = 6; 
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
            $tdWidth = "80px";            
			?>
			<tr class="<?=$class?>">
				<td class="<?=$leftBotClass?>" style="text-align:left;padding-left:10px;"><?=$url?></td>
				<td class="td_br_right" width="<?=$tdWidth?>" id='googlerank<?=$i?>'>
					<script type="text/javascript">
						scriptDoLoad('backlinks.php', 'googlerank<?=$i?>', 'sec=backlink&engine=google&url=<? echo urlencode($url); ?>');
					</script>
				</td>
				<td class="td_br_right" width="<?=$tdWidth?>" id='yahoorank<?=$i?>'>
					<script type="text/javascript">
						scriptDoLoad('backlinks.php', 'yahoorank<?=$i?>', 'sec=backlink&engine=yahoo&url=<? echo urlencode($url); ?>');
					</script>
				</td>
				<td class="td_br_right" width="<?=$tdWidth?>" id='msnrank<?=$i?>'>
					<script type="text/javascript">
						scriptDoLoad('backlinks.php', 'msnrank<?=$i?>', 'sec=backlink&engine=msn&url=<? echo urlencode($url); ?>');
					</script>
				</td>
				<td class="td_br_right" width="<?=$tdWidth?>" id='altarank<?=$i?>'>
					<script type="text/javascript">
						scriptDoLoad('backlinks.php', 'altarank<?=$i?>', 'sec=backlink&engine=altavista&url=<? echo urlencode($url); ?>');
					</script>
				</td>
				<td class="<?=$rightBotClass?>" width="<?=$tdWidth?>" id='alwebrank<?=$i?>'>
					<script type="text/javascript">
						scriptDoLoad('backlinks.php', 'alwebrank<?=$i?>', 'sec=backlink&engine=alltheweb&url=<? echo urlencode($url); ?>');
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
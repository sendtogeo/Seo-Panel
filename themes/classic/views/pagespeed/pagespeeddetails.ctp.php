<?php echo showSectionHead('PageSpeed Details'); ?>
<div id='subcontent'>
<div class="speed_details">

	<div class="tab">
		<button class="tablinks active" onclick="openTab(event, 'desktop')">Desktop</button>
		<button class="tablinks" onclick="openTab(event, 'mobile')">Mobile</button>
	</div>
	
	<style>
	.speed_details h2{margin: 0 0 10px 0; }
	.speed_details h3{margin: 10px 0px;}
	.speed_details .score{background-color: #F0F0F0; width: 200px; margin: 20px 0px; padding: 8px;}
	.speed_details .score_val, .speed_details .imapct_area, .speed_details .url_area{margin: 8px 0;}	
	</style>	
	
	<?php 
	foreach ($reportList[$url] as $deviceType => $deviceInfo) {
		$divStyle = ($deviceType == 'desktop') ? "display: block;" : "";
		
		// chekc rule impact
		if ($deviceInfo['speed_score'] < 85) {
			$style = "color: #FDA100";
		} else {
			$style = "color: #009A2D";
		}
		
		// chekc rule impact
		if ($deviceInfo['usability_score'] < 85) {
			$usabilityStyle = "color: #FDA100";
		} else {
			$usabilityStyle = "color: #009A2D";
		}
		
		?>
		<div id="<?php echo $deviceType;?>" class="tabcontent" style="<?php echo $divStyle; ?>">
		
			<div class="score">
				<h2>Score</h2>
				<div class="score_val" style="<?php echo $style?>"><b>Speed:</b> <?php echo $deviceInfo['speed_score']?> / 100</div>	
				
				<?php if ($deviceType == 'mobile') {?>
					<div class="score_val" style="<?php echo $usabilityStyle?>"><b>Usability:</b> <?php echo $deviceInfo['usability_score']?> / 100</div>
				<?php }?>
			</div>
			
			<?php 
			foreach ($deviceInfo['details'] as $ruleType => $ruleInfo) {

				// chekc rule impact
				if ($ruleInfo['ruleImpact']) {
					$style = "color: #FDA100";
				} else {
					$style = "color: #009A2D";
				}
				?>
				<h3 style="<?php echo $style?>">>> <?php echo $ruleInfo['localizedRuleName']?></h3>
				<div class="imapct_area"><b>Impact:</b> <?php echo $ruleInfo['impactGroup']?></div>
				<div><?php echo $ruleInfo['summary']?></div>
				<?php 
				foreach ($ruleInfo['urlBlocks'] as $urlBlockInfo) {
					?>
					<h4><?php echo $urlBlockInfo['header']?></h4>
					<?php
					foreach ($urlBlockInfo['urls'] as $url) {
						?>
						<div class="url_area"><?php echo $url?></div>
						<?php
					}
				}
				?>
				<div style="clear: both;">&nbsp;</div>
				<?php
			}
			?>
		</div>
		<?php
	}
	?>
</div>
</div>
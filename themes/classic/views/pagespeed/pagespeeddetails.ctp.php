<?php echo showSectionHead($spTextPS['PageSpeed Details']); ?>
<div id='subcontent'>
<div class="speed_details">

	<div class="tab">
		<button class="tablinks active" onclick="openTab('desktop', true)" id="desktopLink"><?php echo $spText['label']['Desktop']?></button>
		<button class="tablinks" onclick="openTab('mobile', true)" id="mobileLink"><?php echo $spText['label']['Mobile']?></button>
	</div>
	
	<?php 
	foreach ($reportList[$url] as $deviceType => $deviceInfo) {
		$divStyle = ($deviceType == 'desktop') ? "display: block;" : "";
		
		// chekc speed rule
		if ($deviceInfo['speed_score'] < 50) {
			$style = "color: #DD4B3E";
		} else if ($deviceInfo['speed_score'] < 85) {
			$style = "color: #FDA100";
		} else {
			$style = "color: #009A2D";
		}
		
		// check usability rule
		if ($deviceInfo['usability_score'] < 50) {
			$usabilityStyle = "color: #DD4B3E";
		} else if ($deviceInfo['usability_score'] < 85) {
			$usabilityStyle = "color: #FDA100";
		} else {
			$usabilityStyle = "color: #009A2D";
		}
		
		?>
		<div id="<?php echo $deviceType;?>" class="tabcontent" style="<?php echo $divStyle; ?>">
		
			<div class="score">
				<h2><?php echo $spText['label']['Score']?></h2>
				<div class="score_val" style="<?php echo $style?>"><b><?php echo $spText['label']['Speed']?>:</b> <?php echo $deviceInfo['speed_score']?> / 100</div>	
				
				<?php if ($deviceType == 'mobile') {?>
					<div class="score_val" style="<?php echo $usabilityStyle?>"><b><?php echo $spText['label']['Usability']?>:</b> <?php echo $deviceInfo['usability_score']?> / 100</div>
				<?php }?>
			</div>
			
			<?php 
			foreach ($deviceInfo['details'] as $ruleType => $ruleInfo) {

				// chekc rule impact
				if ($ruleInfo['ruleImpact']) {
					$style = "color: #FDA100;";
				} else {
					$style = "color: #009A2D;";
				}
				?>
				<h3 style="<?php echo $style?> padding-top: 8px; border-top: 1px solid #ccc;">>> <?php echo $ruleInfo['localizedRuleName']?></h3>
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
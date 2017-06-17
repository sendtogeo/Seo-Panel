<?php echo showSectionHead($spTextTools['Quick PageSpeed Checker']); ?>
<div id='subcontent'>
<div class="speed_details">
	<?php 
	foreach ($reportList[$url] as $deviceType => $deviceInfo) {
		?>
		<h2><?php echo $deviceType?></h2>
		<div><?php echo $deviceInfo['speed_score']?></div>
		<div><?php echo $deviceInfo['usability_score']?></div>
		<?php 
		foreach ($deviceInfo['details'] as $ruleType => $ruleInfo) {
			?>
			<h3><?php echo $ruleInfo['localizedRuleName']?></h3>
			<div><?php echo $ruleInfo['summary']?></div>
			<div><?php echo $ruleInfo['impactGroup']?></div>
			<?php 
			foreach ($ruleInfo['urlBlocks'] as $urlBlockInfo) {
				?>
				<h4><?php echo $urlBlockInfo['header']?></h4>
				<?php
				foreach ($urlBlockInfo['urls'] as $url) {
					?>
					<div><?php echo $url?></div>
					<?php
				}
			}
		}
		
	}
	?>
</div>
</div>
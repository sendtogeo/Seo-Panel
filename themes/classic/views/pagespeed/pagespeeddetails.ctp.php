<?php echo showSectionHead($spTextTools['PageSpeed Details']); ?>
<div id='subcontent'>
<div class="speed_details">

	<div class="tab">
		<button class="tablinks active" onclick="openTab(event, 'desktop')">Desktop</button>
		<button class="tablinks" onclick="openTab(event, 'mobile')">Mobile</button>
	</div>	
	
	<?php 
	foreach ($reportList[$url] as $deviceType => $deviceInfo) {
		$divStyle = ($deviceType == 'desktop') ? "display: block;" : "";
		?>
		<div id="<?php echo $deviceType;?>" class="tabcontent" style="<?php echo $divStyle; ?>">
		
			
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
			?>
		</div>
		<?php
	}
	?>
</div>
</div>
<div>
	<div class="col">
        <?php echo getRoundTabTop(); ?>
        <div id="round_content">
    		<div class="Block">
    			<?php echo showSectionHead($spTextSubscription['Plans and Pricing']); ?>
    			
    			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
    				
					<tr class="plainHead">
						<?php $width = 100 / (count($list) + 1); ?>
						<td class="left" style="width: <?php echo $width?>%"><?php echo $spText['label']["Feature"];?></td>
						<?php foreach ($list as $listInfo) {?>
							<td style="width: <?php echo $width?>%"><?php echo ucwords($listInfo['user_type'])?></td>
						<?php }?>
					</tr>
					
					<tr class="white_row">
						<td class="left td_left_border td_br_right bold"><?php echo $spText['common']["Details"];?></td>
						<?php foreach ($list as $listInfo) {?>
							<td class="td_br_right"><p><?php echo $listInfo['description']?></p></td>
						<?php }?>
					</tr>
					
					<?php 
					foreach ($utypeSpecList as $specName => $specLabel) {
						$boolVal = (stristr($specName, 'plugin_') || stristr($specName, 'seotool_')) ? true : false;
						?>
						<tr class="white_row">
							<td class="left td_left_border td_br_right bold"><?php echo $specLabel?></td>
							<?php foreach ($list as $listInfo) {?>
								<td class="td_br_right">
									<?php
									if ($specName == 'free_trial_period') {
										$days = intval($listInfo[$specName]);
										echo !empty($days) ? $days . " {$spText['label']['Days']}" : "-";
									} else if ($specName == 'price') {
										$orderLink = SP_WEBPATH . '/register.php?utype_id=' . $listInfo['id'];
										?>
										<b style="font-size: 18px;color: #FF6600;">
											<?php
											if (!empty($listInfo[$specName])) {
												echo $currencyList[SP_PAYMENT_CURRENCY]['symbol'] . floatval($listInfo[$specName]) . "<font style='font-size: 12px;font-weight: normal;'>/" . $spText['label']['Monthly'] . "</font>";
											} else {
												echo $spText['label']['Free'];
											}
											?>
										</b>
										<br><br>
										<a class="actionbut" href="<?php echo $orderLink; ?>" style="font-size: 16px;"><?php echo $spText['common']['Sign Up']; ?> &gt;&gt;</a>
										<br><br>
										<?php
									} else {																		
										if ($boolVal) {
											echo $listInfo[$specName] ? "<font class='success'>{$spText['common']['Yes']}</font>" : "<font class='error'>{$spText['common']['No']}</font>";
										} else {
											echo $listInfo[$specName];
										}
									}
									?>
								</td>
							<?php }?>
							
						</tr>
						<?php
					}
					?>
					
					<tr class="white_row">
						<td class="left">&nbsp;</td>
						<?php foreach ($list as $listInfo) {
							$orderLink = SP_WEBPATH . '/register.php?utype_id=' . $listInfo['id'];
							?>
							<td>
								<br>
								<a class="actionbut" href="<?php echo $orderLink; ?>" style="font-size: 16px;"><?php echo $spText['common']['Sign Up']; ?> &gt;&gt;</a>
							</td>
						<?php }?>
					</tr>					
    				
    			</table>
				
    		</div>
		</div>
		<?php echo getRoundTabBot(); ?>
	</div>
</div>
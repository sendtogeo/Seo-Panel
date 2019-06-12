<div class="container col-md-10">
	<h2 class="public_head">
		<i class="fas fa-money-check-alt"></i>
		<?php echo $spTextSubscription['Plans and Pricing']?>
	</h2>
	<div class="public_form">
    			
    			<table id="cust_tab">
    				
					<tr style="font-size: 18px;">
						<?php $width = 100 / (count($list) + 1); ?>
						<th style="width: <?php echo $width?>%"><?php echo $spText['label']["Feature"];?></th>
						<?php foreach ($list as $listInfo) {?>
							<th style="text-align: center; width: <?php echo $width?>%"><?php echo ucwords($listInfo['user_type'])?></th>
						<?php }?>
					</tr>
					
					<tr>
						<th style="font-weight: normal;"><?php echo $spText['common']["Details"];?></th>
						<?php foreach ($list as $listInfo) {?>
							<td align="center"><p><?php echo $listInfo['description']?></p></td>
						<?php }?>
					</tr>
					
					<?php 
					foreach ($utypeSpecList as $specName => $specLabel) {
						$boolVal = (stristr($specName, 'plugin_') || stristr($specName, 'seotool_')) ? true : false;
						?>
						<tr>
							<th style="font-weight: normal;"><?php echo $specLabel?></th>
							<?php foreach ($list as $listInfo) {?>
								<td align="center">
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
										<a class="btn btn-success" href="<?php echo $orderLink; ?>" style="font-size: 16px;"><?php echo $spText['common']['Sign Up']; ?> &gt;&gt;</a>
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
					
					<tr>
						<th>&nbsp;</th>
						<?php foreach ($list as $listInfo) {
							$orderLink = SP_WEBPATH . '/register.php?utype_id=' . $listInfo['id'];
							?>
							<td align="center">
								<br>
								<a class="btn btn-success" href="<?php echo $orderLink; ?>"><?php echo $spText['common']['Sign Up']; ?> &gt;&gt;</a>
								<br><br>
							</td>
						<?php }?>
					</tr>					
    				
    			</table>
				
    		</div>
</div>
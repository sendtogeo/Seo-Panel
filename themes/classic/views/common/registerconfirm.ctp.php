<div class="container col-md-6">
	<h2 class="public_head">
		<i class="fas fa-user-tie"></i>
		<?php echo $spText['login']['Create New Account']?>
	</h2>
	<div class="public_form">	
		<?php if (!empty($paymentForm)) {?>
			<div class="form-group"><?php echo $paymentForm;?></div>
		<?php } else { ?>
			<div class="form-group">
				<?php
				if (!empty($error)) {
	            	echo $error;
	            } else {			
					if($confirm){
						showSuccessMsg($spText['login']['Your account activated successfully'], false);
					} else {
						showSuccessMsg($spText['login']['newaccountsuccess'], false);
					}

					?>
					<a class="btn btn-success" href="<?php echo SP_WEBPATH?>/login.php"><?php echo $spText['login']['Sign in to your account']?> >></a>
					<?php
	            }
	            ?>
			</div>
		<?php }?>
	</div>
</div>
<div class="container col-md-6">
	<h2 class="public_head">
		<i class="fas fa-user-tie"></i>
		<?php echo $spText['login']['Forgot password?']?>
	</h2>
	<div class="public_form">
		<?php if(!empty($error)) {?>
			<h4><?php echo $spText['login']['Your Password Reset Failed']?></h4>
			<?php showErrorMsg($error, false); ?>
		<?php } else {?>
			<h4><?php echo $spText['login']['Your Password Reset Successfully']?></h4>
			<?php echo showSuccessMsg($spText['login']['password_reset_success_message'], false); ?>
		<?php }?>
	</div>
</div>
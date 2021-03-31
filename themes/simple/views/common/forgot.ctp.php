<div class="container col-md-6">
	<h2 class="public_head">
		<i class="fas fa-user-tie"></i>
		<?php echo $spText['login']['Forgot password?']?>
	</h2>
	<div class="public_form">
	<form name="loginForm" method="post" action="<?php echo SP_WEBPATH?>/login.php?sec=forgot">
	    <input type="hidden" name="sec" value="requestpass">
		<div class="form-group">
			<label for="email"><?php echo $spText['login']['Email']?>:</label> 
			<input type="email" name="email" value="<?php echo htmlentities($post['email'], ENT_QUOTES)?>" required="required" class="form-control">
			<?php echo $errMsg['email']?>
		</div>
		<div class="form-group">
			<?php if (SP_ENABLE_RECAPTCHA && !empty(SP_RECAPTCHA_SITE_KEY) && !empty(SP_RECAPTCHA_SECRET_KEY)) {?>
				<script src="https://www.google.com/recaptcha/api.js" async defer></script>
    			<div class="form-group">
					<div class="g-recaptcha" data-sitekey="<?php echo SP_RECAPTCHA_SITE_KEY?>"></div>
				</div>
			<?php } else {?>
				<label for="email"><?php echo $spText['login']['Enter the code as it is shown']?>:</label>
    			<div class="form-group">
    				<img src="<?php echo SP_WEBPATH?>/visual-captcha.php">
    			</div>
    			<input type="text" name="code" value="<?php echo $post['code']?>" required="required" class="form-control">
			<?php }?>
			<?php echo $errMsg['code']?>
		</div>
		<?php if (!isLoggedIn()) { ?>
			<a href="<?php echo SP_WEBPATH?>/login.php" class="btn btn-secondary" role="button"><?php echo $spText['button']['Cancel']?></a>
			<button name="login" type="submit" class="btn btn-primary"><?php echo $spText['login']['Request Password']?></button>
		<?php }?>
	</form>
	</div>
</div>
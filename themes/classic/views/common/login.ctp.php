<div class="container col-md-6">
	<h2 class="public_head">
		<i class="fas fa-user-tie"></i>
		<?php echo ucwords($spText['common']['signin'])?>
	</h2>
	<form name="loginForm" method="post" action="<?php echo SP_WEBPATH?>/login.php" class="public_form">
		<input type="hidden" name="sec" value="login">
		<input type="hidden" name="referer" value="<?php echo $post['referer']?>"></input>
		<div class="form-group">
			<label for="email"><?php echo $spText['login']['Username']?>:</label> 
			<input type="text" class="form-control" id="userName" name="userName" required="required">
			<?php echo $errMsg['userName']?>
		</div>
		<div class="form-group">
			<label for="pwd"><?php echo $spText['login']['Password']?>:</label>
			<input type="password" class="form-control" id="password" name="password" required="required">
			<?php echo $errMsg['password'] ? $errMsg['password']."<br>" : ""?>
			<a href="<?php echo SP_WEBPATH?>/login.php?sec=forgot"><?php echo $spText['login']['Forgot password?']?></a>
		</div>
		<button name="login" type="submit" class="btn btn-primary"><?php echo ucwords($spText['common']['signin'])?></button>
		<?php if(!isLoggedIn() && SP_USER_REGISTRATION){ ?>
			&nbsp;<a href="<?php echo SP_WEBPATH?>/register.php"><?php echo $spText['login']['Register']?></a>
		<?php }?>
	</form>
</div>
<div class="container col-md-6">
	<h2 class="public_head">
		<i class="fas fa-user-tie"></i>
		<?php echo $spText['login']['Create New Account']?>
	</h2>
	<div class="public_form">
	<form name="loginForm" method="post" action="<?php echo SP_WEBPATH?>/register.php">
        <input type="hidden" name="sec" value="register">	
		<?php 
		if (!empty($_GET['failed'])) {
			showErrorMsg($spTextSubscription['internal-error-payment'], false);
		}
		
		if (!empty($_GET['cancel'])) {
			showErrorMsg($spTextSubscription["Your transaction cancelled"], false);
		}
		?>
		
		<?php
		// if subscription plugin is active
		if ($subscriptionActive & !empty($userTypeList)){
			?>
			<div class="form-group">
				<label for="utype_id"><?php echo $spTextSubscription['Subscription']?>:</label>
				<select name="utype_id" class="form-control" id="utype_id">
					<?php
					foreach ($userTypeList as $userTypeInfo) {
						$selected = ($post['utype_id'] == $userTypeInfo['id']) ? "selected" : "";
						$typeLabel = ucfirst($userTypeInfo['user_type']) . " - ";
						
						// if user type have price
						if ($userTypeInfo['price'] > 0) {
							$typeLabel .= $currencyList[SP_PAYMENT_CURRENCY]['symbol'] . $userTypeInfo['price'] . "/" . $spText['label']['Monthly'];
						} else {
							$typeLabel .= $spText['label']['Free'];
						}										
						?>
						<option value="<?php echo $userTypeInfo['id']?>" <?php echo $selected;?>><?php echo $typeLabel?></option>
						<?php
					}
					?>
				</select>
				<?php echo $errMsg['utype_id'] ? "<br>". $errMsg['utype_id'] : $errMsg['utype_id']?>
				<div class="form-group" style="margin-top: 4px;">
					<a href="<?php echo SP_WEBPATH . "/register.php?sec=pricing"; ?>"><?php echo $spTextSubscription['Plans and Pricing']?> &gt;&gt;</a>
				</div>
			</div>
			<div class="form-group">
				<label for="quantity"><?php echo $spTextSubscription['Term']?>:</label>
				<select name="quantity" class="form-control" id="quantity">
					<?php
					for ($i = 1; $i <= 24; $i++) {
						$qty_label = ($i == 1) ? $spText['label']['Month'] : $spText['label']['Months'];
						?>
						<option value="<?php echo $i;?>"><?php echo $i . " $qty_label";?></option>
						<?php
					} 
					?>
				</select>
			</div>
			<?php $pgDisplay = count($pgList) > 1 ? "" : "display:none;";?>			
			<div class="form-group" style="<?php echo $pgDisplay?>">
				<label for="pg_id"><?php echo $spTextSubscription['Payment Method']?>:</label>
				<select name="pg_id" class="form-control" id="pg_id">
					<?php
					foreach ($pgList as $pgInfo) {
						$checked = ($defaultPgId == $pgInfo['id']) ? "selected" : ""
						?>
						<option value="<?php echo $pgInfo['id']?>" <?php echo $checked; ?> ><?php echo $pgInfo['name']; ?></option>
						<?php
					}
					?>
				</select>
				<?php echo $errMsg['pg_id']?>
			</div>
			<?php
		} else {
			?>
			<input type="hidden" name="utype_id" value="<?php echo $defaultUserTypeId; ?>">
		<?php }	?>
		
			<div class="form-group">
            	<label><?php echo $spText['login']['Username']?>:</label>
                <input type="text" name="userName" value="<?php echo $post['userName']?>" class="form-control" required="required">
 				<?php echo $errMsg['userName']?>
			</div>
			<div class="form-group">
            	<label><?php echo $spText['login']['Password']?>:</label>
                <input type="password" name="password" value="" class="form-control" required="required">
                <?php echo $errMsg['password']?>
			</div>
            <div class="form-group">
            	<label><?php echo $spText['login']['Confirm Password']?>:</label>
				<input type="password" name="confirmPassword" value="" class="form-control" required="required">
			</div>
			<div class="form-group">
            	<label><?php echo $spText['login']['First Name']?>:</label>
                <input type="text" name="firstName" value="<?php echo $post['firstName']?>" class="form-control" required="required">
                <?php echo $errMsg['firstName']?>
			</div>
			<div class="form-group">
            	<label><?php echo $spText['login']['Last Name']?>:</label>
                <input type="text" name="lastName" value="<?php echo $post['lastName']?>" class="form-control" required="required">
                <?php echo $errMsg['lastName']?>
			</div>
            <div class="form-group">
				<label><?php echo $spText['login']['Email']?>:</label>
                <input type="email" name="email" value="<?php echo $post['email']?>" class="form-control" required="required">
                <?php echo $errMsg['email']?>
			</div>
			<div class="form-group">
    			<?php if (SP_ENABLE_RECAPTCHA && !empty(SP_RECAPTCHA_SITE_KEY) && !empty(SP_RECAPTCHA_SECRET_KEY)) {?>
    				<script src="https://www.google.com/recaptcha/api.js" async defer></script>
        			<div class="form-group">
    					<div class="g-recaptcha" data-sitekey="<?php echo SP_RECAPTCHA_SITE_KEY?>"></div>
    				</div>
    			<?php } else {?>
                	<label><?php echo $spText['login']['Enter the code as it is shown']?>:</label>
    				<div class="form-group">
                    	<img src="<?php echo SP_WEBPATH?>/visual-captcha.php">
    				</div>
    				<input type="text" name="code" value="<?php echo $post['code']?>" class="form-control" required="required">
				<?php }?>
				<?php echo $errMsg['code']?>
			</div>
			<a href="<?php echo SP_WEBPATH?>/login.php" class="btn btn-secondary" role="button"><?php echo $spText['button']['Cancel']?></a>
			<button name="register" type="submit" class="btn btn-primary"><?php echo $spText['login']['Create my account']?></button>
	</form>
	</div>
</div>
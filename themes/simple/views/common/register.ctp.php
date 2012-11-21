<div class="Left">
	<div class="col">
        <?php echo getRoundTabTop(); ?>
        <div id="round_content">
    		<div class="Block">
                <form name="loginForm" method="post" action="<?=SP_WEBPATH?>/register.php">
                <input type="hidden" name="sec" value="register">
                <table width="100%" cellpadding="0" cellspacing="0" class="actionForm">
                	<tr>
                		<td>&nbsp;</td>
                		<th class="main_header"><?=$spText['login']['Create New Account']?></th>
                	</tr>
                	<tr>
                		<th width="28%"><?=$spText['login']['Username']?>:*</th>
                		<td><input type="text" name="userName" value="<?=$post['userName']?>"><?=$errMsg['userName']?></td>
                	</tr>
                	<tr>
                		<th><?=$spText['login']['Password']?>:*</th>
                		<td><input type="password" name="password" value=""><?=$errMsg['password']?></td>
                	</tr>
                	<tr>
                		<th><?=$spText['login']['Confirm Password']?>:*</th>
                		<td><input type="password" name="confirmPassword" value=""></td>
                	</tr>
                	<tr>
                		<th><?=$spText['login']['First Name']?>:*</th>
                		<td><input type="text" name="firstName" value="<?=$post['firstName']?>"><?=$errMsg['firstName']?></td>
                	</tr>
                	<tr>
                		<th><?=$spText['login']['Last Name']?>:*</th>
                		<td><input type="text" name="lastName" value="<?=$post['lastName']?>"><?=$errMsg['lastName']?></td>
                	</tr>
                	<tr>
                		<th><?=$spText['login']['Email']?>:*</th>
                		<td><input type="text" name="email" value="<?=$post['email']?>"><?=$errMsg['email']?></td>
                	</tr>
                	<tr>
                    	<th><?=$spText['login']['Enter the code as it is shown']?>:*</th>
                        <td>
                            <div style="margin: 5px 0 10px 0">
                                <img src="<?=SP_WEBPATH?>/visual-captcha.php">
                            </div>
                            <div>
                        	    <input type="text" name="code" value="<?=$post['code']?>"><?=$errMsg['code']?>
                            </div>
                        </td>
                    </tr>    	
                	<tr>
                		<td>&nbsp;</td>
                		<td colspan="0" class="actionsBox">
                			<input class="button" type="submit" name="login" value="<?=$spText['login']['Create my account']?> >>"/>
                		</td>
                	</tr>
                </table>
                </form>
    		</div>
		</div>
		<?php echo getRoundTabBot(); ?>
	</div>
</div>
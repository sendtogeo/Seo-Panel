<div class="Left">
	<div class="col">
        <?php echo getRoundTabTop(); ?>
        <div id="round_content">
            <div class="Block">
                <form name="loginForm" method="post" action="<?=SP_WEBPATH?>/login.php?sec=forgot">
                <input type="hidden" name="sec" value="requestpass">
                <table width="70%" cellpadding="0" cellspacing="0" class="actionForm" style="margin-top: 20px;">
                	<tr>
                		<td>&nbsp;</td>
                		<th class="main_header" colspan="2"><?=$spText['login']['Forgot password?']?></th>
                	</tr>
                	<tr>
                		<th><?=$spText['login']['Email']?>:</th>
                		<td><input type="text" class="large" name="email" value="<?=$post['email']?>"><?=$errMsg['email']?></td>
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
                		<th>&nbsp;</th>
                		<td class="actionsBox">
                			<?php if(!isLoggedIn() && SP_USER_REGISTRATION){ ?>
                				&nbsp;<input class="button" type="submit" name="login" value="<?=$spText['login']['Request Password']?> &gt;&gt"/>
                			<?php }?>
                		</td>
                	</tr>
                </table>               
                </form>
            </div>
        </div>
    	<?php echo getRoundTabBot(); ?>
	</div>
</div>
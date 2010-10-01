<div class="Left">
<div class="col">
<div class="Block">
<h1 class="BlockHeader"><?=ucwords($spText['common']['signin'])?></h1>
<br />
<form name="loginForm" method="post" action="<?=SP_WEBPATH?>/login.php">
<input type="hidden" name="sec" value="login">
<input type="hidden" name="referer" value="<?=$post['referer']?>"></input>
<table width="60%" cellpadding="0" cellspacing="0" class="actionForm">
	<tr>
		<th><?=$spText['login']['Login']?>:</th>
		<td><input type="text" name="userName" value="<?=$post['userName']?>"><?=$errMsg['userName']?></td>
	</tr>
	<tr>
		<th><?=$spText['login']['Password']?>:</th>
		<td><input type="password" name="password" value=""><?=$errMsg['password']?></td>
	</tr>
	<tr>
		<th>&nbsp;</th>
		<td class="actionsBox">
			<input class="button" type="submit" name="login" value="<?=ucwords($spText['common']['signin'])?> >>"/>
			<?php if(!isLoggedIn() && SP_USER_REGISTRATION){ ?>
				&nbsp;<a href="<?=SP_WEBPATH?>/register.php" style="font-size: 13px;"><?=$spText['login']['Register']?></a>
			<?php }?>
		</td>
	</tr>
</table>
</form>
</div>
</div>
</div>
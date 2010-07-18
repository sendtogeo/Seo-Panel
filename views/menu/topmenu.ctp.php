<h3>
	<span id="floatright"> 
		<a href="<?=SP_CONTACT_LINK?>" target="_blank" title="Contact Seo Panel">Contact</a> <span class="pipe">|</span>
		<a href="<?=SP_HELP_LINK?>" target="_blank" title="Seo Panel Help Guide">Help</a> <span class="pipe">|</span>
		<a href="<?=SP_FORUM_LINK?>" target="_blank" title="Seo Panel Forum">Forum</a> <span class="pipe">|</span>
		<?php 
		$userInfo = Session::readSession('userInfo');
		if(empty($userInfo['userId'])){	
		?> 			
			<a href="<?=SP_WEBPATH?>/login.php">Sign in</a>
		<?php }else{ ?>
			<a href="admin-panel.php?sec=myprofile">Profile</a> <span class="pipe">|</span>
			<a href="<?=SP_WEBPATH?>/login.php?sec=logout">Sign out</a>
		<?php }?>
	</span>
</h3>

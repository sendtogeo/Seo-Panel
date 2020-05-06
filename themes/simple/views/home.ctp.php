<div class="col" id="home_screen">
	<?php
	$blogContent = getCustomizerPage('home');
	if (!empty($blogContent['blog_content'])) {
	    echo $blogContent['blog_content'];
	} else {
	    
	    // add no follow option to SP links
	    $spTextHome['home_cont1'] = str_replace('<a ', '<a rel="nofollow" ', $spTextHome['home_cont1']);
	    $spTextHome['home_cont2'] = str_replace('<a ', '<a rel="nofollow" ', $spTextHome['home_cont2']);
	    $spTextHome['home_cont3'] = str_replace('<a ', '<a rel="nofollow" ', $spTextHome['home_cont3']);
    	?>
        <fieldset id="welcome_msg">
	        <ul class="infobox">
	        	<li>
	        		<?php echo str_replace('<?'.'=SP_PLUGINSITE?>', SP_PLUGINSITE, $spTextHome['home_cont1'])?>
	        	</li>
	        </ul>
        </fieldset>
        
        <?php 
        echo str_replace( array('<?'.'=SP_PLUGINSITE?>', '<?'.'=SP_INSTALLED?>'), array(SP_PLUGINSITE, ""), $spTextHome['home_cont2']);
        ?>
        
        <?php 
        $search = array(
			'<?'.'=SP_DOWNLOAD_LINK?>', '<?'.'=SP_DEMO_LINK?>', '<?'.'=SP_CONTACT_LINK?>', 
			'<?'.'=SP_HELP_LINK?>', '<?'.'=SP_FORUM_LINK?>', '<?'.'=SP_SUPPORT_LINK?>', '<?'.'=SP_DONATE_LINK?>', '<?'.'=SP_HOSTED_LINK?>'
		);
        $replace = array(SP_DOWNLOAD_LINK,SP_DEMO_LINK,SP_CONTACT_LINK,SP_HELP_LINK,SP_FORUM_LINK,SP_SUPPORT_LINK,SP_DONATE_LINK,SP_HOSTED_LINK);
        echo str_replace( $search, $replace, $spTextHome['home_cont3']);
    }?>
</div>

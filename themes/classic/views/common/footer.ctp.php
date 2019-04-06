
    <?php echo getRoundTabTop(); ?>
    <div id="round_content_footer">
    	<?php if (!empty($custSiteInfo['footer_copyright'])) {?>
    		<div><?php echo str_replace('[year]', date('Y'), $custSiteInfo['footer_copyright'])?></div>
    	<?php } else {?>
        	<div><?php echo str_replace('[year]', date('Y'), $spText['common']['copyright'])?></div>
            <div id="powered">
            	<?php echo $spText['common']['Powered by']; ?> <a href="<?php echo SP_MAIN_SITE?>" target="_blank" title="Seo Control Panel">Seo Panel</a> (Seo Control Panel)
            </div>
            <?php echo $translatorInfo?>
		<?php }?>
    </div>


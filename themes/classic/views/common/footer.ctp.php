<?php if (!empty($custSiteInfo['footer_copyright'])) {?>
	<div><?php echo str_replace('[year]', date('Y'), convertMarkdownToHtml($custSiteInfo['footer_copyright']))?></div>
<?php } else {?>
	<div><?php echo str_replace('[year]', date('Y'), $spText['common']['copyright'])?></div>
    <div id="powered">
    	<?php echo $spText['common']['Powered by']; ?> <a href="<?php echo SP_MAIN_SITE?>" target="_blank" title="Seo Control Panel">Seo Panel</a>
    	<?php echo $translatorInfo?>
    </div>    
<?php }?>


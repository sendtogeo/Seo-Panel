<?php 
echo ($subSec == "sponsors") ? showSectionHead($spText['label']['Sponsors']) : showSectionHead($spTextPanel['About Us']);

if (!empty($blogContent['blog_content'])) {
    echo $blogContent['blog_content'];
} else {
    ?>
    
    <?php if ($subSec != "sponsors") {?>
	    <table width="100%" cellspacing="0" cellpadding="0" class="summary">
	    	<tr><td class="topheader" colspan="2"><?php echo $spText['label']['Developers']?></td></tr>
	    	<tr>
	    		<td class="content" style="border-left: none;width: 30%">PHP, MYSQL, AJAX, HTML</td>					
	    		<td class="contentmid" style="text-align: left;padding-left: 10px">Geo Varghese</td>
	    	</tr>
	    	<tr>
	    		<td class="content" style="border-left: none;width: 30%">PHP, MYSQL, JQUERY</td>					
	    		<td class="contentmid" style="text-align: left;padding-left: 10px">Deepthy Rao</td>
	    	</tr>
	    	<tr>
	    		<td class="content" style="border-left: none;width: 30%">Visual Architect</td>					
	    		<td class="contentmid" style="text-align: left;padding-left: 10px">Chris Sievert</td>
	    	</tr>
	    </table>    
	    <br><br>
    <?php }?>
    <table width="100%" cellspacing="0" cellpadding="0" class="summary">
    	<tr><td class="topheader" colspan="2"><?php echo $spText['label']['Sponsors']?></td></tr>
    	<tr>
    		<td class="contentmid" colspan="2" style="border-left: none;font-size: 18px;text-align: left">
    			<a target="_blank" href="<?php echo SP_MAIN_SITE?>/aboutus/sponsors/">
    			    <?php echo str_replace('$100', '$500', $spTextSettings['Click here to become a sponsor for Seo Panel']); ?>
    			    <?php echo $spTextSettings['getallpluginfree']; ?>
    		   </a>
    		</td>
    	</tr>
    	<?php echo $sponsors?>
    </table>
    
    <?php if ($subSec != "sponsors") {?>
	    <br><br>    
	    <table width="100%" cellspacing="0" cellpadding="0" class="summary">
	    	<tr><td class="topheader" colspan="2"><?php echo $spText['label']['Translators']?></td></tr>
	    	<?php foreach($transList as $transInfo) {?>
	    		<tr>
	    			<td class="content" style="border-left: none;width: 30%"><?php echo $transInfo['lang_name']?></td>					
	    			<td class="contentmid" style="text-align: left;padding-left: 10px"><?php echo $transInfo['trans_name']?>, <a href="<?php echo $transInfo['trans_website']?>" target="_blank"><?php echo $transInfo['trans_company']?></a></td>
	    		</tr>
	    	<?php }?>
	    </table>
    <?php }?>
    
<?php }?>
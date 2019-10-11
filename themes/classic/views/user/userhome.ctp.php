<div class="col-sm-12">
	
    <?php if (SP_CUSTOM_DEV) {
        $dbTabClass = "active";
        $ovTabView = "";
        if (!empty($custSubMenu)) {
            $dbTabClass = "";
            $ovTabView = "active";
        }
        ?>
		<ul class="nav nav-tabs" style="margin-top: 6px;">
            <li class="nav-item">
            	<a class="sub_menu_link nav-link <?php echo $dbTabClass?>" href="<?php echo SP_WEBPATH?>/"><?php echo $spText['common']['Dashboard']?></a>
            </li>
            <li class="nav-item">
            	<a class="sub_menu_link nav-link <?php echo $ovTabView?>" href="<?php echo SP_WEBPATH?>/overview.php"><?php echo $spText['label']['Overview']?></a>
            </li>
        </ul>
    <?php }?>
    
    <?php if (SP_CUSTOM_DEV && !empty($custSubMenu)) {?>
    	<?php include(SP_VIEWPATH."/report/overview.ctp.php");?>
    <?php } else {?> 
        <div id="content">
        	<script type="text/javascript">
               	scriptDoLoad('archive.php', 'content', '<?php echo getRequestParamStr(); ?>');
        	</script>
        </div>
    <?php }?>
</div>
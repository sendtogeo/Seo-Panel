<div class="col-md-2" id="left_menu_sec">
	<nav class="navbar navbar-expand-md navbar-light bg-light">
      	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarLeftMenu"
      		aria-controls="navbarLeftMenu" aria-expanded="false" aria-label="Toggle navigation">
        	<span class="navbar-toggler-icon"></span>
      	</button>      	
    	<div class="collapse navbar-collapse" id="navbarLeftMenu">
    		<ul class="navbar-nav mr-auto">
    			<?php include_once(SP_VIEWPATH."/seotools/leftmenu.ctp.php");?>
    		</ul>
    	</div>
    </nav>
</div>
<div class="col-md-10">
    <div id="content">
		<?php if(!empty($defaultScript)) {?>
			<script type="text/javascript">
				scriptDoLoad('<?php echo $defaultScript?>', 'content', '<?php echo $defaultArgs?>');
			</script>
		<?php }?>
	</div>
</div>
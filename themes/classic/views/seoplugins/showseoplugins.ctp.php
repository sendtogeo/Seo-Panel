<div class="col-sm-2">
	<?php include_once(SP_VIEWPATH."/seoplugins/seopluginleftmenu.ctp.php");?>
</div>	
<div class="col-sm-10">
    <div id="content">
		<script type="text/javascript">
			<?php
			// to pass all get arguments to the selected plugin's action function
			$argString = "";
			foreach ($_GET as $name => $value) {
			    if (!in_array($name, array('sec', 'menu_selected'))) {
			        $argString .= "&$name=$value";    
			    }
			} 
			?>
			scriptDoLoad('seo-plugins.php?pid=<?php echo $menuSelected?><?php echo $argString?>', 'content', '');
		</script>
	</div>
</div>

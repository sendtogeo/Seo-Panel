<div class="col-sm-2">
	<?php include_once(SP_VIEWPATH."/seotools/leftmenu.ctp.php");?>
</div>	
<div class="col-sm-10">
    <div id="content">
		<?php if(!empty($defaultScript)) {?>
			<script type="text/javascript">
				scriptDoLoad('<?php echo $defaultScript?>', 'content', '<?php echo $defaultArgs?>');
			</script>
		<?php }?>
	</div>
</div>
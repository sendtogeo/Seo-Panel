<div class="Center" style='width:100%;'>
<div class="col" style="">
<div class="Block">
<table width="100%" border="0" cellspacing="0px" cellpadding="0">
	<tr>
		<td class="leftmenu" valign="top">
		<div>
		<?php include_once(SP_VIEWPATH."/seotools/leftmenu.ctp.php");?>
		</div>
		</td>
		<td width="8px">&nbsp;</td>
		<td id="content" height="340px" valign="top">
			<?php if(!empty($defaultScript)) {?>
				<script type="text/javascript">
					scriptDoLoad('<?=$defaultScript?>', 'content', '<?=$defaultArgs?>');
				</script>
			<?php }?>
		</td>
	</tr>
</table>

</div>
</div>
</div>

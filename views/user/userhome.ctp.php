<?php if(!empty($printVersion)) {?>
	<div style="background-color:white;padding:50px 10px;">
	<?php echo showSectionHead($spTextHome['Account Summary']); ?>
	<script type="text/javascript">
	function loadJsCssFile(filename, filetype){
		if (filetype=="js"){ //if filename is a external JavaScript file
			var fileref=document.createElement('script')
			fileref.setAttribute("type","text/javascript")
			fileref.setAttribute("src", filename)
		}else if (filetype=="css"){ //if filename is an external CSS file
			var fileref=document.createElement("link")
			fileref.setAttribute("rel", "stylesheet")
			fileref.setAttribute("type", "text/css")
			fileref.setAttribute("href", filename)
		}
		if (typeof fileref!="undefined")
			document.getElementsByTagName("head")[0].appendChild(fileref)
	}
	window.print();
	</script>
	<?php print '<script>loadJsCssFile("'.SP_CSSPATH."/screen.css".'", "css")</script>'; ?>
<?php } else {?>

	<div class="Center" style='width:100%;'>
	<div class="col" style="">
	
	<div class="SectionHeader">
	<h1 style="text-align:center;border: none;"><?=$spTextHome['Account Summary']?></h1>
	</div>
	<br />
	
	<div style="float:right;margin-right: 10px;">
		<a href="<?=SP_WEBPATH?>/index.php?doc_type=export"><img src="<?=SP_IMGPATH?>/icoExport.gif"></a> &nbsp;
		<a target="_blank" href="<?=SP_WEBPATH?>/index.php?doc_type=print"><img src="<?=SP_IMGPATH?>/print_button.gif"></a>
	</div>
<?php }?>
<div class="Block" style="margin-top: 28px;">
	<?php
	$colSpan = 14; 
	?>
	<table width="100%" cellspacing="0" cellpadding="0" class="summary">
		<tr><td class="topheader" colspan="<?=$colSpan?>"><?=$spTextHome['Website Statistics']?></td></tr>
		<tr>
			<td class="subheader" style="border: none;" width="5%" rowspan="2"><?=$spText['common']['Id']?></td>
			<td class="subheader" rowspan="2"><?=$spTextHome['SiteNameUrl']?></td>
			<td class="subheaderdark" colspan="2"><?=$spTextHome['Ranks']?></td>
			<td class="subheaderdark" colspan="5"><?=$spTextHome['Backlinks']?></td>
			<td class="subheaderdark" colspan="3"><?=$spTextHome['Pages Indexed']?></td>
			<td class="subheaderdark" colspan="2"><?=$spTextHome['Directory Submission']?></td>
		</tr>		
		<tr>
			<td class="subheader">Google</td>
			<td class="subheader">Alexa</td>
			<td class="subheader">Google</td>
			<td class="subheader">Yahoo</td>
			<td class="subheader">MSN</td>
			<td class="subheader">Altavista</td>
			<td class="subheader">Alltheweb</td>			
			<td class="subheader">Google</td>
			<td class="subheader">Yahoo</td>
			<td class="subheader">MSN</td>
			<td class="subheader"><?=$spText['common']['Total']?></td>
			<td class="subheader"><?=$spText['common']['Active']?></td>
		</tr>
		<?php if(count($websiteList) > 0){ ?> 
			<?php foreach($websiteList as $websiteInfo){ ?>
				<tr>
					<td class="content" style="border-left: none;"><?php echo $websiteInfo['id']?></td>
					<td class="content">
						<?php echo $websiteInfo['name'];?><br>
						<a href="<?php echo $websiteInfo['url'];?>" target="_blank"><?php echo $websiteInfo['url'];?></a>
					</td>
					<td class="content"><?php echo $websiteInfo['googlerank'];?></td>
					<td class="content"><?php echo $websiteInfo['alexarank'];?></td>
					<td class="content"><?php echo $websiteInfo['google']['backlinks'];?></td>
					<td class="content"><?php echo $websiteInfo['yahoo']['backlinks'];?></td>
					<td class="content"><?php echo $websiteInfo['msn']['backlinks'];?></td>
					<td class="content"><?php echo $websiteInfo['altavista']['backlinks'];?></td>
					<td class="content"><?php echo $websiteInfo['alltheweb']['backlinks'];?></td>
					<td class="content"><?php echo $websiteInfo['google']['indexed'];?></td>
					<td class="content"><?php echo $websiteInfo['yahoo']['indexed'];?></td>					
					<td class="content"><?php echo $websiteInfo['msn']['indexed'];?></td>
					<td class="contentmid"><?php echo $websiteInfo['dirsub']['total'];?></td>					
					<td class="contentmid"><?php echo $websiteInfo['dirsub']['active'];?></td>
				</tr> 
			<?php } ?>
		<?php }else{ ?>
			<tr><td colspan="<?=$colSpan?>" class="norecord"><?=$spText['common']['nowebsites']?></td></tr>
		<?php } ?>		
	</table>
</div>



</div>
</div>

<?php if(!empty($printVersion)) {?>
</div>
<?php }?>
<div class="Center" style='width:100%;'>
<div class="col" style="">

<div class="SectionHeader">
<h1 style="text-align:center;border: none;">Account Summary</h1>
</div>
<br />

<div class="Block">
	<?php
	$colSpan = 12; 
	?>
	<table width="100%" cellspacing="0" cellpadding="0" class="summary">
		<tr><td class="topheader" colspan="<?=$colSpan?>">Website Statistics</td></tr>
		<tr>
			<td class="subheader" style="border: none;" width="5%" rowspan="2">Id</td>
			<td class="subheader" rowspan="2">Site Name/Url</td>
			<td class="subheaderdark" colspan="2">Ranks</td>
			<td class="subheaderdark" colspan="3">Backlinks</td>
			<td class="subheaderdark" colspan="3">Pages Indexed</td>
			<td class="subheaderdark" colspan="2">Directory Submission</td>
		</tr>		
		<tr>
			<td class="subheader">Google</td>
			<td class="subheader">Alexa</td>
			<td class="subheader">Google</td>
			<td class="subheader">Yahoo</td>
			<td class="subheader">MSN</td>			
			<td class="subheader">Google</td>
			<td class="subheader">Yahoo</td>
			<td class="subheader">MSN</td>
			<td class="subheader">Total</td>
			<td class="subheader">Active</td>
		</tr>
		<?php if(count($websiteList) > 0){ ?> 
			<?php foreach($websiteList as $websiteInfo){ ?>
				<tr>
					<td class="content" style="border-left: none;"><?php echo $websiteInfo['id']?></td>
					<td class="content">
						<?php echo $websiteInfo['name'];?><br>
						<a href="<?php echo $websiteInfo['url'];?>"><?php echo $websiteInfo['url'];?></a>
					</td>
					<td class="content"><?php echo $websiteInfo['googlerank'];?></td>
					<td class="content"><?php echo $websiteInfo['alexarank'];?></td>
					<td class="content"><?php echo $websiteInfo['google']['backlinks'];?></td>
					<td class="content"><?php echo $websiteInfo['yahoo']['backlinks'];?></td>
					<td class="content"><?php echo $websiteInfo['msn']['backlinks'];?></td>
					<td class="content"><?php echo $websiteInfo['google']['indexed'];?></td>
					<td class="content"><?php echo $websiteInfo['yahoo']['indexed'];?></td>					
					<td class="content"><?php echo $websiteInfo['msn']['indexed'];?></td>
					<td class="contentmid"><?php echo $websiteInfo['dirsub']['total'];?></td>					
					<td class="contentmid"><?php echo $websiteInfo['dirsub']['active'];?></td>
				</tr> 
			<?php } ?>
		<?php }else{ ?>
			<tr><td colspan="<?=$colSpan?>" class="norecord">No Websites Found!</td></tr>
		<?php } ?>		
	</table>
</div>



</div>
</div>
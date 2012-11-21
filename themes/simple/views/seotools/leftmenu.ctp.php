<script>
	var menuList = new Array();
	var buttonList = new Array();
	var scriptList = new Array();	
</script>
<ul id="menu">
<?php 
foreach($menuList as $i => $menuInfo){
	if($menuSelected == $menuInfo['url_section']){
			$imgSrc = "hide";
			$style = "";
	}else{
		$imgSrc = "more";
		$style = 'none';
	}
	$button = "img".$menuInfo['id'];
	$subMenuId = "sub".$menuInfo['id'];
	?>
	<script type="text/javascript">
		menuList[<?=$i?>] = '<?=$subMenuId?>';
		buttonList[<?=$i?>] = '<?=$button?>';
	</script>
	<li class="tab">
		<a href='javascript:void(0);' onclick="showMenu('<?=$button?>','<?=$subMenuId?>')"><img id="<?=$button?>" src="<?=SP_IMGPATH."/".$imgSrc?>.gif"> <?=$spTextTools[$menuInfo['url_section']]?></a>
	</li>
	<li id="<?=$subMenuId?>" class="subtab" style="display:<?=$style?>;padding-left:0px;">
	<?php
	switch($menuInfo['url_section']){
		case "keyword-position-checker":
			?>
			<script type="text/javascript">scriptList[<?=$i?>] = 'reports.php?sec=reportsum';</script>
			<ul id='subui'>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('reports.php?sec=reportsum', 'content')"><?=$spTextTools['Keyword Position Summary']?></a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('reports.php', 'content')"><?=$spTextTools['Detailed Position Reports']?></a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('graphical-reports.php', 'content')"><?=$spTextTools['Graphical Position Reports']?></a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('reports.php?sec=kwchecker', 'content')"><?=$spTextTools['Quick Position Checker']?></a></li>				
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('keywords.php', 'content')"><?=$spTextTools['Keywords Manager']?></a></li>
	         	<li><a href="javascript:void(0);" onclick="scriptDoLoad('keywords.php', 'content', 'sec=import')"><?=$spTextKeyword['Import Keywords']?></a></li>
			    <?php if(SP_USER_GEN_REPORT || isAdmin()){ ?>
					<?php if(SP_DEMO){?>
		         		<li><a href="javascript:void(0);" onclick="alertDemoMsg();"><?=$spTextTools['Generate Keyword Reports']?></a></li>
		         	<?php }else{?>
						<li><a href="javascript:void(0);" onclick="scriptDoLoad('generate-reports.php', 'content')"><?=$spTextTools['Generate Keyword Reports']?></a></li>
		         	<?php }?>
	         	<?php }?>
			</ul>
			<?php
			break;
			
		case "site-auditor":
			?>
			<script type="text/javascript">scriptList[<?=$i?>] = 'siteauditor.php';</script>			
			<ul id='subui'>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('siteauditor.php', 'content')"><?=$spTextTools['Auditor Projects']?></a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('siteauditor.php?sec=viewreports', 'content')"><?=$spTextTools['Auditor Reports']?></a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('siteauditor.php?sec=importlinks', 'content')"><?=$spTextTools['Import Project Links']?></a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('sitemap.php', 'content')"><?=$spTextTools['sitemap-generator']?></a></li>
			    <?php if (isAdmin()) {?>
			    	<li><a href="javascript:void(0);" onclick="scriptDoLoad('siteauditor.php?sec=croncommand', 'content')"><?=$spTextPanel['Cron Command']?></a></li>
					<li><a href="javascript:void(0);" onclick="scriptDoLoad('siteauditor.php?sec=showsettings', 'content')"><?=$spTextTools['Auditor Settings']?></a></li>
				<?php }?>
			</ul>
			<?php
			break;
			
		case "sitemap-generator":
			?>
			<script type="text/javascript">scriptList[<?=$i?>] = 'sitemap.php';</script>			
			<ul id='subui'>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('sitemap.php', 'content')"><?=$spTextTools['Google Sitemap Generator']?></a></li>
			</ul>
			<?php
			break;
			
		case "rank-checker":
			?>
			<script type="text/javascript">scriptList[<?=$i?>] = 'rank.php?sec=google';</script>			
			<ul id='subui'>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('rank.php?sec=quickrank', 'content')"><?=$spTextTools['Quick Rank Checker']?></a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('rank.php?sec=reports', 'content')"><?=$spTextTools['Rank Reports']?></a></li>
				<?php if(SP_USER_GEN_REPORT || isAdmin()){ ?>
					<?php if(SP_DEMO){?>
		         		<li><a href="javascript:void(0);" onclick="alertDemoMsg();"><?=$spTextTools['Generate Rank Reports']?></a></li>
		         	<?php }else{?>
						<li><a href="javascript:void(0);" onclick="scriptDoLoad('rank.php?sec=generate', 'content')"><?=$spTextTools['Generate Rank Reports']?></a></li>
		         	<?php }?>
	         	<?php }?>
			</ul>
			<?php
			break;
			
		case "backlink-checker":
			?>
			<script type="text/javascript">scriptList[<?=$i?>] = 'backlinks.php';</script>			
			<ul id='subui'>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('backlinks.php', 'content')"><?=$spTextTools['Quick Backlinks Checker']?></a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('backlinks.php?sec=reports', 'content')"><?=$spTextTools['Backlinks Reports']?></a></li>
				<?php if(SP_USER_GEN_REPORT || isAdmin()){ ?>
					<?php if(SP_DEMO){?>
		         		<li><a href="javascript:void(0);" onclick="alertDemoMsg();"><?=$spTextTools['Generate Backlinks Reports']?></a></li>
		         	<?php }else{?>
						<li><a href="javascript:void(0);" onclick="scriptDoLoad('backlinks.php?sec=generate', 'content')"><?=$spTextTools['Generate Backlinks Reports']?></a></li>
		         	<?php }?>
		  		<?php }?>
			</ul>
			<?php
			break;
			
		case "directory-submission":
			?>
			<script type="text/javascript">scriptList[<?=$i?>] = 'directories.php';</script>			
			<ul id='subui'>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('directories.php', 'content')"><?=$spTextTools['Automatic Submission']?></a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('directories.php?sec=featured', 'content')"><?=$spTextTools['Featured Submission']?></a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('directories.php?sec=skipped', 'content')"><?=$spTextTools['Skipped Directories']?></a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('directories.php?sec=reports', 'content')"><?=$spTextTools['Submission Reports']?></a></li>
				<?php if(SP_USER_GEN_REPORT || isAdmin()){ ?>
					<?php if(SP_DEMO){?>
		         		<li><a href="javascript:void(0);" onclick="alertDemoMsg();"><?=$spTextTools['Check Submission Status']?></a></li>
		         	<?php }else{?>	         		
						<li><a href="javascript:void(0);" onclick="scriptDoLoad('directories.php?sec=checksub', 'content')"><?=$spTextTools['Check Submission Status']?></a></li>
		         	<?php }?>
		     	<?php }?>
			</ul>
			<?php
			break;			
			
		case "saturation-checker":
			?>
			<script type="text/javascript">scriptList[<?=$i?>] = 'saturationchecker.php';</script>			
			<ul id='subui'>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('saturationchecker.php', 'content')"><?=$spTextTools['Quick Saturation Checker']?></a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('saturationchecker.php?sec=reports', 'content')"><?=$spTextTools['Saturation Reports']?></a></li>
				<?php if(SP_USER_GEN_REPORT || isAdmin()){ ?>				
					<?php if(SP_DEMO){?>
		         		<li><a href="javascript:void(0);" onclick="alertDemoMsg();"><?=$spTextTools['Generate Saturation Reports']?></a></li>
		         	<?php }else{?>
		         		<li><a href="javascript:void(0);" onclick="scriptDoLoad('saturationchecker.php?sec=generate', 'content')"><?=$spTextTools['Generate Saturation Reports']?></a></li>
		         	<?php }?>
		      	<?php }?>
			</ul>
			<?php
			break;
	}
	?>
	</li>
	<?php
}
?>
</ul>
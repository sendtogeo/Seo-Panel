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
		<a href='javascript:void(0);' onclick="showMenu('<?=$button?>','<?=$subMenuId?>')"><img id="<?=$button?>" src="<?=SP_IMGPATH."/".$imgSrc?>.gif"> <?=$menuInfo['name']?></a>
	</li>
	<li id="<?=$subMenuId?>" class="subtab" style="display:<?=$style?>;padding-left:0px;">
	<?php
	switch($menuInfo['url_section']){
		case "keyword-position-checker":
			?>
			<script type="text/javascript">scriptList[<?=$i?>] = 'reports.php?sec=reportsum';</script>
			<ul id='subui'>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('reports.php?sec=reportsum', 'content')">Keyword Position Summary</a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('reports.php', 'content')">Detailed Position Reports</a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('graphical-reports.php', 'content')">Graphical Position Reports</a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('reports.php?sec=kwchecker', 'content')">Quick Position Checker</a></li>				
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('keywords.php', 'content')">Keywords Manager</a></li>
	         	<?php if(SP_USER_GEN_REPORT || isAdmin()){ ?>
					<?php if(SP_DEMO){?>
		         		<li><a href="javascript:void(0);" onclick="alertDemoMsg();">Generate Keyword Reports</a></li>
		         	<?php }else{?>
						<li><a href="javascript:void(0);" onclick="scriptDoLoad('generate-reports.php', 'content')">Generate Keyword Reports</a></li>
		         	<?php }?>
	         	<?php }?>
			</ul>
			<?php
			break;
			
		case "sitemap-generator":
			?>
			<script type="text/javascript">scriptList[<?=$i?>] = 'sitemap.php';</script>			
			<ul id='subui'>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('sitemap.php', 'content')">Google Sitemap Generator</a></li>
			</ul>
			<?php
			break;
			
		case "rank-checker":
			?>
			<script type="text/javascript">scriptList[<?=$i?>] = 'rank.php?sec=google';</script>			
			<ul id='subui'>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('rank.php?sec=quickrank', 'content')">Quick Rank Checker</a></li>
<!--				<li><a href="javascript:void(0);" onclick="scriptDoLoad('rank.php?sec=alexa', 'content')">Alexa Rank</a></li>-->
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('rank.php?sec=reports', 'content')">Rank Reports</a></li>
				<?php if(SP_USER_GEN_REPORT || isAdmin()){ ?>
					<?php if(SP_DEMO){?>
		         		<li><a href="javascript:void(0);" onclick="alertDemoMsg();">Generate Rank Reports</a></li>
		         	<?php }else{?>
						<li><a href="javascript:void(0);" onclick="scriptDoLoad('rank.php?sec=generate', 'content')">Generate Rank Reports</a></li>
		         	<?php }?>
	         	<?php }?>
			</ul>
			<?php
			break;
			
		case "backlink-checker":
			?>
			<script type="text/javascript">scriptList[<?=$i?>] = 'backlinks.php';</script>			
			<ul id='subui'>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('backlinks.php', 'content')">Quick Backlinks Checker</a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('backlinks.php?sec=reports', 'content')">Backlinks Reports</a></li>
				<?php if(SP_USER_GEN_REPORT || isAdmin()){ ?>
					<?php if(SP_DEMO){?>
		         		<li><a href="javascript:void(0);" onclick="alertDemoMsg();">Generate Backlinks Reports</a></li>
		         	<?php }else{?>
						<li><a href="javascript:void(0);" onclick="scriptDoLoad('backlinks.php?sec=generate', 'content')">Generate Backlinks Reports</a></li>
		         	<?php }?>
		  		<?php }?>
			</ul>
			<?php
			break;
			
		case "directory-submission":
			?>
			<script type="text/javascript">scriptList[<?=$i?>] = 'directories.php';</script>			
			<ul id='subui'>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('directories.php', 'content')">Automatic Submission</a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('directories.php?sec=featured', 'content')">Featured Submission</a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('directories.php?sec=skipped', 'content')">Skipped Directories</a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('directories.php?sec=reports', 'content')">Submission Reports</a></li>
				<?php if(SP_USER_GEN_REPORT || isAdmin()){ ?>
					<?php if(SP_DEMO){?>
		         		<li><a href="javascript:void(0);" onclick="alertDemoMsg();">Check Submission Status</a></li>
		         	<?php }else{?>	         		
						<li><a href="javascript:void(0);" onclick="scriptDoLoad('directories.php?sec=checksub', 'content')">Check Submission Status</a></li>
		         	<?php }?>
		     	<?php }?>
			</ul>
			<?php
			break;			
			
		case "saturation-checker":
			?>
			<script type="text/javascript">scriptList[<?=$i?>] = 'saturationchecker.php';</script>			
			<ul id='subui'>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('saturationchecker.php', 'content')">Quick Saturation Checker</a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('saturationchecker.php?sec=reports', 'content')">Saturation Reports</a></li>
				<?php if(SP_USER_GEN_REPORT || isAdmin()){ ?>				
					<?php if(SP_DEMO){?>
		         		<li><a href="javascript:void(0);" onclick="alertDemoMsg();">Generate Saturation Reports</a></li>
		         	<?php }else{?>
		         		<li><a href="javascript:void(0);" onclick="scriptDoLoad('saturationchecker.php?sec=generate', 'content')">Generate Saturation Reports</a></li>
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
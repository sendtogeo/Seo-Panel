<script>
	var menuList = new Array();
	var buttonList = new Array();
	var scriptList = new Array();	
</script>
<ul id="menu">
<?php 
foreach($menuList as $i => $menuInfo){
	if($menuSelected == $menuInfo['url_section']){
		$menuClass = "fa-caret-up";
		$style = "";
	}else{
	    $menuClass = "fa-caret-down";
		$style = 'none';
	}
	$button = "img".$menuInfo['id'];
	$subMenuId = "sub".$menuInfo['id'];
	?>
	<script type="text/javascript">
		menuList[<?php echo $i?>] = '<?php echo $subMenuId?>';
		buttonList[<?php echo $i?>] = '<?php echo $button?>';
	</script>
	<li class="tab" onclick="showMenu('<?php echo $button?>','<?php echo $subMenuId?>')">
		<i id="<?php echo $button?>" class="fas <?php echo $menuClass?>"></i>
		<a href='javascript:void(0);'>
			<?php echo $spTextTools[$menuInfo['url_section']]?>
		</a>
	</li>
	<li id="<?php echo $subMenuId?>" class="subtab" style="display:<?php echo $style?>;padding-left:0px;">
	<?php
	switch($menuInfo['url_section']){
		case "keyword-position-checker":
			?>
			<script type="text/javascript">scriptList[<?php echo $i?>] = 'reports.php?sec=reportsum';</script>
			<ul id='subui'>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('reports.php?sec=reportsum', 'content')" class="menu_active"><?php echo $spTextTools['Keyword Position Summary']?></a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('reports.php', 'content')"><?php echo $spTextTools['Detailed Position Reports']?></a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('graphical-reports.php', 'content')"><?php echo $spTextTools['Graphical Position Reports']?></a></li>
				<?php if (isQuickCheckerEnabled()) {?>
					<li><a href="javascript:void(0);" onclick="scriptDoLoad('reports.php?sec=kwchecker', 'content')"><?php echo $spTextTools['Quick Position Checker']?></a></li>
				<?php }?>				
				
				<?php if (isAdmin() || !SP_CUSTOM_DEV) {?>
					<li><a href="javascript:void(0);" onclick="scriptDoLoad('keywords.php', 'content')"><?php echo $spTextTools['Keywords Manager']?></a></li>
					<li><a href="javascript:void(0);" onclick="scriptDoLoad('keywords.php', 'content', 'sec=new')"><?php echo $spTextKeyword['New Keyword']?></a></li>
		         	<li><a href="javascript:void(0);" onclick="scriptDoLoad('keywords.php', 'content', 'sec=import')"><?php echo $spTextKeyword['Import Keywords']?></a></li>
			    <?php }?>
			    
			    <?php if(SP_USER_GEN_REPORT || isAdmin()){ ?>
					<?php if(SP_DEMO){?>
		         		<li><a href="javascript:void(0);" onclick="alertDemoMsg();"><?php echo $spTextTools['Generate Keyword Reports']?></a></li>
		         	<?php }else{?>
						<li><a href="javascript:void(0);" onclick="scriptDoLoad('generate-reports.php', 'content')"><?php echo $spTextTools['Generate Keyword Reports']?></a></li>
		         	<?php }?>
	         	<?php }?>
			</ul>
			<?php
			break;
			
		case "webmaster-tools":
			?>		
			<ul id='subui'>
				<?php if (isQuickCheckerEnabled()) {?>
					<script type="text/javascript">scriptList[<?php echo $i?>] = 'webmaster-tools.php?sec=quickChecker';</script>
					<li>
						<a href="javascript:void(0);" onclick="scriptDoLoad('webmaster-tools.php?sec=quickChecker', 'content')">
							<?php echo $spTextTools['Quick Checker']?>
						</a>
					</li>
				<?php } else {?>
					<script type="text/javascript">scriptList[<?php echo $i?>] = 'webmaster-tools.php';</script>	
				<?php }?>
				<li>
					<a href="javascript:void(0);" onclick="scriptDoLoad('webmaster-tools.php?sec=viewKeywordSearchSummary', 'content')">
						<?php echo $spTextTools['Keyword Search Summary']?>
					</a>
				</li>
				<li>
					<a href="javascript:void(0);" onclick="scriptDoLoad('webmaster-tools.php?sec=viewKeywordSearchReports', 'content')">
						<?php echo $spTextTools['Keyword Search Reports']?>
					</a>
				</li>
				<li>
					<a href="javascript:void(0);" onclick="scriptDoLoad('webmaster-tools.php?sec=viewKeywordSearchGraphReports', 'content')">
						<?php echo $spTextTools['Graphical Reports']?>(<?php echo $spText['common']['Keyword']?>)
					</a>
				</li>
				<li>
					<a href="javascript:void(0);" onclick="scriptDoLoad('webmaster-tools.php?sec=viewWebsiteSearchSummary', 'content')">
						<?php echo $spTextTools['Website Search Summary']?>
					</a>
				</li>
				<li>
					<a href="javascript:void(0);" onclick="scriptDoLoad('webmaster-tools.php?sec=viewWebsiteSearchReports', 'content')">
						<?php echo $spTextTools['Website Search Reports']?>
					</a>
				</li>
				<li>
					<a href="javascript:void(0);" onclick="scriptDoLoad('webmaster-tools.php?sec=viewWebsiteSearchGraphReports', 'content')">
						<?php echo $spTextTools['Graphical Reports']?>(<?php echo $spText['common']['Website']?>)
					</a>
				</li>
				<?php if (isAdmin() || !SP_CUSTOM_DEV) {?>
					<li>
						<a href="javascript:void(0);" onclick="scriptDoLoad('websites.php', 'content', 'sec=listSitemap')">
							<?php echo $spTextPanel['Sitemaps']?>(<?php echo $spTextTools['webmaster-tools']?>)
						</a>
					</li>
				<?php }?>
			</ul>
			<?php
			break;
			
		case "site-auditor":
			?>
			<script type="text/javascript">scriptList[<?php echo $i?>] = 'siteauditor.php';</script>			
			<ul id='subui'>
				<?php if (isAdmin() || !SP_CUSTOM_DEV) {?>
					<li><a href="javascript:void(0);" onclick="scriptDoLoad('siteauditor.php', 'content')"><?php echo $spTextTools['Auditor Projects']?></a></li>
				<?php }?>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('siteauditor.php?sec=viewreports', 'content')"><?php echo $spTextTools['Auditor Reports']?></a></li>
				<?php if (isAdmin() || !SP_CUSTOM_DEV) {?>
					<li><a href="javascript:void(0);" onclick="scriptDoLoad('siteauditor.php?sec=importlinks', 'content')"><?php echo $spTextTools['Import Project Links']?></a></li>
					<li><a href="javascript:void(0);" onclick="scriptDoLoad('sitemap.php', 'content')"><?php echo $spTextTools['sitemap-generator']?></a></li>
				<?php }?>
			    <?php if (isAdmin()) {?>
			    	<li><a href="javascript:void(0);" onclick="scriptDoLoad('siteauditor.php?sec=croncommand', 'content')"><?php echo $spTextPanel['Cron Command']?></a></li>
					<li><a href="javascript:void(0);" onclick="scriptDoLoad('siteauditor.php?sec=showsettings', 'content')"><?php echo $spTextTools['Auditor Settings']?></a></li>
				<?php }?>
			</ul>
			<?php
			break;
			
		case "sitemap-generator":
			?>
			<script type="text/javascript">scriptList[<?php echo $i?>] = 'sitemap.php';</script>			
			<ul id='subui'>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('sitemap.php', 'content')"><?php echo $spTextTools['Google Sitemap Generator']?></a></li>
			</ul>
			<?php
			break;
			
		case "rank-checker":
			?>			
			<ul id='subui'>
				<?php if (isQuickCheckerEnabled()) {?>
					<script type="text/javascript">scriptList[<?php echo $i?>] = 'rank.php?sec=quickrank';</script>	
					<li><a href="javascript:void(0);" onclick="scriptDoLoad('rank.php?sec=quickrank', 'content')"><?php echo $spTextTools['Quick Rank Checker']?></a></li>
				<?php } else {?>
					<script type="text/javascript">scriptList[<?php echo $i?>] = 'rank.php?sec=reports';</script>	
				<?php }?>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('rank.php?sec=reports', 'content')"><?php echo $spTextTools['Rank Reports']?></a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('rank.php?sec=graphical-reports', 'content')"><?php echo $spTextTools['Graphical Reports']?></a></li>
				<?php if(SP_USER_GEN_REPORT || isAdmin()){ ?>
					<?php if(SP_DEMO){?>
		         		<li><a href="javascript:void(0);" onclick="alertDemoMsg();"><?php echo $spTextTools['Generate Rank Reports']?></a></li>
		         	<?php }else{?>
						<li><a href="javascript:void(0);" onclick="scriptDoLoad('rank.php?sec=generate', 'content')"><?php echo $spTextTools['Generate Rank Reports']?></a></li>
		         	<?php }?>
	         	<?php }?>
			</ul>
			<?php
			break;
			
		case "backlink-checker":
			?>		
			<ul id='subui'>
				<?php if (isQuickCheckerEnabled()) {?>
					<script type="text/javascript">scriptList[<?php echo $i?>] = 'backlinks.php';</script>
					<li><a href="javascript:void(0);" onclick="scriptDoLoad('backlinks.php', 'content')"><?php echo $spTextTools['Quick Backlinks Checker']?></a></li>
				<?php } else {?>
					<script type="text/javascript">scriptList[<?php echo $i?>] = 'backlinks.php?sec=reports';</script>	
				<?php }?>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('backlinks.php?sec=reports', 'content')"><?php echo $spTextTools['Backlinks Reports']?></a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('backlinks.php?sec=graphical-reports', 'content')"><?php echo $spTextTools['Graphical Reports']?></a></li>
				<?php if(SP_USER_GEN_REPORT || isAdmin()){ ?>
					<?php if(SP_DEMO){?>
		         		<li><a href="javascript:void(0);" onclick="alertDemoMsg();"><?php echo $spTextTools['Generate Backlinks Reports']?></a></li>
		         	<?php }else{?>
						<li><a href="javascript:void(0);" onclick="scriptDoLoad('backlinks.php?sec=generate', 'content')"><?php echo $spTextTools['Generate Backlinks Reports']?></a></li>
		         	<?php }?>
		  		<?php }?>
			</ul>
			<?php
			break;
			
		case "directory-submission":
			?>
			<script type="text/javascript">scriptList[<?php echo $i?>] = 'directories.php';</script>			
			<ul id='subui'>
				<?php if (isAdmin() || !SP_CUSTOM_DEV) {?>
					<li><a href="javascript:void(0);" onclick="scriptDoLoad('directories.php', 'content')"><?php echo $spTextTools['Automatic Submission']?></a></li>
					<li><a href="javascript:void(0);" onclick="scriptDoLoad('directories.php?sec=featured', 'content')"><?php echo $spTextTools['Featured Submission']?></a></li>
					<li><a href="javascript:void(0);" onclick="scriptDoLoad('directories.php?sec=skipped', 'content')"><?php echo $spTextTools['Skipped Directories']?></a></li>
				<?php }?>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('directories.php?sec=reports', 'content')"><?php echo $spTextTools['Submission Reports']?></a></li>
				<?php if(SP_USER_GEN_REPORT || isAdmin()){ ?>
					<?php if(SP_DEMO){?>
		         		<li><a href="javascript:void(0);" onclick="alertDemoMsg();"><?php echo $spTextTools['Check Submission Status']?></a></li>
		         	<?php }else{?>	         		
						<li><a href="javascript:void(0);" onclick="scriptDoLoad('directories.php?sec=checksub', 'content')"><?php echo $spTextTools['Check Submission Status']?></a></li>
		         	<?php }?>
		     	<?php }?>
			</ul>
			<?php
			break;			
			
		case "saturation-checker":
			?>			
			<ul id='subui'>
				<?php if (isQuickCheckerEnabled()) {?>
					<script type="text/javascript">scriptList[<?php echo $i?>] = 'saturationchecker.php';</script>
					<li><a href="javascript:void(0);" onclick="scriptDoLoad('saturationchecker.php', 'content')"><?php echo $spTextTools['Quick Saturation Checker']?></a></li>
				<?php } else {?>
					<script type="text/javascript">scriptList[<?php echo $i?>] = 'saturationchecker.php?sec=reports';</script>	
				<?php }?>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('saturationchecker.php?sec=reports', 'content')"><?php echo $spTextTools['Saturation Reports']?></a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('saturationchecker.php?sec=graphical-reports', 'content')"><?php echo $spTextTools['Graphical Reports']?></a></li>
				<?php if(SP_USER_GEN_REPORT || isAdmin()){ ?>				
					<?php if(SP_DEMO){?>
		         		<li><a href="javascript:void(0);" onclick="alertDemoMsg();"><?php echo $spTextTools['Generate Saturation Reports']?></a></li>
		         	<?php }else{?>
		         		<li><a href="javascript:void(0);" onclick="scriptDoLoad('saturationchecker.php?sec=generate', 'content')"><?php echo $spTextTools['Generate Saturation Reports']?></a></li>
		         	<?php }?>
		      	<?php }?>
			</ul>
			<?php
			break;			
			
		case "pagespeed":
			?>	
			<ul id='subui'>
				<?php if (isQuickCheckerEnabled()) {?>
					<script type="text/javascript">scriptList[<?php echo $i?>] = 'pagespeed.php';</script>
					<li><a href="javascript:void(0);" onclick="scriptDoLoad('pagespeed.php', 'content')"><?php echo $spTextTools['Quick PageSpeed Checker']?></a></li>
				<?php } else {?>
					<script type="text/javascript">scriptList[<?php echo $i?>] = 'pagespeed.php?sec=reports';</script>	
				<?php }?>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('pagespeed.php?sec=reports', 'content')"><?php echo $spTextTools['PageSpeed Reports']?></a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('pagespeed.php?sec=graphical-reports', 'content')"><?php echo $spTextTools['Graphical Reports']?></a></li>
				<?php if(SP_USER_GEN_REPORT || isAdmin()){ ?>				
					<?php if(SP_DEMO){?>
		         		<li><a href="javascript:void(0);" onclick="alertDemoMsg();"><?php echo $spTextTools['Generate Reports']?></a></li>
		         	<?php }else{?>
		         		<li><a href="javascript:void(0);" onclick="scriptDoLoad('pagespeed.php?sec=generate', 'content')"><?php echo $spTextTools['Generate Reports']?></a></li>
		         	<?php }?>
		      	<?php }?>
			</ul>
			<?php
			break;

		case "sm-checker":
			?>
			<ul id='subui'>
				<script type="text/javascript">scriptList[<?php echo $i?>] = 'social_media.php';</script>	
				
				<?php if (isAdmin() || !SP_CUSTOM_DEV) {?>
					<li><a href="javascript:void(0);" onclick="scriptDoLoad('social_media.php', 'content')"><?php echo $spTextTools['Social Media Links']?></a></li>
				<?php }?>
				
				<?php if (isQuickCheckerEnabled()) {?>
					<li>
						<a href="javascript:void(0);" onclick="scriptDoLoad('social_media.php?sec=quickChecker', 'content')">
							<?php echo $spTextTools['Quick Checker']?>
						</a>
					</li>
				<?php }?>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('social_media.php?sec=reportSummary', 'content')"><?php echo $spTextSA['Report Summary']?></a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('social_media.php?sec=viewDetailedReports', 'content')"><?php echo $spTextTools['Detailed Reports']?></a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('social_media.php?sec=viewGraphReports', 'content')"><?php echo $spTextTools['Graphical Reports']?></a></li>
			</ul>
			<?php
			break;

		case "review-manager":
			?>
			<ul id='subui'>
				<script type="text/javascript">scriptList[<?php echo $i?>] = 'review.php';</script>	
				
				<?php if (isAdmin() || !SP_CUSTOM_DEV) {?>
					<li><a href="javascript:void(0);" onclick="scriptDoLoad('review.php', 'content')"><?php echo $spTextTools['Review Links']?></a></li>
				<?php }?>
				
				<?php if (isQuickCheckerEnabled()) {?>
					<li>
						<a href="javascript:void(0);" onclick="scriptDoLoad('review.php?sec=quickChecker', 'content')">
							<?php echo $spTextTools['Quick Checker']?>
						</a>
					</li>
				<?php }?>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('review.php?sec=reportSummary', 'content')"><?php echo $spTextSA['Report Summary']?></a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('review.php?sec=viewDetailedReports', 'content')"><?php echo $spTextTools['Detailed Reports']?></a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('review.php?sec=viewGraphReports', 'content')"><?php echo $spTextTools['Graphical Reports']?></a></li>			
			</ul>
			<?php
			break;
			
        case "web-analytics":
            ?>
			<ul id='subui'>
				<script type="text/javascript">scriptList[<?php echo $i?>] = 'analytics.php';</script>	
				
				<?php if (isQuickCheckerEnabled()) {?>
					<li>
						<a href="javascript:void(0);" onclick="scriptDoLoad('analytics.php?sec=quickChecker', 'content')">
							<?php echo $spTextTools['Quick Checker']?>
						</a>
					</li>
				<?php }?>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('analytics.php?sec=viewAnalyticsSummary', 'content')"><?php echo $spTextSA['Report Summary']?></a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('analytics.php?sec=viewAnalyticsReports', 'content')"><?php echo $spTextTools['Detailed Reports']?></a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('analytics.php?sec=viewAnalyticsGraphReports', 'content')"><?php echo $spTextTools['Graphical Reports']?></a></li>
				<?php /*if(SP_USER_GEN_REPORT || isAdmin()){ ?>				
					<?php if(SP_DEMO){?>
		         		<li><a href="javascript:void(0);" onclick="alertDemoMsg();"><?php echo $spTextTools['Generate Reports']?></a></li>
		         	<?php }else{?>
		         		<li><a href="javascript:void(0);" onclick="scriptDoLoad('analytics.php?sec=generate', 'content')"><?php echo $spTextTools['Generate Reports']?></a></li>
		         	<?php }?>
		      	<?php }*/?>				
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
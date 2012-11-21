<?php echo showSectionHead($spTextDir['Semi Automatic Directory Submission Tool']); ?>
<form id='search_form'>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="search">
	<tr>				
		<th><?=$spText['common']['Website']?>: </th>
		<td>
			<?php echo $this->render('website/websiteselectbox', 'ajax'); ?>
		</td>
		<td width="20px" style="text-align: right;">
			<input <?php echo empty($_SESSION['no_captcha']) ? "" : "checked"; ?> type="checkbox" name="no_captcha" id="no_captcha" onclick="checkDirectoryFilter('no_captcha', 'directories.php?sec=checkcaptcha', 'tmp')">
		</td>
		<th style="text-align: left;" nowrap="nowrap"><?=$spTextDir['Directories with out captcha']?></th>
		<td width="20px" style="text-align: right;">
			<input <?php echo empty($_SESSION['no_reciprocal']) ? "" : "checked"; ?> type="checkbox" name="no_reciprocal" id="no_reciprocal" onclick="checkDirectoryFilter('no_reciprocal', 'directories.php?sec=checkreciprocal', 'tmp')">
		</td>
		<th style="text-align: left;" nowrap="nowrap"><?=$spTextDir['Directories with out Reciprocal Link']?></th>		
	</tr>	
	<tr>				
		<th><?=$spText['common']['Google Pagerank']?>: </th>
		<td>			
			<select name="google_pagerank">
				<option value="">-- <?=$spText['common']['Select']?> --</option>
				<?php
				for ($i=0; $i<=10; $i++) {					
					?>			
					<option value="<?=$i?>" <?=$selected?>>PR <?=$i?></option>
					<?php
				}
				?>
			</select>						
		</td>
		<th><?=$spText['common']['lang']?>:</th>
		<td>
			<select name="lang_code">
				<option value="">-- <?=$spText['common']['Select']?> --</option>
				<?php
				foreach ($langList as $langInfo) {
				    $selected = ($_SESSION['dirsub_lang'] == $langInfo['lang_code']) ? "selected" : "";
					?>			
					<option value="<?=$langInfo['lang_code']?>" <?=$selected?>><?=$langInfo['lang_name']?></option>
					<?php
				}
				?>
			</select>
		</td>
		<td align='left' colspan="2">
			<a onclick="scriptDoLoadPost('directories.php', 'search_form', 'subcontent')" href="javascript:void(0);" class="actionbut">
         		<?=$spText['button']['Show Details']?>
         	</a>
         </td>
	</tr>
</table>
</form>
<div id='subcontent'>
	<p class='note left'><?=$spTextDir['selectwebsiteproceed']?>!</p>
</div>
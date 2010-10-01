<?php echo showSectionHead($spTextDir['Semi Automatic Directory Submission Tool']); ?>
<form id='search_form'>
<table width="75%" border="0" cellspacing="0" cellpadding="0" class="search">
	<tr>				
		<th><?=$spText['common']['Website']?>: </th>
		<td>
			<?php echo $this->render('website/websiteselectbox', 'ajax'); ?>
		</td>
		<td width="20px" style="text-align: right;"><input type="checkbox" name="no_captcha" id="no_captcha" onclick="checkCaptcha('no_captcha', 'directories.php?sec=checkcaptcha', 'tmp')"></td>
		<th style="text-align: left;" nowrap="nowrap" colspan="2"><?=$spTextDir['Directories with out captcha']?></th>		
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
					?>			
					<option value="<?=$langInfo['lang_code']?>" <?=$selected?>><?=$langInfo['lang_name']?></option>
					<?php
				}
				?>
			</select>
		</td>
		<td align='left'>
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
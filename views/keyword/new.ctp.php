<?php echo showSectionHead($sectionHead); ?>
<form id="newKeyword">
<input type="hidden" name="sec" value="create"/>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left" width='20%'>New Keyword</td>
		<td class="right">&nbsp;</td>
	</tr>
	<tr class="white_row">
		<td class="td_left_col">Name:</td>
		<td class="td_right_col"><input type="text" name="name" value="<?=$post['name']?>"><?=$errMsg['name']?></td>
	</tr>
	<tr class="blue_row">
		<td class="td_left_col">Website:</td>
		<td class="td_right_col">
			<select name="website_id">
				<?php foreach($websiteList as $websiteInfo){?>
					<?php if($websiteInfo['id'] == $post['website_id']){?>
						<option value="<?=$websiteInfo['id']?>" selected><?=$websiteInfo['name']?></option>
					<?php }else{?>
						<option value="<?=$websiteInfo['id']?>"><?=$websiteInfo['name']?></option>
					<?php }?>
				<?php }?>
			</select>
			<?=$errMsg['website_id']?>
		</td>
	</tr>		
	<tr class="white_row">
		<td class="td_left_col">Language:</td>
		<td class="td_right_col">
			<?php echo $this->render('language/languageselectbox', 'ajax'); ?>			
		</td>
	</tr>
	<tr class="blue_row">
		<td class="td_left_col">Country:</td>
		<td class="td_right_col">
			<?php echo $this->render('country/countryselectbox', 'ajax'); ?>
		</td>
	</tr>
	<?php $post['searchengines'] = is_array($post['searchengines']) ? $post['searchengines'] : array(); ?>
	<tr class="white_row">
		<td class="td_left_col">Search Engines:</td>
		<td class="td_right_col">
			<select name="searchengines[]" class="multi" multiple="multiple">				
				<?php foreach($seList as $seInfo){?>
					<?php $selected = in_array($seInfo['id'], $post['searchengines']) ? "selected" : ""?>
					<option value="<?=$seInfo['id']?>" <?=$selected?>><?=$seInfo['domain']?></option>
				<?php }?>
			</select>
			<?=$errMsg['searchengines']?>
		</td>
	</tr>		
	<tr class="blue_row">
		<td class="tab_left_bot_noborder"></td>
		<td class="tab_right_bot"></td>
	</tr>
	<tr class="listBot">
		<td class="left" colspan="1"></td>
		<td class="right"></td>
	</tr>
</table>
<table width="100%" cellspacing="0" cellpadding="0" border="0" class="actionSec">
	<tr>
    	<td style="padding-top: 6px;text-align:right;">
    		<a onclick="scriptDoLoad('keywords.php', 'content')" href="javascript:void(0);">
         		<img border="0" alt="" src="<?=SP_IMGPATH?>/cancel.gif"/>
         	</a>
         	<a onclick="scriptDoLoadPost('keywords.php', 'newKeyword', 'content')" href="javascript:void(0);">
         		<img border="0" alt="" src="<?=SP_IMGPATH?>/proceed.gif"/>
         	</a>
    	</td>
	</tr>
</table>
</form>
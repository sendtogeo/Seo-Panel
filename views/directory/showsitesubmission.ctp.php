<form id="editSubmitInfo">
<input type="hidden" name="sec" value="updatesiteinfo"/>
<input type="hidden" name="website_id" value="<?=$websiteInfo['website_id']?>"/>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left">Submission Details</td>
		<td class="right">&nbsp;</td>
	</tr>
	<tr class="white_row">
		<td class="td_left_col">Owner Name:</td>
		<td class="td_right_col">
			<input type="text" name="owner_name" value="<?=stripslashes($websiteInfo['owner_name'])?>" style="width:300px;"><?=$errMsg['owner_name']?>
		</td>
	</tr>	
	<tr class="blue_row">
		<td class="td_left_col">Owner Email:</td>
		<td class="td_right_col">
			<input type="text" name="owner_email" value="<?=$websiteInfo['owner_email']?>" style="width:300px;"><?=$errMsg['owner_email']?>			
			<p>Some directories may send spam, we do not recommend using your primary email address.</p>
		</td>
	</tr>		
	<tr class="white_row">
		<td class="td_left_col">Website Category:</td>
		<td class="td_right_col">
			<input type="text" name="category" value="<?=stripslashes($websiteInfo['category'])?>" style="width:300px;"><?=$errMsg['category']?>
			<p>Categories, separate them with comma according to the priority. Start with Top priority category.</p>
			<p>Eg: google seo tools, seo tools, seo</p>
		</td>
	</tr>
	<tr class="blue_row">
		<td class="td_left_col">Website Url:</td>
		<td class="td_right_col">
			<input type="text" id="weburl" name="url" value="<?=$websiteInfo['url']?>" style="width:300px;">
			<a style="text-decoration: none;" href="javascript:void(0);" onclick="crawlMetaData('websites.php?sec=crawlmeta', 'crawlstats')">&#171&#171 Crawl Meta Data</a>
			<div id="crawlstats" style="float: right;padding-right:40px;"></div>
			<br><?=$errMsg['url']?>
		</td>
	</tr>
	<tr class="white_row">
		<td class="td_left_col">Website Title:</td>
		<td class="td_right_col"><input type="text" id="webtitle" name="title" value="<?=stripslashes($websiteInfo['title'])?>" style="width:400px;"><?=$errMsg['title']?></td>
	</tr>
	<tr class="blue_row">
		<td class="td_left_col">Website Description:</td>
		<td class="td_right_col">
			<textarea name="description" id="webdescription"><?=stripslashes($websiteInfo['description'])?></textarea><?=$errMsg['description']?>
			<p>Some directories require minimum 150 characters for the description field.</p>
		</td>
	</tr>
	<tr class="white_row">
		<td class="td_left_col">Website Keywords:</td>
		<td class="td_right_col"><textarea name="keywords" id="webkeywords"><?=stripslashes($websiteInfo['keywords'])?></textarea><?=$errMsg['keywords']?></td>
	</tr>	
	<tr class="blue_row" style="border-right: none;">
		<td class="td_left_col">&nbsp;</td>
		<td class="td_right_col"><b>Optional titles and descriptions to submit random title and description to directories for better results.</b></td>
	</tr>
	<?php for($i=2;$i<=$noTitles;$i++){?>	
		<tr class="white_row">
			<td class="td_left_col">Submit Title<?=$i?>:</td>
			<td class="td_right_col"><input type="text" name="title<?=$i?>" value="<?=stripslashes($websiteInfo['title'.$i])?>" style="width:400px;"></td>
		</tr>
		<tr class="blue_row">
			<td class="td_left_col">Submit Description<?=$i?>:</td>
			<td class="td_right_col">
				<textarea name="description<?=$i?>"><?=stripslashes($websiteInfo['description'.$i])?></textarea>
			</td>
		</tr>
	<?php }?>		
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
    		<a onclick="scriptDoLoad('directories.php', 'content')" href="javascript:void(0);">
         		<img border="0" alt="" src="<?=SP_IMGPATH?>/cancel.gif"/>
         	</a>
         	<a onclick="scriptDoLoadPost('directories.php', 'editSubmitInfo', 'subcontent')" href="javascript:void(0);">
         		<img border="0" alt="" src="<?=SP_IMGPATH?>/proceed.gif"/>
         	</a>
    	</td>
	</tr>
</table>
</form>
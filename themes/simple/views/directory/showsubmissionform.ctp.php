<? if(!empty($msg)){
	$msgClass = empty($error) ? "success" : "error"; 
	?>
		<p class="dirmsg">
			<font class="<?=$msgClass?>"><?=$msg?></font>
		</p>
	<? 
	}
?>
<form id="submissionForm" name="submissionForm">
<input type="hidden" name="sec" value="submitsite"/>
<input type="hidden" name="website_id" value="<?=$websiteId?>"/>
<input type="hidden" name="dir_id" value="<?=$dirInfo['id']?>"/>
<?php if(!empty($phpsessid)){?>
    <input type="hidden" name="phpsessid" value="<?=$phpsessid?>">
<?php }?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left" style="width: 30%"><?=$spTextTools['directory-submission']?></td>
		<td class="right">&nbsp;</td>
	</tr>		
	<tr class="white_row">
		<td class="td_left_col"><?=$spText['common']['Directory']?>:</td>
		<td class="td_right_col"><a href="<?=$dirInfo['submit_url']?>" target="_blank"><?=$dirInfo['domain']?></a></td>
	</tr>		
	<tr class="blue_row">
		<td class="td_left_col"><?=$spText['common']['Google Pagerank']?>:</td>
		<td class="td_right_col"><?=$dirInfo['google_pagerank']?></td>
	</tr>		
	<tr class="white_row">
		<td class="td_left_col"><?=$spText['common']['Category']?>:</td>
		<td class="td_right_col"><?=$categorySel?></td>
	</tr>
	<? if(!empty($reciprocalUrl)){ ?>
		<tr class="blue_row">
			<td class="td_left_col"><?=$spTextDir['Reciprocal Link']?>:</td>
			<td class="td_right_col">
				<input type="text" name="reciprocal_url" value="<?=$reciprocalUrl?>" style="width: 300px;">
			</td>
		</tr>
	<? } ?>	
	<? if(!empty($captchaUrl)){ ?>
		<tr class="blue_row">
			<td class="td_left_col"><?=$spTextDir['Enter the code shown']?>:</td>
			<td class="td_right_col">
				<?php if(!empty($imageHash)){?>
					<input type="hidden" name="<?=$dirInfo['imagehash_col']?>" value="<?=$imageHash?>">
				<?php }?>
				<input type="text" name="<?=$dirInfo['cptcha_col']?>" value="" id='captcha'>
				<p><img src='<?=$captchaUrl?>'></p>
			</td>
		</tr>
	<? } ?>		
	<tr class="white_row">
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
    		<a onclick="scriptDoLoad('directories.php', 'content')" href="javascript:void(0);" class="actionbut">
         		<?=$spText['button']['Cancel']?>
         	</a>&nbsp;
         	<a onclick="scriptDoLoad('directories.php?sec=skip&website_id=<?=$websiteId?>&dir_id=<?=$dirInfo['id']?>', 'subcontent')" href="javascript:void(0);" class="actionbut">
         		<?=$spText['button']['Skip']?>
         	</a>&nbsp;
         	<a onclick="scriptDoLoad('directories.php?sec=reload&website_id=<?=$websiteId?>&dir_id=<?=$dirInfo['id']?>', 'subcontent')" href="javascript:void(0);" class="actionbut">
         		<?=$spText['button']['Reload']?>
         	</a>&nbsp;
         	<a onclick="checkSubmitInfo('directories.php', 'submissionForm', 'subcontent', '<?=$dirInfo['category_col']?>')" href="javascript:void(0);" class="actionbut">
         		<?=$spText['button']['Submit']?>
         	</a>
    	</td>
	</tr>
</table>
</form>
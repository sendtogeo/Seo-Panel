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
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left">Directory</td>
		<td class="right"><?=$dirInfo['domain']?></td>
	</tr>		
	<tr class="white_row">
		<td class="td_left_col">Category:</td>
		<td class="td_right_col"><?=$categorySel?></td>
	</tr>
	<? if(!empty($captchaUrl)){ ?>
		<tr class="white_row">
			<td class="td_left_col">Enter the code shown:</td>
			<td class="td_right_col">
				<?php if(!empty($imageHash)){?>
					<input type="hidden" name="<?=$dirInfo['imagehash_col']?>" value="<?=$imageHash?>">
				<?php }?>
				<?php if(!empty($phpsessid)){?>
					<input type="hidden" name="phpsessid" value="<?=$phpsessid?>">
				<?php }?>
				<input type="text" name="<?=$dirInfo['cptcha_col']?>" value="" id='captcha'>
				<p><img src='<?=$captchaUrl?>'></p>
			</td>
		</tr>
	<? } ?>		
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
         		<img border="0" alt="" src="<?=SP_IMGPATH?>/cancel_black.gif"/>
         	</a>
         	<a onclick="scriptDoLoad('directories.php?sec=skip&website_id=<?=$websiteId?>&dir_id=<?=$dirInfo['id']?>', 'subcontent')" href="javascript:void(0);">
         		<img border="0" alt="" src="<?=SP_IMGPATH?>/skip.gif"/>
         	</a>
         	<a onclick="scriptDoLoad('directories.php?sec=reload&website_id=<?=$websiteId?>&dir_id=<?=$dirInfo['id']?>', 'subcontent')" href="javascript:void(0);">
         		<img border="0" alt="" src="<?=SP_IMGPATH?>/reload.gif"/>
         	</a>
         	<a onclick="checkSubmitInfo('directories.php', 'submissionForm', 'subcontent', '<?=$dirInfo['category_col']?>')" href="javascript:void(0);">
         		<img border="0" alt="" src="<?=SP_IMGPATH?>/submit.gif"/>
         	</a>
    	</td>
	</tr>
</table>
</form>
<?php echo showSectionHead($spTextPanel['New Website']); ?>
<? if(!empty($msg)){
	?>
	<p class="dirmsg">
		<font class="success"><?=$msg?></font>
	</p>
	<? 
	}
?>
<?php $post['url'] = empty($post['url']) ? "http://" : $post['url']; ?>
<form id="newWebsite">
<input type="hidden" name="sec" value="create"/>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left" width='30%'><?=$spTextPanel['New Website']?></td>
		<td class="right">&nbsp;</td>
	</tr>
	<?php if(!empty($isAdmin)){ ?>	
		<tr class="blue_row">
			<td class="td_left_col"><?=$spText['common']['User']?>:</td>
			<td class="td_right_col">
				<select name="userid" style="width:150px;">
					<?php foreach($userList as $userInfo){?>
						<?php if($userInfo['id'] == $userSelected){?>
							<option value="<?=$userInfo['id']?>" selected><?=$userInfo['username']?></option>
						<?php }else{?>
							<option value="<?=$userInfo['id']?>"><?=$userInfo['username']?></option>
						<?php }?>						
					<?php }?>
				</select>
			</td>
		</tr>
	<?php }?>
	<tr class="white_row">
		<td class="td_left_col"><?=$spText['common']['Name']?>:</td>
		<td class="td_right_col"><input type="text" name="name" value="<?=$post['name']?>"><?=$errMsg['name']?></td>
	</tr>
	<tr class="blue_row">
		<td class="td_left_col"><?=$spText['common']['Url']?>:</td>
		<td class="td_right_col">
			<input type="text" id='weburl' name="url" value="<?=$post['url']?>" style="width:300px;">
			<a style="text-decoration: none;" href="javascript:void(0);" onclick="crawlMetaData('websites.php?sec=crawlmeta', 'crawlstats')">&#171&#171 <?=$spText['common']['Crawl Meta Data']?></a>
			<div id="crawlstats" style="float: right;padding-right:40px;"></div>
			<br><?=$errMsg['url']?>
		</td>
	</tr>
	<tr class="white_row">
		<td class="td_left_col"><?=$spText['label']['Title']?>:</td>
		<td class="td_right_col"><input type="text" id="webtitle" name="title" value="<?=$post['title']?>" style="width:400px;"></td>
	</tr>
	<tr class="blue_row">
		<td class="td_left_col"><?=$spText['label']['Description']?>:</td>
		<td class="td_right_col"><textarea name="description" id="webdescription"><?=$post['description']?></textarea><?=$errMsg['description']?></td>
	</tr>
	<tr class="white_row">
		<td class="td_left_col"><?=$spText['label']['Keywords']?>:</td>
		<td class="td_right_col"><textarea name="keywords" id="webkeywords"><?=$post['keywords']?></textarea><?=$errMsg['keywords']?></td>
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
    		<a onclick="scriptDoLoad('websites.php', 'content')" href="javascript:void(0);" class="actionbut">
         		<?=$spText['button']['Cancel']?>
         	</a>&nbsp;
         	<?php $actFun = SP_DEMO ? "alertDemoMsg()" : "scriptDoLoadPost('websites.php', 'newWebsite', 'content')"; ?>
         	<a onclick="<?=$actFun?>" href="javascript:void(0);" class="actionbut">
         		<?=$spText['button']['Proceed']?>
         	</a>
    	</td>
	</tr>
</table>
</form>
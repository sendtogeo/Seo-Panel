<?php echo showSectionHead($spTextPanel['New Website']); ?>
<?php 
if(!empty($msg)){
	?>
	<p class="dirmsg">
		<font class="success"><?php echo $msg?></font>
	</p>
	<?php 
}

if(!empty($validationMsg)){
	?>
	<p class="dirmsg">
		<font class="error"><?php echo $validationMsg?></font>
	</p>
	<?php 
}

$post['url'] = empty($post['url']) ? "https://" : $post['url'];
?>
<form id="newWebsite">
<input type="hidden" name="sec" value="create"/>
<table width="100%" class="list">
	<tr class="listHead">
		<td class="left" width='30%'><?php echo $spTextPanel['New Website']?></td>
		<td class="right">&nbsp;</td>
	</tr>
	<?php if(!empty($isAdmin)){ ?>	
		<tr class="blue_row">
			<td class="td_left_col"><?php echo $spText['common']['User']?>:</td>
			<td class="td_right_col">
				<select name="userid" style="width:150px;">
					<?php foreach($userList as $userInfo){?>
						<?php if($userInfo['id'] == $userSelected){?>
							<option value="<?php echo $userInfo['id']?>" selected><?php echo $userInfo['username']?></option>
						<?php }else{?>
							<option value="<?php echo $userInfo['id']?>"><?php echo $userInfo['username']?></option>
						<?php }?>						
					<?php }?>
				</select>
			</td>
		</tr>
	<?php }?>
	<tr class="white_row">
		<td class="td_left_col"><?php echo $spText['common']['Name']?>:</td>
		<td class="td_right_col"><input type="text" name="name" value="<?php echo $post['name']?>"><?php echo $errMsg['name']?></td>
	</tr>
	<tr class="blue_row">
		<td class="td_left_col"><?php echo $spText['common']['Url']?>:</td>
		<td class="td_right_col">
			<input type="text" id='weburl' name="url" value="<?php echo $post['url']?>" style="width:300px;">
			<a style="text-decoration: none;" href="javascript:void(0);" onclick="crawlMetaData('websites.php?sec=crawlmeta', 'crawlstats')">&#171&#171 <?php echo $spText['common']['Crawl Meta Data']?></a>
			<div id="crawlstats" style="float: right;padding-right:40px;"></div>
			<br><?php echo $errMsg['url']?>
		</td>
	</tr>
	<tr class="white_row">
		<td class="td_left_col"><?php echo $spText['label']['Title']?>:</td>
		<td class="td_right_col"><input type="text" id="webtitle" name="title" value="<?php echo $post['title']?>" style="width:400px;"></td>
	</tr>
	<tr class="blue_row">
		<td class="td_left_col"><?php echo $spText['label']['Description']?>:</td>
		<td class="td_right_col"><textarea name="description" id="webdescription"><?php echo $post['description']?></textarea><?php echo $errMsg['description']?></td>
	</tr>
	<tr class="white_row">
		<td class="td_left_col"><?php echo $spText['label']['Keywords']?>:</td>
		<td class="td_right_col"><textarea name="keywords" id="webkeywords"><?php echo $post['keywords']?></textarea><?php echo $errMsg['keywords']?></td>
	</tr>
	<tr class="white_row">
		<td class="td_left_col"><?php echo $spTextWeb['Google Analytics View Id']?>:</td>
		<td class="td_right_col">
    		<input type="text" name="analytics_view_id" value="<?php echo $post['analytics_view_id']?>">
			<div style="padding: 10px 6px;">
    			<a target="_blank" href="<?php echo SP_MAIN_SITE?>/blog/2019/12/how-do-i-find-the-google-analytics-view-id/">
    				<?php echo $spTextWeb['Click here to get Google Analytics View Id']; ?> &gt;&gt;
    			</a>
    		</div>
		</td>
	</tr>
</table>
<table width="100%" cellspacing="0" cellpadding="0" border="0" class="actionSec">
	<tr>
    	<td style="padding-top: 6px;text-align:right;">
    		<a onclick="scriptDoLoad('websites.php', 'content')" href="javascript:void(0);" class="actionbut">
         		<?php echo $spText['button']['Cancel']?>
         	</a>&nbsp;
         	<?php $actFun = SP_DEMO ? "alertDemoMsg()" : "scriptDoLoadPost('websites.php', 'newWebsite', 'content')"; ?>
         	<a onclick="<?php echo $actFun?>" href="javascript:void(0);" class="actionbut">
         		<?php echo $spText['button']['Proceed']?>
         	</a>
    	</td>
	</tr>
</table>
</form>
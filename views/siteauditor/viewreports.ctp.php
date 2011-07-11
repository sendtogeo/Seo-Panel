<?php echo showSectionHead($spTextTools['Auditor Reports']); ?>
<?php
if(empty($projectId)) {
	showErrorMsg($spTextSA['No active projects found'].'!');
} 
$submitJsFunc = "scriptDoLoadPost('siteauditor.php', 'search_form', 'subcontent', '&sec=showreport')";
?>
<form id='search_form'>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="search">
	<tr>				
		<th><?=$spText['label']['Project']?>: </th>
		<td>
			<select id="project_id" name="project_id" onchange="<?=$submitJsFunc?>" style="width: 180px;">
				<?php foreach($projectList as $list) {?>
					<?php if($list['id'] == $projectId) {?>
						<option value="<?=$list['id']?>" selected="selected"><?=$list['name']?></option>
					<?php } else {?>
						<option value="<?=$list['id']?>"><?=$list['name']?></option>
					<?php }?>
				<?php }?>
			</select>
		</td>						
		<th><?=$spText['label']['Report Type']?>: </th>
		<td width="200px;">
			<select name="report_type" id="report_type" onchange="<?=$submitJsFunc?>">
				<?php foreach($reportTypes as $type => $label) {
				    $selected = ($type == $repType) ? "selected" : "";
				    ?>
					<option value="<?=$type?>" <?=$selected?>><?=$label?></option>
				<?php }?>
			</select>
		</td>						
		<th><?=$spTextSA['Crawled']?>: </th>
		<td>			
			<select name="crawled" id="crawled" onchange="<?=$submitJsFunc?>">
				<option value="-1">-- <?=$spText['common']['Select']?> --</option>
				<option value="0"><?=$spText['common']['No']?></option>
				<option value="1" selected><?=$spText['common']['Yes']?></option>
			</select>
		</td>
	</tr>
	<tr>						
		<th><?=$spTextSA['Page Link']?>: </th>
		<td style="width: 50px;">
			<input type="text" name="page_url" value="" onblur="<?=$submitJsFunc?>" style="width: 180px;">
		</td>			
		<th><?=$spText['common']['Google Pagerank']?>: </th>
		<td>
			<select name="google_pagerank" onchange="<?=$submitJsFunc?>">
				<option value="-1">-- <?=$spText['common']['Select']?> --</option>
				<?php for($i=0;$i<=10;$i++) {?>
					<option value="<?=$i?>">PR<?=$i?></option>
				<?php }?>
			</select>			
		</td>
		<td colspan="2">
			<a href="javascript:void(0);" onclick="<?=$submitJsFunc?>" class="actionbut"><?=$spText['button']['Show Records']?></a>
		</td>
	</tr>
</table>
</form>
<div id='subcontent'>
	<script><?=$submitJsFunc?></script>
</div>
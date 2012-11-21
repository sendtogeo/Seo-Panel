<script>
	var menuList = new Array();
	var buttonList = new Array();	
</script>
<ul id="menu">
<?php 
foreach($menuList as $i => $menuInfo){
	if($menuSelected == $menuInfo['id']){
			$imgSrc = "hide";
			$style = "";
	}else{
		$imgSrc = "more";
		$style = 'none';
	}
	$button = "img".$menuInfo['id'];
	$subMenuId = "sub".$menuInfo['id'];
	?>
	<script type="text/javascript">
		menuList[<?=$i?>] = '<?=$subMenuId?>';
		buttonList[<?=$i?>] = '<?=$button?>';
	</script>
	<li class="tab">
		<a href='javascript:void(0);' onclick="showMenu('<?=$button?>','<?=$subMenuId?>')"><img id="<?=$button?>" src="<?=SP_IMGPATH."/".$imgSrc?>.gif"><?=$menuInfo['label']?></a>
	</li>
	<li id="<?=$subMenuId?>" class="subtab" style="display:<?=$style?>;padding-left:0px;"><?=$menuInfo['menu']?></li>
	<?php
}
?>
</ul>
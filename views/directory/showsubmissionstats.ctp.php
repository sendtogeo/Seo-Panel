<? if(!empty($msg)){
	$msgClass = empty($error) ? "success" : "error"; 
	?>
		<p class="dirmsg">
			<font class="<?=$msgClass?>"><?=$msg?></font>
		</p>
	<? 
	}
?>
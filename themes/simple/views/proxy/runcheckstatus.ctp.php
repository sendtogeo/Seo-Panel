<script>
	updateInnerHtml('checked_count', '<?=$checkedCount?>');
	updateInnerHtml('active_count', '<?=$activeCount?>');
	updateInnerHtml('inactive_count', '<?=$inActiveCount?>');
</script>
<?php
if (count($proxyList)) {
	$proxyInfo = $proxyList[0];
	$argumentVar = isset($status) ? "&status=$status" : "";
	$argumentVar .= empty($proxyMaxId) ? "" : "&proxy_max_id=$proxyMaxId";
    ?>
	<script>
		scriptDoLoad('proxy.php?sec=runcheckstatus&id=<?=$proxyInfo['id']?><?=$argumentVar?>', 'subcontmed');
    </script>
	<?php
} else {
	showSuccessMsg($spTextSA['Completed project execution'], false);
}
?>
	
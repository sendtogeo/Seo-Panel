<?php
if (!empty($alertList)) { 
	foreach ($alertList as $alertInfo) {
		?>
		<li class="list-group-item list-group-item-light">
			<div>
				<a href="#"><?php echo$alertInfo["alert_subject"]?></a>
			</div> <br>
			<div style="font-size: 12px;"><?php echo $alertInfo["alert_message"]?></div>
		</li>
		<?php
	}
} else {
	?>
	<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>
	<?php
}
?>
<li class="list-group-item list-group-item-light" style="text-align: center;line-height: 6px; border-bottom: none;">
	<a href="<?php echo SP_WEBPATH?>/admin-panel.php?sec=alerts" style="font-size: 12px; ">See All</a>
</li>
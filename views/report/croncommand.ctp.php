<?php echo showSectionHead($spTextPanel['Cron Command']); ?>

<table width="600px" border="0" cellspacing="0" cellpadding="0" class="search">
	<tr>
		<th style="text-align: left;font-size: 14px;padding-left: 10px;"><?=$spTextPanel['Add following command to your cron tab']?></th>		
	</tr>
	<tr>
		<td valign="middle">
			<p class="note" style="padding-top: 6px;font-size: 15px;width: 600px;">
			<?php
			$command = "0 0 * * * php ".SP_ABSPATH."/cron.php";
			highlight_string($command); 
			?>
			</p>
		</td>
	</tr>
	<tr>
		<td>
		<p><?=$spTextPanel['alsocheckfollowlink']?></p>
		<p><a target="_blank" href="http://www.seopanel.in/install/setup-cron/" class="infobox">http://www.seopanel.in/install/setup-cron/</a></p>
		</td>
	</tr>
</table>
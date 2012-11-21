<div class="Left">
    <div class="col">
        <?php echo getRoundTabTop(); ?>
        <div id="round_content">
            <div class="Block">
            
            	<table width="100%" cellpadding="0" cellspacing="0" class="actionForm">
                	<tr>
                		<td colspan="2">
                			<?php showSuccessMsg($spText['login']['newaccountsuccess'], false); ?>
                		</td>
                	</tr>
                	<tr>
                		<td colspan="2"><a class="actionbut" href="<?=SP_WEBPATH?>/login.php"><?=$spText['login']['Sign in to your account']?> >></a></td>
                	</tr>
            	</table>     
            </div>
		</div>
		<?php echo getRoundTabBot(); ?>           
    </div>
</div>
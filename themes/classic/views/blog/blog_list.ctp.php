<div class="Center" style='width:100%;'>
    <div class="col" style="">
        <?php echo getRoundTabTop(); ?>
        <div id="round_content">
            <?php
            foreach ($blogList as $blogInfo) {
            	?>
            	<div>
            		<div><h2><?php echo $blogInfo['blog_title']?></h2></div>
            		<div><p><?php echo convertMarkdownToHtml($blogInfo['blog_content'])?></p></div>
            	</div>
            	<br>
            	<?php
            }
            ?>
		</div>
		<?php echo getRoundTabBot(); ?>
    </div>
</div>

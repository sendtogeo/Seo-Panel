<div class="Center" style='width:100%;'>
    <div class="col" style="">
        <?php echo getRoundTabTop(); ?>
        <div id="round_content">
            <div class="blog_search">
            	<form action="<?php echo SP_WEBPATH . "/blog.php"?>" method="post">
            		<input type="text" name="search" value="" placeholder="Search..">
            	</form>
            </div>
            <?php
            foreach ($blogList as $blogInfo) {
            	?>
            	<div class="blog_section">
            		<div class="blog_List_head">
            			<a href="<?php echo SP_WEBPATH . "/blog.php?id=" . $blogInfo['id']?>">
            				<?php echo $blogInfo['blog_title']?>
            			</a>
            		</div>
            		<div class="blog_body">
            			<p><?php echo convertMarkdownToHtml($blogInfo['blog_content'])?></p>
            		</div>
            	</div>
            	<br>
            	<?php
            }
            ?>
		</div>
		<?php echo getRoundTabBot(); ?>
    </div>
</div>
<style>
.blog_section{margin: 26px 10px; padding: 6px;}
.blog_search{float: right;text-align: right;}
.blog_List_head A{font-size: 30px; font-weight: bold;text-decoration: none;color: #445566;}
</style>

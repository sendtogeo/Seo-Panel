<?php $publishedTime = strtotime($blogInfo['updated_time'])?>
<div class="col" id="home_screen">
            <div class="blog_search">
            	<form action="<?php echo SP_WEBPATH . "/blog.php"?>" method="post">
            		<input type="text" name="search" value="<?php echo $post['search']?>" placeholder="Search..">
            	</form>
            </div>
            <div class="blog_section">
            	<div class="blog_List_head">
            		<a href="<?php echo SP_WEBPATH . "/blog.php?id=" . $blogInfo['id']?>">
            			<?php echo $blogInfo['blog_title']?>
            		</a>
            		<p>Posted on <?php echo date('F d, Y', $publishedTime);?> by Admin</p>
            	</div>
            	<div class="blog_body">
            		<p><?php echo convertMarkdownToHtml($blogInfo['blog_content'])?></p>
            	</div>
            	<div class="blog_tags">
            		<?php
            		$tagList = explode(",", $blogInfo['tags']);
            		foreach ($tagList as $tag) {
	            		$tag = trim($tag);
            			if (!empty($tag)) {
            				?>
            				<a href="<?php echo SP_WEBPATH . "/blog.php?tag=". urlencode($tag);?>"><?php echo $tag;?></a>
            				<?php
            			}
            		}
            		?>
            	</div>
            </div>
</div>

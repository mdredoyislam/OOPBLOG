		<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
					<ul>
						<?php
							$query = "SELECT * FROM  tbl_category";
							$Category = $db->select($query);
							if($Category){
								while($result = $Category->fetch_assoc()){
						?>
						<li><a href="posts.php?category=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a></li>

						<?php } } ?>						
					</ul>
			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
					<?php
						$query = "SELECT * FROM tbl_post limit 5";
						$post = $db->select($query);
						if($post){
							while($result = $post->fetch_assoc()){
					?>
						<div class="popular clear">
							<h3><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h3>
							<a href="post.php?id=<?php echo $result['id']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="post image"/></a>
							<?php echo $fm->textShorten($result['body'] , 125); ?>	
						</div>
					<?php } } ?>
			</div>
			
		</div>
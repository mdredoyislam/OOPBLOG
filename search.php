<?php include "inc/header.php"; ?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<?php
				if(!isset($_GET['search']) || $_GET['search'] == NULL){
					header('location: 404.php');
				}else{
					$search = $_GET['search'];
				}
			?>
			<?php
				$query = "SELECT * FROM tbl_post WHERE title LIKE '%$search%' OR body LIKE '%$search%'";
				$post = $db->select($query);
				if($post){
					while($result = $post->fetch_assoc()){
			?>
			<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h2>
				<h4><?php echo $fm->formatDate($result['date']); ?>, By <a href="#"><?php echo $result['author']; ?></a></h4>
				 <a href="#"><img src="admin/<?php echo $result['image']; ?>" alt="post image"/></a>

				<?php echo $fm->textShorten($result['body']); ?>

				<div class="readmore clear">
					<a href="post.php?id=<?php echo $result['id']; ?>">Read More</a>
				</div>
			</div>
			<?php } ?> <!--End While Loop-->

			<?php }else{ ?>
				<div class="search_notmatch">
    				<p>Keyword Hasbeen Not Match ..</p>
    			</div>
			<?php } ?>
		</div>
<?php include "inc/sidebar.php"; ?>
<?php include "inc/footer.php"; ?>
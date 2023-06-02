<?php include "inc/header.php"; ?>
	<div class="contentsection contemplete clear">
		<?php
			if(!isset($_GET['id']) || $_GET['id'] == NULL){
				header('location: 404.php');
			}else{
				$id = $_GET['id'];
			}
		?>
		<div class="maincontent clear">
			<div class="about">
				<?php
					$query = "SELECT * FROM tbl_post WHERE id='$id'";
					$post = $db->select($query);
					if($post){
						while($result = $post->fetch_assoc()){
				?>
				<h2><?php echo $result['title']; ?></h2>
				<h4><?php echo $fm->formatDate($result['date']); ?>, By <a href="#"><?php echo $result['author']; ?></a></h4>
				<img src="admin/<?php echo $result['image']; ?>" alt="post image"/>
				<?php echo $result['body']; ?>

			
				<div class="relatedpost clear">
					<h2>Related articles</h2>
					<?php
						$catid = $result['cat'];
						$queryrelated = "SELECT * FROM tbl_post WHERE cat='$catid' order by rand() limit 6";
						$relatedpost = $db->select($queryrelated);
						if($relatedpost){
							while($result_relatedpost = $relatedpost->fetch_assoc()){
					?>
						<a href="post.php?id=<?php echo $result_relatedpost['id']; ?>"><img src="admin/<?php echo $result_relatedpost['image']; ?>" alt="post image"/></a>
					<?php } }else{echo "NO Related Post Available !!"; } ?>
				</div>

			<?php } } else{ header('location: 404.php'); } ?>
	</div>

</div>
<?php include "inc/sidebar.php"; ?>
<?php include "inc/footer.php"; ?>
<?php require __DIR__.'/views/header.php'; ?>
<?php
	if (!isset($_SESSION['user'])) {
		redirect('login.php');
	}
	?>
<article class="text-center">


<h1>New Post</h1>
<form class="" action="/app/posts/store.php" method="post" enctype="multipart/form-data">
  Post an image:<input type="file" name="image" value=""><br><br>
  Set a Description:<input type="text" name="imageDescription" placeholder="Image Description" value=""><br><br>
  <button class="btn btn-success" type="submit" name="button">Submit Post</button>
</form>

<br>
<div class="feed-container">
  <?php foreach ($_SESSION['posts'] as $post): ?>
    <div class="posts">

      <!-- <img src="/app/posts/postUploads/<//?php echo $post['user_id'].'/'.$post['image'] ?>" width="200px" height="200px" alt=""> -->
      <!-- <p>Description: <//?php echo $post['description'] ?></p> -->

			<!----------------------------------- Desktop Posts -->
			<div id="post-for-desktop" class="card mx-auto" style="width:24rem;">
				<img class="card-img" <img src="/app/posts/postUploads/<?php echo $post['user_id'].'/'.$post['image'] ?>" alt="">
				<div class="card-body">
					<h5 class="card-title"><?php echo $post['description'] ?></h5>
				</div>
				<div class="card-body">
					<!------------------ Like Posts -->
					<?php
					 $statement = $pdo->prepare(
							'SELECT * FROM likes WHERE post_id = :post_id AND user_id = :user_id');
							 $statement->bindParam(':post_id', $post['post_id'], PDO::PARAM_INT);
							 $statement->bindParam(':user_id', $_SESSION['user']['id'], PDO::PARAM_INT);
							 $statement->execute();
							 $alreadyLiked = $statement->fetch(PDO::FETCH_ASSOC);
							 ?>
					<!-- change button if the post is liked or not by the user -->
					<p>Liked by: <?php echo $post['likes']; ?></p>
					 <?php if($alreadyLiked):?>
							 <form class="dislike-post" action="app/posts/dislikes.php" method="post">
									 <button type="submit" class="dislike">Dislike</button>
											 <input type="hidden" value="<?php echo $post['post_id'];?>" name="post_id">
											 <input type="hidden" value="<?php echo $post['likes'];?>" name="totalLikes">
							 </form>
						 <?php else: ?>
							 <form class="like-post" action="app/posts/likes.php" method="post">
									 <button class="btn btn-succsess" type="submit" class="like">Like</button>
											 <input type="hidden" value="<?php echo $post['post_id'];?>" name="post_id">
											 <input type="hidden" value="<?php echo $post['likes'];?>" name="totalLikes">
							 </form>
						 <?php endif; ?>
					<!------------------ end Like Posts -->
					<!--Edit post Decription-->
					<?php if ((int)$_SESSION['user']['id'] === (int)$post['user_id']): ?>
					<div class="edit-description">
						<form class="edit-description-form" action="app/posts/update.php" method="post">
							<input type="text" name="changeDescription">
							<input type="hidden" name="postId" value="<?php echo $post['post_id'];?>" >
							<button type="submit" name="button">Change Description</button>
						</form>
					</div>

					<?php endif; ?>
					<!--// END Edit Post Description  -->
					<!--Delete Post  -->
					<?php if ((int)$_SESSION['user']['id'] === (int)$post['user_id']): ?>
					<div class="delete-post">
						<form class="delete-post-form" action="app/posts/delete.php" method="post">
							<input type="hidden" name="postId" value="<?php echo $post['post_id'];?>" >
							<button type="submit" name="button">Remove Post</button>
						</form>
					</div>
					<?php endif; ?>
					<!--//End Delete Post  -->
					</div>
				</div>
			<!------------------------------------------// END Desktop Posts -->


			<!-- Mobile Posts -->
			<div id="post-for-mobile" class="card mx-auto" style="width: 100%;">
				<img class="card-img" <img src="/app/posts/postUploads/<?php echo $post['user_id'].'/'.$post['image'] ?>" alt="">
				<div class="card-body">
					<h5 class="card-title"><?php echo $post['description'] ?></h5>
				</div>
				<div class="card-body">
					<!------------------ Like Posts -->
					<?php
					 $statement = $pdo->prepare(
							'SELECT * FROM likes WHERE post_id = :post_id AND user_id = :user_id');
							 $statement->bindParam(':post_id', $post['post_id'], PDO::PARAM_INT);
							 $statement->bindParam(':user_id', $_SESSION['user']['id'], PDO::PARAM_INT);
							 $statement->execute();
							 $alreadyLiked = $statement->fetch(PDO::FETCH_ASSOC);
							 ?>
					<!-- change button if the post is liked or not by the user -->
					<p>Liked by: <?php echo $post['likes']; ?></p>
					 <?php if($alreadyLiked):?>
							 <form class="dislike-post" action="app/posts/dislikes.php" method="post">
									 <button class="btn btn-success" type="submit">Dislike</button>
											 <input type="hidden" value="<?php echo $post['post_id'];?>" name="post_id">
											 <input type="hidden" value="<?php echo $post['likes'];?>" name="totalLikes">
							 </form>
						 <?php else: ?>
							 <form class="like-post" action="app/posts/likes.php" method="post">
									 <button class="btn btn-success" type="submit" >Like</button>
											 <input type="hidden" value="<?php echo $post['post_id'];?>" name="post_id">
											 <input type="hidden" value="<?php echo $post['likes'];?>" name="totalLikes">
							 </form>
						 <?php endif; ?>
					<!------------------ end Like Posts -->
					<!--Edit post Decription-->
					<?php if ((int)$_SESSION['user']['id'] === (int)$post['user_id']): ?>
					<div class="edit-description">
						<form class="edit-description-form" action="app/posts/update.php" method="post">
							<input type="text" name="changeDescription">
							<input type="hidden" name="postId" value="<?php echo $post['post_id'];?>" >
							<button class="btn btn-success" type="submit" name="button">Change Description</button>
						</form>
					</div>

					<?php endif; ?>
					<!--// END Edit Post Description  -->
					<!--Delete Post  -->
					<?php if ((int)$_SESSION['user']['id'] === (int)$post['user_id']): ?>
					<div class="delete-post">
						<form class="delete-post-form" action="app/posts/delete.php" method="post">
							<input type="hidden" name="postId" value="<?php echo $post['post_id'];?>" >
							<button class="btn btn-success" type="submit" name="button">Remove Post</button>
						</form>
					</div>
					<?php endif; ?>
					<!--//End Delete Post  -->
				</div>
				</div>
			<!--// END Mobile Posts -->

  <?php endforeach; ?>
</div>
<!--// End feed  -->

</article>
<?php require __DIR__.'/views/footer.php'; ?>

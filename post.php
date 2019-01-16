<?php require __DIR__.'/views/header.php'; ?>
<?php
	if (!isset($_SESSION['user'])) {
		redirect('login.php');
	}
	?>
<article class="text-center">


<form class="" action="/app/posts/store.php" method="post" enctype="multipart/form-data">
	<div class="card mx-auto" style="width: 24rem;">
		<ul class="list-group list-group-flush">
			<div class="card-body">
				<h5 class="card-title">Create new Post</h5>
					<p class="card-text">Post an image:<input type="file" name="image" value=""></p>
					</p>
					</div>
				<li class="list-group-item">Set a Description:<input type="text" name="imageDescription" placeholder="Image Description" value=""></li>
		</ul>

		<div class="card-body">
			<button class="btn btn-success" type="submit" name="button">Submit Post</button>
		</div>
	</div>
</form>


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
					<p><?php echo $post['likes'].' Likes'; ?></p>

					 <?php if($alreadyLiked):?>
							 <form class="dislike-post" action="app/posts/dislikes.php" method="post">
									 <button class="" type="submit"> <i class="like-color like-heart fas fa-heart"></i></button>
											 <input type="hidden" value="<?php echo $post['post_id'];?>" name="post_id">
											 <input type="hidden" value="<?php echo $post['likes'];?>" name="totalLikes">
							 </form>
						 <?php else: ?>
							 <form class="like-post" action="app/posts/likes.php" method="post">
									 <button class="" type="submit"><i class="dislike-color like-heart far fa-heart"></i></button>
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
					<p><?php echo $post['likes'].' Likes'; ?></p>

					 <?php if($alreadyLiked):?>
							 <form class="dislike-post" action="app/posts/dislikes.php" method="post">
									 <button class="" type="submit"> <i class="like-color like-heart fas fa-heart"></i></button>
											 <input type="hidden" value="<?php echo $post['post_id'];?>" name="post_id">
											 <input type="hidden" value="<?php echo $post['likes'];?>" name="totalLikes">
							 </form>
						 <?php else: ?>
							 <form class="like-post" action="app/posts/likes.php" method="post">
									 <button class="" type="submit"><i class="dislike-color like-heart far fa-heart"></i></button>
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
							<button class="edit-button btn btn-success" type="submit" name="button">Change Description</button>
						</form>
					</div>

					<?php endif; ?>
					<!--// END Edit Post Description  -->
					<!--Delete Post  -->
					<?php if ((int)$_SESSION['user']['id'] === (int)$post['user_id']): ?>
					<div class="delete-post">
						<form class="delete-post-form" action="app/posts/delete.php" method="post">
							<input type="hidden" name="postId" value="<?php echo $post['post_id'];?>" >
							<button class="delete-button btn btn-warning" type="submit" name="button">Remove Post</button>
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

<?php require __DIR__.'/views/header.php'; ?>
<?php
	if (!isset($_SESSION['user'])) {
		redirect('login.php');
	}
	?>

<h1>New Post</h1>
<form class="" action="/app/posts/store.php" method="post" enctype="multipart/form-data">
  Post an image:<input type="file" name="image" value=""><br><br>
  Set a Description:<input type="text" name="imageDescription" placeholder="Image Description" value=""><br><br>
  <button type="submit" name="button">Submit Post</button>
</form>

<br>
<div class="feed-container">
  <?php foreach ($_SESSION['posts'] as $post): ?>
    <div class="posts">

      <img src="/app/posts/postUploads/<?php echo $post['user_id'].'/'.$post['image'] ?>" width="200px" height="200px" alt="">
      <p>Description: <?php echo $post['description'] ?></p>

      <!--Edit post Decription-->
      <?php if ($_SESSION['user']['id'] === $post['user_id']): ?>
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
      <?php if ($_SESSION['user']['id'] === $post['user_id']): ?>
      <div class="edit-description">
        <form class="edit-description-form" action="app/posts/delete.php" method="post">
          <input type="hidden" name="postId" value="<?php echo $post['post_id'];?>" >
          <button type="submit" name="button">Remove Post</button>
        </form>
      </div>

      <?php endif; ?>

      <!--//End Delete Post  -->



      <div class="likes-container">

					<form class="likes" method="post" >
						<input type="hidden" name="id" value="<?php $post['post_id']; ?>">
						<button class="" type="submit">Like</button>
					</form>

          <p class="number-likes" >Likes:<?php echo $post['likes']; ?></p>

			</div>

      <!-- <form class="" action="/app/posts/likes.php" method="post">
        <input type="hidden" name="post_id" value= php $post['post_id'] ?>>
        <button type="submit" name="button">Like</button>
      </form>

      <form class="" action="/app/posts/dislikes.php" method="post">
        <input type="hidden" name="post_id" value= php $post['post_id']?>>
        <button type="submit" name="button">Dislike</button>
      </form> -->

    </div>
  <?php endforeach; ?>
</div>
<!--// End feed  -->



<?php require __DIR__.'/views/footer.php'; ?>

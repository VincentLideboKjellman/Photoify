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
      <p>Likes:<?php echo $post['likes']; ?></p>
      <form class="" action="/app/posts/likes.php" method="post">
        <input type="hidden" name="like" value=<?php $post['likes'] ?>>
        <button type="button" name="button">Like</button>
      </form>
      <form class="" action="/app/posts/likes.php" method="post">
        <input type="hidden" name="dislike" value=<?php $post['likes']?>>
        <button type="button" name="button">Dislike</button>
      </form>
    </div>
  <?php endforeach; ?>
</div>
<!--// End feed  -->



<?php require __DIR__.'/views/footer.php'; ?>
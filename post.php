<?php require __DIR__.'/views/header.php'; ?>

<h1>New Post</h1>
<form class="" action="/app/posts/store.php" method="post" enctype="multipart/form-data">
  Post an image:<input type="file" name="image" value=""><br><br>

  Set a Description:<input type="text" name="photoDescription" value="">
</form>

<?php require __DIR__.'/views/footer.php'; ?>

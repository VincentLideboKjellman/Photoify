<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['postId'])) {

  $postId = trim(filter_var($_POST['postId']));
  $deleteStatement = $pdo->prepare('DELETE FROM posts WHERE post_id = :post_id');

  if (!$deleteStatement) {
    die(var_dump($pdo->errorInfo()));
  }

  $deleteStatement->bindParam(':post_id', $postId, PDO::PARAM_INT);

  $deleteStatement->execute();

  redirect('../posts/loadPosts.php');

}

// In this file we delete new posts in the database.

<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['changeDescription'], $_POST['postId'])) {
  $newDescription = trim(filter_var($_POST['changeDescription'], FILTER_SANITIZE_STRING));
  $postId = trim(filter_var($_POST['postId']));
  // $userId = $_SESSION['user']['id'];

  $updateStatement = $pdo->prepare('UPDATE posts SET description = :description WHERE post_id = :post_id');

  // die(var_dump($updateStatement));
  // die(var_dump($postId));
  // die(var_dump($newDescription));

  if (!$updateStatement)
        {
            die(var_dump($pdo->errorInfo()));
        }

  $updateStatement->bindParam(':description', $newDescription, PDO::PARAM_STR);
  // $updateStatement->bindParam(':user_id', $userId, PDO::PARAM_INT);
  $updateStatement->bindParam(':post_id', $postId, PDO::PARAM_INT);
  $updateStatement->execute();
}
redirect('../posts/loadPosts.php');

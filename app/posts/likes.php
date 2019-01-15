<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

echo 'halloj';
if (isset($_POST['post_id'])) {
  echo 'balloj';
  die(var_dump($_POST['post_id']));
  $user_id = $_SESSION['user']['id'];
  $post_id = $_POST['post_id'];



  $likeStatement = $pdo->prepare('SELECT * FROM likes WHERE post_id = :post_id AND user_id = :user_id');
  $likeStatement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
  $likeStatement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
  $likeStatement->execute();
  $alreadyLiked = $likeStatement->fetch(PDO::FETCH_ASSOC);


  if (!$alreadyLiked) {
    $likeStatement = $pdo->prepare('INSERT INTO likes (post_id, user_id) VALUES (:post_id, :user_id);');
    if (!$likeStatement){
            die(var_dump($pdo->errorInfo()));
        }

    $likeStatement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
    $likeStatement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $likeStatement->execute();
    }
}

 ?>

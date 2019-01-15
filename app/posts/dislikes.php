<?php
declare(strict_types=1);
require __DIR__.'/../autoload.php';


if (isset($_POST['post_id'], $_POST['totalLikes'])) {
  $user_id = $_SESSION['user']['id'];
  $post_id = $_POST['post_id'];

  //subtracts one like to the variable that later puts the value in the database
  $totalLikes = $_POST['totalLikes'];
  $totalLikes--;

  // die(var_dump($totalLikes));

  // Dislike a post
  $dislikeStatement = $pdo->prepare(
   'DELETE FROM likes WHERE post_id = :post_id AND user_id = :user_id');

 if (!$dislikeStatement){
    die(var_dump($pdo->errorInfo()));
  }


 $dislikeStatement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
 $dislikeStatement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
 $dislikeStatement->execute();

 $statement = $pdo->prepare('UPDATE posts SET likes = :likes WHERE post_id = :post_id;');
 $statement->bindParam(':likes', $totalLikes, PDO::PARAM_INT);
 $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
 $statement->execute();


}
  redirect('../posts/loadPosts.php');

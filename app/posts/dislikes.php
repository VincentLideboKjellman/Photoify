<?php
declare(strict_types=1);
require __DIR__.'/../autoload.php';


if (isset($_POST['post_id'])) {
    $user_id = $_SESSION['user']['user_id'];
    $post_id = $_POST['post_id'];
// Dislike a post
 $dislikeStatement = $pdo->prepare(
     'DELETE FROM likes WHERE post_id = :post_id AND user_id = :user_id');
 if (!$dislikeStatement){
    die(var_dump($pdo->errorInfo()));
  }
 $dislikeStatement->bindParam(':post_id', $postId, PDO::PARAM_INT);
 $dislikeStatement->bindParam(':user_id', $id, PDO::PARAM_INT);
 $dislikeStatement->execute();
}
redirect('/');

?>

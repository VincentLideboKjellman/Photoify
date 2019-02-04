<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';


if (isset($_POST['post_id'], $_POST['totalLikes'])) {
    // die(var_dump($_POST['post_id']));
    $user_id = $_SESSION['user']['id'];
    $post_id = $_POST['post_id'];

    //adds one like to the variable that later puts the value in the database
    $totalLikes = $_POST['totalLikes'];
    $totalLikes++;



    $likeStatement = $pdo->prepare('SELECT * FROM likes WHERE post_id = :post_id AND user_id = :user_id');
    $likeStatement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
    $likeStatement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $likeStatement->execute();
    $alreadyLiked = $likeStatement->fetch(PDO::FETCH_ASSOC);


    if (!$alreadyLiked) {
        $likeStatement = $pdo->prepare('INSERT INTO likes (post_id, user_id) VALUES (:post_id, :user_id);');
        if (!$likeStatement) {
            die(var_dump($pdo->errorInfo()));
        }

        $likeStatement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        $likeStatement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $likeStatement->execute();

        // die(var_dump($totalLikes));

        $statement = $pdo->prepare('UPDATE posts SET likes = :likes WHERE post_id = :post_id;');
        $statement->bindParam(':likes', $totalLikes, PDO::PARAM_INT);
        $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        $statement->execute();
    }
}

redirect('../posts/loadPosts.php');

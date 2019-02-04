<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['changeDescription'], $_POST['postId'])) {
    $newDescription = trim(filter_var($_POST['changeDescription'], FILTER_SANITIZE_STRING));
    $postId = trim(filter_var($_POST['postId']));

    $updateStatement = $pdo->prepare('UPDATE posts SET description = :description WHERE post_id = :post_id');

    if (!$updateStatement) {
        die(var_dump($pdo->errorInfo()));
    }

    $updateStatement->bindParam(':description', $newDescription, PDO::PARAM_STR);
    $updateStatement->bindParam(':post_id', $postId, PDO::PARAM_INT);
    $updateStatement->execute();
}
redirect('../posts/loadPosts.php');

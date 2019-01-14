<?php
declare(strict_types=1);
require __DIR__.'/../autoload.php';

$loadPostsStatement = $pdo->prepare('SELECT * FROM posts');
$loadPostsStatement->execute();

$posts = $loadPostsStatement->fetchAll(PDO::FETCH_ASSOC);


$_SESSION['posts'] = $posts;


redirect('/post.php');

<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';
// In this file we store/insert new posts in the database.

if (isset($_FILES['image'])) {
  $image = $_FILES['image'];
  $description = trim(filter_var($_POST['imageDescription'], FILTER_SANITIZE_STRING)) ?: 'No Description';
  $date = date('Y-m-d, H:i:s');
  $errors = [];
  $id = $_SESSION['user']['id'];
  $postName = $id.'_'.$date.$image['name'];

  if (!is_dir(__DIR__.'/postUploads/'.$id)) {
        mkdir(__DIR__.'/postUploads/'.$id);
      };


  $postPath = __DIR__.'/postUploads/'.$id.'/';

  if (file_exists($postPath.$image['name'])) {
    die;
  }

  $tmpPath = $image['tmp_name'];
  $newPath = $postPath.$postName;
  move_uploaded_file($tmpPath, $newPath);

  $postStatement = $pdo->prepare('INSERT INTO posts (user_id, description, image) VALUES (:id, :description, :image)');

  if (!$postStatement) {
      die(var_dump($pdo->errorInfo()));
  };

	$postStatement->bindParam(':id', $id, PDO::PARAM_INT);
	$postStatement->bindParam(':description', $description, PDO::PARAM_STR);
	$postStatement->bindParam(':image', $postName, PDO::PARAM_STR);
	$postStatement->execute();


}
redirect('../posts/loadPosts.php');

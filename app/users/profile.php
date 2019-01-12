<?php
declare(strict_types=1);

require __DIR__.'/../autoload.php';

//updates profile info
if (isset($_POST['name'], $_POST['username'], $_POST['email'], $_POST['bio'])){

  $bio = trim(filter_var($_POST['bio'], FILTER_SANITIZE_STRING));
  $name = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING));
  $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
  $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));

  $id = $_SESSION['user']['id'];

  $updateStatement = $pdo->prepare('UPDATE users SET name = :name, username = :username, email = :email, profile_bio = :bio WHERE id = :id');

  $updateStatement->bindParam(':bio', $bio, PDO::PARAM_STR);
  $updateStatement->bindParam(':id', $id, PDO::PARAM_INT);
  $updateStatement->bindParam(':name', $name, PDO::PARAM_STR);
  $updateStatement->bindParam(':username', $username, PDO::PARAM_STR);
  $updateStatement->bindParam(':email', $email, PDO::PARAM_STR);
  $updateStatement->execute();

  $_SESSION['user']['profile_bio'] = $bio;
  $_SESSION['user']['name'] = $name;
  $_SESSION['user']['username'] = $username;
  $_SESSION['user']['email'] = $email;

  if (!$updateStatement) {
      die(var_dump($pdo->errorInfo()));
  };
}

// redirect('logout.php');
redirect('/profile.php');

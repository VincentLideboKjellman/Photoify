<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// $errors[];
if (isset($_POST['email'], $_POST['password'])) {

  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $password = $_POST['password'];

  $statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');
  $statement->bindParam(':email' , $email);
  $statement->execute();
  $user = $statement->fetch(PDO::FETCH_ASSOC);

  if (!$user) {
    redirect('/login.php');
  }

  if ($email === '' || $password === '') {
    $errors[] = 'Please insert into the text field';
  }

  if (password_verify($_POST['password'], $user['password'])) {
    $_SESSION['user'] = $user ;
    redirect('/');
  }else {
    redirect('/login.php');
  }

}

// In this file we login users.

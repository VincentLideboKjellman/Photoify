<?php
//create account logic
declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['name'], $_POST['username'], $_POST['email'], $_POST['password'])) {


  $name = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING));
  $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
  $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


  $statement = $pdo->prepare('INSERT INTO users (name, username, email, password) VALUES (:name, :username, :email, :password)');
  // $statement = $pdo->prepare('SELECT name, username, email, password FROM users WHERE email = :email, username = :username, password = :password');

  if (!$statement) {
      die(var_dump($pdo->errorInfo()));
  };

  $statement->bindParam(':name',$name,PDO::PARAM_STR);
  $statement->bindParam(':username',$username,PDO::PARAM_STR);
  $statement->bindParam(':email',$email,PDO::PARAM_STR);
  $statement->bindParam(':password',$password,PDO::PARAM_STR);

  $statement->execute();

}
  redirect('/');

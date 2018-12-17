<?php
//create account logic
declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['name'], $_POST['username'], $_POST['email'], $_PASSWORD['password'])) {

  $name = trim(filter($_POST['name'], FILTER_SANITIZE_STRING));
  $username = trim(filter($_POST['username'], FILTER_SANITIZE_STRING));
  $email = trim(filter($_POST['email'], FILTER_SANITIZE_EMAIL));
  $password = trim(filter($_POST['password'], FILTER_SANITIZE_PASSWORD));

  $statement = $pdo->prepare('SELECT name, username, email, password FROM users WHERE email = :email, username = :username, password = :password ');

  $statement->bindParam(':name', $name, PDO::PARAM_STR);
  $statement->bindParam(':username', $username, PDO::PARAM_STR);
  $statement->bindParam(':email', $email, PDO::PARAM_STR);
  $statement->bindParam(':password', $password, PDO::PARAM_STR);

}

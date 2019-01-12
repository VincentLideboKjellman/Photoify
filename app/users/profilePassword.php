<?php
declare(strict_types=1);

require __DIR__.'/../autoload.php';

//Updates password
if (isset($_POST['password'], $_POST['confirmPassword'])) {
  if ($_POST['password'] === $_POST['confirmPassword']) {


    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $id = $_SESSION['user']['id'];

    $updatePasswordStatement = $pdo->prepare('UPDATE users SET password = :password WHERE id = :id');
    $updatePasswordStatement->bindParam(':id', $id, PDO::PARAM_INT);
    $updatePasswordStatement->bindParam(':password', $password, PDO::PARAM_STR);
    $updatePasswordStatement->execute();

    if (!$updatePasswordStatement) {
        die(var_dump($pdo->errorInfo()));
    };
  }else {
    echo 'password don\'t match';
  }
}

// redirect('logout.php');
redirect('/profile.php');

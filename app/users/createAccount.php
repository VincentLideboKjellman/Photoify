<?php
//create account logic
declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['name'], $_POST['username'], $_POST['email'])) {
  // code...
  $name = trim(filter($_POST['name'], FILTER_SANITIZE_STRING));
  $username = trim(filter($_POST['name'], FILTER_SANITIZE_STRING));
  $email = trim(filter($_POST['name'], FILTER_SANITIZE_EMAIL));

}
